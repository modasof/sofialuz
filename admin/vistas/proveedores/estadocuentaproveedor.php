<?php
error_reporting(E_ALL);
ini_set('display_errors', '0');

include_once 'modelos/egresoscuenta.php';
include_once 'controladores/egresoscuentaController.php';

include_once 'modelos/compras.php';
include_once 'controladores/comprasController.php';

include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';

include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';

include_once 'modelos/proveedores.php';
include_once 'controladores/proveedoresController.php';

$proveedorsel = $_GET['id'];
$RolSesion    = $_SESSION['IdRol'];
$IdSesion     = $_SESSION['IdUser'];
$nomproveedor = Proveedores::obtenerNombreProveedor($proveedorsel);
$pagos            = Egresoscuenta::egresosporproveedor($proveedorsel);
$comprasproveedor = Compras::comprasporproveedor($proveedorsel);
$saldo            = $comprasproveedor - $pagos;

?>
<!-- Content Wrapper. Contains page content -->

<!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Estado de Cuentas <?php echo($nomproveedor); ?>
      </h1>

      <ol class="breadcrumb">
        <li><a href="?controller=index&&action=index"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="?controller=dashboards&&action=dashboardcompras"><i class="fa fa-dashboard"></i> Dashboard Compras</a></li>
         <li><a href="?controller=proveedores&&action=cxpproveedor"><i class="fa fa-dashboard"></i> CxP Proveedores</a></li>

      </ol>
    </section>


<div class="col-md-12">
    <div class="col-md-4 col-sm-12 col-xs-12">
<div class="info-box">
<span class="info-box-icon bg-aqua"><i class="fa fa-dollar"></i></span>
<div class="info-box-content">
<span class="info-box-text">Total Pagos </span>
<span class="info-box-number">$<?php echo (number_format($pagos, 0)) ?></span>
</div>

</div>

</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<div class="info-box">
<span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>
<div class="info-box-content">
<span class="info-box-text">Total Compras</span>
<span class="info-box-number">$<?php echo (number_format($comprasproveedor, 0)) ?></span>
</div>

</div>

</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<div class="info-box">
<span class="info-box-icon bg-red"><i class="fa fa-dollar"></i></span>
<div class="info-box-content">
<span class="info-box-text">Saldo</span>
<span class="info-box-number">$<?php echo (number_format($saldo, 0)) ?></span>
</div>

</div>

</div>

<div class="col-md-6">
               <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success ">
            <div class="box-header with-border">
              <h3 class="box-title">Detalle Compras - Pagos
              </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                          <div class="row">

      </div>
       <div class="col-sm-12">
        <br>
        </div><!-- /.col -->
                 <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                    </div>
      <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
            <tfoot style="display: table-header-group;">
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
            <th>Id</th>
            <th>Proveedor</th>
            <th>Fecha</th>
            <th>Detalle</th>
            <th>Valor Compra</th>
            <th>Valor Pago</th>
            <th>Soporte</th>
            </tr>

          </thead>
       <tbody>
            <?php
