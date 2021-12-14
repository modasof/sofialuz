<?php
$campos = $campos->getCampos();
foreach ($campos as $campo){
	$id = $campo['id'];
	$titulo1=$campo['titulo1'];
	$titulo2=$campo['titulo2'];
	$titulo3=$campo['titulo3'];
	$tab_nuevo=$campo['tab_nuevo'];
	$tab_usado=$campo['tab_usado'];
	$btn_nuevo=$campo['btn_nuevo'];
	$btn_usado=$campo['btn_usado'];
	$call1=$campo['call1'];
	$call2=$campo['call2'];
	$call3=$campo['call3'];
	$titulo_testimonio=$campo['titulo_testimonio'];
	$texto_testimonio=$campo['texto_testimonio'];

}
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
          <h1 class="m-0 text-dark">Actualizar Textos Inicio</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="#">Configuracion</a></li>
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
							<form role="form" action="?controller=textos&&action=actualizar&&id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								
								<div class="row">
									<div class="col-12">
										<i class="fa fa-address-card-o" style="color: #007bff; font-size: x-large"></i><spam style="color: #007bff; font-size: x-large"> Sección 1</spam>
									</div>
								</div>
								<div class="row">
									 <div class="col-12">
										<div class="form-group">
										  <label for="nombres">Título 1</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
											</div>
											<input type="text" name="titulo1" value="<?php echo utf8_encode($titulo1);?>" class="form-control" id="funcion" placeholder="Ingrese el título" maxlength="150" required>
										  </div>
										</div>
									 </div>
								</div>
								<div class="row">
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Tab Nuevos</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
											</div>
											<input type="text" name="tab_nuevo" value="<?php echo utf8_encode($tab_nuevo);?>" class="form-control" id="funcion" placeholder="Ingresar texto" required>
										  </div>
										</div>
									 </div>
									  <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Tab Usados</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
											</div>
											<input type="text" name="tab_usado" value="<?php echo utf8_encode($tab_usado);?>" class="form-control" id="funcion" placeholder="Ingresar texto" required>
										  </div>
										</div>
									 </div>
								</div>
								<div class="row">
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Call to action Nuevos</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-link"></i></span>
											</div>
											<input type="text" name="call1" value="<?php echo utf8_encode($call1);?>" class="form-control" id="funcion" placeholder="Ingresar texto" required>
										  </div>
										</div>
									 </div>
									  <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Call to action Usados</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-link"></i></span>
											</div>
											<input type="text" name="call2" value="<?php echo utf8_encode($call2);?>" class="form-control" id="funcion" placeholder="Ingresar texto" required>
										  </div>
										</div>
									 </div>
								</div>
									<div class="row">
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Botón Nuevos</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-link"></i></span>
											</div>
											<input type="text" name="btn_nuevo" value="<?php echo utf8_encode($btn_nuevo);?>" class="form-control" id="funcion" placeholder="Ingresar texto" required>
										  </div>
										</div>
									 </div>
									  <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Botón Usados</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-link"></i></span>
											</div>
											<input type="text" name="btn_usado" value="<?php echo utf8_encode($btn_usado);?>" class="form-control" id="funcion" placeholder="Ingresar texto" required>
										  </div>
										</div>
									 </div>
								</div>
								<hr>
								<div class="row">
									<div class="col-12">
										<i class="fa fa-address-card-o" style="color: #007bff; font-size: x-large"></i><spam style="color: #007bff; font-size: x-large"> Sección 2</spam>
									</div>
								</div>
								<div class="row">
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Titulo 2</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
											</div>
											<input type="text" name="titulo2" value="<?php echo utf8_encode($titulo2);?>" class="form-control" id="funcion" placeholder="Ingresar texto" required>
										  </div>
										</div>
									 </div>
									  <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Call to action Ofertas</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
											</div>
											<input type="text" name="call3" value="<?php echo utf8_encode($call3);?>" class="form-control" id="funcion" placeholder="Ingresar texto" required>
										  </div>
										</div>
									 </div>
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Título 3</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
											</div>
											<input type="text" name="titulo3" value="<?php echo utf8_encode($titulo3);?>" class="form-control" id="funcion" placeholder="Ingresar texto" required>
										  </div>
										</div>
									 </div>
								</div>
								<hr>
								<div class="row">
									<div class="col-12">
										<i class="fa fa-address-card-o" style="color: #007bff; font-size: x-large"></i><spam style="color: #007bff; font-size: x-large"> Testimonios</spam>
									</div>
								</div>
								<div class="row">
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Titulo</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
											</div>
											<input type="text" name="titulo_testimonio" value="<?php echo utf8_encode($titulo_testimonio) ?>" class="form-control" id="funcion" placeholder="Ingresar texto" required>
										  </div>
										</div>
									 </div>
									  <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Texto Testimonios</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
											</div>
											<textarea name="texto_testimonio" class="form-control" rows="5"><?php echo utf8_encode($texto_testimonio); ?></textarea>
										  </div>
										</div>
									 </div>

	
								</div>
								<hr>
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
