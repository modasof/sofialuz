<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/
class Concreto
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

	public static function reporte($idget){
		try {
			$db=Db::getConnect();

			$select=$db->query("SELECT 
				reporte_despachosconcreto.id, reporte_despachosconcreto.imagen, 
				reporte_despachosconcreto.fecha_reporte, 
				reporte_despachosconcreto.remision, 
				reporte_despachosconcreto.cliente_id_cliente, 
				reporte_despachosconcreto.producto_id_producto, 
				reporte_despachosconcreto.equipo_id_equipo, 
				reporte_despachosconcreto.despachado_por, 
				reporte_despachosconcreto.transporte, 
				reporte_despachosconcreto.kilometraje, 
				reporte_despachosconcreto.valor_m3, reporte_despachosconcreto.valor_material, 
				reporte_despachosconcreto.contador1, reporte_despachosconcreto.contador2, 
				reporte_despachosconcreto.puntos, reporte_despachosconcreto.cantidad, 
				reporte_despachosconcreto.viajes, 
				reporte_despachosconcreto.radicada, reporte_despachosconcreto.fecha_radicada, 
				reporte_despachosconcreto.factura, 
				reporte_despachosconcreto.pagado, reporte_despachosconcreto.creado_por, 
				reporte_despachosconcreto.estado_reporte, reporte_despachosconcreto.reporte_publicado, 
				reporte_despachosconcreto.marca_temporal, reporte_despachosconcreto.observaciones, 
				reporte_despachosconcreto.campamento_id_campamento, 
				reporte_despachosconcreto.id_destino_origen, 
				reporte_despachosconcreto.id_destino_destino,

				clientes.nombre_cliente,
				productos.nombre_producto,
				equipos.nombre_equipo


				FROM reporte_despachosconcreto 
					LEFT JOIN clientes on clientes.id_cliente = reporte_despachosconcreto.cliente_id_cliente
					LEFT JOIN productos on productos.id_producto = reporte_despachosconcreto.producto_id_producto
					LEFT JOIN equipos on equipos.id_equipo = reporte_despachosconcreto.equipo_id_equipo

				WHERE reporte_despachosconcreto.reporte_publicado='1' 
						AND reporte_despachosconcreto.id = '$idget'
					  
				order by reporte_despachosconcreto.fecha_reporte DESC");
	    	$camposs=$select->fetchAll();
	    	//$campos = new Concreto('',$camposs);
	    	//
			return $camposs;
		}
		catch(PDOException $e) {
			echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
		}
	}

	/*******************************************************
	** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
	********************************************************/
	public static function todos(){
		try {
			$db=Db::getConnect();

			$select=$db->query("SELECT * FROM reporte_despachosconcreto WHERE reporte_publicado='1' and fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() order by fecha_reporte DESC");
	    	$camposs=$select->fetchAll();
	    	$campos = new Concreto('',$camposs);
			return $campos;
		}
		catch(PDOException $e) {
			echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
		}
	}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function formularioconcreto($getid=null){
	try {
		$db=Db::getConnect();

		if ($getid!=""){
			$where = " and reporte_despachosconcreto.id = '$getid' ";
		}
		else
		{
			$where = " and reporte_despachosconcreto.id = '$getid' and fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() order by fecha_reporte DESC";
		}

		$sql="SELECT * FROM reporte_despachosconcreto 
			WHERE reporte_publicado='1' $where ";
		$select=$db->query($sql);
		//echo($sql);
    	$camposs=$select->fetchAll();
    	$campos = new Concreto('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteDespachosporfecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_despachosconcreto WHERE reporte_publicado='1'
		 and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Concreto('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
*** FUNCION PARA GUARDAR **
reporte_despachosconcreto(id, imagen, fecha_reporte, remision, cliente_id_cliente, producto_id_producto, equipo_id_equipo, despachado_por, transporte, kilometraje, valor_m3, cantidad, viajes, radicada, fecha_radicada, factura, pagado, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones
***************************************************************/
public static function guardar($campos,$imagen, $puntospasar=null){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$V11=str_replace(".","",$valor_material);
		$V21=str_replace(" ", "", $V11);
		$valor_final1=str_replace("$", "", $V21);
		$valornumero2=(int) $valor_final1;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$contador1 = 0;
		$contador2 = 0;
		$puntos = 0;
		$campamento_id_campamento=0;
		$id_destino_origen=0;
		$id_destino_destino=0;

		if ($proyecto==""){$proyecto=0;}

		if ($reporte_despachosconcreto_id==""){

			$insert=$db->prepare('INSERT INTO reporte_despachosconcreto VALUES (NULL,:imagen,:fecha_reporte,:remision,:cliente_id_cliente,:producto_id_producto,:equipo_id_equipo,:despachado_por,:transporte,:kilometraje,:valor_m3,:valor_material,:contador1,:contador2,:puntos,:cantidad,:viajes,:radicada,:fecha_radicada,:factura,:pagado, :creado_por, :estado_reporte, :reporte_publicado,:marca_temporal,:observaciones,:campamento_id_campamento,:id_destino_origen,:id_destino_destino, :proyecto_id_proyecto)');

			$insert->bindValue('imagen',utf8_decode($imagen));
			$insert->bindValue('fecha_reporte',utf8_decode($nuevafecha));
			$insert->bindValue('remision',utf8_decode($remision));
			$insert->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
			$insert->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
			$insert->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
			$insert->bindValue('despachado_por',utf8_decode($despachado_por));
			$insert->bindValue('transporte',utf8_decode($transporte));
			$insert->bindValue('kilometraje',utf8_decode($kilometraje));
			$insert->bindValue('valor_m3',utf8_decode($valornumero));
			$insert->bindValue('valor_material',utf8_decode($valornumero2));
			$insert->bindValue('contador1',utf8_decode($contador1));
			$insert->bindValue('contador2',utf8_decode($contador2));
			$insert->bindValue('puntos',utf8_decode($puntos));
			$insert->bindValue('cantidad',utf8_decode($cantidad));
			$insert->bindValue('viajes',utf8_decode($viajes));
			$insert->bindValue('radicada',utf8_decode($radicada));
			$insert->bindValue('fecha_radicada',utf8_decode($fecha_radicada));
			$insert->bindValue('factura',utf8_decode($factura));
			$insert->bindValue('pagado',utf8_decode($pagado));
			$insert->bindValue('creado_por',utf8_decode($creado_por));
			$insert->bindValue('estado_reporte',utf8_decode($estado_reporte));
			$insert->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
			$insert->bindValue('marca_temporal',utf8_decode($marca_temporal));
			$insert->bindValue('observaciones',utf8_decode($observaciones));
			$insert->bindValue('campamento_id_campamento',utf8_decode($campamento_id_campamento));
			$insert->bindValue('id_destino_origen',utf8_decode($id_destino_origen));
			$insert->bindValue('id_destino_destino',utf8_decode($id_destino_destino));
			$insert->bindValue('proyecto_id_proyecto',utf8_decode($proyecto));

			$insert->execute();

			$select=$db->query("
				SELECT max(id) as iddespachoconcreto
				FROM reporte_despachosconcreto 			
			 ");
			$arrResultado=$select->fetchAll();
			foreach ($arrResultado as $valor){
				$reporte_despachosconcreto_id = $valor['iddespachoconcreto'];
			}

			$puntostotal = 0;

			foreach ($puntospasar as $campo => $punto) {

				$puntostotal = $puntostotal + $punto;

				if ($punto!=""){
					$insert=$db->prepare('
					INSERT INTO reporte_despachosconcretodetalle
					(reporte_despachosconcreto_id, puntos)
					VALUES (:reporte_despachosconcreto_id,:punto)');
					
					$insert->bindValue('reporte_despachosconcreto_id',$reporte_despachosconcreto_id);
					$insert->bindValue('punto',$punto);			
					$insert->execute();				
				}
				
			}

			$update=$db->prepare('UPDATE reporte_despachosconcreto 
								SET	puntos=:puntostotal
								WHERE id=:reporte_despachosconcreto_id');

			$update->bindValue('puntostotal',$puntostotal);				
			$update->bindValue('reporte_despachosconcreto_id',$reporte_despachosconcreto_id);
			$update->execute();


			// Obtengo los insumos del producto 
			$consulta="
				SELECT productosinsumos.id, productosinsumos.insumo_id_insumo, productosinsumos.producto_id_producto, 
				productosinsumos.cantidad as cantidadinsumo, productosinsumos.fecha_modificado, productosinsumos.estado,
				insumoscampamento.cantidad as cantidadactual, insumoscampamento.id as insumoscampamentoid 
				FROM productosinsumos 
					INNER JOIN insumoscampamento ON insumoscampamento.insumo_id_insumo = productosinsumos.insumo_id_insumo
				WHERE productosinsumos.producto_id_producto = '$producto_id_producto' and productosinsumos.estado = '1'
				and insumoscampamento.estado = '1' and insumoscampamento.campamento_id_campamento = '$campamento_id_campamento'
			";

			$fechaactual=date('y-m-d H:m:s');
			$observacion = "";		
			$tipomovimiento = 5;

			$select=$db->query($consulta);
	    	$camposs=$select->fetchAll();	

	    	foreach ($camposs as $key => $value) {
	    	 	
	    	 	$insumoscampamentoid = $value["insumoscampamentoid"];
	    	 	$insumo_id_insumo = $value["insumo_id_insumo"];
	    	 	$cantidadinsumo = $value["cantidadinsumo"];
	    	 	$cantidadactual = $value["cantidadactual"];

	    	 	$cantidadactual = $cantidadactual - $cantidad;

				$update=$db->prepare('UPDATE insumoscampamento 
									SET	cantidad=:cantidadactual
									WHERE id=:insumoscampamentoid');

				$update->bindValue('cantidadactual',$cantidadactual);				
				$update->bindValue('insumoscampamentoid',$insumoscampamentoid);
				$update->execute();



				$insert=$db->prepare('
				INSERT INTO insumoscampamentohistorial
				(insumo_id_insumo, campamento_id_campamento, movimiento_inventario_id, 
				cantidad, fecha_registro, observacion)
				VALUES (:insumo_id_insumo,:campamento_id_campamento, :tipomovimiento, 
				 :cantidad, :fechaactual, :observacion)');
				
				$insert->bindValue('insumo_id_insumo',utf8_decode($insumo_id_insumo));
				$insert->bindValue('campamento_id_campamento',utf8_decode($campamento_id_campamento));
				$insert->bindValue('tipomovimiento',utf8_decode($tipomovimiento));
				$insert->bindValue('cantidad',utf8_decode($cantidad));			
				$insert->bindValue('observacion',utf8_decode($observacion));
				$insert->bindValue('fechaactual',utf8_decode($fechaactual));
				$insert->execute();



			} 

		}else{
			
			//modificar

			$update=$db->prepare('UPDATE reporte_despachosconcreto 
				SET	
					fecha_reporte=:fecha_reporte,
					remision=:remision,
					cliente_id_cliente=:cliente_id_cliente,
					producto_id_producto=:producto_id_producto,
					equipo_id_equipo=:equipo_id_equipo,
					despachado_por=:despachado_por,
					transporte=:transporte,
					kilometraje=:kilometraje,
					valor_m3=:valor_m3,
					valor_material=:valor_material,
					contador1=:contador1,
					contador2=:contador2,
					puntos=:puntos,
					cantidad=:cantidad,
					viajes=:viajes,
					radicada=:radicada,
					fecha_radicada=:fecha_radicada,
					factura=:factura,
					pagado=:pagado,
					creado_por=:creado_por,
					estado_reporte=:estado_reporte,
					reporte_publicado=:reporte_publicado,
					marca_temporal=:marca_temporal,
					observaciones=:observaciones,
					campamento_id_campamento=:campamento_id_campamento,
					id_destino_origen=:id_destino_origen,
					id_destino_destino=:id_destino_destino,
					proyecto_id_proyecto=:proyecto_id_proyecto

				WHERE id=:reporte_despachosconcreto_id');

			//$update->bindValue('imagen',utf8_decode($imagen));
			$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
			$update->bindValue('remision',utf8_decode($remision));
			$update->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
			$update->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
			$update->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
			$update->bindValue('despachado_por',utf8_decode($despachado_por));
			$update->bindValue('transporte',utf8_decode($transporte));
			$update->bindValue('kilometraje',utf8_decode($kilometraje));
			$update->bindValue('valor_m3',utf8_decode($valornumero));
			$update->bindValue('valor_material',utf8_decode($valornumero2));
			$update->bindValue('contador1',utf8_decode($contador1));
			$update->bindValue('contador2',utf8_decode($contador2));
			$update->bindValue('puntos',utf8_decode($puntos));
			$update->bindValue('cantidad',utf8_decode($cantidad));
			$update->bindValue('viajes',utf8_decode($viajes));
			$update->bindValue('radicada',utf8_decode($radicada));
			$update->bindValue('fecha_radicada',utf8_decode($fecha_radicada));
			$update->bindValue('factura',utf8_decode($factura));
			$update->bindValue('pagado',utf8_decode($pagado));
			$update->bindValue('creado_por',utf8_decode($creado_por));
			$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
			$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
			$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
			$update->bindValue('observaciones',utf8_decode($observaciones));
			$update->bindValue('campamento_id_campamento',utf8_decode($campamento_id_campamento));
			$update->bindValue('id_destino_origen',utf8_decode($id_destino_origen));
			$update->bindValue('id_destino_destino',utf8_decode($id_destino_destino));
			$update->bindValue('proyecto_id_proyecto',utf8_decode($proyecto));
			$update->bindValue('reporte_despachosconcreto_id',utf8_decode($reporte_despachosconcreto_id));

			$update->execute();

			$delete=$db->query("DELETE FROM reporte_despachosconcretodetalle WHERE reporte_despachosconcreto_id='".$reporte_despachosconcreto_id."'");

			$puntostotal = 0;

			foreach ($puntospasar as $campo => $punto) {

				$puntostotal = $puntostotal + $punto;

				if ($punto!=""){
					$insert=$db->prepare('
					INSERT INTO reporte_despachosconcretodetalle
					(reporte_despachosconcreto_id, puntos)
					VALUES (:reporte_despachosconcreto_id,:punto)');
					
					$insert->bindValue('reporte_despachosconcreto_id',$reporte_despachosconcreto_id);
					$insert->bindValue('punto',$punto);			
					$insert->execute();				
				}
				
			}

			$update=$db->prepare('UPDATE reporte_despachosconcreto 
								SET	puntos=:puntostotal
								WHERE id=:reporte_despachosconcreto_id');

			$update->bindValue('puntostotal',$puntostotal);				
			$update->bindValue('reporte_despachosconcreto_id',$reporte_despachosconcreto_id);
			$update->execute();
			
		}

		
		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminar($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE reporte_despachosconcreto SET reporte_publicado='0' WHERE id='".$id."'");
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
public static function editar($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_despachosconcreto WHERE id='".$id."' and estado_reporte='1'");
		$camposs=$select->fetchAll();
		$campos = new Concreto('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************
*** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
id, imagen, fecha_reporte, remision, cliente_id_cliente, producto_id_producto, equipo_id_equipo, despachado_por, transporte, kilometraje, valor_m3, valor_material, cantidad, viajes, radicada, fecha_radicada, factura, pagado, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones, campamento_id_campamento, id_destino_origen, id_destino_destino FROM reporte_despachosconcreto
********************************************************************/
public static function actualizar($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE reporte_despachosconcreto SET
								imagen=:imagen,
								fecha_reporte=:fecha_reporte,
								remision=:remision,
								cliente_id_cliente=:cliente_id_cliente,
								producto_id_producto=:producto_id_producto,
								equipo_id_equipo=:equipo_id_equipo,
								despachado_por=:despachado_por,
								transporte=:transporte,
								kilometraje=:kilometraje,
								valor_m3=:valor_m3,
								valor_material=:valor_material,
								contador1=:contador1,
								contador2=:contador2,
								puntos=:puntos,
								cantidad=:cantidad,
								viajes=:viajes,
								radicada=:radicada,
								fecha_radicada=:fecha_radicada,
								factura=:factura,
								pagado=:pagado,
								creado_por=:creado_por,
								estado_reporte=:estado_reporte,
								reporte_publicado=:reporte_publicado,
								marca_temporal=:marca_temporal,
								observaciones=:observaciones,
								campamento_id_campamento=:campamento_id_campamento,
								id_destino_origen=:id_destino_origen,
								id_destino_destino=:id_destino_destino

								WHERE id=:id');
		
		$V1=str_replace(".","",$valor_m3);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

		$V11=str_replace(".","",$valor_material);
		$V21=str_replace(" ", "", $V11);
		$valor_final1=str_replace("$", "", $V21);
		$valornumero2=(int) $valor_final1;

		$t = strtotime($fecha_reporte);
		$nuevafecha=date('y-m-d',$t);

		$t = strtotime($fecha_radicada);
		$nuevafecharadicada=date('y-m-d',$t);

		$update->bindValue('imagen',utf8_decode($imagen));
		$update->bindValue('fecha_reporte',utf8_decode($nuevafecha));
		$update->bindValue('remision',utf8_decode($remision));
		$update->bindValue('cliente_id_cliente',utf8_decode($cliente_id_cliente));
		$update->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
		$update->bindValue('equipo_id_equipo',utf8_decode($equipo_id_equipo));
		$update->bindValue('despachado_por',utf8_decode($despachado_por));
		$update->bindValue('transporte',utf8_decode($transporte));
		$update->bindValue('kilometraje',utf8_decode($kilometraje));
		$update->bindValue('valor_m3',utf8_decode($valornumero));
		$update->bindValue('valor_material',utf8_decode($valornumero2));
		$update->bindValue('cantidad',utf8_decode($cantidad));
		$update->bindValue('viajes',utf8_decode($viajes));
		$update->bindValue('radicada',utf8_decode($radicada));
		$update->bindValue('fecha_radicada',utf8_decode($nuevafecharadicada));
		$update->bindValue('factura',utf8_decode($factura));
		$update->bindValue('pagado',utf8_decode($pagado));
		$update->bindValue('creado_por',utf8_decode($creado_por));
		$update->bindValue('estado_reporte',utf8_decode($estado_reporte));
		$update->bindValue('reporte_publicado',utf8_decode($reporte_publicado));
		$update->bindValue('marca_temporal',utf8_decode($marca_temporal));
		$update->bindValue('observaciones',utf8_decode($observaciones));
		$update->bindValue('campamento_id_campamento',utf8_decode($campamento_id_campamento));
		$update->bindValue('id_destino_origen',utf8_decode($id_destino_origen));
		$update->bindValue('id_destino_destino',utf8_decode($id_destino_destino));
		$update->bindValue('id',utf8_decode($id));

		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}


public static function GraficaHistorialConcreto(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT fecha_reporte,IFNULL(sum(ROUND(cantidad,2)),0) as totales FROM reporte_despachosconcreto WHERE  reporte_publicado='1' GROUP BY fecha_reporte ORDER BY fecha_reporte ASC");
		$camposs=$select->fetchAll();
		$campos = new Concreto('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

public static function GraficaReporteDiarioConcreto($fechainicio15,$fechafinal15){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DATE_FORMAT(fecha_reporte,'%m') as MES , DATE_FORMAT(fecha_reporte,'%d') as DIA, IFNULL(ROUND(SUM(cantidad),1),0) AS M3 FROM reporte_despachosconcreto WHERE fecha_reporte>='".$fechainicio15."' and fecha_reporte<='".$fechafinal15."' and reporte_publicado='1' GROUP by DIA ORDER BY MES,DIA ASC");
		$camposs=$select->fetchAll();
		$campos = new Concreto('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

	/*******************************************************
	** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
	********************************************************/
	public static function detallepuntos($valorid){
		try {
			$db=Db::getConnect();

			$select=$db->query("
				SELECT 
				reporte_despachosconcreto.id as iddespacho,
				reporte_despachosconcretodetalle.id, reporte_despachosconcretodetalle.puntos 
				FROM reporte_despachosconcreto 
					INNER JOIN reporte_despachosconcretodetalle
					ON reporte_despachosconcreto.id = reporte_despachosconcretodetalle.reporte_despachosconcreto_id
				WHERE reporte_publicado='1' AND reporte_despachosconcretodetalle.id = '$valorid'

				ORDER BY reporte_despachosconcretodetalle.id DESC");
	    	$camposs=$select->fetchAll();
	    	//$campos = new Concreto('',$camposs);
			return $camposs;
		}
		catch(PDOException $e) {
			echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
		}
	}


	public static function detallepuntosgeneral($valorid){
		try {
			$db=Db::getConnect();

			$select=$db->query("
				SELECT 
				reporte_despachosconcreto.id as iddespacho,
				reporte_despachosconcretodetalle.id, reporte_despachosconcretodetalle.puntos 
				FROM reporte_despachosconcreto 
					INNER JOIN reporte_despachosconcretodetalle
					ON reporte_despachosconcreto.id = reporte_despachosconcretodetalle.reporte_despachosconcreto_id
				WHERE reporte_publicado='1' AND reporte_despachosconcreto.id = '$valorid'

				ORDER BY reporte_despachosconcretodetalle.id DESC");
	    	$camposs=$select->fetchAll();
	    	//$campos = new Concreto('',$camposs);
			return $camposs;
		}
		catch(PDOException $e) {
			echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
		}
	}


}

?>
