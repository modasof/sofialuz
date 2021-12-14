<?php 

function NumeroFletesConductor($FechaStart,$FechaEnd,$usuariocon){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(viajes),0) as Total FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and despachado_por='".$usuariocon."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}

function FacturacionDiaTotal($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3),0) as Total FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}



 ?>