<?php
ini_set('display_errors', '0');
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

include_once 'modelos/egresoscuenta.php';
include_once 'controladores/egresoscuentaController.php';

include_once 'modelos/compras.php';
include_once 'controladores/comprasController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

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





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Proyección de Pagos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=proveedores&&action=cxpproveedor">CxP Proveedores</a></li>

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
						
									
									<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ordenes de Compra</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
    <table class="table  table-responsive table-striped table-bordered table-hover" style="font-size: 13px;">
                <tbody><tr>
                  <th>Id</th>
                  <th>Proveedor</th>
                  <th>Deuda Pendiente </th>
                   <th>Pago Autorizado </th>
                  <th>Nuevo Saldo Pendiente</th>
                   <th>Confirmar</th>
                </tr>
                <?php
$itemsget = $_GET['des'];
$items = explode(",", $itemsget);
foreach ($items as $key => $despachounico) {
    $fechadia        =date('Y-m-d');

    $nombreproveedor = Proveedores::obtenerNombreProveedor($despachounico);
    $oc_abonostem   = Proveedores::sqlproyecciontemporal($despachounico);
    $pagos=Egresoscuenta::egresosporproveedor($despachounico);
    $comprasproveedor=Compras::comprasporproveedor($despachounico);
    $saldo=$comprasproveedor-$pagos;
    $sumasaldo+=$saldo;

    $sumaabonostem += $oc_abonostem;
    $valorpendiente= $saldo-$oc_abonostem;

    $sumapendiente +=$valorpendiente;
   

    ?>



			<tr>
	<form action="?controller=proveedores&action=proyecciontemporal&&id=<?php echo ($idreq); ?>&&des=<?php echo($itemsget); ?>" method="post" onsubmit="return checkSubmit();">
        
 <?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
$campofecha = date('Y-m-d');
?>
		<input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual) ?>">
		<input type="hidden" name="creado_por" value="<?php echo ($IdSesion) ?>">
        <input type="hidden" name="valor_deuda" value="<?php echo ($saldo) ?>">
		<input type="hidden" name="estado_pago" value="0">
		<input type="hidden" name="fecha_registro" value="<?php echo ($campofecha) ?>">
		<input id="idcompra<?php echo ($despachounico); ?>" type="hidden" name="itemunico" value="<?php echo ($despachounico) ?>">

        <td><?php echo ($despachounico); ?></td>
        <td><?php echo ($nombreproveedor); ?></td>

    
       

 <td>
 	
 	<input disabled="" class='input input-group-sm' type="text" value="<?php echo (number_format($saldo, 0)); ?>">
 	
 </td>
 <td>
    <?php 

    if ($oc_abonostem==0) {
        echo ("<i class='text-success'> 0% </i>");
    } elseif($oc_abonostem<$saldo){

        $porcentajeabonado=($oc_abonostem/$saldo)*100;
        echo ("<i class='text-success'>".round($porcentajeabonado,1)." %</i>");

    }elseif($oc_abonostem==$saldo){
        $porcentajeabonado=100;
        echo ("<i class='text-success'>".round($porcentajeabonado,1)." %</i>");
    }
    elseif($oc_abonostem>$saldo){
        echo ("<i class=' fa fa-warning text-danger'></i>");
    }



    if ($oc_abonostem==0) {
        $variable=1;
    }
    else{
        $variable=0;
    }
     $contadorpagos += $variable;
   
    ?>
    <input disabled="" class='input input-group-sm' type="text" value="<?php echo (number_format($oc_abonostem, 0)); ?>">
    <a href="?controller=proveedores&action=deleteproyecciontemporal&&id=<?php echo ($idreq); ?>&&des=<?php echo($itemsget); ?>&&iddelete=<?php echo($despachounico); ?>"><i class="fa fa-close text-danger"></i></a>
 </td>

        <td>
            <input id="<?php echo($despachounico."-demo"); ?>" class='input input-sm' type="text" name="valorpago" value="<?php echo ($valorpendiente); ?>">
        </td>
       <?php 
    # =================================================================
    # =           Ocultar Botón si no tiene saldo pendiente           =
    # =================================================================

    if ($sumasaldo==$sumaabonos) {
        echo ("<td><button disabled='true' type='submit' class='btn btn-success fa fa-check'></button></td>");
    }
    else{
        echo ("<td><button  type='submit' class='btn btn-success fa fa-check'></button></td>");
    }
    
 ?>


  	</form>


<script src="dist/js/jquery.maskMoney.js" type="text/javascript"></script>
  	<script type="text/javascript">
$("#<?php echo($despachounico."-demo"); ?>").maskMoney({
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

     </tr>

			<?php
}
?>

			<tr class="text-success success">
				<td colspan="2"><strong>Totales:</strong></td>
				<td> <strong><?php echo("$ ".number_format($sumasaldo,0)); ?> </strong></td>
				<td> <strong><?php echo("$ ".number_format($sumaabonostem,0)); ?> </strong></td>
				<td> <strong><?php echo("$ ".number_format($sumapendiente,0)); ?> </strong></td>
				
			</tr>

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>





	<form role="form" action="?controller=proveedores&action=actualizarrelacionpagos
&&id=<?php echo ($idreq); ?>" method="POST" enctype="multipart/form-data" onsubmit="return checkSubmit();">

								<?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
?>
					<input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual) ?>">
					<input type="hidden" name="creado_por" value="<?php echo ($IdSesion) ?>">
                  

							  <div class="card-body">


								<div class="row">


       
									   <div class="col-md-4">
												<div class="form-group">
													<label>Autorizado el : <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte" value="<?php echo date('Y-m-d'); ?>">
												</div>
											</div>
										
										<div style="display:none;" class="col-md-4">
												<div class="form-group">
													<label>Recurso Aprobado: <span>*</span></label>
													<input type="text" name="valor_total" placeholder="Valor Subtotal" class="form-control" id="demo1" value="<?php echo($sumaabonostem); ?>">
												</div>
											</div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Recurso Aprobado : <span>*</span></label>
                                                    <input type="text" disabled class="form-control" id="demo1" value="<?php echo("$ ".number_format($sumaabonostem,0)); ?>">
                                                </div>
                                            </div>
											
									
										
									<div style="display:none;" class="col-md-4">
										<div class="form-group">

										  <label for="sel1">Ordenes de Compra:</label>
										 <input type="text" value="<?php echo($itemsget); ?>" name="proveedores">
										</div>
									</div>
                                   

									
								</div>
                    <?php 
                    if ($sumaabonostem>$sumasaldo) {
                        ?>
                        <div class="card-footer">
                              <button disabled name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
                        </div>
                         <br>
                              <small class="text-danger">
                                <strong>
                                  El valor de Abonos supera el valor del saldo pendiente.
                              </strong>
                          </small>

                        <?php
                    }
                    elseif($contadorpagos!=0){
                        ?>

                         <div class="card-footer">
                            
                              <button disabled name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
                              <br>
                              <small class="text-danger">
                                <strong>
                                  Verifique los pagos (Un abono está en cero (0).)
                              </strong>
                          </small>
                        </div>

                        <?php
                    }else{
                         ?>
                         <div class="card-footer">
                            
                              <button  name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
                            
                        </div>
                         <?php
                    }
                     ?>
							
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


<script type="text/javascript">
    enviando = false; //Obligaremos a entrar el if en el primer submit
    
    function checkSubmit() {
        if (!enviando) {
            enviando= true;
            return true;
        } else {
            //Si llega hasta aca significa que pulsaron 2 veces el boton submit
            alert("El formulario ya se esta enviando");
            return false;
        }
    }
    
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
