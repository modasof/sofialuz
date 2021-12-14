<?php
$IdSesion = $_SESSION['IdUser'];
$campos = $campos->getCampos();
foreach ($campos as $campo){
			$id_reporte = $campo['id_reporte'];
			$equipo_id_equipo = $campo['equipo_id_equipo'];
            $nombreq=Equipos::obtenerNombreEquipo($equipo_id_equipo);
            $fecha_reporte = $campo['fecha_reporte'];
            $funcionario_id_funcionario = $campo['funcionario_id_funcionario'];
            $nombrefun=Equipos::obtenerNombreFuncionario($funcionario_id_funcionario);
            $num_trabajado = $campo['num_trabajado'];
            $unidad_trabajo = $campo['unidad_trabajo'];
            $dias_trabajados = $campo['dias_trabajados'];
			$num_galones = $campo['num_galones'];
            $valor_combustible = $campo['valor_combustible'];
            $observaciones = $campo['observaciones'];
            $actividad = $campo['actividad'];
            $repuesto = $campo['repuesto'];
             $num_factura = $campo['num_factura'];

            if ($unidad_trabajo=="HR") {
            	$textounidad="Horas";
            }
            elseif ($unidad_trabajo=="DIA") {
            	$textounidad="Días";
            }
             elseif ($unidad_trabajo=="MES") {
            	$textounidad="Mes";
            }
            elseif ($unidad_trabajo=="KM") {
            	$textounidad="Kilómetros";
            }
			
           
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
          <h1 class="m-0 text-dark">Editar Reporte </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=equipos&&action=todos">Equipos</a></li>
            <li class="breadcrumb-item active"><a href="?controller=equipos&&action=reportediario&&id=<?php echo($equipo_id_equipo) ?>">Reporte</a></li>
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
							<form role="form" action="?controller=equipos&&action=actualizareporte&&id_reporte=<?php echo($id_reporte) ?>&&id_equipo=<?php echo($equipo_id_equipo); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
							<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								?>
							<input type="hidden" name="equipo_id_equipo" value="<?php echo($equipo_id_equipo) ?>">
							  <div class="card-body">
								
							<div class="row">
											
								<div class="col-sm-3 col-xs-12">
									<div class="form-group">
									  <label for="sel1">Responsable del Matenimiento:</label>
						<select style="width: 250px;" class="form-control mi-selector" id="funcionario_id_funcionario" name="funcionario_id_funcionario" required>
										<option value="<?php echo($funcionario_id_funcionario) ?>" selected><?php echo utf8_encode($nombrefun) ?></option>
										<?php
										$rubros = Equipos::obtenerFuncionarios();
										foreach ($rubros as $campo){
											$id_funcionario = $campo['id_funcionario'];
											$nombre_funcionario = $campo['nombre_funcionario'];
										?>
										<option value="<?php echo $id_funcionario; ?>"><?php echo utf8_encode($nombre_funcionario); ?></option>
										<?php } ?>
									  </select>
									</div>
								</div>
											
											
											 <div class="col-sm-3 col-xs-12">
												<div class="form-group">
													<label>Fecha Reporte: <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte" value="<?php echo utf8_encode($fecha_reporte); ?>">
												</div>
											</div>
											<div style="display: none;" class="col-md-4">
												<div class="form-group">
													<label>Indique el número de Horas trabajadas<span>*</span></label>
													<input type="number" step="any" name="num_trabajado" placeholder="Indique el número de horas trabajadas" class="form-control" required value="<?php echo utf8_encode($num_trabajado); ?>">
													<small>Decimales separados con punto</small>
												</div>
											</div>
											<div style="display: none;"  class="col-md-4">
												<div class="form-group">
													<label>Unidad de Trabajo: <span>*</span></label>
													
													 <select class="form-control"  name="unidad_trabajo" required="">
															<option selected="true" value="<?php echo utf8_encode($unidad_trabajo); ?>"><?php echo utf8_encode($textounidad); ?></option>
															<option value="DIA">Días</option>
															<option value="HR">Horas</option>
															<option value="KM">Kilómetros</option>
															<option value="MES">Mes</option>
													</select>
													<small>Seleccione un item de la lista</small>
												</div>
											</div>
											<div style="display: none;"   class="col-md-4">
												<div class="form-group">
													<label>Días Trabajados: <span>*</span></label>
													
													 <select class="form-control"  name="dias_trabajados" required="">
													 	<option selected="" value="<?php echo($dias_trabajados); ?>"><?php echo($dias_trabajados); ?></option>
															<?php 
															for ($i=0; $i <32 ; $i++) { 
																echo("<option value='".$i."'>".$i."</option>");
															}
															 ?>
													</select>
													<small>Seleccione un item de la lista</small>
												</div>
											</div>
											<div style="display: none;"  class="col-md-4">
												<div class="form-group">
													<label>Indique el número de Galones<span>* </span></label>
													<input type="number" step="any" name="num_galones" placeholder="Indique el número de galones" class="form-control" required value="<?php echo utf8_encode($num_galones); ?>">
													<small>Decimales separados con punto</small>
												</div>
											</div>
											<div  class="col-md-3">
												<div class="form-group">
													<label>Indique el número de Factura<span>* </span></label>
													<input type="text"  name="num_factura" placeholder="Indique el número de Factura" class="form-control" required value="<?php echo utf8_encode($num_factura); ?>">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Valor Reparación <span>*</span></label>
											<input type="text" name="valor_combustible" placeholder="Valor Combustible" class="form-control" id="demo1" value="<?php echo utf8_encode($valor_combustible); ?>">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Actividad Realizada<span>*</span></label>
						<textarea class="form-control" rows="5" id="descripcion" name="actividad"><?php echo htmlspecialchars_decode($actividad); ?></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Problemas Presentados<span>*</span></label>
						<textarea class="form-control" rows="5" id="descripcion" name="observaciones"><?php echo htmlspecialchars_decode($observaciones); ?></textarea>
												</div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group">
													<label>Nombre y/o Referencia del repuesto cambiado<span>*</span></label>
						<textarea class="form-control" rows="5" id="descripcion" name="repuesto"><?php echo htmlspecialchars_decode($repuesto); ?></textarea>
												</div>
											</div>
										</div>
							<div class="row">
								<div class="card-footer">
								  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Actualizar Reporte</button>
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
