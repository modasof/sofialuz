<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//  ini_set('display_errors', '0');
include_once 'modelos/visorgraficas.php';
include_once 'controladores/visorgraficasController.php';

?>

<!DOCTYPE html>
<html>
<head>

  <style>
html, body {
    height: 100%;
}

#dimScreen
{
    width: 100%;
    height: 100%;
    top:0px;
    background-color: #ECF0F5;
    position: absolute;
    z-index: 2000;
}    

.div-oculto{
    display:none;
    /*background-color: #222D32;*/
    /*position:absolute;*/
    /*width:40px;*/
    height:100%;
    z-index: 4000;
}

.div-menu:hover .div-oculto{
  display: block;

}

.div-menu{
  background-color: #ECF0F5;
  position:absolute;
  width:50px;
  height:100%;
  z-index: 3000;
  top:0;
  left:0px;  
}


</style>

<meta http-equiv="refresh" content="25" />

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
  </style>
  <title>Obinco.net</title>
</head>
<body >
<div id="dimScreen">
    <div  class="container"><?php echo $strHtml; ?> 
        <div class="div-menu">
              <div class="div-oculto">
                    <aside class="main-sidebar">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                              <ul class="sidebar-menu">      
                                    <li class="treeview">
                                      <li class="">
                                        <a href="?controller=estadisticavolqueta&&action=todos&&id=NA">
                                          <i class="fa fa-bar-chart"></i><span>Informe Volqueta</span>
                                        </a>
                                      </li>
                                    </li>
                                    <li class="treeview">
                                      <li class="">
                                        <a href="?controller=index&&action=index">
                                          <i class="fa fa-mail-reply"></i><span>Cerrar</span>
                                        </a>
                                      </li>
                                    </li>                                              
                              </ul>
                        </section>
                    </aside>              
              </div>
        </div>
  </div>
</div>
</body>
</html>