<?php 
$RolSesion = $_SESSION['IdRol'];
error_reporting(E_ALL);
ini_set('display_errors', '0');
include 'vistas/index/funciones.php';
include 'vistas/index/estadisticas.php';
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';
include_once 'modelos/productos.php';
include_once 'controladores/productosController.php';
include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';
include_once 'modelos/reportes.php';
include_once 'controladores/reportesController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];
date_default_timezone_set("America/Bogota");
$totaldiasmes= date('t');
$anoactual= date('Y');
$mesactual= date('n');


 ?>
 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Informes
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Informe</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   <h1 class="text-center">Informe General // <?php 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></h1>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Informe Ventas vs CdV</h3>
               
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
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
             <table class="table no-margin">
              <tr class="info">
                <th>-</th>
                <th>Ene</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Abr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Ago</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th style="font-weight: ">Dic</th>
                <th>Totales</th>

              </tr>
              <tr  class="success">
                <td><strong>Ventas - <?php echo($anoactual); ?></strong></td>
                <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $ventasmaterialespormes=TotalVentasMes($i,$anoactual);
                  $sumaventasmateriales+=$ventasmaterialespormes;

                  $ventaequipospormes=TotalVentasMesEq($i,$anoactual);
                  $sumaventasequipos+=$ventaequipospormes;

                  $consolidadoventaspormes=$ventasmaterialespormes+$ventaequipospormes;
                  $consolidadoanualventas=$sumaventasmateriales+$sumaventasequipos;

                  echo("<td style='font-weight:-50;font-size:14px;'> $ ".number_format($consolidadoventaspormes,0)."</td>");
                }
                 ?>
                 <td><strong>$ <?php echo(number_format($consolidadoanualventas,0)); ?></strong></td>
              </tr>
               <tr class="danger">
                <td><strong>Cdv:</strong></td>
                <?php 
               for ($i=1; $i <13 ; $i++) { 
                  $comprames=TotalComprasMes($i,$anoactual);
                  $sumacompras+=$comprames;
                  echo("<td style='font-weight:-50;font-size:14px;'> $ ".number_format($comprames,0)."</td>");
                }
                 ?>
                  <td><strong>$ <?php echo(number_format($sumacompras,0)); ?></strong></td>
              </tr>

               <tr>
                <td><strong>Cuentas x Cobrar:</strong></td>
                <?php 
               for ($i=1; $i <13 ; $i++) { 
                  
                  $cxcmesmaterial=TotalCxcMes($i,$anoactual);
                  $cxcmaterialesuma+=$cxcmesmaterial;

                  $cxcmesequipos=TotalCxcMesEq($i,$anoactual);
                  $cxcequipoesuma+=$cxcmesequipos;

                  $abonosmes=TotalAbonosMes($i,$anoactual);
                  $sumabonos+=$abonosmes;

                  $consolidadocxcmes=$cxcmesmaterial+$cxcmesequipos;
                  $cxcfinalmes=$consolidadocxcmes-$abonosmes;


                  $consolidadocxcanual=$cxcmaterialesuma+$cxcequipoesuma;
                  $consolidadocxc=$consolidadocxcanual-$sumabonos;

                  echo("<td style='font-weight:-50;font-size:14px;'> $ ".number_format($cxcfinalmes,0)."</td>");
                }
                 ?>
                  <td><strong>$ <?php echo(number_format($consolidadocxc,0)); ?></strong></td>
              </tr>

               <tr class="">
                <td><strong>Cuentas x Pagar:</strong></td>
                <?php 
               for ($i=1; $i <13 ; $i++) { 
                  $compramescre=TotalComprascreMes($i,$anoactual);
                  $sumacrecompras+=$compramescre;
                  echo("<td style='font-weight:-50;font-size:14px;'> $ ".number_format($compramescre,0)."</td>");
                }
                 ?>
                  <td><strong>$ <?php echo(number_format($sumacrecompras,0)); ?></strong></td>
              </tr>

             
               <tr>
                <td><strong>N. de ventas</strong></td>
                 <?php 
               for ($i=1; $i <13 ; $i++) { 
                  $arreglof=(TotalFrecuenciaMes($i,$anoactual));
                                    $CadenaAt=explode(",", $arreglof);
                                    $longitudAt = count($CadenaAt)-1;
                                    $sumaAt=array_sum($CadenaAt);
                                    
                                    if ($longitudAt==0) {
                                      $promedioAt=0;
                                    }
                                    else
                                    {
                                      $promedioAt=$sumaAt/$longitudAt;
                                    }
                  echo("<td class='center' style='font-weight:-50;font-size:14px;'>".round($sumaAt,2)."</td>");
                }
                 ?>
                <td><strong>-</strong></td>
              </tr>
               <tr>
                <td><strong>Venta Promedio</strong></td>
                 <?php 
               for ($i=1; $i <13 ; $i++) { 
                  $ventapromedio=TotalPromedioVentaMes($i,$anoactual);
                  echo("<td style='font-weight:-50;font-size:14px;'> $ ".number_format($ventapromedio,0)."</td>");
                }
                 ?>
                <td><strong>-</strong></td>
              </tr>
               <tr>
                <td><strong>Ventas/Cdv</strong></td>
                 <?php 
               for ($i=1; $i <13 ; $i++) { 
                  $sep_comprames=TotalComprasMes($i,$anoactual);
                  $sep_sumacompras+=$sep_comprames;

                  $Sep_ventasmaterialespormes=TotalVentasMes($i,$anoactual);
                  $Sep_sumaventasmateriales+=$Sep_ventasmaterialespormes;
                  $Sep_ventaequipospormes=TotalVentasMesEq($i,$anoactual);
                  $Sep_sumaventasequipos+=$Sep_ventaequipospormes;
                  $Sep_consolidadoventaspormes=$Sep_ventasmaterialespormes+$Sep_ventaequipospormes;
                  $Sep_consolidadoanualventas=$Sep_sumaventasmateriales+$Sep_sumaventasequipos;

                 
                  if ($Sep_consolidadoventaspormes==0) {
                    $Ubruta=0;
                  }
                  else
                  {
                    $Ubruta=($Sep_consolidadoventaspormes/$sep_comprames)*100;
                  }

                  echo("<td class='center' style='font-weight:-50;font-size:14px;'>".round($Ubruta,1)."%</td>");
                }
                 ?>
                <td><strong>
                  <?php 
                  $Ubrutatotal=($Sep_consolidadoanualventas/$sep_sumacompras)*100;
                  echo(round($Ubrutatotal,1))
                   ?>%
                </strong></td>
              </tr>


               <tr class="warning">
                <td><strong>Ebidta</strong></td>
                 <?php 
               for ($i=1; $i <13 ; $i++) { 
                  $Oct_comprames=TotalComprasMes($i,$anoactual);
                  $Oct_sumacompras+=$Oct_comprames;
                  $Oct_ventasmaterialespormes=TotalVentasMes($i,$anoactual);
                  $Oct_sumaventasmateriales+=$Oct_ventasmaterialespormes;
                  $Oct_ventaequipospormes=TotalVentasMesEq($i,$anoactual);
                  $Oct_sumaventasequipos+=$Oct_ventaequipospormes;
                  $Oct_consolidadoventaspormes=$Oct_ventasmaterialespormes+$Oct_ventaequipospormes;
                  $Oct_consolidadoanualventas=$Oct_sumaventasmateriales+$Oct_sumaventasequipos;

                  $Oct_saldomes=$Oct_consolidadoventaspormes-$Oct_comprames;

                   echo("<td style='font-weight:-50;font-size:14px;'> $ ".number_format($Oct_saldomes,0)."</td>");
                }
                 ?>
                <td><strong>
                  <?php 
                  $Ubrutatotal=$Oct_consolidadoanualventas-$Oct_sumacompras;
                  echo("$".number_format($Ubrutatotal,0))
                   ?>
                </strong></td>
              </tr>
            </table>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


  <div class="row">
        <div class="col-md-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-danger ">
            <div class="box-header with-border">
             <h3 class="box-title">Informe Alquiler Equipos </h3>
               
            </div>
             <div class="box-header">
     
            </div>
            <!-- /.box-header -->
           
              <?php 

    $res=Clientes::CuentasxcobrarClientes($anoactual);
