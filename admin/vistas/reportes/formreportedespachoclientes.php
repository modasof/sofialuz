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
<div class="box box-primary collapsed-box ">
            <div class="box-header with-border">
              <h3 class="box-title"> Registrar Despacho Cliente
              	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </h3>

              <div class="box-tools pull-right">
              <!--   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button> -->
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	<form role="form" autocomplete="off" action="?controller=reportes&&action=guardardespachoclientes" method="POST" enctype="multipart/form-data" >
							<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
							?>
							
					<input type="hidden" name="creado_por" value="<?php echo($IdSesion);?>">
					<input type="hidden" name="estado_reporte" value="1">
					<input type="hidden" name="viajes" value="1">
					<input type="hidden" name="radicada" value="No">
					<input type="hidden" name="factura" value="0">
					<input type="hidden" name="pagado" value="No">
					<input type="hidden" name="fecha_radicada" value="0000-00-00">
					<input type="hidden" name="reporte_publicado" value="1">
					<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual);?>">

					<div class="card-body">
							<div class="row">
								
								 <div class="col-md-4">
										<div class="form-group">
										  <label for="fila2_columna1">Documento <small>Tamaño máximo 10MB</small></label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file=""  multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ required>
												</div>
										</div>
									   </div>
							
											<div class="col-md-2">
												<div class="form-group">
													<label>Fecha del Despacho: <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Remisión Nº<span>*</span></label>
													<input type="number" step="any" name="remision" placeholder="Remisión Nº" class="form-control" required value="">
													
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label> Seleccione el Campamento: <span>*</span></label>
													<select class="form-control" id="campamento_id_campamento" name="campamento_id_campamento" required>
														<option value="" selected>Seleccionar...</option>
														<?php														
														foreach ($campamentos as $campamento ){
															$id_campamento  = $campamento['id_campamento'];
															$nombre_campamento = $campamento['nombre_campamento'];
														?>
														<option value="<?php echo $id_campamento ; ?>"><?php echo utf8_encode($nombre_campamento); ?></option>
														<?php } ?>
													</select>

												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label> Seleccione el Cliente: <span>*</span></label>
								<select class="form-control" id="cliente_id_cliente" name="cliente_id_cliente" required>
										<option value="" selected>Seleccionar...</option>
										<?php
										$rubros = Clientes::obtenerListaClientes();
										foreach ($rubros as $campo){
											$id_cliente = $campo['id_cliente'];
											$nombre_cliente = $campo['nombre_cliente'];
										?>
										<option value="<?php echo $id_cliente; ?>"><?php echo utf8_encode($nombre_cliente); ?></option>
										<?php } ?>
								</select>

												</div>
											</div>
											<div id="divplaca" class="col-md-4">
												<div class="form-group">
													<label> Seleccione el Producto: <span>*</span></label>
								<select class="form-control" id="producto_id_producto" name="producto_id_producto" required>
										<option value="" selected>Seleccionar...</option>
										<?php
										$rubros = Productos::obtenerListaProductos();
										foreach ($rubros as $campo){
											$id_producto = $campo['id_producto'];
											$nombre_producto = $campo['nombre_producto'];
										?>
										<option value="<?php echo $id_producto; ?>"><?php echo utf8_encode($nombre_producto); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											<div id="divplaca" class="col-md-4">
												<div class="form-group">
													<label> Seleccione el Equipo: <span>*</span></label><br>
								<select style="width: 300px;" class="form-control mi-selector" id="equipo_id_equipo" name="equipo_id_equipo" required>
										<option value="" selected>Seleccionar...</option>
										<?php
										$rubros = Equipos::obtenerListaVolquetasAsf();
										foreach ($rubros as $campo){
											$id_equipo = $campo['id_equipo'];
											$nombre_equipo = $campo['nombre_equipo'];
										?>
										<option value="<?php echo $id_equipo; ?>"><?php echo utf8_encode($nombre_equipo); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											
											<div id="" class="col-md-4">
												<div class="form-group">
													<label> Despachado por: <span>*</span></label>
								<select class="form-control" id="despachado_por" name="despachado_por" required>
										<option value="" selected>Seleccionar...</option>
										<?php
										$rubros = Funcionarios::obtenerListaFuncionarios();
										foreach ($rubros as $campo){
											$id_funcionario = $campo['id_funcionario'];
											$nombre_funcionario = $campo['nombre_funcionario'];
										?>
										<option value="<?php echo $id_funcionario; ?>"><?php echo utf8_encode($nombre_funcionario); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											
											<div id="" class="col-md-2">
												<div class="form-group">
													<label> Incluye Transporte: <span>*</span></label>
								<select class="form-control" id="transporte" name="transporte" required>
										<option value="" >Seleccionar...</option>
										<option value="Si">Si</option>
										<option value="No" >No</option>
										
								</select>
												</div>
											</div>
										
											
											<div class="col-md-2">
												<div class="form-group">
													<label>m3 Volqueta<span>*</span></label>
													<input type="number" step="any" name="cantidad" placeholder="Indique la cantidad" class="form-control" required value="">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Kilómetraje<span>*</span></label>
													<input type="number" step="any" name="kilometraje" placeholder="Indique el Kilómetraje" class="form-control" required value="">
													<small>Decimales separados con punto</small>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Valor Unitario<span>*</span></label>
													<input type="text" name="valor_m3" placeholder="Valor M3" class="form-control" id="demo1">
												</div>
											</div>
												
											<div class="col-md-12">
												<div class="form-group">
													<label>Observaciones<span>*</span></label>
									<textarea class="form-control" rows="2" id="descripcion" name="observaciones"></textarea>
												</div>
											</div>
											
										</div>
							<div class="row">
								<div class="card-footer">
								  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Reportar Despacho</button>
								</div>
						  </div>
						  </form>
</div>
</div>


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
