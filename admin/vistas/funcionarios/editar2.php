<?php
$campos = $campos->getCampos();
foreach ($campos as $campo){
		$imagen = $campo['imagen'];
		$id_funcionario = $campo['id_funcionario'];
		$nombre_funcionario = $campo['nombre_funcionario'];
        $documento = $campo['documento'];
        $fecha_ingreso = $campo['fecha_ingreso'];
        $tipo_contrato = $campo['tipo_contrato'];
        $observaciones = $campo['observaciones'];
        $cargo_id_cargo = $campo['cargo_id_cargo'];
        $nombrecargo=Funcionarios::ObtenerNombreCargo($cargo_id_cargo);
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
          <h1 class="m-0 text-dark">Editar Usuario </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=funcionarios&&action=todos">Usuarios</a></li>
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
							<form role="form" action="?controller=funcionarios&&action=actualizar&&id=<?php echo $id_funcionario; ?>" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Editar Usuario</h3>
								</div>
							 <div class="row">
									  <div class="col-12">
										<div class="form-group">
										  <label for="fila2_columna1">Foto de perfil</label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/>
													 <input type="hidden" name="ruta1" value="<?php echo $imagen;?>" >
												</div>
										</div>
									   </div>
						
								 <div class="col-sm-12 col-xs-12">
									<div class="form-group">
									  <label for="nombres">Nombre completo del Funcionario</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="nombre_funcionario" value="<?php echo utf8_encode($nombre_funcionario) ?>" class="form-control" id="nombre_funcionario" placeholder="Ingrese el nombre completo del usuario"  required>
             				 </div>
									 
									</div>
								  </div>
								 <div class="col-sm-6 col-xs-12">
									<div class="form-group">
									  <label for="documento">Documento</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="documento" value="<?php echo utf8_encode($documento) ?>" class="form-control" id="documento" placeholder="Ingrese el número de documento" required>
             				 </div>
									 
									</div>
								  </div>
								  
								   <div class="col-sm-6 col-xs-12">
									<div class="form-group">
									  <label for="sel1">Cargo del Funcionario:</label>
									  <select class="form-control" id="cargo_id_cargo" name="cargo_id_cargo" required>
										<option value="<?php echo utf8_encode($cargo_id_cargo) ?>" selected><?php echo utf8_encode($nombrecargo) ?></option>
										<?php
										$rubros = Funcionarios::obtenerCargos();
										foreach ($rubros as $campo){
											$id_cargo = $campo['id_cargo'];
											$nombre_cargo = $campo['nombre_cargo'];
										?>
										<option value="<?php echo $id_cargo; ?>"><?php echo $nombre_cargo; ?></option>
										<?php } ?>
									  </select>
									</div>
								</div>
								  <div class="col-sm-6 col-xs-12">
									<div class="form-group">
									  <label for="sel1">Tipo de Contrato:</label>
									  <select class="form-control" id="tipo_contrato" name="tipo_contrato" required>
										<option value="<?php echo utf8_encode($tipo_contrato) ?>" selected><?php echo utf8_encode($tipo_contrato) ?></option>
										<option value="Indefinido">Indefinido</option>
										<option value="Prestación de Servicios">Prestación de Servicios</option>
									  </select>
									</div>
								</div>
								 <div class="col-sm-6 col-xs-12">
												<div class="form-group">
													<label>Fecha Ingreso: <span>*</span></label>
													<input type="date" name="fecha_ingreso" placeholder="Fecha" class="form-control required" required id="fecha_ingreso" value="<?php echo utf8_encode($fecha_ingreso) ?>">
												</div>
								</div>
								 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Observaciones (Máx 500 Carácteres)</label>
													  <textarea class="form-control" rows="4" name="observaciones" id="descripcion" placeholder="Ingrese alguna observación" maxlength="500" required>
													  	
													  	<?php echo utf8_encode($observaciones) ?>
													  </textarea>
												 
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
