<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/
class Formatos
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
public static function obtenerPagina($modulo){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM formatos WHERE id_modulo='".$modulo."' and midocumento_publicado='1' ");
    	$camposs=$select->fetchAll();
    	$campos = new Misdocumentos('',$camposs);
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
		$select=$db->query("SELECT * FROM formatos WHERE id_midocumento='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Misdocumentos('',$camposs);
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
		$select=$db->query("UPDATE formatos set midocumento_publicado='0' WHERE id_midocumento='".$id."'");
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
id_midocumento, id_usuario, nombre_documento, imagen, fecha_expira,alerta, marca_temporal, creado_por, estado_midocumento, midocumento_publicado
********************************************************************/
public static function actualizar($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE formatos SET
								imagen=:imagen,
								id_modulo=:id_modulo,
								nombre_documento=:nombre_documento,
								fecha_expira=:fecha_expira,
								alerta=:alerta,
								marca_temporal=:marca_temporal,
								creado_por=:creado_por
								WHERE id_midocumento=:id_midocumento');

		$t = strtotime($fecha_expira);
		$nuevafecha=date('y-m-d',$t);
 		
		$update->bindValue('imagen',utf8_decode($imagen));
		$update->bindValue('id_modulo',utf8_decode($id_modulo));
		$update->bindValue('nombre_documento',utf8_decode($nombre_documento));
		$update->bindValue('fecha_expira',utf8_decode($nuevafecha));
		$update->bindValue('alerta',utf8_decode($alerta));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		
		$update->bindValue('id_midocumento',utf8_decode($id));
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR **
id_midocumento, id_usuario, nombre_documento, imagen, fecha_expira,alerta, marca_temporal, creado_por, estado_midocumento, midocumento_publicado
***************************************************************/
public static function guardar($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO formatos VALUES (NULL,:id_modulo, :nombre_documento, :imagen, :fecha_expira,:alerta, :marca_temporal, :creado_por, :estado_midocumento, :midocumento_publicado)');

		$t = strtotime($fecha_expira);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('id_modulo',utf8_decode($id_modulo));
		$insert->bindValue('nombre_documento',utf8_decode($nombre_documento));
		$insert->bindValue('imagen',utf8_decode($imagen));
		$insert->bindValue('fecha_expira',utf8_decode($nuevafecha));
		$insert->bindValue('alerta',utf8_decode($alerta));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('estado_midocumento',utf8_decode($estado_midocumento));
		$insert->bindValue('midocumento_publicado',utf8_decode($midocumento_publicado));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

}

?>
