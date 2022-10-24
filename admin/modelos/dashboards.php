<?php
/**
* CLASE PARA TRABAJAR CON LOS Slider
*/
class Dashboards
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


	public static function GraficaHistorialDespachofecha($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT fecha_reporte,IFNULL(sum(ROUND(valor_m3,1)),0) as totales FROM reporte_despachosclientes WHERE fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' and reporte_publicado='1' GROUP BY fecha_reporte ORDER BY fecha_reporte ASC");
		$camposs=$select->fetchAll();
		$campos = new Dashboards('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


}

?>
