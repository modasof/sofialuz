<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php
$anoactual   = date('Y');
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
      <h1>
        Luz.net
        <small><?php echo ($anoactual); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

     <?php

// Promedio Diario de Trituración
for ($i = 1; $i < 13; $i++) {
    $arreglof   = (PromedioDiarioTrituradora($i, $anoactual));
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $promedio1  = $sumaAt / $longitudAt;
}

// Promedio Mensual de Trituración
for ($i = 1; $i < 13; $i++) {
    $arreglof   = (PromedioMesTrituradora($i, $anoactual));
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $promedio2  = $sumaAt / $longitudAt;
}
// Trituración Hoy
$trituradohoy = DespachosTrituradorames($FechaInicioDiaActual, $FechaFinalDiaActual);

// Trituración Día Anterior

$trituradoayer = DespachosTrituradorames($FechaInicioDiaAnterior, $FechaFinalDiaAnterior);

// Triturado Mes Actual

$trituradomes = DespachosTrituradorames($FechaInicioDia, $FechaFinalDia);

//**************************************************************************************
//**************************************************************************************
//**************************************************************************************
//**************************************************************************************
//**************************************************************************************

// Promedio Diario de Terraje
for ($i = 1; $i < 13; $i++) {
    $arreglof   = (PromedioDiarioPatio($i, $anoactual));
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $promedio3  = $sumaAt / $longitudAt;
}

// Promedio Mensual de Terraje
for ($i = 1; $i < 13; $i++) {
    $arreglof   = (PromedioMesPatio($i, $anoactual));
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $promedio4  = $sumaAt / $longitudAt;
}
// Trituración Hoy
$patiohoy = DespachosPatiomes($FechaInicioDiaActual, $FechaFinalDiaActual);

// Trituración Día Anterior

$patioayer = DespachosPatiomes($FechaInicioDiaAnterior, $FechaFinalDiaAnterior);

// Triturado Mes Actual

$patiomes = DespachosPatiomes($FechaInicioDia, $FechaFinalDia);

//**************************************************************************************
//**************************************************************************************
//**************************************************************************************
//**************************************************************************************
//**************************************************************************************

// Promedio Diario de Despachos
for ($i = 1; $i < 13; $i++) {
    $arreglof   = (PromedioDiarioDespachos($i, $anoactual));
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $promedio5  = $sumaAt / $longitudAt;
}

// Promedio Mensual de Despachos
for ($i = 1; $i < 13; $i++) {
    $arreglof   = (PromedioMesDespachos($i, $anoactual));
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $promedio6  = $sumaAt / $longitudAt;
}
// Trituración Hoy
$despachoshoy = Despachosclmes($FechaInicioDiaActual, $FechaFinalDiaActual);

// Trituración Día Anterior

$despachosayer = Despachosclmes($FechaInicioDiaAnterior, $FechaFinalDiaAnterior);

// Triturado Mes Actual

$despachosmes = Despachosclmes($FechaInicioDia, $FechaFinalDia);

//**************************************************************************************
//**************************************************************************************
//**************************************************************************************
//**************************************************************************************
//**************************************************************************************

?>


    <!-- Main content -->
<div class="col-md-12">
     <div class="box">

        <?php 
          if ($RolSesion==1) {
        $area="rq_area='Administrativa' and requisicion_publicada='1'";
       $contador    = Contarrqporaprobar($area);

    }elseif($RolSesion==2){

        $area="rq_area='Concreto' or rq_area='Mantenimiento' or rq_area='Logistica'";
        $contador    = Contarrqporaprobar($area);
    }elseif($RolSesion==13){
         $res    = Requisiciones::todos();
    }

         ?>

            <div class="box-body">
             <a href="?controller=index&&action=aprobarRq" class="btn btn-app">
                <span class="badge bg-red"><?php echo($contador); ?></span>
                <i class="fa fa-users"></i> Aprobar RQ
              </a>
             
                <a href="?controller=compras&&action=recibiroc" class="btn btn-app">
                <i class="fa fa-cart-plus"></i> Compras
              </a>
            
              <a href="?controller=requisiciones&&action=cotizaciones" class="btn btn-app">
                <span class="badge bg-green"></span>
                <i class="fa fa-file-pdf-o"></i> Aprobar OC
              </a>
              
            </div>
            <!-- /.box-body -->
          </div>
