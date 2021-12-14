<?php
ini_set('display_errors', '0');

include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/proyectos.php';
include_once 'controladores/proyectosController.php';
include_once 'modelos/proveedores.php';
include_once 'controladores/proveedoresController.php';
include_once 'modelos/rubros.php';
include_once 'controladores/rubrosController.php';
include_once 'modelos/subrubros.php';
include_once 'controladores/subrubrosController.php';
include_once 'modelos/inventario.php';
include_once 'controladores/inventarioController.php';
$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

//id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones.

if (isset($_POST['daterange'])) {
    $fechaform = $_POST['daterange'];
} elseif (isset($_GET['daterange'])) {
    $fechaform = $_GET['daterange'];
}

date_default_timezone_set("America/Bogota");
$MarcaTemporal  = date('Y-m-d');
$FechaInicioDia = ($MarcaTemporal . " 00:00:000");
$FechaFinalDia  = ($MarcaTemporal . " 23:59:000");
//echo("FECHA QUE LLEGA:".$fechaform."<br>");

if ($fechaform != "") {
    $arreglo         = explode("-", $fechaform);
    $FechaIn         = $arreglo[0];
    $FechaFn         = $arreglo[1];
    $vectorfechaIn   = explode("/", $FechaIn);
    $vectorfechaFn   = explode("/", $FechaFn);
    $arreglofechauno = $vectorfechaIn[2] . "-" . $vectorfechaIn[0] . "-" . $vectorfechaIn[1];
    $arreglofechados = $vectorfechaFn[2] . "-" . $vectorfechaFn[0] . "-" . $vectorfechaFn[1];

    $FechaUno = str_replace(" ", "", $arreglofechauno);
    $FechaDos = str_replace(" ", "", $arreglofechados);
}

// Validación de la fecha en que inicia el Día

if ($FechaUno == "") {
    $FechaStart  = $FechaInicioDia;
    $datofechain = $MarcaTemporal;
} else {
    $FechaStart  = ($FechaUno . " 00:00:000");
    $datofechain = $FechaUno;
}
// Validación de la fecha en que Termina el Día
if ($FechaDos == "") {
    $FechaEnd       = $FechaFinalDia;
    $datofechafinal = $MarcaTemporal;
} else {
    $FechaEnd        = ($FechaDos . " 23:59:000");
    $limpiarvariable = str_replace(" ", "", $FechaDos);
    $datofechafinal  = $limpiarvariable;
}

?>

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Content Wrapper. Contains page content -->



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Recepción OC</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <!--<li class="breadcrumb-item active"><a href="?controller=equipos&&action=todos">Equipos</a></li>-->
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


            <!-- ESTE DIV LO USO PARA CENTRAR EL FORMULARIO -->
            <!-- left column -->
            <div class="col-md-12">
              <?php

//require_once 'formulario.php';
?>
            </div>

<div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Pendientes Recibir</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Recibidas</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Con devolución</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
<!--=====================================
=            Tab uno            =
======================================-->

            <div class="clearfix">
                <div class="pull-left tableTools-container"></div>
            </div>
        <div class="table-responsive mailbox-messages">
            <!-- Inicio de la tabla -->
              <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 13px;">
            <tfoot style="display: table-header-group;">

                                      <th style="background-color: #fcf8e3" class="success">
                                          <input type="checkbox" id="seleccionar-todos"> todos
                                      </th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                      <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                        <th style="background-color: #fcf8e3" class="success"></th>


                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
                <th>OC-N.</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Proveedor</th>
                <th>Pago a</th>
                <th>Factura Número</th>
                <th>Vr. Factura</th>
                <th>Acción</th>
            </tr>
            <tr>
                <th>OC-N.</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Proveedor</th>
                <th>Pago a</th>
                <th>Factura Número</th>
                <th>Vr. Factura</th>
                <th>Acción</th>
            </tr>
          </thead>
       <tbody>
            <?php
