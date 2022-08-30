<?php 

# ===================================================================
# =           Dashboard Perfil Mécanico           =
# ===================================================================

function Totalserviciosmecanico($mes,$ano,$usuario){
	$db = Db::getConnect();
	$consultasql="SELECT COUNT(id_reporte) as totales FROM reporte_equipos WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and creado_por='".$usuario."'";
	$select = $db->prepare($consultasql);
	// echo($consultasql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Promediodiarioservicios($mes,$ano,$usuario){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT fecha_reporte,IFNULL(sum(ROUND(estado_reporte,2)),0) as totales FROM reporte_equipos
WHERE  MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and creado_por='".$usuario."' GROUP BY fecha_reporte");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$total.$campo['totales'].",";
		}
	return $total;
	}

function Totalequiposmecanico($mes,$ano,$usuario){
	$db = Db::getConnect();
	$consultasql="SELECT COUNT(DISTINCT(equipo_id_equipo)) as totales FROM reporte_equipos WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and creado_por='".$usuario."'";
	$select = $db->prepare($consultasql);
	// echo($consultasql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

# ======  End of Contador de ordenes de trabajo por mécanico  =======
?>




