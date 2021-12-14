<?php 
              $cargacombustible=17900; 
              $salidascombustible=TotalSalidasCantera();
              $inventarioacpm=$cargacombustible-$salidascombustible;
              $calculo=($inventarioacpm/3000)*100;
              
              ?>
               
            <div class="box-header">
              <h3 class="box-title">Informe Facttura <?php echo(round($Acpmmesactual,1)); ?> M3</h3>
            </div>
            <!-- /.box-header -->
          
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" style="font-size: 13px;">
                <tr class="danger">
                  <th>Factura</th>
                  <th>Valor</th>
                  <th>Abonos</th>
                 <th>%</th>
                </tr>
              <?php
                    $rubros = Clientes::obtenerListaMaterialDespachosventas($elcliente,$FechaInicioDia,$FechaFinalDia);
                    foreach ($rubros as $campo){
                      $producto_id_producto = $campo['producto_id_producto'];
                      $Totales = $campo['Totales'];
                      $nomlista=Clientes::obtenerNombreProducto($producto_id_producto);
                      $ViajesMaterial=ViajesMaterial($elcliente,$producto_id_producto,$FechaInicioDia,$FechaFinalDia);
                  
                    ?>
                    <tr>
                  <td><?php echo($nomlista); ?></td>
                  <td><?php echo(round($ViajesMaterial,0)); ?></td>
                 
                  <td><span class="badge bg-green">
                    <?php echo(round($Totales,1)); ?>
                  </span></td>
                 <td>
                  <?php 
                    $porcentaje=$Totales/$Acpmmesactual*100;
                    echo(round($porcentaje,1)) ;
                   ?>
                   %
                  <i class="fa fa-pie-chart"> </i> </td>
                </tr>
              
               <?php 
             } 
             ?>
              </table>

<hr>
 
          </div>


        