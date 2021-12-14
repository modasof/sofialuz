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
          <h1 class="m-0 text-dark">Agregar / Disminuir Insumo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=insumos&&action=todos">Insumo</a></li>
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
							<form role="form" action="?controller=insumoscampamento&&action=guardar" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="estado_insumo" value="1">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Agregar o Disminuir insumo</h3>
								</div>
							
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
										  <label for="sel1">Tipo Movimiento:</label>
										  <select class="form-control" id="tipomovimiento" name="tipomovimiento" required>
											<option value="" selected>Seleccione Tipo Movimiento</option>
											<?php
											
											foreach ($listamovimientos as $listamovimiento){
												$tipo_movimiento = $listamovimiento['tipo_movimiento'];
												$idmovimiento = $listamovimiento['id'];
											?>
											<option value="<?php echo $idmovimiento; ?>"><?php echo $tipo_movimiento; ?></option>
											<?php } ?>
										  </select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										  <label for="sel1">Seleccione el Insumo:</label>
										  <select class="form-control" id="insumo_id_insumo" name="insumo_id_insumo" required>
											<option value="" selected>Seleccione un Insumo</option>
											<?php
											
											foreach ($insumos as $insumo){
												$nombre_insumo = $insumo['nombre_insumo'];
												$id_insumo = $insumo['id_insumo'];
											?>
											<option value="<?php echo $id_insumo; ?>"><?php echo $nombre_insumo; ?></option>
											<?php } ?>
										  </select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										  <label for="sel1">Seleccione el Campamento:</label>
										  <select class="form-control" id="campamento_id_campamento" name="campamento_id_campamento" required>
											<option value="" selected>Seleccione un Campamento</option>
											<?php
											
											foreach ($campamentos as $campamento){
												$nombre_campamento = $campamento['nombre_campamento'];
												$id_campamento = $campamento['id_campamento'];
											?>
											<option value="<?php echo $id_campamento; ?>"><?php echo $nombre_campamento; ?></option>
											<?php } ?>
										  </select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										  <label for="nombres">Cantidad:</label>
										  <div class="input-group">
							                <span class="input-group-addon"><i class="fa fa-check"></i></span>
							                <input type="number" name="cantidad" value="" class="form-control" id="cantidad" placeholder="Cantidad"  min="0" required>
							              </div>
										 
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
										  <label for="nombres">Observacion:</label>
										  <div class="input-group">
							                <span class="input-group-addon"><i class="fa fa-check"></i></span>
							                <input type="text" name="observacion" value="" class="form-control" id="observacion" placeholder="Observacion">
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
