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

include_once 'modelos/egresoscuenta.php';
include_once 'controladores/egresoscuentaController.php';

include_once 'modelos/compras.php';
include_once 'controladores/comprasController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

$idreq = $_GET['id'];
//$listaids=$_GET['des'];

$res    = compras::editarpor($idreq);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $id                     = $campo['id'];
    $fecha_reporte          = $campo['fecha_reporte'];
    $imagen                 = $campo['imagen'];
    $imagenfactura          = $campo['imagen'];
    $valor_total            = $campo['valor_total'];
    $valor_retenciones      = $campo['valor_retenciones'];
    $valor_iva              = $campo['valor_iva'];
    $estado_orden           = $campo['estado_orden'];
    $factura_num            = $campo['factura'];
    $rubro_id               = $campo['rubro_id'];
    $subrubro_id            = $campo['subrubro_id'];
    $vencimiento            = $campo['vencimiento'];
    $proveedor_id_proveedor = $campo['proveedor_id_proveedor'];
    $medio_pago             = $campo['medio_pago'];
    $marca_temporal         = $campo['marca_temporal'];
    $observaciones          = $campo['observaciones'];
    $usuario_creador        = $campo['usuario_creador'];

    $nomrubro=Rubros::obtenerNombreRubro($rubro_id);
    $nomsubrubro=Subrubros::obtenerNombreSubrubro($subrubro_id);


    $nomproveedor  = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
    $nomreportador = usuarios::obtenerNombreUsuario($usuario_creador);

    if ($estado_orden == "1") {
        $nomestado = "Sin Facturar";
    } elseif ($estado_orden == "2") {
        $nomestado = "Facturado";
    } else {
        $nomestado = "Sin Estado";
    }

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
        $('.mi-selector').select2();
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#rubro_id').on('change',function(){
        var rubroID = $(this).val();
        //alert (rubroID);
        if(rubroID){
            $.ajax({
                type:'POST',
                url:'vistas/compras/ajax.php',
                data:'rubro_id='+rubroID,
                success:function(html){
                    $('#subrubro_id').html(html);
                }
            });
        }else{
            $('#subrubro_id').html('<option value="">Seleccione primero el rubro</option>');

        }
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#cuenta_id').on('change',function(){
        var cuentaID = $(this).val();
        //alert (cuentaID);
        if(cuentaID){
            $.ajax({
                type:'POST',
                url:'vistas/compras/ajax2.php',
                data:'cuenta_id='+cuentaID,
                success:function(html){
                    $('#saldocuenta').html(html);
                }
            });
        }else{
            $('#saldocuenta').html('<strong>Seleccione la cuenta</strong>');

        }
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
          <h1 class="m-0 text-dark">Gestionar OC</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=compras&&action=todos">Ordenes de compra</a></li>

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
                        
                                    
                                    <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ordenes de Compra</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
    <table class="table  table-responsive table-striped table-bordered table-hover" style="font-size: 13px;">
                <tbody><tr>
                  <th>OCN.</th>
                  <th>Proveedor</th>
                  <th>Fecha</th>
                  <th>Total</th>
                   <th>Abonos </th>
                  <th>Pagos a Realizar </th>
                  <th>Valor a Pagar</th>
                   <th>Confirmar</th>
                </tr>
                <?php
