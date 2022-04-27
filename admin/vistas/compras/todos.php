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
          <h1 class="m-0 text-dark">Reporte Compras</h1>
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
                                  <div class="row">
        <form action="?controller=compras&&action=todos" method="post" id="FormFechas" autocomplete="off">
         <div class="col-md-8">
                        <div class="form-group">
                          <label>Seleccione el Rango de Fecha<span>*</span></label>
                          <input type="text"  name="daterange" class="form-control" required value="">
                        </div>
                      </div>
          <div class="form-group">
            <div class="col-xs-12 col-sm-6">
              <button class="btn btn-primary btn-sm" type="Submit">Realizar Consulta</button>
          </div>
          </div>
        </form>
        <script type="text/javascript">
  $('input[name="daterange"]').daterangepicker({
    ranges: {
        'Hoy': [moment(), moment()],
        'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
        'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
        'Este Mes': [moment().startOf('month'), moment().endOf('month')],
        'Mes Anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    "locale": {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "desde",
        "toLabel": "hasta",
        "customRangeLabel": "Personalizado",
        "weekLabel": "W",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    },
    //"startDate": "03/24/2019",
    //"endDate": "03/30/2019",
    "opens": "left"
}, function(start, end, label) {
  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});
</script>
      </div>
       <div class="col-sm-12">
        <?php
