<?php
header('Content-Type: text/html; charset=UTF-8');

header("Set-Cookie: key=value; path=/; domain=canvas.com; HttpOnly; SameSite=Lax");

include_once 'modelos/gestiondocumental.php';
include_once 'controladores/gestiondocumentalController.php';
include_once 'modelos/gestiondocumentaleq.php';
include_once 'controladores/gestiondocumentaleqController.php';
include_once 'modelos/equipos.php';
include_once 'controladores/equiposController.php';

    session_start();
    //include_once 'modelos/cuentas.php';
    //include_once 'controladores/cuentasController.php';

    $RolSesion = $_SESSION['IdRol'];
    $IdSesion = $_SESSION['IdUser'];
    if (isset($_SESSION['username'])) {
        //asignar a variable
        $usernameSesion = $_SESSION['username'];
        }
        else
        {
          header("location:../Login/index.php");
        }
function fechalarga($fechaSql)
{
$date = new DateTime($fechaSql);
$W=$date->format('w');
$d=$date->format('d');
$n=$date->format('n');
$Y=$date->format('Y');

$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
$meses = array("Enero-","Febrero-","Marzo-","Abril-","Mayo-","Junio-","Julio-","Agosto-","Septiembre-","Octubre-","Noviembre-","Diciembre-");
//$NuevaFecha=($dias[date($W)].", ".date($d)." de ".$meses[date($n)-1]. " ".date($Y));
$NuevaFecha=(date($d)." de ".$meses[date($n)-1]. " ".date($Y));

return $NuevaFecha;
}
function dias_transcurridos($fecha_i,$fecha_f)
{
    $dias   = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
    $dias   = abs($dias); $dias = floor($dias);     
    return $dias;
}

?>
<!DOCTYPE>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sofialuz.net</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
  <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js" integrity="sha256-Lsk+CDPOzTapLoAzWW0G/WeQeViS3FMzywpzPZV8SXk=" crossorigin="anonymous"></script>
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="dist/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="dist/css/buttons.dataTables.min.css">
  
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->
<link rel="apple-touch-icon" sizes="57x57" href="Favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="Favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="Favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="Favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="Favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="Favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="Favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="Favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="Favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="Favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="Favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="Favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="Favicon/favicon-16x16.png">
<link rel="manifest" href="https://sofialuz.net/admin/Favicon/manifest.json"> 
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="Favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

  
   <!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script>
document.cookie = 'same-site-cookie=foo; SameSite=Lax'; 
document.cookie = 'cross-site-cookie=bar; SameSite=None; Secure';
</script>

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'dc790a7c9fd8941ae3c27cd53f10d0704b4b1564';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>


</head>
  <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">

      <?php include "navbar.php";?>
      <?php include "menuizquierdo.php";?>
      <?php include "pluginsjs.php";?>
	     
	     <?php require_once 'routing.php'; //LLAMA AL CONTENIDO DEL CONTROLADOR USADO (DENTRO DE CONTROLADORES)?> 
      
         <?php include "aside.php";?>
        <?php include "footer.php";?>


       
  <div class="control-sidebar-bg"></div>

 </div>

 
  </body>
  


</html>
