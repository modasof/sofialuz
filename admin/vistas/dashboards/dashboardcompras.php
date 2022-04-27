<?php 
$RolSesion = $_SESSION['IdRol'];
error_reporting(E_ALL);
ini_set('display_errors', '0');
include 'vistas/index/funciones.php';
include_once 'modelos/cuentas.php';
include_once 'controladores/cuentasController.php';
include_once 'modelos/gestiondocumental.php';
include_once 'controladores/gestiondocumentalController.php';

include_once 'modelos/requisicionesitems.php';
include_once 'controladores/requisicionesitemsController.php';

include_once 'modelos/requisiciones.php';
include_once 'controladores/requisicionesController.php';

include_once 'modelos/gestiondocumentaleq.php';
include_once 'controladores/gestiondocumentaleqController.php';

include_once 'controladores/equiposController.php';
include_once 'modelos/equipos.php';

include_once 'controladores/concretoController.php';
include_once 'modelos/concreto.php';

include_once 'controladores/proveedoresController.php';
include_once 'modelos/proveedores.php';

include_once 'controladores/comprasController.php';
include_once 'modelos/compras.php';

include_once 'controladores/proyectosController.php';
include_once 'modelos/proyectos.php';

include_once 'controladores/rubrosController.php';
include_once 'modelos/rubros.php';

include_once 'controladores/categoriainsumosController.php';
include_once 'modelos/categoriainsumos.php';

include_once 'controladores/informecuentasporcobrarController.php';
include_once 'modelos/informecuentasporcobrar.php';

include_once 'controladores/equiposController.php';

include 'vistas/index/estadisticas.php';
include 'vistas/index/estadisticas_acpm.php';

include 'vistas/index/estadisticas_despachoscl.php';
include 'vistas/index/estadisticas_index.php';
include 'vistas/index/estadisticas_indexequipos.php';
include 'vistas/index/estadisticasinforme1.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];
$elcliente = $_SESSION['CodigoCliente'];

date_default_timezone_set("America/Bogota");
$totaldiasmes= date('t');


$mesactual= date('n');
$hoy= date('d');
$ayer=$hoy-1;
$antier=$hoy-6;


# ================================================
# =           Parametrización del año            =
# ================================================

if (isset($_GET['consultaAnual'])) {
    $anoactual = $_GET['consultaAnual'];
    $tope= 13;
}else{
    $anoactual   = date('Y');
    $tope= $mesactual+1;
}

# ======  End of Parametrización del año   =======


$mesanterior=$mesactual-1;

  $primerdiames=$mesactual."/01/".$anoactual;
  $ultimodiames=$mesactual."/".$totaldiasmes."/".$anoactual;

  $primerdiamescons=$anoactual."-".$mesactual."-01";
  $ultimodiamescons=$anoactual."-".$mesactual."-".$totaldiasmes;

$fechaform=$_POST['daterange'];


$FechaInicioDia=($primerdiamescons." 00:00:000");
$FechaFinalDia=($ultimodiamescons." 23:59:000");
//echo("FECHA QUE LLEGA:".$FechaInicioDia1."<br>");

$primerdiamesanterior=$anoactual."-".$mesanterior."-01";
$ultimodiamesanterior=$anoactual."-".$mesanterior."-".$totaldiasmes;
// Fecha del Mes anterior
$InicioMesanterior=($primerdiamesanterior." 00:00:000");
$FinalMesanterior=($ultimodiamesanterior." 23:59:000");


date_default_timezone_set("America/Bogota");
$MarcaTemporal = date('Y-m-d');
$MarcaTemporalAyer = $anoactual."-".$mesactual."-".$ayer;
$MarcaTemporalAntier = $anoactual."-".$mesactual."-".$antier;


$FechaInicioDiaActual=($MarcaTemporal." 00:00:000");
$FechaFinalDiaActual=($MarcaTemporal." 23:59:000");

$FechaInicioDiaAnterior=$anoactual."-".$mesactual."-".$ayer." 00:00:0000";
$FechaFinalDiaAnterior=$anoactual."-".$mesactual."-".$ayer." 23:59:0000";

 $fecha_actual = date("d-m-Y");
$semanaantes=date("Y-m-d",strtotime($fecha_actual."- 1 week")); 
$FechaInicio7dias=$semanaantes." 00:00:0000";
$FechaFinal7dias=$anoactual."-".$mesactual."-".$hoy." 23:59:0000";

$quincedias=date("Y-m-d",strtotime($fecha_actual."- 4 week")); 
$FechaInicio15dias=$quincedias." 00:00:0000";
$FechaFinal15dias=$anoactual."-".$mesactual."-".$hoy." 23:59:0000";

