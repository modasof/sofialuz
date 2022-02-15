<!-- Content Wrapper. Contains page content -->
 <?php 
 $anoactual= date('Y');
  $fechaactual= date('Y-m-d');
 function tiempoTranscurridoFechas($fechaInicio,$fechaFin)
{
    $fecha1 = new DateTime($fechaInicio);
    $fecha2 = new DateTime($fechaFin);
    $fecha = $fecha1->diff($fecha2);
    $tiempo = "";
         
    //años
    if($fecha->y > 0)
    {
        $tiempo .= $fecha->y;
             
        if($fecha->y == 1)
            $tiempo .= " año, ";
        else
            $tiempo .= " años, ";
    }
         
    //meses
    if($fecha->m > 0)
    {
        $tiempo .= $fecha->m;
             
        if($fecha->m == 1)
            $tiempo .= " mes ";
        else
            $tiempo .= " meses ";
    }
         
    //dias
    if($fecha->d > 0)
    {
        $tiempo .= $fecha->d;
             
        if($fecha->d == 1)
            $tiempo .= " día ";
        else
            $tiempo .= " días ";
    }
         
    //horas
    if($fecha->h > 0)
    {
        $tiempo .= $fecha->h;
             
        if($fecha->h == 1)
            $tiempo .= " hora ";
        else
            $tiempo .= " horas ";
    }
         
   
         
    return $tiempo;
}
       ?>
<?php 

// Promedio Facturación
               for ($i=1; $i <13 ; $i++) { 
                  $arreglof=(PromedioDiarioFact($i,$anoactual));
                                    $CadenaAt=explode(",", $arreglof);
                                    $longitudAt = count($CadenaAt)-1;
                                    $diasterraje = count($CadenaAt)-1;
                                    $sumaAt=array_sum($CadenaAt);
                                    $max3=max($CadenaAt);
                                    $promedio3=$sumaAt/$longitudAt;
                }
 ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DashBoard Perfil Equipos
        <small>version 1.1</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
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
              <a href="?controller=proveedores&&action=todos" class="btn btn-app">
                <i class="fa fa-users"></i> Proveedores
              </a>
                <a href="?controller=compras&&action=recibiroc" class="btn btn-app">
                <i class="fa fa-cart-plus"></i> Compras
              </a>
            
              <a href="?controller=cotizaciones&&action=todos" class="btn btn-app">
                <span class="badge bg-green"></span>
                <i class="fa fa-file-pdf-o"></i> Cotizaciones
              </a>
              
            </div>
            <!-- /.box-body -->
          </div>
</div>
   <div class="col-md-4 col-xs-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Histórico Fletes <small> Actualizado al <?php
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
                  <td><strong><a href="?controller=reportes&&action=mesfletes&daterange=<?php echo ($fechaconsulta); ?>"><i class="fa fa-line-chart"> </i> <?php echo (ucfirst($monthName)); ?></a></strong></td>
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
        <!-- /.col -->

           <div class="col-md-4 col-xs-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Horas Máquina <small> Actualizado al <?php
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
               <th>Total Horas</th>
               <th>Vr. Hora Promedio</th>
               <th>Valor </th>

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
                  <td><strong><a href="?controller=reportes&&action=meshorasmq&daterange=<?php echo ($fechaconsulta); ?>"><i class="fa fa-line-chart"> </i> <?php echo (ucfirst($monthName)); ?></a></strong></td>
                  <td>
                    <?php
