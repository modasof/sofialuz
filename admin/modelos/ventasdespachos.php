<?php
/**
* CLASE PARA TRABAJAR CON LOS MODELOS
*/
class Ventasdespachos
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
	public static function obtenerPagina($idfactura){
		try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM ventas_despachos WHERE estado='1' and reporteventa_id='".$idfactura."' order by fecha_modificado DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Ventasdespachos('',$camposs);
		return $campos;
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
			$dbselect=Db::getConnect();
			//$campostraidos = $campos->getCampos();

			$factura = $campos['factura'];
			$despachos = $campos['despachos'];
			$fechaactual=date('y-m-d H:m:s');

			$despachos = explode(",", $despachos);

			foreach ($despachos as $key => $despachounico) {

				$update=$db->prepare('UPDATE ventas_despachos SET
								estado=0
								WHERE reporteventa_id=:factura and reportedespachocliente_id=:despachounico');

				$update->bindValue('factura',utf8_decode($factura));
				$update->bindValue('despachounico',utf8_decode($despachounico));				
				$update->execute();



				/*
				
*/

		    	//if (count($camposs3)>0){

					$insert=$db->prepare('
					INSERT INTO ventas_despachos(reporteventa_id, reportedespachocliente_id, fecha_modificado, estado)
					VALUES (:factura,:despachounico, :fechaactual, 1)');
					
					$insert->bindValue('factura',utf8_decode($factura));
					$insert->bindValue('despachounico',utf8_decode($despachounico));				
					$insert->bindValue('fechaactual',utf8_decode($fechaactual));
					$insert->execute();
		    	//}




			}


			return $factura;
		}
		catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}


	public static function eliminarPor($id){
		try {
			$db=Db::getConnect();
			$select=$db->query("UPDATE ventas_despachos SET estado='0' WHERE id='".$id."'");
			if ($select){
				return true;
				}else{return false;}
		}
		catch(PDOException $e) {
			echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
		}
	}


}

?>
