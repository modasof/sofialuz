           <div class="col-md-4 col-xs-12">
        <div class="chart">
                    <!-- Sales Chart Canvas 
                   <div id="grafica_4" style="height: 300px; width: 100%;"></div>
                 -->
        </div>
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Total Compras<small> Actualizado al <?php
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

               <tr style="background-color: #274350;color: white;">
                <th>Mes</th>
               <th>Compras</th>
               <th>Abonos</th>
               <th>CxP</th>

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
                  <td><strong><a href="?controller=compras&&action=todospormes&daterange=<?php echo ($fechaconsulta); ?>"><i class="fa fa-line-chart"> </i> <?php echo (ucfirst($monthName)); ?></a></strong></td>
                  <td>
                    <?php
$ventames1 = Comprasmesgeneral($i, $anoactual);
    $sumaventas1 += $ventames1;
$totalcompras = Comprasanogeneral($anoactual);  
    $division=$tope-1;
    $promediocompras=$totalcompras/$division;

    if ($ventames1>$promediocompras) {
      $valorporcentaje=($ventames1-$promediocompras)/$promediocompras;
      $labelporcentaje=$valorporcentaje*100;

      $icono="<span class='badge bg-red'><i class='fa fa-arrow-circle-up'></i>  ".round($labelporcentaje,0)."%</span>";
    }else{
       $valorporcentaje=($ventames1-$promediocompras)/$promediocompras;
        $labelporcentaje=$valorporcentaje*100;
      $icono="<span class='badge bg-green'><i class='fa fa-arrow-circle-down'> </i> ".round($labelporcentaje,0)."%</span>";
    }

    echo ("<a style='color:black;' href='?controller=compras&&action=todospormes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . number_format($ventames1, 0) . " ".$icono."</a>");

    ?>
                  </td>
                   <td>
                    <?php

    $arreglof   = (Abonoscomprasmes($i, $anoactual));
     $sumaAbonos17 += $arreglof;
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $maxviajes  = max($CadenaAt);
    $promedio33 = $sumaAt / $longitudAt;
    echo ("<a style='color:black;' href='?controller=compras&&action=todospormes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> $" . number_format($arreglof, 0) . "</a>");
    ?>
                  </td>
                  <td>
                    <?php
$ventames17 = Comprasmesgeneral($i, $anoactual);
    $sumaventas17 += $ventames17;
    $saldocxp=$ventames1-$arreglof;
    echo ("<a style='color:black;' href='?controller=compras&&action=todospormes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small>$ " . number_format($saldocxp, 0) . "</a>");

    ?>
                  </td>

                </tr>
                <?php
}

?>
              <tr class="success">
                <td><strong>Total</strong></td>
                <td><strong><?php echo (number_format($sumaventas17, 0)) ?></strong></td>
                <td><strong><?php echo (number_format($sumaAbonos17, 0)) ?></strong></td>
                <td><strong><?php 
                $totalcxp=$sumaventas17-$sumaAbonos17;
                echo ("$ " . number_format($totalcxp, 0)) 

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