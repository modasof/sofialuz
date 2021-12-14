<?php 
$RolSesion = $_SESSION['IdRol'];
error_reporting(E_ALL);
ini_set('display_errors', '0');
include 'vistas/index/funciones.php';
include 'vistas/index/estadisticas.php';
include 'vistas/index/estadisticasinforme1.php';
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';
include_once 'modelos/productos.php';
include_once 'controladores/productosController.php';
include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];
date_default_timezone_set("America/Bogota");
$totaldiasmes= date('t');
$anoactual= date('Y');
$mesactual= date('n');
$tope= $mesactual+1;
$ordertable= $mesactual+2;


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
        Informe
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Informe</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   <h1 class="text-center">Informe General // <?php 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></h1>
    
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informe Producción Conductores <small> Actualizado al <?php 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></small></h3>
               
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                 
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="InformeVentas">
              <div class="clearfix">
                      <div class="pull-right tableTools-container"></div>
                    </div>
              <h3>Informe Conductores</h3>
              <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover dataTables_borderWrap" style="width: 100%;font-size: 13px;">
             
          <thead>
           
               <tr style="background-color: #4f5962;color: white;">
                <th>Tarifa X Flete</th>
                <?php 

                 for ($i=1; $i <$tope ; $i++) { 
                  setlocale(LC_ALL, 'es_ES');
          $monthNum  = $i;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = strftime('%B', $dateObj->getTimestamp());

echo ("<th>".$monthName."</th>");
                }

                 ?>
            
                <th>Totales</th>
              </tr>
            </thead>
            <tbody>
              <?php 

    $res=Usuarios::ListaUsuariosCond();
foreach($res as $campo){
  $id_usuario = $campo['id_usuario'];
  $nombre_usuario = $campo['nombre_usuario'];
  $ventasanopro=ProduccionAnualConductor($anoactual,$id_usuario);
  if ($ventasanopro!=0) {
   
     ?> 
     
              <tr>
                <td><strong><?php echo($nombre_usuario); ?></strong></td>
                 <?php 
                for ($i=1; $i <$tope ; $i++) { 
                  $ventamespro=ProduccionConductorpormes($i,$anoactual,$id_usuario);
                  $totalpro=ProduccionMesConductor($i,$anoactual);

                  if ($ventamespro==0) {
                    $porcentajeventapro=0;
                  }
                  else
                  {
                    $porcentajeventapro=($ventamespro/$totalpro)*100;
                  }
                  if ($ventamespro>0) {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#dff0d8;'><a style='color:black;' href='#'><small style='color:#128a2e;'><strong> ".round($porcentajeventapro,1)."% </strong></small>  $".number_format($ventamespro,0)."</a></td>");
                  }
                  else
                  {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#f2dede;'><a href='#' style='color:black;'><small style='color:#F08080;'><strong>0%</strong></small>$".number_format(0,0)."</a></td>");
                  }
                  
                }
                 ?>
                 <td style="background-color: #d9edf7;"><strong>$ 
                  <?php 

                 echo(number_format($ventasanopro,0)); 
                 ?></strong></td>
              </tr>
            <?php 
            }
          }
             ?>
           
            </tbody>
            <tfoot>
               <tr  class="info">
                <td><strong>Total Producción <?php echo($anoactual); ?></strong></td>
                <?php 
                for ($i=1; $i <$tope ; $i++) { 
                  $ventames1=ProduccionMesConductor($i,$anoactual);
                  $sumaventas1+=$ventames1;
                  echo("<td><strong> $ ".number_format($ventames1,0)."</strong></td>");
                }
                 ?>
                 <td><strong>$ <?php echo(number_format($sumaventas1,0)); ?></strong></td>
              </tr>
            </tfoot>
              
            </table>
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  
      




            <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informe Producción Operadores máquina <small> Actualizado al <?php 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></small></h3>
               
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                 
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="InformeVentas">
              <div class="clearfix">
                      <div class="pull-right tableTools-container2"></div>
                    </div>
              <h3>Informe Operadores</h3>
              <table id="cotizaciones2" class="table  table-responsive table-striped table-bordered table-hover dataTables_borderWrap" style="width: 100%;font-size: 13px;">
             
          <thead>
           
               <tr style="background-color: #4f5962;color: white;">
                <th>Tarifa X Flete</th>
                <?php 

                 for ($i=1; $i <$tope ; $i++) { 
                  setlocale(LC_ALL, 'es_ES');
          $monthNum  = $i;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = strftime('%B', $dateObj->getTimestamp());

echo ("<th>".$monthName."</th>");
                }

                 ?>
            
                <th>Totales</th>
              </tr>
            </thead>
            <tbody>
              <?php 

    $res=Usuarios::ListaUsuariosOperadores();
