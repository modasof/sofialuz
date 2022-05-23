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

include_once 'modelos/retefuente.php';
include_once 'controladores/retefuenteController.php';

include_once 'modelos/cuentas.php';
include_once 'controladores/cuentasController.php';

include_once 'modelos/egresoscuenta.php';
include_once 'controladores/egresoscuentaController.php';
include_once 'modelos/compras.php';
include_once 'controladores/comprasController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];
$Proveedor = $_GET['id'];

$res    = Proveedores::obtenerPaginaPor($Proveedor);
$campos = $res->getcampos();
foreach ($campos as $campo) {

    $nit             = $campo['nit'];
    $telefonos       = $campo['telefonos'];
    $correo          = $campo['correo'];
    $nombreproveedor = Proveedores::obtenerNombreProveedor($Proveedor);
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="page-header">
<i class="fa fa-plus-square"></i> Relación Facturas.
<small class="pull-right"></small>
</h2>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=compras&&action=todospormes">Ordenes de compra</a></li>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="col-sm-4 invoice-col">
<address>
<strong>Proveedor:</strong>
<?php echo ($nombreproveedor); ?><br>
<strong>Nit:</strong><?php echo ($nit); ?><br>
<strong>Celular:</strong> <?php echo ($telefonos); ?><br>
<strong>Email:</strong> <?php echo ($correo); ?>
</address>
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
    <table class="table  table-responsive  table-bordered table-hover" style="font-size: 12px;">
                <tbody><tr>
                <th style="width: 10%;">OC</th>
                <th style="width: 8%;">Rq</th>
                <th style="width: 8%;">F. Solicitud</th>
                <th style="width: 30%;">Detalle </th>
                <th style="width: 10%;">Cant</th>
                <th style="width: 5%;">-</th>
                <th style="width: 10%;">Vr. Unitario</th>
                <th style="width: 10%;">Subtotal</th>
                <th style="width: 10%;">IVA</th>
                <th style="width: 10%;">Vr. Iva</th>

                </tr>
<?php
$itemsget = $_GET['des'];
$items    = explode(",", $itemsget);
foreach ($items as $key => $despachounico) {

    $res    = compras::editarpor($despachounico);
    $campos = $res->getCampos();
    foreach ($campos as $campo) {
        $imagenfactura = $campo['imagen'];
        $estado_orden  = $campo['estado_orden'];
        $factura_num   = $campo['factura'];
        $rubro_id      = $campo['rubro_id'];
        $subrubro_id   = $campo['subrubro_id'];
        $compra_de     = $campo['compra_de'];
        $observaciones = $campo['observaciones'];
         $id_factura_compra= $campo['id_factura_compra'];

        if ($id_factura_compra!="0") {
             echo "<script>jQuery(function(){Swal.fire(\"¡Orden de compra!\", \"Ya tiene una factura asociada\", \"warning\").then(function(){window.location='?controller=compras&&action=detallefacturacompra&&factura=" . $id_factura_compra . "';});});</script>";
        }
    }

// Consulta de los item de las ordenes de compras //
    $res    = Compras::detalleocfacturacion($despachounico);
    $campos = $res->getcampos();

    foreach ($campos as $campo) {
        $id_cotizacion          = $campo['id'];
        $proveedor_id_proveedor = $campo['proveedor_id_proveedor'];
        $vr_unitario            = $campo['vr_unitario'];
        $insumo_id_insumo       = $campo['insumo_id_insumo'];
        $servicio_id_servicio   = $campo['servicio_id_servicio'];
        $ordencompra_num        = $campo['ordencompra_num'];
        $requisicion_id         = $campo['requisicion_id'];
        $cantidadcot            = $campo['cantidadcot'];
        $fecha_reporte_compra   = $campo['fecha_reporte'];
        $item_id                = $campo['item_id'];
        $iva                    = $campo['iva'];
        $valor_iva              = $campo['valor_iva'];
        

        if ($iva == 0) {
            $mascarcaiva = "No aplica";
        } else {
            $mascarcaiva = $iva;
        }

        $Lista    = $Lista . $campo['id'] . ",";
        $subtotal = $cantidadcot * $vr_unitario;
        $sumasubtotal += $subtotal;
        $sumaiva += $valor_iva;

        if ($insumo_id_insumo != '0') {
            $detalle      = Insumos::obtenerNombreInsumo($insumo_id_insumo);
            $unidad       = Insumos::obtenerUnidadmed($insumo_id_insumo);
            $nombremedida = Unidadesmed::obtenerNombre($unidad);
        } elseif ($servicio_id_servicio != '0') {
            $detalle = Servicios::obtenerNombre($servicio_id_servicio);
        } else {
            $detalle = "Verificar dato";
        }

        ?>
        <tr>
            <td>
        <a href="?controller=compras&&action=descartar&&id=<?php echo ($id_cotizacion); ?>&&des=<?php echo ($itemsget); ?>"  class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Descartar">
                <i class="fa fa-close bigger-110 "></i>
        </a>
             OC00<?php echo ($despachounico); ?>
             <br>
             <?php
if ($nomestado == "Facturado") {
            echo ("<small class='text-success'><strong>" . $nomestado . "</strong></small>");
        } elseif ($nomestado == "Sin Facturar") {
            echo ("<small class='text-danger'><strong>" . $nomestado . "</strong></small>");
        }

        ?>

         </td>
            <td> RQ<?php echo ($requisicion_id . "-" . $item_id); ?> </td>
            <td> <?php echo ($fecha_reporte_compra); ?> </td>
            <td> <?php echo ($detalle); ?> </td>
            <td>
                <input id="cantidades<?php echo ($item_id); ?>" class="col-sm-12 activeform-control input-sm" type="text" value="<?php echo ($cantidadcot); ?>">
            </td>
            <td> <?php echo ($nombremedida); ?> </td>
            <td>



        <input type="hidden" id="idcotizacion<?php echo ($item_id); ?>" value="<?php echo ($id_cotizacion); ?>">
        <input type="hidden" id="cantidad<?php echo ($item_id); ?>" value="<?php echo ($cantidadcot); ?>">




    <input id="valorunit<?php echo ($item_id); ?>" class=" activeform-control input-sm" type="text" value="<?php echo ($vr_unitario); ?>">

            </td>
             <td id="subtotal<?php echo ($item_id); ?>">
                <input disabled="" type="text" value="$<?php echo (number_format($subtotal, 0)); ?>">
            </td>
             <td>
                <select name="" id="iva<?php echo ($item_id); ?>" class="input-sm">
                    <option selected="" value="<?php echo ($mascarcaiva); ?>"><?php echo ($iva); ?>%</option>
                    <option value="No aplica">0%</option>
                     <option value="5">5%</option>
                     <option value="19">19%</option>
                </select>
    <small style="display: none;" id="msjcalculariva<?php echo ($item_id); ?>" class="text-danger"><strong>Recalcular Iva</strong></small>
              </td>
             <td id="valoriva<?php echo ($item_id); ?>">
                <input disabled="" type="text" value="$<?php echo (number_format($valor_iva, 0)); ?>">
            </td>


<script type="text/javascript">
$(document).ready(function(){
    $('#valorunit<?php echo ($item_id); ?>').on('change',function(){

        var valorunitario = $(this).val();
        var IdItem= $('#idcotizacion<?php echo ($item_id); ?>').val();
        var cantidadajax= $('#cantidad<?php echo ($item_id); ?>').val();
        //alert (IdItem);
        //alert (valorunitario);

         $('#msjcalculariva<?php echo ($item_id); ?>').show();

          if(valorunitario){
            $.ajax({
                type:'POST',
                url:'vistas/compras/ajaxvalorunitario.php',
                data:'field_valor_unitario='+valorunitario+'&&field_item_id='+IdItem+'&&field_cantidad='+cantidadajax,
                success:function(html){
                    $('#subtotal<?php echo ($item_id); ?>').html(html);
                }
            });
        }else{
        $('#subtotal<?php echo ($item_id); ?>').html('<span>Hola mundo</span>');
        }
    });
});
</script>



<script type="text/javascript">
$(document).ready(function(){
    $('#cantidades<?php echo ($item_id); ?>').on('change',function(){

        var valorcantidad = $(this).val();
        var IdItem= $('#idcotizacion<?php echo ($item_id); ?>').val();
        var valorunitarioactual= $('#valorunit<?php echo ($item_id); ?>').val();

         $('#msjcalculariva<?php echo ($item_id); ?>').show();

          if(valorcantidad){
            $.ajax({
                type:'POST',
                url:'vistas/compras/ajaxcantidades.php',
                data:'field_valor_unitario='+valorunitarioactual+'&&field_item_id='+IdItem+'&&field_cantidad='+valorcantidad,
                success:function(html){
                    $('#subtotal<?php echo ($item_id); ?>').html(html);
                }
            });
        }else{
        $('#subtotal<?php echo ($item_id); ?>').html('<span>Hola mundo</span>');

        }

    });
});
</script>



<script type="text/javascript">
$(document).ready(function(){
    $('#iva<?php echo ($item_id); ?>').on('change',function(){

        var valoriva = $(this).val();
        var IdItem= $('#idcotizacion<?php echo ($item_id); ?>').val();

        //alert (valoriva);
        //alert (IdItem);

         $('#msjcalculariva<?php echo ($item_id); ?>').hide();

         if(valoriva){
            $.ajax({
                type:'POST',
                url:'vistas/compras/ajaxvaloriva.php',
                data:'field_valor_iva='+valoriva+'&&field_item_id='+IdItem,
                success:function(html){
                    $('#valoriva<?php echo ($item_id); ?>').html(html);
                }
            });
        }else{
        $('#valoriva<?php echo ($item_id); ?>').html('<h1>Hola mundo</h1>');

        }


    });
});
</script>


<script type="text/javascript">
$(document).ready(function(){
    $('#valorunit<?php echo ($item_id); ?>').on('change',function(){

        var totalid= $('#listadata').val();
        //alert (totalid);

        if(totalid){
            $.ajax({
                type:'POST',
                url:'vistas/compras/ajaxvalorsubtotal.php',
                data:'field_lista='+totalid,
                success:function(html){

                    $('#subtotalfinal').html(html);
                }
            });
        }else{
        $('#subtotal<?php echo ($item_id); ?>').html('<span>Hola mundo</span>');

        }


    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#cantidades<?php echo ($item_id); ?>').on('change',function(){

        var listaid= $('#listadata').val();
        //alert (totalid);

        if(listaid){
            $.ajax({
                type:'POST',
                url:'vistas/compras/ajaxvalorsubtotal.php',
                data:'field_listacantidades='+listaid,
                success:function(html){

                    $('#subtotalfinal').html(html);
                }
            });
        }else{
        $('#subtotal<?php echo ($item_id); ?>').html('<span>Hola mundo</span>');

        }


    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#iva<?php echo ($item_id); ?>').on('change',function(){

        var totalid= $('#listadata').val();
        //alert (totalid);

        if(totalid){
            $.ajax({
                type:'POST',
                url:'vistas/compras/ajaxvalorivafinal.php',
                data:'field_lista='+totalid,
                success:function(html){
                    $('#valorivafinal').html(html);
                }
            });
        }else{
        $('#subtotal<?php echo ($item_id); ?>').html('<span>Hola mundo</span>');

        }


    });
});
</script>



<script src="dist/js/jquery.maskMoney.js" type="text/javascript"></script>
    <script type="text/javascript">
$("#valorunit<?php echo ($item_id); ?>").maskMoney({
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

}
?>

<?php
$cadenalista = trim($Lista, ',');
?>


<input type="hidden" name="" id="listadata" value="<?php echo ($Lista) ?>">


              </tbody></table>










            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
</div>





<div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
    <table class="table  table-responsive  table-bordered table-hover" style="font-size: 12px;">
                <tbody>
<?php
$itemsget = $_GET['des'];
$items    = explode(",", $itemsget);
foreach ($items as $key => $despachounico) {

    $res    = Compras::detalleocfacturaciondescartada($despachounico);
    $campos = $res->getcampos();

    foreach ($campos as $campo) {
        $id_cotizacion          = $campo['id'];
        $proveedor_id_proveedor = $campo['proveedor_id_proveedor'];
        $vr_unitario            = $campo['vr_unitario'];
        $insumo_id_insumo       = $campo['insumo_id_insumo'];
        $servicio_id_servicio   = $campo['servicio_id_servicio'];
        $ordencompra_num        = $campo['ordencompra_num'];
        $requisicion_id         = $campo['requisicion_id'];
        $cantidadcot            = $campo['cantidadcot'];
        $fecha_reporte          = $campo['fecha_reporte'];
        $item_id                = $campo['item_id'];
        $iva                    = $campo['iva'];
        $valor_iva              = $campo['valor_iva'];


        if ($iva == 0) {
            $mascarcaiva = "No aplica";
        } else {
            $mascarcaiva = $iva;
        }

        $Lista = $Lista . $campo['id'] . ",";

        $subtotal = $cantidadcot * $vr_unitario;
        //$sumasubtotal += $subtotal;

        //$sumaiva += $valor_iva;

        if ($insumo_id_insumo != '0') {
            $detalle      = Insumos::obtenerNombreInsumo($insumo_id_insumo);
            $unidad       = Insumos::obtenerUnidadmed($insumo_id_insumo);
            $nombremedida = Unidadesmed::obtenerNombre($unidad);
        } elseif ($servicio_id_servicio != '0') {
            $detalle = Servicios::obtenerNombre($servicio_id_servicio);
        } else {
            $detalle = "Verificar dato";
        }

        ?>
        <tr class="danger">
            <td>
        <a href="?controller=compras&&action=descartarinversa&&id=<?php echo ($id_cotizacion); ?>&&des=<?php echo ($itemsget); ?>"  class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Regresar">
                <i class="fa fa-check bigger-110 "></i>
        </a>
             OC00<?php echo ($despachounico); ?> </td>
            <td> RQ<?php echo ($requisicion_id . "-" . $item_id); ?> </td>
            <td> <?php echo ($fecha_reporte); ?> </td>
            <td> <?php echo ($detalle); ?> </td>
            <td> <?php echo ($cantidadcot); ?> </td>
            <td> <?php echo ($nombremedida); ?> </td>
            <td><?php echo ($vr_unitario); ?></td>
             <td id="subtotal<?php echo ($item_id); ?>">
                <input disabled="" type="text" value="$<?php echo (number_format($subtotal, 0)); ?>">
            </td>
             <td>
                <select disabled name="" id="iva<?php echo ($item_id); ?>" class="input-sm">
                    <option selected="" value="<?php echo ($mascarcaiva); ?>"><?php echo ($iva); ?>%</option>
                    <option value="No aplica">0%</option>
                     <option value="5">5%</option>
                     <option value="19">19%</option>
                </select>
              </td>
             <td id="valoriva<?php echo ($item_id); ?>">
                <input disabled="" type="text" value="$<?php echo (number_format($valor_iva, 0)); ?>">
            </td>




         </tr>


            <?php
}

}

?>


              </tbody></table>










            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
</div>
<form id="formulario1" role="form" action="?controller=compras&&action=guardarfacturacompras&&des=<?php echo ($itemsget); ?>&&id=<?php echo ($Proveedor); ?>" method="POST" enctype="multipart/form-data">
    <?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
$Diareporte   = date('Y-m-d');
?>
            <input type="hidden" name="proveedor_id_proveedor" value="<?php echo ($Proveedor); ?>">
            <input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual); ?>">
            <input type="hidden" name="creado_por" value="<?php echo ($IdSesion); ?>">
            <input type="hidden" name="factura_de" value="insumos-servicios">
            <input type="hidden" name="estado_factura" value="1">
            <input type="hidden" name="factura_publicada" value="1">
            <input type="hidden" name="rubro_id" value="<?php echo ($rubro_id); ?>">
            <input type="hidden" name="subrubro_id" value="<?php echo ($subrubro_id); ?>">
            <input type="hidden" name="listacotizaciones" value="<?php echo ($cadenalista); ?>">
            <input type="hidden" name="listaordenescompra" value="<?php echo ($itemsget); ?>">


<div class="col-xs-4">

      <div class="form-group">
                    <label for="fila2_columna1">Soporte <small>Tamaño máximo 4MB</small>
                        <a target="_blank" href="<?php echo $imagenfactura; ?>">Ver Soporte</a>
                    </label>
                                                <div class="custom-file">
                                         <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagenfactura; ?>" multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="5M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ >
                                                     <input type="hidden" name="ruta1" value="<?php echo $imagenfactura; ?>" >
                                                </div>

         <label for="nombres">Observaciones Adicionales (Máx 500 Carácteres)</label>
                        <textarea class="form-control" rows="2" name="observaciones" id="descripcion" placeholder="Observaciones Adicionales" maxlength="500"></textarea>
        </div>

</div>

 <?php
$valorapagar = $sumasubtotal + $sumaiva;
?>


<div class="col-xs-8">
<div class="table-responsive">
<table class="table">
<tbody>

<tr>
<th>Fecha Factura:</th>
<td>
     <input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte" value="<?php echo($fecha_reporte_compra); ?>">
</td>
</tr>

<tr>
<th style="width:80%">Factura Nº:</th>
<td><input name="facturanum" type="text" class="input-sm" value="<?php echo ($factura_num); ?>" placeholder="Número Factura"></td>
</tr>


<tr>
<th>Subtotal</th>
<td id="subtotalfinal">
    <input disabled type="text"  class="clasesubtotal input-sm" value="<?php echo (number_format($sumasubtotal, 0)); ?>" name="valor_subtotal">
    <input  type="hidden" id='camposubtotal' class="clasesubtotal input-sm" value="<?php echo ($sumasubtotal); ?>" name="valor_subtotal_txt">
</td>
</tr>
<tr>
<th>
     <li style="list-style: none;" class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
Iva <span class="caret"></span>
</a>
<ul class="dropdown-menu">

            <li role='presentation'><a role='menuitem' tabindex='-1' href='?controller=compras&action=ivamultiple&&listaid=<?php echo ($cadenalista); ?>&&des=<?php echo ($itemsget); ?>&&ivasel=NA&&id=<?php echo ($Proveedor); ?>'>No Aplica</a></li>
            <li role='presentation'><a role='menuitem' tabindex='-1' href='?controller=compras&action=ivamultiple&&listaid=<?php echo ($cadenalista); ?>&&des=<?php echo ($itemsget); ?>&&ivasel=5&&id=<?php echo ($Proveedor); ?>'>5%</a></li>

            <li role='presentation'><a role='menuitem' tabindex='-1' href='?controller=compras&action=ivamultiple&&listaid=<?php echo ($cadenalista); ?>&&des=<?php echo ($itemsget); ?>&&ivasel=19&&id=<?php echo ($Proveedor); ?>'>19%</a></li>

</ul>
</li>
</th>
<td id="valorivafinal">

    <input disabled type="text" class="claseiva input-sm" value="$<?php echo (number_format($sumaiva, 0)); ?>" name="valor_iva">
    <input type="hidden" id='campoiva' class="claseiva input-sm" value="<?php echo round($sumaiva,0); ?>" name="valor_iva_txt">
</td>
</tr>
<tr>
<th>
     <i id="btnretencion" class="fa fa-plus-square text-success"></i>
     RET1
     <input type="text" class="input-sm" placeholder="Base" id="rf1" name="base_uno">
<select name="porcentaje_ret" id="textretencion">
    <option value="0-0">0% No Aplica</option>

<?php
$resultado = Retefuente::obtenerListado();
$camposres = $resultado->getcampos();
foreach ($camposres as $campotraido) {
    $id               = $campotraido['id'];
    $valor_retefuente = $campotraido['valor_retefuente'];
    $alias_retefuente = $campotraido['alias_retefuente'];
    $valorporcentual  = $valor_retefuente * 100;
    $select           = $alias_retefuente . "[" . $valorporcentual . "%]";
    $selectvalue      = $id . "-" . $valor_retefuente;
    echo ("<option value=" . $selectvalue . ">" . $select . "</option>");
}
?>
</select>

</th>
<td>

    <input class="input-sm" type="text" id="demo1" value="0" name="valor_ret">
</td>
</tr>



<script type="text/javascript">
$( "#btnretencion" ).click(function() {
  Swal.fire({
  title: 'Desea agregar un valor adicional de retención?',
  text: "Recuerde que esta acción no se puede deshacer!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, deseo agregarlo!',
  cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
     //var IdItem= $('#idcotizacion<?php echo ($item_id); ?>').val();
      $('#divretencionadicional').show();

  }
})

});
</script>






<tr style="display: none;" id="divretencionadicional" >
<th>
 RET2
     <input type="text" class="input-sm" placeholder="Base" id="rf2" name="base_dos">

<select name="porcentaje_ret2" id="textretencion2">
    <option value="0-0">0% No Aplica</option>
    <?php
$resultado = Retefuente::obtenerListado();
$camposres = $resultado->getcampos();
foreach ($camposres as $campotraido) {
    $id               = $campotraido['id'];
    $valor_retefuente = $campotraido['valor_retefuente'];
    $alias_retefuente = $campotraido['alias_retefuente'];
    $valorporcentual  = $valor_retefuente * 100;
    $selectvalue      = $id . "-" . $valor_retefuente;
    $select           = $alias_retefuente . "[" . $valorporcentual . "%]";
    echo ("<option value=" . $selectvalue . ">" . $select . "</option>");
}
?>
</select>

</th>
<td>
    <input class="input-sm" type="text" id="demo3" value="0" name="valor_ret2">
</td>
</tr>

<script type="text/javascript">
    $(document).ready(function(){
        $('#textretencion2').on('change',function(){

        const escalparvalor =$('#rf2').val().replace(/\./g,'');
        const pagosubtotal =escalparvalor.replace('$ ','');

 if (pagosubtotal==0) {
            Swal.fire('Base de retención 2 está en cero ($0)');
        }else{

        var retencionaplicada = $('#textretencion2').val();

         var arreglo = retencionaplicada.split("-");

        var valoruno= (arreglo[0]);
        var valordos= (arreglo[1]);


        var calculoretencion = pagosubtotal*valordos;
        var formatonumero =Math.trunc(calculoretencion);
        //alert (formatonumero);
        $('#demo3').val(formatonumero);
        document.getElementById("#demo2").focus();
        }
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#textretencion').on('change',function(){

        const escalparvalor =$('#rf1').val().replace(/\./g,'');
        const pagosubtotal =escalparvalor.replace('$ ','');

        if (pagosubtotal==0) {
            Swal.fire('Base de retención 1 está en cero ($0)');
        }else{

        var retencionaplicada = $('#textretencion').val();

        var arreglo = retencionaplicada.split("-");

        var valoruno= (arreglo[0]);
        var valordos= (arreglo[1]);


        var calculoretencion = pagosubtotal*valordos;
        var formatonumero =Math.trunc(calculoretencion);
        //alert (formatonumero);
        $('#demo1').val(formatonumero);
        document.getElementById("#demo2").focus();
        }
        });

    });
</script>




<tr>
<th>Descuentos</th>
<td>
    <input class="input-sm" type="text" id="demo2" value="0" name="valor_descuentos">
</td>
</tr>

<tr>
<th class="text-success" id="calculopago">Calcular valor a pagar</th>

   <script type="text/javascript">

 $(document).ready(function(){

    $( "#calculopago" ).click(function() {

        var subtotal =$('#camposubtotal').val().replace(/\,/g,'');


        //alert('Valor a pagar: '+subtotal);
        var iva = $('#campoiva').val();
        var iva1 = iva.replaceAll(",", "");
        var iva2 = iva1.replaceAll(" ", "");
        var iva3 = iva1.replaceAll("$", "");

        //alert('Valor del Iva'+iva3);

        var retenciones = $('#demo1').val();
        var r1 = retenciones.replaceAll(".", "");
        var r2 = r1.replaceAll(" ", "");
        var r3 = r1.replaceAll("$", "");

        //alert('Valor RT1'+r3);

        var retencionadicional = $('#demo3').val();
        var ra1 = retencionadicional.replaceAll(".", "");
        var ra2 = ra1.replaceAll(" ", "");
        var ra3 = ra1.replaceAll("$", "");

        //alert('Valor RT2'+ra3);

        var valordescuento = $('#demo2').val();
        var v1 = valordescuento.replaceAll(".", "");
        var v2 = v1.replaceAll(" ", "");
        var v3 = v1.replaceAll("$", "");

         //alert('Valor Descuento'+v3);

         var calculototal=parseInt(subtotal)+parseInt(iva3)-parseInt(r3)-parseInt(ra3)-parseInt(v3);

          //alert('Suma de dos valores: '+calculototal);
          
       //
        var formatonumero = parseInt(calculototal).toLocaleString('es-ES');
       $('#totalpago').text('$'+formatonumero);


});


 });
</script>

<td>


   <span id="totalpago"><strong></strong></span>


</td>
</tr>
</tbody></table>
</div>
<input class="btn btn-success" id="button" type="button" value="Enviar formulario"/>
</div>

</form>

                        </div>
                      </div>

                    </div> <!-- FIN DE ROW-->
                </div><!-- FIN DE CONTAINER FORMULARIO-->
            </div> <!-- Fin Row -->
        </div> <!-- Fin Container -->
    </div> <!-- Fin Content -->



</div> <!-- Fin Content-Wrapper -->

<script type="text/javascript">
$( "#button" ).click(function() {
  Swal.fire({
  title: 'Verificó todos los datos de la factura ?',
  text: "Recuerde que esta acción no se puede deshacer!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#00a65a',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, deseo guardarlo!',
  cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {

     Swal.fire(
      'Enviado!',
      'Datos enviados correctamente',
      'success'
    );

    $('#formulario1').submit();

  }
})

});
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

  <script type="text/javascript">
$("#rf1").maskMoney({
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
$("#rf2").maskMoney({
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
