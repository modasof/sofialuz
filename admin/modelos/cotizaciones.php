<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/
class Cotizaciones
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
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function todos(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM cotizaciones_item as A, ordenescompra as B WHERE A.estado_cotizacion='2' and A.ordencompra_num=B.id  and B.estado_orden<>'0' order by A.id DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Cotizaciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function cotizacionesporinsumo($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM cotizaciones_item WHERE estado_cotizacion='2' and insumo_id_insumo='".$id."' order by id DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Cotizaciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function porfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM cotizaciones_item as A, ordenescompra as B WHERE estado_cotizacion='2' and B.fecha_reporte >='".$FechaStart."' and B.fecha_reporte <='".$FechaEnd."' and A.ordencompra_num=B.id  and B.estado_orden<>'0' order by B.fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Cotizaciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function editar($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM cotizaciones_item WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Cotizaciones('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
********************************************************************/
public static function actualizar($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_Cotizaciones SET
								imagen=:imagen,
								fecha_reporte=:fecha_reporte,
								equipo_id_equipo=:equipo_id_equipo,
								despachado_por=:despachado_por,
								punto_despacho=:punto_despacho,
								recibido_por=:recibido_por,
								valor_m3=:valor_m3,
								cliente_id_cliente=:cliente_id_cliente,
								proyecto_id_proyecto=:proyecto_id_proyecto,
								valor_hora_operador=:valor_hora_operador,
								cantidad=:cantidad,
								indicador=:indicador,
								hora_inactiva=:hora_inactiva,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								equipo_adicional=:equipo_adicional,
								nombre_equipo_adicional=:nombre_equipo_adicional,
								observaciones=:observaciones
								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$V11=str_replace(".","",$valor_hora_operador);
		$V21=str_replace(" ", "", $V11);
		$valor_final1=str_replace("$", "", $V21);
		$valornumero1=(int) $valor_final1;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('imagen',utf8_decode($imagen));
		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$update->bindValue('despachado_por',utf8_decode($despachado_por));
		$update->bindValue('punto_despacho',utf8_decode($punto_despacho));
		$update->bindValue('recibido_por',utf8_decode($recibido_por));
		$update->bindValue('valor_m3',utf8_decode($valornumero));
		$update->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$update->bindValue('proyecto_id_proyecto',utf8_decode($proyecto_id_proyecto));
		$update->bindValue('valor_hora_operador',utf8_decode($valornumero1));
		$update->bindValue('cantidad',utf8_decode($cantidad));
		$update->bindValue('indicador',utf8_decode($indicador));
		$update->bindValue('hora_inactiva',utf8_decode($hora_inactiva));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('equipo_adicional',utf8_decode($equipo_adicional));
		$update->bindValue('nombre_equipo_adicional',utf8_decode($nombre_equipo_adicional));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}


}

?>
