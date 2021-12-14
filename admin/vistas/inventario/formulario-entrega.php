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

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Crear Requisición 
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
          <?php 
          $obtenerultimoidreq=obtenerultimoidreq();
           ?>
	<form role="form" autocomplete="off" action="?controller=requisiciones&&action=guardar&id=<?php echo($obtenerultimoidreq); ?>" method="POST" enctype="multipart/form-data" >
							<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								$DiaActualfor = date('Y-m-d');
							?>
							
					<input type="hidden" name="usuario_creador" value="<?php echo($IdSesion);?>">
					<input type="hidden" name="estado_id_requisicion" value="1">
					<input type="hidden" name="requisicion_publicada" value="0">
					<input type="hidden" name="requisicion_num" value="1">
					<input type="hidden" name="cliente_id_cliente" value="1">
					<input type="hidden" name="observaciones" value="ok">
					<input type="hidden" name="fecha_reporte" value="<?php echo($DiaActualfor); ?>">
					<input type="hidden" name="solicitado_por" value="<?php echo($IdSesion);?>">
					<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual);?>">
					<div class="card-body">
							<div class="row">
			
              
									
								

											<div class="col-md-4">
												<div class="form-group">
													<label> Seleccione el Destino: <span>*</span></label>
								<select style="width: 300px;" class="form-control mi-selector" id="proyecto_id_proyecto" name="proyecto_id_proyecto" required>
										<option value="" selected>Seleccionar Proyecto...</option>
										<?php
										$rubros = Proyectos::obtenerListaProyectos();
										foreach ($rubros as $campo){
											$id_proyecto = $campo['id_proyecto'];
											$nombre_proyecto = $campo['nombre_proyecto'];
										?>
										<option value="<?php echo $id_proyecto; ?>"><?php echo utf8_encode($nombre_proyecto); ?></option>
										<?php } ?>
								</select>

												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label> Tipo de Requisición: <span>*</span></label>
								<select style="width: 300px;" class="form-control mi-selector" id="tipo_requisicion" name="tipo_requisicion" required>
										<option value="" selected>Seleccionar</option>
									
										<option value="Insumos">Requisición de Insumos</option>
										<option value="Servicios">Requisición de Servicios</option>
										<option value="Equipos">Requisición de Equipos</option>
										
								</select>
												</div>
											</div>
						<div class="col-md-4">
												<div class="form-group">
													<label> Seleccione el área: <span>*</span></label>
								<select style="width: 300px;" class="form-control mi-selector" id="rq_area" name="rq_area" required>
										<option value="" selected>Seleccionar</option>
										<option value="Administrativa">Administrativa</option>
										<option value="Concreto">Concreto</option>
										<option value="HSEQ">Siso</option>
										<option value="Ingenieria">Ingeniería</option>
										<option value="Logistica">Logística</option>
										<option value="Mantenimiento">Mantenimiento</option>
								</select>
												</div>
						</div>
										</div>
										<div class="row">
								<div class="card-footer ">
								  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Siguiente</button>
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
 $('#equipo_adicional').change(function() {
    var el = $(this);
    if(el.val() === "No") {
          $('#campo_equipo').hide();   
    } else {
      alert("Has seleccionado Equipo adicional, indica cuál?"); 
          $('#campo_equipo').show();
    }      
});
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
