<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
<script type="text/javascript">

$(document).ready(function(){
    $('#id_rubro').on('change',function(){
        var rubroID = $(this).val();
        //alert (rubroID);
        if(rubroID){
            $.ajax({
                type:'POST',
                url:'vistas/gastos/ajax.php',
                data:'id_rubro='+rubroID,
                success:function(html){
                    $('#id_subrubro').html(html);  
                }
            });
        }else{
            $('#id_subrubro').html('<option value="">Seleccione primero el rubro</option>');
            
        }
    });
});
</script>
<?php
$CajaSel=$_GET['id_caja'];
$cajas = Gastos::obtenerCajapor($CajaSel);
	foreach($cajas as $caja){
	$id_caja = $caja['id_caja'];
	$nombre_caja = $caja['nombre_caja'];
}?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Egreso en: <?php echo utf8_encode($nombre_caja); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=cajas&&action=todos">Cajas</a></li>
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
				<div class="container-fluid">
					<div class="row">
						<!-- ESTE DIV LO USO PARA CENTRAR EL FORMULARIO -->
						<!-- left column -->
						<div class="col-md-12">
						  <!-- general form elements -->
						  <div class="card card-primary">
							<!-- /.card-header -->
							<!-- form start -->
							<form role="form" action="?controller=gastos&&action=guardar&&id_caja=<?php echo($id_caja); ?>" method="POST" enctype="multipart/form-data">
								<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								?>
							
							<input type="hidden" name="estado_egreso" value="1">
							<input type="hidden" name="caja_ppal" value="<?php echo($CajaSel); ?>">
							<input type="hidden" name="creado_por" value="1">
							<input type="hidden" name="egreso_publicado" value="1">
							<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">
							
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Registrar Gasto en Caja</h3>
								</div>
							 <div class="row">
									  <div class="col-6">
										<div class="form-group">
										  <label for="fila2_columna1">Adjuntar el Soporte <br><small>Peso máximo 5MB, </small></label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="5M" data-errors-position="outside" accept="image/png, .jpeg,.pdf,.xls, .jpg, image/gif"/ required>
												</div>
										</div>
									   </div>

									
									<div class="col-6">
										<div  class="col-md-12">
												<div class="form-group">
													<label>Fecha Gasto: <span>*</span></label>
													<input type="date" name="fecha_egreso" placeholder="Fecha" class="form-control required" required id="beneficiario">
												</div>
											</div>

										 <div class="col-md-12">
												<div class="form-group">
													<label>Tipo de Beneficiario: <span>*</span></label>
													 <select class="form-control"  name="tipo_beneficiario" required="" id="tipo_beneficiario">
															<option value="" selected="">Seleccione el beneficiario....</option>
															<option value="Caja Sistema">Caja Sistema</option>
															<option value="Beneficiario Externo">Beneficiario Externo</option>
															
														  </select>
												</div>
											</div>
											<div style="display: none;" id="divcajas" class="col-md-12">
													<div class="form-group">
														  <label for="sel1">Caja Sistema:<span>*</span></label>
														  <select class="form-control"  name="caja_id_caja" >
																  <option value="" selected>Seleccione una caja...</option>
																<?php
																	$cajas = Gastos::obtenerCajas();
																	foreach($cajas as $caja){
																		$id_caja = $caja['id_caja'];
																		$nombre_caja = $caja['nombre_caja'];
																?>
																<option value="<?php echo $id_caja; ?>"><?php echo $nombre_caja; ?></option>
																<?php }?>
														  </select>
													</div>
												</div>
											<div style="display: none;" id="divbeneficiario" class="col-md-12">
												<div class="form-group">
													<label>Beneficiario: <span>*</span></label>
													<input type="text" name="beneficiario" placeholder="Nombre del beneficiario" class="form-control  id="beneficiario">
												</div>
											</div>
												<div style="display: none;" id="divrubro" class="col-md-12">
													<div class="form-group">
														  <label for="sel1">Rubro:<span>*</span></label>
														  <select class="form-control" id="id_rubro" name="id_rubro" >
																  <option value="" selected>Seleccione...</option>
																<?php
																	$rubros = Gastos::obtenerRubros();
																	foreach($rubros as $rubro){
																		$id_rubro = $rubro['id_rubro'];
																		$nombre_rubro = $rubro['nombre_rubro'];
																?>
																<option value="<?php echo $id_rubro; ?>"><?php echo $nombre_rubro; ?></option>
																<?php }?>
														  </select>
													</div>
												</div>

												<div style="display: none;" id="divsubrubro" class="col-md-12">
												<div class="form-group">
													  <label for="sel1">Sub-Rubro:<span>*</span></label>
													  <select class="form-control" id="id_subrubro" name="id_subrubro" >
													  	<option value="0">Seleccionar Subrubro</option>
													  </select>
												</div>
												
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Valor del gasto: <span>*</span></label>
													<input type="text" name="valor_egreso" placeholder="Valor del gasto" class="form-control" id="demo1">
												</div>
											</div>

											<div>
												
											</div>
										  <div class="row">
											 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Descripción del Gasto (Máx 500 Carácteres)</label>
												  <div class="input-group">
													<div class="input-group-prepend">
													  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
													</div>
													  <textarea class="form-control" rows="4" name="observaciones" id="descripcion" placeholder="Ingrese la descripción del gasto" maxlength="500" required></textarea>
												  </div>
												</div>
											  </div>
										  </div>
										  <div class="card-footer">
							  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
							</div>
									  </div>


							
								
							</form>
						  </div>
						  <!-- /.card -->
						</div>
					  </div>
					</div>

											
					</div> <!-- FIN DE ROW-->
				</div><!-- FIN DE CONTAINER FORMULARIO-->
			</div> <!-- Fin Row -->
		</div> <!-- Fin Container -->
	</div> <!-- Fin Content -->



</div> <!-- Fin Content-Wrapper -->
<script type="text/javascript">
	var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n') 
}        
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#fecha_egreso').datepicker();
    }); 
} 
</script>
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
                        $("#tipo_beneficiario").change(function() {
                            var selectMedio = $("#tipo_beneficiario option:selected").html();
                        $(document).ready
                            if (selectMedio == "Beneficiario Externo") { 
                                $("#divbeneficiario").slideToggle(100); 
                                $("#divcajas").hide("slow"); 
                                $("#divrubro").slideToggle(100);
                                $("#divsubrubro").slideToggle(100);
                            
                            }
                        });
                        </script>
                    <script type="text/javascript">
                        $("#tipo_beneficiario").change(function() {
                            var selectMedio = $("#tipo_beneficiario option:selected").html();
                        $(document).ready
                            if (selectMedio == "Caja Sistema") { 
                                $("#divcajas").slideToggle(100); 
                                $("#divbeneficiario").hide("slow");  
                                $("#divrubro").hide("slow"); 
                                $("#divsubrubro").hide("slow"); 
                                   
                            }
                        });
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
