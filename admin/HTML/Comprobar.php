<?php
$usu=$_POST["usu"];
$cla=$_POST["clave"];
include("conexion.php");
$result = mysqli_query($conexion,"SELECT * FROM Usuarios Where Clave= MD5('$cla') AND Tipo=1 AND Estado='A'");
while($fila = mysqli_fetch_array($result))
	{
  if ($fila["Usuario"]==$usu)
		{
			session_start();
			$_SESSION["Usuario"] =$fila["Usuario"];
      $_SESSION["Codigo"] =$fila["CodUsuario"];
			$_SESSION["Clave"] =$fila["Clave"];
      $_SESSION["Nivel"] =$fila["Tipo"];
			header ("Location: Inicio.php");
			exit;
		}
	}
if(@$_SESSION['Usuario'] == ""){
  header ("Location: ../");
}
?>
