<?php
/**
* CLASE PARA TRABAJAR CON LOS SERVICIOS
*/
class Pqrs
{
    private $id; 
    private $campos; //devuelve todos los campos de la tabla
 
 
	function __construct($id,$campos)//,$superior,$texto,$nombreservicio)
	{
        $this->setId($id);
        $this->setCampos($campos);
 
        
	}

	/************************************************************************************
	** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA SUCURSALES       ***
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

		$select=$db->query("SELECT * FROM pqrs");
    	$camposs=$select->fetchAll();
    	$campos = new Pqrs('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TRABAJA CON NOSOTROS	  **
********************************************************/
public static function obtenerPaginatrabaja(){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM trabaja_con");
    	$camposs=$select->fetchAll();
    	$campos = new Pqrs('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE PQRS FILTRADOS	  **
***************************************************************/
public static function obtenerPaginaStatus($id){ 
	try {		
		$db=Db::getConnect();
		if ($id=='Peticion' or $id=='Queja' or $id=='Reclamo' ){
			$select=$db->query("SELECT * FROM pqrs WHERE motivo='".$id."'");
			$camposs=$select->fetchAll();
			$campos = new Pqrs('',$camposs);
		} else {
			$select=$db->query("SELECT * FROM pqrs WHERE status='".$id."'");
			$camposs=$select->fetchAll();
			$campos = new Pqrs('',$camposs);
    	}
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE PQRS FILTRADOS	  **
***************************************************************/
public static function obtenerPaginaFiltrada($id){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM pqrs WHERE areainv='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Pqrs('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

public static function obtenerUltimocontacto(){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM pqrs order by id DESC limit 1");
    	$camposs=$select->fetchAll();
    	$campos = new Pqrs('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}



/*******************************************************
** FUNCION PARA MOSTRAR LA CANTIDAD DE MENSAJES SIN LEER POR AREA**
********************************************************/
public static function obtenerSinleer($id){ 
	try {		
		$db=Db::getConnect();
		$status="SIN LEER";
		$select=$db->query("SELECT count(*) as cantidad FROM pqrs WHERE areainv='".$id."' and status='".$status."'");
    	$camposs=$select->fetchAll();
    	$campos = new Pqrs($id,$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/*******************************************************
** FUNCION PARA MOSTRAR LA CANTIDAD DE MENSAJES SIN LEER**
********************************************************/
public static function obtenerSinleertodos(){ 
	try {		
		$db=Db::getConnect();
		$status="SIN LEER";
		$select=$db->query("SELECT count(*) as cantidad FROM pqrs WHERE status='".$status."'");
    	$camposs=$select->fetchAll();
    	$campos = new Pqrs('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/*******************************************************
** FUNCION PARA MOSTRAR LA CANTIDAD DE MENSAJES LEIDOS GENERAL**
********************************************************/
public static function obtenerLeidos(){ 
	try {		
		$db=Db::getConnect();
		$status="LEIDO";
		$select=$db->query("SELECT count(*) as cantidad FROM pqrs WHERE status='".$status."'");
    	$camposs=$select->fetchAll();
    	$campos = new Pqrs('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/*******************************************************
** FUNCION PARA MOSTRAR LA CANTIDAD DE MENSAJES GESTIONANDO GENERAL**
********************************************************/
public static function obtenerProcesando(){ 
	try {		
		$db=Db::getConnect();
		$status="GESTIONANDO";
		$select=$db->query("SELECT count(*) as cantidad FROM pqrs WHERE status='".$status."'");
    	$camposs=$select->fetchAll();
    	$campos = new Pqrs('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/*******************************************************
** FUNCION PARA MOSTRAR LA CANTIDAD DE MENSAJES SOLUCIONADOS GENERAL**
********************************************************/
public static function obtenerSolucionado(){ 
	try {		
		$db=Db::getConnect();
		$status="SOLUCIONADO";
		$select=$db->query("SELECT count(*) as cantidad FROM pqrs WHERE status='".$status."'");
    	$camposs=$select->fetchAll();
    	$campos = new Pqrs('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}









/*******************************************************
** FUNCION PARA MOSTRAR LA CANTIDAD DE MENSAJES SIN LEER **
********************************************************/
public static function versolicitud($id){ //id de la cotización
	try {
			$db=Db::getConnect();

			//OBTENER TODOS LOS CAMPOS DEL ID SOLICITADO
			$select=$db->query("SELECT * FROM pqrs WHERE id='".$id."'");
			$camposs=$select->fetchAll();
			foreach($camposs as $cc){
				$status = $cc['status'];
			};

			if ($status == 'SIN LEER'){
				//CAMBIAR STATUS A LEIDO SI ESTA EN STATUS SIN LEER, DE LO CONTRARIO DEJAR IGUAL
				$update=$db->prepare('UPDATE pqrs SET 
										status=:status
										WHERE id=:id');
				$update->bindValue('status','LEIDO');
				$update->bindValue('id',$id);
				$update->execute();	
			}
			
			//OBTENER TODOS LOS CAMPOS DEL ID SOLICITADO
			$select=$db->query("SELECT * FROM pqrs WHERE id='".$id."'");
			$camposs=$select->fetchAll();
			$campos = new Pqrs($id,$camposs);


			
			return $campos;
			
		}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}			
}


/*******************************************************
** FUNCION PARA MOSTRAR LA CANTIDAD DE MENSAJES SIN LEER **
********************************************************/
public static function cambiarstatus($id,$status){ //id de la cotización
	try {
			$db=Db::getConnect();
			//CAMBIAR STATUS A LEIDO
			$update=$db->prepare('UPDATE pqrs SET 
									status=:status
									WHERE id=:id');
			$update->bindValue('status',$status);
			$update->bindValue('id',$id);
			$update->execute();	
		}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}			
}
}

?>
