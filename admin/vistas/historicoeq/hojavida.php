    <?php
error_reporting(E_ALL);
ini_set('display_errors', '0');

include_once 'modelos/propietarios.php';
include_once 'controladores/propietariosController.php';

include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';

include_once 'modelos/historicoeq.php';
include_once 'controladores/historicoeqController.php';

include_once 'modelos/gastos.php';
include_once 'controladores/gastosController.php';

include_once 'modelos/productos.php';
include_once 'controladores/productosController.php';

include_once 'modelos/tipomantenimiento.php';
include_once 'controladores/tipomantenimientoController.php';

include_once 'modelos/estaciones.php';
include_once 'controladores/estacionesController.php';

include_once 'modelos/funcionarios.php';
include_once 'controladores/funcionariosController.php';

include_once 'modelos/reportes.php';
include_once 'controladores/reportesController.php';

include_once 'modelos/proyectos.php';
include_once 'controladores/proyectosController.php';

include_once 'modelos/gestiondocumentaleq.php';
include_once 'controladores/gestiondocumentaleqController.php';

include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';

include_once 'modelos/destinos.php';
include_once 'controladores/destinosController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

include 'vistas/historicoeq/formulas.php';

$table_mes   = $_GET['get_mesactual'];
$anoactual   = date('Y');
$fechaactual = date('Y-m-d');
$getequipo   = $_GET['id'];

?>

<?php
$res    = Equipos::obtenerPaginaPor($getequipo);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $imagen            = $campo['imagen'];
    $id_equipo         = $campo['id_equipo'];
    $nombre_equipo     = $campo['nombre_equipo'];
    $marca_equipo      = $campo['marca_equipo'];
    $serial_equipo     = $campo['serial_equipo'];
    $modelo            = $campo['modelo'];
    $unidad_trabajo    = $campo['unidad_trabajo'];
    $tipo_equipo       = $campo['tipo_equipo'];
    $placa             = $campo['placa'];
    $propietario       = $campo['propietario'];
    $valor_activo      = $campo['valor_activo'];
    $observaciones     = $campo['observaciones'];
    $comision          = $campo['comision'];
    $motor             = $campo['motor'];
    $peso              = $campo['peso'];
    $fecha_adquisicion = $campo['fecha_adquisicion'];
    $inicial           = $campo['inicial'];
    $nompropietario    = Propietarios::obtenerNombre($propietario);

    $soat            = Gestiondocumentaleq::ObtenerNombredocumento(15);
    $imagensoat      = Gestiondocumentaleq::DocumentoExiste(15, $getequipo, 2);
    $fechaexpirasoat = Gestiondocumentaleq::DocumentoFechaExpira(15, $getequipo, 2);

    $tecno            = Gestiondocumentaleq::ObtenerNombredocumento(21);
    $imagentecno      = Gestiondocumentaleq::DocumentoExiste(21, $getequipo, 2);
    $fechaexpiratecno = Gestiondocumentaleq::DocumentoFechaExpira(21, $getequipo, 2);

    if ($tipo_equipo == 'Volqueta') {

        $labelkm          = "Total Km Recorrido";
        $labelinicial     = "Kilometraje Actual";
        $totalkm          = KilometrajeVolqueta($getequipo, $anoactual);
        $totalacpm        = ConsumoCombustible($getequipo, $anoactual);
        $rendimiento      = $totalkm / $totalacpm;
        $lablerendimiento = "Kms por Gl.";
        $consultardestino = Ultimoproyectovolqueta($getequipo);
        $consultarcliente = Ultimoclientevolqueta($getequipo);
        $nomubicacion     = Destinos::obtenerNombreDestino($consultardestino);
        $nomcliente       = Clientes::obtenerNombreCliente($consultarcliente);

    } elseif ($tipo_equipo == 'Maquinaria Pesada') {

        $labelkm          = "Total Horas Reportadas";
        $labelinicial     = "Horómetro Actual";
        $totalkm          = HorometroEquipo($getequipo, $anoactual);
        $totalacpm        = ConsumoCombustible($getequipo, $anoactual);
        $rendimiento      = $totalacpm / $totalkm;
        $lablerendimiento = "Horas x Gl.";
        $consultardestino = Ultimoproyectomaq($getequipo);
        $consultarcliente = Ultimoclientemaq($getequipo);
        $nomubicacion     = Proyectos::obtenerNombreProyecto($consultardestino);
        $nomcliente       = Clientes::obtenerNombreCliente($consultarcliente);
    }

    if ($tipo_equipo == "Maquinaria Pesada") {
        $totalreporte = round(ReporteHoraspor($getequipo), 1);
    } elseif ($tipo_equipo == "Volqueta") {
        $totalreporte = round(ReporteKilometrospor($getequipo), 1);
    } elseif ($tipo_equipo == "Vehiculos") {
        $totalreporte = round(ReporteKilometrospor($getequipo), 1);
    } else {
        $totalreporte = 0;
    }

    $odometroactual = $inicial + $totalreporte;

}
?>

