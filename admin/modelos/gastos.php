<?php
/**
* CLASE PARA TRABAJAR CON LOS GASTOS
*/
class Gastos
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
public static function obtenerPagina($id_caja){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM egresos_caja WHERE caja_ppal='".$id_caja."' and estado_egreso='1' order by id_egreso_caja DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Gastos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS	  **
********************************************************/
public static function obtenertotalPagina(){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM egresos_caja WHERE estado_egreso='1' order by id_egreso_caja DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Gastos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS	  **
********************************************************/
public static function obtenertotalPaginaLegalizados(){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM egresos_caja WHERE estado_egreso='2' order by id_egreso_caja DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Gastos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/***************************************************************
 *** FUNCION PARA GUARDAR **
 ***************************************************************/
    public static function actualizarestado($estado_egreso, $items)
    {
        try {

            $db       = Db::getConnect();
            $dbselect = Db::getConnect();
            //$campostraidos = $campos->getCampos();
            $items = explode(",", $items);
            foreach ($items as $key => $despachounico) {
                $update = $db->prepare('UPDATE egresos_caja SET
								estado_egreso=:estado_egreso
								WHERE id_egreso_caja=:despachounico');
                $update->bindValue('estado_egreso', utf8_decode($estado_egreso));
                $update->bindValue('despachounico', utf8_decode($despachounico));
                $update->execute();
            }
            return $estado_egreso;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }
    }



/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function Totalporfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM egresos_caja WHERE  fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."' and estado_egreso='1' order by fecha_egreso DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Gastos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function Totalporfechalegalizados($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM egresos_caja WHERE  fecha_egreso >='".$FechaStart."' and fecha_egreso <='".$FechaEnd."' and estado_egreso='2' order by fecha_egreso DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Gastos('',$camposs);
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

		$select=$db->query("SELECT * FROM cajas WHERE caja_publicada='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Gastos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}


/*******************************************************
** FUNCION PARA MOSTRAR EL ULTIMO ID **
********************************************************/
public static function ultimoIdEgresocaja(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT id_egreso_caja FROM egresos_caja ORDER BY id_egreso_caja DESC LIMIT 1");
    	$camposs=$select->fetchAll();
    	$campos = new Gastos('',$camposs);
    	$datos = $campos->getCampos();
		foreach($datos as $ndato){
			$eldato = $ndato['id_egreso_caja'];
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
public static function obtenerCajas($cajaSel){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cajas WHERE caja_publicada='1' and id_caja<>'".$cajaSel."' order by nombre_caja asc");
    	$camposs=$select->fetchAll();
    	$campos = new Gastos('',$camposs);
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
		$select=$db->query("SELECT * FROM cajas WHERE id_caja='".$id_caja."' and caja_publicada='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Gastos('',$camposs);
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
    	$campos = new Gastos('',$camposs);
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
    	$campos = new Gastos('',$camposs);
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
    	$campos = new Gastos('',$camposs);
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
		$select=$db->query("SELECT nombre_caja FROM cajas WHERE id_caja='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Gastos('',$camposs);
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
** FUNCION PARA MOSTRAR EGRESOS POR TIPO DE GASTO**
********************************************************/
public static function EgresosPortipo($caja,$tipoegreso){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT IFNULL(SUM(valor_egreso),0) as egresosporcaja FROM egresos_caja WHERE caja_ppal='".$caja."' and tipo_beneficiario='".$tipoegreso."'");
    	$camposs=$select->fetchAll();
    	$campos = new Gastos('',$camposs);
    	$cajas = $campos->getCampos();
		foreach($cajas as $ncaja){
			$lacaja = $ncaja['egresosporcaja'];
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
		$campos = new Gastos('',$camposs);
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


/********************************************************************
*** FUNCION PARA MODIFICAR ****
* `id_egreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_egreso`, `caja_ppal`, `caja_id_caja`, `cuenta_id_cuenta`, `beneficiario`, `identificacion`, `id_rubro`, `id_subrubro`, `valor_egreso`, `observaciones`, `marca_temporal`, `egreso_publicado`, `estado_egreso`, `creado_por`, `aplica_equipo`, `equipo_id_equipo`
********************************************************************/
public static function actualizarex($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);
		//

		$update=$db->prepare('UPDATE egresos_caja SET 
								imagen=:imagen,
								tipo_beneficiario=:tipo_beneficiario,
								fecha_egreso=:fecha_egreso,
								caja_ppal=:caja_ppal,
								caja_id_caja=:caja_id_caja,
								cuenta_id_cuenta=:cuenta_id_cuenta,
								beneficiario=:beneficiario,
								identificacion=:identificacion,
								id_rubro=:id_rubro,
								id_subrubro=:id_subrubro,
								valor_egreso=:valor_egreso,
								observaciones=:observaciones,
								marca_temporal=:marca_temporal,
								egreso_publicado=:egreso_publicado,
								estado_egreso=:estado_egreso,
								creado_por=:creado_por,
								aplica_equipo=:aplica_equipo,
								equipo_id_equipo=:equipo_id_equipo
								WHERE id_egreso_caja=:id_egreso_caja');
		
		$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;
		$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',$imagen);
		$update->bindValue('tipo_beneficiario',$tipo_beneficiario);
		$update->bindValue('fecha_egreso',$nuevafecha);
		$update->bindValue('caja_ppal',$caja_ppal);
		$update->bindValue('caja_id_caja',$caja_id_caja);
		$update->bindValue('cuenta_id_cuenta',$cuenta_id_cuenta);
		$update->bindValue('beneficiario',$beneficiario);
		$update->bindValue('identificacion',$identificacion);
		$update->bindValue('id_rubro',$id_rubro);
		$update->bindValue('id_subrubro',$id_subrubro);
		$update->bindValue('valor_egreso',$valornumero);
		$update->bindValue('observaciones',$observaciones);
		$update->bindValue('marca_temporal',$marca_temporal);
		$update->bindValue('egreso_publicado',$egreso_publicado);
		$update->bindValue('estado_egreso',$estado_egreso);
		$update->bindValue('creado_por',$creado_por);
		$update->bindValue('aplica_equipo',$aplica_equipo);
		$update->bindValue('equipo_id_equipo',$equipo_id_equipo);
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
INSERT INTO `egresos_caja`(`id_egreso_caja`, `imagen`, `tipo_beneficiario`, `fecha_egreso`, `caja_ppal`, `caja_id_caja`, `cuenta_id_cuenta`, `beneficiario`, `identificacion`, `id_rubro`, `id_subrubro`, `valor_egreso`, `observaciones`, `marca_temporal`, `egreso_publicado`, `estado_egreso`, `creado_por`,'aplica_equipo', `equipo_id_equipo`)
***************************************************************/
public static function guardar($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

	$insert=$db->prepare('INSERT INTO egresos_caja VALUES (NULL,:imagen,:tipo_beneficiario,:fecha_egreso,:caja_ppal,:caja_id_caja,:cuenta_id_cuenta,:beneficiario,:identificacion,:id_rubro,:id_subrubro,:valor_egreso,:observaciones,:marca_temporal,:egreso_publicado,:estado_egreso,:creado_por,:aplica_equipo,:equipo_id_equipo)');

		$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);

	if ($tipo_beneficiario=="Caja Sistema") {
		$id_rubro=6;
		$id_subrubro=41;
	}

		$insert->bindValue('imagen',$imagen);
		$insert->bindValue('tipo_beneficiario',$tipo_beneficiario);
		$insert->bindValue('fecha_egreso',$nuevafecha);
		$insert->bindValue('caja_ppal',$caja_ppal);
		$insert->bindValue('caja_id_caja',$caja_id_caja);
		$insert->bindValue('cuenta_id_cuenta',$caja_id_caja);
		$insert->bindValue('beneficiario',utf8_decode($beneficiario));
		$insert->bindValue('identificacion',utf8_decode($identificacion));
		$insert->bindValue('id_rubro',$id_rubro);
		$insert->bindValue('id_subrubro',$id_subrubro);
		$insert->bindValue('valor_egreso',$valornumero);
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		$insert->bindValue('marca_temporal',$marca_temporal);
		$insert->bindValue('egreso_publicado',$egreso_publicado);
		$insert->bindValue('estado_egreso',$estado_egreso);
		$insert->bindValue('creado_por',$creado_por);
		$insert->bindValue('aplica_equipo',$aplica_equipo);
		$insert->bindValue('equipo_id_equipo',$equipo_id_equipo);

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
public static function guardaringreso($campos,$imagen,$ultimoIdEgreso){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO ingresos_caja VALUES (NULL,:imagen,:tipo_beneficiario,:fecha_ingreso,:caja_ppal,:caja_id_caja,:cuenta_id_cuenta,:beneficiario,:identificacion,:id_rubro,:id_subrubro,:valor_ingreso,:observaciones,:marca_temporal,:ingreso_publicado,:estado_ingreso,:creado_por,:ingreso_por_cuentas,:ingreso_por_caja)');

		$V1=str_replace(".","",$valor_egreso);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_egreso);
		$nuevafecha=date('y-m-d',$t);
		$ingreso_por_cuentas=0;
		$id_rubro=6;
		$id_subrubro=41;
		
		
		$insert->bindValue('imagen',$imagen);
		$insert->bindValue('tipo_beneficiario',$tipo_beneficiario);
		$insert->bindValue('fecha_ingreso',$nuevafecha);
		$insert->bindValue('caja_ppal',$caja_id_caja);
		$insert->bindValue('caja_id_caja',$caja_ppal);
		$insert->bindValue('cuenta_id_cuenta',$cuenta_id_cuenta);
		$insert->bindValue('beneficiario',$beneficiario);
		$insert->bindValue('identificacion',$identificacion);
		$insert->bindValue('id_rubro',$id_rubro);
		$insert->bindValue('id_subrubro',$id_subrubro);
		$insert->bindValue('valor_ingreso',$valornumero);
		$insert->bindValue('observaciones',$observaciones);
		$insert->bindValue('marca_temporal',$marca_temporal);
		$insert->bindValue('ingreso_publicado',$egreso_publicado);
		$insert->bindValue('estado_ingreso',$estado_egreso);
		$insert->bindValue('creado_por',$creado_por);
		$insert->bindValue('ingreso_por_cuentas',$ingreso_por_cuentas);
		$insert->bindValue('ingreso_por_caja',$ultimoIdEgreso);

		$insert->execute();
		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL REGISTRO ID DEL INGRESO A CAJA **
********************************************************/
public static function obtenerIdingresocajasistema($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT id_ingreso_caja FROM ingresos_caja WHERE ingreso_por_caja='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Gastos('',$camposs);
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

/***************************************************************
** FUNCION PARA ELIINAR MOVIMIENTO EN CUENTA REALIZADO A CAJA **
***************************************************************/
public static function eliminaregresocajasistema($idegreso){ 

	try {		
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM egresos_caja WHERE id_egreso_caja='".$idegreso."'");
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
public static function eliminaringresocajasistema($idingreso){ 

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

public static function GraficaHistorialGastosporRubro($rubro,$caja){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT fecha_egreso,IFNULL(sum(ROUND(valor_egreso,0)),0) as totales FROM egresos_cuenta WHERE  egreso_publicado='1' and id_rubro='".$rubro."' and cuenta_id_cuenta='14' GROUP BY fecha_egreso ORDER BY fecha_egreso ASC");
		$camposs=$select->fetchAll();
		$campos = new Gastos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



}

?>
