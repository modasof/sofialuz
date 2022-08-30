<?php
ini_set('display_errors', '0');

include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';

include_once 'modelos/reportes.php';
include_once 'controladores/reportesController.php';

include_once 'modelos/estaciones.php';
include_once 'controladores/estacionesController.php';

include_once 'modelos/proyectos.php';
include_once 'controladores/proyectosController.php';

include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';

include_once 'modelos/funcionarios.php';
include_once 'controladores/funcionariosController.php';

include_once 'modelos/gastos.php';
include_once 'controladores/gastosController.php';

include_once 'modelos/propietarios.php';
include_once 'controladores/propietariosController.php';

include 'vistas/index/estadisticas_acpm.php';
include 'vistas/index/estadisticas_index.php';

$mesactual    = date('n');
$anoactual    = date('Y');
$totaldiasmes = date('t');
$mesanterior  = $mesactual - 1;
$trimestre    = $mesactual - 2;

$getconmes = $_GET['conmes'];

$primerdiames = $mesactual . "/01/" . $anoactual;
$ultimodiames = $mesactual . "/" . $totaldiasmes . "/" . $anoactual;

$daterangemesactual = $primerdiames . " - " . $ultimodiames;

$daterangemesanterior = $mesanterior . "/01/" . $anoactual . " - " . $mesanterior . "/" . $totaldiasmes . "/" . $anoactual;

$daterangetrimestre = $trimestre . "/01/" . $anoactual . " - " . $mesactual . "/" . $totaldiasmes . "/" . $anoactual;

$hoy = date('d');

$tope = $mesactual + 5;

$nominforme = 'Combustible';

$fechainicioinforme = $_GET['fechainicioinforme'];
$fechafinalinforme  = $_GET['fechafinalinforme'];

if ($fechaform != "") {
    $arreglo         = explode("-", $fechaform);
    $FechaIn         = $arreglo[0];
    $FechaFn         = $arreglo[1];
    $vectorfechaIn   = explode("/", $FechaIn);
    $vectorfechaFn   = explode("/", $FechaFn);
    $arreglofechauno = $vectorfechaIn[2] . "-" . $vectorfechaIn[0] . "-" . $vectorfechaIn[1];
    $arreglofechados = $vectorfechaFn[2] . "-" . $vectorfechaFn[0] . "-" . $vectorfechaFn[1];

    $fechainicioinforme = str_replace(" ", "", $arreglofechauno);
    $fechafinalinforme  = str_replace(" ", "", $arreglofechados);
}

// Validación de la fecha en que inicia el Día

if ($fechainicioinforme == "") {
    $FechaStart  = $FechaInicioDia;
    $datofechain = $primerdiames;
} else {
    $FechaStart  = ($fechainicioinforme . " 00:00:000");
    $datofechain = $fechainicioinforme;
}
// Validación de la fecha en que Termina el Día
if ($fechafinalinforme == "") {
    $FechaEnd       = $FechaFinalDia;
    $datofechafinal = $ultimodiames;
} else {
    $FechaEnd        = ($fechafinalinforme . " 23:59:000");
    $limpiarvariable = str_replace(" ", "", $fechafinalinforme);
    $datofechafinal  = $limpiarvariable;
}

?>

<!-- DataTables -->
  <!-- <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />




<!-- Content Wrapper. Contains page content -->
<div style="background-color: white;" class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark"><i class="fa fa-dashboard"> </i> Dashboard <?php echo ($nominforme); ?> </h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active">Reporte <?php echo ($nominforme); ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->

  <!-- Main content -->
  <div  class="content">
    <div class="container-fluid">

      <div class="row">



                <div class="col-md-3 col-xs-12">
                     <div class="chart">
                    <!-- Sales Chart Canvas
                   <div id="grafica_3" style="height: 300px; width: 100%;"></div>
               -->
        </div>
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Indicadores Mensuales <small> <br>Actualizado al <?php
date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d');
echo (fechalarga($TiempoActual));
?></small></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="InformeVentas">
              <div style="display:none;" class="clearfix">
                      <div id="stockChartContainer4" style="height: 300px; width: 100%;"></div>

                    </div>

       <table id="tablatrituradora" class="table  table-responsive table-striped table-bordered table-hover dataTables_borderWrap" style="width: 100%;font-size: 12px;">

          <thead>

               <tr style="background-color: #274350;color: white;">

                <th>Mes</th>
                <th>Consumo</th>
                <th>Promedio</th>
                <th>Valor</th>

              </tr>
            </thead>
            <tbody>


            </tbody>

              <tfoot>
                 <?php

