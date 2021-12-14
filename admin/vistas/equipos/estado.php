<?php
ini_set('display_errors', '0');

include_once 'controladores/equiposController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/usuarios.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];

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
          <h1 class="m-0 text-dark">Estado Equipo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=equipos&&action=todos">Equipos</a></li>
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
							<form role="form" action="?controller=equipos&&action=guardarestado" method="POST" enctype="multipart/form-data" autocomplete="off">
								<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								// nombre_equipo, marca_equipo, serial_equipo, modelo, unidad_trabajo, tipo_equipo, placa, propietario, estado_equipo, equipo_publicado, creado_por, marca_temporal, observaciones
								?>
							
			
							<input type="hidden" name="creado_por" value="<?php echo($IdSesion); ?>">
							<input type="hidden" name="estado_publicado" value="1">
							<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">

							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Estado Equipo</h3>
								</div>

								
							<div class="row">
								  <div class="col-md-3">
                        <div class="form-group">
                          <label>Fecha del Reporte: <span>*</span></label>
                          <input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte">
                        </div>
                      </div>	
											  <div id="divplaca" class="col-md-3">
                        <div class="form-group">
            <label> 

             
              Seleccione el Equipo: <span>*</span></label><br>
                <select  class="form-control mi-selector" id="equipo_id_equipo" name="equipo_id_equipo" required>
                    <option value="" selected>Seleccionar...</option>
                    <?php

                    $rubros = Equipos::obtenerListaEquiposAsf();
                    foreach ($rubros as $campo){
                      $id_equipo = $campo['id_equipo'];
                      $nombre_equipo = $campo['nombre_equipo'];
                    ?>
                    <option value="<?php echo $id_equipo; ?>"><?php echo utf8_encode($nombre_equipo); ?></option>
                    <?php } ?>
                </select>
                        </div>
                      </div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Estado del Equipo: <span>*</span></label>
													
													 <select class="form-control mi-selector" id="estado_sel" name="estado_sel" required="">
															<option value="" selected="">Seleccione una opción....</option>
															<option value="Operativo">Operativo</option>
															<option value="En Mantenimiento">En Mantenimiento</option>
															<option value="Fuera de Servicio">Fuera de Servicio</option>
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Tiempo de Reparación: <span>*</span></label>
													
													 <select class="form-control mi-selector" id="tiempo" name="tiempo" required="">
															<option value="" selected="">Seleccione una opción....</option>
															<option value="No Aplica">No Aplica</option>
															<option value="Medio dia">Medio Día</option>
															<option value="Un dia">Un día</option>
															<option value="Dos dias">Dos días</option>
															<option value="Tres dias">Tres días</option>
															<option value="Cuatro dias">Cuatro días</option>
															<option value="Cinco dias">Cindo días</option>
															<option value="Mas de una semana">Más de una semana</option>
													</select>
												</div>
											</div>
										
											<div class="col-md-12">
												<div class="form-group">
													<label>Detalle del Estado: <span>*</span></label>
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

<!-- Inicio Libreria formato moneda -->
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
