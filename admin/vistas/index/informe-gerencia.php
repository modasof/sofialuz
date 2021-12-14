<?php 
$RolSesion = $_SESSION['IdRol'];
error_reporting(E_ALL);
ini_set('display_errors', '0');
include 'vistas/index/funciones.php';
include 'vistas/index/estadisticas.php';
include 'vistas/index/estadisticas_acpm.php';
include 'vistas/formulas/formulasinforme-gerencia.php';
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


// Fecha del Mes actual
$FechaInicioDia=($primerdiamescons." 00:00:000");
$FechaFinalDia=($ultimodiamescons." 23:59:000");

// Fecha del Mes actual
$BFechaInicioDia=($primerdiamesanterior." 00:00:000");
$BFechaFinalDia=($ultimodiamesanterior." 23:59:000");


date_default_timezone_set("America/Bogota");
$MarcaTemporal = date('Y-m-d');
//echo("FECHA QUE LLEGA:".$fechaform."<br>");

require_once 'moduloA.php';
require_once 'moduloB.php';

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
        <small>Version Móvil 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Informe</li>
      </ol>
    </section>

  <section class="content">
  
        <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Buscar Informe por fecha <i class="fa fa-calendar"></i></h3>

              <div class="box-tools pull-left">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: none;">
               <form action="?controller=index&&action=informegerencia" method="post" id="FormFechas" autocomplete="off">
         <div class="col-md-6">
                        <div class="form-group">
                          <label>Seleccione el Rango de Fecha 1<span>*</span></label>
                          <input type="text"  name="daterange" class="form-control" required value="">
                        </div>
        </div>
        <div class="col-md-6">
                        <div class="form-group">
                          <label>Seleccione el Rango de Fecha 2<span>*</span></label>
                          <input type="text"  name="daterange2" class="form-control" required value="">
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
        'Últimos 15 días': [moment().subtract(14, 'days'), moment()],
        'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
        'Últimos 60 días': [moment().subtract(59, 'days'), moment()],
        'Este Mes': [moment().startOf('month'), moment().endOf('month')],
        'Mes Anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
       
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
<script type="text/javascript">
  $('input[name="daterange2"]').daterangepicker({
    ranges: {
        'Hoy': [moment(), moment()],
        'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
        'Últimos 15 días': [moment().subtract(14, 'days'), moment()],
        'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
        'Últimos 60 días': [moment().subtract(59, 'days'), moment()],
        'Este Mes': [moment().startOf('month'), moment().endOf('month')],
        'Mes Anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
       
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
            <!-- /.box-body -->
          </div>

      <div class="row" id="areaImprimir">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
             <?php 
             if ($fechaform2=='') {
               ?>
                <h3 class="box-title">Informe del <?php echo(fechalarga($primerdiamescons)); ?> al <?php echo(fechalarga($ultimodiamescons)); ?></h3>
               <?php
             }
             else
             {
              ?>
               <h3 class="box-title">Informe del <?php echo(fechalarga($FechaUno)); ?> al <?php echo(fechalarga($FechaDos)); ?></h3>
              <?php
             }
              ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 8px">#</th>
                   <th colspan="2">Ventas <small>(Total Facturado)</small></th>
                  
                  <th></th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td><a href="?controller=index&&action=informegerencia">Transporte Agregados</a></td>
                  <td><span class="badge bg-green"><?php echo round($A101P,0) ?>%</span></td>
                  <td style="text-align: right;"><?php echo utf8_encode("$".number_format($A101,0)); ?></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td><a href="#">Mezcla Asfaltica</a></td>
                  <td><span class="badge bg-green"><?php echo round($A102P,0) ?>%</span></td>
                   <td style="text-align: right;"><?php echo utf8_encode("$".number_format($A102,0)); ?></td>
                </tr>
                 <tr>
                  <td>3.</td>
                  <td><a href="#">Alquiler de Maquinaria</a></td>
                  <td><span class="badge bg-green"><?php echo round($A103P,0) ?>%</span></td>
                   <td style="text-align: right;"><?php echo utf8_encode("$".number_format($A103,0)); ?></td>
                </tr>
                <tr>
                  <td colspan="2" style="text-align: right;"><b><em>Total Ventas</em></b></td>
                 
                  <td colspan="2" style="text-align: right;"><em><b><?php echo utf8_encode("$".number_format($sumaA1,0)); ?></b></em></td>
                </tr>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix"></div>
             <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 8px">#</th>
                  <th colspan="2">Total Ingresos</th>
                 
                  <th style="width: 40px"></th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td><a href="#">Pagos, Anticipos, Abonos</a></td>
                  <td><span class="badge bg-light-blue"><?php echo round($A201P,0) ?>%</span></td>
              <td style="text-align: right;"><?php echo utf8_encode("$".number_format($A201,0)); ?></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td><a href="#">Préstamos Bancarios</a></td>
                  <td><span class="badge bg-light-blue"><?php echo round($A202P,0) ?>%</span></td>
              <td style="text-align: right;"><?php echo utf8_encode("$".number_format($A202,0)); ?></td>
                </tr>
                 <tr>
                  <td>3.</td>
                  <td><a href="#">Préstamos de Socios</a></td>
                  <td><span class="badge bg-light-blue"><?php echo round($A203P,0) ?>%</span></td>
              <td style="text-align: right;"><?php echo utf8_encode("$".number_format($A203,0)); ?></td>
                </tr>
                 <tr>
                  <td>4.</td>
                  <td><a href="#">Aporte de Socios</a></td>
                  <td><span class="badge bg-light-blue"><?php echo round($A204P,0) ?>%</span></td>
              <td style="text-align: right;"><?php echo utf8_encode("$".number_format($A204,0)); ?></td>
                </tr>
                <tr>
                  <td colspan="2" style="text-align: right;"><b><em>Total Ingresos</em></b></td>
                 <td></td>
                  <td><b><em><?php echo utf8_encode("$".number_format($sumaA2,0)); ?></em></b></td>
                  
                </tr>
                 <tr>
                  <td  colspan="2" style="text-align: right;"><b><a style="color: #00a65a;" href="">Cuentas x Cobrar</a></b></td>
                 
                  <td colspan="2" style="text-align: right;"><b><a style="color: #00a65a;" href=""><?php echo utf8_encode("$".number_format($A205,0)); ?></a></b></td>
                </tr>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix"></div>
             <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                   <th colspan="2"><em>Total Gastos</em></th>
                  
                  <th colspan="2" style="width: 40px;text-align: left;"><em><?php echo utf8_encode("$".number_format($SumaA3,0)); ?></em></th>
                </tr>
               
                <tr>
                  <td>1.</td>
                  <td><a href="#">Gastos Operacionales</a></td>
                  <td><?php echo utf8_encode("$".number_format($A301,0)); ?></td>
                  <td><span class="badge bg-yellow"><?php echo round($A301P,0) ?>%</span></td>
                  
                </tr>
                 <tr>
                  <td>2.</td>
                   <td><a href="#">Gastos Administrativos</a></td>
                   <td><?php echo utf8_encode("$".number_format($A302,0)); ?></td>
                  <td><span class="badge bg-yellow"><?php echo round($A302P,0) ?>%</span></td>
                  
                </tr>
                 <tr>
                  <td>3.</td>
                   <td><a href="#">Gastos Financieros</a></td>
                   <td><?php echo utf8_encode("$".number_format($A303,0)); ?></td>
                  <td><span class="badge bg-yellow"><?php echo round($A303P,0) ?>%</span></td>
                  
                </tr>
                <tr style="border-bottom-style: double;border-color: black; border:2">
                  <td></td>
                   <td></td>
                  <td></td>
                  <td></td>
                </tr>
                  <tr>
                  <td  colspan="2" style="text-align: right;"><b><a style="color: #dd4b39;" href="">Gastos a Crédito</a></b></td>
                 
                  <td  style="text-align: right;"><b><a style="color: #dd4b39;" href=""><?php echo utf8_encode("$".number_format($A304,0)); ?></a></b></td>
                  <td><span class="badge bg-red"><?php echo round($A304P,0) ?>%</span></td>
                </tr>
                </tr>
                  <tr>
                  <td  colspan="2" style="text-align: right;"><b><a href="">Gastos Inmediatos</a></b></td>
                 
                  <td  style="text-align: right;"><b><a  href=""><?php echo utf8_encode("$".number_format($A305,0)); ?></a></b></td>
                  <td><span class="badge bg-light-blue"><?php echo round($A305P,0) ?>%</span></td>
                </tr>
                <tr>
                  <th style="width: 8px"><span class="badge bg-light-blue"><?php echo round($A306P,0) ?>%</span></th>
                   <th ><em>Abonos a Cuentas x Pagar</em></th>
                  
                  <th style="width: 40px"><em><?php echo utf8_encode("$".number_format($A306,0)); ?></em></th>
                </tr>
              
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- Inicio Segundo Panel-->
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
             <?php 
             if ($fechaform2=='') {
               ?>
                 <h3 class="box-title">Informe del <?php echo(fechalarga($primerdiamesanterior)); ?> al <?php echo(fechalarga($ultimodiamesanterior)); ?></h3>
               <?php
             }
             else
             {
              ?>
               <h3 class="box-title">Informe del <?php echo(fechalarga($BFechaUno)); ?> al <?php echo(fechalarga($BFechaDos)); ?></h3>
              <?php
             }
              ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 8px">#</th>
                   <th colspan="2">Ventas <small>(Total Facturado)</small></th>
                  
                  <th></th>
                </tr>
                 <tr>
                  <td>1.</td>
                  <td><a href="#">Transporte Agregados</a></td>
                  <td><span class="badge bg-green"><?php echo round($B101P,0) ?>%</span></td>
                  <td style="text-align: right;"><?php echo utf8_encode("$".number_format($B101,0)); ?></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td><a href="#">Mezcla Asfaltica</a></td>
                  <td><span class="badge bg-green"><?php echo round($B102P,0) ?>%</span></td>
                   <td style="text-align: right;"><?php echo utf8_encode("$".number_format($B102,0)); ?></td>
                </tr>
                 <tr>
                  <td>3.</td>
                  <td><a href="#">Alquiler de Maquinaria</a></td>
                  <td><span class="badge bg-green"><?php echo round($B103P,0) ?>%</span></td>
                   <td style="text-align: right;"><?php echo utf8_encode("$".number_format($B103,0)); ?></td>
                </tr>
                <tr>
                  <td colspan="2" style="text-align: right;"><b><em>Total Ventas</em></b></td>
                 
                  <td colspan="2" style="text-align: right;"><em><b><?php echo utf8_encode("$".number_format($sumaB1,0)); ?></b></em></td>
                </tr>
              </tbody>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix"></div>
             <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 8px">#</th>
                  <th colspan="2">Total Ingresos</th>
                 
                  <th style="width: 40px"></th>
                </tr>
                 <tr>
                  <td>1.</td>
                  <td><a href="#">Pagos, Anticipos, Abonos</a></td>
                  <td><span class="badge bg-light-blue"><?php echo round($B201P,0) ?>%</span></td>
              <td style="text-align: right;"><?php echo utf8_encode("$".number_format($B201,0)); ?></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td><a href="#">Préstamos Bancarios</a></td>
                  <td><span class="badge bg-light-blue"><?php echo round($B202P,0) ?>%</span></td>
              <td style="text-align: right;"><?php echo utf8_encode("$".number_format($B202,0)); ?></td>
                </tr>
                 <tr>
                  <td>3.</td>
                  <td><a href="#">Préstamos de Socios</a></td>
                  <td><span class="badge bg-light-blue"><?php echo round($B203P,0) ?>%</span></td>
              <td style="text-align: right;"><?php echo utf8_encode("$".number_format($B203,0)); ?></td>
                </tr>
                 <tr>
                  <td>4.</td>
                  <td><a href="#">Aporte de Socios</a></td>
                  <td><span class="badge bg-light-blue"><?php echo round($B204P,0) ?>%</span></td>
              <td style="text-align: right;"><?php echo utf8_encode("$".number_format($B204,0)); ?></td>
                </tr>
                <tr>
                  <td colspan="2" style="text-align: right;"><b><em>Total Ingresos</em></b></td>
                 <td></td>
                  <td><b><em><?php echo utf8_encode("$".number_format($sumaB2,0)); ?></em></b></td>
                  
                </tr>
                 <tr>
                  <td  colspan="2" style="text-align: right;"><b><a style="color: #00a65a;" href="">Cuentas x Cobrar</a></b></td>
                 
                  <td colspan="2" style="text-align: right;"><b><a style="color: #00a65a;" href=""><?php echo utf8_encode("$".number_format($B205,0)); ?></a></b></td>
                </tr>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix"></div>
             <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                   <th colspan="2"><em>Total Gastos</em></th>
                  
                  <th colspan="2" style="width: 40px;text-align: left;"><em><?php echo utf8_encode("$".number_format($SumaB3,0)); ?></em></th>
                </tr>
               
                <tr>
                  <td>1.</td>
                  <td><a href="#">Gastos Operacionales</a></td>
                  <td><?php echo utf8_encode("$".number_format($B301,0)); ?></td>
                  <td><span class="badge bg-yellow"><?php echo round($B301P,0) ?>%</span></td>
                  
                </tr>
                 <tr>
                  <td>2.</td>
                   <td><a href="#">Gastos Administrativos</a></td>
                   <td><?php echo utf8_encode("$".number_format($B302,0)); ?></td>
                  <td><span class="badge bg-yellow"><?php echo round($B302P,0) ?>%</span></td>
                  
                </tr>
                 <tr>
                  <td>3.</td>
                   <td><a href="#">Gastos Financieros</a></td>
                   <td><?php echo utf8_encode("$".number_format($B303,0)); ?></td>
                  <td><span class="badge bg-yellow"><?php echo round($B303P,0) ?>%</span></td>
                  
                </tr>
                <tr style="border-bottom-style: double;border-color: black; border:2">
                  <td></td>
                   <td></td>
                  <td></td>
                  <td></td>
                </tr>
                  <tr>
                  <td  colspan="2" style="text-align: right;"><b><a style="color: #dd4b39;" href="">Gastos a Crédito</a></b></td>
                 
                  <td  style="text-align: right;"><b><a style="color: #dd4b39;" href=""><?php echo utf8_encode("$".number_format($B304,0)); ?></a></b></td>
                  <td><span class="badge bg-red"><?php echo round($B304P,0) ?>%</span></td>
                </tr>
                </tr>
                  <tr>
                  <td  colspan="2" style="text-align: right;"><b><a href="">Gastos Inmediatos</a></b></td>
                 
                  <td  style="text-align: right;"><b><a  href=""><?php echo utf8_encode("$".number_format($B305,0)); ?></a></b></td>
                  <td><span class="badge bg-light-blue"><?php echo round($B305P,0) ?>%</span></td>
                </tr>
                <tr>
                  <th style="width: 8px"><span class="badge bg-light-blue"><?php echo round($B306P,0) ?>%</span></th>
                   <th ><em>Abonos a Cuentas x Pagar</em></th>
                  
                  <th style="width: 40px"><em><?php echo utf8_encode("$".number_format($B306,0)); ?></em></th>
                </tr>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- Fin Segundo Panel-->
        <!-- /.col -->
      </div>
      <!-- /.row -->  
  </section>

   
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




    