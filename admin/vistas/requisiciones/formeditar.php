<?php
ini_set('display_errors', '0');
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';
include_once 'modelos/proyectos.php';
include_once 'controladores/proyectosController.php';
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/estadosreq.php';
include_once 'controladores/estadosreqController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];
$idventa   = $_GET['id'];
$vereditar = $_GET['vereditar'];

$res    = Requisiciones::editarrequisicionesPor($idventa);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $fecha_reporte         = $campo['fecha_reporte'];
    $imagen                = $campo['imagen'];
    $solicitado_por        = $campo['solicitado_por'];
    $requisicion_num       = $campo['requisicion_num'];
    $creado_por            = $campo['creado_por'];
    $estado_id_requisicion = $campo['estado_id_requisicion'];
    $requisicion_publicada = $campo['requisicion_publicada'];
    $marca_temporal        = $campo['marca_temporal'];
    $observaciones         = $campo['observaciones'];
    $cliente_id_cliente    = $campo['cliente_id_cliente'];
    $proyecto_id_proyecto  = $campo['proyecto_id_proyecto'];
    $nomsolicita           = Usuarios::obtenerNombreUsuario($solicitado_por);
    $nombrecliente         = Clientes::obtenerNombreCliente($cliente_id_cliente);
    $nombreproyecto        = Proyectos::obtenerNombreProyecto($proyecto_id_proyecto);
    $nomestado             = Estadosreq::obtenerNombre($estado_id_requisicion);

}

?>

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector').select2();
    });
});
</script>
<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector2').select2();
    });
});
</script>
<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector3').select2();
    });
});
</script>
<!-- Content Wrapper. Contains page content -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Editar Requisición</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item"><a href="?controller=requisiciones&&action=todos">Reporte Requisiciones</a></li>
            <!--<li class="breadcrumb-item active"><a href="?controller=equipos&&action=todos">Equipos</a></li>-->
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


						<!-- ESTE DIV LO USO PARA CENTRAR EL FORMULARIO -->
						<!-- left column -->
						<div class="col-md-8">
	<form role="form" autocomplete="off" action="?controller=requisiciones&&action=actualizar&&id=<?php echo ($idventa); ?>" method="POST" enctype="multipart/form-data" >
							<?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
?>

					<input type="hidden" name="usuario_creador" value="<?php echo ($IdSesion); ?>">
					<input type="hidden" name="estado_id_requisicion" value="1">
					<input type="hidden" name="requisicion_publicada" value="<?php echo($requisicion_publicada);?>">
					<input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual); ?>">

					<div class="card-body">
							<div class="row">
								 <div class="col-md-4">
										<div class="form-group">
										  <label for="fila2_columna1">Documento <small>Tamaño máximo 10MB</small></label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen; ?>" multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ >
													 <input type="hidden" name="ruta1" value="<?php echo $imagen; ?>" >
												</div>
										</div>
									   </div>
									    <div id="requisicion_num" class="col-md-3">
												<div class="form-group">
													<label>Consecutivo: <span>*</span></label>
													<input type="text" name="requisicion_num" placeholder="Número de Requisición" class="form-control" value="<?php echo ($requisicion_num); ?>" >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Fecha del Reporte: <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte" value="<?php echo ($fecha_reporte); ?>">
												</div>
											</div>

											<div  id="" class="col-md-12">
												<div class="form-group">
													<label> Estado Actual: <span>*</span></label>

										<select class="form-control mi-selector" id="estado_id_requisicion" name="estado_id_requisicion" required>
										<option value="<?php echo ($estado_id_requisicion); ?>" selected><?php echo utf8_encode($nomestado); ?></option>
										<?php
$rubros = Estadosreq::ObtenerListaEstados();
foreach ($rubros as $campo) {
    $id     = $campo['id'];
    $nombre = $campo['nombre'];
    ?>
										<option value="<?php echo $id; ?>"><?php echo utf8_encode($nombre); ?></option>
										<?php }?>
								</select>
												</div>
											</div>

											<div  id="" class="col-md-12">
												<div class="form-group">
													<label> Solicitado por: <span>*</span></label>

										<select class="form-control mi-selector2" id="solicitado_por" name="solicitado_por" required>
										<option value="<?php echo ($solicitado_por); ?>" selected><?php echo utf8_encode($nomsolicita); ?></option>
										<?php
$rubros = Usuarios::ListaUsuariosOperadores();
foreach ($rubros as $campo) {
    $id_usuario     = $campo['id_usuario'];
    $nombre_usuario = $campo['nombre_usuario'];
    ?>
										<option value="<?php echo $id_usuario; ?>"><?php echo utf8_encode($nombre_usuario); ?></option>
										<?php }?>
								</select>
												</div>
											</div>

											<div id="" class="col-md-12">
												<div class="form-group">
													<label> Seleccione el Cliente: <span>*</span></label>
								<select class="form-control mi-selector3" id="cliente_id_cliente" name="cliente_id_cliente" required>

										<option value="<?php echo ($cliente_id_cliente); ?>" selected><?php echo utf8_encode($nombrecliente); ?></option>
										<?php
$rubros = Clientes::obtenerListaClientes();
foreach ($rubros as $campo) {
    $id_cliente     = $campo['id_cliente'];
    $nombre_cliente = $campo['nombre_cliente'];
    ?>
										<option value="<?php echo $id_cliente; ?>"><?php echo utf8_encode($nombre_cliente); ?></option>
										<?php }?>
								</select>
												</div>
											</div>
												<div id="" class="col-md-12">
												<div class="form-group">
													<label> Seleccione el Proyecto: <span>*</span></label>
								<select class="form-control mi-selector3" id="proyecto_id_proyecto" name="proyecto_id_proyecto" required>

										<option value="<?php echo ($proyecto_id_proyecto); ?>" selected><?php echo utf8_encode($nombreproyecto); ?></option>
										<?php
$rubros = Proyectos::obtenerListaProyectos();
foreach ($rubros as $campo) {
    $id_proyecto     = $campo['id_proyecto'];
    $nombre_proyecto = $campo['nombre_proyecto'];
    ?>
										<option value="<?php echo $id_proyecto; ?>"><?php echo utf8_encode($nombre_proyecto); ?></option>
										<?php }?>
								</select>
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<label>Observaciones<span>*</span></label>
									<textarea class="form-control" rows="2" id="descripcion" name="observaciones"><?php echo utf8_encode($observaciones); ?></textarea>
												</div>
											</div>

										</div>
							<div class="row">
								<div class="card-footer">
								  <button name="Submit" type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para actualizar la información">Actualizar</button>
								</div>
						  </div>
						  </form>
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
$("#demo2").maskMoney({
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

