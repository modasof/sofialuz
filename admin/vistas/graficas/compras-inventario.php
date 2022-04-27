           <div class="col-md-4 col-xs-12">
        <div class="chart">
                    <!-- Sales Chart Canvas 
                   <div id="grafica_4" style="height: 300px; width: 100%;"></div>
                 -->
        </div>
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Gestión Compras<small> Actualizado al <?php
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
              <th>Compra Insumos</th>
              <th>Recibido</th>
              <th>Salidas</th>
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
    $ventames1tipoinv1 = Comprasmesgeneraltipo($i, $anoactual,'Insumos');
    $sumaventas1tipoinv1 += $ventames1tipoinv1;
    $ventames1tipoinvservicio = Comprasmesgeneraltipo($i, $anoactual,'Servicios');
    $sumaventas1tipoinvservicio += $ventames1tipoinvservicio;

    $insumos_servicios=$ventames1tipoinv1+$ventames1tipoinvservicio;
    $totalinsumos_servicios=$sumaventas1tipoinv1+ $sumaventas1tipoinvservicio;


    echo ("<a style='color:black;' href='?controller=compras&&action=todospormes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . number_format($insumos_servicios, 0) . "</a>");
    ?>
                  </td>
                   <td>
                    <?php
    $ventames1tipoinv2 = Comprasmesgeneralinventario($i, $anoactual);
    $sumaventas1tipoinv2 += $ventames1tipoinv2;
    echo ("<a style='color:black;' href='?controller=compras&&action=todospormes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . number_format($ventames1tipoinv2, 0) . "</a>");

    ?>
                  </td>
                  <td>
                    <?php
    $ventames1tipoinv3 = Comprasmesgeneralinventariosalidas($i, $anoactual);
    $sumaventas1tipoinv3 += $ventames1tipoinv3;

    echo ("<a style='color:black;' href='?controller=compras&&action=todospormes&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . number_format($ventames1tipoinv3, 0) . "</a>");

    ?>
                  </td>



                </tr>
                <?php
}

?>
              <tr class="success">
                <td><strong>Total</strong></td>
                <td><strong><?php echo (number_format($totalinsumos_servicios, 0)) ?></strong></td>
                <td><strong><?php echo (number_format($sumaventas1tipoinv2, 0)) ?></strong></td>
                <td><strong><?php 
                //$totalcxp=$sumaventas17-$sumaAbonos17;
                echo ("$ " . number_format($sumaventas1tipoinv3, 0)) 

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