$campos = $res->getCampos();
foreach($campos as $campo){
  $cliente_id_cliente = $campo['id_cliente'];
  $nombre_cliente = $campo['nombre_cliente'];
 
  // VALIDAMOS SI EL CLIENTE TIENE CUENTAS X COBRAR EN FACTURAS Y EQUIPOS
  $Seg_ValidaPrestamos=VerificacionReporteprestamos($cliente_id_cliente);

  // VALIDAMOS SI EL CLIENTE TIENE CUENTAS X COBRAR EN ALQUILER DE EQUIPOS O DEJAR EN CERO(0)
  if ($Seg_ValidaPrestamos!="") {
  $Seg_xcuentasxcobraranocliEquipos=TotalCuentasxcobrarAnoEquipo($anoactual,$cliente_id_cliente);
  $Seg_xsaldoxcobraranualEquipos=$Seg_xcuentasxcobraranocliEquipos;
  }
  else
  {
    $Seg_xsaldoxcobraranualEquipos=0;
  }
  // SUMA TOTAL DE CUENTAS X COBRAR POR CADA CLIENTE
    $Seg_xsaldoxcobraranualtotal=$Seg_xsaldoxcobraranualEquipos;
      
     ?> 
     <?php 
     if ($Seg_xsaldoxcobraranualtotal!=0) {
      ?>
    <div class="box-body" id="">
      
            <!-- /.box-header -->
          
        <table id="mitabla<?php echo($idunico) ?>" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">
                 <thead>
                <tr class="primary ">
                  <th>Equipo</th>
                  <th>Cliente</th>
                  <th>Fecha de Ingreso</th>
                  <th>Saldo</th>
                </tr>
              </thead>
             
            <tbody>
              <?php 
              $res=Reportes::ReportePrestamosInforme($cliente_id_cliente);
              $campos = $res->getCampos();
              foreach ($campos as $campo){
                 $id = $campo['id'];
            $fecha_reporte = $campo['fecha_reporte'];
            $cliente_id_cliente = $campo['cliente_id_cliente'];
            $equipo_id_equipo = $campo['equipo_id_equipo'];
            $valor_prestamo = $campo['valor_prestamo'];
            $creado_por = $campo['creado_por'];
            $estado_reporte = $campo['estado_reporte'];
            $reporte_publicado = $campo['reporte_publicado'];
            $marca_temporal = $campo['marca_temporal'];
            $estado_pago = $campo['estado_pago'];
            $observaciones = $campo['observaciones'];
            $nomprod=Equipos::obtenerNombreEquipo($equipo_id_equipo);
            $nomcli=Clientes::obtenerNombreCliente($cliente_id_cliente);
            $tipo="Venta_Equipos";
            $abonos=obtenerAbonosPor($id,$tipo);
            $saldo=$valor_prestamo-$abonos;
               ?>
    
                <tr class="info">
                  
                  <td><?php echo utf8_encode($nomprod) ?></td>
                  <td><?php echo($nomcli) ?></td>
                   <td><?php echo(fechalarga($fecha_reporte)); ?></td>
                 <td><?php echo utf8_encode("$".number_format($valor_prestamo,0)); ?></td>
                </tr>
                <?php 
              }
                 ?>
               
            </tbody>
          
              <tfoot>
                 <tr class="">
                <th style="text-align: right;" colspan="3">Total Equipos <?php echo utf8_encode($nombre_cliente) ?>: </th>
                  <th ><?php echo utf8_encode("$".number_format($Seg_xsaldoxcobraranualtotal,0)); ?></th>
                </tr>
               
                </tfoot>
              </table>
     <?php 
   }
  
      ?>
   <?php 
          }
             ?>

            </div>
         
            
            <!-- ./box-body -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<?php 
  //*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
   ?>
      <div class="row">
        <div class="col-md-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informe Ingresos a cuenta actualizado al <?php 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></h3>
               
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                 
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="InformeVentas">
              <div class="clearfix">
                      <div class="pull-right tableTools-container"></div>
                    </div>
              <h3>Informe Ingresos a cuenta</h3>
              <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">
              <thead>
              <tr class="info">
                <th>Producto</th>
                <th>Ene</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Abr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Ago</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dic</th>
                <th>Totales</th>
              </tr>
            </thead>
            <tbody>
              <?php 

    $res=Productos::obtenerPaginaInformeventas();
