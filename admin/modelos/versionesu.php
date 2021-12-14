<?php
/**
* CLASE PARA TRABAJAR CON LAS FUNCIONES
*/
class Versiones
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

		$select=$db->query("SELECT * FROM versionesu");
    	$camposs=$select->fetchAll();
    	$campos = new Versiones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS	  **
********************************************************/
public static function obtenerMarcas(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM marcasu");
    	$camposs=$select->fetchAll();
    	$campos = new Versiones('',$camposs);
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
		$select=$db->query("SELECT * FROM versionesu WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Versiones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerModeloPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM modelosu WHERE id='".$id."'");
		$res = "";
		$camposs=$select->fetchAll();
		$campos = new Versiones('',$camposs);
		$campos = $campos->getCampos();
		foreach ($campos as $mostrar){
			$res = $mostrar['modelo'];
		}
		return $res;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerMarcaPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM marcasu WHERE id='".$id."'");
		$res = "";
		$camposs=$select->fetchAll();
		$campos = new Versiones('',$camposs);
		$campos = $campos->getCampos();
		foreach ($campos as $mostrar){
			$res = $mostrar['marca'];
		}
		return $res;
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
		$select=$db->query("DELETE FROM versionesu WHERE id='".$id."'");
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

		$update=$db->prepare('UPDATE versionesu SET
								id_modelo=:id_modelo,
								id_marca=:id_marca,
								version=:version
								WHERE id=:id');
		$update->bindValue('id_marca',$id_marca);
		$update->bindValue('id_modelo',$id_modelo);
		$update->bindValue('version',$version);
		$update->bindValue('id',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
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

		$insert=$db->prepare('INSERT INTO versionesu VALUES (NULL,:id_modelo,:id_marca,:version)');

		$insert->bindValue('id_modelo',$id_modelo);
		$insert->bindValue('id_marca',$id_marca);
		$insert->bindValue('version',$version);
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

}

?>
