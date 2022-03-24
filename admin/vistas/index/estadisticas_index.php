<?php 

function Acpmmesgeneral($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_combustibles WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo<>'732'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Acpmmesgeneralvalor($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_combustibles WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo<>'732'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function EstadisticasConsumoAcpm($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT fecha_reporte,IFNULL(sum(ROUND(cantidad,2)),0) as totales FROM reporte_combustibles
WHERE  MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and equipo_id_equipo<>'732' GROUP BY fecha_reporte");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$total.$campo['totales'].",";
		}
	return $total;
	}

function Despachosmesgeneral($mes,$ano){
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

function Horasmqmesgeneral($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(hora_inactiva),0) as totales FROM reporte_horasmq WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' ");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Despachosmesgeneralvalor($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3),0) as totales FROM reporte_despachosclientes WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function Horasmqmesgeneralvalor($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(hora_inactiva*valor_m3),0) as totales FROM reporte_horasmq WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function Despachosconcretomesgeneral($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_despachosconcreto WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' ");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Despachosconcretomesgeneralvalor($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_material),0) as totales FROM reporte_despachosconcreto WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' ");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


	function EstadisticasDespachos($mes,$ano){
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


	function EstadisticasHorasmq($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT fecha_reporte,IFNULL(avg(ROUND(valor_m3,2)),0) as totales FROM reporte_horasmq
WHERE  MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1'  GROUP BY fecha_reporte");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$total.$campo['totales'].",";
		}
	return $total;
	}


	function EstadisticasDespachosconcreto($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT fecha_reporte,IFNULL(sum(ROUND(cantidad,2)),0) as totales FROM reporte_despachosconcreto
WHERE  MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1'  GROUP BY fecha_reporte");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$total.$campo['totales'].",";
		}
	return $total;
	}


	function Contarrqporaprobar($area){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT COUNT(id) as totales FROM requisiciones WHERE ".$area." and requisicion_publicada='1' order by fecha_reporte DESC";
	//echo($sql);
	$select = $db->prepare($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}



function Comprasmesgeneral($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_total),0) as totales FROM ordenescompra WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and estado_orden<>'0' ");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Abonoscomprasmes($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor),0) as totales FROM detalle_pagos_ordenescompra as A, ordenescompra as B
WHERE  MONTH(B.fecha_reporte)='".$mes."' and YEAR(B.fecha_reporte)='".$ano."' and estado_pago='1' AND A.compra_id=B.id;");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$campo['totales'];
		}
	return $total;
	}


 ?>