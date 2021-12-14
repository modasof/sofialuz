<?php
 $IdSesion = $_SESSION['IdUser'];
$modulo_gestion = $_GET['id_modulo'];
$id_cuenta = $_GET['id'];
$campos = $campos->getCampos();
foreach ($campos as $campo){
	$id = $campo['id_registro'];
	$imagen=$campo['imagen'];
    $documento_id_documento = $campo['documento_id_documento'];
    $modulo_id_modulo= $campo['modulo_id_modulo'];
    $cuenda_id_cuenta = $campo['cuenta_id_cuenta'];
    $alerta = $campo['alerta'];
    $fecha_expiracion = $campo['fecha_expiracion'];
    $marca_temporal = $campo['marca_temporal'];
    $nombredocumento=Gestiondocumental::ObtenerNombredocumento($documento_id_documento);
    if ($modulo_id_modulo==1) {
    	$asociado=Gestiondocumental::ObtenerNombrecuenta($cuenda_id_cuenta);
    }
   	elseif ($modulo_id_modulo==2) {
   		$asociado=Gestiondocumental::ObtenerNombreEquipo($cuenda_id_cuenta);
   	}
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
          <h1 class="m-0 text-dark">Editar Documento</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=gestiondocumental&&action=todos&&id_modulo=<?php echo($modulo_gestion); ?>&&id=<?php echo($id_cuenta); ?>">Documentos</a></li>
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
							<form role="form" action="?controller=gestiondocumental&&action=actualizar&&idreg=<?php echo $id; ?>&&id_modulo=<?php echo($modulo_gestion); ?>&&id=<?php echo($id_cuenta) ?>" method="POST" enctype="multipart/form-data">
								<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								?>
							<input type="hidden" name="modulo_id_modulo" value="<?php echo($modulo_gestion); ?>">
							<input type="hidden" name="creado_por" value="<?php echo($IdSesion); ?>">
							
							<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">
							
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Editar Documento</h3>
								</div>
							 <div class="row">
									  <div class="col-12">
										<div class="form-group">
										  <label for="fila2_columna1">Actualizar Documento</label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/>
													 <input type="hidden" name="ruta1" value="<?php echo $imagen;?>" >
												</div>
										</div>
									   </div>
							</div>
							<div class="row">
								
								 <div class="col-12">
									<div class="form-group">
											<label for="sel1">Tipo Documento:<span>*</span></label>
														  <select class="form-control"  name="documento_id_documento" >
															<option selected="" value="<?php echo($documento_id_documento) ?>" selected><?php echo utf8_encode($nombredocumento) ?></option>
																<?php
																	$cajas = Gestiondocumental::obtenerDocumentos($modulo_gestion);
																	foreach($cajas as $caja){
																		$id_documento = $caja['id_documento'];
																		$nombre_documento = $caja['nombre_documento'];
																?>
																<option value="<?php echo $id_documento; ?>"><?php echo utf8_encode($nombre_documento); ?></option>
																<?php }?>
														  </select>
													</div>
								  </div>
							<?php 
								if ($modulo_gestion==1) {
								 ?>
								   <div style="display: none;" class="col-6">
									<div class="form-group">
											<label for="sel1">Asociar documento a Cuenta:<span>*</span></label>
														  <select class="form-control"  name="cuenta_id_cuenta" >
																  <option selected="" value="<?php echo($cuenda_id_cuenta) ?>" selected><?php echo utf8_encode($asociado) ?></option>
																<?php
																	$cajas = Gestiondocumental::obtenerCuentas();
																	foreach($cajas as $caja){
																		$id_cuenta = $caja['id_cuenta'];
																		$nombre_cuenta = $caja['nombre_cuenta'];
																?>
																<option value="<?php echo $id_cuenta; ?>"><?php echo utf8_encode($nombre_cuenta); ?></option>
																<?php }?>
														  </select>
													</div>
								  </div>
								  <?php 
								} 
								elseif ($modulo_gestion==2) {
								   ?>
								    <div class="col-6">
									<div class="form-group">
											<label for="sel1">Asociar documento a Equipo:<span>*</span></label>
														  <select class="form-control"  name="cuenta_id_cuenta" >
																  <option selected="" value="<?php echo($cuenda_id_cuenta) ?>" selected><?php echo utf8_encode($asociado) ?></option>
																<?php
																	$cajas = Gestiondocumental::obtenerEquipos();
																	foreach($cajas as $caja){
																		$id = $caja['id_equipo'];
																		$nombre = $caja['nombre_equipo'];
																?>
																<option value="<?php echo $id; ?>"><?php echo utf8_encode($nombre); ?></option>
																<?php }?>
														  </select>
													</div>
								  </div>
								   <?php 
								}
								    ?>
								   <div class="col-md-3">
												<div class="form-group">
													<label>Alerta de expiración: <span>*</span></label>
													 <select class="form-control"  name="alerta" required="" id="alerta">
															<option selected="" value="<?php echo($alerta) ?>" selected><?php echo utf8_encode($alerta) ?></option>
															<option value="Si">Si</option>
															<option value="No">No</option>
															
														  </select>
												</div>
											</div>
								  <div  id="divfecha" class="col-md-3">
												<div class="form-group">
													<label>Expira el día: <span>*</span></label>
													<input type="date" name="fecha_expiracion" placeholder="Fecha" class="form-control"  id="fecha_expiracion" value="<?php echo($fecha_expiracion) ?>">
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
