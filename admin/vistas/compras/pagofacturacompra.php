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
<i class="fa fa-plus-square"></i> Pagar / Abonar  Factura Nº <?php echo ($facturanum); ?>
<small class="pull-right"></small>
</h2>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=compras&&action=todospormes">Ordenes de compra</a></li>

             <li class="breadcrumb-item active"><a href="?controller=compras&&action=facturascompraspormes">Ver Facturas</a></li>

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
<tbody>
<tr>
<th style="width:70%">Fecha Factura:</th>
<td><input disabled name="facturanum" type="text" class="input-sm" value="<?php echo ($fecha_reporte); ?>" placeholder="Fecha Factura"></td>
</tr>

<tr>
<th >Factura Nº:</th>
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
<th>Total a pagar</th>
<td>


   <span id="totalpago"><strong>$<?php echo (number_format($totalpago, 0)); ?></strong></span>


</td>
</tr>
</tbody></table>
</div>

</div>


<div class="col-xs-6">

<?php
$abonosanteriores = Compras::sqlabonosfactura($Selfactura);

if ($abonosanteriores == $totalpago) {
     $saldopendiente = $totalpago-$abonosanteriores;
    // Mensaje cuando factura está 100% paga
    ?>
<div class="callout callout-success">
<h4 class="text-success">Factura paga 100%</h4>
</div>
    <?php
} elseif ($abonosanteriores == 0) {
     $saldopendiente = $totalpago-$abonosanteriores;
    // Mensaje cuando factura no tiena abonos
    ?>
<div class="callout callout-danger">
<h4 class="text-danger">Factura sin Abonos</h4>
</div>

    <?php
}elseif ($abonosanteriores<$totalpago) {

    $porcentaje=($abonosanteriores/$totalpago)*100;
    $saldopendiente = $totalpago-$abonosanteriores;

    ?>
<div class="callout callout-warning">
<h4 class="text-warning">Factura con el <?php echo(round($porcentaje,0)); ?>% pago, saldo pendiente por: $<?php echo (number_format($saldopendiente,0));?></h4>
</div>

    <?php
}




if ($abonosanteriores > 0) {

    ?>

 <h5>PAGOS <?php echo ($nombreproveedor); ?> </h5>
    <table id="tablatrituradora" class="table  table-responsive table-striped table-bordered table-hover dataTables_borderWrap" style="width: 100%;font-size: 11px;">

         <tr class='success'>
                                <th>Fecha Pago</th>
                                <th>Cuenta - Id</th>
                                <th>Valor</th>

                            </tr>
                         <?php
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

</tr>


    <?php
}
        ?>
            </table>
<?php
}
?>




 <h5>Anticipos <?php echo ($nombreproveedor); ?> </h5>
    <table id="tablatrituradora" class="table  table-responsive table-striped table-bordered table-hover dataTables_borderWrap" style="width: 100%;font-size: 11px;">

         <tr class='success'>
                                <th>Fecha Pago</th>
                                <th>Cuenta - Id</th>
                                <th>Anticipo</th>
                                <th>Redimido</th>
                                <th>Saldo Anticipo</th>

                            </tr>
                         <?php

$anticipos = Compras::obtenerListaAnticipos($proveedor_id_proveedor);
foreach ($anticipos as $egreso) {

    $idanticipo    = $egreso['id_egreso_cuenta'];
    $valoranticipo = $egreso['valor_egreso'];
    $fechaegreso   = $egreso['fecha_egreso'];
    $cuenta_id_cuenta   = $egreso['cuenta_id_cuenta'];
    $nombrecuentaanticipo = Cuentas::obtenerNombreCuenta($cuenta_id_cuenta);
    $sumaanticipos += $valoranticipo;

     $sumaabonos += $oc_abonos;
     $totalanticipos = Compras::sqlsumaanticipos($proveedor_id_proveedor);
     $sumaredimido = Compras::sqlsumaredimido($idanticipo);
     $saldoanticipo = $totalanticipos-$sumaredimido;

     if ($saldoanticipo==0) {
        echo("<tr><td colspan='5'>Sin anticipos para redimir</td></tr>");
}else{
    ?>
<tr>
        <td>
            <?php echo ($fechaegreso) ?>

        </td>
         <td>
        <?php  echo ($nombrecuentaanticipo . "<br><strong> Transacción Id: " . $idanticipo . "</strong>"); ?>
    </td>
        <td>
            <?php echo ("$".number_format($valoranticipo,0)); ?>

        <form action="?controller=compras&&action=guardarpagoanticipo&&factura=<?php echo($Selfactura); ?>" method="POST" enctype="multipart/form-data">
               
                <?php 
$TiempoActual = date('Y-m-d H:i:s');
$Diareporte   = date('Y-m-d');

            if ($totalpago<=$saldoanticipo) {
                   echo("<input type='hidden' name='valor' value=".$totalpago.">");
                }
            elseif ($totalpago>=$saldoanticipo) {
                  echo("<input type='hidden' name='valor' value=".$saldoanticipo.">");
            }

             ?>
                    <input type="hidden" name='egreso_id' value="<?php echo($idanticipo); ?>">
                    <input type="hidden" name='fecha_registro' value="<?php echo ($fechaegreso) ?>">
                    <input type="hidden" name='estado_pago' value="1">
                    <input type="hidden" name="creado_por" value="<?php echo ($IdSesion); ?>">
                    <input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual); ?>">
                    <input type="hidden" name="factura_id_factura" value="<?php echo ($Selfactura); ?>">
        </td>
        <td>
             <?php echo ("$".number_format($sumaredimido,0)); ?>
        </td>
         <td>
             <?php echo ("$".number_format($saldoanticipo,0)); ?>
             <br>

             <?php 
           if ($saldoanticipo==0) {
                 echo("<button disabled class='btn btn-success btn-sm'>Cruzarjjj con Anticipo</button>");
             }else {
                  echo("<button class='btn btn-success btn-sm'>Cruzar con Anticipo</button>");
             }


              ?>

              
            </form>
        </td>
   

</tr>
<?php
}
}

