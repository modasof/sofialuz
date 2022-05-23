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
include_once 'modelos/retefuente.php';
include_once 'controladores/retefuenteController.php';

include_once 'modelos/egresoscuenta.php';
include_once 'controladores/egresoscuentaController.php';
include_once 'modelos/compras.php';
include_once 'controladores/comprasController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

$Selfactura = $_GET['factura'];

$des = Compras::ordenesasociadasafactura($Selfactura);
    $cadenalista = trim($des, ',');

$res    = Compras::detallefacturacompra($Selfactura);
$campos = $res->getcampos();

foreach ($campos as $campo) {
    $id                        = $campo['id'];
    $imagen                    = $campo['imagen'];
    $facturanum                = $campo['facturanum'];
    $proveedor_id_proveedor    = $campo['proveedor_id_proveedor'];
    $fecha_reporte             = $campo['fecha_reporte'];
    $valor_subtotal            = $campo['valor_subtotal'];
    $base_uno                  = $campo['base_uno'];
    $base_dos                  = $campo['base_dos'];
    $retefuente_id_retefuente1 = $campo['retefuente_id_retefuente1'];
    $retefuente_id_retefuente2 = $campo['retefuente_id_retefuente2'];
    $porcentaje_ret            = $campo['porcentaje_ret'];

    $valor_ret       = $campo['valor_ret'];
    $porcentaje_ret2 = $campo['porcentaje_ret2'];

    $valor_ret2       = $campo['valor_ret2'];
    $valor_iva        = $campo['valor_iva'];
    $valor_descuentos = $campo['valor_descuentos'];
    $observaciones    = $campo['observaciones'];
    $rubro_id         = $campo['rubro_id'];
    $subrubro_id      = $campo['subrubro_id'];
    $marca_temporal   = $campo['marca_temporal'];
    $creado_por       = $campo['creado_por'];
    $nomusuario       = Usuarios::obtenerNombreUsuario($creado_por);

    if ($retefuente_id_retefuente1 == 0) {
        $nomretf1            = "No aplica";
        $retencionporcentaje = 0;
    } else {
        $nomretf1            = Retefuente::obtenerNombre($retefuente_id_retefuente1);
        $retencionporcentaje = $porcentaje_ret * 100;
    }

    if ($retefuente_id_retefuente2 == 0) {
        $nomretf2             = "No aplica";
        $retencionporcentaje2 = 0;
    } else {
        $nomretf1             = Retefuente::obtenerNombre($retefuente_id_retefuente1);
        $retencionporcentaje2 = $porcentaje_ret2 * 100;
    }

    $nomretefuentedos = Retefuente::obtenerNombre($retefuente_id_retefuente2);

    $totalpago = ($valor_subtotal + $valor_iva) - $valor_ret - $valor_ret2 - $valor_descuentos;

}

$res    = Proveedores::obtenerPaginaPor($proveedor_id_proveedor);
$campos = $res->getcampos();
foreach ($campos as $campo) {

    $nit             = $campo['nit'];
    $telefonos       = $campo['telefonos'];
    $correo          = $campo['correo'];
    $nombreproveedor = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);

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
          <h2 class="page-header">
<i class="fa fa-plus-square"></i> Factura Nº <?php echo ($facturanum); ?>
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

<div class="col-xs-6">

      <embed src="<?php echo ($imagen); ?>#zoom=60" type="application/pdf" width="100%" height="600px" />

</div>

<div class="col-xs-6">
    <address>
<strong>Proveedor:</strong>
<?php echo ($nombreproveedor); ?><br>
<strong>Nit:</strong><?php echo ($nit); ?><br>
<strong>Celular:</strong> <?php echo ($telefonos); ?><br>
<strong>Email:</strong> <?php echo ($correo); ?><br>
<small class="text-danger">Reportado el <?php echo ($marca_temporal); ?> por el usuario <?php echo ($nomusuario); ?></small>
<br>
<a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Descargar Soporte</i>
</a>

</address>
<div class="table-responsive">
<table class="table">
<tbody><tr>
<th style="width:70%">Factura Nº:</th>
<td><input disabled name="facturanum" type="text" class="input-sm" value="<?php echo ($facturanum); ?>" placeholder="Número Factura"></td>
</tr>
<tr>
<th>Subtotal</th>
<td id="subtotalfinal">
    <input disabled type="text" class="clasesubtotal input-sm" value="<?php echo (number_format($valor_subtotal, 0)); ?>" name="valor_subtotal">
</td>
</tr>
<tr>
<th>
     IVA
</th>
<td id="valorivafinal">

    <input disabled type="text" class="claseiva input-sm" value="$<?php echo (number_format($valor_iva, 0)); ?>" name="valor_ret">

</td>
</tr>
<tr>
<th>
<?php echo ($nomretf1 . "[" . round($retencionporcentaje, 2)) ?>%]
<br>
Base <?php echo ("$" . number_format($base_uno, 0)); ?>
</th>
<td>

