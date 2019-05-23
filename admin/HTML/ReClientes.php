<?php
session_start();
if(@$_SESSION['Usuario'] == ""){
  header ("Location: ../");
}else{

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>One&Only</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="icon" type="image/ico" href="img/icono.ico"/>

    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />

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
                    <li class="active">Registrar Clientes</li>
                </ol>
            </div>
        </div>
      <div class="row">
        <div class="col-md-2">
        <?php
        include("Lateral.php")
        ?>
        </div>
          <form method="POST" action="InClientes.php" enctype="multipart/form-data">

            <div class="col-md-2">

                <div class="block block-drop-shadow">

                    <div class="head bg-dot30 npb">
                        <h2>Imagen</h2>

                    </div>
                    <div class="head bg-dot30 np tac">
                        <img src="img/usuario.jpg" id="imagen" class="img-rounded" width="100px" height="100px"/>
                        <script>
                        var openFile = function(event) {
                          var input = event.target;

                          var reader = new FileReader();
                          reader.onload = function(){
                            var dataURL = reader.result;
                            var output = document.getElementById('imagen');
                            output.src = dataURL;
                          };
                          reader.readAsDataURL(input.files[0]);
                        };
                        </script>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="input-group file">
                                    <input type="text" class="form-control" required name="in" Placeholder="img/usuario.jpg"/>
                                    <input type="file" id="imgInp" required name="img"  onchange='openFile(event)' />
                                    <span class="input-group-btn">
                                        <button class="btn" type="button">Buscar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                </div>
                </div>



            </div>

            <div class="col-md-8">

                <div class="block block-drop-shadow">

                    <div class="header">
                        <h2>Registrar Cliente</h2>
                    </div>
                    <form method="post" action="insertar.php">
                      <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Usuario:</div>
                            <div class="col-md-9">
                                <input type="text" name="usuario" placeholder="Ingresar Usuario">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Contraseña</div>
                            <div class="col-md-9">
                                <input type="password" name="clave"  placeholder="Ingresar contraseña">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Nombre</div>
                            <div class="col-md-9">
                                <input type="text" name="nombre" placeholder="Ingresar Nombre">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Apellido</div>
                            <div class="col-md-9">
                                <input type="text" name="apellido" placeholder="Ingresar Apellido">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Correo:</div>
                            <div class="col-md-9">
                                <input type="text" name="correo" placeholder="Ingresar Correo">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Teléfono:</div>
                            <div class="col-md-9">
                                <input type="text" name="telefono" placeholder="Ingresar Teléfono">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Dirección:</div>
                            <div class="col-md-9">
                                <input type="text" name="direccion" placeholder="Ingresar Dirección">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Codigo:</div>
                            <div class="col-md-9">
                                <input type="text" name="codigo" placeholder="Ingresar Codigo">
                            </div>
                        </div>

                        <div class="tar">
                        <button class="btn btn-default btn-clean">Guardar</button>
                    </div>
                </div>
                    </form>

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
