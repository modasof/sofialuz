<?php
ini_set('display_errors', '0');
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';

include_once 'modelos/proveedores.php';
include_once 'controladores/proveedoresController.php';

include_once 'modelos/equipostemporales.php';
include_once 'controladores/equipostemporalesController.php';

include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';

include_once 'modelos/proyectos.php';
include_once 'controladores/proyectosController.php';

include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

//id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones.

if (isset($_POST['daterange'])) {
    $fechaform = $_POST['daterange'];
} elseif (isset($_GET['daterange'])) {
    $fechaform = $_GET['daterange'];
}

$idproveedor = $_GET['id'];
$Subtotalcot = SubtotalProveedor($idproveedor, "1");
$mediopago   = ObtenerMediopago($idproveedor, "1");

date_default_timezone_set("America/Bogota");
$MarcaTemporal  = date('Y-m-d');
$FechaInicioDia = ($MarcaTemporal . " 00:00:000");
$FechaFinalDia  = ($MarcaTemporal . " 23:59:000");
//echo("FECHA QUE LLEGA:".$fechaform."<br>");

if ($fechaform != "") {
    $arreglo         = explode("-", $fechaform);
    $FechaIn         = $arreglo[0];
    $FechaFn         = $arreglo[1];
    $vectorfechaIn   = explode("/", $FechaIn);
    $vectorfechaFn   = explode("/", $FechaFn);
    $arreglofechauno = $vectorfechaIn[2] . "-" . $vectorfechaIn[0] . "-" . $vectorfechaIn[1];
    $arreglofechados = $vectorfechaFn[2] . "-" . $vectorfechaFn[0] . "-" . $vectorfechaFn[1];

    $FechaUno = str_replace(" ", "", $arreglofechauno);
    $FechaDos = str_replace(" ", "", $arreglofechados);
}

// Validación de la fecha en que inicia el Día

if ($FechaUno == "") {
    $FechaStart  = $FechaInicioDia;
    $datofechain = $MarcaTemporal;
} else {
    $FechaStart  = ($FechaUno . " 00:00:000");
    $datofechain = $FechaUno;
}
// Validación de la fecha en que Termina el Día
if ($FechaDos == "") {
    $FechaEnd       = $FechaFinalDia;
    $datofechafinal = $MarcaTemporal;
} else {
    $FechaEnd        = ($FechaDos . " 23:59:000");
    $limpiarvariable = str_replace(" ", "", $FechaDos);
    $datofechafinal  = $limpiarvariable;
}

?>

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Content Wrapper. Contains page content -->



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Solicitudes Pendientes</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item"><a href="?controller=compras&&action=todos">Panel Compras</a></li>
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
            <div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->

            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                 <li><a href="?controller=cotizaciones&&action=todos"><strong> <i class="fa fa-external-link-square"></i> Cotizaciones Aprobadas</strong> <span class="pull-right badge bg-blue"></span></a></li>
                <li><a href="?controller=requisiciones&&action=cotizaciones"><strong> <i class="fa fa-external-link-square"></i> Cargar Cotizaciones Pendientes</strong> <span class="pull-right badge bg-blue"></span></a></li>
               <?php
$res    = Requisiciones::cotizaciones();
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $proveedor_id_proveedor = $campo['proveedor_id_proveedor'];
    $nomproveedor           = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);

    if ($idproveedor==$proveedor_id_proveedor) {
    ?>

                <li>

                  <a class="bg bg-success" href="?controller=requisiciones&&action=vercotizacion&&id=<?php echo ($proveedor_id_proveedor); ?>"><strong><?php echo ($nomproveedor); ?></strong></a>
                </li>
                <?php
            }else{

              ?>
               <li>

                  <a  href="?controller=requisiciones&&action=vercotizacion&&id=<?php echo ($proveedor_id_proveedor); ?>"><?php echo ($nomproveedor); ?></a>
                </li>



              <?php

            }


}
?>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
            <div class="col-md-9 col-xs-12">

      <!-- title row -->
      <div class="row">
       
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-5 invoice-col">
          Solicitado por:
          <address>
            <strong>Soluciones de Ingeniería Nómadas</strong><br>
            Dirección:<small>CRA 11 Nº7-05 B/ NOVA CERETE</small><br>
            Celular: (310) 641-4831<br>
            E-mail: <a href="mailto:contabilidad@solucionesnomadas.com">contabilidad@solucionesnomadas.com</a>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-5 invoice-col">
          Proveedor:
          <address>
            <?php