$res    = Inventario::todospendienterecibir();
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $id                     = $campo['id'];
    $fecha_reporte          = $campo['fecha_reporte'];
    $imagen                 = $campo['imagen_cot'];
    $valor_total            = $campo['valor_total'];
    $valor_retenciones      = $campo['valor_retenciones'];
    $valor_iva              = $campo['valor_iva'];
    $estado_orden           = $campo['estado_orden'];
    $rubro_id               = $campo['rubro_id'];
    $subrubro_id            = $campo['subrubro_id'];
    $vencimiento            = $campo['vencimiento'];
    $proveedor_id_proveedor = $campo['proveedor_id_proveedor'];
    $medio_pago             = $campo['medio_pago'];
    $marca_temporal         = $campo['marca_temporal'];
    $observaciones          = $campo['observaciones'];
    $usuario_creador        = $campo['usuario_creador'];
    $numfactura             = $campo['factura'];
    $estado_recibido        = $campo['estado_recibido'];


    $nomproveedor  = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
    $nomreportador = usuarios::obtenerNombreUsuario($usuario_creador);
    $totalpago     = $valor_total - $valor_retenciones - $abonos;

    # ==================================================
    # =           Validación de los estados            =
    # ==================================================

    if ($estado_orden == "1") {
        $nomestado = "<small style='color:red;' class='label pull-left bg-red'>Sin Factura</small>";
    } elseif ($estado_orden == "2") {
        $nomestado = "<small style='color:green;' class='label pull-left bg-green'>Facturada</small>";
    } else {
        $nomestado = "Sin Estado";
    }

    # ========================================================
    # =           Verificación de Rubro - Subrubro           =
    # ========================================================

    if ($rubro_id == 0) {
        $nombrerubro = "<span class='text-danger'><strong>Sin clasificar</strong></span>";
    } else {
        $nombrerubro = Rubros::obtenerNombreRubro($rubro_id);
    }

    if ($subrubro_id == 0) {
        $nombresubrubro = "<span class='text-danger'><strong>Sin clasificar</strong></span>";
    } else {
        $nombresubrubro = Subrubros::obtenerNombreSubrubro($subrubro_id);
    }

    # =========================================
    # =           Inicio de la FIla           =
    # =========================================

    # =================================================================================
    # =           Verificamos que no muestre las Ordenes que están en cero            =
    # =================================================================================
    
    if ($marca_temporal!="0000-00-00 00:00:00") {

    ?>
            <tr>
                <td id="listado">

                  <?php
echo ("OC00" . $id);
    if ($imagen != "0") {
        ?>
                   <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Ver Cotización</i>
              </a>
                  <?php
} else {
        echo "<i class='tooltip-danger text-danger fa fa-unlink'>Sin Cotización<i>";
    }

    ?>

                </td>
                <td><?php echo ($fecha_reporte); ?></td>
                <td><?php echo ($nomestado); ?><br>
                    
                        <?php if ($estado_recibido=='Recibido Ok') {
                        echo("<small class='label pull-left bg-green'>".$estado_recibido."<small>");
                    } else{
                         echo("<small class='label pull-left bg-gray'>".$estado_recibido."<small>");
                    }
                ?>
                </td>
                <td><?php echo ($nomproveedor); ?></td>
                <td><?php echo ($medio_pago); ?></td>
                <td><?php echo ($numfactura); ?></td>
                <td><?php echo ("$" . number_format($totalpago)); ?></td>
                 <td>
                  <a href="vistas/compras/cotizaciones_print.php?id=<?php echo ($proveedor_id_proveedor); ?>&&idcompra=<?php echo ($id); ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i></a>
                 <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle">
                          Acción
                          <span class="ace-icon fa fa-caret-down icon-on-right"></span>
                        </button>

                        <ul class="dropdown-menu dropdown-info dropdown-menu-right">

           <li>
                <a href="?controller=compras&&action=verdetalle&&id=<?php echo ($id); ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Detalle">
                <i class="fa fa-list bigger-110 "> Detalle</i>
              </a>
            </li>
             <li>
                             <a href="?controller=compras&&action=editar&&id=<?php echo $id; ?>&&vereditar=1" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Subir Soporte">
                <i class="fa fa-edit bigger-110 "> Subir Soporte</i>
              </a>
                          </li>
             <li>
                <a href="?controller=inventario&&action=cargarentradaoc&&id=<?php echo ($id); ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Detalle">
                <i class="fa fa-list bigger-110 "> Recibir/Cargar Inventario</i>
              </a>
            </li>
              <?php
if ($imagen != "0") {
        ?>
                    <li>
             <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Ver Cotización</i>
              </a>
                          </li>

                          <li>
               <a download="Soporte" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "> Descargar Cotización</i>
                </a>
                          </li>
                  <?php
} else {
        ?>
                  <li>
             <a target="_blank" href="#"  class="tooltip-primary text-danger" title="Ver Soporte">
                <i class="fa fa-unlink bigger-110 "> Sin Cotización</i>
              </a>
                          </li>

                  <?php
}

    ?>


                        </ul>
                      </div>
              </td>
            </tr>
            <?php
        }
}
?>
          </tbody>
          </table>
            <!-- Final de la tabla -- >

          <!-- /.box -->
        </div>

