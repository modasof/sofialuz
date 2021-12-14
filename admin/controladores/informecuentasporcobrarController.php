<?php
class informecuentasporcobrarController {
	function __construct() {}


	function cuentasxcobrarconsolidado() {
		$campos=informecuentasporcobrar::ReporteCuentasxcobrarconsolidado();;
		require_once 'vistas/informecuentasporcobrar/reportecuentasxcobrarconsolidado.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function cuentasxcobrarporfechaconsolidado() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=informecuentasporcobrar::ReporteCuentasxcobrarconsolidado();;
		require_once 'vistas/informecuentasporcobrar/reportecuentasxcobrarconsolidado.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function cuentasxcobrardetalle() {
		$idproveedor = $_GET['idproveedor'];
		$campos=informecuentasporcobrar::ReporteCuentasxcobrardetalle($idproveedor);;
		require_once 'vistas/informecuentasporcobrar/reportecuentasxcobrardetalle.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function cuentasxcobrarporfechadetalle() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=informecuentasporcobrar::ReporteCuentasxcobrardetalle();;
		require_once 'vistas/informecuentasporcobrar/reportecuentasxcobrardetalle.php';
	}


 }
