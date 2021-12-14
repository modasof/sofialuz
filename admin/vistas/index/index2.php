<?php
header('Content-Type: text/html; charset=UTF-8');
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
          header("location:../login/index.php");
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
  <title>Obinco.net</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
  
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->
<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
   <!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
 

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
