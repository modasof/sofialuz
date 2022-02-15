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

               <tr style="background-color: #274350;color: white;">
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