</div>
<div class="col-md-12">

        <div style="display:none;" class="col-md-9">
            <div class="box box-primary">
               <div class="box-header with-border">
              <h3 class="box-title">Despacho Diario (Últimos 15 días)
            </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-calendar"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="?controller=index&&action=index">Este Mes</a></li>
                    <li><a href="?controller=index&&action=index&&graficamesanterior=valida">Mes Anterior</a></li>

                  </ul>
                </div>

              </div>
            </div>
            <!-- /.box-header -->
             <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div id="chartContainer22" style="height: 300px;width: 100%"></div>
                </div>
            </div>
          </div>

            </div>
        </div>

         <div style="display:none;" class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <b>Indicadores  // Online <i class="fa fa-circle text-success"></i></b>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><i>Número de Viajes </i></b> <a class="pull-right"> <?php $FletesDiarios = FletesDiarios($FechaInicioDiaActual, $FechaFinalDiaActual)?> <?php echo utf8_encode($FletesDiarios); ?></a>
                </li>
                 <li class="list-group-item">
                  <b><i>Km Recorridos</i></b> <a class="pull-right"> <?php $KilometrajeDiarios = KilometrajeDiarios($FechaInicioDiaActual, $FechaFinalDiaActual)?> <?php echo utf8_encode($KilometrajeDiarios); ?> Km </a>
                </li>
                 <li class="list-group-item">
                  <b><i>M3 Transportados</i></b> <a class="pull-right"><?php $MetrajeDiarios = MetrajeDiarios($FechaInicioDiaActual, $FechaFinalDiaActual)?> <?php echo utf8_encode(round($MetrajeDiarios, 1)); ?> m3 </a>
                </li>
                 <li class="list-group-item">
                  <b><i>Galones ACPM</i></b> <a class="pull-right"><?php $Sumacombustibledia = ReporteCombustibledia($FechaInicioDiaActual, $FechaFinalDiaActual);?> <?php echo (round($Sumacombustibledia, 2)) ?>Gl </a>
                </li>

                 <li class="list-group-item">
                  <b><i>Gasto ACPM</i></b> <a class="pull-right"><?php $GastoCombustibledia = GastoCombustibledia($FechaInicioDiaActual, $FechaFinalDiaActual)?> <?php echo utf8_encode("$" . number_format($GastoCombustibledia, 0)); ?></a>
                </li>
                 <li class="list-group-item">
                  <b><i>Facturación Promedio</i></b> <a class="pull-right"> <?php echo utf8_encode("$" . number_format($promedio3, 0)); ?></a>
                </li>
                 <li class="list-group-item">
                   <a href="?controller=index&&action=informe1"><button type="button" class="btn btn-block btn-primary btn-xs">Informe General</button></a>
                </li>


              </ul>

            </div>
            <!-- /.box-body -->
          </div>
     </div>

 <div style="display:none;" class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <b>Items Estado Solicitado <i class="fa fa-circle text-success"> </i> </b>
              <ul class="list-group list-group-unbordered">
                <?php
# ========================================================
# =           Lista de Solicitudes por Usuario           =
# ========================================================

$result = Requisicionesitems::listaRqusuariositems();
foreach ($result as $camporq) {
    $usuario_creador = $camporq['usuario_creador'];
    $nombreusuario= Usuarios::obtenernombreusuario($usuario_creador);
    $totalrq=contarregistrosporestado(1,$usuario_creador);

    ?>
                <li class="list-group-item">
                  <?php echo($nombreusuario); ?><a href="?controller=requisiciones&&action=reqalmacenestado&&estadosolicitado=1&&cargo=<?php echo($RolSesion); ?>" class="pull-right"> <?php echo ($totalrq) ?></a>
                </li>
    <?php
        }
    ?>

                 <li class="list-group-item">
                   <a href="?controller=index&&action=informe1"><button type="button" class="btn btn-block btn-primary btn-xs">Informe General</button></a>
                </li>


              </ul>

            </div>
            <!-- /.box-body -->
          </div>
     </div>




