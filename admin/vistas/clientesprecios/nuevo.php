<?php 
	ini_set('display_errors', '0');
include_once 'modelos/proveedores.php';
include_once 'controladores/proveedoresController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];


 ?>

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">

<?php
$ClienteSel=$_GET['id'];
$nombre_cliente = Clientes::obtenerNombreCliente($ClienteSel);

?>


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector2').select2();
    });
});
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Nueva Ruta cliente: <?php echo utf8_encode($nombre_cliente); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=clientesprecios&&action=todos">Rutas <?php echo utf8_encode($nombre_cliente); ?></a></li>
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
				<div class="container-fluid">
					<div class="row">
						<!-- ESTE DIV LO USO PARA CENTRAR EL FORMULARIO -->
						<!-- left column -->
						<div class="col-md-12">
						  <!-- general form elements -->
						  <div class="card card-primary">
							<!-- /.card-header -->
							<!-- form start -->
							<form role="form" action="?controller=egresoscuenta&&action=guardar&&id_cuenta=<?php echo($id_cuenta); ?>" method="POST" enctype="multipart/form-data">
								<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								?>
							
							<input type="hidden" name="cuenta_id_cuenta" value="<?php echo($CuentaSel); ?>">
							<input type="hidden" name="creado_por" value="1">
							<input type="hidden" name="egreso_publicado" value="1">
							<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Registrar Egreso en Cuenta</h3>
								</div>
							 <div class="row">
							 	<div class="col-12">
							 		<div class="form-group">
										 <label for="fila2_columna1">Adjuntar el Soporte <br><small>Peso máximo 5MB </small></label>
												<div class="custom-file">
													
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file=""  multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ required>
												</div>
										</div>
							 	</div>
									  <div class="col-6">
										
										<div class="col-md-12">
												<div class="form-group">
													<label>Valor del Egreso: <span>*</span></label>
													<input type="text" name="valor_egreso" placeholder="Valor del gasto" class="form-control" id="demo1">
												</div>
											</div>

										 
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Descripción del Egreso (Máx 500 Carácteres)</label>
												 
													
													  <textarea class="form-control" rows="3" name="observaciones" id="descripcion" placeholder="Ingrese la descripción del gasto" maxlength="500" required></textarea>
												 
												</div>
											  </div>
										  
										  <div style="display: none;" class="col-md-12">
												<div class="form-group">
													<label>Estado Egreso: <span>*</span></label>
													 <select class="form-control"  name="estado_egreso" required="" id="estado_egreso">
															<option value="2" selected="">Seleccionar...</option>
															<option value="1">A crédito</option>
															<option value="2">Inmeditado</option>
														  </select>
												</div>
											</div>
									   </div>

									
									<div class="col-6">
										<div  class="col-md-12">
												<div class="form-group">
													<label>Fecha Egreso: <span>*</span></label>
													<input type="date" name="fecha_egreso" placeholder="Fecha" class="form-control required" required id="fecha_egreso">
												</div>
											</div>

										 <div class="col-md-12">
												<div class="form-group">
													<label>Tipo de Egreso: <span>*</span></label>
													 <select class="form-control"  name="tipo_egreso" required="" id="tipo_egreso">
															<option value="" selected="">Seleccionar...</option>
															<option value="Movimiento a cuenta">Préstamo a cuenta</option>
															<option value="Cuenta">Ingreso a caja</option>
															<option value="Otro tipo de egreso">Otro tipo de egreso</option>

			<!--	
			La opciónd de pago a proveedor se omite para canalizar las salidas por Abonos a RQ

			<option value="Pago a proveedor">Pago a proveedor</option> 
			-->
														  </select>
												</div>
											</div>
											<div style="display: none;" id="divcuentas" class="col-md-12">
													<div class="form-group">
														  <label for="sel1">Cuentas en Sistema:<span>*</span></label>
														  <select class="form-control"  name="cuenta_beneficiada" >
																  <option value="" selected>Seleccionar...</option>
																<?php
																	$cajas = Egresoscuenta::obtenerCuentas($CuentaSel);
																	foreach($cajas as $caja){
																		$id_cuenta = $caja['id_cuenta'];
																		$nombre_cliente = $caja['nombre_cliente'];
																?>
																<option value="<?php echo $id_cuenta; ?>"><?php echo $nombre_cliente; ?></option>
																<?php }?>
														  </select>
													</div>
											</div>
											<div style="display: none;" id="divcajas" class="col-md-12">
													<div class="form-group">
														  <label for="sel1">Caja Sistema:<span>*</span></label>
														  <select class="form-control"  name="caja_beneficiada" >
																  <option value="" selected>Seleccione una caja...</option>
																<?php
																	$cajas = Egresoscuenta::obtenerCajas();
																	foreach($cajas as $caja){
																		$id_caja = $caja['id_caja'];
																		$nombre_caja = $caja['nombre_caja'];
																?>
																<option value="<?php echo $id_caja; ?>"><?php echo $nombre_caja; ?></option>
																<?php }?>
														  </select>
													</div>
											</div>

									<div style="display: none;" class="col-md-12" id="divproveedor">
										<div class="form-group">

										  <label for="sel1">Lista de Proveedores:</label>
										  <select style="width: 200px;" class="form-control mi-selector2" id="beneficiario1" name="proveedor_id_proveedor" >
											<option value="" selected>Seleccionar...</option>
										<?php
										$rubros = Proveedores::obtenerListaProveedores();
										foreach ($rubros as $campo){
											$id = $campo['id_proveedor'];
											$nombre = $campo['nombre_proveedor'];
										?>
										<option value="<?php echo $id; ?>"><?php echo utf8_encode($nombre); ?></option>
										<?php } ?>
										  </select>
										</div>
									</div>

											<div style="display: none;" id="divbeneficiario" class="col-md-12">
												<div class="form-group">
													<label>Beneficiario: <span>*</span></label>
													<input type="text" name="beneficiario" placeholder="Nombre del beneficiario" class="form-control"  id="beneficiario">
												</div>
											</div>
												<div style="display: none;" id="divrubro" class="col-md-12">
													<div class="form-group">
														  <label for="sel1">Rubro:<span>*</span></label>
														  <select class="form-control" id="id_rubro" name="id_rubro" >
																  <option value="" selected>Seleccione...</option>
																<?php
																	$rubros = Egresoscuenta::obtenerRubros();
																	foreach($rubros as $rubro){
																		$id_rubro = $rubro['id_rubro'];
																		$nombre_rubro = $rubro['nombre_rubro'];
																?>
																<option value="<?php echo $id_rubro; ?>"><?php echo utf8_encode($nombre_rubro); ?></option>
																<?php }?>
														  </select>
													</div>
												</div>

												<div style="display: none;" id="divsubrubro" class="col-md-12">
												<div class="form-group">
													  <label for="sel1">Sub-Rubro:<span>*</span></label>
													  <select class="form-control" id="id_subrubro" name="id_subrubro" >
													  	<option value="0">Seleccionar Subrubro</option>
													  </select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Egreso a tráves de: <span>*</span></label>
													 <select class="form-control"  name="egreso_en" required="" id="egreso_en">
															<option value="" selected="">Seleccionar...</option>
															<option value="Efectivo">Efectivo</option>
															<option value="Cheque">Cheque</option>
															<option value="Consignacion">Consignación</option>
															<option value="Transferencia">Transferencia</option>
														  </select>
												</div>
											</div>
											<div style="display: none;" id="divcheques" class="col-md-12">
													<div class="form-group">
														  <label for="sel1">Cheques:<span>*</span></label>
														  <select class="form-control"  name="cheque_id_cheque" >
																  <option value="" selected>Seleccionar...</option>
																<?php
																	$cajas = Egresoscuenta::obtenerCheques($CuentaSel);
																	foreach($cajas as $caja){
																		$id_cheque = $caja['id_cheque'];
																		$numero_cheque = $caja['numero_cheque'];
																?>
																<option value="<?php echo $id_cheque; ?>"><?php echo $numero_cheque; ?></option>
																<?php }?>
														  </select>
													</div>
											</div>
											
										  
									  </div>
									  <div class="col-12">
									  	<div class="card-footer">
							  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
							</div>
									  </div>


							</div>
								
							</form>
						  </div>
						  <!-- /.card -->
						</div>
					  </div>
					</div>

											
					</div> <!-- FIN DE ROW-->
				</div><!-- FIN DE CONTAINER FORMULARIO-->
			</div> <!-- Fin Row -->
		</div> <!-- Fin Container -->
	</div> <!-- Fin Content -->



