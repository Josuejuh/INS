<?php 
include("conexion.php");
@$num_pag=$_REQUEST['pag'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>TADESA</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="RanGO Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/blog_styles.css">
<link rel="stylesheet" type="text/css" href="styles/blog_responsive.css">
</head>

<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header d-flex flex-row justify-content-end align-items-center trans_200">
		
		<!-- Logo -->
		<div class="logo mr-auto">
			<img src="images/talleres.png" width="100" height="100"> 
		</div>

		<!-- Navigation -->
		<nav class="main_nav justify-self-end text-right">
            <ul>
                <li class="active"><a href="#">Inicio</a></li>
                <li><a href="about.php">Quiénes somos</a></li>
                <li><a href="places.php">Instalaciones</a></li>         
                <li><a href="contributions.php">Donaciones</a></li>
                <li><a href="contact.php">Contáctanos</a></li>
            </ul>
			</nav>
			
					<!-- Hamburger -->
		<div class="hamburger_container bez_1">
			<i class="fas fa-bars trans_200"></i>
		</div>
		
	</header>

<!-- Menu -->

<div class="menu_container">
		<div class="menu menu_mm text-right">
			<div class="menu_close"><i class="far fa-times-circle trans_200"></i></div>
			<ul class="menu_mm">
				<li class="menu_mm active"><a href="#">Inicio</a></li>
				<li class="menu_mm"><a href="about.php">Quiénes somos</a></li>
				<li class="menu_mm"><a href="places.php">Instalaciones</a></li>
				<li class="menu_mm"><a href="contributions.php">Donaciones</a></li>
				<li class="menu_mm"><a href="contact.php">Contáctanos</a></li>
			</ul>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
		<div class="home_background prlx" style="background-image:url(images/portada.jpg)"></div>
		</div>
		
		<div class="home_title">
			<h2>Noticias</h2>
			<div class="next_section_scroll">
				<div class="next_section nav_links" data-scroll-to=".blog">
					<i class="fas fa-chevron-down trans_200"></i>
					<i class="fas fa-chevron-down trans_200"></i>
				</div>
			</div>
		</div>
	
	</div>

	<!-- Blog -->
	
	<div class="blog">
		
		<div class="container">
			<div class="row">
				
				<div class="col-lg-12">
					
					<div class="blog_container">
						<div class="post_container" data-masonry='{ "itemSelector": ".card", "gutter": 30 }'>
						<?php 
	$reg_pag=2;

	@$num_pag=$_REQUEST['pag'];
	if (is_numeric($num_pag)) {
		$inicio=($num_pag-1)*$reg_pag;
	}
	else {
		$inicio=0;
	}
	$resultado=mysqli_query($conexion, "SELECT * from Noticias ORDER BY FecNoticia ASC");
              $registros=mysqli_num_rows($resultado);
                $result=mysqli_query($conexion, " SELECT CodNoticia, FecNoticia, Titulo, Foto, SUBSTRING( Descripcion, 1, 200 ) AS Descripcion
								FROM Noticias ORDER BY FecNoticia ASC limit $inicio, $reg_pag ");
                $can_pag=($registros/$reg_pag);
                if ($registros==0) {
                  echo "No se han encontrado noticias para mostrar";
                  }
                while($fila=mysqli_fetch_array($result))
                {
									?>
									
	
							<div class="card trans_200">
							<img class="card-img-top" src="data:image/jpg;base64,<?php echo base64_encode($fila['Foto']); ?> ">
								<div class="card-body">
									<div class="card-header"><?php echo $fila['FecNoticia']; ?></div>
									<div class="card-title"><a href="index_new.php?Codigo=<?php  echo $fila['CodNoticia']; ?>"><?php echo $fila['Titulo']; ?></a></div>
									<div class="card-text"><?php echo $fila['Descripcion']; ?>
									</div>
								</div>
							</div>
							<?php
								}
	?>
						</div>
					</div>
						

					<div class="row">
            <?php
						if (!$num_pag){
							$num_pag = "1";
						}
            $minicio=($num_pag)*$reg_pag;
            if ($minicio>$registros) {
            	$minicio=$registros;
            }
            ?>
              <div class="col-md-4 col-sm-4 items-info">Mostrando <?php echo $minicio; ?> de <?php echo $registros; ?></div>
              <div class="col-md-8 col-sm-8">
                <ul class="pagination pull-right">
                <?php
                @$pagan=($num_pag-1);
                if ($num_pag>"1") {
                ?>
                  <li><a href="index.php?pag=<?php echo $pagan; ?>">&laquo;</a></li>
                  <?php
                  }
                  ?>
                  <li>

                  <?php

        for ($i=1; $i <=$can_pag; $i++) {

                echo "<a href = index.php?pag=$i>$i</a> ";
				}
    ?>
                  </li>
                  <?php
                @$pagde=($num_pag+1);
                if ($num_pag<$can_pag) {

                ?>
                  <li><a href="index.php?pag=<?php echo $pagde; ?>">&raquo;</a></li>
                  <?php
                }
                ?>
                </ul>
              </div>
            </div>

				</div>

			</div>
		</div>
		
	</div>
<!-- Footer -->

<footer class="footer">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-4">

					<!-- Footer Intro -->
					<div class="footer_intro">

						<!-- Logo -->
						<div class="logo footer_logo">
							<a href="#">Tadesa</a>
						</div>

						<p>Talleres deportivos TADESA por un mejor El Salvador.</p>
						
						<!-- Social -->
						<div class="footer_social">
							<ul>
								<li><a href="https://www.facebook.com/Talleres-Deportivos-Salvadore%C3%B1os-Tadesa-183098068375455/"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>
						
						<!-- Copyright -->
						<div class="footer_cr">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados</a>
						</div>

					</div>

				</div>
				
				<!-- Footer Menu -->
				<div class="col-lg-2">
				<div class="footer_col"></div>
				</div>
				<div class="col-lg-2">
				<div class="footer_col"></div>
				</div>
				<div class="col-lg-2">
				<div class="footer_col"></div>
				</div>

				<div class="col-lg-2">

					<div class="footer_col">
						<div class="footer_col_title">Menu</div>
						<ul>
						<li class="active"><a href="#">Inicio</a></li>
						<li><a href="about.php">Quiénes somos</a></li>
						<li><a href="places.php">Instalaciones</a></li>								
						<li><a href="contributions.php">Donaciones</a></li>
						<li><a href="contact.php">Contáctanos</a></li>
						</ul>
					</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/masonry/masonry.js"></script>
<script src="js/blog_custom.js"></script>
</body>

</html>