<?php
include ("conexion.php");
$sql="SELECT * FROM comentarios"; 
$r=mysqli_query($conexion,$sql);
$rcount=mysqli_num_rows($r);
echo $rcount;
 ?>
