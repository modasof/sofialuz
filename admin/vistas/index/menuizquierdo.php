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

//`m_usuarios`, `m_funcionarios`, `m_documentos`, `m_rubros`, `m_subrubro`, `m_destinos`, `m_proyectos`, `m_estaciones`, `m_empleados`, `m_gdocempleados`, `m_novedades`, `m_cuentas`, `m_gdoccuentas`, `m_cajas`, `m_consolidadocajas`, `m_gdocequipos`, `m_campamentos`, `m_mantenimientos`, `m_ventas`, `m_ventasalquiler`, `m_cuentasxpagar`, `m_compras`, `m_comprainsumos`, `m_combustible`, `m_horas`, `m_horasmq`, `m_informe1`

$campos = $res->getCampos();
foreach($campos as $campo){
 
  $m_clientes = $campo['m_clientes'];
  $m_productos = $campo['m_productos'];
  $m_insumos = $campo['m_insumos'];
  $m_cotizaciones = $campo['m_cotizaciones'];
  $m_rq = $campo['m_rq'];
  $m_rqentrada = $campo['m_rqentrada'];
  $m_rqsalida = $campo['m_rqsalida'];
  $m_proveedores = $campo['m_proveedores'];
  $m_carpetas = $campo['m_carpetas'];
  $m_usuarios = $campo['m_usuarios'];
  $m_cargos = $campo['m_cargos'];
  $m_funcionarios = $campo['m_funcionarios'];
  $m_documentos = $campo['m_documentos'];
  $m_rubros = $campo['m_rubros'];
  $m_subrubro = $campo['m_subrubro'];
  $m_destinos = $campo['m_destinos'];
  $m_proyectos = $campo['m_proyectos'];
  $m_estaciones = $campo['m_estaciones'];
  $m_empleados = $campo['m_empleados'];
  $m_gdocempleados = $campo['m_gdocempleados'];
  $m_novedades = $campo['m_novedades'];
  $m_cuentas = $campo['m_cuentas'];
  $m_crucecuentas = $campo['m_crucecuentas'];
  $m_crucecuentas = $campo['m_crucecuentas'];
  $m_gdoccuentas = $campo['m_gdoccuentas'];
  $m_cajas = $campo['m_cajas'];
  $m_consolidadocajas = $campo['m_consolidadocajas'];
  $m_egresoscajacontador= $campo ['m_egresoscajacontador'];
  $m_ingresoscajacontador= $campo ['m_ingresoscajacontador'];
  $m_equipos = $campo['m_equipos'];
  $m_gdocequipos = $campo['m_gdocequipos'];
  $m_campamentos = $campo['m_campamentos'];
  $m_mantenimientos = $campo['m_mantenimientos'];
  $m_ventas = $campo['m_ventas'];
  $m_ventasalquiler = $campo['m_ventasalquiler'];
  $m_cuentasxpagar = $campo['m_cuentasxpagar'];
  $m_compras = $campo['m_compras'];
  $m_comprainsumos = $campo['m_comprainsumos'];
  $m_despachos = $campo['m_despachos'];
  $m_combustible = $campo['m_combustible'];
  $m_horas = $campo['m_horas'];
  $m_horasmq = $campo['m_horasmq'];
  $m_informe1 = $campo['m_informe1'];
  $m_concreto = $campo['m_concreto'];
  $m_categoriains = $campo['m_categoriains'];
  $m_entradasinv=$campo['m_entradasinv'];
  $m_entradasdetalleinv=$campo['m_entradasdetalleinv'];
  $m_salidasinv=$campo['m_salidasinv'];
  $m_salidasdetalleinv=$campo['m_salidasdetalleinv'];
  $m_inventario=$campo['m_inventario'];
  $m_cuentasxpagarusuario=$campo['m_cuentasxpagarusuario'];

 
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
    
      <ul class="sidebar-menu">
        <li class="header">MENU PRINCIPAL</li>
        
          <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Configuración General</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">

            <?php if ($m_usuarios=="Si") { ?>
               <li><a href="?controller=usuarios&&action=todos"><i class="fa fa-circle-o"></i> Usuarios</a></li>
            <?php } ?>
              <?php if ($m_cargos=="Si") { ?>
               <li><a href="?controller=cargos&&action=todos"><i class="fa fa-circle-o"></i> Cargos</a></li>
            <?php } ?>

              <?php if ($m_documentos=="Si") { ?>
                <li class=""><a href="?controller=documentos&&action=todos"><i class="fa fa-circle-o"></i> Tipo documentos</a></li>
           <?php } ?>

             <?php if ($m_proyectos=="Si") { ?>
            <li class=""><a href="?controller=proyectos&&action=todos"><i class="fa fa-circle-o"></i>Proyectos</a></li>
             <?php } ?>

                <?php if ($m_estaciones=="Si") { ?>
             <li class=""><a href="?controller=estaciones&&action=todos"><i class="fa fa-circle-o"></i>Estaciones</a></li>
             <?php } ?>

            <?php if ($m_destinos=="Si") { ?>
              <li class=""><a href="?controller=destinos&&action=todos"><i class="fa fa-circle-o"></i>Destinos</a></li>
            <?php } ?>

            <?php if ($m_rubros=="Si") { ?>
              <li><a href="?controller=rubros&&action=todos"><i class="fa fa-circle-o"></i> Rubros</a></li>
            <?php } ?>

             <?php if ($m_subrubro=="Si") { ?>
              <li class=""><a href="?controller=subrubros&&action=todos"><i class="fa fa-circle-o"></i> Sub-Rubros</a></li>
            <?php } ?>

             <?php if ($m_carpetas=="Si") { ?>
             <li class=""><a href="?controller=folders&&action=todos"><i class="fa fa-circle-o"></i>Carpetas</a></li>
             <?php } ?>

            <?php if ($m_productos=="Si") { ?>
            <li class=""><a href="?controller=productos&&action=todos"><i class="fa fa-circle-o"></i>Productos</a></li>
           <?php } ?>
          
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Talento Humano </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
             <?php if ($m_empleados=="Si") { ?>
              <li><a href="?controller=funcionarios&&action=todos"><i class="fa fa-circle-o"></i> Empleados</a></li>
             <?php } ?>
            <?php if ($m_gdocempleados=="Si") { ?>
               <li><a href="?controller=gestiondocumentalemp&&action=listaequipos"><i class="fa fa-circle-o"></i> Gestión documental</a></li>
             <?php } ?>
              <?php if ($m_novedades=="Si") { ?>
               <li><a href="?controller=novedades&&action=todos"><i class="fa fa-circle-o"></i> Novedades</a></li>
              <?php } ?>
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i> <span>Cuentas </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <?php if ($m_cuentas=="Si") { ?>
            <li><a href="?controller=cuentas&&action=todos"><i class="fa fa-circle-o"></i> Ver Cuentas</a></li>
             <li><a href="?controller=cuentas&&action=crucecuentas"><i class="fa fa-circle-o"></i> Cruce Cuentas</a></li>



           <?php } ?>
          <?php if ($m_gdoccuentas=="Si") { ?>
          <li><a href="?controller=gestiondocumental&&action=listacuentas"><i class="fa fa-circle-o"></i> Gestión Documental</a></li>
         <?php } ?>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-inbox"></i>
            <span>Cajas</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
             <?php if ($m_cajas=="Si") { ?>
            <li><a href="?controller=cajas&&action=todos"><i class="fa fa-circle-o"></i> Ver Cajas</a></li>
             <?php } ?>
            <?php if ($m_consolidadocajas=="Si") { ?>
            <li><a href="?controller=gastos&&action=totalegresos"><i class="fa fa-circle-o"></i>Consolidado</a></li>
            <?php } ?>
              <?php if ($m_egresoscajacontador=="Si") { ?>
             <li><a href="?controller=gastos&&action=totalegresoslegal"><i class="fa fa-circle-o"></i>Egresos Contabilizados</a></li>
            <?php } ?>
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
          <?php if ($m_equipos=="Si") { ?>
        <li><a href="?controller=equipos&&action=todos"><i class="fa fa-circle-o"></i> Ver Equipos</a></li>
          <?php } ?>
        <?php if ($m_gdocequipos=="Si") { ?>
      <li><a href="?controller=gestiondocumentaleq&&action=listaequipos"><i class="fa fa-circle-o"></i> Gestión Documental</a></li>
        <?php } ?>
       
         <?php if ($m_mantenimientos=="Si") { ?>
             <li class=""><a href="?controller=tipomantenimiento&&action=todos"><i class="fa fa-circle-o"></i>Tipo Mantenimiento</a></li>
        <?php } ?>
          </ul>
        </li>
         <li  class="treeview">
          <a href="#">
            <i class="fa fa-contao"></i>
            <span>Módulo Concreto</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul  class="treeview-menu">
      <?php if ($m_concreto=="Si") { ?>
        <li class=""><a href="?controller=concreto&&action=todos"><i class="fa fa-check-circle"></i>Despachos concreto</a></li>
      <?php } ?>

     
          </ul>
        </li>
         
         <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i>
            <span>Almacén</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">


      <?php if ($m_categoriains=="Si") { ?>

          <li class=""><a href="?controller=categoriainsumos&&action=todos"><i class="fa fa-check-circle"></i>Categorías Insumos</a></li>
          <li class=""><a href="?controller=unidadesmed&&action=todos"><i class="fa fa-check-circle"></i>Unidades Medida</a></li>

      <?php } ?>   
            
      <?php if ($m_insumos=="Si") { ?>
          <li class=""><a href="?controller=insumos&&action=todos"><i class="fa fa-check-circle"></i>Insumos</a></li>
          <li class=""><a href="?controller=servicios&&action=todos"><i class="fa fa-check-circle"></i>Servicios</a></li>
         <li class=""><a href="?controller=equipostemporales&&action=todos"><i class="fa fa-check-circle"></i>Equipos Temporales</a></li>
        
      <?php } ?>

      <?php if ($m_rqentrada=="Si") { ?>
        <li class=""><a href="?controller=compras&&action=todosrecibirinsumos"><i class="fa fa-shopping-cart"></i>Recibir OC</a></li>
      <?php } ?>   

        <?php if ($m_rq=="Si") { ?>
         
          <?php if ($RolSesion==1 or $RolSesion==13) { ?>
            <li class=""><a href="?controller=requisiciones&&action=todosalmacen&&cargo=<?php echo($RolSesion);?>"><i class="fa fa-check-circle"></i>Requisiciones Almacén</a></li>

            <?php
          } ?>   

      <?php } ?> 

       <?php if ($m_rqsalida=="Si") { ?>
        <li class=""><a href="?controller=requisiciones&&action=reqparaentrega&&cargo=<?php echo($RolSesion);?>&&estadosolicitado=12"><i class="fa fa-check-circle"></i>Rq para Entrega</a></li>
      <?php } ?>   



      
         
       
       
       

      
          </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-industry"></i>
            <span>Compras</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
      <?php if ($m_compras=="Si") { ?>
         <li class=""><a href="?controller=compras&&action=todos"><i class="fa fa-shopping-cart"></i>Compras</a></li>
     <?php } ?> 
       <?php if ($m_cuentasxpagar=="Si") { ?>
            <li><a href="?controller=reportes&&action=cuentasxpagar"><i class="fa fa-circle-o"></i> Subir CxP</a></li>
      <?php } ?>
     
      <?php if ($m_cuentasxpagarusuario=="Si") { ?>
            <li><a href="?controller=compras&&action=cxpusuario&&id=<?php echo($IdSesion); ?>"><i class="fa fa-circle-o"></i> CxP x Usuario </a></li>
      <?php } ?>
      <?php if ($m_cotizaciones=="Si") { ?>
            <li class=""><a href="?controller=requisiciones&&action=cotizaciones"><i class="fa fa-shopping-cart"></i>Cotizaciones</a></li>
        <?php } ?>
        <?php if ($m_proveedores=="Si") { ?>
            <li class=""><a href="?controller=proveedores&&action=todos"><i class="fa fa-circle-o"></i>Proveedores</a></li>
        <?php } ?>
          </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Centro Distribución</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
      <?php if ($m_inventario=="Si") { ?>
           <li class=""><a href="?controller=index&&action=dashboardalmacen"><i class="fa fa-list"></i> Dashboard Almacén</a></li>
             <li class=""><a href="?controller=inventario&&action=verinventario"><i class="fa fa-list"></i> Inventario</a></li>
     <?php } ?> 
      <?php if ($m_entradasinv=="Si") { ?>
          <li class=""><a href="?controller=inventario&&action=totalentradas"><i class="fa fa-list"></i>Lista Entradas</a></li>
     <?php } ?> 
      <?php if ($m_entradasdetalleinv=="Si") { ?>
            <li class=""><a href="?controller=inventario&&action=entradasdetalletotal"><i class="fa fa-shopping-cart"></i>Detalle Entradas</a></li>
     <?php } ?> 

       <?php if ($m_salidasinv=="Si") { ?>
             <li class=""><a href="?controller=inventario&&action=totalsalidas"><i class="fa fa-list"></i>Listado Salidas</a></li>
     <?php } ?> 
      <?php if ($m_salidasdetalleinv=="Si") { ?>
              <li class=""><a href="?controller=inventario&&action=salidasdetalletotal"><i class="fa fa-check-circle"></i>Detalle Salidas</a></li>
     <?php } ?> 
     
          </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Ventas</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if ($m_clientes=="Si") { ?>
            <li class=""><a href="?controller=clientes&&action=todos"><i class="fa fa-circle-o"></i>Clientes</a></li>
          <?php } ?>

        <?php if ($m_ventas=="Si") { ?>
        <li class=""><a href="?controller=reportes&&action=ventas"><i class="fa fa-check-circle"></i>Reporte Ventas</a></li>
      <?php } ?>

      <?php if ($m_ventasalquiler=="Si") { ?>
         <li class=""><a href="?controller=reportes&&action=prestamos"><i class="fa fa-truck"></i>Ventas x Alquiler </a></li>
      <?php } ?>
      


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
   
    
      
       <?php if ($m_despachos=="Si") { ?>
          <li class=""><a href="?controller=reportes&&action=despachosclientes"><i class="fa fa-exchange"></i>Despachos Cliente</a></li>
         <?php } ?>
        <?php if ($m_combustible=="Si") { ?>
         <li class=""><a href="?controller=reportes&&action=combustibles"><i class="fa fa-train"></i>Combustible</a></li>
        <?php } ?>
        <?php if ($m_horas=="Si") { ?>
        <li class=""><a href="?controller=reportes&&action=horas"><i class="fa fa-train"></i>Kilometraje</a></li>
        <?php } ?>
        <?php if ($m_horas=="Si") { ?>
           <li class=""><a href="?controller=horasmq&&action=horas"><i class="fa fa-train"></i>Horas Máquina</a></li>
      <?php } ?>
          </ul>
        </li>

        
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Informes</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
      <?php if ($m_informe1=="Si") { ?>
        <li class=""><a href="?controller=index&&action=informe1"><i class="fa fa-check-circle"></i>Informe comisiones</a></li>
      <?php } ?>

     
          </ul>
        </li>
       
        
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>