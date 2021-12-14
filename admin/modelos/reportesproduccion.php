<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/
class Reportesproduccion
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
public static function ReportesProduccion(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_produccion WHERE reporte_publicado='1' and tipo_despacho='Produccion' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportesproduccion('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function reportesporfechaproduccion($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_produccion WHERE reporte_publicado='1' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and tipo_despacho='Produccion' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Reportesproduccion('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/***************************************************************
*** FUNCION PARA GUARDAR **
(`id`, `fecha_reporte`, `cliente_id_cliente`, `producto_id_producto`, `equipo_id_equipo`, `despachado_por`, `transportado_por`, `despachador_tm`, `tipo_despacho`, `valor_m3`, `cantidad`, `viajes`, `creado_por`, `estado_reporte`, `reporte_publicado`, `marca_temporal`, `observaciones`, `facturado`)
***************************************************************/
public static function guardarreporteproduccion($campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$valorinsumo=5600;

		$insert=$db->prepare('INSERT INTO reporte_produccion VALUES (NULL,:fecha_reporte, :cliente_id_cliente, :producto_id_producto,:equipo_id_equipo,:despachado_por,:transportado_por,:despachador_tm,:tipo_despacho, :valor_m3, :cantidad,:viajes,:horas,:rendimiento, :creado_por, :estado_reporte, :reporte_publicado,:marca_temporal, :observaciones)');

		//$V1=str_replace(".","",$valor_m3);
		//$V2=str_replace(" ", "", $V1);
		//$valor_final=str_replace("$", "", $V2);
		//$valornumero=(int) $valor_final;

		$rendimiento=round($cantidad/$horas,2);

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$insert->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$insert->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
		$insert->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$insert->bindValue('despachado_por',utf8_decode($despachado_por));
		$insert->bindValue('transportado_por',utf8_decode($transportado_por));
		$insert->bindValue('despachador_tm',utf8_decode($despachador_tm));
		$insert->bindValue('tipo_despacho',utf8_decode($tipo_despacho));
		$insert->bindValue('valor_m3',utf8_decode($valorinsumo));
		$insert->bindValue('cantidad',utf8_decode($cantidad));
		$insert->bindValue('viajes',utf8_decode($viajes));
		$insert->bindValue('horas',utf8_decode($horas));
		$insert->bindValue('rendimiento',utf8_decode($rendimiento));
		$insert->bindValue('creado_por',utf8_decode($creado_por));
		$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
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
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminarreporteproduccion($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("DELETE from reporte_produccion WHERE id='".$id."'");
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
public static function editarreporteproduccionPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_produccion WHERE id='".$id."' and estado_reporte='1'");
		$camposs=$select->fetchAll();
		$campos = new Reportesproduccion('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
********************************************************************/
public static function actualizarreporteproduccion($id,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_produccion SET
								fecha_reporte=:fecha_reporte,
								cliente_id_cliente=:cliente_id_cliente,
								producto_id_producto=:producto_id_producto,
								equipo_id_equipo=:equipo_id_equipo,
								despachado_por=:despachado_por,
								transportado_por=:transportado_por,
								despachador_tm=:despachador_tm,
								tipo_despacho=:tipo_despacho,
								valor_m3=:valor_m3,
								cantidad=:cantidad,
								viajes=:viajes,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								observaciones=:observaciones
								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$update->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
		$update->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$update->bindValue('despachado_por',utf8_decode($despachado_por));
		$update->bindValue('transportado_por',utf8_decode($transportado_por));
		$update->bindValue('despachador_tm',utf8_decode($despachador_tm));
		$update->bindValue('tipo_despacho',utf8_decode($tipo_despacho));
		$update->bindValue('valor_m3',utf8_decode($valornumero));
		$update->bindValue('cantidad',utf8_decode($cantidad));
		$update->bindValue('viajes',utf8_decode($viajes));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
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
