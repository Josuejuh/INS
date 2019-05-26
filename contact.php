<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


enviarEmail();

function enviarEmail(){
    if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['asunto']) && isset($_POST['comentarios'])){
        //mandar correo
        $nombre = $_POST['nombre'];

        $email = $_POST['correo'];

        $porque = $_POST['asunto'];

        $comentarios = $_POST['comentarios'];

        $mensaje = "";

        $mensaje .= "Enviado el " . date('d/m/Y', time()); 

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'formtadesa@gmail.com';                 // SMTP username
            $mail->Password = 'Tadesa19';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('formtadesa@gmail.com', 'Formulario TADESA');
            $mail->addAddress('josueurquilla23@gmail.com', 'TADESA');     // Add a recipient

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'TADESA FORMULARIO';
            $mail->Body    = '
            <html>
                                    <head>
                                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
                                    </head>
                                    <body>
                                         <h2>Haz recibido un mensaje de la página web TADESA</h2>
                                         <p> Este mensaje fue enviado por: '.$nombre. '</p>
                                         <p> El motivo del correo es por: '.$porque. '</p>
                                         <p> Comentarios: '.$comentarios. '</p>
                                         <p>'.$mensaje. '</p>
                                         <p><br><br> Puedes ponerte en contacto con la persona al e-mail: '.$email.'</p>
                                         <hr>
                                         
                                    </body>
                                    </html> <br />';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo  '<script language="javascript">alert("Mensaje enviado");</script>'; 
        } catch (Exception $e) {
			$error = $mail->ErrorInfo;
            echo '<script language="javascript">alert("Error en el envio");</script>';
        }

    }else{
        return;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>TADESA - Contáctanos</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="RanGO Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
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
					<li class="active"><a href="#">Contáctanos</a></li>
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
				<li class="menu_mm active"><a href="#">Contáctanos</a></li>
			</ul>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/portada.jpg)"></div>
		</div>
		
		<div class="home_title">
			<h2>Contáctanos</h2>
			<div class="next_section_scroll">
				<div class="next_section nav_links" data-scroll-to=".contact">
					<i class="fas fa-chevron-down trans_200"></i>
					<i class="fas fa-chevron-down trans_200"></i>
				</div>
			</div>
		</div>
	
	</div>

	<!-- Contact -->

	<div class="contact">
		
		<div class="container">
			
			<!-- Google Map Container -->

			<div class="row">
				<div class="col">
					<div id="google_map">
						<div class="map_container">
						<div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3877.377276427222!2d-89.10611628465361!3d13.634799503666251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f633608006f11bd%3A0x284d255f92ba9cd1!2sComplejo+Deportivo+Municipal+Santiago+Texacuangos!5e0!3m2!1ses-419!2ssv!4v1558566185501!5m2!1ses-419!2ssv" width="1600px" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe><div>
						</div>
					</div>
				</div>
			</div>

			<div class="row contact_row">
				<div class="col-lg-8">
					
					<!-- Reply -->

					<div class="reply">
						
						<div class="reply_title">Dejanos un mensaje</div>
						<div class="reply_form_container">
							
							<!-- Reply Form -->

							<form action="contact.php" method="post" >
								<div>
									<input name="nombre" id="reply_form_name" class="input_field reply_form_name" type="text" placeholder="Nombre" required="required" data-error="Se requiere del nombre..">
									<input name="correo" id="reply_form_email" class="input_field reply_form_email" type="email" placeholder="Correo" required="required" data-error="Favor escribir un correo valido.">
									<input name="asunto" id="reply_form_subject" class="input_field reply_form_subject" type="text" placeholder="Asunto" required="required" data-error="Asunto es requerido.">
									<textarea name="comentarios" id="reply_form_message" class="text_field reply_form_message" name="message"  placeholder="Mensaje" rows="4" required data-error="Por favor, escribe un mensaje."></textarea>
									</div>
                                <div>			
									<button id="reply_form_submit" type="submit" class="reply_submit_btn trans_300"> Enviar </button>
								</div>

							</form>

						</div>
					</div>

				</div>

				<div class="col-lg-4">
					
					<!-- Contact Info -->

					<div class="contact_info">

						<div class="contact_title">Información de contacto</div>
						
						<div class="contact_info_container">

							<div class="logo contact_logo">
								<a href="#">Tadesa</a>
							</div>
							<p>Talleres deportivos TADESA por un mejor El Salvador.</p>

							<div class="address_container clearfix">
								<div class="contact_info_icon">i</div>
								<div class="contact_info_content">
									<ul>
										<li class="address">Urbanización Nuevo Lourdes Poniente Primera etapa, block ff senda los Calistemos #6.</li>
										<li class="phone">+503 2325-0172</li>
										<li class="email">tadesa2019@gmail.com</li>
									</ul>									
								</div>
							</div>
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
							<li><a href="contributions.php">Donaciones</a></li>
							<li  class="active"><a href="#">Contáctanos</a></li>
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/CustomGoogleMapMarker.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/contact_custom.js"></script>
<script src="js/conecta.js"></script>
</body>

</html>