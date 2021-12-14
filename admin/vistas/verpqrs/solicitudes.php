    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    
	<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
	<script src="plugins/dropify/dropify.min.js"></script>
	<link rel="stylesheet" href="plugins/dropify/dropify.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css">

    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

<?php 
	// OBTENER LAS SOLICITUDES DE COTIZACIÓN TRAIDO DESDE $campos TRAIDO DESDE LA CLASE Solicitudes::obtenerPagina($id,'');

	$valor = $campos->getCampos();
	foreach($valor as $cc){
		$servicio = $cc['areainv'];
	};
	
	if (empty($servicio)){
		$servicio = 'Exportacion Maritima'; //Traido desde solicitudesController.php
		}
	
	//OBTENER CANTIDAD DE CORREOS exportancionmaritima SIN LEER
	foreach($exportancionmaritima->getCampos() as $cc){
		$exportancionmaritima = $cc['cantidad'];
	};
	
	//OBTENER CANTIDAD DE CORREOS importancionmaritima SIN LEER
	foreach($importancionmaritima->getCampos() as $cc){
		$importancionmaritima = $cc['cantidad'];
	};
	
	//OBTENER CANTIDAD DE CORREOS exportancionaerea SIN LEER
	foreach($exportancionaerea->getCampos() as $cc){
		$exportancionaerea = $cc['cantidad'];
	};	

	//OBTENER CANTIDAD DE CORREOS COTIZACION importancionaerea SIN LEER
	foreach($importancionaerea->getCampos() as $cc){
		$importancionaerea = $cc['cantidad'];
	};	

	//OBTENER CANTIDAD DE CORREOS COTIZACION transporteterrestre SIN LEER
	foreach($transporteterrestre->getCampos() as $cc){
		$transporteterrestre = $cc['cantidad'];
	};	

	//OBTENER CANTIDAD DE CORREOS COTIZACION aduana SIN LEER
	foreach($aduana->getCampos() as $cc){
		$aduana = $cc['cantidad'];
	};	

	//OBTENER CANTIDAD DE CORREOS COTIZACION administrativocomercial SIN LEER
	foreach($administrativocomercial->getCampos() as $cc){
		$administrativocomercial = $cc['cantidad'];
	};	

	//OBTENER CANTIDAD DE CORREOS SIN LEER GENERAL
	foreach($sinleer->getCampos() as $cc){
		$sinleer = $cc['cantidad'];
	};	

	//OBTENER CANTIDAD DE CORREOS LEIDOS
	foreach($leidos->getCampos() as $cc){
		$leidos = $cc['cantidad'];
	};	

	//OBTENER CANTIDAD DE CORREOS gestionados
	foreach($procesados->getCampos() as $cc){
		$procesados = $cc['cantidad'];
	};	

	//OBTENER CANTIDAD DE CORREOS solucionado
	foreach($solucionado->getCampos() as $cc){
		$solucionado = $cc['cantidad'];
	};	
	
