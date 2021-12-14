<?php
ini_set('display_errors', '0');
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';
?>
<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
<?php
$CuentaSel=$_GET['id_cuenta'];
$cajas = Ingresoscuenta::obtenerCuentapor($CuentaSel);
	foreach($cajas as $caja){
	$id_cuenta = $caja['id_cuenta'];
	$nombre_cuenta = $caja['nombre_cuenta'];
}?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Ingreso en cuenta: <?php echo utf8_encode($nombre_cuenta); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=cuentas&&action=todos">Cuentas</a></li>
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
				<form role="form" action="?controller=ingresoscuenta&&action=guardar&&id_cuenta=<?php echo($id_cuenta); ?>" method="POST" enctype="multipart/form-data">
								<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								?>
							
							<input type="hidden" name="estado_ingreso" value="1">
							<input type="hidden" name="cuenta_id_cuenta" value="<?php echo($CuentaSel);?>">
							<input type="hidden" name="cuenta_aportante" value="0">
							<input type="hidden" name="creado_por" value="1">
							<input type="hidden" name="ingreso_publicado" value="1">
							<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Registrar Ingreso en Cuenta</h3>
								</div>
							 <div class="row">
									  <div class="col-6">
										<div class="form-group">
										  <label for="fila2_columna1">Adjuntar el Soporte <br><small>Peso máximo 5MB, </small></label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="5M" data-errors-position="outside" accept="image/png, .jpeg,.pdf,.xls, .jpg, image/gif"/ required>
												</div>
										</div>
									   </div>

									
									<div class="col-6">
										<div  class="col-md-12">
												<div class="form-group">
													<label>Fecha Ingreso: <span>*</span></label>
													<input type="date" name="fecha_ingreso" placeholder="Fecha" class="form-control required" required id="fecha_ingreso">
												</div>
										</div>
										<div  class="col-md-12">
												<div class="form-group">
													<label>Detalle Ingreso: <span>*</span></label>
													<input type="text" name="concepto" placeholder="Concepto del Ingreso" class="form-control"  id="concepto" required >
												</div>
										</div>

										 <div class="col-md-12">
												<div class="form-group">
													<label>A través de: <span>*</span></label>
													 <select class="form-control"  name="ingreso_por" required id="ingreso_por">
															<option value="" selected="">Seleccionar....</option>
															<option value="Anticipo">Anticipo</option>
															<option value="Aporte de Socios">Aporte de Socios</option>
															<option value="Factura">Factura</option>
															<option value="Prestamo Bancario">Préstamo Bancario</option>
															<option value="Prestamo de Socios">Préstamos de Socios</option>
															<option value="Otros">Otros</option>
															
														  </select>
												</div>
											</div>
											
											<div style="display: none;" id="divfactura" class="col-md-12">
												<div class="form-group">
													<label>Seleccionar Cliente: <span>*</span></label>
													
													 <select class="form-control"  name="factura_num"  id="factura_num">
															<option value="" selected="">Seleccionar....</option>
															<?php
										$rubros = Clientes::obtenerListaClientes();
										foreach ($rubros as $campo){
											$id_cliente = $campo['id_cliente'];
											$nombre_cliente = $campo['nombre_cliente'];
										?>
										<option value="<?php echo $id_cliente; ?>"><?php echo utf8_encode($nombre_cliente); ?></option>
										<?php } ?>
														  </select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Valor del ingreso: <span>*</span></label>
													<input type="text" name="valor_ingreso" placeholder="Valor del ingreso" class="form-control" id="demo1" required="true">
												</div>
											</div>
											
											 <div class="col-md-12">
												<div class="form-group">
													<label>Ingreso en: <span>*</span></label>
													 <select class="form-control"  name="ingreso_en" required id="ingreso_en">
															<option value="" selected="">Seleccionar....</option>
															<option value="Efectivo">Efectivo</option>
															<option value="Cheque">Cheque</option>
															<option value="Transferencia">Transferencia</option>
															
														  </select>
												</div>
											</div>
											<div style="display: none;" id="divnumcheque" class="col-md-12">
												<div class="form-group">
													<label>Cheque Número: <span>*</span></label>
													<input type="text" name="num_cheque" placeholder="Número Cheque" class="form-control"  id="num_cheque">
												</div>
											</div>
											<div style="display: none;" id="divtextocheque" class="col-md-12">
												<div class="form-group">
													<label>Concepto Cheque: <span>*</span></label>
													<input type="text" name="concepto_cheque" placeholder="Concepto Cheque" class="form-control"  id="concepto_cheque">
												</div>
											</div>


											
										 
											 <div class="col-12">

												<div class="form-group">
												  <label for="nombres">Observacione del ingreso (Máx 500 Carácteres)</label>
												 
													  <textarea class="form-control" rows="4" name="observaciones" id="descripcion" placeholder="Agregue aquí el detalle del ingreso" maxlength="500" required></textarea>
												
												</div>
											  </div>
									
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
                        $("#ingreso_por").change(function() {
                            var selectMedio = $("#ingreso_por option:selected").html();
                        $(document).ready
                            if (selectMedio == "Factura") { 
                                $("#divfactura").slideToggle(100); 
                            }
                        });
                        </script>
                      <script type="text/javascript">
                        $("#ingreso_por").change(function() {
                            var selectMedio = $("#ingreso_por option:selected").html();
                        $(document).ready
                            if (selectMedio == "Anticipo") { 
                                $("#divfactura").slideToggle(100); 
                            }
                        });
                        </script>

                    	<script type="text/javascript">
                        $("#ingreso_por").change(function() {
                            var selectMedio = $("#ingreso_por option:selected").html();
                        $(document).ready
                            if (selectMedio == "Aporte de Socios" ) { 
                                $("#divfactura").hide("slow");     
                            }
                        });
                        </script>
                        <script type="text/javascript">
                        $("#ingreso_por").change(function() {
                            var selectMedio = $("#ingreso_por option:selected").html();
                        $(document).ready
                            if (selectMedio == "Prestamo Bancario" ) { 
                                $("#divfactura").hide("slow");     
                            }
                        });
                        </script>
                         <script type="text/javascript">
                        $("#ingreso_por").change(function() {
                            var selectMedio = $("#ingreso_por option:selected").html();
                        $(document).ready
                            if (selectMedio == "Prestamo de Socios" ) { 
                                $("#divfactura").hide("slow");     
                            }
                        });
                        </script>
                         <script type="text/javascript">
                        $("#ingreso_por").change(function() {
                            var selectMedio = $("#ingreso_por option:selected").html();
                        $(document).ready
                            if (selectMedio == "Otros" ) { 
                                $("#divfactura").hide("slow");     
                            }
                        });
                        </script>


                        <script type="text/javascript">
                        $("#ingreso_en").change(function() {
                            var selectMedio = $("#ingreso_en option:selected").html();
                        $(document).ready
                            if (selectMedio == "Cheque") { 
                                $("#divnumcheque").slideToggle(100); 
                                $("#divtextocheque").slideToggle(100); 
                            }
                        });
                        </script>
                    <script type="text/javascript">
                        $("#ingreso_en").change(function() {
                            var selectMedio = $("#ingreso_en option:selected").html();
                        $(document).ready
                            if (selectMedio != "Cheque") { 
                                $("#divnumcheque").hide("slow");
                                 $("#divtextocheque").hide("slow");     
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
<script type="text/javascript">
  	var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n') 
}        
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#fecha_ingreso').datepicker();
        dateFormat: 'dd-mm-yy'
    }); 
} 
  </script>
