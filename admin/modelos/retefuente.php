<?php
/**
* CLASE PARA TRABAJAR CON LOS MODELOS
*/
class Retefuente
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

		$select=$db->query("SELECT * FROM retefuente WHERE estado_retefuente='1' order by alias_retefuente asc");
    	$camposs=$select->fetchAll();
    	$campos = new Retefuente('',$camposs);
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
		$select=$db->query("SELECT * FROM retefuente WHERE id='".$id."' and estado_retefuente='1'");
		$camposs=$select->fetchAll();
		$campos = new Retefuente('',$camposs);
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
		$select=$db->query("UPDATE retefuente SET estado_retefuente='0' WHERE id='".$id."'");
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

		$update=$db->prepare('UPDATE retefuente SET
								alias_retefuente=:alias_retefuente,
								valor_retefuente=:valor_retefuente,
								estado_retefuente=:estado_retefuente
								WHERE id=:id');
		$update->bindValue('alias_retefuente',$alias_retefuente);
		$update->bindValue('valor_retefuente',$valor_retefuente);
		$update->bindValue('estado_retefuente',$estado_retefuente);
		$update->bindValue('id',$id);
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
public static function actualizarNombre($alias_retefuente,$valor_retefuente,$id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE retefuente SET alias_retefuente='".utf8_decode($alias_retefuente)."', valor_retefuente='".$valor_retefuente."' WHERE id='".$id."'");
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

		$insert=$db->prepare('INSERT INTO retefuente VALUES (NULL,:alias_retefuente,:valor_retefuente,:estado_retefuente)');

		$insert->bindValue('alias_retefuente',utf8_decode($alias_retefuente));
		$insert->bindValue('valor_retefuente',utf8_decode($valor_retefuente));
		$insert->bindValue('estado_retefuente',utf8_decode($estado_retefuente));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function obtenerListado(){
	try {
		$db=Db::getConnect();
		$sql="SELECT * FROM retefuente WHERE estado_retefuente='1' order by valor_retefuente ASC";
		$select=$db->query($sql);
		//echo($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Retefuente('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
********************************************************/
public static function obtenerNombre($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT alias_retefuente FROM retefuente WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Retefuente('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['alias_retefuente'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



}

?>
