<?php 



function cotizacionesmaritimo(){
	$db = Db::getConnect();
	$mesactual = date("n");
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='MARITIMO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	$total = '0';
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}
	
function cotizacionesaereo(){
	$db = Db::getConnect();
	$mesactual = date("n");
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='AEREO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
	}
	
function cotizacionesterrestre(){
	$db = Db::getConnect();
	$mesactual = date("n");
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='TERRESTRE'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}
function cotizacionesaduana(){
	$db = Db::getConnect();
	$mesactual = date("n");
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='ADUANA'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function cotizacionesalmacenamiento(){
	$db = Db::getConnect();
	$mesactual = date("n");
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='ALMACENAMIENTO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}
 
function cotizacionesproyectos(){
	$db = Db::getConnect();
	$mesactual = date("n");
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='PROYECTOS'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}
 
function cotizacionescontainer(){
	$db = Db::getConnect();
	$mesactual = date("n");
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='CONTAINER'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

function cotizacionesseguros(){
	$db = Db::getConnect();
	$mesactual = date("n");
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='SEGUROS'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}


function sinleermes(){
	$db = Db::getConnect();
	$mesactual = date("n");
	//DEVUELVE LAS COTIZACIONES SIN LEER DEL MES ACTUAL DE MARITIMO
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='MARITIMO' and status='SIN LEER'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$maritimo = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES SIN LEER DEL MES ACTUAL DE AEREO
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='AEREO' and status='SIN LEER'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$aereo = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES SIN LEER DEL MES ACTUAL DE TERRESTRE
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='TERRESTRE' and status='SIN LEER'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$terrestre = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES SIN LEER DEL MES ACTUAL DE ADUANA
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='ADUANA' and status='SIN LEER'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$aduana = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES SIN LEER DEL MES ACTUAL DE ALMACENAMIENTO
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='ALMACENAMIENTO' and status='SIN LEER'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$almacenamiento = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES SIN LEER DEL MES ACTUAL DE PROYECTOS
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='PROYECTOS' and status='SIN LEER'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$proyectos = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES SIN LEER DEL MES ACTUAL DE CONTAINER
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='CONTAINER' and status='SIN LEER'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$container = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES SIN LEER DEL MES ACTUAL DE SEGUROS
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='SEGUROS' and status='SIN LEER'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$seguros = $campo['totales'];
		}

	return array($maritimo,$aereo,$terrestre,$aduana,$almacenamiento,$proyectos,$container,$seguros);
}



function leidomes(){
	$db = Db::getConnect();
	$mesactual = date("n");
	//DEVUELVE LAS COTIZACIONES LEIDO DEL MES ACTUAL DE MARITIMO
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='MARITIMO' and status='LEIDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$maritimo = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES LEIDO DEL MES ACTUAL DE AEREO
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='AEREO' and status='LEIDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$aereo = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES LEIDO DEL MES ACTUAL DE TERRESTRE
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='TERRESTRE' and status='LEIDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$terrestre = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES LEIDO DEL MES ACTUAL DE ADUANA
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='ADUANA' and status='LEIDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$aduana = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES LEIDO DEL MES ACTUAL DE ALMACENAMIENTO
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='ALMACENAMIENTO' and status='LEIDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$almacenamiento = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES LEIDO DEL MES ACTUAL DE PROYECTOS
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='PROYECTOS' and status='LEIDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$proyectos = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES LEIDO DEL MES ACTUAL DE CONTAINER
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='CONTAINER' and status='LEIDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$container = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES LEIDO DEL MES ACTUAL DE SEGUROS
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='SEGUROS' and status='LEIDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$seguros = $campo['totales'];
		}

	return array($maritimo,$aereo,$terrestre,$aduana,$almacenamiento,$proyectos,$container,$seguros);
}




function procesadomes(){
	$db = Db::getConnect();
	$mesactual = date("n");
	//DEVUELVE LAS COTIZACIONES PROCESANDO DEL MES ACTUAL DE MARITIMO
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='MARITIMO' and status='PROCESANDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$maritimo = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES PROCESANDO DEL MES ACTUAL DE AEREO
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='AEREO' and status='PROCESANDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$aereo = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES PROCESANDO DEL MES ACTUAL DE TERRESTRE
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='TERRESTRE' and status='PROCESANDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$terrestre = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES PROCESANDO DEL MES ACTUAL DE ADUANA
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='ADUANA' and status='PROCESANDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$aduana = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES PROCESANDO DEL MES ACTUAL DE ALMACENAMIENTO
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='ALMACENAMIENTO' and status='PROCESANDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$almacenamiento = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES PROCESANDO DEL MES ACTUAL DE PROYECTOS
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='PROYECTOS' and status='PROCESANDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$proyectos = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES PROCESANDO DEL MES ACTUAL DE CONTAINER
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='CONTAINER' and status='PROCESANDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$container = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES PROCESANDO DEL MES ACTUAL DE SEGUROS
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='SEGUROS' and status='PROCESANDO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$seguros = $campo['totales'];
		}

	return array($maritimo,$aereo,$terrestre,$aduana,$almacenamiento,$proyectos,$container,$seguros);
}




