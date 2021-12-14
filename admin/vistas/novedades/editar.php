<?php 
  include_once 'modelos/funcionarios.php';
include_once 'controladores/funcionariosController.php';
 ?>
<?php
$campos = $campos->getCampos();
foreach ($campos as $campo){
			 $id = $campo['id'];
            $funcionario_id = $campo['funcionario_id'];
            $reportado_por = $campo['reportado_por'];
            $tipo_novedad = $campo['tipo_novedad'];
            $fecha_novedad = $campo['fecha_novedad'];
            $imagen = $campo['imagen'];
            $observaciones = $campo['observaciones'];
            $marca_temporal = $campo['marca_temporal'];
            $nombrefuncionario=Funcionarios::obtenerNombreFuncionario($funcionario_id);
}
?>

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
          <h1 class="m-0 text-dark">Editar Novedad </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=novedades&&action=todos">Informe Novedades</a></li>
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
							<form role="form" action="?controller=novedades&&action=actualizar&&id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								
							 <div class="row">
									  <div class="col-12">
										<div class="form-group">
										  <label for="fila2_columna1">Soporte Novedad</label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen;?>" multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ >
													 <input type="hidden" name="ruta1" value="<?php echo $imagen;?>" >
												</div>
										</div>
									   </div>
						
								 <div class="col-sm-12 col-xs-12">
									 <div class="form-group">
                          <label>Reportado por: <span>*</span></label>
                          <select class="form-control" id="reportado_por" name="reportado_por" required>
										<option value="<?php echo($reportado_por) ?>" selected><?php echo($reportado_por) ?></option>
										<option value="Jose Daniel Meza">Jose Daniel Meza</option>
										<option value="Fredy Gonzalez">Fredy Gonzalez</option>
										
									  </select>
                        </div>
								  </div>
								 <div class="col-sm-6 col-xs-12">
									<div class="form-group">
									  <label for="sel1">Tipo de Novedad:</label>
									  <select class="form-control" id="tipo_novedad" name="tipo_novedad" required>
										<option value="<?php echo($tipo_novedad) ?>" selected><?php echo($tipo_novedad) ?></option>
										<option value="Dia no laborado">Día no laborado</option>
										 <option value="Horas Extras">Horas Extras</option>
										<option value="Incapacidad">Incapacidad</option>
										<option value="Llamado de atencion verbal">Llamado de Atención verbal</option>
										<option value="Llamado de atencion escrito">Llamado de Atención escrito</option>
										<option value="Llegada tarde">Llegada tarde</option>
										<option value="Memorando">Memorando</option>
										<option value="Retiro">Retiro</option>
										<option value="Perdida de EPP">Perdida de EPP</option>
										<option value="Permiso">Permiso</option>
									  </select>
									</div>
								  </div>
								  
								   <div class="col-sm-6 col-xs-12">
									 <div class="form-group">
                          <label>Fecha del Reporte: <span>*</span></label>
                          <input type="date" name="fecha_novedad" placeholder="Fecha Novedad" class="form-control required" required id="fecha_novedad" value="<?php echo($fecha_novedad) ?>">
                        </div>
								</div>
								  <div class="col-sm-12 col-xs-12">
									 <div class="form-group">
                          <label>Observaciones: <span>*</span></label>
                            <textarea class="form-control" rows="4" name="observaciones" id="descripcion" placeholder="Ingrese aquí la descripción de la novedad" maxlength="500" required><?php echo($observaciones) ?></textarea>
                        </div>
								</div>
								
								

							</div>
							<div class="card-footer">
							  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
							</div>
						  </div>
						  <!-- /.card -->

							</form>
						</div>
					  </div>

					</div> <!-- FIN DE ROW-->
				</div><!-- FIN DE CONTAINER FORMULARIO-->
			</div> <!-- Fin Row -->
		</div> <!-- Fin Container -->
	</div> <!-- Fin Content -->



</div> <!-- Fin Content-Wrapper -->


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
