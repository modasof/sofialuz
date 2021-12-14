<?php
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
$campos = $campos->getCampos();
foreach ($campos as $campo){

	$id_caja = $campo['id_caja'];
	$nombre_caja=$campo['nombre_caja'];
	$saldo_inicial=$campo['saldo_inicial'];
	$usuario_id_usuario = $campo['usuario_id_usuario'];
	$marca_temporal=$campo['marca_temporal'];
	$estado_caja=$campo['estado_caja'];
	$caja_publicada=$campo['caja_publicada'];
	$creada_por=$campo['creada_por'];
	$observaciones=$campo['observaciones'];
	$nombreusuario=Usuarios::obtenerNombreUsuario($usuario_id_usuario);
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
          <h1 class="m-0 text-dark">Editar Caja</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=cajas&&action=todos">Cajas</a></li>
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
							<form role="form" action="?controller=cajas&&action=actualizar&&id_caja=<?php echo $id_caja;?>" method="POST" enctype="multipart/form-data">
							<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								?>
							
							<input type="hidden" name="estado_caja" value="1">
							<input type="hidden" name="creada_por" value="1">
							<input type="hidden" name="caja_publicada" value="1">
							<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">

							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Editar Caja: <?php echo utf8_encode($nombre_caja); ?></h3>
								</div>

								
							<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Nombre de la caja: <span>*</span></label>
													<input type="text" name="nombre_caja" placeholder="Nombre de la caja" class="form-control required" required value="<?php echo utf8_encode($nombre_caja) ?>">
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label>Valor con que inicia la caja: <span>*</span></label>
													<input type="text" name="saldo_inicial" placeholder="Valor con que inicia" class="form-control required" required id="demo1" value="<?php echo ($saldo_inicial) ?>">
												</div>
											</div>

											<div  id="" class="col-md-6">
												<div class="form-group">
													<label> Asignada al Usuario: <span>*</span></label>
								<select class="form-control" id="usuario_id_usuario" name="usuario_id_usuario" required>
										<option value="<?php echo($usuario_id_usuario) ?>" selected ><?php echo($nombreusuario); ?></option>
										<?php
										$rubros = Usuarios::ListaUsuariosSofia();
										foreach ($rubros as $campo){
											$id_usuario = $campo['id_usuario'];
											$nombre_usuario = $campo['nombre_usuario'];
										?>
										<option value="<?php echo $id_usuario; ?>"><?php echo utf8_encode($nombre_usuario); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group">
													<label>Observaciones<span>*</span></label>
													  <textarea class="form-control" rows="5" id="descripcion" name="observaciones"><?php echo utf8_encode($observaciones); ?>
													  </textarea>
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
<!-- Inicio Libreria formato moneda -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script src="dist/js/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">			
$("#demo1").maskMoney({
prefix:'$ ', // The symbol to be displayed before the value entered by the user
allowZero:true, // Prevent users from inputing zero
allowNegative:true, // Prevent users from inputing negative values
defaultZero:false, // when the user enters the field, it sets a default mask using zero
thousands: '.', // The thousands separator
decimal: '.' , // The decimal separator
precision: 0, // How many decimal places are allowed
affixesStay : true, // set if the symbol will stay in the field after the user exits the field. 
symbolPosition : 'left' // use this setting to position the symbol at the left or right side of the value. default 'left'
}); //
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
