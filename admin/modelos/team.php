<?php
/**
* CLASE PARA TRABAJAR CON LOS MIEMBROS DE LA EMPRESA
*/
class Team
{
    private $id; 
    private $campos; //devuelve todos los campos de la tabla
 
 
	function __construct($id,$campos)//,$superior,$texto,$nombreservicio)
	{
        $this->setId($id);
        $this->setCampos($campos);
	}

	/************************************************************************************
	** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA TEAM       ***
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
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE PQRS	  **
********************************************************/
public static function obtenerPagina(){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM team");
    	$camposs=$select->fetchAll();
    	$campos = new Team('',$camposs);
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
		$select=$db->query("SELECT * FROM team WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Team('',$camposs);
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
		$select=$db->query("DELETE FROM team WHERE id='".$id."'");
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
public static function actualizarTeam($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE team SET 
								telefono=:telefono,
								correo=:correo,
								nombres=:nombres,
								cargo=:cargo,
								facebook=:facebook,
								twitter=:twitter,
								google=:google,
								linkedin=:linkedin,
								imagen=:imagen
								WHERE id=:id');
		
		$update->bindValue('telefono',$telefono);
		$update->bindValue('correo',$correo);
		$update->bindValue('nombres',$nombres);
		$update->bindValue('cargo',$cargo);
		$update->bindValue('facebook',$facebook);
		$update->bindValue('twitter',$twitter);
		$update->bindValue('google',$google);
		$update->bindValue('linkedin',$linkedin);
		$update->bindValue('imagen',$imagen);
		$update->bindValue('id',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración del color":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR INFORMACIÓN DE LA TABLA TEAM	****
***************************************************************/
public static function guardarTeam($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);
		/*
		foreach($campostraidos as $campo  => $valor){
			echo $campo."<br>";
			echo $valor."<br>";
			/*
			$telefono=$campo['telefono'];
			$correo=$campo['correo'];
			$nombres=$campo['nombres'];
			$cargo=$campo['cargo'];
			$facebook=$campo['facebook'];
			$twitter=$campo['twitter'];
			$google=$campo['google'];
			$linkedin=$campo['linkedin'];
			$imagen=$campo['imagen'];
			
		} */

		$insert=$db->prepare('INSERT INTO team VALUES (NULL,:telefono,:correo,:nombres,:cargo,:facebook,:twitter,:google,:linkedin,:imagen)');

		$insert->bindValue('telefono',$telefono);
		$insert->bindValue('correo',$correo);
		$insert->bindValue('nombres',$nombres);
		$insert->bindValue('cargo',$cargo);
		$insert->bindValue('facebook',$facebook);
		$insert->bindValue('twitter',$twitter);
		$insert->bindValue('google',$google);
		$insert->bindValue('linkedin',$linkedin);
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
