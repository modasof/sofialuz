<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector2').select2();
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
                url:'vistas/reportes/ajaxrubros.php',
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

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Registrar Cuenta x Pagar
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </h3>

              <div class="box-tools pull-right">
              <!--   
			// Campos tabla de ordenesdecompra 

						(imagen, imagen_cot, fecha_reporte, valor_total, valor_retenciones, valor_iva, estado_orden, proveedor_id_proveedor, medio_pago, observaciones, marca_temporal, usuario_creador, rubro_id, subrubro_id, vencimiento, factura, estado_recibido, compra_de)

             -->
              </div>

              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	<form role="form" autocomplete="off" action="?controller=reportes&&action=guardarcuentaxpagar" method="POST" enctype="multipart/form-data" >
							<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
							?>
							
					<input type="hidden" name="valor_retenciones" value="0">
					<input type="hidden" name="valor_iva" value="0">
					<input type="hidden" name="estado_orden" value="1">
					<input type="hidden" name="medio_pago" value="Credito">
					<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual);?>">
					<input type="hidden" name="usuario_creador" value="<?php echo($IdSesion);?>">
					<input type="hidden" name="factura" value="0">
					<input type="hidden" name="estado_recibido" value="Pendiente Llegada">
					<input type="hidden" name="compra_de" value="cxp">
				
				
				

					<div class="card-body">
						 
									  <div class="col-12">
										<div class="form-group">
										  <label for="fila2_columna1">Documento <small>Tamaño máximo 10MB</small></label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file=""  multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ required>
												</div>
										</div>
									   </div>
						
							<div class="row">
									<div class="col-md-12">
												<div class="form-group">
													<label>Ingrese la Fecha: <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte">
												</div>
									</div>
									<div id="divproveedor" class="col-md-12">
												<div class="form-group">
													<label> Seleccione el Proveedor: <span>*</span></label>
								<select style="width:300px;" class="form-control mi-selector2 " id="proveedor_id_proveedor" name="proveedor_id_proveedor" required>
										<option value="" selected>Seleccionar...</option>
										<?php
										$rubros = Proveedores::obtenerListaProveedores();
										foreach ($rubros as $campo){
											$id_proveedor = $campo['id_proveedor'];
											$nombre_proveedor = $campo['nombre_proveedor'];
										?>
										<option value="<?php echo $id_proveedor; ?>"><?php echo utf8_encode($nombre_proveedor); ?></option>
										<?php } ?>
								</select>
												</div>
										</div>

											<div id="divrubro" class="col-md-12">
													<div class="form-group">
														  <label for="sel1">Rubro:<span>*</span></label>
														  <select style="width:300px;" class="form-control mi-selector2" id="rubro_id" name="rubro_id" >
																  <option value="" selected>Seleccione...</option>
																<?php
																	$rubros = Rubros::obtenerListaRubros();
																	foreach($rubros as $rubro){
																		$id_rubro = $rubro['id_rubro'];
																		$nombre_rubro = $rubro['nombre_rubro'];
																?>
																<option value="<?php echo $id_rubro; ?>"><?php echo utf8_encode($nombre_rubro); ?></option>
																<?php }?>
														  </select>
													</div>
												</div>

												<div  class="col-md-12">
												<div class="form-group">
													  <label for="sel1">Sub-Rubro:<span>*</span></label>
													  <select style="width:300px;" class="form-control mi-selector2" id="subrubro_id" name="subrubro_id" >
													  	<option value="0">Seleccionar Subrubro</option>
													  </select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Vencimiento a<span>*</span></label>
													<select style="width:300px;" class="form-control mi-selector2" name="vencimiento" required="">
														<option value="">Seleccionar...</option>
														<?php

														for ($i=0; $i <=361 ; $i++) { 
															echo("<option value='".$i."'>".$i." días</option>");
														}
														 ?>
													
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Valor:<span>*</span></label>
													<input type="text" name="valor_total" placeholder="Valor Total" class="form-control" id="demo1">
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
								  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Reportar Compra</button>
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
