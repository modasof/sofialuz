<?php
/**
* CLASE PARA TRABAJAR CON LAS FUNCIONES
*/
class Estadosreq
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

		$select=$db->query("SELECT * FROM estadosreq WHERE publicado='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Estadosreq('',$camposs);
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
		$select=$db->query("SELECT * FROM estadosreq WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Estadosreq('',$camposs);
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
		$select=$db->query("UPDATE estadosreq SET publicado='0' WHERE id='".$id."'");
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

		$update=$db->prepare('UPDATE estadosreq SET
								nombre=:nombre,
								publicado=:publicado,
								color=:color,
								prioridad=:prioridad
								WHERE id=:id');

		$update->bindValue('nombre',$nombre);
		$update->bindValue('publicado',$publicado);
		$update->bindValue('color',$color);
		$update->bindValue('prioridad',$prioridad);
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

		$insert=$db->prepare('INSERT INTO estadosreq VALUES (NULL,:nombre,:publicado,:prioridad,:color)');

		$insert->bindValue('nombre',$nombre);
		$insert->bindValue('publicado',$publicado);
		$insert->bindValue('prioridad',$prioridad);
		$insert->bindValue('color',$color);

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
public static function obtenerNombre($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre FROM estadosreq WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Estadosreq('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
********************************************************/
public static function obtenerColor($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT color FROM estadosreq WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Estadosreq('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['color'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function ObtenerListaEstados(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM estadosreq WHERE publicado='1' and id<=7 order by prioridad");
    	$campos=$select->fetchAll();
		$camposs = new Estadosreq('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function ObtenerListaCentrodistribucion(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM estadosreq WHERE publicado='1' and id>= 12 and id<=14 order by prioridad");
    	$campos=$select->fetchAll();
		$camposs = new Estadosreq('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function ObtenerListaEstadosmov(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM estadosreq WHERE publicado='1'  and id<>'1' and id<>'2' and id<>'3' and id<>'4' and id<>'5' and id<>'7' and id<>'8' and id<>'9' and id<>'10' and id<>'11'  order by prioridad");
    	$campos=$select->fetchAll();
		$camposs = new Estadosreq('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function ObtenerListaEstadosaprobaciones(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM estadosreq WHERE id<>'1' and id<>'2'and id<>'3' and id<>'6'and id<>'7' and id<>'9'and id<>'10' and id<>'11' and publicado='1' order by prioridad");
    	$campos=$select->fetchAll();
		$camposs = new Estadosreq('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function ObtenerListaEstadosadmin(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM estadosreq WHERE id<>'2' and id<>'3' and id<>'4'and id<>'5' and id<>'9'and id<>'10' and id<>'11' order by prioridad");
    	$campos=$select->fetchAll();
		$camposs = new Estadosreq('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

}

?>
