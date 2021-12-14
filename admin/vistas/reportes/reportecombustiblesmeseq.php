<?php
ini_set('display_errors', '0');
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';
include_once 'modelos/productos.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/usuarios.php';
include_once 'controladores/productosController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';
include_once 'modelos/reportes.php';
include_once 'controladores/reportesController.php';
include_once 'modelos/funcionarios.php';
include_once 'controladores/funcionariosController.php';
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/estaciones.php';
include_once 'controladores/estacionesController.php';
include 'vistas/index/estadisticas_acpm.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];

//id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones.

if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}


date_default_timezone_set("America/Bogota");
$MarcaTemporal = date('Y-m-d');
$FechaInicioDia=($MarcaTemporal." 00:00:000");
$FechaFinalDia=($MarcaTemporal." 23:59:000");
//echo("FECHA QUE LLEGA:".$fechaform."<br>");

if ($fechaform!="") {
      $arreglo=explode("-", $fechaform);
      $FechaIn=$arreglo[0];
      $FechaFn=$arreglo[1];
      $vectorfechaIn=explode("/", $FechaIn);
      $vectorfechaFn=explode("/", $FechaFn);
      $arreglofechauno=$vectorfechaIn[2]."-".$vectorfechaIn[0]."-".$vectorfechaIn[1];
      $arreglofechados=$vectorfechaFn[2]."-".$vectorfechaFn[0]."-".$vectorfechaFn[1];

      $FechaUno=str_replace(" ", "", $arreglofechauno);
      $FechaDos=str_replace(" ", "", $arreglofechados);
}

// Validación de la fecha en que inicia el Día

if ($FechaUno=="") {
  $FechaStart=$FechaInicioDia;
  $datofechain=$MarcaTemporal;
          }
else
  {
    $FechaStart=($FechaUno." 00:00:000");
    $datofechain=$FechaUno;
  }
// Validación de la fecha en que Termina el Día
if ($FechaDos=="") {
    $FechaEnd=$FechaFinalDia;
    $datofechafinal=$MarcaTemporal;
  }
else
  {
    $FechaEnd=($FechaDos." 23:59:000");
    $limpiarvariable=str_replace(" ", "", $FechaDos);
    $datofechafinal=$limpiarvariable;
  }

