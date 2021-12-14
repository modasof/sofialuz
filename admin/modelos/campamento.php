<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/

class Campamento
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

		$select=$db->query("SELECT * FROM campamento");
    	$camposs=$select->fetchAll();
    	$campos = new Campamento('',$camposs);
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
		$select=$db->query("SELECT * FROM campamento WHERE id_campamento='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Campamento('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CAMPAMENTOS	  **
********************************************************/
public static function obtenerListaCampamentos(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM campamento  order by nombre_campamento");
    	$campos=$select->fetchAll();
		$camposs = new Equipos('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
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
		$select=$db->query("DELETE FROM campamento WHERE id_campamento='".$id."'");
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
/*
public static function guardar($campo){
	try {
		$db=Db::getConnect();
		$select=$db->query("INSERT INTO campamento(nombre_campamento, ciudad_campamento, direccion_campamento, responsable_campamento) VALUES('".$campo."')");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
*/


/********************************************************************
*** FUNCION PARA MODIFICAR ****
********************************************************************/
public static function actualizar($id,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE campamento SET
								nombre_campamento=:nombre_campamento,
								ciudad_campamento=:ciudad_campamento,
								direccion_campamento=:direccion_campamento,
								responsable_campamento=:responsable_campamento
								WHERE id_campamento=:id_campamento');

		$update->bindValue('ciudad_campamento',$ciudad_campamento);
		$update->bindValue('direccion_campamento',$direccion_campamento);
		$update->bindValue('responsable_campamento',$responsable_campamento);
		$update->bindValue('nombre_campamento',$nombre_campamento);
		$update->bindValue('id_campamento',$id);
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

		$insert=$db->prepare('INSERT INTO campamento VALUES (NULL,:nombre_campamento, :ciudad_campamento, :direccion_campamento, :responsable_campamento)');

		$insert->bindValue('ciudad_campamento',$ciudad_campamento);
		$insert->bindValue('direccion_campamento',$direccion_campamento);
		$insert->bindValue('responsable_campamento',$responsable_campamento);
		$insert->bindValue('nombre_campamento',$nombre_campamento);
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
********************************************************/
public static function obtenerNombreCampamento($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_campamento FROM campamento WHERE id_campamento='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Campamento('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre_campamento'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

}

?>
