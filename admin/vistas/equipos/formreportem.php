<?php
ini_set('display_errors', '0');

include_once 'controladores/equiposController.php';
include_once 'modelos/equipos.php';

include_once 'controladores/tipomantenimientoController.php';
include_once 'modelos/tipomantenimiento.php';

include_once 'controladores/usuariosController.php';
include_once 'modelos/usuarios.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];



?>

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
<div class="box box-primary ">
            <div class="box-header with-border">
              <h3 class="box-title"> Registrar Reporte
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

	<form role="form" action="?controller=equipos&&action=guardarestado&&usermecanico=0&&id_equipo=0" method="POST" enctype="multipart/form-data" autocomplete="off">
							<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								$DiaActual = date('Y-m-d');
								?>
							<input type="hidden" name="creado_por" value="<?php echo($IdSesion) ?>">
							<input type="hidden" name="mecanico_id" value="<?php echo($IdSesion) ?>">
							<input type="hidden" name="estado_publicado" value="1">
							<input type="hidden" name="reporte_publicado" value="1">
							<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">
							<input type="hidden" name="valor_reporte" value="0">
							<input type="hidden" name="num_salida_inv" value="0">
							  <div class="card-body">
								
							<div class="row">
									<div class="col-md-12">
												<div class="form-group">
													<label>Fecha Reporte: <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte">
												</div>
											</div>
										 <div class="col-md-12">
                        <div class="form-group">
                          <label>Fecha Estimada de Reparación: <span>*</span></label>
                          <input type="date" name="tiempo" placeholder="Fecha" class="form-control required" value="" required id="tiempo">
                        </div>
                      </div>
											
											
											<div id="divplaca" class="col-md-12">
												<div class="form-group">
											<label> Seleccione el Equipo: <span>*</span></label>
							<select  class="form-control mi-selector" id="equipo_id_equipo" name="equipo_id_equipo"  required>
								
										<option value="0" selected>Seleccionar...</option>
										<?php
										$rubros = Equipos::obtenerListaEquiposAsf();
										foreach ($rubros as $campo){
											$id_equipo = $campo['id_equipo'];
											$nombre_equipo = $campo['nombre_equipo'];
										?>
										<option value="<?php echo $id_equipo; ?>"><?php echo $nombre_equipo; ?></option>
										<?php } ?>
								</select>
												</div>
											</div>	

											<div class="col-md-12">
												<div class="form-group">
													<label>Estado del Equipo: <span>*</span></label>
													
													 <select class="form-control mi-selector" id="estado_sel" name="estado_sel" required="">
															<option value="">Seleccione una opción....</option>
															<option value="Mantenimiento">Mantenimiento</option>
															<option value="Fuera de Servicio" selected="">Fuera de Servicio</option>
													</select>
												</div>
											</div>

											<div style="display: none;" id="divmto" class="col-md-12">
												<div class="form-group">
											<label> Seleccionar Tipo Mantenimiento: <span>*</span></label>
	<select class="form-control mi-selector" id="mantenimiento_id" name="mantenimiento_id">
								
										<option value="0" selected>Seleccionar</option>
										<?php
										$rubros = Tipomantenimiento::obtenerListaMantenimientos();
										foreach ($rubros as $campo){
											$id_usuario = $campo['id_tipomantenimiento'];
											$nombre_usuario = $campo['nombre_tipomantenimiento'];
										?>
										<option value="<?php echo $id_usuario; ?>"><?php echo $nombre_usuario; ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
										
											<div class="col-md-12">
												<div class="form-group">
													<label>Problemas Presentados<span>*</span></label>
													  <textarea class="form-control" rows="5" id="descripcion" name="observaciones"></textarea>
												</div>
											</div>
											<div style="display: none;" class="col-md-12">
												<div class="form-group">
													<label>Actividad Realizada<span>*</span></label>
													  <textarea class="form-control" rows="5" id="descripcion" name="actividad"></textarea>
												</div>
											</div>	
											<div  style="display: none;" class="col-md-12">
												<div class="form-group">
													<label>Nombre y/o Referencia del repuesto cambiado<span>*</span></label>
													  <textarea class="form-control" rows="5" id="descripcion" name="repuesto"></textarea>
												</div>
											</div>
										</div>
							<div class="row">
								<div class="card-footer">
								  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar Reporte</button>
								</div>
						  </div>
						  </form>
</div>
</div>


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

<script type="text/javascript">
 $('#estado_sel').change(function() {
    var el = $(this);
    if(el.val() === "Mantenimiento") {
      //alert("Has seleccionado transporte con Flete");
       
          $('#divmto').show();
         
    } else {
      //alert("Has seleccionado transporte con Flete y Material");
        
          //$('#campocampamento').show();
           $('#divmto').hide();  
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