</div> <!-- Fin Content-Wrapper -->

<script type="text/javascript">
	var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n') 
}        
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#fecha_egreso').datepicker();
        dateFormat: 'dd/mm/yy'
    }); 
} 
</script>
<!-- Inicio Libreria formato moneda -->
<script src="dist/js/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">			
$("#demo1").maskMoney({
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
                        $("#tipo_egreso").change(function() {
                            var selectMedio = $("#tipo_egreso option:selected").html();
                        $(document).ready
                            if (selectMedio == "Préstamo a cuenta") { 
                                $("#divcuentas").slideToggle(100);
                                $("#divcajas").hide("slow");
                                 $("#divbeneficiario").hide("slow");
                                  $("#divproveedor").hide("slow"); 
                                $("#divrubro").hide("slow");
                                $("#divsubrubro").hide("slow");
                            }
                        });
                        </script>
                    <script type="text/javascript">
                        $("#tipo_egreso").change(function() {
                            var selectMedio = $("#tipo_egreso option:selected").html();
                        $(document).ready
                            if (selectMedio == "Ingreso a caja") { 
                                $("#divcuentas").hide("slow");
                                $("#divcajas").slideToggle(100);
                                 $("#divbeneficiario").hide("slow");
                                  $("#divproveedor").hide("slow"); 
                                $("#divrubro").hide("slow");
                                $("#divsubrubro").hide("slow");
                            }
                        });
                        </script>
                     <script type="text/javascript">
                        $("#tipo_egreso").change(function() {
                            var selectMedio = $("#tipo_egreso option:selected").html();
                        $(document).ready
                            if (selectMedio == "Otro tipo de egreso") { 
                                $("#divcuentas").hide("slow");
                                $("#divcajas").hide("slow");
                                 $("#divbeneficiario").slideToggle(100);
                                 $("#divproveedor").hide("slow"); 
                                $("#divrubro").slideToggle(100);
                                 $("#divsubrubro").slideToggle(100);
                            }
                        });
                        </script>

                        <script type="text/javascript">
                        $("#tipo_egreso").change(function() {
                            var selectMedio = $("#tipo_egreso option:selected").html();
                        $(document).ready
                            if (selectMedio == "Pago a proveedor") { 
                                $("#divcuentas").hide("slow");
                                $("#divcajas").hide("slow");
                                 $("#divbeneficiario").hide("slow");
                                  $("#divproveedor").slideToggle(100); 
                                $("#divrubro").slideToggle(100);
                                 $("#divsubrubro").slideToggle(100);
                            }
                        });
                        </script>

                      <script type="text/javascript">
                        $("#egreso_en").change(function() {
                            var selectMedio = $("#egreso_en option:selected").html();
                        $(document).ready
                            if (selectMedio == "Cheque") { 
                                $("#divcheques").slideToggle(100);
                            }
                        });
                        </script>

                        <script type="text/javascript">
                        $("#egreso_en").change(function() {
                            var selectMedio = $("#egreso_en option:selected").html();
                        $(document).ready
                            if (selectMedio != "Cheque") { 
                                $("#divcheques").hide("slow");
                            }
                        });
                        </script>

<script type="text/javascript">
  $(function () {
   $('[data-toggle="tooltip"]').tooltip();
  })
</script>

<script>
	//CARGA DE IMAGENES
	$(document).ready(function(){
    // Basic
		$('.dropify').dropify();
		$('.dropify2').dropify();
    });

	$('.dropify').dropify({
				messages: {
					'default': 'Arrastra y suelta un archivo aquí o haz clic',
					'replace': 'Arrastra y suelta o haz clic para reemplazar',
					'remove':  'Remover',
					'error':   'Oops, sucedió algo mal.'
				},
				error: {
						'fileSize': 'El tamaño del archivo es demasiado grande ({{ value }} maximo).',
						'imageFormat': 'El formato de imagen no está permitido ({{ value }} solamente).',
						'fileExtension': 'El archivo no está permitido ({{ value }} solamente).'
				}				
	});

	var drEvent = $('.dropify').dropify();

	drEvent.on('dropify.beforeClear', function(event, element){
		return confirm("Realmente desea eliminar la imagen \"" + element.filename + "\" ?");
	});      

	drEvent.on('dropify.error.fileSize', function(event, element){
		alert('Imagen demasiado grande!');
	});
	drEvent.on('dropify.error.minWidth', function(event, element){
		alert('Min width error message!');
	});
	drEvent.on('dropify.error.maxWidth', function(event, element){
		alert('Max width error message!');
	});
	drEvent.on('dropify.error.minHeight', function(event, element){
		alert('Min height error message!');
	});
	drEvent.on('dropify.error.maxHeight', function(event, element){
		alert('Max height error message!');
	});
	drEvent.on('dropify.error.imageFormat', function(event, element){
		alert('Error en el formato de la imagen!');
	});   

	drEvent.on('dropify.errors', function(event, element){
		alert('Ha ocurrido un error!');
	});	 
	  var drEvent = $('.dropify').dropify();

	drEvent.on('dropify.afterClear', function(event, element){
		alert('Archivo Eliminado');
	});
</script>
