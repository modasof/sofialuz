<?php
/**
* CLASE PARA TRABAJAR CON LOS Slider
*/
class Informes
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
** FUNCION PARA MOSTRAR SALDOS DE LAS CUENTAS	  **
********************************************************/
public static function InformeCuentas(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM cuentas WHERE cuenta_publicada='1' order by nombre_cuenta desc");
    	$camposs=$select->fetchAll();
    	$campos = new Informes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR SALDOS DE LAS CUENTAS	  **
********************************************************/
public static function InformeCajas(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM cajas WHERE caja_publicada='1' order by nombre_caja desc");
    	$camposs=$select->fetchAll();
    	$campos = new Informes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR SALDOS DE LAS CUENTAS	  **
********************************************************/
public static function InformeVentas(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM lineasnegocio WHERE publicado='1' order by nombre desc");
    	$camposs=$select->fetchAll();
    	$campos = new Informes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR SALDOS DE LAS CUENTAS	  **
********************************************************/
public static function InformeClientes(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM clientes WHERE estado_cliente='1' order by nombre_cliente desc");
    	$camposs=$select->fetchAll();
    	$campos = new Informes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR SALDOS DE LAS CUENTAS	  **
********************************************************/
public static function InformeCompras(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM proveedores WHERE estado_proveedor='1' order by nombre_proveedor desc");
    	$camposs=$select->fetchAll();
    	$campos = new Informes('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

# ============================================================
# =           Sección Lista de Ingresos por Cuenta           =
# ============================================================

public static function ListaIngresos($FechaStart,$FechaEnd,$id){
	try {
		$db=Db::getConnect();
		$sql="SELECT DISTINCT(ingreso_por) as ingreso_por FROM ingresos_cuenta WHERE cuenta_id_cuenta='".$id."' and fecha_ingreso >='".$FechaStart."' and fecha_ingreso <='".$FechaEnd."' and estado_ingreso='1' and ingreso_publicado='1' ORDER BY ingreso_por";
		//echo($sql);
		$select=$db->query($sql);
    	$campos=$select->fetchAll();
		$camposs = new Cuentas('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

# ============================================
# =           Sección Ingreso por Tipo - Cuenta           =
# ============================================
public static function SumaIngresosportipo($FechaStart,$FechaEnd,$id,$ingrespor){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(SUM(valor_ingreso),0) as TotalIngresos FROM ingresos_cuenta WHERE  fecha_ingreso >='".$FechaStart."' and fecha_ingreso <='".$FechaEnd."' and cuenta_id_cuenta='".$id."' and ingreso_por='".$ingrespor."' order by fecha_ingreso DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Informes('',$camposs);
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

# ============================================
# =           Sección Ingresos por Cuenta            =
# ============================================
public static function SumaIngresosporcuenta($FechaStart,$FechaEnd,$id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(SUM(valor_ingreso),0) as TotalIngresos FROM ingresos_cuenta WHERE  fecha_ingreso >='".$FechaStart."' and fecha_ingreso <='".$FechaEnd."' and cuenta_id_cuenta='".$id."' order by fecha_ingreso DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Informes('',$camposs);
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

# ==================================================
# =           Sección Egresos por Cuenta           =
# ==================================================
	
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

# ============================================================
# =           Sección Lista de Ingresos por Cuenta           =
# ============================================================

public static function ListaEgresos($FechaStart,$FechaEnd,$id){
	try {
		$db=Db::getConnect();
		$sql="SELECT DISTINCT(id_rubro) as rubrocuenta FROM egresos_cuenta WHERE cuenta_id_cuenta='".$id."' and fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."'  and egreso_publicado='1' ORDER BY id_rubro";
		//echo($sql);
		$select=$db->query($sql);
    	$campos=$select->fetchAll();
		$camposs = new Informes('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


# ============================================
# =           Sección Ingresos por Cuenta            =
# ============================================
public static function SumaEgresosporcuenta($FechaStart,$FechaEnd,$id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(SUM(valor_egreso),0) as TotalEgresos FROM egresos_cuenta WHERE  fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."' and cuenta_id_cuenta='".$id."' order by fecha_egreso DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Informes('',$camposs);
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



# ============================================================
# =           Sección Lista de Ingresos por Cuenta           =
# ============================================================

# ============================================
# =           Sección Ingreso por Tipo - Cuenta           =
# ============================================
public static function SumaEgresosportipo($FechaStart,$FechaEnd,$id,$egresopor){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(SUM(valor_egreso),0) as TotalEgresos FROM egresos_cuenta WHERE  fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."' and cuenta_id_cuenta='".$id."' and id_rubro='".$egresopor."' order by fecha_egreso DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Informes('',$camposs);
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

# ============================================================
# =           Sección Lista de Egresos  por Subrubro           =
# ============================================================

public static function ListaEgresosSubrubro($FechaStart,$FechaEnd,$id,$rubro){
	try {
		$db=Db::getConnect();
		$sql="SELECT DISTINCT(id_subrubro) as subrubrocuenta FROM egresos_cuenta WHERE cuenta_id_cuenta='".$id."' and fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."'  and egreso_publicado='1' and id_rubro='".$rubro."' ORDER BY id_rubro";
		//echo($sql);
		$select=$db->query($sql);
    	$campos=$select->fetchAll();
		$camposs = new Informes('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


# ============================================
# =           Sección Ingreso por Tipo Subruro - Cuenta           =
# ============================================
public static function SumaEgresosporsubrubro($FechaStart,$FechaEnd,$id,$egresopor){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(SUM(valor_egreso),0) as TotalEgresos FROM egresos_cuenta WHERE  fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."' and cuenta_id_cuenta='".$id."' and id_subrubro='".$egresopor."' order by fecha_egreso DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Informes('',$camposs);
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

# ============================================================
# =           Sección Lista de Ingresos a Caja           =
# ============================================================

public static function ListaIngresosCaja($FechaStart,$FechaEnd,$id){
	try {
		$db=Db::getConnect();
		$sql="SELECT DISTINCT(tipo_beneficiario) as ingreso_por FROM ingresos_caja WHERE caja_ppal='".$id."' and fecha_ingreso >='".$FechaStart."' and fecha_ingreso <='".$FechaEnd."' and estado_ingreso='1' and ingreso_publicado='1' ORDER BY tipo_beneficiario";
		//echo($sql);
		$select=$db->query($sql);
    	$campos=$select->fetchAll();
		$camposs = new Informes('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

# ============================================
# =           Sección Ingreso por Tipo - Caja           =
# ============================================
public static function SumaIngresosportipocaja($FechaStart,$FechaEnd,$id,$ingrespor){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(SUM(valor_ingreso),0) as TotalIngresos FROM ingresos_caja WHERE  fecha_ingreso >='".$FechaStart."' and fecha_ingreso <='".$FechaEnd."' and caja_ppal='".$id."' and tipo_beneficiario='".$ingrespor."' order by fecha_ingreso DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Informes('',$camposs);
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

# ============================================================
# =           Sección Lista de Ingresos por Caja           =
# ============================================================

public static function ListaEgresosCaja($FechaStart,$FechaEnd,$id){
	try {
		$db=Db::getConnect();
		$sql="SELECT DISTINCT(id_rubro) as rubrocuenta FROM egresos_caja WHERE caja_ppal='".$id."' and fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."'  and egreso_publicado='1' ORDER BY id_rubro";
		//echo($sql);
		$select=$db->query($sql);
    	$campos=$select->fetchAll();
		$camposs = new Informes('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

# ============================================
# =           Sección Ingreso por Tipo - Cuenta           =
# ============================================
public static function SumaEgresosportipocaja($FechaStart,$FechaEnd,$id,$egresopor){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(SUM(valor_egreso),0) as TotalEgresos FROM egresos_caja WHERE  fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."' and caja_ppal='".$id."' and id_rubro='".$egresopor."' order by fecha_egreso DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Informes('',$camposs);
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



# ============================================================
# =           Sección Lista de Egresos  por Subrubro           =
# ============================================================

public static function ListaEgresosSubrubrocaja($FechaStart,$FechaEnd,$id,$rubro){
	try {
		$db=Db::getConnect();
		$sql="SELECT DISTINCT(id_subrubro) as subrubrocuenta FROM egresos_caja WHERE caja_ppal='".$id."' and fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."'  and egreso_publicado='1' and id_rubro='".$rubro."' ORDER BY id_rubro";
		//echo($sql);
		$select=$db->query($sql);
    	$campos=$select->fetchAll();
		$camposs = new Informes('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

# ============================================
# =           Sección Ingreso por Tipo Subruro - Cuenta           =
# ============================================
public static function SumaEgresosporsubrubrocaja($FechaStart,$FechaEnd,$id,$egresopor){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT IFNULL(SUM(valor_egreso),0) as TotalEgresos FROM egresos_caja WHERE  fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."' and caja_ppal='".$id."' and id_subrubro='".$egresopor."' order by fecha_egreso DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Informes('',$camposs);
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


# ============================================================
# =           Sección Lista de Productos  por Linea de Negocio           =
# ============================================================

public static function ListaProductosporLinea($FechaStart,$FechaEnd,$id){
	try {
		$db=Db::getConnect();
		$sql="SELECT DISTINCT(A.producto_id_producto) as productodespachado FROM reporte_despachosclientes as A, productos as B WHERE A.fecha_reporte >='".$FechaStart."' and A.fecha_reporte<='".$FechaEnd."' and A.producto_id_producto=B.id_producto and B.linea_id='".$id."'";
		//echo($sql);
		$select=$db->query($sql);
    	$campos=$select->fetchAll();
		$camposs = new Informes('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

# ============================================================
# =           Sección Lista de Productos  por Linea de Negocio           =
# ============================================================

public static function ListaProductosporLineacrto($FechaStart,$FechaEnd,$id){
	try {
		$db=Db::getConnect();
		$sql="SELECT DISTINCT(A.producto_id_producto) as productodespachado FROM reporte_despachosconcreto as A, productos as B WHERE A.fecha_reporte >='".$FechaStart."' and A.fecha_reporte<='".$FechaEnd."' and A.producto_id_producto=B.id_producto and B.linea_id='".$id."'";
		//echo($sql);
		$select=$db->query($sql);
    	$campos=$select->fetchAll();
		$camposs = new Informes('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


# ============================================================
# =           Sección RQ  por Fecha           =
# ============================================================
public static function rqporfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM requisiciones WHERE  fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Requisiciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}




}

?>