<!--====  End of Tab uno  ====-->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
<!--=====================================
=            Tab dos            =
======================================-->

            <div class="clearfix">

         <div class="pull-left tableTools-container2"></div>
            </div>
        <div class="table-responsive mailbox-messages">
            <!-- Inicio de la tabla -->
              <table id="cotizaciones2" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 13px;">
            <tfoot style="display: table-header-group;">

                                      <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                      <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                        <th style="background-color: #fcf8e3" class="success"></th>


                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">

                <th>OC-N.</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Proveedor</th>
                <th>Pago a</th>
                <th>Factura Número</th>
                <th>Vr. Factura</th>
                <th>Acción</th>
            </tr>
            <tr>

                <th>OC-N.</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Proveedor</th>
                <th>Pago a</th>
                <th>Factura Número</th>
                <th>Vr. Factura</th>
                <th>Acción</th>
            </tr>
          </thead>
       <tbody>
            <?php
$res2    = Inventario::todosrecibido();
$camposb = $res2->getCampos();
foreach ($camposb as $campo2) {
    $id                     = $campo2['id'];
    $fecha_reporte          = $campo2['fecha_reporte'];
    $imagen                 = $campo2['imagen_cot'];
    $valor_total            = $campo2['valor_total'];
    $valor_retenciones      = $campo2['valor_retenciones'];
    $valor_iva              = $campo2['valor_iva'];
    $estado_orden           = $campo2['estado_orden'];
    $rubro_id               = $campo2['rubro_id'];
    $subrubro_id            = $campo2['subrubro_id'];
    $vencimiento            = $campo2['vencimiento'];
    $proveedor_id_proveedor = $campo2['proveedor_id_proveedor'];
    $medio_pago             = $campo2['medio_pago'];
    $marca_temporal         = $campo2['marca_temporal'];
    $observaciones          = $campo2['observaciones'];
    $usuario_creador        = $campo2['usuario_creador'];
    $facura                 = $campo2['factura'];
    $estado_recibido        = $campo2['estado_recibido'];

    $nomproveedor  = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
    $nomreportador = usuarios::obtenerNombreUsuario($usuario_creador);
    $totalpago     = $valor_total - $valor_retenciones - $abonos;

    # ==================================================
    # =           Validación de los estados            =
    # ==================================================

    if ($estado_orden == "1") {
        $nomestado = "<small style='color:red;' class='label pull-left bg-red'>Sin Facturar</small>";
    } elseif ($estado_orden == "2") {
        $nomestado = "<small style='color:green;' class='label pull-left bg-green'>Facturado</small>";
    } else {
        $nomestado = "Sin Estado";
    }

    # ========================================================
    # =           Verificación de Rubro - Subrubro           =
    # ========================================================

    if ($rubro_id == 0) {
        $nombrerubro = "<span class='text-danger'><strong>Sin clasificar</strong></span>";
    } else {
        $nombrerubro = Rubros::obtenerNombreRubro($rubro_id);
    }

    if ($subrubro_id == 0) {
        $nombresubrubro = "<span class='text-danger'><strong>Sin clasificar</strong></span>";
    } else {
        $nombresubrubro = Subrubros::obtenerNombreSubrubro($subrubro_id);
    }

    # =========================================
    # =           Inicio de la FIla           =
    # =========================================

    ?>
            <tr>
                <td>

                  <?php
echo ("OC00" . $id);
    if ($imagen != "0") {
        ?>
            <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Ver Cotización</i>
            </a>
                  <?php
} else {
        echo "<i class='tooltip-danger text-danger fa fa-unlink'>Sin Cotización<i>";
    }

    ?>

                </td>
                <td><?php echo ($fecha_reporte); ?></td>
                  <td>
                    
                        <?php if ($estado_recibido=='Recibido Ok') {
                        echo("<small class='label pull-left bg-green'>".$estado_recibido."<small>");
                    } else{
                         echo("<small class='label pull-left bg-gray'>".$estado_recibido."<small>");
                    }
                ?>
                </td>
                <td><?php echo ($nomproveedor); ?></td>
                <td><?php echo ($medio_pago); ?></td>
                <td><?php echo ($factura); ?></td>
                <td><?php echo ("$" . number_format($totalpago)); ?></td>
                 <td>
                  <a href="vistas/compras/cotizaciones_print.php?id=<?php echo ($proveedor_id_proveedor); ?>&&idcompra=<?php echo ($id); ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i></a>
                 <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle">
                          Acción
                          <span class="ace-icon fa fa-caret-down icon-on-right"></span>
                        </button>

                        <ul class="dropdown-menu dropdown-info dropdown-menu-right">

           <li>
                <a href="?controller=compras&&action=verdetalle&&id=<?php echo ($id); ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Detalle">
                <i class="fa fa-list bigger-110 "> Detalle</i>
              </a>
                          </li>


              <?php
if ($imagen != "0") {
        ?>
                    <li>
             <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Ver Cotización</i>
              </a>
                          </li>
                          <li>
               <a download="Soporte" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Cotización">
                <i class="fa fa-cloud-download bigger-110 "> Descargar Cotización</i>
                </a>
                          </li>
                  <?php
} else {
        ?>
                  <li>
             <a target="_blank" href="#"  class="tooltip-primary text-danger" title="Ver Soporte">
                <i class="fa fa-unlink bigger-110 "> Sin Cotización</i>
              </a>
                          </li>

                  <?php
}

    ?>


                        </ul>
                      </div>
              </td>
            </tr>
            <?php
}
?>
          </tbody>
          </table>
            <!-- Final de la tabla -- >

          <!-- /.box -->
        </div>