$campos = $res->getCampos();
foreach($campos as $campo){
  $id_producto = $campo['id_producto'];
  $nombre_producto = $campo['nombre_producto'];
  $ventasanopro=TotalVentasAnoProducto($anoactual,$id_producto);
     ?> 
              <tr>
                <td><strong><?php echo($nombre_producto); ?></strong></td>
                 <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $ventamespro=TotalVentasMesProducto($i,$anoactual,$id_producto);
                  $totalpro=TotalVentasMes($i,$anoactual);

                  if ($ventamespro==0) {
                    $porcentajeventapro=0;
                  }
                  else
                  {
                    $porcentajeventapro=($ventamespro/$totalpro)*100;
                  }
                  if ($ventamespro>0) {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#dff0d8;'><small style='color:#128a2e;'><strong> ".round($porcentajeventapro,1)."% </strong></small>  $".number_format($ventamespro,0)."</td>");
                  }
                  else
                  {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#f2dede;'><small style='color:#F08080;'><strong>0%</strong></small>$".number_format(0,0)."</td>");
                  }
                  
                }
                 ?>
                 <td style="background-color: #d9edf7;"><strong>$ 
                  <?php 

                 echo(number_format($ventasanopro,0)); 
                 ?></strong></td>
              </tr>
            <?php 
          }
             ?>
             
            </tbody>
            <tfoot>
               <tr  class="info">
                <td><strong>Total Ventas <?php echo($anoactual); ?></strong></td>
                <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $ventames1=TotalVentasMes($i,$anoactual);
                  $sumaventas1+=$ventames1;
                  echo("<td><strong> $ ".number_format($ventames1,0)."</strong></td>");
                }
                 ?>
                 <td><strong>$ <?php echo(number_format($sumaventas1,0)); ?></strong></td>
              </tr>
            </tfoot>
              
            </table>
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



  <?php 
  //*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
   ?>
      <div class="row">
        <div class="col-md-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informe Cxc por Producto actualizado al <?php 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></h3>
               
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                 
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="InformeVentas">
              <div class="clearfix">
                      <div class="pull-right tableTools-container99"></div>
                    </div>
              <h3>Informe CxC por Producto</h3>
              <table id="TablacxcProducto" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">
              <thead>
              <tr class="info">
                <th>Producto</th>
                <th>Ene</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Abr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Ago</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dic</th>
                <th>Totales</th>
              </tr>
            </thead>
            <tbody>
              <?php 

    $res=Productos::obtenerPaginaInformeventascxc();
$campos = $res->getCampos();
foreach($campos as $campo){
  $id_producto = $campo['id_producto'];
  $nombre_producto = $campo['nombre_producto'];
  $cxcventasanopro=TotalVentasAnoProductocxc($anoactual,$id_producto);
     ?> 
              <tr>
                <td><strong><?php echo($nombre_producto); ?></strong></td>
                 <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $cxcventamespro=TotalVentasMesProductocxc($i,$anoactual,$id_producto);
                  $cxctotalpro=TotalVentasMescxc($i,$anoactual);

                  if ($cxcventamespro==0) {
                    $cxcporcentajeventapro=0;
                  }
                  else
                  {
                    $cxcporcentajeventapro=($cxcventamespro/$cxctotalpro)*100;
                  }
                  if ($cxcventamespro>0) {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#dff0d8;'><small style='color:#128a2e;'><strong> ".round($cxcporcentajeventapro,1)."% </strong></small>  $".number_format($cxcventamespro,0)."</td>");
                  }
                  else
                  {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#f2dede;'><small style='color:#F08080;'><strong>0%</strong></small>$".number_format(0,0)."</td>");
                  }
                  
                }
                 ?>
                 <td style="background-color: #d9edf7;"><strong>$ 
                  <?php 

                 echo(number_format($cxcventasanopro,0)); 
                 ?></strong></td>
              </tr>
            <?php 
          }
             ?>
             
            </tbody>
            <tfoot>
               <tr  class="info">
                <td><strong>Total Ventas <?php echo($anoactual); ?></strong></td>
                <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $cxcventames1=TotalVentasMescxc($i,$anoactual);
                  $cxcsumaventas1+=$cxcventames1;
                  echo("<td><strong> $ ".number_format($cxcventames1,0)."</strong></td>");
                }
                 ?>
                 <td><strong>$ <?php echo(number_format($cxcsumaventas1,0)); ?></strong></td>
              </tr>
            </tfoot>
              
            </table>
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


  <?php 
  //*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
   ?>


      <div class="row">
        <div class="col-md-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Informe Ingresos por Equipo actualizado al <?php 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></h3>
               
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                 
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="InformeVentas">
              <div class="clearfix">
                      <div class="pull-right tableTools-container98"></div>
                    </div>
              <h3>Informe Ingresos por Equipo</h3>
              <table id="TablaVentasEquipos" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">
              <thead>
              <tr class="info">
                <th>Equipo</th>
                <th>Ene</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Abr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Ago</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dic</th>
                <th>Totales</th>
              </tr>
            </thead>
            <tbody>
              <?php 

    $res=Equipos::obtenerPaginaInformeventasEq();