$sesentadias=date("Y-m-d",strtotime($fecha_actual."- 8 week")); 
$FechaInicio60dias=$sesentadias." 00:00:0000";
$FechaFinal60dias=$anoactual."-".$mesactual."-".$hoy." 23:59:0000";



$inicio2021="2021-01-01 00:00:0000";
$FechaFinal60dias=$anoactual."-".$mesactual."-".$hoy." 23:59:0000";

//echo("FECHA QUE LLEGA:".$fechaform."<br>");

$Sumacombustibledia=ReporteCombustibledia($FechaInicio15dias,$FechaFinal15dias);

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
  $datofechain=$primerdiames;
          }
else
  {
    $FechaStart=($FechaUno." 00:00:000");
    $datofechain=$FechaUno;
  }
// Validación de la fecha en que Termina el Día
if ($FechaDos=="") {
    $FechaEnd=$FechaFinalDia;
    $datofechafinal=$ultimodiames;
  }
else
  {
    $FechaEnd=($FechaDos." 23:59:000");
    $limpiarvariable=str_replace(" ", "", $FechaDos);
    $datofechafinal=$limpiarvariable;
  }

 ?>
<!-- Content Wrapper. Contains page content -->

<!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector2').select2();
    });
});
</script>
<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard Compras
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


<div class="col-md-12">


<div class="row">
<?php 
// 2. Reporte mes a mes de las compras (se debe llamar el script de la gráfica).
    include 'vistas/graficas/compras-index.php';
    include 'vistas/graficas/compras-tipo.php';
    include 'vistas/graficas/compras-inventario.php';
 ?>

</div>

    <!-- Main content -->
