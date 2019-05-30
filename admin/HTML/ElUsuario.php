<?php
  include ("conexion.php");
  $cod=$_REQUEST['Codigo'];
  $codPersona=$_REQUEST['CodPersona'];

  $query="UPDATE Usuarios SET Estado='D' WHERE CodUsuario='$cod'";
  $resultado= $conexion->query($query);
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
 ?>
