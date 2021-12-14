<?php
ini_set('display_errors', '0');
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';
include 'vistas/index/estadisticas.php';
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
          <h1 class="m-0 text-dark">Reporte Alquiler Equipo</h1>
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
						<div class="col-md-3">
						  <?php
          
            	require_once 'formreporteprestamo.php';
            
            ?>
					  </div>

					 
					

					 <div class="col-md-9">

					 	<div style="display: none;" class="row">
					 		<div id="chartContainer" style="height: 400px; width: 100%;"></div>
					 	</div>
					 	<br>
					  	 <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Alquiler Equipos </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	            <div class="row">
        <form action="?controller=reportes&&action=prestamosporfecha" method="post" id="FormFechas" autocomplete="off">
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
        <?php 
        if ($fechaform!="") {
          ?>
           <h3 class="m-0 text-dark">Reporte Alquiler del <?php echo(fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></h3>
          <?php
        }
        else
        {
          ?>
           <h3 class="m-0 text-dark">Reporte Total Alquiler </h3>
          <?php
        }


         ?>
         
        </div><!-- /.col -->
              <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">
          	<tfoot style="display: table-header-group;">
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                   <th style="background-color: #fcf8e3" class="success"></th>
                            </tfoot>
          <thead>
              <tr style="background-color: #4f5962;color: white;">
              <th style="width: 10%;"><i class="fa fa-edit"></i></th>
              <th>Fecha</th>
              <th>Vr. Alquiler</th>
               <th>Abonos</th>
              <th>Cliente</th>
              <th>Equipo</th>
              <th>Observaciones</th>
              <th>Tipo Venta</th>
            </tr>
            <tr>
              <th style="width: 10%;"><i class="fa fa-edit"></i></th>
             <th>Fecha</th>
              <th>Vr. Alquiler</th>
              <th>Abonos</th>
              <th>Cliente</th>
              <th>Equipo</th>
              <th>Observaciones</th>
              <th>Tipo Venta</th>
            </tr>
          </thead>
       <tbody>
            <?php
            if ($fechaform!="") {
              $res=Reportes::ReportePrestamosporfecha($FechaStart,$FechaEnd);
              $campos = $res->getCampos();
            }
            else
            {
              $campos = $campos->getCampos();
            }
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
            <tr>
              <td>
              <a href="?controller=reportes&&action=editarprestamo&&id=<?php echo $id; ?>&&vereditar=1" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Editar Alquiler">
                <i class="fa fa-edit bigger-110 "></i>
              </a>
              <a href="#" onclick="eliminar(<?php echo $id; ?>);" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Eliminar Registro">
                <i class="fa fa-trash bigger-110 "></i>
              </a>
               <a href="#"  data-toggle="modal" data-target="#modal-form<?php echo($id) ?>" href="#" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Eliminar Venta">
                <i class="fa fa-calculator bigger-110 "></i>
              </a>
               <a href="#" onclick="cambiarestado(<?php echo $id; ?>);" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Cambiar a Contado">
                <i class="fa fa-check bigger-110 "></i>
              </a>
                <!-- Inicio Modal -->
        <div id="modal-form<?php echo($id) ?>" class="modal" tabindex="-1">
                             <!-- Inicio Modal -->
    <div>
     
                <form action="?controller=reportes&&action=guardarabono&&tipo=<?php echo($tipo); ?>" method="post" class="j-formsnoticias" id="j-formsnoticias" enctype="multipart/form-data" novalidate autocomplete="off">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="black bigger">REPORTAR ABONO</h4>
                        <p><strong>Alquiler de Equipo:</strong><?php echo($nomprod." a ".$nomcli." desde el ".fechalarga($fecha_reporte)); ?></p>
                        <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo utf8_encode("$".number_format($valor_prestamo,0)); ?></h5>
                    <span class="description-text">Valor Alquiler</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><a href=""><?php echo utf8_encode("$".number_format($abonos,0)); ?> <i class="fa fa-external-link"> </i></a></h5>
                    <span class="description-text">Total Abonos</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo utf8_encode("$".number_format($saldo,0)); ?></h5>
                    <span class="description-text">Saldo</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <hr>
              <h5><strong>Detalle Abonos:</strong></h5>
              <ul class="nav nav-stacked">
                 <?php 
               $tipo="Venta_Equipos";
              $res=Reportes::ReporteAbonospor($id,$tipo);
              $campos = $res->getCampos();
              foreach ($campos as $campo){
            $idabono = $campo['id'];
            $fecha_abono = $campo['fecha_abono'];
            $valor_abono = $campo['valor_abono'];
           
                            ?>
                <li><a href="#" onclick="eliminarabono(<?php echo $idabono; ?>,<?php echo($id) ?>);"><i class="fa fa-trash text-danger"></i> Abono realizado el <?php echo(fechalarga($fecha_abono)) ?><span class="pull-right badge bg-blue"><?php echo utf8_encode("$".number_format($valor_abono,0)); ?></span></a></li>
               <?php 
             }
                ?>
              </ul> 
                      </div>

                      <div class="modal-body">
                        <div class="row" >
                          <?php  
                date_default_timezone_set("America/Bogota");
                $TiempoActual = date('Y-m-d H:i:s');
              ?>
              
          <input type="hidden" name="creado_por" value="<?php echo($IdSesion);?>">
          <input type="hidden" name="estado_reporte" value="1">
          <input type="hidden" name="reporte_publicado" value="1">
          <input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual);?>">
          <input type="hidden" name="cliente_id_cliente" value="<?php echo($cliente_id_cliente);?>">
          <input type="hidden" name="reporte_id_factura" value="0">
          <input type="hidden" name="reporte_id_prestamo" value="<?php echo($id);?>">
              <div class="col-md-6">
                        <div class="form-group">
                          <label>Fecha del Abono: <span>*</span></label>
                          <input type="date" name="fecha_abono" placeholder="Fecha Abono" class="form-control required" required id="fecha_abono<?php echo($id) ?>" value="">
                        </div>
              </div>
              <div class="col-md-6">
                        <div class="form-group">
                          <label>Valor Abono<span>*</span></label>
                          <input type="text" name="valor_abono" placeholder="Valor Abono" class="form-control" id="demo<?php echo($id) ?>" value="">
                        </div>
              </div>
             
                        </div>
                        <script type="text/javascript">     
