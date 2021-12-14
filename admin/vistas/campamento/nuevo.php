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
          <h1 class="m-0 text-dark">Nuevo Campamento</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=campamento&&action=todos">Campamento</a></li>
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
							<form role="form" action="?controller=campamento&&action=guardar" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Agregar nuevo Campamento</h3>
								</div>
							
								<div class="row">
									 <div class="col-md-4">
										<div class="form-group">
										  <label for="nombres">Nombre Campamento</label>
										  <div class="input-group">
							                <span class="input-group-addon"><i class="fa fa-check"></i></span>
							                <input type="text" name="nombre_campamento" value="" class="form-control" id="nombre_campamento" placeholder="Ingrese el nombre del campamento" maxlength="150" required>
							              </div>
										 
										</div>
									  </div>
									  <div class="col-md-4">
										<div class="form-group">
										  <label for="nombres">Ciudad Campamento</label>
										  <div class="input-group">
							                <span class="input-group-addon"><i class="fa fa-check"></i></span>
							                <input type="text" name="ciudad_campamento" value="" class="form-control" id="ciudad_campamento" placeholder="Ingrese la ciudad del campamento">
							              </div>
										 
										</div>
									  </div>
									  <div class="col-md-4">
										<div class="form-group">
										  <label for="nombres">Dirección Campamento</label>
										  <div class="input-group">
							                <span class="input-group-addon"><i class="fa fa-check"></i></span>
							                <input type="text" name="direccion_campamento" value="" class="form-control" id="direccion_campamento" placeholder="Ingrese la Dirección del campamento">
							              </div>
										 
										</div>
									  </div>
									  <div class="col-md-4">
										<div class="form-group">
										  <label for="nombres">Responsable Campamento</label>
										  <div class="input-group">
							                <span class="input-group-addon"><i class="fa fa-check"></i></span>
							                <input type="text" name="responsable_campamento" value="" class="form-control" id="responsable_campamento" placeholder="Ingrese el Responsable del campamento">
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
