<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/
class informecuentasporcobrar
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
public static function ReporteCuentasxcobrarconsolidado(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT *  FROM clientes WHERE estado_cliente='1' order by nombre_cliente");
    	$camposs=$select->fetchAll();
    	$campos = new informecuentasporcobrar('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function ReporteCuentasxcobrarporfechaconsolidado($FechaStart,$FechaEnd){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT proveedor_id_proveedor,SUM(valor_m3*cantidad) as deuda,insumo_id_insumo  FROM reporte_compras WHERE reporte_publicado='1' and estado_reporte='2' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' GROUP BY proveedor_id_proveedor");
    	$camposs=$select->fetchAll();
    	$campos = new informecuentasporcobrar('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS	  **
********************************************************/
public static function ReporteCuentasxcobrardetalle($proveedor){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM reporte_compras WHERE reporte_publicado='1' and estado_reporte='2' and proveedor_id_proveedor='".$proveedor."' order by fecha_reporte DESC");
    	$camposs=$select->fetchAll();
    	$campos = new informecuentasporcobrar('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


}

?>