$("#demo<?php echo($id) ?>").maskMoney({
prefix:'$ ', // The symbol to be displayed before the value entered by the user
allowZero:true, // Prevent users from inputing zero
allowNegative:true, // Prevent users from inputing negative values
defaultZero:false, // when the user enters the field, it sets a default mask using zero
thousands: '.', // The thousands separator
decimal: '.' , // The decimal separator
precision: 0, // How many decimal places are allowed
affixesStay : true, // set if the symbol will stay in the field after the user exits the field. 
symbolPosition : 'left' // use this setting to position the symbol at the left or right side of the value. default 'left'
}); //
    </script>
    <script type="text/javascript">
  var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n') 
}        
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#fecha_abono<?php echo($id) ?>').datepicker();
        //dateFormat: 'dd/mm/yy'
    }); 
} 
</script>
                      </div>

                      <div class="modal-footer">
                        <a href="CrearVenta.php" class="btn btn-sm btn-primary" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Cancelar
                        </a>
                        <button  class="btn btn-sm btn-success">
                          <i class="ace-icon fa fa-check"></i>
                          Abonar
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
    </div><!-- PAGE CONTENT ENDS -->
            <!-- FINAL MODAL -->
              </td>
              <td><?php echo ($fecha_reporte) ?></td>
              <td><?php echo utf8_encode("$".number_format($valor_prestamo,0)); ?></td>
             <td><?php echo utf8_encode("$".number_format($abonos,0)); ?></td>
              <td><?php echo utf8_encode($nomcli); ?></td>
              <td><?php echo utf8_encode($nomprod); ?></td>
               <td><?php echo utf8_encode($observaciones); ?></td>
               <td><?php echo utf8_encode($estado_pago); ?></td>
              
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


					</div> <!-- FIN DE ROW-->
				</div><!-- FIN DE CONTAINER FORMULARIO-->
			</div> <!-- Fin Row -->
		</div> <!-- Fin Container -->
	</div> <!-- Fin Content -->

