<?php
/**
* CLASE PARA TRABAJAR CON LAS FUNCIONES
*/
class Vehiculos
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
** FUNCION PARA MOSTRAR TODOS LAS MARCAS NUEVOS	 		 **
********************************************************/
public static function obtenerMarcas(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM marcas order by marca asc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$marcas = $campos->getCampos();
		return $marcas;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS MARCAS USADOS	 		 **
********************************************************/
public static function obtenerMarcasu(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM marcasu order by marca asc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$marcas = $campos->getCampos();
		return $marcas;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS MARCAS POR ID	 		 **
********************************************************/
public static function obtenerMarcasId($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM marcas WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['marca'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS MARCAS POR ID	 		 **
********************************************************/
public static function obtenerMarcasuId($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM marcasu WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['marca'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR LOGOS DE MARCAS POR ID	 		 **
********************************************************/
public static function obtenerLogosId($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM marcas WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['imagen'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR LOGOS DE MARCAS USADOS POR ID	 		 **
********************************************************/
public static function obtenerLogosuId($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM marcasu WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['imagen'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS MODELOS POR ID	 		 **
********************************************************/
public static function obtenerModelosId($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM modelos WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$modelos = $campos->getCampos();
		foreach($modelos as $modelo){
			$mar = $modelo['modelo'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS MODELOS POR ID	 		 **
********************************************************/
public static function obtenerModelosuId($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM modelosu WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$modelos = $campos->getCampos();
		foreach($modelos as $modelo){
			$mar = $modelo['modelo'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS versiones POR ID	 		 **
********************************************************/
public static function obtenerVersionesId($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM versiones WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$versiones = $campos->getCampos();
		foreach($versiones as $miversion){
			$mar = $miversion['version'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS versiones POR ID	 		 **
********************************************************/
public static function obtenerVersionesuId($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM versionesu WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$versiones = $campos->getCampos();
		foreach($versiones as $miversion){
			$mar = $miversion['version'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS CATEGORIA POR ID	 		 **
********************************************************/
public static function obtenerCategoriasId($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM categorias WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$versiones = $campos->getCampos();
		foreach($versiones as $version){
			$mar = $version['categoria'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LAS CATEGORIAS	  **
********************************************************/
public static function obtenerCategorias(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM categorias order by categoria asc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$categorias = $campos->getCampos();
		return $categorias;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS COLORES			  **
********************************************************/
public static function obtenerColores(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM colores");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$colores = $campos->getCampos();
		return $colores;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS COLORES			  **
********************************************************/
public static function obtenerColoresId($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM colores WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$colores = $campos->getCampos();
		foreach($colores as $cam){
			$campo = $cam['color'];
		}
		return $campo;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS COMBUSTIBLES		  **
********************************************************/
public static function obtenerCombustible(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM combustible");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$combustible = $campos->getCampos();
		return $combustible;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS COMBUSTIBLES POR ID **
********************************************************/
public static function obtenerCombustibleId($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM combustible WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$combustible = $campos->getCampos();
		foreach($combustible as $cam){
			$campo = $cam['tipo'];
		}
		return $campo;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************************
** FUNCION PARA MOSTRAR LAS FUNCIONES O CARACTERISTICAS DEL VEHICULO POR TIPO  **
*********************************************************************************/
public static function obtenerFuncionId($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM funciones WHERE id='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$funciones = $campos->getCampos();
		return $funciones;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/********************************************************************************
** FUNCION PARA MOSTRAR LAS FUNCIONES O CARACTERISTICAS DEL VEHICULO POR TIPO  **
*********************************************************************************/
public static function obtenerFuncion($tipo){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM funciones WHERE tipo='".$tipo."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$funciones = $campos->getCampos();
		return $funciones;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS	  **
********************************************************/
public static function obtenerPagina($tipovehiculo){

if ($tipovehiculo=='Oferta') { 
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT B.precio_oferta,A.precio_lista,B.id,B.imagen_principal,A.id_marca,A.id_modelo,A.id_version FROM carros AS A, oferta_carros as B WHERE A.id=B.carro_id_carro");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
	else
	{
		try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM carros WHERE condicion='".$tipovehiculo."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
	}
	
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS	  **
********************************************************/
public static function obtenerPaginaPpal($filtro){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM carros WHERE publicados_home='".$filtro."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR LISTA USADOS  **
********************************************************/
public static function obtenerListaUsados($publicado,$filtro){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM carros WHERE publicados_home='".$publicado."' and condicion='".$filtro."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR LISTA OFERTAS  **
********************************************************/
public static function obtenerListaOfertas(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT B.carro_id_carro,B.precio_oferta,A.precio_lista,B.id,B.imagen_principal,A.id_marca,A.id_modelo,A.id_version FROM carros AS A, oferta_carros as B WHERE A.id=B.carro_id_carro");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
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
		$select=$db->query("SELECT * FROM carros WHERE id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerPaginaofertaPor($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT B.carro_id_carro,B.precio_oferta,A.precio_lista,B.id,B.imagen_principal,A.id_marca,A.id_modelo,A.id_version FROM carros AS A, oferta_carros as B WHERE A.id=B.carro_id_carro and B.id='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR PALABRA CLAVE  **
***************************************************************/
public static function obtenerPaginaPorpalabra($palabra){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT A.imagen_principal,A.id,concat_ws(' ', B.marca, C.modelo) as micarro FROM carros as A, marcas as B, modelos as C WHERE A.id_marca=B.id and A.id_modelo=C.id AND A.condicion='Nuevo' and A.vin='Principal' AND concat_ws(' ', B.marca, C.modelo) LIKE '%".$palabra."%'");
		$camposs=$select->fetchAll();
		$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODAS LAS VERSIONES  **
***************************************************************/
public static function numeroVersiones($id_modelo){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM carros WHERE id_modelo='".$id_modelo."' order by precio_lista desc");
		$camposs=$select->fetchAll();
		$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener número de versiones":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODAS LAS VERSIONES  **
***************************************************************/
public static function numeroVersionesu($id_modelo){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM carros WHERE id_modelo='".$id_modelo."' and condicion='Usado' order by precio_lista desc");
		$camposs=$select->fetchAll();
		$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener número de versiones":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DE LAS VERSIONES  **
***************************************************************/
public static function nombreVersiones($id_version){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM versiones WHERE id='".$id_version."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$modelos = $campos->getCampos();
		foreach($modelos as $modelo){
			$mar = $modelo['version'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina nombres":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DE LAS VERSIONES  **
***************************************************************/
public static function nombreVersionesu($id_version){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM versionesu WHERE id='".$id_version."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$modelos = $campos->getCampos();
		foreach($modelos as $modelo){
			$mar = $modelo['version'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina nombres":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminarPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM carros WHERE id='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminarofertaPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("DELETE FROM oferta_carros WHERE id='".$id."'");
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
		$select=$db->query("UPDATE carros SET publicados_home='1' WHERE id='".$id."'");
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
		$select=$db->query("UPDATE carros SET publicados_home='0' WHERE id='".$id."'");
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
public static function actualizar($id,$campos,$imagen_principal,$img_frontal,$img_posterior,$img_lateral_izq,$img_lateral_der,$img_maleta,$img_interna,$img_motor,$img_interior_2,$img_ofertas){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		$sonido = array();
		$confort = array();
		$seguridad= array();
		$exterior = array();
		$acc_internos= array();
		extract($campostraidos);

		$soni = ""; //SONIDO
		$i = 0;
		foreach($sonido as $datos){
			$i = $i+1;
			if ($i == 1){
				$soni = $datos;
			}else{
				$soni = $soni.",".$datos;
			}
		}
		//echo "SONIDO: ",$soni."<br>";
		$confo = ""; //CONFORT
		$i = 0;
		foreach($confort as $datos){
			$i = $i+1;
			if ($i == 1){
				$confo = $datos;
			}else{
				$confo = $confo.",".$datos;
			}
		}
//		echo "CONFORT: ",$confo."<br>";
		$segu = ""; //SEGURIDAD
		$i = 0;
		foreach($seguridad as $datos){
			$i = $i+1;
			if ($i == 1){
				$segu = $datos;
			}else{
				$segu = $segu.",".$datos;
			}
		}
//		echo "SEGURIDAD: ",$segu."<br>";
		$exter = ""; //EXTERIOR
		$i = 0;
		foreach($exterior as $datos){
			$i = $i+1;
			if ($i == 1){
				$exter = $datos;
			}else{
				$exter = $exter.",".$datos;
			}
		}
//		echo "EXTERIOR: ",$exter."<br>";
		$acc_int = ""; //ACCESORIOS INTERNOS
		$i = 0;
		foreach($acc_internos as $datos){
			$i = $i+1;
			if ($i == 1){
				$acc_int = $datos;
			}else{
				$acc_int = $acc_int.",".$datos;
			}
		}
		//echo "ACCESORIOS INTERNOS: ",$acc_int."<br>";

		$update=$db->prepare('UPDATE carros SET
								ano=:ano,
								vin=:vin,
								condicion=:condicion,
								ubicacion=:ubicacion,
								kilometros=:kilometros,
								pico_placa=:pico_placa,
								id_marca=:id_marca,
								id_modelo=:id_modelo,
								id_version=:id_version,
								id_categoria=:id_categoria,
								tipo_version=:tipo_version,
								cojineria=:cojineria,
								garantia=:garantia,
								carroceria=:carroceria,
								transmision=:transmision,
								motor=:motor,
								potencia=:potencia,
								nro_valvulas=:nro_valvulas,
								tipo_motor=:tipo_motor,
								cilindraje=:cilindraje,
								nro_cilindros=:nro_cilindros,
								potencia_max=:potencia_max,
								torque=:torque,
								id_combustible=:id_combustible,
								capacidad_tanque=:capacidad_tanque,
								rines=:rines,
								rin=:rin,
								llantas=:llantas,
								tipo_direccion=:tipo_direccion,
								caja=:caja,
								frenos=:frenos,
								delanteros=:delanteros,
								traseros=:traseros,
								descripcion=:descripcion,
								precio_lista=:precio_lista,
								precio_oferta=:precio_oferta,
								imagen_principal=:imagen_principal,
								img_frontal=:img_frontal,
								img_posterior=:img_posterior,
								img_lateral_izq=:img_lateral_izq,
								img_lateral_der=:img_lateral_der,
								img_maleta=:img_maleta,
								img_interna=:img_interna,
								img_motor=:img_motor,
								img_interior_2=:img_interior_2,
								img_ofertas=:img_ofertas,
								seguridad=:seguridad,
								sonido=:sonido,
								exterior=:exterior,
								confort=:confort,
								acc_internos=:acc_internos,
								status=:status,
								publicados_home=:publicados_home,
								color=:color
								WHERE id=:id');

		$status = "Listado";
		$publicados_home= 0;

		$update->bindValue('ano',$ano);
		$update->bindValue('vin',$vin);
		$update->bindValue('condicion',$condicion);
		$update->bindValue('ubicacion',$ubicacion);
		$update->bindValue('kilometros',$kilometros);
		$update->bindValue('pico_placa',$pico_placa);
		$update->bindValue('id_marca',$id_marca);
		$update->bindValue('id_modelo',$id_modelo);
		$update->bindValue('id_version',$id_version);
		$update->bindValue('id_categoria',$id_categoria);
		$update->bindValue('tipo_version',$tipo_version);
		$update->bindValue('cojineria',$cojineria);
		$update->bindValue('garantia',utf8_decode($garantia));
		$update->bindValue('carroceria',$carroceria);
		$update->bindValue('transmision',utf8_decode($transmision));
		$update->bindValue('motor',$motor);
		$update->bindValue('potencia',$potencia);
		$update->bindValue('nro_valvulas',$nro_valvulas);
		$update->bindValue('tipo_motor',$tipo_motor);
		$update->bindValue('cilindraje',$cilindraje);
		$update->bindValue('nro_cilindros',$nro_cilindros);
		$update->bindValue('potencia_max',$potencia_max);
		$update->bindValue('torque',$torque);
		$update->bindValue('id_combustible',$id_combustible);
		$update->bindValue('capacidad_tanque',$capacidad_tanque);
		$update->bindValue('rines',$rines);
		$update->bindValue('rin',$rin);
		$update->bindValue('llantas',$llantas);
		$update->bindValue('tipo_direccion',$tipo_direccion);
		$update->bindValue('caja',$caja);
		$update->bindValue('frenos',$frenos);
		$update->bindValue('delanteros',$delanteros);
		$update->bindValue('traseros',$traseros);
		$update->bindValue('descripcion',$descripcion);
		$update->bindValue('precio_lista',$precio_lista);
		$update->bindValue('precio_oferta',$precio_oferta);
		$update->bindValue('imagen_principal',$imagen_principal);
		$update->bindValue('img_frontal',$img_frontal);
		$update->bindValue('img_posterior',$img_posterior);
		$update->bindValue('img_lateral_izq',$img_lateral_izq);
		$update->bindValue('img_lateral_der',$img_lateral_der);
		$update->bindValue('img_maleta',$img_maleta);
		$update->bindValue('img_interna',$img_interna);
		$update->bindValue('img_motor',$img_motor);
		$update->bindValue('img_interior_2',$img_interior_2);
		$update->bindValue('img_ofertas',$img_ofertas);
		$update->bindValue('seguridad',$segu);
		$update->bindValue('sonido',$soni);
		$update->bindValue('exterior',$exter);
		$update->bindValue('confort',$confo);
		$update->bindValue('acc_internos',$acc_int);
		$update->bindValue('status',$status);
		$update->bindValue('publicados_home',$publicados_home);
		$update->bindValue('color',$color);
		$update->bindValue('id',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}



/********************************************************************
*** FUNCION PARA MODIFICAR ****
********************************************************************/
public static function actualizaroferta($id,$campos,$imagen_principal){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		
		extract($campostraidos);

		$update=$db->prepare('UPDATE oferta_carros SET
								
								carro_id_carro=:carro_id_carro,
								precio_lista=:precio_lista,
								precio_oferta=:precio_oferta,
								imagen_principal=:imagen_principal
								WHERE id=:id');
		$update->bindValue('carro_id_carro',$carro_id_carro);
		$update->bindValue('precio_lista',$precio_lista);
		$update->bindValue('precio_oferta',$precio_oferta);
		$update->bindValue('imagen_principal',$imagen_principal);
		$update->bindValue('id',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}
/***************************************************************
*** FUNCION PARA GUARDAR **
***************************************************************/
public static function guardar($campos,$imagen_principal,$img_frontal,$img_posterior,$img_lateral_izq,$img_lateral_der,$img_maleta,$img_interna,$img_motor,$img_interior_2,$img_ofertas){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();

		$sonido = array();
		$confort = array();
		$seguridad= array();
		$exterior = array();
		$acc_internos= array();

		extract($campostraidos);

		$soni = ""; //SONIDO
		$i = 0;
		foreach($sonido as $datos){
			$i = $i+1;
			if ($i == 1){
				$soni = $datos;
			}else{
				$soni = $soni.",".$datos;
			}
		}
		//echo "SONIDO: ",$soni."<br>";
		$confo = ""; //CONFORT
		$i = 0;
		foreach($confort as $datos){
			$i = $i+1;
			if ($i == 1){
				$confo = $datos;
			}else{
				$confo = $confo.",".$datos;
			}
		}
//		echo "CONFORT: ",$confo."<br>";
		$segu = ""; //SEGURIDAD
		$i = 0;
		foreach($seguridad as $datos){
			$i = $i+1;
			if ($i == 1){
				$segu = $datos;
			}else{
				$segu = $segu.",".$datos;
			}
		}
//		echo "SEGURIDAD: ",$segu."<br>";
		$exter = ""; //EXTERIOR
		$i = 0;
		foreach($exterior as $datos){
			$i = $i+1;
			if ($i == 1){
				$exter = $datos;
			}else{
				$exter = $exter.",".$datos;
			}
		}
//		echo "EXTERIOR: ",$exter."<br>";
		$acc_int = ""; //ACCESORIOS INTERNOS
		$i = 0;
		foreach($acc_internos as $datos){
			$i = $i+1;
			if ($i == 1){
				$acc_int = $datos;
			}else{
				$acc_int = $acc_int.",".$datos;
			}
		}
		//echo "ACCESORIOS INTERNOS: ",$acc_int."<br>";

		$insert=$db->prepare('INSERT INTO carros(ano, vin, condicion, ubicacion, kilometros, pico_placa, id_marca, id_modelo, id_version, id_categoria, tipo_version, cojineria, garantia, carroceria, transmision, motor, potencia, nro_valvulas, tipo_motor, cilindraje, nro_cilindros, potencia_max, torque, id_combustible, capacidad_tanque, rines, rin, llantas, tipo_direccion, caja, frenos, delanteros, traseros, descripcion, precio_lista, precio_oferta, imagen_principal, img_frontal, img_posterior, img_lateral_izq, img_lateral_der, img_maleta, img_interna, img_motor, img_interior_2, img_ofertas, seguridad, sonido, exterior, confort, acc_internos, status,publicados_home,color) VALUES (:ano,:vin,:condicion,:ubicacion,:kilometros,:pico_placa,:id_marca,:id_modelo,:id_version,:id_categoria,:tipo_version,:cojineria,:garantia,:carroceria,:transmision,:motor,:potencia,:nro_valvulas,:tipo_motor,:cilindraje,:nro_cilindros,:potencia_max,:torque,:id_combustible,:capacidad_tanque,:rines,:rin,:llantas,:tipo_direccion,:caja,:frenos,:delanteros,:traseros,:descripcion,:precio_lista,:precio_oferta,:imagen_principal,:img_frontal,:img_posterior,:img_lateral_izq,:img_lateral_der,:img_maleta,:img_interna,:img_motor,:img_interior_2,:img_ofertas,:seguridad,:sonido,:exterior,:confort,:acc_internos,:status,:publicados_home,:color)');

		

		$status = "Listado";
		$publicados_home = 0;
		$insert->bindValue('ano',$ano);
		$insert->bindValue('vin',$vin);
		$insert->bindValue('condicion',$condicion);
		$insert->bindValue('ubicacion',$ubicacion);
		$insert->bindValue('kilometros',$kilometros);
		$insert->bindValue('pico_placa',$pico_placa);
		$insert->bindValue('id_marca',$id_marca);
		$insert->bindValue('id_modelo',$id_modelo);
		$insert->bindValue('id_version',$id_version);
		$insert->bindValue('id_categoria',$id_categoria);
		$insert->bindValue('tipo_version',$tipo_version);
		$insert->bindValue('cojineria',$cojineria);
		$insert->bindValue('garantia',$garantia);
		$insert->bindValue('carroceria',$carroceria);
		$insert->bindValue('transmision',$transmision);
		$insert->bindValue('motor',$motor);
		$insert->bindValue('potencia',$potencia);
		$insert->bindValue('nro_valvulas',$nro_valvulas);
		$insert->bindValue('tipo_motor',$tipo_motor);
		$insert->bindValue('cilindraje',$cilindraje);
		$insert->bindValue('nro_cilindros',$nro_cilindros);
		$insert->bindValue('potencia_max',$potencia_max);
		$insert->bindValue('torque',$torque);
		$insert->bindValue('id_combustible',$id_combustible);
		$insert->bindValue('capacidad_tanque',$capacidad_tanque);
		$insert->bindValue('rines',$rines);
		$insert->bindValue('rin',$rin);
		$insert->bindValue('llantas',$llantas);
		$insert->bindValue('tipo_direccion',$tipo_direccion);
		$insert->bindValue('caja',$caja);
		$insert->bindValue('frenos',$frenos);
		$insert->bindValue('delanteros',$delanteros);
		$insert->bindValue('traseros',$traseros);
		$insert->bindValue('descripcion',$descripcion);
		$insert->bindValue('precio_lista',$precio_lista);
		$insert->bindValue('precio_oferta',$precio_oferta);
		$insert->bindValue('imagen_principal',$imagen_principal);
		$insert->bindValue('img_frontal',$img_frontal);
		$insert->bindValue('img_posterior',$img_posterior);
		$insert->bindValue('img_lateral_izq',$img_lateral_izq);
		$insert->bindValue('img_lateral_der',$img_lateral_der);
		$insert->bindValue('img_maleta',$img_maleta);
		$insert->bindValue('img_interna',$img_interna);
		$insert->bindValue('img_motor',$img_motor);
		$insert->bindValue('img_interior_2',$img_interior_2);
		$insert->bindValue('img_ofertas',$img_ofertas);
		$insert->bindValue('seguridad',$segu);
		$insert->bindValue('sonido',$soni);
		$insert->bindValue('exterior',$exter);
		$insert->bindValue('confort',$confo);
		$insert->bindValue('acc_internos',$acc_int);
		$insert->bindValue('status',$status);
		$insert->bindValue('publicados_home',$publicados_home);
		$insert->bindValue('color',$color);
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


/***************************************************************
*** FUNCION PARA GUARDAR **
***************************************************************/
public static function guardaroferta($campos,$imagen_principal){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO oferta_carros(carro_id_carro,precio_lista,precio_oferta, imagen_principal) VALUES (:carro_id_carro,:precio_lista,:precio_oferta,:imagen_principal)');

		$insert->bindValue('carro_id_carro',$carro_id_carro);
		$insert->bindValue('precio_lista',$precio_lista);
		$insert->bindValue('precio_oferta',$precio_oferta);
		$insert->bindValue('imagen_principal',$imagen_principal);
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

/*****************************************************************************************************************************
/*****************************************************************************************************************************
/**********************************                   ***                    *************************************************
/**********************************        FUNCIONES PARA CARROS NUEVOS      *************************************************
/**********************************                     ***                  *************************************************
/*****************************************************************************************************************************
/*****************************************************************************************************************************

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CARROS NUEVOS  	  **
********************************************************/
public static function obtenerNuevos(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT A.id, ano, vin, condicion, ubicacion, kilometros, pico_placa, id_marca, id_modelo, id_version, id_categoria, tipo_version, cojineria, garantia, carroceria, transmision, motor, potencia, nro_valvulas, tipo_motor, cilindraje, nro_cilindros, potencia_max, torque, id_combustible, capacidad_tanque, rines, rin, llantas, tipo_direccion, caja, frenos, delanteros, traseros, descripcion, precio_lista, precio_oferta, imagen_principal, img_frontal, img_posterior, img_lateral_izq, img_lateral_der, img_maleta, img_interna, img_motor, img_interior_2, img_ofertas, seguridad, sonido, exterior, confort, acc_internos, status, publicados_home,B.marca,B.imagen FROM carros as A, marcas as B WHERE vin='Principal' and A.id_marca=B.id and condicion='Nuevo' order by B.marca asc ");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CARROS NUEVOS ORDENADOS POR 	  **
********************************************************/
public static function ordenarNuevosPor($ordenarpor){

if ($ordenarpor=='preciomenor') {
	// Ordenar por precio menor
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT MIN(precio_lista) as Preciodesde,imagen_principal,precio_lista,id_marca,id_modelo,id_categoria FROM carros where vin='Principal' and condicion='Nuevo' GROUP by id_modelo order by id_modelo,Preciodesde ASC");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
elseif ($ordenarpor=='preciomayor') {
	// Ordenar por precio mayor
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT MIN(precio_lista) as Preciodesde,imagen_principal,precio_lista,id_marca,id_modelo,id_categoria FROM carros where vin='Principal' and condicion='Nuevo' GROUP by id_modelo order by id_modelo,Preciodesde DESC");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

elseif ($ordenarpor=='A-Z') {
	// Ordenar por A-Z
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM carros as A, marcas as B WHERE vin='Principal' and A.id_marca=B.id and condicion='Nuevo' order by B.marca asc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

elseif ($ordenarpor=='Z-A') {
	// Ordenar por A-Z
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM carros as A, marcas as B WHERE vin='Principal' and A.id_marca=B.id and condicion='Nuevo' order by B.marca desc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

elseif ($ordenarpor=='tipovehiculo') {
	// Ordenar por A-Z
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM carros as A, categorias as B WHERE vin='Principal' and A.id_categoria=B.id and condicion='Nuevo' order by B.categoria asc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
	
	
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CARROS NUEVOS FILTRO IZQUIERDO POR 	  **
********************************************************/
public static function filtrarNuevosPor($filtrotipovehiculo,$filtromarca,$filtromodelo,$filtrodesde,$filtrohasta){

if ($filtromodelo=="todos") {
	$buscamodelos="";
}
else{
	$buscamodelos=$filtromodelo;
}

// Filtro llenando todos los campos
	if ($filtrotipovehiculo!="" and $filtromarca!="" and $buscamodelos!="" and $filtrodesde!="" and $filtrohasta!="") {
		
	try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE vin='Principal' and condicion='Nuevo' and id_categoria='".$filtrotipovehiculo."' and id_marca='".$filtromarca."' and id_modelo='".$buscamodelos."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}

	}
// Filtro  por solo tipo de vehículos
	elseif ($filtrotipovehiculo!="" and $filtromarca=="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE vin='Principal' and condicion='Nuevo' and id_categoria='".$filtrotipovehiculo."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

// Filtro  por solo marcas
	elseif ($filtrotipovehiculo=="" and $filtromarca!="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE vin='Principal' and condicion='Nuevo' and id_marca='".$filtromarca."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}
// Filtro  por solo año
	elseif ($filtrotipovehiculo=="" and $filtromarca=="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE vin='Principal' and condicion='Nuevo' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

// Filtro  por solo tipo vehículo + año
	elseif ($filtrotipovehiculo!="" and $filtromarca=="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE vin='Principal' and condicion='Nuevo' and id_categoria='".$filtrotipovehiculo."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}


// Filtro  por solo tipo marca + año
	elseif ($filtrotipovehiculo=="" and $filtromarca!="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE vin='Principal' and condicion='Nuevo' and id_marca='".$filtromarca."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

// Filtro  por solo tipo marca + año
	elseif ($filtrotipovehiculo=="" and $filtromarca!="" and $buscamodelos!="" and $filtrodesde!="" and $filtrohasta!="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE vin='Principal' and condicion='Nuevo' and id_marca='".$filtromarca."' and id_modelo='".$buscamodelos."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

// Filtro  por solo tipo modelo + año
	elseif ($filtrotipovehiculo!="" and $filtromarca!="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE vin='Principal' and condicion='Nuevo' and id_categoria='".$filtrotipovehiculo."' and id_marca='".$filtromarca."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

	
}

/*****************************************************************************************************************************
/*****************************************************************************************************************************
/**********************************                   ***                    *************************************************
/**********************************        FUNCIONES PARA CARROS USADOS      *************************************************
/**********************************                     ***                  *************************************************
/*****************************************************************************************************************************
/*****************************************************************************************************************************

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CARROS USADOS  	  **
********************************************************/
public static function obtenerUsados(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM carros WHERE condicion='Usado'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CARROS USADOS ORDENADOS POR 	  **
********************************************************/
public static function ordenarUsadosPor($ordenarpor){

if ($ordenarpor=='preciomenor') {
	// Ordenar por precio menor
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM carros WHERE  condicion='Usado' order by precio_lista asc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
elseif ($ordenarpor=='preciomayor') {
	// Ordenar por precio mayor
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM carros WHERE condicion='Usado' order by precio_lista desc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

elseif ($ordenarpor=='A-Z') {
	// Ordenar por A-Z
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM carros as A, marcas as B WHERE  A.id_marca=B.id and condicion='Usado' order by B.marca desc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

elseif ($ordenarpor=='Z-A') {
	// Ordenar por A-Z
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM carros as A, marcas as B WHERE  A.id_marca=B.id and condicion='Usado' order by B.marca asc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

elseif ($ordenarpor=='tipovehiculo') {
	// Ordenar por A-Z
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM carros as A, categorias as B WHERE  A.id_categoria=B.id and condicion='Usado' order by B.categoria asc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}
	
	
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CARROS NUEVOS FILTRO IZQUIERDO POR 	  **
********************************************************/
public static function filtrarUsadosPor($filtrotipovehiculo,$filtromarca,$filtromodelo,$filtrodesde,$filtrohasta,$filtropico_placa,$filtrotransmision,$filtroubicacion,$filtrocolor){

if ($filtromodelo=="todos") {
	$buscamodelos="";
}
else{
	$buscamodelos=$filtromodelo;
}

// Filtro llenando todos los campos
	if ($filtrotipovehiculo!="" and $filtromarca!="" and $buscamodelos!="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa!="" and $filtrotransmision!="" and $filtroubicacion!="" and $filtrocolor!="") {
		
	try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE  condicion='Usado' and id_categoria='".$filtrotipovehiculo."' and id_marca='".$filtromarca."' and id_modelo='".$buscamodelos."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' and pico_placa='".$filtropico_placa."' and transmision='".$filtrotransmision."' and ubicacion='".$filtroubicacion."' and color='".$filtrocolor."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}

	}
// Filtro  por solo tipo de vehículos
	elseif ($filtrotipovehiculo!="" and $filtromarca=="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa=="" and $filtrotransmision=="" and $filtroubicacion=="" and $filtrocolor=="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and id_categoria='".$filtrotipovehiculo."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

// Filtro  por solo marcas
	elseif ($filtrotipovehiculo=="" and $filtromarca!="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa=="" and $filtrotransmision=="" and $filtroubicacion=="" and $filtrocolor=="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and id_marca='".$filtromarca."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}
// Filtro  por solo año
	elseif ($filtrotipovehiculo=="" and $filtromarca=="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa=="" and $filtrotransmision=="" and $filtroubicacion=="" and $filtrocolor=="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

// Filtro por solo pico y placa

	elseif ($filtrotipovehiculo=="" and $filtromarca=="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa!="" and $filtrotransmision=="" and $filtroubicacion=="" and $filtrocolor=="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and pico_placa='".$filtropico_placa."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}


// Filtro por solo transmisión

	elseif ($filtrotipovehiculo=="" and $filtromarca=="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa=="" and $filtrotransmision!="" and $filtroubicacion=="" and $filtrocolor=="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and transmision='".$filtrotransmision."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

// Filtro por solo ubicación

	elseif ($filtrotipovehiculo=="" and $filtromarca=="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa=="" and $filtrotransmision=="" and $filtroubicacion!="" and $filtrocolor=="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and ubicacion='".$filtroubicacion."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

// Filtro por solo color

	elseif ($filtrotipovehiculo=="" and $filtromarca=="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa=="" and $filtrotransmision=="" and $filtroubicacion=="" and $filtrocolor!="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and color='".$filtrocolor."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}





// Filtro  por solo tipo vehículo + año
	elseif ($filtrotipovehiculo!="" and $filtromarca=="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa=="" and $filtrotransmision=="" and $filtroubicacion=="" and $filtrocolor=="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and id_categoria='".$filtrotipovehiculo."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

// Filtro  por solo tipo marca + año
	elseif ($filtrotipovehiculo=="" and $filtromarca!="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa=="" and $filtrotransmision=="" and $filtroubicacion=="" and $filtrocolor=="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and id_marca='".$filtromarca."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

// Filtro  por solo tipo marca + año
	elseif ($filtrotipovehiculo=="" and $filtromarca!="" and $buscamodelos!="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa=="" and $filtrotransmision=="" and $filtroubicacion=="" and $filtrocolor=="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and id_marca='".$filtromarca."' and id_modelo='".$buscamodelos."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

// Filtro  por solo tipo modelo + año
	elseif ($filtrotipovehiculo!="" and $filtromarca!="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa=="" and $filtrotransmision=="" and $filtroubicacion=="" and $filtrocolor=="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and id_categoria='".$filtrotipovehiculo."' and id_marca='".$filtromarca."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

	// Filtro  por solo pico y placa + año
	elseif ($filtrotipovehiculo=="" and $filtromarca!="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa!="" and $filtrotransmision=="" and $filtroubicacion=="" and $filtrocolor=="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and pico_placa='".$filtropico_placa."' and id_marca='".$filtromarca."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

	// Filtro  por solo transmisión + año
	elseif ($filtrotipovehiculo=="" and $filtromarca!="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa=="" and $filtrotransmision!="" and $filtroubicacion=="" and $filtrocolor=="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and transmision='".$filtrotransmision."' and id_marca='".$filtromarca."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

	// Filtro  por solo ubicacion + año
	elseif ($filtrotipovehiculo=="" and $filtromarca!="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa=="" and $filtrotransmision=="" and $filtroubicacion!="" and $filtrocolor=="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and ubicacion='".$filtroubicacion."' and id_marca='".$filtromarca."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

	// Filtro  por solo color + año
	elseif ($filtrotipovehiculo=="" and $filtromarca!="" and $buscamodelos=="" and $filtrodesde!="" and $filtrohasta!="" and $filtropico_placa=="" and $filtrotransmision=="" and $filtroubicacion=="" and $filtrocolor!="") {
		try {
		$db=Db::getConnect();
		$consulta="SELECT * FROM carros WHERE condicion='Usado' and color='".$filtrocolor."' and id_marca='".$filtromarca."' and ano>='".$filtrodesde."' and ano<='".$filtrohasta."' order by precio_lista asc";
		//echo($consulta);
$select=$db->query($consulta);
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
			}
	}

	
}



public static function obtenerPrecioDesde($id_modelo){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT MIN(precio_lista) as Preciodesde FROM carros WHERE id_modelo='".$id_modelo."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$precio_lista = $campos->getCampos();
		foreach($precio_lista as $cam){
			$campo = $cam['Preciodesde'];
		}
		return $campo;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

public static function obteneranoDesde($condicion){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT MIN(ano) as anodesde FROM carros WHERE condicion='".$condicion."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$precio_lista = $campos->getCampos();
		foreach($precio_lista as $cam){
			$campo = $cam['anodesde'];
		}
		return $campo;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

public static function obteneranoHasta($condicion){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT MAX(ano) as anohasta FROM carros WHERE condicion='".$condicion."'");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$precio_lista = $campos->getCampos();
		foreach($precio_lista as $cam){
			$campo = $cam['anohasta']+1;
		}
		return $campo;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EN LISTA LAS TRANSMISIONES DE USADOS	 		 **
********************************************************/
public static function obtenerTransmision($condicion){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT transmision FROM carros where condicion='".$condicion."' order by transmision asc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$transmisiones = $campos->getCampos();
		return $transmisiones;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EN LISTA LA UBICACION POR CONDICIÓN 		 **
********************************************************/
public static function obtenerUbicacion($condicion){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT ubicacion FROM carros where condicion='".$condicion."' order by ubicacion asc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$ubicaciones = $campos->getCampos();
		return $ubicaciones;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR EN LISTA LA UBICACION DE USADOS	 		 **
********************************************************/
public static function obtenerColoresu($condicion){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT color FROM carros where condicion='".$condicion."' order by color asc");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
    	$colores = $campos->getCampos();
		return $colores;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


}


?>
