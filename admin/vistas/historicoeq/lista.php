<?php
error_reporting(E_ALL);
ini_set('display_errors', '0');

include_once 'modelos/propietarios.php';
include_once 'controladores/propietariosController.php';

include_once 'modelos/destinos.php';
include_once 'controladores/destinosController.php';

include_once 'modelos/proyectos.php';
include_once 'controladores/proyectosController.php';

include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

include 'vistas/historicoeq/formulas.php';

$anoactual   = date('Y');
$mesactual   = date('n');
$fechaactual = date('Y-m-d');
function tiempoTranscurridoFechas($fechaInicio, $fechaFin)
{
    $fecha1 = new DateTime($fechaInicio);
    $fecha2 = new DateTime($fechaFin);
    $fecha  = $fecha1->diff($fecha2);
    $tiempo = "";

    //años
    if ($fecha->y > 0) {
        $tiempo .= $fecha->y;

        if ($fecha->y == 1) {
            $tiempo .= " año, ";
        } else {
            $tiempo .= " años, ";
        }

    }

    //meses
    if ($fecha->m > 0) {
        $tiempo .= $fecha->m;

        if ($fecha->m == 1) {
            $tiempo .= " mes ";
        } else {
            $tiempo .= " meses ";
        }

    }

    //dias
    if ($fecha->d > 0) {
        $tiempo .= $fecha->d;

        if ($fecha->d == 1) {
            $tiempo .= " día ";
        } else {
            $tiempo .= " días ";
        }

    }

    //horas
    if ($fecha->h > 0) {
        $tiempo .= $fecha->h;

        if ($fecha->h == 1) {
            $tiempo .= " hora ";
        } else {
            $tiempo .= " horas ";
        }

    }

    return $tiempo;
}

?>
?>
<!-- DataTables -->
  <!-- <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Gestión Estado Equipos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=historicoeq&&action=listaequipos">Equipos Propios</a></li>
              <li class="breadcrumb-item"><a href="?controller=historicoeq&&action=listaequiposexternos">Equipos Externos</a></li>
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
    <div class="card card-default">
      <div class="card-body">

          <!--  <div class="card-header">
        <h3 class="card-title">Vehiculos</h3>
      </div> -->
      <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%">
          <thead>
            <tr style="background-color: #4f5962;color: white;">
               <th style="width: 15%;">Equipo</th>
              <th ></th>
              <th>Estado</th>
                <th>Último Reporte en</th>
            </tr>
            <tr>
              <th style="width: 15%;">Equipo</th>
              <th ></th>

              <th>Estado</th>
               <th>Último Reporte en</th>


            </tr>
          </thead>
          <tbody>
            <?php