$res    = Proveedores::obtenerPaginaPor($idproveedor);
$campos = $res->getCampos();

foreach ($campos as $campo) {
    $nombrepara = $campo['nombre_proveedor'];
    $nit        = $campo['nit'];
    $contacto   = $campo['contacto'];
    $telefonos  = $campo['telefonos'];
    $correo     = $campo['correo'];
    ?>
            <strong><?php echo ($nombrepara) ?></strong><br>
            Nit: <?php echo ($nit) ?><br>
            Teléfonos: <?php echo ($telefonos); ?><br>
            Email: <a href="mailto:<?php echo ($correo) ?>"><?php echo ($correo); ?></a>
          </address>
          <?php
}
?>
        </div>
        <!-- /.col -->
        <div class="col-sm-2 invoice-col">
          <b>Orden Compra #N<?php echo ($MarcaTemporal) ?></b><br>
          <br>

         
          <?php
$mediopago = ObtenerMediopago($idproveedor, "1");
//echo ($mediopago);
?>
          <br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <form action="?controller=requisicionesitems&action=guardarocompra" method="post" id="formularioppal">
  <button id="btncrearorden" style="display:none;"  onclick="submitform(); return false;" type="submit" class="btn btn-success btn-xs pull-right"><i class="fa fa-check"></i> Autorizar Orden
  </button>
<?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
$DiaActualfor = date('Y-m-d');
?>
        <input type="hidden" name="imagen" value="0">
       
        <input type="hidden" name="fecha_reporte" value="<?php echo ($DiaActualfor); ?>">
        <input type="hidden" name="valor_total" value="<?php echo ($Subtotalcot); ?>">
        <input type="hidden" name="valor_retenciones" value="0">
        <input type="hidden" name="factura" value="0">
        <input type="hidden" name="estado_recibido" value="Pendiente Llegada">
        <input type="hidden" name="estado_orden" value="1">
        <input type="hidden" name="proveedor_id_proveedor" value="<?php echo ($idproveedor); ?>">
        
        <input type="hidden" name="observaciones" value="Orden de compra creada correctamente">
        <input type="hidden" name="marca_temporal" value="<?php echo $TiempoActual ?>">
        <input type="hidden" name="usuario_creador" value="<?php echo $IdSesion ?>">


         
         
          <b>Método de pago:</b>
          <select name="medio_pago" >
                    <option selected="" value="<?php echo($mediopago) ?>"><?php echo($mediopago); ?></option>
                     <option value="A convenir">A convenir</option>
                    <option value="Contado">Contado</option>
                    <option value="Credito">Crédito</option>
          </select>
          <br>
       

         

          <table class="table table-striped" style="font-size:13px;">
            <thead>
            <tr>
              <th>Código
                 <input type="checkbox" id="seleccionar-todos"> 
              </th>
              <th>Detalle</th>
              <th>Cantidades</th>
              <th>Unidad</th>
              <th>Vr. Unitario</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
              <?php