?>
    </table>

<?php 
    
    if ($saldopendiente>0) {
    
    
 ?>

<h5>Pagar Saldo Pendiente</h5>
    <form id="formularioegreso" action="?controller=compras&&action=guardarpagofactura&&factura=<?php echo($Selfactura); ?>" method="post" enctype="multipart/form-data">
    
    <?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
?>
        

        <input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual) ?>">
        <input type="hidden" name="creado_por" value="<?php echo ($IdSesion) ?>">
        <input type="hidden" name="tipo_egreso" value="Pago a proveedor">
        <input type="hidden" name="cuenta_beneficiada" value="0">
        <input type="hidden" name="proveedor_id_proveedor" value="<?php echo ($proveedor_id_proveedor) ?>">
        <input type="hidden" name="beneficiario" value="<?php echo ($nombreproveedor) ?>">
        <input type="hidden" name="id_rubro" value="<?php echo ($rubro_id) ?>">
        <input type="hidden" name="id_subrubro" value="<?php echo ($subrubro_id) ?>">
        <input type="hidden" name="caja_beneficiada" value="0">
        <input type="hidden" name="cheque_id_cheque" value="0">
        <input type="hidden" name="estado_egreso" value="1">
        <input type="hidden" name="egreso_publicado" value="1">
        <input type="hidden" name="relacion_id_relacion" value="0">

        

        <div class="col-md-6">
                                        <div class="form-group">
                    <label for="fila2_columna1">Soporte <small>Tamaño máximo 5MB </small></label>
                                                <div class="custom-file">
                                         <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagenfactura;?>" multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ >
                                                     <input type="hidden" name="ruta1" value="<?php echo $imagenfactura;?>" >
                                                </div>
                                        </div>
                                       </div>
                                       <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Fecha del pago: <span>*</span></label>
                                                    <input type="date" name="fecha_egreso" placeholder="Fecha" class="form-control required" required id="fecha_reporte" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                        </div>
                                         <div  class="col-md-6">
                                                <div class="form-group">
                                                    <label>Valor Egreso: <span>*</span></label>
                                                    <input type="text" name="valor_egreso" placeholder="Valor Egreso" class="form-control" id="demo5" value="<?php echo($saldopendiente); ?>">
                                                </div>
                                            </div>

                                        <div  class="col-md-6">
                                                    <div class="form-group">
                                                          <label for="sel1">Cuenta Pago:<span>*</span></label>
                                                          <select class="form-control mi-selector" id="cuenta_id_cuenta" name="cuenta_id_cuenta" required>
                                                                  <option value="" selected>Seleccionar...</option>
                                                                <?php
$rubros = Cuentas::obtenerListaCuentas();
foreach ($rubros as $rubro) {
    $id     = $rubro['id_cuenta'];
    $nombre = $rubro['nombre_cuenta'];
    ?>
                                                                <option value="<?php echo $id; ?>"><?php echo utf8_encode($nombre); ?></option>
                                                                <?php }?>
                                                          </select>
                                                          <small id="saldocuenta" class="text-success"><strong> -</strong> </small>
                                                    </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Egreso a tráves de: <span>*</span></label>
                                                     <select class="form-control"  name="egreso_en" required="" id="egreso_en">
                                                            <option value="" selected="">Seleccionar...</option>
                                                        
                                                            <option value="Cheque">Cheque</option>
                                                            <option value="Consignacion">Consignación</option>
                                                            <option value="Transferencia">Transferencia</option>
                                                          </select>
                                                </div>
                                        </div>
                                        <div style="display: none;" class="col-md-6">
                                                <div class="form-group">
                                                    <label>Detalle del Pago<span>*</span></label>
                                    <textarea class="form-control" rows="2" id="descripcion" name="observaciones">Pago a Factura N. :<?php echo ($Selfactura) ?> a proveedor <?php echo ($nombreproveedor); ?></textarea>
                                                </div>
                                            </div>
                                     <button id="button" name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar Egreso </button>

                  
</form>
<?php 
}
 ?>

</div>




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

    $('#formularioegreso').submit();

  }
})

});
</script>






<script src="dist/js/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">
$("#demo5").maskMoney({
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
