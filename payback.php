<?php
/**
 * Mi Tienda Pagadito 1.2 (API PHP)
 *
 * Es un ejemplo de plataforma de e-commerce, que realiza venta de productos
 * electrónicos, y efectúa los cobros utilizando Pagadito, a través de la API.
 *
 * payback.php
 *
 * Este script recibe la redirección desde Pagadito una vez la transacción ha
 * sido finalizada. Se comunica con Pagadito a través de la API y consulta el
 * estado de la transacción.
 *
 * LICENCIA: Éste código fuente es de uso libre. Su comercialización no está
 * permitida. Toda publicación o mención del mismo, debe ser referenciada a
 * su autor original Pagadito.com.
 *
 * @author      Pagadito.com <soporte@pagadito.com>
 * @copyright   Copyright (c) 2017, Pagadito.com
 * @version     1.2
 * @link        https://dev.pagadito.com/index.php?mod=docs&hac=wspg
 */

/**
 * Se incluye el script config.php que contiene las constantes de conexión.
 * También se incluye la API Pagadito.php para realizar la conexión con
 * Pagadito.
 */
require_once('config.php');
require_once('lib/Pagadito.php');

if (isset($_GET["token"]) && $_GET["token"] != "") {
    /*
     * Lo primero es crear el objeto Pagadito, al que se le pasa como
     * parámetros el UID y el WSK definidos en config.php
     */
    $Pagadito = new Pagadito(UID, WSK);
    /*
     * Si se está realizando pruebas, necesita conectarse con Pagadito SandBox. Para ello llamamos
     * a la función mode_sandbox_on(). De lo contrario omitir la siguiente linea.
     */
    if (SANDBOX) {
        $Pagadito->mode_sandbox_on();
    }
    /*
     * Validamos la conexión llamando a la función connect(). Retorna
     * true si la conexión es exitosa. De lo contrario retorna false
     */
    if ($Pagadito->connect()) {
        /*
         * Solicitamos el estado de la transacción llamando a la función
         * get_status(). Le pasamos como parámetro el token recibido vía
         * GET en nuestra URL de retorno.
         */
        if ($Pagadito->get_status($_GET["token"])) {
            /*
             * Luego validamos el estado de la transacción, consultando el
             * estado devuelto por la API.
             */
            switch($Pagadito->get_rs_status())
            {
                case "COMPLETED":
                    /*
                     * Tratamiento para una transacción exitosa.
                     */ ///////////////////////////////////////////////////////////////////////////////////////////////////////
                    $msgPrincipal = "Su transacción fue exitosa";
                    $msgSecundario = '
                    Gracias por comprar con Pagadito.<br />
                    NAP(N&uacute;mero de Aprobaci&oacute;n Pagadito): <label class="respuesta">' . $Pagadito->get_rs_reference() . '</label><br />
                    Fecha Respuesta: <label class="respuesta">' . $Pagadito->get_rs_date_trans() . '</label><br /><br />';
                    break;
                
                case "REGISTERED":
                    
                    /*
                     * Tratamiento para una transacción aún en
                     * proceso.
                     */ ///////////////////////////////////////////////////////////////////////////////////////////////////////
                    $msgPrincipal = "Atenci&oacute;n";
                    $msgSecundario = "La transacci&oacute;n fue cancelada.<br /><br />";
                    break;
                
                case "VERIFYING":
                    
                    /*
                     * La transacción ha sido procesada en Pagadito, pero ha quedado en verificación.
                     * En este punto el cobro xha quedado en validación administrativa.
                     * Posteriormente, la transacción puede marcarse como válida o denegada;
                     * por lo que se debe monitorear mediante esta función hasta que su estado cambie a COMPLETED o REVOKED.
                     */ ///////////////////////////////////////////////////////////////////////////////////////////////////////
                    $msgPrincipal = "Atenci&oacute;n";
                    $msgSecundario = '
                    Su pago est&aacute; en validaci&oacute;n.<br />
                    NAP(N&uacute;mero de Aprobaci&oacute;n Pagadito): <label class="respuesta">' . $Pagadito->get_rs_reference() . '</label><br />
                    Fecha Respuesta: <label class="respuesta">' . $Pagadito->get_rs_date_trans() . '</label><br /><br />';
                    break;
                
                case "REVOKED":
                    
                    /*
                     * La transacción en estado VERIFYING ha sido denegada por Pagadito.
                     * En este punto el cobro ya ha sido cancelado.
                     */ ///////////////////////////////////////////////////////////////////////////////////////////////////////
                    $msgPrincipal = "Atenci&oacute;n";
                    $msgSecundario = "La transacci&oacute;n fue denegada.<br /><br />";
                    break;
                
                case "FAILED":
                    /*
                     * Tratamiento para una transacción fallida.
                     */
                default:
                    
                    /*
                     * Por ser un ejemplo, se muestra un mensaje
                     * de error fijo.
                     */ ///////////////////////////////////////////////////////////////////////////////////////////////////////
                    $msgPrincipal = "Atenci&oacute;n";
                    $msgSecundario = "La transacci&oacute;n no fue realizada.<br /><br />";
                    break;
            }
        } else {
            /*
             * En caso de fallar la petición, verificamos el error devuelto.
             * Debido a que la API nos puede devolver diversos mensajes de
             * respuesta, validamos el tipo de mensaje que nos devuelve.
             */
            switch($Pagadito->get_rs_code())
            {
                case "PG2001":
                    /*Incomplete data*/
                case "PG3002":
                    /*Error*/
                case "PG3003":
                    /*Unregistered transaction*/
                default:
                    /*
                     * Por ser un ejemplo, se muestra un mensaje
                     * de error fijo.
                     */ ///////////////////////////////////////////////////////////////////////////////////////////////////////
                    $msgPrincipal = "Error en la transacci&oacute;n";
                    $msgSecundario = "La transacci&oacute;n no fue completada.<br /><br />";
                    break;
            }
        }
    } else {
        /*
         * En caso de fallar la conexión, verificamos el error devuelto.
         * Debido a que la API nos puede devolver diversos mensajes de
         * respuesta, validamos el tipo de mensaje que nos devuelve.
         */
        switch($Pagadito->get_rs_code())
        {
            case "PG2001":
                /*Incomplete data*/
            case "PG3001":
                /*Problem connection*/
            case "PG3002":
                /*Error*/
            case "PG3003":
                /*Unregistered transaction*/
            case "PG3005":
                /*Disabled connection*/
            case "PG3006":
                /*Exceeded*/
            default:
                /*
                 * Aqui se muestra el código y mensaje de la respuesta del WSPG
                 */
                $msgPrincipal = "Respuesta de Pagadito API";
                $msgSecundario = "
                        COD: " . $Pagadito->get_rs_code() . "<br />
                        MSG: " . $Pagadito->get_rs_message() . "<br /><br />";
                break;
        }
    }
} else {
    /*
     * Aqui se muestra el mensaje de error al no haber recibido el token por medio de la URL.
     */
    $msgPrincipal = "Atenci&oacute;n";
    $msgSecundario = "No se recibieron los datos correctamente.<br /> La transacci&oacute;n no fue completada.<br /><br />";
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
                           <h2> Respuesta del Pago con Pagadito </h2><br>
                    <img src="images/bolsa.png"><br>
                    <label><?= $msgPrincipal ?></label><br />
                    <label><?= $msgSecundario ?></label>
            </div>
							
							<div class="card-body">
								<center>
								<div><a href="logout.php"><img src="images/close.png"></a></div><br><br><br>
								<div class="card-title">Cuentas Bancarias</div>
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