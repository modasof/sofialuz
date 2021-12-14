<?php
ini_set('display_errors', '0');
include_once 'modelos/cuentas.php';
include_once 'controladores/cuentasController.php';
include_once 'modelos/egresoscuenta.php';
include_once 'controladores/egresoscuentaController.php';
include_once 'modelos/ingresoscuenta.php';
include_once 'controladores/ingresoscuentaController.php';



$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];

/*===================================================
=            Variables de Cuenta por GET            =
===================================================*/

$cuentabuscada=$_GET['cuentabuscada'];
$cuentaversus=$_GET['cuentaversus'];

/*=====  End of Variables de Cuenta por GET  ======*/


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
          <h1 class="m-0 text-dark">Informe Cruce Cuentas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
             <li class="breadcrumb-item"><a href="?controller=cuentas&&action=todos">Cuentas</a></li>
            <li class="breadcrumb-item"><a href="?controller=cuentas&&action=crucecuentas">Cruce de Cuentas</a></li>
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
			<div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><strong><?php echo($nombrecuenta1=Cuentas::ObtenerNombrecuenta($cuentabuscada)); ?></strong> <br>Debe a <?php echo($nombrecuenta2=Cuentas::ObtenerNombrecuenta($cuentaversus)); ?></span>
              <span class="info-box-number">
                <?php 
                $sumadeuda1=Cuentas::Sumadeuda($cuentaversus,$cuentabuscada);
                echo ("$ ".number_format($sumadeuda1,0));
                 ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><strong><?php echo($nombrecuenta1=Cuentas::ObtenerNombrecuenta($cuentaversus)); ?></strong> <br>Debe a <?php echo($nombrecuenta2=Cuentas::ObtenerNombrecuenta($cuentabuscada)); ?></span>
              <span class="info-box-number">
                <?php 
                $sumadeuda2=Cuentas::Sumadeuda($cuentabuscada,$cuentaversus);
                echo ("$ ".number_format($sumadeuda2,0));
                 ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

         <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>
            <div class="info-box-content">
              <?php 
              if ($sumadeuda1>$sumadeuda2) {

                $saldofinal=$sumadeuda1-$sumadeuda2;
                $cuentadeudora=Cuentas::ObtenerNombrecuenta($cuentaversus);
              }
              else{
                $saldofinal=$sumadeuda2-$sumadeuda1;
                $cuentadeudora=Cuentas::ObtenerNombrecuenta($cuentabuscada);
              }

               ?>
              <span class="info-box-text">Saldo a favor de: <br>
              <strong><?php echo($cuentadeudora); ?></strong></span>
              <span class="info-box-number">
                <?php 
                echo ("$ ".number_format($saldofinal,0));
                 ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
					
						<!-- ESTE DIV LO USO PARA CENTRAR EL FORMULARIO -->
						<!-- left column -->
					
					 <div class="col-md-6">

					 
					  	 <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success ">
            <div class="box-header with-border">
              <h3 class="box-title">Egresos de <?php echo($nombrecuenta1=Cuentas::ObtenerNombrecuenta($cuentaversus)); ?> a la cuenta <?php echo($nombrecuenta2=Cuentas::ObtenerNombrecuenta($cuentabuscada)); ?></h3>


              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-caret-square-o-down"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	            <div class="row">
      <?php 
      if ($RolSesion!=4) {
       ?>
        <form style="display:none;" action="?controller=reportes&&action=mescombustibleseq" method="post" id="FormFechas" autocomplete="off">
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

        <?php 
      }
         ?>
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
        <br>
        </div><!-- /.col -->
                 <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                    </div>
      <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
            <tfoot style="display: table-header-group;">
                               <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    
                                   
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
             
           <th>Fecha</th>
              <th>Valor</th>
            
              <th>Beneficiario</th>
             
              <th>Detalle</th>
               <th>Acciones</th>
              
            </tr>
            <tr >
            <th>Fecha</th>
              <th>Valor</th>
             
              <th>Beneficiario</th>
            
              <th>Detalle</th>
               <th>Acciones</th>
              
            </tr>
          </thead>
       <tbody>
            <?php
            $res=Cuentas::detallecrucecuenta($cuentabuscada,$cuentaversus);
           $campos = $res->getCampos();
           foreach ($campos as $campo){
            $id_egreso_cuenta = $campo['id_egreso_cuenta'];
            $beneficiario = $campo['beneficiario'];
            $caja_beneficiada= $campo['caja_beneficiada'];
            $cuenta_beneficiada = $campo['cuenta_beneficiada'];
            $cuenta_id_cuenta = $campo['cuenta_id_cuenta'];
            $imagen = $campo['imagen'];
            $fecha_egreso = $campo['fecha_egreso'];
            $valor_egreso = $campo['valor_egreso'];
            $observaciones = $campo['observaciones'];
            $id_rubro = $campo['id_rubro'];
            $marca_temporal = $campo['marca_temporal'];

            //************************************************************************************************
            // VALIDAMOS QUE TIPO DE EGRESO ES 
            //************************************************************************************************
            if ($caja_beneficiada!=0) {
              $nombrebeneficiario=Egresoscuenta::ObtenerNombrecaja($caja_beneficiada);
            }
           elseif ($cuenta_beneficiada!=0) {
              $nombrebeneficiario=Egresoscuenta::ObtenerNombrecuenta($cuenta_beneficiada);
            }
            elseif ($id_rubro!=0) {
              $nombrebeneficiario=$beneficiario;
            }
            else
            {
              $nombrebeneficiario="";
            }

             //************************************************************************************************

            ?>
            <tr>
              
              <td><?php echo utf8_encode($fecha_egreso);?></td>
              <td><?php Echo utf8_encode("$ ".number_format($valor_egreso));  ?></td>
             <td><?php echo utf8_encode($nombrebeneficiario) ?></td>
             <td><?php echo utf8_encode($observaciones) ?></td>
            
              
             
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
 



           <div class="col-md-6">

           
               <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Egresos de <?php echo($nombrecuenta1=Cuentas::ObtenerNombrecuenta($cuentabuscada)); ?> a la cuenta <?php echo($nombrecuenta2=Cuentas::ObtenerNombrecuenta($cuentaversus)); ?></h3>



              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-caret-square-o-down"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                          <div class="row">
      <?php 
      if ($RolSesion!=4) {
       ?>
        <form style="display:none;" action="?controller=reportes&&action=mescombustibleseq" method="post" id="FormFechas" autocomplete="off">
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

        <?php 
      }
         ?>
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
        <br>
        </div><!-- /.col -->
                 <div class="clearfix">
                      <div class="pull-left tableTools-container2"></div>
                    </div>
      <div class="table-responsive mailbox-messages">
          <table id="cotizaciones2" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
            <tfoot style="display: table-header-group;">
                               <th style="background-color: #f0d8d8" class="success"></th>
                                    <th style="background-color: #f0d8d8" class="success"></th>
                                    <th style="background-color: #f0d8d8" class="success"></th>
                                    <th style="background-color: #f0d8d8" class="success"></th>
                                    <th style="background-color: #f0d8d8" class="success"></th>
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
             
              <th>Fecha</th>
              <th>Valor</th>
              <th>Beneficiario</th>
              <th>Detalle</th>
               <th>Acciones</th>
            </tr>
            <tr >
             <th>Fecha</th>
              <th>Valor</th>
              <th>Beneficiario</th>
              <th>Detalle</th>
               <th>Acciones</th>
              
            </tr>
          </thead>
       <tbody>
            <?php
            $res=Cuentas::detallecrucecuenta($cuentaversus,$cuentabuscada);
           $campos = $res->getCampos();
           foreach ($campos as $campo){
            $id_egreso_cuenta = $campo['id_egreso_cuenta'];
            $tipo_egreso = $campo['tipo_egreso'];
            $beneficiario = $campo['beneficiario'];
            $caja_beneficiada= $campo['caja_beneficiada'];
            $cuenta_beneficiada = $campo['cuenta_beneficiada'];
            $cuenta_id_cuenta = $campo['cuenta_id_cuenta'];
            $imagen = $campo['imagen'];
            $fecha_egreso = $campo['fecha_egreso'];
            $valor_egreso = $campo['valor_egreso'];
            $observaciones = $campo['observaciones'];
            $id_rubro = $campo['id_rubro'];
            $marca_temporal = $campo['marca_temporal'];

            //************************************************************************************************
            // VALIDAMOS QUE TIPO DE EGRESO ES 
            //************************************************************************************************
            if ($caja_beneficiada!=0) {
              $nombrebeneficiario=Egresoscuenta::ObtenerNombrecaja($caja_beneficiada);
            }
           elseif ($cuenta_beneficiada!=0) {
              $nombrebeneficiario=Egresoscuenta::ObtenerNombrecuenta($cuenta_beneficiada);
            }
            elseif ($id_rubro!=0) {
              $nombrebeneficiario=$beneficiario;
            }
            else
            {
              $nombrebeneficiario="";
            }

             //************************************************************************************************

            ?>
            <tr>
            <tr>
              
              <td><?php echo utf8_encode($fecha_egreso) ?></td>
              <td><?php Echo utf8_encode("$ ".number_format($valor_egreso));  ?></td>
             
             <td><?php echo utf8_encode($nombrebeneficiario) ?></td>
               
            
             <td><?php echo utf8_encode($observaciones) ?></td>
            
              
             
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
     window.location.href="?controller=reportes&&action=eliminarcombustible&&id="+id;
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
           
             pageTotal1 = api
                .column( 1, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
            
           
             // Update footer
              $( api.column( 1 ).footer() ).html(
                '$'+formatmoneda(pageTotal1,'' )
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
        
    
      
      })
    </script>

<script type="text/javascript">
      jQuery(function($) {
      
$('#cotizaciones2 thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones2 thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } ); 
  
    var table = $('#cotizaciones2').DataTable({
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
           
             pageTotal1 = api
                .column( 1, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            
             // Update footer
              $( api.column( 1 ).footer() ).html(
                '$'+formatmoneda(pageTotal1,'' )
            );  
             
        },

    });
  
    // Apply the search
    table.columns().every(function (index) {
        $('#cotizaciones2 thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#cotizaciones2')
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
        myTable.buttons().container().appendTo( $('.tableTools-container2') );  
      
      })
    </script>

    