?>

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Content Wrapper. Contains page content -->



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Informe Combustible</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <!--<li class="breadcrumb-item active"><a href="?controller=equipos&&action=todos">Equipos</a></li>-->
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				
					
						<!-- ESTE DIV LO USO PARA CENTRAR EL FORMULARIO -->
						<!-- left column -->
					
					 <div class="col-md-6">

					 
					  	 <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success ">
            <div class="box-header with-border">
              <h3 class="box-title">Distribución Combustible <?php echo(fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></h3>

        

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	            <div class="row">
      <?php 
      if ($RolSesion!=4) {
       ?>
        <form action="?controller=reportes&&action=mescombustibleseq" method="post" id="FormFechas" autocomplete="off">
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

        <?php 
      }
         ?>
        <script type="text/javascript">
  $('input[name="daterange"]').daterangepicker({
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
    //"startDate": "03/24/2019",
    //"endDate": "03/30/2019",
    "opens": "left"
}, function(start, end, label) {
  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});
</script>
      </div>
       <div class="col-sm-12">
        <br>
        </div><!-- /.col -->
                 <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                    </div>
      <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
            <tfoot style="display: table-header-group;">
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
             
            <th>Equipo</th>
            <th>Consumo</th>
            <th>Valor</th>
            <th>Promedio</th>
             <th>Frec.</th>
             <th>%</th>
            </tr>
            <tr >
            <th>Equipo</th>
            <th>Consumo</th>
            <th>Valor</th>
            <th>Promedio</th>
             <th>Frec.</th>
              <th>%</th>
            </tr>
          </thead>
       <tbody>
            <?php
            if ($fechaform!="") {
              $res=Reportes::ReporteCombustiblesporfechameseq($FechaStart,$FechaEnd);
              $campos = $res->getCampos();

              $totalconsumofecha=Acpmmes($FechaStart,$FechaEnd);
              $fechaconsulta=$fechaform;
            }
            foreach ($campos as $campo){
           
            $equipo_id_equipo = $campo['equipo_id_equipo'];
            $totalconsumo = $campo['totalconsumo'];
            $promediotan = $campo['promediotan'];
            $totalrecar = $campo['totalrecar'];
            $totalvalor = $campo['totalvalor'];
            $nomequipo=Equipos::obtenerNombreEquipo($equipo_id_equipo);
            $porcentajeconsumo=($totalconsumo/$totalconsumofecha)*100;


            ?>
            <tr>
              <td><a href="?controller=reportes&&action=infovolqueta&daterange=<?php echo($fechaconsulta); ?>&idvolqueta=<?php echo($equipo_id_equipo) ?>"><?php echo ($nomequipo) ?></a></td>
               <td><?php echo (round($totalconsumo,2)) ?></td>
               <td><?php echo ("$".number_format($totalvalor,0)) ?></td>
              <td><?php echo (round($promediotan,2)) ?> Gl</td>
               <td><?php echo ($totalrecar) ?></td>
               <td><i class="fa fa-pie-chart"> <?php echo (round($porcentajeconsumo,1)) ?>% </i></td>
             
            </tr>
            <?php
              }
            ?>
          </tbody>
          </table>
        </div> <!-- Fin Row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
					 </div>
 <div class="col-md-6">
           <div class="callout callout-warning">
            <?php 

             ?>
                <h4>Suministro Total Estaciones <?php $totalconsumoestaciones=AcpmmesEstaciones($FechaStart,$FechaEnd); echo(round($totalconsumoestaciones,2)) ?> Galones <i class="fa fa-train"></i></h4>
                <p>Desde <?php echo(fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></p>
              </div>
          <!-- /.box -->
        </div>
<div class="col-md-6">
          <div class="box box-warning collapsed-box">
            <div class="box-header with-border">
             <h3 class="box-title">Detalle por Estaciones <?php echo(fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
                   <div class="clearfix">
                      <div class="pull-left tableTools-container2"></div>
                    </div>
                    
      <div class="table-responsive mailbox-messages">
          <table id="cotizaciones2" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
            <tfoot style="display: table-header-group;">
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                
                                
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
            <th>Id</th>
            <th>Estación</th>
            <th>Gl.</th>
             <th>Valor</th>
             <th>%</th>
            </tr>
            <tr >
            <th>Id</th>
            <th>Estación</th>
            <th>Gl.</th>
             <th>Valor</th>
             <th>%</th>
            </tr>
          </thead>
       <tbody>

  <?php
           $res=Reportes::ReporteEstacionesporfechameseq($FechaStart,$FechaEnd);
           $campos = $res->getCampos();
           foreach ($campos as $campo){
            $punto_despacho = $campo['punto_despacho'];
            $totalestacion = $campo['totalestacion'];
            $totalestacionvalor = $campo['totalestacionvalor'];
            $nombreestacion=Estaciones::ObtenerNombreEstacion($punto_despacho);
            $porcentajeestacion=($totalestacion/$totalconsumoestaciones)*100;

  ?>
                <tr>
                  <td><?php echo($punto_despacho); ?></td>
                  <td><?php echo($nombreestacion); ?></td>
                  <td><?php echo(round($totalestacion,2)); ?></td>
                  <td><?php echo("$ ".number_format($totalestacionvalor,0)); ?></td>
                 
                  <td><span class="badge bg-green"><?php echo(round($porcentajeestacion,1)); ?>%</span></td>
                </tr>

               <?php 
             }
                ?>
              </tbody></table>
            </div>
            </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->

         
        </div>

        <div class="col-md-6">
           <div class="callout callout-warning">
                <h4>Ingresos Carro Cisterna <?php $totalingresocarro=AcpmmesIngresoCarro($FechaStart,$FechaEnd); echo(round($totalingresocarro,2)) ?> <i class="fa fa-toggle-down"> </i> </h4>
                <p><?php echo(fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></p>
              </div>
          <!-- /.box -->
        </div>

        <div class="col-md-6">
          <div class="box box-warning collapsed-box">
            <div class="box-header with-border">
             <h3 class="box-title">Detalle Ingresos Carro Cisterna  <?php echo(fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
                   <div class="clearfix">
                      <div class="pull-left tableTools-container3"></div>
                    </div>
                    
      <div class="table-responsive mailbox-messages">
          <table id="cotizaciones3" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
            <tfoot style="display: table-header-group;">
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                
                                
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
            <th>Fecha</th>
            <th>Estación</th>
            <th>Gl.</th>
             <th>Valor</th>
             <th>Soporte</th>
            </tr>
            <tr >
            <th>Fecha</th>
            <th>Estación</th>
            <th>Gl.</th>
             <th>Valor</th>
             <th>Soporte</th>
            </tr>
          </thead>
       <tbody>

  <?php
           $res=Reportes::ReporteIngresosCarroTanque($FechaStart,$FechaEnd);
           $campos = $res->getCampos();
           foreach ($campos as $campo){
             $id = $campo['id'];
            $fecha_reporte = $campo['fecha_reporte'];
            $imagen = $campo['imagen'];
            $valor_m3 = $campo['valor_m3'];
            $cantidad = $campo['cantidad'];
            $punto_despacho = $campo['punto_despacho'];
            $equipo_id_equipo = $campo['equipo_id_equipo'];
            $nomestacion=Estaciones::ObtenerNombreEstacion($punto_despacho);
            $nomequipo=Equipos::obtenerNombreEquipo($equipo_id_equipo);
            $nombrerecibe=Usuarios::obtenerNombreUsuario($recibido_por);
            $nombredespachador=Funcionarios::obtenerNombreFuncionario($despachado_por);
            $ventatotal=$cantidad*$valor_m3;
      

  ?>
                <tr>
                  <td><?php echo($fecha_reporte); ?></td>
                  <td><?php echo($nomestacion); ?></td>
                  <td><?php echo(round($cantidad,2)); ?></td>
                  <td><?php echo("$ ".number_format($ventatotal,0)); ?></td>
                  <td> <a target="_blank" href="<?php echo($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "></i>
              </a>
               <a download="Soporte" href="<?php echo($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "></i>
                </a>
            </td>
                </tr>

               <?php 
             }
                ?>
              </tbody></table>
            </div>
            </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->

         
        </div>
                <div class="col-md-6">
           <div class="callout callout-warning">
                <h4>Egresos Carro Cisterna <?php $totalegresocarro=AcpmmesEgresoCarro($FechaStart,$FechaEnd); echo(round($totalegresocarro,2)) ?> <i class="fa fa-toggle-up"> </i> </h4>
                <p><?php echo(fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></p>
              </div>
          <!-- /.box -->
        </div>

        <div class="col-md-6">
          <div class="box box-warning collapsed-box">
            <div class="box-header with-border">
             <h3 class="box-title">Detalle Egresos Carro Cisterna  <?php echo(fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
                   <div class="clearfix">
                      <div class="pull-left tableTools-container4"></div>
                    </div>
                    
      <div class="table-responsive mailbox-messages">
          <table id="cotizaciones4" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
            <tfoot style="display: table-header-group;">
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                
                                
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
            <th>Fecha</th>
            <th>Equipo</th>
            <th>Gl.</th>
             <th>Valor</th>
             <th>Soporte</th>
            </tr>
            <tr >
            <th>Fecha</th>
            <th>Equipo</th>
            <th>Gl.</th>
             <th>Valor</th>
             <th>Soporte</th>
            </tr>
          </thead>
       <tbody>

  <?php
           $res=Reportes::ReporteEgresosCarroTanque($FechaStart,$FechaEnd);
           $campos = $res->getCampos();
           foreach ($campos as $campo){
             $id = $campo['id'];
            $fecha_reporte = $campo['fecha_reporte'];
            $imagen = $campo['imagen'];
            $valor_m3 = $campo['valor_m3'];
            $cantidad = $campo['cantidad'];
            $indicador = $campo['indicador'];
            $creado_por = $campo['creado_por'];
            $estado_reporte = $campo['estado_reporte'];
            $reporte_publicado = $campo['reporte_publicado'];
            $tipo_despacho = $campo['tipo_despacho'];
            $punto_despacho = $campo['punto_despacho'];
            $marca_temporal = $campo['marca_temporal'];
            $observaciones = $campo['observaciones'];
            $equipo_id_equipo = $campo['equipo_id_equipo'];
            $despachado_por = $campo['despachado_por'];
            $recibido_por = $campo['recibido_por'];
            $nomestacion=Estaciones::ObtenerNombreEstacion($punto_despacho);
            $nomequipo=Equipos::obtenerNombreEquipo($equipo_id_equipo);
            $nombrerecibe=Usuarios::obtenerNombreUsuario($recibido_por);
            $nombredespachador=Funcionarios::obtenerNombreFuncionario($despachado_por);
            $ventatotal=$cantidad*$valor_m3;
      

  ?>
                <tr>
                  <td><?php echo($fecha_reporte); ?></td>
                  <td><?php echo($nomequipo); ?></td>
                  <td><?php echo(round($cantidad,2)); ?></td>
                  <td><?php echo("$ ".number_format($ventatotal,0)); ?></td>
                  <td><a target="_blank" href="<?php echo($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "></i>
              </a>
               <a download="Soporte" href="<?php echo($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "></i>
                </a></td>
                </tr>

               <?php 
             }
                ?>
              </tbody></table>
            </div>
            </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->

         
        </div>


					</div> <!-- FIN DE ROW-->
				</div><!-- FIN DE CONTAINER FORMULARIO-->
			</div> <!-- Fin Row -->
		</div> <!-- Fin Container -->
	</div> <!-- Fin Content -->


</div> <!-- Fin Content-Wrapper -->
<script>
function eliminar(id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=reportes&&action=eliminarcombustible&&id="+id;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>
<!-- Inicio Libreria formato moneda -->


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
  $(function () {
    $('#cotizaciones33').DataTable({
      "paging": true,
      "lengthChange": true,
      "lengthMenu": [[25, 50, 150, -1], [25, 50, 150, "All"]],
      "searching": true,
      "order": [[ 0, "asc" ]],
      "ordering": true,
      "info": true,
      "autoWidth": false,
    language: {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}

    });
  });
</script>
<script>
   function format2(n, currency) {
    return currency + " " + n.toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
function formatmoneda(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
        $(document).ready(function() {
    $('#example').DataTable( {
         "searching": true,
        "ordering": true,
        "paging":   true,
        "info":     true,
        "aLengthMenu": [[100, 200, 300, -1], [100, 200, 300, "Todas"]],
    "pageLength": 100,
       
       
    } );
} );
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
           "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

 
            // Total over all pages
           
             pageTotal1 = api
                .column( 1, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
             pageTotal2 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
             // Update footer
              $( api.column( 1 ).footer() ).html(
                ''+formatmoneda(pageTotal1,'GL' )
            );  
                // Update footer
              $( api.column( 2 ).footer() ).html(
                '$'+formatmoneda(pageTotal2,'' )
            );  
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
          
          //"bProcessing": true,
              //"bServerSide": true,
              //"sAjaxSource": "http://127.0.0.1/table.php" ,
      
          //,
          
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
          //"iDisplayLength": 50

      
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
      
$('#cotizaciones2 thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones2 thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } ); 
  
    var table = $('#cotizaciones2').DataTable({
      responsive:true,
      "ordering": true,
        "order": [[ 2, "desc" ]],
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
           "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
           
             pageTotal2 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal3 = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
             // Update footer
              $( api.column( 2 ).footer() ).html(
                ''+formatmoneda(pageTotal2,'GL' )
            );  
              // Update footer
              $( api.column( 3 ).footer() ).html(
                '$ '+formatmoneda(pageTotal3,'' )
            );  
        },

    });
  
    // Apply the search
    table.columns().every(function (index) {
        $('#cotizaciones2 thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#cotizaciones2')
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
      
$('#cotizaciones3 thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones3 thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } ); 
  
    var table = $('#cotizaciones3').DataTable({
      responsive:true,
      "ordering": true,
        "order": [[ 2, "desc" ]],
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
           "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
           
             pageTotal2 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal3 = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
             // Update footer
              $( api.column( 2 ).footer() ).html(
                ''+formatmoneda(pageTotal2,'GL' )
            );  
              // Update footer
              $( api.column( 3 ).footer() ).html(
                '$ '+formatmoneda(pageTotal3,'' )
            );  
        },

    });
  
    // Apply the search
    table.columns().every(function (index) {
        $('#cotizaciones3 thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#cotizaciones3')
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

    <script type="text/javascript">
      jQuery(function($) {
      
$('#cotizaciones4 thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones4 thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } ); 
  
    var table = $('#cotizaciones4').DataTable({
      responsive:true,
      "ordering": true,
        "order": [[ 2, "desc" ]],
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
           "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
           
             pageTotal2 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal3 = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
             // Update footer
              $( api.column( 2 ).footer() ).html(
                ''+formatmoneda(pageTotal2,'GL' )
            );  
              // Update footer
              $( api.column( 3 ).footer() ).html(
                '$ '+formatmoneda(pageTotal3,'' )
            );  
        },

    });
  
    // Apply the search
    table.columns().every(function (index) {
        $('#cotizaciones4 thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#cotizaciones4')
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
        myTable.buttons().container().appendTo( $('.tableTools-container4') );  
      
      })
    </script>
