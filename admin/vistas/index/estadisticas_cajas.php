<?php 

function Ingresosmesgeneral($mes,$ano,$caja){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_ingreso),0) as totales FROM ingresos_caja WHERE YEAR(fecha_ingreso)='".$ano."' and MONTH(fecha_ingreso)='".$mes."' and ingreso_publicado='1' and caja_ppal='".$caja."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Egresosmesgeneral($mes,$ano,$caja){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_egreso),0) as totales FROM egresos_caja WHERE YEAR(fecha_egreso)='".$ano."' and MONTH(fecha_egreso)='".$mes."' and egreso_publicado='1' and caja_ppal='".$caja."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function GastosxRubromesgeneral($mes,$ano,$caja,$rubro){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_egreso),0) as totales FROM egresos_caja WHERE YEAR(fecha_egreso)='".$ano."' and MONTH(fecha_egreso)='".$mes."' and egreso_publicado='1' and caja_ppal='".$caja."' and id_rubro='".$rubro."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


 ?>