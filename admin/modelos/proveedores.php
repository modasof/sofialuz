<?php
/**
* CLASE PARA TRABAJAR CON LOS MODELOS
*/
class Proveedores
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
		$consulta="SELECT * FROM proveedores WHERE estado_proveedor='1' order by nombre_proveedor asc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Proveedores('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR LOS INSUMOS PENDIENTES X PAGAR	  **
********************************************************/
public static function ListaInsumoscuentasxpagar(){
	try {
		$db=Db::getConnect();
		$consulta="SELECT DISTINCT(B.proveedor_id_proveedor),A.nombre_proveedor FROM proveedores AS A, reporte_compras as B WHERE estado_proveedor='1' and reporte_publicado='1' and estado_reporte='2' and A.id_proveedor=B.proveedor_id_proveedor order by nombre_proveedor asc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Proveedores('',$camposs);
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
		$select=$db->query("SELECT * FROM proveedores WHERE id_proveedor='".$id."' and estado_proveedor='1'");
		$camposs=$select->fetchAll();
		$campos = new Proveedores('',$camposs);
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
		$select=$db->query("UPDATE proveedores SET estado_proveedor='0' WHERE id_proveedor='".$id."'");
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

		$update=$db->prepare('UPDATE proveedores SET
								nombre_proveedor=:nombre_proveedor,
								estado_proveedor=:estado_proveedor,
								nit=:nit,
								contacto=:contacto,
								telefonos=:telefonos,
								correo=:correo
								WHERE id_proveedor=:id_proveedor');
		$update->bindValue('nombre_proveedor',$nombre_proveedor);
		$update->bindValue('estado_proveedor',$estado_proveedor);
		$update->bindValue('nit',$nit);
		$update->bindValue('contacto',$contacto);
		$update->bindValue('telefonos',$telefonos);
		$update->bindValue('correo',$correo);
		$update->bindValue('id_proveedor',utf8_decode($id));
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
public static function actualizarNombre($campo,$nit,$contacto,$id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE proveedores SET nombre_proveedor='".utf8_decode($campo)."',nit='".$nit.",contacto='".$contacto."' WHERE id_proveedor='".$id."'");
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

		$insert=$db->prepare('INSERT INTO proveedores VALUES (NULL,:nombre_proveedor,:estado_proveedor,:nit,:contacto,:telefonos,:correo)');

		
		$insert->bindValue('nombre_proveedor',utf8_decode($nombre_proveedor));
		$insert->bindValue('estado_proveedor',utf8_decode($estado_proveedor));
		$insert->bindValue('nit',utf8_decode($nit));
		$insert->bindValue('contacto',utf8_decode($contacto));
		$insert->bindValue('telefonos',utf8_decode($telefonos));
		$insert->bindValue('correo',utf8_decode($correo));
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
public static function obtenerListaProveedores(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM proveedores WHERE estado_proveedor='1' order by nombre_proveedor");
    	$campos=$select->fetchAll();
		$camposs = new Proveedores('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
********************************************************/
public static function obtenerNombreProveedor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_proveedor FROM proveedores WHERE id_proveedor='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Proveedores('',$camposs);
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

/*******************************************************
** FUNCION PARA MOSTRAR TOTAL DE ABONOS **
********************************************************/
public static function obtenerAbonos($proveedor){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(sum(B.valor_abono),0) as abonos FROM reporte_compras as A, reporte_abonos as B WHERE A.proveedor_id_proveedor='".$proveedor."' and A.id=B.reporte_id_cuentaxpagar");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['abonos'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


}

?>