$res    = Requisiciones::vercotizacion($idproveedor);
$campos = $res->getCampos();
//(id, proveedor_id_proveedor, cotizacion, medio_pago, item_id, valor_cot, requisicion_id, marca_temporal, usuario_creador, estado_cotizacion, ordencompra_num)
foreach ($campos as $campo) {

    $id1                    = $campo['id'];
    $proveedor_id_proveedor = $campo['proveedor_id_proveedor'];
    $cotizacion             = $campo['cotizacion'];
    $medio_pago1            = $campo['medio_pago'];
    $item_id1               = $campo['item_id'];
    $valor_cot1             = $campo['valor_cot'];
    $requisicion_id         = $campo['requisicion_id'];
    $marca_temporal         = $campo['marca_temporal'];
    $usuario_creador        = $campo['usuario_creador'];
    $estado_cotizacion      = $campo['estado_cotizacion'];
    $insumo_id_insumo       = $campo['insumo_id_insumo'];
    $servicio_id_servicio   = $campo['servicio_id_servicio'];
    $equipo_id_equipo       = $campo['equipo_id_equipo'];
    $cantidad               = $campo['cantidad'];
    $cantidadoriginal += $cantidad;
    $canticotizada1  = $campo['cantidadcot'];
    $imagencot1       = imagencot($item_id1, $cotizacion);

    $idproyecto= requisiciones::obtenerIdproyectoporRQ($requisicion_id);
    $idcreador= requisiciones::obtenerIdCreadoporRQ($requisicion_id);
    $rubrorq = requisiciones::obtenerRubroidRQ($requisicion_id);
    $subrubrorq = requisiciones::obtenerSubRubroidRQ($requisicion_id);
    $nomcreador = Usuarios::ObtenerNombreUsuario($idcreador);
    $nomproyecto = Proyectos::obtenerNombreProyecto($idproyecto);
    $primerproveedor = Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
    $nominsumo       = Insumos::obtenerNombreInsumo($insumo_id_insumo);
    $unidadmedidaid  = Insumos::obtenerUnidadmed($insumo_id_insumo);
    $nomunidadmedida = Unidadesmed::obtenerNombre($unidadmedidaid);
    $valorunitario1  = $valor_cot1 / $canticotizada1;
    $cantorigen1 += $canticotizada1;



    if ($insumo_id_insumo != '0') {
        $insumo_id_insumo  = ObtenerIdInsumo($item_id1);
        $cantidad          = ObtenerCantidadSolicitada($item_id1);
        $detallesolicitado = Insumos::obtenerNombreInsumo($insumo_id_insumo);
        $valorpromedio     = Insumos::Valorpromediocompra($insumo_id_insumo);
        $unidadmedidaid    = Insumos::obtenerUnidadmed($insumo_id_insumo);
        $nomunidadmedida   = Unidadesmed::obtenerNombre($unidadmedidaid);
        $label             = 'Insumos';
    } elseif ($servicio_id_servicio != '0') {
        $servicio_id_servicio = ObtenerIdServicio($item_id1);
        $cantidad             = ObtenerCantidadSolicitada($item_id1);
        $unidadmedidaid       = Servicios::obtenerUnidadServicio($servicio_id_servicio);
        $nomunidadmedida      = Unidadesmed::obtenerNombre($unidadmedidaid);
        $detallesolicitado    = Servicios::obtenerNombre($servicio_id_servicio);
        $label                = 'Servicios';
    } elseif ($equipo_id_equipo != '0') {
        $equipo_id_equipo  = ObtenerIdEquipo($item_id1);
        $cantidad          = ObtenerCantidadSolicitada($item_id1);
        $detallesolicitado = Equipostemporales::obtenerNombre($equipo_id_equipo);
        $unidadmedidaid    = Equipostemporales::obtenerUnidadmed($equipo_id_equipo);
        $nomunidadmedida   = Unidadesmed::obtenerNombre($unidadmedidaid);
        $label             = 'Equipos';
    }

    ?>
                <tr>
              <td class="success">

                <i class="fa fa-caret-square-o-right"></i> <small id="primerrefresh<?php echo ($id1); ?>"></small>
                <?php if ($imagencot1!='') {
                ?>

             <a target="_blank" href="<?php echo($imagencot1); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-file-pdf-o bigger-110 "> Ver Soporte</i>
              </a>

                <?php
            }else{
                //echo("<i class='fa fa-ban bigger-110 bg-red'> Sin Soporte </i>");
            } 

            ?>

               
              </td>
              <td class="success">
               <strong><?php echo ($detallesolicitado); ?>
                 <br>
                 <span class="bg-blue">
                 Proyecto : <?php echo($nomproyecto); ?> 
                  <i data-toggle="tooltip" data-placement="top" title="Solicitado por: <?php echo($nomcreador); ?>" class="fa fa-question-circle"></i>
                  </span>
               </strong>
              </td>
              <td class="success">
                <?php
# =========================================================
    # =           Validación de Cantidades por Item           =
    # =========================================================

    $cantidadoriginal = $cantidad;

    if ($insumo_id_insumo != '0') {

  $estadocotizado1  = round(Cotizacionesporcantdeinsumos($item_id1, $requisicion_id, $insumo_id_insumo, "1"),1);
  $estadocotizado2  = round(Cotizacionesporcantdeinsumos($item_id1, $requisicion_id, $insumo_id_insumo, "2"),1);

       
    } elseif ($servicio_id_servicio != '0') {

  $estadocotizado1  = round(Cotizacionesporcantdeservicios($item_id1, $requisicion_id, $servicio_id_servicio, "1"),1);
  $estadocotizado2  = round(Cotizacionesporcantdeservicios($item_id1, $requisicion_id, $servicio_id_servicio, "2"),1);

       
    } elseif ($equipo_id_equipo != '0') {

  $estadocotizado1  = round(Cotizacionesporcantdeequipos($item_id1, $requisicion_id, $equipo_id_equipo, "1"),1);
  $estadocotizado2  = round(Cotizacionesporcantdeequipos($item_id1, $requisicion_id, $equipo_id_equipo, "2"),1);
       
    }


    $cantidadfinal = $cantidadoriginal - $estadocotizado2;

    $sumarcantidadfinal+=$cantidadfinal;
    $sumatotalcotizado1 +=$estadocotizado1;

    if ($estadocotizado1 > $cantidadfinal) {
        echo ("<strong class='text-danger'>" . round($estadocotizado1, 2) . " <i class='fa fa-warning'> </i></strong>");
        $variablesum += 1;
    } elseif ($estadocotizado1 < $cantidadfinal) {
        echo ("<strong class='text-danger'>" . round($estadocotizado1, 2) . " <i class='fa fa-warning'> </i></strong>");
        $variablesum += 1;
    } elseif ($estadocotizado1 == $cantidadfinal) {
        echo ("<strong class='text-success'>" . round($estadocotizado1, 2) . " <i class='fa fa-check'> </i></strong>");
        $variablesum += 0;
    }

    # ======  End of Validación de Cantidades por Item  =======

    ?>
              </td>
               <td class="success" colspan="3"></td>
               <td class="success" colspan="2">

                <?php if ($estadocotizado1 == $cantidadfinal) {
        ?>
                 

                  <?php
} else {
        ?>
                  <small class="text-danger">Verificar Cantidades</small>
                  <?php
}

    ?>

               </td>
             </tr>
            <tr>
              <td id="listado">

               RQ <?php echo ($requisicion_id . "-" . $item_id1); 

               ?>
                <input type="checkbox" value="<?php echo ($item_id1); ?>" name="items[]" onclick="marcardespacho(<?php echo $item_id1; ?>)" style="cursor: pointer;">
                <input type="hidden" value="<?php echo ($label) ?>" name="compra_de">
                <input type="hidden" name="imagen_cot" value="<?php echo($imagencot1); ?>">
                <input type="hidden" name="rubro_id" value="<?php echo($rubrorq); ?>">
                <input type="hidden" name="subrubro_id" value="<?php echo($subrubrorq); ?>">

          </td>
</form>
              <?php 


               ?>
              
            
              <td>
                               <small>Proveedor: </small><?php echo ($primerproveedor); ?>
              </td>
              <td><?php echo ($canticotizada1 . " de " . $cantidadfinal); ?></td>
              <td><?php echo ($nomunidadmedida); ?></td>
               <td><?php echo ("$ " . number_format($valorunitario1, 0)); ?></td>
              <td><?php echo ("$ " . number_format($valor_cot1, 0)); ?></td>
              <td><?php echo ($medio_pago1); ?></td>
               <td><a href="#" onclick="eliminar(<?php echo $id1; ?>);" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Eliminar">
                <i class="fa fa-trash bigger-110 "></i>
              </a>
              <a data-toggle="modal" data-target="#modale-form<?php echo ($id1) ?>" href="#" class="">
                <i class="fa fa-edit bigger-110 "></i>
              </a>
               <!-- Inicio Modal Productos-->
    <div id="modale-form<?php echo ($id1) ?>" class="modal" tabindex="-1">
               <!-- Inicio Modal -->
    <div>

<form action="?controller=requisicionesitems&&action=actualizarcantidadcot&&id=<?php echo ($idproveedor) ?>" method="post"  autocomplete="off">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a href="CrearVenta.php" type="button" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="black bigger">Editar Cantidades:</h4>
                      </div>
                       <div class="col-md-12 col-xs-12">
                          <div class="form-group">
                          <label>Cantidad Máxima (<?php echo ($cantidadfinal); ?>)<span>*</span></label>
                          <input type="number" step="any" name="cantidad" placeholder="Indique la cantidad" class="form-control" required value="" id="cantidadform1<?php echo ($id1); ?>">
                          <small>Decimales separados con punto</small>
                        </div>
                          <input type="hidden" name="id" value="<?php echo ($id1); ?>" id="idform1<?php echo ($id1); ?>">
                          <input type="hidden" name="proveedor" value="<?php echo ($idproveedor); ?>" id="provform1<?php echo ($id1); ?>">
                          <input type="hidden" name="valorunitario" value="<?php echo ($valorunitario1); ?>" id="valorunitarioform1<?php echo ($id1); ?>">

                          <br>
                      <br>
                      </div>
                      <div class="modal-footer">
                        <a href="" class="btn btn-sm btn-danger" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Cancelar
                        </a>
                        <a href="" id="guardarcantidadesform1<?php echo ($id1); ?>" class="btn btn-sm btn-success" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Confirmar
                        </a>
                      </div>
                    </div>
                  </div>
</form>
                </div><!-- PAGE CONTENT ENDS -->

<script type="text/javascript">
$(document).ready(function(){
    $('#guardarcantidadesform1<?php echo ($id1) ?>').click( function() {
        var idform1 = $('#idform1<?php echo ($id1) ?>').val();
         var cantidadform1 = $('#cantidadform1<?php echo ($id1) ?>').val();
          var valorunitarioform1 = $('#valorunitarioform1<?php echo ($id1) ?>').val();
           var provform1 = $('#provform1<?php echo ($id1) ?>').val();
        //alert (valorunitarioform1);
        if(idform1){
            $.ajax({
                type:'POST',
                url:'vistas/requisiciones/request1.php',
                data:'idform1='+idform1+'&&cantidadform1='+cantidadform1+'&&valorunitarioform1='+valorunitarioform1+'&&provform1='+provform1,
                success:function(html){
                    $('#primerrefresh<?php echo ($id1); ?>').html(html);
                }
            });
        }else{
            $('#primerrefresh<?php echo ($id1); ?>').html('todo ok');

        }
    });
});
</script>
 </div>
 <!-- FINAL MODAL -->
            </td>
            </tr>

            <?php
$ver       = Requisiciones::vermascotizaciones($item_id1, $idproveedor);
    $camposver = $ver->getCampos();
    foreach ($camposver as $campo2) {
        $id2                 = $campo2['id'];
        $otroproveedor       = $campo2['proveedor_id_proveedor'];
        $item_id2            = $campo2['item_id'];
        $medio_pago2         = $campo2['medio_pago'];
        $cotizacion2         = $campo2['cotizacion'];
        $requisicion_id2     = $campo2['requisicion_id'];
        $nombreotroproveedor = Proveedores::obtenerNombreProveedor($otroproveedor);
        $valor_cot2          = $campo2['valor_cot'];
        $cantidad2           = $campo2['cantidad'];
        $canticotizada2      = $campo2['cantidadcot'];
        $valorunitario2      = $valor_cot2 / $canticotizada2;
        $cantorigen2 += $canticotizada2;
        $imagencot2       = imagencot($item_id2, $cotizacion2);
        ?>
                  <tr class="info">
                    <td>


                      RQ <?php echo ($requisicion_id2 . "-" . $item_id2); ?>
                     <?php if ($imagencot1!='') {
                ?>

             <a target="_blank" href="<?php echo($imagencot2); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-file-pdf-o bigger-110 "> Ver Soporte</i>
              </a>

                <?php
            }else{
                //echo("<i class='fa fa-ban bigger-110 bg-red'> Sin Soporte </i>");
            } 

            ?>

                      </td>
              <td><small>Proveedor : </small><?php echo ($nombreotroproveedor); ?>
              <br>
              <small id="segundorefresh<?php echo ($id2); ?>"></small>
            </td>
              <td><?php echo ($canticotizada2 . " de " . $cantidadfinal); ?></td>
              <td><?php echo ($nomunidadmedida); ?></td>
              <td><?php echo ("$ " . number_format($valorunitario2, 0)); ?></td>
              <td><?php echo ("$ " . number_format($valor_cot2, 0)); ?></td>
               <td><?php echo ($medio_pago2); ?></td>
              <td><a href="#" onclick="eliminar(<?php echo $id2; ?>);" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Eliminar">
                <i class="fa fa-trash bigger-110 "></i>
              </a>
                <a data-toggle="modal" data-target="#modal-form<?php echo ($id2) ?>" href="#" class="">
                <i class="fa fa-edit bigger-110 "></i>
              </a>
                <!-- Inicio Modal Productos-->
    <div id="modal-form<?php echo ($id2) ?>" class="modal" tabindex="-1">
               <!-- Inicio Modal -->
    <div>

<form action="?controller=requisicionesitems&&action=actualizarcantidadcot&&id=<?php echo ($idproveedor) ?>" method="post" id="FormArpetura" autocomplete="off">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a href="CrearVenta.php" type="button" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="black bigger">Editar Cantidades:</h4>
                      </div>

                       <div class="col-md-12 col-xs-12">
                          <div class="form-group">
                          <label>Cantidad Máxima (<?php echo ($cantidad) ?>)<span>*</span></label>
                          <input type="number" step="any" name="cantidad" placeholder="Indique la cantidad" class="form-control" required value="" id="cantidadform2<?php echo ($id2) ?>">
                          <small>Decimales separados con punto</small>
                        </div>
                          <input type="hidden" name="id" value="<?php echo ($id2) ?>" id="idform2<?php echo ($id2) ?>">
                        <input type="hidden" name="proveedor" value="<?php echo ($idproveedor) ?>" id="provform2<?php echo ($id2) ?>">
                          <input type="hidden" name="valorunitario" value="<?php echo ($valorunitario2) ?>" id="valorunitarioform2<?php echo ($id2) ?>">

                          <br>
                      <br>
                      </div>

                      <div class="modal-footer">
                        <a href="" class="btn btn-sm btn-danger" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Cancelar
                        </a>
                         <a href="" id="guardarcantidades<?php echo ($id2) ?>" class="btn btn-sm btn-success" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Confirmar
                        </a>


                      </div>
                    </div>
                  </div>
  </form>
                </div><!-- PAGE CONTENT ENDS -->
        <script type="text/javascript">
$(document).ready(function(){
    $('#guardarcantidades<?php echo ($id2) ?>').click( function() {
        var idform2 = $('#idform2<?php echo ($id2) ?>').val();
         var cantidadform2 = $('#cantidadform2<?php echo ($id2) ?>').val();
          var valorunitarioform2 = $('#valorunitarioform2<?php echo ($id2) ?>').val();
          var provform2 = $('#provform2<?php echo ($id2) ?>').val();
        //alert (valorunitarioform2);
        if(idform2){
            $.ajax({
                type:'POST',
                url:'vistas/requisiciones/request2.php',
                data:'idform2='+idform2+'&&cantidadform2='+cantidadform2+'&&valorunitarioform2='+valorunitarioform2+'&&provform2='+provform2,
                success:function(html){
                    $('#segundorefresh<?php echo ($id2) ?>').html(html);
                }
            });
        }else{
            $('#segundorefresh<?php echo ($id2) ?>').html('todo ok');

        }
    });
});
</script>

 </div>
 <!-- FINAL MODAL -->

            </td>
                  </tr>

                  <?php
}
    ?>
           <?php
}
?>
            </tbody>
          </table>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
       
        <!-- /.col -->
        <div class="col-xs-12 col-md-12">

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>
  <input type="hidden" id="sumatotalcotizado1" name="sumacantidades" value="<?php echo($sumatotalcotizado1) ?>">
  <input type="hidden" id="sumarcantidadfinal" name="sumacantidades" value="<?php echo($sumarcantidadfinal) ?>">

                  <?php