<div class="col-md-6">
     <div class="box">
        
            <div class="box-body">
                                             <div class="row">
        <form action="?controller=dashboards&&action=dashboardcompras" method="post" id="FormFechas" autocomplete="off">
         <div class="col-md-8">
                        <div class="form-group">
                          <label>Seleccione el Rango de Fecha<span>*</span></label>
                          <input type="text"  name="daterange" class="form-control" required value="">
                        </div>
                      </div>
          <div class="form-group">
            <div class="col-xs-12 col-sm-4">
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
if ($fechaform != "") {
    ?>
           <small class="m-0 text-dark">Reporte Compras Insumos/Servicios del <?php echo (fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></small>
          <?php
} else {
    ?>
           <small class="m-0 text-dark">Reporte Compras Insumos/Servicios últimos 30 días</small>
          <?php
}

?>

        </div>
            </div>
            <!-- /.box-body -->
      
          </div>
</div>


<div class="col-md-6">

<div class="box">
<div class="box-header">
<h3 class="box-title">Accesos Rápidos</h3>
</div>
<div class="box-body">
<a href="?controller=proveedores&&action=cxpproveedor" class="btn btn-app">
<i class="fa fa-dollar"></i> CxP Proveedor
</a>

<a href="?controller=proveedores&&action=showrelacionpagos" class="btn btn-app">
<i class="fa fa-list"></i> Relaciones de Pago</a>

</div>


</div>

</div>




<div class="col-md-4">
               <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success ">
            <div class="box-header with-border">
              <h3 class="box-title">Compras x Rubro 

                 <?php
if ($fechaform != "") {
    ?>
           <small class="m-0 text-dark">del <?php echo (fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></small>
          <?php
} else {
    ?>
            <small class="m-0 text-dark">del <?php echo (fechalarga($quincedias)) ?> al <?php echo (fechalarga($fecha_actual)) ?></small>
          <?php
}

?>
              </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                          <div class="row">
    
      </div>
       <div class="col-sm-12">
        <br>
        </div><!-- /.col -->
                 <div class="clearfix">
                      <div class="pull-left tableTools-container2"></div>
                    </div>
      <div class="table-responsive mailbox-messages">
          <table id="cotizacionesrubro" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
            <tfoot style="display: table-header-group;">
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">  
            <th>Rubro</th>
            <th>Valor</th>
            <th>%</th>
            </tr>
           
          </thead>
       <tbody>
            <?php
            if ($fechaform!="") {
              $res=Compras::porfechacomprarubro($FechaStart,$FechaEnd);
              $campos = $res->getCampos();
              $totalcomprasfecha=Comprasmesgeneralfecha($FechaStart,$FechaEnd);
              $fechaconsulta=$fechaform;
            }else{
              $res=Compras::porfechacomprarubro($FechaInicio15dias,$FechaFinalDia);
              $campos = $res->getCampos();
              $totalcomprasfecha=Comprasmesgeneralfecha($FechaInicio15dias,$FechaFinalDia);
              $fechaconsulta=$fechaform;
            }
            foreach ($campos as $campo){        
            $rubro = $campo['rubro']; 
            if ($rubro==0) {
                $nomrubro="Sin Rubro";
            }
            else{
                 $nomrubro=Rubros::obtenerNombreRubro($rubro);
            }
          
           if ($fechaform!="") {
            $totalconsumorubro=Comprasrubrofecha($FechaStart,$FechaEnd,$rubro);
        }else{
             $totalconsumorubro=Comprasrubrofecha($FechaInicio15dias,$FechaFinalDia,$rubro);   
        }
            $porcentajeconsumorubro=($totalconsumorubro/$totalcomprasfecha)*100;
            ?>
            <tr>
              <td><a href="?controller=reportes&&action=infovolqueta&daterange=<?php echo($fechaconsulta); ?>&idvolqueta=<?php echo($equipo_id_equipo) ?>"><?php echo ($nomrubro) ?></a></td>
             <td><?php  echo ("$".number_format($totalconsumorubro,0)) ?></td>
              <td><?php  echo (round($porcentajeconsumorubro,2)) ?>%</td>
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


<div class="col-md-4">
               <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success ">
            <div class="box-header with-border">
              <h3 class="box-title">Compras x Proyecto 

                 <?php
if ($fechaform != "") {
    ?>
           <small class="m-0 text-dark">del <?php echo (fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></small>
          <?php
} else {
    ?>
            <small class="m-0 text-dark">del <?php echo (fechalarga($quincedias)) ?> al <?php echo (fechalarga($fecha_actual)) ?></small>
          <?php
}

?>
              </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                          <div class="row">
    
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
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">  
            <th>Proyecto</th>
            <th>Valor</th>
            <th>%</th>
            </tr>
           

          </thead>
       <tbody>
            <?php
            if ($fechaform!="") {
              $res=Compras::porfechacompraproyecto($FechaInicio15dias,$FechaFinalDia);
              $campos = $res->getCampos();
              $comprasfechainsumos=Comprasmesgeneralfechatipo($FechaInicio15dias,$FechaFinalDia,'Insumos');
              $comprasfechaservicios=Comprasmesgeneralfechatipo($FechaInicio15dias,$FechaFinalDia,'Servicios');
              $totalcomprasfecha=$comprasfechainsumos+$comprasfechaservicios;
              $fechaconsulta=$fechaform;
            }else{
              $res=Compras::porfechacompraproyecto($FechaInicio15dias,$FechaFinalDia);
              $campos = $res->getCampos();
              $comprasfechainsumos=Comprasmesgeneralfechatipo($FechaInicio15dias,$FechaFinalDia,'Insumos');
              $comprasfechaservicios=Comprasmesgeneralfechatipo($FechaInicio15dias,$FechaFinalDia,'Servicios');
              $totalcomprasfecha=$comprasfechainsumos+$comprasfechaservicios;
              $fechaconsulta=$fechaform;
            }
            foreach ($campos as $campo){        
            $proyecto = $campo['proyecto']; 
            $nomproyecto=Proyectos::obtenerNombreProyecto($proyecto);
             if ($fechaform!="") {
            $totalconsumo=Comprasproyectofecha($FechaStart,$FechaEnd,$proyecto);
        }else{
             $totalconsumo=Comprasproyectofecha($FechaInicio15dias,$FechaFinalDia,$proyecto);
        }
            $porcentajeconsumo=($totalconsumo/$totalcomprasfecha)*100;
            ?>
            <tr>
              <td><a href="?controller=reportes&&action=infovolqueta&daterange=<?php echo($fechaconsulta); ?>&idvolqueta=<?php echo($equipo_id_equipo) ?>"><?php echo ($nomproyecto) ?></a></td>
             <td><?php  echo ("$".number_format($totalconsumo,0)) ?></td>
              <td><?php  echo (round($porcentajeconsumo,2)) ?>%</td>
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



<div class="col-md-4">
               <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success ">
            <div class="box-header with-border">
              <h3 class="box-title">Compras x Categoria Insumo 

                 <?php
if ($fechaform != "") {
    ?>
           <small class="m-0 text-dark">del <?php echo (fechalarga($datofechain)) ?> al <?php echo (fechalarga($datofechafinal)) ?></small>
          <?php
} else {
    ?>
            <small class="m-0 text-dark">del <?php echo (fechalarga($quincedias)) ?> al <?php echo (fechalarga($fecha_actual)) ?></small>
          <?php
}

?>
              </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                          <div class="row">
    
      </div>
       <div class="col-sm-12">
        <br>
        </div><!-- /.col -->
                 <div class="clearfix">
                      <div class="pull-left tableTools-container3"></div>
                    </div>
      <div class="table-responsive mailbox-messages">
          <table id="cotizacionescategoria" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
            <tfoot style="display: table-header-group;">
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                                <th style="background-color: #fcf8e3" class="success"></th>
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">  
            <th>Categoría</th>
            <th>Valor</th>
            <th>%</th>
            </tr>
           
          </thead>
       <tbody>
            <?php
            if ($fechaform!="") {
              $res=Compras::porfechacompracategoria($FechaStart,$FechaEnd);
              $campos = $res->getCampos();
             $totalcomprasfecha=Comprasmesgeneralfechatipo($FechaStart,$FechaEnd,'Insumos');
              $fechaconsulta=$fechaform;
            }else{
              $res=Compras::porfechacompracategoria($FechaInicio15dias,$FechaFinalDia);
              $campos = $res->getCampos();
              $totalcomprasfecha=Comprasmesgeneralfechatipo($FechaInicio15dias,$FechaFinalDia,'Insumos');
              $fechaconsulta=$fechaform;
            }
            foreach ($campos as $campo){        
            $categoria = $campo['categoria']; 
            $nomcategoria=Categoriainsumos::obtenerNombre($categoria);
             if ($fechaform!="") {
            $totalconsumocategoria=Comprascategoriafecha($FechaStart,$FechaEnd,$categoria);
        }else{
            $totalconsumocategoria=Comprascategoriafecha($FechaInicio15dias,$FechaFinalDia,$categoria);
        }
            $porcentajeconsumocategoria=($totalconsumocategoria/$totalcomprasfecha)*100;
            ?>
            <tr>
              <td><a href="?controller=reportes&&action=infovolqueta&daterange=<?php echo($fechaconsulta); ?>&idvolqueta=<?php echo($equipo_id_equipo) ?>"><?php echo ($nomcategoria) ?></a></td>
             <td><?php  echo ("$".number_format($totalconsumocategoria,0)) ?></td>
              <td><?php  echo (round($porcentajeconsumocategoria,2)) ?>%</td>
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


</div>



</div>

</div>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

          <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
          <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
          <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

          <script src="dist/js/buttons.colVis.min.js"></script>
          <script src="dist/js/buttons.print.min.js"></script>
           <script src="dist/js/dataTables.select.min.js"></script>
           <script src="dist/js/buttons.flash.min.js"></script>



<script>
   function format2(n, currency) {
    return currency + " " + n.toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
function formatmoneda(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
$.extend( $.fn.dataTable.defaults, {
    responsive: true
} );

       $(document).ready(function() {
    $('#example2').DataTable( {

         "searching": false,
        "ordering": true,
        "paging":   false,
        "info":     true,
         "order": [[ 1, "desc" ]],
         "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

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
      "responsive":true,
      "ordering": true,
      "searching": true,
       "paging": false,
      "order": [[ 1, "desc" ]],
      "info":false,
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
            null, null,null, null,null,null,null,null, null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,



          } );





        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons( myTable, {
         buttons: [

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


    <script type="text/javascript">
      jQuery(function($) {

$('#cotizacionesrubro thead tr:eq(1) th').each( function () {
        var title = $('#cotizacionesrubro thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } );

    var table = $('#cotizacionesrubro').DataTable({
      "responsive":true,
      "ordering": true,
      "searching": true,
       "paging": false,
      "order": [[ 1, "desc" ]],
      "info":false,
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
        $('#cotizacionesrubro thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

        var myTable =
        $('#cotizacionesrubro')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,


          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,



          } );





        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons( myTable, {
         buttons: [

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
           
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container2') );



        setTimeout(function() {
          $($('.tableTools-container2')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);


      })
    </script>


        <script type="text/javascript">
      jQuery(function($) {

$('#cotizacionescategoria thead tr:eq(1) th').each( function () {
        var title = $('#cotizacionescategoria thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder=" '+title+'" />' );
    } );

    var table = $('#cotizacionescategoria').DataTable({
      "responsive":true,
      "ordering": true,
      "searching": true,
       "paging": false,
      "order": [[ 1, "desc" ]],
      "info":false,
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
        $('#cotizacionescategoria thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

        var myTable =
        $('#cotizacionescategoria')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,


          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,



          } );





        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons( myTable, {
         buttons: [

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
           
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container3') );



        setTimeout(function() {
          $($('.tableTools-container3')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);


      })
    </script>



  <!-- /.content-wrapper -->


