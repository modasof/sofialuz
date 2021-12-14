<?php
ini_set('display_errors', '0');

include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';
include_once 'modelos/categoriainsumos.php';
include_once 'controladores/categoriainsumosController.php';
include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/proyectos.php';
include_once 'controladores/proyectosController.php';
include_once 'modelos/servicios.php';
include_once 'controladores/serviciosController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';
include_once 'modelos/equipostemporales.php';
include_once 'controladores/equipostemporalesController.php';
include_once 'modelos/estadosreq.php';
include_once 'controladores/estadosreqController.php';

include_once 'modelos/requisiciones.php';
include_once 'controladores/requisicionesController.php';


$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

$idreq           = $_GET['id'];
$tiporeq         = ObtenerTipoReq($idreq);
$estadopublicada = ObtenerPublicadoReq($idreq);

$res = Requisiciones::editarrequisicionesPor($idreq);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $usuario_creador      = $campo['usuario_creador'];
    $proyecto_id_proyecto = $campo['proyecto_id_proyecto'];
    $nombrecreador        = Usuarios::Obtenernombreusuario($usuario_creador);
    $nombreproyecto       = Proyectos::obtenerNombreProyecto($proyecto_id_proyecto);

}

//id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones.

if (isset($_POST['daterange'])) {
    $fechaform = $_POST['daterange'];
} elseif (isset($_GET['daterange'])) {
    $fechaform = $_GET['daterange'];
}

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
          <h1 class="m-0 text-dark">RQ Nº <?php echo ($idreq); ?>
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <?php
if ($RolSesion == 1 or $RolSesion == 13) {
    ?>
    <li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=todosalmacen&&estadosolicitado=1&&cargo=<?php echo ($RolSesion); ?>">Ver Requisiciones</a></li>
                <?php
} 
    ?>
                  
            <!--<li class="breadcrumb-item active"><a href="?controller=equipos&&action=todos">Equipos</a></li>-->
          </ol>
        </div><!-- /.col -->
        <div>
             <a  href="#" onclick="eliminarRQ(<?php echo $idreq; ?>);" class="btn btn-danger" style="float: right;"><i class="fa  fa-trash bigger-110 "></i> Eliminar</a>
            <?php if ($estadopublicada == 0) {?>
             <a  href="#" onclick="finalizarrq(<?php echo $idreq; ?>);" class="btn btn-success" style="float: right;"><i class="fa  fa-comments bigger-110 "></i> Finalizar y Notificar</a>

             
            <?php }?>
        </div>


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
if ($estadopublicada == 0) {
    if ($tiporeq == 'Insumos') {
        require_once 'formitems.php';
    } elseif ($tiporeq == 'Servicios') {
        require_once 'formservicios.php';
    } else {
        require_once 'formequipos.php';
    }
}
?>
            </div>


           <div class="col-md-12">

            <div style="display: none;" class="row">
              <div id="chartContainer" style="height: 400px; width: 100%;"></div>
            </div>
            <br>
               <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Insumos Cargados a Requisión <?php echo ($idreq); ?> </h3>



              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                          <div class="row">


      </div>
       <div class="col-sm-12">
        <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4> <?php echo($nombreproyecto); ?></h4>
                Solicitado por <?php echo($nombrecreador); ?>
              </div>

        </div><!-- /.col -->
              <div class="clearfix">
                  <a id="btnrelacionar" href="" class="btn btn-success" style="float: right; display: none; cursor: pointer;"><i class="fa fa-exchange bigger-110 "></i> Gestionar Estado</a>
                  <br><br>
                      <div class="pull-left tableTools-container"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
            <tfoot style="display: table-header-group;">

                                      <th style="background-color: #fcf8e3" class="success"></th>
                                      <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                        <th style="background-color: #fcf8e3" class="success"></th>
                                        <th style="background-color: #fcf8e3" class="success"></th>
                                        <th style="background-color: #fcf8e3" class="success"></th>

                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
            <th >Id</th>
            <th >Fecha</th>
            <th >Categoria</th>
             <th >Detalle</th>
            <th >Und</th>
            <th >Cantidad</th>
            <th >Fecha Entrega</th>
            <th >Observaciones</th>
            <th >Estado</th>

            </tr>
            <tr>
            <th >Id</th>
            <th >Fecha</th>
            <th >Categoria</th>
            <th >Detalle</th>
            <th >Und</th>
            <th >Cantidad</th>
            <th >Fecha Entrega</th>
            <th >Observaciones</th>
            <th >Estado</th>

            </tr>
          </thead>
       <tbody>
            <?php

