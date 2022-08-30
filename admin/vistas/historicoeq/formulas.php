<?php 


function KilometrajeVolqueta($idequipo,$anoactual){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(hora_inactiva),0) as Total FROM reporte_horas
where reporte_publicado='1' and equipo_id_equipo='".$idequipo."' and YEAR(fecha_reporte)='".$anoactual."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}

function HorometroEquipo($idequipo,$anoactual){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(hora_inactiva),0) as Total FROM reporte_horasmq
where reporte_publicado='1' and equipo_id_equipo='".$idequipo."' and YEAR(fecha_reporte)='".$anoactual."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}

function ConsumoCombustible($idequipo,$anoactual){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_combustibles WHERE reporte_publicado='1' and equipo_id_equipo='".$idequipo."' and YEAR(fecha_reporte)='".$anoactual."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}



function Ultimoproyectomaq($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT proyecto_id_proyecto FROM reporte_horasmq WHERE equipo_id_equipo='".$equipo."' ORDER BY id DESC LIMIT 1";
	$select = $db->prepare($sql);
	//echo ($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['proyecto_id_proyecto'];
		}
	return $total;
	}

function Ultimoclientevolqueta($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT cliente_id_cliente FROM reporte_despachosclientes WHERE equipo_id_equipo='".$equipo."' ORDER BY id DESC LIMIT 1";
	$select = $db->prepare($sql);
	//echo ($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['cliente_id_cliente'];
		}
	return $total;
	}

function Ultimoclientemaq($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT cliente_id_cliente FROM reporte_horasmq WHERE equipo_id_equipo='".$equipo."' ORDER BY id DESC LIMIT 1";
	$select = $db->prepare($sql);
	//echo ($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['cliente_id_cliente'];
		}
	return $total;
	}

function ReporteHoraspor($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(hora_inactiva),0) as totales FROM reporte_horasmq WHERE  equipo_id_equipo='".$equipo."' and reporte_publicado='1' and fecha_reporte>'2022-07-19'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function ReporteKilometrospor($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(hora_inactiva),0) as totales FROM reporte_horas WHERE  equipo_id_equipo='".$equipo."' and reporte_publicado='1' and fecha_reporte>'2022-07-19'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
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

function HorasDiarioEquipo($FechaStart,$FechaEnd,$equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(hora_inactiva),0) as totales FROM reporte_horasmq WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and  equipo_id_equipo='".$equipo."' and reporte_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Acpmediarioequipo($FechaStart,$FechaEnd,$idequipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_combustibles WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$idequipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
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

function FacturacionDiaTotalEquipos($FechaStart,$FechaEnd,$idequipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3*hora_inactiva),0) as Total FROM reporte_horasmq
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$idequipo."'");
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

function Facturacionvolquetames($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3),0) as totales FROM reporte_despachosclientes
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Facturacionhorasmqporfecha($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT IFNULL(sum(hora_inactiva*valor_m3),0) as totales FROM reporte_horasmq
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'";
//echo($sql);
	$select = $db->prepare($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function metroscubicosvolquetames($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_despachosclientes
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Facturacionpromediovolquetames($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_m3+valor_material),0)/COUNT(DISTINCT fecha_reporte) as totales FROM reporte_despachosclientes
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Facturacionpromediomaquinames($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(hora_inactiva*valor_m3),0)/COUNT(DISTINCT fecha_reporte) as totales FROM reporte_horasmq
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Totalhorasmqporfecha($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT IFNULL(sum(hora_inactiva),0) as totales FROM reporte_horasmq
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'";
//echo($sql);
	$select = $db->prepare($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Totalmaximoporfecha($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT MAX(hora_inactiva) as totales FROM reporte_horasmq
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'";
//echo($sql);
	$select = $db->prepare($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Totalpromedioporfecha($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT AVG(hora_inactiva) as totales FROM reporte_horasmq
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'";
//echo($sql);
	$select = $db->prepare($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function CM_Volquetapormes($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(valor_egreso),0) as totales FROM egresos_caja WHERE YEAR(fecha_egreso)='".$ano."' and MONTH(fecha_egreso)='".$mes."' and egreso_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function Insumosvolquetapormes($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT IFNULL(sum(valor_salida),0) as Salidas FROM salidas_ins WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and equipo_id_equipo='".$equipo."'";
	$select = $db->prepare($sql);
	//echo($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$Salidas = $campo['Salidas'];
		}
	return $Salidas;
	}

function Comisionvolquetapormes($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(A.valor_m3*B.comision/100),0) as totales FROM reporte_despachosclientes as A, equipos as B
where YEAR(A.fecha_reporte)='".$ano."' and MONTH(A.fecha_reporte)='".$mes."' and reporte_publicado='1' and A.equipo_id_equipo=B.id_equipo and A.equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

function AcpmfechaVolquetames($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT IFNULL(sum(cantidad*valor_m3),0) as Galones FROM reporte_combustibles
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'";
	$select = $db->prepare($sql);
	//echo ($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function KilometrajeMesVolqueta($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(hora_inactiva),0) as Total FROM reporte_horas
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}

function Viajesvolquetames($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(remision) as totales FROM reporte_despachosclientes
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

	function Diaslaboradosvolquetames($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(DISTINCT fecha_reporte) as totales FROM reporte_horas
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."' and hora_inactiva>'0'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}

		function Diaslaboradosmaquinames($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(DISTINCT fecha_reporte) as totales FROM reporte_horasmq
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."' and hora_inactiva>'0'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
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
	$sql="SELECT fecha_reporte FROM reporte_estado_equipos WHERE equipo_id_equipo='".$equipo."' ORDER BY id DESC LIMIT 1";
	$select = $db->prepare($sql);
	//echo ($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['fecha_reporte'];
		}
	return $total;
	}

function UltimoMarcaEstadoEquipo($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT marca_temporal FROM reporte_estado_equipos WHERE equipo_id_equipo='".$equipo."' ORDER BY id DESC LIMIT 1";
	$select = $db->prepare($sql);
	//echo ($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['marca_temporal'];
		}
	return $total;
	}

function Ultimoproyectovolqueta($equipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT id_destino_destino FROM reporte_despachosclientes WHERE equipo_id_equipo='".$equipo."' ORDER BY id DESC LIMIT 1";
	$select = $db->prepare($sql);
	//echo ($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['id_destino_destino'];
		}
	return $total;
	}

	function AcpmconteoEquipo($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT COUNT(cantidad) as Galones FROM reporte_combustibles
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'";
	$select = $db->prepare($sql);
	//echo ($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}


function AcpmpromediotanqueoEquipo($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT AVG(cantidad) as Galones FROM reporte_combustibles
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'";
	$select = $db->prepare($sql);
	//echo ($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}

function AcpmmesEquipo($equipo,$mes,$ano){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Galones FROM reporte_combustibles
where YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and equipo_id_equipo='".$equipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Galones'];
		}
	return $total;
	}


function ContadorFallas($FechaStart,$FechaEnd,$idequipo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(id_reporte) as Total FROM reporte_equipos
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and equipo_id_equipo='".$idequipo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['Total'];
		}
	return $total;
	}





 ?>