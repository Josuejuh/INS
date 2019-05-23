<?php
  include ("conexion.php");
  $cod=$_REQUEST['Codigo'];

  $query="DELETE FROM Noticias WHERE CodNoticia ='$cod'";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: MNoticias.php");

  }
else {
  echo "no se elimino";
}
 ?>
