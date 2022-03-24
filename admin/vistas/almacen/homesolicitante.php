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

include_once 'controladores/rubrosController.php';
include_once 'modelos/rubros.php';

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

include_once 'controladores/requisicionesController.php';
include_once 'modelos/requisiciones.php';

include_once 'controladores/proyectosController.php';
include_once 'modelos/proyectos.php';

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
        Dashboard Solicitudes RQ
      </h1>
       <small>version 1.0</small>

    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-md-12">
              <?php
require_once 'vistas/requisiciones/formrequisiciones.php';
?>
        </div>

        <div class="col-md-5">

          <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Items por Estado</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
             <div class="box-body">
              <table class="table table-bordered" style="font-size: 13px;">
                <tbody><tr>
                  <th >Estado</th>
                  <th style="width: 10px">Total</th>
                  <th>Ver</th>
                </tr>
               <?php
# =============================================
# =           Lista de Estados Requisiciones         =
# =============================================

$rubros = Estadosreq::ObtenerListaEstados();
foreach ($rubros as $campo) {
    $id            = $campo['id'];
    $nombre        = $campo['nombre'];
    $cantidaditems = contarregistrosporestado($id, $IdSesion);
    ?>
                <tr>
                  <td><?php echo ($nombre); ?></td>
                  <td><?php echo ($cantidaditems); ?></td>
                  <td><a href="?controller=requisiciones&&action=todosporusuarioestado&&id=<?php echo ($idse
    ) ?>&&estadosolicitado=<?php echo ($id); ?>">Ver</a></td>
                </tr>
                <?php

}
?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>

          </div>

 </div>
 <div class="row">
    <div class="col-md-7">

      <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Buscar RQ</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form  action="?controller=requisiciones&&action=porfechasolicitante" method="post" id="FormFechas" autocomplete="off">
         <div class="col-md-8">
                        <div class="form-group">

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



        <?php
if ($fechaform != "") {
    ?>
           <h3 style="display:none;" class="m-0 text-dark">Reporte RQ del <?php echo (fechalarga($datofechain)); ?> al <?php echo (fechalarga($datofechafinal)); ?></h3>
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

                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
                <th>RQ-#</th>
                <th>Fecha</th>
                <th>Proyecto</th>
                <th>Tipo</th>

            </tr>
            <tr>
                 <th>RQ-#</th>
                <th>Fecha</th>
                <th>Proyecto</th>
                <th>Tipo</th>

            </tr>
          </thead>
       <tbody>
            <?php
if ($fechaform != "") {
    $res    = Requisiciones::porfechauser($FechaStart, $FechaEnd, $IdSesion);
    $campos = $res->getCampos();
} else {
    $res    = Requisiciones::todosuser($IdSesion);
    $campos = $res->getCampos();
}

foreach ($campos as $campo) {
    $id                    = $campo['id'];
    $fecha_reporte         = $campo['fecha_reporte'];
    $solicitado_por        = $campo['solicitado_por'];
    $proyecto_id_proyecto  = $campo['proyecto_id_proyecto'];
    $requisicion_publicada = $campo['requisicion_publicada'];
    $tipo_requisicion      = $campo['tipo_requisicion'];

    if ($requisicion_publicada == 0) {
        $nomestado = "<span class='badge badge-danger float-left'>Registrando....</span>";
    } elseif ($requisicion_publicada == 1) {
        $nomestado = "<span class='badge badge-warning float-left'>Notificada</span>";
    } elseif ($requisicion_publicada == 2) {
        $nomestado = "<span class='badge badge-success float-left'>Autorizada</span>";
    }

    $nombresolicita = Usuarios::obtenerNombreUsuario($solicitado_por);
    $nombreproyecto = Proyectos::obtenerNombreProyecto($proyecto_id_proyecto);

    ?>
            <tr>
             <td><a href="?controller=requisicionesitems&&action=todosporreq&&id=<?php echo ($id); ?>"><?php echo ("RQ" . $id) ?></a><br><br><?php echo ($nomestado); ?></td>
              <td><?php echo ($fecha_reporte) ?></td>
              <td><?php echo utf8_encode($nombreproyecto); ?></td>
            <td><?php echo utf8_encode($tipo_requisicion); ?></td>

            </tr>
            <?php
}
?>
          </tbody>
          </table>

          </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-5">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Trazabilidad</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-card pl-2 pr-2">
                  <?php
# =============================================================
# =           Consulta de Trazabilidad de mis Items           =
# =============================================================

$res    = Requisicionesitems::trazabilidadmisitems($IdSesion);
$campos = $res->getCampos();

foreach ($campos as $campo) {
    $fecha_reporte   = $campo['fecha_reporte'];
    $usuario_creador = $campo['usuario_creador'];
    $estadoreq_id    = $campo['estadoreq_id'];
    $item_id         = $campo['item_id'];
    $observaciones   = $campo['observaciones'];
    $marca_temporal  = $campo['marca_temporal'];
    $nombretextotrazabilidad= Usuarios::obtenerNombreUsuario($usuario_creador);
    $perfil= Usuarios::obtenerImagenPerfil($usuario_creador);
    $numeroRQ=ObtenerIdReq($item_id);
    
?>


                  <li class="item">
                    <div class="product-img">
                      <img src="<?php echo($perfil); ?>" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"><?php echo($nombretextotrazabilidad) ?>
                        <span class="badge badge-warning float-right">RQ<?php echo($numeroRQ."-".$item_id) ?></span></a>
                      <span class="product-description">
                       <?php echo($observaciones); ?>
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->

          <?php 
}
           ?>
                </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
  </div>
</div>


      </div>
    </section>
    <!-- /.content -->
  </div>
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
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

               //$( api.column( 2 ).footer() ).html(
               // ''+formatmoneda(pageTotal2,'' )
               // );

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
         "buttons": ["excel","pdf"]
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
