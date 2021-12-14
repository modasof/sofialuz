<?php 

$campos = $campos->getCampos();
foreach ($campos as $campo){

	$id_caja = $campo['id_caja'];
	$nombre_caja=$campo['nombre_caja'];
	$saldo_inicial=$campo['saldo_inicial'];
	$usuario_id_usuario = $campo['usuario_id_usuario'];
	$marca_temporal=$campo['marca_temporal'];
	$estado_caja=$campo['estado_caja'];
	$caja_publicada=$campo['caja_publicada'];
	$creada_por=$campo['creada_por'];
	$observaciones=$campo['observaciones'];
	
}

$hostname = "localhost";
$username = "u234527735_sofialuz"; //
$password = "Teksystem@900710285"; //
$database = "u234527735_sofialuz";
$conexion = new mysqli($hostname, $username, $password, $database);

$rubro = $_GET['rubro'];

switch ($rubro) {
	case '1':
		$tipo = 'Banco';
		break;
	case '2':
		$tipo = 'Comunicación, Transporte y Otros';
		break;
	case '3':
		$tipo = 'Equipos';
		break;
	case '4':
		$tipo = 'Gastos Administrativo';
		break;
	case '5':
		$tipo = 'Materiales y Suministro';
		break;
	case '6':
		$tipo = 'Movimientos Financieros';
		break;
}

#SELECT fecha_egreso, valor_egreso, tipo_beneficiario, beneficiario, nombre_subrubro, observaciones FROM egresos_caja JOIN subrubros ON egresos_caja.id_subrubro=subrubros.id_subrubro WHERE caja_ppal=57 AND id_rubro=1
$query = "SELECT fecha_egreso, valor_egreso, tipo_beneficiario, beneficiario, nombre_subrubro, observaciones FROM egresos_caja JOIN subrubros ON egresos_caja.id_subrubro = subrubros.id_subrubro WHERE caja_ppal='$id_caja' AND id_rubro='$rubro'";
$procesar = $conexion->query($query);
$datos = $procesar->fetch_assoc();

?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="dist/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="dist/css/buttons.dataTables.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Estás en la caja : <?php echo $nombre_caja;?></h1> 
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
      <li class="breadcrumb-item active"><a href="?controller=cajas&&action=todos">Cajas</a></li>
    </ol>
  </section>

  	<section class="content">
	    <div class="row">
	      	<div class="col-xs-12">
	        	<div class="box box-default">
	         		<div class="box-header with-border">
	            		<h3 class="box-title">Detalles de Egresos de <?php echo $tipo;?></h3>
	          		</div>
		          	<div class="box-body">
		          		<div class="clearfix"><div class="pull-left tableTools-container"></div></div>
              			<div class="table-responsive mailbox-messages">
							<table id="cotizaciones" class="table table-striped table-bordered table-hover" style="width: 100%">
		                      	<thead>
			                        <tr style="background-color: #4f5962;color: white;">
			                        	<th>Fecha</th>
			                          	<th>Monto</th>
			                        	<th>tipo de Egreso</th>
			                        	<th>Beneficiario</th>
			                        	<th>Subrubro</th>
			                        	<th>Detalles</th>
			                          	<th>Acciones</th>
			                        </tr>
			                        <tr>
			                        	<th>Fecha</th>
			                          	<th>Monto</th>
			                        	<th>tipo de Egreso</th>
			                        	<th>Beneficiario</th>
			                        	<th>Subrubro</th>
			                        	<th>Detalles</th>
			                          	<th>Acciones</th>
			                        </tr>
		                      	</thead>
		                      	<tbody>
		                      	<?php while ($row = $procesar->fetch_assoc()) { ?>
		                      		<tr>
			                        	<td> <?php echo date("d/m/Y", strtotime($row['fecha_egreso'])); ?></td>
			                        	<td> <?php echo utf8_encode("$ ".number_format($row['valor_egreso'])); ?></td>
			                        	<td> <?php echo $row['tipo_beneficiario']; ?></td>
			                        	<td> <?php echo $row['beneficiario'];; ?></td>
			                        	<td> <?php echo $row['nombre_subrubro'];; ?></td>
			                        	<td> <?php echo $row['observaciones'];; ?></td>
			                        	<td>
			                        		<div class="btn-group">
			                        			<!-- Editar -->
			                        			<button type="button" class="btn btn-default"><a href="" class="tooltip-primary text-success" title="Editar Caja"><i class="fa fa-edit bigger-110 "></i></a></button>
			                        			<button type="button" class="btn btn-default"> <a href="#" onclick="eliminar(<?php echo $id_caja; ?>);" class="tooltip-primary text-danger" title="Eliminar Caja"><i class="fa fa-trash bigger-110 "></i></a></button>
			                        		</div>
			                        	</td>
			                      	</tr>
		                      	<?php }?>
		                      </tbody>
		                    </table>
		                </div> 
 					</div>
	        	</div>
	      	</div>
	    </div>
	</section>
</div>


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
<script type="text/javascript">
	jQuery(function($) {
		function eliminar(id){
			eliminar=confirm("¿Deseas eliminar este caja?");
			if (eliminar){
	 			// window.location.href="?controller=cajas&&action=eliminar&&id="+id;
			}
			else{
				//Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
				alert('No se ha podido eliminar el registro...');
			}

		}
		
	  
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
	    $('#cotizaciones thead tr:eq(1) th').each( function () {
	        var title = $('#cotizaciones thead tr:eq(0) th').eq( $(this).index() ).text();
	        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
	    }); 
	  
	    // Apply the search
	    table.columns().every(function (index) {
	        $('#cotizaciones thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
	            table.column($(this).parent().index() + ':visible')
	                .search(this.value)
	                .draw();    
	        });
	    });

	    var myTable = $('#cotizaciones').DataTable( {
						retrieve: true,
						"aoColumns": [
			            	{ "bSortable": false },
			            	null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
			            	{ "bSortable": false }
			          	],
			          	"aaSorting": [],
			          	"scrollX": true,
			        });
	      
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
	    });
	    
	    myTable.buttons().container().appendTo( $('.tableTools-container') );
	       
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
	    });
	    myTable.on( 'deselect', function ( e, dt, type, index ) {
			if ( type === 'row' ) {
	        	$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
	      	}
	    });
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
      
	});
</script>