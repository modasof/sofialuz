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

include_once 'modelos/rubros.php';
include_once 'controladores/rubrosController.php';

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
    echo ("RQ " . $nombreusuario);
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

            <div class="col-md-12">
            <?php
require_once 'formrequisiciones.php';
?>
            </div>
            <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Requisiciones</h3>

                <div class="card-tools">
                    <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-menu-left">Filtrar</button>
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                         <?php
# =============================================
# =           Lista de Estados Requisiciones         =
# =============================================
$rubros = Estadosreq::ObtenerListaEstados();
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

            $ruta = "?controller=requisiciones&&action=reqalmacenestado&&estadosolicitado=" . $id . "&&cargo=" . $RolSesion . "";
        } elseif ($idconsulta != "") {
            $ruta = "?controller=requisiciones&&action=todosporusuarioestado&&id=" . $idconsulta . "&&estadosolicitado=" . $id . "";
        } else {
            $ruta = "?controller=requisiciones&&action=todosporusuarioestado&&id=" . $IdSesion . "&&estadosolicitado=" . $id . "";
        }

        /*=====  End of Section comment block  ======*/

        ?>
         <a class="dropdown-item" href="<?php echo ($ruta); ?>">
            <button type="button" class="btn btn-block bg-gradient-warning btn-sm"><?php echo ($nombre); ?>-<?php echo($cantidaditems); ?></button>
         </a>
                   <?php
} else {
        if ($cargo == 1 or $cargo == 13 or $cargo == 15) {

            $ruta = "?controller=requisiciones&&action=reqalmacenestado&&estadosolicitado=" . $id . "&&cargo=" . $RolSesion . "";
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
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>

                </div>
            </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!--Inicio Body Green-->
                 <div class="clearfix">
                    <a id="btnrelacionar" href="" class="btn btn-success" style="float: right; display: none; cursor: pointer;"><i class="fa fa-exchange bigger-110 "></i> Gestionar Estado</a>
                  <a id="btnrelacionarcot" href="" class="btn btn-warning" style="float: right; display: none; cursor: pointer;"><i class="fa fa-exchange bigger-110 "></i> Agregar Cotizaciones</a>
                   <a id="btnrelacionarsal" href="" class="btn btn-danger" style="float: right; display: none; cursor: pointer;"><i class="fa fa-exchange bigger-110 "></i> Crear Salida</a>
                  <br><br>
                      <div class="pull-right tableTools-container"></div>
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
if ($estadosolicitado == 6) {
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
            <th >Acción</th>
            <th >Estado</th>
            <th >Solicitado Por</th>
            <th >Fecha Solicitud</th>
            <th >Categoría</th>
            <th >Estado</th>
             <th >Insumo</th>
            <th >Cantidad</th>
            <th >Unidad</th>
             <th >Fecha Entrega</th>
            <th >Observaciones</th>
            
            </tr>
            <tr>
             <th >Id</th>
            <th >Acción</th>
            <th >Estado</th>
            <th >Solicitado Por</th>
            <th >Fecha Solicitud</th>
            <th >Categoría</th>
            <th >Estado</th>
             <th >Insumo</th>
            <th >Cantidad</th>
            <th >Unidad</th>
            <th >Fecha Entrega</th>
            <th >Observaciones</th>
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
    $iditem               = $campo['id'];
    $fecha_reporte        = $campo['fecha_reporte'];
    $actividad            = $campo['actividad'];
    $insumo_id_insumo     = $campo['insumo_id_insumo'];
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

    $proyecto_id    = Requisiciones::obtenerIdproyecto($requisicion_id);
    $nombreproyecto = Proyectos::obtenerNombreProyecto($proyecto_id);

    $nomsolicita = Usuarios::obtenerNombreUsuario($usuario_creador);

     

    if ($tipo_req == 'Insumos') {
        $detallesolicitado = Insumos::obtenerNombreInsumo($insumo_id_insumo);
        $categoriaid       = Insumos::obtenerCategoria($insumo_id_insumo);
        $nomcategoria      = Categoriainsumos::obtenerNombre($categoriaid);
        $unidadmedidaid    = Insumos::obtenerUnidadmed($insumo_id_insumo);
        $nomunidadmedida   = Unidadesmed::obtenerNombre($unidadmedidaid);
        $cantidadexistente= consultarinventario($insumo_id_insumo);
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
              
            </td>
            <td>
                 <div class="btn-group">
                    <button type="button" class="btn btn-default">Acción</button>
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" style="">
                      <a class="dropdown-item" href="?controller=requisicionesitems&&action=todosporreq&&id=<?php echo ($requisicion_id) ?>">Ver RQ Completa</a>
                       <a class="dropdown-item" href="?controller=requisicionesitems&&action=trazabilidad&&id=<?php echo ($requisicion_id) ?>&&iditem=<?php echo ($iditem) ?>&&cargo=<?php echo ($RolSesion); ?>">Trazabilidad Item</a>
 <?php

# ======  Si es estado Solicitado = 1 Si deja Editar/Eliminar el Item   =======
    if ($estado_item == 1) {
        ?>
                      <a class="dropdown-item" href="?controller=requisicionesitems&&action=editar&&id=<?php echo $iditem; ?>&&vereditar=1" class="tooltip-primary text-success">Editar</a>
                      <a class="dropdown-item" href="#" onclick="eliminaritem(<?php echo $iditem; ?>,<?php echo ($requisicion_id); ?>);">Eliminar</a>
       <?php
}
    # ====== End Si es estado Solicitado = 1 Si deja Editar el Item   =======
    ?>
                      </div>
                    </div>
            </td>
            <td><?php echo utf8_encode($estadoactual); ?></td>
            <td><?php echo ($nomsolicita) ?><br><strong><?php echo ($nombreproyecto); ?></strong></td>
            <td><?php echo ($fecha_reporte) ?></td>
            <td><?php echo utf8_encode($nomcategoria); ?></td>
               <td>
           <?php
$res2    = Movimientositem::todospor($iditem);
    $campos2 = $res2->getCampos();
    foreach ($campos2 as $campo2) {
        $estado_mov_item = $campo2['estado_mov_item'];
        $cantidad2       = $campo2['cantidad'];
        $estadoactual2   = Estadosreq::obtenerNombre($estado_mov_item);
        $coloractual     = Estadosreq::obtenerColor($estado_mov_item);
        ?>
    <span  class="pull-left-container">
              <small style="background-color:<?php echo ($coloractual); ?>;" class="label pull-left"><?php echo ($cantidad2 . " " . $estadoactual2); ?></small><br>
    </span>
<?php
}
    ?>
               </td>
              <td><?php echo utf8_encode($detallesolicitado); ?></td>
              <td><?php echo utf8_encode($cantidad);?></td>
               <td><?php echo utf8_encode($nomunidadmedida); ?></td>
              <td><?php echo utf8_encode($fecha_entrega); ?></td>
              <td><?php echo utf8_encode($observaciones); ?></td>
              
            </tr>
            <?php
}
?>
          </tbody>
          </table>
        </div> <!-- Fin Row -->

                
                <!--Final  Body Green-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

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

        var btn = document.getElementById("btnrelacionar");
        var btn2 = document.getElementById("btnrelacionarcot");
        var btn3 = document.getElementById("btnrelacionarsal");

    if (valoresconcant==""){
      btn.style.display = "none";
      btn2.style.display = "none";
       btn3.style.display = "none";
    }else{
      btn.style.display = "";
      btn.href = "?controller=requisicionesitems&action=cambiarestado&des="+valoresconcant+"&id="+id;

      btn2.style.display = "";
      btn2.href = "?controller=requisicionesitems&action=gestionarvalores&des="+valoresconcant+"&id="+id;

    btn3.style.display = "";
      btn3.href = "?controller=inventario&action=cargarsalidasrq&des="+valoresconcant+"&id="+id;
    }

  }
        $(document).ready(function() {
} );
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
        "paging":   false,
        "pageLength": false,
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


              pageTotal15 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );



                // $( api.column( 6 ).footer() ).html(
                //'$'+formatmoneda(pageTotal15,'' )
            //);


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
         "buttons": ["colvis","copy","excel","pdf","print"]
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