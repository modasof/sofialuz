<?php 

function Ingresosmesgeneral($mes,$ano,$caja){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_ingreso),0) as totales FROM ingresos_caja WHERE YEAR(fecha_ingreso)='".$ano."' and MONTH(fecha_ingreso)='".$mes."' and ingreso_publicado='1' and estado_ingreso='0' and caja_ppal='".$caja."'");
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
	$select = $db->prepare("SELECT IFNULL(sum(valor_egreso),0) as totales FROM egresos_caja WHERE YEAR(fecha_egreso)='".$ano."' and MONTH(fecha_egreso)='".$mes."' and egreso_publicado='1' and estado_egreso='0' and caja_ppal='".$caja."'");
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


function GastosVolquetaporfecha($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_egreso),0) as totales FROM egresos_caja WHERE fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."' and egreso_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


	function SalidasInsumoporvolqueta($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT IFNULL(sum(valor_salida),0) as Salidas FROM salidas_ins WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and equipo_id_equipo='".$equipo."'";
	$select = $db->prepare($sql);
	//echo($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$Salidas = $campo['Salidas'];
		}
	return $Salidas;
	}


 ?>