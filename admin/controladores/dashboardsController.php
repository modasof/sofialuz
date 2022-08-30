<?php
class DashboardsController {
	function __construct() {}


function dashboardcompras() {
		if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		require_once 'vistas/dashboards/dashboardcompras.php';
	}

function combustible() {
		if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}

elseif (isset($_GET['fechainicioinforme'])) {
  $fechainicioinforme=$_GET['fechainicioinforme'];
}

elseif (isset($_GET['fechafinalinforme'])) {
  $fechafinalinforme=$_GET['fechafinalinforme'];
}

		require_once 'vistas/dashboard_combustible/informe.php';
	}


 }
