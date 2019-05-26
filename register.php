<?php
include ("conexion.php");

if (isset($_POST['submit'])){
  $nombre= $_POST ['nombre'];
  $apellido= $_POST ['apellidos'];
  $correo=$_POST['email'];
  $usuario= $_POST ['usuario'];
  $clave= $_POST ['password'];
  $clave1= $_POST ['cfmPassword'];
  $nit= $_POST['NIT'];
  $telefono=$_POST ['telefono'];
  $codPais=$_POST['Pais'];
  
  $query = "SELECT * FROM Personas WHERE (Correo = '$correo')";
  $consulta = "SELECT * FROM Usuarios WHERE (Usuario = '$usuario')";
  $resultado = $conexion->query($query);
  $resultado1 = $conexion->query($consulta);

  if($clave==$clave1){
if (mysqli_num_rows($resultado)>0)
{
echo '<script language="javascript">alert("Su correo ya esta registrado");</script>';
} else if(mysqli_num_rows($resultado1)>0 && mysqli_num_rows($resultado) == 0){
  echo '<script language="javascript">alert("Ese nombre de usuario no esta disponible");</script>';
}else {
   $query = "INSERT INTO Personas (Nombre, Apellido, Correo,Nit,Telefono,CodPais) VALUES ('$nombre','$apellido','$correo','$nit','$telefono','$codPais')";
   $resultado = $conexion->query($query);
   if ($resultado) {
      $query="SELECT CodPersona  FROM Personas Order by CodPersona desc limit 1";
      $resultado= $conexion->query($query);
      while ($row = $resultado->fetch_assoc()){
        $persona = $row['CodPersona'];
        $query = "INSERT INTO Usuarios (Tipo,Usuario,Clave,CodPersona) VALUES (1,'$usuario',MD5('$clave'),'$persona')";
        $resultado= $conexion->query($query);
        if ($resultado) {
          echo'<script type="text/javascript">
         alert("Se ha registrado en TADESA, por favor inicie sesión");
         window.location.href="login.php";
         </script>';
        }else{
         echo'<script type="text/javascript">
         alert("Hubo un error");</script>';
        }
}
   }
}
  }else{
    echo '<script language="javascript">alert("Las contraseñas no coiciden");</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>TADESA - Donaciones</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="RanGO Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/portfolio_styles.css">
<link rel="stylesheet" type="text/css" href="styles/portfolio_responsive.css">
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
				
					<div class="super_container">
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

	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/portada.jpg)"></div>
		</div>
		
		<div class="home_title">
			<h2>Donaciones</h2>
			<div class="next_section_scroll">
				<div class="next_section nav_links" data-scroll-to=".portfolio">
					<i class="fas fa-chevron-down trans_200"></i>
					<i class="fas fa-chevron-down trans_200"></i>
				</div>
			</div>
		</div>
	</div>

<!-- Portfolio Vergas -->
	<div class="row">
				<div class="col">
					
					<div class="portfolio_items product-grid">

						<!-- Portfolio Item -->
						<div class="card branding">
							<div class="card-body">
							<form  action="register.php" method="post" class="form-register">
								<h2 class="form__titulo">Registrarse</h2>
									<input name="nombre" type="text" placeholder="Nombres" required="required" data-error="Se requiere del nombre" class="input-48">
									<input name="apellidos" type="text" placeholder="Apellidos" required="required" data-error="Se requiere del apellido." class="input-48">
									<input name="telefono" type="text" placeholder="Teléfono" required="required" data-error="Favor dejar un número de contaco." class="input-48">
									<input name="NIT" type="text" placeholder="NIT / Otro documento"  required="required" data-error="Digite el NIT si posee sin guiones." class="input-48">
									<input name="email"  type="email" placeholder="Correo" required="required" data-error="Favor escribir un correo válido." class="input-100">

									<select class="input-100" id="Pais" name="Pais" required>
			                        <?php
                                    include('conexion.php');
                                    $query = "SELECT * FROM Paises";
                                    $result = mysqli_query($conexion, $query);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        echo '<option value="' .$row["CodPais"]. '">' .$row["Pais"]. '</option>';
                                    }
                                    mysqli_close($conexion);
                                    ?>
                                </select>

									<input name="usuario" type="text" placeholder="Usuario" required="required" data-error="Se requiere de un nombre de usuario" class="input-100">
									<input name="password" type="password" placeholder="Contraseña" required="required" data-error="Se requiere del una contraseña" class="input-48">
									<input name="cfmPassword" type="password" placeholder="Repita la contraseña" required="required" data-error="Se requiere que repita la contraseña" class="input-48">
									<center><input name="submit" type="submit" value="Registrar" class="btn-enviar"></center>
									<p class="form__link">¿Ya tienes una cuenta? <a href="login.php">Ingresa aquí</a></p>		
							</form>
							</div>

							<div class="card-body">
							<center><div class="card-title">Cuentas Bancarias</div>
								<div class="card-header">Scotiabank		-> 15-40-008198</div></center>
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
							<li><a href="index.php">Inicio</a></li>
							<li><a href="about.php">Quiénes somos</a></li>
							<li><a href="places.php">Instalaciones</a></li>								
							<li  class="active"><a href="#">Donaciones</a></li>
							<li><a href="contact.php">Contáctanos</a></li>
							</ul>
						</div>
		</footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery-validate.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/portfolio_custom.js"></script>
</body>

</html>