<?php
/**
* CLASE PARA TRABAJAR CON LOS MODELOS
*/
class Insumos
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
		$consulta="

		SELECT insumos.*, nombre_unidadmedida FROM insumos 
			LEFT JOIN  unidadmedida on unidadmedida.id_unidadmedida = insumos.unidadmedida_id
		WHERE estado_insumo='1' 
		order by nombre_insumo asc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Insumos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS	  **
********************************************************/
public static function obtenerinsumosparametrizados(){
	try {
		$db=Db::getConnect();
		$consulta="

		SELECT * FROM insumos WHERE parametrizado='Si' and estado_insumo='1' order by nombre_insumo asc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Insumos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR LOS INSUMOS PENDIENTES X PAGAR	  **
********************************************************/
public static function ListaInsumoscuentasxpagar(){
	try {
		$db=Db::getConnect();
		$consulta="SELECT DISTINCT(B.insumo_id_insumo),A.nombre_insumo FROM insumos AS A, reporte_compras as B WHERE estado_insumo='1' and reporte_publicado='1' and estado_reporte='2' and A.id_insumo=B.insumo_id_insumo order by nombre_insumo asc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Insumos('',$camposs);
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
		$select=$db->query("SELECT * FROM insumos WHERE id_insumo='".$id."' and estado_insumo='1'");
		$camposs=$select->fetchAll();
		$campos = new Insumos('',$camposs);
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
		$select=$db->query("UPDATE insumos SET estado_insumo='0' WHERE id_insumo='".$id."'");
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
public static function actualizar($id,$categoriainsumo_id,$nombre_insumo,$unidadmedida_id,$parametrizado,$cantidadminima){
	try {
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE insumos SET
								nombre_insumo= :nombre_insumo,
								categoriainsumo_id=:categoriainsumo_id,
								unidadmedida_id = :unidadmedida_id,
								parametrizado = :parametrizado,
								cantidadminima=:cantidadminima
								WHERE id_insumo=:id');
		$update->bindValue('nombre_insumo',$nombre_insumo);		
		$update->bindValue('categoriainsumo_id',$categoriainsumo_id);
		$update->bindValue('unidadmedida_id',$unidadmedida_id);
		$update->bindValue('parametrizado',$parametrizado);
		$update->bindValue('cantidadminima',$cantidadminima);
		$update->bindValue('id',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA ACTUALIZAR NONBRE  **
***************************************************************/
public static function actualizarNombre($campo,$id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE insumos SET nombre_insumo='".utf8_decode($campo)."' WHERE id_insumo='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/***************************************************************
*** FUNCION PARA GUARDAR **
***************************************************************/
public static function guardar($nombre_insumo,$estado_insumo,$unidadmedida_id,$categoriainsumo_id,$parametrizado,$cantidadminima){
	try {
		$db=Db::getConnect();
		//$campostraidos = $campos->getCampos();
		//extract($campostraidos);

		$insert=$db->prepare('INSERT INTO insumos VALUES (NULL,:nombre_insumo,:estado_insumo,:unidadmedida_id,:categoriainsumo_id,:parametrizado,:cantidadminima)');

		$insert->bindValue('nombre_insumo',utf8_decode($nombre_insumo));
		$insert->bindValue('estado_insumo',utf8_decode($estado_insumo));
		$insert->bindValue('unidadmedida_id',utf8_decode($unidadmedida_id));
		$insert->bindValue('categoriainsumo_id',utf8_decode($categoriainsumo_id));
		$insert->bindValue('parametrizado',utf8_decode($parametrizado));
		$insert->bindValue('cantidadminima',utf8_decode($cantidadminima));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}



/***************************************************************
*** FUNCION PARA GUARDAR EL INVENTARIO INICIAL**
* INSERT INTO `entradas_ins`(`id_entrada_ins`, `fecha_reporte`, `insumo_id_insumo`, `proyecto_id_proyecto`, `categoria_id`, `cantidad`, `marca_temporal`, `creado_por`, `observaciones`, `tipo_entrada`, `soporte_num`)
***************************************************************/
public static function guardarinventarioIn($FechaActual,$ultimoid,$proyecto_id_proyecto,$categoriainsumo_id,$cantidad,$TiempoActual,$creado_por,$observaciones,$tipoentrada,$soporte_num){
	try {
		$db=Db::getConnect();
		//$campostraidos = $campos->getCampos();
		//extract($campostraidos);

		$insert=$db->prepare('INSERT INTO entradas_ins VALUES (NULL,:fecha_reporte,:insumo_id_insumo,:proyecto_id_proyecto,:categoriainsumo_id,:cantidad,:marca_temporal,:creado_por,:observaciones,:tipo_entrada,:soporte_num)');

		$insert->bindValue('fecha_reporte',utf8_decode($FechaActual));
		$insert->bindValue('insumo_id_insumo',utf8_decode($ultimoid));
		$insert->bindValue('proyecto_id_proyecto',utf8_decode($proyecto_id_proyecto));
		$insert->bindValue('categoriainsumo_id',utf8_decode($categoriainsumo_id));
		$insert->bindValue('cantidad',utf8_decode($cantidad));
		$insert->bindValue('marca_temporal',utf8_decode($TiempoActual));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		$insert->bindValue('tipo_entrada',utf8_decode($tipoentrada));
		$insert->bindValue('soporte_num',utf8_decode($soporte_num));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function obtenerListaInsumos(){
	try {
		$db=Db::getConnect();
		$select=$db->query("
			SELECT insumos.*, nombre FROM insumos 
			LEFT JOIN  categoriainsumos on categoriainsumos.id = insumos.categoriainsumo_id
			WHERE estado_insumo='1' 
			order by nombre asc
			");
    	$campos=$select->fetchAll();
		$camposs = new Equipos('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
********************************************************/
public static function obtenerNombreInsumo($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_insumo FROM insumos WHERE id_insumo='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre_insumo'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL ID CATEGORIA **
********************************************************/
public static function obtenerCategoria($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT categoriainsumo_id FROM insumos WHERE id_insumo='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['categoriainsumo_id'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL ID DE LA UNIDAD **
********************************************************/
public static function obtenerUnidadmed($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT unidadmedida_id FROM insumos WHERE id_insumo='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['unidadmedida_id'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR EL ULTIMO USUARIO CREADO **
********************************************************/
public static function obtenerUltimo(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT id_insumo FROM insumos ORDER BY id_insumo DESC LIMIT 1");
    	$camposs=$select->fetchAll();
    	$campos = new Insumos('',$camposs);
    	$rubros = $campos->getCampos();
		foreach($rubros as $nrubro){
			$elrubro = $nrubro['id_insumo'];
		}
		return $elrubro;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL ULTIMO USUARIO CREADO **
********************************************************/
public static function Valorpromediocompra($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT AVG(vr_unitario) as valorpromedio FROM cotizaciones_item WHERE insumo_id_insumo='".$id."' and estado_cotizacion='2'");
    	$camposs=$select->fetchAll();
    	$campos = new Insumos('',$camposs);
    	$rubros = $campos->getCampos();
		foreach($rubros as $nrubro){
			$elrubro = $nrubro['valorpromedio'];
		}
		return $elrubro;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


}

?>
