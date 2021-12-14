<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Obinco
        <small>2019</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

     <?php 
     $anoactual= date('Y');

    // Promedio Diario de Trituración
               for ($i=1; $i <13 ; $i++) { 
                  $arreglof=(PromedioDiarioTrituradora($i,$anoactual));
                                    $CadenaAt=explode(",", $arreglof);
                                    $longitudAt = count($CadenaAt)-1;
                                    $sumaAt=array_sum($CadenaAt);
                                    $promedio1=$sumaAt/$longitudAt;
                }

    // Promedio Mensual de Trituración
                 for ($i=1; $i <13 ; $i++) { 
                  $arreglof=(PromedioMesTrituradora($i,$anoactual));
                                    $CadenaAt=explode(",", $arreglof);
                                    $longitudAt = count($CadenaAt)-1;
                                    $sumaAt=array_sum($CadenaAt);
                                    $promedio2=$sumaAt/$longitudAt;
                }
      // Trituración Hoy 
     $trituradohoy=DespachosTrituradorames($FechaInicioDiaActual,$FechaFinalDiaActual);

    // Trituración Día Anterior 

     $trituradoayer=DespachosTrituradorames($FechaInicioDiaAnterior,$FechaFinalDiaAnterior);

    // Triturado Mes Actual 

     $trituradomes=DespachosTrituradorames($FechaInicioDia,$FechaFinalDia);
    
    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************

      // Promedio Diario de Terraje
               for ($i=1; $i <13 ; $i++) { 
                  $arreglof=(PromedioDiarioPatio($i,$anoactual));
                                    $CadenaAt=explode(",", $arreglof);
                                    $longitudAt = count($CadenaAt)-1;
                                    $sumaAt=array_sum($CadenaAt);
                                    $promedio3=$sumaAt/$longitudAt;
                }

    // Promedio Mensual de Terraje
                 for ($i=1; $i <13 ; $i++) { 
                  $arreglof=(PromedioMesPatio($i,$anoactual));
                                    $CadenaAt=explode(",", $arreglof);
                                    $longitudAt = count($CadenaAt)-1;
                                    $sumaAt=array_sum($CadenaAt);
                                    $promedio4=$sumaAt/$longitudAt;
                }
      // Trituración Hoy 
     $patiohoy=DespachosPatiomes($FechaInicioDiaActual,$FechaFinalDiaActual);

    // Trituración Día Anterior 

     $patioayer=DespachosPatiomes($FechaInicioDiaAnterior,$FechaFinalDiaAnterior);

    // Triturado Mes Actual 

     $patiomes=DespachosPatiomes($FechaInicioDia,$FechaFinalDia);
    
    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************

     // Promedio Diario de Despachos
               for ($i=1; $i <13 ; $i++) { 
                  $arreglof=(PromedioDiarioDespachos($i,$anoactual));
                                    $CadenaAt=explode(",", $arreglof);
                                    $longitudAt = count($CadenaAt)-1;
                                    $sumaAt=array_sum($CadenaAt);
                                    $promedio5=$sumaAt/$longitudAt;
                }

    // Promedio Mensual de Despachos
                 for ($i=1; $i <13 ; $i++) { 
                  $arreglof=(PromedioMesDespachos($i,$anoactual));
                                    $CadenaAt=explode(",", $arreglof);
                                    $longitudAt = count($CadenaAt)-1;
                                    $sumaAt=array_sum($CadenaAt);
                                    $promedio6=$sumaAt/$longitudAt;
                }
      // Trituración Hoy 
     $despachoshoy=Despachosclmes($FechaInicioDiaActual,$FechaFinalDiaActual);

    // Trituración Día Anterior 

     $despachosayer=Despachosclmes($FechaInicioDiaAnterior,$FechaFinalDiaAnterior);

    // Triturado Mes Actual 

     $despachosmes=Despachosclmes($FechaInicioDia,$FechaFinalDia);
    
    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************
        
                 ?>

     <div class="owl-carousel">
          <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                  <h6 class="text-left accion up text-blue" title="Promedio diario de terraje"> PROM. DIA TERRAJE</h6>
                    <h5 class="subheader accion up text-blue"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($promedio3,0)); ?> M3</span><br class="show-for-small"></h5>
                  
                </li>
          </ul>
           <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                   <h6 class="text-left accion up text-blue" title="Promedio mensual de terraje"> PROM. MES TERRAJE</h6>
                    <h5 class="subheader accion up text-blue"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($promedio4,0)); ?> M3</span><br class="show-for-small"></h5>
                  
                </li>
          </ul>
          <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                  <h6 class="text-left accion up text-blue" title="Producción Terraje Ayer"> TERRAJE AYER</h6>
                     <h5 class="subheader accion up text-blue"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($patioayer,0)); ?> M3</span><br class="show-for-small"></h5>
                  
                </li>
          </ul>
          <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                  <h6 class="text-left accion up text-blue" title="Producción Terraje Hoy"> TERRAJE HOY</h6>
                     <h5 class="subheader accion up text-blue"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($patiohoy,0)); ?> M3</span><br class="show-for-small"></h5>
                   
                </li>
          </ul>
          <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                  <h6 class="text-left accion up text-blue" title="Producción trituradora Mes Actual">TERRAJE MES ACTUAL</h6>
                    <h5 class="subheader accion up text-blue"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($patiomes,0)); ?> M3</span><br class="show-for-small"></h5>
                </li>
          </ul>
    <?php 

    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************

     ?>
       <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                    <h6 class="text-left accion up text-red" title="Promedio diario de trituración"> PROM. DIA TRITURADORA</h6>
                    <h5 class="subheader accion up text-red"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($promedio1,0)); ?> M3</span><br class="show-for-small"></h5>
                </li>
          </ul>
           <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                    <h6 class="text-left accion up text-red" title="Promedio mensual de trituración"> PROM. MES TRITURADORA</h6>
                    <h5 class="subheader accion up text-red"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($promedio2,0)); ?> M3</span><br class="show-for-small"></h5>
                </li>
          </ul>
          <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                  <h6 class="text-left accion up text-red" title="Producción trituradora Ayer"> TRITURADORA AYER</h6>
                     <h5 class="subheader accion up text-red"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($trituradoayer,0)); ?> M3</span><br class="show-for-small"></h5>
                </li>
          </ul>
          <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                   <h6 class="text-left accion up text-red" title="Producción trituradora Hoy"> TRITURADORA HOY</h6>
                     <h5 class="subheader accion up text-red"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($trituradohoy,0)); ?> M3</span><br class="show-for-small"></h5>
                </li>
          </ul>
          <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                   <h6 class="text-left accion up text-red" title="Producción Terraje Mes"> TRITURADO MES ACTUAL</h6>
                    <h5 class="subheader accion up text-red"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($trituradomes,0)); ?> M3</span><br class="show-for-small"></h5>
                </li>
          </ul>

     <?php 

    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************
    //**************************************************************************************

     ?>
        
       <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                    <h6 class="text-left accion up text-green" title="Promedio diario de trituración"> PROM. DIA DESPACHOS</h6>
                    <h5 class="subheader accion up text-green"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($promedio5,0)); ?> M3</span><br class="show-for-small"></h5>
                </li>
          </ul>
           <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                    <h6 class="text-left accion up text-green" title="Promedio mensual de trituración"> PROM. MES DESPACHOS</h6>
                    <h5 class="subheader accion up text-green"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($promedio6,0)); ?> M3</span><br class="show-for-small"></h5>
                </li>
          </ul>
          <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                  <h6 class="text-left accion up text-green" title="Producción trituradora Ayer"> DESPACHOS AYER</h6>
                     <h5 class="subheader accion up text-green"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($despachosayer,0)); ?> M3</span><br class="show-for-small"></h5>
                </li>
          </ul>
          <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                   <h6 class="text-left accion up text-green" title="Producción trituradora Hoy"> DESPACHOS HOY</h6>
                     <h5 class="subheader accion up text-green"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($despachoshoy,0)); ?> M3</span><br class="show-for-small"></h5>
                </li>
          </ul>
          <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                   <h6 class="text-left accion up text-green" title="Producción Terraje Mes"> DESPACHOS MES ACTUAL</h6>
                    <h5 class="subheader accion up text-green"><span class="var right"><i class="fa fa-sliders"> </i> <?php echo(round($despachosmes,0)); ?> M3</span><br class="show-for-small"></h5>
                </li>
          </ul>

      </div>

    <!-- Main content -->


       <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Producción Mes 
                <?php 
                $graficamesanterior=$_GET['graficamesanterior'];
                if ($graficamesanterior!="") {
                  $titulo="Anterior";
                }
                else
                {
                  $titulo="Actual";
                }
                echo ($titulo);

                 ?>
            </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-calendar"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="?controller=index&&action=index">Este Mes</a></li>
                    <li><a href="?controller=index&&action=index&&graficamesanterior=valida">Mes Anterior</a></li>
                   
                  </ul>
                </div>
               
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                 

                 
                   
                    <div id="chartContainer22" style="height: 400px;width: 100%"></div>

                  </div>
   <div class="col-md-12">
                  <!-- /.chart-responsive -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol style="display: none;" class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>            
