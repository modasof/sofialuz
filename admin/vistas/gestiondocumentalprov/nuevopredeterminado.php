<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">

	<div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title"> AGREGAR DOCUMENTO
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
              	<form role="form" action="?controller=gestiondocumentalprov&&action=guardar&&id_modulo=<?php echo($modulo_gestion) ?>&&id=<?php echo($id_equipo); ?>" method="POST" enctype="multipart/form-data">
								<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								?>
							<input type="hidden" name="modulo_id_modulo" value="<?php echo($modulo_gestion); ?>">
							<input type="hidden" name="creado_por" value="<?php echo($IdSesion) ?>">
							<input type="hidden" name="gestion_publicado" value="1">
							<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">
							<input type="hidden" name="gestion_estado" value="1">
							  <div class="card-body">
								<!-- <div class="card-header">
								  <h3 class="card-title">Agregar nuevo documento </h3>
								</div> -->
							 <div class="row">
									  <div class="col-sm-4">
										<div class="form-group">
										  <label for="fila2_columna1">Seleccione el documento <small>Tamaño máximo 10MB</small></label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file=""  multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ required>
												</div>
										</div>
									   </div>
							

								 <div class="col-sm-4">
									<div class="form-group">
											<label for="sel1">Tipo Documento:<span>*</span></label>
														  <select class="form-control"  name="documento_id_documento" >
																  <option value="" selected>Seleccionar tipo de documento...</option>
																<?php
																	$cajas = gestiondocumentalprov::obtenerDocumentos($modulo_gestion);
																	foreach($cajas as $caja){
																		$id_documento = $caja['id_documento'];
																		$nombre_documento = $caja['nombre_documento'];
																?>
																<option value="<?php echo $id_documento; ?>"><?php echo utf8_encode($nombre_documento); ?></option>
																<?php }?>
														  </select>
													</div>
								  </div>
								<?php 
								if ($modulo_gestion==1) {
								// SEGÚN EL TIPO DE MODULO SE HABILITA EL LISTADO ASOCIADO
								// ASOCIADO A CUENTAS
								 ?>
								  	<input type="hidden" name="cuenta_id_cuenta" value="<?php echo($id_cuenta); ?>">
								  <?php 
								}
								elseif ($modulo_gestion==2) {
								   ?>
								   <div class="col-sm-4">
									<input type="hidden" name="cuenta_id_cuenta" value="<?php echo($id_equipo); ?>">
								  </div>
								  <?php 
								}
								elseif ($modulo_gestion==5	) {
								   ?>
								   <div class="col-sm-4">
									<input type="hidden" name="cuenta_id_cuenta" value="<?php echo($id_equipo); ?>">
								  </div>
								  <?php 
								}
								   ?>

								   <div class="col-md-4">
												<div class="form-group">
													<label>Alerta de expiración: <span>*</span></label>
													 <select class="form-control"  name="alerta" required="" id="alerta">
															<option value="" selected="">Requiere Alerta....</option>
															<option value="Si">Si</option>
															<option value="No">No</option>
															
														  </select>
												</div>
											</div>
								  <div style="display: none;" id="divfecha" class="col-md-4">
												<div class="form-group">
													<label>Expira el día: <span>*</span></label>
													<input type="date" name="fecha_expiracion" placeholder="Fecha" class="form-control"  id="fecha_expiracion">
												</div>
											</div>
								<div class="card-footer">
							  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
							</div>
							</div>
							
						  </div>
						  <!-- /.card -->

							</form>
							
            </div>
            <!-- /.box-body -->
          </div>

<script type="text/javascript">
  	var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n') 
}        
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#fecha_expiracion').datepicker();
        //dateFormat: 'dd-mm-yy'
    }); 
} 
  </script>

<script type="text/javascript">
  $(function () {
   $('[data-toggle="tooltip"]').tooltip();
  })
</script>
<script type="text/javascript">
                        $("#alerta").change(function() {
                            var selectMedio = $("#alerta option:selected").html();
                        $(document).ready
                            if (selectMedio == "Si") { 
                                $("#divfecha").slideToggle(100); 
                            }
                        });
                        </script>
                    <script type="text/javascript">
                        $("#alerta").change(function() {
                            var selectMedio = $("#alerta option:selected").html();
                        $(document).ready
                            if (selectMedio == "No") { 
                                $("#divfecha").hide("slow");  
                            }
                        });
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
