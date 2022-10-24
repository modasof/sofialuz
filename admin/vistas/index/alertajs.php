<?php 
ini_set('display_errors', '0');

include_once '../../modelos/equipos.php';
include_once '../../controladores/equiposController.php';

include_once '../../modelos/gestiondocumentaleq.php';
include_once '../../controladores/gestiondocumentaleqController.php';
include '../../include/class.conexion.php';

$destinatario = "fredygonzalezp@outlook.com"; 
$asunto = utf8_decode("Atención! Documentos próximos a expirar"); 

 $parteuno="
<!DOCTYPE html>
<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
<head>
    <meta charset='utf-8'> 
    <meta name='viewport' content='width=device-width'> 
    <meta http-equiv='X-UA-Compatible' content='IE=edge'> 
    <meta name='x-apple-disable-message-reformatting'>  
    <title>Luz.net</title> 

    <link href='https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>

<style>
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}
 {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}
div[style*='margin: 16px 0'] {
    margin: 0 !important;
}

table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

img {
    -ms-interpolation-mode:bicubic;
}

a {
    text-decoration: none;
}


*[x-apple-data-detectors],  
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

.a6S {
    display: none !important;
    opacity: 0.01 !important;
}


.im {
    color: inherit !important;
}


img.g-img + div {
    display: none !important;
}


@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}

@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}

@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}
    </style>

    <style>

       .primary{
   background: #f68132;
}
.bg_white{
   background: #ffffff;
}
.bg_light{
   background: #f7fafa;
}
.bg_black{
   background: #000000;
}
.bg_dark{
   background: rgba(0,0,0,.8);
}
.email-section{
   padding:2.5em;
}

.btn{
   padding: 10px 15px;
   display: inline-block;
}
.btn.btn-primary{
   border-radius: 5px;
   background: #f68132;
   color: #ffffff;
}
.btn.btn-white{
   border-radius: 5px;
   background: #ffffff;
   color: #000000;
}
.btn.btn-white-outline{
   border-radius: 5px;
   background: transparent;
   border: 1px solid #fff;
   color: #fff;
}
.btn.btn-black-outline{
   border-radius: 0px;
   background: transparent;
   border: 2px solid #000;
   color: #000;
   font-weight: 700;
}
.btn-custom{
   color: rgba(0,0,0,.3);
   text-decoration: underline;
}

h1,h2,h3,h4,h5,h6{
   font-family: 'Work Sans', sans-serif;
   color: #000000;
   margin-top: 0;
   font-weight: 400;
}

body{
   font-family: 'Work Sans', sans-serif;
   font-weight: 400;
   font-size: 15px;
   line-height: 1.8;
   color: rgba(0,0,0,.4);
}

a{
   color: #f68132;
}

table{
}

.logo h1{
   margin: 0;
}
.logo h1 a{
   color: #f68132;
   font-size: 24px;
   font-weight: 700;
   font-family: 'Work Sans', sans-serif;
}

.hero{
   position: relative;
   z-index: 0;
}

.hero .text{
   color: rgba(0,0,0,.3);
}
.hero .text h2{
   color: #000;
   font-size: 34px;
   margin-bottom: 15px;
   font-weight: 300;
   line-height: 1.2;
}
.hero .text h3{
   font-size: 24px;
   font-weight: 200;
}
.hero .text h2 span{
   font-weight: 600;
   color: #000;
}


.product-entry{
   display: block;
   position: relative;
   float: left;
   padding-top: 20px;
}
.product-entry .text{
   width: calc(100% - 125px);
   padding-left: 20px;
}
.product-entry .text h3{
   margin-bottom: 0;
   padding-bottom: 0;
}
.product-entry .text p{
   margin-top: 0;
}
.product-entry img, .product-entry .text{
   float: left;
}

ul.social{
   padding: 0;
}
ul.social li{
   display: inline-block;
   margin-right: 10px;
}


.footer{
   border-top: 1px solid rgba(0,0,0,.05);
   color: rgba(0,0,0,.5);
}
.footer .heading{
   color: #000;
   font-size: 20px;
}
.footer ul{
   margin: 0;
   padding: 0;
}
.footer ul li{
   list-style: none;
   margin-bottom: 10px;
}
.footer ul li a{
   color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {


}
    </style>


</head>

<body width='100%'' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;'>
   <center style='width: 100%; background-color: #f1f1f1;''>
    <div style='display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;''>
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style='max-width: 600px; margin: 0 auto;' class='email-container'>
      <!-- BEGIN BODY -->
      <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
         <tr>
          <td valign='top' class='bg_white' style='padding: 1em 2.5em 0 2.5em;'>
            <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
               <tr>
                  <td class='logo' style='text-align: left;''>
                     <h1><a href='https://sofialuz.net/Login/index.php'><i class='fa fa-bell'> </i> Software Luz</a></h1>
                   </td>
               </tr>
            </table>
          </td>
         </tr><!-- end tr -->
           
         <tr>
            <table class='bg_white' role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
              
                 <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                  <td colspan='2' valign='middle' width='100%' style='text-align:left; padding: 0 2.5em;'>
                     <div class='product-entry'>
                        <img src='https://sofialuz.net/Login/logo-ppal.png' alt='' style='width: 100px; max-width: 600px; height: auto; margin-bottom: 20px; display: block;'>
                        <div class='text'>
                           <h3>".utf8_decode("Gestión")." Documental Equipos</h3>
                          
                           <p>".utf8_decode("A continuación se detalla la lista de equipos con documentos que expirán en los próximos")."<strong> 15 ".utf8_decode("días").":</strong></p>
                        </div>
                     </div>
                  </td>
                 
                 </tr>
                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                   <th width='50%' style='text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 20px'>Fecha Vencimiento</th>
                   <th width='50%' style='text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 20px'>Equipo</th>
                 </tr>";?>

                 <?php 
$fecha_actual = date("Y-m-d");
$quincedias=date("Y-m-d",strtotime($fecha_actual."+ 2 week")); 

$res    = Gestiondocumentaleq::informeexpirafecha($fecha_actual,$quincedias);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $fecha_expiracion    = $campo['fecha_expiracion'];
    $equipo    = $campo['cuenta_id_cuenta'];
    $documento    = $campo['documento_id_documento'];
    $nombreequipo = Equipos::obtenerNombreEquipo($equipo);
    $nombredocumento = Gestiondocumentaleq::ObtenerNombredocumento($documento);

      $segunda = $segunda .("<tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                  <td valign='middle' width='80%' style='text-align:left; padding: 0 2.5em;'>".$nombredocumento."<br>
                     <i class='fa fa-calendar'> </i> Expira el ".$fecha_expiracion."
                  </td>
                  <td valign='middle' width='20%' style='text-align:left; padding: 0 2.5em;'>
               <span class='price' style='color: #000; font-size: 20px;'>".$nombreequipo."</span>
                  </td>
                 </tr>");

        
   }
    $partedos = trim($segunda, ',');
                  ?>

<?php 
   $partetres = "
   <tr>
                  <td valign='middle' style='text-align:left; padding: 1em 2.5em;'>
                     <p><a href='https://sofialuz.net/Login/index.php' class='btn btn-primary'>Ir a la plataforma</a></p>
                  </td>
                 </tr>
   </table>
         </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
     

    </div>
  </center>
</body>
</html>";
   ?>
        
      <?php           

$cuerpo=($parteuno.$partedos.$partetres);

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: Software Luz <sofialuznet@gmail.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: fogonzalez.ms@gmail.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers) 
 ?>
