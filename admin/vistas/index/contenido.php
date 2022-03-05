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

include_once 'controladores/reportesController.php';
include_once 'modelos/reportes.php';

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

$quincedias=date("Y-m-d",strtotime($fecha_actual."- 2 week")); 
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
 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!--Inicio Contenido Según perfil-->
<?php 
    
    if ($RolSesion==1) { // Rol Súper Admin 
      require_once "homegerencia.php";
    }
    elseif ($RolSesion==2) {  // Rol Equipos
      require_once "homeequipos.php";
    }
    elseif ($RolSesion==4) { //Rol Conductor Dobletroque
      require_once "homeconductor.php";
    }
     elseif ($RolSesion==5) {  // Rol Siso 
      require_once "homerecursoshumanos.php";
    }
    elseif ($RolSesion==6) {  // Rol Cliente
      require_once "homeclientes.php";
    }
     elseif ($RolSesion==7) { //Rol Administrador Volquetas
      require_once "homeadminvolquetas.php";
    }
     elseif ($RolSesion==8) {  // Rol Jefe de Planta
      require_once "homejefeplanta.php";
    }
    elseif ($RolSesion==10) {  // Rol Operador 
      require_once "homeoperador.php";
    }
    elseif ($RolSesion==11) {  // Asistente Administrativo
      require_once "homeoperador.php";
    }
    elseif ($RolSesion==12) {  // Asistente Contable
      require_once "homeoperador.php";
    }
    elseif ($RolSesion==13) {  // Almacenista
      require_once "homeequipos.php";
    }
     elseif ($RolSesion==14) {  // Solicitante
      require_once "vistas/almacen/homesolicitante.php";
    }
     elseif ($RolSesion==15) {  // Director
      require_once "vistas/almacen/homedirector.php";
    }
     elseif ($RolSesion==16) {  // Conductor Tractomula
        require_once "homeconductor.php";
    }
  
 ?>
<!--Final Contenido Según Perfil-->

<link rel="stylesheet" href="dist/css/owl.carousel.min.css">
<!--<link rel="stylesheet" href="dist/css/owl.theme.default.min.css">-->
<!--<script src="dist/js/jquery.min.js"></script>-->
<script src="dist/js/owl.carousel.min.js"></script>

<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.stock.min.js"></script> 
<script type="text/javascript">
  $(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    rtl:false,
    loop:true,
    margin:20,
    nav:true,
    autoplay:true,
    autoplayTimeout:2500,
    autoplayHoverPause:true,
    autoWidth:true,
    items:6
    // responsive:{
    //     500:{
    //         items:3
    //     },
    //     100:{
    //         items:4
    //     },
    //     0:{
    //         items:5
    //     }
    // }
})
});
</script>
 <?php 
    include 'vistas/graficas/compras-index-script.php';
 ?>
 

<script src="dist/js/canvasjs.min.js"></script>

