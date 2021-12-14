<?php 
$modulo_gestion = $_GET['id_modulo'];
$id_equipo = $_GET['id'];
$Nombrecuenta=Gestiondocumentalprov::ObtenerNombreProveedor($id_equipo);
$IdSesion = $_SESSION['IdUser'];
?>
<!-- DataTables -->
  <!-- <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Doc. Predeterminada <?php echo utf8_encode($Nombrecuenta); ?></h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=gestiondocumentalprov&&action=listaequipos">Gestión Documental Proveedores</a></li>
            <li class="breadcrumb-item active">Predeterminados</li>
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
        <?php
            //TAB DE CARROS NUEVOS Y USADOS
            require_once 'nuevopredeterminado.php';
            ?>

     <div class="col-lg-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Gestión Documental</a></li>
              <li><a href="#tab_2" data-toggle="tab">No Aplican <i class="fa fa-ban"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                    </div>
                 <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%">
          <thead>
            <tr style="background-color: #4f5962;color: white;">
              <th>Id</th>
               <th>Documento</th>
              <th>Fecha Expiración</th>
              <th>Se Vence en</th>
              <th>Alerta</th> 
             <th>Actualizado el</th>
              <th style="width: 20%">Acciones</th>
            </tr>
            <tr>
              <th>Id</th>
               <th>Documento</th>
              <th>Fecha Expiración</th>
              <th>Se Vence en</th>
              <th>Alerta</th> 
             <th>Actualizado el</th>
              <th style="width: 20%">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            date_default_timezone_set("America/Bogota");
            $TiempoActual = date('Y-m-d');
            
            $campos = $campos->getCampos();
            foreach ($campos as $campo){
            $id = $campo['id_documento'];
            $modulo_id_modulo = $campo['modulo_id_modulo'];
            $id_documento = $campo['id_documento'];
            $nombredocumento=Gestiondocumentalprov::ObtenerNombredocumento($id_documento);
            $imagen=Gestiondocumentalprov::DocumentoExiste($id_documento,$id_equipo,$modulo_id_modulo);
            $idregistro=Gestiondocumentalprov::DocumentoRegistro($id_documento,$id_equipo,$modulo_id_modulo);
            $fechaexpira=Gestiondocumentalprov::DocumentoFechaExpira($id_documento,$id_equipo,$modulo_id_modulo);
            $alerta=Gestiondocumentalprov::DocumentoAlerta($id_documento,$id_equipo,$modulo_id_modulo);
            $marca=Gestiondocumentalprov::DocumentoMarcatemporal($id_documento,$id_equipo,$modulo_id_modulo);
            $Estado=Gestiondocumentalprov::DocumentoEstado($id_documento,$id_equipo,$modulo_id_modulo);

             if ($fechaexpira=='0000-00-00') {
              $expira="";
              $totaldias="";
            }
            else
            {
               $expira=fechalarga($fechaexpira);
               $totaldias=dias_transcurridos($TiempoActual,$fechaexpira);
            }
            ?>
           
             <?php 
             if ($imagen=="") {

              ?>
              <tr class='danger text-danger'>
              <td class="text-center"><?php echo $id; ?> </td>
              <td><?php echo utf8_encode($nombredocumento); ?></td>
               <td></td>
                <td></td>
                 <td></td>
                  <td></td>
                   <td>
                      <button type="button" class="btn btn-default btn-flat"> <a  href="?controller=gestiondocumentalprov&&action=nuevo&&modulo_gestion=<?php echo($modulo_gestion); ?>&&id_cuenta=<?php echo($id_equipo); ?>"  class="tooltip-primary text-primary" title="Agregar">
                <i class="fa fa-plus bigger-100 "></i>
              </a>
            </button>
             <button type="button" class="btn btn-default btn-flat"> <a  href="?controller=gestiondocumentalprov&&action=desactivarDocumento&&id=<?php echo($id_equipo) ?>&&id_modulo=<?php echo($modulo_gestion); ?>&&id_documento=<?php echo($id_documento) ?>&&imagen=No-Aplica"  class="tooltip-danger text-danger" title="No Aplica">
                <i class="fa fa-ban bigger-100 "> No Aplica</i>
              </a>
            </button>
                   </td>
            </tr>
             <?php
           }
           elseif ($imagen=="No-Aplica") {
           // No hace nada
           }
           else{
            ?>
            <tr class='success text-success'>
              <td class="text-center"><?php echo $id; ?> </td>
              <td><?php echo utf8_encode($nombredocumento); ?></td>
              <?php 
              if ($alerta=="Si") {
               ?>
                <td><?php echo utf8_encode($expira); ?></td>
                <td><?php echo utf8_encode($totaldias); ?> días</td>
                <td>
                <?php 
                if ($totaldias>30) {
                  ?>
                   <div class="progress progress-sm active">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                </div>
                </div>
                  <?php
                }
                elseif ($totaldias<30 && $totaldias>15) {
                  ?>
                   <div class="progress progress-sm active">
                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                </div>
                </div>
                  <?php
                }
                elseif ($totaldias<15 && $totaldias>=1)
                {
                  ?>
                   <div class="progress progress-sm active">
                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                </div>
                </div>
                  <?php
                }
                elseif($totaldias==0)
                {
                  echo "<span class='badge bg-red'>Documento Vence Hoy</span>";
                }
                else
                {
                  echo "<span class='badge bg-red'>Documento Vencido</span>";
                }

                 ?>
               
                </td>
                 <?php 
               }
               else
               {
                ?>
                <td>No aplica</td>
                <td>No aplica</td>
                <td>No aplica</td>
                <?php
               }

                  ?>
                  <td><?php echo utf8_encode($marca); ?></td>
                   <td>
                     <div class="btn-group">
                        <button type="button" class="btn btn-default btn-flat"> <a target="_blank" href="<?php echo($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "></i>
              </a>
            </button>
             <button type="button" class="btn btn-default btn-flat"> <a download="Soporte" href="<?php echo($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "></i>
              </a>
            </button>
            <button type="button" class="btn btn-default btn-flat"><a href="?controller=gestiondocumentalprov&&action=editar&&idreg=<?php echo $idregistro;?>&&id_modulo=<?php echo($modulo_gestion); ?>&&id=<?php echo($id_equipo); ?>" class="tooltip-primary text-success" title="Actualizar Documento">
                <i class="fa fa-edit bigger-110 "></i>
              </a>
             </button>
            <button type="button" class="btn btn-default btn-flat"> <a href="#" onclick="eliminar(<?php echo $idregistro; ?>,<?php echo($modulo_gestion) ?>,<?php echo($id_equipo) ?>);" class="tooltip-primary text-danger" title="Eliminar Documento">
                <i class="fa fa-trash bigger-110 "></i>
              </a>
            </button>
                     </div>
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
        </div> <!-- Fin Row -->
                
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Documento</th>
                  <th>Acción</th>
                  
                </tr>
                </thead>
                <tbody>
                   <?php
            $res = Gestiondocumentalprov::obtenerNodisponibles($id_equipo);
            $Inactivos = $res->getCampos();
            foreach ($Inactivos as $mov){
              $id_registro = $mov['id_registro'];
              $documento_id_documento = $mov['documento_id_documento'];
              $nombredocumento=Gestiondocumentalprov::ObtenerNombredocumento($documento_id_documento);
            ?>
                <tr>
                  <td><?php echo utf8_encode($nombredocumento); ?></td>
                  <td>
                    <div class="btn-group">
                       <button type="button" class="btn btn-default btn-flat"> <a href="#" onclick="activar(<?php echo $id_registro; ?>,<?php echo($modulo_gestion) ?>,<?php echo($id_equipo) ?>);" class="tooltip-primary text-success" title="Activar Documento">
                <i class="fa fa-check bigger-110 "> Activar Documento</i>
              </a>
            </button>
                    </div>
                  </td>
                 
                </tr>
                <?php 
              }
                 ?>
               
                </tbody>
               
              </table>
              </div>
             
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>

      </div> <!-- Fin Row -->
    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->
</div> <!-- Fin Content-Wrapper -->

<script>
function eliminar($id,$modulo,$cuenta){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
    //alert($modulo);
    window.location.href="?controller=gestiondocumentalprov&&action=eliminar&&iddel="+$id+"&&id_modulo="+$modulo+"&&id="+$cuenta;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>
<script>
function activar($id,$modulo,$cuenta){
   eliminar=confirm("¿Deseas activar este registro?");
   if (eliminar)
    //alert($modulo);
    window.location.href="?controller=gestiondocumentalprov&&action=activar&&iddel="+$id+"&&id_modulo="+$modulo+"&&id="+$cuenta;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido activar el registro...')
}
</script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
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
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,

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
}

    });
  });
</script>

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
<script type="text/javascript">
      jQuery(function($) {
      
$('#cotizaciones thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
    } ); 
  
    var table = $('#cotizaciones').DataTable({
      responsive:true,
      "order": true,
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