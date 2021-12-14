<?php
	$id = $_GET['id'];
	$campos = Vehiculos::obtenerPaginaPor($id);
	$campos = $campos->getCampos();
	foreach($campos as $campo){
	    $ano=$campo['ano'];
	    $vin=$campo['vin'];
	    $condicion=$campo['condicion'];
	    $ubicacion=$campo['ubicacion'];
	    $kilometros=$campo['kilometros'];
	    $pico_placa=$campo['pico_placa'];
		$id_marca=$campo['id_marca'];
		$id_modelo=$campo['id_modelo'];
		$id_version=$campo['id_version'];
		$id_categoria=$campo['id_categoria'];
		$tipo_version=$campo['tipo_version'];
		$cojineria=$campo['cojineria'];
		$garantia=$campo['garantia'];
		$carroceria=$campo['carroceria'];
		$transmision=$campo['transmision'];
		$motor=$campo['motor'];
		$potencia=$campo['potencia'];
		$nro_valvulas=$campo['nro_valvulas'];
		$tipo_motor=$campo['tipo_motor'];
		$cilindraje=$campo['cilindraje'];
		$nro_cilindros=$campo['nro_cilindros'];
		$potencia_max=$campo['potencia_max'];
		$torque=$campo['torque'];
		$id_combustible=$campo['id_combustible'];
		$capacidad_tanque=$campo['capacidad_tanque'];
		$rines=$campo['rines'];
		$rin=$campo['rin'];
		$llantas=$campo['llantas'];
		$tipo_direccion=$campo['tipo_direccion'];
		$caja=$campo['caja'];
		$frenos=$campo['frenos'];
		$delanteros=$campo['delanteros'];
		$traseros=$campo['traseros'];
		$descripcion=$campo['descripcion'];
		$precio_lista=$campo['precio_lista'];
		$precio_oferta=$campo['precio_oferta'];
		$imagen_principal=$campo['imagen_principal'];
		$img_frontal=$campo['img_frontal'];
		$img_posterior=$campo['img_posterior'];
		$img_lateral_izq=$campo['img_lateral_izq'];
		$img_lateral_der=$campo['img_lateral_der'];
		$img_maleta=$campo['img_maleta'];
		$img_interna=$campo['img_interna'];
		$img_motor=$campo['img_motor'];
		$img_interior_2=$campo['img_interior_2'];
		$img_ofertas=$campo['img_ofertas'];
		$seguridad=$campo['seguridad'];
		$sonido=$campo['sonido'];
		$exterior=$campo['exterior'];
		$confort=$campo['confort'];
		$acc_internos=$campo['acc_internos'];	
	}

	$marca = Vehiculos::obtenerMarcasId($id_marca);
	$modelo = Vehiculos::obtenerModelosId($id_modelo);
	$version = Vehiculos::obtenerVersionesId($id_version);
?>

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
<script src="dist/js/bootstrap-checkbox.js"></script>
<style type="text/css">
    input {
        -moz-border-radius: 20px;
        -webkit-border-radius: 20px;
        border-radius: 20px;
        border: 1px solid #000000;
        padding: 0 4px 0 4px;
     }
</style>

<script type="text/javascript">
$(document).ready(function(){
    $('#id_marca').on('change',function(){
        var marcaID = $(this).val();
        if(marcaID){
            $.ajax({
                type:'POST',
                url:'vistas/vehiculos/ajax.php',
                data:'id_marca='+marcaID,
                success:function(html){
                    $('#id_modelo').html(html);
                    $('#id_version').html('<option value="">Seleccione primero el modelo</option><option value="1">Standar</option>');
                }
            });
        }else{
            $('#id_modelo').html('<option value="">Seleccione primero la marca</option>');
            $('#id_version').html('<option value="">Seleccione primero el modelo</option>');
        }
    });

    $('#id_modelo').on('change',function(){
        var modeloID = $(this).val();
        if(modeloID){
            $.ajax({
                type:'POST',
                url:'vistas/vehiculos/ajax.php',
                data:'id_modelo='+modeloID,
                success:function(html){
                    $('#id_version').html(html);
                }
            });
        }else{
            $('#id_version').html('<option value="">Seleccione primero el modelo</option><option value="1">Standar</option>');
        }
    });
});
</script>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Crear Oferta</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?controller=index&&action=index">Incio</a></li>
              <li class="breadcrumb-item active">Vehiculos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- START CUSTOM TABS -->
      <!--
      <div style="text-align: center">
      <h5 class="page-header">Configuración Slider Principal</h5>
      </div>
      <br>
		-->

        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">

              <div class="card-body">
					<section class="content">
						<div class="container-fluid">
							<div class="row">
								<!-- ESTE DIV LO USO PARA CENTRAR EL FORMULARIO -->
								<!-- left column -->
								<div class="col-md-12">
								  <div class="card card-primary">
									
				           <form role="form" action="?controller=vehiculos&&action=guardaroferta&&id=<?php echo $id; ?>&&tipoguardar=Oferta" method="POST" enctype="multipart/form-data">
										<fieldset>
			<input style="display: none;" type="text" name="carro_id_carro" placeholder="Precio en Lista" class="form-control required" required value="<?php echo $id; ?>">
			<input style="display: none;" type="text" name="id_marca"  class="form-control required" required value="<?php echo $id_marca; ?>">
			<input style="display: none;" type="text" name="id_modelo"  class="form-control required" required value="<?php echo $id_modelo; ?>">

										<h5>Crear oferta en <?php echo($marca." - ".$modelo." - ".$version); ?></h5>

										<div class="form-group">
											<div class="row">
												<div class="col-4">
													<div class="form-group">
														<label>Precio Listado<span>*</span></label>
														  <input type="number" name="precio_lista" placeholder="Precio en Lista" class="form-control required" required value="<?php echo $precio_lista; ?>">
													</div>
												</div>
												<div class="col-8">
													<div class="form-group">
														<label>Indique la oferta<span>*</span></label>
														  <input type="text" name="precio_oferta" placeholder="Indique la Oferta" class="form-control required" value="0" required value="">
													</div>
												</div>
											</div>
										</div>


										<div class="form-group">
											<div class="col-md-12">
												<label>Imagen de la Oferta</label>
												<div class="custom-file">
													<input name="imagen_principal" type="file" id="input-file-now" class="dropify" data-default-file="vistas/vehiculos/imagenes/principal.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
												</div>
											 </div>
										</div>
								
								


										<div class="form-wizard-buttons">
											<button name="Submit" type="Submit" class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar">Guardar</button>
											<button type="reset" class="btn btn-danger btn-lg" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para cancelar y limpiar">Cancelar</button>
										</div>
									</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>
					</section>
				  </div>
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->


      <!-- /.row -->
      <!-- END CUSTOM TABS -->
    </section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->


    <script type="text/javascript">
  $(function () {
   $('[data-toggle="tooltip"]').tooltip();
   $(':checkbox').checkboxpicker();
  })
</script>

<script>
	//CARGA DE IMAGENES
	$(document).ready(function(){
    // Basic
		$('.dropify').dropify();
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
