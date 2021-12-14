  <div class="row">
 
        <!-- /.col -->
        <!--Inicio consumo combustible Volquetas-->
        <div class="col-md-12">
          
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
             
              <!-- /.widget-user-image -->
              <?php 
              $cargacombustible=40773; 
              $salidascombustible=TotalSalidasCantera();
              $inventarioacpm=$cargacombustible-$salidascombustible;
              $calculo=($inventarioacpm/3000)*100;
             
              ?>

              <h3> <strong>Disponibles en tanque:<br><?php echo(round($inventarioacpm,0)); ?> Gl</strong><span class="pull-right badge bg-red"><i class="fa fa-arrow-circle-down"> </i> <?php echo(round($calculo,0)); ?>%</span></h3>
              <h5 class="widget-user-desc">
                <strong style="color: black;">Consumo día <?php echo ($sumadeldia." Gl <br/>"); ?></strong> 
                <?php 
                 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
              <?php


                    $rubros = Equipos::obtenerListaEquiposCombustible($FechaInicioDiaActual,$FechaFinalDiaActual);
                    foreach ($rubros as $campo){
                      $equipo_id_equipo = $campo['equipo_id_equipo'];
                      $Galones = $campo['Galones'];
                      $nomequipo=Equipos::obtenerNombreEquipo($equipo_id_equipo);
                      $promedioequipo=PromedioEquipo($equipo_id_equipo,$FechaInicioDia,$FechaFinalDia)

                    ?>
                   
                   <div class="row">
                
                 <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          
           
              <ul class="nav nav-stacked">
                <li><a href="#"><?php echo($nomequipo); ?> <span class="pull-right badge bg-blue"><?php echo(round($Galones,2)) ?></span>
                </a></li>
               
              </ul>
           
        
          <!-- /.widget-user -->
        </div>
               </div>

               <?php 
             } 
             ?>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
       
        
        
        </div>
         <!--Final consumo combustible Volquetas-->
        </div>


        