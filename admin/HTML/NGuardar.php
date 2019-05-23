<?php
  include ("conexion.php");
  $titulo= $_POST ['titulo'];
  $fecha= $_POST ['fecha'];
  $descripcion=$_POST['descripcion'];
  $img1= addslashes (file_get_contents($_FILES['img1']['tmp_name']));

    $query="INSERT INTO Noticias (FecNoticia, Titulo, Descripcion, Foto) VALUES ('$fecha','$titulo','$descripcion','$img1')";
    $resultado= $conexion->query($query);

    if ($resultado) {
      header("Location: MNoticias.php");
    }
  else {
    echo "no se inserto" . mysqli_error($conexion);
  }

 ?>
