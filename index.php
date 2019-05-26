<!DOCTYPE html>
<html lang="en">
<head>
<title>TADESA</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="TADESA Project">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/slick-1.8.0/slick.css">
<link href="plugins/icon-font/styles.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="stylesheet" type="text/css" href="styles/slicebox.css" />
<link rel="stylesheet" type="text/css" href="styles/demo.css" />
<link rel="stylesheet" type="text/css" href="styles/custom.css" />
<script type="text/javascript" src="js/modernizr.custom.46884.js"></script>

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
			<div class="home_background prlx"></div>
		</div>
		
	<!-- Wrapper -->
	<div class="wrapper">
	<?php
/*include ("conexion.php");

$query = "SELECT * FROM Noticias ORDER BY CodNoticia DESC";
$result = $conexion->query($query);

if(!mysqli_num_rows($result)){
echo "Todavía no ha sido publicada ninguna noticia";
} else {

while($row = mysqli_fetch_assoc($result)){
	$imagen = $row["Foto"];
	echo "<img src='".$imagen."'>";
	 
}
}*/
?>
				<br><br><br><br><br>
				<ul id="sb-slider" class="sb-slider">
					<li>
						<a><img src="images/instalacion1.jpg"/></a>
						<div class="sb-description">
							<h3>Complejo Deportivo Municipal de Santiago Texacuangos</h3>
							<h4>Teléfono: +503 7308-8614</h4>
							<h4>Dirección: Sede Complejo Deportivo Municipal de Santiago Texacuangos, 1 1/2 kilómetros después del casco urbano carretera panorámica.</h4>
						</div>
					</li>
					<li>
						<a><img src="images/instalacion2.jpg"/></a>
					</li>
					<li>
						<a><img src="images/instalacion3.jpg"/></a>
					</li>
				</ul>

				<div id="shadow" class="shadow"></div>

				<div id="nav-arrows" class="nav-arrows">
					<a href="#">Next</a>
					<a href="#">Previous</a>
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
<script src="plugins/slick-1.8.0/slick.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.slicebox.js"></script>
		<script type="text/javascript">
			$(function() {
				
				var Page = (function() {

					var $navArrows = $( '#nav-arrows' ).hide(),
						$shadow = $( '#shadow' ).hide(),
						slicebox = $( '#sb-slider' ).slicebox( {
							onReady : function() {

								$navArrows.show();
								$shadow.show();

							},
							orientation : 'r',
							cuboidsRandom : true
						} ),
						
						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							// add navigation events
							$navArrows.children( ':first' ).on( 'click', function() {

								slicebox.next();
								return false;

							} );

							$navArrows.children( ':last' ).on( 'click', function() {
								
								slicebox.previous();
								return false;

							} );

						};

						return { init : init };

				})();

				Page.init();

			});
		</script>
</body>

</html>