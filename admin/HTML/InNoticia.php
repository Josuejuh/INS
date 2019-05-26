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
    
    <script type='text/javascript' src='js/plugins/cleditor/jquery.cleditor.min.js'></script>
    <script type='text/javascript' src='js/plugins/uniform/jquery.uniform.min.js'></script>
    <script type='text/javascript' src='js/plugins/datatables/jquery.dataTables.min.js'></script>

    <script type='text/javascript' src='js/plugins.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
    <script type='text/javascript' src='js/settings.js'></script>>
    <script type='text/javascript' src='js/plugins/tinymce/tinymce.min.js'></script>

</head>
<body class="bg-img-num1">
<?php
include 'Nav.php';
?>

        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="Inicio.php">Inicio</a></li>
                    <li class="active">Ingresar Noticia</li>
                </ol>
            </div>
        </div>
      <div class="row">
        <div class="col-md-2">
        <?php
        include("Lateral.php")
        ?>
        </div>


          <form method="post" action="NGuardar.php" enctype="multipart/form-data">
            <div class="col-md-7">

                <div class="block">
                    <div class="header">
                        <h2>Ingresar Noticia</h2>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Titulo:</div>
                            <div class="col-md-9"><input type="text" required name="titulo" class="form-control" Placeholder="Titulo de la noticia"/></div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Fecha:</div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="date" name="fecha" value="<?php echo date("Y-m-d"); ?>"  max='<?php echo date("Y-m-d"); ?>' required/>

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Descripcion:</div>
                       <div class="col-md-12">
                <div class="block block-transparent">
                    <div class="content np">
                        <textarea class="stmce" name="descripcion" required>
                       
                        </textarea>
                    </div>
                </div>
            </div>    
                       </div>
                    </div>
                </div>

            </div>
           <div class="col-md-3">
           	<div class="block">
                    <div class="header">
                        <h2>Imagen</h2>
                    </div>
                    <div class="content controls">

                        <div class="form-row">
                        <div class="col-md-3">
                        </div>
                            <div class="col-md-6">

                                <div class="input-group file">
                                    <input type="text" class="form-control" placeholder="img/Sinimagen.jpg"/>
                                    <input type="file" required name="img1" onchange='Mostrar1(event)'/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">Buscar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="col-md-3">
                        </div>
                          <center>
                            <div class="col-md-6">
                              <img src="img/usuario.jpg" id="Abrir1" class="img-rounded" height="250px" width="250px"/>
                              <script>
                              var Mostrar1 = function(event) {
                                var input = event.target;

                                var reader = new FileReader();
                                reader.onload = function(){
                                  var dataURL = reader.result;
                                  var output = document.getElementById('Abrir1');
                                  output.src = dataURL;
                                };
                                reader.readAsDataURL(input.files[0]);
                              };
                              </script>
                            </div>
                          </center>
                        </div>
                        <div class="form-row">
                          <div class="col-md-4"> </div>
                            <div class="col-md-4">
                                <button class="btn btn-default btn-block btn-clean">Guardar</button>
                            </div>
                        <div class="col-md-4"> </div>
                    </div>
                </div>
          </div>
          </div>
          </form>
    </div>
</body>
</html>
<?php
  }
?>
