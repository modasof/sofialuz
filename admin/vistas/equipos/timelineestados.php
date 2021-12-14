
<?php
include_once 'modelos/funcionarios.php';
include_once 'controladores/funcionariosController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';

include_once 'modelos/gestiondocumentaleq.php';
include_once 'controladores/gestiondocumentaleqController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];
 $fecha_Actual=date('y-m-d'); 

 $campos = $campos->getCampos();
foreach ($campos as $campo){
    $id = $campo['id'];
    $equipo_id_equipo = $campo['equipo_id_equipo'];
     $estado_sel = $campo['estado_sel'];
    $nombreequipo=Equipos::ObtenerNombreEquipo($equipo_id_equipo);
}

function tiempoTranscurridoFechas($fechaInicio,$fechaFin)
{
    $fecha1 = new DateTime($fechaInicio);
    $fecha2 = new DateTime($fechaFin);
    $fecha = $fecha1->diff($fecha2);
    $tiempo = "";
         
    //años
    if($fecha->y > 0)
    {
        $tiempo .= $fecha->y;
             
        if($fecha->y == 1)
            $tiempo .= " año, ";
        else
            $tiempo .= " años, ";
    }
         
    //meses
    if($fecha->m > 0)
    {
        $tiempo .= $fecha->m;
             
        if($fecha->m == 1)
            $tiempo .= " mes ";
        else
            $tiempo .= " meses ";
    }
         
    //dias
    if($fecha->d > 0)
    {
        $tiempo .= $fecha->d;
             
        if($fecha->d == 1)
            $tiempo .= " día ";
        else
            $tiempo .= " días ";
    }
         
    //horas
    if($fecha->h > 0)
    {
        $tiempo .= $fecha->h;
             
        if($fecha->h == 1)
            $tiempo .= " hora ";
        else
            $tiempo .= " horas ";
    }
         
   
         
    return $tiempo;
}
?>

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo utf8_decode($nombreequipo); ?>
      </h1>
    
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="?controller=equipos&&action=todos">Lista de Equipos</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a class="active" href="#timeline" data-toggle="tab">Hoja de vida Equipo <?php echo($nombreequipo); ?></a></li>
             
            </ul>
            <div class="tab-content">
             
            
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="timeline">
              	 <a  href="?controller=equipos&&action=estado" class="btn btn-success">Reportar Estado</a>
              <hr>
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                     <?php 

                    if ($estado_sel=='') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-default'>ESTADO ACTUAL: SIN ACTUALIZAR</span></a>");
                    }
                    elseif ($estado_sel=='Operativo') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-success'>ESTADO ACTUAL: OPERATIVO</span></a>");
                    }
                     elseif ($estado_sel=='En Mantenimiento') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-warning'>ESTADO ACTUAL: EN MANTENIMIENTO</span></a>");
                    }
                    elseif ($estado_sel=='Fuera de Servicio') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-danger'>ESTADO ACTUAL: FUERA DE SERVICIO</span></a>");
                    }

                     ?>
                        
                  </li>
                  <!-- /.timeline-label -->
                    <!-- timeline time label -->
           <?php
				$res=Equipos::obtenerNovedadesPor($equipo_id_equipo);
              $campos = $res->getCampos();
										 foreach ($campos as $campo){
										 	$id_registro = $campo['id'];
											$estado_sel = $campo['estado_sel'];
											$fecha_novedad = $campo['fecha_reporte'];
                      $tiempo = $campo['tiempo'];
											$observaciones = $campo['observaciones'];
											$creado_por = $campo['creado_por'];
											$marca_temporal = $campo['marca_temporal'];
                       $nombreusuario=Usuarios::ObtenerNombreUsuario($creado_por);
										?>
                  <li class="time-label">
                        <span class="bg-blue">
                          <?php 
                          $fecha=date('y-m-d'); 
                          echo fechalarga($fecha_novedad);
                          ?>
                        </span>
                  </li>
                  <li>
                    <i class="fa fa-info-circle bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> Reportado a las:<?php echo($marca_temporal); ?></span>

                      <h3 class="timeline-header"><strong>Último Estado reportado: </strong><?php echo($estado_sel) ?></a></h3>

                      <div class="timeline-body">
                        <strong>Detalle: </strong><?php echo($observaciones); ?> <br>
                       <strong>Reportado por: </strong><?php echo($nombreusuario); ?> <br>
                       <strong>Tiempo de reparación: </strong><?php echo($tiempo); ?> <br>

                      </div>
                      <div style="display: none;" class="timeline-footer">
                       
                        <a onclick="eliminar(<?php echo $id_registro; ?>,<?php echo($equipo_id_equipo) ?>);" class="btn btn-danger btn-xs"><i class="fa fa-trash"> </i> Eliminar</a>
                      
                      </div>
                    </div>
                  </li>
                  <?php 
              }
                   ?>
                  <!-- END timeline item -->
                </ul>
              </div>
              <!-- /.tab-pane -->

             
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
                <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-default">

          
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Documentos <?php echo ($nombreequipo); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody><tr>
                  
                  <th>Nombre</th>
                 
                  <th style="width: 40px">Documento</th>
                </tr>
                  <?php 
              $res=Gestiondocumentaleq::obtenerDocumentosEquipos($equipo_id_equipo);
                     foreach ($res as $campo){
                      $imagen = $campo['imagen'];
                      $documento_id_documento = $campo['documento_id_documento']; 
                      $nombredoc=Gestiondocumentaleq::ObtenerNombredocumento($documento_id_documento);
            ?>
                <tr>
                  <td><?php echo($nombredoc) ?></td>
                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-flat"> <a target="_blank" href="<?php echo($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "></i>
              </a>
            </button>
             <button type="button" class="btn btn-default btn-flat"> <a download="Soporte" href="<?php echo($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "></i>
              </a>
            </button>
          </div>
                  </td>
                  
                </tr>
                 <?php
                    }
             ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
           

          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Inicio Modal -->
        <div id="modal-form4" class="modal" tabindex="-1">
                             <!-- Inicio Modal -->
    <div>
               <form role="form" action="?controller=funcionarios&&action=reportarnovedad&&id=<?php echo $id_funcionario; ?>" method="POST" enctype="multipart/form-data">
               	<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActualfor = date('Y-m-d H:i:s');
							?>
							
					
               		
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="black bigger">Reportar Novedad</h4>
                      </div>

                      <div class="modal-body">
                        <div class="row" >
               <input type="hidden" name="creado_por" value="<?php echo($IdSesion);?>">
					<input type="hidden" name="estado_novedad" value="1">
					<div style="display: none;"  class="form-group">
										  <label for="fila2_columna1">Soporte</label>
												<div class="custom-file">
													<input name="imagen" value="../admin/vistas/funcionarios/default.jpg"  type="file" id="input-file-now" class="dropify" data-default-file="../admin/vistas/funcionarios/default.jpg" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif, .mp4, .webm" />
												</div>
										</div>
					<input type="hidden" name="novedad_publicado" value="1">
					<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActualfor);?>">
               		<input type="hidden" name="funcionario_id" value="<?php echo($id_funcionario) ?>">
                <div class="col-md-12">
                        <div class="form-group">
                          <label>Reportado por: <span>*</span></label>
                          <select class="form-control" id="reportado_por" name="reportado_por" required>
										<option value="" selected>Seleccionar...</option>
                      <option value="Auxiliar Siso">Auxiliar Siso</option>
										<option value="Jose Daniel Meza">Jose Daniel Meza</option>
										<option value="Fredy Gonzalez">Fredy Gonzalez</option>
										
									  </select>
                        </div>
              </div>
               <div class="col-md-6">
                        <div class="form-group">
									  <label for="sel1">Tipo de Novedad:</label>
									  <select class="form-control" id="tipo_novedad" name="tipo_novedad" required>
										<option value="" selected>Seleccionar...</option>
										<option value="Dia no laborado">Día no laborado</option>
                    <option value="Horas Extras">Horas Extras</option>
										<option value="Incapacidad">Incapacidad</option>
										<option value="Llamado de atencion verbal">Llamado de Atención verbal</option>
										<option value="Llamado de atencion escrito">Llamado de Atención escrito</option>
										<option value="Llegada tarde">Llegada tarde</option>
										<option value="Memorando">Memorando</option>
                    <option value="Novedad">Novedad</option>
										<option value="Retiro">Retiro</option>
                    <option value="Observacion">Observación</option>
										<option value="Perdida de EPP">Perdida de EPP</option>
										<option value="Permiso">Permiso</option>
									  </select>
									</div>
              </div>
               <div class="col-md-6">
                        <div class="form-group">
                          <label>Fecha del Reporte: <span>*</span></label>
                          <input type="date" name="fecha_novedad" placeholder="Fecha Novedad" class="form-control required" required id="fecha_novedad" value="">
                        </div>
              </div>
               <div class="col-md-12">
                        <div class="form-group">
                          <label>Observaciones: <span>*</span></label>
                            <textarea class="form-control" rows="4" name="observaciones" id="descripcion" placeholder="Ingrese aquí la descripción de la novedad" maxlength="500" required></textarea>
                        </div>
              </div>
              
                        </div>
                      </div>

                      <div class="modal-footer">
                        <a href="CrearVenta.php" class="btn btn-sm btn-primary" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Cancelar
                        </a>
                        <button style="background-color: #C00000;color:white; " class="btn btn-sm ">
                          <i class="ace-icon fa fa-check"></i>
                          Reportar Novedad
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
    </div><!-- PAGE CONTENT ENDS -->
            <!-- FINAL MODAL -->
