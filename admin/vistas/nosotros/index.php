<?php 
$campos = $campos->getCampos();
foreach ($campos as $campo){
	$id = $campo['id'];
	$titulo = $campo['titulo'];
	$texto1 = $campo['texto1'];
	$texto2 = $campo['texto2'];
	$imagen=$campo['imagen'];
	$galeria1=$campo['galeria1'];
	$galeria2=$campo['galeria2'];
	$galeria3=$campo['galeria3'];
	$galeria4=$campo['galeria4'];
	$mision=$campo['mision'];
	$vision=$campo['vision'];
	$porque=$campo['porque'];
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
          <h1 class="m-0 text-dark">Editar Nosotros</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=nosotros&&action=index">Nosotros</a></li>
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
							<form role="form" action="?controller=nosotros&&action=actualizar&&id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Editar Ventaja</h3>
								</div>
							 <div class="row">
									  <div class="col-4">
										<div class="form-group">
										  <label for="fila2_columna1">Imagen derecha nosotros (570x375)</label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/ >
													 <input type="hidden" name="ruta1" value="<?php echo $imagen;?>" >
												</div>
										</div>
									   </div>

									
									<div class="col-8">
										<div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Titulo (Max 31 letras)</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
													</div>
													<input type="text" name="titulo" value="<?php echo $titulo;?>" class="form-control" id="titulo" placeholder="Título del servicio" maxlength="31" required>
												  </div>
												</div>
											  </div>
										  </div>
										  <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Texto 1 (Negrita) (Max 250 Letras)</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													  <textarea class="form-control" rows="3" name="texto1" id="texto1" placeholder="Ingrese el texto 1" maxlength="250" required><?php echo $texto1;?></textarea>
												  </div>
												</div>
											  </div>
										  </div>
										  <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Texto 2 (Negrita) (Max 250 Letras)</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													  <textarea class="form-control" rows="3" name="texto2" id="texto2" placeholder="Ingrese el texto 1" maxlength="350" required><?php echo $texto2;?></textarea>
												  </div>
												</div>
											  </div>
										  </div>										  
									  </div>					   
								</div>
								<div class="row">
									<div class="col-md-3">
									    <label for="fila2_columna1">Imagen Galeria 1 </label>
										<div class="custom-file">
											 <input name="galeria1" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $galeria1;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/ >
											 <input type="hidden" name="rutag1" value="<?php echo $galeria1;?>" >
										</div>
									</div>
									<div class="col-md-3">
									    <label for="fila2_columna1">Imagen Galeria 2 </label>
										<div class="custom-file">
											 <input name="galeria2" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $galeria2;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/ >
											 <input type="hidden" name="rutag2" value="<?php echo $galeria2;?>" >
										</div>
									</div>
									<div class="col-md-3">
									    <label for="fila2_columna1">Imagen Galeria 3 </label>
										<div class="custom-file">
											 <input name="galeria3" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $galeria3;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/ >
											 <input type="hidden" name="rutag3" value="<?php echo $galeria3;?>" >
										</div>
									</div>
									<div class="col-md-3">
									    <label for="fila2_columna1">Imagen Galeria 4 </label>
										<div class="custom-file">
											 <input name="galeria4" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $galeria4;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/ >
											 <input type="hidden" name="rutag4" value="<?php echo $galeria4;?>" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										  <label for="nombres">Misión</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
											</div>
											  <textarea class="form-control" rows="4" name="mision" id="mision" placeholder="Ingrese la misión de la empresa" maxlength="450" required><?php echo $mision;?></textarea>
										  </div>
										</div>										
									</div>
									<div class="col-md-6">
										<div class="form-group">
										  <label for="nombres">Visión</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
											</div>
											  <textarea class="form-control" rows="4" name="vision" id="vision" placeholder="Ingrese la visión de la empresa" maxlength="450" required><?php echo $vision;?></textarea>
										  </div>
										</div>										
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										  <label for="nombres">Porque comprar con nosotros</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
											</div>
											<textarea class="form-control" rows="4" name="porque" id="porque" placeholder="Ingrese el porque comprar con nosotros" required><?php echo $porque;?></textarea>
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
