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
include_once 'modelos/requisicionesitems.php';
include_once 'modelos/servicios.php';
include_once 'controladores/serviciosController.php';
include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';
include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';
include_once 'modelos/categoriainsumos.php';
include_once 'controladores/categoriainsumosController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';
include_once 'controladores/requisicionesitemsController.php';

include_once 'modelos/rubros.php';
include_once 'controladores/rubrosController.php';

include_once 'modelos/estadosreq.php';
include_once 'controladores/estadosreqController.php';

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
          <h1 class="m-0 text-dark">Módulo Requisiciones</h1>
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
                $nombreuser=Usuarios::obtenerNombreUsuario($IdSesion);
                echo($nombreuser);
                ?>
                  
                </h3>
              <h5 class="widget-user-desc">Requisiciones por Estado</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                  <?php
                    $rubros = Estadosreq::ObtenerListaEstados();
                    foreach ($rubros as $campo){
                      $id = $campo['id'];
                      $nombre = $campo['nombre'];
                      $cantidaditems=contarregistrosporestado($id,$IdSesion)
                    ?>
                    <li><a href="#"><?php echo($nombre); ?> <span class="pull-right badge bg-orange"><?php echo($cantidaditems) ?></span></a></li>
                    <?php } ?>
              
               
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
              <h3 class="box-title">Requisiciones (Administrador)</h3>
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
                    $rubros = Estadosreq::ObtenerListaEstadosadmin();
                    foreach ($rubros as $campo){
                      $id = $campo['id'];
                      $nombre = $campo['nombre'];
                      $cantidaditems=contarregistrosporestadoadmin($id);

                    ?>
                  <?php 
                  if ($estadosolicitado==$id) {
                   ?>
                    <a href="?controller=requisiciones&&action=todosporusuarioestadoadmin&&estadosolicitado=<?php echo($id) ?>" class="btn btn-success " type="Submit"><small><?php echo($nombre); ?></small><span style="margin-left:3px;" class="pull-right badge bg-white"><?php echo($cantidaditems) ?></span></a>
                   <?php
                  }
  
                  else
                  {
                    ?>
                     <a href="?controller=requisiciones&&action=todosporusuarioestadoadmin&&estadosolicitado=<?php echo($id) ?>" class="btn btn-primary " type="Submit"><small><?php echo($nombre); ?></small><span style="margin-left:3px;" class="pull-right badge bg-white"><?php echo($cantidaditems) ?></span></a>
                    <?php
                  }
                   ?>
          
                    

                    <?php } ?>
              
             

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
        if ($fechaform!="") {
          ?>
           <h3 class="m-0 text-dark">Requisiciones (Administrador)<?php echo(fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></h3>
          <?php
        }
        else
        {
          ?>
           <h3 class="m-0 text-dark">Requisiciones (Administrador)</h3>
          <?php
        }
         ?>
         
        </div><!-- /.col -->
              <div class="clearfix">
                 <a id="btnrelacionar" href="" class="btn btn-success" style="float: right; display: none; cursor: pointer;"><i class="fa fa-exchange bigger-110 "></i> Gestionar Estado</a>
                  <br><br>   
                      <div class="pull-left tableTools-container"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 13px;">
          <tfoot style="display: table-header-group;">
                                   
                                      <th style="background-color: #fcf8e3" class="success">
                                        
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
                                         <th style="background-color: #fcf8e3" class="success"></th> <?php 
                                         if ($estadosolicitado==6) {
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
            <th >Solicitado por</th>
            <th >Fecha Solicitud</th>
            <th >Categoria</th>
            <th >Insumo</th>
             <th >Cantidad</th>
            <th >Und</th>
            <th >Fecha Entrega</th>
            <?php 
              if ($estadosolicitado==6) {
            ?>
             <th >Cot1</th>
              <th >Cot2</th>
               <th >Cot3</th>
<?php 
  }
 ?>
            <th >Observaciones</th>
            <th >Estado</th>
            <th>Acción</th>
            </tr>
            <tr>
            <th >Id</th>
             <th >Solicitado por</th>
            <th >Fecha Solicitud</th>
            <th >Categoria</th>
            <th >Insumo</th>
            <th >Cantidad</th>
            <th >Und</th>
            <th >Fecha Entrega</th>
            <?php 
              if ($estadosolicitado==6) {
            ?>
             <th >Cot1</th>
              <th >Cot2</th>
               <th >Cot3</th>
<?php 
  }
 ?>
            <th >Observaciones</th>
            <th >Estado</th>
            <th>Acción</th>
            </tr>
          </thead>
       <tbody>
            <?php
            if ($fechaform!="") {

              $res=Requisicionesitems::porfechaUsuario($FechaStart,$FechaEnd,$IdSesion);

              $campos = $res->getCampos();
            }
            else
            {
              if ($estadosolicitado=='') {
               $res=Requisicionesitems::todosporusuarioadmin();
              $campos = $res->getCampos();
              }
              else
              {
                $res=Requisicionesitems::todosporusuarioestadoadmin($estadosolicitado);
                $campos = $res->getCampos();
              }
              
            }
            foreach ($campos as $campo){
            $iditem = $campo['id'];
            $fecha_reporte = $campo['fecha_reporte'];
            $actividad = $campo['actividad'];
            $insumo_id_insumo = $campo['insumo_id_insumo'];
            $servicio_id_servicio = $campo['servicio_id_servicio'];
            $equipo_id_equipo = $campo['equipo_id_equipo'];
            $usuario_creador = $campo['usuario_creador'];
            $cantidad = $campo['cantidad'];
            $fecha_entrega = $campo['fecha_entrega'];
            $observaciones = $campo['observaciones'];
            $requisicion_id = $campo['requisicion_id'];
            $marca_temporal = $campo['marca_temporal'];
            $estado_item = $campo['estado_item'];
            $tipo_req = $campo['tipo_req'];

            $nomsolicita=Usuarios::obtenerNombreUsuario($usuario_creador);

            if ($tipo_req=='Insumos') {
                $detallesolicitado=Insumos::obtenerNombreInsumo($insumo_id_insumo);
                $categoriaid=Insumos::obtenerCategoria($insumo_id_insumo);
                $nomcategoria=Categoriainsumos::obtenerNombre($categoriaid);
                $unidadmedidaid=Insumos::obtenerUnidadmed($insumo_id_insumo);
                $nomunidadmedida=Unidadesmed::obtenerNombre($unidadmedidaid);
            }
            elseif ($tipo_req=='Servicios') {
              $detallesolicitado=Servicios::obtenerNombre($servicio_id_servicio);
               $nomcategoria='Servicios';
               $nomunidadmedida='Und';
            }
            else
            {
              $detallesolicitado=Equipos::obtenerNombreEquipo($equipo_id_equipo);
               $nomcategoria='Equipos';
               $nomunidadmedida='Und';
            }
             $estadoactual= Estadosreq::obtenerNombre($estado_item);

            ?>
            <tr>
              <td>RQ<?php echo ($requisicion_id);?>-<?php echo($iditem); ?> 
               <input type="checkbox" id="<?php echo $iditem; ?>" name="inputdespachos" onclick="marcardespacho(<?php echo($requisicion_id) ?>)" style="cursor: pointer;">
            </td>
              <td><?php echo ($nomsolicita) ?></td>
              <td><?php echo ($fecha_reporte) ?></td>
              <td><?php echo utf8_encode($nomcategoria); ?></td>
              <td><?php echo utf8_encode($detallesolicitado); ?></td>
             
              <td><?php echo utf8_encode($cantidad); ?></td>
               <td><?php echo utf8_encode($nomunidadmedida); ?></td>
              <td><?php echo utf8_encode($fecha_entrega); ?></td>
              <?php 
              if ($estadosolicitado==6) {
            ?>
            <?php 
                  $valor1=valorcot($iditem,'Cotizacion 1');
                  if ($valor1==0) {
                    echo("<td style='color:red;'>");
                  }
                  else{
                    echo("<td style='color:green;'>");
                  }
                  
                  echo("$".number_format($valor1,0));
                  echo("</td>");

            ?>

<?php 
                  $valor2=valorcot($iditem,'Cotizacion 2');
                  if ($valor2==0) {
                    echo("<td style='color:red;'>");
                  }
                  else{
                    echo("<td style='color:green;'>");
                  }
                  
                  echo("$".number_format($valor2,0));
                  echo("</td>");

            ?>
              <?php 
                  $valor3=valorcot($iditem,'Cotizacion 3');
                  if ($valor3==0) {
                    echo("<td style='color:red;'>");
                  }
                  else{
                    echo("<td style='color:green;'>");
                  }
                  
                  echo("$".number_format($valor3,0));
                  echo("</td>");

            ?>
<?php 
  }
 ?>
              <td><?php echo utf8_encode($observaciones); ?></td>
              <td><?php echo utf8_encode($estadoactual); ?>
                 <a href="?controller=requisicionesitems&&action=trazabilidadadmin&&id=<?php echo($requisicion_id) ?>&&iditem=<?php echo($iditem) ?>"><span data-toggle="tooltip" title="" class="badge bg-light-blue fa fa-comments fa-1x " data-original-title="Total Observaciones"><small>  <?php 
                  $totalcomentarios=contarcomentarios($iditem);
                  echo($totalcomentarios);
                   ?></small>
                  </a>
                </span>
              </td>
              <td>
                 <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle">
                          Acción
                          <span class="ace-icon fa fa-caret-down icon-on-right"></span>
                        </button>

                        <ul class="dropdown-menu dropdown-info dropdown-menu-right">
                 <li>
               <a href="?controller=requisicionesitems&&action=trazabilidadadmin&&id=<?php echo($requisicion_id) ?>&&iditem=<?php echo($iditem) ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Trazabilidad">
                <i class="fa fa-comments bigger-110 "> Trazabilidad</i>
              </a>
                </li> 
                    
                                             
                        </ul>
                      </div>
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
     window.location.href="?controller=requisiciones&&action=eliminar&&id="+id;
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

    if (valoresconcant==""){
      btn.style.display = "none";
    }else{
      btn.style.display = "";

      btn.href = "?controller=requisicionesitems&action=cambiarestadoadmin&des="+valoresconcant+"&id="+id;
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
        
         
      
      
      
      
      
    
      
      })
    </script>