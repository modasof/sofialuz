<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row" style="height: 92px;">
         <div class="owl-carousel">

       <?php 
    $res=Cuentas::obtenerPagina();
$campos = $res->getCampos();
foreach($campos as $campo){

  $id_cuenta = $campo['id_cuenta'];
  $nombre_cuenta = $campo['nombre_cuenta'];
  $totalIngresos=Cuentas::obtenerIngresospor($id_cuenta);
  $totalEgresos=Cuentas::obtenerEgresospor($id_cuenta);
  $saldocuenta=$totalIngresos-$totalEgresos;



     ?> 
          <ul style="list-style:none;" class="small-block-grid-3 medium-block-grid-4 large-block-grid-6">
                <li>
                  <?php 
                  if ($saldocuenta<=0) {
                   ?>
                    <h6 class="text-left accion up text-red" title="<?php echo utf8_encode($nombre_cuenta); ?>"> SALDO CTA. <?php echo utf8_encode($nombre_cuenta); ?></h6>
                    <h5 class="subheader accion up text-red"><span class="var right"><i class="fa fa-arrow-circle-down right"> </i> n/a %</span><br class="show-for-small"><span class="show-for-small right"><?php echo("$".number_format($saldocuenta)); ?></span></h5>
                   <?php
                  }
                  else
                  {
                   ?>
                    <h6 style="padding: 0px;" class="text-left accion up text-green" title="<?php echo utf8_encode($nombre_cuenta); ?>"> SALDO CTA. <?php echo utf8_encode($nombre_cuenta); ?></h6>
                    <h5 class="subheader accion up text-green"><span class="var right"> <i class="fa fa-arrow-circle-up right"> </i> n/a %</span><br class="show-for-small"><span class="show-for-small right"><?php echo("$".number_format($saldocuenta)); ?></span></h5>
                    <?php 
                  }
                     ?>
                </li>
          </ul>
          <?php 

        }
           ?>
        
        
        </div>
      </div>
      <div style="display: none;" class="row">
       
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CPU Traffic</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
       <div class="row">
       
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Reporte Gastos Sub-Rubros</h3>
               <form action="?controller=cuentas&&action=reporteporfecha" method="post" id="FormFechas" autocomplete="off">
         <div class="col-md-8">
                        <div class="form-group">
                          <label>Seleccione el Rango de Fecha<span>*</span></label>
                          <input type="text"  name="daterange" class="form-control" required value="">
                        </div>
                      </div>
          <div class="form-group">
            <div class="col-xs-12 col-sm-6">
              <button class="btn btn-primary btn-sm" type="Submit">Realizar Consulta</button>           
          </div>    
          </div>
        </form>
        <script type="text/javascript">
  $('input[name="daterange"]').daterangepicker({
     "autoApply": true,
    ranges: {
        'Hoy': [moment(), moment()],
        'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
        'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
        'Este Mes': [moment().startOf('month'), moment().endOf('month')],
        'Mes Anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    "locale": {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "desde",
        "toLabel": "hasta",
        "customRangeLabel": "Personalizado",
        "weekLabel": "W",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    },
    "startDate": "<?php echo($primerdiames); ?>",
    "endDate": "<?php echo($ultimodiames); ?>",
    "opens": "left"
}, function(start, end, label) {
  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});
</script>
              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div  class="btn-group">
                  <button style="display: none;" type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button style="display: none;" type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">


                    <strong>Rubros: <?php echo(fechalarga($datofechain)); ?> al <?php echo(fechalarga($datofechafinal)); ?></strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                   <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
              
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <?php 
    $res=Cuentas::obtenerSubrubrosGastos(5);
$campos = $res->getCampos();
foreach($campos as $campo){
  $nombre_subrubro = $campo['nombre_subrubro'];
  $id_subrubro = $campo['id_subrubro'];
  $valor = Cuentas::obtenerSumaSubrubro($id_subrubro,5,$FechaStart,$FechaEnd); // Función de funciones.php
  $porcentaje = Cuentas::obtenerPorcentajeSubrubro($id_subrubro,5,$FechaStart,$FechaEnd); // Función de funciones.php
     ?> 
     <?php 
     if ($valor!=0) {
      ?>
      <div class="col-sm-2 col-xs-12">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"> <?php echo round($porcentaje,2) ?>%</span>
                    <h5 class="description-header"><?php Echo utf8_encode("$ ".number_format($valor));  ?></h5>
                    <span class="description-text"><?php echo utf8_encode($nombre_subrubro) ?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
      <?php 
      }
    }
       ?>
               
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-7">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Últimos Egresos Obinco</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Valor</th>
                    <th>Observación</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
    $res=Cuentas::obtenerUltimosGastos(5);
