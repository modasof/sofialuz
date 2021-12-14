<?php

include_once 'controladores/unidadesmedController.php';
include_once 'modelos/unidadesmed.php';
include_once 'controladores/categoriainsumosController.php';
include_once 'modelos/categoriainsumos.php';

$campos = $campos->getCampos();
foreach ($campos as $campo){
	$id_insumo = $campo['id_insumo'];
	$nombre_insumo = $campo['nombre_insumo'];
	$unidadmedida_id = $campo['unidadmedida_id'];
	$parametrizado = $campo['parametrizado'];
	$cantidadminima = $campo['cantidadminima'];

	$categoriainsumo_id = $campo['categoriainsumo_id'];
	if ($categoriainsumo_id==0) {
		
			$nombrecategoria="";
	}
	else{
		$nombrecategoria= Categoriainsumos::obtenerNombre($categoriainsumo_id);
	}
	
	$nombreunidad= Unidadesmed::obtenerNombre($unidadmedida_id);
}
?>

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector').select2();
    });
});
</script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Editar Insumo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=insumos&&action=todos">Insumos</a></li>
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
							<form role="form" action="?controller=insumos&&action=actualizar&&id=<?php echo $id_insumo; ?>" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Editar Nomnbre de Insumo</h3>
								</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									  <label for="sel1">Seleccione la Categoría al cual está asociado:</label>
									  <select class="form-control mi-selector" id="categoriainsumo_id" name="categoriainsumo_id" required>
										<option value="<?php echo($categoriainsumo_id) ?>" selected><?php echo($nombrecategoria) ?></option>
										<?php
										$rubros = Categoriainsumos::obtenerListaInsumos();
										foreach ($rubros as $campo){
											$nombre = $campo['nombre'];
											$id = $campo['id'];
										?>
										<option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
										<?php } ?>
									  </select>
									</div>
								</div>
									<div class="col-md-6">
									<div class="form-group">
									  <label for="nombres">Nombre Insumo</label>
									   <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
             <input type="text" name="nombre_insumo" value="<?php echo utf8_encode($nombre_insumo);?>" class="form-control" id="nombre_insumo" placeholder="Ingrese el nombre del cliente" maxlength="150" required>
              </div>
									 
									</div>
								  </div>

								  		<div class="col-md-6">
									<div class="form-group">
									  <label for="sel1">Seleccione la Unidad:</label>
									  <select class="form-control mi-selector" id="unidadmedida_id" name="unidadmedida_id" required>
										<option value="<?php echo($unidadmedida_id) ?>" selected><?php echo($nombreunidad); ?></option>
										<?php
										$rubros = Unidadesmed::obtenerListaUnidades();
										foreach ($rubros as $campo){
											$nombre = $campo['nombre'];
											$abreviatura = $campo['abreviatura'];
											$id = $campo['id'];
										?>
										<option value="<?php echo $id; ?>"><?php echo $nombre."- (".$abreviatura.")"; ?></option>
										<?php } ?>
									  </select>
									</div>
								</div>

									<div class="col-md-3">
									<div class="form-group">
									  <label for="sel1">Parámetrizado:</label>
									  <select class="form-control" id="unidadmedida_id" name="parametrizado" required>
										<option value="<?php echo($parametrizado) ?>" selected><?php echo($parametrizado); ?></option>
										<option value="Si">Si</option>
										<option value="No">No</option>
									  </select>
									</div>
								</div>
								<div class="col-md-3">
												<div class="form-group">
													<label>Cantidad Miníma<span>*</span></label>
													<input type="number" step="any" name="cantidadminima" placeholder="Indique la cantidad" class="form-control" required value="<?php echo($cantidadminima) ?>">
													<small>Decimales separados con punto</small>
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
