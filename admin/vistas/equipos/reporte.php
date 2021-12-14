<?php
$IdSesion = $_SESSION['IdUser'];
$campos = $campos->getCampos();
foreach ($campos as $campo){
// equipo_id_equipo, fecha_reporte, funcionario_id_funcionario, valor_reporte, num_trabajado, unidad_trabajo, num_galones, valor_combustible, observaciones, marca_temporal, creado_por, reporte_publicado, estado_reporte
			$id_equipo = $campo['id_equipo'];
            $nombre_equipo = $campo['nombre_equipo'];
            $marca_equipo = $campo['marca_equipo'];
            $serial_equipo = $campo['serial_equipo'];
             $modelo = $campo['modelo'];
             $unidad_trabajo = $campo['unidad_trabajo'];
            $tipo_equipo = $campo['tipo_equipo'];
            $placa = $campo['placa'];
             $propietario = $campo['propietario'];
             $valor_unidad = $campo['valor_unidad'];
			 $observaciones = $campo['observaciones'];
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
          <h1 class="m-0 text-dark">Reporte <?php echo utf8_encode($nombre_equipo) ?></h1>
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
							<form role="form" action="?controller=equipos&&action=guardareporte" method="POST" enctype="multipart/form-data" autocomplete="off">
							<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								?>
							<input type="hidden" name="creado_por" value="<?php echo($IdSesion) ?>">
							<input type="hidden" name="reporte_publicado" value="1">
							<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">
							<input type="hidden" name="estado_reporte" value="1">
							<input type="hidden" name="equipo_id_equipo" value="<?php echo($id_equipo) ?>">
							<input type="hidden" name="valor_reporte" value="<?php echo($valor_unidad) ?>">
							  <div class="card-body">
								
							<div class="row">
											
								<div class="col-sm-6 col-xs-12">
									<div class="form-group">
									  <label for="sel1">Selecione el Funcioario:</label>
						<select class="form-control" id="funcionario_id_funcionario" name="funcionario_id_funcionario" required>
										<option value="" selected>Seleccione el funcionario</option>
										<?php
										$rubros = Equipos::obtenerFuncionarios();
										foreach ($rubros as $campo){
											$id_funcionario = $campo['id_funcionario'];
											$nombre_funcionario = $campo['nombre_funcionario'];
										?>
										<option value="<?php echo $id_funcionario; ?>"><?php echo $nombre_funcionario; ?></option>
										<?php } ?>
									  </select>
									</div>
								</div>
											
											
											 <div class="col-sm-6 col-xs-12">
												<div class="form-group">
													<label>Fecha Reporte: <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Indique el número de Horas trabajadas<span>*</span></label>
													<input type="number" step="any" name="num_trabajado" placeholder="Indique el número de horas trabajadas" class="form-control" required value="">
													<small>Decimales separados con punto</small>
												</div>
											</div>
											<div style="display: none;" class="col-md-6">
												<div class="form-group">
													<label>Unidad de Trabajo: <span>*</span></label>
													
													 <select class="form-control"  name="unidad_trabajo" required="">
															
															<option selected="true" value="HR">Horas</option>
															<option value="DIA">Días</option>
															<option value="MES">Mes</option>
													</select>
													<small>Seleccione un item de la lista</small>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Indique el número de Galones<span>* </span></label>
													<input type="number" step="any" name="num_galones" placeholder="Indique el número de galones" class="form-control" required value="">
													<small>Decimales separados con punto</small>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Consumo Combustible: <span>*</span></label>
													<input type="text" name="valor_combustible" placeholder="Valor Combustible" class="form-control" id="demo1">
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
								  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar Reporte</button>
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
<script type="text/javascript">
	var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n') 
}        
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#fecha_reporte').datepicker();
        //dateFormat: 'dd/mm/yy'
    }); 
} 
</script>

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
