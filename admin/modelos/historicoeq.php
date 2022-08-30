<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/
class Historicoeq
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
** FUNCION PARA MOSTRAR LA LISTA DE CUENTAS	  **
********************************************************/
public static function obtenerListaequipos(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and propietario='2'");
    	$camposs=$select->fetchAll();
    	$campos = new Historicoeq('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

public static function obtenerListaequiposexternos(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and propietario<>'2'");
    	$camposs=$select->fetchAll();
    	$campos = new Historicoeq('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 ********************************************************/
    public static function ordenestrabajomes($equipo,$mes,$ano)
    {
        try {
            $db = Db::getConnect();
        $sql ="SELECT * FROM reporte_equipos WHERE reporte_publicado='1' and equipo_id_equipo='" . $equipo . "' and YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' order by id_reporte desc";
            $select  = $db->query($sql);
            //echo ($sql);
            $camposs = $select->fetchAll();
            $campos  = new Historicoeq('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 ********************************************************/
    public static function combustibleinformepormes($equipo,$mes,$ano)
    {
        try {
            $db = Db::getConnect();
        $sql ="SELECT * FROM reporte_combustibles
WHERE equipo_id_equipo='".$equipo."' and YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1'";
            $select  = $db->query($sql);
            //echo ($sql);
            $camposs = $select->fetchAll();
            $campos  = new Historicoeq('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }


 /*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 ********************************************************/
    public static function kminformepormes($equipo,$mes,$ano)
    {
        try {
            $db = Db::getConnect();
        $sql ="SELECT * FROM reporte_horas
WHERE equipo_id_equipo='".$equipo."' and YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1'";
            $select  = $db->query($sql);
            //echo ($sql);
            $camposs = $select->fetchAll();
            $campos  = new Historicoeq('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

 /*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 * SELECT * FROM egresos_caja WHERE estado_egreso='1' order by id_egreso_caja DESC
 ********************************************************/
    public static function cajamenorinformepormes($equipo,$mes,$ano)
    {
        try {
            $db = Db::getConnect();
        $sql ="SELECT * FROM egresos_caja
WHERE equipo_id_equipo='".$equipo."' and YEAR(fecha_egreso)='".$ano."' and MONTH(fecha_egreso)='".$mes."' and estado_egreso='1'";
            $select  = $db->query($sql);
            //echo ($sql);
            $camposs = $select->fetchAll();
            $campos  = new Historicoeq('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

   /*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 * SELECT * FROM egresos_caja WHERE estado_egreso='1' order by id_egreso_caja DESC
 ********************************************************/
    public static function prodvolinformepormes($equipo,$mes,$ano)
    {
        try {
            $db = Db::getConnect();
        $sql ="SELECT * FROM reporte_despachosclientes
WHERE equipo_id_equipo='".$equipo."' and YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1'";
            $select  = $db->query($sql);
            //echo ($sql);
            $camposs = $select->fetchAll();
            $campos  = new Historicoeq('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    /*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 * SELECT * FROM egresos_caja WHERE estado_egreso='1' order by id_egreso_caja DESC
 ********************************************************/
    public static function prodhorasinformepormes($equipo,$mes,$ano)
    {
        try {
            $db = Db::getConnect();
        $sql ="SELECT * FROM reporte_horasmq
WHERE equipo_id_equipo='".$equipo."' and YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1'";
            $select  = $db->query($sql);
            //echo ($sql);
            $camposs = $select->fetchAll();
            $campos  = new Historicoeq('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }







}

?>
