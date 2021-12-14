<?php
$campos = $campos->getCampos();
foreach ($campos as $campo){
	$id = $campo['id'];
	$direccion=$campo['direccion'];
	$mapa_direccion=$campo['mapa_direccion'];
	$correo_contacto=$campo['correo_contacto'];
	$correo_cotizar=$campo['correo_cotizar'];
	$dias_trabajo=$campo['dias_trabajo'];
	$dias_cerrado=$campo['dias_cerrado'];
	$telefono_principal=$campo['telefono_principal'];
	$telefonos_otros=$campo['telefonos_otros'];
	$facebook=$campo['facebook'];
	$instagram=$campo['instagram'];
	$twitter=$campo['twitter'];
	$linkedin=$campo['linkedin'];
	$footer=$campo['footer'];
	$meta_keywords=$campo['meta_keywords'];
	$meta_descripcion=$campo['meta_descripcion'];
	$nombre_sitio=$campo['nombre_sitio'];
	$icono_sitio=$campo['icono_sitio'];
	$google_id=$campo['google_id'];
	$titulocontacto=$campo['titulocontacto'];
	$titulomapa=$campo['titulomapa'];
	$tituloboletin=$campo['tituloboletin'];
	$textoboletin=$campo['textoboletin'];
	$titulohorario=$campo['titulohorario'];
	$textohorario=$campo['textohorario'];
	$textopolitica=$campo['textopolitica'];

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
          <h1 class="m-0 text-dark">Configuracion general del Sitio</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="#">Configuracion</a></li>
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
							<form role="form" action="?controller=configuracion&&action=actualizar&&id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Editar Configuracion del Sitio</h3>
								</div>
								<hr>
								<div class="row">
									<div class="col-12">
										<i class="fa fa-address-card-o" style="color: #007bff; font-size: x-large"></i><spam style="color: #007bff; font-size: x-large"> Ubicación</spam>
									</div>
								</div>
								<div class="row">
									 <div class="col-12">
										<div class="form-group">
										  <label for="nombres">Dirección</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-align-justify"></i></span>
											</div>
											<input type="text" name="direccion" value="<?php echo $direccion;?>" class="form-control" id="funcion" placeholder="Ingrese la direccion" maxlength="150" required>
										  </div>
										</div>
									 </div>
								</div>
								<div class="row">
									 <div class="col-12">
										<div class="form-group">
										  <label for="nombres">Enlace Mapa de la direccion</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-link"></i></span>
											</div>
											<input type="text" name="mapa_direccion" value="<?php echo $mapa_direccion;?>" class="form-control" id="funcion" placeholder="Ingrese el enlace del mapa" required>
										  </div>
										</div>
									 </div>
								</div>
								<div class="row">
									<div class="col-12">
										<i class="fa fa-envelope-o" style="color: #007bff; font-size: x-large"></i><spam style="color: #007bff; font-size: x-large"> Correos Electronicos</spam>
									</div>
								</div>
								<div class="row">
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Correo principal de Contacto</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
											</div>
											<input type="email" name="correo_contacto" value="<?php echo $correo_contacto;?>" class="form-control" id="funcion" placeholder="Ingrese el correo de contacto con la empresa" required>
										  </div>
										</div>
									 </div>
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Correo donde se reciben las solicitudes de cotización</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
											</div>
											<input type="email" name="correo_cotizar" value="<?php echo $correo_cotizar;?>" class="form-control" id="funcion" placeholder="Ingrese el correo para recibir cotizaciones" required>
										  </div>
										</div>
									 </div>
								</div>
								<hr>
								<div class="row">
									<div class="col-12">
										<i class="fa fa-instagram" style="color: #007bff; font-size: x-large"></i><spam style="color: #007bff; font-size: x-large"> Redes Sociales</spam>
									</div>
								</div>
								<div class="row">
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Facebook</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-facebook"></i></span>
											</div>
											<input type="text" name="facebook" value="<?php echo $facebook;?>" class="form-control" id="funcion" placeholder="Ingrese el enlace de facebook de la empresa" required>
										  </div>
										</div>
									 </div>
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Instagram</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-instagram"></i></span>
											</div>
											<input type="text" name="instagram" value="<?php echo $instagram;?>" class="form-control" id="funcion" placeholder="Ingrese el enlace de instagram de la empresa" required>
										  </div>
										</div>
									 </div>
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Twitter</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-twitter"></i></span>
											</div>
											<input type="text" name="twitter" value="<?php echo $twitter;?>" class="form-control" id="funcion" placeholder="Ingrese el enlace de twitter de la empresa" required>
										  </div>
										</div>
									 </div>
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Linkedin</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-linkedin"></i></span>
											</div>
											<input type="text" name="linkedin" value="<?php echo $linkedin;?>" class="form-control" id="funcion" placeholder="Ingrese el enlace de Linkedin de la empresa" required>
										  </div>
										</div>
									 </div>
								</div>
								<hr>
								<div class="row">
									<div class="col-12">
										<i class="fa fa fa-volume-control-phone" style="color: #007bff; font-size: x-large"></i><spam style="color: #007bff; font-size: x-large"> Télefonos</spam>
									</div>
								</div>
								<div class="row">
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Telefono Principal</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-volume-control-phone"></i></span>
											</div>
											<input type="text" name="telefono_principal" value="<?php echo $telefono_principal;?>" class="form-control" id="funcion" placeholder="Ingrese el télefono principal de la empresa" required>
										  </div>
										</div>
									 </div>
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Otros Telefonos</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-volume-control-phone"></i></span>
											</div>
											<input type="text" name="telefonos_otros" value="<?php echo $telefonos_otros;?>" class="form-control" id="funcion" placeholder="Ingrese los otros telefonos de la empresa">
										  </div>
										</div>
									 </div>
									  <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Horarios Cabecera</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
											</div>
											<input type="text" name="dias_trabajo" value="<?php echo $dias_trabajo;?>" class="form-control" id="funcion" placeholder="Ingrese los horarios">
										  </div>
										</div>
									 </div>
								</div>
								<hr>
								
								<div class="row">
									<div class="col-12">
										<i class="fa fa fa-list" style="color: #007bff; font-size: x-large"></i><spam style="color: #007bff; font-size: x-large"> Pie de Página (Footer)</spam>
									</div>
								</div>
								<div class="row">
									 <div class="col-6">
										<div class="form-group">
										  <label>Titulo Contacto</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-wpforms"></i></span>
											</div>
											<input type="text" name="titulocontacto" value="<?php echo utf8_encode($titulocontacto);?>" class="form-control" id="funcion" placeholder="Ingrese el titulo" required>
										  </div>
										</div>
									 </div>
									  <div class="col-6">
										<div class="form-group">
										   <label>Titulo Mapa</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-wpforms"></i></span>
											</div>
											<input type="text" name="titulomapa" value="<?php echo utf8_encode($titulomapa);?>" class="form-control" id="funcion" placeholder="Ingrese el titulo" required>
										  </div>
										</div>
									 </div>
									  <div class="col-6">
										<div class="form-group">
										   <label>Titulo Boletín</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-wpforms"></i></span>
											</div>
											<input type="text" name="tituloboletin" value="<?php echo utf8_encode($tituloboletin);?>" class="form-control" id="funcion" placeholder="Ingrese el titulo" required>
										  </div>
										</div>
									 </div>
									  <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Texto Boletín</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
											</div>
											<textarea name="textoboletin" class="form-control" rows="5"><?php echo utf8_encode($textoboletin); ?></textarea>
										  </div>
										</div>
									 </div>

									  <div class="col-6">
										<div class="form-group">
										   <label>Titulo Horario</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-wpforms"></i></span>
											</div>
											<input type="text" name="titulohorario" value="<?php echo utf8_encode($titulohorario);?>" class="form-control" id="funcion" placeholder="Ingrese el titulo" required>
										  </div>
										</div>
									 </div>
									  <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Texto Horario</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
											</div>
											<textarea name="textohorario" class="form-control" rows="5"><?php echo utf8_encode($textohorario); ?></textarea>
										  </div>
										</div>
									 </div>

									  <div class="col-12">
										<div class="form-group">
										  <label for="nombres">Texto Políticas</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
											</div>
											<textarea name="textopolitica" class="form-control" rows="5"><?php echo utf8_encode($textopolitica); ?></textarea>
										  </div>
										</div>
									 </div>
									
								</div>

								<hr>
								<div class="row">
									<div class="col-12">
										<i class="fa fa-bar-chart" style="color: #007bff; font-size: x-large"></i><spam style="color: #007bff; font-size: x-large"> SEO del Sitio</spam>
									</div>
								</div>
								<div class="row">
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Nombre del Sitio</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-firefox"></i></span>
											</div>
											<input type="text" name="nombre_sitio" value="<?php echo $nombre_sitio;?>" class="form-control" id="funcion" placeholder="Ingrese el nombre del sitio de la empresa" required>
										  </div>
										</div>
									 </div>
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Google ID Analytics</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-google"></i></span>
											</div>
											<input type="text" name="google_id" value="<?php echo $google_id;?>" class="form-control" id="funcion" placeholder="Ingrese el Google Analyticis ID de la empresa" required>
										  </div>
										</div>
									 </div>
								</div>
								<div class="row">
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Meta Keywords (Palabras Clave)</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-wpforms"></i></span>
											</div>
											<textarea name="meta_keywords" class="form-control" rows="5"><?php echo $meta_keywords?></textarea>
										  </div>
										</div>
									 </div>
									 <div class="col-6">
										<div class="form-group">
										  <label for="nombres">Meta Description (Descripción del Sitio)</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
											</div>
											<textarea name="meta_descripcion" class="form-control" rows="5"><?php echo $meta_descripcion?></textarea>
										  </div>
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