<style>
.btn-mes{

    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    -webkit-font-smoothing: antialiased;
    font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
    box-sizing: border-box;
    text-decoration: none;
    display: inline-block;
    font-weight: 400;
    line-height: 1.42857143;
    white-space: nowrap;
    vertical-align: middle;
    touch-action: manipulation;
    cursor: pointer;
    user-select: none;
    background-image: none;
    box-shadow: none;
    border-radius: 3px;
    position: relative;

    /*margin: 0 0 10px 10px;*/
    min-width: 40px;
    height: 30px;
    text-align: center;
    color: black;
    border: 1px solid #ddd;
    background-color: #f4f4f4;
    font-size: 12px;
}

.btn-mes-activo{

    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    -webkit-font-smoothing: antialiased;
    font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
    box-sizing: border-box;
    text-decoration: none;
    display: inline-block;
    font-weight: bold;
    line-height: 1.42857143;
    white-space: nowrap;
    vertical-align: middle;
    touch-action: manipulation;
    cursor: pointer;
    user-select: none;
    background-image: none;
    box-shadow: none;
    border-radius: 3px;
    position: relative;
    /*margin: 0 0 10px 10px;*/
    min-width: 40px;
    height: 30px;
    text-align: center;
    color: white;
    border: 1px solid #ddd;
    background: #f68132;
    font-size: 12px;
}


    /* declare a 7 column grid on the table */
#calendar {
    width: 100%;
  display: grid;
  grid-template-columns: repeat(7, 1fr);
}

#calendar tr, #calendar tbody {
  grid-column: 1 / -1;
  display: grid;
  grid-template-columns: repeat(7, 1fr);
 width: 100%;
}

caption {
    text-align: center;
  grid-column: 1 / -1;
  font-size: 130%;
  font-weight: bold;
  padding: 10px 0;
}

#calendar a {
    color: #f68132;
    text-decoration: none;
}

#calendar td, #calendar th {
    padding: 5px;
    box-sizing:border-box;
    border: 1px solid #ccc;
}

#calendar .weekdays {
    background: #f68132;
}


#calendar .weekdays th {
    text-align: center;
    text-transform: uppercase;
    line-height: 20px;
    border: none !important;
    padding: 10px 6px;
    color: #fff;
    font-size: 13px;
}

#calendar td {
    min-height: 180px;
  display: flex;
  flex-direction: column;
}

#calendar .days li:hover {
    background: #d3d3d3;
}

#calendar .dateok {
    text-align: center;
    margin-bottom: 5px;
    padding: 4px;
    background: #00a65a;
    color: #fff;
    width: 28px;
    border-radius: 50%;
  flex: 0 0 auto;
  align-self: flex-end;
}

#calendar .date {
    text-align: center;
    margin-bottom: 5px;
    padding: 4px;
    background: #333;
    color: #fff;
    width: 28px;
    border-radius: 50%;
  flex: 0 0 auto;
  align-self: flex-end;
}

#calendar .datebug {
    text-align: center;
    margin-bottom: 5px;
    padding: 4px;
    background: #d73925;
    color: #fff;
    width: 28px;
    border-radius: 50%;
  flex: 0 0 auto;
  align-self: flex-end;
}

#calendar .event {
  flex: 0 0 auto;
    font-size: 13px;
    border-radius: 4px;
    padding: 5px;
    margin-bottom: 5px;
    line-height: 14px;
    background: #e4f2f2;
    border: 1px solid #b5dbdc;
    color: #009aaf;
    text-decoration: none;
}

