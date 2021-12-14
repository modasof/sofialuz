<?php
ini_set('display_errors', '0');
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';

include_once 'modelos/funcionarios.php';
include_once 'controladores/funcionariosController.php';

include_once 'modelos/proyectos.php';
include_once 'controladores/proyectosController.php';

include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';

include_once 'controladores/requisicionesitemsController.php';
include_once 'modelos/requisicionesitems.php';

include_once 'controladores/requisicionesController.php';
include_once 'modelos/requisiciones.php';

include_once 'modelos/servicios.php';
include_once 'controladores/serviciosController.php';

include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';

include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';

include_once 'modelos/categoriainsumos.php';
include_once 'controladores/categoriainsumosController.php';

include_once 'modelos/equipostemporales.php';
include_once 'controladores/equipostemporalesController.php';

include_once 'modelos/estadosreq.php';
include_once 'controladores/estadosreqController.php';

include_once 'modelos/movimientositem.php';
include_once 'controladores/movimientositemController.php';

include_once 'modelos/inventario.php';
include_once 'controladores/inventarioController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

/*=============================================
=  Validación variables Get           =
=============================================*/
$estadosolicitado = $_GET['estadosolicitado'];
$idconsulta       = $_GET['idconsulta'];
$cargo            = $_GET['cargo'];
$nombreuser       = Usuarios::obtenerNombreUsuario($IdSesion);

/*=====  End of Section comment block  ======*/

include 'vistas/index/header-formdate.php';

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
          <h1 class="m-0 text-dark">
            <?php

/*===============================================
=            Validación de las Rutas            =
===============================================*/

if ($cargo == 1 or $cargo == 13 or $cargo == 15) {
    echo ("Requisiciones de Almacén");
} elseif ($idconsulta != "") {
    $nombreusuario = Usuarios::obtenerNombreUsuario($idconsulta);
    echo ("Requisiciones Usuario: " . $nombreusuario);
} else {
    $nombreusuario = Usuarios::obtenerNombreUsuario($IdSesion);
    echo ("Requisiciones Usuario: " . $nombreusuario);
}

/*=====  End of Validación de las Rutas  ======*/

?>
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>

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



<div style="display:none;" class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-white">
              <div class="widget-user-image">
                <img class="img-circle" src="../Login/logo-luz.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Usuario
<?php
echo ($nombreuser);
?>
                </h3>
              <h5 class="widget-user-desc">Requisiciones por Estado</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
<?php
# =============================================
# =           Lista de Estados Requisiciones         =
# =============================================

$rubros = Estadosreq::ObtenerListaCentrodistribucion();
foreach ($rubros as $campo) {
    $id            = $campo['id'];
    $nombre        = $campo['nombre'];
    $cantidaditems = contarregistrosporestado($id, $IdSesion);
    ?>
                    <li>
                        <a href="#"><?php echo ($nombre); ?> <span class="pull-right badge bg-orange"><?php echo ($cantidaditems) ?></span></a></li>
                    <?php }?>


              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>



           <div class="col-md-12">

            <div style="display: none;" class="row">
              <div id="chartContainer" style="height: 400px; width: 100%;"></div>
            </div>
            <br>
               <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Requisiciones</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                          <div class="row">
         <div class="form-group">
              <?php
