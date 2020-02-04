<?php
	include "head.php";
?>
<div class="container">
	<div class="content">
		<div class="page-header">
			<h1>Getting Started</h1>
		</div>
		<div class="row-fluid">
		<div class="span12">
<p>The short tutorial below explains how to run <strong>Capsid Mesh</strong> using a small example distributed with the program. If you already know how to use <strong>Capsid Mesh</strong> but just want to get it quickly installed on your Windows/Linux OS, the easiest way to do so is:</p>

<h4 id="download">Download</h4>
	<p>The example/test distributed with <strong>Capsid Mesh</strong> is included with the binaries we distribute with the program:</p>
	<ul>
		<li>
			<p>For Win OS  download the <strong>Capsid Mesh</strong> bundle from <a href="./releases/capsid_mesh_win_v1.0.zip">here</a></p>
		</li>
		<li>
			<p>For Ubuntu  download the <strong>Capsid Mesh</strong> bundle from <a href="./releases/capsid_mesh_linux_v1.0.tar.gz">here</a></p>
		</li>
	</ul>
<h4 id="install">Install</h4>
<p>Uncompress the file capsid_mesh_win_v1.0.zip on win OS  or capsid_mesh_linux_v1.0.tar.gz on linux OS.</p>

<p><code>dir capsid_mesh</code></p>

<p>You should be able to see:</p>

<pre><code>..
data_in
results
temp
capsid_mesh.exe
chonps.atoms
config.conf
t3_cage.bin
</code></pre>

<h4 id="data_in">Input data files</h4>

<p><strong>Capsid Mesh</strong> needs a VDB file from <a href="http://viperdb.scripps.edu/">VIPERdb</a> the which has to be put in the folder <strong>data_in</strong></p>

<p>The setup is read through the file <strong>config.conf</strong>, and an important aspect to take careful is the T-number of the virus to be meshed.</p>

<pre><code>
#PDB_FILE_NAME 
1cwp
#T_NUMBER 
3
#RESOLUTION 
3
#SURFACE(1:vdw,2:sas)
2
#PROBE_RADIUS
3
<!--#MATERIALS(1:residues,2:aminoacids,3:atoms,4:any)
1-->
</code></pre>

<h4 id="run">Run</h4>

<p>To run <strong>Capsid Mesh</strong> execute capsid_mesh.exe</p>

<p><code>capsid_mesh.exe</code></p>

<h4 id="results">Results</h4>

<p>The results of a <strong>Capsid Mesh</strong> run are placed in the output directory <strong>results</strong>, and intermediate  files are generated in the output directory <strong>temp</strong>, this files can be discarded when the program finish</p>

<h4 id="results_pp_mesh">Results of capsid_mesh on example 1cwp</h4>

<p><code>capsid_mesh.exe</code> output:</p>
<pre><code> capsid_mesh.exe

                 CAPSID MESH: A program to generate viral capsid meshes suitable for FEA


         CAPSID MESH: RVGIAU construction
version                       : 1.0
file_name_in                  : data_in/1cwp.vdb
T_index_number                : 3
resolution                    : 3.00 Angstroms
enclosed volume by surface    : SAS
probe radius                  : 3.00 Angstroms
Van der Waals radii used
C                             : 1.78 Angstroms
H                             : 1.60 Angstroms
O                             : 1.60 Angstroms
N                             : 1.80 Angstroms
P                             : 1.83 Angstroms
S                             : 1.20 Angstroms
Generating viral capsid mesh...
Number of nodes               : 745300
Number of elements            : 660780
file_name_out_mesh            : results/1cwp_full.msh
Time Elapsed                  : 409.22 seconds
</code></pre>
		</div>
		</div>
	</div>
</div>
<?php
	include "footer.php";
?>