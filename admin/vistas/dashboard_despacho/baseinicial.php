<?php
ini_set('display_errors', '0');
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';

include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';

include_once 'modelos/gastos.php';
include_once 'controladores/gastosController.php';

include_once 'modelos/propietarios.php';
include_once 'controladores/propietariosController.php';

$mesactual= date('n');
$hoy= date('d');
$anoactual   = date('Y');
$tope= $mesactual+5;

$nominforme='Ordenes de trabajo';


?>

<!-- DataTables -->
  <!-- <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />




<!-- Content Wrapper. Contains page content -->
<div style="background-color: white;" class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark"><i class="fa fa-dashboard"> </i> Dashboard <?php echo($nominforme); ?> </h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active">Reporte <?php echo($nominforme); ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->

  <!-- Main content -->
  <div  class="content">
    <div class="container-fluid">

      <div class="row">

   
                <div class="col-md-3 col-xs-12">
                     <div class="chart">
                    <!-- Sales Chart Canvas 
                   <div id="grafica_3" style="height: 300px; width: 100%;"></div>
               -->
        </div>
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Indicadores Mensuales <br> <small> Actualizado al <?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d');
echo (fechalarga($TiempoActual));
?></small></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="InformeVentas">
         

       <table id="tablatrituradora" class="table  table-responsive table-striped table-bordered table-hover dataTables_borderWrap" style="width: 100%;font-size: 12px;">

          <thead>

               <tr style="background-color: #274350;color: white;">

                <th>Mes</th>
                <th>Total #</th>
                <th>Valor</th>
              </tr>
            </thead>
            <tbody>


            </tbody>

              <tfoot>
                 <?php

for ($i = 1; $i < $tope; $i++) {
    setlocale(LC_ALL, 'es_ES');
    $monthNum  = $i;
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthName = strftime('%B', $dateObj->getTimestamp());

    if ($monthNum==$mesactual) {
      $colorfila = "<tr class='info'>";
    }
    else{
      $colorfila = "<tr class=''>";
    }
    echo ($colorfila);

    ?>
  <td><strong><a href=""><i class="fa fa-line-chart"> </i> <?php echo (ucfirst($monthName)); ?></a></strong></td>
  
  <td>
    1239
  </td>
  <td>
   $ 1.679.000.000
  </td>

</tr>
 <?php
}

?>
             <tr class="success">
                <td><strong>Total</strong></td>
                <td><strong><?php echo ("$ " . number_format($sumaventas16, 0)) ?></strong></td>
                 <td><strong>Total</strong></td>
              </tr>

            </tfoot>
            </table>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->

     <div class="col-md-9">
        <?php 
        /*============================================
        =            Bloque de datos x 3             =
        ============================================*/

        /*----------  Bloque 1  ----------*/

        ?>
<div class="col-md-12">
    <form action="?controller=horasmq&&action=horasporfecha" method="post" id="FormFechas" autocomplete="off">
         <div class="col-md-8">
                        <div class="form-group">
                          <label>Seleccione el Rango de Fecha para visualizar <?php echo($nominforme); ?><span>*</span></label>
                          <input type="text"  name="daterange" class="form-control" required value="">
                        </div>
                      </div>
          <div class="form-group">
           
              <button class="btn btn-primary btn-sm" type="Submit">Realizar Consulta</button>
        
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

<div class="col-md-3 col-xs-6">
<div class="small-box bg-aqua">
<div class="inner">
<h4><i class="fa fa-calendar"> </i><strong> 1</strong></h4>
<p><?php echo($nominforme); ?></p>
</div>

<a href="#" class="small-box-footer">
Mes Actual <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>
    <?php 
    # ================================
    # =           Bloque 2           =
    # ================================  
     ?>

<div class="col-md-3 col-xs-6">
<div class="small-box bg-grey">
<div class="inner">
<h4><i class="fa fa-calendar"> </i><strong> 12</strong></h4>
<p><?php echo($nominforme); ?></p>
</div>

<a style="color: black;" href="#" class="small-box-footer">
Mes Anterior <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>

 <?php 
    # ================================
    # =           Bloque 3           =
    # ================================  
     ?>

<div class="col-md-3 col-xs-6">
<div class="small-box bg-grey">
<div class="inner">
<h4><i class="fa fa-calendar"> </i><strong> 123</strong></h4>
<p><?php echo($nominforme); ?></p>
</div>

<a style="color: black;" href="#" class="small-box-footer">
Trimestre <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>

 <?php 
    # ================================
    # =           Bloque 4           =
    # ================================  
     ?>

<div class="col-md-3 col-xs-6">
<div class="small-box bg-grey">
<div class="inner">
<h4><i class="fa fa-calendar"> </i><strong> $2.150.000.000</strong></h4>
<p><?php echo($nominforme); ?></p>
</div>

