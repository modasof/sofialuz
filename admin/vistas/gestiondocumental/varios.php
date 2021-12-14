<?php 

ini_set('display_errors', '0');
//$modulo_gestion = $_GET['id_modulo'];
$id_cuenta = $_GET['id_cuenta'];
$folderSel = $_GET['folderSel'];
$Nombrecuenta=Gestiondocumental::ObtenerNombrecuenta($id_cuenta);
$IdSesion = $_SESSION['IdUser'];
include 'vistas/index/estadisticas.php';
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
          <h3 class="m-0 text-dark">Documentación (Varios) Cta.<?php echo utf8_encode($Nombrecuenta); ?></h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=gestiondocumental&&action=listacuentas">Gestión Documental Cuentas</a></li>
            <!-- <li class="breadcrumb-item active"><a href="?controller=gestiondocumental&&action=todos&&id=<?php echo($id_cuenta) ?>&&id_modulo=<?php echo($modulo_gestion) ?>">Predeterminados</a></li> -->

            <li class="breadcrumb-item active">Varios</li>
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
            require_once 'nuevovarios.php';
            ?>
    <div class="col-md-3">
        
          <div class="box box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title">Carpetas: </h3>
<a data-toggle="modal" data-target="#modal-form6" href="#"  class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i></a>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                 <li class="active"><a href="?controller=gestiondocumental&&action=varios&&id_cuenta=<?php echo($id_cuenta) ?>"><i class="fa fa-inbox"></i>Ver Todos
                  <span class="label label-primary pull-right"><?php echo($sumaporfolder) ?></span></a>
                </li>
                <?php

               $res2=Gestiondocumental::obtenerListafolder('Cuentas');
$campos2 = $res2->getCampos();
foreach($campos2 as $campo2){
            $idfolder = $campo2['id'];
            $nombre_folder = $campo2['nombre_folder'];
            $sumaporfolder=totaldocumentosFolder($idfolder,$id_cuenta);
                ?>
          <li class="active"><a href="?controller=gestiondocumental&&action=varios&&id_cuenta=<?php echo($id_cuenta) ?>&&folderSel=<?php echo($idfolder); ?>"><i class="fa fa-inbox"></i> <?php echo($nombre_folder); ?>
                  <span class="label label-primary pull-right"><?php echo($sumaporfolder) ?></span></a>
                </li>

                <?php 
              }
                  ?>
              
                    <li class=""><a style="color:green;" href="?controller=folders&&action=todos&&tipo=Cuentas"><i class="fa fa-edit"></i>Editar nombre de carpetas.
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
     <div class="col-lg-9">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Documentos Varios</a></li>
              <li><a href="#tab_2" data-toggle="tab"></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                    </div>
                 <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%; font-size: 14px;">
          <thead>
            <tr style="background-color: #4f5962;color: white;">
              
               <th>Documento</th>
               <th>Folder</th>
            
             <th>Actualizado el</th>
               <th style="width: 30%"><?php echo("texto:".$folderSel); ?></th>
            </tr>
            <tr>
              
               <th>Documento</th>
               <th>Folder</th>
            
             <th>Actualizado el</th>
               <th style="width: 30%"><?php echo("texto:".$folderSel); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php
            date_default_timezone_set("America/Bogota");
            $TiempoActual = date('Y-m-d');

            if ($folderSel!="") {
              $res=Gestiondocumental::obtenerPaginavariosporfolder($id_cuenta,$folderSel);
              $campos = $res->getCampos();
            }
            else
            {
              $campos = $campos->getCampos();
            }
            foreach ($campos as $campo){
            $id = $campo['id_midocumento'];
            $cuenta_id_cuenta = $campo['cuenta_id_cuenta'];
            $id_folder = $campo['id_folder'];
            $nombre_documento = $campo['nombre_documento'];
            $imagen = $campo['imagen'];
            $alerta = $campo['alerta'];
            $fecha_expira = $campo['fecha_expira'];
            $marca_temporal = $campo['marca_temporal'];
             $nombrefolder=Gestiondocumental::ObtenerNombreFolder($id_folder);

             if ($fecha_expira=='0000-00-00') {
              $expira="";
              $totaldias="";
            }
            else
            {
               $expira=fechalarga($fecha_expira);
               $totaldias=dias_transcurridos($TiempoActual,$fecha_expira);
            }
            ?>
           
            <tr>
             
              <td><a target="_blank" href="<?php echo($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
               <?php echo utf8_encode($nombre_documento); ?>
              </a></td>
              <td>
                <?php echo($nombrefolder); ?>
              </td>
             
                
                  <td><?php echo utf8_encode($marca_temporal); ?></td>
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
             <button type="button" class="btn btn-default btn-flat"><a href="?controller=gestiondocumental&&action=editarvarios&&id=<?php echo $id;?>&&id_cuenta=<?php echo($id_cuenta); ?>" class="tooltip-primary text-success" title="Actualizar Documento">
                <i class="fa fa-edit bigger-110 "> </i>
              </a>
             </button>
             <button type="button" class="btn btn-default btn-flat"> <a href="#" onclick="eliminar(<?php echo $id; ?>,<?php echo($id_cuenta) ?>);" class="tooltip-primary text-danger" title="Eliminar Documento">
                <i class="fa fa-trash bigger-110 "> </i>
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
        </div> <!-- Fin Row -->


        <!-- Inicio Modal Clientes -->
    <div id="modal-form6" class="modal" tabindex="-1">
               <!-- Inicio Modal -->
    <div>
    
<form action="?controller=gestiondocumental&&action=carpetaextra&&id_cuenta=<?php echo($id_cuenta) ?>" method="post" autocomplete="off">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <a href="#" type="button" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="black bigger">Crear Nueva Carpeta:</h4>
                      </div>

                      <div class="col-md-12 col-xs-12">
                          <label>Nombre Carpeta<span>*</span></label>
                          <input type="hidden" name="estado_folder" value="1">
                           <input type="hidden" name="categoria_ppal" value="Cuentas">
                           <input type="text" name="nombre_folder" placeholder="Nombre de la carpeta" class="form-control" value="" >
                          <br>
                      <br>
                      </div>
                         

                      <div class="modal-footer">
                        <a href="" class="btn btn-sm btn-danger" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Cancelar
                        </a>

                        <button class="btn btn-sm btn-success">
                          <i class="ace-icon fa fa-check"></i>
                          Confirmar
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
                </div><!-- PAGE CONTENT ENDS -->
 </div>
 <!-- FINAL MODAL -->
                
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
              
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
function eliminar($id,$cuenta){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
    //alert($modulo);
    window.location.href="?controller=gestiondocumental&&action=eliminarvarios&&id="+$id+"&&id_cuenta="+$cuenta;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
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