for ($i = 1; $i < $tope; $i++) {
    setlocale(LC_ALL, 'es_ES');
    $monthNum  = $i;
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthName = strftime('%B', $dateObj->getTimestamp());

    $Btotaldiasmes   = date('t', mktime(0, 0, 0, $i, 1, $anoactual));
    $BInicioMesbucle = ($i . "/" . "01/" . $anoactual);
    $BFinMesbucle    = ($i . "/" . $Btotaldiasmes . "/" . $anoactual);
    $fechaconsulta   = ($BInicioMesbucle . " - " . $BFinMesbucle);

//
    $BIeqnicioMesbucle = ($anoactual . "-" . $i . "-01");
    $BFeqinMesbucle    = ($anoactual . "-" . $i . "-" . $Btotaldiasmes);
    $fechaconsultaeq   = ($BIeqnicioMesbucle . " - " . $BFeqinMesbucle);

    if ($monthNum == $mesactual) {
        $colorfila = "<tr class='info'>";
    } else {
        $colorfila = "<tr class=''>";
    }
    echo ($colorfila);

    ?>
  <td><strong><a href="?controller=dashboards&&action=combustible&daterange=<?php echo ($fechaconsulta); ?>"><i class="fa fa-line-chart"> </i> <?php echo (ucfirst($monthName)); ?></a></strong></td>
  <td>
    <?php
$ventames17 = Acpmmesgeneral($i, $anoactual);
    $sumaventas17 += $ventames17;
    echo ("<a style='color:black;' href='?controller=reportes&&action=combustibles&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . round($ventames17, 0) . " </a>");
    ?>
  </td>
  <td>
    <?php
$arreglof   = (EstadisticasConsumoAcpm($i, $anoactual));
    $CadenaAt   = explode(",", $arreglof);
    $longitudAt = count($CadenaAt) - 1;
    $sumaAt     = array_sum($CadenaAt);
    $maxviajes  = max($CadenaAt);
    $promedio33 = $sumaAt / $longitudAt;
    echo ("<a style='color:black;' href='?controller=reportes&&action=combustibles&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small> " . round($promedio33, 0) . " </a>");
    ?>
  </td>
  <td>
    <?php
$ventames16 = Acpmmesgeneralvalor($i, $anoactual);
    $sumaventas16 += $ventames16;
    echo ("<a style='color:black;' href='?controller=reportes&&action=combustibles&daterange=" . $fechaconsulta . "'><small style='color:#128a2e;'></small>$ " . number_format($ventames16, 0) . " </a>");

    ?>
  </td>

</tr>
 <?php
}

?>
             <tr class="success">
                <td><strong>Total</strong></td>
                <td><strong><?php echo (number_format($sumaventas17, 0)) ?></strong></td>
                <td></td>
                <td><strong><?php echo ("$ " . number_format($sumaventas16, 0)) ?></strong></td>
              </tr>

            </tfoot>
            </table>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->

     <div class="col-md-9">
        <?php
/*============================================
=            Bloque de datos x 3             =
============================================*/

/*----------  Bloque 1  ----------*/

?>
<div class="row">


<div class="col-md-12">
    <form action="?controller=dashboards&&action=combustible" method="post" id="FormFechas" autocomplete="off">
         <div class="col-md-8">
                        <div class="form-group">
                          <label>Seleccione el Rango de Fecha para visualizar <?php echo ($nominforme); ?><span>*</span></label>
                          <br>

        <?php
if ($fechainicioinforme != "") {
    ?>
           <small style="color: blue;" class="m-0 text-dark">Reporte del <?php echo (fechalarga($fechainicioinforme)) ?> al <?php echo (fechalarga($fechafinalinforme)) ?></small>
          <?php
} else {
    ?>
           <small class="m-0 text-dark">Reporte Total Horas Máquinaria</small>
          <?php
}

?>


                          <input type="text"  name="daterange" class="form-control" required value="">
                        </div>
                      </div>
          <div class="form-group">

              <button class="btn btn-primary btn-sm" type="Submit">Realizar Consulta</button>

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


<?php

?>

<div class="col-md-12">



 <?php
if ($getconmes == "ma") {
    $colorbloque = ("<div class='small-box bg-orange'>");
} else {
    $colorbloque = ("<div class='small-box bg-grey'>");
}
?>

<div class="col-md-3 col-xs-12">
<?php echo ($colorbloque); ?>
<div class="inner">
<h4><i class="fa fa-calendar"> </i><strong>

<?php
$bloque1 = Acpmmesgeneral($mesactual, $anoactual);
echo (number_format($bloque1, 0) . " Gl.");
?>
</strong></h4>
<p><?php echo ($nominforme); ?></p>
</div>

<a style="color: black;" href="?controller=dashboards&&action=combustible&&daterange=<?php echo ($daterangemesactual); ?>&&conmes=ma" class="small-box-footer">
Mes Actual <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>
    <?php
# ================================
# =           Bloque 2           =
# ================================
?>

 <?php
if ($getconmes == "ant") {
    $colorbloque = ("<div class='small-box bg-orange'>");
} else {
    $colorbloque = ("<div class='small-box bg-grey'>");
}
?>

<div class="col-md-3 col-xs-12">
<?php echo ($colorbloque); ?>
<div class="inner">
<h4><i class="fa fa-calendar"> </i><strong>
<?php
$bloque2 = Acpmmesgeneral($mesanterior, $anoactual);
echo (number_format($bloque2, 0) . " Gl.");
?>
</strong></h4>
<p><?php echo ($nominforme); ?></p>
</div>

<a style="color: black;" href="?controller=dashboards&&action=combustible&&daterange=<?php echo ($daterangemesanterior); ?>&&conmes=ant" class="small-box-footer">
Mes Anterior <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>

 <?php
# ================================
# =           Bloque 3           =
# ================================
?>

 <?php
if ($getconmes == "tri") {
    $colorbloque = ("<div class='small-box bg-orange'>");
} else {
    $colorbloque = ("<div class='small-box bg-grey'>");
}
?>

<div class="col-md-3 col-xs-12">
<?php echo ($colorbloque); ?>
<div class="inner">
<h4><i class="fa fa-calendar"> </i><strong>
<?php
$bloque3       = Acpmmesgeneral($trimestre, $anoactual);
$sumatrimestre = $bloque1 + $bloque2 + $bloque3;
echo (number_format($sumatrimestre, 0) . " Gl.");
?>
</strong></h4>
<p><?php echo ($nominforme); ?></p>
</div>

<a style="color: black;" href="?controller=dashboards&&action=combustible&&daterange=<?php echo ($daterangetrimestre); ?>&&conmes=tri" class="small-box-footer">
Trimestre <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>

 <?php
# ================================
# =           Bloque 4           =
# ================================
?>

 <?php
if ($getconmes == "") {
    $colorbloque = ("<div class='small-box bg-orange'>");
} else {
    $colorbloque = ("<div class='small-box bg-grey'>");
}
?>

<div class="col-md-3 col-xs-12">
<?php echo ($colorbloque); ?>
<div class="inner">
<h4><i class="fa fa-calendar"> </i><strong>

<?php
$fechapersonalizada = Acpmmes($FechaStart, $FechaEnd);
echo (number_format($fechapersonalizada, 0) . " Gl.");
?>

</strong></h4>
<p><?php echo ($nominforme); ?></p>
</div>

<a style="color: black;" href="#" class="small-box-footer">
Personalizado <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>



</div>


</div>

 <div class="col-md-12" id="chartContainer" style="height: 300px; width: 100%;"></div>

        <?php
/*=====  End of Bloque de datos x 3   ======*/

# ==================================================
# =           Inicio de gráfica dinámica           =
# ==================================================
?>



         <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.stock.min.js"></script>
<script>
// Incio Tercera Gráfica
  var dataPoints = [];
  var stockChart3 = new CanvasJS.StockChart("chartContainer", {
    //exportEnabled: true,
    title: {
      //text:"StockChart with Line using JSON Data"
    },
    subtitles: [{
      //text:"Historial Terraje Obinco"
    }],
    charts: [{
      axisX: {
        crosshair: {
          enabled: true,
          snapToDataPoint: true,
          valueFormatString: "YYYY MMM DD"
        }
      },
      axisY: {
        title: "Consumo ACPM",
        prefix: "",
        suffix: "gl",
        crosshair: {
          enabled: true,
          snapToDataPoint: true,
          valueFormatString: "#,###.00gl",
        }
      },
      data: [{
        type: "column",
        color: "#ff9b28",
        xValueFormatString: "YYYY MMM DD",
        yValueFormatString: "#,###.##gl",
        dataPoints : dataPoints
      }]
    }],
    navigator: {
      slider: {
        minimum: new Date(2021, 01, 01),
        maximum: new Date(2021, 12, 31)
      }
    },
     rangeSelector: {
      buttons: []
    }
  });

    <?php
$res    = Reportes::GraficaHistorialConsumoAcpmfecha($FechaStart, $FechaEnd);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $fechaterraje   = $campo['fecha_reporte'];
    $cantidadm3     = $campo['totales'];
    $fechagraficada = date("Y-m-d", strtotime($fechaterraje . "+ 1 day"));
    ?>
    dataPoints.push({x: new Date("<?php echo ($fechagraficada) ?>"), y: Number(<?php echo ($cantidadm3) ?>)});
     <?php
}
?>

    stockChart3.render();
  ;

  // Incio Cuarta Gráfica
