<?php
  include ("conexion.php");
  $cod=$_REQUEST['Codigo'];
  $codPersona=$_REQUEST['CodPersona'];

  $query="UPDATE Personas SET Estado='D' WHERE CodPersona ='$CodPersona'";
  $resultado= $conexion->query($query);
  if ($resultado) {
      $query1 = "UPDATE Usuarios SET Estado='D' WHERE CodUsuario='$Codigo'";
    $resultado= $conexion->query($query1);
    if ($resultado) {
      echo'<script type="text/javascript">
        alert("Usuario eliminado correctamente");
        window.location.href="Inicio.php";
        </script>';
    }else  {
      echo'<script type="text/javascript">
        alert("'.mysqli_error($conexion).'");
        window.location.href="Inicio.php";
        </script>';
      }
  }
  else {
    echo'<script type="text/javascript">
        alert("'.mysqli_error($conexion).'");
        window.location.href="Inicio.php";
        </script>';
  }

 ?>