<input disabled class="input-sm" type="text" id="demo1" value="<?php echo (number_format($valor_ret, 0)); ?>" name="valor_ret">
</td>
</tr>



<tr>
<th>
<?php echo ($nomretf2 . "[" . round($retencionporcentaje2, 2)) ?>%]
<br>
Base <?php echo ("$" . number_format($base_dos, 0)); ?>
</th>
<td>
    <input disabled class="input-sm" type="text" id="demo3" value="<?php echo (number_format($valor_ret2, 0)); ?>" name="valor_ret2">
</td>
</tr>

<tr>
<th>Descuentos</th>
<td>
    <input disabled class="input-sm" type="text" id="demo2" value="<?php echo (number_format($valor_descuentos, 0)); ?>" name="valor_descuentos">
</td>
</tr>

<tr>
<th>Total a pagar:</th>
<td>


   <span id="totalpago"><strong>$<?php echo (number_format($totalpago, 0)); ?></strong></span>


</td>
</tr>


<?php
$abonosanteriores = Compras::sqlabonosfactura($Selfactura);
$pendiente        = $totalpago - $abonosanteriores;

// Ocultamos las filas de pagos realizados si el saldo es igual a cero 

?>

<tr>
<th class="text-success">Pagos Realizados:
    <a data-toggle="modal" data-target="#modal-form-1" href="#"  class=""><i class="fa fa-calendar text-success"></i></a>
</th>

<td class="text-success">
   <span id="totalpago"><strong>$<?php echo (number_format($abonosanteriores, 0)); ?></strong></span>
</td>
</tr>

<tr>
<th>Saldo Pendiente:</th>
<td>
   <span id="totalpago"><strong>$<?php echo (number_format($pendiente, 0)); ?></strong></span>
</td>
</tr>

</tbody></table>
</div>

<?php 
if ($pendiente==0) {
    echo("<span class='bg bg-success'><strong>Factura Paga 100% </strong></span>");
}else{
    ?>
     <a href='?controller=compras&&action=pagofacturacompra&&factura=<?php echo($Selfactura); ?>' class="btn btn-success" id="button" type="button" >Abonar/Pagar</a>

    <?php
}

 ?>
      

      

<a href='?controller=compras&&action=todosporproveedorespera&&idproveedor=<?php echo ($proveedor_id_proveedor); ?>' class="btn btn-warning" id="button" type="button" >Compras Proveedor</a>
<a href='?controller=compras&&action=todospormes' class="btn btn-warning" id="button" type="button" >Total Compras</a>
<a href='?controller=compras&&action=facturascompraspormes' class="btn btn-danger" id="button" type="button" >Ver Facturas</a>
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



<!-- Inicio Modal Clientes -->

    <div id="modal-form-1" class="modal" tabindex="-1">
               <!-- Inicio Modal -->
    <div>
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a href="#" type="button" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="black bigger">Abonos a Factura Nº <?php echo ($facturanum); ?></h4>
                      </div>

                      <div class="col-md-12 col-xs-12">
                         <table class="table table-hover" style="font-size: 13px;">
                            <tr class='success'>
                                <th>Fecha</th>
                                <th>Id-Egreso</th>
                                <th>Valor</th>
                                <th>Creado por</th>
                            </tr>
                         <?php
//`id`, `compra_id`, `egreso_id`, `valor`, `fecha_registro`, `estado_pago`, `creado_por`, `marca_temporal`
$rubros = Compras::obtenerListaAbonosfactura($Selfactura);
foreach ($rubros as $rubro) {
    $idabono        = $rubro['id'];
    $Lista          = $Lista . $rubro['id'] . ",";
    $valor          = $rubro['valor'];
    $egreso_id      = $rubro['egreso_id'];
    $fecha_registro = $rubro['fecha_registro'];
    $creado_por     = $rubro['creado_por'];
    ?>
<tr>
        <td>
            <?php echo ($fecha_registro) ?>
        </td>
        <td>
    <?php
    $cuentasalida = Egresoscuenta::obteneridCuentapor($egreso_id);
    $nombrecuenta = Cuentas::obtenerNombreCuenta($cuentasalida);
    echo ($nombrecuenta . "<br><strong> Transacción Id: " . $egreso_id . "</strong>");
    ?>
        </td>
    <td>
        <?php echo ("$" . number_format($valor, 0)); ?>
    </td>
    <td>
        <?php
$nombrecreadorabono = Usuarios::obtenerNombreUsuario($creado_por);
    echo ($nombrecreadorabono);
    ?>
    </td>
</tr>
    <?php
}
?>
                         </table>
                      </div>
                      <div class="modal-footer">
                        <a href="" class="btn btn-sm btn-danger" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Cerrar
                        </a>


                      </div>
                    </div>
                  </div>

                </div><!-- PAGE CONTENT ENDS -->
 </div>
 <!-- FINAL MODAL -->



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
