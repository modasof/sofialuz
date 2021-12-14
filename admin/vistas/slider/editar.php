<?php
$campos = $campos->getCampos();
foreach ($campos as $campo){
	$id = $campo['id'];
	$imagen=$campo['imagen'];
	$direccion = $campo['direccion'];
	$imagentitulo=$campo['imagentitulo'];
	$texto=$campo['texto'];
	$textoboton1=$campo['textoboton1'];
	$textoboton2=$campo['textoboton2'];
	$enlaceboton1=$campo['enlaceboton1'];
	$enlaceboton2=$campo['enlaceboton2'];
	$orden_salida=$campo['orden_salida'];

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
          <h1 class="m-0 text-dark">Editar Slider</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=slider&&action=todos">Sliders</a></li>
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
							<form role="form" action="?controller=slider&&action=actualizar&&id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Editar Slider</h3>
								</div>
							 <div class="row">
									  <div class="col-12">
										<div class="form-group">
										  <label for="fila2_columna1">Imagen Principal del Slider</label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/>
													 <input type="hidden" name="ruta1" value="<?php echo $imagen;?>" >
												</div>
										</div>
									   </div>
							</div>
							<div style="display: none;" class="row">
									  <div class="col-12">
										<div class="form-group">
										  <label for="fila2_columna1">Titulo del Slider (Imagen PNG con Transparencia)</label>
												<div class="custom-file">
													 <input name="imagentitulo" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagentitulo;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/>
													 <input type="hidden" name="ruta2" value="<?php echo $imagentitulo;?>" >
												</div>
										</div>
									   </div>
							</div>
							<div class="row">
								<div style="display: none;" class="col-3">
									 <div class="form-group">
									  <label for="direccion">Seleccione la dirección del texto</label>
									  <select class="form-control" id="direccion" name="direccion">
										<option value="<?php echo $direccion;?>" selected><?php echo $direccion;?></option>
										<option value="Derecha">Derecha</option>
										<option value="Izquierda">Izquierda</option>
									  </select>
									</div>
								</div>
								<div style="display: none;" class="col-9">
									<div class="form-group">
									  <label for="nombres">Texto del Slider (Para nueva linea escribir &lt;br&gt;)</label>
									  <div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
										</div>
										<textarea class="form-control" rows="2" name="texto" id="texto" placeholder="Ingrese la descripción del slider" maxlength="120" ><?php echo $texto;?></textarea>

									  </div>
									</div>
								</div>
							</div>
							<div class="row">
								<div style="display: none;" class="col-3">
									<div class="form-group">
									  <label for="nombres">Texto Botón 1 (Max 15 letras)</label>
									  <div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
										</div>
										<input type="text" name="textoboton1" value="<?php echo $textoboton1;?>" class="form-control" id="textoboton1" placeholder="Texto Boton 1" maxlength="15" required>
									  </div>
									</div>
								</div>
								<div  class="col-3">
									<div class="form-group">
									  <label for="nombres">Orden de Salida</label>
									  <div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
										</div>
										<input type="text" name="orden_salida" value="<?php echo $orden_salida;?>" class="form-control" id="orden_salida" placeholder="Texto Boton 1" maxlength="15" required>
									  </div>
									</div>
								</div>
								<div class="col-9">
									<div class="form-group">
									  <label for="nombres">Enlace Slider</label>
									  <div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text"><i class="fa fa-link"></i></span>
										</div>
										<input type="text" name="enlaceboton1" value="<?php echo $enlaceboton1;?>" class="form-control" id="enlaceboton1" placeholder="Enlace del botón 1" required>
									  </div>
									</div>
								</div>
							</div>
							<div style="display: none;" class="row">
								<div class="col-3">
									<div class="form-group">
									  <label for="nombres">Texto Botón 2 (Max 15 letras)</label>
									  <div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
										</div>
										<input type="text" name="textoboton2" value="<?php echo $textoboton2;?>" class="form-control" id="textoboton2" placeholder="Texto Boton 2" maxlength="15" required>
									  </div>
									</div>
								</div>
								<div class="col-9">
									<div class="form-group">
									  <label for="nombres">Enlace Botón 2</label>
									  <div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
										</div>
										<input type="text" name="enlaceboton2" value="<?php echo $enlaceboton2;?>" class="form-control" id="enlaceboton2" placeholder="Enlace del botón 2" required>
									  </div>
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