<div class="row">
   <div class="col-md-4 col-xs-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Histórico Despachos <small> Actualizado al <?php
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
            <div style="display:none;" class="clearfix">
                  <div id="stockChartContainer" style="height: 300px; width: 100%;"></div>
            </div>
        <table  class="table table-bordered table-hover dataTables_borderWrap" style="width: 100%;font-size: 12px;">
          <thead>

          <thead>

               <tr style="background-color: #4f5962;color: white;">
                <th>Mes</th>
               <th>Despachos</th>
               <th>Promedio</th>
               <th>Valor Flete</th>

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

    $Btotaldiasmes   = date('t', mktime(0, 0, 0, $i, 1, $anoactual));
    $BInicioMesbucle = ($i . "/" . "01/" . $anoactual);
    $BFinMesbucle    = ($i . "/" . $Btotaldiasmes . "/" . $anoactual);
    $fechaconsulta   = ($BInicioMesbucle . " - " . $BFinMesbucle);

    ?>
                <tr>
                  <td>
                    <strong><?php echo (ucfirst($monthName)) ?></strong>
                  </td>
                  <td>
                    <?php
$ventames1 = Despachosmesgeneral($i, $anoactual);
    $sumaventas1 += $ventames1;
    echo ("<a style='color:black;' href='?controller=reportes&&action=despachosclientes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . number_format($ventames1, 0) . "</a>");

    ?>
                  </td>
                   <td>
                    <?php

    $arreglof   = (EstadisticasDespachos($i, $anoactual));
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $maxviajes  = max($CadenaAt);
    $promedio33 = $sumaAt / $longitudAt;
    echo ("<a style='color:black;' href='?controller=reportes&&action=despachosclientes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . round($promedio33, 0) . "</a>");
    ?>
                  </td>
                  <td>
                    <?php
$ventames15 = Despachosmesgeneralvalor($i, $anoactual);
    $sumaventas15 += $ventames15;
    echo ("<a style='color:black;' href='?controller=reportes&&action=despachosclientes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small>$ " . number_format($ventames15, 0) . "</a>");

    ?>
                  </td>

                </tr>
                <?php
}

?>
              <tr class="success">
                <td><strong>Total</strong></td>
                <td><strong><?php echo (number_format($sumaventas1, 0)) ?></strong></td>
                <td></td>
                <td><strong><?php echo ("$ " . number_format($sumaventas15, 0)) ?></strong></td>
              </tr>
            </tfoot>
            </table>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

                <div class="col-md-4 col-xs-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Histórico Consumo Acpm <small> Actualizado al <?php
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
              <div style="display:none;" class="clearfix">
                      <div id="stockChartContainer4" style="height: 300px; width: 100%;"></div>

                    </div>

       <table id="tablatrituradora" class="table  table-responsive table-striped table-bordered table-hover dataTables_borderWrap" style="width: 100%;font-size: 12px;">

          <thead>

               <tr style="background-color: #4f5962;color: white;">

                <th>Mes</th>
                <th>Consumo</th>
                <th>Promedio</th>
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

    $Btotaldiasmes   = date('t', mktime(0, 0, 0, $i, 1, $anoactual));
    $BInicioMesbucle = ($i . "/" . "01/" . $anoactual);
    $BFinMesbucle    = ($i . "/" . $Btotaldiasmes . "/" . $anoactual);
    $fechaconsulta   = ($BInicioMesbucle . " - " . $BFinMesbucle);

//
    $BIeqnicioMesbucle = ($anoactual . "-" . $i . "-01");
    $BFeqinMesbucle    = ($anoactual . "-" . $i . "-" . $Btotaldiasmes);
    $fechaconsultaeq   = ($BIeqnicioMesbucle . " - " . $BFeqinMesbucle);

    ?>
<tr>
  <td><strong><a href="?controller=reportes&&action=mescombustibleseq&daterange=<?php echo ($fechaconsulta); ?>"><i class="fa fa-line-chart"> </i> <?php echo (ucfirst($monthName)); ?></a></strong></td>
  <td>
    <?php
$ventames17 = Acpmmesgeneral($i, $anoactual);
    $sumaventas17 += $ventames17;
    echo ("<a style='color:black;' href='?controller=reportes&&action=combustibles&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . round($ventames17, 0) . " </a>");
    ?>
  </td>
  <td>
    <?php
$arreglof   = (EstadisticasConsumoAcpm($i, $anoactual));
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $maxviajes  = max($CadenaAt);
    $promedio33 = $sumaAt / $longitudAt;
    echo ("<a style='color:black;' href='?controller=reportes&&action=combustibles&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . round($promedio33, 0) . " </a>");
    ?>
  </td>
  <td>
    <?php
$ventames16 = Acpmmesgeneralvalor($i, $anoactual);
    $sumaventas16 += $ventames16;
    echo ("<a style='color:black;' href='?controller=reportes&&action=combustibles&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small>$ " . number_format($ventames16, 0) . " </a>");

    ?>
  </td>

</tr>
 <?php
}

?>
             <tr class="success">
                <td><strong>Total</strong></td>
                <td><strong><?php echo (number_format($sumaventas17, 0)) ?></strong></td>
                <td></td>
                <td><strong><?php echo ("$ " . number_format($sumaventas16, 0)) ?></strong></td>
              </tr>

            </tfoot>
            </table>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->

<div class="col-md-4 col-xs-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Histórico Concreto <small> Actualizado al <?php
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
              <div style="display:none;" class="clearfix">
                      <div id="stockChartContainer5" style="height: 300px; width: 100%;"></div>

                    </div>
        <table  class="table  table-responsive table-striped table-bordered table-hover dataTables_borderWrap" style="width: 100%;font-size: 12px;">
          <thead>

          <thead>

               <tr style="background-color: #4f5962;color: white;">
                <th>Mes</th>
               <th>Despachos</th>
               <th>Promedio</th>
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

    $Btotaldiasmes   = date('t', mktime(0, 0, 0, $i, 1, $anoactual));
    $BInicioMesbucle = ($i . "/" . "01/" . $anoactual);
    $BFinMesbucle    = ($i . "/" . $Btotaldiasmes . "/" . $anoactual);
    $fechaconsulta   = ($BInicioMesbucle . " - " . $BFinMesbucle);

    ?>
                <tr>
                  <td>
                    <strong><?php echo (ucfirst($monthName)) ?></strong>
                  </td>
                  <td>
                    <?php
$ventames18 = Despachosconcretomesgeneral($i, $anoactual);
    $sumaventas18 += $ventames18;
    echo ("<a style='color:black;' href='?controller=concreto&&action=todos&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . round($ventames18, 0) . "</a>");
    ?>
                  </td>
                   <td>
                    <?php

    $arreglof   = (EstadisticasDespachosconcreto($i, $anoactual));
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $maxviajes  = max($CadenaAt);
    $promedio33 = $sumaAt / $longitudAt;
    echo ("<a style='color:black;' href='?controller=concreto&&action=todos&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . round($promedio33, 0) . "</a>");
    ?>
                  </td>
                   <td>
                    <?php
$ventames19 = Despachosconcretomesgeneralvalor($i, $anoactual);
    $sumaventas19 += $ventames19;

    echo ("<a style='color:black;' href='?controller=concreto&&action=todos&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small>$ " . number_format($ventames19, 0) . "</a>");

    ?>
                  </td>

                </tr>
                <?php
}

?>
              <tr class="success">
                <td><strong>Total</strong></td>
                <td><strong><?php echo (number_format($sumaventas18, 0)) ?></strong></td>
                <td></td>
                <td><strong><?php echo ("$ " . number_format($sumaventas19, 0)) ?></strong></td>
              </tr>
            </tfoot>
            </table>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
</div>
<div class="col-md-12">
   <div class="box box-primary">

        <form action="?controller=reportes&&action=despachosporfechaclientes" method="post" id="FormFechas" autocomplete="off">
         <div class="col-md-8">
                        <div class="form-group">
                          <label>Seleccione el Rango de Fecha<span>*</span></label>
                          <input type="text"  name="daterange" class="form-control" required value="">
                        </div>
    <small>

                          <?php
if ($fechaform != "") {
    ?>
           <h4 class="m-0 text-dark">Reporte Despachos del <?php echo (fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></h4>
          <?php
} else {
    ?>
           <h4 class="m-0 text-dark">Reporte Total Despachos últimos 60 días</h4>
          <?php
}
?>
    </small>
        </div>
          <div class="form-group">
            <div class="col-xs-12 col-sm-4">
              <button class="btn btn-primary btn-sm" type="Submit">Realizar Consulta</button>
          </div>
          </div>
        </form>
     <table id="example2" class="display nowrap" style="width:100%">
            <tfoot style="display: table-header-group;">
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                     <th style="background-color: #fcf8e3" class="success"></th>
                                      <th style="background-color: #fcf8e3" class="success"></th>



                            </tfoot>
          <thead>

            <tr>
             <th>Placa</th>
             <th>Km/Gl</th>
              <th>Vr. Fact</th>
              <th>Viajes</th>
              <th>M3</th>

              <th>Tanqueo <br></th>
              <th>Km <br></th>

            </tr>
          </thead>
       <tbody>
            <?php

$res = Equipos::obtenerListaVolquetasAsf();
foreach ($res as $campo) {
    $id_equipo = $campo['id_equipo'];
    $placa     = $campo['placa'];

    $FletesDiariosVol           = FletesDiariosVolqueta($FechaInicio60dias, $FechaFinal60dias, $id_equipo);
    $MetrajeDiariosVol          = MetrajeDiariosVolqueta($FechaInicio60dias, $FechaFinal60dias, $id_equipo);
    $KilometrajeDiariosVol      = KilometrajeDiariosVolqueta($FechaInicio60dias, $FechaFinal60dias, $id_equipo);
    $FacturaDiaVol              = FacturacionDiaTotalVolquetas($FechaInicio60dias, $FechaFinal60dias, $id_equipo);
    $SumacombustiblediaVolqueta = AcpmfechaVolqueta($FechaInicio60dias, $FechaFinal60dias, $id_equipo);

    $SumacombustiblediaVolquetaGral = AcpmfechaVolqueta($inicio2021, $FechaFinal60dias, $id_equipo);
    $KilometrajeDiariosVolGeneral   = KilometrajeDiariosVolqueta($inicio2021, $FechaFinal60dias, $id_equipo);

    if ($KilometrajeDiariosVolGeneral == 0) {
        $RendimientoGral = 0;
    } else {
        $RendimientoGral = $KilometrajeDiariosVolGeneral / $SumacombustiblediaVolquetaGral;
    }

    if ($KilometrajeDiariosVol == 0) {
        $Rendimiento = 0;
    } else {
        $Rendimiento = $KilometrajeDiariosVol / $SumacombustiblediaVolqueta;
    }
    ?>
            <tr>

              <td>  <strong><?php echo ($placa); ?></strong></td>
              <td><?php echo (round($Rendimiento, 1)); ?></td>
                       <td><?php echo ("$" . number_format($FacturaDiaVol)); ?></td>
               <td><?php echo ($FletesDiariosVol); ?></td>
               <td><?php echo (round($MetrajeDiariosVol, 2)); ?></td>

                   <td><?php echo round($SumacombustiblediaVolqueta, 1); ?></td>
                   <td><?php echo (round($KilometrajeDiariosVol, 1)); ?></td>

            </tr>
            <?php
}
?>
          </tbody>
          </table>
      </div>
   </div>
<div class="col-md-12">
<!-- Inicio Estados de volquetas -->
    <div class="col-md-4">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Estado Volquetas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table style="font-size: 12px;" class="table table-condensed">
                <tbody><tr>

                  <th>Equipo</th>
                  <th style="width: 40px">Estado</th>
                </tr>
                 <?php

$res = Equipos::obtenerListaVolquetasAsf();
foreach ($res as $campo) {
    $id_equipo         = $campo['id_equipo'];
    $placa             = $campo['placa'];
    $estadoequipo      = UltimoEstadoEquipo($id_equipo);
    $fechaestadoequipo = UltimoFechaEstadoEquipo($id_equipo);
    $actualizadohace   = tiempoTranscurridoFechas($fechaestadoequipo, $fechaactual);
    ?>
                <tr>
                   <td>  <a href="?controller=equipos&&action=timelineestados&&id=<?php echo $id_equipo; ?>">  <i class="fa fa-calendar"> </i> <?php echo utf8_decode($placa); ?>   </a>
            <?php
if ($fechaestadoequipo < $fechaactual) {
        echo ("<br><small  class='text-danger fa fa-warning'> Actualizado hace " . $actualizadohace . "</small>");
    } elseif ($fechaestadoequipo == $fechaactual) {
        echo ("<br><small  class='text-success fa fa-check'> Actualizado hace" . $actualizadohace . "</small>");
    }
    ?>


                  </td>

                  <td>
                     <?php
if ($estadoequipo == '') {
        echo ("<a href='?controller=equipos&&action=estado'><span class='label label-default'>Sin Actualizar</span></a>");
    } elseif ($estadoequipo == 'Operativo') {
        echo ("<a href='?controller=equipos&&action=estado'><span class='label label-success'>Operativo</span></a>");
    } elseif ($estadoequipo == 'En Mantenimiento') {
        echo ("<a href='?controller=equipos&&action=estado'><span class='label label-warning'>En Mantenimiento</span></a>");
    } elseif ($estadoequipo == 'Fuera de Servicio') {
        echo ("<a href='?controller=equipos&&action=estado'><span class='label label-danger'>Fuera de Servicio</span></a>");
    }

    ?>
                  </td>



                </tr>
               <?php
}
?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
     </div>

         <div class="col-md-4">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Equipos Menores</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table style="font-size: 12px;" class="table table-condensed">
                <tbody><tr>

                  <th>Equipo</th>
                  <th style="width: 40px">Estado</th>
                </tr>
                 <?php

$res = Equipos::ListaEquiposMenores();
foreach ($res as $campo) {
    $id_equipo         = $campo['id_equipo'];
    $placa             = $campo['placa'];
    $nombre_equipo     = $campo['nombre_equipo'];
    $estadoequipo      = UltimoEstadoEquipo($id_equipo);
    $fechaestadoequipo = UltimoFechaEstadoEquipo($id_equipo);
    $actualizadohace   = tiempoTranscurridoFechas($fechaestadoequipo, $fechaactual);
    ?>
                <tr>

                  <td><a href="?controller=equipos&&action=timelineestados&&id=<?php echo $id_equipo; ?>">  <i class="fa fa-calendar"> </i> <?php echo utf8_decode($nombre_equipo); ?></a>
                    <?php
if ($fechaestadoequipo < $fechaactual) {
        echo ("<br><small  class='text-danger fa fa-warning'> Actualizado hace " . $actualizadohace . "</small>");
    } elseif ($fechaestadoequipo == $fechaactual) {
        echo ("<br><small  class='text-success fa fa-check'> Actualizado hace" . $actualizadohace . "</small>");
    }
    ?>
                  </td>

                  <td>
                    <?php
if ($estadoequipo == '') {
        echo ("<a href='?controller=equipos&&action=estado'><span class='label label-default'>Sin Actualizar</span></a>");
    } elseif ($estadoequipo == 'Operativo') {
        echo ("<a href='?controller=equipos&&action=estado'><span class='label label-success'>Operativo</span></a>");
    } elseif ($estadoequipo == 'En Mantenimiento') {
        echo ("<a href='?controller=equipos&&action=estado'><span class='label label-warning'>En Mantenimiento</span></a>");
    } elseif ($estadoequipo == 'Fuera de Servicio') {
        echo ("<a href='?controller=equipos&&action=estado'><span class='label label-danger'>Fuera de Servicio</span></a>");
    }

    ?>
                  </td>

                </tr>
               <?php
}
?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
     </div>

     <div class="col-md-4">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Otros Equipos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table style="font-size: 12px;" class="table table-condensed">
                <tbody><tr>

                  <th>Equipo</th>
                  <th style="width: 40px">Estado</th>
                </tr>
                 <?php

$res = Equipos::ListaEquiposdiferentes();
foreach ($res as $campo) {
    $id_equipo         = $campo['id_equipo'];
    $placa             = $campo['placa'];
    $nombre_equipo     = $campo['nombre_equipo'];
    $estadoequipo      = UltimoEstadoEquipo($id_equipo);
    $fechaestadoequipo = UltimoFechaEstadoEquipo($id_equipo);
    $actualizadohace   = tiempoTranscurridoFechas($fechaestadoequipo, $fechaactual);
    ?>
                <tr>

                  <td><a href="?controller=equipos&&action=timelineestados&&id=<?php echo $id_equipo; ?>">  <i class="fa fa-calendar"> </i> <?php echo utf8_decode($nombre_equipo); ?></a>
          <?php
if ($fechaestadoequipo < $fechaactual) {
        echo ("<br><small  class='text-danger fa fa-warning'> Actualizado hace " . $actualizadohace . "</small>");
    } elseif ($fechaestadoequipo == $fechaactual) {
        echo ("<br><small  class='text-success fa fa-check'> Actualizado hace" . $actualizadohace . "</small>");
    }
    ?>
                  </td>

                  <td>
                    <?php
if ($estadoequipo == '') {
        echo ("<a href='?controller=equipos&&action=estado'><span class='label label-default'>Sin Actualizar</span></a>");
    } elseif ($estadoequipo == 'Operativo') {
        echo ("<a href='?controller=equipos&&action=estado'><span class='label label-success'>Operativo</span></a>");
    } elseif ($estadoequipo == 'En Mantenimiento') {
        echo ("<a href='?controller=equipos&&action=estado'><span class='label label-warning'>En Mantenimiento</span></a>");
    } elseif ($estadoequipo == 'Fuera de Servicio') {
        echo ("<a href='?controller=equipos&&action=estado'><span class='label label-danger'>Fuera de Servicio</span></a>");
    }

    ?>
                  </td>

                </tr>
               <?php
}
?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
     </div>
</div>

</div>

</div>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

          <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
          <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
          <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

          <script src="dist/js/buttons.colVis.min.js"></script>
          <script src="dist/js/buttons.print.min.js"></script>
           <script src="dist/js/dataTables.select.min.js"></script>
           <script src="dist/js/buttons.flash.min.js"></script>

<script type="text/javascript">
      jQuery(function($) {



    var table = $('#cotizacionesnuevo').DataTable({

      responsive:true,
     "scrollX": true,
     "ordering": true,
      "searching": false,
       "paging":   false,
        "info":     false,

        "order": [[ <?php echo ($tope - $topemin + 1); ?>, "desc" ]],
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
      })
    </script>
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
<!-- page script -->
<script>
  $(function () {
    $('#cotizaciones33').DataTable({
      "paging": true,
      "lengthChange": true,
      "lengthMenu": [[25, 50, 150, -1], [25, 50, 150, "All"]],
      "searching": false,
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
$.extend( $.fn.dataTable.defaults, {
    responsive: true
} );

       $(document).ready(function() {
    $('#example2').DataTable( {

         "searching": false,
        "ordering": true,
        "paging":   false,
        "info":     true,
         "order": [[ 1, "desc" ]],
         "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

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
      "responsive":true,
      "ordering": true,
      "searching": false,
       "paging": false,
      "order": [[ 1, "desc" ]],
      "info":false,
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

             pageTotal1 = api
                .column( 1, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

              pageTotal2 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal3 = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );



             // Update footer

               $( api.column( 1 ).footer() ).html(
                ''+formatmoneda(pageTotal1,'Vj' )
            );


              $( api.column( 2 ).footer() ).html(
                ''+formatmoneda(pageTotal2,'m3' )
            );

             $( api.column( 3 ).footer() ).html(
                ''+formatmoneda(pageTotal3,'$' )
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
            null, null,null, null,null,null,null,null, null,
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



  <!-- /.content-wrapper -->


