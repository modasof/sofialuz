<?php
ini_set('display_errors', '0');
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';
include_once 'modelos/productos.php';
include_once 'controladores/productosController.php';
include_once 'modelos/funcionarios.php';
include_once 'controladores/funcionariosController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';
$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];
$idventa=$_GET['id'];
$vereditar=$_GET['vereditar'];

$res=Reportes::editardespachoPor($idventa);
$campos = $res->getCampos();
foreach($campos as $campo){
            $fecha_reporte = $campo['fecha_reporte'];
            $cliente_id_cliente = $campo['cliente_id_cliente'];
            $producto_id_producto = $campo['producto_id_producto'];
            $equipo_id_equipo = $campo['equipo_id_equipo'];
            $despachado_por = $campo['despachado_por'];
            $transportado_por = $campo['transportado_por'];
            $despachador_tm = $campo['despachador_tm'];
            $tipo_despacho = $campo['tipo_despacho'];
            $valor_m3 = $campo['valor_m3'];
            $cantidad = $campo['cantidad'];
            $viajes = $campo['viajes'];
            $creado_por = $campo['creado_por'];
            $estado_reporte = $campo['estado_reporte'];
            $reporte_publicado = $campo['reporte_publicado'];
            $marca_temporal = $campo['marca_temporal'];
            $observaciones = $campo['observaciones'];
            $nomequipo=Equipos::obtenerNombreEquipo($equipo_id_equipo);
            $nomprod=Productos::obtenerNombreProducto($producto_id_producto);
            $nomcli=Clientes::obtenerNombreCliente($cliente_id_cliente);
            $nomdespachadopor=Funcionarios::obtenerNombreFuncionario($despachado_por);
            $nomtransportadopor=Funcionarios::obtenerNombreFuncionario($transportado_por);
            $nomdespachadortm=Funcionarios::obtenerNombreFuncionario($despachador_tm);

}