<!--====  End of Tab dos  ====-->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">

<!--=====================================
=            Tab Tres            =
======================================-->

            <div class="clearfix">

         <div class="pull-left tableTools-container3"></div>
            </div>
        <div class="table-responsive mailbox-messages">
            <!-- Inicio de la tabla -->
              <table id="cotizaciones3" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 13px;">
            <tfoot style="display: table-header-group;">

                                      <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                      <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                        <th style="background-color: #fcf8e3" class="success"></th>


                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">

              <th>OC-N.</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Proveedor</th>
                <th>Pago a</th>
                <th>Factura Número</th>
                <th>Vr. Factura</th>
                <th>Acción</th>
            </tr>
            <tr>

              <th>OC-N.</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Proveedor</th>
                <th>Pago a</th>
                <th>Factura Número</th>
                <th>Vr. Factura</th>
                <th>Acción</th>
            </tr>
          </thead>
       <tbody>
            <?php
$res3    = Inventario::todosdevolucion();
$camposc = $res3->getCampos();
foreach ($camposc as $campo3) {
    $id                     = $campo3['id'];
    $fecha_reporte          = $campo3['fecha_reporte'];
    $imagen                 = $campo3['imagen'];
    $valor_total            = $campo3['valor_total'];
    $valor_retenciones      = $campo3['valor_retenciones'];
    $valor_iva              = $campo3['valor_iva'];
    $estado_orden           = $campo3['estado_orden'];
    $rubro_id               = $campo3['rubro_id'];
    $subrubro_id            = $campo3['subrubro_id'];
    $vencimiento            = $campo3['vencimiento'];
    $proveedor_id_proveedor = $campo3['proveedor_id_proveedor'];
    $medio_pago             = $campo3['medio_pago'];
    $marca_temporal         = $campo3['marca_temporal'];
    $observaciones          = $campo3['observaciones'];
    $usuario_creador        = $campo3['usuario_creador'];
    $Factura                = $campo3['factura'];

    $nomproveedor  = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
    $nomreportador = usuarios::obtenerNombreUsuario($usuario_creador);
    $totalpago     = $valor_total - $valor_retenciones - $abonos;

    # ==================================================
    # =           Validación de los estados            =
    # ==================================================

    if ($estado_orden == "1") {
        $nomestado = "<small style='color:red;' class='label pull-left bg-red'>Sin Facturar</small>";
    } elseif ($estado_orden == "2") {
        $nomestado = "<small style='color:green;' class='label pull-left bg-green'>Facturado</small>";
    } else {
        $nomestado = "Sin Estado";
    }

    # ========================================================
    # =           Verificación de Rubro - Subrubro           =
    # ========================================================

    if ($rubro_id == 0) {
        $nombrerubro = "<span class='text-danger'><strong>Sin clasificar</strong></span>";
    } else {
        $nombrerubro = Rubros::obtenerNombreRubro($rubro_id);
    }

    if ($subrubro_id == 0) {
        $nombresubrubro = "<span class='text-danger'><strong>Sin clasificar</strong></span>";
    } else {
        $nombresubrubro = Subrubros::obtenerNombreSubrubro($subrubro_id);
    }

    # =========================================
    # =           Inicio de la FIla           =
    # =========================================

    ?>
            <tr>
                <td>

                  <?php
echo ("OC00" . $id);
    if ($imagen != "0") {
        ?>
                   <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Ver Factura</i>
              </a>
                  <?php
} else {
        echo "<i class='tooltip-danger text-danger fa fa-unlink'>Sin Factura<i>";
    }

    ?>

                </td>
                <td><?php echo ($fecha_reporte); ?></td>
                <td><?php echo ($nomestado); ?></td>
                <td><?php echo ($nomproveedor); ?></td>
                <td><?php echo ($medio_pago); ?></td>
                <td><?php echo ($factura); ?></td>
                <td><?php echo ("$" . number_format($totalpago)); ?></td>
                 <td>
                  <a href="vistas/compras/cotizaciones_print.php?id=<?php echo ($proveedor_id_proveedor); ?>&&idcompra=<?php echo ($id); ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i></a>
                 <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle">
                          Acción
                          <span class="ace-icon fa fa-caret-down icon-on-right"></span>
                        </button>

                        <ul class="dropdown-menu dropdown-info dropdown-menu-right">

           <li>
                <a href="?controller=compras&&action=verdetalle&&id=<?php echo ($id); ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Detalle">
                <i class="fa fa-list bigger-110 "> Detalle</i>
              </a>
                          </li>


              <?php
if ($imagen != "0") {
        ?>
                    <li>
             <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Factura">
                <i class="fa fa-eye bigger-110 "> Ver Factura</i>
              </a>
                          </li>
                          <li>
               <a download="Soporte" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Factura">
                <i class="fa fa-cloud-download bigger-110 "> Descargar Facura</i>
                </a>
                          </li>
                  <?php
} else {
        ?>
                  <li>
             <a target="_blank" href="#"  class="tooltip-primary text-danger" title="Ver Factura">
                <i class="fa fa-unlink bigger-110 "> Sin Factura</i>
              </a>
                          </li>

                  <?php
}

    ?>


                        </ul>
                      </div>
              </td>
            </tr>
            <?php
}
?>
          </tbody>
          </table>
            <!-- Final de la tabla -- >

          <!-- /.box -->
        </div>

