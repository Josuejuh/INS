<?php
  include ("conexion.php");
  $Codigo=$_REQUEST['Codigo'];
  $titulo= $_POST ['titulo'];
  $fecha= $_POST ['fecha'];
  $descripcion=$_POST['descripcion'];
  $img1= addslashes (file_get_contents($_FILES['img1']['tmp_name']));
  if ($img1=="") {
    $query1="UPDATE Noticias SET FecNoticia='$fecha',Titulo='$titulo',Descripcion='$descripcion' WHERE CodNoticia ='$Codigo'";
    $resultado1= $conexion->query($query1);
    if ($resultado1) {
      header("Location: MNoticias.php");
    }
  else {
    echo "no se modifico";
  }
  }
  else {
    $query2="UPDATE Noticias SET FecNoticia='$fecha',Titulo='$titulo',Descripcion='$descripcion', Foto='$img1' WHERE CodNoticia ='$Codigo'";
    $resultado2= $conexion->query($query2);
    if ($resultado2) {
      header("Location: MNoticias.php");
    }
  else {
    echo "no se modifico";
  }
  }
 ?>