?>
  
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark">Leads Estrenarcarro.com</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active">Leads</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Formularios Activos</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
				<!--  <li class="nav-item active" style="background-color: cornflowerblue;"> -->
				<?php 
				$clases = 'class="active" style="background-color: cornflowerblue;"';
				$colorletra = 'style="color: #ffff"';
				?>
                <li class="nav-item" <?php if ($servicio=='Publica tu usado'){echo $clases;}?> >
                  <a href="?controller=pqrs&&action=indexarea&&area=Publica tu usado" class="nav-link" <?php if ($servicio=='Exportacion Maritima'){echo $colorletra;}?>>
                    <i class="fa fa-inbox"></i> Publica tu usado
                    <span class="badge bg-primary float-right"><?php echo $exportancionmaritima; ?></span>
                  </a>
                </li>
                <li class="nav-item" <?php if ($servicio=='Viabiliza tu credito'){echo $clases;}?>>
                  <a href="?controller=pqrs&&action=indexarea&&area=Viabiliza tu credito" class="nav-link" <?php if ($servicio=='Importacion Maritima'){echo $colorletra;}?>>
                    <i class="fa fa-filter"></i> Viabiliza tu crédito
                    <span class="badge bg-primary float-right"><?php echo $importancionmaritima; ?></span>
                  </a>
                </li>
                <li class="nav-item" <?php if ($servicio=='Exportacion Aerea'){echo $clases;}?>>
                  <a href="?controller=pqrs&&action=indexarea&&area=Exportacion Aerea" class="nav-link" <?php if ($servicio=='Exportacion Aerea'){echo $colorletra;}?>>
                    <i class="fa fa-filter"></i> Calcula tu cuota
                    <span class="badge bg-primary float-right"><?php echo $exportancionaerea; ?></span>
                  </a>
                </li>
               
              </ul>
            </div>
            
            <!-- /.card-body -->
          </div>
          <!-- /. box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Status</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="?controller=pqrs&&action=indexstatus&&status=sinleer" class="nav-link">
                    <i class="fa fa-circle-o text-danger"></i>
                    Sin Leer
                    <span class="badge bg-danger float-right"><?php echo $sinleer; ?></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?controller=pqrs&&action=indexstatus&&status=leido" class="nav-link">
                    <i class="fa fa-circle-o text-info"></i>
                    Leido
                    <span class="badge bg-info float-right"><?php echo $leidos; ?></span>
                  </a>
                </li>                 
                <li class="nav-item">
                  <a href="?controller=pqrs&&action=indexstatus&&status=procesando" class="nav-link">
                    <i class="fa fa-circle-o text-warning"></i> Gestionando
                    <span class="badge bg-warning float-right"><?php echo $procesados; ?></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?controller=pqrs&&action=indexstatus&&status=cotizado" class="nav-link">
                    <i class="fa fa-circle-o text-success"></i>
                    Solucionados
                    <span class="badge bg-success float-right"><?php echo $solucionado; ?></span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Leads</h3>

              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">

              <div class="table-responsive mailbox-messages">
                <table id="cotizaciones" class="table table-hover table-striped">
					<thead>
						<tr>
						  <th>id</th>
						  <th>Cliente</th>
						  <th>Comentario</th>
						  <th>Status</th>
						</tr>
					</thead>
                  <tbody>
					<?php 
						// OBTENER LAS SOLICITUDES DE COTIZACIÓN TRAIDO DESDE $campos TRAIDO DESDE 
						// LA CLASE Solicitudes::obtenerPagina($id,'');
						$valor = $campos->getCampos();
						foreach($valor as $campo){ 
							$date = new DateTime($campo['fecha_solicitud']);
							$fecha =  $date->format('d-m-Y H:i:s');
							$statusp = utf8_encode($campo['status']);
							if (utf8_encode($campo['status'])=='SIN LEER'){
								$statusp = '<span class="badge badge-danger">Sin Leer</span>';
							}
							if (utf8_encode($campo['status'])=='LEIDO'){
								$statusp = '<span class="badge badge-info">Leido</span>';
							}
							if (utf8_encode($campo['status'])=='GESTIONANDO'){
								$statusp = '<span class="badge badge-warning">Gestionando</span>';
							}							
							if (utf8_encode($campo['status'])=='SOLUCIONADO'){
								$statusp = '<span class="badge badge-success">Solucionado</span>';
							}
							?>
						  <tr>
							<td><a href="?controller=pqrs&&action=versolicitud&&id=<?php echo $campo['id'];?>"><?php echo $campo['id'];?></a></td>
							<td class="mailbox-name"><a href="?controller=pqrs&&action=versolicitud&&id=<?php echo $campo['id'];?>"><?php echo $campo['persona']; ?></a></td>
							<td class="mailbox-subject"><b><?php echo utf8_encode($campo['motivo']); ?>:</b> <?php echo utf8_encode(substr($campo['comentario'],0,60))."....<b>".$fecha."</b>"; ?></td>
							<td class="mailbox-date"><?php echo $statusp; ?></td>
							
							
							
						  </tr>							
					<?php		
							//echo "<strong>ID</strong>: ".$cc['id']." <strong>tipo de servicio:</strong> ".$cc['tipo_servicio'];
							
							};
					?>					  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  
 
</div>


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- PLUGINS EXTRA -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->


<!-- page script -->
<script>
  $(function () {
    $('#cotizaciones').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "order": [[ 0, "desc" ]],
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
  $(function () {
   $('[data-toggle="tooltip"]').tooltip();
  })
</script>
