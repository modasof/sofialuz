<?php
ini_set('display_errors', '0');

include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';
include_once 'modelos/categoriainsumos.php';
include_once 'controladores/categoriainsumosController.php';
include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/estadosreq.php';
include_once 'controladores/estadosreqController.php';
include_once 'modelos/requisicionesitems.php';
include_once 'controladores/requisicionesitemsController.php';
include_once 'modelos/movimientositem.php';
include_once 'controladores/movimientositemController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

$Selectiditem = $_GET['item_id'];

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
          <h1 class="m-0 text-dark">ITEM Nº <?php echo ($Selectiditem); ?>
             <a style="display:none;" href="?controller=usuarios&&action=nuevo" class="btn btn-success" style="float: right;"><i class="fa  fa-comments bigger-110 "></i> Finalizar y Notificar</a>
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <?php
if ($RolSesion == 1 or $RolSesion == 13) {
    ?>
                <li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=todosalmacen&&cargo=<?php echo ($RolSesion); ?>">Ver Requisiciones</a></li>

                <?php
} else {
    ?>
                  <li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=todosmiusuario&&id=<?php echo ($IdSesion); ?>">Ver Requisiciones</a></li>
                <?php
}
?>
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
<div class="col-md-6">
        <!--============================================
        =            Formulario Movimientos            =
        =============================================-->
          <?php
include_once 'vistas/movimientositem/formnuevo.php';
?>
        <!--====  End of Formulario Movimientos  ====-->
</div>

    <div class="col-md-6">
         <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Estados por Item </h3>

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

          </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
            <th >Id</th>
            <th >Insumo</th>
            <th >Cantidades</th>
            <th >Unidad</th>
            <th >Estado</th>

            </tr>
            <tr>
            <th >Id</th>
            <th >Insumo</th>
            <th >Cantidades</th>
             <th >Unidad</th>
            <th >Estado</th>

            </tr>
          </thead>
       <tbody>
            <?php
$res    = Movimientositem::todospor($Selectiditem);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $id               = $campo['id'];
    $cantidad         = $campo['cantidad'];
    $estado_mov_item  = $campo['estado_mov_item'];
    $insumo_id_insumo = $campo['insumo_id_insumo'];
    $fecha_reporte    = $campo['fecha_reporte'];
    $marca_temporal   = $campo['marca_temporal'];
    $usuario_creador  = $campo['usuario_creador'];
    $item_id          = $campo['item_id'];

    $nomsolicita         = Usuarios::obtenerNombreUsuario($usuario_creador);
    $nombreinsumo        = Insumos::obtenerNombreInsumo($insumo_id_insumo);
    $Ucategoriainsumo_id = Insumos::obtenerCategoria($insumo_id_insumo);
    $Unombrecategoria    = Categoriainsumos::obtenerNombre($Ucategoriainsumo_id);
    $Uunidadmedida_id    = Insumos::obtenerUnidadmed($insumo_id_insumo);
    $Unombredmedida      = Unidadesmed::obtenerNombre($Uunidadmedida_id);
    $estadoactual        = Estadosreq::obtenerNombre($estado_mov_item);
    $coloractual         = Estadosreq::obtenerColor($estado_mov_item);

    ?>
            <tr>
              <td><?php echo ($id); ?></td>
              <td><?php echo utf8_encode($nombreinsumo); ?></td>
              <td><?php echo ($cantidad) ?></td>
               <td><?php echo ($Unombredmedida) ?></td>
          <td>
             <span  class="pull-left-container">
              <small style="background-color:<?php echo ($coloractual); ?>;" class="label pull-left"><?php echo ($estadoactual); ?></small>
            </span>
          </td>
               <td style="display:none;">

             <a  href="#" onclick="eliminar(<?php echo $id; ?>,<?php echo ($item_id); ?>);" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Eliminar">
                <i class="fa fa-trash bigger-110 "> Eliminar</i>
              </a>

              </td>

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
function eliminar(ideliminar,id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=movimientositem&&action=eliminar&&id="+ideliminar+"&&item_id="+id;
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

  function marcardespacho(){
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

      btn.href = "?controller=requisicionesitems&action=cambiarestado&des="+valoresconcant+"&id=<?php echo ($idreq); ?>";
    }

  }


        $(document).ready(function() {
} );
    </script>
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
        "order": [[ 2, "asc" ]],
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



              pageTotal12 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );



             // Update footer


                 $( api.column( 2 ).footer() ).html(
                '$'+formatmoneda(pageTotal12,'' )
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

          //"bProcessing": true,
              //"bServerSide": true,
              //"sAjaxSource": "http://127.0.0.1/table.php" ,

          //,

          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element

          //"iDisplayLength": 50


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

          $('#cotizaciones').find('tbody > td input[type=checkbox]').each(function(){
            var row = this;
            if(th_checked) myTable.row(row).select();
            else  myTable.row(row).deselect();
          });
        });




      })
    </script>