<?php
/**
* CLASE PARA TRABAJAR CON LOS GASTOS
*/
class Egresoscuenta
{
    private $id; 
    private $campos; //devuelve todos los campos de la tabla
 
 
	function __construct($id,$campos)
	{
        $this->setId($id);
        $this->setCampos($campos);
	}

	/************************************************************************************
	** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA GASTOS       ***
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
public static function obtenerPagina($id_cuenta){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM egresos_cuenta WHERE cuenta_id_cuenta='".$id_cuenta."' and egreso_publicado='1' order by id_egreso_cuenta DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR FECHA	  **
********************************************************/
public static function obtenerEgresosporfecha($id_cuenta,$FechaStart,$FechaEnd){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM egresos_cuenta WHERE cuenta_id_cuenta='".$id_cuenta."' and egreso_publicado='1' and fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."' order by fecha_egreso DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS	  **
********************************************************/
public static function obtenerPagina2(){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM cuentas WHERE cuenta_publicada='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}
/***********************************************************************************************************/
/***********************************************************************************************************/
/*********************************************************************************************************
                                       ** INICIO SECCIÓN TODOS LOS EGRESOS	 		 **
/***********************************************************************************************************/
/***********************************************************************************************************/
/***********************************************************************************************************/


/*******************************************************
** FUNCION PARA MOSTRAR LA ULTIMA RUTA **
********************************************************/
public static function obtenerUltimaRuta(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT imagen FROM egresos_cuenta ORDER BY id_egreso_cuenta DESC LIMIT 1");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$datos = $campos->getCampos();
		foreach($datos as $ndato){
			$eldato = $ndato['imagen'];
		}
		return $eldato;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR LA ULTIMA RUTA **
********************************************************/
public static function ultimoIdEgreso(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT id_egreso_cuenta FROM egresos_cuenta ORDER BY id_egreso_cuenta DESC LIMIT 1");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$datos = $campos->getCampos();
		foreach($datos as $ndato){
			$eldato = $ndato['id_egreso_cuenta'];
		}
		return $eldato;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS CAJAS	 		 **
********************************************************/
public static function obtenerCuentaspor($id_cuenta){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cuentas WHERE id_cuenta='".$id_cuenta."' and cuenta_publicada='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$marcas = $campos->getCampos();
		return $marcas;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/*******************************************************
** FUNCION PARA MOSTRAR EGRESOS EN CUENTA POR TIPO DE GASTO**
********************************************************/
public static function EgresosPortipo($cuenta,$tipoegreso){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT IFNULL(SUM(valor_egreso),0) as sumaegreso FROM egresos_cuenta WHERE cuenta_id_cuenta='".$cuenta."' and tipo_egreso='".$tipoegreso."'");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['sumaegreso'];
		}
		return $lacaja;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/*******************************************************
** FUNCION PARA MOSTRAR EL RUBRO APLICADO AL EGRESO EN CUENTA **
********************************************************/
public static function obtenerRubropor($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_rubro FROM rubros WHERE id_rubro='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$rubros = $campos->getCampos();
		foreach($rubros as $nrubro){
			$elrubro = $nrubro['nombre_rubro'];
		}
		return $elrubro;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL SUBRUBRO APLICADO AL EGRESO EN CAJA **
********************************************************/
public static function obtenersubRubropor($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_subrubro FROM subrubros WHERE id_subrubro='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$subrubros = $campos->getCampos();
		foreach($subrubros as $nsubrubro){
			$elsubrubro = $nsubrubro['nombre_subrubro'];
		}
		return $elsubrubro;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL REGISTRO ID DEL INGRESO A CAJA **
********************************************************/
public static function obtenerIdingresocaja($idegresocuenta){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT id_ingreso_caja FROM ingresos_caja WHERE ingreso_por_cuentas='".$idegresocuenta."'");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$subrubros = $campos->getCampos();
		foreach($subrubros as $nsubrubro){
			$elsubrubro = $nsubrubro['id_ingreso_caja'];
		}
		return $elsubrubro;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL REGISTRO ID DEL INGRESO A CAJA **
********************************************************/
public static function obtenerIdingresocuenta($idegresocuenta){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT id_ingreso_cuenta FROM ingresos_cuenta WHERE ingreso_por_cuentas='".$idegresocuenta."'");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$subrubros = $campos->getCampos();
		foreach($subrubros as $nsubrubro){
			$elsubrubro = $nsubrubro['id_ingreso_cuenta'];
		}
		return $elsubrubro;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***********************************************************************************************************/
/***********************************************************************************************************/
/*********************************************************************************************************
                                       ** FIN SECCIÓN TODOS LOS EGRESOS	 		 **
/***********************************************************************************************************/
/***********************************************************************************************************/
/***********************************************************************************************************/


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS CAJAS	 		 **
********************************************************/
public static function obtenerCajas(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cajas WHERE caja_publicada='1' order by nombre_caja asc");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$marcas = $campos->getCampos();
		return $marcas;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS CHEQUES	 		 **
********************************************************/
public static function obtenerCheques($cuentaSel){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cheques WHERE cheque_publicado='1' and cuenta_id_cuenta='".$cuentaSel."' order by id_cheque desc");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$marcas = $campos->getCampos();
		return $marcas;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS CUENTAS EN SELECT	 		 **
********************************************************/
public static function obtenerCuentas($cuentaSel){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cuentas WHERE cuenta_publicada='1' and id_cuenta<>'".$cuentaSel."' order by nombre_cuenta asc");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$marcas = $campos->getCampos();
		return $marcas;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR NOMBRE DE LA CUENTA	 		 **
********************************************************/
public static function obtenerCuentapor($id_cuenta){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cuentas WHERE id_cuenta='".$id_cuenta."'");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$marcas = $campos->getCampos();
		return $marcas;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS RUBROS	 		 **
********************************************************/
public static function obtenerRubros(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM rubros order by nombre_rubro asc");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$rubros = $campos->getCampos();
		return $rubros;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}




/*******************************************************
** FUNCION PARA MOSTRAR A QUE CAJA SE ENVÍO EL EGRESO **
********************************************************/
public static function obtenerNombrecaja($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_caja FROM cajas WHERE id_caja='".$id."' and caja_publicada='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['nombre_caja'];
		}
		return $lacaja;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR A QUE CUENTA SE ENVÍO EL EGRESO **
********************************************************/
public static function obtenerNombrecuenta($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_cuenta FROM cuentas WHERE id_cuenta='".$id."' and cuenta_publicada='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
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





/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerPaginaPor($id){ 
	try {		
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM egresos_cuenta WHERE id_egreso_cuenta='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Egresoscuenta('',$camposs);
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
		$select=$db->query("DELETE FROM egresos_caja WHERE id_egreso_caja='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminarot($id){ 
	try {		
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM egresos_cuenta WHERE id_egreso_cuenta='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminarabono($id){ 
	try {		
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM detalle_pagos_ordenescompra WHERE egreso_id='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}


/***************************************************************
** FUNCION PARA ELIINAR MOVIMIENTO EN CUENTA REALIZADO A CAJA **
***************************************************************/
public static function eliminaregresocuenta($idegreso){ 

	try {		
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM egresos_cuenta WHERE id_egreso_cuenta='".$idegreso."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
		
}
/***************************************************************
** FUNCION PARA ELIINAR MOVIMIENTO EN CUENTA REALIZADO A CAJA **
***************************************************************/
public static function eliminaringresocaja($idingreso){ 

	try {		
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM ingresos_caja WHERE id_ingreso_caja='".$idingreso."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
		
}

/***************************************************************
** FUNCION PARA ELIINAR MOVIMIENTO EN CUENTA REALIZADO A CAJA **
***************************************************************/
public static function eliminaringresocuenta($idingreso){ 

	try {		
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM ingresos_cuenta WHERE id_ingreso_cuenta='".$idingreso."'");
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
public static function actualizarcm($id,$ruta_imagen,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);
		$update=$db->prepare('UPDATE egresos_cuenta SET 
								imagen=:imagen,
								fecha_egreso=:fecha_egreso,
								valor_egreso=:valor_egreso,
								observaciones=:observaciones,
								estado_egreso=:estado_egreso,
								caja_beneficiada=:caja_beneficiada,
								egreso_en=:egreso_en
								WHERE id_egreso_cuenta=:id_egreso_cuenta');
		
		$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',utf8_decode($ruta_imagen));
		$update->bindValue('fecha_egreso',utf8_decode($nuevafecha));
		$update->bindValue('valor_egreso',utf8_decode($valornumero));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('estado_egreso',utf8_decode($estado_egreso));
		$update->bindValue('caja_beneficiada',utf8_decode($caja_beneficiada));
		$update->bindValue('egreso_en',utf8_decode($egreso_en));
		$update->bindValue('id_egreso_cuenta',utf8_decode($id));
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR ****
********************************************************************/
public static function actualizarcu($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);
		$update=$db->prepare('UPDATE egresos_cuenta SET 
								imagen=:imagen,
								fecha_egreso=:fecha_egreso,
								valor_egreso=:valor_egreso,
								observaciones=:observaciones,
								estado_egreso=:estado_egreso,
								cuenta_beneficiada=:cuenta_beneficiada,
								egreso_en=:egreso_en
								WHERE id_egreso_cuenta=:id_egreso_cuenta');
		
		$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',utf8_decode($imagen));
		$update->bindValue('fecha_egreso',utf8_decode($nuevafecha));
		$update->bindValue('valor_egreso',utf8_decode($valornumero));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('estado_egreso',utf8_decode($estado_egreso));
		$update->bindValue('cuenta_beneficiada',utf8_decode($cuenta_beneficiada));
		$update->bindValue('egreso_en',utf8_decode($egreso_en));
		$update->bindValue('id_egreso_cuenta',utf8_decode($id));
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR ****
********************************************************************/
public static function actualizarmvc($id,$valor_egreso,$observaciones,$ruta_imagen,$estado_egreso,$fecha_egreso,$egreso_en){
	try {
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE ingresos_cuenta SET 
								imagen=:imagen,
								fecha_ingreso=:fecha_ingreso,
								valor_ingreso=:valor_ingreso,
								observaciones=:observaciones,
								estado_ingreso=:estado_ingreso,
								ingreso_en=:ingreso_en
								WHERE ingreso_por_cuentas=:ingreso_por_cuentas');
		
		$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',utf8_decode($ruta_imagen));
		$update->bindValue('fecha_ingreso',utf8_decode($nuevafecha));
		$update->bindValue('valor_ingreso',utf8_decode($valornumero));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('estado_ingreso',utf8_decode($estado_egreso));
		$update->bindValue('ingreso_en',utf8_decode($egreso_en));
		$update->bindValue('ingreso_por_cuentas',utf8_decode($id));
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}


/********************************************************************
*** FUNCION PARA MODIFICAR ****
********************************************************************/
public static function actualizarmvcjmenor($id,$valor_egreso,$observaciones,$ruta_imagen,$estado_egreso,$fecha_egreso){
	try {
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE ingresos_caja SET 
								imagen=:imagen,
								fecha_ingreso=:fecha_ingreso,
								valor_ingreso=:valor_ingreso,
								observaciones=:observaciones,
								estado_ingreso=:estado_ingreso
								WHERE ingreso_por_cuentas=:ingreso_por_cuentas');
		
		$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',utf8_decode($ruta_imagen));
		$update->bindValue('fecha_ingreso',utf8_decode($nuevafecha));
		$update->bindValue('valor_ingreso',utf8_decode($valornumero));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('estado_ingreso',utf8_decode($estado_egreso));
		$update->bindValue('ingreso_por_cuentas',utf8_decode($id));
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}


/********************************************************************
*** FUNCION PARA MODIFICAR ****
********************************************************************/
public static function actualizarot($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);
		$update=$db->prepare('UPDATE egresos_cuenta SET 
								imagen=:imagen,
								fecha_egreso=:fecha_egreso,
								valor_egreso=:valor_egreso,
								observaciones=:observaciones,
								estado_egreso=:estado_egreso,
								beneficiario=:beneficiario,
								id_rubro=:id_rubro,
								id_subrubro=:id_subrubro,
								egreso_en=:egreso_en
								WHERE id_egreso_cuenta=:id_egreso_cuenta');
		
		$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',utf8_decode($imagen));
		$update->bindValue('fecha_egreso',utf8_decode($nuevafecha));
		$update->bindValue('valor_egreso',utf8_decode($valornumero));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('estado_egreso',utf8_decode($estado_egreso));
		$update->bindValue('beneficiario',utf8_decode($beneficiario));
		$update->bindValue('id_rubro',utf8_decode($id_rubro));
		$update->bindValue('id_subrubro',utf8_decode($id_subrubro));
		$update->bindValue('egreso_en',utf8_decode($egreso_en));
		$update->bindValue('id_egreso_cuenta',utf8_decode($id));
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR **
id_egreso_caja, imagen, tipo_beneficiario, fecha_egreso, caja_id_caja, beneficiario, id_rubro, id_subrubro, valor_egreso, observaciones, marca_temporal, egreso_publicado, estado_egreso, creado_por
***************************************************************/
public static function guardar($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

	$insert=$db->prepare('INSERT INTO egresos_cuenta VALUES (NULL,:cuenta_id_cuenta,:imagen,:tipo_egreso,:cuenta_beneficiada,:proveedor_id_proveedor,:beneficiario,:id_rubro,:id_subrubro,:caja_beneficiada,:egreso_en,:cheque_id_cheque,:valor_egreso,:observaciones,:estado_egreso,:egreso_publicado,:marca_temporal,:fecha_egreso,:creado_por)');


		$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);

		if ($tipo_egreso=="Movimiento a cuenta") {
			$id_rubro=6;
			$id_subrubro=40;
		}
		else if ($tipo_egreso=="Cuenta"){
			$id_rubro=4;
			$id_subrubro=26;
		}

		$insert->bindValue('cuenta_id_cuenta',utf8_decode($cuenta_id_cuenta));
		$insert->bindValue('imagen',utf8_decode($imagen));
		$insert->bindValue('tipo_egreso',utf8_decode($tipo_egreso));
		$insert->bindValue('cuenta_beneficiada',utf8_decode($cuenta_beneficiada));
		$insert->bindValue('proveedor_id_proveedor',utf8_decode($proveedor_id_proveedor));
		$insert->bindValue('beneficiario',utf8_decode($beneficiario));
		$insert->bindValue('id_rubro',utf8_decode($id_rubro));
		$insert->bindValue('id_subrubro',utf8_decode($id_subrubro));
		$insert->bindValue('caja_beneficiada',utf8_decode($caja_beneficiada));
		$insert->bindValue('egreso_en',utf8_decode($egreso_en));
		$insert->bindValue('cheque_id_cheque',utf8_decode($cheque_id_cheque));
		$insert->bindValue('valor_egreso',utf8_decode($valornumero));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		$insert->bindValue('estado_egreso',utf8_decode($estado_egreso));
		$insert->bindValue('egreso_publicado',utf8_decode($egreso_publicado));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('fecha_egreso',utf8_decode($nuevafecha));
		$insert->bindValue('creado_por',utf8_decode($creado_por));

		$insert->execute();
		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR INGRESO EN CAJA***
***************************************************************/
public static function guardaringreso($tipo_egreso,$fecha_egreso,$caja_beneficiada,$cuenta_id_cuenta,$valor_egreso,$observaciones,$marca_temporal,$egreso_publicado,$creado_por,$ultimoIdEgreso){

	$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

	$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);

	try {
		$db=Db::getConnect();

		
	$select=$db->query("INSERT INTO ingresos_caja (tipo_beneficiario,fecha_ingreso,caja_ppal,caja_id_caja,cuenta_id_cuenta,valor_ingreso,observaciones,marca_temporal,ingreso_publicado,creado_por,ingreso_por_cuentas) VALUES ('".utf8_decode($tipo_egreso)."','".utf8_decode($nuevafecha)."','".utf8_decode($caja_beneficiada)."','".utf8_decode($caja_beneficiada)."','".utf8_decode($cuenta_id_cuenta)."','".$valornumero."','".utf8_decode($observaciones)."','".utf8_decode($marca_temporal)."','".utf8_decode($egreso_publicado)."','".utf8_decode($creado_por)."','".utf8_decode($ultimoIdEgreso)."')");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/***************************************************************
*** FUNCION PARA GUARDAR INGRESO EN CUENTA ***
 cuenta_id_cuenta, imagen, concepto, ingreso_por, factura_num, valor_ingreso, ingreso_en, num_cheque, concepto_cheque, fecha_ingreso, observaciones, marca_temporal, creado_por, estado_ingreso, ingreso_publicado
***************************************************************/
public static function guardaringresocuenta($cuenta_beneficiada,$cuenta_id_cuenta,$ultimaruta,$tipo_egreso,$valor_egreso,$egreso_en,$cheque_id_cheque,$fecha_egreso,$observaciones,$marca_temporal,$creado_por,$egreso_publicado,$ultimoIdEgreso){

	$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);

	try {
		$db=Db::getConnect();
		

	$select=$db->query("INSERT INTO ingresos_cuenta (cuenta_id_cuenta,cuenta_aportante,imagen, concepto, ingreso_por, valor_ingreso, ingreso_en, num_cheque,fecha_ingreso, observaciones, marca_temporal, creado_por, ingreso_publicado,ingreso_por_cuentas) VALUES ('".utf8_decode($cuenta_beneficiada)."','".$cuenta_id_cuenta."','".utf8_decode($ultimaruta)."','".utf8_decode($tipo_egreso)."','".utf8_decode($tipo_egreso)."','".utf8_decode($valornumero)."','".utf8_decode($egreso_en)."','".utf8_decode($cheque_id_cheque)."','".utf8_decode($nuevafecha)."','".utf8_decode($observaciones)."','".utf8_decode($marca_temporal)."','".utf8_decode($creado_por)."','".utf8_decode($egreso_publicado)."','".utf8_decode($ultimoIdEgreso)."')");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteporRubro($ano,$mes){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT id_rubro,IFNULL(sum(valor_egreso),0) as totales FROM egresos_cuenta WHERE  YEAR(fecha_egreso)='".$ano."' and MONTH(fecha_egreso)='".$mes."' and cuenta_id_cuenta='5'AND egreso_publicado='1' GROUP BY id_rubro ORDER BY totales DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


public static function GraficaReporteIngresos($ano,$mes){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DATE_FORMAT(fecha_ingreso,'%Y') as ANO ,DATE_FORMAT(fecha_ingreso,'%m') as MES , DATE_FORMAT(fecha_ingreso,'%d') as DIA, IFNULL(SUM(valor_ingreso),1) AS M3 FROM ingresos_cuenta WHERE  YEAR(fecha_ingreso)='".$ano."' and MONTH(fecha_ingreso)='".$mes."' and ingreso_publicado='1' and cuenta_id_cuenta='5'  GROUP by DIA ORDER BY MES,DIA ASC");
		$camposs=$select->fetchAll();
		$campos = new Egresoscuenta('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

public static function GraficaReporteEgresos($ano,$mes){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DATE_FORMAT(fecha_egreso,'%Y') as ANO ,DATE_FORMAT(fecha_egreso,'%m') as MES , DATE_FORMAT(fecha_egreso,'%d') as DIA, IFNULL(SUM(valor_egreso),1) AS M3 FROM egresos_cuenta WHERE  YEAR(fecha_egreso)='".$ano."' and MONTH(fecha_egreso)='".$mes."' and egreso_publicado='1' and cuenta_id_cuenta='5' GROUP by DIA ORDER BY MES,DIA ASC");
		$camposs=$select->fetchAll();
		$campos = new Egresoscuenta('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR LA CUENTA A LA CUAL APLICA EL EGRESO**
********************************************************/
public static function obteneridCuentapor($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT cuenta_id_cuenta FROM egresos_cuenta WHERE id_egreso_cuenta='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Egresoscuenta('',$camposs);
    	$rubros = $campos->getCampos();
		foreach($rubros as $nrubro){
			$elrubro = $nrubro['cuenta_id_cuenta'];
		}
		return $elrubro;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


}

?>
