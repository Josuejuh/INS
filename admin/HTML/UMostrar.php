<?php
session_start();
if(@$_SESSION['Usuario'] == ""){
  header ("Location: ../");
}else{

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TADESA</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="icon" type="image/ico" href="img/talleres.ico"/>

    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script type='text/javascript' src='js/plugins/jquery/jquery.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>

    <script type='text/javascript' src='js/plugins/uniform/jquery.uniform.min.js'></script>
    <script type='text/javascript' src='js/plugins/datatables/jquery.dataTables.min.js'></script>

    <script type='text/javascript' src='js/plugins.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
    <script type='text/javascript' src='js/settings.js'></script>
</head>
<body class="bg-img-num1">
<?php
include 'Nav.php';
?>

        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="Inicio.php">Inicio</a></li>
                    <li class="active">Mostrar Usuarios</li>
                </ol>
            </div>
        </div>
      <div class="row">
        <div class="col-md-2">
        <?php
        include("Lateral.php")
        ?>
        </div>

            <div class="col-md-10">

                <div class="block">
                    <div class="header">
                        <h2>Usuarios</h2>
                    </div>
                    <div class="content">

                        <table class="table table-sorting table-striped table-hover datatable" id="resultados">
                            <thead>
                                <tr>
                                    <th width="15%">Usuario</th>
                                    <th width="25%">Nombre</th>
                                    <th width="25%">Apellido</th>
                                    <th width="25%">Correo</th>
                                    <th width="10%">Modificar</th>
                                    <th width="10%">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $Codigo=@$_SESSION['Codigo'];
                              include("conexion.php");
                              $query="SELECT*FROM Usuarios inner join Personas on Usuarios.CodPersona = Personas.CodPersona WHERE Tipo=1";
                              $resultado= $conexion->query($query);
                              while ($row = $resultado->fetch_assoc()){
                              ?>
                                <tr>
                                    <td><?php echo $row['Usuario']; ?></td>
                                    <td><?php echo $row['Nombre']; ?></td>
                                    <td><?php echo $row['Apellido']; ?></td>
                                    <td><?php echo $row['Correo']; ?></td>
                                  <td><center><a href="UModificar.php?Codigo=<?php echo $row['CodUsuario']; ?>"><button type="button" class="btn btn-info btn-xs">
                      								<span class="glyphicon icon-pencil icon-2x"></span></button></a></center></td>
        						              <td><center><a href="ElUsuario.php?Codigo=<?php echo $row['CodUsuario']; ?>" type="button" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?');"><button type="button" class="btn btn-danger btn-xs">
                      								<span class="glyphicon icon-remove icon-2x"></span></button></a></center></td>
                                  </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>

    </div>

            <script src="js/jquery.dataTables.bootstrap.js"></script>
              <script src="js/doSearch.js"></script>
              <script src="js/king-table.js"></script>
    </body>
    </html>
    <?php
      }
    ?>
