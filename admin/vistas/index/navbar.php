<?php 
error_reporting(E_ALL);
ini_set('display_errors', '0');
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/ingresos.php';
include_once 'controladores/ingresosController.php';
include_once 'modelos/requisicionesitems.php';
include_once 'controladores/requisicionesitemsController.php';
include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';
include_once 'modelos/categoriainsumos.php';
include_once 'controladores/categoriainsumosController.php';
include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';
include_once 'modelos/servicios.php';
include_once 'controladores/serviciosController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';
include 'vistas/index/estadisticas_almacen.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];
include 'vistas/index/alertas.php';

$idcajaporuser=Ingresos::obtenerIdcajaporUser($IdSesion);
$_SESSION['idcajaporuser']=$idcajaporuser;

$res=Usuarios::obtenerPaginapor($IdSesion);
$campos = $res->getCampos();
foreach($campos as $campo){
  $nombre_usuario = $campo['nombre_usuario'];
  $imagen = $campo['imagen'];
}
date_default_timezone_set("America/Bogota");
$totaldiasmes= date('t');
$anoactual= date('Y');
$mesactual= date('n');
$diaactual= date('d');
$diaanterior= $diaactual-1;
$fechatexto=$mesactual."/".$diaanterior."/".$anoactual;
$fechaanterior=$mesactual."/".$diaanterior."/".$anoactual." - ".$mesactual."/".$diaanterior."/".$anoactual;

$FechaStart=$anoactual."-".$mesactual."-".$diaanterior." 00:00:000";
$FechaEnd=$anoactual."-".$mesactual."-".$diaanterior." 23:59:000";

$CuentaEquipos=CuentaEquipos();
$CuentaEquiposReporte=CuentaEquiposReporte($FechaStart,$FechaEnd);
$indicadorSinreporte=$CuentaEquipos-$CuentaEquiposReporte;