#calendar .event-tanqueo {
  flex: 0 0 auto;
    font-size: 13px;
    border-radius: 4px;
    padding: 5px;
    margin-bottom: 5px;
    line-height: 14px;
    background: #e4f2f2;
    border: 1px solid #b5dbdc;
    color: #a56711;
    text-decoration: none;
}

#calendar .event-desc {
    color: #666;
    margin: 3px 0 7px 0;
    text-decoration: none;
}

#calendar .other-month {
    background: #f5f5f5;
    color: #666;
}

#calendar .other-month-sunday {
    background: #e2dcdc;
    color: #666;
}




/* ============================
                Mobile Responsiveness
   ============================*/


@media(max-width: 768px) {

    #calendar .weekdays, #calendar .other-month {
        grid-column: 1 / 2;
    }

    #calendar li {
        height: auto !important;
        border: 1px solid #ededed;
        width: 100%;
        padding: 10px;
        margin-bottom: -1px;
    }

  #calendar, #calendar tr, #calendar tbody {
    grid-template-columns: 1fr;
  }

  #calendar  tr {
    grid-column: 1 / 2;
  }

    #calendar .date {
        align-self: flex-start;
    }
}
</style>
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
          <h1 class="m-0 text-dark"><?php echo utf8_decode($tipo_equipo . " " . $nombre_equipo); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="?controller=historicoeq&&action=listaequipos">Estado Equipos</a></li>
              <li class="breadcrumb-item"><a href="?controller=equipos&&action=todos">Equipos</a></li>
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

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">



              <img onclick="verfoto('<?php echo $imagen; ?>','<?php echo $nombre_equipo; ?>')" class="profile-user-img img-responsive img-circle" src="<?php echo $imagen; ?>" alt="Foto Equipo" height="50" width="50">

  <script type="text/javascript">
       function verfoto(val,val2){

        Swal.fire({
  title: val2,
  //text: 'Modal with a custom image.',
  imageUrl: val,
  imageWidth: 400,
  imageHeight: 400,
  //imageAlt: 'Custom image',
})
          //alert(val);
      }
  </script>

              <h3 class="profile-username text-center"><?php echo utf8_decode($nombre_equipo); ?></h3>

              <p class="text-muted text-center"><?php echo utf8_decode($nompropietario); ?></p>
        <p class="text-muted text-center"><small>Indicadores <?php echo ($anoactual); ?></small></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><?php echo utf8_decode($labelkm); ?></b>
                  <a class="pull-right">
                  <?php echo utf8_decode(number_format($totalkm, 0)); ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Consumo Acpm</b>
                  <a class="pull-right">
                     <?php echo utf8_decode(number_format($totalacpm, 0)); ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Rendimiento</b>
                  <a class="pull-right">
                     <?php echo utf8_decode(round($rendimiento, 1) . " " . $lablerendimiento); ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b><?php echo ($labelinicial); ?></b>
                  <a class="pull-right">
                     <?php echo utf8_decode(round($odometroactual, 1)); ?>
                  </a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Descargar Hoja de Vida</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Datos Equipo</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-list margin-r-5"></i>Tipo Equipo: <?php echo utf8_decode($tipo_equipo); ?></strong>

              <p class="text-muted">
               <?php echo utf8_decode($marca_equipo . " Serial : " . $serial_equipo . " Modelo: " . $modelo . " Motor: " . $motor . " Capacidad:" . $peso . " Kg") ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Última Ubicación</strong>

              <p class="text-muted">
                <?php
if ($consultardestino == '') {
    echo ("Sin información");
} else {
    echo ("<strong> <i class='fa fa-user'> </i> " . $nomcliente . " </strong><br>" . $nomubicacion);
}

?>
              </p>

              <hr>

              <strong><i class="fa fa-file-pdf-o margin-r-5"></i> Documentos</strong>
<br>
              <p>
                <br>
    <a target="_blank" href="<?php echo ($imagentecno) ?>"> <span class="label label-success"> <i class="fa fa-file-pdf-o"> </i> Tecnomecanica Expira  el <?php echo ($fechaexpiratecno); ?></span>
      </a>
              </p>

               <p>
                <br>
    <a target="_blank" href="<?php echo ($imagensoat) ?>"> <span class="label label-success"> <i class="fa fa-file-pdf-o"> </i> Soat Expira  el <?php echo ($fechaexpirasoat); ?></span>
      </a>
              </p>

              <hr>

              <strong style="display: none;"><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p style="display: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
                           <?php