</script>

         <?php
# ======  End of Gráfica Dinámica  =======

?>




      </div> <!-- Fin Row -->

<hr>

      <div class="row"><!-- Start Row -->

        <div class="nav-tabs-custom col-md-12">
<ul class="nav nav-tabs">
<li class="active"><a href="#tab_1" data-toggle="tab">Total <?php echo ($nominforme); ?></a></li>
<li><a href="#tab_2" data-toggle="tab">Por Equipos</a></li>
<li><a href="#tab_3" data-toggle="tab">Por Propietarios</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_1">
      <div class="card-body">
      <div class="clearfix">
                      <div class="pull-right tableTools-container"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">
            <div id="fragmento">
            <tfoot style="display: table-header-group;">
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                    <th style="background-color: #fcf8e3" class="success"></th>
                                     <th style="background-color: #fcf8e3" class="success"></th>
                                      <th style="background-color: #fcf8e3" class="success"></th>
                                      <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                       <th style="background-color: #fcf8e3" class="success"></th>
                                        <th style="background-color: #fcf8e3" class="success"></th>
                                        <th style="background-color: #fcf8e3" class="success"></th>
                                        <th style="background-color: #fcf8e3" class="success"></th>
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
              <th style="width: 2%;">Id</th>
              <th>Fecha</th>
               <th style="width: 15%;">Propietario</th>
               <th style="width: 15%;">Equipo</th>
              <th style="width: 15%;">Despacho Gl</th>
               <th style="width: 15%;">Vr. Galón </th>
             <th style="width: 15%;">Vr. Compra</th>
             <th style="width: 15%;">P. Despacho</th>
             <th style="width: 15%;">Recibido por</th>
             <th style="width: 15%;">Kl - Hr</th>
              <th>Observaciones</th>
            </tr>
            <tr>
             <th style="width: 2%;">Id</th>
              <th>Fecha</th>
               <th style="width: 15%;">Propietario</th>
               <th style="width: 15%;">Equipo</th>
              <th style="width: 15%;">Despacho Gl</th>
              <th style="width: 15%;">Vr. Galón </th>
             <th style="width: 15%;">Vr. Compra</th>
              <th style="width: 15%;">P. Despacho</th>
              <th style="width: 15%;">Recibido por</th>
              <th style="width: 15%;">Kl - Hr</th>
              <th>Observaciones</th>
            </tr>
          </thead>
       <tbody>
            <?php