foreach($res as $campo){
  $id_usuario = $campo['id_usuario'];
  $nombre_usuario = $campo['nombre_usuario'];
  $ventasanopro=ProduccionAnualOperador($anoactual,$id_usuario);
  if ($ventasanopro!=0) {
     ?> 
     
              <tr>
                <td><strong><?php echo($nombre_usuario); ?></strong></td>
                 <?php 
                for ($i=1; $i <$tope ; $i++) { 
                  $ventamespro=ProduccionOperadorpormes($i,$anoactual,$id_usuario);
                  $totalpro=ProduccionMesOperador($i,$anoactual);

                  if ($ventamespro==0) {
                    $porcentajeventapro=0;
                  }
                  else
                  {
                    $porcentajeventapro=($ventamespro/$totalpro)*100;
                  }
                  if ($ventamespro>0) {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#dff0d8;'><a style='color:black;' href='#'><small style='color:#128a2e;'><strong> ".round($porcentajeventapro,1)."% </strong></small>  $".number_format($ventamespro,0)."</a></td>");
                  }
                  else
                  {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#f2dede;'><a href='#' style='color:black;'><small style='color:#F08080;'><strong>0%</strong></small>$".number_format(0,0)."</a></td>");
                  }
                  
                }
                 ?>
                 <td style="background-color: #d9edf7;"><strong>$ 
                  <?php 

                 echo(number_format($ventasanopro,0)); 
                 ?></strong></td>
              </tr>
            <?php 
            }
          }
             ?>
           
            </tbody>
            <tfoot>
               <tr  class="info">
                <td><strong>Total Operadores Máquina <?php echo($anoactual); ?></strong></td>
                <?php 
                for ($i=1; $i <$tope ; $i++) { 
                  $ventames2=ProduccionMesOperador($i,$anoactual);
                  $sumaventas2+=$ventames2;
                  echo("<td><strong> $ ".number_format($ventames2,0)."</strong></td>");
                }
                 ?>
                 <td><strong>$ <?php echo(number_format($sumaventas2,0)); ?></strong></td>
              </tr>
            </tfoot>
              
            </table>
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
}
  </script>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Ventas vs CdV"
  },
  axisX:{
    valueFormatString: "MMM, YYYY",
    crosshair: {
      enabled: true,
      snapToDataPoint: true
    }
  },
  axisY: {
    //title: "Ventas Vs Compras",
    crosshair: {
      enabled: true
    }
  },
  toolTip:{
    shared:true
  },  
  legend:{
    cursor:"pointer",
    verticalAlign: "bottom",
    horizontalAlign: "left",
    dockInsidePlotArea: true,
    itemclick: toogleDataSeries
  },
  data: [{
    type: "line",
    showInLegend: true,
    name: "Ventas",
    markerType: "square",
    xValueFormatString: "MMM, YYYY",
    color: "#51cda0",
    dataPoints: [

    <?php 
      for ($i=0; $i <12 ; $i++) { 
                  $mesmas=$i+1;
                  $ventasmes=TotalVentasMes($mesmas,$anoactual);
                  ?>
                   { x: new Date(<?php echo($anoactual) ?>, <?php echo($i) ?>,<?php echo($i+1); ?> ), y: <?php echo(round($ventasmes,0)) ?> },
                  <?php
                }

     ?> 
    ]
  },
  {
    type: "line",
    showInLegend: true,
    name: "Cdv",
    lineDashType: "dash",
    color: "#F08080",
    dataPoints: [

    <?php 
      for ($i=0; $i <12 ; $i++) { 
        $mesmas=$i+1;
                  $comprasmes=TotalComprasMes($mesmas,$anoactual);

                  ?>
                   { x: new Date(<?php echo($anoactual) ?>, <?php echo($i) ?>,<?php echo($i+1); ?> ), y: <?php echo(round($comprasmes,0)) ?> },
                  <?php
                }

     ?>  
    ]
  }]
});
chart.render();

function toogleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  } else{
    e.dataSeries.visible = true;
  }
  chart.render();
}

}
</script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
   function format2(n, currency) {
    return currency + " " + n.toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
function formatmoneda(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
        $(document).ready(function() {
    $('#example').DataTable( {
         "searching": false,
        "ordering": false,
        "paging":   false,
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
     "scrollX": true,
     "ordering": true,
      "searching": false,
       "paging":   false,
        "info":     false,
        "order": [[ <?php echo($tope); ?>, "desc" ]],
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
        .wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
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

      
      })
    </script>
    <script type="text/javascript">
      jQuery(function($) {
      
$('#cotizaciones2 thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones2 thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } ); 


  
    var table = $('#cotizaciones2').DataTable({
        
      responsive:true,
     "scrollX": true,
     "ordering": true,
      "searching": false,
       "paging":   false,
        "info":     false,
        "order": [[ <?php echo($tope); ?>, "desc" ]],
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
        .wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
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

      
      })
    </script>
