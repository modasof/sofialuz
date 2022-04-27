<?php 
include_once 'controladores/gestiondocumentalprovController.php';
include_once 'modelos/gestiondocumentalprov.php';

include_once 'controladores/egresoscuentaController.php';
include_once 'modelos/egresoscuenta.php';

include_once 'controladores/comprasController.php';
include_once 'modelos/compras.php';


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
          <h1 class="m-0 text-dark">Proveedores</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active">Proveedores</li>
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
    <div class="card card-primary">
      <div class="card-body">
        <a id="btnrelacionar" href="" class="btn btn-success" style="float: right; display: none; cursor: pointer;"><i class="fa fa-dollar bigger-110 "></i> Relación de Pagos</a>
       

    <!--  <div class="card-header">
        <h3 class="card-title">Vehiculos</h3>
      </div> -->
      <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table display-compact table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 13px;">
             <tfoot style="display: table-header-group;">
                                    <th style="background-color: #dff0d8" class="success">
                                      <input type="checkbox" id="seleccionar-todos"> todos
                                    </th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                       
                            </tfoot>
          <thead>
              <tr style="background-color: #4f5962;color: white;">
              <th>Proveedor</th>
              <th>Pagos</th>
              <th>Compras</th>
              <th>Saldo Pendiente</th>
               <th>Saldo Anticipo</th>
              <th>Acción</th>
            </tr>
            <tr>
              <th>Proveedor</th>
              <th>Pagos</th>
              <th>Compras</th>
              <th>Saldo Pendiente</th>
              <th>Saldo Anticipo</th>
              <th>Acción</th>
            </tr>
          </thead>
       <tbody>
            <?php
            $campos = $campos->getCampos();
            foreach ($campos as $campo){
            $id = $campo['id_proveedor'];
            $nombre_proveedor = $campo['nombre_proveedor'];

            $pagos=Egresoscuenta::egresosporproveedor($id);
            $comprasproveedor=Compras::comprasporproveedor($id);
            $saldo=$comprasproveedor-$pagos;
            if ($saldo!=0) {           
            ?>
            <tr>
              <td id="listado">
                 <input type="checkbox" id="<?php echo $id; ?>" name="inputdespachos" onclick="marcardespacho(<?php echo $id; ?>)" style="cursor: pointer;">
                <?php echo utf8_encode($nombre_proveedor); ?>
            </td>
              <td><?php echo("$ ".number_format($pagos,0)) ;?></td>
               <td><?php echo("$ ".number_format($comprasproveedor,0)) ;?></td>
                
                 <?php 
                 if($saldo>0){
                  echo("<td>$".number_format($saldo,0)."</td>");
                   echo("<td>$".number_format(0,0)."</td>");
                 }elseif ($saldo<0) {
                  echo("<td>$".number_format(0,0)."</td>");
                   echo("<td>$".number_format($saldo,0)."</td>");
                 }
                  ?>
               
            <td>
              <a href="?controller=proveedores&&action=estadocuenta&&id=<?php echo $id; ?>" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Estado de cuentas">
                <i class="fa fa-dollar bigger-110 "> Ver Estado de Cuentas</i>
              </a>
              </td>
            </tr>
            <?php
          }
              }
            ?>
          </tbody>
          </table>
        </div> <!-- Fin Row -->
      </div> <!-- Fin card -->
    </div>
    </div>



      </div> <!-- Fin Row -->
    </div> <!-- Fin Container -->
  </div> <!-- Fin Content-->
</div> <!-- Fin Content-Wrapper -->

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
      btn.href = "?controller=proveedores&action=listadoproveedorespago&des="+valoresconcant+"&id="+id;
    }

  }


        $(document).ready(function() {
} );
    </script>

<script>
function eliminar(id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=proveedores&&action=eliminar&&id="+id;
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
<script type="text/javascript">
      jQuery(function($) {
      
$('#cotizaciones thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
    } ); 
  
    var table = $('#cotizaciones').DataTable({
     "ordering": true,
        "order": [[ 3, "desc" ]],
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

             pageTotal4 = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
             // Update footer
           
             // Update footer
            $( api.column( 1 ).footer() ).html(
                '$'+format2(pageTotal1,'' )
            );  
               // Update footer
            $( api.column( 2 ).footer() ).html(
                '$'+format2(pageTotal2,'' )
            );  
               // Update footer
            $( api.column( 3 ).footer() ).html(
                '$'+format2(pageTotal3,'' )
            );  

             $( api.column( 4 ).footer() ).html(
                '$'+format2(pageTotal4,'' )
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
        
      
      
      })
    </script>
     <script>
      $(function(){
        $('#seleccionar-todos').change(function() {
          $('#listado > input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });
      });
</script>