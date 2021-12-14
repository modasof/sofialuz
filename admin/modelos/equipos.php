<?php
/**
* CLASE PARA TRABAJAR CON LOS Slider
*/
class Equipos
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

		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' order by nombre_equipo asc");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS 	  **
********************************************************/
public static function obtenerPaginavolquetas(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and tipo_equipo='Volqueta' order by nombre_equipo asc");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS 	  **
********************************************************/
public static function obtenerPaginaestados(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_estado_equipos WHERE estado_publicado='1' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS	  **
********************************************************/
public static function obtenerPaginaInformeventasEq(){
	try {
		$db=Db::getConnect();
		$consulta="SELECT DISTINCT(B.id_equipo),B.nombre_equipo FROM reporte_prestamos as A, equipos as B WHERE A.reporte_publicado='1' and A.equipo_id_equipo=B.id_equipo and B.modulo='Asf' and A.estado_pago='Contado' order by nombre_equipo asc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Productos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS	  **
********************************************************/
public static function obtenerPaginaInformeventascxc(){
	try {
		$db=Db::getConnect();
		$consulta="SELECT DISTINCT(B.id_equipo),B.nombre_equipo FROM reporte_prestamos as A, equipos as B WHERE A.reporte_publicado='1' and A.equipo_id_equipo=B.id_equipo and B.modulo='Asf' and A.estado_pago='Cxc' order by nombre_equipo asc";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Productos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS 	  **
********************************************************/
public static function obtenerPaginareportes($equipo){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_equipos WHERE reporte_publicado='1' and equipo_id_equipo='".$equipo."' order by id_reporte desc");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA OBTENER TODAS LOS FUNCIONARIOS	  **
********************************************************/
public static function obtenerFuncionarios(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM funcionarios WHERE funcionario_publicado='1' order by nombre_funcionario");
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
** FUNCION PARA OBTENER LISTA DE LOS EQUIPOS   **
********************************************************/
public static function obtenerEquipos(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' order by nombre_equipo");
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
** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF	  **
********************************************************/
public static function obtenerListaEquiposAsf(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' order by nombre_equipo");
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
** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF	  **
********************************************************/
public static function obtenerListaEquiposAsfVolquetas(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' and tipo_equipo='Volqueta' order by nombre_equipo");
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
** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF	  **
********************************************************/
public static function ListaEquiposAsfMaqAmarilla(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' and tipo_equipo='Maquinaria Pesada' order by nombre_equipo");
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
** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF	  **
********************************************************/
public static function obtenerListaEquiposCombustible($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT equipo_id_equipo, sum(cantidad) as Galones FROM reporte_combustibles
where fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1'
Group by equipo_id_equipo order by Galones DESC");
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
** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF	  **
********************************************************/
public static function obtenerListaVolquetasAsf(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' and tipo_equipo='Volqueta' order by nombre_equipo");
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
** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF	  **
********************************************************/
public static function obtenerListaEquiposconcreto(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' and marca_equipo='MACK' order by nombre_equipo");
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
** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF	  **
********************************************************/
public static function ListaEquiposdiferentes(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' and tipo_equipo<>'Volqueta' and tipo_equipo<>'Equipos Menores' order by nombre_equipo");
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
** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF	  **
********************************************************/
public static function ListaEquiposMenores(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' and tipo_equipo='Equipos Menores' order by nombre_equipo");
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
** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
********************************************************/
public static function obtenerNombreEquipo($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_equipo FROM equipos WHERE id_equipo='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre_equipo'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

public static function obtenerPropietarioEquipo($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT propietario FROM equipos WHERE id_equipo='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['propietario'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

public static function obtenerPlacaEquipo($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT placa FROM equipos WHERE id_equipo='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['placa'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

public static function obtenerNombreTipoUnidad($id){
	try {
		$db=Db::getConnect();
		$consulta="SELECT DISTINCT(unidad_trabajo) FROM reporte_equipos WHERE equipo_id_equipo='".$id."'";
		$select=$db->query($consulta);
		//echo($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['unidad_trabajo'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL VALOR DE LA UNIDAD DE TRABAJO **
********************************************************/
public static function obtenerValorUnidadEq($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT valor_unidad FROM equipos WHERE id_equipo='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['valor_unidad'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
********************************************************/
public static function obtenerNombreFuncionario($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_funcionario FROM funcionarios WHERE id_funcionario='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre_funcionario'];
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
		$select=$db->query("SELECT * FROM equipos WHERE id_equipo='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Equipos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerPaginaestadosPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_estado_equipos WHERE equipo_id_equipo='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Equipos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerPaginareportePor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_equipos WHERE id_reporte='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Equipos('',$camposs);
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
		$select=$db->query("UPDATE equipos SET equipo_publicado='0' WHERE id_equipo='".$id."'");
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
public static function eliminarestadoPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM reporte_estado_equipos WHERE id='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA ELIINAR POR ID EN REPORTE  **
***************************************************************/
public static function eliminareportePor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_equipos SET reporte_publicado='0' WHERE id_reporte='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/********************************************************************
*** FUNCION PARA MODIFICAR EQUIPO ****
* `id_equipo`, `imagen`, `nombre_equipo`, `marca_equipo`, `serial_equipo`, `modelo`, `unidad_trabajo`, `tipo_equipo`, `placa`, `propietario`, `valor_activo`, `motor`, `peso`, `fecha_adquisicion`, `estado_equipo`, `equipo_publicado`, `creado_por`, `marca_temporal`, `modulo`, `observaciones`, `comision`
********************************************************************/
public static function actualizar($id_equipo,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE equipos SET
								imagen=:imagen,
								nombre_equipo=:nombre_equipo,
								marca_equipo=:marca_equipo,
								serial_equipo=:serial_equipo,
								modelo=:modelo,
								unidad_trabajo=:unidad_trabajo,
								tipo_equipo=:tipo_equipo,
								placa=:placa,
								propietario=:propietario,
								valor_activo=:valor_activo,
								motor=:motor,
								peso=:peso,
								fecha_adquisicion=:fecha_adquisicion,
								observaciones=:observaciones,
								comision=:comision
								WHERE id_equipo=:id_equipo');
		
		$V1=str_replace(".","",$valor_activo);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$update->bindValue('imagen',utf8_decode($imagen));
		$update->bindValue('nombre_equipo',utf8_decode($nombre_equipo));
		$update->bindValue('marca_equipo',utf8_decode($marca_equipo));
		$update->bindValue('serial_equipo',utf8_decode($serial_equipo));
		$update->bindValue('modelo',utf8_decode($modelo));
		$update->bindValue('unidad_trabajo',utf8_decode($unidad_trabajo));
		$update->bindValue('tipo_equipo',utf8_decode($tipo_equipo));
		$update->bindValue('placa',utf8_decode($placa));
		$update->bindValue('propietario',utf8_decode($propietario));
		$update->bindValue('valor_activo',utf8_decode($valornumero));
		$update->bindValue('motor',utf8_decode($motor));
		$update->bindValue('peso',utf8_decode($peso));
		$update->bindValue('fecha_adquisicion',utf8_decode($fecha_adquisicion));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('comision',utf8_decode($comision));
		$update->bindValue('id_equipo',utf8_decode($id_equipo));
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}


/********************************************************************
*** FUNCION PARA MODIFICAR EQUIPO ****
********************************************************************/
public static function actualizarvol($id_equipo,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE equipos SET
								nombre_equipo=:nombre_equipo,
								marca_equipo=:marca_equipo,
								serial_equipo=:serial_equipo,
								modelo=:modelo,
								unidad_trabajo=:unidad_trabajo,
								tipo_equipo=:tipo_equipo,
								placa=:placa,
								propietario=:propietario,
								valor_unidad=:valor_unidad,
								modulo=:modulo,
								observaciones=:observaciones,
								rend_interno=:rend_interno,
								unidad_interna=:unidad_interna,
								rend_externo=:rend_externo,
								unidad_externa=:unidad_externa
								WHERE id_equipo=:id_equipo');
		
		$V1=str_replace(".","",$valor_unidad);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$update->bindValue('nombre_equipo',utf8_decode($nombre_equipo));
		$update->bindValue('marca_equipo',utf8_decode($marca_equipo));
		$update->bindValue('serial_equipo',utf8_decode($serial_equipo));
		$update->bindValue('modelo',utf8_decode($modelo));
		$update->bindValue('unidad_trabajo',utf8_decode($unidad_trabajo));
		$update->bindValue('tipo_equipo',utf8_decode($tipo_equipo));
		$update->bindValue('placa',utf8_decode($placa));
		$update->bindValue('propietario',utf8_decode($propietario));
		$update->bindValue('valor_unidad',utf8_decode($valornumero));
		$update->bindValue('modulo',utf8_decode($modulo));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('rend_interno',utf8_decode($rend_interno));
		$update->bindValue('unidad_interna',utf8_decode($unidad_interna));
		$update->bindValue('rend_externo',utf8_decode($rend_externo));
		$update->bindValue('unidad_externa',utf8_decode($unidad_externa));
		$update->bindValue('id_equipo',utf8_decode($id_equipo));
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
********************************************************************/
public static function actualizareporte($id_reporte,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_equipos SET
								equipo_id_equipo=:equipo_id_equipo,
								funcionario_id_funcionario=:funcionario_id_funcionario,
								fecha_reporte=:fecha_reporte,
								num_trabajado=:num_trabajado,
								dias_trabajados=:dias_trabajados,
								unidad_trabajo=:unidad_trabajo,
								num_galones=:num_galones,
								valor_combustible=:valor_combustible,
								observaciones=:observaciones,
								actividad=:actividad,
								repuesto=:repuesto,
								num_factura=:num_factura
								WHERE id_reporte=:id_reporte');
		
		$V1=str_replace(".","",$valor_combustible);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);


		$update->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$update->bindValue('funcionario_id_funcionario',utf8_decode($funcionario_id_funcionario));
		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('num_trabajado',utf8_decode($num_trabajado));
		$update->bindValue('dias_trabajados',utf8_decode($dias_trabajados));
		$update->bindValue('unidad_trabajo',utf8_decode($unidad_trabajo));
		$update->bindValue('num_galones',utf8_decode($num_galones));
		$update->bindValue('valor_combustible',utf8_decode($valornumero));
		$update->bindValue('observaciones',$observaciones);
		$update->bindValue('actividad',$actividad);
		$update->bindValue('repuesto',$repuesto);
		$update->bindValue('num_factura',$num_factura);
		$update->bindValue('id_reporte',utf8_decode($id_reporte));
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR **
( `imagen`, `nombre_equipo`, `marca_equipo`, `serial_equipo`, `modelo`, `unidad_trabajo`, `tipo_equipo`, `placa`, `propietario`, `valor_activo`, `motor`, `peso`, `fecha_adquisicion`, `estado_equipo`, `equipo_publicado`, `creado_por`, `marca_temporal`, `modulo`, `observaciones`)
***************************************************************/
public static function guardar($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO equipos VALUES (NULL,:imagen,:nombre_equipo, :marca_equipo, :serial_equipo, :modelo, :unidad_trabajo, :tipo_equipo, :placa, :propietario,:valor_activo,:motor,:peso,:fecha_adquisicion, :estado_equipo, :equipo_publicado, :creado_por, :marca_temporal,:modulo, :observaciones,:comision)');//

		$V1=str_replace(".","",$valor_activo);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

        $insert->bindValue('imagen',utf8_decode($imagen));
		$insert->bindValue('nombre_equipo',utf8_decode($nombre_equipo));
		$insert->bindValue('marca_equipo',utf8_decode($marca_equipo));
		$insert->bindValue('serial_equipo',utf8_decode($serial_equipo));
		$insert->bindValue('modelo',utf8_decode($modelo));
		$insert->bindValue('unidad_trabajo',utf8_decode($unidad_trabajo));
		$insert->bindValue('tipo_equipo',utf8_decode($tipo_equipo));
		$insert->bindValue('placa',utf8_decode($placa));
		$insert->bindValue('propietario',utf8_decode($propietario));
		$insert->bindValue('valor_activo',utf8_decode($valornumero));
		$insert->bindValue('motor',utf8_decode($motor));
		$insert->bindValue('peso',utf8_decode($peso));
		$insert->bindValue('fecha_adquisicion',utf8_decode($fecha_adquisicion));
		$insert->bindValue('estado_equipo',utf8_decode($estado_equipo));
		$insert->bindValue('equipo_publicado',utf8_decode($equipo_publicado));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('modulo',utf8_decode($modulo));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		$insert->bindValue('comision',utf8_decode($comision));

		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR ESTADO **
***************************************************************/
public static function guardarestado($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO reporte_estado_equipos VALUES (NULL,:equipo_id_equipo,:fecha_reporte,:estado_sel,:tiempo,:estado_publicado, :creado_por, :marca_temporal,:observaciones)');//Fredy Gonzalez 29/03/2021

		$insert->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$insert->bindValue('fecha_reporte',utf8_decode($fecha_reporte));
		$insert->bindValue('estado_sel',utf8_decode($estado_sel));
		$insert->bindValue('tiempo',utf8_decode($tiempo));
		$insert->bindValue('estado_publicado',utf8_decode($estado_publicado));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR **
***************************************************************/
public static function guardarvol($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO equipos VALUES (NULL,:nombre_equipo, :marca_equipo, :serial_equipo, :modelo, :unidad_trabajo, :tipo_equipo, :placa, :propietario,:valor_unidad, :estado_equipo, :equipo_publicado, :creado_por, :marca_temporal,:modulo, :observaciones,:rend_interno,:unidad_interna,:rend_externo,:unidad_externa,:sn_ver_estadistica)');//Harold Gutierrez 

		$V1=str_replace(".","",$valor_unidad);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$insert->bindValue('nombre_equipo',utf8_decode($nombre_equipo));
		$insert->bindValue('marca_equipo',utf8_decode($marca_equipo));
		$insert->bindValue('serial_equipo',utf8_decode($serial_equipo));
		$insert->bindValue('modelo',utf8_decode($modelo));
		$insert->bindValue('unidad_trabajo',utf8_decode($unidad_trabajo));
		$insert->bindValue('tipo_equipo',utf8_decode($tipo_equipo));
		$insert->bindValue('placa',utf8_decode($placa));
		$insert->bindValue('propietario',utf8_decode($propietario));
		$insert->bindValue('valor_unidad',utf8_decode($valornumero));
		$insert->bindValue('estado_equipo',utf8_decode($estado_equipo));
		$insert->bindValue('equipo_publicado',utf8_decode($equipo_publicado));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('modulo',utf8_decode($modulo));
		$insert->bindValue('observaciones',utf8_decode($observaciones));
		$insert->bindValue('rend_interno',utf8_decode($rend_interno));
		$insert->bindValue('unidad_interna',utf8_decode($unidad_interna));
		$insert->bindValue('rend_externo',utf8_decode($rend_externo));
		$insert->bindValue('unidad_externa',utf8_decode($unidad_externa));
		$insert->bindValue('sn_ver_estadistica',utf8_decode('1')); //Harold Gutierrez 14/08/2020
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR REPORTE**
***************************************************************/
public static function guardareporte($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);


		$insert=$db->prepare('INSERT INTO reporte_equipos VALUES (NULL,:equipo_id_equipo, :fecha_reporte, :funcionario_id_funcionario, :valor_reporte,:num_trabajado,:dias_trabajados, :unidad_trabajo, :num_galones, :valor_combustible, :observaciones,:actividad,:repuesto, :marca_temporal, :creado_por, :reporte_publicado, :estado_reporte,:num_factura)');

		$valor_reporte=Equipos::obtenerValorUnidadEq($equipo_id_equipo);

		$V1=str_replace(".","",$valor_combustible);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('funcionario_id_funcionario',utf8_decode($funcionario_id_funcionario));
		$insert->bindValue('valor_reporte',utf8_decode($valor_reporte));
		$insert->bindValue('num_trabajado',utf8_decode($num_trabajado));
		$insert->bindValue('dias_trabajados',utf8_decode($dias_trabajados));
		$insert->bindValue('unidad_trabajo',utf8_decode($unidad_trabajo));
		$insert->bindValue('num_galones',utf8_decode($num_galones));
		$insert->bindValue('valor_combustible',utf8_decode($valornumero));
		$insert->bindValue('observaciones',$observaciones);
		$insert->bindValue('actividad',$actividad);
		$insert->bindValue('repuesto',$repuesto);
		$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$insert->bindValue('num_factura',utf8_decode($num_factura));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCIONES VER ULTIMOS DOCUMENTOS EN  INDEX   **
***************************************************************/
public static function obtenerUltimosReportes(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_equipos order by id_reporte desc limit 10");
		$camposs=$select->fetchAll();
		$campos = new Equipos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCIONES VER ULTIMOS REPORTES POR EQUIPO   **
***************************************************************/
public static function obtenerUltimosReportespor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_horas WHERE equipo_id_equipo='".$id."' order by id desc limit 10");
		$camposs=$select->fetchAll();
		$campos = new Equipos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCIONES PARA GRÁFICAS REPORTE  X DIA X EQUIPO **
***************************************************************/
public static function GraficaReporteDiario($mes,$equipo){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DATE_FORMAT(fecha_reporte, '%d') as DIA, IFNULL(ROUND(SUM(num_trabajado),1),0) AS TB FROM reporte_equipos WHERE MONTH(fecha_reporte)='".$mes."' and equipo_id_equipo='".$equipo."' GROUP by DIA");
		$camposs=$select->fetchAll();
		$campos = new Equipos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


public static function cambiarvisualizacionestadistica($id,$sn_estadistica){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE equipos set sn_ver_estadistica=".$sn_estadistica." WHERE id_equipo='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}

}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerNovedadesPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_estado_equipos WHERE equipo_id_equipo='".$id."' and estado_publicado='1' order by fecha_reporte asc");
		$camposs=$select->fetchAll();
		$campos = new Equipos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



}

?>
