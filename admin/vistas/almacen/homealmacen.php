<!-- Content Wrapper. Contains page content -->
  <?php
error_reporting(E_ALL);
ini_set('display_errors', '0');

include_once 'controladores/insumosController.php';
include_once 'modelos/insumos.php';

include_once 'controladores/serviciosController.php';
include_once 'modelos/servicios.php';

include_once 'controladores/equipostemporalesController.php';
include_once 'modelos/equipostemporales.php';

include_once 'controladores/inventarioController.php';
include_once 'modelos/inventario.php';

include_once 'controladores/unidadesmedController.php';
include_once 'modelos/unidadesmed.php';

include_once 'controladores/usuariosController.php';
include_once 'modelos/usuarios.php';

include_once 'controladores/unidadesmedController.php';
include_once 'modelos/unidadesmed.php';

include_once 'controladores/proveedoresController.php';
include_once 'modelos/proveedores.php';

include_once 'controladores/categoriainsumosController.php';
include_once 'modelos/categoriainsumos.php';

include_once 'controladores/estadosreqController.php';
include_once 'modelos/estadosreq.php';

include_once 'controladores/requisicionesitemsController.php';
include_once 'modelos/requisicionesitems.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

require_once 'vistas/index/header-formdate.php';

?>

<!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard Almacén
        <small>version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard Almacén</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">


        <div class="col-md-12">
         <div class="box">

            <div class="box-body">
             <a href="?controller=index&&action=vistarqusuariosdashboard" class="btn btn-app">
                <i class="fa fa-users"></i> RQ Usuarios
              </a>
              <a href="?controller=categoriainsumos&&action=todos" class="btn btn-app">
                <i class="fa fa-list"></i> Categorías
              </a>
               <a href="?controller=insumos&&action=todos" class="btn btn-app">
                <i class="fa fa-list"></i> Insumos
              </a>
              <a href="?controller=servicios&&action=todos" class="btn btn-app">
                <i class="fa fa-wrench"></i> Servicios
              </a>
              <a href="?controller=proveedores&&action=todos" class="btn btn-app">
                <i class="fa fa-users"></i> Proveedores
              </a>
                <a href="?controller=compras&&action=recibiroc" class="btn btn-app">
                <i class="fa fa-cart-plus"></i> Compras
              </a>
              <a href="?controller=requisiciones&&action=reqalmacenestado&&estadosolicitado=6&&cargo=<?php echo ($RolSesion); ?>" class="btn btn-app">
                <span class="badge bg-yellow"></span>
                <i class="fa fa-dollar"></i> RQ Cotización
              </a>
              <a href="?controller=cotizaciones&&action=todos" class="btn btn-app">
                <span class="badge bg-green"></span>
                <i class="fa fa-file-pdf-o"></i> Cotizaciones
              </a>
               <a href="?controller=inventario&&action=verinventario" class="btn btn-app">
                <i class="fa fa-cubes"></i> Inventario
              </a>
              <a class="btn btn-app">
                <i class="fa fa-sign-in"></i> Entregas Proyectos
              </a>
              <a class="btn btn-app">
                <i class="fa fa-search"></i> Disp. Insumos
              </a>

            </div>
            <!-- /.box-body -->
          </div>
           <!-- Start /row -->
           <div class="row">

            <div style="display:none;" class="col-md-4">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Insumos Parámetrizados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" style="font-size: 13px;">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Insumo</th>
                  <th>Miníma</th>
                   <th>Existencia</th>
                  <th style="width: 40px">%</th>
                </tr>
                <?php

