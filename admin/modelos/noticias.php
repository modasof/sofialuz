<?php
/**
* CLASE PARA TRABAJAR CON LOS TESTIMONIOS
*/
class Noticias
{
    private $id;
    private $campos; //devuelve todos los campos de la tabla


	function __construct($id,$campos)
	{
        $this->setId($id);
        $this->setCampos($campos);
	}

	/************************************************************************************
	** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA TESTIMONIOS       ***
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
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE NOTICIAS	  **
********************************************************/
public static function obtenerPagina(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM noticias ORDER BY fecha DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Noticias('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE NOTICIAS	  **
********************************************************/
public static function obtenerNoticias3(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM noticias ORDER BY fecha DESC LIMIT 3");
    	$camposs=$select->fetchAll();
    	$campos = new Noticias('',$camposs);
    	$camposs = $campos->getCampos();
		return $camposs;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE NOTICIAS	  **
********************************************************/
public static function obtenerNoticias2(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM noticias ORDER BY fecha DESC LIMIT 2");
    	$camposs=$select->fetchAll();
    	$campos = new Noticias('',$camposs);
    	$camposs = $campos->getCampos();
		return $camposs;
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
		$select=$db->query("SELECT * FROM noticias WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Noticias('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerCategoriaPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM categorianoticias WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Noticias('',$camposs);
		$campos = $campos->getCampos();
		foreach($campos as $campo){
			$camposs = $campo['categoria'];
		}
		return $camposs;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerCategoria(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM categorianoticias");
		$camposs=$select->fetchAll();
		$campos = new Noticias('',$camposs);
		$campos = $campos->getCampos();
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerTagPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM tags WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Noticias('',$camposs);
		$campos = $campos->getCampos();
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
		$select=$db->query("DELETE FROM noticias WHERE id='".$id."'");
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
public static function actualizar($id,$campos,$imagen1,$imagen2,$imagen3){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE noticias SET
								imagen1=:imagen1,
								imagen2=:imagen2,
								imagen3=:imagen3,
								titulo=:titulo,
								noticia=:noticia,
								id_categoria=:id_categoria
								WHERE id=:id');

		$update->bindValue('imagen1',$imagen1);
		$update->bindValue('imagen2',$imagen2);
		$update->bindValue('imagen3',$imagen3);
		$update->bindValue('titulo',$titulo);
		$update->bindValue('noticia',$noticia);
		$update->bindValue('id_categoria',$id_categoria);
		$update->bindValue('id',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR INFORMACIÓN DE LA TABLA TESTIMONIOS	****
***************************************************************/
public static function guardar($campos,$imagen1,$imagen2,$imagen3){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO noticias (id,imagen1,imagen2,imagen3,titulo,noticia,id_categoria,id_tag,visitas,fecha) VALUES (NULL,:imagen1,:imagen2,:imagen3,:titulo,:noticia,:id_categoria,"0",0,NOW())');
		$insert->bindValue('imagen1',$imagen1);
		$insert->bindValue('imagen2',$imagen2);
		$insert->bindValue('imagen3',$imagen3);
		$insert->bindValue('titulo',$titulo);
		$insert->bindValue('noticia',$noticia);
		$insert->bindValue('id_categoria',$id_categoria);
		$insert->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}
}

?>
