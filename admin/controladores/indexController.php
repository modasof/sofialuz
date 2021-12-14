<?php 
class UsuarioController{
    function __construct(){}
	function index(){
		require_once('vistas/index/contenido.php');
	}
	function error(){
		require_once('vistas/index/contenido.php');
	}
	function informe1(){
		require_once('vistas/index/informe1.php');
	}
	function informeequipos(){
		require_once('vistas/index/homeequipos.php');
	}

	function informegerencia(){
if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
if (isset($_POST['daterange2'])) {
  $fechaform2=$_POST['daterange2'];
}
elseif (isset($_GET['daterange2'])) {
  $fechaform2=$_GET['daterange2'];
}
		require_once('vistas/index/informe-gerencia.php');
	}
	function informeclientes(){
		require_once('vistas/index/informe-clientes.php');
	}
	function dashboardalmacen(){
		require_once('vistas/almacen/homealmacen.php');
	}
		function aprobarRq(){
		require_once('vistas/almacen/rqaprobacion.php');
	}
	function vistarqusuariosdashboard(){
		require_once('vistas/almacen/rq-usuarios.php');
	}
	function informeventaclientes(){
		require_once('vistas/index/informe-ventamclientes.php');
	}
	function informedetalleclientes(){
		require_once('vistas/index/informe-detalleclientes.php');
	}
	function informedetalleclientesventas(){
		require_once('vistas/index/informe-detalleclientesventas.php');
	}
	function micajamenor() {
		require_once 'vistas/index/reportemicajamenor.php';
	}
	



 }
 ?>
