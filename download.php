<?php
	include "head.php";
	require_once('hitscounter.php');
	$capsid_mesh_win = new HitsCounter('./capsid_mesh_win_v1.0.zip');
	$capsid_mesh_linux = new HitsCounter('./capsid_mesh_linux_v1.0.tar.gz');
?>
<!--<div class="container-narrow">-->
<div class="container">
	<div class="content">
		<div class="page-header">
		<h1>Download </h1>
		</div>
		<div class="row-fluid">
		<div class="span12">
		<h4 id="releases">Releases</h4>
		<table class="table">
			<thead>
			<tr>
				<th style="text-align: left">Version</th>
				<th>Date</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tr>
				<td>Release notes: <!--<a href="./software/releases/notes_v1.0.php">-->v1.0<!--</a>--></td>
				<td><span class="entry-date"><time datetime="2016-03-14 T00:00:00+00:00">March 14, 2016</time></span></td>
				<td><a href="./releases/capsid_mesh_win_v1.0.zip">Win</a></td>
				<!--<td><?php //$capsid_mesh_win->printdownloadlink('Win', true); ?></td>-->
				<td><a href="./releases/capsid_mesh_linux_v1.0.tar.gz">Linux</a></td>
				<!--<td><?php //$capsid_mesh_linux->printdownloadlink('Linux', true); ?></td>-->
				<!--<td><a href="https://github.com/pachterlab/kallisto/archive/v0.42.2.1.tar.gz">Source</a></td>-->
			</tr>
		</table>
		<h4 id="transcriptomes">PDB files for viruses</h4>
		<p>Commonly used PDB files for viruses are available <a href="http://viperdb.scripps.edu/">here</a>.</p>
		<h4 id="licence">Licence</h4>
		<p>Capsid Mesh is distributed under a non-commercial <a href="license.php">license</a>. 
		<!--For commercial use, please contact Terri Sale at the Office of Technology Licensing, UC Berkeley, 2150 Shattuck Avenue, Suite 510, Berkeley, CA 94720-1620, (510) 643-4219, terri.sale@berkeley.edu.-->
		</p>
		</div>
		</div>
	</div>
</div>
<?php
	include "footer.php";
?>