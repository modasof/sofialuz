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


 }
