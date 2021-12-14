<?php
ini_set('display_errors', '0');
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';
include_once 'modelos/proveedores.php';
include_once 'controladores/proveedoresController.php';
include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';
include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';
include 'vistas/index/estadisticas_almacen.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];

//id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones.

if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}

$idproveedor=$_GET['id'];
 $Subtotalcot=SubtotalProveedor($idproveedor,"1");
  $mediopago=ObtenerMediopago($idproveedor,"1"); 

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
          <h1 class="m-0 text-dark">Solicitudes Pendientes</h1>
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
						<div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
           
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="?controller=requisiciones&&action=cotizaciones"><strong> <i class="fa fa-external-link-square"></i> Cargar Cotizaciones</strong> <span class="pull-right badge bg-blue"></span></a></li>
               <?php 
               $res=Requisiciones::cotizaciones();
               $campos= $res->getCampos();
               foreach ($campos as $campo) {
                 $proveedor_id_proveedor=$campo['proveedor_id_proveedor'];
                 $nomproveedor=Proveedores::obtenerNombreProveedor($proveedor_id_proveedor);
                ?>
                <li><a href="?controller=requisiciones&&action=vercotizacion&&id=<?php echo($proveedor_id_proveedor); ?>"><?php echo($nomproveedor); ?></a></li>
                <?php 

              }
                 ?>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
            <div class="col-md-9">
                <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="">
              <img width="150px" height="50px" src="../Login/logonomadas.png" >
            </i> Orden de Compra
            <small class="pull-right">Fecha: <?php 
            $imprfechalarga=fechalarga($MarcaTemporal);
            echo($imprfechalarga);
             ?></small>
          </h2>
        </div>
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
            $res=Proveedores::obtenerPaginaPor($idproveedor);
              $campos= $res->getCampos();

              foreach ($campos as $campo) {
                $nombrepara= $campo['nombre_proveedor'];
                 $nit= $campo['nit'];
                 $contacto= $campo['contacto'];
                 $telefonos= $campo['telefonos'];
                 $correo= $campo['correo'];
             ?>
            <strong><?php echo($nombrepara) ?></strong><br>
            Nit: <?php echo($nit) ?><br>
            Teléfonos: <?php echo($telefonos); ?><br>
            Email: <a href="mailto:<?php echo($correo) ?>"><?php echo($correo); ?></a>
          </address>
          <?php 
        }
           ?>
        </div>
        <!-- /.col -->
        <div class="col-sm-2 invoice-col">
          <b>Orden Compra #N<?php echo($MarcaTemporal)?></b><br>
          <br>
          
          <b>Método de pago:</b> 
          <?php
          $mediopago=ObtenerMediopago($idproveedor,"1"); 
          echo($mediopago);
           ?>
          <br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <form action="?controller=requisicionesitems&action=guardarocompra" method="post">
