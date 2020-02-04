<?php
	include "head.php";
?>
	<div class="container">
		<div class="jumbotron">
			<h2 align="center">CapsidMesh: refined volumetric mesh representation of icosahedral viral capsids for the
study of their macromolecular properties.</h2>
			<!--<h1 align="center"><img alt="Capsid Mesh" src="imagenes/logo4.png"></h1>-->
			<div class="container-fluid">
				<!-- Carousel container -->
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active></li>
						<li data-target="#myCarousel" data-slide-to="1""></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					<!-- Content -->
					<div class="carousel-inner" role="listbox">
						<!-- Slide 1 -->
						<div class="item active">
							<img src="imagenes/logo4.png" alt="Logo">
						</div>
						<!-- Slide 2 -->
						<div class="item">
							<img src="imagenes/full_capsid_01_carousel_transparent.png" alt="CCMV ATOMS">
						</div>
						<!-- Slide 3 -->
						<div class="item">
							<img src="imagenes/T3_1cwp_full_fold_2_04_carousel_transparent.png" alt="CCMV MESH">
						</div>
						<!-- Slide 4 -->
						<div class="item">
							<img src="imagenes/T3_1cwp_full_fold_5_00_carousel_transparent.png" alt="CCMV MESH">
						</div>
						<!-- Slide 5 -->
						<div class="item">
							<img src="imagenes/T3_1cwp_full_fold_5_01_carousel_transparent.png" alt="CCMV MESH">
						</div>
						<!-- Slide 6 -->
						<div class="item">
							<img src="imagenes/T3_1cwp_full_fold_5_07_carousel_transparent.png" alt="Displacement">
						</div>
						<!-- Slide 7 -->
						<div class="item">
							<img src="imagenes/T3_1cwp_full_fold_5_08_carousel_transparent.png" alt="von Mises">
						</div>
					</div>
					<!-- Previous/Next controls -->
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="icon-prev" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="icon-next" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
					</a>
					<!--<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
					</a>-->
				</div>
			</div>
			<p align="justify">This program was developed at the <a href="http://www.cimat.mx/">Centro de Investigaci&oacute;n en Matem&aacute;ticas, A.C. </a> in colaboration with the <a href="http://www.langebio.cinvestav.mx/">Centro de Investigaci&oacute;n y de Estudios Avanzados, M&eacute;xico.</a></p>
			<p>This program is written using the C programing language and can be used as a standalone 
		program or as an GiD Problem Type.</p>
		</div>
	</div>
<?php
	include "footer.php";
?>