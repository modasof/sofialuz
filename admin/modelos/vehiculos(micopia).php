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
** FUNCION PARA MOSTRAR TODOS LAS MARCAS	 		 **
********************************************************/
public static function obtenerMarcas(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM marcas");
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

		$select=$db->query("SELECT * FROM categorias");
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
public static function obtenerPagina(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM carros");
    	$camposs=$select->fetchAll();
    	$campos = new Vehiculos('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
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
								id_marca=:id_marca,
								id_modelo=:id_modelo,
								id_version=:id_version,
								nro_stock=:nro_stock,
								vin=:vin,
								id_categoria=:id_categoria,
								condicion=:condicion,
								tipo_direccion=:tipo_direccion,
								kilometros=:kilometros,
								torque=:torque,
								id_color_int=:id_color_int,
								id_color_ext=:id_color_ext,
								id_transmision=:id_transmision,
								motor=:motor,
								tipo_traccion=:tipo_traccion,
								nro_puertas=:nro_puertas,
								velocidad_maxima=:velocidad_maxima,
								id_combustible=:id_combustible,
								caballos_fuerza=:caballos_fuerza,
								capacidad_remolque=:capacidad_remolque,
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
								descripcion=:descripcion,
								status=:status
								WHERE id=:id');

		$status = "Listado";

		$update->bindValue('ano',$ano);
		$update->bindValue('id_marca',$id_marca);
		$update->bindValue('id_modelo',$id_modelo);
		$update->bindValue('id_version',$id_version);
		$update->bindValue('nro_stock',$nro_stock);
		$update->bindValue('vin',$vin);
		$update->bindValue('id_categoria',$id_categoria);
		$update->bindValue('condicion',$condicion);
		$update->bindValue('tipo_direccion',$tipo_direccion);
		$update->bindValue('kilometros',$kilometros);
		$update->bindValue('torque',$torque);
		$update->bindValue('id_color_int',$id_color_int);
		$update->bindValue('id_color_ext',$id_color_ext);
		$update->bindValue('id_transmision',$id_transmision);
		$update->bindValue('motor',$motor);
		$update->bindValue('tipo_traccion',$tipo_traccion);
		$update->bindValue('nro_puertas',$nro_puertas);
		$update->bindValue('velocidad_maxima',$velocidad_maxima);
		$update->bindValue('id_combustible',$id_combustible);
		$update->bindValue('caballos_fuerza',$caballos_fuerza);
		$update->bindValue('capacidad_remolque',$capacidad_remolque);
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
		$update->bindValue('descripcion',$descripcion);
		$update->bindValue('status',$status);
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

		$insert=$db->prepare('INSERT INTO carros (id,ano,id_marca,id_modelo,id_version,nro_stock,vin,id_categoria,condicion,tipo_direccion,kilometros,torque,id_color_int,id_color_ext,id_transmision,motor,tipo_traccion,nro_puertas,velocidad_maxima,id_combustible,caballos_fuerza,capacidad_remolque,precio_lista,precio_oferta,imagen_principal,img_frontal,img_posterior,img_lateral_izq,img_lateral_der,img_maleta,img_interna,img_motor,img_interior_2,img_ofertas,seguridad,sonido,exterior,confort,acc_internos,descripcion,status) VALUES (id,:ano,:id_marca,:id_modelo,:id_version,:nro_stock,:vin,:id_categoria,:condicion,:tipo_direccion,:kilometros,:torque,:id_color_int,:id_color_ext,:id_transmision,:motor,:tipo_traccion,:nro_puertas,:velocidad_maxima,:id_combustible,:caballos_fuerza,:capacidad_remolque,:precio_lista,:precio_oferta,:imagen_principal,:img_frontal,:img_posterior,:img_lateral_izq,:img_lateral_der,:img_maleta,:img_interna,:img_motor,:img_interior_2,:img_ofertas,:seguridad,:sonido,:exterior,:confort,:acc_internos,:descripcion,:status)');

	/*	echo $ano."<br>";
		echo $id_marca."<br>";
		echo $id_modelo."<br>";
		echo $id_version."<br>";
		echo $nro_stock."<br>";
		echo $vin."<br>";
		echo $id_categoria."<br>";
		echo $condicion."<br>";
		echo $tipo_direccion."<br>";
		echo $kilometros."<br>";
		echo $torque."<br>";
		echo $id_color_int."<br>";
		echo $id_color_ext."<br>";
		echo $id_transmision."<br>";
		echo $motor."<br>";
		echo $tipo_traccion."<br>";
		echo $nro_puertas."<br>";
		echo $velocidad_maxima."<br>";
		echo $id_combustible."<br>";
		echo $caballos_fuerza."<br>";
		echo $capacidad_remolque."<br>";
		echo $precio_lista."<br>";
		echo $precio_oferta."<br>";
		echo $imagen_principal."<br>";
		echo $img_frontal."<br>";
		echo $img_posterior."<br>";
		echo $img_lateral_izq."<br>";
		echo $img_lateral_der."<br>";
		echo $img_maleta."<br>";
		echo $img_interna."<br>";
		echo $img_motor."<br>";
		echo $img_interior_2."<br>";
		echo $img_ofertas."<br>";
		echo $segu."<br>";
		echo $soni."<br>";
		echo $exter."<br>";
		echo $confo."<br>";
		echo $acc_int."<br>";
		echo $descripcion."<br>";*/

		$status = "Listado";

		$insert->bindValue('ano',$ano);
		$insert->bindValue('id_marca',$id_marca);
		$insert->bindValue('id_modelo',$id_modelo);
		$insert->bindValue('id_version',$id_version);
		$insert->bindValue('nro_stock',$nro_stock);
		$insert->bindValue('vin',$vin);
		$insert->bindValue('id_categoria',$id_categoria);
		$insert->bindValue('condicion',$condicion);
		$insert->bindValue('tipo_direccion',$tipo_direccion);
		$insert->bindValue('kilometros',$kilometros);
		$insert->bindValue('torque',$torque);
		$insert->bindValue('id_color_int',$id_color_int);
		$insert->bindValue('id_color_ext',$id_color_ext);
		$insert->bindValue('id_transmision',$id_transmision);
		$insert->bindValue('motor',$motor);
		$insert->bindValue('tipo_traccion',$tipo_traccion);
		$insert->bindValue('nro_puertas',$nro_puertas);
		$insert->bindValue('velocidad_maxima',$velocidad_maxima);
		$insert->bindValue('id_combustible',$id_combustible);
		$insert->bindValue('caballos_fuerza',$caballos_fuerza);
		$insert->bindValue('capacidad_remolque',$capacidad_remolque);
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
		$insert->bindValue('descripcion',$descripcion);
		$insert->bindValue('status',$status);
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
