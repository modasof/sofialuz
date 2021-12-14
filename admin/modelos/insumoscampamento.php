<?php
/**
* CLASE PARA TRABAJAR CON LOS MODELOS
*/
class Insumoscampamento
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
				SELECT insumoscampamento.cantidad, insumos.nombre_insumo, campamento.nombre_campamento, 
				DATE_FORMAT(insumoscampamento.fecha_modificado,'%d/%m/%Y %H:%i:%s') as fecha_modificado
				FROM insumoscampamento
				INNER JOIN insumos on insumoscampamento.insumo_id_insumo = insumos.id_insumo
				INNER JOIN campamento on campamento.id_campamento = insumoscampamento.campamento_id_campamento
				WHERE insumoscampamento.estado = 1
				order by nombre_insumo asc
			";
			$select=$db->query($consulta);
			//echo($consulta);
	    	$camposs=$select->fetchAll();
	    	$campos = new Insumoscampamento('',$camposs);
			return $campos;
		}
		catch(PDOException $e) {
			echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
		}
	}

	public static function obtenerListaTipoMovimiento(){
		try {
			$db=Db::getConnect();
			$consulta="
				SELECT id, tipo_movimiento, estado_reporte, reporte_publicado 
				FROM movimientos_inventario 
				WHERE id in (6,7)
			";
			$select=$db->query($consulta);
			//echo($consulta);
	    	$camposs=$select->fetchAll();	    	
			return $camposs;
		}
		catch(PDOException $e) {
			echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
		}
	}


	/***************************************************************
	*** FUNCION PARA GUARDAR **
	***************************************************************/
	public static function guardar($campos){
		try {

			$db=Db::getConnect();
			$campostraidos = $campos->getCampos();

			extract($campostraidos);

			

			// Obtengo el Id 
			$consulta="
				SELECT id, insumo_id_insumo, campamento_id_campamento, cantidad, fecha_modificado, estado
				FROM insumoscampamento 
				WHERE campamento_id_campamento = '$campamento_id_campamento'
			";

			$select=$db->query($consulta);
	    	$camposs=$select->fetchAll();	

	    	$idactual = "";
	    	$cantidadactual = ""; 
	    	
	    	if (count($camposs)>0){
	    		$idactual = $camposs[0]["id"];
	    		$cantidadactual = $camposs[0]["cantidad"];	
	    	}

	    	


	    	
	    	if ($cantidadactual==""){$cantidadactual=0;}

	    	if ($tipomovimiento=="6"){
	    		$cantidadactual = $cantidadactual + $cantidad;
			}else{
				$cantidadactual = $cantidadactual - $cantidad;
			}

    	
			
			$fechaactual=date('y-m-d H:m:s');

			if ($idactual==""){

				$insert=$db->prepare('

				INSERT INTO insumoscampamento(insumo_id_insumo, campamento_id_campamento, cantidad, fecha_modificado, estado)
				VALUES (:insumo_id_insumo,:campamento_id_campamento, :cantidad, :fechaactual, 1)');
				
				$insert->bindValue('insumo_id_insumo',utf8_decode($insumo_id_insumo));
				$insert->bindValue('campamento_id_campamento',utf8_decode($campamento_id_campamento));
				$insert->bindValue('cantidad',utf8_decode($cantidad));
				$insert->bindValue('fechaactual',utf8_decode($fechaactual));
				$insert->execute();


				$insert=$db->prepare('
				INSERT INTO insumoscampamentohistorial
				(insumo_id_insumo, campamento_id_campamento, movimiento_inventario_id, 
				cantidad, fecha_registro, observacion)
				VALUES (:insumo_id_insumo,:campamento_id_campamento, :tipomovimiento, 
				 :cantidad, :fechaactual, :observacion)');
				
				$insert->bindValue('insumo_id_insumo',utf8_decode($insumo_id_insumo));
				$insert->bindValue('campamento_id_campamento',utf8_decode($campamento_id_campamento));
				$insert->bindValue('cantidad',utf8_decode($cantidad));
				$insert->bindValue('tipomovimiento',utf8_decode($tipomovimiento));
				$insert->bindValue('observacion',utf8_decode($observacion));
				$insert->bindValue('fechaactual',utf8_decode($fechaactual));
				$insert->execute();


			}else {

				$update=$db->prepare('UPDATE insumoscampamento 
								SET	cantidad=:cantidadactual
								WHERE id=:idactual');

				$update->bindValue('cantidadactual',$cantidadactual);				
				$update->bindValue('idactual',$idactual);
				$update->execute();


				$insert=$db->prepare('
				INSERT INTO insumoscampamentohistorial
				(insumo_id_insumo, campamento_id_campamento, movimiento_inventario_id, 
				cantidad, fecha_registro, observacion)
				VALUES (:insumo_id_insumo,:campamento_id_campamento, :tipomovimiento, 
				 :cantidad, :fechaactual, :observacion)');
				
				$insert->bindValue('insumo_id_insumo',utf8_decode($insumo_id_insumo));
				$insert->bindValue('campamento_id_campamento',utf8_decode($campamento_id_campamento));
				$insert->bindValue('cantidad',utf8_decode($cantidad));
				$insert->bindValue('tipomovimiento',utf8_decode($tipomovimiento));
				$insert->bindValue('observacion',utf8_decode($observacion));
				$insert->bindValue('fechaactual',utf8_decode($fechaactual));
				$insert->execute();


			}

			

			return true;
		}
		catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}


}

?>