$campos = $res->getCampos();
foreach($campos as $campo){
  $valor_egreso = $campo['valor_egreso'];
  $observaciones = $campo['observaciones'];
  $egreso_en = $campo['egreso_en'];
  $imagen = $campo['imagen'];

     ?> 
                  <tr>
                    <td><a target="_blank" href="<?php echo($imagen) ?>"><span class="label label-success"><?php echo utf8_encode("$ ".number_format($valor_egreso)); ?></span></a></td>
                    <td><?php echo utf8_encode($observaciones); ?></td>
                  
                    
                  </tr>
                  <?php 
                }
                   ?>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="?controller=egresoscuenta&&action=nuevo&&id_cuenta=5" class="btn btn-sm btn-info btn-flat pull-left">Subir Egreso</a>
              <a href="?controller=egresoscuenta&&action=egresos&&id_cuenta=5" class="btn btn-sm btn-default btn-flat pull-right">Ver total Egresos</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
         <div class="col-md-5">
          <div id="chartContainer2" style="height: 350px; width: 100%;"></div>
         </div>
        <div style="display: none;" class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inventory</span>
              <span class="info-box-number">5,200</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mentions</span>
              <span class="info-box-number">92,050</span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
                  <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Downloads</span>
              <span class="info-box-number">114,381</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Direct Messages</span>
              <span class="info-box-number">163,921</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
                  <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          

          <!-- PRODUCT LIST -->
          <div style="display: none;" class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Samsung TV
                      <span class="label label-warning pull-right">$1800</span></a>
                        <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Bicycle
                      <span class="label label-info pull-right">$700</span></a>
                        <span class="product-description">
                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
                        <span class="product-description">
                          Xbox One Console Bundle with Halo Master Chief Collection.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">PlayStation 4
                      <span class="label label-success pull-right">$399</span></a>
                        <span class="product-description">
                          PlayStation 4 500GB Console (PS4)
                        </span>
                  </div>
                </li>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <hr>
      <div class="row">
          <!-- Left col -->
        <div class="col-md-4">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Últimos Documentos Subidos a Cuentas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Documento</th>
                    <th>Cuenta</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
    $res=Gestiondocumental::obtenerUltimosDocumentos();
$campos = $res->getCampos();
foreach($campos as $campo){
  $id_registro = $campo['id_registro'];
  $cuenta_id_cuenta = $campo['cuenta_id_cuenta'];
  $documento_id_documento = $campo['documento_id_documento'];
  $nombrecuenta=Gestiondocumental::ObtenerNombrecuenta($cuenta_id_cuenta);
  $nombredocumento=Gestiondocumental::ObtenerNombredocumento($documento_id_documento);
  $marca_temporal = $campo['marca_temporal'];
  $imagen = $campo['imagen'];

     ?> 
                  <tr>
                    <td><a target="_blank" href="<?php echo($imagen) ?>"><span class="label label-success"><?php echo utf8_encode($nombredocumento); ?></span></a></td>
                    <td><?php echo utf8_encode($nombrecuenta); ?><br><?php echo($marca_temporal); ?></td>
                
                  </tr>
                  <?php 
                }
                   ?>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a style="display: none;"  href="?controller=egresoscuenta&&action=nuevo&&id_cuenta=5" class="btn btn-sm btn-info btn-flat pull-left">Subir Documento</a>
              <a href="?controller=consolidados&&action=documentoscuentas" class="btn btn-sm btn-default btn-flat pull-right">Ver Todos</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
            <!-- Left col -->
        <div class="col-md-4">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Últimos Documentos Subidos a Equipos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Documento</th>
                    <th>Equipo</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
    $res=gestiondocumentaleq::obtenerUltimosDocumentos();
$campos = $res->getCampos();
foreach($campos as $campo){
  $id_registro = $campo['id_registro'];
  $cuenta_id_cuenta = $campo['cuenta_id_cuenta'];
  $documento_id_documento = $campo['documento_id_documento'];
  $nombrecuenta=gestiondocumentaleq::ObtenerNombreEquipo($cuenta_id_cuenta);
  $nombredocumento=gestiondocumentaleq::ObtenerNombredocumento($documento_id_documento);
  $marca_temporal = $campo['marca_temporal'];
  $imagen = $campo['imagen'];

     ?> 
                  <tr>
                    <td><a target="_blank" href="<?php echo($imagen) ?>"><span class="label label-success"><?php echo utf8_encode($nombredocumento); ?></span></a></td>
                    <td><?php echo utf8_encode($nombrecuenta); ?><br><?php echo($marca_temporal); ?></td>
                
                  </tr>
                  <?php 
                }
                   ?>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a style="display: none;" href="?controller=egresoscuenta&&action=nuevo&&id_cuenta=5" class="btn btn-sm btn-info btn-flat pull-left">Subir Egreso</a>
              <a href="?controller=consolidados&&action=documentosequipos" class="btn btn-sm btn-default btn-flat pull-right">Ver Todos</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
            <!-- Left col -->
        <div class="col-md-4">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Últimos Reportes de Equipos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Equipo</th>
                    <th>Horas Reportadas</th>
                 
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
    $res=Equipos::obtenerUltimosReportes();
$campos = $res->getCampos();
foreach($campos as $campo){
  $num_trabajado = $campo['num_trabajado'];
  $unidad_trabajo = $campo['unidad_trabajo'];
  $equipo_id_equipo = $campo['equipo_id_equipo'];
   $marca_temporal = $campo['marca_temporal'];
  $nombrequipo=gestiondocumentaleq::ObtenerNombreEquipo($equipo_id_equipo);

     ?> 
                  <tr>
                     <td><a href="?controller=equipos&&action=reportediario&&id=<?php echo($equipo_id_equipo); ?>"><span class="label label-success"><?php echo utf8_encode($nombrequipo); ?></span></a></td>
                    <td><?php echo utf8_encode($num_trabajado." ".$unidad_trabajo); ?> <br><small>Reportado el: <?php echo utf8_encode($marca_temporal);?></small></td>
                    
                  </tr>
                  <?php 
                }
                   ?>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="?controller=equipos&&action=formreportedia" class="btn btn-sm btn-info btn-flat pull-left">Reportar Consumo</a>
              <a href="?controller=equipos&&action=todos" class="btn btn-sm btn-default btn-flat pull-right">Ir a Equipos</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->