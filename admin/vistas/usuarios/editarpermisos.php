<?php 
  $id=$_GET['id'];
 ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Permisos Usuario <?php echo utf8_encode(Usuarios::obtenerNombreUsuario($id)) ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item"><a href="?controller=usuarios&&action=todos">Usuarios</a></li>
            <li class="breadcrumb-item active">Editar Permisos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
    <div class="col-lg-12">
    <div class="card card-primary">
      <div class="card-body">
        
      <div class="card-header">
        <h3 class="card-title">Permisos </h3>
      </div>
      <a href="?controller=usuarios&&action=activartodo&&id=<?php echo($id) ?>" class="btn btn-success" style="float: right;"><i class="fa fa-check bigger-110 "></i> Conceder Todo</a>

       <a href="?controller=usuarios&&action=desactivartodo&&id=<?php echo($id) ?>" class="btn btn-danger" style="float: right;"><i class="fa fa-check bigger-110 "></i> Bloquear Todo</a>

          <table id="cotizaciones" class="table table-hover table-striped table-bordered">
          <thead>
            <tr>
               <th>Nº</th>
              <th>Menú</th>
              <th>Permiso Concedido</th>
            </tr>
          </thead>
          <tbody>
            <?php
  $campos = $campos->getCampos();
            foreach ($campos as $campo){
  $id_usuario = $campo['id_usuario'];
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
  $m_cuentasxpagarusuario= $campo['m_cuentasxpagarusuario'];
            }
            ?>
              <tr class="info" style="border-style: solid; border-color: #777">
              <td></td>
              <td> <strong>Párametrización General</strong></td>
              <td></td>
            </tr>
            <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Usuarios:</strong> Crear,editar,conceder permisos,eliminar </td>
              <td><?php 
              if ($m_usuarios=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_usuarios');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_usuarios');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>
            <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Cargos:</strong> Crear,editar,conceder permisos,eliminar </td>
              <td><?php 
              if ($m_cargos=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_cargos');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_cargos');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>
            <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Tipo Documentos:</strong> Parámetriza los documentos estándar para la gestión documental</td>
              <td><?php 
              if ($m_documentos=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_documentos');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_documentos');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>
            <tr>
               <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Proyectos:</strong> Crea,edita,elimina proyectos</td>
              <td><?php 
              if ($m_proyectos=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_proyectos');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_proyectos');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>
              <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Estaciones:</strong> Crea,edita,elimina estaciones</td>
              <td><?php 
              if ($m_estaciones=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_estaciones');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_estaciones');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>
              <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Destinos:</strong> Crea,edita,elimina los destinos de los despachos de productos</td>
              <td><?php 
              if ($m_destinos=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_destinos');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_destinos');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>
               <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Rubros:</strong> Parámetriza y organiza por rubros principales los gastos que se registren en el sistema</td>
              <td><?php 
              if ($m_rubros=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_rubros');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_rubros');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

             <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Sub-Rubros:</strong> Parámetriza y organiza con sub categorias más detallada los gastos que se registren en el sistema (Sub-Rubros) <small>Los subrubros están asociados directamente a la categoria principal (Rubros)</small></td>
              <td><?php 
              if ($m_subrubro=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_subrubro');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                                                                                 ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_subrubro');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

             <tr>
               <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Carpetas:</strong> Crea,edita,elimina las carpetas para las diferentes áreas</td>
              <td><?php 
              if ($m_carpetas=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_carpetas');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_carpetas');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

           
            <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Productos:</strong> Crea,edita,elimina los productos</td>
              <td><?php 
              if ($m_productos=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_productos');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_productos');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>
           
          
            <tr class="info" style="border-style: solid; border-color: #777">
              <td></td>
              <td> <strong>Talento Humano</strong></td>
              <td></td>
            </tr>

            <tr>
               <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Funcionarios:</strong> Crea,edita,elimina, control del tiempo laborado de cada empleado, registro de novedades (incapacidades, permisos, llamados de atención), del recurso humano de la empresa</td>
              <td><?php 
              if ($m_empleados=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_empleados');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_empleados');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>

              <tr>
               <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Gestion Documental Empleados:</strong> Crea,edita,elimina los documentos de todo el recurso humano de la empresa.</td>
              <td><?php 
              if ($m_gdocempleados=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_gdocempleados');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_gdocempleados');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>
             <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Informe de Novedades:</strong> Exporte a pdf, Excel o filtre por empleado las novedades reportadas durante un rango de fecha.</td>
              <td><?php 
              if ($m_novedades=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_novedades');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_novedades');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>
             <tr class="info" style="border-style: solid; border-color: #777">
              <td></td>
              <td> <strong>Módulo Cuentas </strong></td>
              <td></td>
            </tr>
             <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Cuentas:</strong> Crea,edita,elimina todos los movimientos financieros de la empresa. <small>(Ingresos, Egresos, préstamo entre socios, préstamos externos)</small></td>
              <td><?php 
              if ($m_cuentas=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_cuentas');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_cuentas');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>


 <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Cruce Cuentas:</strong> Valida los estados de cuenta<small>(Ingresos, Egresos, préstamo entre socios, préstamos externos)</small></td>
              <td><?php 
              if ($m_crucecuentas=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_crucecuentas');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_crucecuentas');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>

            <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Gestion Documental Cuentas:</strong> Crea,edita,elimina los documentos financieros principales de la empresa.</td>
              <td><?php 
              if ($m_gdoccuentas=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_gdoccuentas');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_gdoccuentas');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>
             <tr class="info" style="border-style: solid; border-color: #777">
              <td></td>
              <td> <strong>Módulo Cajas </strong></td>
              <td></td>
            </tr>
             <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Cajas:</strong> Crea,edita,elimina todos los movimientos de las cajas menores. <small>(Ingresos, Egresos, préstamo entre cajas)</small></td>
              <td><?php 
              if ($m_cajas=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_cajas');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_cajas');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>
            <tr>
            <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Informe Cajas Menores:</strong> Exporte a pdf, Excel o filtre por cada caja menor los movimimientos reportados durante un rango de fecha.</td>
              <td><?php 
              if ($m_consolidadocajas=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_consolidadocajas');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_consolidadocajas');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>
              <tr>
            <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Egresos Contabilizados:</strong> Exporte a pdf, Excel o filtre por cada caja menor los movimimientos reportados durante un rango de fecha.</td>
              <td><?php 
              if ($m_egresoscajacontador=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_egresoscajacontador');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_egresoscajacontador');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>
            <tr class="info" style="border-style: solid; border-color: #777">
              <td></td>
              <td> <strong>Módulo Equipos </strong></td>
              <td></td>
            </tr>
             <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Equipos:</strong> Crea,edita,elimina todos los equipos de la empresa. </small></td>
              <td><?php 
              if ($m_equipos=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_equipos');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_equipos');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>
            <tr>
              <td><i class="fa fa-th-list"></i></td>
               <td class=""><strong>Gestion Documental Equipos:</strong> Crea,edita,elimina los documentos de todos los equipos de la empresa.</td>
              <td><?php 
              if ($m_gdocequipos=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_gdocequipos');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_gdocequipos');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>
            <tr>
               <td><i class="fa fa-th-list"></i></td>
               <td class=""><strong>Tipo de Mantenimiento Equipos:</strong> Párametriza, Crea,edita,elimina los diferentes tipo de mantenimientos de los equipos de la empresa.</td>
              <td><?php 
              if ($m_mantenimientos=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_mantenimientos');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_mantenimientos');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>
              <tr  class="info" style="border-style: solid; border-color: #777">
              <td></td>
              <td> <strong>Módulo Concreto </strong></td>
              <td></td>
            </tr>
             <tr>
              <td><i class="fa fa-th-list"></i></td>
               <td class=""><strong>Campamentos:</strong> Crea,edita,elimina los campamentos de despacho de concreto</td>
              <td><?php 
              if ($m_campamentos=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_campamentos');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_campamentos');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>
            
            <tr style="display: none;">
              <td>24.</td>
              <td class=""><strong>Reporte Despacho Concreto:</strong> Crea,edita,elimina, </td>
              <td><?php 
              if ($m_concreto=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_concreto');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_concreto');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>
            <tr class="info" style="border-style: solid; border-color: #777">
              <td></td>
              <td> <strong>Almacén</strong></td>
              <td></td>
            </tr>

             <tr>
            <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Categorias - Unidades Medida Insumos:</strong> Crea,edita,elimina.</td>
              <td><?php 
              if ($m_categoriains=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_categoriains');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_categoriains');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>
             <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Insumos:</strong> Crea,edita,elimina insumos, servicios, equipos temporales.</td>
              <td><?php 
              if ($m_insumos=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_insumos');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_insumos');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

              <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Recibir OC:</strong> Recepción y registro de las entradas a inventario por orden de compra</td>
              <td><?php 
              if ($m_rqentrada=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_rqentrada');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_rqentrada');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>


              <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Requisiciones:</strong> Gestión de estados de todas las requisiciones solicitadas por los usuarios (Aplica para el Rol de Almacén)</td>
              <td><?php 
              if ($m_rq=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_rq');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_rq');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

              <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Salida de Requisiciones:</strong> Registro de las salidas a inventario por orden de compra a usuarios y equipos</td>
              <td><?php 
              if ($m_rqsalida=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_rqsalida');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_rqsalida');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

             <tr class="info" style="border-style: solid; border-color: #777">
              <td></td>
              <td> <strong>Compras </strong></td>
              <td></td>
            </tr>

              <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Vista compras (Contabilidad):</strong> Crea,edita,elimina, agrega o quita compras</td>
              <td><?php 
              if ($m_compras=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_compras');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_compras');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

             <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Subir cuenta por pagar:</strong> Acceso al usuario para poder subir cuentas por pagar, que se ven reflejadas en el módulo compras.</td>
              <td><?php 
              if ($m_cuentasxpagar=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_cuentasxpagar');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_cuentasxpagar');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>
             <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Cuentas por pagar Usuario:</strong> Permite al usuario ver solo las cuentas por pagar que ha subido al sistema.</td>
              <td><?php 
              if ($m_cuentasxpagarusuario=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_cuentasxpagarusuario');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_cuentasxpagarusuario');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

             <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Cotizaciones:</strong> Autorización de compras </td>
              <td><?php 
              if ($m_cotizaciones=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_cotizaciones');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_cotizaciones');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

             <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Proveedores:</strong> Crea,edita,elimina los proveedores</td>
              <td><?php 
              if ($m_proveedores=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_proveedores');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_proveedores');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

              <tr class="info" style="border-style: solid; border-color: #777">
              <td></td>
              <td> <strong>Centro de Distribución </strong></td>
              <td></td>
            </tr>
              <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Inventarios:</strong> Crea,edita,elimina y gestiona el inventario</td>
              <td><?php 
              if ($m_inventario=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_inventario');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_inventario');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

             <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Entradas Inventario:</strong> Crea,edita,elimina y gestiona las entradas de inventario</td>
              <td><?php 
              if ($m_entradasinv=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_entradasinv');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_entradasinv');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

             <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Detalle Entradas Inventario:</strong> Visualizaciónde todas las entradas de inventario por Oc</td>
              <td><?php 
              if ($m_entradasdetalleinv=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_entradasdetalleinv');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_entradasdetalleinv');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

             <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Salidas Inventario:</strong> Crea,edita,elimina y gestiona las salidas de inventario</td>
              <td><?php 
              if ($m_salidasinv=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_salidasinv');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_salidasinv');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

             <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Detalle Salidas Inventario:</strong> Visualizaciónde todas las salidas de inventario por Oc</td>
              <td><?php 
              if ($m_salidasdetalleinv=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_salidasdetalleinv');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_salidasdetalleinv');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

              <tr class="info" style="border-style: solid; border-color: #777">
              <td></td>
              <td> <strong>Ventas </strong></td>
              <td></td>
            </tr>

            
            <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Factura Despachos:</strong> Crea,edita,elimina, agrega o quita lo facturado</td>
              <td><?php 
              if ($m_ventas=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_ventas');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_ventas');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>
             <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Factura Alquiler:</strong> Crea,edita,elimina, agrega o quita lo facturado del alquiler de equipos</td>
              <td><?php 
              if ($m_ventasalquiler=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_ventasalquiler');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_ventasalquiler');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>
             <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Clientes:</strong> Crea,edita,elimina los clientes</td>
              <td><?php 
              if ($m_clientes=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_clientes');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_clientes');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

             <tr class="info" style="border-style: solid; border-color: #777">
              <td></td>
              <td> <strong>Reportes Diarios </strong></td>
              <td></td>
            </tr>

           

             <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Registro Despacho clientes:</strong> Crea,edita,elimina el despacho de productos</td>
              <td><?php 
              if ($m_despachos=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_despachos');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_despachos');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

             <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Registro Despacho combustible:</strong> Crea,edita,elimina el consumo de combustible</td>
              <td><?php 
              if ($m_combustible=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_combustible');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_combustible');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

             <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Registro Kilómetros de las volquetas:</strong> Crea,edita,elimina las horas/kilómetros de las volquetas</td>
              <td><?php 
              if ($m_horas=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_horas');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_horas');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }

               ?></td>
            </tr>

            <tr>
              <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Registro Horas máquina:</strong> Crea,edita,elimina las horas de las máquinas</td>
              <td><?php 
              if ($m_horasmq=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_horasmq');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_horasmq');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>

              <tr class="info" style="border-style: solid; border-color: #777">
              <td></td>
              <td> <strong>Módulo Informes </strong></td>
              <td></td>
            </tr>

             <tr>
             <td><i class="fa fa-th-list"></i></td>
              <td class=""><strong>Informe comisiones Operadores:</strong> Visualización mes a mes de las comisiones de operadores</td>
              <td><?php 
              if ($m_informe1=="Si") {
               ?>
                <a href="#" onclick="desactivarpermiso(<?php echo $id_usuario; ?>,'m_informe1');" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
               </a>
               <?php
              }
              else
              {
                ?>
                <a href="#" onclick="activarpermiso(<?php echo $id_usuario; ?>,'m_informe1');" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>
                <?php
              }
               ?></td>
            </tr>
           
            
          </tbody>
          </table>
        </div> <!-- Fin Row -->
      </div> <!-- Fin card -->
    </div>
    </div>



      </div> <!-- Fin Row -->
    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->
</div> <!-- Fin Content-Wrapper -->

<script>
function desactivarpermiso(id,menu){
   desactivarpermiso=confirm("¿Deseas desactivar este permiso?");
   if (desactivarpermiso)
     window.location.href="?controller=usuarios&&action=desactivarmenuPor&&id="+id+"&&menu="+menu;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido desactivar este permiso...')
}
</script>

<script>
function activarpermiso(id,menu){
   activarpermiso=confirm("¿Deseas activar este permiso?");
   if (activarpermiso)
     window.location.href="?controller=usuarios&&action=activarmenuPor&&id="+id+"&&menu="+menu;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido activar este permiso...')
}
</script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>


<!-- page script -->
<script>
  $(function () {
    $('#cotizaciones').DataTable({
      "paging": false,
      "lengthChange": true,
      "lengthMenu": [[100, 150, 250, -1], [100, 150, 250, "All"]],
      "searching": true,
      "order": [[ 0, "asc" ]],
      "ordering": false,
      "info": false,
      "autoWidth": false,
    language: {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Busca por palabra clave:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}

    });
  });
</script>