<a style="color: black;" href="#" class="small-box-footer">
Personalizado <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>




        
        <?php
        /*=====  End of Bloque de datos x 3   ======*/

        # ==================================================
        # =           Inicio de gráfica dinámica           =
        # ==================================================
         ?>
      <div class="col-md-12" id="chartContainer" style="height: 300px; width: 100%;"></div>

         <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.stock.min.js"></script>
<script type="text/javascript">
window.onload = function () {
  var dataPoints1 = [], dataPoints2 = [];
  var stockChart = new CanvasJS.StockChart("chartContainer",{
    theme: "light2",
    animationEnabled: true,
    title:{
      text:"<?php echo($nominforme); ?> diario"
    },
   
    charts: [{
      axisY: {
        title: "<?php echo($nominforme); ?>"
      },
      toolTip: {
        shared: true
      },
      legend: {
            cursor: "pointer",
            itemclick: function (e) {
              if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible)
                e.dataSeries.visible = false;
              else
                e.dataSeries.visible = true;
              e.chart.render();
            }
        },
      data: [{
        showInLegend: true,
        name: "No of Trades in $",
        yValueFormatString: "#,##0",
        xValueType: "dateTime",
        dataPoints : dataPoints1
      },{
        showInLegend: true,
        name: "No of Trades in €",
        yValueFormatString: "#,##0",
        dataPoints : dataPoints2
      }]
    }],
    rangeSelector: {
      enabled: false
    },
    navigator: {
      data: [{
        dataPoints: dataPoints1
      }],
      slider: {
        minimum: new Date(2018, 00, 15),
        maximum: new Date(2018, 02, 01)
      }
    }
  });
  $.getJSON("https://canvasjs.com/data/docs/btcvolume2018.json", function(data) {
    for(var i = 0; i < data.length; i++){
      dataPoints1.push({x: new Date(data[i].date), y: Number(data[i].volume_btc_usd)});
      
    }
    stockChart.render();
  });
}
</script>

         <?php 
         # ======  End of Gráfica Dinámica  =======
         
          ?>



    </div>



      </div> <!-- Fin Row -->

<hr>

      <div class="row"><!-- Start Row -->

        <div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#tab_1" data-toggle="tab">Total <?php echo($nominforme); ?></a></li>
<li><a href="#tab_2" data-toggle="tab">Mécanicos</a></li>
<li><a href="#tab_3" data-toggle="tab">Equipos</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_1">
      <div class="card-body">
      <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
         <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
           <tfoot style="display: table-header-group;">
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                  


                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
              <th>Orden</th>
              <th>Fecha Reporte</th>
              <th>Equipo</th>
              <th>Propietario</th>
              <th>Reportado por</th>
              <th>Problema Presentado</th>
               <th>Repuestos</th>
              <th>Solución</th>
            </tr>
            <tr>
               <th>Orden</th>
             <th>Fecha Reporte</th>
              <th>Equipo</th>
              <th>Propietario</th>
              <th>Reportado por</th>
              <th>Problema Presentado</th>
               <th>Repuestos</th>
              <th>Solución</th>
            </tr>
          </thead>
          <tbody>
            <?php
$res         = Equipos::obtenertodosreportes();
$movimientos = $res->getCampos();
foreach ($movimientos as $mov) {
    $id_reporte       = $mov['id_reporte'];
    $equipo_id_equipo = $mov['equipo_id_equipo'];
    $creado_por       = $mov['creado_por'];
    $fecha_reporte    = $mov['fecha_reporte'];
    $problema         = $mov['problema'];
    $num_salida_inv   = $mov['num_salida_inv'];
    $actividad        = $mov['actividad'];
    $repuesto         = $mov['repuesto'];
    $nombreq          = Equipos::obtenerNombreEquipo($equipo_id_equipo);
    $idpropietario    = Equipos::obtenerPropietarioEquipo($equipo_id_equipo);
    $nompropietario   = Propietarios::obtenerNombre($idpropietario);
    $nombrereporta    = Usuarios::obtenerNombreUsuario($creado_por);
    ?>
            <tr>
            <td><?php echo utf8_decode("OT-00".$id_reporte); ?></td>
            <td><?php echo utf8_decode(fechalarga($fecha_reporte)); ?></td>
            <td><?php echo utf8_decode($nombreq); ?></td>
            <td><?php echo utf8_decode($nompropietario); ?></td>
            <td><?php echo utf8_decode($nombrereporta); ?></td>
            <td><?php echo htmlspecialchars_decode($problema); ?></td>
            <td><?php echo htmlspecialchars_decode($repuesto); ?></td>
            <td><?php echo htmlspecialchars_decode($actividad); ?></td>

          
            </tr>
            <?php
}
?>
          </tbody>
          </table>
        </div> <!-- Fin Row -->
      </div> <!-- Fin card -->
</div>

<div class="tab-pane" id="tab_2">

