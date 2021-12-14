<?php 

function CuentaEquipos(){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM equipos WHERE equipo_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function CuentaEquiposReporte($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(equipo_id_equipo) as totales FROM reporte_equipos WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function ReporteEqDiasAlerta($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(dias_trabajados),0) as totales FROM reporte_equipos WHERE  equipo_id_equipo='".$equipo."' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


?>
	



