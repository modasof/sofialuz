<?php
ini_set('display_errors', '0');

include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';

include_once 'modelos/maps.php';
include_once 'controladores/mapsController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

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

  <style>
            .map-container-2 {
              overflow: hidden;
              padding-bottom: 56.25%;
              position: relative;
              height: 0;
            }

            .map-container-2 iframe {
              left: 0;
              top: 0;
              height: 100%;
              width: 100%;
              position: absolute;
            }

          </style>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Conductores No Disponibles (GPS)</h1>
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


           <div class="col-md-12">


               <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">
            <div class="box-header with-border">

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">  
 <div class="col-md-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=maps&&action=todos">Ver Todos</a></li>
            <li class="breadcrumb-item active"><a href="?controller=maps&&action=disponibles">Ver Disponibles</a></li>
             <li class="breadcrumb-item active"><a href="?controller=maps&&action=ocupados">Ver No Disponibles</a></li>
          </ol>
        </div><!-- /.col -->
            
           <div class="row">
          
           
          <div class="col-md-4">
            <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">
            <tfoot style="display: table-header-group;">

               <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
               <th style="background-color: #fcf8e3" class="success"></th>
            </tfoot>
          <thead>
          <tr style="background-color: #4f5962;color: white;">
            <th>Conductor</th>
            <th >Estado</th>
             <th ><i class="fa fa-map-marker"></i></th>
          </tr>
            <tr>
            <th>Conductor</th>
            <th >Estado</th>
            <th ><i class="fa fa-map-marker"></i></th>
          </tr>
          </thead>
       <tbody>
            <?php
if ($fechaform != "") {
    $res    = horasmq::ReporteHorasporfecha($FechaStart, $FechaEnd);
    $campos = $res->getCampos();
} else {
    $campos = $campos->getCampos();
}
foreach ($campos as $campo) {
    $usuario_id     = $campo['usuario_id'];
    $latitud        = Usuarios::obtenerultimalat($usuario_id);
    $longitud       = Usuarios::obtenerultimalong($usuario_id);
    $marca_temporal = Usuarios::horaultimoreporte($usuario_id);
    $estado_usuario = Usuarios::obtenerultimoestado($usuario_id);
    $nomusuario     = Usuarios::obtenerNombreUsuario($usuario_id);

     if ($estado_usuario==1) {
      $labelestado = "Disponible";
    }elseif ($estado_usuario==2) {
      $labelestado = "No Disponible";
    }else{
      $labelestado = "Ausente";
    }

    ?>
            <tr>

               <td>
                <a href="?controller=maps&&action=porusuario&&id=<?php echo($usuario_id); ?>">
                  <?php echo ($nomusuario); ?>
                </a>
                </td>
              <td><?php echo ($labelestado); ?></td>
              <td><?php echo ($marca_temporal);?></td>

            </tr>
            <?php
}
?>
          </tbody>
          </table>

          </div>
        <div class="col-md-8">
          <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 700px; width:100%;">
          </div>
        </div>




      </div>


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
          var customLabel = {
              restaurant: {
                  label: 'R'
              },
              bar: {
                  label: 'B'
              }
          };

          function initMap() {


          var mapOptions = {
  zoom: 8,
  center: new google.maps.LatLng(9.173347860111885, -75.36537839413174)
}

            var map = new google.maps.Map(document.getElementById("map-container-google-2"), mapOptions);

var transitLayer = new google.maps.TransitLayer();
transitLayer.setMap(map);




              var infoWindow = new google.maps.InfoWindow;
          downloadUrl('https://sofialuz.net/admin/vistas/maps/xml_2.php', function(data) {

              var xml = data.responseXML;
              var markers = xml.documentElement.getElementsByTagName('marker');
              Array.prototype.forEach.call(markers, function(markerElem) {
              var idmapa = markerElem.getAttribute('id');
              var persona = markerElem.getAttribute('usuario_id');
              var horareporte = markerElem.getAttribute('marca_temporal');
              var estado_usuario = markerElem.getAttribute('estado_usuario');

              if (estado_usuario=="Disponible"){
                        var image = "https://sofialuz.net/Login/icons8-marcador-b-50.png";
              }else if(estado_usuario=="No Disponible"){
                      var image = "https://sofialuz.net/Login/icons8-marcador-b-51.png";
              }
              else{
                       var image = "https://sofialuz.net/Login/icons8-marcador-b-52.png";
              }


              var point = new google.maps.LatLng(
                          parseFloat(markerElem.getAttribute('latitud')),
                          parseFloat(markerElem.getAttribute('longitud')));
              const contentString =
                          '<div id="content">' +
                          '<div class="">' +
                          "</div>" +
                          '<center>'+
                          '<h4 id="firstHeading" class="firstHeading">'+ persona +  '</h4>' +
                          '</center>'+
                          '<div id="bodyContent">' +
                          "<p><b>Estado Actual:" + estado_usuario + "</p>" +
                          "<p><b>Última Reporte:" + horareporte + "</p>" +
                          "</p>" +
                          "</div>" +
                          "</div>";

                    //const image = "https://sofialuz.net/Login/Icons/128.png";
                      //  var icon = customLabel[codigo] || {};




                      var marker = new google.maps.Marker({
                          map: map,
                          position: point,
                        // title:"Esto es un marcador",
                        icon: image,
                      });



                      marker.addListener('click', function() {
                          infoWindow.setContent(contentString);
                          infoWindow.open(map, marker);
                      });
                  });
              });

              // Una matriz con las coordenadas de los límites de Bucaramanga, extraídas manualmente de la base de datos GADM


      }

          function downloadUrl(url, callback) {
              var request = window.ActiveXObject ?
                  new ActiveXObject('Microsoft.XMLHTTP') :
                  new XMLHttpRequest;
              request.onreadystatechange = function() {
                  if (request.readyState == 4) {
                      request.onreadystatechange = doNothing;
                      callback(request, request.status);
                  }
              };
              request.open('GET', url, true);
              request.send(null);
          }

          function doNothing() {}
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBAhvl6tz4xI_-D7ctNg4npiE6XFOBsAU&callback=initMap"
              defer>
          </script>




<!-- page script -->

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
        "order": [[ 0, "desc" ]],
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

