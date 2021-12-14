<?php
ini_set('display_errors', '0');
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';
include_once 'modelos/productos.php';
include_once 'controladores/productosController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';
include_once 'modelos/concreto.php';
include_once 'controladores/concretoController.php';
include_once 'modelos/funcionarios.php';
include_once 'controladores/campamentoController.php';
include_once 'modelos/campamento.php';
include_once 'controladores/destinosController.php';
include_once 'modelos/destinos.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/usuarios.php';
include_once 'controladores/funcionariosController.php';
include_once 'modelos/proyectos.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];

//id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones.


$irn = 1;
$idget = $_GET['id'];

if ($idget!=""){
  
  $campos = $campos->getCampos();
  foreach ($campos as $campo){

    $id = $campo['id'];
    $campamento_id_campamento = $campo['campamento_id_campamento'];
    $proyecto_id_proyecto = $campo['proyecto_id_proyecto'];
    $id_destino_origen = $campo['id_destino_origen'];
    $id_destino_destino = $campo['id_destino_destino'];
    $imagen = $campo['imagen'];
    $fecha_reporte = $campo['fecha_reporte'];
    $puntos = $campo['puntos'];

    $cliente_id_cliente = $campo['cliente_id_cliente'];
    $producto_id_producto = $campo['producto_id_producto'];
    $valor_m3 = $campo['valor_m3'];
     $valor_material = $campo['valor_material'];
    $cantidad = $campo['cantidad'];
    $kilometraje = $campo['kilometraje'];
    $viajes = $campo['viajes'];
    $transporte = $campo['transporte'];
    $despachado_por=$campo['despachado_por'];
    $radicada = $campo['radicada'];
     $remision = $campo['remision'];
    $fecha_radicada = $campo['fecha_radicada'];
    $factura = $campo['factura'];
    $pagado = $campo['pagado'];
    $creado_por = $campo['creado_por'];
    $estado_reporte = $campo['estado_reporte'];
    $reporte_publicado = $campo['reporte_publicado'];
    $marca_temporal = $campo['marca_temporal'];
    $observaciones = $campo['observaciones'];
    $equipo_id_equipo = $campo['equipo_id_equipo'];
    $nomprod=Productos::obtenerNombreProducto($producto_id_producto);

    if ($campamento_id_campamento!=0) {
      $nomdestCamp=Campamento::obtenerNombreCampamento($campamento_id_campamento);
    }
    else
    {
      $nomdestCamp="No aplica";
    }
    $nomdest1=Destinos::obtenerNombreDestino($id_destino_origen);
    $nomdest2=Destinos::obtenerNombreDestino($id_destino_destino);

    $nomcli=Clientes::obtenerNombreCliente($cliente_id_cliente);
    $nomconductor=Usuarios::obtenerNombreUsuario($despachado_por);
    $nomequipo=Equipos::obtenerNombreEquipo($equipo_id_equipo);
    $ventatotal=$cantidad+$valor_material;

    $proyectosselecc=Proyectos::obtenerPaginaPor($proyecto_id_proyecto);
    $proyectosselecc = $proyectosselecc->getCampos();            
    foreach ($proyectosselecc as $campo2){              
      $proyectonombre = $campo2['nombre_proyecto'];
    }
  }

  
  $camposdetalle=Concreto::detallepuntosgeneral($idget);
  //$camposdetalle = $camposdetalle->getCampos();


  foreach ($camposdetalle as $campodet){

    $idDetalle = $campodet['id'];
    $puntoscolocar = $campodet['puntos'];

    $divpuntos .= "
      <div class='col-md-4' id='div_puntos$irn'>
        <div class='form-group'>
          <label>Total Puntos $irn<span></span></label>
          <input type='number' step='any' name='puntos[]' placeholder='Total Puntos $irn' class='form-control' value='$puntoscolocar' >
          <small>Decimales separados con punto</small>
        </div>
      </div> 
    ";

    $irn = $irn + 1;
  }

}

$totalpuntos = $irn - 1;

