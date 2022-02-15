<?php
ini_set('display_errors', '0');
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/proyectos.php';
include_once 'controladores/proyectosController.php';
include_once 'modelos/proveedores.php';
include_once 'controladores/proveedoresController.php';
include_once 'modelos/rubros.php';
include_once 'controladores/rubrosController.php';
include_once 'modelos/subrubros.php';
include_once 'controladores/subrubrosController.php';
$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];
$idventa   = $_GET['id'];
$vereditar = $_GET['vereditar'];

$res    = compras::editarpor($idventa);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $id                     = $campo['id'];
    $imagen                 = $campo['imagen'];
    $imagen_cot             = $campo['imagen_cot'];
    $fecha_reporte          = $campo['fecha_reporte'];
    $valor_total            = $campo['valor_total'];
    $valor_retenciones      = $campo['valor_retenciones'];
    $valor_iva              = $campo['valor_iva'];
    $estado_orden           = $campo['estado_orden'];
    $proveedor_id_proveedor = $campo['proveedor_id_proveedor'];
    $medio_pago             = $campo['medio_pago'];
    $observaciones          = $campo['observaciones'];
    $marca_temporal         = $campo['marca_temporal'];
    $usuario_creador        = $campo['usuario_creador'];
    $rubro_id               = $campo['rubro_id'];
    $subrubro_id            = $campo['subrubro_id'];
    $vencimiento            = $campo['vencimiento'];
    $factura                = $campo['factura'];

    $nombrerubro    = Rubros::obtenerNombreRubro($rubro_id);
    $nombresubrubro = Subrubros::obtenerNombreSubrubro($subrubro_id);
    $nomproveedor   = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
    $nomreportador  = usuarios::obtenerNombreUsuario($usuario_creador);

    if ($estado_orden == "1") {
        $nomestado = "<span class='text-danger'><strong>Sin Facturar</strong></span>";
    } elseif ($estado_orden == "2") {
        $nomestado = "<span class='text-warning'><strong>Facturado</strong></span>";
    } else {
        $nomestado = "Sin Estado";
    }

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

<script type="text/javascript">
$(document).ready(function(){
    $('#rubro_id').on('change',function(){
        var rubroID = $(this).val();
        //alert (rubroID);
        if(rubroID){
            $.ajax({
                type:'POST',
                url:'vistas/compras/ajax.php',
                data:'rubro_id='+rubroID,
                success:function(html){
                    $('#subrubro_id').html(html);
                }
            });
        }else{
            $('#subrubro_id').html('<option value="">Seleccione primero el rubro</option>');

        }
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
          <h1 class="m-0 text-dark">Editar Orden compra OC00<?php echo($idventa); ?></h1>
          <h3>Proveedor: <?php echo($nomproveedor); ?></h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            
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
	<form role="form" autocomplete="off" action="?controller=compras&&action=actualizar&&id=<?php echo ($idventa); ?>" method="POST" enctype="multipart/form-data" >
							<?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
?>

					<input type="hidden" name="usuario_creador" value="<?php echo ($IdSesion); ?>">
					<input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual); ?>">
					<input type="hidden" name="valor_retenciones" value="<?php echo ($valor_retenciones); ?>">
					<input type="hidden" name="estado_orden" value="<?php echo ($estado_orden); ?>">
					<input type="hidden" name="proveedor_id_proveedor" value="<?php echo ($proveedor_id_proveedor); ?>">
					<input type="hidden" name="factura" value="<?php echo ($factura); ?>">
					<input type="hidden" name="valor_iva" value="<?php echo ($valor_iva); ?>">

					<div class="card-body">
							<div class="row">
								 <div class="col-md-4">
										<div class="form-group">
										  <label for="fila2_columna1">Cotización <small>Tamaño máximo 10MB</small></label>
												<div class="custom-file">
													 <input  name="imagen_cot" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen_cot; ?>" multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ >
													 <input type="hidden" name="ruta1" value="<?php echo $imagen_cot; ?>" >
												</div>
										</div>
									   </div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Fecha del Reporte: <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte" value="<?php echo ($fecha_reporte); ?>">
												</div>
											</div>

										<div  class="col-md-4">
												<div class="form-group">
													<label>Valor Sub Total: <span>*</span></label>
													<input required type="text" name="valor_total" placeholder="Valor Subtotal" class="form-control" id="demo1" value="<?php echo ($valor_total); ?>">
												</div>
											</div>
									
										
							<div id="divrubro" class="col-md-6">
													<div class="form-group">
														  <label for="sel1">Rubro:<span>*</span></label>
														  <select required class="form-control mi-selector" id="rubro_id" name="rubro_id" >
																  <option value="<?php echo ($rubro_id); ?>" selected><?php echo ($nombrerubro) ?></option>
																<?php
$rubros = Rubros::obtenerListaRubros();
foreach ($rubros as $rubro) {
    $id_rubro     = $rubro['id_rubro'];
    $nombre_rubro = $rubro['nombre_rubro'];
    ?>
																<option value="<?php echo $id_rubro; ?>"><?php echo utf8_encode($nombre_rubro); ?></option>
																<?php }?>
														  </select>
													</div>
										</div>

												<div  id="divsubrubro" class="col-md-6">
												<div class="form-group">
													  <label for="sel1">Sub-Rubro:<span>*</span></label>
													  <select required class="form-control mi-selector" id="subrubro_id" name="subrubro_id" >
													  	<option value="<?php echo ($subrubro_id); ?>"><?php echo ($nombresubrubro); ?></option>
													  </select>
												</div>
											</div>

											<div id="adicional" class="col-md-3">
												<div class="form-group">
													<label> Forma de pago: <span>*</span></label>
							<select  style="width: 200px;" class="form-control mi-selector3" id="medio_pago" name="medio_pago" required>

					<option value="<?php echo ($medio_pago); ?>" selected><?php echo ($medio_pago); ?></option>
										<option value="Contado">Contado</option>
										<option value="Credito">Crédito</option>
								</select>
												</div>
											</div>
						<?php
if ($medio_pago == "Contado") {
    echo ("<div style='display:none;' id='campo_vencimiento' class='col-md-4'>");
} else {
    echo ("<div id='campo_vencimiento' class='col-md-4'>");
}

?>

												<div  class="col-md-12">
							<label>Vencimiento a: <span>*</span></label>
								<select class="form-control" id="vencimiento" name="vencimiento" >
										<option value="<?php echo ($medio_pago); ?>" selected=""><?php echo ($medio_pago); ?></option>
										<?php
$min = 150;
for ($i = 0; $i < $min; $i++) {
    echo ("<option value=" . $i . ">" . $i . " días</option>");
}
?>

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
					'default': 'Adjuntar Cotización',
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

