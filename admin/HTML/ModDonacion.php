<?php
  include ("conexion.php");
  $Codigo=$_REQUEST['Codigo'];
  $accion= $_REQUEST ['Accion'];
  if ($accion=='A') {
    $query1="UPDATE Donaciones SET Estado='A' WHERE CodDonacion ='$Codigo'";
    $resultado1= $conexion->query($query1);
    if ($resultado1) {
     echo'<script type="text/javascript">
        alert("Noticia aprobada correctamente");
        window.location.href="MDonaciones.php";
        </script>';
    }
  else {
    echo'<script type="text/javascript">
        alert("'.mysqli_error($conexion).'");
        window.location.href="MDonaciones.php";
        </script>';
  }
  }
  else {
    $query2="UPDATE Donaciones SET Estado='D' WHERE CodDonacion ='$Codigo'";
    $resultado2= $conexion->query($query2);
    if ($resultado2) {
     echo'<script type="text/javascript">
        alert("Noticia desaprobada correctamente");
        window.location.href="MDonaciones.php";
        </script>';
    }
  else {
    echo'<script type="text/javascript">
        alert("'.mysqli_error($conexion).'");
        window.location.href="MDonaciones.php";
        </script>';
  }
  }
 ?>