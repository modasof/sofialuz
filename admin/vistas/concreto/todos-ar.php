<?php
ini_set('display_errors', '0');
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';
include_once 'modelos/productos.php';
include_once 'controladores/productosController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';
include_once 'modelos/concreto.php';
include_once 'controladores/concretoController.php';
include_once 'modelos/funcionarios.php';
include_once 'controladores/campamentoController.php';
include_once 'modelos/campamento.php';
include_once 'controladores/destinosController.php';
include_once 'modelos/destinos.php';
include_once 'controladores/funcionariosController.php';
include_once 'modelos/proyectos.php';
$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];

//id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones.

if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}


date_default_timezone_set("America/Bogota");
$MarcaTemporal = date('Y-m-d');
$FechaInicioDia=($MarcaTemporal." 00:00:000");
$FechaFinalDia=($MarcaTemporal." 23:59:000");
//echo("FECHA QUE LLEGA:".$fechaform."<br>");

if ($fechaform!="") {
      $arreglo=explode("-", $fechaform);
      $FechaIn=$arreglo[0];
      $FechaFn=$arreglo[1];
      $vectorfechaIn=explode("/", $FechaIn);
      $vectorfechaFn=explode("/", $FechaFn);
      $arreglofechauno=$vectorfechaIn[2]."-".$vectorfechaIn[0]."-".$vectorfechaIn[1];
      $arreglofechados=$vectorfechaFn[2]."-".$vectorfechaFn[0]."-".$vectorfechaFn[1];

      $FechaUno=str_replace(" ", "", $arreglofechauno);
      $FechaDos=str_replace(" ", "", $arreglofechados);
}

// Validación de la fecha en que inicia el Día

if ($FechaUno=="") {
  $FechaStart=$FechaInicioDia;
  $datofechain=$MarcaTemporal;
          }
else
  {
    $FechaStart=($FechaUno." 00:00:000");
    $datofechain=$FechaUno;
  }
// Validación de la fecha en que Termina el Día
if ($FechaDos=="") {
    $FechaEnd=$FechaFinalDia;
    $datofechafinal=$MarcaTemporal;
  }
else
  {
    $FechaEnd=($FechaDos." 23:59:000");
    $limpiarvariable=str_replace(" ", "", $FechaDos);
    $datofechafinal=$limpiarvariable;
  }

