<?php
/**
* CLASE PARA TRABAJAR CON LOS MODELOS
*/
class Clientes
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
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS	  **
********************************************************/
public static function obtenerPagina(){
	try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM clientes WHERE estado_cliente='1' order by nombre_cliente asc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Clientes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS	  **
********************************************************/
public static function CuentasxcobrarClientes($anoactual){
	try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM clientes  WHERE estado_cliente='1' order by nombre_cliente asc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Clientes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODAS LAS FACTURAS DE MATERIALES POR CLIENTE  **
********************************************************/
public static function CuentasxcobrarPorClientes($anoactual,$cliente){
	try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM reporte_ventas WHERE cliente_id_cliente='".$cliente."'  and reporte_publicado='1' and estado_pago='Cxc' order by fecha_reporte desc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Clientes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODAS LAS FACTURAS DE EQUIPOS POR CLIENTE  **
********************************************************/
public static function CuentasxcobrarPorClientesEquipos($anoactual,$cliente){
	try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM reporte_prestamos WHERE cliente_id_cliente='".$cliente."'  and reporte_publicado='1' and estado_pago='Cxc' order by fecha_reporte desc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Clientes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerPaginaPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM clientes WHERE id_cliente='".$id."' and estado_cliente='1'");
		$camposs=$select->fetchAll();
		$campos = new Clientes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminarPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE clientes SET estado_cliente='0' WHERE id_cliente='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/********************************************************************
*** FUNCION PARA MODIFICAR ****
********************************************************************/
public static function actualizar($id,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE clientes SET
								nombre_cliente=:nombre_cliente,
								estado_cliente=:estado_cliente
								WHERE id=:id');
		$update->bindValue('nombre_cliente',$nombre_cliente);
		$update->bindValue('estado_cliente',$estado_cliente);
		$update->bindValue('id_cliente',$id_cliente);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA ACTUALIZAR NONBRE  **
***************************************************************/
public static function actualizarNombre($campo,$id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE clientes SET nombre_cliente='".utf8_decode($campo)."' WHERE id_cliente='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/***************************************************************
*** FUNCION PARA GUARDAR **
***************************************************************/
public static function guardar($campos){
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

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function obtenerListaClientes(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM clientes WHERE estado_cliente='1' order by nombre_cliente");
    	$campos=$select->fetchAll();
		$camposs = new Equipos('',$campos);
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
public static function obtenerNombreCliente($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_cliente FROM clientes WHERE id_cliente='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre_cliente'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

public static function obtenerNombreProducto($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_producto FROM productos WHERE id_producto='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre_producto'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF	  **
********************************************************/
public static function obtenerListaClientesDespachos($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT cliente_id_cliente, sum(cantidad) as Totales FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' 
Group by cliente_id_cliente order by Totales DESC");
    	$campos=$select->fetchAll();
		$camposs = new Equipos('',$campos);
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
public static function obtenerListaClientesVentames($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT cliente_id_cliente, sum(valor_m3*cantidad) as Totales FROM reporte_ventas
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' 
Group by cliente_id_cliente order by Totales DESC");
    	$campos=$select->fetchAll();
		$camposs = new Equipos('',$campos);
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
public static function obtenerListaMaterialDespachos($cliente,$FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT producto_id_producto, sum(cantidad) as Totales FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and cliente_id_cliente='".$cliente."' 
Group by producto_id_producto order by Totales DESC");
    	$campos=$select->fetchAll();
		$camposs = new Equipos('',$campos);
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
public static function obtenerListaMaterialDespachosventas($cliente,$FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT producto_id_producto, sum(cantidad*valor_m3) as Totales FROM reporte_ventas
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and cliente_id_cliente='".$cliente."' 
Group by producto_id_producto order by Totales DESC");
    	$campos=$select->fetchAll();
		$camposs = new Equipos('',$campos);
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
public static function obtenerListaPlacasDespachos($cliente,$FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT equipo_id_equipo, sum(cantidad) as Totales FROM reporte_despachosclientes
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' and cliente_id_cliente='".$cliente."' 
Group by equipo_id_equipo order by Totales DESC");
    	$campos=$select->fetchAll();
		$camposs = new Equipos('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


}




?>
