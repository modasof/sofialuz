<?php
ini_set('display_errors', '0');
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';

include_once 'modelos/proyectos.php';
include_once 'controladores/proyectosController.php';

include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';

include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';

include_once 'modelos/requisicionesitems.php';
include_once 'controladores/requisicionesitemsController.php';

include_once 'modelos/requisiciones.php';
include_once 'controladores/requisicionesController.php';

include_once 'modelos/categoriainsumos.php';
include_once 'controladores/categoriainsumosController.php';

include_once 'modelos/inventario.php';
include_once 'controladores/inventarioController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

$idreq = $_GET['id'];
//$listaids=$_GET['des'];

$res    = Requisiciones::editarrequisicionesPor($idreq);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $fecha_reporte          = $campo['fecha_reporte'];
    $solicitado_por         = $campo['solicitado_por'];
    $observacionesiniciales = $campo['observaciones'];
    $proyecto_id_proyecto   = $campo['proyecto_id_proyecto'];
    $nomsolicita            = Usuarios::obtenerNombreUsuario($solicitado_por);
    $nombreproyecto         = Proyectos::obtenerNombreProyecto($proyecto_id_proyecto);
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
          <h1 class="m-0 text-dark">Gestionar Salida de RQ</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=reqparaentrega&&estadosolicitado=12&&cargo=<?php echo ($RolSesion); ?>">RQ. Para Entrega</a></li>

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
              <h3 class="box-title">Despacho Requisición RQ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" style="font-size: 13px;">
                <tbody><tr>
                  <th>RQ-IT</th>
                  <th>Insumo</th>
                  <th>Unidad</th>
                  <th>Cantidad Solicitada</th>
                   <th>Entregas Anteriores </th>
                  <th>Cantidad Entregada </th>
                  <th>Cantidad Pendiente</th>
                   <th>Confirmar</th>
                </tr>
                <?php
