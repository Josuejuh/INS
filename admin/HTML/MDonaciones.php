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
                    <li class="active">Mostrar Noticias</li>
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
                        <h2>Noticias</h2>
                    </div>
                    <div class="tab-pane profile active content">
						<div class="row">
							<div class="col-md-12">
								<table class="table table-sorting table-striped table-hover datatable" id="resultados">  <thead>
                              <tr>
                                  <th width="5%">Codigo</th>
                                  <th width="10%">Fecha</th>
                                  <th width="10%">Monto</th>
                                  <th width="15">Nombre</th>
                                  <th width="15%">Apellido</th>
                                  <th width="15%">Correo</th>
                                  <th width="15%">Pais</th>
                                  <th width="10%">Modificar</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("conexion.php");
                            $result = mysqli_query($conexion,"SELECT d.CodDonacion,d.FecDonacion,d.Monto,d.Estado,per.Nombre,per.Apellido,p.Pais,per.Correo FROM Donaciones as d inner join Usuarios on d.CodDonador=Usuarios.CodUsuario inner join Personas as per on Usuarios.CodPersona = per.CodPersona inner join Paises as p on p.CodPais=per.CodPais order by CodDonacion ASC");
  						              while($fila = mysqli_fetch_array($result))
  						                {
  						                  ?>
                              <tr>
                                  <td><?php echo $fila['CodDonacion']; ?></td>
                                  <td><?php echo $fila['FecDonacion']; ?></td>
                                  <td>$ <?php echo $fila['Monto']; ?></td>
                                  <td><?php echo $fila['Nombre']; ?></td>
                                  <td><?php echo $fila['Apellido']; ?></td>
                                  <td><?php echo $fila['Correo']; ?></td>
                                  <td><?php echo $fila['Pais']; ?></td>
                                  <?php if($fila['Estado']=='D'){
                                  ?>
                                  <td><center><a href="ModDonacion.php?Codigo=<?php echo $fila['CodDonacion']; ?>&Accion=A"><button type="button" class="btn btn-info btn-xs"  onclick="return confirm('¿Estás seguro de que quieres aprobar esta donación?');">
                    								<span class="fas fa-thumbs-up"></span> Aprobar</button></a></center></td>
                                  <?php }else{?>
                                    <td><center><a href="ModDonacion.php?Codigo=<?php echo $fila['CodDonacion']; ?>&Accion=D"><button type="button" class="btn btn-danger btn-xs"  onclick="return confirm('¿Estás seguro de que quieres desaprobar esta donación?');">
                    								<span class="fas fa-thumbs-down"></span> Desaprobar</button></a></center></td>
                                  <?php }?>
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

        <script src="js/jquery.dataTables.bootstrap.js"></script>
          <script src="js/doSearch.js"></script>
          <script src="js/king-table.js"></script>
</body>
</html>
<?php
  }
?>
