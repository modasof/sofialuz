<?php
ini_set('display_errors', '0');
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/proyectos.php';
include_once 'controladores/proyectosController.php';
include_once 'modelos/proveedores.php';
include_once 'controladores/proveedoresController.php';
include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';
include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';
include_once 'modelos/compras.php';
include_once 'controladores/comprasController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

$getOrden = $_GET['id'];
//$listaids=$_GET['des'];

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



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Entrada a Inventario</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>

            <li class="breadcrumb-item active"><a href="?controller=compras&&action=todosrecibirinsumos">Recibir OC</a></li>
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
              <h3 class="box-title">Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" style="font-size: 13px;">
                <tbody><tr>
                  <th>OCN</th>
                  <th>Insumo</th>
                  <th>Unidad</th>
                  <th>Cantidad Comprada</th>
                   <th>Entregas Anteriores </th>
                  <th>Cantidad Recibida </th>
                  <th>Cantidad Pendiente</th>
                   <th>Confirmar</th>
                </tr>
        <?php
$campos = $campos->getCampos();
foreach ($campos as $campo) {
    $fechadia               = date('Y-m-d');
    $id                     = $campo['id'];
    $proveedor_id_proveedor = $campo['proveedor_id_proveedor'];
    $cotizacion             = $campo['cotizacion'];
    $medio_pago             = $campo['medio_pago'];
    $item_id                = $campo['item_id'];
    $valor_cot              = $campo['valor_cot'];
    $requisicion_id         = $campo['requisicion_id'];
    $marca_temporal         = $campo['marca_temporal'];
    $usuario_creador        = $campo['usuario_creador'];
    $estado_cotizacion      = $campo['estado_cotizacion'];
    $ordencompra_num        = $campo['ordencompra_num'];
    $insumo_id_insumo       = $campo['insumo_id_insumo'];
    $servicio_id_servicio   = $campo['servicio_id_servicio'];
    $vr_unitario            = $campo['vr_unitario'];
    $cantidadcot            = $campo['cantidadcot'];

    $cant_anteriores     = Inventario::sqldetalleentrada($id);
    $cant_anteriorestemp = Inventario::sqldetalleentradatemporal($id);

    if ($insumo_id_insumo != "0") {
        $nominsumo           = Insumos::obtenerNombreInsumo($insumo_id_insumo);
        $labelinsumo         = "OcInsumo:";
        $unidadmedidaid      = Insumos::obtenerUnidadmed($insumo_id_insumo);
        $nomunidadmedida     = Unidadesmed::obtenerNombre($unidadmedidaid);
    
    } elseif ($servicio_id_servicio != "0") {
        $nominsumo         = Servicios::obtenerNombre($servicio_id_servicio);
        $labelinsumo       = "OcServicio:";
        $unidadmedidaid    = Servicios::obtenerUnidadServicio($servicio_id_servicio);
        $nomunidadmedida   = Unidadesmed::obtenerNombre($unidadmedidaid);
    }

      

    $pendiente = $cantidadcot - $cant_anteriores;
    $sumatotal += $cantidadcot;
    $sumaanteriores += $cant_anteriores;
    $sumaanteriorestemp += $cant_anteriorestemp;
    $pendientetotal = $sumatotal - $sumaanteriores;

    ?>
            <tr>
    <form action="?controller=inventario&action=guardarentradadetalletem&&id=<?php echo ($getOrden); ?>" method="post">

 <?php
date_default_timezone_set("America/Bogota");
    $TiempoActual = date('Y-m-d H:i:s');
    $campofecha   = date('Y-m-d');
    ?>
                        <input type="hidden" name="cotizacion_item_id" value="<?php echo ($id) ?>">
                        <input type="hidden" name="oc_id" value="<?php echo ($getOrden) ?>">
                        <input type="hidden" name="insumo_id" value="<?php echo ($insumo_id_insumo) ?>">
                        <input type="hidden" name="servicio_id" value="<?php echo ($servicio_id_servicio) ?>">
                        <input type="hidden" name="entrada_id" value="<?php echo ($entrada_id) ?>">
                      
                        <input type="hidden" name="estado_detalle_entrada" value="0">
                        <input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual) ?>">
                        <input type="hidden" name="creado_por" value="<?php echo ($IdSesion) ?>">
                        <input type="hidden" name="entrada_por" value="Entrada por OC">
        <td>OC 00<?php echo ($getOrden . "-" . $id); ?></td>
        <td><?php echo ($nominsumo); ?></td>
        <td><?php echo ($nomunidadmedida); ?></td>
    <td><input disabled="" class='input input-group-sm' type="text" value="<?php echo ($cantidadcot); ?>"></td>
 <td>
    <input type="number" step="any" disabled="" class='input input-group-sm'  value="<?php echo ($cant_anteriores); ?>">
    <a data-toggle="modal" data-target="#modal-form-<?php echo ($id); ?>" href="#"  class=""><i class="fa fa-calendar text-success"></i></a>

        <!-- Inicio Modal Clientes -->

    <div id="modal-form-<?php echo ($id); ?>" class="modal" tabindex="-1">
               <!-- Inicio Modal -->
    <div>

                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a href="#" type="button" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="black bigger">Entregas OC00<?php echo ($id); ?></h4>
                      </div>

                      <div class="col-md-12 col-xs-12">
                         <table class="table table-hover" style="font-size: 13px;">
                            <tr class='success'>
                                <th>Fecha</th>
                                <th>Recibido por</th>
                                <th>Cantidad</th>
                                <th>Entrega Nº</th>
                            </tr>
                         <?php

    $detallesent = Inventario::obtenerListaRecibidosOc($id);
    foreach ($detallesent as $campodetalle) {

        $iddetalle              = $campodetalle['id'];
        $cotizacion_item_id     = $campodetalle['cotizacion_item_id'];
        $oc_id                  = $campodetalle['oc_id'];
        $insumo_id              = $campodetalle['insumo_id'];
        $cantidaddetalle        = $campodetalle['cantidad'];
        $entrada_id             = $campodetalle['entrada_id'];
        $fecha_registro         = $campodetalle['fecha_registro'];
        $estado_detalle_entrada = $campodetalle['estado_detalle_entrada'];
        $marca_temporal         = $campodetalle['marca_temporal'];
        $creado_por             = $campodetalle['creado_por'];
        $nomusuario             = Usuarios::obtenerNombreUsuario($creada_por);

        ?>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo ($fecha_registro) ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo ($nomusuario); ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo ($cantidaddetalle); ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo ($entradascaja); ?>
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
    <?php if ($sumaanteriorestemp < $sumaanteriores) {
        echo ("<i class='fa fa-warning text-danger'></i>");
    } else {
        echo ("<i class='fa fa-check text-success'></i>");
    }
    if ($sumaanteriorestemp == 0) {
        $variable = 1;
    } else {
        $variable = 0;
    }
    $contadorpagos += $variable;

    ?>
    <input disabled="" class='input input-group-sm' type="number" step="any" value="<?php echo ($cant_anteriorestemp); ?>">
    <a href="?controller=inventario&action=deletedellentradatemp&&id=<?php echo ($getOrden); ?>&&iddelete=<?php echo ($id); ?>"><i class="fa fa-close text-danger"></i></a>
 </td>
        <td>
            <input id="" class='input input-sm' type="number" step="any" name="cantidad" value="<?php echo ($pendiente); ?>">

        <input type="date" name="fecha_registro" placeholder="Fecha" class="form-control required" required id="fecha_reporte">
        </td>
        <td><button type="submit" class="btn btn-success fa fa-check"></button></td>
    </form>


     </tr>

            <?php
}
?>

            <tr class="text-success success">
                <td colspan="3"><strong>Totales:</strong></td>
                <td> <strong><?php echo ($sumatotal); ?> </strong></td>
                <td> <strong><?php echo ($sumaanteriores); ?> </strong></td>
                <td><strong><?php echo ($sumaanteriorestemp); ?> </strong></td>
                <td> <strong><?php echo ($pendientetotal); ?> </strong></td>
            </tr>
    <input id="inputcantidadrecibida" type="hidden" value="<?php echo ($sumaanteriorestemp); ?>">
    <input id="inputcantidacomprada" type="hidden" value="<?php echo ($sumatotal); ?>">

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

    <form role="form" action="?controller=inventario&action=actualizarentradaoc&&id=<?php echo ($getOrden); ?>" method="POST" enctype="multipart/form-data">

                                <?php

