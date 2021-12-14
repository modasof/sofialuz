<?php 

include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/proyectos.php';
include_once 'controladores/proyectosController.php';
include_once 'modelos/proveedores.php';
include_once 'controladores/proveedoresController.php';
include_once 'modelos/rubros.php';
include_once 'controladores/rubrosController.php';
include_once 'modelos/subrubros.php';
include_once 'controladores/subrubrosController.php';
include_once 'modelos/cuentas.php';
include_once 'controladores/cuentasController.php';



$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];

$idreq=$_GET['id'];

$res=compras::editarpor($idreq);
$campos = $res->getCampos();
foreach($campos as $campo){
            $id = $campo['id'];
            $fecha_reporte = $campo['fecha_reporte'];
            $imagen = $campo['imagen'];
            $valor_total = $campo['valor_total'];
            $valor_retenciones = $campo['valor_retenciones'];
             $valor_iva = $campo['valor_iva'];
            $estado_orden = $campo['estado_orden'];
            $rubro_id = $campo['rubro_id'];
            $subrubro_id = $campo['subrubro_id'];
            $vencimiento = $campo['vencimiento'];
            $proveedor_id_proveedor = $campo['proveedor_id_proveedor'];
            $medio_pago = $campo['medio_pago'];
            $marca_temporal = $campo['marca_temporal'];
            $observaciones = $campo['observaciones'];
            $usuario_creador = $campo['usuario_creador'];

           
            $nomproveedor=Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
            $nomreportador=usuarios::obtenerNombreUsuario($usuario_creador);

            if ($estado_orden=="1") {
              $nomestado="Sin Facturar";
            }
            elseif ($estado_orden=="2") {
              $nomestado="Facturado";
            }
            else
            {
              $nomestado="Sin Estado";
            }

}


 ?>