$res    = Compras::todosporproveedor($proveedorsel);
$campos = $res->getCampos();
foreach ($campos as $campo) {

    $id                = $campo['id'];
    $valor_total       = $campo['valor_total'];
    $valor_retenciones = $campo['valor_retenciones'];
    $valor_iva         = $campo['valor_iva'];
    $valor_final       = ($valor_total - $valor_retenciones) + $valor_iva;
    $fecha_reporte     = $campo['fecha_reporte'];
    $compra_de         = $campo['compra_de'];
    $imagen            = $campo['imagen'];
    $nombreproveedor   = Proveedores::obtenerNombreProveedor($proveedorsel);

    ?>
            <tr>
            <td>OC00<?php echo ($id); ?></td>
            <td><?php echo ($nombreproveedor); ?></td>
            <td><?php echo ($fecha_reporte); ?></td>
            <td><?php echo ($compra_de); ?></td>
            <td><?php echo ("$" . number_format($valor_final, 0)); ?></td>
            <td><?php echo ("$" . number_format(0, 0)); ?></td>
            <td><a target="_blank" href="<?php echo ($imagen); ?>"> <i class="fa fa-eye"> </i></a></td>
            </tr>

            <?php
$res    = Compras::detallepagos($id);
    $campos = $res->getCampos();
    foreach ($campos as $campo) {

        $egreso_id      = $campo['egreso_id'];
        $valorpago      = $campo['valor'];
        $fecha_registro = $campo['fecha_registro'];

        $mediopago   = Egresoscuenta::obtenerMediopago($egreso_id);
        $soportepago = Egresoscuenta::obtenersoportepago($egreso_id);

        ?>
<tr class="success">
     <td>Pago <?php echo ($egreso_id); ?></td>
    <td>Abono/Pago OC00<?php echo ($id); ?></td>
     <td><?php echo ($fecha_registro); ?></td>
      <td><?php echo ($mediopago); ?></td>
      <td><?php echo ("$" . number_format(0, 0)); ?></td>
     <td><?php echo ("$" . number_format($valorpago, 0)); ?></td>
    <td><a target="_blank" href="<?php echo ($soportepago); ?>"> <i class="fa fa-eye"> </i></a></td>

</tr>

<?php }?>

    



            <?php
}
?>
<?php
$res    = Egresoscuenta::anticiposproveedor($proveedorsel);
    $campos = $res->getCampos();
    foreach ($campos as $campo) {

        $id_egreso_cuenta = $campo['id_egreso_cuenta'];
        $valor_egreso     = $campo['valor_egreso'];
        $fecha_egreso     = $campo['fecha_egreso'];
        $egreso_en        = $campo['egreso_en'];
        $imagen           = $campo['imagen'];

        ?>
<tr class="info">
     <td>Pago <?php echo ($id_egreso_cuenta); ?></td>
    <td>Anticipo a Proveedor</td>
     <td><?php echo ($fecha_egreso); ?></td>
      <td><?php echo ($egreso_en); ?></td>
      <td><?php echo ("$" . number_format(0, 0)); ?></td>
     <td><?php echo ("$" . number_format($valor_egreso, 0)); ?></td>
    <td><a target="_blank" href="<?php echo ($imagen); ?>"> <i class="fa fa-eye"> </i></a></td>

</tr>

<?php }?>

          </tbody>
          </table>
        </div> <!-- Fin Row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
</div>


<div class="col-md-6">
               <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success ">
            <div class="box-header with-border">
              <h3 class="box-title">Detalle Compras
              </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                          <div class="row">

      </div>
       <div class="col-sm-12">
        <br>
        </div><!-- /.col -->
                 <div class="clearfix">
                      <div class="pull-left tableTools-container2"></div>
                    </div>
      <div class="table-responsive mailbox-messages">
          <table id="cotizacionesdetalle" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;padding: 1px;">
            <tfoot style="display: table-header-group;">



              <th style="background-color: #fcf8e3" class="success"></th>
              <th style="background-color: #fcf8e3" class="success"></th>
              <th style="background-color: #fcf8e3" class="success"></th>
              <th style="background-color: #fcf8e3" class="success"></th>
              <th style="background-color: #fcf8e3" class="success"></th>
              <th style="background-color: #fcf8e3" class="success"></th>




            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">


              <th>OC Número</th>
             <th>Insumo/Servicio</th>
              <th>Unidad</th>


              <th>Vr. Unitario</th>
              <th>Vr. Comprado</th>
               <th>Vr. Recibido</th>

            </tr>
            <tr>

              <th>OC Número</th>
             <th>Insumo/Servicio</th>
              <th>Unidad</th>


              <th>Vr. Unitario</th>
              <th>Vr. Comprado</th>
               <th>Vr. Recibido</th>
            </tr>
          </thead>
       <tbody>
            <?php

