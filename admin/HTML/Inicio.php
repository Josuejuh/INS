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

    <script type='text/javascript' src='js/plugins/jquery/jquery.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
<div class="col-md-2">
<?php
include "Lateral.php";
?>
</div>

          <div class="col-md-5">
            <form method="POST" action="InComentario.php" enctype="multipart/form-data">

            <div class="block block-drop-shadow">

                <div class="header">
                    <h2>Comentario</h2>
                </div>

                  <div class="content controls">
                    <div class="form-row">
                        <div class="col-md-3">Codigo de Usuario:</div>
                        <div class="col-md-9">
                            <input type="text" name="codigo" placeholder="Codigo Usuario">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">Comentario:</div>
                        <div class="col-md-9">
                            <textarea input type="text" name="comentario"  placeholder="Ingrese Comentario"></textarea>
                        </div>
                    </div>

                    <div class="tar">
                    <button class="btn btn-default btn-clean">Guardar</button>
                </div>
            </div>
                </form>
                </div>
          </div>

          <div class="col-md-5">

              <div class="block block-drop-shadow">
                    <div class="content list">
                        <div class="list-item">
                            <div class="list-datetime">
                                <div class="time"><?php echo $row['Fecha']; ?></div>
                                <div class="time"><?php echo $row['Hora']; ?></div>
                            </div>
                            <div class="list-info">
                                <img src="usuario.jpg" value="Sinimagen.jpg" id="imagen" class="img-circle img-thumbnail" width="50px" height="50px"/>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> 
    </div>
</body>
</html>
<?php
  }
?>
