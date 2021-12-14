<?php
/**
* CLASE PARA TRABAJAR CON LAS FUNCIONES
*/
class Textos
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

		$select=$db->query("SELECT * FROM textosweb");
    	$camposs=$select->fetchAll();
    	$campos = new Funciones('',$camposs);
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
		$select=$db->query("SELECT * FROM textosweb WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Textos('',$camposs);
		return $campos;
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
		$update=$db->prepare('UPDATE textosweb SET
								titulo1=:titulo1,
								titulo2=:titulo2,
								titulo3=:titulo3,
								tab_nuevo=:tab_nuevo,
								tab_usado=:tab_usado,
								btn_nuevo=:btn_nuevo,
								btn_usado=:btn_usado,
								call1=:call1,
								call2=:call2,
								call3=:call3,
								titulo_testimonio=:titulo_testimonio,
								texto_testimonio=:texto_testimonio
								WHERE id=:id');
		$update->bindValue('titulo1',utf8_decode($titulo1));
		$update->bindValue('titulo2',utf8_decode($titulo2));
		$update->bindValue('titulo3',utf8_decode($titulo3));
		$update->bindValue('tab_nuevo',utf8_decode($tab_nuevo));
		$update->bindValue('tab_usado',utf8_decode($tab_usado));
		$update->bindValue('btn_nuevo',utf8_decode($btn_nuevo));
		$update->bindValue('btn_usado',utf8_decode($btn_usado));
		$update->bindValue('call1',utf8_decode($call1));
		$update->bindValue('call2',utf8_decode($call2));
		$update->bindValue('call3',utf8_decode($call3));
		$update->bindValue('titulo_testimonio',utf8_decode($titulo_testimonio));
		$update->bindValue('texto_testimonio',utf8_decode($texto_testimonio));
		$update->bindValue('id',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

}

?>
