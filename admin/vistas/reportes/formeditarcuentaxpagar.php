<?php
ini_set('display_errors', '0');
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';
include_once 'modelos/productos.php';
include_once 'controladores/productosController.php';
include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';
include_once 'modelos/proveedores.php';
include_once 'controladores/proveedoresController.php';
include_once 'modelos/subrubros.php';
include_once 'controladores/subrubrosController.php';
$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];
$idcompra=$_GET['id'];
$vereditar=$_GET['vereditar'];

$res=Reportes::editarcompraPor($idcompra);
$campos = $res->getCampos();
foreach($campos as $campo){
            $fecha_reporte = $campo['fecha_reporte'];
            $insumo_id_insumo = $campo['insumo_id_insumo'];
            $subrubro_id_subrubro = $campo['subrubro_id_subrubro'];
            $imagen = $campo['imagen'];
             $proveedor_id_proveedor = $campo['proveedor_id_proveedor'];
            $valor_m3 = $campo['valor_m3'];
            $cantidad = $campo['cantidad'];
            $creado_por = $campo['creado_por'];
            $estado_reporte = $campo['estado_reporte'];
            $reporte_publicado = $campo['reporte_publicado'];
            $marca_temporal = $campo['marca_temporal'];
            $pago_con = $campo['pago_con'];
            $beneficiario = $campo['beneficiario'];
            $observaciones = $campo['observaciones'];
            $vence = $campo['vence'];
            $nomprod=Insumos::obtenerNombreInsumo($insumo_id_insumo);
             $nomproveedor=Proveedores::obtenerNombreInsumo($proveedor_id_proveedor);
            if ($subrubro_id_subrubro==0) {
            	 $nomsubrubro='PENDIENTE';
            }
            else
            {
            	 $nomsubrubro=Subrubros::obtenerNombreSubrubro($subrubro_id_subrubro);	
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
<!-- Content Wrapper. Contains page content -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Editar Cuenta x Pagar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item"><a href="?controller=reportes&&action=cuentasxpagar">Reporte Cuenta x Pagar</a></li>
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
	<form role="form" autocomplete="off" action="?controller=reportes&&action=actualizarcuentaxpagar&&id=<?php echo($idcompra); ?>" method="POST" enctype="multipart/form-data" >
							<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
							?>
							
					<input type="hidden" name="creado_por" value="<?php echo($IdSesion);?>">
					<input type="hidden" name="estado_reporte" value="2">
					<input type="hidden" name="reporte_publicado" value="1">
					<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual);?>">
					<input type="hidden" name="beneficiario" value="<?php echo($beneficiario);?>">
					<input type="hidden" name="pago_con" value="<?php echo($pago_con);?>">

					<div class="card-body">
							<div class="row">
								 <div class="col-12">
										<div class="form-group">
										  <label for="fila2_columna1">Actualizar Documento</label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen;?>" multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ >
													 <input type="hidden" name="ruta1" value="<?php echo $imagen;?>" >
												</div>
										</div>
									   </div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Fecha de la Compra: <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte" value="<?php echo($fecha_reporte);?>">
												</div>
											</div>
											<div id="divplaca" class="col-md-12">
												<div class="form-group">
													<label> Seleccione el Proveedor: <span>*</span></label>
								<select class="form-control" id="proveedor_id_proveedor" name="proveedor_id_proveedor" required>
										<option value="<?php echo($proveedor_id_proveedor);?>" selected><?php echo utf8_encode($nomproveedor);?></option>
										<?php
										$rubros = Proveedores::obtenerListaInsumos();
										foreach ($rubros as $campo){
											$id_proveedor = $campo['id_proveedor'];
											$nombre_proveedor = $campo['nombre_proveedor'];
										?>
										<option value="<?php echo $id_proveedor; ?>"><?php echo utf8_encode($nombre_proveedor); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>


											<div id="divplaca" class="col-md-12">
												<div class="form-group">
													<label> Seleccione el Insumo: <span>*</span></label>
								<select class="form-control" id="insumo_id_insumo" name="insumo_id_insumo" required>
										<option value="<?php echo($insumo_id_insumo);?>" selected><?php echo utf8_encode($nomprod);?></option>
										<?php
										$rubros = Insumos::obtenerListaInsumos();
										foreach ($rubros as $campo){
											$id_insumo = $campo['id_insumo'];
											$nombre_insumo = $campo['nombre_insumo'];
										?>
										<option value="<?php echo $id_insumo; ?>"><?php echo utf8_encode($nombre_insumo); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											<div  class="col-md-12">
												<div class="form-group">
													<label>Seleccione el Rubro: <span>*</span></label>
								<select class="form-control" id="subrubro_id_subrubro" name="subrubro_id_subrubro" required>
										<option value="<?php echo($subrubro_id_subrubro);?>" selected><?php echo utf8_encode($nomsubrubro);?></option>
										<?php
										$rubros = Subrubros::obtenerSubRubros();
										foreach ($rubros as $campo){
											$id_subrubro = $campo['id_subrubro'];
											$nombre_subrubro = $campo['nombre_subrubro'];
										?>
										<option value="<?php echo $id_subrubro; ?>"><?php echo utf8_encode($nombre_subrubro); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Valor:<span>*</span></label>
													<input type="text" name="valor_m3" placeholder="Valor M3" class="form-control" id="demo1" value="<?php echo($valor_m3);?>">
												</div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group">
													<label>Cantidad<span>*</span></label>
													<input type="number" step="any" name="cantidad" placeholder="Indique la cantidad" class="form-control" required value="<?php echo($cantidad);?>">
													<small>Decimales separados con punto</small>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Vencimiento a<span>*</span></label>
													<select name="vence" required="">
														<option value="<?php echo($vence) ?>" selected=""><?php echo($vence) ?> días</option>
														<option value="8">8 días</option>
														<option value="15">15 días</option>
														<option value="20">20 días</option>
														<option value="25">25 días</option>
														<option value="30">30 días</option>
														<option value="35">35 días</option>
														<option value="40">40 días</option>
														<option value="45">45 días</option>
														<option value="50">50 días</option>
														<option value="55">55 días</option>
														<option value="60">60 días</option>
													</select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Observaciones<span>*</span></label>
									<textarea class="form-control" rows="2" id="descripcion" name="observaciones"><?php echo utf8_encode($observaciones);?></textarea>
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