$itemsget = $_GET['des'];
$items    = explode(",", $itemsget);
foreach ($items as $key => $despachounico) {

    $insumo_id_insumo = Requisicionesitems::sqlinsumoitem($despachounico);
    $usuario_creador  = Requisicionesitems::sqlusuariocreador($despachounico);
    $rqprincipal      = Requisicionesitems::sqlrq($despachounico);
    $cantidad         = Requisicionesitems::sqlcantidaditem($despachounico);

    $nomsolicita         = Usuarios::obtenerNombreUsuario($usuario_creador);
    $nombreinsumo        = Insumos::obtenerNombreInsumo($insumo_id_insumo);
    $Ucategoriainsumo_id = Insumos::obtenerCategoria($insumo_id_insumo);
    $Unombrecategoria    = Categoriainsumos::obtenerNombre($Ucategoriainsumo_id);
    $Uunidadmedida_id    = Insumos::obtenerUnidadmed($insumo_id_insumo);
    $Unombredmedida      = Unidadesmed::obtenerNombre($Uunidadmedida_id);

    $fechadia = date('Y-m-d');

    $cant_anteriores     = Inventario::sqldetallesalida($despachounico);
    $cant_anteriorestemp = Inventario::sqldetallesalidatemporal($despachounico, $fechadia);

    $pendiente = $cantidad - $cant_anteriores;
    $sumatotal += $cantidad;
    $sumaanteriores += $cant_anteriores;
    $sumaanteriorestemp += $cant_anteriorestemp;
    $pendientetotal      = $sumatotal - $sumaanteriores;
    $valorpromedio       = Valorpromedioinsumo($insumo_id_insumo);
    $totalvalorentregado = $valorpromedio * $sumaanteriorestemp;

    ?>
            <tr>
    <form action="?controller=inventario&action=guardarsalidadetalletem&&id=<?php echo ($idreq); ?>&&des=<?php echo ($itemsget) ?>" method="post">

 <?php
date_default_timezone_set("America/Bogota");
    $TiempoActual = date('Y-m-d H:i:s');
    $campofecha   = date('Y-m-d');
    ?>

                                <input type="hidden" name="item_id" value="<?php echo ($despachounico) ?>">
                                <input type="hidden" name="requisicion_id" value="<?php echo ($idreq) ?>">
                                <input type="hidden" name="insumo_id" value="<?php echo ($insumo_id_insumo) ?>">
                                <input type="hidden" name="salida_id" value="<?php echo ($entrada_id) ?>">
                                <input type="hidden" name="fecha_registro" value="<?php echo ($campofecha) ?>">
                                <input type="hidden" name="estado_detalle_salida" value="0">
                                <input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual) ?>">
                                <input type="hidden" name="creado_por" value="<?php echo ($IdSesion) ?>">
                                <input type="hidden" name="salida_por" value="Entrega RQ">
                                <input type="hidden" name="estado_recibido" value="Pendiente">


        <td>RQ<?php echo ($rqprincipal . "-IT" . $despachounico); ?></td>
        <td><?php echo ($nombreinsumo); ?></td>
        <td><?php echo ($Unombredmedida); ?></td>
    <td><input id="campocomprado<?php echo ($despachounico); ?>" disabled="" class='input input-group-sm' type="text" value="<?php echo ($cantidad); ?>"></td>
 <td>
    <input disabled="" class='input input-group-sm' type="text" value="<?php echo ($cant_anteriores); ?>">
    <a data-toggle="modal" data-target="#modal-form-<?php echo ($despachounico); ?>" href="#"  class=""><i class="fa fa-calendar text-success"></i></a>

        <!-- Inicio Modal Clientes -->

    <div id="modal-form-<?php echo ($despachounico); ?>" class="modal" tabindex="-1">
               <!-- Inicio Modal -->
    <div>


                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a href="#" type="button" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="black bigger">Entregas Anteriores OC00<?php echo ($despachounico); ?></h4>
                      </div>

                      <div class="col-md-12 col-xs-12">
                         <table class="table table-hover" style="font-size: 13px;">
                            <tr class='success'>
                                <th>Fecha</th>
                                <th>Entregado por</th>
                                <th>Cantidad</th>
                                <th>Entrega Nº</th>
                            </tr>
                         <?php

    $detallesent = Inventario::obtenerListaSalidas($despachounico);
    foreach ($detallesent as $campodetalle) {
        $idsalida              = $campodetalle['id'];
        $item_id               = $campodetalle['item_id'];
        $cantidaddetalle       = $campodetalle['cantidad'];
        $salida_id             = $campodetalle['salida_id'];
        $fecha_registro        = $campodetalle['fecha_registro'];
        $estado_detalle_salida = $campodetalle['estado_detalle_salida'];
        $marca_temporal        = $campodetalle['marca_temporal'];
        $creado_por            = $campodetalle['creado_por'];
        $nomusuario            = Usuarios::obtenerNombreUsuario($creado_por);
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
                                                                                <?php echo ($salida_id); ?>
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
  <?php
if ($sumaanteriorestemp == 0) {
        $variable = 1;
    } else {
        $variable = 0;
    }
    $contadorpagos += $variable;
    $valorinsumos = $cant_anteriorestemp * $valorpromedio;

    $contadorsumainsumo += $valorinsumos;

    ?>
    <input type="hidden" value="<?php echo (round($valorpromedio, 0)); ?>" name="valor_entregado">

<input disabled="" id="campocarga<?php echo ($despachounico); ?>" class='input input-group-sm' type="text" value="<?php echo ($cant_anteriorestemp); ?>">
 <a href="?controller=inventario&action=deletedellsalidatemp&&id=<?php echo ($idreq); ?>&&iddelete=<?php echo ($despachounico); ?>&&des=<?php echo ($itemsget); ?>"><i class="fa fa-close text-danger"></i></a>
<br>
<?php
if ($cant_anteriorestemp == 0) {
        echo ("<span><small class='text-danger'  id='<?php echo($despachounico); ?>msjporitem1'>Campo en cero</small></span>");
        ?>
            <script>
                $(document).ready(function(){
                    document.getElementById("botonguardar").disabled = true;
                    $("#mensajealerta").slideToggle(100);
                });
            </script>

            <?php
} elseif ($cant_anteriorestemp < $pendiente) {
        echo ("<span><small class='text-success'  id='<?php echo($despachounico); ?>msjporitem1'>Entrega Parcial</small></span>");
    } elseif ($cant_anteriorestemp > $pendiente) {
        echo ("<span><small class='text-danger' id='<?php echo($despachounico); ?>msjporitem1'>Supera el Valor</small></span>");
    } elseif ($cant_anteriorestemp == $pendiente) {
        echo ("<span><small class='text-success' id='<?php echo($despachounico); ?>msjporitem1'>Entrega Completa</small></span>");
    }
    ?>

 </td>
        <td><input id="" class='input input-sm' type="text" name="cantidad" value="<?php echo ($pendiente); ?>"></td>
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
                <td> <strong><?php echo ($sumaanteriorestemp); ?> </strong></td>
                <td> <strong><?php echo ($pendientetotal); ?> </strong></td>

    <input id="inputcantidadrecibida" type="hidden" value="<?php echo ($sumaanteriorestemp); ?>">
    <input id="inputcantidacomprada" type="hidden" value="<?php echo ($pendientetotal); ?>">

            </tr>

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

    <form role="form" action="?controller=inventario&action=actualizarsalidarq&&id=<?php echo ($idreq); ?>&&des=<?php echo ($itemsget) ?>" method="POST" enctype="multipart/form-data">

                                <?php

date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
$campofecha   = date('Y-m-d');

?>
                   

                    <input type="hidden" name="fecha_recepcion" value="<?php echo ($campofecha); ?>">
                    <input type="hidden" name="requisicion_id" value="<?php echo ($idreq); ?>">
                    <input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual); ?>">
                    <input type="hidden" name="creado_por" value="<?php echo ($IdSesion); ?>">
                    <input type="hidden" name="estado_salida" value="Despachado">
                    <input type="hidden" name="tipo_salida" value="Despacho RQ-<?php echo ($idreq); ?>">
                    <input type="hidden" name="items" value="<?php echo ($itemsget); ?>">
                    <input  type="hidden" name="valor_salida" value="<?php echo ($contadorsumainsumo); ?>">

                              <div class="card-body">