$campos = $res->getCampos();
foreach($campos as $campo){
  $id_equipo = $campo['id_equipo'];
  $nombre_equipo = $campo['nombre_equipo'];
  $Eqventasanopro=TotalVentasAnoProductoEq($anoactual,$id_equipo);
     ?> 
              <tr>
                <td><strong><?php echo($nombre_equipo); ?></strong></td>
                 <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $Eqventamespro=TotalVentasMesEquipo($i,$anoactual,$id_equipo);
                  $Eqtotalpro=TotalVentasEqMes($i,$anoactual);

                  if ($Eqventamespro==0) {
                    $Eqporcentajeventapro=0;
                  }
                  else
                  {
                    $Eqporcentajeventapro=($Eqventamespro/$Eqtotalpro)*100;
                  }
                  if ($Eqventamespro>0) {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#dff0d8;'><small style='color:#128a2e;'><strong> ".round($Eqporcentajeventapro,1)."% </strong></small>  $".number_format($Eqventamespro,0)."</td>");
                  }
                  else
                  {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#f2dede;'><small style='color:#F08080;'><strong>0%</strong></small>$".number_format(0,0)."</td>");
                  }
                  
                }
                 ?>
                 <td style="background-color: #d9edf7;"><strong>$ 
                  <?php 

                 echo(number_format($Eqventasanopro,0)); 
                 ?></strong></td>
              </tr>
            <?php 
          }
             ?>
             
            </tbody>
            <tfoot>
               <tr  class="info">
                <td><strong>Total Alquiler <?php echo($anoactual); ?></strong></td>
                <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $Eqventames1=TotalVentasEqMes($i,$anoactual);
                  $Eqsumaventas1+=$Eqventames1;
                  echo("<td><strong> $ ".number_format($Eqventames1,0)."</strong></td>");
                }
                 ?>
                 <td><strong>$ <?php echo(number_format($Eqsumaventas1,0)); ?></strong></td>
              </tr>
            </tfoot>
              
            </table>
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<?php 
  //*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
   ?>


      <div class="row">
        <div class="col-md-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Informe Cxc por Equipo actualizado al <?php 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></h3>
               
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                 
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="InformeVentas">
              <div class="clearfix">
                      <div class="pull-right tableTools-container97"></div>
                    </div>
              <h3>Informe Cxc por Equipo</h3>
              <table id="TablaVentasEquiposcxc" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">
              <thead>
              <tr class="info">
                <th>Equipo</th>
                <th>Ene</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Abr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Ago</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dic</th>
                <th>Totales</th>
              </tr>
            </thead>
            <tbody>
              <?php 

    $res=Equipos::obtenerPaginaInformeventascxc();
$campos = $res->getCampos();
foreach($campos as $campo){
  $id_equipo = $campo['id_equipo'];
  $nombre_equipo = $campo['nombre_equipo'];
  $Eqventasanoprocxc=TotalVentasAnoProductoEqcxc($anoactual,$id_equipo);
     ?> 
              <tr>
                <td><strong><?php echo($nombre_equipo); ?></strong></td>
                 <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $Eqventamesprocxc=TotalVentasMesEquipocxc($i,$anoactual,$id_equipo);
                  $Eqtotalprocxc=TotalVentasEqMescxc($i,$anoactual);

                  if ($Eqventamesprocxc==0) {
                    $Eqporcentajeventaprocxc=0;
                  }
                  else
                  {
                    $Eqporcentajeventaprocxc=($Eqventamesprocxc/$Eqtotalprocxc)*100;
                  }
                  if ($Eqventamesprocxc>0) {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#dff0d8;'><small style='color:#128a2e;'><strong> ".round($Eqporcentajeventaprocxc,1)."% </strong></small>  $".number_format($Eqventamesprocxc,0)."</td>");
                  }
                  else
                  {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#f2dede;'><small style='color:#F08080;'><strong>0%</strong></small>$".number_format(0,0)."</td>");
                  }
                  
                }
                 ?>
                 <td style="background-color: #d9edf7;"><strong>$ 
                  <?php 

                 echo(number_format($Eqventasanoprocxc,0)); 
                 ?></strong></td>
              </tr>
            <?php 
          }
             ?>
             
            </tbody>
            <tfoot>
               <tr  class="info">
                <td><strong>Total Cxc Alquiler <?php echo($anoactual); ?></strong></td>
                <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $Eqventames1cxc=TotalVentasEqMescxc($i,$anoactual);
                  $Eqsumaventas1cxc+=$Eqventames1cxc;
                  echo("<td><strong> $ ".number_format($Eqventames1cxc,0)."</strong></td>");
                }
                 ?>
                 <td><strong>$ <?php echo(number_format($Eqsumaventas1cxc,0)); ?></strong></td>
              </tr>
            </tfoot>
              
            </table>
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<?php 
  //*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
 ?>


       <div class="row">
        <div class="col-md-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-success ">
            <div class="box-header with-border">
             <h3 class="box-title">Cdv Actualizado al <?php 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></h3>
               
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
           <div class="box-body" id="InformeCompras">
             <div class="clearfix">
                      <div class="pull-right tableTools-container2"></div>
                    </div>
              <h3>Informe Cdv</h3>
              <table id="tableCdv1" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">
              <thead>
              <tr class="info">
                <th>Insumo</th>
                <th>Ene</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Abr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Ago</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dic</th>
                <th>Totales</th>
              </tr>
            </thead>
            <tbody>
              <?php 

    $res=Insumos::obtenerPagina();
$campos = $res->getCampos();
foreach($campos as $campo){
  $id_insumo = $campo['id_insumo'];
  $nombre_insumo = $campo['nombre_insumo'];
  if ($id_insumo<>21) {
   $comprasanopro=TotalComprasAnoInsumo($anoactual,$id_insumo);
  }
  
     ?> 
              <tr>
                <td><strong><?php echo($nombre_insumo); ?></strong></td>
                 <?php 
                for ($i=1; $i <13 ; $i++) { 
                   if ($id_insumo<>21) {
                  $comprasmespro=TotalComprasMesProducto($i,$anoactual,$id_insumo);
                      }
                  $totalpro=TotalComprasMes($i,$anoactual);

                  if ($comprasmespro==0) {
                    $porcentajeventapro=0;
                  }
                  else
                  {
                    $porcentajeventapro=($comprasmespro/$totalpro)*100;
                  }
                  if ($comprasmespro>0) {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#dff0d8;'><small style='color:#128a2e;'><strong> ".round($porcentajeventapro,1)."% </strong></small>  $".number_format($comprasmespro,0)."</td>");
                  }
                  else
                  {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#f2dede;'><small style='color:#F08080;'><strong>0%</strong></small>$".number_format(0,0)."</td>");
                  }
                  
                }
                 ?>
                 <td style="background-color: #d9edf7;"><strong>$ 
                  <?php 

                 echo(number_format($comprasanopro,0)); 
                 ?></strong></td>
              </tr>
            <?php 
          }
             ?>
             
            </tbody>
            <tfoot>
               <tr  class="info">
                <td><strong>Total Compras <?php echo($anoactual); ?></strong></td>
                <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $comprasmes1=TotalComprasMes($i,$anoactual);
                  $sumacompras1+=$comprasmes1;
                  echo("<td><strong> $ ".number_format($comprasmes1,0)."</strong></td>");
                }
                 ?>
                 <td><strong>$ <?php echo(number_format($sumacompras1,0)); ?></strong></td>
              </tr>
            </tfoot>
              
            </table>
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<?php 
  //*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
 ?>

           <div class="row">
        <div class="col-md-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-success ">
            <div class="box-header with-border">
             <h3 class="box-title">Informe Cuentas x Pagar Actualizadoxx al <?php 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></h3>
               
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
           <div class="box-body" id="InformeCompras">
             <div class="clearfix">
                      <div class="pull-right tableTools-container3"></div>
                    </div>
              <h3>Informe Cuentas x Pagar</h3>
              <table id="tableCxp" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">
              <thead>
              <tr class="info">
                <th>Insumo</th>
                <th>Ene</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Abr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Ago</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dic</th>
                <th>Totales</th>
              </tr>
            </thead>
            <tbody>
              <?php 

    $res=Insumos::ListaInsumoscuentasxpagar();
