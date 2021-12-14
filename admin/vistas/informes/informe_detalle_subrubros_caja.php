<?php
include_once 'modelos/cajas.php';
include_once 'controladores/cajasController.php';

include_once 'modelos/subrubros.php';
include_once 'controladores/subrubrosController.php';

  $CuentaSel=$_GET['id_caja'];
   $SubrubroSel=$_GET['id_subrubro'];
   $nombresubrubro=Subrubros::obtenerNombreSubrubro($SubrubroSel);
 
      

  $cajas = Gastos::obtenerCajapor($CuentaSel);
      foreach($cajas as $caja){
      $id_caja = $caja['id_caja'];
      $nombre_caja = $caja['nombre_caja'];
      }
  $Externo="Beneficiario Externo";
  $Interno="Caja Sistema";
  $egresosporcaja=Gastos::EgresosPortipo($CuentaSel,$Interno);
  $egresosgastos=Gastos::EgresosPortipo($CuentaSel,$Externo);
  $totalegresos=$egresosporcaja+$egresosgastos;
 ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Egresos <?php echo utf8_encode($nombre_caja."-".$nombresubrubro) ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
             <li class="breadcrumb-item"><a href="?controller=informes&&action=cajas">Cajas</a></li>
             <li class="breadcrumb-item"><a href="?controller=informes&&action=movimientoscaja&&id_caja=<?php echo($CuentaSel); ?>">Movimientos Caja<?php echo($nombre_caja); ?></a></li>
             
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
    <div class="col-lg-12">
        <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Detalle Egresos</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                               <div class="pull-left tableTools-container"></div>
                  
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%">
           <tfoot style="display: table-header-group;">
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    
                                   
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
             <th>Id</th>
               <th>Fecha</th>
               <th>Valor</th>
              <th>Tipo Egreso</th>
               <th>Equipo</th>
              <th>NIT/CC</th>
              <th>Beneficiario</th>
              <th>Subrubro</th>
              <th>Detalle</th>
              <th>Acciones</th>
              
              
              
            </tr>
            <tr>
              <th>Id</th>
              <th>Fecha</th>
              <th>Valor</th>
              <th>Tipo Egreso</th>
               <th>Equipo</th>
              <th>NIT/CC</th>
              <th>Beneficiario</th>
              <th>Subrubro</th>
               <th>Detalle</th>
                <th>Acciones</th>
                
              
             
            </tr>
          </thead>
          <tbody>
            <?php
          $campos = $campos->getCampos();
            foreach ($campos as $campo){
            $id_egreso_caja = $campo['id_egreso_caja'];
            $imagen = $campo['imagen'];
            $tipo_beneficiario = $campo['tipo_beneficiario'];
            $fecha_egreso = $campo['fecha_egreso'];
            $caja_ppal = $campo['caja_ppal'];
            $caja_id_caja = $campo['caja_id_caja'];

            $identificacion = $campo['identificacion'];

            if ($caja_id_caja!=0) {
              $beneficiario=Gastos::ObtenerNombrecaja($caja_id_caja);
              $id_ingreso_caja=Gastos::obtenerIdingresocajasistema($id_egreso_caja);
            }
            else
            {
              $beneficiario = $campo['beneficiario'];
            }
            
            //$beneficiario = $campo['beneficiario'];
            $id_rubro = $campo['id_rubro'];
            $id_subrubro = $campo['id_subrubro'];
            if ($id_rubro!=0) {
              $nombrerubro=Gastos::ObtenerRubropor($id_rubro);
            }
            else
            {
              $nombrerubro="";
            }
            if ($id_subrubro!=0) {
              $nombresubrubro=Gastos::ObtenersubRubropor($id_subrubro);
            }
            else
            {
               $nombresubrubro="";
            }
            
             $equipo_id_equipo = $campo['equipo_id_equipo'];
             if ($equipo_id_equipo==0) {
               $nomequipo="No aplica";
             }
             elseif ($equipo_id_equipo==10000) {
               $nomequipo="Otros";
             }
             else
             {
              $nomequipo=Equipos::obtenerNombreEquipo($equipo_id_equipo);
             }

            $valor_egreso = $campo['valor_egreso'];
            $observaciones = $campo['observaciones'];
            
            ?>
            <tr>
              <td><?php echo utf8_encode($id_egreso_caja) ?></td>
                <td><?php echo utf8_encode($fecha_egreso) ?></td>
                 <td><?php Echo utf8_encode("$".number_format($valor_egreso));  ?></td>
              <td><?php echo utf8_encode($tipo_beneficiario) ?></td>
            <td><?php echo utf8_encode($nomequipo) ?></td>
              <td><?php echo utf8_encode($identificacion) ?></td>
              <td><?php echo utf8_encode($beneficiario) ?></td>
              
             <td><?php echo utf8_encode($nombresubrubro) ?></td>
              <td><?php echo utf8_encode($observaciones) ?></td>
              <td>
                 <div class="btn-group">
                   <button type="button" class="btn btn-default btn-flat"><a href="?controller=gastos&&action=editar&&id=<?php echo $id_egreso_caja; ?>&&id_caja=<?php echo($caja_ppal); ?>" class="tooltip-primary text-success" title="Editar Egreso">
                <i class="fa fa-edit bigger-110 "></i>
              </a>
             </button>
              <?php 
              if ($tipo_beneficiario=='Beneficiario Externo') {
                ?>
                
            <button type="button" class="btn btn-default btn-flat"> <a href="#" onclick="eliminar(<?php echo $id_egreso_caja; ?>,<?php echo($CajaSel) ?>);" class="tooltip-primary text-danger" title="Eliminar Egreso">
                <i class="fa fa-trash bigger-110 "></i>
              </a>
            </button>
                <?php
              }
              elseif ($tipo_beneficiario=='Caja Sistema') {
               ?>

                <button  type="button" class="btn btn-default btn-flat"> <a href="#" onclick="eliminarcajasistema(<?php echo $id_egreso_caja; ?>,<?php echo($id_ingreso_caja); ?>,<?php echo($CajaSel); ?>);" class="tooltip-primary text-danger" title="Eliminar Egreso">
                <i class="fa fa-trash bigger-110 "></i>
              </a>
            </button>

               <?php
              }

               ?>
             
             <button type="button" class="btn btn-default btn-flat"> <a target="_blank" href="<?php echo($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "></i>
              </a>
            </button>
             <button type="button" class="btn btn-default btn-flat"> <a download="Soporte" href="<?php echo($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-download bigger-110 "></i>
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
              </div>
              <!-- /.card-body -->
            </div>

   
      </div> <!-- Fin Row -->
    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->
</div> <!-- Fin Content-Wrapper -->
<script>
function eliminarcajasistema(idegreso,idingreso,cuentasel){
   eliminar=confirm("¿Deseas eliminar este registro?");
   
   if (eliminar)
    
  window.location.href="?controller=gastos&&action=eliminarcajasistema&&idegreso="+idegreso+"&&idingreso="+idingreso+"&&id_caja="+cuentasel+"";

else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>

<script>
function eliminar(id,cajasel){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=gastos&&action=eliminar&&id="+id+"&&id_caja=+"+cajasel;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>



 <script>
   function format2(n, currency) {
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
<!-- page script -->

<script type="text/javascript">
      jQuery(function($) {
      
$('#cotizaciones thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
    } ); 
  
    var table = $('#cotizaciones').DataTable({
       responsive:true,
      //"order": true,
       "ordering": true,
        "order": [[ 1, "desc" ]],
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
           
           
            pageTotal7 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
             // Update footer
           
             // Update footer
            $( api.column( 2 ).footer() ).html(
                '$'+format2(pageTotal7,'' )
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
         "buttons": ["colvis","copy","excel","pdf"]
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