
<?php
include_once 'modelos/funcionarios.php';
include_once 'controladores/funcionariosController.php';
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];
 $fecha_Actual=date('y-m-d'); 
$campos = $campos->getCampos();
foreach ($campos as $campo){
		$imagen = $campo['imagen'];
		$id_funcionario = $campo['id_funcionario'];
		$nombre_funcionario = $campo['nombre_funcionario'];
        $documento = $campo['documento'];
        $fecha_ingreso = $campo['fecha_ingreso'];
        $tipo_contrato = $campo['tipo_contrato'];
        $observacionescargo = $campo['observaciones'];
        $marca_temporal = $campo['marca_temporal'];
        $cargo_id_cargo = $campo['cargo_id_cargo'];
        $empresa = $campo['empresa'];
        $arl = $campo['arl'];
        $eps = $campo['eps'];
        $salario = $campo['salario'];
        $ciudad = $campo['ciudad'];
        $direccion = $campo['direccion'];
        $celular = $campo['celular'];
        $correo = $campo['correo'];
        $nombrecargo=Funcionarios::ObtenerNombreCargo($cargo_id_cargo);
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
        <?php echo utf8_decode($nombrecargo." ".$nombre_funcionario); ?>
      </h1>
      <h5>
      	Antigüedad: <?php echo (tiempoTranscurridoFechas($fecha_ingreso,$fecha_Actual)) ?>
      </h5>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="?controller=funcionarios&&action=todos">Lista de Empleados</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a class="active" href="#timeline" data-toggle="tab">Novedades</a></li>
              <li ><a href="#activity" data-toggle="tab">Soportes de Pago</a></li>
               <li ><a href="#asesores" data-toggle="tab">Documentos</a></li>
              
              
            </ul>
            <div class="tab-content">
              <div class=" tab-pane" id="asesores">
             
               <table class="table no-margin">
                <tr class="warning">
                  <th>Documento</th>
                  <th>Acción</th>
                </tr>
                 <?php
        $res=Funcionarios::obtenerDocumentos($id_funcionario,3);
              $campos = $res->getCampos();
                     foreach ($campos as $campo){
                      $nombre_documento = $campo['nombre_documento'];
                      $imagendocumento = $campo['imagen'];
                    ?>
                    <tr>
                      <td>
                        <?php echo ($nombre_documento) ?>
                      </td>
                       <td>
                        <button type="button" class="btn btn-default btn-flat"> <a target="_blank" href="<?php echo($imagendocumento); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "></i>
              </a>
            </button>
             <button type="button" class="btn btn-default btn-flat"> <a download="Soporte" href="<?php echo($imagendocumento); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "></i>
              </a>
            </button>
                      </td>
                    </tr>
                    <?php 
                  }
                     ?>
               </table>
              </div>
              <div class=" tab-pane" id="activity">
              	 <a data-toggle="modal" data-target="#modal-form5" href="#" class="btn btn-success">Subir Soporte de Pago</a>
              <hr>
                
               <h4><i class=" fa fa-list"> Listado de Pagos </i></h4>
                  <hr>
               <table class="table no-margin">
              <tr class="info">
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Observaciones</th>
                <th>-</th>
              </tr>
                <?php
				$res=Funcionarios::obtenerSoportesPor($id_funcionario);
              $campos = $res->getCampos();
										 foreach ($campos as $campo){
										 	$id_soporte = $campo['id'];
											$fecha_soporte = $campo['fecha_soporte'];
											$tipo_soporte = $campo['tipo_soporte'];
											$imagensoporte = $campo['imagen'];
											$observaciones = $campo['observaciones'];
											$creado_por = $campo['creado_por'];
											$marca_temporal = $campo['marca_temporal'];
										?>
             <tr>
             	<td><?php echo(fechalarga($fecha_soporte)); ?></td>
             	<td><?php echo($tipo_soporte); ?></td>
             	<td><?php echo($observaciones); ?></td>
             	<td>
             		 <button type="button" class="btn btn-default btn-flat"> <a target="_blank" href="<?php echo($imagensoporte); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "></i>
              </a>
            </button>
             <button type="button" class="btn btn-default btn-flat"> <a download="Soporte" href="<?php echo($imagensoporte); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "></i>
              </a>
            </button>
              <button  type="button" class="btn btn-default btn-flat"> <a href="#" onclick="eliminasopo(<?php echo $id_soporte; ?>,<?php echo($id_funcionario); ?>);" class="tooltip-primary text-danger" title="Eliminar Egreso">
                <i class="fa fa-trash bigger-110 "></i>
              </a>
            </button>
             	</td>
             </tr>
             <?php 
         }
              ?>
            </table>
              </div>
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="timeline">
              	 <a data-toggle="modal" data-target="#modal-form4" href="#" class="btn btn-success">Reportar Novedad</a>
              <hr>
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          <?php 
                         
                          echo fechalarga($fecha_ingreso);
                          ?>
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> Actualizado el:<?php echo($marca_temporal); ?></span>

                      <h3 class="timeline-header">Inicio de contrato</h3>

                      <div class="timeline-body">
                         <strong>Cargo: </strong><?php echo utf8_decode($nombrecargo."<strong><br> Empleado: </strong>".$nombre_funcionario) ?> <br><strong>Documento: </strong><?php echo utf8_decode($documento); ?> <br><strong>Salario: </strong><?php echo ("$ ".number_format($salario)) ?>
                      </div>
                     
                    </div>
                  </li>
                  <!-- END timeline item -->
                    <!-- timeline time label -->
           <?php
				$res=Funcionarios::obtenerNovedadesPor($id_funcionario);
              $campos = $res->getCampos();
										 foreach ($campos as $campo){
										 	$id_novedad = $campo['id'];
											$reportado_por = $campo['reportado_por'];
											$tipo_novedad = $campo['tipo_novedad'];
											$fecha_novedad = $campo['fecha_novedad'];
											$imagen2 = $campo['imagen'];
											$observaciones = $campo['observaciones'];
											$creado_por = $campo['creado_por'];
											$marca_temporal = $campo['marca_temporal'];
										?>
                  <li class="time-label">
                        <span class="bg-red">
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

                      <h3 class="timeline-header"><strong>Tipo Novedad: </strong><?php echo($tipo_novedad) ?></a></h3>

                      <div class="timeline-body">
                       <?php echo($observaciones); ?> <br>
                       <strong>Reportado por: </strong><?php echo($reportado_por); ?> <br>

                      </div>
                      <div class="timeline-footer">
                         <a href="?controller=novedades&&action=editar&&id=<?php echo $id_novedad; ?>" class="btn btn-success btn-xs" data-rel="tooltip" data-placement="top" title="" data-original-title="Editar Novedad">
                       <i class="fa fa-edit"> </i> Editar</a>
                        <a onclick="eliminar(<?php echo $id_novedad; ?>,<?php echo($id_funcionario) ?>);" class="btn btn-danger btn-xs"><i class="fa fa-trash"> </i> Eliminar</a>
                        <?php 
                        if ($imagen2!="") {
                        	?>
                        	<a target="_blank" href="<?php echo($imagen2) ?>" class="btn btn-primary btn-xs"><i class="fa fa-paperclip"> </i> Soporte</a>
                        	<?php
                        }
                         ?>
                         
                      
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
          <div class="box box-primary">
          	<form role="form" action="?controller=funcionarios&&action=actualizar&&id=<?php echo $id_funcionario; ?>" method="POST" enctype="multipart/form-data">
            <div class="col-12">
										<div class="form-group">
										  <label for="fila2_columna1">Foto de perfil</label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen;?>" data-allowed-file-extensions="png jpg jpeg mp4 webm" data-show-errors="true" data-max-file-size="2M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif"/>
													 <input type="hidden" name="ruta1" value="<?php echo $imagen;?>" >
												</div>
										</div>
									   </div>
	

		 <div class="col-sm-12 col-xs-12">
									<div class="form-group">
									  <label for="nombres">Nombre completo del Funcionario</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="nombre_funcionario" value="<?php echo utf8_encode($nombre_funcionario) ?>" class="form-control" id="nombre_funcionario" placeholder="Ingrese el nombre completo del usuario"  required>
             				 </div>
									 
									</div>
								  </div>
								 <div class="col-sm-12 col-xs-12">
									<div class="form-group">
									  <label for="documento">Documento</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="documento" value="<?php echo utf8_encode($documento) ?>" class="form-control" id="documento" placeholder="Ingrese el número de documento" required>
             				 </div>
									 
									</div>
								  </div>
								  
								   <div class="col-sm-12 col-xs-12">
									<div class="form-group">
									  <label for="sel1">Cargo del Funcionario:</label>
									  <select class="form-control" id="cargo_id_cargo" name="cargo_id_cargo" required>
										<option value="<?php echo utf8_encode($cargo_id_cargo) ?>" selected><?php echo utf8_encode($nombrecargo) ?></option>
										<?php
										$rubros = Funcionarios::obtenerCargos();
										foreach ($rubros as $campo){
											$id_cargo = $campo['id_cargo'];
											$nombre_cargo = $campo['nombre_cargo'];
										?>
										<option value="<?php echo $id_cargo; ?>"><?php echo $nombre_cargo; ?></option>
										<?php } ?>
									  </select>
									</div>
								</div>
								  <div class="col-sm-12 col-xs-12">
									<div class="form-group">
									  <label for="sel1">Tipo de Contrato:</label>
									  <select class="form-control" id="tipo_contrato" name="tipo_contrato" required>
										<option value="<?php echo utf8_encode($tipo_contrato) ?>" selected><?php echo utf8_encode($tipo_contrato) ?></option>
										<option value="Indefinido">Indefinido</option>
										<option value="Prestacion de Servicios">Prestación de Servicios</option>
                    <option value="Contratista">Contratista</option>
									  </select>
									</div>
								</div>
								 <div class="col-sm-12 col-xs-12">
												<div class="form-group">
													<label>Fecha Ingreso: <span>*</span></label>
													<input type="date" name="fecha_ingreso" placeholder="Fecha" class="form-control required" required id="fecha_ingreso" value="<?php echo utf8_encode($fecha_ingreso) ?>">
												</div>
								</div>
                 <div class="col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="documento">Empresa</label>
                    <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-industry"></i></span>
                <input type="text" name="empresa" value="<?php echo utf8_encode($empresa) ?>" class="form-control" id="empresa" placeholder="Ingrese Empresa" required>
                     </div>
                   
                  </div>
                  </div>
								 <div class="col-sm-12 col-xs-12">
									<div class="form-group">
									  <label for="documento">ARL Empleado</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
                <input type="text" name="arl" value="<?php echo utf8_encode($arl) ?>" class="form-control" id="arl" placeholder="Ingrese arl empleado" required>
             				 </div>
									 
									</div>
								  </div>
								   <div class="col-sm-12 col-xs-12">
									<div class="form-group">
									  <label for="documento">EPS Empleado</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                <input type="text" name="eps" value="<?php echo utf8_encode($eps) ?>" class="form-control" id="eps" placeholder="Ingrese EPS empleado" required>
             				 </div>
									 
									</div>
								  </div>
								   <div class="col-sm-12 col-xs-12">
									<div class="form-group">
									  <label for="documento">Salario Acordado</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
               <input type="text" name="salario" placeholder="Salario acordado" class="form-control" id="demo1" value="<?php echo utf8_encode($salario) ?>">
             				 </div>
									 
									</div>
								  </div>
								   <div class="col-sm-12 col-xs-12">
									<div class="form-group">
									  <label for="documento">Ciudad</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" name="ciudad" value="<?php echo utf8_encode($ciudad) ?>" class="form-control" id="eps" placeholder="Ingrese ciudad empleado" >
             				 </div>
									 
									</div>
								  </div>
								   <div class="col-sm-12 col-xs-12">
									<div class="form-group">
									  <label for="documento">Dirección</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" name="direccion" value="<?php echo utf8_encode($direccion) ?>" class="form-control" id="eps" placeholder="Ingrese dirección empleado" >
             				 </div>
									 
									</div>
								  </div>
								   <div class="col-sm-12 col-xs-12">
									<div class="form-group">
									  <label for="documento">Datos de Contacto </label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                <input type="text" name="celular" value="<?php echo utf8_encode($celular) ?>" class="form-control" id="eps" placeholder="Ingrese número de Whatsapp" >
             				 </div>
									 
									</div>
								  </div>
								   <div class="col-sm-12 col-xs-12">
									<div class="form-group">
									  <label for="documento">E-mail</label>
									  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" name="correo" value="<?php echo utf8_encode($correo) ?>" class="form-control" id="eps" placeholder="Ingrese E-mail" >
             				 </div>
									 
									</div>
								  </div>
								 <div class="col-12">
												<div class="form-group">
												  <label for="nombres">Funciones del Cargo (Máx 1000 Carácteres)</label>
													  <textarea class="form-control" rows="4" name="observaciones" id="descripcion" placeholder="Ingrese alguna observación" maxlength="1000" required><?php echo utf8_encode($observacionescargo) ?>
													  </textarea>
												 
												</div>
											  </div>
											  <div class="card-footer">
							  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
							</div>

            <!-- /.box-body -->
        </form>
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
                    <?php
                    $rubros = Usuarios::ListaUsuariosAdmin();
                    foreach ($rubros as $campo){
                      $nombre_usuario = $campo['nombre_usuario'];
                    ?>
                    <option value="<?php echo $nombre_usuario; ?>"><?php echo utf8_encode($nombre_usuario); ?></option>
                    <?php } ?>
                    <option value="Yenni Bustamante">Yenni Bustamante</option>
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
