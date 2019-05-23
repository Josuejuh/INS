<?php
  include ("conexion.php");
  $Codigo=$_REQUEST['Codigo'];
  $CodPersona=$_REQUEST['CodPersona'];
  $nombre= $_POST ['nombre'];
  $apellido= $_POST ['apellido'];
  $correo=$_POST['email'];
  $usuario= $_POST ['usuario'];
  $clave= $_POST ['clave'];
  $nit= $_POST['nit'];
  $telefono=$_POST ["telefono"];
  $codPais=$_POST["pais"];
  
    $query="UPDATE Personas SET Nombre='$nombre',Apellido='$apellido',Correo='$correo',Nit='$nit',Telefono='$telefono',CodPais='$codPais' WHERE CodPersona ='$CodPersona'";
    $resultado= $conexion->query($query);
    if ($resultado) {
      if ($clave=="*********") {
        $query1 = "UPDATE Usuarios SET Usuario='$usuario' WHERE CodUsuario='$Codigo'";
      }else{
        $query1 = "UPDATE Usuarios SET Usuario='$usuario', Clave=MD5('$clave') WHERE CodUsuario='$Codigo'";
      }
      $resultado= $conexion->query($query1);
      if ($resultado) {
        header("Location: UMostrar.php?status=success");
      }else  {
        header("Location: UMostrar.php?status=error");
        }
    }
    else {
      header("Location: UMostrar.php?status=error");
    }
?>