$res    = Requisicionesitems::todosporreq($idreq);
$campos = $res->getCampos();

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
              <td>
                RQ<?php echo ($requisicion_id); ?>-<?php echo ($iditem); ?>

            </td>
              <td><?php echo ($fecha_reporte) ?>
                  <br>
                   <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle">
                          Acción
                          <span class="ace-icon fa fa-caret-down icon-on-right"></span>
                        </button>

                        <ul class="dropdown-menu dropdown-info dropdown-menu-right">
              <li>
               <a href="?controller=requisicionesitems&&action=trazabilidad&&id=<?php echo ($requisicion_id) ?>&&iditem=<?php echo ($iditem) ?>&&cargo=<?php echo ($RolSesion); ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Trazabilidad">
                <i class="fa fa-comments bigger-110 "> Trazabilidad</i>
              </a>
              </li>

              <?php

    if ($estadosolicitado == 6) {
# ======  Si es estado Solicitado = 6 Deja Agregar Valores   =======

        ?>
               <li>
               <a href="?controller=requisicionesitems&&action=agregarvalores&&id=<?php echo ($requisicion_id) ?>&&iditem=<?php echo ($iditem) ?>&&cargo=<?php echo ($RolSesion); ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Agregar Valores">
                <i class="fa fa-dollar bigger-110 "> Agregar Valores</i>
              </a>
                </li>
                <?php
}
# ======  End Si es estado Solicitado = 6 Deja Agregar Valores   =======

    ?>
 <?php
# ======  Si es estado Solicitado = 1 Si deja Editar/Eliminar el Item   =======
    if ($estado_item == 1) {
        ?>
        <li>
              <a href="?controller=requisicionesitems&&action=editar&&id=<?php echo $iditem; ?>&&vereditar=1" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Editar">
                <i class="fa fa-edit bigger-110 "> Editar Item</i>
              </a>
        </li>
         <li>
             <a href="#" onclick="eliminaritem(<?php echo $iditem; ?>,<?php echo ($requisicion_id); ?>);" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Eliminar Item">
                <i class="fa fa-trash bigger-110 ">Eliminar Item</i>
              </a>
        </li>


       <?php
}
    # ====== End Si es estado Solicitado = 1 Si deja Editar el Item   =======
    ?>
                        </ul>
                      </div>
              </td>

              <td><?php echo utf8_encode($nomcategoria); ?></td>
              <td><?php echo utf8_encode($detallesolicitado); ?></td>
              <td><?php echo utf8_encode($nomunidadmedida); ?></td>
              <td><?php echo utf8_encode($cantidad); ?></td>
              <td><?php echo utf8_encode($fecha_entrega); ?></td>

              <td><?php echo utf8_encode($observaciones); ?></td>
              <td><?php echo utf8_encode($estadoactual); ?></td>


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
function eliminaritem(ideliminar,id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=requisicionesitems&&action=eliminar&&ideliminar="+ideliminar+"&&id="+id;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>

<script>
function eliminarRQ(id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=requisiciones&&action=eliminar&&id="+id;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>
<!-- Inicio Libreria formato moneda -->

<script>
function finalizarrq(id){
   eliminar=confirm("¿Deseas finalizar este registro?");
   if (eliminar)
     window.location.href="?controller=requisicionesitems&&action=finalizarrq&&id="+id;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido finalizar el registro...')
}
</script>


<!-- page script -->
<script>

  function marcardespacho(){
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

    if (valoresconcant==""){
      btn.style.display = "none";
    }else{
      btn.style.display = "";

      btn.href = "?controller=requisicionesitems&action=cambiarestado&des="+valoresconcant+"&id=<?php echo ($idreq); ?>";
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
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );



             // Update footer


                 $( api.column( 5 ).footer() ).html(
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

          $('#cotizaciones').find('tbody > td input[type=checkbox]').each(function(){
            var row = this;
            if(th_checked) myTable.row(row).select();
            else  myTable.row(row).deselect();
          });
        });




      })
    </script>