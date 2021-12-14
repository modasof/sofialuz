<?php
/**
* CLASE PARA TRABAJAR CON LOS GASTOS
*/
class Ingresoscuenta
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

		$select=$db->query("SELECT * FROM ingresos_cuenta WHERE cuenta_id_cuenta='".$id_cuenta."' order by id_ingreso_cuenta DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresoscuenta('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteIngresosporfecha($FechaStart,$FechaEnd,$id_cuenta){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM ingresos_cuenta WHERE  fecha_ingreso >='".$FechaStart."' and fecha_ingreso <='".$FechaEnd."' and cuenta_id_cuenta='".$id_cuenta."' order by fecha_ingreso DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresoscuenta('',$camposs);
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
    	$campos = new Ingresoscuenta('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS CAJAS	 		 **
********************************************************/
public static function obtenerCajas($cajaSel){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cajas WHERE caja_publicada='1' and id_caja<>'".$cajaSel."' order by nombre_caja asc");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresoscuenta('',$camposs);
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
public static function obtenerCuentapor($id_cuenta){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cuentas WHERE id_cuenta='".$id_cuenta."' and cuenta_publicada='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresoscuenta('',$camposs);
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
    	$campos = new Ingresoscuenta('',$camposs);
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
    	$campos = new Ingresoscuenta('',$camposs);
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
    	$campos = new Ingresoscuenta('',$camposs);
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
** FUNCION PARA MOSTRAR EL SUBRUBRO APLICADO AL EGRESO EN CAJA **
********************************************************/
public static function obtenerNombrecaja($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_caja FROM cajas WHERE id_caja='".$id."' and caja_publicada='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresoscuenta('',$camposs);
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
** FUNCION PARA MOSTRAR EL SUBRUBRO APLICADO AL EGRESO EN CAJA **
********************************************************/
public static function obtenerNombrecuenta($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT nombre_cuenta FROM cuentas WHERE id_cuenta='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresoscuenta('',$camposs);
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
** FUNCION PARA MOSTRAR EGRESOS POR TIPO DE GASTO**
********************************************************/
public static function IngresosPortipo($cuenta,$tipoingreso){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT IFNULL(SUM(valor_ingreso),0) as egresosportipo FROM ingresos_cuenta WHERE cuenta_id_cuenta='".$cuenta."' and ingreso_por='".$tipoingreso."'");
    	$camposs=$select->fetchAll();
    	$campos = new Ingresoscuenta('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['egresosportipo'];
		}
		return $lacaja;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL SOPORTE DE EGRESO DE LA CUENTA QUE HIZO EL INGRESO  **
********************************************************/
public static function obtenerSoporte($idegreso){
	try {
		$db=Db::getConnect();
		$consulta="SELECT imagen FROM egresos_cuenta WHERE id_egreso_cuenta='".$idegreso."'";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Ingresoscuenta('',$camposs);
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
/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerPaginaPor($id){ 
	try {		
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM egresos_caja WHERE id_egreso_caja='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Ingresoscuenta('',$camposs);
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
		$select=$db->query("DELETE FROM ingresos_cuenta WHERE id_ingreso_cuenta='".$id."'");
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
		$update=$db->prepare('UPDATE egresos_caja SET 
								imagen=:imagen,
								fecha_egreso=:fecha_egreso,
								beneficiario=:beneficiario,
								id_rubro=:id_rubro,
								id_subrubro=:id_subrubro,
								valor_egreso=:valor_egreso,
								observaciones=:observaciones
								WHERE id_egreso_caja=:id_egreso_caja');
		
		$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',$imagen);
		$update->bindValue('fecha_egreso',$nuevafecha);
		$update->bindValue('beneficiario',$beneficiario);
		$update->bindValue('id_rubro',$id_rubro);
		$update->bindValue('id_subrubro',$id_subrubro);
		$update->bindValue('valor_egreso',$valornumero);
		$update->bindValue('observaciones',$observaciones);
		$update->bindValue('id_egreso_caja',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR **
id_ingreso_cuenta, cuenta_id_cuenta, imagen, concepto, ingreso_por, factura_num, valor_ingreso, ingreso_en, num_cheque, concepto_cheque, fecha_ingreso, observaciones, marca_temporal, creado_por, estado_ingreso, ingreso_publicado
***************************************************************/
public static function guardar($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);


	$insert=$db->prepare('INSERT INTO ingresos_cuenta VALUES (NULL,:cuenta_id_cuenta,:cuenta_aportante, :imagen, :concepto, :ingreso_por, :factura_num, :valor_ingreso, :ingreso_en, :num_cheque, :concepto_cheque, :fecha_ingreso, :observaciones, :marca_temporal, :creado_por, :estado_ingreso, :ingreso_publicado,:ingreso_por_cuentas)');

		$V1=str_replace(".","",$valor_ingreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$ingreso_por_cuentas=0;

		$t = strtotime($fecha_ingreso);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('cuenta_id_cuenta',$cuenta_id_cuenta);
		$insert->bindValue('cuenta_aportante',$cuenta_aportante);
		$insert->bindValue('imagen',$imagen);
		$insert->bindValue('concepto',$concepto);
		$insert->bindValue('ingreso_por',$ingreso_por);
		$insert->bindValue('factura_num',$factura_num);
		$insert->bindValue('valor_ingreso',$valornumero);
		$insert->bindValue('ingreso_en',$ingreso_en);
		$insert->bindValue('num_cheque',$num_cheque);
		$insert->bindValue('concepto_cheque',$concepto_cheque);
		$insert->bindValue('fecha_ingreso',$nuevafecha);
		$insert->bindValue('observaciones',$observaciones);
		$insert->bindValue('marca_temporal',$marca_temporal);
		$insert->bindValue('creado_por',$creado_por);
		$insert->bindValue('estado_ingreso',$estado_ingreso);
		$insert->bindValue('ingreso_publicado',$ingreso_publicado);
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
***************************************************************/
public static function guardaringreso($campos,$imagen){
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
		$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('imagen',$imagen);
		$insert->bindValue('tipo_beneficiario',$tipo_beneficiario);
		$insert->bindValue('fecha_ingreso',$nuevafecha);
		$insert->bindValue('caja_ppal',$caja_id_caja);
		$insert->bindValue('caja_id_caja',$caja_ppal);
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