<!-- Inicio Modal Clientes -->
    <div id="modal-form6" class="modal" tabindex="-1">
               <!-- Inicio Modal -->
    <div>
    
<form action="?controller=reportes&&action=clienteextra&&tiporeporte=4" method="post" autocomplete="off">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a href="#" type="button" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="black bigger">Crear Nuevo Cliente:</h4>
                      </div>

                      <div class="col-md-12 col-xs-12">
                      	  <label>Nombre Cliente<span>*</span></label>
                      	  <input type="hidden" name="estado_cliente" value="1">
                           <input type="text" name="nombre_cliente" placeholder="Nombre del Cliente" class="form-control" value="" >
                          <br>
                      <br>
                      </div>
                         

                      <div class="modal-footer">
                        <a href="Clientes-Abonos.php?AbonosFactura=<?php Echo($AbonosFactura) ?>" class="btn btn-sm btn-danger" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Cancelar
                        </a>

                        <button class="btn btn-sm btn-success">
                          <i class="ace-icon fa fa-check"></i>
                          Confirmar
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
                </div><!-- PAGE CONTENT ENDS -->
 </div>
 <!-- FINAL MODAL -->

 <!-- Inicio Modal Productos-->
    <div id="modal-form7" class="modal" tabindex="-1">
               <!-- Inicio Modal -->
    <div>
    
<form action="?controller=reportes&&action=productoextra&&tiporeporte=1" method="post" id="FormArpetura" autocomplete="off">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a href="CrearVenta.php" type="button" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="black bigger">Crear Nuevo Producto:</h4>
                      </div>

                      <div class="col-md-12 col-xs-12">
                      	  <label>Nombre Producto<span>*</span></label>
                      	  <input type="hidden" name="estado_producto" value="1">
                           <input type="text" name="nombre_producto" placeholder="Nombre del Producto" class="form-control" value="" >
                          <br>
                      <br>
                      </div>
                         

                      <div class="modal-footer">
                        <a href="Clientes-Abonos.php?AbonosFactura=<?php Echo($AbonosFactura) ?>" class="btn btn-sm btn-danger" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Cancelar
                        </a>

                        <button class="btn btn-sm btn-success">
                          <i class="ace-icon fa fa-check"></i>
                          Confirmar
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
                </div><!-- PAGE CONTENT ENDS -->
 </div>
 <!-- FINAL MODAL -->
 


</div> <!-- Fin Content-Wrapper -->
<script>
function eliminar(id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=reportes&&action=eliminarprestamo&&id="+id;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>

<script>
function cambiarestado(id){
   eliminar=confirm("¿Deseas pasar a contado este registro?");
   if (eliminar)
     window.location.href="?controller=reportes&&action=cambiarestadoprestamo&&id="+id;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido cambiar el estado al registro...')
}
</script>

<script>
function eliminarabono(idabono,idsol){
   eliminar=confirm("¿Deseas eliminar este Abono?");
   if (eliminar)
     window.location.href="?controller=reportes&&action=eliminarabono&&idabono="+idabono+"&&id="+idsol+"&&tipo=Equipo";
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el abono...')
}
</script>


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
           
            pageTotal8 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

              pageTotal9 = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
             // Update footer
           
             $( api.column( 2 ).footer() ).html(
                '$'+formatmoneda(pageTotal8,'' )
            );  

              $( api.column( 3 ).footer() ).html(
                '$'+formatmoneda(pageTotal9,'' )
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
