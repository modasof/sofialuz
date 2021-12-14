<?php
/**
* CLASE PARA TRABAJAR CON LOS TESTIMONIOS
*/
class Testimonios
{
    private $id; 
    private $campos; //devuelve todos los campos de la tabla
 
 
	function __construct($id,$campos)
	{
        $this->setId($id);
        $this->setCampos($campos);
	}

	/************************************************************************************
	** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA TESTIMONIOS       ***
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
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS	  **
********************************************************/
public static function obtenerPagina(){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM secciones_home");
    	$camposs=$select->fetchAll();
    	$campos = new Testimonios('',$camposs);
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
		$select=$db->query("SELECT * FROM secciones_home WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Testimonios('',$camposs);
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
		$select=$db->query("DELETE FROM secciones_home WHERE id='".$id."'");
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
public static function actualizarTestimonio($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);
		$update=$db->prepare('UPDATE secciones_home SET 
								seccion=:seccion,
								titulo1=:titulo1,
								titulo2=:titulo2,
								lista1=:lista1,
								lista2=:lista2,
								lista3=:lista3,
								texto1=:texto1,
								textoboton=:textoboton,
								link=:link,
								imagen=:imagen
								WHERE id=:id');
		
		$update->bindValue('titulo1',$titulo1);
		$update->bindValue('titulo2',$titulo2);
		$update->bindValue('lista1',$lista1);
		$update->bindValue('lista2',$lista2);
		$update->bindValue('lista3',$lista3);
		$update->bindValue('texto1',$texto1);
		$update->bindValue('textoboton',$textoboton);
		$update->bindValue('link',$link);
		$update->bindValue('seccion',$seccion);
		$update->bindValue('imagen',$imagen);
		$update->bindValue('id',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR INFORMACIÓN DE LA TABLA TESTIMONIOS	****
***************************************************************/
public static function guardarTestimonio($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO testimonios VALUES (NULL,:nombres,:oficio,:testimonio,:imagen)');

		$insert->bindValue('nombres',$nombres);
		$insert->bindValue('oficio',$oficio);
		$insert->bindValue('testimonio',$testimonio);
		$insert->bindValue('imagen',$imagen);
		$insert->execute();
		
		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

}

?>
