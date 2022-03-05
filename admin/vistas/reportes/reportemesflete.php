<?php
ini_set('display_errors', '0');
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';
include_once 'modelos/productos.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/usuarios.php';
include_once 'controladores/productosController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';
include_once 'modelos/reportes.php';
include_once 'controladores/reportesController.php';
include_once 'modelos/funcionarios.php';
include_once 'controladores/funcionariosController.php';
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/estaciones.php';
include_once 'controladores/estacionesController.php';
include 'vistas/index/estadisticas_acpm.php';
include 'vistas/index/estadisticas_despachoscl.php';
include 'vistas/index/estadisticas_cajas.php';
include 'vistas/index/estadisticas_indexequipos.php';

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
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Content Wrapper. Contains page content -->



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Informe Fletes</h1>
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

					 
					  	 <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success ">
            <div class="box-header with-border">
              <h3 class="box-title">Fletes  del <?php echo(fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></h3>

        

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	            <div class="row">
      <?php 
      if ($RolSesion!=4) {
       ?>
        <form action="?controller=reportes&&action=mesfletes" method="post" id="FormFechas" autocomplete="off">
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

        <?php 
      }
         ?>
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
        <br>

        </div><!-- /.col -->
                 <div class="clearfix">
                      <div class="pull-right tableTools-container"></div>
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
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                 <th style="background-color: #fcf8e3" class="success"></th>
                                  <th style="background-color: #fcf8e3" class="success"></th>
                               

                                
                            </tfoot>
          <thead>
  <tr style="background-color: #4f5962;color: white;">
           <th>Equipo</th>
           <th>Facturado</th>
           <th>Gastos</th>
           <th>Días Laborados</th>
           <th>Número Fletes</th>
           <th>ACPM (Gl)</th>
          <th>Km</th>
           <th>Rend.</th>
           <th>Costo Acpm</th>
           <th>Comisión</th>
           <th>Gastos Caja</th>
           <th>Insumos Rq</th>
           <th>Fact. Promedio</th>
           <th>Utilidad</th>

 </tr>
          </thead>
       <tbody>
        
           
         
        <?php
            if ($fechaform!="") {
              $res=Reportes::ReporteVolquetasporfechameseq($FechaStart,$FechaEnd);
              $campos = $res->getCampos();
            }
            foreach ($campos as $campo){
          
            $equipo_id_equipo = $campo['equipo_id_equipo'];
            $nomequipo     = Equipos::obtenerNombreEquipo($equipo_id_equipo);
            $diaslaborados = Diaslaboradosvolquetaporfecha($equipo_id_equipo,$FechaStart,$FechaEnd);
            $totalfacturado= Facturacionvolquetasporfecha($equipo_id_equipo,$FechaStart,$FechaEnd);
            $totalfletes=Viajesvolquetadetallemes($equipo_id_equipo,$FechaStart,$FechaEnd);
            $totalconsumogalones=AcpmfechaVolqueta($FechaStart,$FechaEnd,$equipo_id_equipo);
            $totalkmvolqueta=KilometrajeDiariosVolqueta($FechaStart,$FechaEnd,$equipo_id_equipo);
            $valorconsumogalones=AcpmfechaVolquetavalor($FechaStart,$FechaEnd,$equipo_id_equipo);
            $comision=Pagocomisionvolquetaporfecha($equipo_id_equipo,$FechaStart,$FechaEnd);
            $gastoscajamenor=GastosVolquetaporfecha($equipo_id_equipo,$FechaStart,$FechaEnd);
            $salidasporrq= SalidasInsumoporvolqueta($equipo_id_equipo,$FechaStart,$FechaEnd);
            $facturapromedio= Facturacionpromediovolquetasporfecha($equipo_id_equipo,$FechaStart,$FechaEnd);
            $totalgastos=$gastoscajamenor+$salidasporrq+$comision+$valorconsumogalones;
            $utilidadbruta=$totalfacturado-$totalgastos;

          

            ?>
            <tr>
            <td><?php echo($nomequipo) ?></td>
            <td class="success"><?php echo(number_format($totalfacturado,0)); ?></td>
            <td><?php echo(number_format($totalgastos,0)); ?></td>
            <td><?php echo($diaslaborados); ?></td>
            <td><?php echo($totalfletes); ?></td>
            <td><?php echo(round($totalconsumogalones,2)); ?></td>
            <td><?php echo(round($totalkmvolqueta,2)); ?></td>
             
              <?php 
                if ($totalkmvolqueta==0) {
              echo("<td class='danger'>0</td>");
            }else
            {

                $rendimiento=$totalkmvolqueta/$totalconsumogalones;
              echo("<td>".round($rendimiento,1)."</td>");
            }



               ?>
                
              
            <td>$<?php echo(number_format($valorconsumogalones,0)) ?></td>
            <td>$<?php echo(number_format($comision,0)) ?></td>
            <td>$<?php echo(number_format($gastoscajamenor,0)); ?></td> 
            <td>$<?php echo(number_format($salidasporrq,0));?></td>
            <td><strong>$<?php echo(number_format($facturapromedio,0)) ?></strong></td>
            <?php 
               if ($utilidadbruta<=0) {
                 echo("<td class='text-red' style='border: double brown;'>");
               }else{
                  echo("<td class='text-green'>");
               }
                ?>
                  $<?php echo(number_format($utilidadbruta,0)); ?>
                    
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
function eliminar(id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=reportes&&action=eliminarcombustible&&id="+id;
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
        "ordering": false,
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
        "order": [[ 0, "asc" ]],
       "lengthChange":false,
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
              pageTotal1 = api
                .column( 1, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            

             pageTotal2 = api
                .column( 2, { page: 'current'} )
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

               

                 pageTotal5 = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                 pageTotal6 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


               

                 pageTotal8 = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                 pageTotal9 = api
                .column( 9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                 pageTotal11 = api
                .column( 11, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                  pageTotal12 = api
                .column( 12, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
                 pageTotal13 = api
                .column( 13, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            

          // Update footer
              $( api.column( 1 ).footer() ).html(
                '$'+formatmoneda(pageTotal1,'' )
            );

                // Update footer
              $( api.column( 2 ).footer() ).html(
                '$'+formatmoneda(pageTotal2,'' )
            );

               // Update footer
              $( api.column( 3 ).footer() ).html(
                ''+formatmoneda(pageTotal3,'' )
            );

              

               // Update footer
              $( api.column( 5 ).footer() ).html(
                ''+formatmoneda(pageTotal5,'' )
            );

               // Update footer
              $( api.column( 6 ).footer() ).html(
                ''+formatmoneda(pageTotal6,'Km' )
            );

             

                // Update footer
              $( api.column( 8 ).footer() ).html(
                '$'+formatmoneda(pageTotal8,'' )
            );

                // Update footer
              $( api.column( 9 ).footer() ).html(
                '$'+formatmoneda(pageTotal9,'' )
            );

               // Update footer
              $( api.column( 11 ).footer() ).html(
                '$'+formatmoneda(pageTotal11,'' )
            );

                // Update footer
              $( api.column( 12 ).footer() ).html(
                '$'+formatmoneda(pageTotal12,'' )
            );

                // Update footer
              $( api.column( 13 ).footer() ).html(
                '$'+formatmoneda(pageTotal13,'' )
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
        
    
      
      })
    </script>