<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector3').select2();
    });
});
</script>
<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector').select2();
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#rubro_id').on('change',function(){
        var rubroID = $(this).val();
        //alert (rubroID);
        if(rubroID){
            $.ajax({
                type:'POST',
                url:'vistas/compras/ajax.php',
                data:'rubro_id='+rubroID,
                success:function(html){
                    $('#subrubro_id').html(html);  
                }
            });
        }else{
            $('#subrubro_id').html('<option value="">Seleccione primero el rubro</option>');
            
        }
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#cuenta_id').on('change',function(){
        var cuentaID = $(this).val();
        //alert (cuentaID);
        if(cuentaID){
            $.ajax({
                type:'POST',
                url:'vistas/compras/ajax2.php',
                data:'cuenta_id='+cuentaID,
                success:function(html){
                    $('#saldocuenta').html(html);  
                }
            });
        }else{
            $('#saldocuenta').html('<strong>Seleccione la cuenta</strong>');
            
        }
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
          <h1 class="m-0 text-dark">Gestionar Orden Compra: OC000<?php echo($idreq); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=compras&&action=todos">Ordenes de compra</a></li>
             
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
							<form role="form" action="?controller=compras&action=actualizarpago&&id=<?php echo($idreq);?>" method="POST" enctype="multipart/form-data">

								<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								?>
								<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual) ?>">
								<input type="hidden" name="creado_por" value="<?php echo($IdSesion) ?>">
								
							  <div class="card-body">
								
							
								<div class="row">
									 <div class="col-md-4">
										<div class="form-group">
										  <label for="fila2_columna1">Factura <small>Tamaño máximo 10MB</small></label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen;?>" multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ >
													 <input type="hidden" name="ruta1" value="" >
												</div>
										</div>
									   </div>
									   <div class="col-md-4">
												<div class="form-group">
													<label>Fecha del pago: <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte" value="<?php echo date('Y-m-d'); ?>">
												</div>
											</div>
										
										<div class="col-md-4">
												<div class="form-group">
													<label>Valor Sub Total: <span>*</span></label>
													<input type="text" name="valor_total" placeholder="Valor Subtotal" class="form-control" id="demo1" value="<?php echo($valor_total); ?>">
												</div>
											</div>
												<div class="col-md-4">
												<div class="form-group">
													<label>Valor Retenciones: <span>*</span></label>
													<input type="text" name="valor_retenciones" placeholder="Valor Subtotal" class="form-control" id="demo2" value="<?php echo($valor_retenciones); ?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Valor Iva: <span>*</span></label>
													<input type="text" name="valor_iva" placeholder="Valor Subtotal" class="form-control" id="demo3" value="<?php echo($valor_iva); ?>">
												</div>
											</div>
									<div class="col-md-6">
										<div class="form-group">

										  <label for="sel1">Lista de Estados:</label>
										  <select class="form-control mi-selector" id="estado_item" name="estado_item" required>
											<option value="" selected>Seleccionar...</option>
									<option value="1">Sin Facturar</option>
									<option value="2" >Facturado</option>
									
										  </select>
										</div>
									</div>
									 <div class="col-sm-6">
          <h3 class="m-0 text-dark">Datos de pago: OC000<?php echo($idreq); ?></h3>
        </div><!-- /.col -->
									<div id="divrubro" class="col-md-6">
													<div class="form-group">
														  <label for="sel1">Rubro:<span>*</span></label>
														  <select class="form-control mi-selector" id="rubro_id" name="rubro_id" >
																  <option value="" selected>Seleccionar...</option>
																<?php
																	$rubros = Rubros::obtenerListaRubros();
																	foreach($rubros as $rubro){
																		$id_rubro = $rubro['id_rubro'];
																		$nombre_rubro = $rubro['nombre_rubro'];
																?>
																<option value="<?php echo $id_rubro; ?>"><?php echo utf8_encode($nombre_rubro); ?></option>
																<?php }?>
														  </select>
													</div>
										</div>

												<div  id="divsubrubro" class="col-md-6">
												<div class="form-group">
													  <label for="sel1">Sub-Rubro:<span>*</span></label>
													  <select class="form-control mi-selector" id="subrubro_id" name="subrubro_id" >
													  	<option value="">Seleccionar...</option>
													  </select>
												</div>
											</div>

								
									 <div class="col-md-6">
										<div class="form-group">
										  <label for="fila2_columna1">Soporte de Pago <small>Tamaño máximo 10MB</small></label>
												<div class="custom-file">
													 <input name="imagen2" type="file" id="input-file-now" class="dropify" data-default-file="" multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ >
													 <input type="hidden" name="ruta2" value="" >
												</div>
										</div>
									   </div>
									   <div  class="col-md-6">
													<div class="form-group">
														  <label for="sel1">Cuenta Pago:<span>*</span></label>
														  <select class="form-control mi-selector" id="cuenta_id" name="cuenta_id" >
																  <option value="" selected>Seleccionar...</option>
																<?php
																	$rubros = Cuentas::obtenerListaCuentas();
																	foreach($rubros as $rubro){
																		$id = $rubro['id_cuenta'];
																		$nombre = $rubro['nombre_cuenta'];
																?>
																<option value="<?php echo $id; ?>"><?php echo utf8_encode($nombre); ?></option>
																<?php }?>
														  </select>
														  <small id="saldocuenta" class="text-success"><strong> -</strong> </small>
													</div>
										</div>
										<div  class="col-md-6">
												<div class="form-group">
													<label>Beneficiario: <span>*</span></label>
													<input type="text" name="beneficiario" placeholder="" class="form-control"  id="beneficiario" value="<?php echo($nomproveedor); ?>">
												</div>
											</div>

										<div class="col-md-6">
												<div class="form-group">
													<label>Egreso a tráves de: <span>*</span></label>
													 <select class="form-control"  name="egreso_en" required="" id="egreso_en">
															<option value="" selected="">Seleccionar...</option>
															<option value="Efectivo">Efectivo</option>
															<option value="Cheque">Cheque</option>
															<option value="Consignacion">Consignación</option>
															<option value="Transferencia">Transferencia</option>
														  </select>
												</div>
											</div>
									<div style="display: none;" class="col-md-12">
												<div class="form-group">
													<label>Observaciones<span>*</span></label>
									<textarea class="form-control" rows="2" id="descripcion" name="observaciones">Pago orden de compra N. 00<?php echo($idreq) ?> a proveedor <?php echo($nomproveedor); ?></textarea>
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

<script>
  $(function () {

    $('.select2').select2()


  })
</script>
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
$("#demo2").maskMoney({
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
$("#demo3").maskMoney({
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

<style type="text/css">
	.select2-container--default .select2-selection--multiple .select2-selection__choice {
	    background-color: navy;
	    border: 1px solid #aaa;
	    border-radius: 4px;
	    cursor: default;
	    float: left;
	    margin-right: 5px;
	    margin-top: 5px;
	    padding: 0 5px;
	}

</style>
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
