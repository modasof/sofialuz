<?php 

function ProduccionConductorpormes($mes,$ano,$conductor){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(A.valor_m3*B.comision/100),0) as totales FROM reporte_despachosclientes as A, equipos as B WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_reporte='1' and despachado_por='".$conductor."' and B.id_equipo=A.equipo_id_equipo");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function ProduccionConductorpormes2022($mes,$ano,$conductor){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3),0) as totales FROM reporte_despachosclientes WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_reporte='1' and despachado_por='".$conductor."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function ProduccionMesConductor($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(A.valor_m3*B.comision/100),0) as totales FROM reporte_despachosclientes as A, equipos as B WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and B.id_equipo=A.equipo_id_equipo");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function ProduccionMesConductor2022($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3),0) as totales FROM reporte_despachosclientes WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function ProduccionAnualConductor($ano,$conductor){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(A.valor_m3*B.comision/100),0) as totales FROM reporte_despachosclientes as A, equipos as B WHERE YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and despachado_por='".$conductor."' and B.id_equipo=A.equipo_id_equipo");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function ProduccionAnualConductor2022($ano,$conductor){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT  IFNULL (sum(valor_m3),0) as totales FROM reporte_despachosclientes WHERE YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and despachado_por='".$conductor."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

// Informe Operadores Máquina

function ProduccionOperadorpormes($mes,$ano,$conductor){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_hora_operador*hora_inactiva),0) as totales FROM reporte_horasmq WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_reporte='1' and recibido_por='".$conductor."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function ProduccionMesOperador($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_hora_operador*hora_inactiva),0) as totales FROM reporte_horasmq WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function ProduccionAnualOperador($ano,$conductor){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_hora_operador*hora_inactiva),0) as totales FROM reporte_horasmq WHERE YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and recibido_por='".$conductor."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

 ?>