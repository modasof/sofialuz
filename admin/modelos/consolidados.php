<?php
/**
* CLASE PARA TRABAJAR CON LOS MODELOS
*/
class Consolidados
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

/***************************************************************************************************************
								** FUNCION PARA MOSTRAR TODOS LOS CAMPOS	  **
****************************************************************************************************************/
/****************************************************************************************************************/

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS DOCUMENTOS DE CUENTAS	  **
********************************************************/
public static function Totaldocumentoscuentas(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM gestion_documental WHERE gestion_publicado='1' and imagen<>'No-Aplica' order by id_registro asc");
    	$camposs=$select->fetchAll();
    	$campos = new Consolidados('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS DOCUMENTOS DE EQUIPOS   **
***************************************************************/

public static function Totaldocumentosequipos(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM gestion_documentaleq WHERE gestion_publicado='1' and imagen<>'No-Aplica' order by id_registro asc");
    	$camposs=$select->fetchAll();
    	$campos = new Consolidados('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS REPORTES DIARIOS  **
***************************************************************/
public static function Totalreporteseq(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_equipos order by id_reporte desc");
		$camposs=$select->fetchAll();
		$campos = new Consolidados('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA OBTENER EL NOMBRE DE LA CUENTA	  **
********************************************************/
public static function obtenerNombreCuenta($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_cuenta FROM cuentas WHERE id_cuenta = '".$id."'");
    	$campo=$select->fetchAll();
    	foreach($campo as $campos){
			$marca = $campos['nombre_cuenta'];
			}
		return $marca;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER EL NOMBRE DE LA CUENTA	  **
********************************************************/
public static function obtenerNombreEquipo($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_equipo FROM equipos WHERE id_equipo = '".$id."'");
    	$campo=$select->fetchAll();
    	foreach($campo as $campos){
			$marca = $campos['nombre_equipo'];
			}
		return $marca;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER EL NOMBRE DEL DOCUMENTO	  **
********************************************************/
public static function obtenerNombreDocumento($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_documento FROM documentos WHERE id_documento = '".$id."'");
    	$campo=$select->fetchAll();
    	foreach($campo as $campos){
			$marca = $campos['nombre_documento'];
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
    	$campos = new Consolidados('',$camposs);
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
		$campos = new Consolidados('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}




}

?>
