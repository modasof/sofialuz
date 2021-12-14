<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/
class Compras
{
    private $id;
    private $campos; //devuelve todos los campos de la tabla

	function __construct($id,$campos)
	{
        $this->setId($id);
        $this->setCampos($campos);
	}
	/************************************************************************************
	** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA       ***
	/***********************************************************************************/
	//ESTABLECER Y OBTENER ID
	public function getId(){
		return $this->id;
	}
	public function setId($id){ //Establece el nuevo valor del campo
		$this->id = $id;
	}

	//ESTABLECER Y OBTENER LOS CAMPOS
	public function getCampos(){
		return $this->campos;
	}
	public function setCampos($campos){ //Establece el nuevo valor del campo
		$this->campos = $campos;
	}

	public static function ReporteDespachosOrderId(){
		try {
			$db=Db::getConnect();

			$select=$db->query("SELECT * FROM ordenescompra WHERE estado_orden<>'0' order by id DESC");
	    	$camposs=$select->fetchAll();
	    	$campos = new Compras('',$camposs);
			return $campos;
		}
		catch(PDOException $e) {
			echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
		}
	}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function todos(){
	try {
		$db=Db::getConnect();
		$sql="SELECT * FROM ordenescompra WHERE estado_orden<>'0' and compra_de='Insumos' and fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 60 DAY) AND CURDATE() order by fecha_reporte DESC";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function recibiroc(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM ordenescompra WHERE estado_orden<>'0' and compra_de='Insumos' and fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 60 DAY) AND CURDATE() order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function todosocservicios(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM ordenescompra WHERE estado_orden<>'0' and compra_de='Servicios'order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function todosocequipos(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM ordenescompra WHERE estado_orden<>'0' and compra_de='Equipos' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function verdetalle($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT A.id, A.proveedor_id_proveedor, A.cotizacion, A.medio_pago, A.item_id, A.valor_cot, A.requisicion_id, A.marca_temporal, A.usuario_creador, A.estado_cotizacion, A.ordencompra_num, B.insumo_id_insumo,B.cantidad,A.cantidadcot,A.vr_unitario FROM cotizaciones_item as A, requisiciones_items as B WHERE A.ordencompra_num='".$id."' and A.item_id=B.id order by id DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function porfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM ordenescompra WHERE estado_orden='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR **
INSERT INTO ordenescompra(id, imagen, fecha_reporte, valor_total, valor_retenciones, estado_orden, proveedor_id_proveedor, medio_pago, observaciones, marca_temporal, usuario_creador)
***************************************************************/
public static function guardar($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO ordenescompra VALUES (NULL,:imagen,:fecha_reporte,:valor_total,:valor_retenciones,:valor_iva,:estado_orden,:proveedor_id_proveedor,:medio_pago,:observaciones,:marca_temporal,:usuario_creador,:rubro_id,:subrubro_id,:vencimiento,:factura)');

		$V1=str_replace(".","",$valor_total);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$V11=str_replace(".","",$valor_retenciones);
		$V21=str_replace(" ", "", $V11);
		$valor_final1=str_replace("$", "", $V21);
		$valornumero1=(int) $valor_final1;

		$valor_iva=0;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		
		$insert->bindValue('imagen',utf8_decode($imagen));
		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('valor_total',utf8_decode($valornumero));
		$insert->bindValue('valor_retenciones',utf8_decode($valornumero1));
		$insert->bindValue('valor_iva',utf8_decode($valor_iva));
		$insert->bindValue('estado_orden',utf8_decode($estado_orden));
		$insert->bindValue('proveedor_id_proveedor',utf8_decode($proveedor_id_proveedor));
		$insert->bindValue('medio_pago',utf8_decode($medio_pago));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('usuario_creador',utf8_decode($usuario_creador));
		$insert->bindValue('rubro_id',utf8_decode($rubro_id));
		$insert->bindValue('subrubro_id',utf8_decode($subrubro_id));
		$insert->bindValue('vencimiento',utf8_decode($vencimiento));
		$insert->bindValue('factura',utf8_decode($factura));
		$insert->execute();
		
		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminarpor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE ordenescompra SET estado_orden='0' WHERE id='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminarpagotem($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM detalle_pagos_ordenescompra  WHERE compra_id='".$id."' and estado_pago='0'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function editarpor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM ordenescompra WHERE id='".$id."' and estado_orden<>'0'");
		$camposs=$select->fetchAll();
		$campos = new Compras('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
* id, imagen, fecha_reporte, valor_total, valor_retenciones, estado_orden, proveedor_id_proveedor, medio_pago, observaciones, marca_temporal, usuario_creador
********************************************************************/
public static function actualizar($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);


		$update=$db->prepare('UPDATE ordenescompra SET
								imagen=:imagen,
								imagen_cot=:imagen_cot,
								fecha_reporte=:fecha_reporte,
								valor_total=:valor_total,
								valor_retenciones=:valor_retenciones,
								valor_iva=:valor_iva,
								estado_orden=:estado_orden,
								proveedor_id_proveedor=:proveedor_id_proveedor,
								medio_pago=:medio_pago,
								observaciones=:observaciones,
								marca_temporal=:marca_temporal,
								usuario_creador=:usuario_creador,
								rubro_id=:rubro_id,
								subrubro_id=:subrubro_id,
								vencimiento=:vencimiento,
								factura=:factura
								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_total);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$V11=str_replace(".","",$valor_retenciones);
		$V21=str_replace(" ", "", $V11);
		$valor_final1=str_replace("$", "", $V21);
		$valornumero1=(int) $valor_final1;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$imagenfac=0;

		$update->bindValue('imagen',utf8_decode($imagenfac));
		$update->bindValue('imagen_cot',utf8_decode($imagen));
		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('valor_total',utf8_decode($valornumero));
		$update->bindValue('valor_retenciones',utf8_decode($valornumero1));
		$update->bindValue('valor_iva',utf8_decode($valor_iva));
		$update->bindValue('estado_orden',utf8_decode($estado_orden));
		$update->bindValue('proveedor_id_proveedor',utf8_decode($proveedor_id_proveedor));
		$update->bindValue('medio_pago',utf8_decode($medio_pago));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('usuario_creador',utf8_decode($usuario_creador));
		$update->bindValue('rubro_id',utf8_decode($rubro_id));
		$update->bindValue('subrubro_id',utf8_decode($subrubro_id));
		$update->bindValue('vencimiento',utf8_decode($vencimiento));
		$update->bindValue('factura',utf8_decode($factura));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR INGRESO DE PAGO DE ORDEN DE COMPRA **** 
***************************************************************/
public static function actualizarpago($id,$imagen,$valor_total,$valor_retenciones,$valor_iva,$estado_orden,$rubro_id,$subrubro_id){

		$V1=str_replace(".","",$valor_total);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$V11=str_replace(".","",$valor_retenciones);
		$V21=str_replace(" ", "", $V11);
		$valor_final1=str_replace("$", "", $V21);
		$valornumero1=(int) $valor_final1;

		$V12=str_replace(".","",$valor_iva);
		$V22=str_replace(" ", "", $V12);
		$valor_final2=str_replace("$", "", $V22);
		$valornumero2=(int) $valor_final2;


	try {
		$db=Db::getConnect();

		
	$select=$db->query("UPDATE ordenescompra SET imagen='".$imagen."', valor_total='".$valor_final."',valor_retenciones='".$valor_final1."', valor_iva='".$valor_final2."',estado_orden='".$estado_orden."', rubro_id='".$rubro_id."', subrubro_id='".$subrubro_id."' WHERE id='".$id."' ");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR INGRESO DE PAGO DE ORDEN DE COMPRA CREDITO**** 
***************************************************************/
public static function actualizarpagocredito($ordenid,$imagen,$estado_orden,$rubro_id,$subrubro_id,$factura){
	try {
		$db=Db::getConnect();

			$select=$db->query("UPDATE ordenescompra SET imagen='".$imagen."',estado_orden='".$estado_orden."', rubro_id='".$rubro_id."', subrubro_id='".$subrubro_id."',factura='".$factura."' WHERE id='".$ordenid."' ");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR INGRESO DE PAGO DE ORDEN DE COMPRA CREDITO**** 
***************************************************************/
public static function actualizarpagoabonos($ordenunica,$fecha_reporte,$estado_egreso,$ultimoegreso){
	try {
		$db=Db::getConnect();

			$select=$db->query("UPDATE detalle_pagos_ordenescompra SET egreso_id='".$ultimoegreso."',estado_pago='".$estado_egreso."' WHERE compra_id='".$ordenunica."' and fecha_registro='".$fecha_reporte."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


		


/***************************************************************
*** FUNCION PARA GUARDAR INGRESO DE PAGO DE ORDEN DE COMPRA **** 
***************************************************************/
public static function guardarfactura($facturanum,$fecha_reporte,$valor_total,$valor_retenciones,$valor_iva,$marca_temporal,$creado_por,$estado_factura,$factura_publicada,$proveedor){

	$V1=str_replace(".","",$valor_total);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$V11=str_replace(".","",$valor_retenciones);
		$V21=str_replace(" ", "", $V11);
		$valor_final1=str_replace("$", "", $V21);
		$valornumero1=(int) $valor_final1;

		$V12=str_replace(".","",$valor_iva);
		$V22=str_replace(" ", "", $V12);
		$valor_final2=str_replace("$", "", $V22);
		$valornumero2=(int) $valor_final2;

	$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

	try {
		$db=Db::getConnect();

		
	$select=$db->query("INSERT INTO facturas_compras (proveedor_id_proveedor,facturanum,fecha_reporte, valor_total, valor_ret, valor_iva, marca_temporal, creado_por, estado_factura, factura_publicada) VALUES ('".$proveedor."','".$facturanum."','".utf8_decode($fecha_reporte)."','".utf8_decode($valor_final)."','".utf8_decode($valor_final1)."','".utf8_decode($valor_final2)."','".utf8_decode($marca_temporal)."','".$creado_por."','".utf8_decode($estado_factura)."','".utf8_decode($factura_publicada)."')");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/***************************************************************
*** FUNCION PARA GUARDAR INGRESO DE PAGO DE ORDEN DE COMPRA **** 
***************************************************************/
public static function guardaregresoOrdenCompra($cuenta_id_cuenta,$imagen,$tipo_egreso,$proveedor,$beneficiario,$id_rubro,$id_subrubro,$egreso_en,$valor_egreso,$observaciones,$estado_egreso,$egreso_publicado,$marca_temporal,$fecha_egreso,$creado_por){

	$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

	$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);

	try {
		$db=Db::getConnect();

		
	$select=$db->query("INSERT INTO egresos_cuenta (cuenta_id_cuenta,imagen,tipo_egreso,proveedor_id_proveedor,beneficiario,id_rubro,id_subrubro,egreso_en,valor_egreso,observaciones,estado_egreso,egreso_publicado,marca_temporal,fecha_egreso,creado_por) VALUES ('".utf8_decode($cuenta_id_cuenta)."','".utf8_decode($imagen)."','".utf8_decode($tipo_egreso)."','".$proveedor."','".utf8_decode($beneficiario)."','".utf8_decode($id_rubro)."','".$id_subrubro."','".utf8_decode($egreso_en)."','".utf8_decode($valor_final)."','".utf8_decode($observaciones)."','".utf8_decode($estado_egreso)."','".utf8_decode($egreso_publicado)."','".utf8_decode($marca_temporal)."','".utf8_decode($nuevafecha)."','".utf8_decode($creado_por)."')");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR INGRESO DE PAGO DE ORDEN DE COMPRA **** 
***************************************************************/
public static function pagotemporal($id,$valor,$fecha_registro,$estado_pago,$creado_por,$marca_temporal){

	$V1=str_replace(".","",$valor);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

	try {
		$db=Db::getConnect();

	$select=$db->query("INSERT INTO detalle_pagos_ordenescompra (compra_id,valor,fecha_registro,estado_pago,creado_por,marca_temporal) VALUES ('".utf8_decode($id)."','".utf8_decode($valor_final)."','".utf8_decode($fecha_registro)."','".utf8_decode($estado_pago)."','".utf8_decode($creado_por)."','".utf8_decode($marca_temporal)."')");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR  **
********************************************************/
public static function sqlvalor($id){
	try {
		$db=Db::getConnect();
		$sql="SELECT valor_total FROM ordenescompra WHERE id='".$id."'";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['valor_total'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR  **
********************************************************/
public static function sqlfecha($id){
	try {
		$db=Db::getConnect();
		$sql="SELECT fecha_reporte FROM ordenescompra WHERE id='".$id."'";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['fecha_reporte'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR  **
********************************************************/
public static function sqlretencion($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT valor_retenciones FROM ordenescompra WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['valor_retenciones'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR  **
********************************************************/
public static function sqliva($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT valor_iva FROM ordenescompra WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['valor_iva'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR  **
********************************************************/
public static function sqlproveedor($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT proveedor_id_proveedor FROM ordenescompra WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['proveedor_id_proveedor'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR  **
********************************************************/
public static function sqlabonos($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(sum(valor),0) as Abonos FROM detalle_pagos_ordenescompra WHERE compra_id='".$id."' and estado_pago='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['Abonos'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR  **
********************************************************/
public static function sqlabonostemporal($id,$fecha_registro){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(sum(valor),0) as Abonos FROM detalle_pagos_ordenescompra WHERE compra_id='".$id."' and estado_pago='0' and fecha_registro='".$fecha_registro."'");
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['Abonos'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE ABONOS	  **
********************************************************/
public static function obtenerListaAbonos($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM detalle_pagos_ordenescompra WHERE compra_id='".$id."' and estado_pago='1'");
    	$campos=$select->fetchAll();
		$camposs = new Compras('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
********************************************************/
public static function obtenerUltimosEgreso($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT id_egreso_cuenta FROM egresos_cuenta WHERE cuenta_id_cuenta='".$id."'  order by id_egreso_cuenta desc limit 1");
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['id_egreso_cuenta'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
********************************************************/
public static function obteneridproveedorcompra($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT proveedor_id_proveedor FROM ordenescompra WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['proveedor_id_proveedor'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
********************************************************/
public static function obtenervalorcotizado($insumo_id,$cotizacion_item_id,$idproveedor,$estado){
	try {
		$db=Db::getConnect();
		$sql="SELECT vr_unitario FROM cotizaciones_item WHERE insumo_id_insumo='".$insumo_id."' and id='".$cotizacion_item_id."' and proveedor_id_proveedor='".$idproveedor."' and estado_cotizacion='".$estado."'";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Compras('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['vr_unitario'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}




}

?>
