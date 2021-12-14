<?php 
$campos = $campos->getCampos();
foreach ($campos as $campo){
	$id = $campo['id'];
	$seccion = $campo['seccion'];
	$titulo1_form = $campo['titulo1_form'];
	$titulo2_form=$campo['titulo2_form'];
	$boton_form=$campo['boton_form'];
	$titulo_izq=$campo['titulo_izq'];
	$paso1=$campo['paso1'];
	$paso2=$campo['paso2'];
	$paso3=$campo['paso3'];
	$paso4=$campo['paso4'];
	$paso5=$campo['paso5'];
	$paso6=$campo['paso6'];
	$subtitulo1=$campo['subtitulo1'];
	$subtitulo2=$campo['subtitulo2'];
	$imagen_banner=$campo['imagen_banner'];
	$imagen1=$campo['imagen1'];
	$imagen2=$campo['imagen2'];
	$imagen3=$campo['imagen3'];
	$correo_principal=$campo['correo_principal'];
	$correo_copia=$campo['correo_copia'];


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
          <h1 class="m-0 text-dark">Editar Sección <?php echo $seccion; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <!-- <li class="breadcrumb-item active"><a href="?controller=seccioneshome&&action=todos">Secciones Home</a></li> -->
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
							<form role="form" action="?controller=contenidoseccion&&action=actualizarContenidoseccion&&id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Editar Sección <?php echo($seccion); ?></h3>
								</div>
							 <div class="row">
							 	
							 	<input type="text" name="seccion" value="<?php echo $seccion;?>" style="display: none;">
									  <div class="col-12">
										<div class="form-group">
										  <label for="fila2_columna1">Imagen del Banner</label>
										
											 <br><small>Tamaño óptimo 1920 px - 700px</small>
										
												<div class="custom-file">
													 <input name="imagen_banner" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen_banner;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/>
													 <input name="imagen_banner2" type="hidden" value="<?php echo $imagen_banner; ?>">
												</div>
										</div>
									   </div>


									<div class="col-6">
										<hr>
									<h3>Configuración Banner Izquierdo</h3>
										 <div class="col-12">
											<div class="form-group">
											  <label for="nombres">Titulo</label>
											  <div class="input-group">
												<div class="input-group-prepend">
												  <span class="input-group-text"><i class="fa fa-user"></i></span>
												</div>
												<input type="text" name="titulo_izq" value="<?php echo utf8_encode($titulo_izq);?>" class="form-control" id="titulo_izq" placeholder="Ingrese el Titulo" >
											  </div>
											</div>
										  </div>
										   <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Paso 1</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="paso1" value="<?php echo utf8_encode($paso1);?>" class="form-control" id="paso1" placeholder="Paso 1" >
												  </div>
												</div>
											  </div>
										  </div>
								  <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Paso 2</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="paso2" value="<?php echo utf8_encode($paso2);?>" class="form-control" id="paso2" placeholder="Paso 2" >
												  </div>
												</div>
											  </div>
										  </div>
										   <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Paso 3</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="paso3" value="<?php echo utf8_encode($paso3);?>" class="form-control" id="paso3" placeholder="Paso 3" >
												  </div>
												</div>
											  </div>
										  </div>

										   <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Paso 4</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="paso4" value="<?php echo utf8_encode($paso4);?>" class="form-control" id="paso4" placeholder="Paso 4" >
												  </div>
												</div>
											  </div>
										  </div>

							
										
										  <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Subtitulo 1</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="subtitulo1" value="<?php echo utf8_encode($subtitulo1);?>" class="form-control" id="subtitulo1" placeholder="subtitulo 1" required>
												  </div>
												</div>
									
										<div class="form-group">
												  <label for="nombres">Subtitulo 2</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="subtitulo2" value="<?php echo utf8_encode($subtitulo2);?>" class="form-control" id="subtitulo2" placeholder="subtitulo 2" required>
												  </div>
												</div>
											
											  </div>
										  </div>
										 
									  </div>
									  <div class="col-6">
									  	<hr>
									<h3>Configuración Formulario Derecha</h3>
									  	 <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Titulo Formulario</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<textarea name="titulo1_form" class="form-control" rows="2"><?php echo utf8_encode($titulo1_form);?></textarea>
													
												  </div>
												</div>
												<div class="form-group">
												  <label for="nombres">Call to action</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="boton_form" value="<?php echo utf8_encode($boton_form);?>" class="form-control" id="boton_form" placeholder="Call to action" >
												  </div>
												</div>
											  </div>
										  </div>
										  
										  <hr>
										  <h3>Correos de confirmación:</h3>
										   <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Indique el correo principal</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="correo_principal" value="<?php echo ($correo_principal);?>" class="form-control" id="correo_principal" placeholder="correo principal" >
												  </div>
												</div>
											  </div>
											   <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Indique el correo secundario</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="correo_copia" value="<?php echo ($correo_copia);?>" class="form-control" id="correo_copia" placeholder="correo copia" >
												  </div>
												</div>
											  </div>
										  </div>

										
									  </div>	
									  <div class="col-12">
									  	<div class="col-12">
										<div class="form-group">
										  <label for="fila2_columna1">Imagen publicitaria</label>
										
											 <br><small>Tamaño óptimo 1170 px - 133px</small>
										
												<div class="custom-file">
													 <input name="imagen1" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen1;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/>
													 <input type="hidden" name="imagen1c" value="<?php echo $imagen1;?>" >
												</div>
										</div>
									   </div>
									  </div>

									  

									  

							<div class="card-footer">
							  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Actualizar Contenido</button>
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