$fecha_actual = date("d-m-Y");
$treintadias=date("Y-m-d",strtotime($fecha_actual."- 4 week")); 
$FechaInicio30dias=$treintadias." 00:00:0000";
$FechaFinal30dias=$anoactual."-".$mesactual."-".$diaactual." 23:59:0000";

 ?>
  <header class="main-header">
    <!-- Logo -->
    <a href="?controller=index&&action=index" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>N</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Luz</b>.net</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           <?php 
        if ($idcajaporuser!='') {
         ?>
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-dollar"></i>
              <span class="label label-success">Mi caja</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Últimos Ingresos <strong>Mi Caja</strong></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">

   <?php 
$res=Ingresos::obtenerIngresosmes($idcajaporuser,$FechaInicio30dias,$FechaFinal30dias);
$campos = $res->getCampos();
foreach($campos as $campo){
   $id_ingreso_caja = $campo['id_ingreso_caja'];
            $imagen = $campo['imagen'];
            $tipo_beneficiario = $campo['tipo_beneficiario'];
            $fecha_ingreso = $campo['fecha_ingreso'];
            $marca_temporal = $campo['marca_temporal'];
            $caja_ppal = $campo['caja_ppal'];
            $caja_id_caja = $campo['caja_id_caja'];
            $cuenta_id_cuenta = $campo['cuenta_id_cuenta'];
            $ingreso_por_cuentas = $campo['ingreso_por_cuentas'];
            $valor_ingreso = $campo['valor_ingreso'];
            $observaciones = $campo['observaciones'];
             // Validación de la caja que coloca el dinero en la vista de esta caja
            if ($cuenta_id_cuenta==0) {
              $fuente=Ingresos::ObtenerNombrecaja($caja_id_caja);
            }
            else
            {
              $fuente=Ingresos::ObtenerNombrecuenta($cuenta_id_cuenta);
            }
 
                   ?>

                  <li><!-- start message -->
                    <a href="?controller=index&&action=micajamenor&&id_caja=<?php echo($idcajaporuser) ?>">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        <?php echo("$ ".number_format($valor_ingreso,0)) ?>
                        <small><i class="fa fa-clock-o"></i> <?php echo utf8_encode($fecha_ingreso) ?></small>
                      </h4>
                      <p><?php echo utf8_encode($fuente) ?><br>
                        <?php echo utf8_encode($observaciones) ?>
                      </p>
                    </a>
                  </li>
                  <!-- end message -->
        <?php 
      }
         ?>

                </ul>
              </li>
              <li class="footer"><a href="?controller=index&&action=micajamenor&&id_caja=<?php echo($idcajaporuser) ?>">Ver Movimientos</a></li>
            </ul>
          </li>
<?php
// termina validación de usuario caja 
  }
 ?>
          <!-- Messages: style can be found in dropdown.less-->
  <?php 
    $contadoritems=contarregistrosporestado("1",$IdSesion);
   ?>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-cubes"></i>
              <span class="label label-success">RQ - <?php echo($contadoritems); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">En estado solicitado (<?php echo($contadoritems); ?>)</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">

                <?php 
                $res=Requisicionesitems::todosporusuarioestado($IdSesion,"1");
                $campos = $res->getCampos();

              foreach($campos as $campo){

            $iditem = $campo['id'];
            $fecha_reporte = $campo['fecha_reporte'];
            $insumo_id_insumo = $campo['insumo_id_insumo'];
            $servicio_id_servicio = $campo['servicio_id_servicio'];
            $equipo_id_equipo = $campo['equipo_id_equipo'];
            $cantidad = $campo['cantidad'];
            $fecha_entrega = $campo['fecha_entrega'];
            $requisicion_id = $campo['requisicion_id'];
            $marca_temporal = $campo['marca_temporal'];
            $estado_item = $campo['estado_item'];
            $tipo_req = $campo['tipo_req'];

            if ($tipo_req=='Insumos') {
              $detallesolicitado=Insumos::obtenerNombreInsumo($insumo_id_insumo);
                $categoriaid=Insumos::obtenerCategoria($insumo_id_insumo);
                $nomcategoria=Categoriainsumos::obtenerNombre($categoriaid);
                $unidadmedidaid=Insumos::obtenerUnidadmed($insumo_id_insumo);
                $nomunidadmedida=Unidadesmed::obtenerNombre($unidadmedidaid);
            }
            elseif ($tipo_req=='Servicios') {
              $detallesolicitado=Servicios::obtenerNombre($servicio_id_servicio);
               $nomcategoria='Servicios';
               $nomunidadmedida='Und';
            }
            else
            {
              $detallesolicitado=Equipos::obtenerNombreEquipo($equipo_id_equipo);
               $nomcategoria='Equipos';
               $nomunidadmedida='Und';
            }


date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
$fecha1 = new DateTime($marca_temporal);//fecha inicial
$fecha2 = new DateTime($TiempoActual);//fecha de cierre
$intervalo = $fecha1->diff($fecha2);
                 ?>
                  <li><!-- start message -->
                    <a href="?controller=requisicionesitems&&action=todosporreq&&id=<?php echo($requisicion_id) ?>">
                      <div class="pull-left">
                       <small><strong>RQ<?php echo($requisicion_id."-".$iditem) ?></strong></small>
                      </div>
                      <h4>
                       <?php echo($tipo_req); ?>
                        <small><i class="fa fa-clock-o"></i> <?php 
                        echo $intervalo->format('%d días %H horas');
                         ?></small>
                      </h4>
                      <p><?php echo($detallesolicitado); ?></p>
                    </a>
                  </li>
                  <!-- end message -->
              <?php } ?>
                </ul>
              </li>

               <?php if ($RolSesion==1 or $RolSesion==13) { ?>
              <li class="footer"><a style="background-color: lightgreen;" href="?controller=requisiciones&&action=todosalmacen&&cargo=<?php echo($RolSesion);?>">Ver/Crear Requisición <i class='fa fa-plus-square'></i></a></li>
            <?php
          } else{?>
             <li class="footer"><a style="background-color: lightgreen;" href="?controller=requisiciones&&action=todosmiusuario&&id=<?php echo($IdSesion); ?>">Ver/Crear Requisición <i class='fa fa-plus-square'></i></a></li>
      <?php } ?>     

             
            

            </ul>
          </li>

          <!-- Notifications: style can be found in dropdown.less -->
           <li style="display: none;" class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell"></i>
              <span class="label label-success"><?php echo($CuentaEquiposReporte) ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"> <?php echo($CuentaEquiposReporte) ?> Equipos reportados el <?php echo(fechalarga($fechatexto)); ?></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                 <?php 
