<?php
$campos = $campos->getCampos();
foreach ($campos as $campo){
	$id = $campo['id'];
	$titulo = $campo['titulo'];
	$noticia = utf8_encode($campo['noticia']);
	$imagen1=$campo['imagen1'];
	$imagen2=$campo['imagen2'];
	$imagen3=$campo['imagen3'];
	$id_categoria = $campo['id_categoria'];
	$categoria = Noticias::obtenerCategoriaPor($id_categoria);
}
?>

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">

<link rel="stylesheet" href="plugins/editor/jquery.cleditor.css" />
<script src="plugins/editor/jquery.cleditor.min.js"></script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Nueva Noticia</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=noticias&&action=todos">Noticias</a></li>
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
							<form role="form" action="?controller=noticias&&action=actualizar&&id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Editar Noticias</h3>
								</div>
							 <div class="row">
									  <div class="col-lg-12">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="fila2_columna1">Imagen Principal</label>
													<div class="custom-file">
														 <input name="imagen1" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen1;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/ >
														 <input type="hidden" name="ruta1" value="<?php echo $imagen1;?>" >
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="fila2_columna1">Imagen Secundaria</label>
													<div class="custom-file">
														 <input name="imagen2" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen2;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/>
														 <input type="hidden" name="ruta2" value="<?php echo $imagen2;?>" >
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="fila2_columna1">Imagen Otra</label>
													<div class="custom-file">
														 <input name="imagen3" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen3;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/ >
														 <input type="hidden" name="ruta3" value="<?php echo $imagen3;?>" >
													</div>
												</div>
											</div>
										</div>
									   </div>


									<div class="col-12">
										 <div class="col-md-12">
											<div class="form-group">
											  <label for="nombres">Titulo de la noticia</label>
											  <div class="input-group">
												<div class="input-group-prepend">
												  <span class="input-group-text"><i class="fa fa-user"></i></span>
												</div>
												<input type="text" name="titulo" value="<?php echo $titulo;?>" class="form-control" id="titulo" placeholder="Ingrese el Titulo de la noticia" required>
											  </div>
											</div>
										  </div>

										  <div class="row">
											 <div class="col-md-12">
												<div class="form-group">
												  <label for="nombres">Redacte aqui su noticia</label>
												  <div class="input-group">
													  <textarea class="form-control" rows="8" name="noticia" id="testimonio" placeholder="Ingrese el testimonio del cliente" required><?php echo $noticia;?></textarea>
												  </div>
												</div>
											  </div>
										  </div>
										  <div class="row">
											  <div class="col-md-6">
													 <div class="form-group">
													  <label for="sel1">Categoría de la noticia</label>
													  <select class="form-control" id="sel1" name="id_categoria" required>
														  <option value="<?php echo $id_categoria?>" selected><?php echo $categoria ?></option>
														<?php
														$campos = Noticias::obtenerCategoria();
														foreach ($campos as $campo){
															$categoria = $campo['categoria'];
															$id_categoria = $campo['id'];
														?>
															<option value="<?php echo $id_categoria?>"><?php echo $categoria ?></option>
														<?php
														}
														?>
													  </select>
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

<script>
   $(document).ready(function () { $("#testimonio").cleditor(); });
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
