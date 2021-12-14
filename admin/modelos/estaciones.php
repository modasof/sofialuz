<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/

class Estaciones
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
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS	  **
********************************************************/
public static function obtenerPagina(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM estaciones");
    	$camposs=$select->fetchAll();
    	$campos = new Estaciones('',$camposs);
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
		$select=$db->query("SELECT * FROM estaciones WHERE id_estacion='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Estaciones('',$camposs);
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
		$select=$db->query("DELETE FROM estaciones WHERE id_estacion='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA INSERTAR  **
***************************************************************/
public static function guardarNombre($campo){
	try {
		$db=Db::getConnect();
		$select=$db->query("INSERT INTO estaciones(nombre_estacion) VALUES('".$campo."')");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/***************************************************************
** FUNCION PARA ACTUALIZAR NONBRE  **
***************************************************************/
public static function actualizarNombre($campo,$id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE estaciones SET nombre_estacion='".$campo."' WHERE id_estacion='".$id."'");
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

		$update=$db->prepare('UPDATE estaciones SET
								nombre_estacion=:nombre_estacion
								WHERE id_estacion=:id_estacion');

		$update->bindValue('nombre_estacion',$nombre_estacion);
		$update->bindValue('id_estacion',$id_estacion);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************/
/***************************************************************
*** FUNCION PARA GUARDAR **
***************************************************************/
public static function guardar($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO estaciones VALUES (NULL,:nombre_estacion,:estado_estacion)');

		
		$insert->bindValue('nombre_estacion',utf8_decode($nombre_estacion));
		$insert->bindValue('estado_estacion',utf8_decode($estado_estacion));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF	  **
********************************************************/
public static function obtenerListaEstaciones(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM estaciones WHERE estado_estacion='1' order by nombre_estacion");
    	$campos=$select->fetchAll();
		$camposs = new Estaciones('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL DOCUMENTO **
********************************************************/
public static function ObtenerNombreEstacion($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_estacion FROM estaciones WHERE id_estacion='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Estaciones('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['nombre_estacion'];
		}
		return $lacaja;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


}

?>
