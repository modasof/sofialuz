<?php
/**
* CLASE PARA TRABAJAR CON LOS Slider
*/
class Cuentas
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

		$select=$db->query("SELECT * FROM cuentas order by id_cuenta desc");
    	$camposs=$select->fetchAll();
    	$campos = new Cuentas('',$camposs);
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
		$select=$db->query("SELECT * FROM cuentas WHERE id_cuenta='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Cuentas('',$camposs);
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
		$select=$db->query("DELETE FROM slider WHERE id='".$id."'");
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
public static function actualizar($id,$campos,$imagen,$imagentitulo){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE slider SET
								imagen=:imagen,
								direccion=:direccion,
								imagentitulo=:imagentitulo,
								texto=:texto,
								textoboton1=:textoboton1,
								enlaceboton1=:enlaceboton1,
								textoboton2=:textoboton2,
								orden_salida=:orden_salida,
								enlaceboton2=:enlaceboton2
								WHERE id=:id');

		$update->bindValue('imagen',$imagen);
		$update->bindValue('direccion',$direccion);
		$update->bindValue('imagentitulo',$imagentitulo);
		$update->bindValue('texto',$texto);
		$update->bindValue('textoboton1',$textoboton1);
		$update->bindValue('enlaceboton1',$enlaceboton1);
		$update->bindValue('textoboton2',$textoboton2);
		$update->bindValue('orden_salida',$orden_salida);
		$update->bindValue('enlaceboton2',$enlaceboton2);


		$update->bindValue('id',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR **
***************************************************************/
public static function guardar($campos,$imagen,$imagentitulo){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO slider VALUES (NULL,:imagen,:direccion,:imagentitulo,:texto,:textoboton1,:enlaceboton1,:textoboton2,:orden_salida,:enlaceboton2)');

		$insert->bindValue('imagen',$imagen);
		$insert->bindValue('direccion',$direccion);
		$insert->bindValue('imagentitulo',$imagentitulo);
		$insert->bindValue('texto',$texto);
		$insert->bindValue('textoboton1',$textoboton1);
		$insert->bindValue('enlaceboton1',$enlaceboton1);
		$insert->bindValue('textoboton2',$textoboton2);
		$insert->bindValue('orden_salida',$orden_salida);
		$insert->bindValue('enlaceboton2',$enlaceboton2);
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

}

?>
