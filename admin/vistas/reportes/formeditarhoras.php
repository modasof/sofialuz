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

$res=Reportes::editarhorasPor($idventa);
$campos = $res->getCampos();
foreach($campos as $campo){
            $fecha_reporte = $campo['fecha_reporte'];
           
            $equipo_id_equipo = $campo['equipo_id_equipo'];
            $despachado_por = $campo['despachado_por'];
            $recibido_por = $campo['recibido_por'];
           	$punto_despacho= $campo['punto_despacho'];
            $valor_m3 = $campo['valor_m3'];
            $cantidad = $campo['cantidad'];
            $hora_inactiva = $campo['hora_inactiva'];
            $indicador = $campo['indicador'];
            $creado_por = $campo['creado_por'];
            $estado_reporte = $campo['estado_reporte'];
            $reporte_publicado = $campo['reporte_publicado'];
            $marca_temporal = $campo['marca_temporal'];
            $observaciones = $campo['observaciones'];
            $nomequipo=Equipos::obtenerNombreEquipo($equipo_id_equipo);
            $nomdespachadopor=Funcionarios::obtenerNombreFuncionario($despachado_por);
            $nomrecibidopor=Funcionarios::obtenerNombreFuncionario($recibido_por);

}

?>

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
<!-- Content Wrapper. Contains page content -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Editar Horas/Kilometraje</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item"><a href="?controller=reportes&&action=horas">Reporte Horas</a></li>
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
	<form role="form" autocomplete="off" action="?controller=reportes&&action=actualizarhoras&&id=<?php echo($idventa); ?>" method="POST" enctype="multipart/form-data" >
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
													<label>Fecha del Reporte: <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte" value="<?php echo($fecha_reporte);?>">
												</div>
											</div>
											
											
											<div id="divplaca" class="col-md-12">
												<div class="form-group">
													<label> Seleccione el Equipo: <span>*</span></label>
								<select class="form-control mi-selector" id="equipo_id_equipo" name="equipo_id_equipo" required>
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
											<div style="display: none;"  id="" class="col-md-12">
												<div class="form-group">
													<label> Punto Despacho: <span>*</span></label>
								<select class="form-control" id="punto_despacho" name="punto_despacho" required>
										<option value="<?php echo($punto_despacho);?>" selected><?php echo utf8_encode($punto_despacho);?></option>
										<option value="Comercializadora"  >Comercializadora</option>
										<option value="Cantera 1"  >Cantera 1</option>
								</select>
												</div>
											</div>
											<div id="" class="col-md-12">
												<div class="form-group">
													<label> Reportado por: <span>*</span></label>
							
										<select class="form-control mi-selector2" id="despachado_por" name="despachado_por" required>
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
													<label> Operado por: <span>*</span></label>
								<select class="form-control mi-selector3" id="recibido_por" name="recibido_por" required>
								
										<option value="<?php echo($recibido_por);?>" selected><?php echo utf8_encode($nomrecibidopor);?></option>
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
											
											


											<div style="display: none;" class="col-md-12">
												<div class="form-group">
													<label>Valor m3<span>*</span></label>
													<input type="text" name="valor_m3" placeholder="Valor M3" class="form-control" id="demo1" value="<?php echo($valor_m3);?>">
												</div>
											</div>

											
										
												<div class="col-md-12">
												<div class="form-group">
													<label>Kilometro - Horómetro (Inicial)<span>*</span></label>
													<input type="number" step="any" name="indicador" placeholder="Indicador" class="form-control" required value="<?php echo($indicador);?>">
													<small>Decimales separados con punto</small>
												</div>
											</div>
												<div class="col-md-12">
												<div class="form-group">
													<label>Kilometro - Horómetro (Final)<span>*</span></label>
													<input type="number" step="any" name="cantidad" placeholder="Indique la cantidad" class="form-control" required value="<?php echo($cantidad);?>">
													<small>Decimales separados con punto</small>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Total Hr/Km<span>*</span></label>
													<input type="number" step="any" name="hora_inactiva" placeholder="Horas Inactivas" class="form-control" required value="<?php echo($hora_inactiva);?>">
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
