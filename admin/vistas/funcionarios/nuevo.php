<?php 
	 $IdSesion = $_SESSION['IdUser'];
 ?>
<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Nuevo Funcionario</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=funcionarios&&action=todos">Funcionarios</a></li>
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
							<form role="form" action="?controller=funcionarios&&action=guardar" method="POST" enctype="multipart/form-data" autocomplete="off">
								<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								?>
							
							<input type="hidden" name="creado_por" value="<?php echo($IdSesion) ?>">
							<input type="hidden" name="funcionario_publicado" value="1">
							<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">
							<input type="hidden" name="estado_funcionario" value="1">
							<input type="hidden" name="fecha_salida" value="0000-00-00">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Agregar Nuevo Funcionario</h3>
								</div>
							 <div class="row">
									  <div class="col-12">
										<div class="form-group">
										  <label for="fila2_columna1">Foto de perfil</label>
												<div class="custom-file">
													<input name="imagen"  type="file" id="input-file-now" class="dropify" data-default-file="../admin/vistas/funcionarios/default.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
												</div>
										</div>
									   </div>
							</div>
							<div class="row">
								 <div class="col-sm-12 col-xs-12">
									<div class="form-group">
									  <label for="nombres">Nombre completo del Funcionario</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="nombre_funcionario" value="" class="form-control" id="nombre_funcionario" placeholder="Ingrese el nombre completo del usuario"  required>
             				 </div>
									 
									</div>
								  </div>
								 <div class="col-sm-6 col-xs-12">
									<div class="form-group">
									  <label for="documento">Documento</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="documento" value="" class="form-control" id="documento" placeholder="Ingrese el número de documento" required>
             				 </div>
									 
									</div>
								  </div>
								  
								   <div class="col-sm-6 col-xs-12">
									<div class="form-group">
									  <label for="sel1">Cargo del Funcionario:</label>
									  <select class="form-control" id="cargo_id_cargo" name="cargo_id_cargo" required>
										<option value="" selected>Seleccione un cargo</option>
										<?php
										$rubros = Funcionarios::obtenerCargos();
										foreach ($rubros as $campo){
											$id_cargo = $campo['id_cargo'];
											$nombre_cargo = $campo['nombre_cargo'];
										?>
										<option value="<?php echo $id_cargo; ?>"><?php echo $nombre_cargo; ?></option>
										<?php } ?>
									  </select>
									</div>
								</div>
								  <div class="col-sm-6 col-xs-12">
									<div class="form-group">
									  <label for="sel1">Tipo de Contrato:</label>
									  <select class="form-control" id="tipo_contrato" name="tipo_contrato" required>
										<option value="" selected>Seleccionar...</option>
										<option value="Indefinido">Indefinido</option>
										<option value="Prestacion de Servicios">Prestación de Servicios</option>
											<option value="Termino Fijo">Término Fijo</option>
										<option value="Contratista">Contratista</option>
									  </select>
									</div>
								</div>
								 <div class="col-sm-6 col-xs-12">
												<div class="form-group">
													<label>Fecha Ingreso: <span>*</span></label>
													<input type="date" name="fecha_ingreso" placeholder="Fecha" class="form-control required" required id="fecha_ingreso">
												</div>
								</div>
								 <div class="col-sm-4 col-xs-12">
									<div class="form-group">
									  <label for="documento">Empresa</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-industry"></i></span>
                <input type="text" name="empresa" value="" class="form-control" id="empresa" placeholder="Ingrese Empresa" required>
             				 </div>
									 
									</div>
								  </div>
								 <div class="col-sm-4 col-xs-12">
									<div class="form-group">
									  <label for="documento">ARL del Empleado</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
                <input type="text" name="arl" value="" class="form-control" id="arl" placeholder="Ingrese ARL" required>
             				 </div>
									 
									</div>
								  </div>
								   <div class="col-sm-4 col-xs-12">
									<div class="form-group">
									  <label for="documento">EPS del Empleado</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                <input type="text" name="eps" value="" class="form-control" id="eps" placeholder="Ingrese EPS" required>
             				 </div>
									 
									</div>
								  </div>
								   <div class="col-sm-4 col-xs-12">
									<div class="form-group">
									  <label for="documento">Salario Acordado</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="salario" placeholder="Salario acordado" class="form-control" id="demo1">
             				 </div>
									 
									</div>
								  </div>
								 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Funciones del Cargo (Máx 1000 Carácteres)</label>
													  <textarea class="form-control" rows="6" name="observaciones" id="descripcion" placeholder="Ingrese las funciones del cargo asignado" maxlength="1000" required></textarea></div>
											  </div>
							<hr>
							<h3>Datos Personales</h3>
							 <div class="col-sm-4 col-xs-12">
									<div class="form-group">
									  <label for="documento">Ciudad</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" name="ciudad" value="" class="form-control" id="ciudad" placeholder="Ciudad" >
             				 </div>
									 
									</div>
								  </div>
 							
								  <div class="col-sm-8 col-xs-12">
									<div class="form-group">
									  <label for="documento">Dirección</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" name="direccion" value="" class="form-control" id="direccion" placeholder="Lugar de residencia" >
             				 </div>
									 
									</div>
								  </div>
								 <div class="col-sm-4 col-xs-12">
									<div class="form-group">
									  <label for="documento">Número de Contacto</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                <input type="text" name="celular" value="" class="form-control" id="celular" placeholder="Número de Whatsapp" >
             				 </div>
									 
									</div>
								  </div>
								   <div class="col-sm-8 col-xs-12">
									<div class="form-group">
									  <label for="documento">E-mail</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" name="correo" value="" class="form-control" id="correo" placeholder="Correo electrónico" >
             				 </div>
									 
									</div>
								  </div>
							</div>
							<div class="card-footer">
							  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
							</div>
						  </div>
						  <!-- /.card -->

							</form>
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
        $('#fecha_ingreso').datepicker();
        //dateFormat: 'dd/mm/yy'
    }); 
} 
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
