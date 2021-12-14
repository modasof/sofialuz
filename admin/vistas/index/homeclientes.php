<!-- Content Wrapper. Contains page content -->
  <?php 
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';
include_once 'controladores/reportesController.php';
include_once 'modelos/reportes.php';
$elcliente = $_SESSION['CodigoCliente'];
$elproveedor = $_SESSION['CodigoProveedor'];

  $nombrecliente=Clientes::obtenerNombreCliente($elcliente);
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard Cliente
        <small>version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard Cliente</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green">
              <div class="widget-user-image">
                <img class="img-circle" src="https://obinco.net/admin/logo-obinco.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo($nombrecliente); ?></h3>
              <h5 class="widget-user-desc">Datos</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="?controller=index&&action=informedetalleclientes&&elcliente=<?php echo($elcliente); ?>">Informe por material  <i class="fa fa-external-link-square"> </i> <span class="pull-right badge bg-green"><i class="fa fa-pie-chart"></i></span></a></li>
                <li><a href="?controller=reportes&&action=despachosclientesunico&&elcliente=<?php echo($elcliente); ?>">Informe por fecha <i class="fa fa-external-link-square">  </i> <span class="pull-right badge bg-green"><i class="fa fa-file-excel-o"></i></span></a></li>
                 <li><a href="?controller=reportes&&action=despachosproveedorunico&&elproveedor=<?php echo($elproveedor); ?>">Informe Arena x fecha <i class="fa fa-external-link-square">  </i> <span class="pull-right badge bg-green"><i class="fa fa-file-excel-o"></i></span></a></li>
               
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo($nombrecliente); ?></h3>
              <h5 class="widget-user-desc">Indicadores Mes Actual</h5>
               <?php 
               $Acpmmesactual=Despachoscldetallemes($elcliente,$FechaInicioDia,$FechaFinalDia);
               $Viajesmesactual=Viajescldetallemes($elcliente,$FechaInicioDia,$FechaFinalDia);
               $Volquetascldetallemes=Volquetascldetallemes($elcliente,$FechaInicioDia,$FechaFinalDia);
               $promediom3=$Acpmmesactual/$Viajesmesactual;

               
                $sumaconsolidada=Despachoscldetallemes($elcliente,'2015-01-01',$FechaFinalDiaActual); 
                $Viajesconsolidado=Viajescldetallemes($elcliente,'2015-01-01',$FechaFinalDiaActual);
               $Volquetasconsolidado=Volquetascldetallemes($elcliente,'2015-01-01',$FechaFinalDiaActual);
               ?>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="https://obinco.net/admin/logo-obinco.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 col-xs-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo(round($Acpmmesactual,2)); ?></h5>
                    <span class="description-text">M3</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-xs-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo($Viajesmesactual); ?></h5>
                    <span class="description-text">VIAJES</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-xs-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo($Volquetascldetallemes); ?></h5>
                    <span class="description-text">VOLQUETAS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>

              <div class="row">
               
                <ul>
                <?php 
                $res=Reportes::GraficaReporteDiarioDespachoscl($mesactual,$elcliente);
$campos = $res->getCampos();
foreach($campos as $campo){
  $DIA = $campo['DIA'];
  $TB = $campo['M3'];
                 ?>
                  <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                 <li><a href="?controller=reportes&&action=despachosclientesunico&&elcliente=<?php echo($elcliente); ?>">Fecha: <?php echo($mesactual."-".$DIA."-".$anoactual) ?> <span class="pull-right badge bg-aqua"><?php echo($TB); ?> m3</span></a></li>
              </ul>
            </div>
                  
                <!-- /.col -->
              <?php 
            }
               ?>
               </ul>
               
                <!-- /.col -->
               
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('../dist/img/photo1.png') center center;">
              <h3 class="widget-user-username"><?php echo($nombrecliente); ?></h3>
              <h5 class="widget-user-desc">Consolidado</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="https://obinco.net/admin/logo-obinco.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 col-xs-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo(round($sumaconsolidada,2)); ?></h5>
                    <span class="description-text">M3</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-xs-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo($Viajesconsolidado); ?></h5>
                    <span class="description-text">VIAJES</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-xs-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo($Volquetasconsolidado); ?></h5>
                    <span class="description-text">VOLQUETAS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><a target="_blank" href="mailto:gerencia@grupoobinco.com">gerencia@grupoobinco.com</a> </span>
              <span class="info-box-text"><a target="_blank" href="mailto:grupoobinco@gmail.com">grupoobinco@gmail.com</a></span>
              <span class="info-box-text"><a target="_blank" href="mailto:contabilidadgrupoobinco@gmail.com">contabilidadgrupoobinco@gmail.com</a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-phone"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><a href="">(316) 697-6701</a></span>
              <span class="info-box-number">Línea de Atención</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <a target="_blank" href="https://t.ly/03XlJ">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-map-marker"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ubicación</span>
              <span class="info-box-number">Google</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </a>
        <!-- /.col -->
       
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->