<!--====  End of Tab uno  ====-->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>






          </div> <!-- FIN DE ROW-->
        </div><!-- FIN DE CONTAINER FORMULARIO-->
      </div> <!-- Fin Row -->
    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->




</div> <!-- Fin Content-Wrapper -->

<script>

  function marcardespacho(id){
    var valores = document.getElementsByName("inputdespachos");
    var valoresconcant = "";
    for (i = 0; i < valores.length; i++) {
        var idelemento = valores[i].id;
        var valor = valores[i].value;
        var checked = valores[i].checked;

        if (checked==true){
          if (valoresconcant == "") {
              valoresconcant = idelemento;
          } else {
              valoresconcant = valoresconcant + "," + idelemento;
          }
        }

    }

    var btn = document.getElementById("btnrelacionar");

    if (valoresconcant==""){
      btn.style.display = "none";
    }else{
      btn.style.display = "";
      btn.href = "?controller=compras&action=cambiarestadocreditos&des="+valoresconcant+"&id="+id;
    }

  }


        $(document).ready(function() {
} );
    </script>
<script>
function eliminar(id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=compras&&action=eliminar&&id="+id;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>
<!-- Inicio Libreria formato moneda -->


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
          <script src="dist/js/buttons.colVis.min.js"></script>
          <script src="dist/js/buttons.print.min.js"></script>
           <script src="dist/js/dataTables.select.min.js"></script>
           <script src="dist/js/buttons.flash.min.js"></script>



<script>
   function format2(n, currency) {
    return currency + " " + n.toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
function formatmoneda(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
        $(document).ready(function() {
    $('#example').DataTable( {
         "searching": true,
        "ordering": true,
        "paging":   true,
        "info":     true,
        "aLengthMenu": [[100, 200, 300, -1], [100, 200, 300, "Todas"]],
    "pageLength": 100,


    } );
} );
    </script>
<script type="text/javascript">
      jQuery(function($) {

$('#cotizaciones thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } );

    var table = $('#cotizaciones').DataTable({
      responsive:true,
      "ordering": true,
        "order": [[ 1, "asc" ]],
        orderCellsTop: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se ha encontrado nada - Lo sentimos",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
           },

    "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

          select: {
            style: 'multi'
          },
           "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };


            // Total over all pages

            pageTotal6 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


               $( api.column( 6 ).footer() ).html(
                '$'+formatmoneda(pageTotal6,'' )
                 );

        },

    });

    // Apply the search
    table.columns().every(function (index) {
        $('#cotizaciones thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

        var myTable =
        $('#cotizaciones')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,


          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,



          } );





        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons( myTable, {
         buttons: [


            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {

            "extend": "excelHtml5",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"

            },
            {

            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
                     pageSize: 'LEGAL',
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'Está impresión se produjo desde la App'
            }
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container') );


        setTimeout(function() {
          $($('.tableTools-container')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);


      });
    </script>

<script type="text/javascript">
      jQuery(function($) {

$('#cotizaciones2 thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones2 thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } );

    var table = $('#cotizaciones2').DataTable({
      responsive:true,
      "ordering": true,
        "order": [[ 1, "asc" ]],
        orderCellsTop: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se ha encontrado nada - Lo sentimos",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
           },

    "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

          select: {
            style: 'multi'
          },
           "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };


            // Total over all pages



           pageTotal6 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


               $( api.column( 6 ).footer() ).html(
                '$'+formatmoneda(pageTotal6,'' )
                 );


        },

    });

    // Apply the search
    table.columns().every(function (index) {
        $('#cotizaciones2 thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

        var myTable =
        $('#cotizaciones2')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,


          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,



          } );





        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons( myTable, {
         buttons: [


            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {

            "extend": "excelHtml5",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"

            },
            {

            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
                     pageSize: 'LEGAL',
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'Está impresión se produjo desde la App'
            }
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container2') );


        setTimeout(function() {
          $($('.tableTools-container2')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);


      });
    </script>

<script type="text/javascript">
      jQuery(function($) {

$('#cotizaciones3 thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones3 thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } );

    var table = $('#cotizaciones3').DataTable({
      responsive:true,
      "ordering": true,
        "order": [[ 1, "asc" ]],
        orderCellsTop: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se ha encontrado nada - Lo sentimos",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
           },

    "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

          select: {
            style: 'multi'
          },
           "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };


            // Total over all pages



           pageTotal6 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


               $( api.column( 6 ).footer() ).html(
                '$'+formatmoneda(pageTotal6,'' )
                 );


        },

    });

    // Apply the search
    table.columns().every(function (index) {
        $('#cotizaciones3 thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

        var myTable =
        $('#cotizaciones3')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,


          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,



          } );





        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons( myTable, {
         buttons: [


            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {

            "extend": "excelHtml5",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"

            },
            {

            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
                     pageSize: 'LEGAL',
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'Está impresión se produjo desde la App'
            }
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container3') );


        setTimeout(function() {
          $($('.tableTools-container3')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);


      });
    </script>
    <script>
      $(function(){
        $('#seleccionar-todos').change(function() {
          $('#listado > input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });
      });
</script>
