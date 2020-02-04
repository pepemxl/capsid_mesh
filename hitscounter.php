<?php
/**
Hits counter class
Written by Saivert
Based on work by Lord Darius, and others.


You use it by instantiating a HitsFile class which you set up. You migt use one HitsFile object for all files and you can design
different HitsFile classes (maybe one that uses MySQL database to store hits).

When you have set up the HitsFile class you will attach it to a HitsCounter class you also will have to instantiate.
You can have the HitsCounter class instantiate a HitsFile class for you by omitting the $hfobject parameter.

Example:
  On top of document we write this:
    $myfile = new HitsCounter('mycoolprogram.exe');
  Further down we print out the link:
    $myfile->printdownloadlink('My Program v1.0', true);
 
  Now the $myfile object will take care of the rest.

  Notes:
  If you supply your own HitsFile object, it must support storing ancillary data. This is used for the MD5 hash used to indentify
  the file via the query string. As we don't want to reveal the exact location of the file on server we use MD5 hashes to identify
  files in the download links.
  I could have kept all the tagging functionality in the HitsFile class itself, but the HitsFile class (as the name suggests) should
  only worry about keeping record of the hits and not dealing with hashes.
*/

/**
  HitsFile class
  Handles storage of hit counters
*/
class HitsFile {
    var $filename;
    var $hits;
	var $hasotherdata;
	var $data;

    function HitsFile($filename, $hasotherdata = false) {
		$this->filename = $filename;
		$this->hasotherdata = $hasotherdata;
        $file_desc = @fopen($this->filename, 'r');
        if ($file_desc == FALSE) {
            $this->hits = 0;
            return;
        }
		if ($this->hasotherdata) {
			$fd = fread($file_desc, filesize($this->filename));
			$a = @split('\|', $fd); /* Split on NULL char */
			//$a = explode("\|", $fd);
			$this->hits = intval($a[0]);
			$this->data = $a[1];
		} else {
			$this->hits = intval(fread($file_desc, filesize($this->filename)));
		}
        fclose($file_desc);
    }
	
	/* Function for setting ancillary data */
	function SetData($data) {
		$this->data = $data;
	}

	/* Function for getting ancillary data */
	function GetData() {
		return $this->data;
	}

	/* Returns the count as an integer */
    function Get() {
        return $this->hits;
    }

	/* Increments count value and rewrites hits file */
    function Increment() {
        $this->hits++;
        $file_desc = @fopen($this->filename, 'w');
        if ($file_desc != FALSE) {
			if ($this->hasotherdata)
				fwrite($file_desc, $this->hits.'|'.$this->data);
			else
				fwrite($file_desc, $this->hits);
            fclose($file_desc);
        }
    }
};

/**
  HitsCounter class
  Handles downloading of files and updates to hit file.
*/
class HitsCounter {
	var $hf;
	var $filename;
	var $filehash;
	
	function HitsCounter($localfilename, $hfobject = NULL) {
		if (file_exists($localfilename)){
			$this->filename = $localfilename;
		}else{
			//cout "hola mundo";
			die('HitsCounter class (constructor): Supplied filename does not exist');
		}
		/* This might run slow, and we better find some cache method for it. */
		//$this->filehash = md5_file($localfilename);

		/* Decide whether we use supplied HitsFile object or the default */
		if (empty($hfobject)) {
			$this->hf = new HitsFile($localfilename.".hits", true);
		} else {
			$this->hf = $hfobject;
			$this->filehash = md5_file($localfilename);
		}

		/* Get hash from hits file instead of regenerating it every time. */
		if ( $this->hf->GetData() != '' ) {
			$this->filehash = $this->hf->GetData();
		} else {
			$this->filehash = md5_file($localfilename);
			$this->hf->SetData($this->filehash);
		}

		/* Check query string */
		if (isset($_GET['download'])) {
			if (strcmp($_GET['download'], $this->filehash)==0) {
				if (isset($_GET['resume']))
					$this->download_resume(basename($this->filename));
				else
					$this->download(basename($this->filename));
			}
		}
	}
	/**
	  download
	  Sends the file to the client (browser, user-agent, whatever you like to call it) and
	  increments the hit counter.
	*/
	function download($clientfilename) {
		@set_time_limit(0);
	
		$chunksize = 1*(1024*1024); // how many bytes per chunk 
		$buffer = ''; 
		$handle = fopen($this->filename, 'rb'); 
		if ($handle === false) {
			header("Content-Type: text/html");
			die('HitsCounter class: Could not open '.$this->filename.'!');
		} 

		header("Content-Type: application/octet-stream");
		header('Content-Disposition: attachment; filename="' . $clientfilename . '"');
		header("Content-Description: ".trim(htmlentities($clientfilename)));
	    header("Transfer-Encoding: binary");
	    header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Connection: close");
		header("Content-Length: ".filesize($this->filename));

		while (!feof($handle)) { 
			$buffer = fread($handle, $chunksize); 
			print $buffer; 
			if (connection_aborted()) break;
		}
		if (!connection_aborted()) $this->hf->Increment();
		@fclose($handle); 
	}


	/**
	  download
	  Sends the file to the client (browser, user-agent, whatever you like to call it) and
	  increments the hit counter if the download was successfull.
	  Supports resuming of downloads.
	*/
	function download_resume($clientfilename) {
		@set_time_limit(0);

		$size=filesize($this->filename);
		$fh=fopen($this->filename, "rb");
		if ($handle === false) {
			header("Content-Type: text/html");
			die('HitsCounter class: Could not open '.$this->filename.'!');
		}

		header("Content-Type: application/octet-stream");
		header('Content-Disposition: attachment; filename="' . $clientfilename . '"');
		header("Content-Description: ".trim(htmlentities($clientfilename)));
	    header("Accept-Ranges: bytes");
	    header("Transfer-Encoding: binary");
	    header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Connection: close");

		// check if http_range is sent by browser (or download manager)
		$httprange = getenv("HTTP_RANGE");
		if($httprange !== false) { // if yes, download missing part
			header("HTTP/1.1 206 Partial Content");
			$httprange = eregi_replace("^bytes=", "", $httprange);
			$from = eregi_replace("-$", "", $httprange);
			$to=$size-1;
			header("Content-Range: bytes $from-$to/$size");
			$new_length=$to-$from;
			header("Content-Length: $new_length");
			fseek($fh, $httprange);
		} else { //if not, download whole file
			$to=$size-1;
			header("Content-Range: bytes 0-$to/$size");
			header("Content-Length: ".$to);
		}
		$buffer = '';
		while (!feof($fh)) {
			$buffer = fread($fh, 2048);
			print $buffer;
			if (connection_aborted()) break;
		}
		if (!connection_aborted()) $this->hf->Increment();
		@fclose($fh);
	}

	/**
	  printdownloadlink
	  Call with $showhits set to a string to localize (default is false and will print e.g. " (20 hits)" ).
	  If $title is empty the basename of the filename is used.
	*/
	function printdownloadlink($title = '', $showhits = false, $allowresume = false) {
		echo '<a href="?download='.$this->filehash.($allowresume?'&resume=yes':'').'">' .
			(empty($title) ? basename($this->filename) : $title) .
			'</a>';
		if ($showhits === true) {
			echo ' (' . $this->hf->Get() . ' hits)';
		} elseif (is_string($showhits) and !empty($showhits)) {
			echo ' (' . $this->hf->Get() . ' $showhits)';
		}
	}

	/**
	  printcount
	  Prints out the hitcount for the file.
	  Just calls the Get() on the associated hitsfile object.
	*/
	function printcount() {
		echo $this->hf->Get();
	}
};

?>