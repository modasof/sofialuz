<?php 
              $cargacombustible=17900; 
              $salidascombustible=TotalSalidasCantera();
              $inventarioacpm=$cargacombustible-$salidascombustible;
              $calculo=($inventarioacpm/3000)*100;
              
              ?>
               
            <div class="box-header">
              <h3 class="box-title">Informe x Material <?php echo(round($sumaconsolidada,1)); ?> M3</h3>
            </div>
            <!-- /.box-header -->
          
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" style="font-size: 13px;">
                <tr class="danger">
                  <th>Material</th>
                  <th>Nº Viajes</th>
                  <th>M3</th>
                 <th>%</th>
                </tr>
              <?php
                    $rubros = Clientes::obtenerListaMaterialDespachos($elcliente,'2015-01-01',$FechaFinalDiaActual);
                    foreach ($rubros as $campo){
                      $producto_id_producto = $campo['producto_id_producto'];
                      $Totales = $campo['Totales'];
                      $nomlista=Clientes::obtenerNombreProducto($producto_id_producto);
                      $ViajesMaterial=ViajesMaterial($elcliente,$producto_id_producto,'2015-01-01',$FechaFinalDiaActual);
                  
                    ?>
                    <tr>
                  <td><?php echo($nomlista); ?></td>
                  <td><?php echo(round($ViajesMaterial,0)); ?></td>
                 
                  <td><span class="badge bg-green">
                    <?php echo(round($Totales,1)); ?>
                  </span></td>
                 <td>
                  <?php 
                    $porcentaje=$Totales/$sumaconsolidada*100;
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
 <div class="box-header">
              <h3 class="box-title">Informe x Volqueta <?php echo(round($sumaconsolidada,1)); ?> M3</h3>
            </div>
               <table class="table table-hover" style="font-size: 13px;">
                <tr class="danger">
                  <th>Volqueta</th>
                  <th>Nº Viajes</th>
                  <th>M3</th>
                 <th>%</th>
                </tr>
              <?php
                    $rubros = Clientes::obtenerListaPlacasDespachos($elcliente,'2015-01-01',$FechaFinalDiaActual);
                    foreach ($rubros as $campo){
                      $equipo_id_equipo = $campo['equipo_id_equipo'];
                      $Totales = $campo['Totales'];
                      $nomlista=Equipos::obtenerPlacaEquipo($equipo_id_equipo);
                      $Propietario=Equipos::obtenerPropietarioEquipo($equipo_id_equipo);
                  $ViajesMaterialPlaca=ViajesMaterialPlaca($elcliente,$equipo_id_equipo,'2015-01-01',$FechaFinalDiaActual);
                  
                    ?>
                    <tr>
                  <td><?php echo($nomlista." ".$Propietario); ?></td>
                  <td><?php echo(round($ViajesMaterialPlaca,0)); ?></td>
                 
                  <td><span class="badge bg-green">
                    <?php echo(round($Totales,1)); ?>
                  </span></td>
                 <td>
                  <?php 
                    $porcentaje=$Totales/$sumaconsolidada*100;
                    echo(round($porcentaje,1)) ;
                   ?>
                   %
                  <i class="fa fa-pie-chart"> </i> </td>
                </tr>
              
               <?php 
             } 
             ?>
              </table>
          </div>


        