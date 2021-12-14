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
                url:'vistas/vehiculos/ajaxu.php',
                data:'id_marca='+marcaID,
                success:function(html){
                    $('#id_modelo').html(html);
                    $('#id_version').html('<option value="">Seleccione primero el modelo</option><option value="1">Estandard</option>');
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
                url:'vistas/vehiculos/ajaxu.php',
                data:'id_modelo='+modeloID,
                success:function(html){
                    $('#id_version').html(html);
                }
            });
        }else{
            $('#id_version').html('<option value="">Seleccione primero el modelo</option><option value="1">Estandard</option>');
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
            <h5>Agregar vehículo usado</h5>
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
									<div class="card-header">
									  <h4 class="card-title">Configuración General</h4>
									</div>
				                    	<form role="form" action="?controller=vehiculos&&action=guardar&&tipoguardar=Usado" method="POST" enctype="multipart/form-data" autocomplete="off">
										<fieldset>
										<h5>Datos Generales del Vehiculo:</h5>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Año del Vehiculo: <span>*</span></label>
													<input type="number" name="ano" placeholder="Año del Vehiculo" class="form-control required" required>
												</div>
											</div>
											<div style="display: none;" class="col-md-4">
												<div class="form-group">
													<label>Tipo: <span>*</span></label>
													
													 <select class="form-control"  name="vin">
															<option value="">Seleccione una opción....</option>
															<option value="Principal" selected="true">Principal</option>
															<option value="Secundaria">Secundaria</option>
															
														  </select>
												</div>
											</div>
											<div style="display: none;" class="col-md-4">
													<div class="form-group">
														  <label for="sel1">Condición:<span>*</span></label>
														  <select class="form-control" id="condicion" name="condicion">
															<!-- <option value="" selected>Seleccione una opción....</option> -->
															<option  value="Nuevo">Nuevo</option>
															<option selected="true" value="Usado">Usado</option>
														  </select>
													</div>
												</div>
												<div  class="col-md-4">
												<div class="form-group">
													<label>Ubicación:  <span>*</span></label>
													<input type="text" name="ubicacion" placeholder="Ubicación ejm: Bogota D.C" class="form-control required" required >
												</div>
											</div>
											<div  class="col-md-4">
												<div class="form-group">
													<label>Kilometraje:  <span>*</span></label>
													<input type="number" name="kilometros" placeholder="Kilometraje ejm: 0" class="form-control required" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Terminación Pico y Placa:  <span>*</span></label>
													<input type="number" name="pico_placa" placeholder="Terminación Pico y Placa (Número)" class="form-control required" required >
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Color:  <span>*</span></label>
													<input type="text" name="color" placeholder="Indicar color" class="form-control required" required >
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													  <label for="sel1">Marca del Vehículo:<span>*</span></label>
													  <select class="form-control" id="id_marca" name="id_marca" required>
														  <option value="" selected>Seleccione...</option>
														<?php
															$marcas = Vehiculos::obtenerMarcasu();
															foreach($marcas as $marca){
																$id = $marca['id'];
																$marcav = $marca['marca'];
														?>
														<option value="<?php echo $id; ?>"><?php echo $marcav; ?></option>
														<?php }?>
													  </select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													  <label for="sel1">Referencia  Vehículo:<span>*</span></label>
													  <select class="form-control" id="id_modelo" name="id_modelo" required>
													  </select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													  <label for="sel1">Versión Vehículo:<span>*</span></label>
													  <select class="form-control" id="id_version" name="id_version" required="">

													  </select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														  <label for="sel1">Categoría:<span>*</span></label>
														  <select class="form-control" id="id_categoria" name="id_categoria" required="">
																  <option value="" selected>Seleccione...</option>
																<?php
																	$categorias = Vehiculos::obtenerCategorias();
																	foreach($categorias as $categoria){
																		$id = $categoria['id'];
																		$categoriav = $categoria['categoria'];
																?>
																<option value="<?php echo $id; ?>"><?php echo $categoriav; ?></option>
																<?php }?>
														  </select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														  <label for="sel1">Tipo de Versión:<span>*</span></label>
														  <select class="form-control" id="tipo_version" name="tipo_version" required="">
																  <option value="" selected>Seleccione...</option>
																	<option value="Full">Full</option>
																	<option value="Intermedia">Intermedia</option>
														  </select>
													</div>
												</div>
													<div class="col-md-4">
												<div class="form-group">
													<label>Cojinería: <span>*</span></label>
													<input type="text" name="cojineria" placeholder="Cojinería ej: Tela" class="form-control required" maxlength="100" required>
												</div>
											</div>
												
												
											</div>
										</div>

									
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<hr>
														<h4>Vehículo:</h4>
													<hr>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Garantía: <span>*</span></label>
													<input type="text" name="garantia" placeholder="Garantía Ej: 2 Años o 50.000 KM " class="form-control required" maxlength="120" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Carrocería: <span>*</span></label>
													<input type="text" name="carroceria" placeholder="Carrocería Ej:Hatchback" class="form-control required" maxlength="120" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Transmisión: <span>*</span></label>
													<input type="text" name="transmision" placeholder="Transmisión Ej:Mecánica" class="form-control required" maxlength="120" required>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<hr>
														<h4>Motor:</h4>
													<hr>
												</div>
											</div>
										</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Motor: <span>*</span></label>
													<input type="text" name="motor" placeholder="Motor ej: 3.7L" class="form-control required" maxlength="50" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Potencia: <span>*</span></label>
													<input type="text" name="potencia" placeholder="Potencia ej: 65@5400" class="form-control required" maxlength="50" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Número de Válvulas: <span>*</span></label>
													<input type="text" name="nro_valvulas" placeholder="Nº Válvulas ej: 8V" class="form-control required" maxlength="50" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Tipo de Motor: <span>*</span></label>
													<input type="text" name="tipo_motor" placeholder="Tipo Motor Ej:1,0L/8V/Mt" class="form-control required" maxlength="120" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Cilindraje: <span>*</span></label>
													<input type="text" name="cilindraje" placeholder="Cilindraje Ej:1000 cc" class="form-control required" maxlength="120" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Nº Cilindros: <span>*</span></label>
													<input type="text" name="nro_cilindros" placeholder="Cilindros Ej:8" class="form-control required" maxlength="120" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Potencia Máxima: <span>*</span></label>
													<input type="text" name="potencia_max" placeholder="Potencia Máx. Ej:65@5400" class="form-control required" maxlength="120" required>
												</div>
											</div>
												<div class="col-md-4">
												<div class="form-group">
													<label>Torque Máximo:  <span>*</span></label>
													<input type="text" name="torque" placeholder="Torque Ej: 67@4200" class="form-control required" required>
												</div>
											</div>

												<div class="col-md-4">
													<div class="form-group">
														  <label for="sel1">Tipo de Combustible:<span>*</span></label>
														  <select class="form-control" id="id_combustible" name="id_combustible" required="">
																  <option value="" selected>Seleccione...</option>
																<?php
																	$combustibles = Vehiculos::obtenerCombustible();
																	foreach($combustibles as $combustible){
																		$id = $combustible['id'];
																		$combustiblev = $combustible['tipo'];
																?>
																<option value="<?php echo $id; ?>"><?php echo $combustiblev; ?></option>
																<?php }?>
														  </select>
													</div>
												</div>
												<div class="col-md-4">
												<div class="form-group">
													<label>Capcidad Tanque:  <span>*</span></label>
													<input type="text" name="capacidad_tanque" placeholder="Cap. Tanque Ej: 9,2 Galones" class="form-control required" required>
												</div>
											</div>
												
												
												
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<hr>
														<h4>Ruedas:</h4>
													<hr>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Rines: <span>*</span></label>
													<input type="text" name="rines" placeholder="Rines ej: R13 Acero" class="form-control required" maxlength="100" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Rin: <span>*</span></label>
													<input type="text" name="rin" placeholder="Rin ej: 13 Pulgadas" class="form-control required" maxlength="100" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Llantas: <span>*</span></label>
													<input type="text" name="llantas" placeholder="Llantas ej:165/65 R13" class="form-control required" maxlength="100" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<hr>
														<h4>Dirección</h4>
													<hr>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Tipo de Dirección: <span>*</span></label>
													<input type="text" name="tipo_direccion" placeholder="Dirección ej: Mecánica" class="form-control required" maxlength="100" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Caja: <span>*</span></label>
													<input type="text" name="caja" placeholder="Caja ej: Automática" class="form-control required" maxlength="100" required>
												</div>
											</div>
											
											
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<hr>
														<h4>Frenos:</h4>
													<hr>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Frenos: <span>*</span></label>
													<input type="text" name="frenos" placeholder="Frenos ej: ABS" class="form-control required" maxlength="100" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Delanteros: <span>*</span></label>
													<input type="text" name="delanteros" placeholder="Delanteros ej: Discos" class="form-control required" maxlength="100" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Traseros: <span>*</span></label>
													<input type="text" name="traseros" placeholder="Traseros ej: Campana" class="form-control required" maxlength="100" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<hr>
														<h4>Descripción:</h4>
													<hr>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<div class="form-group">
													<label>Descripción<span>*</span></label>
													  <textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-6">
													<div class="form-group">
														<label>Precio Usado<span>*</span></label>
														  <input type="number" name="precio_lista" placeholder="Precio en Lista" class="form-control required" required>
													</div>
												</div>
												<div style="display: none;" class="col-6">
													<div class="form-group">
														<label>Precio Oferta<span>*</span></label>
														  <input type="number" name="precio_oferta" placeholder="Precio en Oferta" class="form-control " value="0" >
													</div>
												</div>
											</div>
										</div>


										<div class="form-group">
											<div class="col-md-12">
												<label>Imagen Principal</label>
												<div class="custom-file">
													<input name="imagen_principal"  type="file" id="input-file-now" class="dropify" data-default-file="vistas/vehiculos/imagenes/principal.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
												</div>
											 </div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Imagen Frontal</label>
													<div class="custom-file">
														<input name="img_frontal"  type="file" id="input-file-now" class="dropify" data-default-file="vistas/vehiculos/imagenes/frontal.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
												<div class="col-md-3">
													<label>Imagen Posterior</label>
													<div class="custom-file">
														<input name="img_posterior" required="true" type="file" id="input-file-now" class="dropify" data-default-file="vistas/vehiculos/imagenes/posterior.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
												<div class="col-md-3">
													<label>Imagen Lateral Izquierdo</label>
													<div class="custom-file">
														<input name="img_lateral_izq" type="file" id="input-file-now" class="dropify" data-default-file="vistas/vehiculos/imagenes/lateral_izq.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
												<div class="col-md-3">
													<label>Imagen Lateral Derecha</label>
													<div class="custom-file">
														<input name="img_lateral_der" type="file" id="input-file-now" class="dropify" data-default-file="vistas/vehiculos/imagenes/lateral_der.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<label>Imagen Maleta</label>
													<div class="custom-file">
														<input name="img_maleta" type="file" id="input-file-now" class="dropify" data-default-file="vistas/vehiculos/imagenes/maleta.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
												<div class="col-md-3">
													<label>Imagen Interna</label>
													<div class="custom-file">
														<input name="img_interna" type="file" id="input-file-now" class="dropify" data-default-file="vistas/vehiculos/imagenes/asientos.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
												<div class="col-md-3">
													<label>Imagen Motor</label>
													<div class="custom-file">
														<input name="img_motor" type="file" id="input-file-now" class="dropify" data-default-file="vistas/vehiculos/imagenes/motor.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
												<div class="col-md-3">
													<label>Imagen Interior 2</label>
													<div class="custom-file">
														<input name="img_interior_2" type="file" id="input-file-now" class="dropify" data-default-file="vistas/vehiculos/imagenes/kilometraje_opac.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm"/>
													</div>
												 </div>
											</div>

											<div style="display: none;" class="form-group">
												<div class="col-md-12">
													<label>Ficha Técnica</label>
													<div class="custom-file">
														<input name="img_ofertas"  type="file" id="input-file-now" class="dropify" data-default-file="vistas/vehiculos/imagenes/principal.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm pdf" data-show-errors="true" data-max-file-size="8M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm, .pdf"/>
													</div>
												 </div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<hr>
														<h4>Caracteristicas Adicionales</h4>
													<hr>
												</div>
											</div>
										</div>
										<!-- <div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<hr>
														<h6>Seguridad:</h6>
													<hr>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<?php
													$funciones = Vehiculos::obtenerFuncion('Seguridad');
													$cantidad = count($funciones);
													foreach($funciones as $campo){
														$id = $campo['id'];
														$funcion = $campo['funcion'];
												?>
												<div class="col-md-4">
														<label><input type="checkbox" name="seguridad[]" value="<?php echo $id; ?>"><?php echo $funcion; ?></label>
												</div>
												<?php } ?>
											</div>
										</div> -->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<hr>
														<h6>Radio:</h6>
													<hr>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<?php
													$funciones = Vehiculos::obtenerFuncion('Sonido');
													$cantidad = count($funciones);
													foreach($funciones as $campo){
														$id = $campo['id'];
														$funcion = $campo['funcion'];
												?>
												<div class="col-md-4">
														<label><input type="checkbox" name="sonido[]" value="<?php echo $id; ?>"> <?php echo utf8_encode($funcion); ?></label>
												</div>
												<?php } ?>
											</div>
										</div>

										<!-- <div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<hr>
														<h6>Exterior:</h6>
													<hr>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<?php
													$funciones = Vehiculos::obtenerFuncion('Exterior');
													$cantidad = count($funciones);
													foreach($funciones as $campo){
														$id = $campo['id'];
														$funcion = $campo['funcion'];
												?>
												<div class="col-md-4">
														<label><input type="checkbox" name="exterior[]" value="<?php echo $id; ?>"><?php echo $funcion; ?></label>
												</div>
												<?php } ?>
											</div>
										</div> -->

										<!-- <div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<hr>
														<h6>Confort:</h6>
													<hr>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<?php
													$funciones = Vehiculos::obtenerFuncion('Confort');
													$cantidad = count($funciones);
													foreach($funciones as $campo){
														$id = $campo['id'];
														$funcion = $campo['funcion'];
												?>
												<div class="col-md-4">
														<label><input type="checkbox" name="confort[]" value="<?php echo $id; ?>"><?php echo $funcion; ?></label>
												</div>
												<?php } ?>
											</div>
										</div>
 -->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<hr>
														<h6>Equipo Interior:</h6>
													<hr>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<?php
													$funciones = Vehiculos::obtenerFuncion('Accesorios Internos');
													$cantidad = count($funciones);
													foreach($funciones as $campo){
														$id = $campo['id'];
														$funcion = $campo['funcion'];
												?>
												<div class="col-md-4">
														<label><input type="checkbox" name="acc_internos[]" value="<?php echo $id; ?>"> <?php echo utf8_encode($funcion); ?></label>
												</div>
												<?php } ?>
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