if ($fechaform != "") {
    $res    = Reportes::ReporteCombustiblesporfecha($FechaStart, $FechaEnd);
    $campos = $res->getCampos();
} else {
    if ($RolSesion == 4) {
        $campos = Reportes::combustibleporusuario($IdSesion);
    } else {
        $campos = $campos->getCampos();
    }

}

foreach ($campos as $campo) {
    $id                   = $campo['id'];
    $fecha_reporte        = $campo['fecha_reporte'];
    $imagen               = $campo['imagen'];
    $valor_m3             = $campo['valor_m3'];
    $cantidad             = $campo['cantidad'];
    $indicador            = $campo['indicador'];
    $creado_por           = $campo['creado_por'];
    $estado_reporte       = $campo['estado_reporte'];
    $reporte_publicado    = $campo['reporte_publicado'];
    $tipo_despacho        = $campo['tipo_despacho'];
    $punto_despacho       = $campo['punto_despacho'];
    $marca_temporal       = $campo['marca_temporal'];
    $observaciones        = $campo['observaciones'];
    $equipo_id_equipo     = $campo['equipo_id_equipo'];
    $proyecto_id_proyecto = $campo['proyecto_id_proyecto'];
    $despachado_por       = $campo['despachado_por'];
    $recibido_por         = $campo['recibido_por'];
    $nomestacion          = Estaciones::ObtenerNombreEstacion($punto_despacho);
    $nomequipo            = Equipos::obtenerNombreEquipo($equipo_id_equipo);
    $nombrerecibe         = Usuarios::obtenerNombreUsuario($recibido_por);
    $nombredespachador    = Funcionarios::obtenerNombreFuncionario($despachado_por);
    $nomproyecto          = Proyectos::obtenerNombreProyecto($proyecto_id_proyecto);
    $idpropietario        = Equipos::obtenerPropietarioEquipo($equipo_id_equipo);
    $nompropietario       = Propietarios::obtenerNombre($idpropietario);
    $ventatotal           = $cantidad * $valor_m3;

    ?>
            <tr>
             <td><?php echo ($id) ?></td>
              <td><?php echo ($fecha_reporte) ?></td>
               <td><?php echo utf8_encode($nompropietario); ?></td>
               <td><?php echo ($nomequipo) ?></td>
              <td><?php echo utf8_encode($cantidad); ?></td>
                 <td><?php echo utf8_encode("$" . number_format($valor_m3)); ?></td>
              <td><?php echo utf8_encode("$" . number_format($ventatotal)); ?></td>
              <td><?php echo ($nomestacion) ?></td>
              <td><?php echo ($nombrerecibe) ?></td>
              <td><?php echo ($indicador) ?></td>
               <td><?php echo utf8_encode($observaciones); ?> <br><?php echo utf8_encode($nomproyecto); ?></td>


            </tr>
            <?php
}
?>
          </tbody>
        </div>
          </table>
        </div> <!-- Fin Row -->
      </div> <!-- Fin card -->
