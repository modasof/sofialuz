           <div class="col-md-4 col-xs-12">
            <div class="chart">
                    <!-- Sales Chart Canvas 
                   <div id="grafica_2" style="height: 300px; width: 100%;"></div>
                   -->
        </div>
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
           
        <table  class="table table-bordered table-hover dataTables_borderWrap" style="width: 100%;font-size: 12px;">
          <thead>

          <thead>

               <tr style="background-color: #274350;color: white;">
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
$ventames1 = Horasmqmesgeneral($i, $anoactual);
    $sumaventas1 += $ventames1;
    echo ("<a style='color:black;' href='?controller=reportes&&action=despachosclientes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . number_format($ventames1, 0) . "</a>");

    ?>
                  </td>
                   <td>
                    <?php

    $arreglof   = (EstadisticasHorasmq($i, $anoactual));
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $maxviajes  = max($CadenaAt);
    $promedio33 = $sumaAt / $longitudAt;
    echo ("<a style='color:black;' href='?controller=reportes&&action=despachosclientes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> $" . number_format($promedio33, 0) . "</a>");
    ?>
                  </td>
                  <td>
                    <?php
$ventames15 = Horasmqmesgeneralvalor($i, $anoactual);
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