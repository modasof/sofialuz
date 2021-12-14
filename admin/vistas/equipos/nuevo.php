<?php 
ini_set('display_errors', '0'); 
$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];
 ?>
<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Nuevo Equipo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=equipos&&action=todos">Equipos</a></li>
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
							<form role="form" action="?controller=equipos&&action=guardar" method="POST" enctype="multipart/form-data" autocomplete="off">
								<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
							
								?>
							
							<input type="hidden" name="estado_equipo" value="1">
							<input type="hidden" name="creado_por" value="<?php echo($IdSesion); ?>">
							<input type="hidden" name="equipo_publicado" value="1">
							<input type="hidden" name="modulo" value="Asf">
							<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">


							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Hoja de Vida</h3>
								</div>

								
							<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="form-group">
										  <label for="fila2_columna1">Adjuntar Imagen del Equipo <br><small>Peso máximo 5MB, </small></label>
												<div class="">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="overlay"  accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ required>
												</div>
										</div>
								</div>
							
							
									<div class="col-md-4 col-xs-12">
												<div class="form-group">
													<label>Indique el nombre del equipo: <span>*</span></label>
													<input type="text" name="nombre_equipo" placeholder="Nombre del equipo" class="form-control " required>
												</div>
											</div>

												<div class="col-md-4 col-xs-12">
												<div class="form-group">
													<label>Tipo Equipo: <span>*</span></label>
													
													 <select class="form-control select2" id="tipo_equipo" name="tipo_equipo" required="">
															<option value="" selected="">Seleccione una opción....</option>
															<option value="Maquinaria Pesada">Maquinaria Pesada</option>
															<option value="Volquetas">Volquetas</option>
															<option value="Vehículos">Vehículos</option>
															<option value="Equipos Menores">Equipos Menores</option>
															<option value="Herramientas">Herramientas</option>
													</select>
												</div>
											</div>

												<div class="col-md-4 col-xs-12">
												<div class="form-group">
													<label>Propietario<span>*</span></label>
													<input type="text" name="propietario" placeholder="Indique el propietario" class="form-control" required>
												</div>
											</div>

											<div class="col-md-4 col-xs-12">
												<div class="form-group">
													<label>Indicar marca<span>*</span></label>
													<input type="text" name="marca_equipo" placeholder="Indique la marca" class="form-control " required>
												</div>
											</div>
											
												<div class="col-md-4 col-xs-12">
												<div class="form-group">
													<label>Modelo<span>*</span></label>
													<input type="text" name="modelo" placeholder="WORKSTAR  7600 SBA / 2014" class="form-control" required>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label>Motor<span>*</span></label>
													<input type="text" name="motor" placeholder="Motor" class="form-control" required>
												</div>
											</div>

												<div class="col-md-4">
												<div class="form-group">
													<label>Serie<span>*</span></label>
													<input type="text" name="serial_equipo" placeholder="Indique el Serial" class="form-control" >
												</div>
											</div>


											<div id="divplaca"  class="col-md-4">
												<div class="form-group">
													<label>Número de Placa<span>* AAA-123</span></label>
													<input type="text" name="placa" placeholder="Indique la placa O N/A" class="form-control" value="">
												</div>
											</div>

												<div id="divplaca"  class="col-md-4">
												<div class="form-group">
													<label>Capacidad Carga<span>* (Kg)</span></label>
													<input type="text" name="peso" placeholder="Indique el peso" class="form-control" value="">
												</div>
											</div>
						
											<div class="col-md-4">
												<div class="form-group">
													<label>Unidad de Trabajo: <span>*</span></label>
													
													 <select class="form-control select2"  name="unidad_trabajo" required="">
															<option value="" selected="">Seleccione una opción....</option>
															<option value="HR">Horas</option>
															<option value="DIA">Días</option>
															<option value="MES">Mes</option>
															<option value="KM">Kilometraje</option>
													</select>
												</div>
											</div>
											<div  class="col-md-4">
												<div class="form-group">
													<label>Fecha Adquisición: <span>*</span></label>
													<input type="date" name="fecha_adquisicion" id="fecha_adquisicion" placeholder="Fecha" class="form-control required" required id="beneficiario">
												</div>
											</div>

											<div  class="col-md-4">
												<div class="form-group">
													<label>Valor Activo: <span>*</span></label>
													<input type="text" name="valor_activo" id="demo1" placeholder="Valor" class="form-control required" required >
												</div>
											</div>
												<div class="col-md-6">
												<div class="form-group">
													<label>Indique el % de comisión: <span>*</span></label>
													<select class="form-control"  name="comision" required="">
															<option value="0" selected="">Seleccione una opción....</option>
															<?php 
															for ($i=0; $i < 21 ; $i++) { 
																echo("<option value='".$i."'>".$i." %</option>");
															}
															 ?>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Peso - Medidas - Características<span>*</span></label>
													  <textarea class="form-control" rows="2" id="descripcion" name="observaciones"></textarea>
												</div>
											</div>

							</div>
						
							<div class="row">
								<div class="card-footer">
								  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
								</div>
						  </div>
						  </form>
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
  	var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n') 
}        
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#fecha_adquisicion').datepicker();
        dateFormat: 'dd-mm-yy'
    }); 
} 
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
					'default': 'Foto del Equipo',
					'replace': 'Reemplazar Adjunto',
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