$campos = $campos->getCampos();
foreach ($campos as $campo) {
    $id                = $campo['id_equipo'];
    $nombre_equipo     = $campo['nombre_equipo'];
    $marca_equipo      = $campo['marca_equipo'];
    $imagen            = $campo['imagen'];
    $modelo            = $campo['modelo'];
    $tipo_equipo       = $campo['tipo_equipo'];
    $idpropietario     = $campo['propietario'];
    $nompropietario    = Propietarios::obtenerNombre($idpropietario);
    $estadoequipo      = UltimoEstadoEquipo($id);
    $fechaestadoequipo = UltimoFechaEstadoEquipo($id);
    $marca_temporal    = UltimoMarcaEstadoEquipo($id);
    $actualizadohace   = tiempoTranscurridoFechas($fechaestadoequipo, $fechaactual);

    ?>
            <tr>
              <td>

             <a href="?controller=equipos&&action=hojavida&&id=<?php echo ($id); ?>&&get_mesactual=<?php echo ($mesactual); ?>"><?php echo utf8_encode($nombre_equipo); ?></a>

              </td>

              <td>
                <div class="btn-group">

<button id="miequipo<?php echo ($id); ?>" type="button" class="btn btn-success btn-sm btn-flat text-pull-rigth">
  <i class="fa fa-check"></i>
</button>
<a text-pull-rigth href="?controller=equipos&&action=estado&&id=<?php echo ($id); ?>" type="button" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-ban"></i></a>

 <input type="hidden" value="<?php echo ($id); ?>" id="campoequipo<?php echo ($id); ?>">
 <br>
<small class="text-pull-rigth"><?php echo utf8_decode($nompropietario); ?></small>


</div>



              </td>
              <td>
                <span id="info<?php echo ($id); ?>"></span>
             <?php
if ($estadoequipo == '') {
        echo ("<span class='label label-default'></span>");
        echo ("<br><br><small  class='text-danger fa fa-bell-slash'> </small>");
    } elseif ($estadoequipo == 'Operativo') {
        echo ("<span class='label label-success'>Operativo</span>");
        echo ("<br><br><small  class='text-success fa fa-check'> Actualizado hace" . $actualizadohace . "</small>");
    } elseif ($estadoequipo == 'Mantenimiento') {
        echo ("<span class='label label-warning'>En Mantenimiento</span>");
        echo ("<br><br><small  class='text-success fa fa-check'> Actualizado hace" . $actualizadohace . "</small>");
    } elseif ($estadoequipo == 'Fuera de Servicio') {
        echo ("<span class='label label-danger'>Fuera de Servicio</span>");
        echo ("<br><br><small  class='text-success fa fa-check'> Actualizado hace" . $actualizadohace . "</small>");
    }

    ?>
    <br>
     <span id="info<?php echo ($id); ?>"></span>
          <?php
if ($marca_temporal != '') {
        echo ("<small  class='text-success'> Actualizado:" . $marca_temporal . "</small>");
    }
    ?>
              </td>
               <td>


                <?php
    if ($tipo_equipo == 'Volqueta') {
        $consultardestino = Ultimoproyectovolqueta($id);
        $consultarcliente = Ultimoclientevolqueta($id);
        $nomubicacion     = Destinos::obtenerNombreDestino($consultardestino);
        $nomcliente       = Clientes::obtenerNombreCliente($consultarcliente);
      if($consultardestino==''){
          echo ("Sin información");
         }else{
        echo ("<strong> <i class='fa fa-user'> </i> " . $nomcliente . " </strong><br>" . $nomubicacion);
      }

    } elseif ($tipo_equipo == 'Maquinaria Pesada') {

        $consultarproyecto = Ultimoproyectomaq($id);
        $consultarcliente  = Ultimoclientemaq($id);
        $nomproyecto       = Proyectos::obtenerNombreProyecto($consultarproyecto);
        $nomcliente        = Clientes::obtenerNombreCliente($consultarcliente);
         if($consultarproyecto==''){
          echo ("Sin información");
         }else{
           echo ("<strong> <i class='fa fa-user'> </i> " . $nomcliente . " </strong><br>" . $nomproyecto);
         }
       
    }else{
      echo ("Sin información");
    }

    ?>

              </td>

            </tr>

    <script type="text/javascript">
      $('#miequipo<?php echo ($id); ?>').click(function () {
       var campoid = $('#campoequipo<?php echo ($id); ?>').val();
       var creadopor ='<?php echo ($IdSesion); ?>';
       //alert(campoid);

        if(campoid){
            $.ajax({
                type:'POST',
                url:'vistas/historicoeq/ajax_reporte.php',
                data:'id='+campoid+'&&creadopor='+creadopor,
                success:function(html){
                    $('#info<?php echo ($id); ?>').html(html);
                }
            });
        }else{
            $('#info<?php echo ($id); ?>').html('<h1>Seleccione un item de la lista<h1>');

        }


  });
</script>
            <?php
}
?>
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
function eliminar($id,$modulo){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
    //alert($modulo);
    window.location.href="?controller=gestiondocumentaleq&&action=eliminar&&id="+$id+"&&id_modulo="+$modulo;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>



<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
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
<script type="text/javascript">
      jQuery(function($) {

$('#cotizaciones thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
    } );

    var table = $('#cotizaciones').DataTable({
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

        // style the message box
        // var defaultCopyAction = myTable.button(1).action();
        // myTable.button(1).action(function (e, dt, button, config) {
        //   defaultCopyAction(e, dt, button, config);
        //   $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
        // });




        // var defaultColvisAction = myTable.button(0).action();
        // myTable.button(0).action(function (e, dt, button, config) {

        //   defaultColvisAction(e, dt, button, config);


        //   if($('.dt-button-collection > .dropdown-menu').length == 0) {
        //     $('.dt-button-collection')
        //     .wrapInner('<ul class="dropdown-menu dropdown-light " />')
        //     .find('a').attr('href', '#').wrap("<li />")
        //   }
        //   $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
        // });

        //

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