<?php 

function PromedioEquipo($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT equipo_id_equipo, avg(cantidad) as Galones FROM reporte_combustibles
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and equipo_id_equipo='".$equipo."' and reporte_publicado='1'
Group by equipo_id_equipo");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}


function Acpmmes($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Galones FROM reporte_combustibles
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo<>'732'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function AcpmmesEstaciones($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Galones FROM reporte_combustibles
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and punto_despacho<>'3'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}


function AcpmmesIngresoCarro($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Galones FROM reporte_combustibles
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='732'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}


function AcpmmesEgresoCarro($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Galones FROM reporte_combustibles
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and punto_despacho='3'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function AcpmfechaVolqueta($FechaStart,$FechaEnd,$idequipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Galones FROM reporte_combustibles
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$idequipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}


function AcpmfechaVolquetavalor($FechaStart,$FechaEnd,$idequipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as Galones FROM reporte_combustibles
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$idequipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}


function HorasEquipo($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(indicador),0) as Galones FROM reporte_horas
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and equipo_id_equipo='".$equipo."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

 ?>