# =============================================
# =           Lista de Estados Requisiciones         =
# =============================================
$rubros = Estadosreq::ObtenerListaCentrodistribucion();
foreach ($rubros as $campo) {
    $id     = $campo['id'];
    $nombre = $campo['nombre'];
    if ($cargo == 1 or $cargo == 13 or $cargo == 15) {
        $cantidaditems = contarregistrosporestadototal($id);
    } elseif ($idconsulta != "") {
        $cantidaditems = contarregistrosporestado($id, $idconsulta);
    } else {
        $cantidaditems = contarregistrosporestado($id, $IdSesion);
    }
    ?>

                  <?php

    /*=============================================
    =          Validamos la ruta           =
    =============================================*/
    if ($estadosolicitado == $id) {
        if ($cargo == 1 or $cargo == 13 or $cargo == 15) {

            $ruta = "?controller=requisiciones&&action=reqparaentrega&&estadosolicitado=" . $id . "&&cargo=" . $RolSesion . "";
        } elseif ($idconsulta != "") {
            $ruta = "?controller=requisiciones&&action=todosporusuarioestado&&id=" . $idconsulta . "&&estadosolicitado=" . $id . "";
        } else {
            $ruta = "?controller=requisiciones&&action=todosporusuarioestado&&id=" . $IdSesion . "&&estadosolicitado=" . $id . "";
        }

        /*=====  End of Section comment block  ======*/

        ?>

        <a href="<?php echo ($ruta); ?>" class="btn btn-success " type="Submit"><small><?php echo ($nombre); ?></small><span style="margin-left:3px;" class="pull-right badge bg-white"><?php echo ($cantidaditems) ?></span></a>
                   <?php
} else {
        if ($cargo == 1 or $cargo == 13 or $cargo == 15) {

            $ruta = "?controller=requisiciones&&action=reqparaentrega&&estadosolicitado=" . $id . "&&cargo=" . $RolSesion . "";
        } elseif ($idconsulta != "") {
            $ruta = "?controller=requisiciones&&action=todosporusuarioestado&&id=" . $idconsulta . "&&estadosolicitado=" . $id . "";
        } else {
            $ruta = "?controller=requisiciones&&action=todosporusuarioestado&&id=" . $IdSesion . "&&estadosolicitado=" . $id . "";
        }
        ?>
                     <a href="<?php echo ($ruta); ?>" class="btn btn-primary " type="Submit"><small><?php echo ($nombre); ?></small><span style="margin-left:3px;" class="pull-right badge bg-white"><?php echo ($cantidaditems) ?></span></a>
                    <?php
}
    ?>

                    <?php }?>



          </div>
          </div>

        <form style="display:none" action="?controller=requisiciones&&action=porfecha" method="post" id="FormFechas" autocomplete="off">
         <div class="col-md-8">
                        <div class="form-group">
                          <label>Seleccione el Rango de Fecha<span>*</span></label>
                          <input type="text"  name="daterange" class="form-control" required value="">
                        </div>
                      </div>
          <div class="form-group">
            <div class="col-xs-12 col-sm-6">
              <button class="btn btn-primary btn-sm" type="Submit">Realizar Consulta</button>
          </div>
          </div>
        </form>
        <script type="text/javascript">
  $('input[name="daterange"]').daterangepicker({
    ranges: {
        'Hoy': [moment(), moment()],
        'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
        'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
        'Este Mes': [moment().startOf('month'), moment().endOf('month')],
        'Mes Anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    "locale": {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "desde",
        "toLabel": "hasta",
        "customRangeLabel": "Personalizado",
        "weekLabel": "W",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    },
    //"startDate": "03/24/2019",
    //"endDate": "03/30/2019",
    "opens": "left"
}, function(start, end, label) {
  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});
</script>
      </div>
       <div class="col-sm-12">
        <?php
