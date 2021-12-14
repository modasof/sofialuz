<?php
/**
* CLASE PARA TRABAJAR CON LOS TESTIMONIOS
*/
class Contenidoseccion
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
** FUNCION PARA MOSTRAR EL NUMERO DE PEDIDO	  **
********************************************************/
public static function obtenerPedido(){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM pedidos order by pedido_numero desc limit 1");
    	$camposs=$select->fetchAll();
    	$campos = new Contenidoseccion('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}



/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE ACCESORIOS	  **
********************************************************/
public static function obtenerPagina(){ 
	try {		
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM accesorios");
    	$camposs=$select->fetchAll();
    	$campos = new Contenidoseccion('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}



/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS CATEGORIAS	 		 **
********************************************************/
public static function obtenerCategorias(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM categorias_acc order by nom_categoria asc");
    	$camposs=$select->fetchAll();
    	$campos = new Contenidoseccion('',$camposs);
    	$catacc = $campos->getCampos();
		return $catacc;
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
		$select=$db->query("SELECT * FROM contenido_secciones WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Contenidoseccion('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}


/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerSecciones($id){ 
	try {		
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM secciones_home WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Contenidoseccion('',$camposs);
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
		$select=$db->query("DELETE FROM accesorios WHERE id_accesorio='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}	
}

/***************************************************************
** FUNCION PARA PUBLICAR EN EL HOME POR ID  **
***************************************************************/
public static function publicarPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE accesorios SET publicado='1' WHERE id_accesorio='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA DESPUBLICAR DEL HOME POR ID  **
***************************************************************/
public static function despublicarPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE accesorios SET publicado='0' WHERE id_accesorio='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR LISTA USADOS  **
********************************************************/
public static function obtenerListaAccesorios($publicado){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM accesorios WHERE publicado='".$publicado."'");
    	$camposs=$select->fetchAll();
    	$campos = new Contenidoseccion('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/***************************************************************
*** FUNCION PARA ACTUALIZAR INFORMACIÓN DE LA TABLA ACCESORIOS	****
***************************************************************/
public static function actualizarContenidoseccion($id,$campos,$imagen_banner,$imagen1){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		//$insert=$db->prepare('INSERT INTO contenido_secciones VALUES (NULL,:titulo1_form,:titulo_izq,:paso1,:paso2,:paso3,:paso4,:subtitulo1,:subtitulo2,:imagen_banner,:imagen1,:correo_principal,:correo_copia)');
		$sentencia="UPDATE contenido_secciones SET 
								titulo1_form=:titulo1_form,
								boton_form=:boton_form,
								titulo_izq=:titulo_izq,
								paso1=:paso1,
								paso2=:paso2,
								paso3=:paso3,
								paso4=:paso4,
								subtitulo1=:subtitulo1,
								subtitulo2=:subtitulo2,
								imagen_banner=:imagen_banner,
								imagen1=:imagen1,
								correo_principal=:correo_principal,
								correo_copia=:correo_copia
								WHERE id=:id";

		$update=$db->prepare($sentencia);
		$update->bindValue('titulo1_form',utf8_decode($titulo1_form));
		$update->bindValue('boton_form',utf8_decode($boton_form));
		$update->bindValue('titulo_izq',utf8_decode($titulo_izq));
		$update->bindValue('paso1',utf8_decode($paso1));
		$update->bindValue('paso2',utf8_decode($paso2));
		$update->bindValue('paso3',utf8_decode($paso3));
		$update->bindValue('paso4',utf8_decode($paso4));
		$update->bindValue('subtitulo1',utf8_decode($subtitulo1));
		$update->bindValue('subtitulo2',utf8_decode($subtitulo2));
		$update->bindValue('imagen_banner',$imagen_banner);
		$update->bindValue('imagen1',$imagen1);
		$update->bindValue('correo_principal',$correo_principal);
		$update->bindValue('correo_copia',$correo_copia);
		$update->bindValue('id',$id);
		$update->execute();
		
		return true;
	}
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
		echo '{"error":{"text":'. $e->getLine() .'}}';
		echo '{"error":{"text":'. $e->getTraceAsString() .'}}';
		echo "El código de excepción es: " . $e->getCode();
		return false;
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR INFORMACIÓN DE LA TABLA ACCESORIOS	****
***************************************************************/
public static function guardarAccesorio($campos,$imagen_principal,$imagen1,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO accesorios VALUES (NULL,:nombre_acc,:descripcion,:categoria_acc,:precio_costo,:precio_publico,:terminos,:publicado,:imagen_principal,:imagen1,:imagen2,:imagen3,:imagen4,:imagen5,:imagen6,:imagen7,:imagen8)');

		$insert->bindValue('nombre_acc',$nombre_acc);
		$insert->bindValue('descripcion',$descripcion);
		$insert->bindValue('categoria_acc',$categoria_acc);
		$insert->bindValue('precio_costo',$precio_costo);
		$insert->bindValue('precio_publico',$precio_publico);
		$insert->bindValue('terminos',$terminos);
		$insert->bindValue('publicado',$publicado);
		$insert->bindValue('imagen_principal',$imagen_principal);
		$insert->bindValue('imagen1',$imagen1);
		$insert->bindValue('imagen2',$imagen2);
		$insert->bindValue('imagen3',$imagen3);
		$insert->bindValue('imagen4',$imagen4);
		$insert->bindValue('imagen5',$imagen5);
		$insert->bindValue('imagen6',$imagen6);
		$insert->bindValue('imagen7',$imagen7);
		$insert->bindValue('imagen8',$imagen8);
		$insert->execute();
		
		return true;
	}
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
		echo '{"error":{"text":'. $e->getLine() .'}}';
		echo '{"error":{"text":'. $e->getTraceAsString() .'}}';
		echo "El código de excepción es: " . $e->getCode();
		return false;
	}
}

}

?>
