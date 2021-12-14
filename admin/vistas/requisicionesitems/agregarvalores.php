<?php 
	ini_set('display_errors', '0');
include_once 'modelos/proveedores.php';
include_once 'controladores/proveedoresController.php';
include_once 'modelos/servicios.php';
include_once 'controladores/serviciosController.php';
include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';
include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];

$idreq=$_GET['id'];
$iditem=$_GET['iditem'];
$tiporeq=ObtenerTipoReq($idreq);

 ?>
<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->

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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Gestionar Item Requisición: <?php echo($iditem); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
           
             <li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=todos">Ver Requisiciones</a></li>
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
							

								
								
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Agregar Cotizaciones</h3>
								</div>
							
								<div class="row">
									<div class="col-md-6">
										<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">
              	
              	<?php 
						if ($tiporeq=='Insumos') {
								$insumo_id_insumo=ObtenerIdInsumo($iditem);
								$cantidad=ObtenerCantidadSolicitada($iditem);
                $detallesolicitado=Insumos::obtenerNombreInsumo($insumo_id_insumo);
                $unidadmedidaid=Insumos::obtenerUnidadmed($insumo_id_insumo);
                $nomunidadmedida=Unidadesmed::obtenerNombre($unidadmedidaid);
                $label='Solicitud Insumo: ';
            }
            elseif ($tiporeq=='Servicios') {
            	$servicio_id_servicio=ObtenerIdServicio($iditem);
              $detallesolicitado=Servicios::obtenerNombre($servicio_id_servicio);
              $label='Solicitud Servicio: ';
            }
            else
            {
            	$equipo_id_equipo=ObtenerIdEquipo($iditem);
              $detallesolicitado=Equipos::obtenerNombreEquipo($equipo_id_equipo);
              $label='Solicitud Equipo: ';
            }
              	 ?>
              <?php echo($cantidad." ".$nomunidadmedida." <strong>".$detallesolicitado."</strong>"); ?>

              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Proveedor</th>
                  <th>
                  	Pago
                  </th>
                  <th style="width: 40px">
                  	Valor
                  </th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>
                  	<?php 
                  $proveedor1=proveedorcot($iditem,'Cotizacion 1');
                  $nomproveedor=Proveedores::obtenerNombreProveedor($proveedor1);
                  echo($nomproveedor);
                   ?>
                  </td>
                  <td>
                  	<?php 
                  $pago1=pagocot($iditem,'Cotizacion 1');
                  echo($pago1);
                   ?>
                  </td>
                  <td>
                  	<?php 
                  $valor1=valorcot($iditem,'Cotizacion 1');
                  echo("$".number_format($valor1,0));
                   ?>
                  </td>
                </tr>
                <tr>
                  <td>2.</td>
                   <td>
                  	<?php 
                  $proveedor2=proveedorcot($iditem,'Cotizacion 2');
                   $nomproveedor=Proveedores::obtenerNombreProveedor($proveedor2);
                  echo($nomproveedor);
                   ?>
                  </td>
                  <td>
                  	<?php 
                  $pago2=pagocot($iditem,'Cotizacion 2');
                  echo($pago2);
                   ?>
                  </td>
                  <td>
                  	<?php 
                  $valor2=valorcot($iditem,'Cotizacion 2');
                   echo("$".number_format($valor2,0));
                   ?>
                  </td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>
                  	<?php 
                  $proveedor3=proveedorcot($iditem,'Cotizacion 3');
                  $nomproveedor=Proveedores::obtenerNombreProveedor($proveedor3);
                  echo($nomproveedor);
                   ?>
                  </td>
                  <td>
                  	<?php 
                  $pago3=pagocot($iditem,'Cotizacion 3');
                  echo($pago3);
                   ?>
                  </td>
                  <td>
                  	<?php 
                  $valor3=valorcot($iditem,'Cotizacion 3');
                   echo("$".number_format($valor3,0));
                   ?>
                  </td>
                </tr>
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
           
          </div>
									</div>
							<div class="col-md-6">
								<form role="form" action="?controller=requisicionesitems&action=guardarcotizacion&&id=<?php echo($iditem); ?>&&iditem=<?php echo($iditem); ?>&&cargo=<?php echo($RolSesion); ?>" method="POST" enctype="multipart/form-data">
									<div class="col-md-12">
										<div class="form-group">

											<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
							?>
										<input type="hidden" name="estado_cotizacion" value="1">
										<input type="hidden" name="ordencompra_num" value="0">
										<input type="hidden" name="cantidadcot" value="<?php echo($cantidad); ?>">
										<input type="hidden" name="insumo_id_insumo" value="<?php echo($insumo_id_insumo) ?>">
										<input type="hidden" name="requisicion_id" value="<?php echo($idreq); ?>">
										<input type="hidden" name="item_id" value="<?php echo($iditem); ?>">
										<input type="hidden" name="usuario_creador" value="<?php echo($IdSesion); ?>">
										<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual); ?>">
									

										  <label for="sel1">Cotización Nº:</label>
										  <select class="form-control mi-selector" id="cotizacion" name="cotizacion" required>
											<option value="" selected>Seleccionar...</option>
											<option value="Cotizacion 1">Cotización 1</option>
											<option value="Cotizacion 2">Cotización 2</option>
											<option value="Cotizacion 3">Cotización 3</option>
										  </select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">

										  <label for="sel1">Lista de Proveedores:</label>
										  <select class="form-control mi-selector2" id="proveedor_id_proveedor" name="proveedor_id_proveedor" required>
											<option value="" selected>Seleccionar...</option>
										<?php
										$rubros = Proveedores::obtenerListaProveedores();
										foreach ($rubros as $campo){
											$id = $campo['id_proveedor'];
											$nombre = $campo['nombre_proveedor'];
										?>
										<option value="<?php echo $id; ?>"><?php echo utf8_encode($nombre); ?></option>
										<?php } ?>
										  </select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">

										  <label for="sel1">Tipo de Pago:</label>
										  <select class="form-control mi-selector" id="medio_pago" name="medio_pago" required>
											<option value="" selected>Seleccionar...</option>
											<option value="Contado">Contado</option>
											<option value="Credito">Crédito</option>
										  </select>
										</div>
									</div>

									<div class="col-md-12">
												<div class="form-group">
													<label>Valor cotizado: <span>*</span></label>
													<input type="text" name="valor_cot" placeholder="Valor" class="form-control" id="demo1">
												</div>
											</div>
											<div class="card-footer">
							  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
							</div>
								
								</div>
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
