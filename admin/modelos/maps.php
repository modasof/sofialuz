<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/
class Maps
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
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function todos(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT DISTINCT (usuario_id) as usuario_id FROM estado_conductores ");
    	$camposs=$select->fetchAll();
    	$campos = new Maps('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function porusuario($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT usuario_id as usuario_id FROM estado_conductores WHERE usuario_id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Maps('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function disponibles(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT DISTINCT (usuario_id) as usuario_id FROM estado_conductores WHERE estado_usuario='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Maps('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ocupados(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT DISTINCT (usuario_id) as usuario_id FROM estado_conductores WHERE estado_usuario='2'");
    	$camposs=$select->fetchAll();
    	$campos = new Maps('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

   /*******************************************************
     ** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
     ********************************************************/
    public static function validacionestado($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT COUNT(id) AS total FROM estado_conductores WHERE usuario_id='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Maps('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['total'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    /***************************************************************
 ** FUNCION PARA ACTUALIZAR ESTADO ID  **
 ***************************************************************/
    public static function actualizarestadocon($fecha_reporte, $usuario_id, $marca_temporal, $latitud, $longitud, $estado_usuario)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE estado_conductores SET fecha_reporte='" . utf8_decode($fecha_reporte) . "', marca_temporal='" . utf8_decode($marca_temporal) . "', latitud='" . utf8_decode($latitud) . "',longitud='" . utf8_decode($longitud) . "',estado_usuario='".$estado_usuario."' WHERE usuario_id='" . $usuario_id . "'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }


    /***************************************************************
 *** FUNCION PARA GUARDAR **
 ***************************************************************/
    public static function guardarestadocon($fecha_reporte, $usuario_id, $marca_temporal, $latitud, $longuitud, $estado_usuario,$equipo_id_equipo)
    {
        try {

            $db     = Db::getConnect();
            $insert = $db->prepare('INSERT INTO estado_conductores VALUES (NULL,:fecha_reporte,:usuario_id,:marca_temporal,:latitud,:longuitud,:estado_usuario,:equipo_id_equipo)');

            $insert->bindValue('fecha_reporte', utf8_encode($fecha_reporte));
            $insert->bindValue('usuario_id', utf8_encode($usuario_id));
            $insert->bindValue('marca_temporal', utf8_encode($marca_temporal));
            $insert->bindValue('latitud', utf8_encode($latitud));
            $insert->bindValue('longuitud', utf8_encode($longuitud));
            $insert->bindValue('estado_usuario', utf8_encode($estado_usuario));
            $insert->bindValue('equipo_id_equipo', utf8_encode($equipo_id_equipo));
            $insert->execute();

        } catch (PDOException $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }
    }




}

?>
