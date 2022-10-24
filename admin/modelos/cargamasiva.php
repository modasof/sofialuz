<?php
/**
* CLASE PARA TRABAJAR CON LOS Slider
*/
class Cargamasiva
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
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
 ********************************************************/
    public static function obtenerIdEquipo($dato)
    {
        try {
            $db = Db::getConnect();
            $select  = $db->query("SELECT id_equipo FROM equipos WHERE nombre_equipo='" . $dato . "' and equipo_publicado='1'");
            $camposs = $select->fetchAll();
            $campos  = new Cargamasiva('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['id_equipo'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }


 /*******************************************************
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL USUARIO **
 ********************************************************/
    public static function obtenerIdConductor($nombre_usuario)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT id_funcionario FROM funcionarios WHERE nombre_funcionario LIKE '%".$nombre_usuario."%' and funcionario_publicado='1'");
            $camposs = $select->fetchAll();
            $campos  = new Cargamasiva('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['id_funcionario'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }


/*******************************************************
** FUNCION PARA VALIDACIÓN **
********************************************************/
public static function validarRegistro($id_equipo,$fechaformateada){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT COUNT(id) AS total FROM reporte_horas WHERE equipo_id_equipo='".$id_equipo."' and fecha_reporte='".$fechaformateada."' and reporte_publicado='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Cargamasiva('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['total'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA VALIDACIÓN **
********************************************************/
public static function validarRegistrohoras($id_equipo,$fechaformateada){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT COUNT(id) AS total FROM reporte_horasmq WHERE equipo_id_equipo='".$id_equipo."' and fecha_reporte='".$fechaformateada."' and reporte_publicado='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Cargamasiva('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['total'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA ACTUALIZAR LA DATA **
********************************************************/
    public static function actualizardataGps($fecha,$equipo,$km,$id_conductor)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE reporte_horas SET hora_inactiva='".$km."', recibido_por='".$id_conductor."' WHERE fecha_reporte='" . $fecha. "' and equipo_id_equipo='".$equipo."'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
** FUNCION PARA ACTUALIZAR LA DATA **
********************************************************/
    public static function actualizardataGpshoras($fecha,$equipo,$km)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE reporte_horasmq SET registro_gps='".$km."' WHERE fecha_reporte='" . $fecha. "' and equipo_id_equipo='".$equipo."'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }


/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
* INSERT INTO reporte_horas(id, fecha_reporte, equipo_id_equipo, despachado_por, punto_despacho, recibido_por, valor_m3, cantidad, indicador, registro_gps, hora_inactiva, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones)
***************************************************************/
public static function nuevadataGps($fechaformateada,$id_equipo,$totalkm,$id_conductor,$IdSesion){
	try {

		$db=Db::getConnect();
		$TiempoActual = date('Y-m-d H:i:s');
		$select=$db->query("INSERT INTO reporte_horas (fecha_reporte, equipo_id_equipo, despachado_por, punto_despacho, recibido_por, valor_m3, cantidad, indicador, registro_gps, hora_inactiva, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones) VALUES ('".$fechaformateada."','".$id_equipo."','0','0','".$id_conductor."','0','0','0','0','".$totalkm."','".$IdSesion."','1','1','".$TiempoActual."','');");

		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



}

?>
