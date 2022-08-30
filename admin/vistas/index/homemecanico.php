<?php 
include 'vistas/index/estadisticas_dash_mecanicos.php';
error_reporting(E_ALL);
ini_set('display_errors', '0');

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];


date_default_timezone_set("America/Bogota");
$totaldiasmes= date('t');
$anoactual= date('Y');
$mesactual= date('n');
$hoy= date('d');


 ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DashBoard Perfil Mecánico
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
     <a href="?controller=equipos&&action=ordentrabajo&&operador=<?php echo($IdSesion); ?>">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-clock-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Registro </span>
              <span class="info-box-number">Reporte Orden Trabajo</span><br>
              <span class="info-box-number">Equipos</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
      
    </div>
            <div class="col-md-4 col-xs-12">
        <div class="chart">
                    <!-- Sales Chart Canvas 
                   <div id="grafica_4" style="height: 300px; width: 100%;"></div>
                 -->
        </div>
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Reparaciones Mecánico<small> Actualizado al <?php
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
           
        <table  class="table table-bordered table-hover dataTables_borderWrap" style="width: 100%;font-size: 12px;">
          <thead>
          <thead>
               <tr style="background-color: #274350;color: white;">
              <th>Mes</th>
              <th>Total Servicios</th>
              <th>Servicios Promedio Día </th>
              <th>Equipos Intervenidos</th>
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

    $Dtotaldiasmes   = date('t', mktime(0, 0, 0, $i, 1, $anoactual));
    $DInicioMesbucle = ($i . "/" . "01/" . $anoactual);
    $DFinMesbucle    = ($i . "/" . $Dtotaldiasmes . "/" . $anoactual);
    $fechaconsulta   = ($DInicioMesbucle . " - " . $DFinMesbucle);

    ?>
                <tr>
                  <td><strong><a href="#"><i class="fa fa-line-chart"> </i> <?php echo (ucfirst($monthName)); ?></a></strong>
                  </td>
                  <td>
                    <?php
    $totalserviciosmec = Totalserviciosmecanico($i, $anoactual,$IdSesion);
    $sumaventas1tipo1 += $totalserviciosmec;
    $promedioventas1tipo1=$sumaventas1tipo1/$i;
    echo ("<a style='color:black;' href='#'><small style='color:#128a2e;'></small> " . number_format($totalserviciosmec, 0) ."</a>");

    ?>
                  </td>
                   <td>
    <?php
$arreglof   = (Promediodiarioservicios($i, $anoactual,$IdSesion));
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $maxviajes  = max($CadenaAt);
    $promedio33 = $sumaAt / $longitudAt;
    echo ("<a style='color:black;' href='#'><small style='color:#128a2e;'></small> " . round($promedio33, 2) . " </a>");
    ?>
  </td>
                  <td>
                    <?php
    $ventames1tipo3 = Totalequiposmecanico($i, $anoactual,$IdSesion);
    $sumaventas1tipo3 += $ventames1tipo3;

    echo ("<a style='color:black;' href='#'><small style='color:#128a2e;'></small> " . number_format($ventames1tipo3, 0) . "</a>");

    ?>
                  </td>

                </tr>
                <?php
}

?>
              <tr class="success">
                <td><strong>Total</strong></td>
                <td><strong><?php echo (number_format($sumaventas1tipo1, 0)) ?></strong></td>
                <td><strong><?php echo (number_format($sumaventas1tipo2, 0)) ?></strong></td>
                <td><strong><?php 
                //$totalcxp=$sumaventas17-$sumaAbonos17;
                echo ($sumaventas1tipo3) 

            ?></strong></td>
              </tr>
            </tfoot>
            </table>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->