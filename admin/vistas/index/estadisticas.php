<?php 
// GESTIÓN DOCUMENTAL CUENTAS/ EQUIPOS  
function totaldocumentosCuentas(){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM documentos WHERE modulo_id_modulo='1' and estado_documento='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}


// GESTIÓN DOCUMENTAL CUENTAS/ EQUIPOS  
function totaldocumentosFolder($idfolder,$cuenta){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM documentos_varios WHERE id_folder='".$idfolder."' and estado_midocumento='1' and midocumento_publicado='1' and cuenta_id_cuenta='".$cuenta."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

// GESTIÓN DOCUMENTAL CUENTAS/ EQUIPOS  
function totaldocumentosFolderemp($idfolder,$cuenta){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM documentos_variosemp WHERE id_folder='".$idfolder."' and estado_midocumento='1' and midocumento_publicado='1' and cuenta_id_cuenta='".$cuenta."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function totaldocumentosEquipos(){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM documentos WHERE modulo_id_modulo='2' and estado_documento='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function totaldocumentosEmpleados(){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM documentos WHERE modulo_id_modulo='3' and estado_documento='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function totaldocumentosModulo($id){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM documentos WHERE modulo_id_modulo='".$id."' and estado_documento='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

//*************************************************/////////////////*********************************///

function totaldocumentosCuentasNA($cuenta){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM gestion_documental WHERE modulo_id_modulo='1' and cuenta_id_cuenta='".$cuenta."' and imagen='No-Aplica'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function totaldocumentosEquiposNA($equipo){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM gestion_documentaleq WHERE modulo_id_modulo='2' and cuenta_id_cuenta='".$equipo."' and imagen='No-Aplica'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function totaldocumentosEmpleadosNA($equipo){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM gestion_documentalemp WHERE modulo_id_modulo='3' and cuenta_id_cuenta='".$equipo."' and imagen='No-Aplica'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function totaldocumentosNA($equipo,$modulo){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM gestion_documentalemp WHERE modulo_id_modulo='".$modulo."' and cuenta_id_cuenta='".$equipo."' and imagen='No-Aplica'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

//*************************************************/////////////////*********************************///

function totaldocumentosCuentasUpload($cuenta){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM gestion_documental WHERE modulo_id_modulo='1' and cuenta_id_cuenta='".$cuenta."' and alerta<>''");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function totaldocumentosEquiposUpload($equipo){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM gestion_documentaleq WHERE modulo_id_modulo='2' and cuenta_id_cuenta='".$equipo."' and alerta<>''");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function totaldocumentosEmpleadosUpload($equipo){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM gestion_documentalemp WHERE modulo_id_modulo='3' and cuenta_id_cuenta='".$equipo."' and alerta<>''");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function totaldocumentosProvUpload($equipo,$modulo){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM gestion_documentalprov WHERE modulo_id_modulo='".$modulo."' and cuenta_id_cuenta='".$equipo."' and alerta<>''");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

//*************************************************/////////////////*********************************///

function totaldocumentosVarios($cuenta){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM documentos_varios WHERE cuenta_id_cuenta='".$cuenta."' and midocumento_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function totaldocumentosVarioseq($equipo){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM documentos_varioseq WHERE cuenta_id_cuenta='".$equipo."' and midocumento_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function totaldocumentosVariosProv($equipo){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM documentos_variosprov WHERE cuenta_id_cuenta='".$equipo."' and midocumento_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function totaldocumentosVariosemp($equipo){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT count(*) as totales FROM documentos_variosemp WHERE cuenta_id_cuenta='".$equipo."' and midocumento_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

// GRAFICA REPORTE DE EQUIPOS MENSUAL

function ReportemensualEqNumTb($equipo,$mes){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT sum(num_trabajado) as totales FROM reporte_equipos WHERE MONTH(fecha_reporte)='".$mes."' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function ReportemensualEqDiasTb($equipo,$mes){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT sum(dias_trabajados) as totales FROM reporte_equipos WHERE MONTH(fecha_reporte)='".$mes."' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}
function ReportemensualEqGalones($equipo,$mes){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT sum(num_galones) as totales FROM reporte_equipos WHERE MONTH(fecha_reporte)='".$mes."' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


// GRAFICA REPORTE DE EQUIPOS CONSOLIDADO

function ReporteEqNumTb($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(num_trabajado),0) as totales FROM reporte_equipos WHERE equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function ReporteViajesxequipo($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(viajes),0) as totales FROM reporte_despachosclientes WHERE equipo_id_equipo='".$equipo."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Reportem3xequipo($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_despachosclientes WHERE equipo_id_equipo='".$equipo."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function cubicajemaximo($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT MAX(cantidad) as totales FROM reporte_despachosclientes WHERE equipo_id_equipo='".$equipo."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function cubicajeminimo($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT MIN(cantidad) as totales FROM reporte_despachosclientes WHERE equipo_id_equipo='".$equipo."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function cubicajepromedio($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT AVG(cantidad) as totales FROM reporte_despachosclientes WHERE equipo_id_equipo='".$equipo."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function ReporteEqDiasTb($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(dias_trabajados),0) as totales FROM reporte_equipos WHERE  equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}
function ReporteEqGalones($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(num_galones),0) as totales FROM reporte_equipos WHERE  equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function ConsumoGalonespor($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_combustibles WHERE  equipo_id_equipo='".$equipo."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}
function ReporteHorasKmpor($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(hora_inactiva),0) as totales FROM reporte_horas WHERE  equipo_id_equipo='".$equipo."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function ReporteEqCombustible($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_combustible),0) as totales FROM reporte_equipos WHERE  equipo_id_equipo='".$equipo."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

// GRAFICA REPORTE DE EQUIPOS CONSOLIDADO POR FECHA

function ReporteEqNumTbFecha($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(num_trabajado),0) as totales FROM reporte_equipos WHERE equipo_id_equipo='".$equipo."' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function ReporteEqDiasTbFecha($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(dias_trabajados),0) as totales FROM reporte_equipos WHERE  equipo_id_equipo='".$equipo."' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}
function ReporteEqGalonesFecha($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(num_galones),0) as totales FROM reporte_equipos WHERE  equipo_id_equipo='".$equipo."' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function ReporteEqCombustibleFecha($equipo,$FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_combustible),0) as totales FROM reporte_equipos WHERE  equipo_id_equipo='".$equipo."' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalVentasCliente($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_ventas WHERE  cliente_id_cliente='".$id."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalPrestamosCliente($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as totales FROM reporte_prestamos WHERE  cliente_id_cliente='".$id."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


//***************************************************************************************************************
//***************************************************************************************************************
//**************************  PRIMER TABLA DESPUÉS DE LA GRÁFICA  ***********************************************
//***************************************************************************************************************

//**************************  1. FILA-VENTAS  ***********************************************
function TotalVentasMes($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_ventas WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and producto_id_producto<>'11'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalVentasMesEq($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as totales FROM reporte_prestamos WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

//**************************  2. FILA-COMPRAS  ***********************************************
function TotalComprasMes($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_compras WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_reporte='1' and insumo_id_insumo<>'21'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

//**************************  3. FILA-CXC MATERIALES  ***********************************************

function TotalCxcMes($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_ventas WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and estado_pago='Cxc' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalCxcMesEq($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as totales FROM reporte_prestamos WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and estado_pago='Cxc' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalAbonosMes($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as totales FROM reporte_abonos WHERE MONTH(fecha_abono)='".$mes."' and YEAR(fecha_abono)='".$ano."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

//**************************  4. FILA-CXP   ***********************************************
function TotalComprascreMes($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_compras WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_reporte='2'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}	

//**************************  5. FILA-CANTIDAD VENTAS   ***********************************************

function TotalFrecuenciaMes($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(cliente_id_cliente) as totales FROM reporte_ventas WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' group by cliente_id_cliente");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total=$total.$campo['totales'].",";
		}
	return $total;
	}

//**************************  6. VENTAS PROMEDIO   ***********************************************

function TotalPromedioVentaMes($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT AVG(cantidad*valor_m3) as totales FROM reporte_ventas WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

//**************************  7. VENTAS/CDV   ***********************************************



function TotalVentasEqMes($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as totales FROM reporte_prestamos WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_pago='Contado'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}






function TotalVentasEqMescxc($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as totales FROM reporte_prestamos WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_pago='Cxc'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}



function TotalVentasMescxc($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_ventas WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_pago='Cxc'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalVentasMesProducto($mes,$ano,$producto){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_ventas WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and producto_id_producto='".$producto."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalVentasMesEquipo($mes,$ano,$equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as totales FROM reporte_prestamos WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."' and estado_pago='Contado'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalVentasMesProductocxc($mes,$ano,$producto){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_ventas WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and producto_id_producto='".$producto."' and estado_pago='Cxc'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalVentasMesEquipocxc($mes,$ano,$equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as totales FROM reporte_prestamos WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."' and estado_pago='Cxc'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalVentasAnoProducto($ano,$producto){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_ventas WHERE YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and producto_id_producto='".$producto."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalVentasAnoProductoEq($ano,$equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as totales FROM reporte_prestamos WHERE YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalVentasAnoProductoEqcxc($ano,$equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as totales FROM reporte_prestamos WHERE YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."' and estado_pago='Cxc'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalVentasAnoProductocxc($ano,$producto){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_ventas WHERE YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and producto_id_producto='".$producto."' and estado_pago='Cxc'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function CantidadVentasProducto($producto){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_ventas WHERE reporte_publicado='1' and producto_id_producto='".$producto."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function CantidadDespachosProducto($producto){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_despachos WHERE reporte_publicado='1' and producto_id_producto='".$producto."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}






function TotalCuentasxpagarMes($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_compras WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_reporte='2'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function TotalCuentasxcobrarMesMt($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_ventas WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_pago='Cxc'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalCuentasxcobrarMesEq($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as totales FROM reporte_prestamos WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_pago='Cxc'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}






function TotalComprasAnoInsumo($ano,$insumo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_compras WHERE YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_reporte='1' and insumo_id_insumo='".$insumo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function TotalCuentasxpagarAnoInsumo($ano,$insumo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_compras WHERE YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_reporte='2' and insumo_id_insumo='".$insumo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function TotalComprasInsumo($insumo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_compras WHERE reporte_publicado='1' and insumo_id_insumo='".$insumo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalComprasMesProducto($mes,$ano,$insumo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_compras WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1'  and estado_reporte='1' and insumo_id_insumo='".$insumo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalCuentasxpagarMesProducto($mes,$ano,$insumo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_compras WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_reporte='2' and insumo_id_insumo='".$insumo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalCuentasxcobrarMesProducto($mes,$ano,$cliente){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_ventas WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_pago='Cxc' and cliente_id_cliente='".$cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalCuentasxcobrarMesEquipos($mes,$ano,$cliente){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_prestamo),0) as totales FROM reporte_prestamos WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and estado_pago='Cxc' and cliente_id_cliente='".$cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function obtenerAbonosPor($id,$tipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	if ($tipo=="Venta_Material") {
		$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as totales FROM reporte_abonos WHERE reporte_id_factura='".$id."'");
	}
	elseif ($tipo=="Venta_Equipos") {
		$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as totales FROM reporte_abonos WHERE reporte_id_prestamo='".$id."'");
	}
	elseif ($tipo=="Cuenta_x_pagar") {
		$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as totales FROM reporte_abonos WHERE reporte_id_cuentaxpagar='".$id."'");
	}
	

	
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalFacturasCliente($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_total),0) as totales FROM reporte_facturas WHERE  cliente_id_cliente='".$id."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Totaldespachosporfactura($numfactura){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(reporteventa_id) as totales FROM ventas_despachos WHERE  reporteventa_id='".$numfactura."' and estado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function TotalAbonosCliente($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as totales FROM reporte_abonos WHERE  cliente_id_cliente='".$id."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function TotalDespachosCliente($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT  IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_despachos WHERE  cliente_id_cliente='".$id."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function TotalCuentasxcobrarAno($ano,$cliente){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$consulta="SELECT IFNULL(sum(cantidad*valor_m3),0) as totales FROM reporte_ventas WHERE reporte_publicado='1' and estado_pago='Cxc'  and cliente_id_cliente='".$cliente."'";
	$select = $db->prepare($consulta);
	//echo($consulta);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function VerificacionReportefacturas($cliente){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT cliente_id_cliente FROM reporte_ventas WHERE reporte_publicado='1'  and cliente_id_cliente='".$cliente."' and estado_pago='Cxc'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['cliente_id_cliente'];
		}
	return $total;
	}

function VerificacionReporteprestamos($cliente){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT cliente_id_cliente FROM reporte_prestamos WHERE reporte_publicado='1'  and cliente_id_cliente='".$cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['cliente_id_cliente'];
		}
	return $total;
	}


function TotalCuentasxcobrarAnoEquipo($ano,$cliente){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$consulta="SELECT IFNULL(sum(valor_prestamo),0) as totales FROM reporte_prestamos WHERE reporte_publicado='1'  and cliente_id_cliente='".$cliente."' and estado_pago='Cxc'";
	//echo($consulta);
	$select = $db->prepare($consulta);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalAbonosxcobrarAno($ano,$cliente){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as totales FROM reporte_abonos WHERE YEAR(fecha_abono)='".$ano."' and reporte_publicado='1'  and cliente_id_cliente='".$cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalAbonosxcobrarAnoEquipo($ano,$cliente){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as totales FROM reporte_abonos WHERE YEAR(fecha_abono)='".$ano."' and reporte_publicado='1'  and cliente_id_cliente='".$cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}


function TotalCuentasxcobrarMesCliente($mes,$ano,$cliente){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_total),0) as totales FROM reporte_facturas WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and cliente_id_cliente='".$cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalAbonosMesCliente($mes,$ano,$cliente){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_abono),0) as totales FROM reporte_abonos WHERE MONTH(fecha_abono)='".$mes."' and YEAR(fecha_abono)='".$ano."' and reporte_publicado='1' and cliente_id_cliente='".$cliente."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalCuentasxcobrarMes($mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_total),0) as totales FROM reporte_facturas WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function ReporteCombustibledia($FechaStart,$FechaEnd){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_combustibles WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function gastomantenimientoporequipo($FechaStart,$FechaEnd,$equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$consulta="SELECT IFNULL(sum(valor_combustible),0) as totales FROM reporte_equipos WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'";
	$select = $db->prepare($consulta);
	//echo($consulta);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function TotalSalidasCantera(){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_combustibles WHERE reporte_publicado='1' and punto_despacho='Cantera 1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}



