<!-- Content Wrapper. Contains page content -->

<?php 
include '../vistas/index/estadisticas_indexequipos.php';
error_reporting(E_ALL);
ini_set('display_errors', '0');

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];

date_default_timezone_set("America/Bogota");
$totaldiasmes= date('t');
$anoactual= date('Y');
$mesactual= date('n');
$hoy= date('d');


$quincedias=date("Y-m-d",strtotime($fecha_actual."- 4 week")); 
$FechaInicio30dias=$quincedias." 00:00:0000";
$FechaFinal30dias=$anoactual."-".$mesactual."-".$hoy." 23:59:0000";

$consumoporconductor=ConsumoCombustiblediaUsuario($FechaInicio30dias,$FechaFinal30dias,$IdSesion);
$gastoporconductor=GastoCombustiblediaUsuario($FechaInicio30dias,$FechaFinal30dias,$IdSesion);

 ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DashBoard Perfil Conductor
        <small>version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">

    <div class="col-sm-12 col-xs-12">
     <a href="?controller=horasmq&&action=horas">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-clock-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Registro </span>
              <span class="info-box-number">Reporte Horas</span><br>
              <span class="info-box-number">Máquina</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
      
    </div>
     <div style="display: none;" class="col-sm-6 col-xs-12">
         
       <div class="col-md-6">
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Equipos Mto. Crítico</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              DOBLE TROQUE AAA-123
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <div class="col-md-6">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Equipos Mto. a Tiempo</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              DOBLE TROQUE AAA-123
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <div class="col-md-6">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Equipos Mto. al Día</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              DOBLE TROQUE AAA-123
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
       
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->