for ($n=$irn;$n<=20;$n++){

  $displaynonepunto = " style='display: none' ";
  if ($n==1){
    $displaynonepunto = "";   
    $totalpuntos = $irn; 
  }

  $divpuntos .= "
    <div class='col-md-4' id='div_puntos$n' $displaynonepunto >
      <div class='form-group'>
        <label>Total Puntos $n<span></span></label>
        <input type='number' step='any' name='puntos[]' placeholder='Total Puntos $n' class='form-control' >
        <small>Decimales separados con punto</small>
      </div>
    </div> 
  ";
}

?>

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector2').select2();
    });
});
</script>


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Content Wrapper. Contains page content -->



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Reporte Despacho Concreto <?php echo($nomcli); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
             <li class="breadcrumb-item"><a href="?controller=concreto&&action=todos">Concreto</a></li>
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
						  <!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector1').select2();
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
        $('.mi-selector4').select2();
    });
});
</script>
<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector5').select2();
    });
});
</script>


<div class="box box-primary ">
            <div class="box-header with-border">
              <h3 class="box-title"> Registrar Despacho 
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </h3>

              <div class="box-tools pull-right">
              <!--   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button> -->
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
  <form role="form" autocomplete="off" action="?controller=concreto&&action=guardar" method="POST" enctype="multipart/form-data" >
              <?php  
                date_default_timezone_set("America/Bogota");
                $TiempoActual = date('Y-m-d H:i:s');
              ?>
              
          <input type="hidden" name="creado_por" value="<?php echo($IdSesion);?>">
          <input type="hidden" name="estado_reporte" value="1">
          <input type="hidden" name="viajes" value="1">
          <input type="hidden" name="radicada" value="No">
          <input type="hidden" name="factura" value="0">
          <input type="hidden" name="pagado" value="No">
          <input type="hidden" name="fecha_radicada" value="0000-00-00">
          <input type="hidden" name="reporte_publicado" value="1">
          <input type="hidden" name="marca_temporal" value="<?php echo($TiempoActual);?>">

          <div class="card-body">
              <div class="row">
              
                 <div class="col-md-4">
                    <div class="form-group">
                      <label for="fila2_columna1">Documento <small>Tamaño máximo 10MB</small></label>
                        <div class="custom-file">
                           <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file=""  multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/>
                        </div>
                    </div>
                     </div>
                      <div style="display:none;" id="" class="col-md-4">
                        <div class="form-group">
                          <label> Tipo de Transporte: <span>*</span></label>
                <select class="form-control" id="foo" name="transporte">
                    <option value="No aplica" selected="">Seleccionar...</option>
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
                      <div id="campocampamento" style="display: none;" class="col-md-4">
                        <div class="form-group">
                          <label> Seleccione el Campamento: <span>*</span></label>
                          <select class="form-control" id="campamento_id_campamento" name="campamento_id_campamento" >
                            <option value="" selected>Seleccionar...</option>
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
                     
                      <div style="display:none;" class="col-md-4">
                        <div class="form-group">
                          <label>Seleccione el Origen: <span>*</span></label>
                          <select class="form-control mi-selector1" id="id_destino_origen" name="id_destino_origen">
                            <option value="0" selected>Seleccionar...</option>
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
                       <div  style="display:none;" class="col-md-4">
                        <div class="form-group">
                          <label>
                            <?php 
                          // Ocultamos los botones de parametrización
                            if ($RolSesion!=4) {
                             ?>
                            <a data-toggle="modal" data-target="#modal-form5" href="#"  class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i></a>
                            <?php 
                          }
                             ?>  

                            Seleccione el Destino: <span>*</span></label>
                          <select class="form-control mi-selector1" id="id_destino_destino" name="id_destino_destino">
                            <option value="0" selected>Seleccionar...</option>
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
                         <label>
                           <?php 
                          // Ocultamos los botones de parametrización
                          if ($RolSesion!=4) {
                             ?>
                             <a data-toggle="modal" data-target="#modal-form6" href="#"  class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i></a> 
                            <?php 
                          }
                             ?>  
                         

                          Seleccione el Cliente: <span>*</span></label>
                <select class="form-control mi-selector2" id="cliente_id_cliente" name="cliente_id_cliente" required>
                    <option value="" selected>Seleccionar...</option>
                    <?php
                    $rubros = Clientes::obtenerListaClientes();
                    foreach ($rubros as $campo){
                      $id_cliente = $campo['id_cliente'];
                      $nombre_cliente = $campo['nombre_cliente'];

                      $colocarselectedcliente  ="";
                      if ($id_cliente == $cliente_id_cliente){
                        $colocarselectedcliente = " selected = 'selected' ";
                      }
                    ?>
                    <option <?php echo $colocarselectedcliente; ?> value="<?php echo $id_cliente; ?>"><?php echo utf8_encode($nombre_cliente); ?></option>
                    <?php } ?>
                </select>

                        </div>
                      </div>
                      <div id="divplaca" class="col-md-4">
                        <div class="form-group">
                          <label>
                             <?php 
                          // Ocultamos los botones de parametrización
                          if ($RolSesion!=4) {
                             ?>
                              <a data-toggle="modal" data-target="#modal-form7" href="#"  class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i></a>
                            <?php 
                          }
                             ?>  
                           

                           Seleccione el Producto: <span>*</span></label>
                <select class="form-control mi-selector3" id="producto_id_producto" name="producto_id_producto" required>
                    <option value="" selected>Seleccionar...</option>
                    <?php
                    $rubros = Productos::obtenerListaProductos();
                    foreach ($rubros as $campo){
                      $id_producto = $campo['id_producto'];
                      $nombre_producto = $campo['nombre_producto'];

                      $colocarselectedproducto  ="";
                      if ($id_producto == $producto_id_producto){
                        $colocarselectedproducto = " selected = 'selected' ";
                      }

                    ?>
                    <option <?php echo $colocarselectedproducto; ?> value="<?php echo $id_producto; ?>"><?php echo utf8_encode($nombre_producto); ?></option>
                    <?php } ?>
                </select>
                        </div>
                      </div>
                      <div id="divplaca" class="col-md-4">
                        <div class="form-group">
            <label> 

               <?php 
                          // Ocultamos los botones de parametrización
                          if ($RolSesion!=4) {
                             ?>
                              <a target="_blank" href="?controller=equipos&&action=todos"  class="btn btn-success btn-sm"> <i class="fa fa-plus-square"></i> </a> 

                            <?php 
                          }
                             ?>  
             
              Seleccione el Equipo: <span>*</span></label><br>
                <select  class="form-control mi-selector4" id="equipo_id_equipo" name="equipo_id_equipo" required>
                    <option value="" selected>Seleccionar...</option>
                    <?php

                    $rubros = Equipos::obtenerListaEquiposconcreto();
                    foreach ($rubros as $campo){
                      $id_equipo = $campo['id_equipo'];
                      $nombre_equipo = $campo['nombre_equipo'];

                      $colocarselectedequipo  ="";
                      if ($id_equipo == $equipo_id_equipo){
                        $colocarselectedequipo = " selected = 'selected' ";
                      }

                    ?>
                    <option <?php echo $colocarselectedequipo; ?> value="<?php echo $id_equipo; ?>"><?php echo utf8_encode($nombre_equipo); ?></option>
                    <?php } ?>
                </select>
                        </div>
                      </div>
                      <div id="" class="col-md-4" style="margin-bottom: 10px">
                        <div class="form-group">
                          <label> Despachado por: <span>*</span></label>
                <select class="form-control mi-selector5" id="despachado_por" name="despachado_por" required>
                    <option value="" selected>Seleccionar...</option>
                    <?php
                    $rubros = Usuarios::ListaUsuariosOperadores();
                    foreach ($rubros as $campo){
                      $id_usuario = $campo['id_usuario'];
                      $nombre_usuario = $campo['nombre_usuario'];

                      $colocarselectedusuario  ="";
                      if ($id_usuario == $despachado_por){
                        $colocarselectedusuario = " selected = 'selected' ";
                      }

                    ?>
                    <option <?php echo $colocarselectedusuario; ?> value="<?php echo $id_usuario; ?>"><?php echo utf8_encode($nombre_usuario); ?></option>
                    <?php } ?>
                </select>
                        </div>
                      </div>

                      <div id="" class="col-md-4">
                        <div class="form-group">
                          <label> Proyecto: <span>*</span></label>
                          <select class="form-control mi-selector5" id="proyecto" name="proyecto" required>
                              <option value="" selected>Seleccionar...</option>
                              <?php
                              $proyectos = Proyectos::obtenerPagina();
                              $proyectos = $proyectos->getCampos();
                              foreach ($proyectos as $campo){
                                $id_proyecto = $campo['id_proyecto'];
                                $nombre_proyecto = $campo['nombre_proyecto'];

                                $colocarselectedproyecto  ="";
                                if ($id_proyecto == $proyecto_id_proyecto){
                                  $colocarselectedproyecto = " selected = 'selected' ";
                                }

                              ?>
                              <option <?php echo $colocarselectedproyecto; ?> value="<?php echo $id_proyecto; ?>"><?php echo utf8_encode($nombre_proyecto); ?></option>
                              <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div style="display:none;" class="col-md-4">
                        <div class="form-group">
                          <label>Contador Inicial<span>*</span></label>
                          <input type="number" step="any" name="contador1" placeholder="Contador Inicial" class="form-control" value="">
                          <small>Decimales separados con punto</small>
                        </div>
                      </div> 
                       <div style="display:none;" class="col-md-4">
                        <div class="form-group">
                          <label>Contador Final<span>*</span></label>
                          <input type="number" step="any" name="contador2" placeholder="Contador Final" class="form-control" value="">
                          <small>Decimales separados con punto</small>
                        </div>
                      </div> 
                       <div class="col-md-4" style="display: none;">
                        <div class="form-group">
                          <label>Total Puntos<span></span></label>
                          <input type="number" step="any" name="puntos" placeholder="Total Puntos" class="form-control"  value="">
                          <small>Decimales separados con punto</small>
                        </div>
                      </div> 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>m3<span>*</span></label>
                          <input type="number" step="any" name="cantidad" placeholder="Indique la cantidad" class="form-control" value="<?php echo $cantidad;?>">
                          <small>Decimales separados con punto</small>
                        </div>
                      </div>
                      <div style="display: none;" class="col-md-4">
                        <div class="form-group">
                          <label>Kilómetraje<span>*</span></label>
                          <input type="number" step="any" name="kilometraje" placeholder="Indique el Kilómetraje" class="form-control" value="0">
                          <small>Decimales separados con punto</small>
                        </div>
                      </div>
                     
                      <div style="display:none;" class="col-md-4">
                        <div class="form-group">
                          <label>Valor Flete<span>*</span></label>
                          <input type="text" name="valor_m3" placeholder="Valor Flete" class="form-control" id="demo1" value="0">
                        </div>
                      </div>
                       <div id="valormaterial" class="col-md-4">
                        <div class="form-group">
                          <label>Valor m3<span></span></label>
                          <input type="text" name="valor_material" placeholder="Valor m3" class="form-control" id="demo2" value="<?php echo $valor_material;?>">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Observaciones<span>*</span></label>
                  <textarea class="form-control" rows="2" id="descripcion" name="observaciones"><?php echo $observaciones;?></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label style="cursor: pointer;" onclick="agregartotalpuntos()">
                          Total Puntos
                          <i class="fa fa-plus-square"></i>
                        </label>
                      </div>
                      <input type="hidden" name="puntoscant" id="puntoscant" value="<?php echo $totalpuntos;?> ">
                      <?php echo $divpuntos;?> 

                      
                    </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-footer">
                    <input type="hidden" name="reporte_despachosconcreto_id" id="reporte_despachosconcreto_id" value="<?php echo $id;?> ">

                    <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Reportar Despacho</button>
                  </div>  
                </div>
                
              </div>
              </form>
</div>
</div>


</div> <!-- Fin Content-Wrapper -->

<script type="text/javascript">
  function agregartotalpuntos(){
    var puntosactual = document.getElementById("puntoscant");
    var puntossiguiente = parseFloat(puntosactual.value) + 1;
    if (puntossiguiente<20){
      puntosactual.value = puntossiguiente;
      var div = document.getElementById("div_puntos"+puntossiguiente);
      div.style.display = "";
      
    }

  }

</script>
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

					  </div>



					</div> <!-- FIN DE ROW-->
				</div><!-- FIN DE CONTAINER FORMULARIO-->
			</div> <!-- Fin Row -->
		</div> <!-- Fin Container -->
	</div> <!-- Fin Content -->

<!-- Inicio Modal Clientes -->
    <div id="modal-form5" class="modal" tabindex="-1">
               <!-- Inicio Modal -->
    <div>
<form action="?controller=destinos&&action=destinoextra&&tiporeporte=3" method="post" autocomplete="off">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a href="#" type="button" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="black bigger">Crear Nuevo Destino:</h4>
                      </div>

                      <div class="col-md-12 col-xs-12">
                          <label>Nombre Destino<span>*</span></label>
                          <input type="hidden" name="estado_destino" value="1">
                           <input type="text" name="nombre_destino" placeholder="Nombre del Destino" class="form-control" value="" >
                          <br>
                      <br>
                      </div>
                      <div class="modal-footer">
                        <a href="Clientes-Abonos.php?AbonosFactura=<?php Echo($AbonosFactura) ?>" class="btn btn-sm btn-danger" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Cancelar
                        </a>

                        <button class="btn btn-sm btn-success">
                          <i class="ace-icon fa fa-check"></i>
                          Confirmar
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
                </div><!-- PAGE CONTENT ENDS -->
 </div>
 <!-- FINAL MODAL -->
<!-- Inicio Modal Clientes -->
    <div id="modal-form6" class="modal" tabindex="-1">
               <!-- Inicio Modal -->
    <div>
    
<form action="?controller=reportes&&action=clienteextra&&tiporeporte=5" method="post" autocomplete="off">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a href="#" type="button" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="black bigger">Crear Nuevo Cliente:</h4>
                      </div>

                      <div class="col-md-12 col-xs-12">
                      	  <label>Nombre Cliente<span>*</span></label>
                      	  <input type="hidden" name="estado_cliente" value="1">
                           <input type="text" name="nombre_cliente" placeholder="Nombre del Cliente" class="form-control" value="" >
                          <br>
                      <br>
                      </div>
                         

                      <div class="modal-footer">
                        <a href="Clientes-Abonos.php?AbonosFactura=<?php Echo($AbonosFactura) ?>" class="btn btn-sm btn-danger" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Cancelar
                        </a>

                        <button class="btn btn-sm btn-success">
                          <i class="ace-icon fa fa-check"></i>
                          Confirmar
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
                </div><!-- PAGE CONTENT ENDS -->
 </div>
 <!-- FINAL MODAL -->

 <!-- Inicio Modal Productos-->
    <div id="modal-form7" class="modal" tabindex="-1">
               <!-- Inicio Modal -->
    <div>
    
<form action="?controller=reportes&&action=productoextra&&tiporeporte=3" method="post" id="FormArpetura" autocomplete="off">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a href="CrearVenta.php" type="button" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="black bigger">Crear Nuevo Producto:</h4>
                      </div>

                      <div class="col-md-12 col-xs-12">
                      	  <label>Nombre Producto<span>*</span></label>
                      	  <input type="hidden" name="estado_producto" value="1">
                          <input type="hidden" name="insumos_producto" value="0">
                           <input type="text" name="nombre_producto" placeholder="Nombre del Producto" class="form-control" value="" >
                          <br>
                      <br>
                      </div>
                         

                      <div class="modal-footer">
                        <a href="Clientes-Abonos.php?AbonosFactura=<?php Echo($AbonosFactura) ?>" class="btn btn-sm btn-danger" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Cancelar
                        </a>

                        <button class="btn btn-sm btn-success">
                          <i class="ace-icon fa fa-check"></i>
                          Confirmar
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
                </div><!-- PAGE CONTENT ENDS -->
 </div>
 <!-- FINAL MODAL -->
 


</div> <!-- Fin Content-Wrapper -->
<script type="text/javascript">
 $('#foo').change(function() {
    var el = $(this);
    if(el.val() === "Flete") {
      alert("Has seleccionado transporte con Flete");
       
          $('#campocampamento').hide();   
          $('#valormaterial').hide();   
    } else {
      alert("Has seleccionado transporte con Flete y Material");
        
          $('#campocampamento').show();
           $('#valormaterial').show();  
    }      
});
</script>
<script>
function eliminar(id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=reportes&&action=eliminardespachoclientes&&id="+id;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>
<!-- Inicio Libreria formato moneda -->