</div>

<div class="tab-pane" id="tab_2">

<div id="divrubro" class="col-md-3">
                          <div class="form-group">
                              <label for="sel1">Listado:<span>*</span></label>
                              <select style="width: 300px;" class="form-control mi-select" id="id_rubro" name="id_rubro" >
                                  <option value="" selected>Seleccione...</option>
                                <?php
$rubros = Equipos::obtenerListaEquiposunicosdespacho($FechaStart, $FechaEnd);
foreach ($rubros as $rubro) {
    $id_rubro     = $rubro['equipo_id_equipo'];
    $nombre_rubro = Equipos::obtenerNombreEquipo($id_rubro);

    ?>
                                <option value="<?php echo $id_rubro; ?>"><?php echo utf8_encode($nombre_rubro); ?></option>
                                <?php }?>
                              </select>
                          </div>

<div class="box box-widget widget-user-2">
        <div class="box-footer no-padding">
            <ul class="nav nav-stacked">

                 <?php
$rubros = Equipos::obtenerListaEquiposunicosdespacho($FechaStart, $FechaEnd);
foreach ($rubros as $rubro) {
    $id_rubro     = $rubro['equipo_id_equipo'];
    $nombre_rubro = Equipos::obtenerNombreEquipo($id_rubro);
    $totalgalones = AcpmmesEquipo($FechaStart, $FechaEnd, $id_rubro);

    ?>
                <li id="equipolista<?php echo ($id_rubro); ?>"><?php echo ($nombre_rubro); ?> <span class="pull-right badge bg-blue"><?php echo (number_format($totalgalones, 0) . " Gl."); ?></span></li>

            <input type="hidden" value="<?php echo ($id_rubro); ?>" id="campoidequipo<?php echo ($id_rubro); ?>">



            <script type="text/javascript">
      $('#equipolista<?php echo ($id_rubro); ?>').click(function () {
       var campoid = $('#campoidequipo<?php echo ($id_rubro); ?>').val();
       var datafecha = '<?php echo ($fechaform); ?>';

       //alert(campoid);

         if(campoid){
            $.ajax({
                type:'POST',
                url:'vistas/dashboard_combustible/ajax_equipos.php',
                data:'id='+campoid+'&&daterange='+datafecha,
                success:function(html){
                    $('#tablaporequipo').html(html);
                }
            });
        }else{
            $('#tablaporequipo').html('<h1>Seleccione un item de la lista<h1>');

        }
  });
</script>

        <?php }?>


            </ul>
        </div>
