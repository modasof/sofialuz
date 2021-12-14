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
          <h1 class="m-0 text-dark">Configuración de Nuestro Equipo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Team</li>
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
							<form role="form" action="?controller=team&&action=guardarTeam" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Agregar Persona a Nuestro Equipo</h3>
								</div>
							 <div class="row">
									  <div class="col-4">
										<div class="form-group">
										  <label for="fila2_columna1">Foto del Empleado</label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/ required>
												</div>
										</div>
									   </div>

									
									<div class="col-8">
										 <div class="col-12">
											<div class="form-group">
											  <label for="nombres">Nombres y Apellidos</label>
											  <div class="input-group">
												<div class="input-group-prepend">
												  <span class="input-group-text"><i class="fa fa-user"></i></span>
												</div>
												<input type="text" name="nombres" value="" class="form-control" id="nombres" placeholder="Ingrese Nombre y  Apellido" required>
											  </div>
											</div>
										  </div>
										 <div class="row">
											 <div class="col-6">
												<div class="form-group">
												  <label for="nombres">Telefono</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-phone"></i></span>
													</div>
													<input type="text" name="telefono" value="" class="form-control" id="telefono" placeholder="Ingrese telefono del empleado" required>
												  </div>
												</div>
											  </div>
											 <div class="col-6">
												<div class="form-group">
												  <label for="nombres">Correo</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
													</div>
													<input type="email" name="correo" value="" class="form-control" id="corre" placeholder="Ingrese el correo del empleado" required>
												  </div>
												</div>
											  </div>
										  </div>
										  <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Cargo que desempeña</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="cargo" value="" class="form-control" id="cargo" placeholder="Ingrese el cargo" required>
												  </div>
												</div>
											  </div>
										  </div>
										 <div class="row">
											 <div class="col-6">
												<div class="form-group">
												  <label for="nombres">Enlace Facebook</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-facebook"></i></span>
													</div>
													<input type="text" name="facebook" value="" class="form-control" id="facebook" placeholder="Ingrese el enlace de facebook del empleado" required>
												  </div>
												</div>
											  </div>
											 <div class="col-6">
												<div class="form-group">
												  <label for="nombres">Enlace Twitter</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-twitter"></i></span>
													</div>
													<input type="text" name="twitter" value="" class="form-control" id="twitter" placeholder="Ingrese el enlace de twitter del empleado" required>
												  </div>
												</div>
											  </div>
										  </div>
										 <div class="row">
											 <div class="col-6">
												<div class="form-group">
												  <label for="nombres">Enlace Google</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-google-plus"></i></span>
													</div>
													<input type="text" name="google" value="" class="form-control" id="google" placeholder="Ingrese el enlace de google + del empleado" required>
												  </div>
												</div>
											  </div>
											 <div class="col-6">
												<div class="form-group">
												  <label for="nombres">Enlace Linkedin</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-linkedin"></i></span>
													</div>
													<input type="text" name="linkedin" value="" class="form-control" id="linkedin" placeholder="Ingrese el enlace de linkedin del empleado" required>
												  </div>
												</div>
											  </div>
										  </div>										  										  
									  </div>					   

							<div class="card-footer">
							  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
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
