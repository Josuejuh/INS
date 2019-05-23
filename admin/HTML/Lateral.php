<?php
  $Codigo=$_SESSION['Codigo'];
  include("conexion.php");
?>
<div class="block block-drop-shadow">
    <div class="user bg-default bg-light-rtl">
        <div class="info">
<img class="img-rounded" width="100px" height="100px" src="img/talleres.png"/>        </div>
    </div>
    <div class="content list-group list-group-icons">
        <a href="Inicio.php" class="list-group-item"><span class="icon-home"></span>Inicio</a>


          <ul class="content list-group">
            <li class="dropdown">
              <a href="#" class="list-group-item dropdown-toggle" data-toggle="dropdown"><span class="icon-shopping-cart"></span>Administracion<i class="icon-angle-right pull-right"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href="#">Productos<i class="icon-angle-right pull-right"></i></a>
                      <ul class="dropdown-submenu">
                        <li><a href="InProducto.php">Insertar Producto</a></li>
                        <li><a href="MProducto.php">Mostrar Productos</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="#">Categorias<i class="icon-angle-right pull-right"></i></a>
                      <ul class="dropdown-submenu">
                        <li><a href="MCategoria.php">Mostrar Categorias</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="#">Subcategorias<i class="icon-angle-right pull-right"></i></a>
                      <ul class="dropdown-submenu">
                        <li><a href="InSubcategoria.php">Insertar Subategoria</a></li>
                        <li><a href="MSubcategoria.php">Mostrar Subcategorias</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="#">Ofertas<i class="icon-angle-right pull-right"></i></a>
                      <ul class="dropdown-submenu">
                        <li><a href="InOferta.php">Insertar Ofertas</a></li>
                        <li><a href="MOferta.php">Mostrar Ofertas</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="#">One&Only<i class="icon-angle-right pull-right"></i></a>
                      <ul class="dropdown-submenu">
                        <li><a href="MCarrusel.php">Carrusel</a></li>
                        <li><a href="Bitacora.php">Bit&aacute;cora</a></li>
                      </ul>
                  </li>
                </ul>
            </li>
            <?php
			if ($_SESSION["Nivel"]==1){
        ?>
            <li class="dropdown">
              <a href="#" class="list-group-item dropdown-toggle" data-toggle="dropdown"><span class="icon-cog"></span>Ajustes<i class="icon-angle-right pull-right"></i></a>
              <ul class="dropdown-menu">
                <li>
                    <a href="#">Usuarios<i class="icon-angle-right pull-right"></i></a>
                    <ul class="dropdown-submenu">
                      <li><a href="Registro.php">Registrar </a></li>
                      <li><a href="UMostrar.php">Mostrar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Clientes<i class="icon-angle-right pull-right"></i></a>
                    <ul class="dropdown-submenu">
                    <li><a href="ReClientes.php">Registrar Cliente</a></li>
                    <li><a href="CMostrar.php">Mostrar Cliente</a></li>
                    </ul>
                </li>
              </ul>
            </li>
            <?php
              }
            ?>
            <li><a href="CerrarSesion.php" class="list-group-item"><span class="icon-off"></span>Cerrar Sesion</a></li>
        </ul>
        <div class="pull-left" style="width: auto;">
            <div id="tour-searchbox" class="list-grop-item input-group">

                <input id="searchTerm" type="search" onkeyup="doSearch()" class="form-control" placeholder="Buscar...">
                <div class="input-group-btn"><button class="btn"><span class="icon-search"></span></button></div>
            </div>
        </div>
    </div>

</div>