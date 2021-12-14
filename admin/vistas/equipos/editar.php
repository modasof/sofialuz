<?php
include_once 'modelos/gestiondocumentaleq.php';
include_once 'controladores/gestiondocumentaleqController.php';
include 'vistas/index/estadisticas.php';
$campos = $campos->getCampos();
foreach ($campos as $campo) {
// nombre_equipo, marca_equipo, serial_equipo, modelo, unidad_trabajo, tipo_equipo, placa, propietario, estado_equipo, equipo_publicado, creado_por, marca_temporal, observaciones
    $imagen            = $campo['imagen'];
    $id_equipo         = $campo['id_equipo'];
    $nombre_equipo     = $campo['nombre_equipo'];
    $marca_equipo      = $campo['marca_equipo'];
    $serial_equipo     = $campo['serial_equipo'];
    $modelo            = $campo['modelo'];
    $unidad_trabajo    = $campo['unidad_trabajo'];
    $tipo_equipo       = $campo['tipo_equipo'];
    $placa             = $campo['placa'];
    $propietario       = $campo['propietario'];
    $valor_activo      = $campo['valor_activo'];
    $observaciones     = $campo['observaciones'];
    $comision          = $campo['comision'];
    $motor             = $campo['motor'];
    $peso              = $campo['peso'];
    $fecha_adquisicion = $campo['fecha_adquisicion'];

}
?>

<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Información Equipo </h1>
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
							<form role="form" action="?controller=equipos&&action=actualizar&&id_equipo=<?php echo $id_equipo; ?>" method="POST" enctype="multipart/form-data">
							<?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
?>

							  <div class="card-body">


												<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="form-group">
										  <label for="fila2_columna1">Actualizar Imagen <br><small>Peso máximo 5MB, </small></label>
												<div class="">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="5M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/ >
													 <input type="hidden" name="ruta1" value="<?php echo $imagen;?>" >
												</div>
										</div>
									   </div>


									<div class="col-md-4 col-xs-12">
												<div class="form-group">
													<label>Indique el nombre del equipo: <span>*</span></label>
													<input type="text" name="nombre_equipo" placeholder="Nombre del equipo" class="form-control" value="<?php echo($nombre_equipo); ?>" required>
												</div>
											</div>

												<div class="col-md-4 col-xs-12">
												<div class="form-group">
													<label>Tipo Equipo: <span>*</span></label>

													 <select class="form-control select2" id="tipo_equipo" name="tipo_equipo" required="">
															<option value="<?php echo($tipo_equipo); ?>" selected="true"><?php echo($tipo_equipo); ?></option>
															<option value="Apoyo Logistico">Apoyo Logístico</option>
															<option value="Equipos Menores">Equipos Menores</option>	
															<option value="Maquinaria Pesada">Maquinaria Pesada</option>
															<option value="Volquetas">Volqueta</option>
															<option value="Tractocamnion">Tractocamión</option>
															<option value="Vehículos">Vehículos</option>
															
															<option value="Herramientas">Herramientas</option>
													</select>
												</div>
											</div>

												<div class="col-md-4 col-xs-12">
												<div class="form-group">
													<label>Propietario<span>*</span></label>
													<input type="text" name="propietario" placeholder="Indique el propietario" class="form-control" required value="<?php echo($propietario); ?>">
												</div>
											</div>

											<div class="col-md-4 col-xs-12">
												<div class="form-group">
													<label>Indicar marca<span>*</span></label>
													<input type="text" name="marca_equipo" placeholder="Indique la marca" class="form-control " required value="<?php echo($marca_equipo); ?>">
												</div>
											</div>

												<div class="col-md-4 col-xs-12">
												<div class="form-group">
													<label>Modelo<span>*</span></label>
													<input type="text" name="modelo" placeholder="WORKSTAR  7600 SBA / 2014" class="form-control" required value="<?php echo($modelo); ?>">
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label>Motor<span>*</span></label>
													<input type="text" name="motor" placeholder="Motor" class="form-control" required value="<?php echo($motor); ?>">
												</div>
											</div>

												<div class="col-md-4">
												<div class="form-group">
													<label>Serie<span>*</span></label>
													<input type="text" name="serial_equipo" placeholder="Indique el Serial" class="form-control" value="<?php echo($serial_equipo); ?>">
												</div>
											</div>


											<div id="divplaca"  class="col-md-4">
												<div class="form-group">
													<label>Número de Placa<span>* AAA-123</span></label>
													<input type="text" name="placa" placeholder="Indique la placa O N/A" class="form-control" value="<?php echo($placa); ?>">
												</div>
											</div>

												<div id="divplaca"  class="col-md-4">
												<div class="form-group">
													<label>Capacidad Carga<span>* (Kg)</span></label>
													<input type="text" name="peso" placeholder="Indique el peso" class="form-control" value="<?php echo($peso); ?>">
												</div>
											</div>



											<div class="col-md-4">
												<div class="form-group">
													<label>Unidad de Trabajo: <span>*</span></label>

													 <select class="form-control select2"  name="unidad_trabajo" required="">
															<option value="<?php echo($unidad_trabajo); ?>" selected="true"><?php echo($unidad_trabajo); ?></option>
															<option value="HR">Horas</option>
															<option value="DIA">Días</option>
															<option value="MES">Mes</option>
															<option value="KM">Kilometraje</option>
													</select>
												</div>
											</div>
											<div  class="col-md-4">
												<div class="form-group">
													<label>Fecha Adquisición: <span>*</span></label>
													<input type="date" name="fecha_adquisicion" id="fecha_adquisicion" placeholder="Fecha" class="form-control required" required id="beneficiario" value="<?php echo($fecha_adquisicion); ?>">
												</div>
											</div>

											<div  class="col-md-2">
												<div class="form-group">
													<label>Valor Activo: <span>*</span></label>
													<input type="text" name="valor_activo" id="demo1" placeholder="Valor" class="form-control required" required value="<?php echo($valor_activo); ?>">
												</div>
											</div>
												<div class="col-md-2">
												<div class="form-group">
													<label>Indique el % de comisión: <span>*</span></label>
													<select class="form-control"  name="comision" required="">
															<option value="<?php echo($comision); ?>" selected=""><?php echo($comision); ?></option>
															<?php
