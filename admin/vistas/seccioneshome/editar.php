<?php 
$campos = $campos->getCampos();
foreach ($campos as $campo){
	$id = $campo['id'];
	$seccion = $campo['seccion'];
	$titulo1 = $campo['titulo1'];
	$titulo2=$campo['titulo2'];
	$lista1=$campo['lista1'];
	$lista2=$campo['lista2'];
	$lista3=$campo['lista3'];
	$texto1=$campo['texto1'];
	$textoboton=$campo['textoboton'];
	$link=$campo['link'];
	$imagen=$campo['imagen'];

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
            <li class="breadcrumb-item active"><a href="?controller=seccioneshome&&action=todos">Secciones Home</a></li>
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
							<form role="form" action="?controller=seccioneshome&&action=actualizarTestimonio&&id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Editar Sección</h3>
								</div>
							 <div class="row">
							 	
							 	<input type="text" name="seccion" value="<?php echo $seccion;?>" style="display: none;">
									  <div class="col-4">
										<div class="form-group">
										  <label for="fila2_columna1">Foto de la Oferta</label>
										<?php 
										if ($id>4) {
											echo("<br><small>Tamaño óptimo 100 px - 100px</small>");
										}
										else
										{
											 echo("<br><small>Tamaño óptimo 570 px - 241px</small>");
										}

										 ?>
										 
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/>
													 <input type="hidden" name="ruta1" value="<?php echo $imagen;?>" >
												</div>
										</div>
									   </div>

									
									<div class="col-8">
										 <div class="col-12">
											<div class="form-group">
											  <label for="nombres">Titulo 1</label>
											  <div class="input-group">
												<div class="input-group-prepend">
												  <span class="input-group-text"><i class="fa fa-user"></i></span>
												</div>
												<input type="text" name="titulo1" value="<?php echo $titulo1;?>" class="form-control" id="titulo1" placeholder="Ingrese el Titulo" >
											  </div>
											</div>
										  </div>
										 <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Titulo 2</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="titulo2" value="<?php echo $titulo2;?>" class="form-control" id="titulo2" placeholder="Sub Titulo" >
												  </div>
												</div>
											  </div>
										  </div>
							<?php if ($id>4) {
								?>
								<input type="text" name="lista1" value="" style="display: none;">
								<input type="text" name="lista2" value="" style="display: none;">
								<input type="text" name="lista3" value="" style="display: none;">
								<div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Texto home</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													  <textarea class="form-control" rows="4" name="texto1" id="texto1" placeholder="Ingrese el texto de la sección" ><?php echo $texto1;?></textarea>
												  </div>
												</div>
											  </div>
										  </div>
								<?php
							} 

							else{
								?>
								<input type="text" name="texto1" value="" style="display: none;">
								  <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Lista 1</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="lista1" value="<?php echo $lista1;?>" class="form-control" id="lista1" placeholder="Lista 1" >
												  </div>
												</div>
											  </div>
										  </div>
										   <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Lista 2</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="lista2" value="<?php echo $lista2;?>" class="form-control" id="lista2" placeholder="Lista 2" >
												  </div>
												</div>
											  </div>
										  </div>

										   <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Lista 3</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="lista3" value="<?php echo $lista3;?>" class="form-control" id="lista3" placeholder="Lista 3" >
												  </div>
												</div>
											  </div>
										  </div>

								<?php
							}
							?>
										
										  <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Link Oferta</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="link" value="<?php echo $link;?>" class="form-control" id="link" placeholder="Link de la Oferta" required>
												  </div>
												</div>
									<?php 
									if ($id<=4) {
										?>
										<div class="form-group">
												  <label for="nombres">Texto Botón</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													<input type="text" name="textoboton" value="<?php echo $textoboton;?>" class="form-control" id="textoboton" placeholder="Texto del botón" required>
												  </div>
												</div>
										<?php
									}
									 ?>
												
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
