<?php
ini_set('display_errors', '0');
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';

include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';

include_once 'modelos/servicios.php';
include_once 'controladores/serviciosController.php';

include_once 'modelos/categoriainsumos.php';
include_once 'controladores/categoriainsumosController.php';

include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];
$id        = $_GET['id'];
$vereditar = $_GET['vereditar'];

$res    = Requisicionesitems::editarRequisicionesitemsPor($id);
$campos = $res->getCampos();
foreach ($campos as $campo) {

    # ========================================================
    # =           Carga de todos los campos por ID           =
    # ========================================================

    $actividad            = $campo['actividad'];
    $insumo_id_insumo     = $campo['insumo_id_insumo'];
    $servicio_id_servicio = $campo['servicio_id_servicio'];
    $equipo_id_equipo     = $campo['equipo_id_equipo'];
    $fecha_reporte        = $campo['fecha_reporte'];
    $cantidad             = $campo['cantidad'];
    $fecha_entrega        = $campo['fecha_entrega'];
    $observaciones        = $campo['observaciones'];
    $requisicion_id       = $campo['requisicion_id'];
    $marca_temporal       = $campo['marca_temporal'];
    $usuario_creador      = $campo['usuario_creador'];
    $estado_item          = $campo['estado_item'];
    $tipo_req             = $campo['tipo_req'];
    $ordencompra_num      = $campo['ordencompra_num'];
    $duplicado_de         = $campo['duplicado_de'];

   
   	$nomservicio=Servicios::obtenerNombre($servicio_id_servicio);
   	$nomequipo=Equipos::obtenerNombreEquipo($equipo_id_equipo);

    $nomsolicita  = Usuarios::obtenerNombreUsuario($usuario_creador);
    $nombreinsumo = Insumos::obtenerNombreInsumo($insumo_id_insumo);

    $Ucategoriainsumo_id = Insumos::obtenerCategoria($insumo_id_insumo);
    $Unombrecategoria    = Categoriainsumos::obtenerNombre($Ucategoriainsumo_id);

    $Uunidadmedida_id = Insumos::obtenerUnidadmed($insumo_id_insumo);
    $Unombredmedida   = Unidadesmed::obtenerNombre($Uunidadmedida_id);


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
          <h1 class="m-0 text-dark">Editar Item</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
             <li class="breadcrumb-item active"><a href="?controller=requisicionesitems&&action=todosporreq&id=<?php echo ($requisicion_id); ?>">Requisición Núm: <?php echo ($requisicion_id); ?></a></li>
            <?php
if ($RolSesion == 1 or $RolSesion == 13) {
    ?>
            	 	<li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=todosalmacen&&cargo=<?php echo ($RolSesion); ?>">Ver Requisiciones</a></li>
            	 	<?php
} else {
    ?>
            	 		<li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=todosmiusuario&&id=<?php echo ($IdSesion); ?>">Ver Requisiciones</a></li>
            	 	<?php
}
?>
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
	<form role="form" autocomplete="off" action="?controller=requisicionesitems&&action=actualizaritem&&id=<?php echo ($id); ?>" method="POST" enctype="multipart/form-data" >
							<?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
$DiaActual    = date('Y-m-d');
?>

					<input type="hidden" name="usuario_creador" value="<?php echo ($IdSesion); ?>">
					<input type="hidden" name="requisicion_id" value="<?php echo ($requisicion_id) ?>">
					<input type="hidden" name="estado_item" value="<?php echo ($estado_item) ?>">
					<input type="hidden" name="requisicion_publicada" value="1">
					<input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual); ?>">
					<input type="hidden" name="fecha_reporte" value="<?php echo ($DiaActual); ?>">
					<input type="hidden" name="tipo_req" value="<?php echo ($tipo_req); ?>">
					<input type="hidden" name="ordencompra_num" value="<?php echo ($ordencompra_num); ?>">
					<input type="hidden" name="duplicado_de" value="<?php echo ($duplicado_de); ?>">

					<div class="card-body">
							<div class="row">
								 <div class="col-md-12">

								 		<?php if ($tipo_req=="Servicios") {
									?>

									<input type="hidden" name="equipo_id_equipo" value="0">
									<input type="hidden" name="insumo_id_insumo" value="0">

									 	<div class="col-md-12">
												<div class="form-group">
													<label> Seleccione el Servicio: <span>*</span></label>
								<select  class="form-control mi-selector" id="servicio_id_servicio" name="servicio_id_servicio" required>
										<option value="<?php echo($servicio_id_servicio) ?>" selected><?php echo($nomservicio); ?></option>
										<?php
										$rubros = Servicios::obtenerListaServicios();
										foreach ($rubros as $campo){
											$id = $campo['id'];
											$nombre = $campo['nombre'];
											$unidadmedida_id = $campo['unidadmedida_id'];
											$nomunidadmedida=Unidadesmed::obtenerNombre($unidadmedida_id);
										?>
										<option value="<?php echo $id; ?>"><?php echo utf8_encode($nombre." - [".$nomunidadmedida."]"); ?></option>
										<?php } ?>
								</select>

												</div>
											</div>

									<?php
								} 
								elseif ($tipo_req=="Insumos") {
									?>

									<input type="hidden" name="servicio_id_servicio" value="0">
									<input type="hidden" name="equipo_id_equipo" value="0">

									   <div class="col-md-12">
												<div class="form-group">
													<label> Seleccione el Insumo: <span>*</span></label>
								<select  class="form-control mi-selector" id="insumo_id_insumo" name="insumo_id_insumo" required>
										<option value="<?php echo ($insumo_id_insumo); ?>" selected><?php echo ("[" . $Unombrecategoria . "] - " . $nombreinsumo . " - [" . $Unombredmedida . "]"); ?></option>
										<?php
$rubros = Insumos::obtenerListaInsumos();
foreach ($rubros as $campo) {
    $id_insumo          = $campo['id_insumo'];
    $nombre_insumo      = $campo['nombre_insumo'];
    $categoriainsumo_id = $campo['categoriainsumo_id'];
    $unidadmedida_id    = $campo['unidadmedida_id'];
    $nomcategoria       = Categoriainsumos::obtenerNombre($categoriainsumo_id);
    $nomunidadmedida    = Unidadesmed::obtenerNombre($unidadmedida_id);
    ?>
										<option value="<?php echo $id_insumo; ?>"><?php echo utf8_encode("[" . $nomcategoria . "] - " . $nombre_insumo . " - [" . $nomunidadmedida . "]"); ?></option>
										<?php }?>
								</select>

												</div>
											</div>

									<?php
								}else{
									?>

									<input type="hidden" name="servicio_id_servicio" value="0">
									<input type="hidden" name="insumo_id_insumo" value="0">

									<div class="col-md-12">
												<div class="form-group">
													<label> Seleccione el Equipo: <span>*</span></label>
								<select  class="form-control mi-selector" id="equipo_id_equipo" name="equipo_id_equipo" required>
									<option value="<?php echo($equipo_id_equipo) ?>" selected><?php echo($nomequipo) ?></option>
										<?php
										$rubros = Equipos::obtenerListaEquiposAsf();
										foreach ($rubros as $campo){
											$id = $campo['id_equipo'];
											$nombre = $campo['nombre_equipo'];
											
										?>
										<option value="<?php echo $id; ?>"><?php echo utf8_encode($nombre); ?></option>
										<?php } ?>
								</select>

												</div>
										</div>

									<?php
								}


								?>
				

									

												<div class="col-md-12">
												<div class="form-group">
													<label>Cantidad<span>*</span></label>
													<input type="number" step="any" name="cantidad" placeholder="Indique la cantidad" class="form-control" required value="<?php echo ($cantidad); ?>">
													<small>Decimales separados con punto</small>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Requirido para el: <span>*</span></label>
													<input type="date" name="fecha_entrega" placeholder="Fecha" class="form-control required" required id="fecha_entrega" value="<?php echo ($fecha_entrega); ?>">
												</div>
											</div>
											<div style="display:none;" class="col-md-3">
												<div class="form-group">
													<label>Actividad<span></span></label>
									<textarea class="form-control" rows="2" id="actividad" name="actividad"></textarea>
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

<script type="text/javascript">
	var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n')
}
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#fecha_entrega').datepicker();
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