echo ("$" . number_format($Subtotalcot, 0));
?>
                </td>
              </tr>

              <tr>
                <th>Medio Pago:</th>
                <td>
                   <?php

echo ($mediopago);
?>
                </td>
              </tr>

            </table>
          </div>
        </div>
       
      
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->

     

            </div>
          </div> <!-- FIN DE ROW-->
        </div><!-- FIN DE CONTAINER FORMULARIO-->
      </div> <!-- Fin Row -->
    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->


</div> <!-- Fin Content-Wrapper -->
<script>
  $(document).ready(function(){
   
        var totalcotizaco = $("#sumatotalcotizado1").val();
        var totaloriginal = $("#sumarcantidadfinal").val();

       if (totalcotizaco==0 && totaloriginal==0) {
              $("#btncrearorden").hide("slow");
        }
        else if (totalcotizaco==totaloriginal){
                $("#btncrearorden").slideToggle(100); 
        }
});
</script>
<script>
      function submitform(){
        alert("Orden cargada a Proveedor <?php echo ($nombrepara); ?>");
        document.getElementById('#formularioppal').submit();
      }
    </script>

<script>
function eliminar(id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=requisiciones&&action=eliminaritemcot&&iddeleteitem="+id+"&id="+<?php echo ($idproveedor); ?>;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>
<!-- Inicio Libreria formato moneda -->

<script>
      $(function(){
        $('#seleccionar-todos').change(function() {
          $('#listado > input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });
      });
</script>


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
          <script src="dist/js/buttons.colVis.min.js"></script>
          <script src="dist/js/buttons.print.min.js"></script>
           <script src="dist/js/dataTables.select.min.js"></script>
           <script src="dist/js/buttons.flash.min.js"></script>


<!-- page script -->
<script>
  $(function () {
    $('#cotizaciones33').DataTable({
      "paging": true,
      "lengthChange": true,
      "lengthMenu": [[25, 50, 150, -1], [25, 50, 150, "All"]],
      "searching": true,
      "order": [[ 0, "asc" ]],
      "ordering": true,
      "info": true,
      "autoWidth": false,
    language: {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}

    });
  });
</script>
<script>
   function format2(n, currency) {
    return currency + " " + n.toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
function formatmoneda(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
        $(document).ready(function() {
    $('#example').DataTable( {
         "searching": true,
        "ordering": true,
        "paging":   true,
        "info":     true,
        "aLengthMenu": [[100, 200, 300, -1], [100, 200, 300, "Todas"]],
    "pageLength": 100,


    } );
} );
    </script>
<script type="text/javascript">
      jQuery(function($) {

$('#cotizaciones thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } );

    var table = $('#cotizaciones').DataTable({
      responsive:true,
      "ordering": true,
        "order": [[ 1, "desc" ]],
        orderCellsTop: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se ha encontrado nada - Lo sentimos",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
           },

    "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

          select: {
            style: 'multi'
          },
           "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };


            // Total over all pages

             pageTotal4 = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

              pageTotal3 = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             // Update footer



              $( api.column( 3 ).footer() ).html(
                ''+formatmoneda(pageTotal3,'GL' )
            );

               $( api.column( 5 ).footer() ).html(
                '$'+formatmoneda(pageTotal4,'' )
            );

        },

    });

    // Apply the search
    table.columns().every(function (index) {
        $('#cotizaciones thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

        var myTable =
        $('#cotizaciones')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,


          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,

          //"bProcessing": true,
              //"bServerSide": true,
              //"sAjaxSource": "http://127.0.0.1/table.php" ,

          //,

          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element

          //"iDisplayLength": 50


          } );





        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons( myTable, {
         buttons: [


            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {

            "extend": "excelHtml5",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"

            },
            {

            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
                     pageSize: 'LEGAL',
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'Está impresión se produjo desde la App'
            }
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container') );

        // style the message box
        // var defaultCopyAction = myTable.button(1).action();
        // myTable.button(1).action(function (e, dt, button, config) {
        //   defaultCopyAction(e, dt, button, config);
        //   $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
        // });




        // var defaultColvisAction = myTable.button(0).action();
        // myTable.button(0).action(function (e, dt, button, config) {

        //   defaultColvisAction(e, dt, button, config);


        //   if($('.dt-button-collection > .dropdown-menu').length == 0) {
        //     $('.dt-button-collection')
        //     .wrapInner('<ul class="dropdown-menu dropdown-light " />')
        //     .find('a').attr('href', '#').wrap("<li />")
        //   }
        //   $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
        // });

        //

        setTimeout(function() {
          $($('.tableTools-container')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);





        myTable.on( 'select', function ( e, dt, type, index ) {
          if ( type === 'row' ) {
            $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
          }
        } );
        myTable.on( 'deselect', function ( e, dt, type, index ) {
          if ( type === 'row' ) {
            $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
          }
        } );






        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

        //select/deselect all rows according to table header checkbox
        $('#cotizaciones > thead > tr > th input[type=checkbox], #cotizaciones_wrapper input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header

          $('#cotizaciones').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) myTable.row(row).select();
            else  myTable.row(row).deselect();
          });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#cotizaciones').on('click', 'td input[type=checkbox]' , function(){
          var row = $(this).closest('tr').get(0);
          if(this.checked) myTable.row(row).deselect();
          else myTable.row(row).select();
        });



        $(document).on('click', '#cotizaciones .dropdown-toggle', function(e) {
          e.stopImmediatePropagation();
          e.stopPropagation();
          e.preventDefault();
        });



        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header

          $(this).closest('table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
            else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
          });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
          var $row = $(this).closest('tr');
          if($row.is('.detail-row ')) return;
          if(this.checked) $row.addClass(active_class);
          else $row.removeClass(active_class);
        });



        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        //tooltip placement on right or left
        function tooltip_placement(context, source) {
          var $source = $(source);
          var $parent = $source.closest('table')
          var off1 = $parent.offset();
          var w1 = $parent.width();

          var off2 = $source.offset();
          //var w2 = $source.width();

          if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
          return 'left';
        }




        /***************/
        $('.show-details-btn').on('click', function(e) {
          e.preventDefault();
          $(this).closest('tr').next().toggleClass('open');
          $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });
        /***************/


      })
    </script>
