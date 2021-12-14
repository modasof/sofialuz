<?php 
              $cargacombustible=17900; 
              $salidascombustible=TotalSalidasCantera();
              $inventarioacpm=$cargacombustible-$salidascombustible;
              $calculo=($inventarioacpm/3000)*100;
              
              ?>
               
            <div class="box-header">
              <h3 class="box-title">Total M3 Mes <?php echo(round($Acpmmesanterior,1)); ?></h3>
            </div>
            <!-- /.box-header -->
          
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" style="font-size: 13px;">
                <tr>
                  <th>Cliente</th>
                  <th>Facturado</th>
                  <th>Abonos</th>
                
                 <th>%</th>
                </tr>
              <?php
                    $rubros = Clientes::obtenerListaClientesVentames($InicioMesanterior,$FinalMesanterior);
                    foreach ($rubros as $campo){
                      $cliente_id_cliente = $campo['cliente_id_cliente'];
                      $Totales = $campo['Totales'];
                      $nomlista=Clientes::obtenerNombreCliente($cliente_id_cliente);
                      $AbonosCliente=AbonosCliente($cliente_id_cliente,$InicioMesanterior,$FinalMesanterior);
                      $Abonosmes=Abonosmes($InicioMesanterior,$FinalMesanterior);
                      $saldo=$Totales-$AbonosCliente;
                      $saldototal=$Acpmmesanterior-$Abonosmes;
                    ?>
                    <tr>
                  <td><a href="?controller=index&&action=informedetalleclientesventas&&elcliente=<?php echo($cliente_id_cliente);?>"><?php echo($nomlista); ?></a></td>
                  <td><?php echo utf8_encode("$".number_format($Totales,0)); ?></td>
                 
                  <td><span class="badge bg-aqua">
                   <?php echo utf8_encode("$".number_format($AbonosCliente,0)); ?>
                  </span>
                   <?php 
                  if ($Totales>$AbonosCliente) {
                    ?>
                    <span style="margin-left: 10px;" class="pull-right badge bg-red"><i class="fa fa-arrow-circle-down"> </i> </span>
                    <?php
                  }
                  elseif($Totales<$AbonosCliente)
                  {
                    ?>
                     <span style="margin-left: 10px;" class="pull-right badge bg-green"><i class="fa fa-arrow-circle-up"> </i> </span>
                    <?php
                  }
                  elseif($Totales==$AbonosCliente)
                  {
                    ?>
                     <span style="margin-left: 10px;" class="pull-right badge bg-default"><i class="fa fa-arrow-circle-left"> </i> </span>
                    <?php
                  }


                   ?>
                </td>
                 <td>
                  <?php 
                    $porcentaje=$Totales/$Acpmmesanterior*100;
                    echo(round($porcentaje,1)) ;
                   ?>
                   %
                  <i class="fa fa-pie-chart"> </i> </td>
                </tr>
              
               <?php 
             } 
             ?>
             <tr>
               <th></th>
               <th> <?php echo utf8_encode("$".number_format($Acpmmesanterior,0)); ?></th>
               <th> <?php echo utf8_encode("$".number_format($Abonosmes,0)); ?></th>
              
               <th></th>
             </tr>
              </table>
          </div>


        