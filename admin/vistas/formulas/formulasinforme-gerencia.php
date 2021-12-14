<?php 

function ventaAgregadosporfecha($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as Resultado FROM reporte_ventas
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and producto_id_producto<>'4'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Resultado'];
		}
	return $total;
	}

function ventaAsfaltoporfecha($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as Resultado FROM reporte_ventas
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and producto_id_producto='4'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Resultado'];
		}
	return $total;
	}

function ventaAlquilerporfecha($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as Resultado FROM reporte_prestamos
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Resultado'];
		}
	return $total;
	}

function IngresosPor($FechaStart,$FechaEnd,$ingresopor){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_ingreso),0) as Resultado FROM ingresos_cuenta
where fecha_ingreso >='".$FechaStart."' and fecha_ingreso <='".$FechaEnd."' and ingreso_publicado='1' and cuenta_id_cuenta='5' and ingreso_por='".$ingresopor."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Resultado'];
		}
	return $total;
	}

function AbonosAgregados($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as Resultado FROM reporte_abonos as A, reporte_ventas as B
where B.fecha_reporte >='".$FechaStart."' and  B.fecha_reporte <='".$FechaEnd."' and A.reporte_publicado='1' and reporte_id_factura<>'0' and A.estado_reporte='1' and A.reporte_id_factura=B.id");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Resultado'];
		}
	return $total;
	}

function AbonosAlquiler($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as Resultado FROM reporte_abonos as A, reporte_prestamos as B
where B.fecha_reporte >='".$FechaStart."' and  B.fecha_reporte <='".$FechaEnd."' and A.reporte_publicado='1' and reporte_id_factura<>'0' and A.estado_reporte='1' and A.reporte_id_factura=B.id");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Resultado'];
		}
	return $total;
	}

function AbonosCuentasPagar($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as Resultado FROM reporte_abonos as A, reporte_compras as B
where B.fecha_reporte >='".$FechaStart."' and  B.fecha_reporte <='".$FechaEnd."' and A.reporte_publicado='1' and A.reporte_id_cuentaxpagar<>'0' and B.estado_reporte='2' and A.reporte_id_cuentaxpagar=B.id");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Resultado'];
		}
	return $total;
	}

	
function ComprasContadoRubro($FechaStart,$FechaEnd,$rubro){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3*cantidad),0) as Resultado FROM reporte_compras as A, subrubros as B
where A.fecha_reporte >='".$FechaStart."' and  A.fecha_reporte <='".$FechaEnd."' and A.reporte_publicado='1' and estado_reporte='1' and A.subrubro_id_subrubro=B.id_subrubro and B.rubro_id_rubro='".$rubro."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Resultado'];
		}
	return $total;
	}

function ComprasCreditoRubro($FechaStart,$FechaEnd,$rubro){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3*cantidad),0) as Resultado FROM reporte_compras as A, subrubros as B
where A.fecha_reporte >='".$FechaStart."' and  A.fecha_reporte <='".$FechaEnd."' and A.reporte_publicado='1' and estado_reporte='2' and A.subrubro_id_subrubro=B.id_subrubro and B.rubro_id_rubro='".$rubro."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Resultado'];
		}
	return $total;
	}


 ?>