date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
$campofecha   = date('Y-m-d');
?>



                    <input type="hidden" name="fecha_reporte" value="<?php echo ($TiempoActual) ?>">
                    <input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual) ?>">
                    <input type="hidden" name="creado_por" value="<?php echo ($IdSesion) ?>">
                    <input type="hidden" name="tipo_entrada" value="Entrada por OC">
                     <input type="hidden" name="ocid" value="<?php echo ($getOrden); ?>">

                              <div class="card-body">


                                <div class="row">
                      <div class="col-md-12">
                        <label for="">Indique el estado:</label>
                        <div class="form-group">
                          <select style="width:300px;" class="mi-selector" name="estadoOC" id="estadoOC" required="">

                          </select>
                        </div>

                      </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label>Observaciones<span>*</span></label>
                  <textarea class="form-control" rows="2" id="descripcion" name="observaciones" required></textarea>
                        </div>
                      </div>

<script type="text/javascript">
$(document).ready(function(){

        var recibido = $("#inputcantidadrecibida").val();
        var comprado = $("#inputcantidacomprada").val();


        //alert ("El valor del IVA aplicado es de:"+comprado);
        if (recibido<comprado) {
        var mySelect = document.getElementById("estadoOC");
        var addOption2 = function(select,txt,value){
        var opt = new Option(txt,value);
            console.log(typeof opt)
            select.appendChild(opt);
            }
            addOption2(mySelect,"Pendiente Recibir","");
            addOption2(mySelect,"Pendiente x saldo","Pendiente");
            addOption2(mySelect,"Pendiente x cambio","Pendiente");
            addOption2(mySelect,"Pendiente x devolucion","Pendiente");

        }
        else if(recibido==comprado){
            var mySelect = document.getElementById("estadoOC");
        var addOption2 = function(select,txt,value){
        var opt = new Option(txt,value);
            console.log(typeof opt)
            select.appendChild(opt);
            }
            addOption2(mySelect,"Recibido Ok","Recibido Ok");
        }

});
</script>

                  </div>
                   <div class="card-footer">
                              <button  name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar Entrada Centro de Distribución</button>
                        </div>


                          </div>
                          <!-- /.card -->

                            </form>
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