</div>
          <!-- Inicio Modal -->
        <div id="modal-form5" class="modal" tabindex="-1">
                             <!-- Inicio Modal -->
    <div>
               <form role="form" action="?controller=funcionarios&&action=reportarsoporte&&id=<?php echo $id_funcionario; ?>" method="POST" enctype="multipart/form-data">
               	<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActualfor2 = date('Y-m-d H:i:s');
							?>
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="black bigger">Soporte de Pago</h4>
                      </div>

                      <div class="modal-body">
                        <div class="row" >
               <input type="hidden" name="creado_por" value="<?php echo($IdSesion);?>">
					<input type="hidden" name="estado_soporte" value="1">
					<div class="form-group">
										  <label for="fila2_columna1">Soporte</label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file=""  multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ required>
												</div>
										</div>
					<input type="hidden" name="soporte_publicado" value="1">
					<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActualfor2);?>">
               		<input type="hidden" name="funcionario_id" value="<?php echo($id_funcionario) ?>">
               
               <div class="col-md-6">
                        <div class="form-group">
									  <label for="sel1">Tipo de Soporte:</label>
									  <select class="form-control" id="tipo_soporte" name="tipo_soporte" required>
										<option value="" selected>Seleccionar...</option>
										<option value="Pago de nomina">Pago de nómina</option>
										<option value="Pago de cesantias">Pago de cesantias</option>
										<option value="Pago de vacaciones">Pago de vacaciones</option>
                    <option value="Pago de liquidacion">Pago de Liquidación</option>
									  </select>
									</div>
              </div>
               <div class="col-md-6">
                        <div class="form-group">
                          <label>Fecha del Reporte: <span>*</span></label>
                          <input type="date" name="fecha_soporte" placeholder="Fecha Soporte" class="form-control required" required id="fecha_soporte" value="">
                        </div>
              </div>
               <div class="col-md-12">
                        <div class="form-group">
                          <label>Observaciones: <span>*</span></label>
                            <textarea class="form-control" rows="4" name="observaciones" id="descripcion" placeholder="Ingrese aquí la descripción de la novedad" maxlength="500" required></textarea>
                        </div>
              </div>
              
                        </div>
                      </div>

                      <div class="modal-footer">
                        <a href="CrearVenta.php" class="btn btn-sm btn-primary" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Cancelar
                        </a>
                        <button style="background-color: #C00000;color:white; " class="btn btn-sm ">
                          <i class="ace-icon fa fa-check"></i>
                          Reportar Novedad
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
    </div><!-- PAGE CONTENT ENDS -->
            <!-- FINAL MODAL -->
            </div>
   

    </section>
    <!-- /.content -->
  </div>
<!-- Fin Content-Wrapper -->
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
<script>
function eliminar($id,$funcionario){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
    //alert($modulo);
    window.location.href="?controller=funcionarios&&action=eliminarnovedad&&id="+$id+"&&idfun="+$funcionario;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>

<script>
function eliminasopo ($id,$funcionario){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
    //alert($modulo);
    window.location.href="?controller=funcionarios&&action=eliminarsoporte&&id="+$id+"&&idfun="+$funcionario;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>

<script type="text/javascript">
	var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n') 
}        
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#fecha_novedad').datepicker();
        //dateFormat: 'dd/mm/yy'
    }); 
} 
</script>

<script type="text/javascript">
	var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n') 
}        
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#fecha_soporte').datepicker();
        //dateFormat: 'dd/mm/yy'
    }); 
} 
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
