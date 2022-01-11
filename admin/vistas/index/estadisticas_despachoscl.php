<?php 


function Despachosclmes($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Galones FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function DespachosPatiomes($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Galones FROM reporte_despachos
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and tipo_despacho='A Patio'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function DespachosTrituradorames($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Galones FROM reporte_despachos
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and tipo_despacho='Trituradora'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function PromedioDiarioTrituradora($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_despachos
WHERE  YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and tipo_despacho='Trituradora' GROUP BY fecha_reporte");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$total.$campo['totales'].",";
		}
	return $total;
	}

function PromedioDiarioPatio($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_despachos
WHERE  YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and tipo_despacho='A Patio' GROUP BY fecha_reporte");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$total.$campo['totales'].",";
		}
	return $total;
	}


function PromedioDiarioDespachos($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_despachosclientes
WHERE  YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' GROUP BY fecha_reporte");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$total.$campo['totales'].",";
		}
	return $total;
	}



function PromedioMesTrituradora($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_despachos
WHERE  YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and tipo_despacho='Trituradora' GROUP BY MONTH(fecha_reporte)");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$total.$campo['totales'].",";
		}
	return $total;
	}

function PromedioMesPatio($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_despachos
WHERE  YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and tipo_despacho='A Patio' GROUP BY MONTH(fecha_reporte)");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$total.$campo['totales'].",";
		}
	return $total;
	}

function PromedioMesDespachos($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_despachosclientes
WHERE  YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' GROUP BY MONTH(fecha_reporte)");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$total.$campo['totales'].",";
		}
	return $total;
	}


function Facturasmaterialporfecha($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as Galones FROM reporte_ventas WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and producto_id_producto<>'11'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function Facturasequiposporfecha($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as totales FROM reporte_prestamos WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Ingresosporfecha($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_ingreso),0) as Galones FROM ingresos_cuenta
where fecha_ingreso >='".$FechaStart."' and fecha_ingreso <='".$FechaEnd."' and estado_ingreso='1' and cuenta_id_cuenta='5'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}
function Egresosporfecha($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3),0) as Galones FROM reporte_compras
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and estado_reporte='1' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function Despachoscldetallemes($cliente,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Galones FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and cliente_id_cliente='".$cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

	function Viajescldetallemes($cliente,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(remision) as Galones FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and cliente_id_cliente='".$cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

	function Viajesvolquetadetallemes($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(remision) as totales FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

	function Volquetascldetallemes($cliente,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(DISTINCT(equipo_id_equipo)) as Galones FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and cliente_id_cliente='".$cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function Despachoscldetallemesventas($cliente,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3*cantidad),0) as Galones FROM reporte_ventas
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and cliente_id_cliente='".$cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}


function Facturacionvolquetasporfecha($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3+valor_material),0) as totales FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function Facturacionpromediovolquetasporfecha($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3+valor_material),0)/COUNT(DISTINCT fecha_reporte) as totales FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function Pagocomisionvolquetaporfecha($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(A.valor_m3*B.comision/100),0) as totales FROM reporte_despachosclientes as A, equipos as B
where A.fecha_reporte >='".$FechaStart."' and A.fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and A.equipo_id_equipo=B.id_equipo and A.equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}



	function Diaslaboradosvolquetaporfecha($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(DISTINCT fecha_reporte) as totales FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

	


function NumeroVolquetas($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(DISTINCT(equipo_id_equipo)) as Galones FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function NumeroVolquetasCliente($cliente,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(DISTINCT(equipo_id_equipo)) as Galones FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and cliente_id_cliente='".$cliente_id_cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function ViajesCliente($cliente,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(viajes),0) as Galones FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and cliente_id_cliente='".$cliente."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function ViajesMaterial($cliente,$producto,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(viajes),0) as Galones FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and producto_id_producto='".$producto."' and reporte_publicado='1' and cliente_id_cliente='".$cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function ViajesMaterialPlaca($cliente,$equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(viajes),0) as Galones FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and equipo_id_equipo='".$equipo."' and reporte_publicado='1' and cliente_id_cliente='".$cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}
//********************************************************************************************************
//** INICIO FUNCIONES VENTAS********************************************************************************
//*******************************************************************************************************

function Facturasclmes($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3*cantidad),0) as Galones FROM reporte_ventas
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function AbonosCliente($cliente,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as Galones FROM reporte_abonos
where fecha_abono >='".$FechaStart."' and fecha_abono <='".$FechaEnd."' and cliente_id_cliente='".$cliente."' and reporte_publicado='1' and reporte_id_factura<>'0'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function Abonosmes($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as Galones FROM reporte_abonos
where fecha_abono >='".$FechaStart."' and fecha_abono <='".$FechaEnd."'  and reporte_publicado='1' and reporte_id_factura<>'0'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

//********************************************************************************************************
//** INICIO CXC - CXP - GASTOS **************************************************************************
//*******************************************************************************************************

function Cxpfinal($tipodecuenta){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3*cantidad),0) as Galones FROM reporte_compras
where estado_reporte='".$tipodecuenta."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function Abonosfinal(){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as Galones FROM reporte_abonos
where reporte_id_cuentaxpagar<>'0' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function Cxcfinalmaterial(){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3*cantidad),0) as Galones FROM reporte_ventas
where reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function AbonosfacturasMaterial(){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as Galones FROM reporte_abonos
where reporte_id_factura<>'0' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function Cxcfinalprestamos(){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as Galones FROM reporte_prestamos
where reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function Abonosfacturasequipos(){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as Galones FROM reporte_abonos
where reporte_id_prestamo<>'0' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}


 ?>