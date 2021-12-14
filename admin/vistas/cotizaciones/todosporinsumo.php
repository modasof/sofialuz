<?php
ini_set('display_errors', '0');
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';

include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';

include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';

include_once 'modelos/proveedores.php';
include_once 'controladores/proveedoresController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

require_once 'vistas/index/header-formdate.php';

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
          <h1 class="m-0 text-dark">Reporte Cotizaciones Aprobadas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item"><a href="?controller=requisiciones&&action=cotizaciones">Cotizaciones Pendientes</a></li>
            
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

            <div style="display: none;" class="row">
              <div id="chartContainer" style="height: 400px; width: 100%;"></div>
            </div>
            <br>
               <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">

            <div class="box-header with-border">
              <h3 class="box-title">Cotizaciones </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                          <div class="row">
        <form style="display:none;" action="?controller=cotizaciones&&action=porfecha" method="post" id="FormFechas" autocomplete="off">
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
       <div style="display:none;" class="col-sm-12">
        <?php
if ($fechaform != "") {
    ?>
           <h3 class="m-0 text-dark">Reporte Cotizaciones del <?php echo (fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></h3>
          <?php
} else {
    ?>
           <h3 class="m-0 text-dark">Reporte Total Cotizaciones </h3>
          <?php
}

?>

        </div><!-- /.col -->
              <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;padding: 1px;">
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
              
            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
             <th>RQ-IT</th>
              <th>Fecha</th>
              <th>Creada por</th>
              <th>Aprobada por</th>
              <th>OC Número</th>
              <th>Proveedor</th>
              <th>Insumo</th>
              <th>Unidad</th>
              <th>Cant.</th>
              <th>Vr. Unitario</th>
              <th>Vr. Total</th>
            </tr>
            <tr>
              <th>RQ-IT</th>
              <th>Fecha</th>
              <th>Creada por</th>
              <th>Aprobada por</th>
              <th>OC Número</th>
              <th>Proveedor</th>
              <th>Insumo</th>
              <th>Unidad</th>
              <th>Cant.</th>
              <th>Vr. Unitario</th>
              <th>Vr. Total</th>
            </tr>
          </thead>
       <tbody>

            <?php
echo ($fechaform);
if ($fechaform != "") {
    $res    = Cotizaciones::porfecha($FechaStart, $FechaEnd);
    $campos = $res->getCampos();

} else {
    $campos = $campos->getCampos();
}
foreach ($campos as $campo) {
    $id                     = $campo['id'];
    $proveedor_id_proveedor = $campo['proveedor_id_proveedor'];
    $cotizacion             = $campo['cotizacion'];
    $medio_pago             = $campo['medio_pago'];
    $item_id                = $campo['item_id'];
    $valor_cot              = $campo['valor_cot'];
    $requisicion_id         = $campo['requisicion_id'];
    $fecha_reporte          = $campo['fecha_reporte'];
    $marca_temporal         = $campo['marca_temporal'];
    $usuario_creador        = $campo['usuario_creador'];
    $usuario_aprobador      = $campo['usuario_aprobador'];
    $estado_cotizacion      = $campo['estado_cotizacion'];
    $ordencompra_num        = $campo['ordencompra_num'];
    $insumo_id_insumo       = $campo['insumo_id_insumo'];
    $vr_unitario            = $campo['vr_unitario'];
    $cantidadcot            = $campo['cantidadcot'];

    $nomcreador   = Usuarios::obtenerNombreUsuario($usuario_creador);
    $nomaprobador = Usuarios::obtenerNombreUsuario($usuario_aprobador);
    $nominsumo    = Insumos::obtenerNombreInsumo($insumo_id_insumo);
    $idunidad     = Insumos::obtenerUnidadmed($insumo_id_insumo);
    $nomunidad    = Unidadesmed::obtenerNombre($idunidad);
    $nomproveedor = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
    ?>
            <tr>
              <td><?php echo ("RQ" . $requisicion_id . "-" . $item_id); ?></td>
              <td> <?php echo ($fecha_reporte); ?></td>
              <td> <?php echo ($nomcreador); ?></td>
              <td> <?php echo ($nomaprobador); ?></td>
              <td><a href="vistas/compras/cotizaciones_print.php?id=<?php echo ($proveedor_id_proveedor); ?>&&idcompra=<?php echo ($ordencompra_num); ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"> </i> </a> <?php echo ($ordencompra_num) ?></td>
              <td><?php echo ($nomproveedor) ?></td>
              <td><?php echo utf8_encode($nominsumo); ?></td>
              <td> <?php echo ($nomunidad); ?></td>
              <td> <?php echo ($cantidadcot); ?></td>
              <td> <?php echo (number_format($vr_unitario,0)); ?></td>
              <td> <?php echo (number_format($valor_cot,0)); ?></td>
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


          </div> <!-- FIN DE ROW-->
        </div><!-- FIN DE CONTAINER FORMULARIO-->
      </div> <!-- Fin Row -->
    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->


</div> <!-- Fin Content-Wrapper -->
<script>
function eliminar(id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=concreto&&action=eliminar&&id="+id;
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
        "order": [[ 4, "asc" ]],
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


            pageTotal10 = api
                .column( 10, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           


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