<?php 
$Codigo=$_REQUEST['Codigo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>TADESA - Noticias</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="RanGO Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/blog_post_styles.css">
<link rel="stylesheet" type="text/css" href="styles/blog_post_responsive.css">
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
                <li><a href="index.php">Inicio</a></li>
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
				<li class="menu_mm"><a href="index.php">Inicio</a></li>
				<li class="menu_mm"><a href="about.php">Quiénes somos</a></li>
				<li class="menu_mm"><a href="places.php">Instalaciones</a></li>
				<li class="menu_mm"><a href="contributions.php">Donaciones</a></li>
				<li class="menu_mm"><a href="contact.php">Contáctanos</a></li>
			</ul>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		
		<div class="container">
			<div class="row">
			<?php
					include("conexion.php");
					$query = "SELECT * FROM Noticias WHERE CodNoticia ='$Codigo'";
              $resultado= $conexion->query($query);
							$row = $resultado->fetch_assoc();
							?>
				<div class="col-lg-8">
					
					<!-- Blog Post -->

					<div class="blog_container">

						<!-- Image -->
						<div class="blog_post_image">
						<img alt="<?php echo $row['Nombre']; ?>" class="img-responsive" src="data:image/jpg;base64,<?php echo base64_encode($row['Foto']); ?>" >
						</div>

						<!-- Blog Post Body -->
						<div class="blog_post_body">
							<div class="blog_post_date"><?php echo $row['FecNoticia']; ?></div>
							<h2 class="blog_post_title"><?php echo $row['Titulo']; ?></h2>
							<?php echo $row['Descripcion']; ?>
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
<script src="js/blog_post_custom.js"></script>
</body>

</html>