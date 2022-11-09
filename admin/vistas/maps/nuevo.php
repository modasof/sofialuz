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

<div class="box box-primary collapsed-box	">
            <div class="box-header with-border">
              <h3 class="box-title"> Registrar Horas / Máquinaria 
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
	<form role="form" autocomplete="off" action="?controller=horasmq&&action=guardarhoras" method="POST" enctype="multipart/form-data" >
							<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
							?>
							
					<input type="hidden" name="creado_por" value="<?php echo($IdSesion);?>">
					<input type="hidden" name="estado_reporte" value="1">
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
											<div class="col-md-3">
												<div class="form-group">
													<label>Fecha del Reporte: <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte">
												</div>
											</div>
											
											
											
											
											<div class="col-md-3">
												<div class="form-group">
													<label>Horómetro Inicial<span>*</span></label>
													<input type="number" step="any" name="indicador" placeholder="Horómetro Inicial" class="form-control" required value="">
													<small>Decimales separados con punto</small>
												</div>
											</div>
										<div class="col-md-3">
												<div class="form-group">
													<label>Horómetro Final<span>*</span></label>
													<input type="number" step="any" name="cantidad" placeholder="Horómetro Final" class="form-control" required value="">
													<small>Decimales separados con punto</small>
												</div>
										</div>
										<div class="col-md-3">
												<div class="form-group">
													<label>Total Horas<span>*</span></label>
													<input type="number" step="any" name="hora_inactiva" placeholder="Total Horas" class="form-control" required value="">
													<small>Decimales separados con punto</small>
												</div>
										</div>
										<div style="display: none;" class="col-md-3">
												<div class="form-group">
													<label>Valor Hora: <span>*</span></label>
													<input type="text" name="valor_m3" placeholder="Valor Hora" class="form-control" id="demo1" value="0">
												</div>
										</div>
							<div id="divplaca" class="col-md-6">
												<div class="form-group">
													<label> Seleccione el Equipo: <span>*</span></label>
								<select style="width: 300px;" class="form-control mi-selector" id="equipo_id_equipo" name="equipo_id_equipo" required>
										<option value="" selected>Seleccionar...</option>
										<?php
										$rubros = Equipos::ListaEquiposAsfMaqAmarilla();
										foreach ($rubros as $campo){
											$id_equipo = $campo['id_equipo'];
											$nombre_equipo = $campo['nombre_equipo'];
										?>
										<option value="<?php echo $id_equipo; ?>"><?php echo utf8_encode($nombre_equipo); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
								<div style="display: none;" id="" class="col-md-4">
												<div class="form-group">
													<label> Punto Despacho: <span>*</span></label>
								<select class="form-control" id="punto_despacho" name="punto_despacho" >
										<option value="0" selected="true">Seleccionar...</option>
										<option value="Comercializadora"  >Comercializadora</option>
										<option value="Cantera 1"  >Cantera 1</option>
								</select>
												</div>
											</div>

											<div style="display: none;"  id="" class="col-md-6">
												<div class="form-group">
													<label> Reportado por: <span>*</span></label>
								
									<select style="width: 300px;" class="form-control mi-selector2" id="despachado_por" name="despachado_por" required>
										<option value="0" selected >Seleccionar...</option>
										<?php
										$rubros = Usuarios::ListaUsuariosOperadores();
										foreach ($rubros as $campo){
											$id_usuario = $campo['id_usuario'];
											$nombre_usuario = $campo['nombre_usuario'];
										?>
										<option value="<?php echo $id_usuario; ?>"><?php echo utf8_encode($nombre_usuario); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											<div id="" class="col-md-6">
												<div class="form-group">
													<label> Operado por: <span>*</span></label>
							<select style="width: 200px;" class="form-control mi-selector3" id="recibido_por" name="recibido_por" required>
								
										<option value="" selected>Seleccionar...</option>
										<?php
										$rubros = Usuarios::ListaUsuariosOperadores();
										foreach ($rubros as $campo){
											$id_usuario = $campo['id_usuario'];
											$nombre_usuario = $campo['nombre_usuario'];
										?>
										<option value="<?php echo $id_usuario; ?>"><?php echo utf8_encode($nombre_usuario); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Valor Hora Operador: <span>*</span></label>
													<input type="text" name="valor_hora_operador" placeholder="Valor Hora Operador" class="form-control" id="demo2">
												</div>
											</div>

											<div id="adicional" class="col-md-3">
												<div class="form-group">
													<label> ¿Incluye equipo adicional?: <span>*</span></label>
							<select style="width: 200px;" class="form-control mi-selector3" id="equipo_adicional" name="equipo_adicional" required>
								
										<option value="" selected>Seleccionar...</option>
										<option value="Si">Si</option>
										<option value="No">No</option>
								</select>
												</div>
											</div>
											<div style="display: none;" id="campo_equipo" class="col-md-3">
												<div class="form-group">
													<label>Indique nombre del equipo: <span>*</span></label>
													<input type="text" name="nombre_equipo_adicional" placeholder="Equipo Adicional" class="form-control" >
												</div>
											</div>

											

										<div class="col-md-4">
												<div class="form-group">
													<label> Seleccione el Cliente: <span>*</span></label>
								<select style="width: 200px;" class="form-control mi-selector" id="cliente_id_cliente" name="cliente_id_cliente" required>
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

										<div class="col-md-4">
												<div class="form-group">
													<label> Seleccione el Proyecto: <span>*</span></label>
								<select style="width: 200px;" class="form-control mi-selector" id="proyecto_id_proyecto" name="proyecto_id_proyecto" required>
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
											
											<div class="col-md-12">
												<div class="form-group">
													<label>Observaciones<span>*</span></label>
									<textarea class="form-control" rows="2" id="descripcion" name="observaciones"></textarea>
												</div>
											</div>
											
										</div>
							<div class="row">
								<div class="card-footer">
								  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Reportar Horas</button>
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