<div  id="" class="col-md-4">
                                    <div class="form-group">
                                    <label> Solicitado por: <span>*</span></label>

                                <select class="form-control mi-selector" id="solicitado_por" name="solicitado_por" required>
                                        <option value="<?php echo ($solicitado_por); ?>" selected><?php echo utf8_encode($nomsolicita); ?></option>
                                        <?php
$rubros = Usuarios::ListaUsuariosOperadores();
foreach ($rubros as $campo) {
    $id_usuario     = $campo['id_usuario'];
    $nombre_usuario = $campo['nombre_usuario'];
    ?>
                                        <option value="<?php echo $id_usuario; ?>"><?php echo utf8_encode($nombre_usuario); ?></option>
                                        <?php }?>
                                </select>
                                                </div>
</div>


            <div id="" class="col-md-4">
                                                <div class="form-group">
                                                    <label> Proyecto Solicitante: <span>*</span></label>
                                <select class="form-control mi-selector" id="proyecto_id_proyecto" name="proyecto_id_proyecto" required>

                                        <option value="<?php echo ($proyecto_id_proyecto); ?>" selected><?php echo utf8_encode($nombreproyecto); ?></option>
                                        <?php
$rubros = Proyectos::obtenerListaProyectos();
foreach ($rubros as $campo) {
    $id_proyecto     = $campo['id_proyecto'];
    $nombre_proyecto = $campo['nombre_proyecto'];
    ?>
                                        <option value="<?php echo $id_proyecto; ?>"><?php echo utf8_encode($nombre_proyecto); ?></option>
                                        <?php }?>
                                </select>
                                                </div>
                                            </div>
            <div id="" class="col-md-4">
                        <div class="form-group">
                          <label> Insumo aplica a un Equipo: <span>*</span></label>
                <select class="form-control" id="foo" name="aplica_equipo" required>
                    <option value="" selected="">Seleccionar...</option>
                    <option value="Si">Si</option>
                    <option value="No" >No</option>

                </select>
                        </div>
</div>
 <div id="campoequipo" style="display:none;"  class="col-md-12">
                        <div class="form-group">
                          <label> Seleccione el Equipo: <span>*</span></label>
                         <select style="width:300px;" class="form-control mi-selector" id="selectequipo" name="equipo_id_equipo" >
                            <option value="" selected>Seleccionar...</option>
                             <option value="10000" >Otros</option>
                            <?php
