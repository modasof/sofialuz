<?php
include_once 'modelos/gestiondocumentaleq.php';
include_once 'controladores/gestiondocumentaleqController.php';
include 'vistas/index/estadisticas.php';
$campos = $campos->getCampos();
foreach ($campos as $campo){
// nombre_equipo, marca_equipo, serial_equipo, modelo, unidad_trabajo, tipo_equipo, placa, propietario, estado_equipo, equipo_publicado, creado_por, marca_temporal, observaciones
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
			$modulo = $campo['modulo'];
			$rend_interno = $campo['rend_interno'];
			$unidad_interna = $campo['unidad_interna'];
			$rend_externo = $campo['rend_externo'];
			$unidad_externa = $campo['unidad_externa'];
			$gasolina = $campo['gasolina'];
			$gas = $campo['gas'];
			$acpm = $campo['acpm'];
			$transmision = $campo['transmision'];
			$hidraulico = $campo['hidraulico'];
			$aceitemotor = $campo['aceitemotor'];
			$cantidadllantas = $campo['cantidadllantas'];
			$referencia = $campo['referencia'];
			$tamano = $campo['tamano'];
			$presion = $campo['presion'];
			$acmotor = $campo['acmotor'];
			$accaja = $campo['accaja'];
			$actransmision = $campo['actransmision'];
			$achidraulico = $campo['achidraulico'];
			$acservo = $campo['acservo'];
			$acgrasa = $campo['acgrasa'];

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
							<form role="form" action="?controller=equipos&&action=actualizar&&id_equipo=<?php echo $id_equipo;?>" method="POST" enctype="multipart/form-data">
							<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								?>
							
							  <div class="card-body">
							<input type="text" style="display: none;" name="sn_ver_estadistica" value="1">

								
							<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Indique el nombre del equipo: <span>*</span></label>
													<input type="text" name="nombre_equipo" placeholder="Nombre del equipo" class="form-control " required value="<?php echo utf8_encode($nombre_equipo) ?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Tipo Equipo: <span>*</span></label>
													
													 <select class="form-control" id="tipo_equipo" name="tipo_equipo" required="">
															<option value="<?php echo utf8_encode($tipo_equipo) ?>" selected=""><?php echo utf8_encode($tipo_equipo) ?></option>
															<option value="Maquinaria Pesada">Maquinaria Pesada</option>
															<option value="Volquetas">Volquetas</option>
															<option value="Vehículos">Vehículos</option>
															<option value="Equipos Menores">Equipos Menores</option>
															<option value="Herramientas">Herramientas</option>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Propietario<span>*</span></label>
													<input type="text" name="propietario" placeholder="Digite el propietario" class="form-control" required value="<?php echo utf8_encode($propietario) ?>">
												</div>
											</div>
											<div id="divplaca" class="col-md-4">
												<div class="form-group">
													<label>Número de Placa<span>*</span></label>
													<input type="text" name="placa" placeholder="Digite la placa" class="form-control" value="<?php echo utf8_encode($placa) ?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Indicar marca<span>*</span></label>
													<input type="text" name="marca_equipo" placeholder="Digite la marca" class="form-control " required value="<?php echo utf8_encode($marca_equipo) ?>">
												</div>
											</div>
											
											<div class="col-md-4">
												<div class="form-group">
													<label>Serial<span>*</span></label>
													<input type="text" name="serial_equipo" placeholder="Digite el Serial" class="form-control" value="<?php echo utf8_encode($serial_equipo) ?>" >
												</div>
											</div>

											
											<div class="col-md-6">
												<div class="form-group">
													<label>Modelo<span>*</span></label>
													<input type="text" name="modelo" placeholder="Modelo / Año " class="form-control" required value="<?php echo utf8_encode($modelo) ?>">
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label>Unidad de Trabajo: <span>*</span></label>
													
													 <select class="form-control"  name="unidad_trabajo" required="">
															<option value="<?php echo utf8_encode($unidad_trabajo) ?>" selected=""><?php echo utf8_encode($unidad_trabajo) ?></option>
															<option value="HR">Horas</option>
															<option value="DIA">Días</option>
															<option value="MES">Mes</option>
															<option value="KM">Kilómetros</option>
													</select>
												</div>
											</div>


											<hr>
								  <h3 class="card-title">Capacidad Tanques (Galones)</h3>
								<hr>
											<div class="col-md-2">
												<div class="form-group">
													<label>Gasolina<span>*</span></label>
													<input type="text" name="gasolina" placeholder="Indicar en Gl." class="form-control" required value="<?php echo utf8_encode($gasolina) ?>">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Gas<span>*</span></label>
													<input type="text" name="gas" placeholder="Indicar en Gl." class="form-control" required value="<?php echo utf8_encode($gas) ?>">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Acpm<span>*</span></label>
													<input type="text" name="acpm" placeholder="Indicar en Gl." class="form-control" required value="<?php echo utf8_encode($acpm) ?>">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Transmisión<span>*</span></label>
													<input type="text" name="transmision" placeholder="Indicar en Gl." class="form-control" required value="<?php echo utf8_encode($transmision) ?>">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Hidráulico<span>*</span></label>
													<input type="text" name="hidraulico" placeholder="Indicar en Gl." class="form-control" required value="<?php echo utf8_encode($hidraulico) ?>">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Aceite Motor<span>*</span></label>
													<input type="text" name="aceitemotor" placeholder="Indicar en Gl." class="form-control" required value="<?php echo utf8_encode($aceitemotor) ?>">
												</div>
											</div>
							<div class="card-header">
								  <h3 class="card-title">Llantas</h3>
								</div>
								<div class="col-md-3">
												<div class="form-group">
													<label>Cantidad<span>*</span></label>
													<input type="text" name="cantidadllantas" placeholder="Ej. 8 Llantas" class="form-control" required value="<?php echo utf8_encode($cantidadllantas) ?>">
												</div>
											</div>
								<div class="col-md-3">
												<div class="form-group">
													<label>Referencia<span>*</span></label>
													<input type="text" name="referencia" placeholder="2 Direccionales 8 Tracción" class="form-control" required value="<?php echo utf8_encode($referencia) ?>">
												</div>
								</div>
								<div class="col-md-3">
												<div class="form-group">
													<label>Tamaño<span>*</span></label>
													<input type="text" name="tamano" placeholder=" Ej. 12R22.5" class="form-control" required value="<?php echo utf8_encode($tamano) ?>">
												</div>
								</div>
								<div class="col-md-3">
												<div class="form-group">
													<label>Presión<span>*</span></label>
													<input type="text" name="presion" placeholder="Ej. 100 Psi" class="form-control" required value="<?php echo utf8_encode($presion) ?>">
												</div>
								</div>

					<div class="card-header">
								  <h3 class="card-title">Aceites</h3>
					</div>

											<div class="col-md-2">
												<div class="form-group">
													<label>Referencia Motor<span>*</span></label>
													<input type="text" name="acmotor" placeholder="Referencia" class="form-control" required value="<?php echo utf8_encode($acmotor) ?>">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Referencia Caja<span>*</span></label>
													<input type="text" name="accaja" placeholder="Referencia" class="form-control" required value="<?php echo utf8_encode($accaja) ?>">
												</div>
											</div>

											<div class="col-md-2">
												<div class="form-group">
													<label>Referencia Transmisión<span>*</span></label>
													<input type="text" name="actransmision" placeholder="Referencia" class="form-control" required value="<?php echo utf8_encode($actransmision) ?>">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Referencia Hidráulico<span>*</span></label>
													<input type="text" name="achidraulico" placeholder="Referencia" class="form-control" required value="<?php echo utf8_encode($achidraulico) ?>">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Referencia Servo<span>*</span></label>
													<input type="text" name="acservo" placeholder="Referencia" class="form-control" required value="<?php echo utf8_encode($acservo) ?>">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Referencia Grasa<span>*</span></label>
													<input type="text" name="acgrasa" placeholder="Referencia" class="form-control" required value="<?php echo utf8_encode($acgrasa) ?>">
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label>Indique el % de comisión: <span>*</span></label>
													<select class="form-control"  name="valor_unidad" required="">
															<option value="<?php echo($valor_unidad) ?>" selected=""><?php echo($valor_unidad) ?> %</option>
															<?php 
															for ($i=0; $i < 21 ; $i++) { 
																echo("<option value='".$i."'>".$i." %</option>");
															}
															 ?>
													</select>
												</div>
											</div>
											<div style="display: none;" class="col-md-6">
												<div class="form-group">
													<label>Módulo: <span>*</span></label>
													
													 <select class="form-control"  name="modulo" required="">
							<option value="<?php echo utf8_encode($modulo) ?>" selected=""><?php echo utf8_encode($modulo) ?></option>
															<option value="Asf">Asf</option>
															<option value="Sofia">Sofia</option>
													</select>
												</div>
											</div>
											<div style="display: none;" class="col-md-6">
												<div class="form-group">
													<label>Consumo en Galones Interno<span>*</span></label>
													<input type="number" step="any" name="rend_interno" placeholder="Indique el consumo del equipo x hr ó km" class="form-control" required value="<?php echo($rend_interno) ?>">
													
												</div>
											</div>

											<div style="display: none;" class="col-md-6">
												<div class="form-group">
													<label>Unidad de Trabajo Interna: <span>*</span></label>
													
													 <select class="form-control"  name="unidad_interna" required="">
														<option value="<?php echo utf8_encode($unidad_interna) ?>" selected=""><?php echo utf8_encode($unidad_interna) ?></option>
															<option value="HR">Horas</option>
															<option value="DIA">Días</option>
															<option value="MES">Mes</option>
															<option value="KM">Kilómetros</option>
													</select>
												</div>
											</div>
											
											<div style="display: none;" class="col-md-6">
												<div class="form-group">
													<label>Consumo en Galones Externo<span>*</span></label>
													<input type="number" step="any" name="rend_externo" placeholder="Indique el consumo del equipo x hr ó km" class="form-control" required value="<?php echo($rend_externo); ?>">
													
												</div>
											</div>

											<div style="display: none;" class="col-md-6">
												<div class="form-group">
													<label>Unidad de Trabajo Externa: <span>*</span></label>
													
													 <select class="form-control"  name="unidad_externa" required="">
															<option value="<?php echo utf8_encode($unidad_externa) ?>" selected=""><?php echo utf8_encode($unidad_externa) ?></option>
															<option value="HR">Horas</option>
															<option value="DIA">Días</option>
															<option value="MES">Mes</option>
															<option value="KM">Kilómetros</option>
													</select>
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<label>Observaciones<span>*</span></label>
													  <textarea class="form-control" rows="5" id="descripcion" name="observaciones"><?php echo utf8_encode($observaciones) ?>
													  </textarea>
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
		text: "Reportes <?php echo($nombrequipo); ?>"
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
		name: "<?php echo($unidad_trabajo) ?> Trabajados",
		color: "#6d78ad",
		dataPoints: [
			
			//{ y: 0, label: "Noviembre" },
			//{ y: 0, label: "Octubre" },
			//{ y: 0, label: "Septiembre" },
			//{ y: 0, label: "Agosto" },
			//{ y: 0, label: "Julio" },
			{ y: <?php echo(round(ReportemensualEqNumTb($id_equipo,6),1)) ?>, label: "Junio" },
			{ y: <?php echo(round(ReportemensualEqNumTb($id_equipo,5),1)) ?>, label: "Mayo" },
			{ y: <?php echo(round(ReportemensualEqNumTb($id_equipo,4),1)) ?>, label: "Abril" },
			{ y: <?php echo(round(ReportemensualEqNumTb($id_equipo,3),1)) ?>, label: "Marzo" },
			{ y: <?php echo(round(ReportemensualEqNumTb($id_equipo,2),1)) ?>, label: "Febrero" },
			{ y: <?php echo(round(ReportemensualEqNumTb($id_equipo,1),1)) ?>, label: "Enero" }
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
			{ y: <?php echo(round(ReportemensualEqDiasTb($id_equipo,6),1)) ?>, label: "Junio" },
			{ y: <?php echo(round(ReportemensualEqDiasTb($id_equipo,5),1)) ?>, label: "Mayo" },
			{ y: <?php echo(round(ReportemensualEqDiasTb($id_equipo,4),1)) ?>, label: "Abril" },
			{ y: <?php echo(round(ReportemensualEqDiasTb($id_equipo,3),1)) ?>, label: "Marzo" },
			{ y: <?php echo(round(ReportemensualEqDiasTb($id_equipo,2),1)) ?>, label: "Febrero" },
			{ y: <?php echo(round(ReportemensualEqDiasTb($id_equipo,1),1)) ?>, label: "Enero" }
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
			{ y: <?php echo(round(ReportemensualEqGalones($id_equipo,6),1)) ?>, label: "Junio" },
			{ y: <?php echo(round(ReportemensualEqGalones($id_equipo,5),1)) ?>, label: "Mayo" },
			{ y: <?php echo(round(ReportemensualEqGalones($id_equipo,4),1)) ?>, label: "Abril" },
			{ y: <?php echo(round(ReportemensualEqGalones($id_equipo,3),1)) ?>, label: "Marzo" },
			{ y: <?php echo(round(ReportemensualEqGalones($id_equipo,2),1)) ?>, label: "Febrero" },
			{ y: <?php echo(round(ReportemensualEqGalones($id_equipo,1),1)) ?>, label: "Enero" }
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
