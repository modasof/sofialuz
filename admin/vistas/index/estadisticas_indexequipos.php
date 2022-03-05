<?php 
function FletesDiarios($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(viajes),0) as Total FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}
	

function FletesDiariosVolqueta($FechaStart,$FechaEnd,$idequipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(viajes),0) as Total FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$idequipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}

function KilometrajeDiarios($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(kilometraje),0) as Total FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}

function KilometrajeDiariosVolqueta($FechaStart,$FechaEnd,$idequipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(hora_inactiva),0) as Total FROM reporte_horas
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$idequipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}

function MetrajeDiarios($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Total FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}

function MetrajeDiariosVolqueta($FechaStart,$FechaEnd,$idequipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Total FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$idequipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}

function GastoCombustibledia($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_combustibles WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function ConsumoCombustiblediaUsuario($FechaStart,$FechaEnd,$idusuario){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_combustibles WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and creado_por='".$idusuario."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function GastoCombustiblediaUsuario($FechaStart,$FechaEnd,$idusuario){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_combustibles WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and creado_por='".$idusuario."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function PromedioDiarioFact($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3*kilometraje),0) as totales FROM reporte_despachosclientes WHERE  YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' GROUP BY fecha_reporte");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$total.$campo['totales'].",";
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

function FacturacionDiaTotalVolquetas($FechaStart,$FechaEnd,$idequipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3),0) as Total FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$idequipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}


function RecepcionMaterial($material,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Total FROM reporte_comprasinsumos
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and insumo_id_insumo='".$material."' and reporte_publicado='1'
Group by insumo_id_insumo");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}

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

function FacturacionConductorpormes($FechaStart,$FechaEnd,$usuariocon){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3),0) as Total FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and despachado_por='".$usuariocon."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}

function UltimoEstadoEquipo($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT estado_sel FROM reporte_estado_equipos WHERE equipo_id_equipo='".$equipo."' ORDER BY id DESC LIMIT 1");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['estado_sel'];
		}
	return $total;
	}

function UltimoFechaEstadoEquipo($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT fecha_reporte FROM reporte_estado_equipos WHERE equipo_id_equipo='".$equipo."' ORDER BY id DESC LIMIT 1");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['fecha_reporte'];
		}
	return $total;
	}

	


 ?>