<?php  
                date_default_timezone_set("America/Bogota");
                $TiempoActual = date('Y-m-d H:i:s');
                $DiaActualfor = date('Y-m-d');
   ?>
        <input type="hidden" name="imagen" value="0">
        <input type="hidden" name="fecha_reporte" value="<?php echo($DiaActualfor); ?>">
        <input type="hidden" name="valor_total" value="<?php echo($Subtotalcot) ;?>"> 
        <input type="hidden" name="valor_retenciones" value="0">
        <input type="hidden" name="estado_orden" value="1">
        <input type="hidden" name="proveedor_id_proveedor" value="<?php echo($idproveedor);?>">
        <input type="hidden" name="medio_pago" value="<?php echo($mediopago); ?>">
        <input type="hidden" name="observaciones" value="Orden de compra creada correctamente">
        <input type="hidden" name="marca_temporal" value="<?php echo $TiempoActual ?>">
        <input type="hidden" name="usuario_creador" value="<?php echo $IdSesion ?>">
       
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Código</th>
              <th>Detalle</th>
              <th>Cantidades</th>
              <th>Unidad</th>
              <th>Vr. Unitario</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
              <?php 
              $res=Requisiciones::vercotizacion($idproveedor);
              $campos=  $res->getCampos();
              //(id, proveedor_id_proveedor, cotizacion, medio_pago, item_id, valor_cot, requisicion_id, marca_temporal, usuario_creador, estado_cotizacion, ordencompra_num)
              foreach ($campos as $campo) {
               
              $id1= $campo['id'];
              $proveedor_id_proveedor= $campo['proveedor_id_proveedor'];
              $cotizacion= $campo['cotizacion'];
              $medio_pago= $campo['medio_pago'];
              $item_id= $campo['item_id'];
               $medio_pago= $campo['medio_pago'];
              $valor_cot= $campo['valor_cot'];
              $requisicion_id= $campo['requisicion_id'];
              $marca_temporal= $campo['marca_temporal'];
              $usuario_creador= $campo['usuario_creador'];
              $estado_cotizacion= $campo['estado_cotizacion'];
              $insumo_id_insumo= $campo['insumo_id_insumo'];
              $cantidad= $campo['cantidad'];
              $nominsumo=Insumos::obtenerNombreInsumo($insumo_id_insumo);
              $unidadmedidaid=Insumos::obtenerUnidadmed($insumo_id_insumo);
              $nomunidadmedida=Unidadesmed::obtenerNombre($unidadmedidaid);
              $valorunitario=$valor_cot/$cantidad;
               ?>
            <tr>
              <td>RQ <?php echo($requisicion_id."-".$item_id) ?>
                <input type="hidden" value="<?php echo($item_id); ?>" name="items[]">
              </td>
              <td><?php echo($nominsumo); ?></td>
              <td><?php echo($cantidad); ?></td>
              <td><?php echo($nomunidadmedida); ?></td>
               <td><?php echo ("$ ".number_format($valorunitario,0)); ?></td>
              <td><?php echo ("$ ".number_format($valor_cot,0)); ?></td>
              <td><?php echo($medio_pago); ?></td>  
               <td><a href="#" onclick="eliminar(<?php echo $id1; ?>);" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Eliminar">
                <i class="fa fa-trash bigger-110 "></i>
              </a></td>
            </tr>
            <?php 
              $ver=Requisiciones::vermascotizaciones($item_id,$idproveedor);
                $camposver= $ver->getCampos();
                foreach ($camposver as $campo2) {
                  $id2= $campo2['id'];
                  $otroproveedor= $campo2['proveedor_id_proveedor'];
                  $item_id2= $campo2['item_id'];
                   $medio_pago2= $campo2['medio_pago'];
                   $cotizacion2= $campo2['cotizacion'];
                  $requisicion_id2= $campo2['requisicion_id'];
                  $nombreotroproveedor=Proveedores::obtenerNombreProveedor($otroproveedor);
                   $valor_cot2= $campo2['valor_cot'];
                    $cantidad2= $campo2['cantidad'];
                    $valorunitario2=$valor_cot2/$cantidad2;
                  ?>
                  <tr class="info">
                    <td>RQ <?php echo($requisicion_id2."-".$item_id2) ?></td>
              <td><strong><small>Proveedor:</small></strong><?php echo($nombreotroproveedor); ?></td>
              <td><?php echo($cantidad2); ?></td> 
              <td><?php echo($nomunidadmedida); ?></td>   
              <td><?php echo ("$ ".number_format($valorunitario2,0)); ?></td>
              <td><?php echo ("$ ".number_format($valor_cot2,0)); ?></td>
               <td><?php echo($medio_pago2); ?></td>  
              <td><a href="#" onclick="eliminar(<?php echo $id2; ?>);" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Eliminar">
                <i class="fa fa-trash bigger-110 "></i>
              </a></td>
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
        <div class="col-xs-7">
         
         <p class="lead"><strong>Términos Comerciales</strong></p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;font-size: 8px; text-align: justify;">
           1   Señor proveedor, debera citar el numero de la orden de compra y/o servicio en la factura cuenta de cobro emitida por usted                    
2. Los materiales deben ser entregados donde el cotizante lo designe en el contenido de la orden de compray/o servicio.                   
3. Nuestra empresa registra la obligacion de retencion en la fuente a titulo de renta, por lo tanto de acuerdo a la naturaleza del servicio se aplicara la respectiva retencion.                    
4. La empresa se abstendra de recibir cuenta de cobro o factura sin los requisitos exigidos por la ley                    
5. El valor total de la orden de compra y/o servicio es un valor aproximado y por lo tanto el contratante podra a su juicio y para evitar la paralizacion del objeto contratado                   
ordenar la ejecucion de cantidades adicionales o mayores cantidades de las solicitadas en la orden, teniendo en  cuenta, que estas deveran ser autorizadas por escrito                    
6. El ordenante no tiene ningun vinculo laboral con el ordenado; ademas el presente servicio o trabajo se realiza por cuenta y riesgos exclusivos del ordenado; para los pagos a                    
que tiene derecho el ordenado debera aportar el registro unico a tributario (RUT) y los demas documentos de la lista de chequeo                   
para pagos final de servicios debe anexar acta de recibo (de servicio u obra) a satifaccion so pena de abstenerce de pagar el ordenante al ordenado la suma pactada; los pagos                    
establecidos en esta orden quedan sujetos a una retencion en la fuente sobre el valor total or el servicio y a la existencia de fondos en banco o cajas al momento de cancelarlos;                    
cualquier detrimento patrimonial del ordenante , causado por el ordenado en razon de los servicios o trabajos prestados, con la sola firma del presente documento el ordenado                   
autoriza descvontar dicha suma de los saldos adeudados; la presente orden esta regida por el derecho civil; el incumplimiento de las obligaciones contratados o la mora                   
en la entrega de los trabajos causara una multa de 10% sobre el valor total y obligara al ordenado a devolver los dineros entregado como anticipo                   
Ante cualquier duda puede comunicarse con el jefe de compras al 3126638421 o al 3002720234
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
        
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>
                  <?php 
                 
                  echo("$".number_format($Subtotalcot,0));
                   ?>
                </td>
              </tr>
            
              <tr>
                <th>Medio Pago:</th>
                <td>
                   <?php
         
          echo($mediopago);
           ?>
                </td>
              </tr>
             
            </table>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%"><small>VoBo Jefe de compra</small></th>
                <td></td>
              </tr>
            </tbody></table>
          </div>
        </div>
         <div class="col-xs-4">
          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%"><small>VoBo Jefe area financiera</small></th>
                <td></td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%"><small>Firma proveedor</small></th>
                <td></td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->

      <div class="row no-print">
        <div class="col-xs-12">
          <a href="vistas/requisiciones/cotizaciones_print.php?id=<?php echo($idproveedor); ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <?php 
          if ($id2!='') {
           echo("<strong>Elimine las cotizaciones que no aplican a este proveedor</strong>");
          }
          else
          {
            ?>
             <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Autorizar Orden
          </button>
          </form>
            <?php
          }

           ?>
         
          
          <button style="display:none;" type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>

        </div>
      </div>
    </section>
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
     window.location.href="?controller=requisiciones&&action=eliminaritemcot&&iddeleteitem="+id+"&id="+<?php echo($idproveedor); ?>;
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
