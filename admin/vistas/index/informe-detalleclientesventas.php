<?php 
$RolSesion = $_SESSION['IdRol'];
error_reporting(E_ALL);
ini_set('display_errors', '0');
include 'vistas/index/funciones.php';
include 'vistas/index/estadisticas.php';
include 'vistas/index/estadisticas_despachoscl.php';
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';
include_once 'modelos/productos.php';
include_once 'controladores/productosController.php';
include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';
include_once 'modelos/reportes.php';
include_once 'controladores/reportesController.php';

$elcliente=$_GET['elcliente'];

$nombrecliente=Clientes::obtenerNombreCliente($elcliente);

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];
date_default_timezone_set("America/Bogota");
$totaldiasmes= date('t');
$anoactual= date('Y');
$mesactual= date('n');
$mesanterior=$mesactual-1;

  $primerdiames=$mesactual."/01/".$anoactual;
  $ultimodiames=$mesactual."/".$totaldiasmes."/".$anoactual;

  $primerdiamescons=$anoactual."-".$mesactual."-01";
  $ultimodiamescons=$anoactual."-".$mesactual."-".$totaldiasmes;

  $primerdiamesanterior=$anoactual."-".$mesanterior."-01";
  $ultimodiamesanterior=$anoactual."-".$mesanterior."-".$totaldiasmes;



$fechaform=$_POST['daterange'];

// Fecha del Mes actual
$FechaInicioDia=($primerdiamescons." 00:00:000");
$FechaFinalDia=($ultimodiamescons." 23:59:000");

// Fecha del Mes anterior
$InicioMesanterior=($primerdiamesanterior." 00:00:000");
$FinalMesanterior=($ultimodiamesanterior." 23:59:000");


// Fechas del día actual
date_default_timezone_set("America/Bogota");
$MarcaTemporal = date('Y-m-d');
$FechaInicioDiaActual=($MarcaTemporal." 00:00:000");
$FechaFinalDiaActual=($MarcaTemporal." 23:59:000");





 ?>
 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section  class="content-header">
      <h1>
        Informe
        <small>Facturas 1.0</small>
      </h1>
      <ol  class="breadcrumb">
        <li><a href="?controller=index&&action=informeventaclientes"><i class="fa fa-dashboard"></i> Volver a Facturación</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   <h1 class="text-center">Informe <?php echo($nombrecliente); ?>  <br> <small> <?php 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></small></h1>
      <div class="row">

         <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                   <ol class="breadcrumb">
    <li><a href="?controller=index&&action=informeventaclientes" ><i class="fa  fa-check"> </i> Volver a Facturación</a></li>
      </ol>
                  <div style="display: none;" class="chart">
                    <!-- Sales Chart Canvas -->
                   <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
              
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
        <!--Inicio Tabs-->
         <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Informe Facturas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div style="display: none;" class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Hoy
                        <?php  $sumadeldia=Despachoscldetallemesventas($elcliente,$FechaInicioDiaActual,$FechaFinalDiaActual); ?>
                         <strong> <?php echo(round($sumadeldia,2)); ?> - M3</strong>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                     <?php //require 'despachoscldetallehoy.php'; ?>
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        Mes Actual 
                        <?php $Acpmmesactual=Despachoscldetallemesventas($elcliente,$FechaInicioDia,$FechaFinalDia); ?>
                        <strong> <?php echo(round($Acpmmesactual,2)); ?> - M3</strong>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                      <?php require 'despachoscldetalleactualventas.php'; ?>
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Mes Anterior
                         <?php  $Acpmmesanterior=Despachoscldetallemesventas($elcliente,$InicioMesanterior,$FinalMesanterior); ?>
                        <strong> <?php echo(round($Acpmmesanterior,2)); ?> - M3</strong>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                     <?php //require 'despachoscldetalleanteriorventas.php'; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        
        </div>
        <!-- Final Tabs-->

      
         
      </div>
      <!-- /.row -->





  
      </div>
      <!-- /.row -->


  
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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


<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  exportEnabled: true,
  animationEnabled: true,
  title:{
    text: "Reporte diario M3"
  },
  axisX:{
    valueFormatString: "DD MMM"
  },
  axisY: {
    title: "ACPM X GL",
    includeZero: false,
    scaleBreaks: {
      autoCalculate: false
    }
  },
  data: [{
    type: "column",
    xValueFormatString: "DD MMM",
    yValueFormatString: "#.### M3",
    color: "#FFBF72",
    dataPoints: [
     <?php 
// Consulta por día 

$graficamesanterior=$_GET['graficamesanterior'];


if ($graficamesanterior!="") {
  $mesactualin = date("n");
  $mesactual = $mesactualin-1;
  $mesvector=$mesactual-1;
}
else
{
  $mesactual = date("n");
  $mesvector=$mesactual-1;
}

$res=Reportes::GraficaReporteDiarioDespachosdetallecl($elcliente,$mesactual);
$campos = $res->getCampos();
foreach($campos as $campo){
  $DIA = $campo['DIA'];
  $TB = $campo['M3'];
     ?> 
      { x: new Date(2019, <?php echo($mesvector) ?>, <?php echo($DIA) ?>), y: <?php echo($TB) ?> },
     <?php 
   }
      ?>
      
    ]
  }]
});
chart.render();

}
</script>


    