$res1    = Insumos::obtenerinsumosparametrizados();
$campos1 = $res1->getCampos();
foreach ($campos1 as $campo1) {
    $id_insumo       = $campo1['id_insumo'];
    $nombre_insumo   = $campo1['nombre_insumo'];
    $cantidadminima  = $campo1['cantidadminima'];
    $unidadmedida_id = $campo1['unidadmedida_id'];

    $cantidadentradas = Inventario::obtenerentradasporinsumo($id_insumo);
    $cantidadsalidas  = Inventario::obtenersalidasporinsumo($id_insumo);
    $nomunidadmedida  = Unidadesmed::obtenerNombre($unidadmedida_id);
    $saldo            = $cantidadentradas - $cantidadsalidas;

    $porcentaje = round(($saldo / $cantidadminima) * 100, 0);

    ?>
                <tr>
                  <td><a href="?controller=requisiciones&&action=todosalmacen&&cargo=<?php echo ($RolSesion); ?>"><i class="fa fa-plus-square"></i></a></td>
                  <td><?php echo ($nombre_insumo); ?></td>
                  <td><a href="?controller=insumos&&action=editar&&id=<?php echo ($id_insumo); ?>"><?php echo ($cantidadminima); ?></a></td>
                  <td><?php echo ($saldo . " " . $nomunidadmedida); ?></td>
                  <td>

                    <?php if ($porcentaje <= 25) {
        echo ("<span class='badge bg-red'>");
    } elseif ($porcentaje >= 26 and $porcentaje <= 75) {
        echo ("<span class='badge bg-yellow'>");
    } else {
        echo ("<span class='badge bg-green'>");
    }

    ?>


                  <?php echo ($porcentaje); ?>%</span></td>
                </tr>
                <?php
}
?>

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

         <div class="col-md-12">
               <form  action="?controller=inventario&&action=despachosporfecha" method="post" id="FormFechas" autocomplete="off">
         <div class="col-md-8">
                        <div class="form-group">
                          <label>RQ Montadas<span>*</span></label>
                          <input type="text"  name="daterange" class="form-control" required value="">
                        </div>
          </div>

            <div class="col-xs-12 col-md-4">
              <button class="btn btn-primary btn-sm" type="Submit">Realizar Consulta</button>
          </div>

        </form>


        <script type="text/javascript">
  $('input[name="daterange"]').daterangepicker({
    ranges: {
        'Hoy': [moment(), moment()],
        'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Mañana': [moment().add(1, 'days'), moment().add(1, 'days')],
        '3 Días Sig.': [moment().add(3, 'days'), moment().add(3, 'days')],
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

                    <div class="col-md-12">
        <?php
if ($fechaform != "") {
    ?>
           <h3 style="display:none;" class="m-0 text-dark">Reporte Entradas del <?php echo (fechalarga($datofechain)); ?> al <?php echo (fechalarga($datofechafinal)); ?></h3>
          <?php
}else{
  ?>
  <h3 style="display:none;" class="m-0 text-dark">Reporte RQ <?php echo (fechalarga($datofechain)); ?> al <?php echo (fechalarga($datofechafinal)); ?></h3>

  <?php
}

?>

              <div class="clearfix">
                      <div class="pull-right tableTools-container"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 13px;">
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

                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
              <th>RQ-IT</th>
              <th>Fecha</th>
              <th>Insumo</th>
              <th>Cant.</th>
              <th>Unidad</th>
              <th>Proyecto</th>
                <th>Observaciones</th>
              <th>Solicitado</th>
              <th>Estado</th>
            </tr>
            <tr>
              <th>RQ-IT</th>
               <th>Fecha</th>
              <th>Insumo</th>
              <th>Cant.</th>
              <th>Unidad</th>
              <th>Proyecto</th>
               <th>Observaciones</th>
              <th>Solicitado</th>
              <th>Estado</th>
            </tr>
          </thead>
       <tbody>
            <?php
if ($fechaform != "") {
    $res    = Requisicionesitems::despachosporfecha($FechaStart, $FechaEnd);
    $campos = $res->getCampos();
} else {
    $res    = Requisicionesitems::despachosporfecha($FechaInicioDia, $FechaFinalDia);
    $campos = $res->getCampos();
}

foreach ($campos as $campo) {

    $id                   = $campo['id'];
    $insumo_id_insumo     = $campo['insumo_id_insumo'];
    $servicio_id_servicio = $campo['servicio_id_servicio'];
    $equipo_id_equipo     = $campo['equipo_id_equipo'];
    $fecha_reporte        = $campo['fecha_reporte'];
    $cantidad             = $campo['cantidad'];
    $requisicion_id       = $campo['requisicion_id'];
    $item_publicado       = $campo['item_publicado'];
    $usuario_creador      = $campo['usuario_creador'];
    $estado_item          = $campo['estado_item'];
    $tipo_req             = $campo['tipo_req'];
    $observaciones        = $campo['observaciones'];

    $nomestado   = Estadosreq::obtenerNombre($estado_item);
    $coloractual = Estadosreq::obtenerColor($estado_item);

    if ($tipo_req == 'Insumos') {
        $detallesolicitado = Insumos::obtenerNombreInsumo($insumo_id_insumo);
        $categoriaid       = Insumos::obtenerCategoria($insumo_id_insumo);
        $nomcategoria      = Categoriainsumos::obtenerNombre($categoriaid);
        $unidadmedidaid    = Insumos::obtenerUnidadmed($insumo_id_insumo);
        $nomunidadmedida   = Unidadesmed::obtenerNombre($unidadmedidaid);
    } elseif ($tipo_req == 'Servicios') {
        $detallesolicitado = Servicios::obtenerNombre($servicio_id_servicio);
        $nomcategoria      = 'Servicios';
        $nomunidadmedida   = 'Und';
    } elseif ($tipo_req == 'Equipos') {
        $nomcategoria      = 'Equipos';
        $detallesolicitado = Equipostemporales::obtenerNombre($equipo_id_equipo);
        $unidadmedidaid    = Equipostemporales::obtenerUnidadmed($equipo_id_equipo);
        $nomunidadmedida   = Unidadesmed::obtenerNombre($unidadmedidaid);
    }
    $nomsolicitante = Usuarios::obtenerNombreUsuario($usuario_creador);
    $nomproyecto    = "proyecto";

    if ($item_publicado==1) {
    ?>

            <tr>
              <td>RQ<?php echo ($requisicion_id . "-" . $id); ?></td>
              <td><?php echo ($fecha_reporte) ?></td>
              <td><?php echo ($detallesolicitado) ?></td>
              <td><?php echo ($cantidad) ?></td>
              <td><?php echo ($nomunidadmedida) ?></td>
              <td><?php echo utf8_encode($nomproyecto); ?></td>
              <td><?php echo utf8_encode($observaciones); ?></td>
              <td><?php echo utf8_encode($nomsolicitante); ?></td>
              <td>
                 <span  class="pull-left-container">
              <small style="background-color:<?php echo ($coloractual); ?>;" class="label pull-left"><?php echo ($nomestado); ?></small><br>
    </span>
              </td>
            </tr>
            <?php
          }
          else{
            ?>
            <tr class="danger">
               <td class="text-danger">RQ<?php echo ($requisicion_id . "-" . $id); ?> <strong>Eliminada</strong></td>
              <td><?php echo ($fecha_reporte) ?></td>
              <td><?php echo ($detallesolicitado) ?></td>
              <td><?php echo ($cantidad) ?></td>
              <td><?php echo ($nomunidadmedida) ?></td>
              <td><?php echo utf8_encode($nomproyecto); ?></td>
              <td><?php echo utf8_encode($observaciones); ?></td>
              <td><?php echo utf8_encode($nomsolicitante); ?></td>
              <td>
                 <span  class="pull-left-container">
              <small style="background-color:<?php echo ($coloractual); ?>;" class="label pull-left"><?php echo ($nomestado); ?></small><br>
    </span>
              </td>
            </tr>
            <?php
          }
}
?>
          </tbody>
          </table>
        </div> <!-- Fin Row -->
        </div><!-- /.col -->
          </div>
            <!-- /end row -->
        </div>
        <!-- /.col -->

      </div>
    </section>
    <!-- /.content -->
  </div>
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


<!-- page script -->
<script>
  $(function () {
    $('#cotizaciones33').DataTable({
      "paging": true,
      "lengthChange": true,
      "lengthMenu": [[25, 50, 150, -1], [25, 50, 150, "All"]],
      "searching": true,
      "order": [[ 0, "asc" ]],
      "ordering": true,
      "info": true,
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
    "sSearch":         "Buscar:",
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
       "searching": true,
        "paging":   false,
        "order": [[ 1, "desc" ]],
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




             pageTotal2 = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

               $( api.column( 3 ).footer() ).html(
                ''+formatmoneda(pageTotal2,'' )
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