</div>


                        </div>
<div class="col-md-9">
 <div class="card-body" id="tablaporequipo">

        <h2 class="text-green"> <i class="fa fa-check"></i>Seleccione un item de la lista para informe detallado</h2>



      </div> <!-- Fin card -->
</div>


</div>

<div class="tab-pane" id="tab_3">
  

    <div id="divrubro" class="col-md-3">
                          <div class="form-group">
                              <label for="sel1">Listado:<span>*</span></label>
                              <select style="width: 300px;" class="form-control mi-select" id="id_rubro" name="id_rubro" >
                                  <option value="" selected>Seleccione...</option>
                                <?php
$rubros = Equipos::obtenerListaPropietariosunicosdespacho($FechaStart, $FechaEnd);
foreach ($rubros as $rubro) {
    $id_rubro     = $rubro['propietario'];
    $nombre_rubro = Propietarios::obtenerNombre($id_rubro);

    ?>
                                <option value="<?php echo $id_rubro; ?>"><?php echo utf8_encode($nombre_rubro); ?></option>
                                <?php }?>
                              </select>
                          </div>

<div class="box box-widget widget-user-2">
        <div class="box-footer no-padding">
            <ul class="nav nav-stacked">

                 <?php
$rubros = Equipos::obtenerListaPropietariosunicosdespacho($FechaStart, $FechaEnd);
foreach ($rubros as $rubro) {
    $id_rubro     = $rubro['propietario'];
    $nombre_rubro = Propietarios::obtenerNombre($id_rubro);
    $totalgalones = AcpmmesPropietario($FechaStart, $FechaEnd, $id_rubro);

    ?>
                <li id="propietariolista<?php echo ($id_rubro); ?>"><?php echo ($nombre_rubro); ?> <span class="pull-right badge bg-blue"><?php echo (number_format($totalgalones, 0) . " Gl."); ?></span></li>

            <input type="hidden" value="<?php echo ($id_rubro); ?>" id="campoidpropietario<?php echo ($id_rubro); ?>">



            <script type="text/javascript">
      $('#propietariolista<?php echo ($id_rubro); ?>').click(function () {
       var campoid = $('#campoidpropietario<?php echo ($id_rubro); ?>').val();
       var datafecha = '<?php echo ($fechaform); ?>';

       //alert(campoid);

         if(campoid){
            $.ajax({
                type:'POST',
                url:'vistas/dashboard_combustible/ajax_propietarios.php',
                data:'id='+campoid+'&&daterange='+datafecha,
                success:function(html){
                    $('#tablaporpropietario').html(html);
                }
            });
        }else{
            $('#tablaporpropietario').html('<h1>Seleccione un item de la lista<h1>');

        }
  });
</script>

        <?php }?>


            </ul>
        </div>
</div>


                        </div>
<div class="col-md-9">
 <div class="card-body" id="tablaporpropietario">

        <h2 class="text-green"> <i class="fa fa-check"></i>Seleccione un item de la lista para informe detallado</h2>



      </div> <!-- Fin card -->
</div>




</div>

</div>

</div>



      </div><!-- Fin Row -->




    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->
</div> <!-- Fin Content-Wrapper -->


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>



<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-select').select2();
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#id_rubro').on('change',function(){
        var rubroID = $(this).val();
        var datafecha = '<?php echo ($fechaform); ?>';
        //alert (datafecha);

        if(rubroID){
            $.ajax({
                type:'POST',
                url:'vistas/dashboard_combustible/ajax_equipos.php',
                data:'id='+rubroID+'&&daterange='+datafecha,
                success:function(html){
                    $('#tablaporequipo').html(html);
                }
            });
        }else{
            $('#tablaporequipo').html('<h1>Seleccione un item de la lista<h1>');

        }

    });
});
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

<!-- page script -->

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

             pageTotal4 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

              pageTotal3 = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             // Update footer



              $( api.column( 4 ).footer() ).html(
                ''+formatmoneda(pageTotal3,'GL' )
            );

               $( api.column( 6 ).footer() ).html(
                '$'+formatmoneda(pageTotal4,'' )
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



      });
    </script>







