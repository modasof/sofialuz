  <div class="col-md-4">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informe Trituradora <small> Actualizado al <?php 
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
               <tr style="background-color: #274350;color: white;">
                <th>Triturado</th>
                <th>Total</th>
                <th>Promedio</th>
                <th>Máx</th>
              </tr>
            </thead>
            <tbody>
              <?php 

                 for ($i=1; $i <$tope ; $i++) { 
                  setlocale(LC_ALL, 'es_ES');
          $monthNum  = $i;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = strftime('%B', $dateObj->getTimestamp());
?>
<tr>
<td><?php echo(ucfirst($monthName));?><small>(m3)</small></td>

<td>
  <?php 
  $ventames1tri=Trituradoramesgeneral($i,$anoactual);
                  $sumaventas1tri+=$ventames1tri;
                  echo("<strong>".number_format($ventames1tri,0)."</strong>");
   ?>
</td>
<td>
  <?php 
   $arreglof=(EstadisticasTrituradora($i,$anoactual));
                                    $CadenaAt=explode(",", $arreglof);
                                    $longitudAt = count($CadenaAt)-1;
                                    $sumaAt=array_sum($CadenaAt);
                                    $maxviajes=max($CadenaAt);
                                    $promedio33=$sumaAt/$longitudAt;
                  echo("<a style='color:black;' href='?controller=reportes&&action=despachostrituradora'><small style='color:#128a2e;'></small> ".round($promedio33,0)." </a>");
   ?>
</td>
<td>
  <?php 
  $arreglof=(EstadisticasTrituradora($i,$anoactual));
                                    $CadenaAt=explode(",", $arreglof);
                                    $longitudAt = count($CadenaAt)-1;
                                    $sumaAt=array_sum($CadenaAt);
                                    $maxviajes=max($CadenaAt);
                                    $promedio33=$sumaAt/$longitudAt;
                  echo("<a style='color:black;' href='?controller=reportes&&action=despachostrituradora'><small style='color:#128a2e;'></small> ".number_format($maxviajes,0)." </a>");
   ?>
</td>
</tr>
  <?php
                }

                 ?>
         <tr class="success">
              <td>
                <strong>Totales</strong>
              </td>
              <td><strong><?php echo("$ ".number_format($sumaventas1tri,0)); ?></strong>
                
              </td>
              <td>
                <strong>-</strong>
              </td>
               <td>
                <strong>
                  -
                </strong>
                
              </td>
             
            </tr>
            </tbody>
           
            </table>
          
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>  