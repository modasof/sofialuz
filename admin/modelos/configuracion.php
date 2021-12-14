<?php
/**
* CLASE PARA TRABAJAR CON LAS FUNCIONES
*/
class Configuracion
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

		$select=$db->query("SELECT * FROM configuracion");
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
		$select=$db->query("SELECT * FROM configuracion WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Configuracion('',$camposs);
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


		$update=$db->prepare('UPDATE configuracion SET
								direccion=:direccion,
								mapa_direccion=:mapa_direccion,
								correo_contacto=:correo_contacto,
								correo_cotizar=:correo_cotizar,
								telefono_principal=:telefono_principal,
								telefonos_otros=:telefonos_otros,
								dias_trabajo=:dias_trabajo,
								facebook=:facebook,
								instagram=:instagram,
								twitter=:twitter,
								linkedin=:linkedin,
								meta_keywords=:meta_keywords,
								meta_descripcion=:meta_descripcion,
								nombre_sitio=:nombre_sitio,
								titulocontacto=:titulocontacto,
								titulomapa=:titulomapa,
								tituloboletin=:tituloboletin,
								textoboletin=:textoboletin,
								titulohorario=:titulohorario,
								textohorario=:textohorario,
								textopolitica=:textopolitica,
								google_id=:google_id
								WHERE id=:id');
		$update->bindValue('direccion',$direccion);
		$update->bindValue('mapa_direccion',$mapa_direccion);
		$update->bindValue('correo_contacto',$correo_contacto);
		$update->bindValue('correo_cotizar',$correo_cotizar);
		$update->bindValue('telefono_principal',$telefono_principal);
		$update->bindValue('telefonos_otros',$telefonos_otros);
		$update->bindValue('dias_trabajo',$dias_trabajo);
		$update->bindValue('facebook',$facebook);
		$update->bindValue('instagram',$instagram);
		$update->bindValue('twitter',$twitter);
		$update->bindValue('linkedin',$linkedin);
		$update->bindValue('meta_keywords',$meta_keywords);
		$update->bindValue('meta_descripcion',utf8_decode($meta_descripcion));
		$update->bindValue('nombre_sitio',$nombre_sitio);
		$update->bindValue('titulocontacto',utf8_decode($titulocontacto));
		$update->bindValue('titulomapa',utf8_decode($titulomapa));
		$update->bindValue('tituloboletin',utf8_decode($tituloboletin));
		$update->bindValue('textoboletin',utf8_decode($textoboletin));
		$update->bindValue('titulohorario',utf8_decode($titulohorario));
		$update->bindValue('textohorario',utf8_decode($textohorario));
		$update->bindValue('textopolitica',utf8_decode($textopolitica));
		$update->bindValue('google_id',$google_id);
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
