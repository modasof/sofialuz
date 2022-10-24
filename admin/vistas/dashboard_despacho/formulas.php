<?php

function Informe_Despachosmesgeneral($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_despachosclientes WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' ");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

		function Informe_EstadisticasDespachos($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT fecha_reporte,IFNULL(sum(ROUND(cantidad,2)),0) as totales FROM reporte_despachosclientes
WHERE  MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1'  GROUP BY fecha_reporte");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$total.$campo['totales'].",";
		}
	return $total;
	}

	function Informe_Despachosmesgeneralvalor($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT IFNULL(sum(valor_m3),0) as totales FROM reporte_despachosclientes WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1'";
	$select = $db->prepare($sql);
	//echo($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

	function Informe_Despachosfechageneralvalor($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT IFNULL(sum(valor_m3),0) as totales FROM reporte_despachosclientes WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'";
	$select = $db->prepare($sql);
	//echo($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


?>