<?php
/**
* CLASE PARA TRABAJAR CON LOS MODELOS
*/
class Subrubros
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
		$select=$db->query("SELECT id_rubro,nombre_rubro FROM rubros");
    	$campos=$select->fetchAll();
		$camposs = new Subrubros('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER TODAS LAS MARCAS DEL VEHICULO	  **
********************************************************/
public static function obtenerSubRubros(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT id_subrubro,nombre_subrubro FROM subrubros order by nombre_subrubro");
    	$campos=$select->fetchAll();
		$camposs = new Subrubros('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER TODAS LAS MARCAS DEL VEHICULO	  **
********************************************************/
public static function obtenerSubRubroscuentasporpagar(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT id_subrubro,nombre_subrubro FROM subrubros WHERE activado_cxp='1' and estado_subrubro='1' order by nombre_subrubro");
    	$campos=$select->fetchAll();
		$camposs = new Subrubros('',$campos);
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
		$select=$db->query("SELECT nombre_rubro FROM rubros WHERE id_rubro = '".$id."'");
    	$campo=$select->fetchAll();
    	foreach($campo as $campos){
			$marca = $campos['nombre_rubro'];
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

		$select=$db->query("SELECT * FROM subrubros WHERE estado_subrubro='1' order by rubro_id_rubro asc");
    	$camposs=$select->fetchAll();
    	$campos = new Subrubros('',$camposs);
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
		$select=$db->query("SELECT * FROM subrubros WHERE id_subrubro='".$id."' and estado_subrubro='1'");
		$camposs=$select->fetchAll();
		$campos = new Subrubros('',$camposs);
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
		$select=$db->query("UPDATE subrubros SET estado_subrubro='0' WHERE id_subrubro='".$id."'");
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

		$update=$db->prepare('UPDATE subrubros SET
								rubro_id_rubro=:rubro_id_rubro,
								nombre_subrubro=:nombre_subrubro,
								estado_subrubro=:estado_subrubro,
								activado_cxp=:activado_cxp
								WHERE id=:id');

		$update->bindValue('rubro_id_rubro',$rubro_id_rubro);
		$update->bindValue('nombre_subrubro',$nombre_subrubro);
		$update->bindValue('estado_subrubro',$estado_subrubro);
		$update->bindValue('activado_cxp',$activado_cxp);
		$update->bindValue('id_subrubro',$id_subrubro);
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
		$select=$db->query("UPDATE subrubros SET nombre_subrubro='".utf8_decode($campo)."',rubro_id_rubro='".$rubro."' WHERE id_subrubro='".$id."'");
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

		$insert=$db->prepare('INSERT INTO subrubros VALUES (NULL,:rubro_id_rubro,:nombre_subrubro,:estado_subrubro,:activado_cxp)');

		$insert->bindValue('rubro_id_rubro',utf8_decode($rubro_id_rubro));
		$insert->bindValue('nombre_subrubro',utf8_decode($nombre_subrubro));
		$insert->bindValue('estado_subrubro',utf8_decode($estado_subrubro));
		$insert->bindValue('activado_cxp',utf8_decode($activado_cxp));
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
public static function obtenerNombreSubrubro($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_subrubro FROM subrubros WHERE id_subrubro='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre_subrubro'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function desactivarmenuPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE subrubros SET activado_cxp='0' WHERE id_subrubro='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA  DESACTIVAR PERMISO POR ID  **
***************************************************************/
public static function activarmenuPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE subrubros SET activado_cxp='1' WHERE id_subrubro='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


}

?>
