<?php
require("conexion.php");
$gen = mysqli_real_escape_string($conexion, $_POST["Genero"]);
$query = 'SELECT * FROM categorias WHERE Genero = "'.$gen.'"';
$result = mysqli_query($conexion, $query);
while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
{
	echo '<option value="' .$row["Nombre"]. '">' .$row["Nombre"]. '</option>';
}
mysqli_close($con);
?>
