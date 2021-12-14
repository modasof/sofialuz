<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/
class Gestiondocumentaleq
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
** FUNCION PARA MOSTRAR LA LISTA DE CUENTAS	  **
********************************************************/
public static function obtenerListaequipos(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' ");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR LA LISTA DE DOCUMENTOS	  **
********************************************************/
public static function obtenerListaArchivos($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM documentos WHERE estado_documento='1' and modulo_id_modulo='".$id."' ");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS DOCUMENTOS PREDETERMINADOS	  **
********************************************************/
public static function obtenerPagina($id_modulo){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM documentos WHERE modulo_id_modulo='".$id_modulo."' and estado_documento='1' ");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS DOCUMENTOS NO DISPONIBLES 	  **
********************************************************/
public static function obtenerNodisponibles($cuenta){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM gestion_documentaleq WHERE imagen='No-Aplica' and cuenta_id_cuenta='".$cuenta."'");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS DOCUMENTOS VARIOS	  **
********************************************************/
public static function obtenerPaginavarios($cuenta){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM documentos_varioseq WHERE cuenta_id_cuenta='".$cuenta."' and midocumento_publicado='1' ");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS	  **
********************************************************/
public static function obtenerConfig($id_modulo){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM documentos WHERE modulo_id_modulo='".$id_modulo."' and estado_documento='1' ");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LA LISTA DE LAS CUENTAS	 		 **
********************************************************/
public static function obtenerCuentas(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cuentas WHERE cuenta_publicada='1' order by nombre_cuenta asc");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
    	$marcas = $campos->getCampos();
		return $marcas;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LA LISTA DE LOS EQUIPOS	 		 **
********************************************************/
public static function obtenerEquipos(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' order by nombre_equipo asc");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
    	$marcas = $campos->getCampos();
		return $marcas;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR LA LISTA DE DOCUMENTOS	 		 **
********************************************************/
public static function obtenerDocumentos($modulo_gestion){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM documentos WHERE modulo_id_modulo='".$modulo_gestion."' and estado_documento='1' order by nombre_documento asc");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
    	$marcas = $campos->getCampos();
		return $marcas;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL DOCUMENTO **
********************************************************/
public static function ObtenerNombredocumento($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_documento FROM documentos WHERE id_documento='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['nombre_documento'];
		}
		return $lacaja;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DE LA CUENTA**
********************************************************/
public static function ObtenerNombrecuenta($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_cuenta FROM cuentas WHERE id_cuenta='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['nombre_cuenta'];
		}
		return $lacaja;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEl EQUIPO**
********************************************************/
public static function ObtenerNombreEquipo($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_equipo FROM equipos WHERE id_equipo='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['nombre_equipo'];
		}
		return $lacaja;
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
		$select=$db->query("SELECT * FROM gestion_documentaleq WHERE id_registro='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Gestiondocumentaleq('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerPaginavariosPor($id){
	$id_cuenta=$_GET['id_cuenta'];
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM documentos_varioseq WHERE id_midocumento='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Gestiondocumentaleq('',$camposs);
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
		$select=$db->query("DELETE FROM gestion_documentaleq WHERE id_registro='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA ELIINAR VARIOS POR ID  **
***************************************************************/
public static function eliminarvariosPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE documentos_varioseq set midocumento_publicado='0' WHERE id_midocumento='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


public static function desactivarDocumento($cuenta,$modulo,$documento,$imagen){
	try {
		$db=Db::getConnect();
		$consulta="INSERT INTO gestion_documentaleq (cuenta_id_cuenta,modulo_id_modulo,documento_id_documento,imagen) VALUES ('".$cuenta."','".$modulo."','".$documento."','".$imagen."')";
		$select=$db->query($consulta);
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
public static function actualizar($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE gestion_documentaleq SET
								imagen=:imagen,
								documento_id_documento=:documento_id_documento,
								modulo_id_modulo=:modulo_id_modulo,
								cuenta_id_cuenta=:cuenta_id_cuenta,
								alerta=:alerta,
								fecha_expiracion=:fecha_expiracion,
								marca_temporal=:marca_temporal,
								creado_por=:creado_por
								WHERE id_registro=:id_registro');
		$t = strtotime($fecha_expiracion);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',utf8_decode($imagen));
		$update->bindValue('documento_id_documento',utf8_decode($documento_id_documento));
		$update->bindValue('modulo_id_modulo',utf8_decode($modulo_id_modulo));
		$update->bindValue('cuenta_id_cuenta',utf8_decode($cuenta_id_cuenta));
		$update->bindValue('alerta',utf8_decode($alerta));
		$update->bindValue('fecha_expiracion',utf8_decode($nuevafecha));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('id_registro',utf8_decode($id));
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR VARIOS ****
`id_midocumento`, `cuenta_id_cuenta`, `nombre_documento`, `imagen`, `fecha_expira`, `alerta`, `marca_temporal`, `creado_por`, `estado_midocumento`, `midocumento_publicado`
********************************************************************/
public static function actualizarvarios($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE documentos_varioseq SET
								cuenta_id_cuenta=:cuenta_id_cuenta,
								nombre_documento=:nombre_documento,
								imagen=:imagen,
								fecha_expira=:fecha_expira,
								marca_temporal=:marca_temporal,
								alerta=:alerta
								WHERE id_midocumento=:id_midocumento');

		$t = strtotime($fecha_expira);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',utf8_decode($imagen));
		$update->bindValue('cuenta_id_cuenta',utf8_decode($cuenta_id_cuenta));
		$update->bindValue('nombre_documento',utf8_decode($nombre_documento));
		$update->bindValue('alerta',utf8_decode($alerta));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('fecha_expira',utf8_decode($nuevafecha));
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
***************************************************************/
public static function guardar($campos,$imagen){

	try {

		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$db=Db::getConnect();
				$consulta="DELETE from  gestion_documentaleq where modulo_id_modulo='".$modulo_id_modulo."' and documento_id_documento='".$documento_id_documento."' and cuenta_id_cuenta='".$cuenta_id_cuenta."'";
				$select=$db->query($consulta);

		$insert=$db->prepare('INSERT INTO gestion_documentaleq VALUES (NULL,:imagen,:documento_id_documento,:modulo_id_modulo,:cuenta_id_cuenta,:alerta,:fecha_expiracion,:marca_temporal,:gestion_estado,:gestion_publicado,:creado_por)');

		$t = strtotime($fecha_expiracion);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('imagen',utf8_decode($imagen));
		$insert->bindValue('documento_id_documento',utf8_decode($documento_id_documento));
		$insert->bindValue('modulo_id_modulo',utf8_decode($modulo_id_modulo));
		$insert->bindValue('cuenta_id_cuenta',utf8_decode($cuenta_id_cuenta));
		$insert->bindValue('alerta',utf8_decode($alerta));
		$insert->bindValue('fecha_expiracion',utf8_decode($nuevafecha));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('gestion_estado',utf8_decode($gestion_estado));
		$insert->bindValue('gestion_publicado',utf8_decode($gestion_publicado));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR VARIOS**
INSERT INTO documentos_varioseq(id_midocumento, cuenta_id_cuenta, nombre_documento, imagen, fecha_expira, alerta, marca_temporal, creado_por, estado_midocumento, midocumento_publicado)
***************************************************************/
public static function guardarvarios($campos,$imagen){

	try {

		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO documentos_varioseq VALUES (NULL,:cuenta_id_cuenta, :nombre_documento, :imagen, :fecha_expira, :alerta, :marca_temporal, :creado_por, :estado_midocumento, :midocumento_publicado)');

		$t = strtotime($fecha_expira);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('cuenta_id_cuenta',utf8_decode($cuenta_id_cuenta));
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

/*******************************************************
** FUNCION PARA VERIFICAR SI EXISTE EL ARCHIVO **
********************************************************/
public static function DocumentoExiste($id,$cuenta,$modulo){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT imagen FROM gestion_documentaleq WHERE documento_id_documento='".$id."' and cuenta_id_cuenta='".$cuenta."' and modulo_id_modulo='".$modulo."'");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['imagen'];
			return $lacaja;
		}
		
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA VERIFICAR REGISTRO DEL ARCHIVO **
********************************************************/
public static function DocumentoRegistro($id,$cuenta,$modulo){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT id_registro FROM gestion_documentaleq WHERE documento_id_documento='".$id."' and cuenta_id_cuenta='".$cuenta."' and modulo_id_modulo='".$modulo."'");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['id_registro'];
			return $lacaja;
		}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA VERIFICAR FECHA DE EXPIRACIÓN DEL ARCHIVO **
********************************************************/
public static function DocumentoFechaExpira($id,$cuenta,$modulo){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT fecha_expiracion FROM gestion_documentaleq WHERE documento_id_documento='".$id."' and cuenta_id_cuenta='".$cuenta."' and modulo_id_modulo='".$modulo."'");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['fecha_expiracion'];
			return $lacaja;
		}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA VERIFICAR ALERTA DEL ARCHIVO **
********************************************************/
public static function DocumentoAlerta($id,$cuenta,$modulo){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT alerta FROM gestion_documentaleq WHERE documento_id_documento='".$id."' and cuenta_id_cuenta='".$cuenta."' and modulo_id_modulo='".$modulo."'");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['alerta'];
			return $lacaja;
		}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA VERIFICAR ALERTA DEL ARCHIVO **
********************************************************/
public static function DocumentoMarcatemporal($id,$cuenta,$modulo){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT marca_temporal FROM gestion_documentaleq WHERE documento_id_documento='".$id."' and cuenta_id_cuenta='".$cuenta."' and modulo_id_modulo='".$modulo."'");
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['marca_temporal'];
			return $lacaja;
		}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA VERIFICAR SI EXISTE EL ARCHIVO **
********************************************************/
public static function DocumentoEstado($id,$cuenta,$modulo){
	try {
		$db=Db::getConnect();
		$consulta="SELECT gestion_estado FROM gestion_documentaleq WHERE documento_id_documento='".$id."' and cuenta_id_cuenta='".$cuenta."' and modulo_id_modulo='".$modulo."'";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['gestion_estado'];
			return $lacaja;
		}
		
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA CARGAR TODOS LOS ARCHIVOS **
********************************************************/
public static function CargarTodos($id_modulo,$cuenta){
	try {
		$db=Db::getConnect();
		$consulta="SELECT id_documento FROM documentos WHERE modulo_id_modulo='".$id_modulo."' and estado_documento='1'";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Gestiondocumentaleq('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$eldocumento = $ncaja['id_documento'];
			$gestion_estado=1;
			$fecha_expiracion="0000-00-00";
			$marca_temporal="0000-00-00";
				$db=Db::getConnect();
				$consulta="INSERT INTO gestion_documentaleq(documento_id_documento,modulo_id_modulo,cuenta_id_cuenta,gestion_estado,fecha_expiracion,marca_temporal) VALUES ('".$eldocumento."','".$id_modulo."','".$cuenta."','".$gestion_estado."','".$fecha_expiracion."','".$marca_temporal."')";
				$select=$db->query($consulta);
			
		}

		return true;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCIONES VER ULTIMOS DOCUMENTOS EN  INDEX   **
***************************************************************/
public static function obtenerUltimosDocumentos(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM gestion_documentaleq WHERE imagen<>'No-Aplica' order by id_registro desc limit 10");
		$camposs=$select->fetchAll();
		$campos = new Gestiondocumentaleq('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LOS DOCUMENTOS DE UN EQUIPO	  **
********************************************************/
public static function obtenerDocumentosEquipos($equipo){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM gestion_documentaleq WHERE gestion_publicado='1' and cuenta_id_cuenta='".$equipo."' order by id_registro DESC");
    	$campos=$select->fetchAll();
		$camposs = new Gestiondocumentaleq('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



}

?>
