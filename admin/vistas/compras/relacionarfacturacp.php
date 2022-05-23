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
        $fecha_reporte_factura   = $campo['fecha_reporte'];
        $rubro_id      = $campo['rubro_id'];
        $subrubro_id   = $campo['subrubro_id'];
        $compra_de     = $campo['compra_de'];
        $observaciones = $campo['observaciones'];
        $valor_total = $campo['valor_total'];
        $valor_retenciones=$campo['valor_retenciones'];
        $valor_iva=$campo['valor_iva'];
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


<form id="formulario1" role="form" action="?controller=compras&&action=guardarfacturacompras&&des=<?php echo ($itemsget); ?>&&id=<?php echo ($Proveedor); ?>" method="POST" enctype="multipart/form-data">
    <?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
$Diareporte   = date('Y-m-d');
?>
            <input type="hidden" name="proveedor_id_proveedor" value="<?php echo ($Proveedor); ?>">
           
            <input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual); ?>">
            <input type="hidden" name="creado_por" value="<?php echo ($IdSesion); ?>">
            <input type="hidden" name="estado_factura" value="1">
            <input type="hidden" name="factura_publicada" value="1">
            <input type="hidden" name="rubro_id" value="<?php echo ($rubro_id); ?>">
            <input type="hidden" name="subrubro_id" value="<?php echo ($subrubro_id); ?>">
            <input type="hidden" name="listacotizaciones" value="no-aplica">
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
                        <textarea class="form-control" rows="2" name="observaciones" id="descripcion" placeholder="Observaciones Adicionales" maxlength="500"><?php echo($observaciones); ?></textarea>
        </div>

</div>


<div class="col-xs-8">
<div class="table-responsive">
<table class="table">
<tbody>
<tr>
<th>Fecha Factura: </th>
<td>
     <input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte" value="<?php  echo($fecha_reporte_factura); ?>">
</td>
</tr>

    <tr>
<th style="width:80%">Factura Nº:</th>
<td><input name="facturanum" type="text" class="input-sm" value="<?php echo ($factura_num); ?>" placeholder="Número Factura"></td>
</tr>
<tr>
<th>Subtotal</th>
<td id="subtotalfinal">
    <input  type="text"  id="camposubtotal" class="clasesubtotal input-sm" value="<?php echo ($valor_total); ?>" name="valor_subtotal_txt">
</td>
</tr>
<tr>
<th>
    IVA
</th>
<td id="valorivafinal">

    <input  type="text" class="claseiva input-sm" value="<?php echo ($valor_iva); ?>" name="valor_iva_txt" id='campoiva'>
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

        var subtotal =$('#camposubtotal').val();
        var s1 = subtotal.replaceAll(".", "");
        var s2 = s1.replaceAll(" ", "");
        var s3 = s1.replaceAll("$", "");


        //alert('Valor a pagar: '+s3);
        var iva = $('#campoiva').val();
        var iva1 = iva.replaceAll(".", "");
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

         var calculototal=parseFloat(s3)+parseFloat(iva3)-parseFloat(r3)-parseFloat(ra3)-parseFloat(v3);

          //alert('Suma de dos valores: '+calculototal);

       //
        var formatonumero = parseFloat(calculototal).toLocaleString('es-ES');
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
$("#camposubtotal").maskMoney({
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
$("#campoiva").maskMoney({
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
