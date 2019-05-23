<!DOCTYPE html>
<html lang="en">
<head>        
    <title>Taurus</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />        
    
    <script type='text/javascript' src='js/plugins/jquery/jquery.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui.min.js'></script>   
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/globalize.js'></script>    
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/uniform/jquery.uniform.min.js'></script>
    
    <script type='text/javascript' src='js/plugins.js'></script>    
    <script type='text/javascript' src='js/actions.js'></script>    
    <script type='text/javascript' src='js/settings.js'></script>
</head>
<body class="bg-img-num1"> 
    
    <div class="container">        

        <div class="login-block">
            <div class="block block-transparent">
                <div class="head">
                    <div class="user">
                        <div class="info ">                                                                                
                            <img src="img/database.jpg" class="img-circle img-thumbnail"/>
                        </div>                            
                    </div>
                </div>
                <form method="POST" action="base.php">
                <div class="content controls npt">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="icon-user"></span>
                                </div>
                                <input type="text" name="usu" class="form-control" placeholder="root" >
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="icon-key"></span>
                                </div>
                                <input type="password" name="clave" class="form-control" placeholder="admin">
                            </div>
                        </div>
                    </div>                        
                    <div class="form-row">
                        <div class="col-md-12">
                            <button class="btn btn-default btn-block btn-clean">Insertar Base de Datos</button>
                        </div>
                    </div>
                    </form>                       
                                        
                </div>
            </div>
        </div>

    </div>

</body>
</html>