?>

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Content Wrapper. Contains page content -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Editar Despacho</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item"><a href="?controller=reportes&&action=despachos">Reporte Despachos</a></li>
            <!--<li class="breadcrumb-item active"><a href="?controller=equipos&&action=todos">Equipos</a></li>-->
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
				
					
						<!-- ESTE DIV LO USO PARA CENTRAR EL FORMULARIO -->
						<!-- left column -->
						<div class="col-md-8">
	<form role="form" autocomplete="off" action="?controller=reportes&&action=actualizardespacho&&id=<?php echo($idventa); ?>" method="POST" enctype="multipart/form-data" >
							<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
							?>
							
					<input type="hidden" name="creado_por" value="<?php echo($IdSesion);?>">
					<input type="hidden" name="estado_reporte" value="1">
					<input type="hidden" name="reporte_publicado" value="1">
					<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual);?>">

					<div class="card-body">
							<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Fecha del Despacho: <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte" value="<?php echo($fecha_reporte);?>">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label> Seleccione el Cliente: <span>*</span></label>
								<select class="form-control" id="cliente_id_cliente" name="cliente_id_cliente" required>
										<option value="<?php echo($cliente_id_cliente);?>" selected><?php echo utf8_encode($nomcli);?></option>
										<?php
										$rubros = Clientes::obtenerListaClientes();
										foreach ($rubros as $campo){
											$id_cliente = $campo['id_cliente'];
											$nombre_cliente = $campo['nombre_cliente'];
										?>
										<option value="<?php echo $id_cliente; ?>"><?php echo utf8_encode($nombre_cliente); ?></option>
										<?php } ?>
								</select>

												</div>
											</div>
											<div id="divplaca" class="col-md-12">
												<div class="form-group">
													<label> Seleccione el Producto: <span>*</span></label>
								<select class="form-control" id="producto_id_producto" name="producto_id_producto" required>
										<option value="<?php echo($producto_id_producto);?>" selected><?php echo utf8_encode($nomprod);?></option>
										<?php
										$rubros = Productos::obtenerListaProductos();
										foreach ($rubros as $campo){
											$id_producto = $campo['id_producto'];
											$nombre_producto = $campo['nombre_producto'];
										?>
										<option value="<?php echo $id_producto; ?>"><?php echo utf8_encode($nombre_producto); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											<div id="divplaca" class="col-md-12">
												<div class="form-group">
													<label> Seleccione el Equipo: <span>*</span></label>
								<select class="form-control" id="equipo_id_equipo" name="equipo_id_equipo" required>
										<option value="<?php echo($equipo_id_equipo);?>" selected><?php echo utf8_encode($nomequipo);?></option>
										<?php
										$rubros = Equipos::obtenerListaEquiposAsf();
										foreach ($rubros as $campo){
											$id_equipo = $campo['id_equipo'];
											$nombre_equipo = $campo['nombre_equipo'];
										?>
										<option value="<?php echo $id_equipo; ?>"><?php echo utf8_encode($nombre_equipo); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											<div id="" class="col-md-12">
												<div class="form-group">
													<label> Despachado por: <span>*</span></label>
								<select class="form-control" id="despachado_por" name="despachado_por" required>
										<option value="<?php echo($despachado_por);?>" selected><?php echo utf8_encode($nomdespachadopor);?></option>
										<?php
										$rubros = Funcionarios::obtenerListaFuncionarios();
										foreach ($rubros as $campo){
											$id_funcionario = $campo['id_funcionario'];
											$nombre_funcionario = $campo['nombre_funcionario'];
										?>
										<option value="<?php echo $id_funcionario; ?>"><?php echo utf8_encode($nombre_funcionario); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											<div id="" class="col-md-12">
												<div class="form-group">
													<label> Transportado por: <span>*</span></label>
								<select class="form-control" id="transportado_por" name="transportado_por" required>
										<option value="<?php echo($transportado_por);?>" selected><?php echo utf8_encode($nomtransportadopor);?></option>
										<?php
										$rubros = Funcionarios::obtenerListaFuncionarios();
										foreach ($rubros as $campo){
											$id_funcionario = $campo['id_funcionario'];
											$nombre_funcionario = $campo['nombre_funcionario'];
										?>
										<option value="<?php echo $id_funcionario; ?>"><?php echo utf8_encode($nombre_funcionario); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											<div id="" class="col-md-12">
												<div class="form-group">
													<label> Despachador T.M: <span>*</span></label>
								<select class="form-control" id="despachador_tm" name="despachador_tm" required>
										<option value="<?php echo($despachador_tm);?>" selected><?php echo utf8_encode($nomdespachadortm);?></option>
										<?php
										$rubros = Funcionarios::obtenerListaFuncionarios();
										foreach ($rubros as $campo){
											$id_funcionario = $campo['id_funcionario'];
											$nombre_funcionario = $campo['nombre_funcionario'];
										?>
										<option value="<?php echo $id_funcionario; ?>"><?php echo utf8_encode($nombre_funcionario); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											<div id="" class="col-md-12">
												<div class="form-group">
													<label> Tipo Despacho: <span>*</span></label>
								<select class="form-control" id="tipo_despacho" name="tipo_despacho" required>
										<option value="<?php echo($tipo_despacho);?>" selected><?php echo utf8_encode($tipo_despacho);?></option>
										<option value="A patio">A Patio</option>
										<option value="A cliente" >A cliente</option>
										
								</select>
												</div>
											</div>


											<div style="display: none;" class="col-md-12">
												<div class="form-group">
													<label>Valor m3<span>*</span></label>
													<input type="text" name="valor_m3" placeholder="Valor M3" class="form-control" id="demo1" value="<?php echo($valor_m3);?>">
												</div>
											</div>

											
											<div class="col-md-12">
												<div class="form-group">
													<label>Cantidad<span>*</span></label>
													<input type="number" step="any" name="cantidad" placeholder="Indique la cantidad" class="form-control" required value="<?php echo($cantidad);?>">
													<small>Decimales separados con punto</small>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Viajes<span>*</span></label>
													<input type="number" step="any" name="viajes" placeholder="Indique la cantidad de viajes" class="form-control" required value="<?php echo($viajes);?>">
													<small>Decimales separados con punto</small>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Observaciones<span>*</span></label>
									<textarea class="form-control" rows="2" id="descripcion" name="observaciones"><?php echo utf8_encode($observaciones);?></textarea>
												</div>
											</div>
											
										</div>
							<div class="row">
								<div class="card-footer">
								  <button name="Submit" type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para actualizar la información">Actualizar</button>
								</div>
						  </div>
						  </form>
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
	var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n') 
}        
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#fecha_reporte').datepicker();
        //dateFormat: 'dd/mm/yy'
    }); 
} 
</script>
