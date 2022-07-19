<?php 

function EntradasInsumo($insumo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Entradas FROM detalle_entrada_ins WHERE insumo_id='".$insumo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$Entradas = $campo['Entradas'];
		}
	return $Entradas;
	}

function SalidasInsumo($insumo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT IFNULL(sum(cantidad),0) as Salidas FROM detalle_salida_ins WHERE insumo_id='".$insumo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$Salidas = $campo['Salidas'];
		}
	return $Salidas;
	}



function SumaCotSolicitados($proveedor,$estado){
	$db = Db::getConnect();
	$select = $db->prepare("SELECT IFNULL(sum(cantidadcot),0) as TotalSolicitado FROM cotizaciones_item WHERE proveedor_id_proveedor='".$proveedor."' and estado_cotizacion='".$estado."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$TotalSolicitado = $campo['TotalSolicitado'];
		}
	return $TotalSolicitado;
	}

function Cotizacionesporcantdeinsumos($item,$requisicion,$insumo,$estado){
	$db = Db::getConnect();
	$sql="SELECT IFNULL(sum(cantidadcot),0) as TotalSolicitado FROM cotizaciones_item WHERE item_id='".$item."' and requisicion_id='".$requisicion."' and insumo_id_insumo='".$insumo."' and estado_cotizacion='".$estado."'";
	//echo ($sql);
	$select = $db->prepare($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$TotalSolicitado = $campo['TotalSolicitado'];
		}
	return $TotalSolicitado;
	}

function Cotizacionesporcantdeservicios($item,$requisicion,$servicio,$estado){
	$db = Db::getConnect();
	$sql="SELECT IFNULL(sum(cantidadcot),0) as TotalSolicitado FROM cotizaciones_item WHERE item_id='".$item."' and requisicion_id='".$requisicion."' and servicio_id_servicio='".$servicio."' and estado_cotizacion='".$estado."'";
	//echo ($sql);
	$select = $db->prepare($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$TotalSolicitado = $campo['TotalSolicitado'];
		}
	return $TotalSolicitado;
	}



function Cotizacionesporcantdeequipos($item,$requisicion,$equipo,$estado){
	$db = Db::getConnect();
	$sql="SELECT IFNULL(sum(cantidadcot),0) as TotalSolicitado FROM cotizaciones_item WHERE item_id='".$item."' and requisicion_id='".$requisicion."' and equipo_id_equipo='".$equipo."' and estado_cotizacion='".$estado."'";
	//echo ($sql);
	$select = $db->prepare($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$TotalSolicitado = $campo['TotalSolicitado'];
		}
	return $TotalSolicitado;
	}


function Valorpromedioinsumo($insumo_id_insumo,$rqprincipal,$despachounico){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT vr_unitario FROM cotizaciones_item WHERE insumo_id_insumo='".$insumo_id_insumo."' and requisicion_id='".$rqprincipal."' and item_id='".$despachounico."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$valorpromedio = $campo['vr_unitario'];
		}
	return $valorpromedio;
	}

function Valormaximoinsumo($insumo_id_insumo){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT MAX(vr_unitario) as resultado FROM cotizaciones_item WHERE insumo_id_insumo='".$insumo_id_insumo."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$valorpromedio = $campo['resultado'];
		}
	return $valorpromedio;
	}

function ObtenerTipoReq($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT tipo_requisicion FROM requisiciones WHERE id='".$id."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$tipo_requisicion = $campo['tipo_requisicion'];
		}
	return $tipo_requisicion;
	}
	
function ObteneritemsRQ($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT id FROM requisiciones_items WHERE requisicion_id='".$id."'";
	$select = $db->prepare($sql);
	//echo($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$itemsrq=$itemsrq.$campo['id'].",";
		}
	return $itemsrq;
	}

function ObtenerPublicadoReq($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT requisicion_publicada FROM requisiciones WHERE id='".$id."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$requisicion_publicada = $campo['requisicion_publicada'];
		}
	return $requisicion_publicada;
	}


function ObtenerIdReq($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT requisicion_id FROM requisiciones_items WHERE id='".$id."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$requisicion_id = $campo['requisicion_id'];
		}
	return $requisicion_id;
	}

function ObtenerMediopago($proveedor,$estado){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT medio_pago FROM cotizaciones_item WHERE proveedor_id_proveedor='".$proveedor."' and estado_cotizacion='".$estado."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$medio_pago = $campo['medio_pago'];
		}
	return $medio_pago;
	}

function SubtotalProveedor($proveedor,$estado){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT SUM(valor_cot) as subtotal FROM cotizaciones_item WHERE proveedor_id_proveedor='".$proveedor."' and estado_cotizacion='".$estado."'";
	//echo($sql);
	$select = $db->prepare($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$subtotal = $campo['subtotal'];
		}
	return $subtotal;
	}

