<?php 
              $cargacombustible=40773; 
              $salidascombustible=TotalSalidasCantera();
              $inventarioacpm=$cargacombustible-$salidascombustible;
              $calculo=($inventarioacpm/3000)*100;
              
              ?>
               
            <div class="box-header">
              <h3 class="box-title"> Total Combustible Mes <?php echo($Acpmmesactual); ?></h3>
              
            </div>
            <!-- /.box-header -->
          
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" style="font-size: 12px;">
                <tr>
                  <th>Equipo</th>
                  <th>Gl</th>
                  <th>Km - Hr</th>
                  <th>Gl/Km -Hr</th>
                 <th>%</th>
                </tr>
              <?php
                    $rubros = Equipos::obtenerListaEquiposCombustible($FechaInicioDia,$FechaFinalDia);
                    foreach ($rubros as $campo){
                      $equipo_id_equipo = $campo['equipo_id_equipo'];
                      $Galones = $campo['Galones'];
                      $nomequipo=Equipos::obtenerNombreEquipo($equipo_id_equipo);
                      $horasequipo=HorasEquipo($equipo_id_equipo,$FechaInicioDia,$FechaFinalDia);
                    ?>
                    <tr>
                  <td><?php echo($nomequipo); ?></td>
                  <td><?php echo(round($Galones,2)); ?></td>
                  <td><?php echo(round($horasequipo,1)); ?></td>
                  <td><span class="badge bg-red">
                    <?php 
                    if ($horasequipo>0) {
                      $rendimiento=$Galones/$horasequipo;
                      echo(round($rendimiento,1));
                    }
                    else
                    {
                      echo("N/A");
                    }

                     ?>

                  </span></td>
                 <td>
                  <?php 
                    $porcentaje=$Galones/$Acpmmesactual*100;
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


        