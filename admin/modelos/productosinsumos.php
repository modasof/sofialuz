<?php
/**
* CLASE PARA TRABAJAR CON LOS MODELOS
*/
class Productosinsumos
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
	public static function obtenerPagina($get_id){
		try {
			$db=Db::getConnect();
			$consulta="
				SELECT productosinsumos.id, productosinsumos.insumo_id_insumo, productosinsumos.producto_id_producto, 
				productosinsumos.cantidad, productosinsumos.estado,
				DATE_FORMAT(productosinsumos.fecha_modificado,'%d/%m/%Y %H:%i:%s') as fecha_modificado, 
				insumos.nombre_insumo, productos.nombre_producto, productos.insumos_producto
				FROM productosinsumos
				INNER JOIN insumos on productosinsumos.insumo_id_insumo = insumos.id_insumo
				INNER JOIN productos on productos.id_producto = productosinsumos.producto_id_producto
				WHERE productosinsumos.estado = 1 AND productos.id_producto = '$get_id'
				order by nombre_insumo asc
			";
			$select=$db->query($consulta);
			//echo($consulta);
	    	$camposs=$select->fetchAll();
	    	$campos = new Productosinsumos('',$camposs);
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
			$campostraidos = $campos->getCampos();

			extract($campostraidos);

			// Obtengo el Id 
			$consulta="
				SELECT id
				FROM productosinsumos 
				WHERE insumo_id_insumo = '$insumo_id_insumo' AND producto_id_producto = '$producto_id_producto' and estado = '1'
			";


			$select=$db->query($consulta);
	    	$total=$select->fetchAll();	 
	    	
			$fechaactual=date('y-m-d H:m:s');

			if (count($total)=="0"){

				$insert=$db->prepare('

				INSERT INTO productosinsumos (insumo_id_insumo, producto_id_producto, cantidad, fecha_modificado, estado)
				VALUES (:insumo_id_insumo,:producto_id_producto, :cantidad, :fechaactual, 1)');
				
				$insert->bindValue('insumo_id_insumo',utf8_decode($insumo_id_insumo));
				$insert->bindValue('producto_id_producto',utf8_decode($producto_id_producto));
				$insert->bindValue('cantidad',utf8_decode($cantidad));
				$insert->bindValue('fechaactual',utf8_decode($fechaactual));
				$insert->execute();


			}else {

				$idactual = $total[0]["id"];	

				$update=$db->prepare('UPDATE productosinsumos 
								SET	insumo_id_insumo=:insumo_id_insumo,
								producto_id_producto=:producto_id_producto,
								cantidad=:cantidad
								WHERE id=:idactual
								');

				$update->bindValue('insumo_id_insumo',$insumo_id_insumo);				
				$update->bindValue('producto_id_producto',$producto_id_producto);				
				$update->bindValue('cantidad',$cantidad);				
				$update->bindValue('idactual',$idactual);
				$update->execute();

			}

			$consulta="
				SELECT id
				FROM productosinsumos 
				WHERE producto_id_producto = '$producto_id_producto' and estado = '1'
			";
			$select=$db->query($consulta);
			$total=$select->fetchAll();	 
			$totalinsumos = count($total);

			$update=$db->prepare('UPDATE productos 
							SET	insumos_producto=:totalinsumos
							WHERE id_producto =:prod_id and estado_producto = 1');

			$update->bindValue('totalinsumos',$totalinsumos);				
			$update->bindValue('prod_id',$producto_id_producto);				
			$update->execute();

			return $producto_id_producto;
		}
		catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	/***************************************************************
	** FUNCION PARA ELIINAR POR ID  **
	***************************************************************/
	public static function eliminarPor($id, $prod_id){
		try {
			$db=Db::getConnect();
			$select=$db->query("UPDATE productosinsumos SET estado='0' WHERE id='".$id."'");
			if ($select){

				$consulta="
					SELECT id
					FROM productosinsumos 
					WHERE producto_id_producto = '$prod_id' and estado = '1'
				";
				$select=$db->query($consulta);
				$total=$select->fetchAll();	 
				$totalinsumos = count($total);

				$update=$db->prepare('UPDATE productos 
								SET	insumos_producto=:totalinsumos
								WHERE id_producto =:prod_id and estado_producto = 1');

				$update->bindValue('totalinsumos',$totalinsumos);				
				$update->bindValue('prod_id',$prod_id);				
				$update->execute();

				return true;
			}else{
				return false;
			}
		}
		catch(PDOException $e) {
			echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
		}
	}

}

?>
