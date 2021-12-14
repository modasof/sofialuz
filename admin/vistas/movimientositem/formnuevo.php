<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<?php 
$res    = Requisicionesitems::editarRequisicionesitemsPor($Selectiditem);
$campos = $res->getCampos();
foreach ($campos as $campo) {

   # ========================================================
   # =           Carga de todos los campos por ID           =
   # ========================================================
    $actividad            = $campo['actividad'];
    $insumo_id_insumo     = $campo['insumo_id_insumo'];
    $servicio_id_servicio = $campo['servicio_id_servicio'];
    $equipo_id_equipo     = $campo['equipo_id_equipo'];
    $fecha_reporte        = $campo['fecha_reporte'];
    $cantidad             = $campo['cantidad'];
    $fecha_entrega        = $campo['fecha_entrega'];
    $observaciones        = $campo['observaciones'];
    $requisicion_id       = $campo['requisicion_id'];
    $marca_temporal       = $campo['marca_temporal'];
    $usuario_creador      = $campo['usuario_creador'];
    $estado_item          = $campo['estado_item'];
    $tipo_req             = $campo['tipo_req'];
    $ordencompra_num      = $campo['ordencompra_num'];
    $nomsolicita  = Usuarios::obtenerNombreUsuario($usuario_creador);
    $nombreinsumo = Insumos::obtenerNombreInsumo($insumo_id_insumo);
   	$Ucategoriainsumo_id = Insumos::obtenerCategoria($insumo_id_insumo);
    $Unombrecategoria=Categoriainsumos::obtenerNombre($Ucategoriainsumo_id);
    $Uunidadmedida_id=Insumos::obtenerUnidadmed($insumo_id_insumo);
		$Unombredmedida=Unidadesmed::obtenerNombre($Uunidadmedida_id);
		$totaldistribuido= Movimientositem::ObtenerSumaCantidades($Selectiditem);
		$totalnuevo= Movimientositem::ObtenerSumaCantidadesCot($Selectiditem,"6");
}
 ?>


<div class="col-md-12">
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">RQ <?php echo($requisicion_id) ?>-Item <?php echo($Selectiditem) ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody>
                <tr>
                  <td><strong>Insumo:</strong></td>
                  <td><?php echo($nombreinsumo); ?></td>
                </tr>
                <tr>
                  <td><strong>Categoria:</strong></td>
                  <td><?php echo($Unombrecategoria); ?></td>
                </tr>
                <tr>
                  <td><strong>Cantidades Solicitadas:</strong></td>
                  <td><?php echo($cantidad." ".$Unombredmedida); ?></td>
                </tr>
                <tr>
                  <td><strong>Solicitado Por:</strong></td>
                  <td><?php echo($nomsolicita); ?></td>
                </tr>
               
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
						  <!-- general form elements -->
						  <div class="card card-primary">
							<!-- /.card-header -->
							<!-- form start -->
							<form role="form" action="?controller=movimientositem&&action=guardar&&totaldistribuido=<?php echo($totaldistribuido); ?>&&item_id=<?php echo($Selectiditem) ?>&&cantidadfinal=<?php echo($cantidad) ?>" method="POST" enctype="multipart/form-data">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Gestionar Cantidades</h3>
								</div>
							<div class="row">
				<?php  
					date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
								$DiaActual = date('Y-m-d');
							?>

					<input type="hidden" name="actividad" value="<?php echo ($actividad); ?>">
					<input type="hidden" name="insumo_id_insumo" value="<?php echo($insumo_id_insumo) ?>">
					<input type="hidden" name="servicio_id_servicio" value="<?php echo($servicio_id_servicio) ?>">
					<input type="hidden" name="equipo_id_equipo" value="<?php echo($equipo_id_equipo) ?>">
					<input type="hidden" name="fecha_reporte" value="<?php echo($DiaActual) ?>">
					<input type="hidden" name="fecha_entrega" value="<?php echo($fecha_entrega) ?>">
					<input type="hidden" name="observaciones" value="<?php echo ($observaciones); ?>">
					<input type="hidden" name="requisicion_id" value="<?php echo ($requisicion_id) ?>">
					<input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual); ?>">
					<input type="hidden" name="usuario_creador" value="<?php echo ($IdSesion); ?>">
					<input type="hidden" name="estado_item" value="<?php echo ($estado_item) ?>">
					<input type="hidden" name="tipo_req" value="<?php echo ($tipo_req); ?>">
					<input type="hidden" name="ordencompra_num" value="<?php echo ($ordencompra_num); ?>">
					<input type="hidden" name="duplicado_de" value="<?php echo ($item_id); ?>">


						<div class="col-md-12">
												<div class="form-group">
													<label>Indique la cantidad que enviará a Centro de Distribución<span>*</span></label>
													<input type="number" step="any" name="cantidad" placeholder="Indique la cantidad" class="form-control" required  max="<?php echo ($cantidad);?>" value="0">
													<small>Decimales separados con punto</small>
												</div>
						</div>
             
							</div>
							<div class="card-footer">
								<?php if ($totalnuevo==$cantidad) {
									?>
									 <button disabled="true" name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
									<?php
								}
								else{
									?>
									 <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
									<?php
								} 


								?>
							 
							</div>
						  </div>
						  <!-- /.card -->

							</form>
						</div>
					  </div>


<script type="text/javascript">
  $(function () {
   $('[data-toggle="tooltip"]').tooltip();
  })
</script>