$res2    = Compras::porproveedorcargarinsumos($proveedorsel);
$campos2 = $res2->getCampos();
foreach ($campos2 as $campo2) {
    $cotizacionid           = $campo2['cotizacionid'];
    $ordenid                = $campo2['ordenid'];
    $proveedor_id_proveedor = $campo2['proveedor_id_proveedor'];
    $cotizacion             = $campo2['cotizacion'];
    $medio_pago             = $campo2['medio_pago'];
    $item_id                = $campo2['item_id'];
    $valor_cot              = $campo2['valor_cot'];
    $requisicion_id         = $campo2['requisicion_id'];
    $fecha_reporte          = $campo2['fecha_reporte'];
    $marca_temporal         = $campo2['marca_temporal'];
    $usuario_creador        = $campo2['usuario_creador'];
    $usuario_aprobador      = $campo2['usuario_aprobador'];
    $estado_cotizacion      = $campo2['estado_cotizacion'];
    $ordencompra_num        = $campo2['ordencompra_num'];
    $insumo_id_insumo       = $campo2['insumo_id_insumo'];
    $servicio_id_servicio   = $campo2['servicio_id_servicio'];
    $vr_unitario            = $campo2['vr_unitario'];
    $cantidadcot            = $campo2['cantidadcot'];

    if ($insumo_id_insumo != "0") {
        $nominsumo         = Insumos::obtenerNombreInsumo($insumo_id_insumo);
        $labelinsumo       = "OcInsumo:";
        $idunidad          = Insumos::obtenerUnidadmed($insumo_id_insumo);
        $nomunidad         = Unidadesmed::obtenerNombre($idunidad);
        $cantidadrecibida  = Compras::cantidadcargada($ordencompra_num, $insumo_id_insumo);
        $cantidadpendiente = $cantidadcot - $cantidadrecibida;
        $valorpendiente    = $cantidadrecibida * $vr_unitario;
    } elseif ($servicio_id_servicio != "0") {
        $nominsumo         = Servicios::obtenerNombre($servicio_id_servicio);
        $labelinsumo       = "OcServicio:";
        $idunidad          = Servicios::obtenerUnidadServicio($servicio_id_servicio);
        $nomunidad         = Unidadesmed::obtenerNombre($idunidad);
        $cantidadrecibida  = Compras::cantidadcargadaser($ordencompra_num, $servicio_id_servicio);
        $cantidadpendiente = $cantidadcot - $cantidadrecibida;
        $valorpendiente    = $cantidadrecibida * $vr_unitario;
    }

    $nomcreador   = Usuarios::obtenerNombreUsuario($usuario_creador);
    $nomaprobador = Usuarios::obtenerNombreUsuario($usuario_aprobador);

    $nomproveedor = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
    $estadoitem   = Requisicionesitems::sqlestadorq($item_id);
    ?>
            <tr>




              <td><a href="vistas/compras/cotizaciones_print.php?id=<?php echo ($proveedor_id_proveedor); ?>&&idcompra=<?php echo ($ordencompra_num); ?>" target="_blank" class="btn btn-default"><?php echo ($ordencompra_num) ?> </a> </td>

              <td><strong><?php echo utf8_encode($labelinsumo); ?></strong><?php echo utf8_encode($nominsumo); ?></td>
              <td> <?php echo ($cantidadcot); ?><br><?php echo ($nomunidad); ?></td>



            <td> <?php echo (number_format($vr_unitario, 0)); ?></td>
            <td> <?php echo (number_format($valor_cot, 0)); ?></td>
            <td> <?php echo (number_format($valorpendiente, 0)); ?></td>
            </tr>
            <?php
}
?>
          </tbody>
          </table>
        </div> <!-- Fin Row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
</div>



</div>



</div>

</div>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

          <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
          <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
          <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

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
$.extend( $.fn.dataTable.defaults, {
    responsive: true
} );

       $(document).ready(function() {
    $('#example2').DataTable( {

         "searching": false,
        "ordering": true,
        "paging":   false,
        "info":     true,
         "order": [[ 1, "desc" ]],
         "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

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
      "responsive":true,
      "ordering": false,
      "searching": true,
       "paging": false,
      //"order": [[ 2, "desc" ]],
      "info":false,
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

             pageTotal4 = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

              pageTotal5 = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );




             // Update footer

               $( api.column( 4 ).footer() ).html(
                '$'+formatmoneda(pageTotal4,'' )
            );

                $( api.column( 5 ).footer() ).html(
                '$'+formatmoneda(pageTotal5,'' )
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
            null, null,null, null,null,null,null,null, null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,



          } );





        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons( myTable, {
         buttons: [

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


      })
    </script>


   <script type="text/javascript">
      jQuery(function($) {

$('#cotizacionesdetalle thead tr:eq(1) th').each( function () {
        var title = $('#cotizacionesdetalle thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } );

    var table = $('#cotizacionesdetalle').DataTable({
      responsive:true,
      "ordering": true,
        "order": [[ 0, "desc" ]],
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




            pageTotal7 = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal8 = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );



              $( api.column( 4 ).footer() ).html(
                '$'+formatmoneda(pageTotal7,'' )
                );

               $( api.column( 5 ).footer() ).html(
                '$'+formatmoneda(pageTotal8,'' )
                );



        },

    });

    // Apply the search
    table.columns().every(function (index) {
        $('#cotizacionesdetalle thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

        var myTable =
        $('#cotizacionesdetalle')
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
  <!-- /.content-wrapper -->


