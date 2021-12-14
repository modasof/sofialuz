<?php
/**
* CLASE PARA TRABAJAR CON LOS Slider
*/
class Cuentas
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

		$select=$db->query("SELECT * FROM cuentas WHERE cuenta_publicada='1' order by nombre_cuenta desc");
    	$camposs=$select->fetchAll();
    	$campos = new Cuentas('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS 	  **
********************************************************/
public static function obtenerPaginacruce(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM cuentas WHERE cuenta_publicada='1' order by nombre_cuenta desc");
    	$camposs=$select->fetchAll();
    	$campos = new Cuentas('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS 	  **
********************************************************/
public static function detallecrucecuenta($cuenta1,$cuenta2){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM egresos_cuenta WHERE cuenta_beneficiada='".$cuenta1."' and cuenta_id_cuenta='".$cuenta2."' and tipo_egreso='Movimiento a cuenta' order by fecha_egreso asc");
    	$camposs=$select->fetchAll();
    	$campos = new Cuentas('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR LOS INGRESOS EN CUENTA **
********************************************************/
public static function obtenerIngresospor($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(sum(valor_ingreso),0) as TotalIngresos FROM ingresos_cuenta WHERE cuenta_id_cuenta='".$id."' and ingreso_publicado='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Cuentas('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['TotalIngresos'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR LOS INGRESOS EN CUENTA **
********************************************************/
public static function Sumadeuda($cuenta1,$cuenta2){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(SUM(valor_egreso),0) AS deuda FROM egresos_cuenta WHERE cuenta_id_cuenta='".$cuenta1."' AND cuenta_beneficiada='".$cuenta2."' and tipo_egreso='Movimiento a cuenta'");
    	$camposs=$select->fetchAll();
    	$campos = new Cuentas('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['deuda'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR LOS EGRESOS EN CUENTA **
********************************************************/
public static function obtenerEgresospor($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(sum(valor_egreso),0) as TotalEgresos FROM egresos_cuenta WHERE cuenta_id_cuenta='".$id."' and egreso_publicado='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Cuentas('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['TotalEgresos'];
		}
		return $mar;
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
		$select=$db->query("SELECT * FROM cuentas WHERE id_cuenta='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Cuentas('',$camposs);
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
		$select=$db->query("UPDATE cuentas SET cuenta_publicada='0' WHERE id_cuenta='".$id."'");
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
public static function actualizar($id_cuenta,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE cuentas SET
								nombre_cuenta=:nombre_cuenta,
								cc_cuenta=:cc_cuenta,
								numero_cuenta=:numero_cuenta,
								tipo_cuenta=:tipo_cuenta,
								banco=:banco,
								representante=:representante,
								observaciones=:observaciones,
								saldo_inicial=:saldo_inicial,
								estado_cuenta=:estado_cuenta,
								creado_por=:creado_por,
								marca_temporal=:marca_temporal,
								cuenta_publicada=:cuenta_publicada
								WHERE id_cuenta=:id_cuenta');

		$update->bindValue('nombre_cuenta',utf8_decode($nombre_cuenta));
		$update->bindValue('cc_cuenta',utf8_decode($cc_cuenta));
		$update->bindValue('numero_cuenta',utf8_decode($numero_cuenta));
		$update->bindValue('tipo_cuenta',utf8_decode($tipo_cuenta));
		$update->bindValue('banco',utf8_decode($banco));
		$update->bindValue('representante',utf8_decode($representante));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('saldo_inicial',utf8_decode($saldo_inicial));
		$update->bindValue('estado_cuenta',utf8_decode($estado_cuenta));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('cuenta_publicada',utf8_decode($cuenta_publicada));
		$update->bindValue('id_cuenta',utf8_decode($id_cuenta));
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

		$insert=$db->prepare('INSERT INTO cuentas VALUES (NULL,:nombre_cuenta,:cc_cuenta,:numero_cuenta,:tipo_cuenta,:banco,:representante,:saldo_inicial,:observaciones,:estado_cuenta,:creado_por,:marca_temporal,:cuenta_publicada)');



		$insert->bindValue('nombre_cuenta',utf8_decode($nombre_cuenta));
		$insert->bindValue('cc_cuenta',utf8_decode($cc_cuenta));
		$insert->bindValue('numero_cuenta',utf8_decode($numero_cuenta));
		$insert->bindValue('tipo_cuenta',utf8_decode($tipo_cuenta));
		$insert->bindValue('banco',utf8_decode($banco));
		$insert->bindValue('representante',utf8_decode($representante));
		$insert->bindValue('saldo_inicial',utf8_decode($saldo_inicial));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		$insert->bindValue('estado_cuenta',utf8_decode($estado_cuenta));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('cuenta_publicada',utf8_decode($cuenta_publicada));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCIONES PARA GRÁFICA SUBRUBROS X CUENTA **
***************************************************************/
public static function obtenerSubrubrosGastos($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DISTINCT(A.id_subrubro),B.nombre_subrubro FROM egresos_cuenta as A, subrubros AS B WHERE cuenta_id_cuenta='".$id."' AND A.id_subrubro<>'0' AND A.id_subrubro=B.id_subrubro order by B.nombre_subrubro asc");
		$camposs=$select->fetchAll();
		$campos = new Cuentas('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCIONES PARA GRÁFICAS RUBROS X CUENTA **
***************************************************************/
public static function obtenerRubrosGastos($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DISTINCT(A.id_rubro),B.nombre_rubro FROM egresos_cuenta as A, rubros AS B WHERE cuenta_id_cuenta='".$id."' AND A.id_rubro<>'0' AND A.id_rubro=B.id_rubro");
		$camposs=$select->fetchAll();
		$campos = new Cuentas('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA SUMAR SUBRUBROS  **
********************************************************/
public static function obtenerSumaSubrubro($idsub,$cuenta,$FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(sum(valor_egreso),0) as TotalEgreso FROM egresos_cuenta WHERE cuenta_id_cuenta='".$cuenta."' and id_subrubro='".$idsub."' and fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."'");
    	$camposs=$select->fetchAll();
    	$campos = new Cuentas('',$camposs);
    	$rubros = $campos->getCampos();
		foreach($rubros as $nrubro){
			$elrubro = $nrubro['TotalEgreso'];
		}
		return $elrubro;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA SUMAR SUBRUBROS  **
********************************************************/
public static function obtenerPorcentajeSubrubro($idsub,$cuenta,$FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT SUM(valor_egreso) AS Total, (SELECT SUM(valor_egreso) AS Porrubro FROM egresos_cuenta where cuenta_id_cuenta='".$cuenta."' and id_subrubro='".$idsub."')/sum(valor_egreso)*100 as porcentaje_egreso FROM egresos_cuenta where cuenta_id_cuenta='".$cuenta."' and fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."'");
    	$camposs=$select->fetchAll();
    	$campos = new Cuentas('',$camposs);
    	$rubros = $campos->getCampos();
		foreach($rubros as $nrubro){
			$elrubro = $nrubro['porcentaje_egreso'];
		}
		return $elrubro;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/*******************************************************
** FUNCION PARA SUMAR RUBROS  **
********************************************************/
public static function obtenerSumaRubro($idsub,$cuenta,$FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(sum(valor_egreso),0) as TotalEgreso FROM egresos_cuenta WHERE cuenta_id_cuenta='".$cuenta."' and id_rubro='".$idsub."' and fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."'");
    	$camposs=$select->fetchAll();
    	$campos = new Cuentas('',$camposs);
    	$rubros = $campos->getCampos();
		foreach($rubros as $nrubro){
			$elrubro = $nrubro['TotalEgreso'];
		}
		return $elrubro;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCIONES VER ULTIMOS GASTOS EN  INDEX   **
***************************************************************/
public static function obtenerUltimosGastos($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM egresos_cuenta WHERE cuenta_id_cuenta='".$id."' order by id_egreso_cuenta desc limit 10");
		$camposs=$select->fetchAll();
		$campos = new Cuentas('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
********************************************************/
public static function obtenerNombreCuenta($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_cuenta FROM cuentas WHERE id_cuenta='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Cuentas('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre_cuenta'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LAS CATEGORIAS **
********************************************************/
public static function obtenerListaCuentas(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cuentas WHERE cuenta_publicada='1'");
    	$campos=$select->fetchAll();
		$camposs = new Cuentas('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


}

?>