$ventames156 = Horasmqmesgeneral($i, $anoactual);
    $sumaventas156 += $ventames156;
    echo ("<a style='color:black;' href='?controller=reportes&&action=despachosclientes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . number_format($ventames156, 0) . "</a>");

    ?>
                  </td>
                   <td>
                    <?php

    $arreglof   = (EstadisticasHorasmq($i, $anoactual));
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $maxviajes  = max($CadenaAt);
    $promedio34 = $sumaAt / $longitudAt;
    echo ("<a style='color:black;' href='?controller=reportes&&action=despachosclientes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> $" . number_format($promedio34, 0) . "</a>");
    ?>
                  </td>
                  <td>
                    <?php
$ventames155 = Horasmqmesgeneralvalor($i, $anoactual);
    $sumaventas155 += $ventames155;
    echo ("<a style='color:black;' href='?controller=reportes&&action=despachosclientes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small>$ " . number_format($ventames155, 0) . "</a>");

    ?>
                  </td>

                </tr>
                <?php
}

?>
              <tr class="success">
                <td><strong>Total</strong></td>
                <td><strong><?php echo (number_format($sumaventas156, 0)) ?></strong></td>
                <td></td>
                <td><strong><?php echo ("$ " . number_format($sumaventas155, 0)) ?></strong></td>
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
              echo(fechalarga($TiempoActual)); 
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

                 for ($i=1; $i <$tope ; $i++) { 
                  setlocale(LC_ALL, 'es_ES');
          $monthNum  = $i;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = strftime('%B', $dateObj->getTimestamp());

$Btotaldiasmes=date('t', mktime(0,0,0, $i, 1, $anoactual));
$BInicioMesbucle=($i."/"."01/".$anoactual);
$BFinMesbucle=($i."/".$Btotaldiasmes."/".$anoactual);
$fechaconsulta=($BInicioMesbucle." - ".$BFinMesbucle);

// 
$BIeqnicioMesbucle=($anoactual."-".$i."-01");
$BFeqinMesbucle=($anoactual."-".$i."-".$Btotaldiasmes);
$fechaconsultaeq=($BIeqnicioMesbucle." - ".$BFeqinMesbucle);



?>
<tr>
  <td><strong><a href="?controller=reportes&&action=mescombustibleseq&daterange=<?php echo($fechaconsulta); ?>"><i class="fa fa-line-chart"> </i> <?php echo(ucfirst($monthName)); ?></a></strong></td>
  <td>
    <?php  
    $ventames17=Acpmmesgeneral($i,$anoactual);
                  $sumaventas17+=$ventames17;
                   echo("<a style='color:black;' href='?controller=reportes&&action=combustibles&daterange=".$fechaconsulta."'><small style='color:#128a2e;'></small> ".round($ventames17,0)." </a>");
  ?>
  </td>
  <td>
    <?php 
    $arreglof=(EstadisticasConsumoAcpm($i,$anoactual));
                                    $CadenaAt=explode(",", $arreglof);
                                    $longitudAt = count($CadenaAt)-1;
                                    $sumaAt=array_sum($CadenaAt);
                                    $maxviajes=max($CadenaAt);
                                    $promedio33=$sumaAt/$longitudAt;
       echo("<a style='color:black;' href='?controller=reportes&&action=combustibles&daterange=".$fechaconsulta."'><small style='color:#128a2e;'></small> ".round($promedio33,0)." </a>");
     ?>
  </td>
  <td>
    <?php  
    $ventames16=Acpmmesgeneralvalor($i,$anoactual);
                  $sumaventas16+=$ventames16;
      echo("<a style='color:black;' href='?controller=reportes&&action=combustibles&daterange=".$fechaconsulta."'><small style='color:#128a2e;'></small>$ ".number_format($ventames16,0)." </a>");
                 
  ?>
  </td>
  
</tr>
 <?php
                }

                 ?>
             <tr class="success">
                <td><strong>Total</strong></td>
                <td><strong><?php echo(number_format($sumaventas17,0)) ?></strong></td>
                <td></td>
                <td><strong><?php echo ("$ ".number_format($sumaventas16,0)) ?></strong></td>
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
              echo(fechalarga($TiempoActual)); 
              ?></small></h3>
               
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                 
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="InformeVentas">
            
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

                 for ($i=1; $i <$tope ; $i++) { 
                  setlocale(LC_ALL, 'es_ES');
          $monthNum  = $i;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = strftime('%B', $dateObj->getTimestamp());

$Btotaldiasmes=date('t', mktime(0,0,0, $i, 1, $anoactual));
$BInicioMesbucle=($i."/"."01/".$anoactual);
$BFinMesbucle=($i."/".$Btotaldiasmes."/".$anoactual);
$fechaconsulta=($BInicioMesbucle." - ".$BFinMesbucle);

                ?>
                <tr>
                  <td>
                    <strong><?php echo(ucfirst($monthName)) ?></strong>
                  </td>
                  <td>
                    <?php 
                    $ventames18=Despachosconcretomesgeneral($i,$anoactual);
                  $sumaventas18+=$ventames18;
                  echo("<a style='color:black;' href='?controller=concreto&&action=todos&daterange=".$fechaconsulta."'><small style='color:#128a2e;'></small> ".round($ventames18,0)."</a>");
                     ?>
                  </td>
                   <td>
                    <?php 

                    $arreglof=(EstadisticasDespachosconcreto($i,$anoactual));
                                    $CadenaAt=explode(",", $arreglof);
                                    $longitudAt = count($CadenaAt)-1;
                                    $sumaAt=array_sum($CadenaAt);
                                    $maxviajes=max($CadenaAt);
                                    $promedio33=$sumaAt/$longitudAt;
                  echo("<a style='color:black;' href='?controller=concreto&&action=todos&daterange=".$fechaconsulta."'><small style='color:#128a2e;'></small> ".round($promedio33,0)."</a>");
                     ?>
                  </td>
                   <td>
                    <?php 
                    $ventames19=Despachosconcretomesgeneralvalor($i,$anoactual);
                  $sumaventas19+=$ventames19;

                  echo("<a style='color:black;' href='?controller=concreto&&action=todos&daterange=".$fechaconsulta."'><small style='color:#128a2e;'></small>$ ".number_format($ventames19,0)."</a>");
                  
                     ?>
                  </td>
                 
                </tr>
                <?php
                }

                 ?>
              <tr class="success">
                <td><strong>Total</strong></td>
                <td><strong><?php echo(number_format($sumaventas18,0)) ?></strong></td>
                <td></td>
                <td><strong><?php echo ("$ ".number_format($sumaventas19,0)) ?></strong></td>
              </tr>
            </tfoot>
            </table>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    <div class="col-sm-12 col-xs-12">
       <a href="?controller=cajas&&action=todos">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ver mi </span>
              <span class="info-box-number">Caja</span><br>
              <span class="info-box-number">Menores</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
      <a href="?controller=reportes&&action=combustibles">
        <div class="col-md-3 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-train"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Registro </span>
              <span class="info-box-number">Combustible </span><small>últimos 15 días</small>
              <span class="info-box-number"><?php echo round(($Sumacombustibledia),1); ?> GL.</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
      <a href="?controller=reportes&&action=combustiblescisterna">
        <div class="col-md-3 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-train"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Registro </span>
              <span class="info-box-number">Combustible Cisterna </span><small></small>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
     
      <a href="?controller=reportes&&action=horas">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-clock-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Registro </span>
              <span class="info-box-number">Reporte Hr/Kl</span><br>
              <span class="info-box-number">Diario</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
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

       <a href="?controller=equipos&&action=todos">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-dashboard"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Módulo </span>
              <span class="info-box-number">Volquetas</span><br>
              <span class="info-box-number">Equipos</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       <a href="?controller=equipos&&action=todosmantenimiento">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-truck"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Informe  </span>
              <span class="info-box-number">Repuestos</span><br>
              <span class="info-box-number">Equipos</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       <a href="?controller=equipos&&action=todosestados">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-truck"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Informe  </span>
              <span class="info-box-number">Estados</span><br>
              <span class="info-box-number">Equipos</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       <a href="?controller=gestiondocumentaleq&&action=listaequipos">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-file-pdf-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Gestión  </span>
              <span class="info-box-number">Documental</span><br>
              <span class="info-box-number">Equipos</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
        <a href="?controller=reportes&&action=despachosclientesf">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-exchange"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Registrar  </span>
              <span class="info-box-number">Despacho</span><br>
              <span class="info-box-number">Equipo</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       </a>
        <a href="?controller=reportes&&action=despachosclientes">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Informe  </span>
              <span class="info-box-number">x</span><br>
              <span class="info-box-number">Cliente</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>

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
         

          $res=Equipos::obtenerListaVolquetasAsf();
            foreach ($res as $campo){
            $id_equipo = $campo['id_equipo'];
            $placa = $campo['placa'];
            $estadoequipo=UltimoEstadoEquipo($id_equipo);
            $fechaestadoequipo=UltimoFechaEstadoEquipo($id_equipo);
            $actualizadohace=tiempoTranscurridoFechas($fechaestadoequipo,$fechaactual);
            ?>
                <tr>
                   <td>  <a href="?controller=equipos&&action=timelineestados&&id=<?php echo $id_equipo; ?>">  <i class="fa fa-calendar"> </i> <?php echo utf8_decode($placa); ?>   </a>
            <?php 
            if ($fechaestadoequipo<$fechaactual) {
              echo("<br><small  class='text-danger fa fa-warning'> Actualizado hace ".$actualizadohace."</small>");
            }
            elseif($fechaestadoequipo==$fechaactual)
            {
              echo("<br><small  class='text-success fa fa-check'> Actualizado hace".$actualizadohace."</small>");
            }
             ?>
                    

                  </td>
                 
                  <td>
                     <?php 
                    if ($estadoequipo=='') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-default'>Sin Actualizar</span></a>");
                    }
                    elseif ($estadoequipo=='Operativo') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-success'>Operativo</span></a>");
                    }
                     elseif ($estadoequipo=='En Mantenimiento') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-warning'>En Mantenimiento</span></a>");
                    }
                    elseif ($estadoequipo=='Fuera de Servicio') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-danger'>Fuera de Servicio</span></a>");
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
         

          $res=Equipos::ListaEquiposMenores();
            foreach ($res as $campo){
            $id_equipo = $campo['id_equipo'];
            $placa = $campo['placa'];
            $nombre_equipo = $campo['nombre_equipo'];
            $estadoequipo=UltimoEstadoEquipo($id_equipo);
            $fechaestadoequipo=UltimoFechaEstadoEquipo($id_equipo);
            $actualizadohace=tiempoTranscurridoFechas($fechaestadoequipo,$fechaactual);
            ?>
                <tr>
                  
                  <td><a href="?controller=equipos&&action=timelineestados&&id=<?php echo $id_equipo; ?>">  <i class="fa fa-calendar"> </i> <?php echo utf8_decode($nombre_equipo); ?></a>
                    <?php 
            if ($fechaestadoequipo<$fechaactual) {
              echo("<br><small  class='text-danger fa fa-warning'> Actualizado hace ".$actualizadohace."</small>");
            }
            elseif($fechaestadoequipo==$fechaactual)
            {
              echo("<br><small  class='text-success fa fa-check'> Actualizado hace".$actualizadohace."</small>");
            }
             ?>
                  </td>
                 
                  <td>
                    <?php 
                    if ($estadoequipo=='') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-default'>Sin Actualizar</span></a>");
                    }
                    elseif ($estadoequipo=='Operativo') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-success'>Operativo</span></a>");
                    }
                     elseif ($estadoequipo=='En Mantenimiento') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-warning'>En Mantenimiento</span></a>");
                    }
                    elseif ($estadoequipo=='Fuera de Servicio') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-danger'>Fuera de Servicio</span></a>");
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
         

          $res=Equipos::ListaEquiposdiferentes();
            foreach ($res as $campo){
            $id_equipo = $campo['id_equipo'];
            $placa = $campo['placa'];
            $nombre_equipo = $campo['nombre_equipo'];
            $estadoequipo=UltimoEstadoEquipo($id_equipo);
            $fechaestadoequipo=UltimoFechaEstadoEquipo($id_equipo);
            $actualizadohace=tiempoTranscurridoFechas($fechaestadoequipo,$fechaactual);
            ?>
                <tr>
                  
                  <td><a href="?controller=equipos&&action=timelineestados&&id=<?php echo $id_equipo; ?>">  <i class="fa fa-calendar"> </i> <?php echo utf8_decode($nombre_equipo); ?></a>
          <?php 
            if ($fechaestadoequipo<$fechaactual) {
              echo("<br><small  class='text-danger fa fa-warning'> Actualizado hace ".$actualizadohace."</small>");
            }
            elseif($fechaestadoequipo==$fechaactual)
            {
              echo("<br><small  class='text-success fa fa-check'> Actualizado hace".$actualizadohace."</small>");
            }
             ?>
                  </td>
                 
                  <td>
                    <?php 
                    if ($estadoequipo=='') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-default'>Sin Actualizar</span></a>");
                    }
                    elseif ($estadoequipo=='Operativo') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-success'>Operativo</span></a>");
                    }
                     elseif ($estadoequipo=='En Mantenimiento') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-warning'>En Mantenimiento</span></a>");
                    }
                    elseif ($estadoequipo=='Fuera de Servicio') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-danger'>Fuera de Servicio</span></a>");
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
     <div class="col-sm-12 col-xs-12">
         <div style="display:none;" class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <b>Indicadores  // Online <i class="fa fa-circle text-success"></i></b>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><i>Número de Fletes </i></b> <a class="pull-right"> <?php $FletesDiarios=FletesDiarios($FechaInicioDiaActual,$FechaFinalDiaActual)?> <?php echo utf8_encode($FletesDiarios); ?></a>
                </li>
                 <li class="list-group-item">
                  <b><i>Km Recorridos</i></b> <a class="pull-right"> <?php $KilometrajeDiarios=KilometrajeDiarios($FechaInicioDiaActual,$FechaFinalDiaActual)?> <?php echo utf8_encode($KilometrajeDiarios); ?> Km </a>
                </li>
                 <li class="list-group-item">
                  <b><i>M3 Transportados</i></b> <a class="pull-right"><?php $MetrajeDiarios=MetrajeDiarios($FechaInicioDiaActual,$FechaFinalDiaActual)?> <?php echo utf8_encode($MetrajeDiarios); ?> m3 </a>
                </li>
                 <li class="list-group-item">
                  <b><i>Galones ACPM</i></b> <a class="pull-right"><?php $Sumacombustibledia=ReporteCombustibledia($FechaInicioDiaActual,$FechaFinalDiaActual); ?> <?php echo(round($Sumacombustibledia,2)) ?>Gl </a>
                </li>
                
                 <li class="list-group-item">
                  <b><i>Gasto ACPM</i></b> <a class="pull-right"><?php $GastoCombustibledia=GastoCombustibledia($FechaInicioDiaActual,$FechaFinalDiaActual)?> <?php echo utf8_encode("$".number_format($GastoCombustibledia,0)); ?></a>
                </li>
                
                 <li class="list-group-item">
                  <b><i>Gastos (últimos 15 días) </i></b> <a class="pull-right"> m3 </a>
                </li>
               
                 <li class="list-group-item">
                  <b><i>Facturación Promedio</i></b> <a class="pull-right"> <?php echo utf8_encode("$".number_format($promedio3,0)); ?></a>
                </li>
                 <li class="list-group-item">
                  <b>Facturación <i>(Hoy)</i></b> <b><a class="pull-right"><?php $MaterialFact=FacturacionDiaTotal($FechaInicioDiaActual,$FechaFinalDiaActual)?> <?php echo utf8_encode("$".number_format($MaterialFact,0)); ?></a></b>
                </li>
                
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
     </div>
     


 
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->