$itemsget = $_GET['des'];
$items = explode(",", $itemsget);
foreach ($items as $key => $despachounico) {
    $fechadia        =date('Y-m-d');
    $oc_valor        = Compras::sqlvalor($despachounico);
    $oc_fecha        = Compras::sqlfecha($despachounico);
    $oc_retencion    = Compras::sqlretencion($despachounico);
    $oc_iva          = Compras::sqliva($despachounico);
    $oc_abonos      = Compras::sqlabonos($despachounico);
    $oc_abonostem   = Compras::sqlabonostemporal($despachounico,$fechadia);
    $oc_proveedor    = Compras::sqlproveedor($despachounico);
    $nombreproveedor = Proveedores::obtenerNombreProveedor($oc_proveedor);

    $oc_valorfinal=($oc_valor-$oc_retencion)+$oc_iva;

    $pendientepago = $oc_valorfinal-$oc_abonos;
    $sumatotal += $oc_valorfinal;
    $sumaabonos += $oc_abonos;
    $sumaabonostem += $oc_abonostem;
    $pendientetotal= $sumatotal-$sumaabonos;

    ?>


    <script type="text/javascript">
$(document).ready(function(){
    $('#menosretencion<?php echo($despachounico);?>').on('click',function(){

        var retencion = $("#demoretenciones<?php echo($despachounico);?>").val();
        var idcompra = $("#idcompra<?php echo($despachounico);?>").val();
      
        alert ("Se aplicará una retención por "+retencion+ " a orden de compra Nº 0C00"+idcompra);
        if(retencion){
            $.ajax({
                type:'GET',
                url:'vistas/compras/ajaxretenciones.php',
                data:'retencion='+retencion+'&&idcompra='+idcompra,
                success:function(html){
                    $('#nuevosaldo').html(html);
                }
            });
        }else{
            $('#nuevosaldo').html('<strong>Seleccione la cuenta</strong>');

        }
    });
});
</script>


<script type="text/javascript">
$(document).ready(function(){
    $('#masiva<?php echo($despachounico);?>').on('click',function(){

        var valordeliva = $("#demoiva<?php echo($despachounico);?>").val();
        var idcompra = $("#idcompra<?php echo($despachounico);?>").val();
      
        alert ("El valor del IVA aplicado es de:"+valordeliva);
        if(valordeliva){
            $.ajax({
                type:'GET',
                url:'vistas/compras/ajaxiva.php',
                data:'iva='+valordeliva+'&&idcompra='+idcompra,
                success:function(html){
                    $('#nuevosaldo2').html(html);
                }
            });
        }else{
            $('#nuevosaldo2').html('<strong>Seleccione la cuenta</strong>');

        }
    });
});
</script>


            <tr>
    <form action="?controller=compras&action=pagotemporal&&id=<?php echo ($idreq); ?>&&des=<?php echo($itemsget); ?>" method="post" onsubmit="return checkSubmit();">
        
 <?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
$campofecha = date('Y-m-d');
?>
        <input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual) ?>">
        <input type="hidden" name="creado_por" value="<?php echo ($IdSesion) ?>">
        <input type="hidden" name="estado_pago" value="0">
        <input type="hidden" name="fecha_registro" value="<?php echo ($campofecha) ?>">
        <input id="idcompra<?php echo ($despachounico); ?>" type="hidden" name="itemunico" value="<?php echo ($despachounico) ?>">

        <td>OC 00<?php echo ($despachounico); ?></td>
        <td><?php echo ($nombreproveedor); ?>
            <br>
        <?php 

        if ($factura!='0') {
            echo("<a target='_blank' href=".$imagenfactura."><i class='fa fa-eye'> Ver Factura ".$factura_num."</i></a>");
        }
       

         ?>
            
        </td>
        <td><?php echo ($oc_fecha); ?></td>
    <td>
          <i data-toggle="tooltip" data-placement="left" title="Valor total de la orden de compra" class="fa fa-question-circle"></i>

         <input disabled="" id='valortotal' class='input input-group-sm' type="text" value="<?php echo (number_format($oc_valor, 0)); ?>">
        <div id="nuevosaldo">
           
        </div>

        <i data-toggle="tooltip" data-placement="left" title="Indica el valor de las retenciones aplicadas" class="fa fa-question-circle"></i>

         <input type="text" placeholder="Retenciones" id="demoretenciones<?php echo($despachounico);?>" value="<?php echo($oc_retencion); ?>">



         <a href="?controller=compras&action=cambiarestadocreditos&des=<?php echo($itemsget); ?>&&id=<?php echo($idreq); ?>" id="menosretencion<?php echo($despachounico);?>" class="btn-danger btn-xs"><i class="fa fa-minus"></i></a>
    <br>
      <i data-toggle="tooltip" data-placement="left" title="Valor del iva " class="fa fa-question-circle"></i>

    <input type="text"  placeholder="IVA" id="demoiva<?php echo($despachounico);?>" value="<?php echo($oc_iva); ?>">

    <a href="?controller=compras&action=cambiarestadocreditos&des=<?php echo($itemsget); ?>&&id=<?php echo($idreq); ?>" id="masiva<?php echo($despachounico);?>" class="btn-success btn-xs"><i class="fa fa-plus"></i></a>

    </td>



 <td>
    <input disabled="" class='input input-group-sm' type="text" value="<?php echo (number_format($oc_abonos, 0)); ?>">
   
    <a data-toggle="modal" data-target="#modal-form-<?php echo($despachounico); ?>" href="#"  class=""><i class="fa fa-calendar text-success"></i></a>

        <!-- Inicio Modal Clientes -->

    <div id="modal-form-<?php echo($despachounico); ?>" class="modal" tabindex="-1">
               <!-- Inicio Modal -->
    <div>
    

                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a href="#" type="button" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="black bigger">Abonos Orden de Compra OC00<?php echo($despachounico); ?></h4>
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
                         $rubros = Compras::obtenerListaAbonos($despachounico);
                                                                    foreach($rubros as $rubro){
                                                                        $idabono = $rubro['id'];
                                                                       
                                                                        $Lista=$Lista.$rubro['id'].",";  
                                                                        $valor = $rubro['valor'];
                                                                        $egreso_id = $rubro['egreso_id'];

                                                                        $fecha_registro = $rubro['fecha_registro'];
                                                                        $creado_por = $rubro['creado_por'];
                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo($fecha_registro) ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php 
                                        $cuentasalida=Egresoscuenta::obteneridCuentapor($egreso_id);
                                        $nombrecuenta=Cuentas::obtenerNombreCuenta($cuentasalida);

                                        echo($nombrecuenta."<br><strong> Salida: ".$egreso_id."</strong>"); 
                                        ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo("$".number_format($valor,0)); ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php 
                                                                                $nombrecreadorabono=Usuarios::obtenerNombreUsuario($creado_por);
                                                                                echo($nombrecreadorabono);
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

 </td>
 <td>
    <?php if ($oc_abonostem>$oc_valorfinal) {
        echo ("<i class='fa fa-warning text-danger'></i>");
    } else{
        echo ("<i class='fa fa-check text-success'></i>");
    }
    if ($oc_abonostem==0) {
        $variable=1;
    }
    else{
        $variable=0;
    }
     $contadorpagos += $variable;
   
    ?>
    <input disabled="" class='input input-group-sm' type="text" value="<?php echo (number_format($oc_abonostem, 0)); ?>">
    <a href="?controller=compras&action=deletepagotemporal&&id=<?php echo ($idreq); ?>&&des=<?php echo($itemsget); ?>&&iddelete=<?php echo($despachounico); ?>"><i class="fa fa-close text-danger"></i></a>
 </td>

        <td>
            <input id="<?php echo($despachounico."-demo"); ?>" class='input input-sm' type="text" name="valorpago" value="<?php echo ($pendientepago); ?>">
        </td>

<?php 
    # =================================================================
    # =           Ocultar Botón si no tiene saldo pendiente           =
    # =================================================================

    if ($sumatotal==$sumaabonos) {
        echo ("<td><button disabled='true' type='submit' class='btn btn-success fa fa-check'></button></td>");
    }
    else{
        echo ("<td><button  type='submit' class='btn btn-success fa fa-check'></button></td>");
    }
    
 ?>

       

 


    </form>


<script src="dist/js/jquery.maskMoney.js" type="text/javascript"></script>
    <script type="text/javascript">
$("#<?php echo($despachounico."-demo"); ?>").maskMoney({
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
$("#demoretenciones<?php echo($despachounico);?>").maskMoney({
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
$("#demoiva<?php echo($despachounico);?>").maskMoney({
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
?>

            <tr class="text-success success">
                <td colspan="3"><strong>Totales:</strong></td>
                <td> <strong><?php echo("$ ".number_format($sumatotal,0)); ?> </strong></td>
                <td> <strong><?php echo("$ ".number_format($sumaabonos,0)); ?> </strong></td>
                <td> <strong><?php echo("$ ".number_format($sumaabonostem,0)); ?> </strong></td>
                <td> <strong><?php echo("$ ".number_format($pendientetotal,0)); ?> </strong></td>
            </tr>

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

<?php 

# ============================================================
# =           Ocultar campos si saldo está en cero           =
# ============================================================

if ($pendientetotal>0) {
   
# ======  End of Ocultar campos si saldo está en cero  =======



 ?>



    <form role="form" action="?controller=compras&action=actualizarpagocredito&&id=<?php echo ($idreq); ?>" method="POST" enctype="multipart/form-data" onsubmit="return checkSubmit();">

                                <?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
?>
                    <input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual) ?>">
                    <input type="hidden" name="creado_por" value="<?php echo ($IdSesion) ?>">
                  

                              <div class="card-body">


                                <div class="row">


        <div class="col-md-4">
                                        <div class="form-group">
                    <label for="fila2_columna1">Factura <small>Tamaño máximo 10MB</small></label>
                                                <div class="custom-file">
                                         <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file="<?php echo $imagenfactura;?>" multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ >
                                                     <input type="hidden" name="ruta1" value="<?php echo $imagenfactura;?>" >
                                                </div>
                                        </div>
                                       </div>
                                       <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Fecha del pago: <span>*</span></label>
                                                    <input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                        
                                        <div style="display:none;" class="col-md-4">
                                                <div class="form-group">
                                                    <label>Valor Egreso: <span>*</span></label>
                                                    <input type="text" name="valor_total" placeholder="Valor Subtotal" class="form-control" id="demo1" value="<?php echo($sumaabonostem); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Valor Egreso: <span>*</span></label>
                                                    <input type="text" disabled class="form-control" id="demo1" value="<?php echo("$ ".number_format($sumaabonostem,0)); ?>">
                                                </div>
                                            </div>
                                            <div style="display:none;" class="col-md-4">
                                                <div class="form-group">
                                                    <label>Valor Retenciones: <span>*</span></label>
                                                    <input type="text" name="valor_retenciones" placeholder="Valor Subtotal" class="form-control" id="demo2" value="0">
                                                </div>
                                            </div>
                                            <div style="display:none;" class="col-md-4">
                                                <div class="form-group">
                                                    <label>Valor Iva: <span>*</span></label>
                                                    <input type="text" name="valor_iva" placeholder="Valor Subtotal" class="form-control" id="demo3" value="0">
                                                </div>
                                            </div>
                                    <div  class="col-md-4">
                                        <div class="form-group">

                                          <label for="sel1">Cambiar Estado:</label>
                                          <select class="form-control mi-selector" id="estado_item" name="estado_item" required>
                                    <option value="<?php echo($estado_orden) ?>" selected><?php echo($nomestado); ?></option>
                                    <option value="1">Sin Facturar</option>
                                    <option value="2" >Facturado</option>
                                    
                                          </select>
                                        </div>
                                    </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Factura Número: <span></span></label>
                                                    <input type="text" name="factura" placeholder="Indique Número de Factura" class="form-control"  value="<?php echo($factura_num); ?>">
                                                </div>
                                            </div>
                                    <div style="display:none;" class="col-md-4">
                                        <div class="form-group">

                                          <label for="sel1">Ordenes de Compra:</label>
                                         <input type="text" value="<?php echo($itemsget); ?>" name="ordenes">
                                        </div>
                                    </div>
                                   

                                     <div class="col-sm-12">
          <h3 class="m-0 text-dark">Datos de pago: OC000<?php echo ($idreq); ?></h3>
        </div><!-- /.col -->
                                    <div id="divrubro" class="col-md-6">
                                                    <div class="form-group">
                                                          <label for="sel1">Rubro:<span>*</span></label>
                                                          <select class="form-control mi-selector" id="rubro_id" name="rubro_id" required >
                        <option value="<?php echo($rubro_id) ?>" selected><?php echo($nomrubro); ?></option>
                                                                <?php
$rubros = Rubros::obtenerListaRubros();
foreach ($rubros as $rubro) {
    $id_rubro     = $rubro['id_rubro'];
    $nombre_rubro = $rubro['nombre_rubro'];
    ?>
                                                                <option value="<?php echo $id_rubro; ?>"><?php echo utf8_encode($nombre_rubro); ?></option>
                                                                <?php }?>
                                                          </select>
                                                    </div>
                                        </div>

                                                <div  id="divsubrubro" class="col-md-6">
                                                <div class="form-group">
                                                      <label for="sel1">Sub-Rubro:<span>*</span></label>
                                                      <select required class="form-control mi-selector" id="subrubro_id" name="subrubro_id" >
                    <option value="<?php echo($subrubro_id) ?>" selected><?php echo($nomsubrubro); ?></option>
                                                      </select>
                                                </div>
                                            </div>


                                     <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="fila2_columna1">Soporte de Pago *<small>Tamaño máximo 10MB</small></label>
                                                <div class="custom-file">
                                                     <input required name="imagen2" type="file" id="input-file-now" class="dropify" data-default-file="" multiple="multiple" data-allowed-file-extensions="png jpg jpeg mp4 pdf xls xlsx webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf,.xlsx"/ >
                                                     <input type="hidden" name="ruta2" value="" >
                                                </div>
                                        </div>
                                       </div>
                                       <div  class="col-md-6">
                                                    <div class="form-group">
                                                          <label for="sel1">Cuenta Pago:<span>*</span></label>
                                                          <select class="form-control mi-selector" id="cuenta_id" name="cuenta_id" required>
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

                                        <div  class="col-md-6">
                                                <div class="form-group">
                                                    <label>Beneficiario: <span>*</span></label>
                                    <select class="form-control mi-selector2" id="beneficiario1" name="proveedor_id_proveedor" required>
                                    <option value="<?php echo($proveedor_id_proveedor) ?>" selected><?php echo ($nomproveedor); ?></option>
                                        
                                          </select>
                                                    <input type="hidden" name="beneficiario" placeholder="" class="form-control"  id="beneficiario" value="<?php echo ($nomproveedor); ?>">
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
                                    <div style="display: none;" class="col-md-12">
                                                <div class="form-group">
                                                    <label>Detalle del Pago<span>*</span></label>
                                    <textarea class="form-control" rows="2" id="descripcion" name="observaciones">Pago orden de compra :<?php echo ($itemsget) ?> a proveedor <?php echo ($nomproveedor); ?></textarea>
                                                </div>
                                            </div>



                                </div>
                    <?php 
                    if ($sumaabonostem>$pendientetotal) {
                        ?>
                        <div class="card-footer">
                              <button disabled name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
                        </div>
                         <br>
                              <small class="text-danger">
                                <strong>
                                  El valor de Abonos supera el valor del saldo pendiente.
                              </strong>
                          </small>

                        <?php
                    }
                    elseif($contadorpagos!=0){
                        ?>

                         <div class="card-footer">
                            
                              <button disabled name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
                              <br>
                              <small class="text-danger">
                                <strong>
                                  Verifique los pagos (Un abono está en cero (0).)
                              </strong>
                          </small>
                        </div>

                        <?php
                    }else{
                         ?>
                         <div class="card-footer">
                            
                              <button  name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
                            
                        </div>
                         <?php
                    }
                     ?>
                            
                          </div>
                          <!-- /.card -->

                            </form>
    <?php 

}

    # ======  End of Final Ocultar formulario si saldo está en cero  =======
    

     ?>
                        </div>
                      </div>

                    </div> <!-- FIN DE ROW-->
                </div><!-- FIN DE CONTAINER FORMULARIO-->
            </div> <!-- Fin Row -->
        </div> <!-- Fin Container -->
    </div> <!-- Fin Content -->



</div> <!-- Fin Content-Wrapper -->

<script>
  $(function () {

    $('.select2').select2()


  })
</script>


<script type="text/javascript">
    enviando = false; //Obligaremos a entrar el if en el primer submit
    
    function checkSubmit() {
        if (!enviando) {
            enviando= true;
            return true;
        } else {
            //Si llega hasta aca significa que pulsaron 2 veces el boton submit
            alert("El formulario ya se esta enviando");
            return false;
        }
    }
    
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