$campos = $res->getCampos();
foreach($campos as $campo){
  $id_insumo = $campo['insumo_id_insumo'];
  $nombre_insumo = $campo['nombre_insumo'];
  $comprasanopro=TotalCuentasxpagarAnoInsumo($anoactual,$id_insumo);
     ?> 
              <tr>
                <td><strong><?php echo($nombre_insumo); ?></strong></td>
                 <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $comprasmespro=TotalCuentasxpagarMesProducto($i,$anoactual,$id_insumo);
                  $totalpro=TotalCuentasxpagarMes($i,$anoactual);

                  if ($comprasmespro==0) {
                    $porcentajeventapro=0;
                  }
                  else
                  {
                    $porcentajeventapro=($comprasmespro/$totalpro)*100;
                  }
                  if ($comprasmespro>0) {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#dff0d8;'><small style='color:#128a2e;'><strong> ".round($porcentajeventapro,1)."% </strong></small>  $".number_format($comprasmespro,0)."</td>");
                  }
                  else
                  {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#f2dede;'><small style='color:#F08080;'><strong>0%</strong></small>$".number_format(0,0)."</td>");
                  }
                  
                }
                 ?>
                 <td style="background-color: #d9edf7;"><strong>$ 
                  <?php 

                 echo(number_format($comprasanopro,0)); 
                 ?></strong></td>
              </tr>
            <?php 
          }
             ?>
             
            </tbody>
            <tfoot>
               <tr  class="info">
                <td><strong>Total Cuentas x Pagar <?php echo($anoactual); ?></strong></td>
                <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $comprascremes1=TotalCuentasxpagarMes($i,$anoactual);
                  $sumacomprascre1+=$comprascremes1;
                  echo("<td><strong> $ ".number_format($comprascremes1,0)."</strong></td>");
                }
                 ?>
                 <td><strong>$ <?php echo(number_format($sumacomprascre1,0)); ?></strong></td>
              </tr>
            </tfoot>
              
            </table>
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



<?php 
  //*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
 ?>

           <div class="row">
        <div class="col-md-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-success ">
            <div class="box-header with-border">
             <h3 class="box-title">Informe Cuentas x Cobrar Actualizado al <?php 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></h3>
               
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
           <div class="box-body" id="InformeCompras">
             <div class="clearfix">
                      <div class="pull-right tableTools-container96"></div>
                    </div>
              <h3>Informe Cuentas x Cobrar</h3>
              <table id="tablacxcConsolidado" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">
              <thead>
              <tr class="info">
                <th>Cliente</th>
                <th>Ene</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Abr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Ago</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dic</th>
                <th>Totales</th>
              </tr>
            </thead>
            <tbody>
              <?php 

    $res=Clientes::CuentasxcobrarClientes($anoactual);
$campos = $res->getCampos();
foreach($campos as $campo){
  $id_cliente = $campo['id_cliente'];
  $nombre_cliente = $campo['nombre_cliente'];
  $cuentasporcobrarMt=TotalCuentasxcobrarAno($anoactual,$id_cliente);
   $cuentasporcobrarEq=TotalCuentasxcobrarAnoEquipo($anoactual,$id_cliente);
   $totaldeuda=$cuentasporcobrarMt+$cuentasporcobrarEq;
  //$comprasanopro=TotalCuentasxpagarAnoInsumo($anoactual,$id_insumo);
   if ($totaldeuda!=0) {
     ?> 
              <tr>
                <td><strong><?php echo($nombre_cliente); ?></strong></td>
                 <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $cobrarmesMt=TotalCuentasxcobrarMesProducto($i,$anoactual,$id_cliente);
                  $cobrarmesEq=TotalCuentasxcobrarMesEquipos($i,$anoactual,$id_cliente);

                  $deudaxmescliente=$cobrarmesEq+$cobrarmesMt;

                  $totalcobrarMt=TotalCuentasxcobrarMesMt($i,$anoactual);
                  $totalcobrarEq=TotalCuentasxcobrarMesEq($i,$anoactual);

                  $totalcobrarMtEq=$totalcobrarMt+$totalcobrarEq;

                  if ($deudaxmescliente==0) {
                    $porcentajecobro=0;
                  }
                  else
                  {
                    $porcentajecobro=($deudaxmescliente/$totalcobrarMtEq)*100;
                  }
                  if ($deudaxmescliente>0) {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#dff0d8;'><small style='color:#128a2e;'><strong> ".round($porcentajecobro,1)."% </strong></small>  $".number_format($deudaxmescliente,0)."</td>");
                  }
                  else
                  {
                    echo("<td style='font-weight:-50;font-size:14px;background-color:#f2dede;'><small style='color:#F08080;'><strong>0%</strong></small>$".number_format(0,0)."</td>");
                  }
                  
                }
                 ?>
                 <td style="background-color: #d9edf7;"><strong>$ 
                  <?php 

                 echo(number_format($totaldeuda,0)); 
                 ?></strong></td>
              </tr>
            <?php 
            }
          }
             ?>
             
            </tbody>
            <tfoot>
               <tr  class="info">
                <td><strong>Total Cuentas x Pagar <?php echo($anoactual); ?></strong></td>
                <?php 
                for ($i=1; $i <13 ; $i++) { 
                  $cuentascobrarmesEq=TotalCuentasxcobrarMesEq($i,$anoactual);
                  $cuentascobrarmesMt=TotalCuentasxcobrarMesMt($i,$anoactual);
                  $cuentasxcobrarmesames=$cuentascobrarmesEq+$cuentascobrarmesMt;

                  $sumacomprascredito1+=$cuentasxcobrarmesames;

                  echo("<td><strong> $ ".number_format($cuentasxcobrarmesames,0)."</strong></td>");
                }
                 ?>
                 <td><strong>$ <?php echo(number_format($sumacomprascredito1,0)); ?></strong></td>
              </tr>
            </tfoot>
              
            </table>
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<?php 
  //*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
 ?>

   <div class="row">
        <div class="col-md-12">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-success ">
            <div class="box-header with-border">
             <h3 class="box-title">Informe Detallado Cuentas x Cobrar </h3>
               
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
           
              <?php 

    $res=Clientes::CuentasxcobrarClientes($anoactual);
