<?php 
	ini_set('display_errors', '0');
include_once 'modelos/estadosreq.php';
include_once 'controladores/estadosreqController.php';
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/servicios.php';
include_once 'controladores/serviciosController.php';
include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';
include_once 'modelos/requisicionesitems.php';
include_once 'controladores/requisicionesitemsController.php';


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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Gestionar Items Requisición: RQ<?php echo ($idreq);?>-<?php echo($iditem); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=requisicionesitems&&action=todosporreq&id=<?php echo($idreq); ?>">Requisición Núm: <?php echo($idreq); ?></a></li>
            	<?php
            	if ($RolSesion==1 or $RolSesion==13) {
            	 	?>
            	 	<li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=todosalmacen&&cargo=<?php echo($RolSesion);?>">Ver Requisiciones</a></li>
            	 	
            	 	<?php
            	 }else{
            	 	?>
            	 		<li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=todosmiusuario&&id=<?php echo($IdSesion); ?>">Ver Requisiciones</a></li>
            	 	<?php
            	 }
             ?>
             
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
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
              	<?php 
						if ($tiporeq=='Insumos') {
								$insumo_id_insumo=ObtenerIdInsumo($iditem);
                $detallesolicitado=Insumos::obtenerNombreInsumo($insumo_id_insumo);
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
              <?php echo("<strong>".$label."</strong>".$detallesolicitado); ?>

            </h3>

              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="Total Mensajes">
                	<?php 
                	$totalcomentarios=contarcomentarios($iditem);
                	echo($totalcomentarios);
                	 ?>
                </span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                  <i class="fa fa-comments"></i></button>
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->

               <?php
										$res = Requisicionesitems::datostrazabilidad($iditem);
										 $campos = $res->getCampos();
										foreach ($campos as $campo){
											$id = $campo['id'];
											$fecha_reporte = $campo['fecha_reporte'];
											$usuario_creador = $campo['usuario_creador'];
											$estadoreq_id = $campo['estadoreq_id'];
											$item_id = $campo['item_id'];
											$observaciones = $campo['observaciones'];
											$marca_temporal = $campo['marca_temporal'];
											$nomsolicita=Usuarios::obtenerNombreUsuario($usuario_creador);
											$nomestado=Estadosreq::obtenerNombre($estadoreq_id);
								?>

                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left"><?php echo($nomsolicita); ?></span>
                    <span class="direct-chat-timestamp pull-right"><?php echo($marca_temporal) ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="../Login/logo-luz.png" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    <strong>Estado: <?php echo($nomestado); ?></strong>
                    <br>
                     <?php echo ($observaciones); ?>
                  </div>
                  <!-- /.direct-chat-text -->

                </div>
                <!-- /.direct-chat-msg -->

                <?php 
              }
               ?>
              </div>
              <!--/.direct-chat-messages-->

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form action="?controller=requisicionesitems&action=actualizarestado&&id=<?php echo($idreq); ?>&&cargo=<?php echo($RolSesion) ?>" method="post">
              	<div class="form-group">
              		<input type="hidden" name="items" value="<?php echo($iditem); ?>">
                	<input type="hidden" name="usuario_creador" value="<?php echo($IdSesion) ?>">

										  <label for="sel1">Lista de Estados:</label>
										  <select class="form-control mi-selector" id="estado_item" name="estado_item" required>
											<option value="" selected>Seleccionar...</option>
										<?php
										$rubros = Estadosreq::ObtenerListaEstados();
										foreach ($rubros as $campo){
											$id = $campo['id'];
											$nombre = $campo['nombre'];
										?>
										<option value="<?php echo $id; ?>"><?php echo utf8_encode($nombre); ?></option>
										<?php } ?>
										  </select>
										</div>
                <div class="input-group">
                  <input type="text" name="observaciones" placeholder="Agregar Observación ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
                      </span>
                </div>
              </form>
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
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
