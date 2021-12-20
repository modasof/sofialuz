<?php
ini_set('display_errors', '0');

include_once 'controladores/usuariosController.php';
include_once 'modelos/usuarios.php';

include_once 'controladores/proyectosController.php';
include_once 'modelos/proyectos.php';

include_once 'controladores/inventarioController.php';
include_once 'modelos/inventario.php';

include_once 'controladores/unidadesmedController.php';
include_once 'modelos/unidadesmed.php';

include_once 'controladores/insumosController.php';
include_once 'modelos/insumos.php';

include_once 'controladores/equiposController.php';
include_once 'modelos/equipos.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

require_once 'vistas/index/header-formdate.php';

$nombre_usuario = Usuarios::ObtenerNombreUsuario($IdSesion);

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
          <h3 class="m-0 text-dark">Despachos a <?php echo ($nombre_usuario); ?></h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item"><a href="?controller=inventario&&action=entregasrecibidasusuario&&id=<?php echo ($IdSesion); ?>">Insumos Recibidos</a></li>
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

            <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Total Despachos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->

                 <?php
if ($fechaform != "") {
    $res    = Inventario::Salidasporfecha($FechaStart, $FechaEnd);
    $campos = $res->getCampos();
} else {
    $campos = $campos->getCampos();
}

foreach ($campos as $campo) {

    $Lista = $Lista . $campo['id_salida_ins'] . ",";
}

$Cadena   = explode(",", $Lista);
$longitud = count($Cadena);
$min      = $longitud - 1;

for ($i = 0; $i < $min; $i++) {

    $aplica = Inventario::Aplicaequipo($Cadena[$i]);

    if ($aplica == "Si") {
        $equipo_id_equipo = Inventario::Idequipo($Cadena[$i]);
        $nombreequipo     = Equipos::ObtenerNombreEquipo($equipo_id_equipo);
    } else {
        $nombreequipo = "No aplica";
    }

    ?>

                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo ($Cadena[$i]); ?>" aria-expanded="true" class="">
                        <i class="fa fa-plus-square"> </i> Despacho Nº <?php echo ($Cadena[$i]); ?>
                      </a>
            <a href="#" onclick="eliminar(<?php echo $Cadena[$i]; ?>,<?php echo $IdSesion; ?>);" class="btn btn-success tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Recibir">
                 Recibir
            </a>
                    </h4>
                  </div>
                  <div id="collapseOne<?php echo ($Cadena[$i]); ?>" class="panel-collapse collapse in" aria-expanded="true" style="">
                    <div class="box-body">

                        <div class="box-body table-responsive no-padding">
              <table class="table table-hover" style="font-size: 13px;">
                <tbody><tr>
                <th>RQ-Item</th>
                <th>Fecha Despacho</th>
                <th>Cantidad</th>
                <th>Insumo</th>
                <th>Equipo</th>
                </tr>
         <?php

    $res2 = Inventario::totalsalidasporentrega($Cadena[$i]);
    foreach ($res2 as $campo2) {
        $id                    = $campo2['id'];
        $item_id               = $campo2['item_id'];
        $requisicion_id        = $campo2['requisicion_id'];
        $insumo_id             = $campo2['insumo_id'];
        $cantidad              = $campo2['cantidad'];
        $salida_id             = $campo2['salida_id'];
        $fecha_registro        = $campo2['fecha_registro'];
        $estado_detalle_salida = $campo2['estado_detalle_salida'];
        $estado_recibido       = $campo2['estado_recibido'];
        $marca_temporal        = $campo2['marca_temporal'];
        $creado_por            = $campo2['creado_por'];

        $nominsumo     = Insumos::obtenerNombreInsumo($insumo_id);
        $unidad_id     = Insumos::obtenerUnidadmed($insumo_id);
        $unidad_nombre = Unidadesmed::obtenerNombre($unidad_id);

        $unidad_nombre = Unidadesmed::obtenerNombre($unidad_id);

        ?>
                <tr>
                  <td>RQ<?php echo ($requisicion_id . "-" . $item_id) ?></td>
                   <td><?php echo ($fecha_registro); ?></td>
                  <td><?php echo ($cantidad . " " . $unidad_nombre); ?></td>
                  <td><?php echo ($nominsumo); ?></td>
                   <td><?php echo ($nombreequipo); ?></td>

                </tr>
<?php
}
    ?>
              </tbody></table>
            </div>




                    </div>
                  </div>
                </div>
<?php
}
?>

              </div>
            </div>
            <!-- /.box-body -->
          </div>


           </div>


          </div> <!-- FIN DE ROW-->
        </div><!-- FIN DE CONTAINER FORMULARIO-->
      </div> <!-- Fin Row -->
    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->


</div> <!-- Fin Content-Wrapper -->

<script type="text/javascript">
   function eliminar(id,idsesion) {
   swal({
  title: "¿Acepta recibir despacho Nº "+id+"?",
  text: "<?php echo ($nombre_usuario); ?>, se cargará a su usuario los insumos mencionados!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
   buttons: ["Revisar nuevamente!", "Aceptar OK!"],
})
.then((willDelete) => {
  if (willDelete) {

    swal("Gracias! el despacho "+id+" ha sido recibido correctamente!", {
      icon: "success",
    });
    window.location.href="?controller=inventario&&action=recibirdespacho&&id="+id+"&&idusuario="+idsesion;
  } else {
    swal("Ok, verifique el despacho nuevamente!");
  }
});
   };

</script>




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





        myTable.on( 'select', function ( e, dt, type, index ) {
          if ( type === 'row' ) {
            $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
          }
        } );
        myTable.on( 'deselect', function ( e, dt, type, index ) {
          if ( type === 'row' ) {
            $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
          }
        } );






        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

        //select/deselect all rows according to table header checkbox
        $('#cotizaciones > thead > tr > th input[type=checkbox], #cotizaciones_wrapper input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header

          $('#cotizaciones').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) myTable.row(row).select();
            else  myTable.row(row).deselect();
          });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#cotizaciones').on('click', 'td input[type=checkbox]' , function(){
          var row = $(this).closest('tr').get(0);
          if(this.checked) myTable.row(row).deselect();
          else myTable.row(row).select();
        });



        $(document).on('click', '#cotizaciones .dropdown-toggle', function(e) {
          e.stopImmediatePropagation();
          e.stopPropagation();
          e.preventDefault();
        });



        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header

          $(this).closest('table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
            else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
          });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
          var $row = $(this).closest('tr');
          if($row.is('.detail-row ')) return;
          if(this.checked) $row.addClass(active_class);
          else $row.removeClass(active_class);
        });



        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        //tooltip placement on right or left
        function tooltip_placement(context, source) {
          var $source = $(source);
          var $parent = $source.closest('table')
          var off1 = $parent.offset();
          var w1 = $parent.width();

          var off2 = $source.offset();
          //var w2 = $source.width();

          if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
          return 'left';
        }




        /***************/
        $('.show-details-btn').on('click', function(e) {
          e.preventDefault();
          $(this).closest('tr').next().toggleClass('open');
          $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });
        /***************/


      })
    </script>