for ($i = 1; $i < 13; $i++) {
    setlocale(LC_ALL, 'es_ES');
    $monthNum  = $i;
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthName = strftime('%B', $dateObj->getTimestamp());

    if ($monthNum == $table_mes) {
        $colorboton = "<a href='?controller=equipos&&action=hojavida&&id=" . $getequipo . "&&get_mesactual=" . $monthNum . "' class='btn btn-mes-activo'>" . strtoupper($monthName) . "</a>";
    } else {
        $colorboton = "<a href='?controller=equipos&&action=hojavida&&id=" . $getequipo . "&&get_mesactual=" . $monthNum . "' class='btn btn-mes'>" . strtoupper($monthName) . "</a>";
    }
    echo ($colorboton);

    ?>

 <?php
}

?>
<hr>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Informe</a></li>
              <li><a href="#orderwork" data-toggle="tab">OT</a></li>
              <li><a href="#acpm" data-toggle="tab">ACPM</a></li>
              <?php 
                if ($tipo_equipo=="Volqueta" or $tipo_equipo=="Vehiculos" ) {
                 echo("<li><a href='#kilometer' data-toggle='tab'>KM</a></li>");
                }
               ?>
              <li><a href="#minorbox" data-toggle="tab">CM</a></li>
               <li><a href="#production" data-toggle="tab">PROD.</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <table id="calendar">
<?php 
    if ($tipo_equipo=="Volqueta" or $tipo_equipo=="Vehiculos") {
      include 'encabezado_volquetas.php';
    }elseif ($tipo_equipo=="Maquinaria Pesada") {
      include 'encabezado_maquinaria.php';
    }
  
 ?>

<div class="box-body">

</div>
  <tr class="weekdays">
    <th scope="col">Lunes</th>
    <th scope="col">Martes</th>
    <th scope="col">Miércoles</th>
    <th scope="col">Jueves</th>
    <th scope="col">Viernes</th>
    <th scope="col">Sábado</th>
    <th scope="col">Domingo</th>
  </tr>

<?php

date_default_timezone_set("America/Bogota");

$table_totaldiasmes = date('t');
//$table_mes          = date('m');
$table_fechaactual = date('Y-m-d');
$table_hoy         = date('d');
$table_ano         = date('Y');

$month_start      = strtotime($table_ano . "-" . $table_mes . "-01");
$table_diainicial = date('w', $month_start);

$month_end      = strtotime($table_ano . "-" . $table_mes . "-" . $table_totaldiasmes);
$table_diafinal = date('w', $month_end);

if ($table_diainicial == 4) {
    $iniciabucle = -2;
} elseif ($table_diainicial == 1) {
    $iniciabucle = +1;
} elseif ($table_diainicial == 6) {
    $iniciabucle = -4;
} elseif ($table_diainicial == 2) {
    $iniciabucle = 0;
} elseif ($table_diainicial == 5) {
    $iniciabucle = -3;
} elseif ($table_diainicial == 0) {
    $iniciabucle = -5;
} elseif ($table_diainicial == 3) {
    $iniciabucle = -1;
}

//echo ("<h3>Fecha_Impr:".$table_diainicial."</h3>");
?>
 <?php
$bandera = 0;