for ($i = 0; $i < 21; $i++) {
    echo ("<option value='" . $i . "'>" . $i . " %</option>");
}
?>
													</select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Peso - Medidas - Características<span>*</span></label>
													  <textarea class="form-control" rows="2" id="descripcion" name="observaciones"><?php echo($observaciones); ?></textarea>
												</div>
											</div>

							</div>


							<div class="row">
								<div class="card-footer">
								  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Actualizar Datos</button>
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
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Reportes <?php echo ($nombrequipo); ?>"
	},
	axisY: {
		title: ""
	},
	legend: {
		cursor:"pointer",
		itemclick : toggleDataSeries
	},
	toolTip: {
		shared: true,
		content: toolTipFormatter
	},
	data: [{
		type: "bar",
		showInLegend: true,
		name: "<?php echo ($unidad_trabajo) ?> Trabajados",
		color: "#6d78ad",
		dataPoints: [

			//{ y: 0, label: "Noviembre" },
			//{ y: 0, label: "Octubre" },
			//{ y: 0, label: "Septiembre" },
			//{ y: 0, label: "Agosto" },
			//{ y: 0, label: "Julio" },
			{ y: <?php echo (round(ReportemensualEqNumTb($id_equipo, 6), 1)) ?>, label: "Junio" },
			{ y: <?php echo (round(ReportemensualEqNumTb($id_equipo, 5), 1)) ?>, label: "Mayo" },
			{ y: <?php echo (round(ReportemensualEqNumTb($id_equipo, 4), 1)) ?>, label: "Abril" },
			{ y: <?php echo (round(ReportemensualEqNumTb($id_equipo, 3), 1)) ?>, label: "Marzo" },
			{ y: <?php echo (round(ReportemensualEqNumTb($id_equipo, 2), 1)) ?>, label: "Febrero" },
			{ y: <?php echo (round(ReportemensualEqNumTb($id_equipo, 1), 1)) ?>, label: "Enero" }
		]
	},
	{
		type: "bar",
		showInLegend: true,
		name: "Días Trabajados",
		color: "#51cda0",
		dataPoints: [

			// { y: 0, label: "Noviembre" },
			// { y: 0, label: "Octubre" },
			// { y: 0, label: "Septiembre" },
			// { y: 0, label: "Agosto" },
			// { y: 0, label: "Julio" },
			{ y: <?php echo (round(ReportemensualEqDiasTb($id_equipo, 6), 1)) ?>, label: "Junio" },
			{ y: <?php echo (round(ReportemensualEqDiasTb($id_equipo, 5), 1)) ?>, label: "Mayo" },
			{ y: <?php echo (round(ReportemensualEqDiasTb($id_equipo, 4), 1)) ?>, label: "Abril" },
			{ y: <?php echo (round(ReportemensualEqDiasTb($id_equipo, 3), 1)) ?>, label: "Marzo" },
			{ y: <?php echo (round(ReportemensualEqDiasTb($id_equipo, 2), 1)) ?>, label: "Febrero" },
			{ y: <?php echo (round(ReportemensualEqDiasTb($id_equipo, 1), 1)) ?>, label: "Enero" }
		]
	},
	{
		type: "bar",
		showInLegend: true,
		name: "Consumo Galones",
		color: "#df796f",
		dataPoints: [

			// { y: 0, label: "Noviembre" },
			// { y: 0, label: "Octubre" },
			// { y: 0, label: "Septiembre" },
			// { y: 0, label: "Agosto" },
			// { y: 0, label: "Julio" },
			{ y: <?php echo (round(ReportemensualEqGalones($id_equipo, 6), 1)) ?>, label: "Junio" },
			{ y: <?php echo (round(ReportemensualEqGalones($id_equipo, 5), 1)) ?>, label: "Mayo" },
			{ y: <?php echo (round(ReportemensualEqGalones($id_equipo, 4), 1)) ?>, label: "Abril" },
			{ y: <?php echo (round(ReportemensualEqGalones($id_equipo, 3), 1)) ?>, label: "Marzo" },
			{ y: <?php echo (round(ReportemensualEqGalones($id_equipo, 2), 1)) ?>, label: "Febrero" },
			{ y: <?php echo (round(ReportemensualEqGalones($id_equipo, 1), 1)) ?>, label: "Enero" }
		]
	}]
});
chart.render();

function toolTipFormatter(e) {
	var str = "";
	var total = 0 ;
	var str3;
	var str2 ;
	for (var i = 0; i < e.entries.length; i++){
		var str1 = "<span style= \"color:"+e.entries[i].dataSeries.color + "\">" + e.entries[i].dataSeries.name + "</span>: <strong>"+  e.entries[i].dataPoint.y + "</strong> <br/>" ;
		total = e.entries[i].dataPoint.y + total;
		str = str.concat(str1);
	}
	str2 = "<strong>" + e.entries[0].dataPoint.label + "</strong> <br/>";
	//str3 = "<span style = \"color:Tomato\">Total: </span><strong>" + total + "</strong><br/>";
	//str3 = "<span style = \"color:Tomato\">Total: </span><strong>" + total + "</strong><br/>";
	return (str2.concat(str));
}

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>

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
