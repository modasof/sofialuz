<?php
/**
* CLASE PARA TRABAJAR CON LOS GASTOS
*/
class Ingresos
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
** FUNCION PARA OBTENER LA CAJA POR USUARIO **
********************************************************/
public static function obtenerIdcajaporUser($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT id_caja FROM cajas WHERE usuario_id_usuario='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
    	$rubros = $campos->getCampos();
		foreach($rubros as $nrubro){
			$elrubro = $nrubro['id_caja'];
		}
		return $elrubro;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

	
/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS	  **
********************************************************/
public static function obtenerPagina($id_caja){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM ingresos_caja WHERE caja_ppal='".$id_caja."' and ingreso_publicado='1' order by fecha_ingreso DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS	  **
********************************************************/
public static function obtenerIngresosmes($id_caja,$FechaStart,$FechaEnd){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM ingresos_caja WHERE caja_ppal='".$id_caja."' and fecha_ingreso >='".$FechaStart."' and fecha_ingreso <='".$FechaEnd."' order by fecha_ingreso desc");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
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

		$select=$db->query("SELECT * FROM cajas");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS CAJAS	 		 **
********************************************************/
public static function obtenerCajas(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cajas order by nombre_caja asc");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
    	$marcas = $campos->getCampos();
		return $marcas;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS CAJAS	 		 **
********************************************************/
public static function obtenerCajapor($id_caja){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cajas WHERE id_caja='".$id_caja."'");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
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
    	$campos = new Ingresos('',$camposs);
    	$rubros = $campos->getCampos();
		return $rubros;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR EL RUBRO APLICADO AL EGRESO EN CAJA **
********************************************************/
public static function obtenerRubropor($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_rubro FROM rubros WHERE id_rubro='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
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
    	$campos = new Ingresos('',$camposs);
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
** FUNCION PARA MOSTRAR LA CAJA QUE HIZO EL EGRESO E INGRESO A CAJA PPAL **
********************************************************/
public static function obtenerNombrecaja($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_caja FROM cajas WHERE id_caja='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
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
** FUNCION PARA MOSTRAR LA CUENTA QUE HIZO EL EGRESO E INGRESO A CAJA PPAL **
********************************************************/
public static function ObtenerNombrecuenta($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_cuenta FROM cuentas WHERE id_cuenta='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
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
** FUNCION PARA MOSTRAR EL SOPORTE DE EGRESO DE LA CAJA QUE HIZO EL INGRESO  **
********************************************************/
public static function obtenerSoporte($caja,$marcatemporal){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT imagen FROM egresos_caja WHERE caja_id_caja='".$caja."' and marca_temporal='".$marcatemporal."'");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['imagen'];
		}
		return $lacaja;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/*******************************************************
** FUNCION PARA MOSTRAR EL SOPORTE DE EGRESO DE LA CAJA QUE HIZO EL INGRESO  **
********************************************************/
public static function obtenerSoporteCuentaidregistro($idregistro){
	try {
		$db=Db::getConnect();
		$consulta="SELECT imagen FROM egresos_cuenta WHERE id_egreso_cuenta='".$idregistro."'";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['imagen'];
		}
		return $lacaja;

	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL SOPORTE DE EGRESO DE LA CAJA QUE HIZO EL INGRESO  **
********************************************************/
public static function obtenerSoporteCuenta($caja,$marcatemporal){
	try {
		$db=Db::getConnect();
		$consulta="SELECT imagen FROM egresos_cuenta WHERE caja_beneficiada='".$caja."' and marca_temporal='".$marcatemporal."'";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['imagen'];
		}
		if ($lacaja='') {
			$lacaja=0;
		}
		return $lacaja;

	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL INICIO DE LA CAJA **
********************************************************/
public static function ingresoInicial($caja){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT IFNULL(SUM(saldo_inicial),0) as ingresoInicial FROM cajas WHERE id_caja='".$caja."'");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['ingresoInicial'];
		}
		return $lacaja;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR EL INGRESO POR CAJAS**
********************************************************/
public static function ingresosporcaja($caja){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT IFNULL(SUM(valor_ingreso),0) as ingresosporcaja FROM ingresos_caja WHERE caja_ppal='".$caja."' and cuenta_id_cuenta='0'");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['ingresosporcaja'];
		}
		return $lacaja;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL INGRESO POR CUENTAS**
********************************************************/
public static function IngresosPorcuenta($caja){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT IFNULL(SUM(valor_ingreso),0) as ingresosporcuenta FROM ingresos_caja WHERE caja_ppal='".$caja."' and cuenta_id_cuenta<>'0'");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresos('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['ingresosporcuenta'];
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
		$select=$db->query("SELECT * FROM ingresos_caja WHERE id_ingreso_caja='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Ingresos('',$camposs);
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
		$select=$db->query("DELETE FROM ingresos_caja WHERE id_ingreso_caja='".$id."'");
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
public static function actualizarex($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);
		$update=$db->prepare('UPDATE ingresos_caja SET 
								imagen=:imagen,
								fecha_ingreso=:fecha_ingreso,
								beneficiario=:beneficiario,
								id_rubro=:id_rubro,
								id_subrubro=:id_subrubro,
								valor_ingreso=:valor_ingreso,
								observaciones=:observaciones
								WHERE id_ingreso_caja=:id_ingreso_caja');
		
		$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$update->bindValue('imagen',$imagen);
		$update->bindValue('fecha_ingreso',$fecha_egreso);
		$update->bindValue('beneficiario',$beneficiario);
		$update->bindValue('id_rubro',$id_rubro);
		$update->bindValue('id_subrubro',$id_subrubro);
		$update->bindValue('valor_ingreso',$valornumero);
		$update->bindValue('observaciones',$observaciones);
		$update->bindValue('id_ingreso_caja',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR **
`id_egreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_egreso`, `caja_id_caja`, `beneficiario`, `id_rubro`, `id_subrubro`, `valor_egreso`, `observaciones`, `marca_temporal`, `egreso_publicado`, `estado_egreso`, `creado_por`
***************************************************************/
public static function guardar($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

	$insert=$db->prepare('INSERT INTO ingresos_caja VALUES (NULL,:imagen,:tipo_beneficiario,:fecha_ingreso,:caja_ppal,:caja_id_caja,:beneficiario,:id_rubro,:id_subrubro,:valor_ingreso,:observaciones,:marca_temporal,:ingreso_publicado,:estado_ingreso,:creado_por,:ingreso_por_cuentas)');

		$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;
		$ingreso_por_cuentas=0;

		$insert->bindValue('imagen',$imagen);
		$insert->bindValue('tipo_beneficiario',$tipo_beneficiario);
		$insert->bindValue('fecha_ingreso',$fecha_egreso);
		$insert->bindValue('caja_ppal',$caja_ppal);
		$insert->bindValue('caja_id_caja',$caja_id_caja);
		$insert->bindValue('beneficiario',$beneficiario);
		$insert->bindValue('id_rubro',$id_rubro);
		$insert->bindValue('id_subrubro',$id_subrubro);
		$insert->bindValue('valor_ingreso',$valornumero);
		$insert->bindValue('observaciones',$observaciones);
		$insert->bindValue('marca_temporal',$marca_temporal);
		$insert->bindValue('egreso_publicado',$egreso_publicado);
		$insert->bindValue('estado_ingreso',$estado_egreso);
		$insert->bindValue('creado_por',$creado_por);
		$insert->bindValue('ingreso_por_cuentas',$ingreso_por_cuentas);

		$insert->execute();
		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR ***

INSERT INTO `ingresos_caja`(`id_ingreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_ingreso`, `caja_ppal`, `caja_id_caja`, `cuenta_id_cuenta`, `beneficiario`, `id_rubro`, `id_subrubro`, `valor_ingreso`, `observaciones`, `marca_temporal`, `ingreso_publicado`, `estado_ingreso`, `creado_por`, `ingreso_por_cuentas`
***************************************************************/
public static function guardaringreso($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO ingresos_caja VALUES (NULL,:imagen,:tipo_beneficiario,:fecha_ingreso,:caja_ppal,:caja_id_caja,:cuenta_id_cuenta,:beneficiario,:id_rubro,:id_subrubro,:valor_ingreso,:observaciones,:marca_temporal,:ingreso_publicado,:estado_ingreso,:creado_por,:ingreso_por_cuentas)');

		$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;
		$ingreso_por_cuentas=0;
		

		$id_rubro=6;
		$id_subrubro=41;

		$insert->bindValue('imagen',$imagen);
		$insert->bindValue('tipo_beneficiario',$tipo_beneficiario);
		$insert->bindValue('fecha_ingreso',$fecha_egreso);
		$insert->bindValue('caja_ppal',$caja_id_caja);
		$insert->bindValue('caja_id_caja',$caja_ppal);
		$insert->bindValue('cuenta_id_cuenta',$cuenta_id_cuenta);
		$insert->bindValue('beneficiario',$beneficiario);
		$insert->bindValue('id_rubro',$id_rubro);
		$insert->bindValue('id_subrubro',$id_subrubro);
		$insert->bindValue('valor_ingreso',$valornumero);
		$insert->bindValue('observaciones',$observaciones);
		$insert->bindValue('marca_temporal',$marca_temporal);
		$insert->bindValue('ingreso_publicado',$egreso_publicado);
		$insert->bindValue('estado_ingreso',$estado_egreso);
		$insert->bindValue('creado_por',$creado_por);
		$insert->bindValue('ingreso_por_cuentas',$ingreso_por_cuentas);

		$insert->execute();
		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}




}

?>
