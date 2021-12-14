<?php 
	$RolSesion = $_SESSION['IdRol'];
	$IdSesion = $_SESSION['IdUser'];

error_reporting(E_ALL);
ini_set('display_errors', '0');
include_once 'controladores/categoriainsumosController.php';
include_once 'modelos/categoriainsumos.php';
include_once 'controladores/unidadesmedController.php';
include_once 'modelos/unidadesmed.php';
include_once 'controladores/proyectosController.php';
include_once 'modelos/proyectos.php';
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Nuevo Insumo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=insumos&&action=todos">Insumo</a></li>
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
							<form role="form" action="?controller=insumos&&action=guardar" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="estado_insumo" value="1">
									<input type="hidden" name="creado_por" value="<?php echo($IdSesion);?>">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Agregar nuevo insumo</h3>
								</div>
							
							<div class="row">
								
								<div class="col-12">
									<div class="form-group">
									  <label for="sel1">Seleccione la Categoría al cual está asociado:</label>
									  <select class="form-control mi-selector" id="categoriainsumo_id" name="categoriainsumo_id" required>
										<option value="" selected>Seleccione una Categoría</option>
										<?php
										$rubros = Categoriainsumos::obtenerListaInsumos();
										foreach ($rubros as $campo){
											$nombre = $campo['nombre'];
											$id = $campo['id'];
										?>
										<option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
										<?php } ?>
									  </select>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
									  <label for="nombres">Nombre Insumo</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="text" name="nombre_insumo" value="" class="form-control" id="nombre_insumo" placeholder="Ingrese el nombre" maxlength="200" required>
              </div>
									</div>
								  </div>

								<div class="col-12">
									<div class="form-group">
									  <label for="sel1">Seleccione la Unidad:</label>
									  <select class="form-control mi-selector" id="unidadmedida_id" name="unidadmedida_id" required>
										<option value="" selected>Seleccione la unidad</option>
										<?php
										$rubros = Unidadesmed::obtenerListaUnidades();
										foreach ($rubros as $campo){
											$nombre = $campo['abreviatura'];
											$id = $campo['id'];
										?>
										<option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
										<?php } ?>
									  </select>
									</div>
								</div>
								 

								  <div id="" class="col-md-12">
                        <div class="form-group">
                          <label> Cuenta con Inventario Inicial: <span>*</span></label>
                <select class="form-control" id="foo" name="inventario" required>
                    <option value="" selected="">Seleccionar...</option>
                    <option value="Si">Si</option>
                    <option value="No" >No</option>
                    
                </select>
                        </div>
                      </div>
                      <hr>

                <div id="campocampamento" style="display:none;"  class="col-md-12">
                        <div class="form-group">
                          <label> Seleccione el Proyecto: <span>*</span></label>
                          <select class="form-control" id="proyecto_id_proyecto" name="proyecto_id_proyecto" >
                            <option value="" selected>Seleccionar...</option>
                            <?php                     
                        $campamentos = Proyectos::obtenerListaProyectos(); 
                            foreach ($campamentos as $campamento ){
                              $id_proyecto  = $campamento['id_proyecto'];
                              $nombre_proyecto = $campamento['nombre_proyecto'];
                            ?>
                            <option value="<?php echo $id_proyecto ; ?>"><?php echo utf8_encode($nombre_proyecto); ?></option>
                            <?php } ?>
                          </select>

                        </div>
                      </div>
                  <div id="campocantidad" style="display:none;" class="col-md-12">
                        <div class="form-group">
                          <label>Cantidad<span>*</span></label>
                          <input type="number" step="any" name="cantidad" placeholder="Indique la cantidad" class="form-control"  value="">
                          <small>Decimales separados con punto</small>
                        </div>
                  </div>
                  <div id="campoobservaciones" style="display:none;" class="col-md-12">
												<div class="form-group">
													<label>Observaciones<span>*</span></label>
									<textarea class="form-control" rows="2" id="descripcion" name="observaciones"><?php echo utf8_encode($observaciones);?></textarea>
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
 $('#foo').change(function() {
    var el = $(this);
    if(el.val() === "Si") {
      alert("Ingresa la cantidad y ubicación");
       
          $('#campocampamento').show();   
          $('#campocantidad').show();   
           $('#campoobservaciones').show();   
    } else {   
          $('#campocampamento').hide();
           $('#campocantidad').hide(); 
           $('#campoobservaciones').hide();  
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
