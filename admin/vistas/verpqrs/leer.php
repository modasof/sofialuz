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
		$id=$cc['id'];
		$fecha=$cc['fecha'];
	
		$areainv=$cc['areainv'];
		$empresa=$cc['empresa'];
		$persona=$cc['persona'];
		$email=$cc['email'];
		$telefono=$cc['telefono'];
    $ciudad=$cc['ciudad'];
    $vehiculo=$cc['vehiculo'];
    $referencia=$cc['referencia'];
    $modelo=$cc['modelo'];
    $kilometraje=$cc['kilometraje'];
    $prenda=$cc['prenda'];

    $dirperitaje=$cc['dirperitaje'];
    $cedula=$cc['cedula'];
    $tiempoempresa=$cc['tiempoempresa'];
    $contrato=$cc['contrato'];
    $monto=$cc['monto'];
    $porcentaje=$cc['porcentaje'];
    
		$file=$cc['file'];
    $file2=$cc['file2'];

    $img_frontal=$cc['img_frontal'];
    $img_posterior=$cc['img_posterior'];
    $img_lateral_izq=$cc['img_lateral_izq'];
    $img_lateral_der=$cc['img_lateral_der'];
    $img_maleta=$cc['img_maleta'];
    $img_interna=$cc['img_interna'];
    $img_motor=$cc['img_motor'];
    $img_interior_2=$cc['img_interior_2'];
    $motivo=$cc['motivo'];
		$comentario=$cc['comentario'];
		$fecha_solicitud=$cc['fecha_solicitud'];
		$notifi=$cc['notifi'];
		$status=$cc['status'];

		$date = new DateTime($cc['fecha_solicitud']);
		$fecha =  $date->format('d-m-Y H:i:s');
		
	};

	foreach($valor as $cc){
		$servicio = $cc['areainv'];
	};
	
	if (empty($servicio)){
		$servicio = 'Publica tu usado'; //Traido desde solicitudesController.php
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
          <h4 class="m-0 text-dark">Leads <?php echo $servicio;?></h4>
          <h4 class="m-0 text-dark">Leads Estrenarcarro</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=solicitudes&&action=indexmaritimo">Solicitudes de Cotización</a></li>
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
              <h3 class="card-title">Tipo Cotización</h3>

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
                <li class="nav-item" <?php if ($servicio=='Exportacion Maritima'){echo $clases;}?> >
                  <a href="?controller=pqrs&&action=indexarea&&area=Exportacion Maritima" class="nav-link" <?php if ($servicio=='Exportacion Maritima'){echo $colorletra;}?>>
                    <i class="fa fa-inbox"></i> Publica tu usado
                    <span class="badge bg-primary float-right"><?php echo $exportancionmaritima; ?></span>
                  </a>
                </li>
                <li class="nav-item" <?php if ($servicio=='Importacion Maritima'){echo $clases;}?>>
                  <a href="?controller=pqrs&&action=indexarea&&area=Importacion Maritima" class="nav-link" <?php if ($servicio=='Importacion Maritima'){echo $colorletra;}?>>
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
              <!-- <h3 class="card-title">PQRS de <?php echo $servicio; ?></h3> -->
               <h3 class="card-title">Lead Estrenarcarro.com</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>Mensaje de <?php echo $persona;?></h5>
                <h6><b>Correo:</b> <?php echo $email." <b>Empresa:</b> ".$empresa;?>
                  <span class="mailbox-read-time float-right"><?php echo $fecha;?></span></h6>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
				  <b>Cambiar Status de la Solicitud: </b>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Sin Leer" onclick="sinleer();return false;">
                  <i class="fa fa fa-share"></i> <span class="badge badge-danger">Sin Leer</span></button>
                 
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Procesando" onclick="procesando();return false;">
                  <i class="fa fa fa-share"></i> <span class="badge badge-warning">Gestionando</span></button>
				  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Cotizado" onclick="cotizado();return false;">
                  <i class="fa fa fa-share"></i> <span class="badge badge-success">Solucionado</span></button>
                </div>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p>Solicitud de Cotización</p>
                <table border="1" style="border-collapse: collapse; width: 100%;">
<?php 
  if ($areainv=='Publica tu usado') {
   ?>

					<tr>
						<td style="width: 25%;"><b>Id</b></td>
						<td><?php echo $id;?></td>
					</tr>
					<tr>
						<td style="width: 25%;"><b>Fecha Solicitud</b></td>
						<td><?php echo $fecha;?></td>
					</tr>					
					<tr>
						<td style="width: 25%;"><b>Motivo de Contacto</b></td>
						<td><?php echo $motivo;?></td>
					</tr>					
					<tr>
						<td style="width: 25%;"><b>Persona de Contacto: </b></td>
						<td><?php echo $persona;?></td>
					</tr>
					<tr>
						<td><b>Correo: </b></td>
						<td><?php echo $email;?></td>
					</tr>
					<tr>
						<td><b>Teléfono: </b></td>
						<td><?php echo $telefono;?></td>
					</tr>
					<tr>
						<td><b>Ciudad: </b></td>
						<td><?php echo $ciudad;?></td>
					</tr>
          <tr>
            <td><b>Vehículo: </b></td>
            <td><?php echo $vehiculo;?></td>
          </tr>
          <tr>
            <td><b>Referencia: </b></td>
            <td><?php echo $referencia;?></td>
          </tr>
          <tr>
            <td><b>Modelo: </b></td>
            <td><?php echo $modelo;?></td>
          </tr>
          <tr>
            <td><b>Kilometraje: </b></td>
            <td><?php echo $kilometraje;?></td>
          </tr>
          <tr>
            <td><b>Vehículo en prenda: </b></td>
            <td><?php echo $prenda;?></td>
          </tr>
					<tr>
						<td><b>Comentario: </b></td>
						<td><?php echo utf8_encode($comentario);?></td>
					</tr>
					<tr>
						<td><b>Status: </b></td>
						<td><div id="verstatus"><?php echo $status;?></div></td>
					</tr>
  <?php
  }
  elseif ($areainv=='Viabiliza tu credito') {
 ?>

  <tr>
            <td style="width: 25%;"><b>Id</b></td>
            <td><?php echo $id;?></td>
          </tr>
          <tr>
            <td style="width: 25%;"><b>Fecha Solicitud</b></td>
            <td><?php echo $fecha;?></td>
          </tr>         
          <tr>
            <td style="width: 25%;"><b>Motivo de Contacto</b></td>
            <td><?php echo $motivo;?></td>
          </tr>         
          <tr>
            <td style="width: 25%;"><b>Persona de Contacto: </b></td>
            <td><?php echo $persona;?></td>
          </tr>
           <tr>
            <td><b>Cédula: </b></td>
            <td><?php echo $cedula;?></td>
          </tr>
          <tr>
            <td><b>Correo: </b></td>
            <td><?php echo $email;?></td>
          </tr>
          <tr>
            <td><b>Teléfono: </b></td>
            <td><?php echo $telefono;?></td>
          </tr>
          <tr>
            <td><b>Ciudad: </b></td>
            <td><?php echo $ciudad;?></td>
          </tr>
          <tr>
            <td><b>Vehículo: </b></td>
            <td><?php echo $vehiculo;?></td>
          </tr>
          <tr>
            <td><b>Empresa donde labora: </b></td>
            <td><?php echo $empresa;?></td>
          </tr>
          <tr>
            <td><b>Tipo de contrato: </b></td>
            <td><?php echo $contrato;?></td>
          </tr>
          <tr>
            <td><b>Tiempo en la empresa: </b></td>
            <td><?php echo htmlentities($tiempoempresa);?></td>
          </tr>
           <tr>
            <td><b>Monto a financiar: </b></td>
            <td>$<?php 
              $Formatomoneda=number_format($monto, 0,'.', '.');
              echo $Formatomoneda; ?></td>
          </tr>
          <tr>
            <td><b>Comentario: </b></td>
            <td><?php echo utf8_encode($comentario);?></td>
          </tr>
          <tr>
            <td><b>Status: </b></td>
            <td><div id="verstatus"><?php echo $status;?></div></td>
          </tr>

 <?php 
}
?>
                </table>
              </div>
              <!-- /.mailbox-read-message -->
            </div>

<?php 
  if ($areainv=='Publica tu usado') {
 ?>
            <div class="card-footer bg-white">
              <ul class="mailbox-attachments clearfix">
                <li>
                  <span class="mailbox-attachment-icon"><a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $file; ?>" class="mailbox-attachment-name"><img style="width: 120px;height: 100px;" src="../pagina/j-folder/upload_file/<?php echo $file; ?>"></a></span>

                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $file; ?>" class="mailbox-attachment-name"><i class="fa fa-eye"></i>T.Propiedad 1</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a download="TarjetaPropiedad" href="../pagina/j-folder/upload_file/<?php echo $file; ?>" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon"><a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $file2; ?>" class="mailbox-attachment-name"><img style="width: 120px;height: 100px;" src="../pagina/j-folder/upload_file/<?php echo $file2; ?>"></a></span>

                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $file2; ?>" class="mailbox-attachment-name"><i class="fa fa-eye"></i>T.Propiedad 2</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a download="TarjetaPropiedad" href="../pagina/j-folder/upload_file/<?php echo $file2; ?>" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon"><a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_frontal; ?>" class="mailbox-attachment-name"><img style="width: 120px;height: 100px;" src="../pagina/j-folder/upload_file/<?php echo $img_frontal; ?>"></a></span>

                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_frontal; ?>" class="mailbox-attachment-name"><i class="fa fa-eye"></i>Imagen Frontal</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a download="Imagen-Frontal" href="../pagina/j-folder/upload_file/<?php echo $img_frontal; ?>" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                 <li>
                  <span class="mailbox-attachment-icon"><a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_posterior; ?>" class="mailbox-attachment-name"><img style="width: 120px;height: 100px;" src="../pagina/j-folder/upload_file/<?php echo $img_posterior; ?>"></a></span>

                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_posterior; ?>" class="mailbox-attachment-name"><i class="fa fa-eye"></i>Imagen Posterior</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a download="Imagen-Posterior" href="../pagina/j-folder/upload_file/<?php echo $img_posterior; ?>" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon"><a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_lateral_izq; ?>" class="mailbox-attachment-name"><img style="width: 120px;height: 100px;" src="../pagina/j-folder/upload_file/<?php echo $img_lateral_izq; ?>"></a></span>

                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_lateral_izq; ?>" class="mailbox-attachment-name"><i class="fa fa-eye"></i>Lateral Izquierda</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a download="Imagen-Lateral-Izq" href="../pagina/j-folder/upload_file/<?php echo $img_lateral_izq; ?>" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                 <li>
                  <span class="mailbox-attachment-icon"><a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_lateral_der; ?>" class="mailbox-attachment-name"><img style="width: 120px;height: 100px;" src="../pagina/j-folder/upload_file/<?php echo $img_lateral_der; ?>"></a></span>

                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_lateral_der; ?>" class="mailbox-attachment-name"><i class="fa fa-eye"></i>Lateral Derecha</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a download="Imagen-Lateral-Der" href="../pagina/j-folder/upload_file/<?php echo $img_lateral_der; ?>" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                 <li>
                  <span class="mailbox-attachment-icon"><a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_maleta; ?>" class="mailbox-attachment-name"><img style="width: 120px;height: 100px;" src="../pagina/j-folder/upload_file/<?php echo $img_maleta; ?>"></a></span>

                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_maleta; ?>" class="mailbox-attachment-name"><i class="fa fa-eye"></i>Imagen Maletero</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a download="Imagen-Maletero" href="../pagina/j-folder/upload_file/<?php echo $img_maleta; ?>" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon"><a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_interna; ?>" class="mailbox-attachment-name"><img style="width: 120px;height: 100px;" src="../pagina/j-folder/upload_file/<?php echo $img_interna; ?>"></a></span>

                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_interna; ?>" class="mailbox-attachment-name"><i class="fa fa-eye"></i>Imagen Interna</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a download="Imagen-Interna" href="../pagina/j-folder/upload_file/<?php echo $img_interna; ?>" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                 <li>
                  <span class="mailbox-attachment-icon"><a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_interior_2; ?>" class="mailbox-attachment-name"><img style="width: 120px;height: 100px;" src="../pagina/j-folder/upload_file/<?php echo $img_interior_2; ?>"></a></span>

                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_interior_2; ?>" class="mailbox-attachment-name"><i class="fa fa-eye"></i>Imagen Interior 2</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a download="Imagen-Interior 2" href="../pagina/j-folder/upload_file/<?php echo $img_interior_2; ?>" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                 <li>
                  <span class="mailbox-attachment-icon"><a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_motor; ?>" class="mailbox-attachment-name"><img style="width: 120px;height: 100px;" src="../pagina/j-folder/upload_file/<?php echo $img_motor; ?>"></a></span>

                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="../pagina/j-folder/upload_file/<?php echo $img_motor; ?>" class="mailbox-attachment-name"><i class="fa fa-eye"></i>Imagen Motor</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a download="Imagen-Motor" href="../pagina/j-folder/upload_file/<?php echo $img_motor; ?>" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
               
              </ul>
            </div>
  <?php 
}elseif ($areainv=='Viabiliza tu credito') {
 ?>
     <div class="card-footer bg-white">
              <ul class="mailbox-attachments clearfix">
                <li>
                  <span class="mailbox-attachment-icon"><a target="_blank" href="../pagina/j-folder2/upload_file/<?php echo $file; ?>" class="mailbox-attachment-name"><img style="width: 120px;height: 100px;" src="../pagina/j-folder2/upload_file/<?php echo $file; ?>"></a></span>

                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="../pagina/j-folder2/upload_file/<?php echo $file; ?>" class="mailbox-attachment-name"><i class="fa fa-eye"></i>Cédula 1</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a download="CedulaCliente" href="../pagina/j-folder2/upload_file/<?php echo $file; ?>" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon"><a target="_blank" href="../pagina/j-folder2/upload_file/<?php echo $file2; ?>" class="mailbox-attachment-name"><img style="width: 120px;height: 100px;" src="../pagina/j-folder2/upload_file/<?php echo $file2; ?>"></a></span>

                  <div class="mailbox-attachment-info">
                    <a target="_blank" href="../pagina/j-folder2/upload_file/<?php echo $file2; ?>" class="mailbox-attachment-name"><i class="fa fa-eye"></i>Cédula 2</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a download="CedulaCliente" href="../pagina/j-folder2/upload_file/<?php echo $file2; ?>" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
              </ul>
            </div>

 <?php
}
   ?>

            <!-- /.card-body -->
            <div id="resultado">
            </div>
            <div id="resultado2" hidden>
            </div>



            <div class="card-footer">
				<b>Cambiar status de la solicitud: </b>
              <div class="float-right">
                  <button type="button" class="btn btn-default btn-default" data-toggle="tooltip" data-container="body" title="Sin Leer" onclick="sinleer();return false;">
                  <i class="fa fa fa-share"></i> <span class="badge badge-danger">Sin Leer</span></button>
                  <button type="button" class="btn btn-default btn-default" data-toggle="tooltip" data-container="body" title="Procesando" onclick="procesando();return false;">
                  <i class="fa fa fa-share"></i> <span class="badge badge-warning">Gestionando</span></button>
                  
				  <button type="button" class="btn btn-default btn-default" data-toggle="tooltip" data-container="body" title="Cotizado" onclick="cotizado();return false;">
                  <i class="fa fa fa-share"></i> <span class="badge badge-success">Solucionado</span></button>
              </div>
              <!-- <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
              <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button> -->
            </div>
            <!-- /.card-footer -->
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


<script>
    function sinleer()
    {
        $.ajax({
            type:'POST', //aqui puede ser igual get
            url: 'vistas/verpqrs/cambiarstatus.php',//aqui va tu direccion donde esta tu funcion php
            data: {id:<?php echo $id;?>,status:'SIN LEER'},//aqui tus datos

			beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (data) {
                        $("#resultado").html("Status cambiado con exito");
                        $("#verstatus").html("SIN LEER");
                        $("#resultado2").html(data);
                },            
           error:function(data){
				$("#resultado").html(data);
           }
         });
    }

    function procesando()
    {
        $.ajax({
            type:'POST', //aqui puede ser igual get
            url: 'vistas/verpqrs/cambiarstatus.php',//aqui va tu direccion donde esta tu funcion php
            data: {id:<?php echo $id;?>,status:'GESTIONANDO'},//aqui tus datos

			beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (data) {
                        $("#resultado").html("Status cambiado con exito");
                        $("#verstatus").html("PROCESANDO");
                        $("#resultado2").html(data);
                },            
           error:function(data){
				$("#resultado").html("Hubo un error al cambiar el status...");
           }
         });
    } 
    function cotizado()
    {
        $.ajax({
            type:'POST', //aqui puede ser igual get
            url: 'vistas/verpqrs/cambiarstatus.php',//aqui va tu direccion donde esta tu funcion php
            data: {id:<?php echo $id;?>,status:'SOLUCIONADO'},//aqui tus datos

			beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (data) {
                        $("#resultado").html("Status cambiado con exito");
                        $("#verstatus").html("COTIZADO");
                        $("#resultado2").html(data);
                },            
           error:function(data){
				$("#resultado").html("Hubo un error al cambiar el status...");
           }
         });
    }       
</script>