<div class="carousel-inner">
    <div class="item active">
       <!-- /.col -->
                <div class="col-md-12">
                   <hr>
                    <hr>
                  <p class="text-center">
                    <strong>Hoy <?php echo(fechalarga($MarcaTemporal)); ?></strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Terraje (m3)</span>
                    <span class="progress-number">
                        <?php  $sumadeldia=DespachosPatiomes($FechaInicioDiaActual,$FechaFinalDiaActual); ?>
                         <strong> <?php echo(round($sumadeldia,2)); ?> - m3</strong> de 1400 m3</span>
                         <?php 
                         $porcentajepatio=($sumadeldia/1400)*100;
                          ?>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: <?php echo(round($porcentajepatio,1)); ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Triturado (m3)</span>
                    <span class="progress-number"> <?php  $sumadeldia=DespachosTrituradorames($FechaInicioDiaActual,$FechaFinalDiaActual); ?>
                         <strong> <?php echo(round($sumadeldia,2)); ?> - m3</strong> de 1400 m3</span>
                         <?php 
                         $porcentajetrituradora=($sumadeldia/1400)*100;
                          ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?php echo(round($porcentajetrituradora,1)); ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Despachados (m3)</span>
                    <span class="progress-number"> <?php  $sumadeldia=Despachosclmes($FechaInicioDiaActual,$FechaFinalDiaActual); ?>
                         <strong> <?php echo(round($sumadeldia,2)); ?> - m3</strong> de 1400 m3</span>
                         <?php 
                         $porcentajedespacho=($sumadeldia/1400)*100;
                          ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: <?php echo(round($porcentajedespacho,1)); ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
    </div>

    <div class="item">
       <!-- /.col -->
                <div class="col-md-12">
                   <hr>
                    <hr>
                  <p class="text-center">
                    <strong>Ayer <?php echo(fechalarga($MarcaTemporalAyer)); ?></strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Terraje (m3)</span>
                    <span class="progress-number">
                        <?php  $sumadeldia=DespachosPatiomes($FechaInicioDiaAnterior,$FechaFinalDiaAnterior); ?>
                         <strong> <?php echo(round($sumadeldia,2)); ?> - m3</strong> de 1400 m3</span>
                         <?php 
                         $porcentajepatio=($sumadeldia/1400)*100;
                          ?>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: <?php echo(round($porcentajepatio,1)); ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Triturado (m3)</span>
                    <span class="progress-number"> <?php  $sumadeldia=DespachosTrituradorames($FechaInicioDiaAnterior,$FechaFinalDiaAnterior); ?>
                         <strong> <?php echo(round($sumadeldia,2)); ?> - m3</strong> de 1400 m3</span>
                         <?php 
                         $porcentajetrituradora=($sumadeldia/1400)*100;
                          ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?php echo(round($porcentajetrituradora,1)); ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Despachados (m3)</span>
                    <span class="progress-number"> <?php  $sumadeldia=Despachosclmes($FechaInicioDiaAnterior,$FechaFinalDiaAnterior); ?>
                         <strong> <?php echo(round($sumadeldia,2)); ?> - m3</strong> de 1400 m3</span>
                         <?php 
                         $porcentajedespacho=($sumadeldia/1400)*100;
                          ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: <?php echo(round($porcentajedespacho,1)); ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
    </div>

    <div class="item">
       <!-- /.col -->
                <div class="col-md-12">
                   <hr>
                    <hr>
                  <p class="text-center">
                    <strong>Últimos 7 días</strong>
          
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Terraje (m3)</span>
                    <span class="progress-number">
                        <?php  $sumadeldia=DespachosPatiomes($FechaInicio7dias,$FechaFinal7dias); ?>
                         <strong> <?php echo(round($sumadeldia,2)); ?> - m3</strong> de 15000 m3</span>
                         <?php 
                         $porcentajepatio=($sumadeldia/15000)*100;
                          ?>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: <?php echo(round($porcentajepatio,1)); ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Triturado (m3)</span>
                    <span class="progress-number"> <?php  $sumadeldia=DespachosTrituradorames($FechaInicio7dias,$FechaFinal7dias); ?>
                         <strong> <?php echo(round($sumadeldia,2)); ?> - m3</strong> de 15000 m3</span>
                         <?php 
                         $porcentajetrituradora=($sumadeldia/15000)*100;
                          ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?php echo(round($porcentajetrituradora,1)); ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Despachados (m3)</span>
                    <span class="progress-number"> <?php  $sumadeldia=Despachosclmes($FechaInicio7dias,$FechaFinal7dias); ?>
                         <strong> <?php echo(round($sumadeldia,2)); ?> - m3</strong> de 15000 m3</span>
                         <?php 
                         $porcentajedespacho=($sumadeldia/15000)*100;
                          ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: <?php echo(round($porcentajedespacho,1)); ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  </div>
               



              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                 <p class="text-center">
                    <strong>Indicadores Mes Actual</strong>
                  </p>
                <div class="col-sm-4 col-xs-4">
                  <?php  
                  $terrajemes=DespachosPatiomes($FechaInicioDia,$FechaFinalDia);
                  ?>
                  <div class="description-block border-right">
                     <!--<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 2%</span>-->
                    <h5 class="description-header"><?php echo(round($terrajemes,1)); ?> m3</h5>
                    <span class="description-text">Terraje</span><a href="?controller=reportes&&action=despachos"> <i class="fa fa-external-link-square"></i></a>
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              <div class="col-sm-4 col-xs-4">
                   <?php  
                  $trituradomes=DespachosTrituradorames($FechaInicioDia,$FechaFinalDia);
                  ?>
                  <div class="description-block border-right">
                   <!--<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 2%</span>-->
                    <h5 class="description-header"><?php echo(round($trituradomes,1)); ?> m3</h5>
                    <span class="description-text">Triturado</span><a href="?controller=reportes&&action=despachostrituradora"> <i class="fa fa-external-link-square"></i> </a>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                 <div class="col-sm-4 col-xs-4">
                  <?php  
                  $despachosmes=Despachosclmes($FechaInicioDia,$FechaFinalDia);
                  ?>
                  <div class="description-block border-right">
                     <!--<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 2%</span>-->
                    <h5 class="description-header"><?php echo(round($despachosmes,1)); ?> m3</h5>
                    <span class="description-text">Despachos</span>
                    <a href="?controller=index&&action=informeclientes"> <i class="fa fa-external-link-square"></i> </a>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                 
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->

             <div class="row">
                 <p class="text-center">
                   <hr>
                  </p>
               
                <div class="col-sm-6 col-xs-6">
                  <?php  
                   $Acpmmesactual=Acpmmes($FechaInicioDia,$FechaFinalDia); 
                  ?>
                  <div class="description-block border-right">
                     <!--<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 2%</span>-->
                    <h5 class="description-header"><?php echo(round($Acpmmesactual,1)); ?> Gl</h5>
                     <span class="description-text">Consumo ACPM</span> <a href="?controller=reportes&&action=combustibles"> <i class="fa fa-external-link-square"></i></a>
                    </a>
                  </div>
                  <!-- /.description-block -->
                </div>

                <!-- /.col -->
           
                <!-- /.col -->
                 <div class="col-sm-6 col-xs-6">
                  <?php 
              $cargacombustible=49175+3000+3000+3000+3000+3000+3000+3000+7425+3000+3000+200+3000+3000+3002+3000+3000+3000; 
              // Llegada el 23 de Julio
              // Llegada el 12 de Agosto  
              // Llegada el 25 de Agosto 
               // Llegada el 04 de Septiembre  
                // Llegada el 12 de Septiembre  
              $salidascombustible=TotalSalidasCantera();
              $inventarioacpm=$cargacombustible-$salidascombustible;
              $calculo=($inventarioacpm/3000)*100;
             
              ?>
                  <div class="description-block border-right text-green">
                    <!-- <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo(round($calculo,0)); ?>%</span>-->
                    <h5 class="description-header"><?php echo(round($inventarioacpm,1)); ?> Gl</h5>
                     <span class="description-text">ACPM Disponible</span>
                    <a href="?controller=reportes&&action=combustibles"> <i class="fa fa-external-link-square"> </i></a>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->

                     </a>

      <a href="?controller=reportes&&action=horas">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-clock-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Registro </span>
              <span class="info-box-number">Reporte Hr/Kl</span><br>
              <span class="info-box-number">Diario</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       <a href="?controller=reportes&&action=despachos">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-clock-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Control </span>
              <span class="info-box-number">Viajes a Patio</span><br>
              <span class="info-box-number">Volquetas</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       <a href="?controller=reportes&&action=despachostrituradora">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Control </span>
              <span class="info-box-number">Trituradora</span><br>
              <span class="info-box-number">Diario</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       <a href="?controller=reportes&&action=combustibles">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-bar-chart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Informe </span>
              <span class="info-box-number">Combustible</span><br>
              <span class="info-box-number">Ver Informe</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       <a href="?controller=reportes&&action=despachospropietario">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-bar-chart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Informe </span>
              <span class="info-box-number">Viajes Propietario</span><br>
              <span class="info-box-number">Ver Informe</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       <a href="?controller=equipos&&action=todosmantenimiento">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-black"><i class="fa fa-truck"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Mantenimientos </span>
              <span class="info-box-number">Volquetas</span><br>
              <span class="info-box-number">Equipos</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       <a href="?controller=gestiondocumentaleq&&action=listaequipos">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-file-pdf-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Gestión  </span>
              <span class="info-box-number">Documental</span><br>
              <span class="info-box-number">Equipos</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
        <a href="?controller=equipos&&action=todos">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-black"><i class="fa fa-dashboard"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Rendimiento </span>
              <span class="info-box-number">Volquetas</span><br>
              <span class="info-box-number">Equipos</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
                 
              </div>
              <!-- /.row -->
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  