<?php
/**
* CLASE PARA TRABAJAR CON LOS Slider
*/
class Cajas
{
    private $id;
    private $campos; //devuelve todos los campos de la tabla


	function __construct($id,$campos)
	{
        $this->setId($id);
        $this->setCampos($campos);
	}

	/************************************************************************************
	** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA SERVICIOS       ***
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
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS 	  **
********************************************************/
public static function obtenerPagina(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM cajas where caja_publicada='1' order by id_caja desc");
    	$camposs=$select->fetchAll();
    	$campos = new Cajas('',$camposs);
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
		$select=$db->query("SELECT * FROM cajas WHERE id_caja='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Cajas('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerPaginaPorsesion($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cajas WHERE usuario_id_usuario='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Cajas('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR LAS ENTRDA INICIAL EN CAJA **
********************************************************/
public static function obtenerInicialpor($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(sum(saldo_inicial),0) as TotalInicio FROM cajas WHERE id_caja='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Cajas('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['TotalInicio'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR LAS ENTRDAS EN CAJA POR CAJA **
********************************************************/
public static function obtenerEntradaspor($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(sum(valor_ingreso),0) as TotalEntradas FROM ingresos_caja WHERE caja_ppal='".$id."' and cuenta_id_cuenta='0'");
    	$camposs=$select->fetchAll();
    	$campos = new Cajas('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['TotalEntradas'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR LAS ENTRDAS EN CAJA POR CUENTAS **
********************************************************/
public static function obtenerEntradasporcuenta($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(sum(valor_ingreso),0) as TotalEntradascuenta FROM ingresos_caja WHERE caja_ppal='".$id."' and cuenta_id_cuenta<>0");
    	$camposs=$select->fetchAll();
    	$campos = new Cajas('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['TotalEntradascuenta'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR LAS ENTRDAS EN CAJA **
********************************************************/
public static function obtenerSalidaspor($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(sum(valor_egreso),0) as TotalSalidas FROM egresos_caja WHERE caja_ppal='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Cajas('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['TotalSalidas'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA GUARDAR EN BASE  **
***************************************************************/
// public static function FormatoMascara($valor)
// {
// $V1=str_replace(".","",$valor);
// $V2=str_replace(" ", "", $V1);
// $valor_final=str_replace("$", "", $V2);
// $valornumero=(int) $valor_final;
// return $valornumero;

// }


/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminarPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE cajas SET caja_publicada='0' WHERE id_caja='".$id."'");
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
`id_caja`, `nombre_caja`, `saldo_inicial`, `usuario_id_usuario`, `marca_temporal`, `estado_caja`, `caja_publicada`, `creada_por`
********************************************************************/
public static function actualizar($id_caja,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE cajas SET
								nombre_caja=:nombre_caja,
								usuario_id_usuario=:usuario_id_usuario,
								saldo_inicial=:saldo_inicial,
								estado_caja=:estado_caja,
								creada_por=:creada_por,
								marca_temporal=:marca_temporal,
								caja_publicada=:caja_publicada,
								observaciones=:observaciones
								WHERE id_caja=:id_caja');

		$update->bindValue('nombre_caja',utf8_decode($nombre_caja));
		$update->bindValue('usuario_id_usuario',utf8_decode($usuario_id_usuario));
		$update->bindValue('saldo_inicial',utf8_decode($saldo_inicial));
		$update->bindValue('estado_caja',utf8_decode($estado_caja));
		$update->bindValue('creada_por',utf8_decode($creada_por));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('caja_publicada',utf8_decode($caja_publicada));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('id_caja',utf8_decode($id_caja));
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR **
`id_caja`, `nombre_caja`, `saldo_inicial`, `usuario_id_usuario`, `marca_temporal`, `estado_caja`, `caja_publicada`, `creada_por`
***************************************************************/
public static function guardar($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);
		$consulta='INSERT INTO cajas VALUES (NULL,:nombre_caja,:saldo_inicial,:usuario_id_usuario,:marca_temporal,:estado_caja,:caja_publicada,:creada_por,:observaciones)';
		//echo($consulta);
		$V1=str_replace(".","",$saldo_inicial);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$insert=$db->prepare($consulta);
		$insert->bindValue('nombre_caja',utf8_decode($nombre_caja));
		$insert->bindValue('saldo_inicial',$valornumero);
		$insert->bindValue('usuario_id_usuario',$usuario_id_usuario);
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('estado_caja',utf8_decode($estado_caja));
		$insert->bindValue('caja_publicada',utf8_decode($caja_publicada));
		$insert->bindValue('creada_por',utf8_decode($creada_por));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
********************************************************/
public static function obtenerNombreCaja($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_caja FROM cajas WHERE id_caja='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre_caja'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

}

?>
