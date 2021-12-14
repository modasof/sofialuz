<?php
ini_set('display_errors', '0');
include_once 'modelos/cajas.php';
include_once 'controladores/cajasController.php';

include_once 'modelos/rubros.php';
include_once 'controladores/rubrosController.php';

include_once 'modelos/informes.php';
include_once 'controladores/informesController.php';

include_once 'vistas/index/header-formdate.php';

$CuentaSel      = $_GET['id_caja'];
$nombrecuenta   = Cajas::obtenerNombreCaja($CuentaSel);
$inicial        = Cajas::obtenerInicialpor($CuentaSel);
$entradascaja   = Cajas::obtenerEntradaspor($CuentaSel);
$entradascuenta = Cajas::obtenerEntradasporcuenta($CuentaSel);
$salidas        = Cajas::obtenerSalidaspor($CuentaSel);

$totalentrada = $inicial + $entradascaja + $entradascuenta;
$saldofinal   = $totalentrada - $salidas;

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark">Movimientos <?php echo ($nombrecuenta); ?></h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="?controller=informes&&action=cajas">Cajas</a></li>

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

      <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Entradas   $<?php echo (number_format($totalentrada, 2)); ?> </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-chevron-down"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

         <form action="?controller=informes&&action=movimientoscajas&&id_caja=<?php echo ($CuentaSel) ?>" method="post" id="FormFechas" autocomplete="off">
         <div class="col-md-8">
                        <div class="form-group">
                          <label>Seleccione el Rango de Fecha<span>*</span></label>
                          <input type="daterange"  name="daterange" class="form-control" required value="<?php echo ($campodefault); ?>">
                          <?php
if ($fechaform != "") {
    ?>
           <small class="m-0 text-dark"><strong>Ingresos del <?php echo (fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></strong></small>
          <?php
} else {
    ?>
           <small class="m-0 text-dark">Ingresos del <?php echo (fechalarga($ultimos30dias)) ?> al <?php echo (fechalarga($datofechafinal)) ?>  </small>
          <?php
}
?>
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
    "startDate": "<?php echo ($campofinal); ?>",
    "endDate": "<?php echo ($campoinicial); ?>",
    "opens": "left"
}, function(start, end, label) {
  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});
</script>

               <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;">
          <thead>
            <tr style="background-color: #ffc107;color: black;">

              <th>Ingreso Por</th>
              <th>Valor</th>
              <th>%<i class="fas fa-chart-pie"></i></th>
            </tr>
            <tr>
              <th>Ingreso Por</th>
              <th>Valor</th>
              <th>%<i class="fas fa-chart-pie"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php
if ($fechaform != "") {
    $res = Informes::ListaIngresosCaja($FechaStart, $FechaEnd, $CuentaSel);

} else {
    $res = Informes::ListaIngresosCaja($FechaStart, $FechaEnd, $CuentaSel);

}
foreach ($res as $campo) {

    $ingreso_por = $campo['ingreso_por'];

    $totalingresospor      = Informes::SumaIngresosportipocaja($FechaStart, $FechaEnd, $CuentaSel, $ingreso_por);
    $porcentajeingresos = ($totalingresospor / $totalentrada) * 100;

    ?>
            <tr>

              <td><?php echo $ingreso_por; ?></td>
              <td>
                <?php echo utf8_encode("$" . number_format($totalingresospor)); ?>
              </td>
              <td>
                <span class="badge bg-success"><?php echo round($porcentajeingresos, 2) ?>%</span>

              </td>
            </tr>
            <?php
}
?>
          </tbody>
          </table>
        </div> <!-- Fin Row -->
              </div>
              <!-- /.card-body -->
            </div>


    </div>







        <div class="col-lg-12">

      <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Egresos   $<?php echo (number_format($salidas, 2)); ?> </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-chevron-down"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

         <form action="?controller=informes&&action=movimientoscajas&&id_caja=<?php echo ($CuentaSel) ?>" method="post" id="FormFechas" autocomplete="off">
         <div class="col-md-8">
                        <div class="form-group">
                          <label>Seleccione el Rango de Fecha<span>*</span></label>
                          <input type="daterange"  name="daterange" class="form-control" required value="<?php echo ($campodefault); ?>">
                          <?php