?>

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector2').select2();
    });
});
</script>


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Content Wrapper. Contains page content -->



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Reporte Despacho Concreto</h1>
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
 
					 	<div style="display: none;" class="row">
					 		<div id="chartContainer" style="height: 400px; width: 100%;"></div>
					 	</div>
					 	<br>
					  	 <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">

            <div class="box-header with-border">
              <h3 class="box-title">Despachos </h3>
              <a href="?controller=concreto&&action=formularioconcreto" class="btn btn-success" style="float: right;"><i class="fa fa-file-text-o bigger-110 "></i> Crear Despacho</a>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	            <div class="row">
        <form action="?controller=concreto&&action=despachosporfecha" method="post" id="FormFechas" autocomplete="off">
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
        if ($fechaform!="") {
          ?>
           <h3 class="m-0 text-dark">Reporte Despachos del <?php echo(fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></h3>
          <?php
        }
        else
        {
          ?>
           <h3 class="m-0 text-dark">Reporte Total Despachos </h3>
          <?php
        }


         ?>
         
        </div><!-- /.col -->
              <div class="clearfix">

                  <a id="btnrelacionar" href="?controller=clientes&&action=nuevo" class="btn btn-success" style="float: right; display: none; cursor: pointer;"><i class="fa fa-plus-square bigger-110 "></i> Relacionar Con Facturas</a>
                  <br><br>      
                      <div class="pull-left tableTools-container"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;padding: 1px;">
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
              <th style="background-color: #fcf8e3" class="success"></th>
              <th style="background-color: #fcf8e3" class="success"></th>
              <th style="background-color: #fcf8e3" class="success"></th>
              <th style="background-color: #fcf8e3" class="success"></th>
              <th style="background-color: #fcf8e3" class="success"></th>
               <th style="background-color: #fcf8e3" class="success"></th>
              
                                      
                                     
                                      
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
              <th style="width: 10%;"><i class="fa fa-edit"></i></th>
              <th>Puntos</th>
              <th>Rm.</th>              
              <th>Facturado</th>
              <th>Fecha Despacho </th>
              <th>Cliente</th>
              <th>Proyecto</th>
              <th>Trans.</th>
              <th>Placa</th>
              <th>Cond.</th> 
               <th>Material</th>
              <th>m3</th>
               <th>Vr. Flete</th>
              <th>Valor m3</th>
              <th>Total</th>
              
            </tr>
            <tr>
              <th style="width: 10%;"><i class="fa fa-edit"></i></th>
              <th>Puntos</th>
              <th>Rm.</th>              
              <th>Facturado</th>
              <th>Fecha Despacho </th>
              <th>Cliente</th>
              <th>Proyecto</th>
              <th>Trans.</th>
              <th>Placa</th> 
              <th>Cond</th>
               <th>Material</th>
              <th>m3</th>
              <th>Vr. Flete</th>
              <th>Valor m3</th>
               <th>Total</th>
              
              
            </tr>
          </thead>
       <tbody>

            <?php
            echo ($fechaform);
            if ($fechaform!="") {
              $res=Concreto::ReporteDespachosporfecha($FechaStart,$FechaEnd);
              $campos = $res->getCampos();

            }
            else
            {

              $campos = $campos->getCampos();
            }
            foreach ($campos as $campo){

            $id = $campo['id'];
            $campamento_id_campamento = $campo['campamento_id_campamento'];
            $proyecto_id_proyecto = $campo['proyecto_id_proyecto'];
            $id_destino_origen = $campo['id_destino_origen'];
            $id_destino_destino = $campo['id_destino_destino'];
            $imagen = $campo['imagen'];
            $fecha_reporte = $campo['fecha_reporte'];
            $puntos = $campo['puntos'];

            $cliente_id_cliente = $campo['cliente_id_cliente'];
            $producto_id_producto = $campo['producto_id_producto'];
            $valor_m3 = $campo['valor_m3'];
             $valor_material = $campo['valor_material'];
            $cantidad = $campo['cantidad'];
            $kilometraje = $campo['kilometraje'];
            $viajes = $campo['viajes'];
            $transporte = $campo['transporte'];
            $despachado_por=$campo['despachado_por'];
            $radicada = $campo['radicada'];
             $remision = $campo['remision'];
            $fecha_radicada = $campo['fecha_radicada'];
            $factura = $campo['factura'];
            $pagado = $campo['pagado'];
            $creado_por = $campo['creado_por'];
            $estado_reporte = $campo['estado_reporte'];
            $reporte_publicado = $campo['reporte_publicado'];
            $marca_temporal = $campo['marca_temporal'];
            $observaciones = $campo['observaciones'];
            $equipo_id_equipo = $campo['equipo_id_equipo'];
            $nomprod=Productos::obtenerNombreProducto($producto_id_producto);

            if ($campamento_id_campamento!=0) {
              $nomdestCamp=Campamento::obtenerNombreCampamento($campamento_id_campamento);
            }
            else
            {
              $nomdestCamp="No aplica";
            }
            $nomdest1=Destinos::obtenerNombreDestino($id_destino_origen);
            $nomdest2=Destinos::obtenerNombreDestino($id_destino_destino);

            $nomcli=Clientes::obtenerNombreCliente($cliente_id_cliente);
            $nomconductor=Usuarios::obtenerNombreUsuario($despachado_por);
            $nomequipo=Equipos::obtenerNombreEquipo($equipo_id_equipo);
            $ventatotal=$cantidad+$valor_material;

            $proyectosselecc=Proyectos::obtenerPaginaPor($proyecto_id_proyecto);
            $proyectosselecc = $proyectosselecc->getCampos();            
            foreach ($proyectosselecc as $campo2){              
              $proyectonombre = $campo2['nombre_proyecto'];
            }


            ?>
            <tr>
              <td>
              <a href="?controller=concreto&action=formularioconcreto&id=<?php echo $id; ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Editar Despacho">
                <i class="fa fa-edit bigger-110 "></i>
              </a>
              <a href="#" onclick="eliminar(<?php echo $id; ?>);" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Eliminar Despacho">
                <i class="fa fa-trash bigger-110 "></i>
              </a>
              <a target="_blank" href="<?php echo($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "></i>
              </a>
              <a download="Soporte" href="<?php echo($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "></i>
                </a>
                <input type="checkbox" id="<?php echo $remision; ?>" name="inputdespachos" onclick="marcardespacho()" style="cursor: pointer;">

                  

              </td>
              <td style="text-align: center;">
                <a href="?controller=concreto&action=detallepuntos&id=<?php echo $id; ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Ver Puntos">
                    Ver Puntos
                  </a>
              </td>
              <td><?php echo ($remision) ?></td>              
              <td><?php echo ($puntos) ?></td>
              <td><?php echo ($fecha_reporte) ?></td>

              <td><?php echo utf8_encode($nomcli); ?></td>
              <td><?php echo utf8_encode($proyectonombre); ?></td>
              <td><?php echo utf8_encode($transporte); ?></td>
              <td><?php echo utf8_encode($nomequipo); ?></td>
              <td><?php echo utf8_encode($nomconductor); ?></td>
               <td><?php echo utf8_encode($nomprod); ?></td>
              <td><?php echo utf8_encode($cantidad); ?></td>
              <td><?php echo utf8_encode("$".number_format($valor_m3,0)); ?></td>
               <td><?php echo utf8_encode("$".number_format($valor_material,0)); ?></td>
               <td><?php echo utf8_encode("$".number_format($ventatotal,0)); ?></td>
              
             
              
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
function eliminar(id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=concreto&&action=eliminar&&id="+id;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>
<!-- Inicio Libreria formato moneda -->


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
      btn.href = "?controller=ventasdespachos&action=nuevo&des="+valoresconcant;
    }


  }




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
        "order": [[ 1, "asc" ]],
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
           
           

              pageTotal5 = api
                .column( 12, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
            
           
            pageTotal10 = api
                .column( 13, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal14 = api
                .column( 14, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

              pageTotal15 = api
                .column( 15, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            
           
             // Update footer
           
          

              $( api.column( 12 ).footer() ).html(
                ''+formatmoneda(pageTotal5,'m3' )
            );  
              
               $( api.column( 13 ).footer() ).html(
                '$'+formatmoneda(pageTotal10,'' )
            );

                $( api.column( 14 ).footer() ).html(
                '$'+formatmoneda(pageTotal14,'' )
            );
                 $( api.column( 15 ).footer() ).html(
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