$campamentos = Equipos::obtenerListaEquiposAsf();
foreach ($campamentos as $campamento) {
    $id_equipo     = $campamento['id_equipo'];
    $nombre_equipo = $campamento['nombre_equipo'];
    ?>
                            <option value="<?php echo $id_equipo; ?>"><?php echo utf8_encode($nombre_equipo); ?></option>
                            <?php }?>
                          </select>

                        </div>
                      </div>
                      <script type="text/javascript">
 $('#foo').change(function() {
    var el = $(this);
    if(el.val() === "Si") {
      alert("Selecione el Equipo");
          $('#campoequipo').show();
          document.getElementById("selectequipo").required = true;

    } else {
          $('#campoequipo').hide();
         document.getElementById("selectequipo").required = false;
        var mySelect = document.getElementById("selectequipo");
        var addOption2 = function(select,txt,value){
        var opt = new Option(txt,value);
            console.log(typeof opt)
            select.appendChild(opt);
            }
            addOption2(mySelect,"0","0");


    }
});
</script>
            <div  id="" class="col-md-4">
                                                <div class="form-group">
                                                    <label> Entregado a: <span>*</span></label>

                                        <select class="form-control mi-selector" id="recibido_por" name="recibido_por" required>
                                        <option value="" selected>Seleccionar</option>
                                        <?php
$rubros = Usuarios::ListaUsuariosOperadores();
foreach ($rubros as $campo) {
    $id_usuario     = $campo['id_usuario'];
    $nombre_usuario = $campo['nombre_usuario'];
    ?>
                                        <option value="<?php echo $id_usuario; ?>"><?php echo utf8_encode($nombre_usuario); ?></option>
                                        <?php }?>
                                </select>
                                                </div>
        </div>
         <div  class="col-md-4">
                                                <div class="form-group">
                                                    <label>Fecha Salida<span>*</span></label>
                                   <input type="date" name="fecha_reporte" placeholder="Fecha" class="form-control required" required id="fecha_reporte">
                                                </div>
                                </div>
         

                                <div  class="col-md-4">
                                                <div class="form-group">
                                                    <label>Observaciones<span>*</span></label>
                                    <textarea class="form-control" rows="2" id="descripcion" name="observaciones"></textarea>
                                                </div>
                                </div>

                <div class="col-md-4">
                        <label for="">Estado de la entrega:</label>
                        <div class="form-group">
                          <select style="width:300px;" class="mi-selector" name="estadoOC" id="estadoOC" required="">
                          </select>
                        </div>

                </div>



                                </div>


                         <div class="card-footer">
                              <button id="botonguardar" style="display:none;" name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Enviar y notificar a Usuario</button>
                              <br>
                              <small class="text-danger">
                                <strong id="mensajealerta" style="display:none;">
                                  Verifique las cantidades (Un item está en cero (0).)
                              </strong>
                              <strong id="mensajealerta2" style="display:none;">
                                  Verifique las cantidades (Lo enviado supera las cantidades compradas)
                              </strong>
                                <strong id="mensajealerta3" style="display:none;">
                                  Se realizará una entrega parcial
                              </strong>
                          </small>
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

<script type="text/javascript">
$(document).ready(function(){


        var recibido = $("#inputcantidadrecibida").val();
        var pendiente = $("#inputcantidacomprada").val();

       // Verificar que las cantidades recibidas no superen las compradas.

        if (recibido<pendiente) {
         $("#botonguardar").slideToggle(100);
        var mySelect = document.getElementById("estadoOC");
        var addOption2 = function(select,txt,value){
        var opt = new Option(txt,value);
            console.log(typeof opt)
            select.appendChild(opt);
            }
            addOption2(mySelect,"Entrega Parcial","Entrega Parcial");

        }
        else if(recibido==pendiente){
             $("#botonguardar").slideToggle(100);
            var mySelect = document.getElementById("estadoOC");
        var addOption2 = function(select,txt,value){
        var opt = new Option(txt,value);
            console.log(typeof opt)
            select.appendChild(opt);
            }
            addOption2(mySelect,"Entrega Completa","Entrega Completa");
        }
        else if(recibido>pendiente){
             $("#botonguardar").hide(100);
              $("#mensajealerta2").slideToggle(100);
            var mySelect = document.getElementById("estadoOC");
        var addOption2 = function(select,txt,value){
        var opt = new Option(txt,value);
            console.log(typeof opt)
            select.appendChild(opt);
            }
            addOption2(mySelect,"Verificar Cantidades","Verificar Cantidades");
        }
        else{
             $("#botonguardar").hide(100);
             $("#mensajealerta").slideToggle(100);
             var mySelect = document.getElementById("estadoOC");
        var addOption2 = function(select,txt,value){
        var opt = new Option(txt,value);
            console.log(typeof opt)
            select.appendChild(opt);
            }
            addOption2(mySelect,"Campo en Cero","");
        }


});
</script>

<script>
  $(function () {

    $('.select2').select2()


  })
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
<!-- Inicio Libreria formato moneda -->
<script src="dist/js/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">
$("#demo").maskMoney({
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
