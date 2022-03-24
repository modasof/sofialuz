<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/
class requisiciones
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


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function todosporusuario($id){
	try {
		$db=Db::getConnect();
		$sql="SELECT * FROM requisiciones_items WHERE usuario_creador='".$id."' and estado_item='1' order by fecha_reporte DESC";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function todosalmacen(){
	try {
		$db=Db::getConnect();
		$sql="SELECT * FROM requisiciones_items WHERE estado_item='1' order by fecha_reporte DESC";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function cotizaciones(){
	try {
		$db=Db::getConnect();
		$sql="SELECT DISTINCT(proveedor_id_proveedor) FROM cotizaciones_item WHERE estado_cotizacion='1' order by id DESC";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function vercotizacion($id){
	try {
		$db=Db::getConnect();
		$sql="SELECT A.id, A.proveedor_id_proveedor, A.cotizacion, A.medio_pago, A.item_id, A.valor_cot, A.requisicion_id, A.marca_temporal, A.usuario_creador, A.estado_cotizacion, A.ordencompra_num, B.insumo_id_insumo,B.cantidad,A.cantidadcot,A.servicio_id_servicio,B.equipo_id_equipo FROM cotizaciones_item as A, requisiciones_items as B WHERE estado_cotizacion='1' and proveedor_id_proveedor='".$id."' and A.item_id=B.id order by id DESC";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function vermascotizaciones($iditem,$proveedor){
	try {
		$db=Db::getConnect();
		$sql="SELECT A.id, A.proveedor_id_proveedor, A.cotizacion, A.medio_pago, A.item_id, A.valor_cot, A.requisicion_id, A.marca_temporal, A.usuario_creador, A.estado_cotizacion, A.ordencompra_num, B.insumo_id_insumo,B.cantidad,A.cantidadcot,A.servicio_id_servicio,B.equipo_id_equipo FROM cotizaciones_item as A, requisiciones_items as B WHERE estado_cotizacion='1' and proveedor_id_proveedor<>'".$proveedor."' and A.item_id='".$iditem."' and A.item_id=B.id order by id DESC";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function todosporusuarioadmin(){
	try {
		$db=Db::getConnect();
		$sql="SELECT * FROM requisiciones_items WHERE estado_item='1' order by fecha_reporte DESC";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
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
		$sql="SELECT * FROM requisiciones WHERE fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE() order by fecha_reporte DESC";
		$select=$db->query($sql);
		//echo ($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function pendienteaprobarpor($area){
	try {
		$db=Db::getConnect();
		$sql="SELECT * FROM requisiciones WHERE ".$area."  and requisicion_publicada ='1' order by fecha_reporte DESC";
		$select=$db->query($sql);
		//echo ($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}






/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function todosuser($id){
	try {
		$db=Db::getConnect();
		$sql="SELECT * FROM requisiciones WHERE solicitado_por='".$id."'order by fecha_reporte DESC";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
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

		$select=$db->query("SELECT * FROM requisiciones WHERE  fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function porfechauser($FechaStart,$FechaEnd,$id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM requisiciones WHERE solicitado_por='".$id."' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/***************************************************************
*** FUNCION PARA GUARDAR **
INSERT INTO `requisiciones`(`id`, `imagen`, `fecha_reporte`, `solicitado_por`, `requisicion_num`, `cliente_id_cliente`, `proyecto_id_proyecto`, `marca_temporal`, `usuario_creador`, `requisicion_publicada`, `estado_id_requisicion`, `observaciones`)
***************************************************************/
public static function guardar($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

	$insert=$db->prepare('INSERT INTO requisiciones VALUES (NULL,:fecha_reporte,:solicitado_por,:requisicion_num,:cliente_id_cliente,:proyecto_id_proyecto,:marca_temporal,:usuario_creador,:requisicion_publicada,:estado_id_requisicion,:observaciones,:tipo_requisicion,:rq_area,:rubro_id,:subrubro_id)');

		
		date_default_timezone_set("America/Bogota");
		$nuevafecha = date('Y-m-d');

		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('solicitado_por',utf8_decode($solicitado_por));
		$insert->bindValue('requisicion_num',utf8_decode($requisicion_num));
		$insert->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$insert->bindValue('proyecto_id_proyecto',utf8_decode($proyecto_id_proyecto));
		$insert->bindValue('usuario_creador',utf8_decode($usuario_creador));
		$insert->bindValue('estado_id_requisicion',utf8_decode($estado_id_requisicion));
		$insert->bindValue('requisicion_publicada',utf8_decode($requisicion_publicada));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		$insert->bindValue('tipo_requisicion',utf8_decode($tipo_requisicion));
		$insert->bindValue('rq_area',utf8_decode($rq_area));
		$insert->bindValue('rubro_id',utf8_decode($rubro_id));
		$insert->bindValue('subrubro_id',utf8_decode($subrubro_id));
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
public static function eliminaritemcot($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE cotizaciones_item SET estado_cotizacion='0' WHERE id='".$id."'");
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
public static function eliminarpor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE requisiciones SET requisicion_publicada='0' WHERE id='".$id."'");
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
public static function eliminaritemsRQpor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM requisiciones_items WHERE requisicion_id='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA ACTUALIZAR TODOS LOS ITEM POR ID  **
***************************************************************/
public static function actualizaritems($id,$estado_id_requisicion){
	try {
		$db=Db::getConnect();
		
		$update=$db->prepare('UPDATE requisiciones_items SET
								estado_item=:estado_item
								WHERE requisicion_id=:id');
	
		$update->bindValue('estado_item',utf8_decode($estado_id_requisicion));
		$update->bindValue('id',utf8_decode($id));
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuraciónes ":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function editarrequisicionesPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM requisiciones WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
* (`id`, `imagen`, `fecha_reporte`, `solicitado_por`, `requisicion_num`, `cliente_id_cliente`, `proyecto_id_proyecto`, `marca_temporal`, `usuario_creador`, `requisicion_publicada`, `estado_id_requisicion`, `observaciones`)
********************************************************************/
public static function actualizar($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE requisiciones SET
								imagen=:imagen,
								fecha_reporte=:fecha_reporte,
								solicitado_por=:solicitado_por,
								requisicion_num=:requisicion_num,
								cliente_id_cliente=:cliente_id_cliente,
								proyecto_id_proyecto=:proyecto_id_proyecto,
								usuario_creador=:usuario_creador,
								estado_id_requisicion=:estado_id_requisicion,
								requisicion_publicada=:requisicion_publicada,
								marca_temporal=:marca_temporal,
								observaciones=:observaciones
								WHERE id=:id');
		
		
		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',utf8_decode($imagen));
		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('solicitado_por',utf8_decode($solicitado_por));
		$update->bindValue('requisicion_num',utf8_decode($requisicion_num));
		$update->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$update->bindValue('proyecto_id_proyecto',utf8_decode($proyecto_id_proyecto));
		$update->bindValue('usuario_creador',utf8_decode($usuario_creador));
		$update->bindValue('estado_id_requisicion',utf8_decode($estado_id_requisicion));
		$update->bindValue('requisicion_publicada',utf8_decode($requisicion_publicada));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuraciónes ":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL ULTIMO USUARIO CREADO **
********************************************************/
public static function obtenerUltimo(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT id FROM requisiciones ORDER BY id DESC LIMIT 1");
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
    	$rubros = $campos->getCampos();
		foreach($rubros as $nrubro){
			$elrubro = $nrubro['id'];
		}
		return $elrubro;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function todosporreq($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM requisiciones_items WHERE requisicion_id='".$id."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function todosporusuarioestado($id,$estado){
	try {
		$db=Db::getConnect();
		$sql="SELECT * FROM requisiciones_items WHERE usuario_creador='".$id."' and estado_item='".$estado."'order by fecha_reporte DESC";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function reqalmacenestado($estado){
	try {
		$db=Db::getConnect();
		$sql="SELECT * FROM requisiciones_items WHERE estado_item='".$estado."'order by fecha_reporte DESC";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function todosporusuarioestadoadmin($estado){
	try {
		$db=Db::getConnect();
		$sql="SELECT * FROM requisiciones_items WHERE estado_item='".$estado."'order by fecha_reporte DESC";
		//echo($sql);
		$select=$db->query($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
********************************************************/
public static function nomproyecto($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_proyecto FROM proyectos WHERE id_proyecto='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre_proyecto'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
********************************************************/
public static function obtenerIdproyecto($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT proyecto_id_proyecto FROM salidas_ins WHERE id_salida_ins='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['proyecto_id_proyecto'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
********************************************************/
public static function obtenerIdproyectoporRQ($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT proyecto_id_proyecto FROM  requisiciones WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['proyecto_id_proyecto'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
********************************************************/
public static function obtenerIdCreadoporRQ($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT solicitado_por FROM  requisiciones WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['solicitado_por'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


}

?>