$res=Usuarios::ListaEquipos();
$campos = $res->getCampos();
foreach($campos as $campo){
  $nombre_equipo = $campo['nombre_equipo'];
  $id_equipo = $campo['id_equipo'];
  $validadia=ReporteEqDiasAlerta($id_equipo,$FechaStart,$FechaEnd);
                   ?>
                   <?php 
                   if ($validadia!=0) {
                    ?>
                  <li>
                    <a href="?controller=equipos&&action=reportediario&&id=<?php echo($id_equipo); ?>">
                      <i class="fa fa-truck text-red"></i><i class="fa fa-wrench"></i> <?php echo utf8_encode($nombre_equipo); ?><br><span class="label label-success pull-right">Reportar</span>
                    </a>
                  </li>
                <?php 
                }
              }
                 ?>
                </ul>
              </li>
              <li class="footer">
                <a href="?controller=equipos&&action=reporteporfecha&&daterange=<?php echo($fechaanterior); ?>">Ver Reporte <?php echo(fechalarga($fechatexto)); ?></a>
              </li>
            </ul>
          </li>
          <li style="display: none;"  class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-dashboard"></i>
              <span class="label label-danger"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"> <a href="https://sofialuz.net/admin/index.php"></a> Informes Gerenciales</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                
                  <li>
                    <a href="?controller=index&&action=index">
                      <i class="fa fa-bar-chart text-red"></i> Informe Planta<br><span class="label label-success pull-right">Ver</span>
                    </a>
                  </li>
                  <li>
                    <a href="?controller=index&&action=informe1">
                      <i class="fa fa-bar-chart text-red"></i> Informe Mensual<br><span class="label label-success pull-right">Ver</span>
                    </a>
                  </li>
                  <li>
                    <a href="?controller=index&&action=informeequipos">
                      <i class="fa fa-truck text-red"></i> Informe Equipos<br><span class="label label-success pull-right">Ver</span>
                    </a>
                  </li>
              
                </ul>
              </li>
              <li class="footer">
                <a href="?controller=equipos&&action=reporteporfecha&&daterange=<?php echo($fechaanterior); ?>">Ver Reporte <?php echo(fechalarga($fechatexto)); ?></a>
              </li>
            </ul>
          </li>
          <li  style="display: none;" class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-slash"></i>
              <span class="label label-danger"><?php echo($indicadorSinreporte) ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"> <?php echo($indicadorSinreporte) ?> Equipos sin reporte del <?php echo(fechalarga($fechatexto)); ?></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                 <?php 
$res=Usuarios::ListaEquipos();
$campos = $res->getCampos();
foreach($campos as $campo){
  $nombre_equipo = $campo['nombre_equipo'];
  $id_equipo = $campo['id_equipo'];
  $validadia=ReporteEqDiasAlerta($id_equipo,$FechaStart,$FechaEnd);
                   ?>
                   <?php 
                   if ($validadia==0) {
                    ?>
                  <li>
                    <a href="?controller=equipos&&action=reportediario&&id=<?php echo($id_equipo); ?>">
                      <i class="fa fa-truck text-red"></i><i class="fa fa-wrench"></i> <?php echo utf8_encode($nombre_equipo); ?><br><span class="label label-success pull-right">Reportar</span>
                    </a>
                  </li>
                <?php 
                }
              }
                 ?>
                </ul>
              </li>
              <li class="footer">
                <a href="?controller=equipos&&action=reporteporfecha&&daterange=<?php echo($fechaanterior); ?>">Ver Reporte <?php echo(fechalarga($fechatexto)); ?></a>
              </li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
        <?php 
        if ($RolSesion ==1 ) {
         ?>
          <li class="dropdown tasks-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-file-archive-o"></i>
              <span class="label label-danger">3</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Gestión Documental</li>
              
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a class="text-black" href="?controller=gestiondocumental&&action=todos&&id=5&&id_modulo=1">
                      <i class="fa fa-folder-open text-blue"> </i>  Predeterminados<br><span class="label label-success pull-right">Ver más...</span>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                     <a class="text-black" href="?controller=gestiondocumental&&action=varios&&id_cuenta=5">
                      <i class="fa fa-folder-open text-blue"> </i> Varios<br><span class="label label-success pull-right">Ver más...</span>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                     <a class="text-black" href="?controller=gestiondocumentalemp&&action=varios&&id_cuenta=4">
                      <i class="fa fa-folder-open text-blue"> </i> Recursos Humanos<br><span class="label label-success pull-right">Ver más...</span>
                    </a>
                  </li>
                  <!-- end task item -->
        
                </ul>
              </li>
              <li class="footer">
                <a href="?controller=gestiondocumental&&action=listacuentas">Ver todo</a>
              </li>
            </ul>
          </li>
      <?php 
    }
       ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo($imagen); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo($nombre_usuario); ?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo($imagen); ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo($nombre_usuario); ?>
                  <small>Luz.net <?php echo($anoactual); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li style="display: none;" class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  
                  <a href="?controller=misdocumentos&&action=todos&&id_usuario=<?php echo($IdSesion); ?>" class="btn btn-default btn-flat">Mis Documentos</a>
                </div>
                <div class="pull-right">
                  <a href="../admin/logout.php" class="btn btn-default btn-flat">Cerar Sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li style="display: none;">
            <a  href="#" data-toggle="control-sidebar"><i class="fa fa-files-o"></i></a>
          </li>
        </ul>
      </div>

    </nav>

  </header>