<div id="divrubro" class="col-md-3">
                          <div class="form-group">
                              <label for="sel1">Listado:<span>*</span></label>
                              <select class="form-control mi-select" id="id_rubro" name="id_rubro" >
                                  <option value="" selected>Seleccione...</option>
                                <?php
                                  $rubros = Gastos::obtenerRubros();
                                  foreach($rubros as $rubro){
                                    $id_rubro = $rubro['id_rubro'];
                                    $nombre_rubro = $rubro['nombre_rubro'];
                                ?>
                                <option value="<?php echo $id_rubro; ?>"><?php echo utf8_encode($nombre_rubro); ?></option>
                                <?php }?>
                              </select>
                          </div>
                        </div>
<div class="col-md-9">
  <div class="card-body">
      <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
         <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
           <tfoot style="display: table-header-group;">
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                  


                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
              <th>Orden</th>
              <th>Fecha Reporte</th>
              <th>Equipo</th>
              <th>Propietario</th>
              <th>Reportado por</th>
              <th>Problema Presentado</th>
               <th>Repuestos</th>
              <th>Solución</th>
            </tr>
            <tr>
               <th>Orden</th>
             <th>Fecha Reporte</th>
              <th>Equipo</th>
              <th>Propietario</th>
              <th>Reportado por</th>
              <th>Problema Presentado</th>
               <th>Repuestos</th>
              <th>Solución</th>
            </tr>
          </thead>
          <tbody>
            <?php
$res         = Equipos::obtenertodosreportes();
$movimientos = $res->getCampos();
foreach ($movimientos as $mov) {
    $id_reporte       = $mov['id_reporte'];
    $equipo_id_equipo = $mov['equipo_id_equipo'];
    $creado_por       = $mov['creado_por'];
    $fecha_reporte    = $mov['fecha_reporte'];
    $problema         = $mov['problema'];
    $num_salida_inv   = $mov['num_salida_inv'];
    $actividad        = $mov['actividad'];
    $repuesto         = $mov['repuesto'];
    $nombreq          = Equipos::obtenerNombreEquipo($equipo_id_equipo);
    $idpropietario    = Equipos::obtenerPropietarioEquipo($equipo_id_equipo);
    $nompropietario   = Propietarios::obtenerNombre($idpropietario);
    $nombrereporta    = Usuarios::obtenerNombreUsuario($creado_por);
    ?>
            <tr>
            <td><?php echo utf8_decode("OT-00".$id_reporte); ?></td>
            <td><?php echo utf8_decode(fechalarga($fecha_reporte)); ?></td>
            <td><?php echo utf8_decode($nombreq); ?></td>
            <td><?php echo utf8_decode($nompropietario); ?></td>
            <td><?php echo utf8_decode($nombrereporta); ?></td>
            <td><?php echo htmlspecialchars_decode($problema); ?></td>
            <td><?php echo htmlspecialchars_decode($repuesto); ?></td>
            <td><?php echo htmlspecialchars_decode($actividad); ?></td>

          
            </tr>
            <?php
}
?>
          </tbody>
          </table>
        </div> <!-- Fin Row -->
      </div> <!-- Fin card -->
</div>


</div>

<div class="tab-pane" id="tab_3">
Lorem Ipsum is simply dummy text of the printing and typesetting industry.
Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
when an unknown printer took a galley of type and scrambled it to make a type specimen book.
It has survived not only five centuries, but also the leap into electronic typesetting,
remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
like Aldus PageMaker including versions of Lorem Ipsum.
</div>

</div>

</div>


        
      </div><!-- Fin Row -->




    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->
</div> <!-- Fin Content-Wrapper -->


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-select').select2();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#id_rubro').on('change',function(){
        var rubroID = $(this).val();
        alert (rubroID);
       
    });
});
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

<!-- page script -->

<script type="text/javascript">
      jQuery(function($) {

$('#cotizaciones thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
    } );

    var table = $('#cotizaciones').DataTable({
      responsive:true,
      "order": true,
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
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );



             $( api.column( 2 ).footer() ).html(
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

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  exportEnabled: true,
  animationEnabled: true,
  title:{
    text: "Reporte <?php echo ($nombre_equipo); ?>"
  },
  axisX:{
    valueFormatString: "DD MMM"
  },
  axisY: {
    title: "<?php echo ($unidad_reportada); ?> Trabajadas",
    includeZero: false,
    scaleBreaks: {
      autoCalculate: false
    }
  },
  data: [{
    type: "line",
    xValueFormatString: "DD MMM",
    yValueFormatString: "#.### <?php echo ($unidad_reportada); ?>",
    color: "#F08080",
    dataPoints: [
     <?php
// Consulta por día
$mesactual = date("n");
$mesvector = $mesactual - 1;

$res    = Equipos::GraficaReporteDiario($mesactual, $id_equipo);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $DIA = $campo['DIA'];
    $TB  = $campo['TB'];
    ?>
      { x: new Date(2019, <?php echo ($mesvector) ?>, <?php echo ($DIA) ?>), y: <?php echo ($TB) ?> },
     <?php
}
?>

    ]
  }]
});
chart.render();

}
</script>