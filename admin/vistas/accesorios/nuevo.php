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
          <h1 class="m-0 text-dark">Nuevo Accesorio</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=accesorios&&action=todos">Accesorios</a></li>
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
							<form role="form" action="?controller=accesorios&&action=guardarAccesorio" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Agregar Nuevo Accesorio</h3>
								</div>
								
							 <div class="row">

							 
									  <div class="col-4">
										<input type="text" name="publicado" value="1" style="display: none;">

										<div class="form-group">
														  <label for="sel1">Categoria:<span>*</span></label>
														  <select class="form-control" id="categoria_acc" name="categoria_acc" required="">
																  <option value="" selected>Seleccione...</option>
																<?php
																	$combustibles = Accesorios::obtenerCategorias();
																	foreach($combustibles as $combustible){
																		$id = $combustible['id'];
																		$combustiblev = $combustible['nom_categoria'];
																?>
																<option value="<?php echo $id; ?>"><?php echo $combustiblev; ?></option>
																<?php }?>
														  </select>
													</div>

										 <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Valor Costo</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-dollar"></i></span>
													</div>
													 <input type="text" name="precio_costo" value="" class="form-control" id="precio_costo" placeholder="Precio de costo" required>
												  </div>
												</div>

												

												<div class="form-group">
												  <label for="nombres">P.V.P</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-dollar"></i></span>
													</div>
													 <input type="text" name="precio_publico" value="" class="form-control" id="precio_publico" placeholder="Valor Comercial" required>
												  </div>
												</div>
											  </div>
										  </div>

										

									   </div>

									
									<div class="col-8">
										 <div class="col-12">
											<div class="form-group">
											  <label for="nombres">Nombre del producto</label>
											  <div class="input-group">
												<div class="input-group-prepend">
												  <span class="input-group-text"><i class="fa fa-user"></i></span>
												</div>
												<input type="text" name="nombre_acc" value="" class="form-control" id="nombre_acc" placeholder="Ingresar nombre" required>
											  </div>
											</div>
										  </div>
										<!--  <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Oficio</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="oficio" value="" class="form-control" id="oficio" placeholder="Ingrese oficio del cliente" required>
												  </div>
												</div>
											  </div>
										  </div> -->
										  <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Descripción del producto</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													  <textarea class="form-control" rows="4" name="descripcion" id="descripcion" placeholder="Ingrese la descripción del producto" required></textarea>
												  </div>
												</div>
											  </div>
										  </div>

										    <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Términos y Condiciones</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													  <textarea class="form-control" rows="4" name="terminos" id="terminos" placeholder="Ingrese los términos y condiciones que aplican para el producto" required></textarea>
												  </div>
												</div>
											  </div>
										  </div>
									  </div>

									  	<div class="form-group">
									  		<div class="form-group">
											<div class="col-md-12">
												<label>Imagen Principal</label>
												<div class="custom-file">
													<input name="imagen_principal"  type="file" id="input-file-now" class="dropify" data-default-file="vistas/accesorios/imagenes/no_image.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
												</div>
											 </div>
										</div>
											<div class="row">
												<div class="col-md-3">
													<label>Imagen Nº1</label>
													<div class="custom-file">
														<input name="imagen1"  type="file" id="input-file-now" class="dropify" data-default-file="vistas/accesorios/imagenes/no_image.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
												<div class="col-md-3">
													<label>Imagen Nº2</label>
													<div class="custom-file">
														<input name="imagen2" type="file" id="input-file-now" class="dropify" data-default-file="vistas/accesorios/imagenes/no_image.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
												<div class="col-md-3">
													<label>Imagen Nº3</label>
													<div class="custom-file">
														<input name="imagen3" type="file" id="input-file-now" class="dropify" data-default-file="vistas/accesorios/imagenes/no_image.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
												<div class="col-md-3">
													<label>Imagen Nº4</label>
													<div class="custom-file">
														<input name="imagen4" type="file" id="input-file-now" class="dropify" data-default-file="vistas/accesorios/imagenes/no_image.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<label>Imagen Nº5</label>
													<div class="custom-file">
														<input name="imagen5" type="file" id="input-file-now" class="dropify" data-default-file="vistas/accesorios/imagenes/no_image.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
												<div class="col-md-3">
													<label>Imagen Nº6</label>
													<div class="custom-file">
														<input name="imagen6" type="file" id="input-file-now" class="dropify" data-default-file="vistas/accesorios/imagenes/no_image.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
												<div class="col-md-3">
													<label>Imagen Nº7</label>
													<div class="custom-file">
														<input name="imagen7" type="file" id="input-file-now" class="dropify" data-default-file="vistas/accesorios/imagenes/no_image.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
												<div class="col-md-3">
													<label>Imagen Nº8</label>
													<div class="custom-file">
														<input name="imagen8" type="file" id="input-file-now" class="dropify" data-default-file="vistas/accesorios/imagenes/no_image.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
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
