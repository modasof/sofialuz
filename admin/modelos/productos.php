<?php
/**
* CLASE PARA TRABAJAR CON LOS MODELOS
*/
class Productos
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
		$consulta="SELECT * FROM productos WHERE estado_producto='1' order by nombre_producto asc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Productos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS	  **
********************************************************/
public static function obtenerPaginaInformeventas(){
	try {
		$db=Db::getConnect();
		$consulta="SELECT DISTINCT(B.id_producto),B.nombre_producto FROM reporte_ventas as A, productos as B WHERE A.reporte_publicado='1' and A.producto_id_producto=B.id_producto and B.nombre_producto<>'Aporte Socios' order by nombre_producto asc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Productos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS	  **
********************************************************/
public static function obtenerPaginaInformeventascxc(){
	try {
		$db=Db::getConnect();
		$consulta="SELECT DISTINCT(B.id_producto),B.nombre_producto FROM reporte_ventas as A, productos as B WHERE A.reporte_publicado='1' and A.producto_id_producto=B.id_producto and A.estado_pago='Cxc' order by nombre_producto asc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Productos('',$camposs);
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
		$select=$db->query("SELECT * FROM productos WHERE id_producto='".$id."' and estado_producto='1'");
		$camposs=$select->fetchAll();
		$campos = new Productos('',$camposs);
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
		$select=$db->query("UPDATE productos SET estado_producto='0' WHERE id_producto='".$id."'");
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

		$update=$db->prepare('UPDATE productos SET
								nombre_producto=:nombre_producto,
								estado_producto=:estado_producto
								WHERE id=:id');
		$update->bindValue('nombre_producto',$nombre_producto);
		$update->bindValue('estado_producto',$estado_producto);
		$update->bindValue('id_producto',$id_producto);
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
		$select=$db->query("UPDATE productos SET nombre_producto='".utf8_decode($campo)."' WHERE id_producto='".$id."'");
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

		$estado_producto = 1;
		$insumos_producto = 0;

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

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function obtenerListaProductos(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM productos WHERE estado_producto='1' order by nombre_producto");
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

}

?>