for ($i = $iniciabucle; $i <= $table_totaldiasmes; $i++) {
    // Inicio Ciclo de Tabla

    $bandera = $bandera + 1; // Variable para crear Salto de semana

    # ============================================================
    # =           Parámetrización de Día de la semana            =
    # ============================================================

    if ($bandera == 8 or $bandera == 15 or $bandera == 22 or $bandera == 29 or $bandera == 36) {
        $diaparametro = 1;
    } elseif ($bandera == 9 or $bandera == 16 or $bandera == 23 or $bandera == 30 or $bandera == 37) {
        $diaparametro = 2;
    } elseif ($bandera == 10 or $bandera == 17 or $bandera == 24 or $bandera == 31) {
        $diaparametro = 3;
    } elseif ($bandera == 11 or $bandera == 18 or $bandera == 25 or $bandera == 32) {
        $diaparametro = 4;
    } elseif ($bandera == 12 or $bandera == 19 or $bandera == 26 or $bandera == 33) {
        $diaparametro = 5;
    } elseif ($bandera == 13 or $bandera == 20 or $bandera == 27 or $bandera == 34) {
        $diaparametro = 6;
    } else {
        $diaparametro = $bandera;
    }

    # ======  End of Parámetrización de Día de la semana   =======

    if ($bandera % 7 == 0) {
        // Cálculo para crear Salto de semana

        $fechatabla      = date('Y-m-d', strtotime($table_ano . "-" . $table_mes . "-" . $i));
        $numerodiasemana = date('w', strtotime($fechatabla));
        $diames          = date('d', strtotime($fechatabla));
        $getmes          = date('m', strtotime($fechatabla));
        //echo ($fechatabla."<br><strong>".$diames."</strong>");
        ?>
<td class="day other-month-sunday">
    <?php
# -----------  Validación para llenar datos solo en el mes correspondiente (Domingo) -------

        if ($getmes == $table_mes) {
            ?>

      <?php

            // 1. Consultar Estado de los Domingos
            $consultaestadoporfecha = Equipos::obtenerEstadoporfecha($getequipo, $fechatabla);

            # -----------  Se define la clase que aplica por el estado (Domingos).   -----------

            if ($consultaestadoporfecha == "Operativo") {
                echo ("<div class='dateok'>" . $i . "</div>");
            } elseif ($consultaestadoporfecha == "") {
                echo ("<div class='date'>" . $i . "</div>");
            } elseif ($consultaestadoporfecha == "Fuera de Servicio") {
                echo ("<div class='datebug'>" . $i . "</div>");
            } elseif ($consultaestadoporfecha == "Mantenimiento") {
                echo ("<div class='datebug'>" . $i . "</div>");
            }

            # ---------------------------------------------------------------------------------

            ?>
       <div class="event">
        <div class="event-desc">
          <?php //echo ($fechatabla); ?>
          Registro:
          <strong>
          <?php
if ($tipo_equipo == 'Volqueta' or $tipo_equipo == 'Vehiculos') {
                $consultaodometrofecha = KilometrajeDiariosVolqueta($fechatabla, $fechatabla, $getequipo);
                $labeldia              = " Km.";
                $consultaacpmdiario    = Acpmediarioequipo($fechatabla, $fechatabla, $getequipo);
                $consultafletedia      = FletesDiariosVolqueta($fechatabla, $fechatabla, $getequipo);
                $labelflete            = ("<br>" . $consultafletedia . " Fletes");
            } elseif ($tipo_equipo == 'Maquinaria Pesada') {
                $consultaodometrofecha = HorasDiarioEquipo($fechatabla, $fechatabla, $getequipo);
                $labeldia              = " Hr.";
                $consultaacpmdiario    = Acpmediarioequipo($fechatabla, $fechatabla, $getequipo);
                $labelflete            = ("");
            } else {
                $consultaodometrofecha = "";
                $labeldia              = "";
                $consultaacpmdiario    = Acpmediarioequipo($fechatabla, $fechatabla, $getequipo);
                $labelflete            = ("");
            }

            echo utf8_decode(round($consultaodometrofecha, 2) . $labeldia . $labelflete);

            ?>
        </div>

         <div class="event-desc">
          <?php //echo ($fechatabla); ?>
          <strong>
          <?php
if ($tipo_equipo == 'Volqueta' or $tipo_equipo == 'Vehiculos') {
                $consultaodometrofecha = FacturacionDiaTotalVolquetas($fechatabla, $fechatabla, $getequipo);
                $labelvalor            = "$ ";

            } elseif ($tipo_equipo == 'Maquinaria Pesada') {
                $consultaodometrofecha = FacturacionDiaTotalEquipos($fechatabla, $fechatabla, $getequipo);
                $labelvalor            = "$ ";

            } else {
                $consultaodometrofecha = "";
                $labelvalor            = "";
            }

            echo utf8_decode($labelvalor . number_format($consultaodometrofecha, 0));

            ?>
        </div>

<?php
if ($consultaacpmdiario > 0) {
                ?>

       <div class="event-tanqueo">
        <i class="fa fa-download"></i> Acpm: <strong><?php echo utf8_decode(round($consultaacpmdiario, 2)) ?> Gl.</strong>
        </div>

      <?php
}
            ?>



         <div style="display: none;" class="event-time">
         Stand By : <strong>8 Hr.</strong>
        </div>
      </div>
  <?php
$contadorfallas = ContadorFallas($fechatabla, $fechatabla, $getequipo);

            if ($contadorfallas > 0) {
                ?>


       <div  class="event">
        <div class="event-desc">
          <?php //echo ($fechatabla); ?>
          OT: <strong>
             <?php
echo ($contadorfallas);
                ?>
          </strong>
        </div>
        <div class="event-time">

    <?php
$res         = Equipos::obtenerPaginareportesfecha($getequipo, $fechatabla, $fechatabla);
                $movimientos = $res->getCampos();
                foreach ($movimientos as $mov) {
                    $id_reporte = $mov['id_reporte'] . " | ";

                    echo ("<a target='_blank' href='?controller=equipos&&action=editareporte&&id=".$id_reporte."&&id_equipo=".$getequipo."&&usermecanico=1'>".$id_reporte."</a>");
                }
                ?>
        </div>
      </div>
  <?php
}
            ?>

      <?php
# -----------  Si no aplica la validación dejar campo en vacío (Domingo)  -----------

        } else {
            ?>
       <div class="date"></div>
       <div class="event">
        <div class="event-desc">

        </div>
        <div class="event-time">

        </div>
      </div>
      <?php
}
        # -----------  Finaliza validación del mismo mes   -----------

        ?>


</td>
  <tr>

  </tr>


        <?php
# -----------  Inicio días entre semana   -----------
    } else {

        $fechatabla      = date('Y-m-d', strtotime($table_ano . "-" . $table_mes . "-" . $i));
        $numerodiasemana = date('w', strtotime($fechatabla));
        $diames          = date('d', strtotime($fechatabla));
        $getmes          = date('m', strtotime($fechatabla));
        //echo ($fechatabla."<strong>".$diames."</strong>");

        ?>
      <td class="day other-month">

     <?php
if ($getmes == $table_mes) {
            ?>
     <?php
// 1. Consultar Estado Día entre semana
            $consultaestadoporfecha = Equipos::obtenerEstadoporfecha($getequipo, $fechatabla);

            # -----------  Se define la clase que aplica por el estado (Días entre semana ).   -----------

            if ($consultaestadoporfecha == "Operativo") {
                echo ("<div class='dateok'>" . $i . "</div>");
            } elseif ($consultaestadoporfecha == "") {
                echo ("<div class='date'>" . $i . "</div>");
            } elseif ($consultaestadoporfecha == "Fuera de Servicio") {
                echo ("<div class='datebug'>" . $i . "</div>");
            } elseif ($consultaestadoporfecha == "Mantenimiento") {
                echo ("<div class='datebug'>" . $i . "</div>");
            }
            # ---------------------------------------------------------------------------------
            ?>
      <div class="event">
        <div class="event-desc">
          <?php //echo ($fechatabla); ?>
          Registro:
          <strong>
          <?php
if ($tipo_equipo == 'Volqueta' or $tipo_equipo == 'Vehiculos') {
                $consultaodometrofecha = KilometrajeDiariosVolqueta($fechatabla, $fechatabla, $getequipo);
                $labeldia              = " Km.";
                $consultaacpmdiario    = Acpmediarioequipo($fechatabla, $fechatabla, $getequipo);
                $consultafletedia      = FletesDiariosVolqueta($fechatabla, $fechatabla, $getequipo);
                $labelflete            = ("<br>" . $consultafletedia . " Fletes");
            } elseif ($tipo_equipo == 'Maquinaria Pesada') {
                $consultaodometrofecha = HorasDiarioEquipo($fechatabla, $fechatabla, $getequipo);
                $labeldia              = " Hr.";
                $consultaacpmdiario    = Acpmediarioequipo($fechatabla, $fechatabla, $getequipo);
                $labelflete            = ("");
            } else {
                $consultaodometrofecha = "";
                $labeldia              = "";
                $consultaacpmdiario    = Acpmediarioequipo($fechatabla, $fechatabla, $getequipo);
                $consultafletedia      = FletesDiariosVolqueta($fechatabla, $fechatabla, $getequipo);
                $labelflete            = ("");
            }

            echo utf8_decode(round($consultaodometrofecha, 2) . $labeldia . $labelflete);

            ?>
        </div>
         <div class="event-time">
          <?php //echo ($fechatabla); ?>
          <strong>
          <?php
if ($tipo_equipo == 'Volqueta' or $tipo_equipo == 'Vehiculos') {
                $consultaodometrofecha = FacturacionDiaTotalVolquetas($fechatabla, $fechatabla, $getequipo);
                $labelvalor            = "$ ";

            } elseif ($tipo_equipo == 'Maquinaria Pesada') {
                $consultaodometrofecha = FacturacionDiaTotalEquipos($fechatabla, $fechatabla, $getequipo);
                $labelvalor            = "$ ";

            } else {
                $consultaodometrofecha = "";
                $labelvalor            = "";
            }

            echo utf8_decode("<strong>" . $labelvalor . number_format($consultaodometrofecha, 0) . "</strong>");

            ?>
        </div>
       </div>

<?php
if ($consultaacpmdiario > 0) {
                ?>

       <div class="event-tanqueo">
        <i class="fa fa-download"></i> Acpm: <strong><?php echo utf8_decode(round($consultaacpmdiario, 2)) ?> Gl.</strong>
        </div>

      <?php
}
            ?>



<?php
$contadorfallas = ContadorFallas($fechatabla, $fechatabla, $getequipo);

            if ($contadorfallas > 0) {
                ?>


       <div  class="event">
        <div class="event-desc">
          <?php //echo ($fechatabla); ?>
          OT: <strong>
             <?php
echo ($contadorfallas);
                ?>
          </strong>
        </div>
        <div class="event-time">
           <?php
$res         = Equipos::obtenerPaginareportesfecha($getequipo, $fechatabla, $fechatabla);
                $movimientos = $res->getCampos();
                foreach ($movimientos as $mov) {
                    $id_reporte = $mov['id_reporte'] . "  ";
                    $estadoreporte=Equipos::obtenerestadoordentrabajo($id_reporte);

                    if ($estadoreporte==1) {
                         echo ("<a target='_blank' href='?controller=equipos&&action=editareporte&&id=".$id_reporte."&&id_equipo=".$getequipo."&&usermecanico=1'><i class='fa fa-circle text-danger'>".$id_reporte." </i></a>");
                    }elseif ($estadoreporte==2) {
                         echo ("<a target='_blank' href='?controller=equipos&&action=editareporte&&id=".$id_reporte."&&id_equipo=".$getequipo."&&usermecanico=1'><i class='fa fa-circle text-warning'> ".$id_reporte."</i></a>");
                    }elseif ($estadoreporte==3) {
                         echo ("<a target='_blank' href='?controller=equipos&&action=editareporte&&id=".$id_reporte."&&id_equipo=".$getequipo."&&usermecanico=1'><i class='fa fa-circle text-success'>".$id_reporte." </i></a>");
                    }


                   
                }
                ?>
        </div>
      </div>
  <?php
}
            ?>


<?php
# -----------  Si no aplica la validación dejar campo en vacío (Día entre semana )  -----------
        } else {
            ?>
   <div class="date">-</div>
<?php
}
        ?>

      </td>


      <?php
}

}

?>



</table>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="orderwork">
                <?php 
                include 'tab_orderwork.php';
                 ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="acpm">
                <?php 
                include 'tab_acpm.php';
                 ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="kilometer">
                 <?php 
                include 'tab_kilometer.php';
                 ?>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="minorbox">
                 <?php 
                include 'tab_cajamenor.php';
                 ?>
              </div>
              <!-- /.tab-pane -->

               <div class="tab-pane" id="production">
                <?php 
                if ($tipo_equipo=="Volqueta") {
                  include 'tab_prod_vol.php';
                }elseif ($tipo_equipo=="Maquinaria Pesada") {
                  include 'tab_prod_hr.php';
                }elseif ($tipo_equipo=="Vehiculos") {
                   include 'tab_prod_vol.php';
                }
                 ?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

</div> <!-- Fin Content-Wrapper -->






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