if ($fechaform != "") {
    ?>
           <h3 class="m-0 text-dark">Mis Requisiciones <?php echo (fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></h3>
          <?php
} else {
    ?>
           <h3 class="m-0 text-dark">Mis Requisiciones</h3>
          <?php
}
?>

        </div><!-- /.col -->
              <div class="clearfix">
    <?php

?>
                 <a id="btnrelacionar" href="" class="btn btn-success" style="float: right; display: none; cursor: pointer;"><i class="fa fa-exchange bigger-110 "></i> Gestionar Estado</a>
                  <a id="btnrelacionarcot" href="" class="btn btn-warning" style="float: right; display: none; cursor: pointer;"><i class="fa fa-exchange bigger-110 "></i> Agregar Cotizaciones</a>
                   <a id="btnrelacionarsal" href="" class="btn btn-danger" style="float: right; display: none; cursor: pointer;"><i class="fa fa-exchange bigger-110 "></i> Crear Salida</a>
                  <br><br>
                      <div class="pull-left tableTools-container"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 13px;">
          <tfoot style="display: table-header-group;">


                                      <th style="background-color: #fcf8e3" class="success">
<input type="checkbox" id="seleccionar-todos"> todos
                                      </th>
                                      <th style="background-color: #fcf8e3" class="success"></th>
                                      <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                        <th style="background-color: #fcf8e3" class="success"></th>
                                        <th style="background-color: #fcf8e3" class="success"></th>
                                         <th style="background-color: #fcf8e3" class="success"></th>

                                        <th style="background-color: #fcf8e3" class="success"></th>
                                         <th style="background-color: #fcf8e3" class="success"></th> <?php
if ($estadosolicitado == 6 || $estadosolicitado == 7) {
    ?>
                                      <th style="background-color: #fcf8e3" class="success"></th>
                                      <th style="background-color: #fcf8e3" class="success"></th>
                                      <th style="background-color: #fcf8e3" class="success"></th>
                                           <?php
}
?>


                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
            <th >Id</th>
             <th >Fecha Solicitud</th>
            <th >Solicitado por</th>
            <th >Insumo</th>
            <th >Und</th>
            <th >Solicitado</th>
            <th >Entregado</th>
            <th >Pendiente</th>
            <th >Valor Entregado</th>
            <th >Responsable</th>
            <?php
if ($estadosolicitado == 6 || $estadosolicitado == 7) {
    ?>
             <th >Cot1</th>
              <th >Cot2</th>
               <th >Cot3</th>
<?php
}
?>
            <th >Observaciones</th>
            <th >Estado</th>

            </tr>
            <tr>
            <th >Id</th>
             <th >Fecha Solicitud</th>
             <th >Solicitado por</th>
            <th >Insumo</th>
             <th >Und</th>
            <th >Solicitado</th>
            <th >Entregado</th>
            <th >Pendiente</th>
            <th >Valor Entregado</th>
            <th >Responsable</th>
            <?php
if ($estadosolicitado == 6 || $estadosolicitado == 7) {
    ?>
             <th >Cot1</th>
              <th >Cot2</th>
               <th >Cot3</th>
<?php
}
?>
            <th >Observaciones</th>
            <th >Estado</th>

            </tr>
          </thead>
       <tbody>
            <?php
if ($fechaform != "") {

    $res = Requisicionesitems::porfechaUsuario($FechaStart, $FechaEnd, $IdSesion);

    $campos = $res->getCampos();
} else {
    if ($estadosolicitado == '') {

        /*=================================================
        =            Cargando Ruta de consulta            =
        =================================================*/

        if ($cargo == 1 or $cargo == 13 or $cargo == 15) {

            $res    = Requisicionesitems::todosporalmacen();
            $campos = $res->getCampos();
        } elseif ($idconsulta != "") {
            $res    = Requisicionesitems::todosporusuario($idconsulta);
            $campos = $res->getCampos();
        } else {
            $res    = Requisicionesitems::todosporusuario($IdSesion);
            $campos = $res->getCampos();
        }

        /*=====  End of Cargando Ruta de consulta  ======*/

    } else {

        /*=================================================
        =            Cargando Ruta de consulta            =
        =================================================*/
        if ($cargo == 1 or $cargo == 13 or $cargo == 15) {
            $res    = Requisicionesitems::todosporalmacenestado($estadosolicitado);
            $campos = $res->getCampos();
        } elseif ($idconsulta != "") {
            $res    = Requisicionesitems::todosporusuarioestado($idconsulta, $estadosolicitado);
            $campos = $res->getCampos();
        } else {
            $res    = Requisicionesitems::todosporusuarioestado($IdSesion, $estadosolicitado);
            $campos = $res->getCampos();
        }
        /*=====  End of Cargando Ruta de consulta  ======*/
    }

}
foreach ($campos as $campo) {
    $iditem           = $campo['id'];
    $fecha_reporte    = $campo['fecha_reporte'];
    $actividad        = $campo['actividad'];
    $insumo_id_insumo = $campo['insumo_id_insumo'];

    $servicio_id_servicio = $campo['servicio_id_servicio'];
    $equipo_id_equipo     = $campo['equipo_id_equipo'];
    $usuario_creador      = $campo['usuario_creador'];
    $cantidad             = $campo['cantidad'];
    $fecha_entrega        = $campo['fecha_entrega'];
    $observaciones        = $campo['observaciones'];
    $requisicion_id       = $campo['requisicion_id'];
    $marca_temporal       = $campo['marca_temporal'];
    $estado_item          = $campo['estado_item'];
    $tipo_req             = $campo['tipo_req'];

    $proyecto_id       = Requisiciones::obtenerIdproyecto($requisicion_id);
    $nombreproyecto    = Proyectos::obtenerNombreProyecto($proyecto_id);
   

    if ($estadosolicitado==13 || $estadosolicitado==14) {
         $valor_entregado   = Inventario::sqlvalorsalida($iditem);
          $cantidadentregada = Inventario::sqldetallesalida($iditem);
    }else{
        $valor_entregado=0;
         $cantidadentregada=0;
    }
   

    $pendienteentrega  = $cantidad - $cantidadentregada;

    $nomsolicita = Usuarios::obtenerNombreUsuario($usuario_creador);

    if ($tipo_req == 'Insumos') {
        $detallesolicitado = Insumos::obtenerNombreInsumo($insumo_id_insumo);
        $categoriaid       = Insumos::obtenerCategoria($insumo_id_insumo);
        $nomcategoria      = Categoriainsumos::obtenerNombre($categoriaid);
        $unidadmedidaid    = Insumos::obtenerUnidadmed($insumo_id_insumo);
        $nomunidadmedida   = Unidadesmed::obtenerNombre($unidadmedidaid);
    } elseif ($tipo_req == 'Servicios') {
        $detallesolicitado = Servicios::obtenerNombre($servicio_id_servicio);
        $nomcategoria      = 'Servicios';
        $nomunidadmedida   = 'Und';
    } else {
        $nomcategoria      = 'Equipos';
        $detallesolicitado = Equipostemporales::obtenerNombre($equipo_id_equipo);
        $unidadmedidaid    = Equipostemporales::obtenerUnidadmed($equipo_id_equipo);
        $nomunidadmedida   = Unidadesmed::obtenerNombre($unidadmedidaid);
    }
    $estadoactual = Estadosreq::obtenerNombre($estado_item);

    ?>
            <tr>
              <td id="listado">
                RQ<?php echo ($requisicion_id); ?>-<?php echo ($iditem); ?>

<?php if ($RolSesion == 1 or $RolSesion == 13) {
        ?>
           <input type="checkbox" id="<?php echo $iditem; ?>" name="inputdespachos" onclick="marcardespacho(<?php echo ($requisicion_id) ?>)" style="cursor: pointer;">
        <?php
}?>


            </td>
            <td><?php echo ($fecha_reporte) ?>

              </td>
              <td><?php echo ($nomsolicita) ?><br><strong><?php echo ($nombreproyecto); ?></strong></td>
               <td><?php echo utf8_encode($detallesolicitado); ?></td>
            <td><?php echo utf8_encode($nomunidadmedida); ?></td>
              <td><?php echo utf8_encode($cantidad); ?></td>

              <td><?php echo utf8_encode($cantidadentregada); ?></td>
              <td><?php echo utf8_encode($pendienteentrega); ?></td>
              <td>$<?php echo utf8_encode(number_format($valor_entregado,0)); ?></td>
              <td><?php echo utf8_encode($fecha_entrega); ?></td>
              <?php
if ($estadosolicitado == 6 || $estadosolicitado == 7) {
        ?>
             <td style="color:green;">
            <?php

        if ($tipo_req = "Insumos") {
            ?>

    <?php
}

        $valor1 = valorcot($iditem, 'Cotizacion 1');
        echo ("$" . number_format($valor1, 0));
        ?>

           </td>
              <td style="color:green;">
             <?php
$valor1 = valorcot($iditem, 'Cotizacion 2');
        echo ("$" . number_format($valor1, 0));
        ?>
           </td>
              <td style="color:green;">
            <?php
$valor1 = valorcot($iditem, 'Cotizacion 3');
        echo ("$" . number_format($valor1, 0));
        ?>
           </td>
<?php
}
    ?>
              <td><?php echo utf8_encode($observaciones); ?></td>
              <td>


                <?php echo utf8_encode($estadoactual); ?>



                 <a href="?controller=requisicionesitems&&action=trazabilidad&&id=<?php echo ($requisicion_id) ?>&&iditem=<?php echo ($iditem) ?>&&cargo=<?php echo ($RolSesion); ?>"><span data-toggle="tooltip" title="" class="badge bg-light-blue fa fa-comments fa-1x " data-original-title="Total Observaciones"><small>  <?php
$totalcomentarios = contarcomentarios($iditem);
    echo ($totalcomentarios);
    ?></small>
                  </a>
                </span>
              </td>


            </tr>
            <?php
}
?>
          </tbody>
          </table>
        </div> <!-- Fin Row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
           </div>


          </div> <!-- FIN DE ROW-->
        </div><!-- FIN DE CONTAINER FORMULARIO-->
      </div> <!-- Fin Row -->
    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->



</div> <!-- Fin Content-Wrapper -->
<script>
      $(function(){
        $('#seleccionar-todos').change(function() {
          $('#listado > input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });
      });
</script>
<script>
function eliminar(id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=requisiciones&&action=eliminar&&id="+id;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>

<script>
function eliminaritem(ideliminar,id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=requisicionesitems&&action=eliminar&&ideliminar="+ideliminar+"&&id="+id;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>
<!-- Inicio Libreria formato moneda -->






<!-- page script -->
<script>

  function marcardespacho(id){
    var valores = document.getElementsByName("inputdespachos");
    var valoresconcant = "";
    for (i = 0; i < valores.length; i++) {
        var idelemento = valores[i].id;
        var valor = valores[i].value;
        var checked = valores[i].checked;

        if (checked==true){
          if (valoresconcant == "") {
              valoresconcant = idelemento;
          } else {
              valoresconcant = valoresconcant + "," + idelemento;
          }
        }

    }

        var btn3 = document.getElementById("btnrelacionarsal");

    if (valoresconcant==""){

       btn3.style.display = "none";
    }else{

    btn3.style.display = "";
      btn3.href = "?controller=inventario&action=cargarsalidasrq&des="+valoresconcant+"&id="+id;

    }

  }
        $(document).ready(function() {
} );
    </script>


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
        "order": [[ 2, "asc" ]],
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



              pageTotal15 = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );



             // Update footer


                 $( api.column( 8 ).footer() ).html(
                '$'+formatmoneda(pageTotal15,'' )
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



        setTimeout(function() {
          $($('.tableTools-container')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);


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


      })
    </script>