$campos = $res->getCampos();
foreach($campos as $campo){
  $cliente_id_cliente = $campo['id_cliente'];
  $nombre_cliente = $campo['nombre_cliente'];
  $idbase = $campo['id_cliente'];
  $idunico=$idbase+10;
  // VALIDAMOS SI EL CLIENTE TIENE CUENTAS X COBRAR EN FACTURAS Y EQUIPOS

  $ValidaFacturas=VerificacionReportefacturas($cliente_id_cliente);
  $ValidaPrestamos=VerificacionReporteprestamos($cliente_id_cliente);

  // VALIDAMOS SI EL CLIENTE TIENE CUENTAS X COBRAR EN FACTURAS O DEJAR EN CERO(0)
  if ($ValidaFacturas!="") {
  $xsaldoxcobraranual=TotalCuentasxcobrarAno($anoactual,$cliente_id_cliente);
  }
  else
  {
    $xsaldoxcobraranual=0;
  }
  // VALIDAMOS SI EL CLIENTE TIENE CUENTAS X COBRAR EN ALQUILER DE EQUIPOS O DEJAR EN CERO(0)
  if ($ValidaPrestamos!="") {
   $xcuentasxcobraranocliEquipos=TotalCuentasxcobrarAnoEquipo($anoactual,$cliente_id_cliente);
  $xsaldoxcobraranualEquipos=$xcuentasxcobraranocliEquipos;
  }
  else
  {
    $xsaldoxcobraranualEquipos=0;
  }
  // SUMA TOTAL DE CUENTAS X COBRAR POR CADA CLIENTE
    $xsaldoxcobraranualtotal=$xsaldoxcobraranual+$xsaldoxcobraranualEquipos;
      
     ?> 
     <?php 
     if ($xsaldoxcobraranualtotal!=0) {
      ?>
    <div class="box-body" id="">
       <div class="box-header">
      <h3 class="box-title"><strong>Cuentas x cobrar - <?php echo utf8_encode($nombre_cliente); ?><br><small> Informe  actualizado al <?php echo($TiempoActual);?></small></strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="clearfix">
                      <div class="pull-right tableTools-container<?php echo($idunico) ?>"></div>
                    </div>
                   
        <table id="mitabla<?php echo($idunico) ?>" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">
                 <thead>
                <tr class="success ">
                  <th>ID</th>
                  <th>Fecha</th>
                  <th>Observaciones</th>
                  <th>Concepto</th>
                  <th>Saldo</th>
                </tr>
              </thead>
             
            <tbody>
           

     <?php 
     // INICIO DE LISTA DE FACTURAS PENDIENTE reportes_facturas
$res=Clientes::CuentasxcobrarPorClientes($anoactual,$cliente_id_cliente);
$campos = $res->getCampos();
foreach($campos as $campo){
 
  $id = $campo['id'];
  $Mtcliente_id_cliente = $campo['cliente_id_cliente'];
  $fecha_reporte = $campo['fecha_reporte'];
  $producto_id_producto = $campo['producto_id_producto'];
  $cantidad = $campo['cantidad'];
  $nomprod=Productos::obtenerNombreProducto($producto_id_producto);
  $observaciones = $campo['observaciones'];
  $nomcli=Clientes::obtenerNombreCliente($cliente_id_cliente);
   $valor_m3 = $campo['valor_m3'];
   $valor_total = $cantidad*$valor_m3;
  
  
  ?>

                <tr>
                  <td><?php echo($id); ?></td>
                  <td><?php echo($fecha_reporte) ?></td>
                  <td>Compra de materiales <?php echo utf8_encode($observaciones) ?></td>
                   <td>Compra Material: <?php echo($cantidad." m3 ".$nomprod);?></td>
                 <td><?php echo utf8_encode("$".number_format($valor_total,0)); ?>
                   
                 </td>
                </tr>

  <?php
}
      ?>
      <?php 
       $res=Clientes::CuentasxcobrarPorClientesEquipos($anoactual,$cliente_id_cliente);
$campos = $res->getCampos();
foreach($campos as $campo){
  $valor_prestamo = $campo['valor_prestamo'];
  $Eqid = $campo['id'];
  $Eqcliente_id_cliente = $campo['cliente_id_cliente'];
  $Eqfecha_reporte = $campo['fecha_reporte'];
  $Eqobservaciones = $campo['observaciones'];
   $Eqequipo_id_equipo = $campo['equipo_id_equipo'];
   $nomEquipo = Equipos::obtenerNombreEquipo($Eqequipo_id_equipo); 
  $Eqnomcli=Clientes::obtenerNombreCliente($cliente_id_cliente);
  $Eqsaldo=$valor_prestamo;


  ?>

                <tr class="warning">
                  <td><?php echo($Eqid); ?></td>
                  <td><?php echo($Eqfecha_reporte) ?></td>
                  <td><?php echo utf8_encode($Eqobservaciones) ?></td>
                   <td>Alquiler Equipo <?php echo($nomEquipo); ?></td>
                 <td><?php echo utf8_encode("$".number_format($Eqsaldo,0)); ?></td>
                </tr>
               
            </tbody>
           
            <!-- /.box-body -->

  <?php
}
      ?>
      
              <tfoot>
                <?php 
                if ($xsaldoxcobraranual!=0) {
                 ?>
                <tr class="info">
                  <th style="text-align: right;" colspan="4">Total para cuentas por cobrar (Materiales): </th>
                  <th >
                    <?php echo utf8_encode("$".number_format($xsaldoxcobraranual,0)); ?></th>
                </tr>
                <?php 
              }
                 ?>
                  <?php 
                if ($xsaldoxcobraranualEquipos!=0) {
                 ?>
                 <tr class="warning">
                  <th style="text-align: right;" colspan="4">Total para cuentas por cobrar (Alquiler): </th>
                  <th ><?php echo utf8_encode("$".number_format($xsaldoxcobraranualEquipos,0)); ?></th>
                </tr>
                <?php 
              }
                 ?>
                  <?php 
                if ($xsaldoxcobraranualtotal!=0) {
                 ?>
                 <tr class="">
                  <th style="text-align: right;" colspan="4">Total consolidado <?php echo utf8_encode($nombre_cliente." - ".$anoactual) ?>: </th>
                  <th ><?php echo utf8_encode("$".number_format($xsaldoxcobraranualtotal,0)); ?></th>
                </tr>
                <?php 
              }
                 ?>
                </tfoot>
              </table>
     <?php 
   }
      ?>
      <?php 
          }
             ?>
            </div>
            
            <!-- ./box-body -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


  
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
}
  </script>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Ventas vs CdV"
  },
  axisX:{
    valueFormatString: "MMM, YYYY",
    crosshair: {
      enabled: true,
      snapToDataPoint: true
    }
  },
  axisY: {
    //title: "Ventas Vs Compras",
    crosshair: {
      enabled: true
    }
  },
  toolTip:{
    shared:true
  },  
  legend:{
    cursor:"pointer",
    verticalAlign: "bottom",
    horizontalAlign: "left",
    dockInsidePlotArea: true,
    itemclick: toogleDataSeries
  },
  data: [{
    type: "line",
    showInLegend: true,
    name: "Ventas",
    markerType: "square",
    xValueFormatString: "MMM, YYYY",
    color: "#51cda0",
    dataPoints: [

    <?php 
      for ($i=0; $i <12 ; $i++) { 
                  $mesmas=$i+1;
                  $Gra_ventasmaterialespormes=TotalVentasMes($mesmas,$anoactual);
                  $Gra_sumaventasmateriales+=$Gra_ventasmaterialespormes;
                  $Gra_ventaequipospormes=TotalVentasMesEq($mesmas,$anoactual);
                  $Gra_sumaventasequipos+=$Gra_ventaequipospormes;
                  $Gra_consolidadoventaspormes=$Gra_ventasmaterialespormes+$Gra_ventaequipospormes;
                  $Gra_consolidadoanualventas=$Gra_sumaventasmateriales+$Gra_sumaventasequipos;
                  if ($Gra_consolidadoventaspormes!=0) {

                  ?>
                   { x: new Date(<?php echo($anoactual) ?>, <?php echo($i) ?>,<?php echo($i+1); ?> ), y: <?php echo(round($Gra_consolidadoventaspormes,0)) ?> },
                  <?php
                  }
                }

     ?> 
    ]
  },
  {
    type: "line",
    showInLegend: true,
    name: "Cdv",
    lineDashType: "dash",
    color: "#F08080",
    dataPoints: [
    <?php 
      for ($i=0; $i <12 ; $i++) { 
        $mesmas=$i+1;
                  $comprasmes=TotalComprasMes($mesmas,$anoactual);
                  if ($comprasmes!=0) {
                  ?>
                   { x: new Date(<?php echo($anoactual) ?>, <?php echo($i) ?>,<?php echo($i+1); ?> ), y: <?php echo(round($comprasmes,0)) ?> },
                  <?php
                    }
                }

     ?>  
    ]
  }]
});
chart.render();

function toogleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  } else{
    e.dataSeries.visible = true;
  }
  chart.render();
}

}
</script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
          <script src="dist/js/buttons.colVis.min.js"></script>
          <script src="dist/js/buttons.print.min.js"></script>
           <script src="dist/js/dataTables.select.min.js"></script>
           <script src="dist/js/buttons.flash.min.js"></script>


<!-- page script -->
<script>
   function format2(n, currency) {
    return currency + " " + n.toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
function formatmoneda(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
        $(document).ready(function() {
    $('#example').DataTable( {
         "searching": false,
        "ordering": false,
        "paging":   false,
        "info":     true,
        "aLengthMenu": [[100, 200, 300, -1], [100, 200, 300, "Todas"]],
    "pageLength": 100,
       
       
    } );
} );
    </script>
<script type="text/javascript">
      jQuery(function($) {
      
$('#tablacxcConsolidado thead tr:eq(1) th').each( function () {
        var title = $('#tablacxcConsolidado thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } ); 


  
    var table = $('#tablacxcConsolidado').DataTable({
      responsive:true,
     "ordering": true,
      "searching": false,
       "paging":   false,
        "info":     false,
        "order": [[ 13, "desc" ]],
        orderCellsTop: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se ha encontrado nada - Lo sentimos",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
           },
      
    "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

          select: {
            style: 'multi'
          },
          
    });
  
    // Apply the search
    table.columns().every(function (index) {
        $('#tablacxcConsolidado thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#tablacxcConsolidado')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,

          
          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,
                
          } );

        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
         buttons: [
           
           
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {

            "extend": "excelHtml5",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"

            },
            {

            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
                     pageSize: 'LEGAL',
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'Está impresión se produjo desde la App'
            }     
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container96') );

      
      })
    </script>
<script type="text/javascript">
      jQuery(function($) {
      
$('#cotizaciones thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } ); 


  
    var table = $('#cotizaciones').DataTable({
      responsive:true,
     "ordering": true,
      "searching": false,
       "paging":   false,
        "info":     false,
        "order": [[ 13, "desc" ]],
        orderCellsTop: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se ha encontrado nada - Lo sentimos",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
           },
      
    "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

          select: {
            style: 'multi'
          },
          
    });
  
    // Apply the search
    table.columns().every(function (index) {
        $('#cotizaciones thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#cotizaciones')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,

          
          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,
                
          } );

        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
         buttons: [
           
           
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {

            "extend": "excelHtml5",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"

            },
            {

            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
                     pageSize: 'LEGAL',
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'Está impresión se produjo desde la App'
            }     
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container') );

      
      })
    </script>
    <script type="text/javascript">
      jQuery(function($) {
      
$('#tableCdv1 thead tr:eq(1) th').each( function () {
        var title = $('#tableCdv1 thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } ); 


  
    var table = $('#tableCdv1').DataTable({
      responsive:true,
     "ordering": true,
      "searching": false,
       "paging":   false,
        "info":     false,
        "order": [[ 13, "desc" ]],
        orderCellsTop: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se ha encontrado nada - Lo sentimos",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
           },
      
    "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

          select: {
            style: 'multi'
          },
          
    });
  
    // Apply the search
    table.columns().every(function (index) {
        $('#tableCdv1 thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#tableCdv1')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,

          
          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,
                
          } );

        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
         buttons: [
           
           
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {

            "extend": "excelHtml5",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"

            },
            {

            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
                     pageSize: 'LEGAL',
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'Está impresión se produjo desde la App'
            }     
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container2') );

      
      })
    </script>
     <script type="text/javascript">
      jQuery(function($) {
      
$('#tableCxp thead tr:eq(1) th').each( function () {
        var title = $('#tableCxp thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } ); 


  
    var table = $('#tableCxp').DataTable({
      responsive:true,
     "ordering": true,
      "searching": false,
       "paging":   false,
        "info":     false,
        "order": [[ 13, "desc" ]],
        orderCellsTop: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se ha encontrado nada - Lo sentimos",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
           },
      
    "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

          select: {
            style: 'multi'
          },
          
    });
  
    // Apply the search
    table.columns().every(function (index) {
        $('#tableCxp thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#tableCxp')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,

          
          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,
                
          } );

        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
         buttons: [
           
           
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {

            "extend": "excelHtml5",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"

            },
            {

            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
                     pageSize: 'LEGAL',
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'Está impresión se produjo desde la App'
            }     
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container3') );

      
      })
    </script>
<?php 
  
   $res=Clientes::CuentasxcobrarClientes($anoactual);
$campos = $res->getCampos();
foreach($campos as $campo){
 $idbase = $campo['id_cliente'];
  $idunico=$idbase+10;
  
 ?>

     <script type="text/javascript">
      jQuery(function($) {
      
$('#mitabla<?php echo($idunico); ?> thead tr:eq(1) th').each( function () {
        var title = $('#mitabla<?php echo($idunico); ?> thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } ); 


  
    var table = $('#mitabla<?php echo($idunico); ?>').DataTable({
      responsive:true,
     "ordering": true,
      "searching": false,
       "paging":   false,
        "info":     false,
        "order": [[ 1, "desc" ]],
        orderCellsTop: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se ha encontrado nada - Lo sentimos",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
           },
      
    "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

          select: {
            style: 'multi'
          },
          
    });
  
    // Apply the search
    table.columns().every(function (index) {
        $('#mitabla<?php echo($idunico); ?> thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#mitabla<?php echo($idunico); ?>')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,

          
          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,
                
          } );

        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
         buttons: [
           
           
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {

            "extend": "excelHtml5",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"

            },
            {

            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
                     pageSize: 'LEGAL',
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'Está impresión se produjo desde la App'
            }     
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container<?php echo($idunico); ?>') );

      
      })
    </script>
    
    <?php 
  }
     ?>


   <script type="text/javascript">
      jQuery(function($) {
      
$('#TablacxcProducto thead tr:eq(1) th').each( function () {
        var title = $('#TablacxcProducto thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } ); 


  
    var table = $('#TablacxcProducto').DataTable({
      responsive:true,
     "ordering": true,
      "searching": false,
       "paging":   false,
        "info":     false,
        "order": [[ 13, "desc" ]],
        orderCellsTop: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se ha encontrado nada - Lo sentimos",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
           },
      
    "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

          select: {
            style: 'multi'
          },
          
    });
  
    // Apply the search
    table.columns().every(function (index) {
        $('#TablacxcProducto thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#TablacxcProducto')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,

          
          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,
                
          } );

        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
         buttons: [
           
           
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {

            "extend": "excelHtml5",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"

            },
            {

            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
                     pageSize: 'LEGAL',
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'Está impresión se produjo desde la App'
            }     
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container99') );

      
      })
    </script>
   <script type="text/javascript">
      jQuery(function($) {
      
$('#TablaVentasEquipos thead tr:eq(1) th').each( function () {
        var title = $('#TablaVentasEquipos thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } ); 


  
    var table = $('#TablaVentasEquipos').DataTable({
      responsive:true,
     "ordering": true,
      "searching": false,
       "paging":   false,
        "info":     false,
        "order": [[ 13, "desc" ]],
        orderCellsTop: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se ha encontrado nada - Lo sentimos",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
           },
      
    "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

          select: {
            style: 'multi'
          },
          
    });
  
    // Apply the search
    table.columns().every(function (index) {
        $('#TablaVentasEquipos thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#TablaVentasEquipos')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,

          
          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,
                
          } );

        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
         buttons: [
           
           
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {

            "extend": "excelHtml5",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"

            },
            {

            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
                     pageSize: 'LEGAL',
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'Está impresión se produjo desde la App'
            }     
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container98') );

      
      })
    </script>

   <script type="text/javascript">
      jQuery(function($) {
      
$('#TablaVentasEquiposcxc thead tr:eq(1) th').each( function () {
        var title = $('#TablaVentasEquiposcxc thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } ); 


  
    var table = $('#TablaVentasEquiposcxc').DataTable({
      responsive:true,
     "ordering": true,
      "searching": false,
       "paging":   false,
        "info":     false,
        "order": [[ 13, "desc" ]],
        orderCellsTop: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se ha encontrado nada - Lo sentimos",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
           },
      
    "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

          select: {
            style: 'multi'
          },
          
    });
  
    // Apply the search
    table.columns().every(function (index) {
        $('#TablaVentasEquiposcxc thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#TablaVentasEquiposcxc')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,

          
          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,
                
          } );

        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
         buttons: [
           
           
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {

            "extend": "excelHtml5",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"

            },
            {

            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
                     pageSize: 'LEGAL',
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'Está impresión se produjo desde la App'
            }     
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container97') );

      
      })
    </script>
    