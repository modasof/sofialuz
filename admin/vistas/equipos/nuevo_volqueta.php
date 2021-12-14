<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Nuevo Equipo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=equipos&&action=volquetas">Equipos</a></li>
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
							<form role="form" action="?controller=equipos&&action=guardarvol" method="POST" enctype="multipart/form-data" autocomplete="off">
								<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								// nombre_equipo, marca_equipo, serial_equipo, modelo, unidad_trabajo, tipo_equipo, placa, propietario, estado_equipo, equipo_publicado, creado_por, marca_temporal, observaciones
								?>
							
							<input type="hidden" name="estado_equipo" value="Desocupado">
							<input type="hidden" name="creado_por" value="1">
							<input type="hidden" name="equipo_publicado" value="1">
							<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">

							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Agregar Nueva Volqueta</h3>
								</div>

								
							<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Indique el nombre del equipo: <span>*</span></label>
													<input type="text" name="nombre_equipo" placeholder="Nombre del equipo" class="form-control " required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Tipo Equipo: <span>*</span></label>
													
													 <select class="form-control" id="tipo_equipo" name="tipo_equipo" required="">
															<option value="" selected="">Seleccione una opción....</option>
															<option value="Maquinaria Pesada">Maquinaria Pesada</option>
															<option value="Volquetas">Volquetas</option>
															<option value="Vehículos">Vehículos</option>
															<option value="Equipos Menores">Equipos Menores</option>
															<option value="Herramientas">Herramientas</option>
													</select>
												</div>
											</div>
											<div id="divplaca" style="display: none;" class="col-md-6">
												<div class="form-group">
													<label>Número de Placa<span>*</span></label>
													<input type="text" name="placa" placeholder="Digite la placa" class="form-control" value="0">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Indicar marca<span>*</span></label>
													<input type="text" name="marca_equipo" placeholder="Digite la marca" class="form-control " required>
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label>Serial<span>*</span></label>
													<input type="text" name="serial_equipo" placeholder="Digite el Serial" class="form-control" >
												</div>
											</div>

											
											<div class="col-md-6">
												<div class="form-group">
													<label>Modelo<span>*</span></label>
													<input type="text" name="modelo" placeholder="Modelo / Año " class="form-control" required>
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label>Unidad de Trabajo: <span>*</span></label>
													
													 <select class="form-control"  name="unidad_trabajo" required="">
															<option value="" selected="">Seleccione una opción....</option>
															<option value="KM">Kilómetros</option>
															<option value="HR">Horas</option>
															<option value="DIA">Días</option>
															<option value="MES">Mes</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Valor Mes: <span>*</span></label>
													<input type="text" name="valor_unidad" placeholder="Valor Mes" class="form-control" id="demo1">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Propietario<span>*</span></label>
													<input type="text" name="propietario" placeholder="Digite el propietario" class="form-control" required>
												</div>
											</div>
												<div class="col-md-3">
												<div class="form-group">
													<label>Módulo: <span>*</span></label>
													
													 <select class="form-control"  name="modulo" required="">
															<option value="" selected="">Seleccione una opción....</option>
															<option value="Asf">Asf</option>
															<option value="Sofia">Sofia</option>
													</select>
												</div>
											</div>
												<div class="col-md-3">
												<div class="form-group">
													<label>Consumo en Galones Interno<span>*</span></label>
													<input type="number" step="any" name="rend_interno" placeholder="Indique el consumo del equipo x hr ó km" class="form-control" required value="">
													
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group">
													<label>Unidad de Trabajo Interna: <span>*</span></label>
													
													 <select class="form-control"  name="unidad_interna" required="">
														<option value="<?php echo utf8_encode($unidad_interna) ?>" selected="">Seleccionar...</option>
															<option value="HR">Horas</option>
															<option value="DIA">Días</option>
															<option value="MES">Mes</option>
															<option value="KM">Kilómetros</option>
													</select>
												</div>
											</div>
											
											<div class="col-md-3">
												<div class="form-group">
													<label>Consumo en Galones Externo<span>*</span></label>
													<input type="number" step="any" name="rend_externo" placeholder="Indique el consumo del equipo x hr ó km" class="form-control" required value="">
													
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group">
													<label>Unidad de Trabajo Externa: <span>*</span></label>
													
													 <select class="form-control"  name="unidad_externa" required="">
															<option value="<?php echo utf8_encode($unidad_externa) ?>" selected="">Seleccionar...</option>
															<option value="HR">Horas</option>
															<option value="DIA">Días</option>
															<option value="MES">Mes</option>
															<option value="KM">Kilómetros</option>
													</select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Observaciones<span>*</span></label>
													  <textarea class="form-control" rows="5" id="descripcion" name="observaciones"></textarea>
												</div>
											</div>
										
											
										
										</div>
							
						
							<div class="row">
								<div class="card-footer">
								  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
								</div>
						  </div>
						  </form>
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
                        $("#tipo_equipo").change(function() {
                            var selectMedio = $("#tipo_equipo option:selected").html();
                        $(document).ready
                            if (selectMedio == "Volquetas" ) { 
                                $("#divplaca").slideToggle(100); 
                            }
                        });
                        </script>
                     <script type="text/javascript">
                        $("#tipo_equipo").change(function() {
                            var selectMedio = $("#tipo_equipo option:selected").html();
                        $(document).ready
                            if (selectMedio == "Vehículos" ) { 
                                $("#divplaca").slideToggle(100); 
                            }
                        });
                        </script>

                     <script type="text/javascript">
                        $("#tipo_equipo").change(function() {
                            var selectMedio = $("#tipo_equipo option:selected").html();
                        $(document).ready
                            if (selectMedio == "Maquinaria Pesada") { 
                               $("#divplaca").hide("slow"); 
                            }
                        });
                        </script>
                      <script type="text/javascript">
                        $("#tipo_equipo").change(function() {
                            var selectMedio = $("#tipo_equipo option:selected").html();
                        $(document).ready
                            if (selectMedio == "Equipos Menores") { 
                               $("#divplaca").hide("slow"); 
                            }
                        });
                        </script>
                        <script type="text/javascript">
                        $("#tipo_equipo").change(function() {
                            var selectMedio = $("#tipo_equipo option:selected").html();
                        $(document).ready
                            if (selectMedio == "Herramientas") { 
                               $("#divplaca").hide("slow"); 
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
