<?php 
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];

$res=Usuarios::obtenerPaginapor($IdSesion);
$campos = $res->getCampos();
foreach($campos as $campo){
  $nombre_usuario = $campo['nombre_usuario'];
  $imagen = $campo['imagen'];
}

$res=Usuarios::obtenerMenupor($IdSesion,$RolSesion);
//m_usuarios, m_rubros, m_subrubro, m_documentos, m_cuentas, m_gestioncuenta, m_cajas, m_equipos, m_gestionequipos
$campos = $res->getCampos();
foreach($campos as $campo){
  $m_usuarios = $campo['m_usuarios'];
  $m_funcionarios = $campo['m_funcionarios'];
  $m_rubros = $campo['m_rubros'];
  $m_subrubro = $campo['m_subrubro'];
  $m_documentos = $campo['m_documentos'];
  $m_cuentas = $campo['m_cuentas'];
   $m_gestioncuenta = $campo['m_gestioncuenta'];
   $m_cajas = $campo['m_cajas'];
   $m_equipos = $campo['m_equipos'];
   $m_gestionequipos = $campo['m_gestionequipos'];
    $m_reportes = $campo['m_reportes'];
}

 ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo($imagen); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo($nombre_usuario); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
       <?php 
          //Ocultar Menú Izquierdo
          if ($RolSesion==4 || $RolSesion==6) {
           ?>
           <ul class="sidebar-menu">
           </ul>
           <?php
          }
          else
          {

           ?>
      <ul class="sidebar-menu">
        <li class="header">MENU PRINCIPAL</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Configuración general </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($m_usuarios=="Si") {
              ?>
               <li><a href="?controller=usuarios&&action=todos"><i class="fa fa-circle-o"></i> Usuarios</a></li>
              <?php
            } ?>
             <?php if ($m_funcionarios=="Si") {
              ?>
               <li><a href="?controller=funcionarios&&action=todos"><i class="fa fa-circle-o"></i> Funcionarios</a></li>
               <li class=""><a href="?controller=documentos&&action=todos"><i class="fa fa-circle-o"></i> Tipo documentos</a></li>
              <?php
            } ?>
             <?php if ($m_rubros=="Si") {
              ?>
              <li><a href="?controller=rubros&&action=todos"><i class="fa fa-circle-o"></i> Rubros</a></li>
               <?php
            } ?>
             <?php if ($m_subrubro=="Si") {
              ?>
              <li class=""><a href="?controller=subrubros&&action=todos"><i class="fa fa-circle-o"></i> Sub-Rubros</a></li>
              <?php
            } ?>

            <!-- <li class=""><a href="?controller=modulos&&action=todos"><i class="fa fa-circle-o"></i> Módulos documentos</a></li> -->
            
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Recursos Humanos </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
             <?php if ($m_funcionarios=="Si") {
              ?>
              <li><a href="?controller=funcionarios&&action=todos"><i class="fa fa-circle-o"></i> Empleados</a></li>
               <li><a href="?controller=gestiondocumentalemp&&action=listaequipos"><i class="fa fa-circle-o"></i> Gestión documental</a></li>
               <li><a href="?controller=novedades&&action=todos"><i class="fa fa-circle-o"></i> Novedades</a></li>
              <?php
            } ?>
            
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Cuentas</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">6</span>
            </span>
          </a>
          <ul class="treeview-menu">
           <?php if ($m_cuentas=="Si") {
              ?>
            <li><a href="?controller=cuentas&&action=todos"><i class="fa fa-circle-o"></i> Ver Cuentas</a></li>
            <?php 
          }
             ?>
               <?php if ($m_gestioncuenta=="Si") {
              ?>
            <!-- <li><a href="?controller=gestiondocumental&&action=todos&&id_modulo=1"><i class="fa fa-circle-o"></i> Gestión Documental</a></li> -->
          <li><a href="?controller=gestiondocumental&&action=listacuentas"><i class="fa fa-circle-o"></i> Gestión Documental</a></li>
          <li><a href="?controller=gestiondocumental&&action=varios&&id_cuenta=5&&folderSel=7"><i class="fa fa-list"></i> Formatos</a></li>
            <?php
            } 
             ?>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-inbox"></i>
            <span>Cajas</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
             <?php if ($m_cajas=="Si") {
              ?>
            <li><a href="?controller=cajas&&action=todos"><i class="fa fa-circle-o"></i> Ver Cajas</a></li>
            <li><a href="?controller=gastos&&action=totalegresos"><i class="fa fa-circle-o"></i>Consolidado</a></li>
            <?php 
          }
             ?>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-truck"></i>
            <span>Equipos</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
             <?php if ($m_equipos=="Si") {
              ?>
          <li><a href="?controller=equipos&&action=todos"><i class="fa fa-circle-o"></i> Ver Equipos</a></li>
           <li><a href="?controller=equipos&&action=volquetas"><i class="fa fa-circle-o"></i> Volquetas</a></li>
            <li><a href="?controller=consolidados&&action=totalreporteseq"><i class="fa fa-circle-o"></i> Total Reportes</a></li>
            <li><a href="?controller=equipos&&action=reportedia"><i class="fa fa-circle-o"></i> Informe Día</a></li>
            <?php 
          }
             ?>
              <?php if ($m_gestionequipos=="Si") {
      ?>
      <li><a href="?controller=gestiondocumentaleq&&action=listaequipos"><i class="fa fa-circle-o"></i> Subir Documento</a></li>
      <li><a href="?controller=consolidados&&action=documentosequipos"><i class="fa fa-list"></i> Total Documentos</a></li>
            <?php 
          }
             ?>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Configuración</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
             <?php if ($m_equipos=="Si") {
              ?>
            <li class=""><a href="?controller=clientes&&action=todos"><i class="fa fa-circle-o"></i>Clientes</a></li>
            <li class=""><a href="?controller=productos&&action=todos"><i class="fa fa-circle-o"></i>Productos</a></li>
            <li class=""><a href="?controller=insumos&&action=todos"><i class="fa fa-circle-o"></i>Insumos</a></li>
            <li class=""><a href="?controller=proveedores&&action=todos"><i class="fa fa-circle-o"></i>Proveedores</a></li>
             <li class=""><a href="?controller=folders&&action=todos"><i class="fa fa-circle-o"></i>Carpetas</a></li>
            
            <?php 
          }
             ?>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-industry"></i>
            <span>Reportes</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
              <?php if ($m_reportes=="Si") {
              ?>
        <li class=""><a href="?controller=reportes&&action=ventas"><i class="fa fa-check-circle"></i>Reporte Ventas</a></li>
         <li class=""><a href="?controller=reportes&&action=prestamos"><i class="fa fa-truck"></i>Alquiler Equipos</a></li>
       <!-- <li class=""><a href="?controller=reportes&&action=facturas"><i class="fa fa-check-circle"></i>Cuentas x Cobrar</a></li>-->
         <li class=""><a href="?controller=reportes&&action=cuentasxpagar"><i class="fa fa-shopping-cart"></i>Cuentas x Pagar</a></li>
        <li class=""><a href="?controller=reportes&&action=compras"><i class="fa fa-shopping-cart"></i>Compras</a></li>
        <li class=""><a href="?controller=reportes&&action=insumosxpagar"><i class="fa fa-shopping-cart"></i>Compra de Insumos</a></li>
        <li class=""><a href="?controller=reportes&&action=despachos"><i class="fa fa-exchange"></i>Terraje</a></li>
          <li class=""><a href="?controller=reportes&&action=despachostrituradora"><i class="fa fa-exchange"></i>Trituradora</a></li>
        
          <li class=""><a href="?controller=reportes&&action=despachosclientes"><i class="fa fa-exchange"></i>Despachos Cliente</a></li>
         <li class=""><a href="?controller=reportes&&action=combustibles"><i class="fa fa-train"></i>Combustible</a></li>
          <li class=""><a href="?controller=reportes&&action=horas"><i class="fa fa-train"></i>Horas</a></li>
         <li class=""><a href="?controller=index&&action=informe1"><i class="fa fa-line-chart"></i>Informe</a></li>
          <li class=""><a href="?controller=index&&action=informegerencia"><i class="fa fa-line-chart"></i>Informe</a></li>
          <li class=""><a href="?controller=estadisticavolqueta&&action=todos&&id=NA"><i class="fa fa-bar-chart"></i> Informe Volqueta</a></li>
          <?php 
        }
           ?>
          </ul>
        </li>
       
         <li class="treeview">
          <a href="?controller=visorgraficas&&action=todos">
            <i class="fa fa-desktop"></i>
            <span>Graficas en Pantalla</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
        </li>

      </ul>
<?php 
  }
 ?>
    </section>
    <!-- /.sidebar -->
  </aside>