<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/
class Reportes
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

			$select=$db->query("SELECT * FROM reporte_despachos WHERE reporte_publicado='1' order by id DESC");
	    	$camposs=$select->fetchAll();
	    	$campos = new Reportes('',$camposs);
			return $campos;
		}
		catch(PDOException $e) {
			echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
		}
	}

public static function ReporteVentasOrderId($getid=null){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_ventas WHERE reporte_publicado='1' order by id DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteVentas(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_ventas WHERE reporte_publicado='1' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteVentasporfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_ventas WHERE reporte_publicado='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR OTRO CLIENTE **
***************************************************************/
public static function guardarcliente($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO clientes VALUES (NULL,:nombre_cliente,:estado_cliente)');

		$insert->bindValue('nombre_cliente',utf8_decode($nombre_cliente));
		$insert->bindValue('estado_cliente',utf8_decode($estado_cliente));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR OTRO CLIENTE **
***************************************************************/
public static function guardarproducto($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO productos VALUES (NULL,:nombre_producto,:estado_producto,:insumos_producto)');

		$insert->bindValue('nombre_producto',utf8_decode($nombre_producto));
		$insert->bindValue('estado_producto',utf8_decode($estado_producto));
		$insert->bindValue('insumos_producto',utf8_decode($insumos_producto));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR **
id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones
***************************************************************/
public static function guardarventa($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO reporte_ventas VALUES (NULL,:fecha_reporte, :cliente_id_cliente, :producto_id_producto, :valor_m3, :cantidad, :creado_por, :estado_reporte, :reporte_publicado,:marca_temporal,:estado_pago, :observaciones,:cantidaddespachos,:num_factura)');

		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$insert->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
		$insert->bindValue('valor_m3',utf8_decode($valornumero));
		$insert->bindValue('cantidad',utf8_decode($cantidad));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('estado_pago',utf8_decode($estado_pago));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		$insert->bindValue('cantidaddespachos',utf8_decode($cantidaddespachos));
		$insert->bindValue('num_factura',utf8_decode($num_factura));
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
public static function eliminarventaPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_ventas SET reporte_publicado='0' WHERE id='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA CAMBIAR ESTADO DE LA VENTA A CONTADO POR ID  **
***************************************************************/
public static function cambiarestadoventaPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_ventas SET estado_pago='Contado' WHERE id='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA CAMBIAR ESTADO DE LA VENTA A CONTADO POR ID  **
***************************************************************/
public static function cambiarestadoprestamoPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_prestamos SET estado_pago='Contado' WHERE id='".$id."'");
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
public static function editarventaPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_ventas WHERE id='".$id."' and estado_reporte='1'");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
********************************************************************/
public static function actualizarventa($id,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_ventas SET
								fecha_reporte=:fecha_reporte,
								cliente_id_cliente=:cliente_id_cliente,
								producto_id_producto=:producto_id_producto,
								valor_m3=:valor_m3,
								cantidad=:cantidad,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								estado_pago=:estado_pago,
								observaciones=:observaciones,
								cantidaddespachos=:cantidaddespachos,
								num_factura=:num_factura
								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$update->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
		$update->bindValue('valor_m3',utf8_decode($valornumero));
		$update->bindValue('cantidad',utf8_decode($cantidad));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('estado_pago',utf8_decode($estado_pago));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('cantidaddespachos',utf8_decode($cantidaddespachos));
		$update->bindValue('num_factura',utf8_decode($num_factura));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************



/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteCompras(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_compras WHERE reporte_publicado='1' and estado_reporte='1' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteComprasporfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_compras WHERE reporte_publicado='1' and estado_reporte='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR OTRO INSUMO **
***************************************************************/
public static function guardarinsumo($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO insumos VALUES (NULL,:nombre_insumo,:estado_insumo)');

		$insert->bindValue('nombre_insumo',utf8_decode($nombre_insumo));
		$insert->bindValue('estado_insumo',utf8_decode($estado_insumo));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR OTRO PROVEEDOR **
***************************************************************/
public static function guardarproveedor($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO proveedores VALUES (NULL,:nombre_proveedor,:estado_proveedor)');

		$insert->bindValue('nombre_proveedor',utf8_decode($nombre_proveedor));
		$insert->bindValue('estado_proveedor',utf8_decode($estado_proveedor));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR **
id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones
***************************************************************/
public static function guardarcompra($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO reporte_compras VALUES (NULL,:imagen,:fecha_reporte, :insumo_id_insumo,:subrubro_id_subrubro,:proveedor_id_proveedor, :valor_m3, :cantidad,:vence, :creado_por, :estado_reporte, :reporte_publicado,:marca_temporal,:pago_con,:beneficiario,:observaciones)');

		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$imagen=0;
		$proveedor_id_proveedor=0;
		$vence=0;

		$insert->bindValue('imagen',utf8_decode($imagen));
		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('insumo_id_insumo',utf8_decode($insumo_id_insumo));
		$insert->bindValue('subrubro_id_subrubro',utf8_decode($subrubro_id_subrubro));
		$insert->bindValue('proveedor_id_proveedor',utf8_decode($proveedor_id_proveedor));
		$insert->bindValue('valor_m3',utf8_decode($valornumero));
		$insert->bindValue('cantidad',utf8_decode($cantidad));
		$insert->bindValue('vence',utf8_decode($vence));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('pago_con',utf8_decode($pago_con));
		$insert->bindValue('beneficiario',utf8_decode($beneficiario));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
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
public static function eliminarcompraPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_compras SET reporte_publicado='0' WHERE id='".$id."'");
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
public static function editarcompraPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_compras WHERE id='".$id."' and reporte_publicado='1'");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function editarcomprainsumoPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_comprasinsumos WHERE id='".$id."' and reporte_publicado='1'");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
********************************************************************/
public static function actualizarcompra($id,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_compras SET
								fecha_reporte=:fecha_reporte,
								insumo_id_insumo=:insumo_id_insumo,
								subrubro_id_subrubro=:subrubro_id_subrubro,
								valor_m3=:valor_m3,
								cantidad=:cantidad,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								pago_con=:pago_con,
								beneficiario=:beneficiario,
								observaciones=:observaciones
								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('insumo_id_insumo',utf8_decode($insumo_id_insumo));
		$update->bindValue('subrubro_id_subrubro',utf8_decode($subrubro_id_subrubro));
		$update->bindValue('valor_m3',utf8_decode($valornumero));
		$update->bindValue('cantidad',utf8_decode($cantidad));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('pago_con',utf8_decode($pago_con));
		$update->bindValue('beneficiario',utf8_decode($beneficiario));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteDespachos(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_despachos WHERE reporte_publicado='1' and tipo_despacho='A patio' and fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteDespachosporfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_despachos WHERE reporte_publicado='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and tipo_despacho='A patio' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA CONOCERN EL VALOR DEL DESPACHO **
********************************************************/
public static function obtenerValorDespacho($idCliente,$idProducto){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(MAX(valor_m3),0) AS ValorMax FROM reporte_ventas WHERE producto_id_producto= '".$idProducto."' and cliente_id_cliente= '".$idCliente."' LIMIT 1");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['ValorMax'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR **
(id, fecha_reporte, cliente_id_cliente, producto_id_producto, equipo_id_equipo, despachado_por, transportado_por, despachador_tm, tipo_despacho, valor_m3, cantidad, viajes, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones, facturado)
***************************************************************/
public static function guardardespacho($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$valorinsumo=5600;

		$insert=$db->prepare('INSERT INTO reporte_despachos VALUES (NULL,:fecha_reporte, :cliente_id_cliente, :producto_id_producto,:equipo_id_equipo,:despachado_por,:transportado_por,:despachador_tm,:tipo_despacho, :valor_m3, :cantidad,:viajes, :creado_por, :estado_reporte, :reporte_publicado,:marca_temporal, :observaciones)');

		//$V1=str_replace(".","",$valor_m3);
		//$V2=str_replace(" ", "", $V1);
		//$valor_final=str_replace("$", "", $V2);
		//$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$insert->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
		$insert->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$insert->bindValue('despachado_por',utf8_decode($despachado_por));
		$insert->bindValue('transportado_por',utf8_decode($transportado_por));
		$insert->bindValue('despachador_tm',utf8_decode($despachador_tm));
		$insert->bindValue('tipo_despacho',utf8_decode($tipo_despacho));
		$insert->bindValue('valor_m3',utf8_decode($valorinsumo));
		$insert->bindValue('cantidad',utf8_decode($cantidad));
		$insert->bindValue('viajes',utf8_decode($viajes));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
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
public static function eliminardespachoPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_despachos SET reporte_publicado='0' WHERE id='".$id."'");
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
public static function editardespachoPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_despachos WHERE id='".$id."' and estado_reporte='1'");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
********************************************************************/
public static function actualizardespacho($id,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_despachos SET
								fecha_reporte=:fecha_reporte,
								cliente_id_cliente=:cliente_id_cliente,
								producto_id_producto=:producto_id_producto,
								equipo_id_equipo=:equipo_id_equipo,
								despachado_por=:despachado_por,
								transportado_por=:transportado_por,
								despachador_tm=:despachador_tm,
								tipo_despacho=:tipo_despacho,
								valor_m3=:valor_m3,
								cantidad=:cantidad,
								viajes=:viajes,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								observaciones=:observaciones
								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$update->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
		$update->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$update->bindValue('despachado_por',utf8_decode($despachado_por));
		$update->bindValue('transportado_por',utf8_decode($transportado_por));
		$update->bindValue('despachador_tm',utf8_decode($despachador_tm));
		$update->bindValue('tipo_despacho',utf8_decode($tipo_despacho));
		$update->bindValue('valor_m3',utf8_decode($valornumero));
		$update->bindValue('cantidad',utf8_decode($cantidad));
		$update->bindValue('viajes',utf8_decode($viajes));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}


//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteFacturas(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_facturas WHERE reporte_publicado='1' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteFacturasporfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_facturas WHERE reporte_publicado='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}




/***************************************************************
*** FUNCION PARA GUARDAR **
id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones
***************************************************************/
public static function guardarfactura($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO reporte_facturas VALUES (NULL,:imagen,:fecha_reporte, :cliente_id_cliente,  :valor_total, :creado_por, :estado_reporte, :reporte_publicado,:marca_temporal, :observaciones)');

		$V1=str_replace(".","",$valor_total);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('imagen',utf8_decode($imagen));
		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$insert->bindValue('valor_total',utf8_decode($valornumero));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
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
public static function eliminarfacturaPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_facturas SET reporte_publicado='0' WHERE id='".$id."'");
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
public static function editarfacturaPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_facturas WHERE id='".$id."' and estado_reporte='1'");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
********************************************************************/
public static function actualizarfactura($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_facturas SET
								imagen=:imagen,
								fecha_reporte=:fecha_reporte,
								cliente_id_cliente=:cliente_id_cliente,
								valor_total=:valor_total,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								observaciones=:observaciones
								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_total);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',$imagen);
		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$update->bindValue('valor_total',utf8_decode($valornumero));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR **
id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones
***************************************************************/
public static function guardarabono($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO reporte_abonos VALUES (NULL,:fecha_abono, :cliente_id_cliente,:reporte_id_factura,:reporte_id_prestamo,:reporte_id_cuentaxpagar, :valor_abono, :creado_por, :estado_reporte, :reporte_publicado,:marca_temporal)');

		$V1=str_replace(".","",$valor_abono);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_abono);
		$nuevafecha=date('y-m-d',$t);

		
		$insert->bindValue('fecha_abono',utf8_decode($nuevafecha));
		$insert->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$insert->bindValue('reporte_id_factura',utf8_decode($reporte_id_factura));
		$insert->bindValue('reporte_id_prestamo',utf8_decode($reporte_id_prestamo));
		$insert->bindValue('reporte_id_cuentaxpagar',utf8_decode($reporte_id_cuentaxpagar));
		$insert->bindValue('valor_abono',utf8_decode($valornumero));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteAbonospor($id,$tipo){
	try {
		$db=Db::getConnect();
		if ($tipo=="Venta_Material") {
			$select=$db->query("SELECT * FROM reporte_abonos WHERE reporte_id_factura='".$id."' order by fecha_abono DESC");
		}
		elseif ($tipo=="Venta_Equipos") {
			$select=$db->query("SELECT * FROM reporte_abonos WHERE reporte_id_prestamo='".$id."' order by fecha_abono DESC");
		}
		elseif ($tipo=="Cuenta_x_pagar") {
			$select=$db->query("SELECT * FROM reporte_abonos WHERE reporte_id_cuentaxpagar='".$id."' order by fecha_abono DESC");
		}
		
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminarabonoPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM reporte_abonos WHERE id='".$id."'");
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
public static function eliminarabonoPorventa($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM reporte_abonos WHERE reporte_id_factura='".$id."'");
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
public static function eliminarabonoPorprestamo($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM reporte_abonos WHERE reporte_id_prestamo='".$id."'");
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
public static function eliminarabonoPorcuentaxpagar($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM reporte_abonos WHERE reporte_id_cuentaxpagar='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}





//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************



/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteCuentasxpagar(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_compras WHERE reporte_publicado='1' and estado_reporte='2' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteCuentasxpagarporfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_compras WHERE reporte_publicado='1' and estado_reporte='2' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR **
* 
* (id, imagen, imagen_cot, fecha_reporte, valor_total, valor_retenciones, valor_iva, estado_orden, proveedor_id_proveedor, medio_pago, observaciones, marca_temporal, usuario_creador, rubro_id, subrubro_id, vencimiento, factura, estado_recibido, compra_de)

***************************************************************/
public static function guardarcuentaxpagar($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO ordenescompra VALUES (NULL,:imagen, :imagen_cot, :fecha_reporte, :valor_total, :valor_retenciones, :valor_iva, :estado_orden, :proveedor_id_proveedor, :medio_pago, :observaciones, :marca_temporal, :usuario_creador, :rubro_id, :subrubro_id, :vencimiento, :factura, :estado_recibido, :compra_de)');

		$V1=str_replace(".","",$valor_total);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('imagen',utf8_decode($imagen));
		$insert->bindValue('imagen_cot',utf8_decode($imagen));
		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('valor_total',utf8_decode($valornumero));
		$insert->bindValue('valor_retenciones',utf8_decode($valor_retenciones));
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
		$insert->bindValue('estado_recibido',utf8_decode($estado_recibido));
		$insert->bindValue('compra_de',utf8_decode($compra_de));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR **
* 
* (`id`, `usuario_creador`, `accion`, `usuario_receptor`, `rol_receptor`, `estado_alerta`, `fecha_reporte`, `marca_temporal`, `fecha_leida`, `marca_leida`, `detalle`)
***************************************************************/
public static function guardarnotificacion($usuario_creador,$usuario_receptor,$marca_temporal,$fecha_reporte,$detalle){
	try {
		$db=Db::getConnect();
		
		$select=$db->query("INSERT INTO modulo_alertas (usuario_creador,usuario_receptor,marca_temporal,fecha_reporte,detalle) VALUES ('".utf8_decode($usuario_creador)."','".$usuario_receptor."','".utf8_decode($marca_temporal)."','".utf8_decode($fecha_reporte)."','".utf8_decode($detalle)."')");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminarcuentaxpagarPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_compras SET reporte_publicado='0' WHERE id='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA CANCELAR POR ID  **
***************************************************************/
public static function cancelarcuentaxpagarPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_compras SET estado_reporte='1' WHERE id='".$id."'");
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
public static function editarcuentaxpagarPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_compras WHERE id='".$id."' and reporte_publicado='1'");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
********************************************************************/
public static function actualizarcuentaxpagar($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_compras SET
								imagen=:imagen,
								fecha_reporte=:fecha_reporte,
								insumo_id_insumo=:insumo_id_insumo,
								subrubro_id_subrubro=:subrubro_id_subrubro,
								proveedor_id_proveedor=:proveedor_id_proveedor,
								valor_m3=:valor_m3,
								cantidad=:cantidad,
								vence=:vence,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								pago_con=:pago_con,
								beneficiario=:beneficiario,
								observaciones=:observaciones
								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',utf8_decode($imagen));
		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('insumo_id_insumo',utf8_decode($insumo_id_insumo));
		$update->bindValue('subrubro_id_subrubro',utf8_decode($subrubro_id_subrubro));
		$update->bindValue('proveedor_id_proveedor',utf8_decode($proveedor_id_proveedor));
		$update->bindValue('valor_m3',utf8_decode($valornumero));
		$update->bindValue('cantidad',utf8_decode($cantidad));
		$update->bindValue('vence',utf8_decode($vence));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('pago_con',utf8_decode($pago_con));
		$update->bindValue('beneficiario',utf8_decode($beneficiario));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************

//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************



/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteCuentasxpagarconsolidado(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT proveedor_id_proveedor,SUM(valor_m3*cantidad)as deuda,insumo_id_insumo  FROM reporte_compras WHERE reporte_publicado='1' and estado_reporte='2' GROUP BY proveedor_id_proveedor");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteCuentasxpagarporfechaconsolidado($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT proveedor_id_proveedor,SUM(valor_m3*cantidad) as deuda,insumo_id_insumo  FROM reporte_compras WHERE reporte_publicado='1' and estado_reporte='2' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' GROUP BY proveedor_id_proveedor");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteCuentasxpagardetalle($proveedor){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_compras WHERE reporte_publicado='1' and estado_reporte='2' and proveedor_id_proveedor='".$proveedor."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteCuentasxpagarporfechadetalle($FechaStart,$FechaEnd,$proveedor){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_compras WHERE reporte_publicado='1' and estado_reporte='2' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and proveedor_id_proveedor='".$proveedor."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteInsumosxpagar(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_comprasinsumos WHERE reporte_publicado='1' and estado_reporte='2' and fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteInsumosxpagarporfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_comprasinsumos WHERE reporte_publicado='1' and estado_reporte='2' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR **
id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones
***************************************************************/
public static function guardarinsumoxpagar($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		//insumo_id_insumo
		
		$insert=$db->prepare('INSERT INTO reporte_comprasinsumos VALUES (NULL,:imagen,:fecha_reporte, :insumo_id_insumo,:proveedor_id_proveedor, :valor_m3, :cantidad,:vence, :creado_por, :estado_reporte, :reporte_publicado,:marca_temporal, :observaciones, :campamento_id_campamento)');

		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('imagen',utf8_decode($imagen));
		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('insumo_id_insumo',utf8_decode($insumo_id_insumo));
		$insert->bindValue('proveedor_id_proveedor',utf8_decode($proveedor_id_proveedor));
		$insert->bindValue('valor_m3',utf8_decode($valornumero));
		$insert->bindValue('cantidad',utf8_decode($cantidad));
		$insert->bindValue('vence',utf8_decode($vence));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		$insert->bindValue('campamento_id_campamento',utf8_decode($campamento_id_campamento));

		$insert->execute();



		// Obtengo los insumos del producto 
		$consulta="
			SELECT insumoscampamento.cantidad as cantidadactual, insumoscampamento.id as insumoscampamentoid 
			FROM insumoscampamento
			WHERE insumoscampamento.insumo_id_insumo = '$insumo_id_insumo' 
			and insumoscampamento.estado = '1' and insumoscampamento.campamento_id_campamento = '$campamento_id_campamento'
		";

		$fechaactual=date('y-m-d H:m:s');
		$observacion = "";		
		$tipomovimiento = 3;

		$select=$db->query($consulta);
    	$camposs=$select->fetchAll();	

    	foreach ($camposs as $key => $value) {
    	 	
    	 	$insumoscampamentoid = $value["insumoscampamentoid"];
    	 	$cantidadactual = $value["cantidadactual"];    	 	

    	 	$cantidadactual = $cantidadactual + $cantidad;

			$update=$db->prepare('UPDATE insumoscampamento 
								SET	cantidad=:cantidadactual
								WHERE id=:insumoscampamentoid');

			$update->bindValue('cantidadactual',$cantidadactual);				
			$update->bindValue('insumoscampamentoid',$insumoscampamentoid);
			$update->execute();



			$insert=$db->prepare('
			INSERT INTO insumoscampamentohistorial
			(insumo_id_insumo, campamento_id_campamento, movimiento_inventario_id, 
			cantidad, fecha_registro, observacion)
			VALUES (:insumo_id_insumo,:campamento_id_campamento, :tipomovimiento, 
			 :cantidad, :fechaactual, :observacion)');
			
			$insert->bindValue('insumo_id_insumo',utf8_decode($insumo_id_insumo));
			$insert->bindValue('campamento_id_campamento',utf8_decode($campamento_id_campamento));
			$insert->bindValue('tipomovimiento',utf8_decode($tipomovimiento));
			$insert->bindValue('cantidad',utf8_decode($cantidad));			
			$insert->bindValue('observacion',utf8_decode($observacion));
			$insert->bindValue('fechaactual',utf8_decode($fechaactual));
			$insert->execute();



		} 


		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminarinsumoxpagarPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_comprasinsumos SET reporte_publicado='0' WHERE id='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA CANCELAR POR ID  **
***************************************************************/
public static function cancelarinsumoxpagarPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_comprasinsumos SET estado_reporte='1' WHERE id='".$id."'");
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
public static function editarinsumoxpagarPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_comprasinsumos WHERE id='".$id."' and reporte_publicado='1'");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
********************************************************************/
public static function actualizarinsumoxpagar($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_comprasinsumos SET
								imagen=:imagen,
								fecha_reporte=:fecha_reporte,
								insumo_id_insumo=:insumo_id_insumo,
								proveedor_id_proveedor=:proveedor_id_proveedor,
								valor_m3=:valor_m3,
								cantidad=:cantidad,
								vence=:vence,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								observaciones=:observaciones
								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',utf8_decode($imagen));
		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('insumo_id_insumo',utf8_decode($insumo_id_insumo));
		$update->bindValue('proveedor_id_proveedor',utf8_decode($proveedor_id_proveedor));
		$update->bindValue('valor_m3',utf8_decode($valornumero));
		$update->bindValue('cantidad',utf8_decode($cantidad));
		$update->bindValue('vence',utf8_decode($vence));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReportePrestamos(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_prestamos WHERE reporte_publicado='1' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReportePrestamosInforme($cliente){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_prestamos as A, equipos as B WHERE reporte_publicado='1' and A.equipo_id_equipo=B.id_equipo and modulo='Asf' and cliente_id_cliente='".$cliente."' order by nombre_equipo DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReportePrestamosporfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_prestamos WHERE reporte_publicado='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}




/***************************************************************
*** FUNCION PARA GUARDAR **
id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones
***************************************************************/
public static function guardarprestamo($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO reporte_prestamos VALUES (NULL,:fecha_reporte,:fecha_final, :cliente_id_cliente, :equipo_id_equipo, :valor_prestamo, :cantidad, :creado_por, :estado_reporte, :reporte_publicado,:marca_temporal,:estado_pago, :observaciones)');

		$V1=str_replace(".","",$valor_prestamo);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('fecha_final',utf8_decode($fecha_final));
		$insert->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$insert->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$insert->bindValue('valor_prestamo',utf8_decode($valornumero));
		$insert->bindValue('cantidad',utf8_decode($cantidad));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('estado_pago',utf8_decode($estado_pago));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
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
public static function eliminarprestamoPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_prestamos SET reporte_publicado='0' WHERE id='".$id."'");
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
public static function editarprestamoPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_prestamos WHERE id='".$id."' and estado_reporte='1'");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
********************************************************************/
public static function actualizarprestamo($id,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_prestamos SET
								fecha_reporte=:fecha_reporte,
								fecha_final=:fecha_final,
								cliente_id_cliente=:cliente_id_cliente,
								equipo_id_equipo=:equipo_id_equipo,
								valor_prestamo=:valor_prestamo,
								cantidad=:cantidad,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								estado_pago=:estado_pago,
								observaciones=:observaciones
								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_prestamo);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('fecha_final',utf8_decode($fecha_final));
		$update->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$update->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$update->bindValue('valor_prestamo',utf8_decode($valornumero));
		$update->bindValue('cantidad',utf8_decode($cantidad));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('estado_pago',utf8_decode($estado_pago));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteCombustibles(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_combustibles WHERE reporte_publicado='1' and equipo_id_equipo<>'732' and fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteCombustiblescisterna(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_combustibles WHERE reporte_publicado='1' and punto_despacho='3' and fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteCombustiblesporfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_combustibles WHERE reporte_publicado='1' and punto_despacho<>'3' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteCombustiblesporfechacisterna($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_combustibles WHERE reporte_publicado='1' and punto_despacho='3' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteCombustiblesporfechameseq($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT DISTINCT(equipo_id_equipo),SUM(cantidad) as totalconsumo, AVG(cantidad) as promediotan,COUNT(cantidad) as totalrecar,SUM(cantidad*valor_m3) as totalvalor FROM reporte_combustibles WHERE equipo_id_equipo<>'732' and reporte_publicado='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' GROUP by equipo_id_equipo ORDER BY totalconsumo DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteVolquetasporfechameseq($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT DISTINCT(equipo_id_equipo) FROM reporte_despachosclientes WHERE reporte_publicado='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."'");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteHorasmqporfechameseq($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT DISTINCT(equipo_id_equipo) FROM reporte_horasmq WHERE reporte_publicado='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."'");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteEstacionesporfechameseq($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();
		
		//echo($sql);
		$select=$db->query("SELECT DISTINCT(punto_despacho),SUM(cantidad) as totalestacion,SUM(cantidad*valor_m3) as totalestacionvalor FROM reporte_combustibles WHERE reporte_publicado='1' and punto_despacho<>'3' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' GROUP by punto_despacho ORDER BY totalestacion DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteIngresosCarroTanque($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();
		
		//echo($sql);
		$select=$db->query("SELECT * FROM reporte_combustibles WHERE reporte_publicado='1' and equipo_id_equipo='732' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' ORDER BY id DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteEgresosCarroTanque($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();
		
		//echo($sql);
		$select=$db->query("SELECT * FROM reporte_combustibles WHERE reporte_publicado='1' and punto_despacho='3' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' ORDER BY id DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR **
id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones
***************************************************************/
public static function guardarcombustible($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO reporte_combustibles VALUES (NULL,:imagen,:fecha_reporte,:equipo_id_equipo,:proyecto_id_proyecto,:despachado_por,:punto_despacho,:recibido_por,:valor_m3, :cantidad,:indicador, :creado_por, :estado_reporte, :reporte_publicado,:marca_temporal, :observaciones,:autorizado)');

		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		
		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('imagen',utf8_decode($imagen));
		$insert->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$insert->bindValue('proyecto_id_proyecto',utf8_decode($proyecto_id_proyecto));
		$insert->bindValue('despachado_por',utf8_decode($despachado_por));
		$insert->bindValue('punto_despacho',utf8_decode($punto_despacho));
		$insert->bindValue('recibido_por',utf8_decode($recibido_por));
		$insert->bindValue('valor_m3',utf8_decode($valornumero));
		$insert->bindValue('cantidad',utf8_decode($cantidad));
		$insert->bindValue('indicador',utf8_decode($indicador));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		$insert->bindValue('autorizado',utf8_decode($autorizado));
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
public static function eliminarcombustiblePor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM reporte_combustibles WHERE id='".$id."'");
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
public static function editarcombustiblePor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_combustibles WHERE id='".$id."' and estado_reporte='1'");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
********************************************************************/
public static function actualizarcombustible($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_combustibles SET
								imagen=:imagen,
								fecha_reporte=:fecha_reporte,
								equipo_id_equipo=:equipo_id_equipo,
								proyecto_id_proyecto=:proyecto_id_proyecto,
								despachado_por=:despachado_por,
								punto_despacho=:punto_despacho,
								recibido_por=:recibido_por,
								valor_m3=:valor_m3,
								cantidad=:cantidad,
								indicador=:indicador,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								observaciones=:observaciones,
								autorizado=:autorizado
								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);
		$update->bindValue('imagen',utf8_decode($imagen));
		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$update->bindValue('proyecto_id_proyecto',utf8_decode($proyecto_id_proyecto));
		$update->bindValue('despachado_por',utf8_decode($despachado_por));
		$update->bindValue('punto_despacho',utf8_decode($punto_despacho));
		$update->bindValue('recibido_por',utf8_decode($recibido_por));
		$update->bindValue('valor_m3',utf8_decode($valornumero));
		$update->bindValue('cantidad',utf8_decode($cantidad));
		$update->bindValue('indicador',utf8_decode($indicador));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('autorizado',utf8_decode($autorizado));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}





//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteDespachosclientes(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_despachosclientes WHERE reporte_publicado='1' and fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteDespachosclientesf(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_despachosclientes WHERE reporte_publicado='1' and fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteDespachosclientesunico($idCliente){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_despachosclientes WHERE reporte_publicado='1' and cliente_id_cliente='".$idCliente."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteDespachosproveedorunico($idProveedor){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_comprasinsumos WHERE reporte_publicado='1' and proveedor_id_proveedor='".$idProveedor."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteDespachosporfechaclientes($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_despachosclientes WHERE reporte_publicado='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteDespachosporfechaclientesunico($FechaStart,$FechaEnd,$idCliente){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_despachosclientes WHERE cliente_id_cliente='".$idCliente."' and reporte_publicado='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteDespachosporfechaproveedorunico($FechaStart,$FechaEnd,$idProveedor){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_comprasinsumos WHERE proveedor_id_proveedor='".$idProveedor."' and reporte_publicado='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/***************************************************************
*** FUNCION PARA GUARDAR **
reporte_despachosclientes(id, imagen, fecha_reporte, remision, cliente_id_cliente, producto_id_producto, equipo_id_equipo, despachado_por, transporte, kilometraje, valor_m3, cantidad, viajes, radicada, fecha_radicada, factura, pagado, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones
***************************************************************/
public static function guardardespachoclientes($campos,$imagen,$valorcalculado){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);


		$insert=$db->prepare('INSERT INTO reporte_despachosclientes VALUES (NULL,:imagen,:fecha_reporte,:remision,:cliente_id_cliente,:producto_id_producto,:equipo_id_equipo,:despachado_por,:transporte,:kilometraje,:valor_m3,:valor_material,:cantidad,:viajes,:radicada,:fecha_radicada,:factura,:pagado, :creado_por, :estado_reporte, :reporte_publicado,:marca_temporal,:observaciones,:campamento_id_campamento,:id_destino_origen,:id_destino_destino)');

		//$V1=str_replace(".","",$valor_m3);
		//$V2=str_replace(" ", "", $V1);
		//$valor_final=str_replace("$", "", $V2);
		//$valornumero=(int) $valor_final;

		$V11=str_replace(".","",$valor_material);
		$V21=str_replace(" ", "", $V11);
		$valor_final1=str_replace("$", "", $V21);
		$valornumero2=(int) $valor_final1;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		

		$insert->bindValue('imagen',utf8_decode($imagen));
		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('remision',utf8_decode($remision));
		$insert->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$insert->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
		$insert->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$insert->bindValue('despachado_por',utf8_decode($despachado_por));
		$insert->bindValue('transporte',utf8_decode($transporte));
		$insert->bindValue('kilometraje',utf8_decode($kilometraje));
		$insert->bindValue('valor_m3',utf8_decode($valorcalculado));
		$insert->bindValue('valor_material',utf8_decode($valornumero2));
		$insert->bindValue('cantidad',utf8_decode($cantidad));
		$insert->bindValue('viajes',utf8_decode($viajes));
		$insert->bindValue('radicada',utf8_decode($radicada));
		$insert->bindValue('fecha_radicada',utf8_decode($fecha_radicada));
		$insert->bindValue('factura',utf8_decode($factura));
		$insert->bindValue('pagado',utf8_decode($pagado));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		$insert->bindValue('campamento_id_campamento',utf8_decode($campamento_id_campamento));
		$insert->bindValue('id_destino_origen',utf8_decode($id_destino_origen));
		$insert->bindValue('id_destino_destino',utf8_decode($id_destino_destino));
		$insert->execute();

		// Obtengo los insumos del producto 
		$consulta="
			SELECT productosinsumos.id, productosinsumos.insumo_id_insumo, productosinsumos.producto_id_producto, 
			productosinsumos.cantidad as cantidadinsumo, productosinsumos.fecha_modificado, productosinsumos.estado,
			insumoscampamento.cantidad as cantidadactual, insumoscampamento.id as insumoscampamentoid 
			FROM productosinsumos 
				INNER JOIN insumoscampamento ON insumoscampamento.insumo_id_insumo = productosinsumos.insumo_id_insumo
			WHERE productosinsumos.producto_id_producto = '$producto_id_producto' and productosinsumos.estado = '1'
			and insumoscampamento.estado = '1' and insumoscampamento.campamento_id_campamento = '$campamento_id_campamento'
		";

		$fechaactual=date('y-m-d H:m:s');
		$observacion = "";		
		$tipomovimiento = 5;

		$select=$db->query($consulta);
    	$camposs=$select->fetchAll();	

    	foreach ($camposs as $key => $value) {
    	 	
    	 	$insumoscampamentoid = $value["insumoscampamentoid"];
    	 	$insumo_id_insumo = $value["insumo_id_insumo"];
    	 	$cantidadinsumo = $value["cantidadinsumo"];
    	 	$cantidadactual = $value["cantidadactual"];

    	 	$cantidadactual = $cantidadactual - $cantidad;

			$update=$db->prepare('UPDATE insumoscampamento 
								SET	cantidad=:cantidadactual
								WHERE id=:insumoscampamentoid');

			$update->bindValue('cantidadactual',$cantidadactual);				
			$update->bindValue('insumoscampamentoid',$insumoscampamentoid);
			$update->execute();



			$insert=$db->prepare('
			INSERT INTO insumoscampamentohistorial
			(insumo_id_insumo, campamento_id_campamento, movimiento_inventario_id, 
			cantidad, fecha_registro, observacion)
			VALUES (:insumo_id_insumo,:campamento_id_campamento, :tipomovimiento, 
			 :cantidad, :fechaactual, :observacion)');
			
			$insert->bindValue('insumo_id_insumo',utf8_decode($insumo_id_insumo));
			$insert->bindValue('campamento_id_campamento',utf8_decode($campamento_id_campamento));
			$insert->bindValue('tipomovimiento',utf8_decode($tipomovimiento));
			$insert->bindValue('cantidad',utf8_decode($cantidad));			
			$insert->bindValue('observacion',utf8_decode($observacion));
			$insert->bindValue('fechaactual',utf8_decode($fechaactual));
			$insert->execute();



		} 

		
		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

# =======================================================
# =           Consulta del Valor m3 recorrido           =
# =======================================================


public static function Consultavalorm3recorrido($id_destino_origen,$id_destino_destino,$cliente_id_cliente){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT  IFNULL(sum(valor_m3km),0) as valor FROM clientes_precios WHERE origen_id='".$id_destino_origen."' and destino_id='".$id_destino_destino."' and cliente_id='".$cliente_id_cliente."' and canal_venta='fletes'");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['valor'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


# =======================================================
# =           Consulta de los km recorridos           =
# =======================================================


public static function Consultakmrecorrido($id_destino_origen,$id_destino_destino,$cliente_id_cliente){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT  IFNULL(sum(km_ruta),0) as valor FROM clientes_precios WHERE origen_id='".$id_destino_origen."' and destino_id='".$id_destino_destino."' and cliente_id='".$cliente_id_cliente."' and canal_venta='fletes'");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['valor'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminardespachoPorclientes($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_despachosclientes SET reporte_publicado='0' WHERE id='".$id."'");
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
public static function editardespachoPorclientes($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_despachosclientes WHERE id='".$id."' and estado_reporte='1'");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
id, imagen, fecha_reporte, remision, cliente_id_cliente, producto_id_producto, equipo_id_equipo, despachado_por, transporte, kilometraje, valor_m3, valor_material, cantidad, viajes, radicada, fecha_radicada, factura, pagado, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones, campamento_id_campamento, id_destino_origen, id_destino_destino FROM reporte_despachosclientes
********************************************************************/
public static function actualizardespachoclientes($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_despachosclientes SET
								imagen=:imagen,
								fecha_reporte=:fecha_reporte,
								remision=:remision,
								cliente_id_cliente=:cliente_id_cliente,
								producto_id_producto=:producto_id_producto,
								equipo_id_equipo=:equipo_id_equipo,
								despachado_por=:despachado_por,
								transporte=:transporte,
								kilometraje=:kilometraje,
								valor_m3=:valor_m3,
								valor_material=:valor_material,
								cantidad=:cantidad,
								viajes=:viajes,
								radicada=:radicada,
								fecha_radicada=:fecha_radicada,
								factura=:factura,
								pagado=:pagado,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								observaciones=:observaciones,
								campamento_id_campamento=:campamento_id_campamento,
								id_destino_origen=:id_destino_origen,
								id_destino_destino=:id_destino_destino

								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$V11=str_replace(".","",$valor_material);
		$V21=str_replace(" ", "", $V11);
		$valor_final1=str_replace("$", "", $V21);
		$valornumero2=(int) $valor_final1;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$t = strtotime($fecha_radicada);
		$nuevafecharadicada=date('y-m-d',$t);

		$update->bindValue('imagen',utf8_decode($imagen));
		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('remision',utf8_decode($remision));
		$update->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$update->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
		$update->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$update->bindValue('despachado_por',utf8_decode($despachado_por));
		$update->bindValue('transporte',utf8_decode($transporte));
		$update->bindValue('kilometraje',utf8_decode($kilometraje));
		$update->bindValue('valor_m3',utf8_decode($valornumero));
		$update->bindValue('valor_material',utf8_decode($valornumero2));
		$update->bindValue('cantidad',utf8_decode($cantidad));
		$update->bindValue('viajes',utf8_decode($viajes));
		$update->bindValue('radicada',utf8_decode($radicada));
		$update->bindValue('fecha_radicada',utf8_decode($nuevafecharadicada));
		$update->bindValue('factura',utf8_decode($factura));
		$update->bindValue('pagado',utf8_decode($pagado));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('campamento_id_campamento',utf8_decode($campamento_id_campamento));
		$update->bindValue('id_destino_origen',utf8_decode($id_destino_origen));
		$update->bindValue('id_destino_destino',utf8_decode($id_destino_destino));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

public static function GraficaReporteDiarioCombustible($mes){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DATE_FORMAT(fecha_reporte,'%d') as DIA, IFNULL(ROUND(SUM(cantidad),1),0) AS GL FROM reporte_combustibles WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='2021' and equipo_id_equipo<>'732' and reporte_publicado='1' GROUP by DIA");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

public static function GraficaReporteDiarioDespachoscl($mes,$cliente){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DATE_FORMAT(fecha_reporte,'%d') as DIA, IFNULL(ROUND(SUM(cantidad),1),0) AS M3 FROM reporte_despachosclientes WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='2021' and reporte_publicado='1' and cliente_id_cliente='".$cliente."' GROUP by DIA");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


public static function GraficaReporteDiarioDespachos($fechainicio15,$fechafinal15){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DATE_FORMAT(fecha_reporte,'%m') as MES, DATE_FORMAT(fecha_reporte,'%d') as DIA, IFNULL(ROUND(SUM(cantidad),1),0) AS M3 FROM reporte_despachosclientes WHERE fecha_reporte >='".$fechainicio15."' and fecha_reporte <='".$fechafinal15."' GROUP by DIA ORDER BY MES,DIA ASC");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
public static function GraficaReporteDiarioTrituradora($fechainicio15,$fechafinal15){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DATE_FORMAT(fecha_reporte,'%m') as MES, DATE_FORMAT(fecha_reporte,'%d') as DIA, IFNULL(ROUND(SUM(cantidad),1),0) AS M3 FROM reporte_despachos WHERE tipo_despacho='Trituradora' and fecha_reporte>='".$fechainicio15."' and fecha_reporte<='".$fechafinal15."' and reporte_publicado='1' GROUP by DIA ORDER BY MES,DIA ASC");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


public static function GraficaReporteDiarioPatio($fechainicio15,$fechafinal15){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DATE_FORMAT(fecha_reporte,'%m') as MES , DATE_FORMAT(fecha_reporte,'%d') as DIA, IFNULL(ROUND(SUM(cantidad),1),0) AS M3 FROM reporte_despachos WHERE tipo_despacho='A Patio' and fecha_reporte>='".$fechainicio15."' and fecha_reporte<='".$fechafinal15."' and reporte_publicado='1' GROUP by DIA ORDER BY MES,DIA ASC");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


public static function GraficaReporteDiarioVentasmatcl($mes){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DATE_FORMAT(fecha_reporte,'%d') as DIA, IFNULL(ROUND(SUM(valor_m3*cantidad),1),0) AS M3 FROM reporte_ventas WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='2021' and reporte_publicado='1' GROUP by DIA");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

public static function GraficaReporteDiarioDespachosdetallecl($cliente,$mes){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DATE_FORMAT(fecha_reporte,'%d') as DIA, IFNULL(ROUND(SUM(cantidad),1),0) AS M3 FROM reporte_despachosclientes WHERE MONTH(fecha_reporte)='".$mes."' and YEAR(fecha_reporte)='2021' and cliente_id_cliente='".$cliente."' and reporte_publicado='1' GROUP by DIA");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}




//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteHoras(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_horas WHERE reporte_publicado='1' and fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteHorasporfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_horas WHERE reporte_publicado='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR **
id, fecha_reporte, cliente_id_cliente, producto_id_producto, valor_m3, cantidad, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones
***************************************************************/
public static function guardarhoras($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO reporte_horas VALUES (NULL,:fecha_reporte,:equipo_id_equipo,:despachado_por,:punto_despacho,:recibido_por,:valor_m3, :cantidad,:indicador,:hora_inactiva,:creado_por, :estado_reporte, :reporte_publicado,:marca_temporal, :observaciones)');

		//$V1=str_replace(".","",$valor_m3);
		//$V2=str_replace(" ", "", $V1);
		//$valor_final=str_replace("$", "", $V2);
		//$valornumero=(int) $valor_final;


		//if ($punto_despacho=="Comercializadora") {
		//	$valornumero=0;
		//}
		//elseif ($punto_despacho=="Cantera 1") {
		//	$valornumero=0;
		//}

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		
		$insert->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$insert->bindValue('despachado_por',utf8_decode($despachado_por));
		$insert->bindValue('punto_despacho',utf8_decode($punto_despacho));
		$insert->bindValue('recibido_por',utf8_decode($recibido_por));
		$insert->bindValue('valor_m3',utf8_decode($valor_m3));
		$insert->bindValue('cantidad',utf8_decode($cantidad));
		$insert->bindValue('indicador',utf8_decode($indicador));
		$insert->bindValue('hora_inactiva',utf8_decode($hora_inactiva));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
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
public static function eliminarhorasPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_horas SET reporte_publicado='0' WHERE id='".$id."'");
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
public static function editarhorasPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_horas WHERE id='".$id."' and estado_reporte='1'");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
********************************************************************/
public static function actualizarhoras($id,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_horas SET
								fecha_reporte=:fecha_reporte,
								equipo_id_equipo=:equipo_id_equipo,
								despachado_por=:despachado_por,
								punto_despacho=:punto_despacho,
								recibido_por=:recibido_por,
								valor_m3=:valor_m3,
								cantidad=:cantidad,
								indicador=:indicador,
								hora_inactiva=:hora_inactiva,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								observaciones=:observaciones
								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		
		$update->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$update->bindValue('despachado_por',utf8_decode($despachado_por));
		$update->bindValue('punto_despacho',utf8_decode($punto_despacho));
		$update->bindValue('recibido_por',utf8_decode($recibido_por));
		$update->bindValue('valor_m3',utf8_decode($valornumero));
		$update->bindValue('cantidad',utf8_decode($cantidad));
		$update->bindValue('indicador',utf8_decode($indicador));
		$update->bindValue('hora_inactiva',utf8_decode($hora_inactiva));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteDespachostrituradora(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_despachos WHERE reporte_publicado='1' and tipo_despacho='Trituradora' and fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteDespachosporfechatrituradora($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_despachos WHERE reporte_publicado='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and tipo_despacho='Trituradora' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/***************************************************************
*** FUNCION PARA GUARDAR **
(id, fecha_reporte, cliente_id_cliente, producto_id_producto, equipo_id_equipo, despachado_por, transportado_por, despachador_tm, tipo_despacho, valor_m3, cantidad, viajes, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones, facturado)
***************************************************************/
public static function guardardespachotrituradora($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$valorinsumo=5600;

		$insert=$db->prepare('INSERT INTO reporte_despachos VALUES (NULL,:fecha_reporte, :cliente_id_cliente, :producto_id_producto,:equipo_id_equipo,:despachado_por,:transportado_por,:despachador_tm,:tipo_despacho, :valor_m3, :cantidad,:viajes, :creado_por, :estado_reporte, :reporte_publicado,:marca_temporal, :observaciones)');

		//$V1=str_replace(".","",$valor_m3);
		//$V2=str_replace(" ", "", $V1);
		//$valor_final=str_replace("$", "", $V2);
		//$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$insert->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
		$insert->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$insert->bindValue('despachado_por',utf8_decode($despachado_por));
		$insert->bindValue('transportado_por',utf8_decode($transportado_por));
		$insert->bindValue('despachador_tm',utf8_decode($despachador_tm));
		$insert->bindValue('tipo_despacho',utf8_decode($tipo_despacho));
		$insert->bindValue('valor_m3',utf8_decode($valorinsumo));
		$insert->bindValue('cantidad',utf8_decode($cantidad));
		$insert->bindValue('viajes',utf8_decode($viajes));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
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
public static function eliminardespachoPortrituradora($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("DELETE from reporte_despachos WHERE id='".$id."'");
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
public static function editardespachoPortrituradora($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_despachos WHERE id='".$id."' and estado_reporte='1'");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
********************************************************************/
public static function actualizardespachotrituradora($id,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_despachos SET
								fecha_reporte=:fecha_reporte,
								cliente_id_cliente=:cliente_id_cliente,
								producto_id_producto=:producto_id_producto,
								equipo_id_equipo=:equipo_id_equipo,
								despachado_por=:despachado_por,
								transportado_por=:transportado_por,
								despachador_tm=:despachador_tm,
								tipo_despacho=:tipo_despacho,
								valor_m3=:valor_m3,
								cantidad=:cantidad,
								viajes=:viajes,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								observaciones=:observaciones
								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$update->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
		$update->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$update->bindValue('despachado_por',utf8_decode($despachado_por));
		$update->bindValue('transportado_por',utf8_decode($transportado_por));
		$update->bindValue('despachador_tm',utf8_decode($despachador_tm));
		$update->bindValue('tipo_despacho',utf8_decode($tipo_despacho));
		$update->bindValue('valor_m3',utf8_decode($valornumero));
		$update->bindValue('cantidad',utf8_decode($cantidad));
		$update->bindValue('viajes',utf8_decode($viajes));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF	  **
********************************************************/
public static function combustibleporusuario($idusuario){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_combustibles
where creado_por='".$idusuario."' and reporte_publicado='1'");
    	$campos=$select->fetchAll();
		$camposs = new Reportes('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF	  **
********************************************************/
public static function obtenerListaviajesCond($usuarioconductor,$mesactual,$anoactual){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_despachosclientes WHERE despachado_por='".$usuarioconductor."' and YEAR(fecha_reporte)='".$anoactual."' and MONTH(fecha_reporte)='".$mesactual."' order by fecha_reporte DESC");
    	$campos=$select->fetchAll();
		$camposs = new Reportes('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

public static function GraficaHistorialConsumoAcpm(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT fecha_reporte,IFNULL(sum(ROUND(cantidad,2)),0) as totales FROM reporte_combustibles WHERE reporte_publicado='1' and equipo_id_equipo<>'732' GROUP BY fecha_reporte ORDER BY fecha_reporte ASC");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

public static function GraficaHistorialDespachos(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT fecha_reporte,IFNULL(sum(ROUND(cantidad,2)),0) as totales FROM reporte_despachosclientes WHERE  reporte_publicado='1'   GROUP BY fecha_reporte ORDER BY fecha_reporte ASC");
		$camposs=$select->fetchAll();
		$campos = new Reportes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
********************************************************/
public static function obtenerNombreProveedoralerta($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_proveedor FROM proveedores WHERE id_proveedor='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Reportes('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre_proveedor'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


}

?>