function cotizadomes(){
	$db = Db::getConnect();
	$mesactual = date("n");
	//DEVUELVE LAS COTIZACIONES COTIZADO DEL MES ACTUAL DE MARITIMO
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='MARITIMO' and status='COTIZADO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$maritimo = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES COTIZADO DEL MES ACTUAL DE AEREO
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='AEREO' and status='COTIZADO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$aereo = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES COTIZADO DEL MES ACTUAL DE TERRESTRE
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='TERRESTRE' and status='COTIZADO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$terrestre = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES COTIZADO DEL MES ACTUAL DE ADUANA
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='ADUANA' and status='COTIZADO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$aduana = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES COTIZADO DEL MES ACTUAL DE ALMACENAMIENTO
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='ALMACENAMIENTO' and status='COTIZADO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$almacenamiento = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES COTIZADO DEL MES ACTUAL DE PROYECTOS
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='PROYECTOS' and status='COTIZADO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$proyectos = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES COTIZADO DEL MES ACTUAL DE CONTAINER
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='CONTAINER' and status='COTIZADO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$container = $campo['totales'];
		}
	//DEVUELVE LAS COTIZACIONES COTIZADO DEL MES ACTUAL DE SEGUROS
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."' and tipo_servicio='SEGUROS' and status='COTIZADO'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$seguros = $campo['totales'];
		}

	return array($maritimo,$aereo,$terrestre,$aduana,$almacenamiento,$proyectos,$container,$seguros);
}




//OBTENER PQRS DEL MES ACTUAL
function pqrstotalmes(){
	$db = Db::getConnect();
	$mesactual = date("n");
	$select = $db->prepare("SELECT count(*) as totales FROM pqrs WHERE MONTH(fecha_solicitud)='".$mesactual."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

//OBTENER contacto DEL MES ACTUAL
function contactototalmes(){
	$db = Db::getConnect();
	$mesactual = date("n");
	$select = $db->prepare("SELECT count(*) as totales FROM contacto WHERE MONTH(fecha)='".$mesactual."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}

//OBTENER cotizaciones DEL MES ACTUAL
function cotizacionestotalmes(){
	$db = Db::getConnect();
	$mesactual = date("n");
	$select = $db->prepare("SELECT count(*) as totales FROM cotizar WHERE MONTH(fecha_solicitud)='".$mesactual."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$total = $campo['totales'];
		}
	return $total;
}


//OBTENER PQRS POR MOTIVO DEL MES ACTUAL
function pqrsmotivomes(){
	$db = Db::getConnect();
	$mesactual = date("n");
	//MOTIVO PETICION
	$select = $db->prepare("SELECT count(*) as totales FROM pqrs WHERE MONTH(fecha_solicitud)='".$mesactual."' and motivo='Peticion'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$peticion = $campo['totales'];
		}
	//MOTIVO QUEJA
	$select = $db->prepare("SELECT count(*) as totales FROM pqrs WHERE MONTH(fecha_solicitud)='".$mesactual."' and motivo='Queja'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$queja = $campo['totales'];
		}
	//MOTIVO RECLAMO
	$select = $db->prepare("SELECT count(*) as totales FROM pqrs WHERE MONTH(fecha_solicitud)='".$mesactual."' and motivo='Reclamo'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$reclamo = $campo['totales'];
		}
	
	return array($peticion,$queja,$reclamo);
}

