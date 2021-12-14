<?php 

include_once 'modelos/estadosreq.php';
include_once 'controladores/estadosreqController.php';


$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];

$idreq=$_GET['id'];
$getdespacho=$_GET['des'];

 ?>
<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('select2').select2();
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
          <h1 class="m-0 text-dark">Gestionar Items Requisición: <?php echo($idreq); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=requisicionesitems&&action=todosporreq&id=<?php echo($idreq); ?>">Requisición Núm: <?php echo($idreq); ?></a></li>
            <?php
            	if ($RolSesion==1 or $RolSesion==13) {
            	 	?>
            	 	<li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=todosalmacen&&cargo=<?php echo($RolSesion);?>">Ver Requisiciones</a></li>
            	 	
            	 	<?php
            	 }else{
            	 	?>
            	 		<li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=todosmiusuario&&id=<?php echo($IdSesion); ?>">Ver Requisiciones</a></li>
            	 	<?php
            	 }
             ?>
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
							<form role="form" action="?controller=requisicionesitems&action=actualizarestado&&id=<?php echo($idreq); ?>&&cargo=<?php echo($RolSesion); ?>" method="POST" enctype="multipart/form-data">

								<input type="hidden" name="usuario_creador" value="<?php echo($IdSesion) ?>">
								
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Cambiar Estado</h3>
								</div>
							
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">

										  <label for="sel1">Lista de Estados:</label>
										  <select class="form-control select2" id="estado_item" name="estado_item" required>
											<option value="" selected>Seleccionar...</option>
										<?php
										$rubros = Estadosreq::ObtenerListaEstados();
										foreach ($rubros as $campo){
											$id = $campo['id'];
											$nombre = $campo['nombre'];
										?>
										<option value="<?php echo $id; ?>"><?php echo utf8_encode($nombre); ?></option>
										<?php } ?>
										  </select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										  <label for="sel1">Items Requisiciones (separados por coma(,) :</label>
										  <div class="input-group">
							                <span class="input-group-addon"><i class="fa fa-check"></i></span>
							                <input type="text" name="items" value="<?php echo $getdespacho;?>" class="form-control" id="items" placeholder="Items separados por coma(,)" >
							              </div>
										</div>
									</div>
									<div class="col-md-6">
												<div class="form-group">
													<label>Observaciones<span>*</span></label>
									<textarea class="form-control" rows="2" id="descripcion" name="observaciones"></textarea>
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

<script>
  $(function () {

    $('.select2').select2()


  })
</script>

<style type="text/css">
	.select2-container--default .select2-selection--multiple .select2-selection__choice {
	    background-color: navy;
	    border: 1px solid #aaa;
	    border-radius: 4px;
	    cursor: default;
	    float: left;
	    margin-right: 5px;
	    margin-top: 5px;
	    padding: 0 5px;
	}

</style>
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