if ($fechaform != "") {
    ?>
           <small class="m-0 text-dark"><strong>Egresos del <?php echo (fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></strong></small>
          <?php
} else {
    ?>
           <small class="m-0 text-dark">Egresos del <?php echo (fechalarga($ultimos30dias)) ?> al <?php echo (fechalarga($datofechafinal)) ?>  </small>
          <?php
}
?>
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
    "startDate": "<?php echo ($campofinal); ?>",
    "endDate": "<?php echo ($campoinicial); ?>",
    "opens": "left"
}, function(start, end, label) {
  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});
</script>

               <div class="clearfix">
                      <div class="pull-left tableTools-container2"></div>
                </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones2" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;">
          <thead>
            <tr style="background-color: #ffc107;color: black;">

              <th>Rubro-Egreso</th>
              <th>Valor</th>
              <th>% <i class="fas fa-chart-pie"></i></th>
            </tr>
            <tr>
              <th>Rubro-Egreso</th>
              <th>Valor</th>
              <th>% <i class="fas fa-chart-pie"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php
if ($fechaform != "") {
    $res = Informes::ListaEgresosCaja($FechaStart, $FechaEnd, $CuentaSel);

} else {
    $res = Informes::ListaEgresosCaja($FechaStart, $FechaEnd, $CuentaSel);

}
foreach ($res as $campo) {

    $rubrocuenta = $campo['rubrocuenta'];
    $nombrerubro = Rubros::ObtenerNombreRubro($rubrocuenta);

    $totalegresospor      = Informes::SumaEgresosportipocaja($FechaStart, $FechaEnd, $CuentaSel, $rubrocuenta);
    $porcentajeegresos = ($totalegresospor / $salidas) * 100;

    ?>
            <tr>

              <td><a href="?controller=informes&&action=subrubrosegresoscaja&&id_rubro=<?php echo ($rubrocuenta) ?>&&id_caja=<?php echo ($CuentaSel); ?>"><?php echo $nombrerubro; ?></a></td>
              <td>
                <?php echo utf8_encode("$" . number_format($totalegresospor)); ?>
              </td>
              <td>
                <span class="badge bg-success"><?php echo round($porcentajeegresos, 2) ?>%</span>
              </td>
            </tr>
            <?php
}
?>
          </tbody>
          </table>
        </div> <!-- Fin Row -->
              </div>
              <!-- /.card-body -->
            </div>


    </div>



      </div> <!-- Fin Row -->
    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->
</div> <!-- Fin Content-Wrapper -->

<script>
function eliminar(id){
   eliminar=confirm("¿Deseas eliminar esta cuenta?");
   if (eliminar)
     window.location.href="?controller=cuentas&&action=eliminar&&id="+id;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
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
      "paging":false,
      "lengthChange":false,
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



          } );





        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons( myTable, {
         "buttons": ["colvis","copy","excel","pdf"]
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

    <script type="text/javascript">
      jQuery(function($) {

$('#cotizaciones2 thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones2 thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
    } );

    var table = $('#cotizaciones2').DataTable({
      responsive:true,
      "ordering": true,
      "paging":false,
      "lengthChange":false,
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
         "buttons": ["colvis","copy","excel","pdf"]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container2') );



        setTimeout(function() {
          $($('.tableTools-container2')).find('a.dt-button').each(function() {
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
        $('#cotizaciones2 > thead > tr > th input[type=checkbox], #cotizaciones_wrapper input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header

          $('#cotizaciones2').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) myTable.row(row).select();
            else  myTable.row(row).deselect();
          });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#cotizaciones2').on('click', 'td input[type=checkbox]' , function(){
          var row = $(this).closest('tr').get(0);
          if(this.checked) myTable.row(row).deselect();
          else myTable.row(row).select();
        });



        $(document).on('click', '#cotizaciones2 .dropdown-toggle', function(e) {
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