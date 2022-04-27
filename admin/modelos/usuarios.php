<?php
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/
class Usuarios
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
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS	  **
********************************************************/
public static function obtenerPagina(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM usuarios WHERE estado_usuario<>'0'");
    	$camposs=$select->fetchAll();
    	$campos = new Usuarios('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS	  **
********************************************************/
public static function obtenerPaginanotificaciones($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM modulo_alertas WHERE usuario_receptor='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Usuarios('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER TODAS LAS MARCAS DEL VEHICULO	  **
********************************************************/
public static function obtenerRoles(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT id_rol,nombre_rol FROM roles");
    	$campos=$select->fetchAll();
		$camposs = new Usuarios('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
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
		$select=$db->query("SELECT * FROM usuarios WHERE id_usuario='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Usuarios('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function ListaEquipos(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' order by nombre_equipo");
		$camposs=$select->fetchAll();
		$campos = new Usuarios('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function ListaUsuariosCond(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM usuarios WHERE estado_usuario='1' and rol_id_rol='4' or rol_id_rol='16' order by nombre_usuario");
    	$campos=$select->fetchAll();
		$camposs = new Usuarios('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function ListaUsuariosCondVolqueta(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM usuarios WHERE estado_usuario='1' and rol_id_rol='4' order by nombre_usuario");
    	$campos=$select->fetchAll();
		$camposs = new Usuarios('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function ListaUsuariosCondmula(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM usuarios WHERE estado_usuario='1' and rol_id_rol='16' order by nombre_usuario");
    	$campos=$select->fetchAll();
		$camposs = new Usuarios('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function ListaUsuariosSofia(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM usuarios WHERE estado_usuario='1' order by nombre_usuario");
    	$campos=$select->fetchAll();
		$camposs = new Usuarios('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function ListaUsuariosOperadores(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM usuarios WHERE estado_usuario='1' order by nombre_usuario");
    	$campos=$select->fetchAll();
		$camposs = new Usuarios('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function ListaUsuariosAdmin(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM usuarios WHERE estado_usuario='1' order by nombre_usuario");
    	$campos=$select->fetchAll();
		$camposs = new Usuarios('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerMenupor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM menu WHERE id_usuario='".$id."'");
		$camposs=$select->fetchAll();
		$campos = new Usuarios('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function desactivarmenuPor($id,$menu){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE menu SET ".$menu."='No' WHERE id_usuario='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA  DESACTIVAR PERMISO POR ID  **
***************************************************************/
public static function activarmenuPor($id,$menu){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE menu SET ".$menu."='Si' WHERE id_usuario='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA ACTIVAR TODO POR USUARIO  **
***************************************************************/
public static function activartodo($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE menu SET m_clientes='Si',m_productos='Si',m_insumos='Si',m_proveedores='Si',m_carpetas='Si',m_usuarios='Si',m_funcionarios='Si',m_documentos='Si',m_rubros='Si',m_subrubro='Si',m_destinos='Si',m_proyectos='Si',m_estaciones='Si',m_empleados='Si',m_gdocempleados='Si',m_novedades='Si',m_cuentas='Si',m_gdoccuentas='Si',m_cajas='Si',m_consolidadocajas='Si',m_equipos='Si',m_gdocequipos='Si',m_campamentos='Si',m_mantenimientos='Si',m_ventas='Si',m_ventasalquiler='Si',m_cuentasxpagar='Si',m_compras='Si',m_comprainsumos='Si',m_despachos='Si',m_combustible='Si',m_horas='Si',m_horasmq='Si',m_informe1='Si',m_concreto='Si',m_categoriains='Si',m_cargos='Si',m_crucecuentas='Si',m_egresoscajacontador='Si',m_ingresoscajacontador='Si',m_cotizaciones='Si',m_rq='Si',m_rqentrada='Si',m_rqsalida='Si',m_entradasinv='Si',m_entradasdetalleinv='Si',m_salidasinv='Si',m_salidasdetalleinv='Si',m_inventario='Si', m_cuentasxpagarusuario='Si' WHERE id_usuario='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA ACTIVAR TODO POR USUARIO  **
***************************************************************/
public static function desactivartodo($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE menu SET m_clientes='No',m_productos='No',m_insumos='No',m_proveedores='No',m_carpetas='No',m_funcionarios='No',m_documentos='No',m_rubros='No',m_subrubro='No',m_destinos='No',m_proyectos='No',m_estaciones='No',m_empleados='No',m_gdocempleados='No',m_novedades='No',m_cuentas='No',m_gdoccuentas='No',m_cajas='No',m_consolidadocajas='No',m_equipos='No',m_gdocequipos='No',m_campamentos='No',m_mantenimientos='No',m_ventas='No',m_ventasalquiler='No',m_cuentasxpagar='No',m_compras='No',m_comprainsumos='No',m_despachos='No',m_combustible='No',m_horas='No',m_horasmq='No',m_informe1='No',m_concreto='No',m_categoriains='No',m_cargos='No',m_crucecuentas='No',m_egresoscajacontador='No',m_ingresoscajacontador='No',m_cotizaciones='No',m_rq='No',m_rqentrada='No',m_rqsalida='No',m_entradasinv='No',m_entradasdetalleinv='No',m_salidasinv='No',m_salidasdetalleinv='No',m_inventario='No',m_cuentasxpagarusuario='No' WHERE id_usuario='".$id."'");
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
public static function eliminarPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE usuarios SET estado_usuario='0' WHERE id_usuario='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL ROL **
********************************************************/
public static function obtenerNombreRol($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_rol FROM roles WHERE id_rol='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Usuarios('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre_rol'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL USUARIO **
********************************************************/
public static function obtenerNombreUsuario($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT nombre_usuario FROM usuarios WHERE id_usuario='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Usuarios('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['nombre_usuario'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL USUARIO **
********************************************************/
public static function obtenerRolUsuario($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT rol_id_rol FROM usuarios WHERE id_usuario='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Usuarios('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['rol_id_rol'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL USUARIO **
********************************************************/
public static function obtenerImagenPerfil($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT imagen FROM usuarios WHERE id_usuario='".$id."'");
    	$camposs=$select->fetchAll();
    	$campos = new Usuarios('',$camposs);
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
** FUNCION PARA OBTENER LA LISTA DE CLIENTES	  **
********************************************************/
public static function obtenerRQusuarios(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT DISTINCT(usuario_creador) as usuariorq, nombre_usuario FROM requisiciones as A,usuarios as B WHERE B.id_usuario=A.usuario_creador order by nombre_usuario");
    	$campos=$select->fetchAll();
		$camposs = new Usuarios('',$campos);
		$campostraidos = $camposs->getCampos();
		return $campostraidos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/********************************************************************
*** FUNCION PARA MODIFICAR ****
********************************************************************/
public static function actualizar($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE usuarios SET
								imagen=:imagen,
								nombre_usuario=:nombre_usuario,
								telefono=:telefono,
								documento=:documento,
								rol_id_rol=:rol_id_rol
								WHERE id_usuario=:id_usuario');

		$update->bindValue('imagen',$imagen);
		$update->bindValue('nombre_usuario',$nombre_usuario);
		$update->bindValue('telefono',$telefono);
		$update->bindValue('documento',$documento);
		$update->bindValue('rol_id_rol',$rol_id_rol);
		$update->bindValue('id_usuario',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR **
id_usuario, imagen, nombre_usuario, telefono, email, celular, documento, rol_id_rol, username, pass, estado_usuario
***************************************************************/
/***************************************************************
*** FUNCION PARA GUARDAR **
id_usuario, imagen, nombre_usuario, telefono, email, celular, documento, rol_id_rol, username, pass, estado_usuario
***************************************************************/
public static function guardar($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO usuarios VALUES (NULL,:imagen, :nombre_usuario, :telefono, :email,:celular,:documento, :rol_id_rol,:username,:pass,:estado_usuario,:cod_cliente,:cod_proveedor)');
		$pass=md5($documento);
		$pordefecto=0	;

		$foto='images/usuarios/32958default.jpg';

		$insert->bindValue('imagen',utf8_decode($foto));
		$insert->bindValue('nombre_usuario',utf8_decode($nombre_usuario));
		$insert->bindValue('telefono',utf8_decode($telefono));
		$insert->bindValue('email',utf8_decode($email));
		$insert->bindValue('celular',utf8_decode($telefono));
		$insert->bindValue('documento',utf8_decode($documento));
		$insert->bindValue('rol_id_rol',utf8_decode($rol_id_rol));
		$insert->bindValue('username',utf8_decode($email));
		$insert->bindValue('pass',$pass);
		$insert->bindValue('estado_usuario',utf8_decode($estado_usuario));
		$insert->bindValue('cod_proveedor',utf8_decode($pordefecto));
		$insert->bindValue('cod_cliente',utf8_decode($pordefecto));
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR EL ULTIMO USUARIO CREADO **
********************************************************/
public static function obtenerUltimo(){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT id_usuario FROM usuarios ORDER BY id_usuario DESC LIMIT 1");
    	$camposs=$select->fetchAll();
    	$campos = new Usuarios('',$camposs);
    	$rubros = $campos->getCampos();
		foreach($rubros as $nrubro){
			$elrubro = $nrubro['id_usuario'];
		}
		return $elrubro;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR PERFIL DIFERENTE A VENDEDOR***
***************************************************************/
public static function perfilsuper($rol_id_rol,$ultimoid,$Si){
	try {
		$db=Db::getConnect();
	
	$select=$db->query("INSERT INTO menu (id_rol,id_usuario, m_clientes, m_productos, m_insumos, m_proveedores, m_carpetas, m_usuarios, m_funcionarios, m_documentos, m_rubros, m_subrubro, m_destinos, m_proyectos, m_estaciones, m_empleados, m_gdocempleados, m_novedades, m_cuentas, m_gdoccuentas, m_cajas, m_consolidadocajas, m_equipos, m_gdocequipos, m_campamentos, m_mantenimientos, m_ventas, m_ventasalquiler, m_cuentasxpagar, m_compras, m_comprainsumos, m_despachos, m_combustible, m_horas, m_horasmq, m_informe1, m_concreto, m_categoriains, m_cargos, m_crucecuentas, m_egresoscajacontador, m_ingresoscajacontador, m_cotizaciones, m_rq, m_rqentrada, m_rqsalida, m_entradasinv, m_entradasdetalleinv, m_salidasinv, m_salidasdetalleinv, m_inventario,m_cuentasxpagarusuario) VALUES ('".utf8_decode($rol_id_rol)."',
		'".utf8_decode($ultimoid)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."',
		'".utf8_decode($Si)."')");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR INGRESO EN CAJA***
***************************************************************/
public static function otroperfil($rol_id_rol,$ultimoid,$No){
	try {
		$db=Db::getConnect();
	
	$select=$db->query("INSERT INTO menu (id_rol,id_usuario, m_clientes, m_productos, m_insumos, m_proveedores, m_carpetas, m_usuarios, m_funcionarios, m_documentos, m_rubros, m_subrubro, m_destinos, m_proyectos, m_estaciones, m_empleados, m_gdocempleados, m_novedades, m_cuentas, m_gdoccuentas, m_cajas, m_consolidadocajas, m_equipos, m_gdocequipos, m_campamentos, m_mantenimientos, m_ventas, m_ventasalquiler, m_cuentasxpagar, m_compras, m_comprainsumos, m_despachos, m_combustible, m_horas, m_horasmq, m_informe1,m_concreto,m_categoriains) VALUES ('".utf8_decode($rol_id_rol)."',
		'".utf8_decode($ultimoid)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."')");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR INGRESO EN CAJA***
***************************************************************/
public static function perfilequipos($rol_id_rol,$ultimoid,$No){
	try {
		$db=Db::getConnect();
	
	$general='Si';
	$select=$db->query("INSERT INTO menu (id_rol,id_usuario, m_clientes, m_productos, m_insumos, m_proveedores, m_carpetas, m_usuarios, m_funcionarios, m_documentos, m_rubros, m_subrubro, m_destinos, m_proyectos, m_estaciones, m_empleados, m_gdocempleados, m_novedades, m_cuentas, m_gdoccuentas, m_cajas, m_consolidadocajas, m_equipos, m_gdocequipos, m_campamentos, m_mantenimientos, m_ventas, m_ventasalquiler, m_cuentasxpagar, m_compras, m_comprainsumos, m_despachos, m_combustible, m_horas, m_horasmq, m_informe1) VALUES ('".utf8_decode($rol_id_rol)."',
		'".utf8_decode($ultimoid)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."',
		'".utf8_decode($No)."')");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA	  **
********************************************************/
public static function mostrarnotificaciones($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT * FROM modulo_alertas WHERE usuario_receptor='".$id."' and estado_alerta='0' order by id asc");
    	$camposs=$select->fetchAll();
    	$campos = new Usuarios('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function notificacionleida($id,$marcadapor){
	try {
		$db=Db::getConnect();

		date_default_timezone_set("America/Bogota");
		$TiempoActual = date('Y-m-d H:i:s');
		$diactual = date('Y-m-d');
		$estadonotificacion=1;

		$select=$db->query("UPDATE modulo_alertas SET estado_alerta='1', fecha_leida='".$diactual."',marca_leida='".$TiempoActual."' WHERE usuario_receptor='".$marcadapor."' and id='".$id."'");
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
