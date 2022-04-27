<?php
class InformesController {
	function __construct() {}

	function cuentas() {
		$campos=Informes::InformeCuentas();;
		require_once 'vistas/informes/informe_cuentas.php';
	}

	function cajas() {
		$campos=Informes::InformeCajas();;
		require_once 'vistas/informes/informe_cajas.php';
	}

	function ventas() {
		$campos=Informes::InformeVentas();;
		require_once 'vistas/informes/informe_ventas.php';
	}

	function clientes() {
		$campos=Informes::InformeClientes();;
		require_once 'vistas/informes/informe_clientes.php';
	}

	function compras() {
		$campos=Informes::InformeCompras();;
		require_once 'vistas/informes/informe_compras.php';
	}


	function movimientoscuentas() {
		$id=$_GET['id_cuenta'];
		if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		require_once 'vistas/informes/informe_movimientoscuenta.php';
	}



function movimientoscaja() {
		$id=$_GET['id_caja'];
		if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		require_once 'vistas/informes/informe_movimientoscaja.php';
	}

function detallelineanegocio() {
		$id=$_GET['id_linea'];
		if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		require_once 'vistas/informes/informe_ventas_producto.php';
	}


function totalrq() {
	
		if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		require_once 'vistas/informes/informe_total_rq.php';
	}


function rqporfecha() {
	
		if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		require_once 'vistas/informes/informe_total_rq.php';
	}
	



	function subrubrosegresos() {
		$id=$_GET['id_rubro'];
		$id_cuenta=$_GET['id_cuenta'];
		if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		require_once 'vistas/informes/informe_subrubros_egresos.php';
	}

	function subrubrosegresoscaja() {
		$id=$_GET['id_rubro'];
		$id_caja=$_GET['id_caja'];
		if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		require_once 'vistas/informes/informe_subrubros_egresoscaja.php';
	}


function dashboardcompras() {
		if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		require_once 'vistas/index/dashboardcompras.php';
	}





 }
