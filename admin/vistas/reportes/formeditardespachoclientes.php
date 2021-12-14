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
include_once 'controladores/campamentoController.php';
include_once 'modelos/campamento.php';
include_once 'controladores/destinosController.php';
include_once 'modelos/destinos.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/usuarios.php';
$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];
$idventa=$_GET['id'];
$vereditar=$_GET['vereditar'];

$res=Reportes::editardespachoPorclientes($idventa);
$campos = $res->getCampos();
foreach($campos as $campo){
            $fecha_reporte = $campo['fecha_reporte'];
            $fecha_radicada = $campo['fecha_radicada'];
            $imagen = $campo['imagen'];
            $cliente_id_cliente = $campo['cliente_id_cliente'];
            $producto_id_producto = $campo['producto_id_producto'];
            $equipo_id_equipo = $campo['equipo_id_equipo'];
            $despachado_por = $campo['despachado_por'];
            $transporte = $campo['transporte'];
            $campamento_id_campamento = $campo['campamento_id_campamento'];
             $id_destino_origen = $campo['id_destino_origen'];
             $id_destino_destino = $campo['id_destino_destino'];
            $valor_m3 = $campo['valor_m3'];
            $valor_material = $campo['valor_material'];
            $cantidad = $campo['cantidad'];
            $remision = $campo['remision'];
            $viajes = $campo['viajes'];
            $kilometraje = $campo['kilometraje'];
            $radicada = $campo['radicada'];
            $factura = $campo['factura'];
            $pagado = $campo['pagado'];
            $creado_por = $campo['pagado'];
            $estado_reporte = $campo['estado_reporte'];
            $reporte_publicado = $campo['reporte_publicado'];
            $marca_temporal = $campo['marca_temporal'];
            $observaciones = $campo['observaciones'];
            $nomequipo=Equipos::obtenerNombreEquipo($equipo_id_equipo);
            $nomprod=Productos::obtenerNombreProducto($producto_id_producto);
            $nomcli=Clientes::obtenerNombreCliente($cliente_id_cliente);
            $nomdespachadopor=Usuarios::obtenerNombreUsuario($despachado_por);

             if ($campamento_id_campamento==0) {
              $nomdestCamp=Campamento::obtenerNombreCampamento($producto_id_producto);
            }
            else
            {
              $nomdestCamp="No aplica";
            }
            $nomdest1=Destinos::obtenerNombreDestino($id_destino_origen);
            $nomdest2=Destinos::obtenerNombreDestino($id_destino_destino);
           

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

<!-- Content Wrapper. Contains page content -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Editar Despacho Clientes</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item"><a href="?controller=reportes&&action=despachosclientes">Reporte Despachos</a></li>
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
						<div class="col-md-12">

	<form role="form" autocomplete="off" action="?controller=reportes&&action=actualizardespachoclientes&&id=<?php echo($idventa); ?>" method="POST" enctype="multipart/form-data" >
							<?php  
								date_default_timezone_set("America/Bogota");
								$TiempoActual = date('Y-m-d H:i:s');
							?>
							
					<input type="hidden" name="creado_por" value="<?php echo($IdSesion);?>">
					<input type="hidden" name="estado_reporte" value="1">
					<input type="hidden" name="viajes" value="1">
					<input type="hidden" name="reporte_publicado" value="1">
					<input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual);?>">

					<div class="card-body">
							<div class="row">
								
								 <div class="col-md-4">
										<div class="form-group">
										  <label for="fila2_columna1">Documento <small>Tamaño máximo 10MB</small></label>
												<div class="custom-file">
													 <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagen;?>" multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ >
													 <input type="hidden" name="ruta1" value="<?php echo $imagen;?>" >
												</div>
										</div>
									   </div>
									   <div id="" class="col-md-4">
												<div class="form-group">
													<label> Incluye Transporte: <span>*</span></label>
								<select class="form-control" id="transporte" name="transporte" required>
										<option value="<?php echo $transporte;?>" ><?php echo $transporte;?></option>
										<option value="Flete">Flete</option>
										<option value="Flete y Material" >Flete y Material</option>
										
								</select>
												</div>
											</div>
							
											<div class="col-md-4">
												<div class="form-group">
													<label>Fecha del Despacho: <span>*</span></label>
													<input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte" value="<?php echo $fecha_reporte;?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Remisión Nº<span>*</span></label>
													<input type="number" step="any" name="remision" placeholder="Remisión Nº" class="form-control" required value="<?php echo $remision;?>">
													
												</div>
											</div>
						<div id="campocampamento"  class="col-md-4">
                        <div class="form-group">
                          <label> Seleccione el Campamento: <span>*</span></label>
                          <select class="form-control mi-selector" id="campamento_id_campamento" name="campamento_id_campamento" >
                            <option value="<?php echo $campamento_id_campamento;?>" selected><?php echo $nomdestCamp;?></option>
                            <?php                     
                        $campamentos = Campamento::obtenerListaCampamentos(); 
                            foreach ($campamentos as $campamento ){
                              $id_campamento  = $campamento['id_campamento'];
                              $nombre_campamento = $campamento['nombre_campamento'];
                            ?>
                            <option value="<?php echo $id_campamento ; ?>"><?php echo utf8_encode($nombre_campamento); ?></option>
                            <?php } ?>
                          </select>

                        </div>
                      </div>

                       <div class="col-md-4">
                        <div class="form-group">
                          <label>Seleccione el Origen: <span>*</span></label>
                          <select class="form-control mi-selector" id="id_destino_origen" name="id_destino_origen" required>
                            <option value="<?php echo utf8_encode($id_destino_origen); ?>" selected><?php echo utf8_encode($nomdest1) ?></option>
                            <?php                     
                        $campamentos = Destinos::obtenerListaDestinos(); 
                            foreach ($campamentos as $campamento ){
                              $id_destino  = $campamento['id_destino'];
                              $nombre_destino = $campamento['nombre_destino'];
                            ?>
                            <option value="<?php echo $id_destino ; ?>"><?php echo utf8_encode($nombre_destino); ?></option>
                            <?php } ?>
                          </select>

                        </div>
                      </div>
                       <div  class="col-md-4">
                        <div class="form-group">
                          <label>
                           
                            Seleccione el Destinos: <span>*</span></label>
                          <select class="form-control mi-selector" id="id_destino_destino" name="id_destino_destino" required>
                            <option value="<?php echo utf8_encode($id_destino_destino); ?>" selected><?php echo utf8_encode($nomdest2) ?></option>
                            <?php                     
                        $campamentos = Destinos::obtenerListaDestinos(); 
                            foreach ($campamentos as $campamento ){
                              $id_destino  = $campamento['id_destino'];
                              $nombre_destino = $campamento['nombre_destino'];
                            ?>
                            <option value="<?php echo $id_destino ; ?>"><?php echo utf8_encode($nombre_destino); ?></option>
                            <?php } ?>
                          </select>

                        </div>
                      </div>
											<div class="col-md-4">
												<div class="form-group">
													<label> Seleccione el Cliente: <span>*</span></label>
								<select class="form-control mi-selector" id="cliente_id_cliente" name="cliente_id_cliente" required>
										<option value="<?php echo $cliente_id_cliente;?>" selected><?php echo $nomcli;?></option>
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
											
                    
											<div id="divplaca" class="col-md-4">
												<div class="form-group">
													<label> Seleccione el Producto: <span>*</span></label>
								<select class="form-control mi-selector" id="producto_id_producto" name="producto_id_producto" required>
										<option value="<?php echo $producto_id_producto;?>" selected><?php echo $nomprod;?></option>
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
											<div id="divplaca" class="col-md-4">
												<div class="form-group">
													<label> Seleccione el Equipo: <span>*</span></label>
								<select class="form-control mi-selector" id="equipo_id_equipo" name="equipo_id_equipo" required>
										<option value="<?php echo $equipo_id_equipo;?>" selected><?php echo $nomequipo;?></option>
										<?php
										$rubros = Equipos::obtenerListaVolquetasAsf();
										foreach ($rubros as $campo){
											$id_equipo = $campo['id_equipo'];
											$nombre_equipo = $campo['nombre_equipo'];
										?>
										<option value="<?php echo $id_equipo; ?>"><?php echo utf8_encode($nombre_equipo); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											
											<div id="" class="col-md-4">
												<div class="form-group">
													<label> Transportado por: <span>*</span></label>
								<select class="form-control mi-selector" id="despachado_por" name="despachado_por" required>
										<option value="<?php echo $despachado_por;?>" selected><?php echo $nomdespachadopor;?></option>
										<?php
										$rubros = Usuarios::ListaUsuariosCond();
										foreach ($rubros as $campo){
											$id_usuario = $campo['id_usuario'];
											$nombre_usuario = $campo['nombre_usuario'];
										?>
										<option value="<?php echo $id_usuario; ?>"><?php echo utf8_encode($nombre_usuario); ?></option>
										<?php } ?>
								</select>
												</div>
											</div>
											
											
										
											
											<div class="col-md-2">
												<div class="form-group">
													<label>m3 Volqueta<span>*</span></label>
													<input type="number" step="any" name="cantidad" placeholder="Indique la cantidad" class="form-control" required value="<?php echo $cantidad;?>">
												</div>
											</div>
											<div style="display: none;" class="col-md-4">
												<div class="form-group">
													<label>Kilómetraje<span>*</span></label>
													<input type="number" step="any" name="kilometraje" placeholder="Indique el Kilómetraje" class="form-control" required value="<?php echo $kilometraje;?>">
													<small>Decimales separados con punto</small>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Valor Unitario<span>*</span></label>
													<input type="text" name="valor_m3" placeholder="Valor M3" class="form-control" id="demo1" value="<?php echo $valor_m3;?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Valor Material<span>*</span></label>
													<input type="text" name="valor_material" placeholder="Valor Material" class="form-control" id="demo2" value="<?php echo $valor_material;?>">
												</div>
											</div>
											<hr>
											<div style="display: none;" class="col-md-12">
												<div id="" class="col-md-2">
												<div class="form-group">
													<label> Facturada: <span>*</span></label>
								<select class="form-control" id="radicada" name="radicada" required>
										<option value="<?php echo $radicada;?>" ><?php echo $radicada;?></option>
										<option value="Si">Si</option>
										<option value="No" >No</option>
										
								</select>
												</div>
											</div>
											<div  style="display: none;" class="col-md-4">
												<div class="form-group">
													<label>Fecha Factura: <span>*</span></label>
													<input type="date" name="fecha_radicada" placeholder="Fecha" class="form-control"  id="fecha_radicada" value="<?php echo $fecha_radicada;?>">
												</div>
											</div>
											<div style="display: none;" class="col-md-2">
												<div class="form-group">
													<label>Factura Nº<span>*</span></label>
													<input type="number" step="any" name="factura" placeholder="Número de Factura" class="form-control"  value="<?php echo $factura;?>">
												</div>
											</div>
											<div style="display: none;" id="" class="col-md-4">
												<div class="form-group">
													<label> Despacho cancelado: <span>*</span></label>
								<select class="form-control" id="pagado" name="pagado" value="<?php echo $pagado;?>"  >
										<option value="<?php echo $pagado;?>" ><?php echo $pagado;?></option>
										<option value="Si">Si</option>
										<option value="No" >No</option>
										
								</select>
												</div>
											</div>
											</div>
											
												
											<div class="col-md-12">
												<div class="form-group">
													<label>Observaciones<span>*</span></label>
									<textarea class="form-control" rows="2" id="descripcion" name="observaciones"><?php echo $observaciones;?></textarea>
												</div>
											</div>
											
										</div>
							<div class="row">
								<div class="card-footer">
								  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Actualizar Despacho</button>
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
<script type="text/javascript">
	var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n') 
}        
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#fecha_radicada').datepicker();
        //dateFormat: 'dd/mm/yy'
    }); 
} 
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