function proveedorcot($id,$cotizacion){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT proveedor_id_proveedor FROM cotizaciones_item WHERE item_id='".$id."' and cotizacion='".$cotizacion."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$proveedor_id_proveedor = $campo['proveedor_id_proveedor'];
		}
	return $proveedor_id_proveedor;
	}

function imagencot($id,$cotizacion){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT imagen FROM cotizaciones_item WHERE item_id='".$id."' and cotizacion='".$cotizacion."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$imagen = $campo['imagen'];
		}
	return $imagen;
	}

function idcot($id,$cotizacion){
	$db = Db::getConnect();
	$sql="SELECT id FROM cotizaciones_item WHERE item_id='".$id."' and cotizacion='".$cotizacion."'";
	//echo($sql);
	$select = $db->prepare($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$idcot = $campo['id'];
		}
	return $idcot;
	}

function pagocot($id,$cotizacion){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$sql="SELECT medio_pago FROM cotizaciones_item WHERE item_id='".$id."' and cotizacion='".$cotizacion."'";
	//echo($sql);
	$select = $db->prepare($sql);
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$medio_pagocot = $campo['medio_pago'];
		}
	return $medio_pagocot;
	}

function valorcot($id,$cotizacion){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT valor_cot FROM cotizaciones_item WHERE item_id='".$id."' and cotizacion='".$cotizacion."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$valor_cot = $campo['valor_cot'];
		}
	return $valor_cot;
	}



function ObtenerIdInsumo($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT insumo_id_insumo FROM requisiciones_items WHERE id='".$id."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$insumo_id_insumo = $campo['insumo_id_insumo'];
		}
	return $insumo_id_insumo;
	}

function ObtenerCantidadSolicitada($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT cantidad FROM requisiciones_items WHERE id='".$id."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$cantidad = $campo['cantidad'];
		}
	return $cantidad;
	}

function ObtenerIdServicio($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT servicio_id_servicio FROM requisiciones_items WHERE id='".$id."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$servicio_id_servicio = $campo['servicio_id_servicio'];
		}
	return $servicio_id_servicio;
	}

function ObtenerIdEquipo($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT equipo_id_equipo FROM requisiciones_items WHERE id='".$id."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$equipo_id_equipo = $campo['equipo_id_equipo'];
		}
	return $equipo_id_equipo;
	}


function contarregistros($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(id) as totalitems FROM requisiciones_items WHERE requisicion_id='".$id."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$totalitems = $campo['totalitems'];
		}
	return $totalitems;
	}

function contarregistrosporestado($id,$usuario){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(id) as totalitems FROM requisiciones_items WHERE estado_item='".$id."' and usuario_creador='".$usuario."' and item_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$totalitems = $campo['totalitems'];
		}
	return $totalitems;
	}

function contarregistrospararecibir($estado,$usuario){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(id_salida_ins) as totalitems FROM salidas_ins WHERE estado_salida='".$estado."' and recibido_por='".$usuario."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$totalitems = $campo['totalitems'];
		}
	return $totalitems;
	}

function contarregistrosporestadototal($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(id) as totalitems FROM requisiciones_items WHERE estado_item='".$id."' and item_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$totalitems = $campo['totalitems'];
		}
	return $totalitems;
	}

function contarregistrosporusuario($usuario){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(id) as totalreq FROM requisiciones WHERE estado_id_requisicion<>'0' and usuario_creador='".$usuario."' and item_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$totalreq = $campo['totalreq'];
		}
	return $totalreq;
	}


function contarregistrosporestadoadmin($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(id) as totalitems FROM requisiciones_items WHERE estado_item='".$id."' and item_publicado='1'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$totalitems = $campo['totalitems'];
		}
	return $totalitems;
	}

function contarcomentarios($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(id) as totalitems FROM trazabilidad_items WHERE item_id='".$id."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$totalitems = $campo['totalitems'];
		}
	return $totalitems;
	}

function obtenerultimoidreq(){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT id FROM requisiciones ORDER BY id DESC LIMIT 1");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$ultimo = $campo['id']+1;
		}
	return $ultimo;
	}

function contaritemsporrq($id){
	$db = Db::getConnect();
	//$mesactual = date("n");
	$select = $db->prepare("SELECT COUNT(id) as totalitems FROM requisiciones_items WHERE estado_item<>'1' and requisicion_id='".$id."'");
	$select->execute();
	$valor = $select->fetchAll(); 
	foreach($valor as $campo){
		$totalitems = $campo['totalitems'];
		}
	return $totalitems;
	}




 ?>