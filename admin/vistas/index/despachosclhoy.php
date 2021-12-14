<?php 

              $cargacombustible=17900; 
              $salidascombustible=TotalSalidasCantera();
              $inventarioacpm=$cargacombustible-$salidascombustible;
              $calculo=($inventarioacpm/3000)*100;
              
              ?>
               
            <div class="box-header">
              <h3 class="box-title">Total M3 Día <?php echo(round($sumadeldia,1)); ?></h3>
            </div>
            <!-- /.box-header -->
          
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" style="font-size: 13px;">
                <tr>
                  <th>Cliente</th>
                  <th>Nº Viajes</th>
                  <th>M3</th>
                 <th>%</th>
                </tr>
              <?php
                    $rubros = Clientes::obtenerListaClientesDespachos($FechaInicioDiaActual,$FechaFinalDiaActual);
                    foreach ($rubros as $campo){
                      $cliente_id_cliente = $campo['cliente_id_cliente'];
                      $Totales = $campo['Totales'];
                      $nomlista=Clientes::obtenerNombreCliente($cliente_id_cliente);
                      $ViajesCliente=ViajesCliente($cliente_id_cliente,$FechaInicioDiaActual,$FechaFinalDiaActual);
                  
                    ?>
                    <tr>
                  <td><a href="?controller=index&&action=informedetalleclientes&&elcliente=<?php echo($cliente_id_cliente);?>"><?php echo($nomlista); ?></a></td>
                  <td><?php echo(round($ViajesCliente,0)); ?></td>
                 
                  <td><span class="badge bg-green">
                    <?php echo(round($Totales,1)); ?>
                  </span></td>
                 <td>
                  <?php 
                    $porcentaje=$Totales/$sumadeldia*100;
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


        