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
          <h1 class="m-0 text-dark">Nueva cuenta</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=cuentas&&action=todos">Cuentas</a></li>
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
							<form role="form" action="?controller=cuentas&&action=guardar" method="POST" enctype="multipart/form-data">
								<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								?>
							<input type="hidden" name="saldo_inicial" value="0">
							<input type="hidden" name="estado_cuenta" value="1">
							<input type="hidden" name="creado_por" value="1">
							<input type="hidden" name="cuenta_publicada" value="1">
							<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">

							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Agregar Nueva Cuenta</h3>
								</div>

								
							<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Indique el nombre de la cuenta: <span>*</span></label>
													<input type="text" name="nombre_cuenta" placeholder="Nombre de la cuenta" class="form-control required" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Número de cuenta<span>*</span></label>
													<input type="number" name="numero_cuenta" placeholder="Digite el número de cuenta" class="form-control required" required>
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label>Banco<span>*</span></label>
													<input type="text" name="banco" placeholder="Digite el Banco" class="form-control required" required>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Tipo cuenta: <span>*</span></label>
													
													 <select class="form-control"  name="tipo_cuenta" required="">
															<option value="" selected="">Seleccione una opción....</option>
															<option value="Ahorros">Ahorros</option>
															<option value="Corriente">Corriente</option>
															
														  </select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>NIT/CC<span>*</span></label>
													<input type="number" name="cc_cuenta" placeholder="Nit / Cédula" class="form-control required" required>
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label>Representante Legal<span>*</span></label>
													<input type="text" name="representante" placeholder="Digite el Representante" class="form-control required" required>
												</div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group">
													<label>Observaciones<span>*</span></label>
													  <textarea class="form-control" rows="5" id="descripcion" name="observaciones"></textarea>
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
