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
	$sql="SELECT COUNT(A.id) as totales FROM requisiciones as A, requisiciones_items as B WHERE ".$area." and requisicion_publicada='1' AND A.id=B.requisicion_id and B.estado_item='1' order by A.fecha_reporte DESC";
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


function Comprasanogeneral($ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_total),0) as totales FROM ordenescompra WHERE YEAR(fecha_reporte)='".$ano."' and estado_orden<>'0' ");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function Comprasmesgeneralfecha($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_total),0) as totales FROM ordenescompra WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and estado_orden<>'0'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function Comprasmesgeneralfechatipo($FechaStart,$FechaEnd,$tipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_total),0) as totales FROM ordenescompra WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and estado_orden<>'0' and compra_de='".$tipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function Comprasproyectofecha($FechaStart,$FechaEnd,$proyecto){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT SUM(B.vr_unitario*B.cantidadcot) AS totales FROM ordenescompra as C, cotizaciones_item as B, requisiciones as A WHERE C.fecha_reporte >='".$FechaStart."' and C.fecha_reporte <='".$FechaEnd."' AND C.estado_orden<>'0' AND A.id=B.requisicion_id AND C.id=B.ordencompra_num AND  B.estado_cotizacion='02' AND A.proyecto_id_proyecto='".$proyecto."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Comprascategoriafecha($FechaStart,$FechaEnd,$proyecto){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT SUM(B.vr_unitario*B.cantidadcot) AS totales FROM ordenescompra as C, cotizaciones_item as B, requisiciones as A , insumos as D WHERE C.fecha_reporte >='".$FechaStart."' and C.fecha_reporte <='".$FechaEnd."' AND C.estado_orden<>'0' AND A.id=B.requisicion_id AND C.id=B.ordencompra_num AND  B.estado_cotizacion='02' AND B.insumo_id_insumo=D.id_insumo AND D.categoriainsumo_id='".$proyecto."' ");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function Comprasrubrofecha($FechaStart,$FechaEnd,$rubro){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT SUM(valor_total) AS totales FROM ordenescompra WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' AND estado_orden<>'0' AND rubro_id='".$rubro."';");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function Comprasmesgeneraltipo($mes,$ano,$tipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_total),0) as totales FROM ordenescompra WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and estado_orden<>'0' and compra_de='".$tipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}



function Comprasmesgeneralinventario($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(C.vr_unitario*B.cantidad),0) as totales FROM ordenescompra as A, detalle_entrada_ins as B, cotizaciones_item as C WHERE A.id=B.oc_id AND YEAR(A.fecha_reporte)='".$ano."' AND MONTH (A.fecha_reporte)='".$mes."' and A.id=C.ordencompra_num and B.insumo_id<>0 and B.estado_detalle_entrada='1' and A.compra_de='Insumos' and B.insumo_id=C.insumo_id_insumo");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function Comprasmesgeneralinventariosalidas($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_salida),0) as totales FROM salidas_ins WHERE  YEAR(fecha_reporte)='".$ano."' AND MONTH (fecha_reporte)='".$mes."' and estado_salida='Despachado'");
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