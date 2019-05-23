<?php
$usuario=$_POST["usu"];
$clave=$_POST["clave"];


if ($usuario=="admin" and $clave=="admin")
 {
 	header("Location Inicio.php");
}
else
	{

    header ("Location: Inicio.php");
}


?>