if ($fechaform != "") {
    ?>
           <h3 class="m-0 text-dark">Reporte Compras Insumos/Servicios del <?php echo (fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></h3>
          <?php
} else {
    ?>
           <h3 class="m-0 text-dark">Reporte Compras Insumos/Servicios últimos 8 días</h3>
          <?php
}

?>

        </div><!-- /.col -->


            <!-- ESTE DIV LO USO PARA CENTRAR EL FORMULARIO -->
            <!-- left column -->
            <div class="col-md-12">
              <?php

//require_once 'formulario.php';
?>
            </div>

<div class="col-md-12">
    <a id="btnrelacionar" href="" class="btn btn-success" style="float: right; display: none; cursor: pointer;"><i class="fa fa-exchange bigger-110 "></i> Cargar Abonos</a>

                  <br><br>
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">OC Insumos</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">OC Servicios</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Oc Equipos</a></li>
               <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">CxP</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
<!--=====================================
=            Tab uno            =
======================================-->

            <div class="clearfix">
                 
                      <div class="pull-right tableTools-container"></div>
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
             <th >Vr. Subtotal</th>
              <th >Vr. Retenciones</th>
              <th >Vr. Iva</th>
              <th >Vr. A Pagar</th>
              <th >Abonos</th>
              <th>Saldo Pendiente</th>
               <th>Acción</th>
            </tr>
            <tr>

              <th>OC-N.</th>
              <th>Fecha</th>
               <th>Estado</th>
              <th>Proveedor</th>
              <th>Pago a</th>
             <th >Vr. Subtotal</th>
              <th >Vr. Retenciones</th>
              <th >Vr. Iva</th>
              <th >Vr. A Pagar</th>
              <th >Abonos</th>
              <th>Saldo Pendiente</th>
               <th>Acción</th>
            </tr>
          </thead>
       <tbody>
            <?php
if ($fechaform != "") {
    $res    = Compras::porfecha($FechaStart, $FechaEnd);
    $campos = $res->getCampos();
} else {
    $campos = $campos->getCampos();
}
foreach ($campos as $campo) {
    $id                     = $campo['id'];
    $fecha_reporte          = $campo['fecha_reporte'];
    $imagen                 = $campo['imagen'];
    $imagen_cot             = $campo['imagen_cot'];
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
    $facturanum             = $campo['factura'];

    $nomproveedor  = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
    $nomreportador = usuarios::obtenerNombreUsuario($usuario_creador);
    $totalpago     = ($valor_total - $valor_retenciones) + $valor_iva;
    $detalleabonos        = Compras::sqlabonos($id);
    $cuentaporpagar= $totalpago-$detalleabonos;

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
                <td id="listado">

            <a style="display:none;" href="?controller=compras&action=cambiarestado&id=<?php echo ($id); ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Detalle">
                <i class="fa fa-dollar bigger-110 "> </i></a>

                  <input type="checkbox" id="<?php echo $id; ?>" name="inputdespachos" onclick="marcardespacho(<?php echo $id; ?>)" style="cursor: pointer;">

                  <?php
echo ("OC00" . $id);
    if ($imagen != "0") {
        ?>
                   <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Factura</i>
              </a>
                  <?php
} else {
        echo "<i class='tooltip-danger text-danger fa fa-unlink'>Factura<i>";
    }

    ?>

     <?php
    if ($imagen_cot != "0") {
        ?>
                   <a target="_blank" href="<?php echo ($imagen_cot); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Cotización</i>
              </a>
                  <?php
} else {
        echo "<i class='tooltip-danger text-danger fa fa-unlink'>Cotización<i>";
    }

    ?>

                </td>
                <td><?php echo ($fecha_reporte); ?></td>
                <td><?php echo ($nomestado); ?></td>
                <td><?php echo ($nomproveedor); ?></td>
                <td><?php echo ($medio_pago); ?>
                    
                <br>
                  <i data-toggle="tooltip" data-placement="left" title="Creada por  por <?php echo($nomreportador." Fecha : ".$marca_temporal); ?>" class="fa fa-question-circle"></i>
                </td>
               
                <td><?php echo ("$" . number_format($valor_total)); ?></td>
                <td><?php echo ("$" . number_format($valor_retenciones)); ?></td>
                 <td><?php echo ("$" . number_format($valor_iva)); ?></td>
                <td><?php echo ("$" . number_format($totalpago)); ?></td>
                 <td><?php echo ("$" . number_format($detalleabonos)); ?></td>
                  <td><?php echo ("$" . number_format($cuentaporpagar)); ?></td>
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
                             <a href="?controller=compras&&action=editar&&id=<?php echo $id; ?>&&vereditar=1" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Editar">
                <i class="fa fa-edit bigger-110 "> Editar</i>
              </a>
                          </li>
                          <li>
                            <a href="#" onclick="eliminar(<?php echo $id; ?>);" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Anular Oc">
                <i class="fa fa-trash bigger-110 "> Anular OC</i>
              </a>
                          </li>
              <?php
if ($imagen != "0") {
        ?>
                    <li>
             <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Ver Soporte</i>
              </a>
                          </li>
                          <li>
               <a download="Soporte" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "> Descargar Soporte</i>
                </a>
                          </li>
                  <?php
} else {
        ?>
                  <li>
             <a target="_blank" href="#"  class="tooltip-primary text-danger" title="Ver Soporte">
                <i class="fa fa-unlink bigger-110 "> Sin Soporte</i>
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
              <div class="tab-pane" id="tab_2">
<!--=====================================
=            Tab dos            =
======================================-->

            <div class="clearfix">
         <div class="pull-right tableTools-container2"></div>
            </div>
        <div class="table-responsive mailbox-messages">
            <!-- Inicio de la tabla -->
              <table id="cotizaciones2" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 13px;">
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
              <th >Vr. Subtotal</th>
              <th >Vr. Retenciones</th>
              <th >Vr. Iva</th>
              <th >Vr. A Pagar</th>
               <th >Abonos</th>
               <th >Saldo Pendiente</th>
               <th>Acción</th>
            </tr>
            <tr>
            <th>OC-N.</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Proveedor</th>
            <th>Pago a</th>
            <th >Vr. Subtotal</th>
            <th >Vr. Retenciones</th>
            <th >Vr. Iva</th>
            <th >Vr. A Pagar</th>
            <th >Abonos</th>
            <th >Saldo Pendiente</th>
            <th>Acción</th>
            </tr>
          </thead>
       <tbody>
            <?php

if ($fechaform != "") {
    $res2    = Compras::porfechaservicios($FechaStart, $FechaEnd);
    $camposb = $res2->getCampos();
} else {
    $res2    = Compras::todosocservicios();
    $camposb = $res2->getCampos();
}

foreach ($camposb as $campo2) {
    $id                     = $campo2['id'];
    $fecha_reporte          = $campo2['fecha_reporte'];
    $imagen                 = $campo2['imagen'];
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
    $facturanum             = $campo2['factura'];

    $nomproveedor  = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
    $nomreportador = usuarios::obtenerNombreUsuario($usuario_creador);
    $totalpago     = ($valor_total - $valor_retenciones) + $valor_iva;
    $detalleabonos        = Compras::sqlabonos($id);
    $cuentaporpagar= $totalpago-$detalleabonos;

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
                <td id="listado">

            <a style="display:none;" href="?controller=compras&action=cambiarestado&id=<?php echo ($id); ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Detalle">
                <i class="fa fa-dollar bigger-110 "> </i></a>
                  <input type="checkbox" id="<?php echo $id; ?>" name="inputdespachos" onclick="marcardespacho(<?php echo $id; ?>)" style="cursor: pointer;">

                  <?php
echo ("OC00" . $id);
    if ($imagen != "0") {
        ?>
                   <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Ver Soporte</i>
              </a>
                  <?php
} else {
        echo "<i class='tooltip-danger text-danger fa fa-unlink'>Sin adjunto<i>";
    }

    ?>

                </td>
                <td><?php echo ($fecha_reporte); ?></td>
                <td><?php echo ($nomestado); ?></td>
                <td><?php echo ($nomproveedor); ?></td>
                <td><?php echo ($medio_pago); ?>
                      <br>
                  <i data-toggle="tooltip" data-placement="left" title="Creada por  por <?php echo($nomreportador." Fecha : ".$marca_temporal); ?>" class="fa fa-question-circle"></i>
                </td>
               
                <td><?php echo ("$" . number_format($valor_total)); ?></td>
                <td><?php echo ("$" . number_format($valor_retenciones)); ?></td>
                 <td><?php echo ("$" . number_format($valor_iva)); ?></td>
                <td><?php echo ("$" . number_format($totalpago)); ?></td>
                <td><?php echo ("$" . number_format($detalleabonos)); ?></td>
                <td><?php echo ("$" . number_format($cuentaporpagar)); ?></td>

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
                             <a href="?controller=compras&&action=editar&&id=<?php echo $id; ?>&&vereditar=1" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Editar">
                <i class="fa fa-edit bigger-110 "> Editar</i>
              </a>
                          </li>
                          <li>
                            <a href="#" onclick="eliminar(<?php echo $id; ?>);" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Eliminar">
                <i class="fa fa-trash bigger-110 "> Eliminar</i>
              </a>
                          </li>
              <?php
if ($imagen != "0") {
        ?>
                    <li>
             <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Ver Soporte</i>
              </a>
                          </li>
                          <li>
               <a download="Soporte" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "> Descargar Soporte</i>
                </a>
                          </li>
                  <?php
} else {
        ?>
                  <li>
             <a target="_blank" href="#"  class="tooltip-primary text-danger" title="Ver Soporte">
                <i class="fa fa-unlink bigger-110 "> Sin Soporte</i>
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
            
             <th >Vr. Subtotal</th>
              <th >Vr. Retenciones</th>
              <th >Vr. Iva</th>
              <th >Vr. A Pagar</th>
              <th>Abonos</th>
              <th>Saldo Pendiente</th>
               <th>Acción</th>
            </tr>
            <tr>

              <th>OC-N.</th>
              <th>Fecha</th>
               <th>Estado</th>
              <th>Proveedor</th>
              <th>Pago a</th>
              <th >Vr. Subtotal</th>
              <th >Vr. Retenciones</th>
              <th >Vr. Iva</th>
              <th >Vr. A Pagar</th>
              <th>Abonos</th>
              <th>Saldo Pendiente</th>
              <th>Acción</th>
            </tr>
          </thead>
       <tbody>
            <?php

if ($fechaform != "") {
    $res3    = Compras::porfechaequipos($FechaStart, $FechaEnd);
    $camposc = $res3->getCampos();
} else {
    $res3    = Compras::todosocequipos();
    $camposc = $res3->getCampos();
}
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
    $facturanum             = $campo3['factura'];

    $nomproveedor  = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
    $nomreportador = usuarios::obtenerNombreUsuario($usuario_creador);
    $totalpago     = ($valor_total - $valor_retenciones) + $valor_iva;
    $detalleabonos        = Compras::sqlabonos($id);
    $cuentaporpagar= $totalpago-$detalleabonos;

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
                <td id="listado">

            <a style="display:none;" href="?controller=compras&action=cambiarestado&id=<?php echo ($id); ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Detalle">
                <i class="fa fa-dollar bigger-110 "> </i></a>
                  <input type="checkbox" id="<?php echo $id; ?>" name="inputdespachos" onclick="marcardespacho(<?php echo $id; ?>)" style="cursor: pointer;">

                  <?php
echo ("OC00" . $id);
    if ($imagen != "0") {
        ?>
                   <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Ver Soporte</i>
              </a>
                  <?php
} else {
        echo "<i class='tooltip-danger text-danger fa fa-unlink'>Sin adjunto<i>";
    }

    ?>

                </td>
                <td><?php echo ($fecha_reporte); ?></td>
                <td><?php echo ($nomestado); ?></td>
                <td><?php echo ($nomproveedor); ?></td>
                <td><?php echo ($medio_pago); ?>
                      <br>
                  <i data-toggle="tooltip" data-placement="left" title="Creada por  por <?php echo($nomreportador." Fecha : ".$marca_temporal); ?>" class="fa fa-question-circle"></i>
                </td>
              
                <td><?php echo ("$" . number_format($valor_total)); ?></td>
                <td><?php echo ("$" . number_format($valor_retenciones)); ?></td>
                 <td><?php echo ("$" . number_format($valor_iva)); ?></td>
                <td><?php echo ("$" . number_format($totalpago)); ?></td>
                 <td><?php echo ("$" . number_format($detalleabonos)); ?></td>
                  <td><?php echo ("$" . number_format($cuentaporpagar)); ?></td>

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
                             <a href="?controller=compras&&action=editar&&id=<?php echo $id; ?>&&vereditar=1" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Editar">
                <i class="fa fa-edit bigger-110 "> Editar</i>
              </a>
                          </li>
                          <li>
                            <a href="#" onclick="eliminar(<?php echo $id; ?>);" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Eliminar">
                <i class="fa fa-trash bigger-110 "> Eliminar</i>
              </a>
                          </li>
              <?php
if ($imagen != "0") {
        ?>
                    <li>
             <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Ver Soporte</i>
              </a>
                          </li>
                          <li>
               <a download="Soporte" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "> Descargar Soporte</i>
                </a>
                          </li>
                  <?php
} else {
        ?>
                  <li>
             <a target="_blank" href="#"  class="tooltip-primary text-danger" title="Ver Soporte">
                <i class="fa fa-unlink bigger-110 "> Sin Soporte</i>
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

<!--====  End of Tab tres  ====-->
              </div>

                <div class="tab-pane" id="tab_4">
<!--=====================================
=            Tab dos            =
======================================-->

            <div class="clearfix">
         <div class="pull-right tableTools-container4"></div>
            </div>
        <div class="table-responsive mailbox-messages">
            <!-- Inicio de la tabla -->
              <table id="cotizaciones4" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 13px;">
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
              <th >Vr. Subtotal</th>
              <th >Vr. Retenciones</th>
              <th >Vr. Iva</th>
              <th >Vr. A Pagar</th>
              <th>Abonos</th>
              <th>Saldo Pendiente</th>
               <th>Acción</th>
            </tr>
            <tr>

              <th>OC-N.</th>
              <th>Fecha</th>
               <th>Estado</th>
              <th>Proveedor</th>
              <th>Pago a</th>
              <th >Vr. Subtotal</th>
              <th >Vr. Retenciones</th>
              <th >Vr. Iva</th>
              <th >Vr. A Pagar</th>
              <th>Abonos</th>
              <th>Saldo Pendiente</th>
              <th>Acción</th>
            </tr>
          </thead>
       <tbody>
            <?php

if ($fechaform != "") {
    $res4    = Compras::porfechacuentasporpagar($FechaStart, $FechaEnd);
    $camposd = $res4->getCampos();
} else {
    $res4    = Compras::todosoccuentasxpagar();
    $camposd = $res4->getCampos();
}
foreach ($camposd as $campo4) {
    $id                     = $campo4['id'];
    $fecha_reporte          = $campo4['fecha_reporte'];
    $imagen                 = $campo4['imagen'];
    $valor_total            = $campo4['valor_total'];
    $valor_retenciones      = $campo4['valor_retenciones'];
    $valor_iva              = $campo4['valor_iva'];
    $estado_orden           = $campo4['estado_orden'];
    $rubro_id               = $campo4['rubro_id'];
    $subrubro_id            = $campo4['subrubro_id'];
    $vencimiento            = $campo4['vencimiento'];
    $proveedor_id_proveedor = $campo4['proveedor_id_proveedor'];
    $medio_pago             = $campo4['medio_pago'];
    $marca_temporal         = $campo4['marca_temporal'];
    $observaciones          = $campo4['observaciones'];
    $usuario_creador        = $campo4['usuario_creador'];
    $facturanum             = $campo4['factura'];

    $nomproveedor  = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
    $nomreportador = usuarios::obtenerNombreUsuario($usuario_creador);
    $totalpago     = ($valor_total - $valor_retenciones) + $valor_iva;
    $detalleabonos        = Compras::sqlabonos($id);
    $cuentaporpagar= $totalpago-$detalleabonos;


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
                <td id="listado">

            <a style="display:none;" href="?controller=compras&action=cambiarestado&id=<?php echo ($id); ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Detalle">
                <i class="fa fa-dollar bigger-110 "> </i></a>
                  <input type="checkbox" id="<?php echo $id; ?>" name="inputdespachos" onclick="marcardespacho(<?php echo $id; ?>)" style="cursor: pointer;">

                  <?php
echo ("OC00" . $id);
    if ($imagen != "0") {
        ?>
                   <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Ver Soporte</i>
              </a>
                  <?php
} else {
        echo "<i class='tooltip-danger text-danger fa fa-unlink'>Sin adjunto<i>";
    }

    ?>

                </td>
                <td><?php echo ($fecha_reporte); ?></td>
                <td><?php echo ($nomestado); ?></td>
                <td><?php echo ($nomproveedor); ?></td>
                <td><?php echo ($medio_pago); ?>
                      <br>
                  <i data-toggle="tooltip" data-placement="left" title="Creada por  por <?php echo($nomreportador." Fecha : ".$marca_temporal); ?>" class="fa fa-question-circle"></i>
                </td>
               
                <td><?php echo ("$" . number_format($valor_total)); ?></td>
                <td><?php echo ("$" . number_format($valor_retenciones)); ?></td>
                 <td><?php echo ("$" . number_format($valor_iva)); ?></td>
                <td><?php echo ("$" . number_format($totalpago)); ?></td>
                 <td><?php echo ("$" . number_format($detalleabonos)); ?></td>
                  <td><?php echo ("$" . number_format($cuentaporpagar)); ?></td>
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
                             <a href="?controller=compras&&action=editar&&id=<?php echo $id; ?>&&vereditar=1" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Editar">
                <i class="fa fa-edit bigger-110 "> Editar</i>
              </a>
                          </li>
                          <li>
                            <a href="#" onclick="eliminar(<?php echo $id; ?>);" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Eliminar">
                <i class="fa fa-trash bigger-110 "> Eliminar</i>
              </a>
                          </li>
              <?php
if ($imagen != "0") {
        ?>
                    <li>
             <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Ver Soporte</i>
              </a>
                          </li>
                          <li>
               <a download="Soporte" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "> Descargar Soporte</i>
                </a>
                          </li>
                  <?php
} else {
        ?>
                  <li>
             <a target="_blank" href="#"  class="tooltip-primary text-danger" title="Ver Soporte">
                <i class="fa fa-unlink bigger-110 "> Sin Soporte</i>
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
   eliminar=confirm("¿Deseas Anular este registro?");
   if (eliminar)
     window.location.href="?controller=compras&&action=eliminar&&id="+id;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido Anular el registro...')
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

               pageTotal5 = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Total over all pages
              pageTotal6 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal7 = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


           pageTotal8 = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal9 = api
                .column( 9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal10 = api
                .column( 10, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

         
           
                  $( api.column( 5 ).footer() ).html(
                '$'+formatmoneda(pageTotal5,'' )
                );

                 $( api.column( 6 ).footer() ).html(
                '$'+formatmoneda(pageTotal6,'' )
                 );
               $( api.column( 7 ).footer() ).html(
                '$'+formatmoneda(pageTotal7,'' )
                 );

              $( api.column( 8 ).footer() ).html(
                '$'+formatmoneda(pageTotal8,'' )
                 );

               $( api.column( 9 ).footer() ).html(
                '$'+formatmoneda(pageTotal9,'' )
                 );

                $( api.column( 10 ).footer() ).html(
                '$'+formatmoneda(pageTotal10,'' )
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



           pageTotal5 = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Total over all pages
              pageTotal6 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal7 = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


           pageTotal8 = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal9 = api
                .column( 9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal10 = api
                .column( 10, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

         
           
                  $( api.column( 5 ).footer() ).html(
                '$'+formatmoneda(pageTotal5,'' )
                );

                 $( api.column( 6 ).footer() ).html(
                '$'+formatmoneda(pageTotal6,'' )
                 );
               $( api.column( 7 ).footer() ).html(
                '$'+formatmoneda(pageTotal7,'' )
                 );

              $( api.column( 8 ).footer() ).html(
                '$'+formatmoneda(pageTotal8,'' )
                 );

               $( api.column( 9 ).footer() ).html(
                '$'+formatmoneda(pageTotal9,'' )
                 );

                $( api.column( 10 ).footer() ).html(
                '$'+formatmoneda(pageTotal10,'' )
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



            pageTotal5 = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Total over all pages
              pageTotal6 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal7 = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


           pageTotal8 = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal9 = api
                .column( 9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal10 = api
                .column( 10, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

         
           
                  $( api.column( 5 ).footer() ).html(
                '$'+formatmoneda(pageTotal5,'' )
                );

                 $( api.column( 6 ).footer() ).html(
                '$'+formatmoneda(pageTotal6,'' )
                 );
               $( api.column( 7 ).footer() ).html(
                '$'+formatmoneda(pageTotal7,'' )
                 );

              $( api.column( 8 ).footer() ).html(
                '$'+formatmoneda(pageTotal8,'' )
                 );

               $( api.column( 9 ).footer() ).html(
                '$'+formatmoneda(pageTotal9,'' )
                 );

                $( api.column( 10 ).footer() ).html(
                '$'+formatmoneda(pageTotal10,'' )
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

<script type="text/javascript">
      jQuery(function($) {

$('#cotizaciones4 thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones4 thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } );

    var table = $('#cotizaciones4').DataTable({
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



             pageTotal5 = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Total over all pages
              pageTotal6 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal7 = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


           pageTotal8 = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal9 = api
                .column( 9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal10 = api
                .column( 10, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

         
           
                  $( api.column( 5 ).footer() ).html(
                '$'+formatmoneda(pageTotal5,'' )
                );

                 $( api.column( 6 ).footer() ).html(
                '$'+formatmoneda(pageTotal6,'' )
                 );
               $( api.column( 7 ).footer() ).html(
                '$'+formatmoneda(pageTotal7,'' )
                 );

              $( api.column( 8 ).footer() ).html(
                '$'+formatmoneda(pageTotal8,'' )
                 );

               $( api.column( 9 ).footer() ).html(
                '$'+formatmoneda(pageTotal9,'' )
                 );

                $( api.column( 10 ).footer() ).html(
                '$'+formatmoneda(pageTotal10,'' )
                 );



        },

    });

    // Apply the search
    table.columns().every(function (index) {
        $('#cotizaciones4 thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

        var myTable =
        $('#cotizaciones4')
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
        myTable.buttons().container().appendTo( $('.tableTools-container4') );


        setTimeout(function() {
          $($('.tableTools-container4')).find('a.dt-button').each(function() {
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
