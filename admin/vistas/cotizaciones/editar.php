<?php
ini_set('display_errors', '0');

include_once 'controladores/usuariosController.php';
include_once 'modelos/usuarios.php';

include_once 'controladores/proveedoresController.php';
include_once 'modelos/proveedores.php';


$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];
$idventa   = $_GET['id'];
$vereditar = $_GET['vereditar'];

$res    = Cotizaciones::editar($idventa);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $id                     = $campo['id'];
    $proveedor_id_proveedor = $campo['proveedor_id_proveedor'];
    $cotizacion             = $campo['cotizacion'];
    $medio_pago             = $campo['medio_pago'];
    $item_id                = $campo['item_id'];
    $valor_cot              = $campo['valor_cot'];
    $requisicion_id         = $campo['requisicion_id'];
    $fecha_reporte          = $campo['fecha_reporte'];
    $marca_temporal         = $campo['marca_temporal'];
    $usuario_creador        = $campo['usuario_creador'];
    $usuario_aprobador      = $campo['usuario_aprobador'];
    $estado_cotizacion      = $campo['estado_cotizacion'];
    $ordencompra_num        = $campo['ordencompra_num'];
    $insumo_id_insumo       = $campo['insumo_id_insumo'];
    $servicio_id_servicio   = $campo['servicio_id_servicio'];
    $equipo_id_equipo       = $campo['equipo_id_equipo'];
    $vr_unitario            = $campo['vr_unitario'];
    $cantidadcot            = $campo['cantidadcot'];
    $nombrecreador=Usuarios::obtenerNombreUsuario($usuario_creador);
    $nombreaprobador=Usuarios::obtenerNombreUsuario($usuario_aprobador);
    $nombreproveedor=Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
    $nombreinsumo=Insumos::obtenerNombreInsumo($insumo_id_insumo);
    $idunidadinsumo=Insumos::obtenerUnidadmed($insumo_id_insumo);
    $nombreunidad=Unidadesmed::obtenerNombre($idunidadinsumo);

    $insumopedido=$nombreinsumo." - [".$nombreunidad."]";
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

<!-- Content Wrapper. Contains page content

https://sofialuz.net/admin/index.php?controller=concreto&action=formularioconcreto&id=8

https://sofialuz.net/admin/index.php?controller=concreto&action=formularioconcreto&id=9

-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Editar Item OC<?php echo($id) ?> <br></h1>
          <h3>
          	RQ<?php echo($requisicion_id."-".$item_id) ?>
          </h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item"><a href="?controller=compras&&action=todosrecibirinsumos">Recibir OC</a></li>
            
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
						<div class="col-md-12">

	<form role="form" autocomplete="off" action="?controller=cotizaciones&&action=actualizar&&id=<?php echo ($idventa); ?>" method="POST" enctype="multipart/form-data" >
							<?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
?>

				

					<div class="card-body">
						<div class="row">
						
						</div>
							<div class="row">
										
											<div class="col-md-12">
												<div class="form-group">
													<label>Insumo:<span><?php echo($insumopedido); ?></span></label>
														
												</div>
											</div>
												<div class="col-md-6">
												<div class="form-group">
													<label>Solicitado por</span></label>
														<input type="text" disabled="" value="<?php echo($nombrecreador) ?>" class="form-control">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Aprobado por</span></label>
														<input type="text" disabled="" value="<?php echo($nombreaprobador) ?>" class="form-control">
												</div>
											</div>

												<div class="col-md-6">
												<div class="form-group">
													<label>Fecha Solicitud</span></label>
														<input type="text" disabled="" value="<?php echo($marca_temporal) ?>" class="form-control">
												</div>
											</div>

												<div class="col-md-6">
												<div class="form-group">
													<label>Proveedor</span></label>
														<input type="text" disabled="" value="<?php echo($nombreproveedor) ?>" class="form-control">
												</div>
											</div>


											<div class="col-md-4">
												<div class="form-group">
													<label>Valor Unitario<span>*</span></label>
													<input type="text" name="vr_unitario" placeholder="Valor M3" class="form-control" id="demo1" value="<?php echo $vr_unitario; ?>" disabled="">
												</div>
											</div>
												<div class="col-md-2">
												<div class="form-group">
													<label>Cantidades<span>*</span></label>
													<input type="number" step="any" name="contador1" placeholder="Contador Inicial" class="form-control" required value="<?php echo $cantidadcot; ?>" disabled="">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Valor Total<span>*</span></label>
													<input type="text" name="valor_cot" placeholder="Valor Material" class="form-control" id="demo2" value="<?php echo $valor_cot; ?>" disabled="">
												</div>
											</div>
											<hr>
											
										</div>
							<div style="display: none;" class="row">
								<div class="card-footer">
								  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Actualizar</button>
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
<script type="text/javascript">
	var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n')
}
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#fecha_radicada').datepicker();
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
