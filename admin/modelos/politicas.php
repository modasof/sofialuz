<?php
/**
* CLASE PARA TRABAJAR CON LAS VENTAJAS
*/
class Nosotros
{
    private $id; 
    private $campos; //devuelve todos los campos de la tabla
 
 
	function __construct($id,$campos)
	{
        $this->setId($id);
        $this->setCampos($campos);
	}

	/************************************************************************************
	** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA VENTAJAS       ***
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

		$select=$db->query("SELECT * FROM politicas");
    	$camposs=$select->fetchAll();
    	$campos = new Nosotros('',$camposs);
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
		$select=$db->query("SELECT * FROM politicas WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Nosotros('',$camposs);
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
		$select=$db->query("DELETE FROM politicas WHERE id='".$id."'");
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
public static function actualizar($id,$campos){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE politicas SET 
								titulo=:titulo,
								texto=:texto
								WHERE id=:id');
		
		$update->bindValue('titulo',$titulo);
		$update->bindValue('texto',$texto);
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
public static function guardar($campos,$imagen,$galeria1,$galeria2,$galeria3,$galeria4){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO ventajas VALUES (NULL,:titulo,:texto1,:texto2,:imagen,:galeria1,:galeria2,:galeria3,:galeria4,:mision,:vision,:porque)');

		$insert->bindValue('titulo',$titulo);
		$insert->bindValue('texto1',$texto1);
		$insert->bindValue('texto2',$texto2);
		$insert->bindValue('imagen',$imagen);
		$insert->bindValue('galeria1',$galeria1);		
		$insert->bindValue('galeria2',$galeria2);
		$insert->bindValue('galeria3',$galeria3);
		$insert->bindValue('galeria4',$galeria4);
		$insert->bindValue('mision',$mision);
		$insert->bindValue('vision',$vision);
		$insert->bindValue('porque',$porque);

		$insert->execute();
		
		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

}

?>
