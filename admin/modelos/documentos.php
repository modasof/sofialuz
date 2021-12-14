<?php
/**
* CLASE PARA TRABAJAR CON LOS MODELOS
*/
class Documentos
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
** FUNCION PARA OBTENER TODAS LAS MARCAS DEL VEHICULO	  **
********************************************************/
public static function obtenerRubros(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT id_modulo,nombre_modulo FROM modulos");
    	$campos=$select->fetchAll();
		$camposs = new Documentos('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}




/*******************************************************
** FUNCION PARA OBTENER LA MARCA DEL VEHICULO	  **
********************************************************/
public static function obtenerRubro($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_modulo FROM modulos WHERE id_modulo = '".$id."'");
    	$campo=$select->fetchAll();
    	foreach($campo as $campos){
			$marca = $campos['nombre_modulo'];
			}
		return $marca;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS	  **
********************************************************/
public static function obtenerPagina(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM documentos WHERE estado_documento='1' order by modulo_id_modulo asc");
    	$camposs=$select->fetchAll();
    	$campos = new Documentos('',$camposs);
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
		$select=$db->query("SELECT * FROM documentos WHERE id_documento='".$id."' and estado_documento='1'");
		$camposs=$select->fetchAll();
		$campos = new Documentos('',$camposs);
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
		$select=$db->query("UPDATE documentos SET estado_documento='0' WHERE id_documento='".$id."'");
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

		$update=$db->prepare('UPDATE documentos SET
								modulo_id_modulo=:modulo_id_modulo,
								nombre_documento=:nombre_documento,
								estado_documento=:estado_documento
								WHERE id=:id');

		$update->bindValue('modulo_id_modulo',$modulo_id_modulo);
		$update->bindValue('nombre_documento',$nombre_documento);
		$update->bindValue('estado_documento',$estado_documento);
		$update->bindValue('id_documento',$id_documento);
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
public static function actualizarNombre($campo,$rubro,$id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE documentos SET nombre_documento='".utf8_decode($campo)."',modulo_id_modulo='".$rubro."' WHERE id_documento='".$id."'");
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

		$insert=$db->prepare('INSERT INTO documentos VALUES (NULL,:modulo_id_modulo,:nombre_documento,:estado_documento)');

		$insert->bindValue('modulo_id_modulo',utf8_decode($modulo_id_modulo));
		$insert->bindValue('nombre_documento',utf8_decode($nombre_documento));
		$insert->bindValue('estado_documento',utf8_decode($estado_documento));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

}

?>
