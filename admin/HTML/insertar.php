<?php
$usuario=$_POST["usuario"];
$clave=$_POST["clave"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$correo=$_POST["correo"];
include("conexion.php");
	mysqli_query($conexion, "INSERT INTO usuario values ('$usuario','$clave','$nombre','$apellido','$correo','2')");
	mysqli_close($conexion); 
	header("Location: Registro.php");
?>