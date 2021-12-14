<?php

/**
 * @author Teksystem SAS
 * @copyright 2018
 */

/**
* CLASE PARA TRABAJAR CON USUARIOS DEL SISTEMA
*/
class Usuario
{
	private $id_usuario;
	private $nombres;
	private $apellidos;
	private $documento;
	private $user_name;
	private $pass;
	private $empresa;
	private $img_perfil;
	private $rol_id_rol;
	private $estado_usuario;

	function __construct($id_usuario,$nombres,$apellidos,$documento,$user_name,$pass,$empresa,$img_perfil,$rol_id_rol,$estado_usuario)
	{
		$this->setId($id_usuario);
		$this->setNombres($nombres);
		$this->setApellidos($apellidos);
		$this->setDocumento($documento);
		$this->setUsername($user_name);
		$this->setPass($pass);
		$this->setEmpresa($empresa);
		$this->setImagen($img_perfil);
		$this->setRol($rol_id_rol);
		$this->setEstadoUsuario($estado_usuario);
	}

	/************************************************************************************
	** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA t_usuarios       ***
	/***********************************************************************************/

	//ESTABLECER Y OBTENER ID USUARIO
	public function getId(){
		return $this->id_usuario; //id_usuario = nombre del campo de la tabla t_usuarios
	}
	public function setId($id_usuario){
		$this->id_usuario = $id_usuario;
	}
	//ESTABLECER Y OBTENER NOMBRES DE USUARIO
	public function getNombres(){
		return $this->nombres;
	}
	public function setNombres($nombres){
		$this->nombres = $nombres;
	}
	//ESTABLECER Y OBTENER APELLIDOS DE USUARIO
	public function getApellidos(){
		return $this->apellidos;
	}
	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}
	//ESTABLECER Y OBTENER EL NRO DE DOCUMENTO DEL USUARIO
	public function getDocumento(){
		return $this->documento;
	}
	public function setDocumento($documento){
		$this->documento = $documento;
	}
	//ESTABLECER Y OBTENER EL USERNAME DEL USUARIO
	public function getUsername(){
		return $this->user_name;
	}
	public function setUsername($user_name){
		$this->user_name = $user_name;
	}
	//ESTABLECER Y OBTENER EL PASSWORD DEL USUARIO
	public function getPass(){
		return $this->pass;
	}
	public function setPass($pass){
		$this->pass = $pass;
	}
	//ESTABLECER Y OBTENER EL NOMBRE DE LA EMPRESA DEL USUARIO
	public function getEmpresa(){
		return $this->empresa;
	}
	public function setEmpresa($empresa){
		$this->empresa = $empresa;
	}
	//ESTABLECER Y OBTENER LA IMAGEN PERFIL DEL USUARIO
	public function getImagen(){
		return $this->img_perfil;
	}
	public function setImagen($img_perfil){
		$this->img_perfil = $img_perfil;
	}
	//ESTABLECER Y OBTENER EL ROL PERFIL DEL USUARIO
	public function getRol(){
		return $this->rol_id_rol;
	}
	public function setRol($rol_id_rol){
		$this->rol_id_rol = $rol_id_rol;
	}
	//ESTABLECER Y OBTENER EL ESTADO DEL USUARIO (ACTIVO, DESACTIVADO)
	public function getEstadoUsuario(){
		return $this->estado_usuario;
	}
	public function setEstadoUsuario($estado_usuario){
		$this->estado_usuario = $estado_usuario;
	}
/*******************************************************
*** FUNCION PARA GUARDAR INFORMACIÓN				****
********************************************************/
public static function guardar($usuarios){
	try {
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO t_usuarios VALUES (NULL,:nombres,:apellidos,:documento,:user_name,:pass,:empresa,:img_perfil,:rol_id_rol,:estado_usuario)');

		$pasword_encriptado = hash('sha256', $usuarios->getPass()); //Password Encriptado
		$insert->bindValue('nombres',$usuarios->getNombres());
		$insert->bindValue('apellidos',$usuarios->getApellidos());
        $insert->bindValue('documento',$usuarios->getDocumento());
        $insert->bindValue('user_name',$usuarios->getUsername());
        $insert->bindValue('pass',$pasword_encriptado);
        $insert->bindValue('empresa',$usuarios->getEmpresa());
        $insert->bindValue('img_perfil',$usuarios->getImagen());
        $insert->bindValue('rol_id_rol',$usuarios->getRol());
        $insert->bindValue('estado_usuario',$usuarios->getEstadoUsuario());
		$insert->execute();
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
*** FUNCION PARA MOSTRAR TODOS LOS USUARIOS			****
********************************************************/
public static function mostrartodos(){
	try {		
		$db=Db::getConnect();
		$listaUsuarios=[];

		$select=$db->query('SELECT * FROM t_usuarios');

		foreach($select->fetchAll() as $usuario){
			$listaUsuarios[]=new Usuario($usuario['id_usuario'],$usuario['nombres'],$usuario['apellidos'],
            $usuario['documento'],$usuario['user_name'],$usuario['pass'],$usuario['empresa']
            ,$usuario['img_perfil'],$usuario['rol_id_rol'],$usuario['estado_usuario']);
		}
		return $listaUsuarios;
	}
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}	
}
/*******************************************************
*** FUNCION PARA BUSCAR POR ID LOS USUARIOS			****
********************************************************/
public static function bucarPorId($id_usuario){
	try {
    	$db=Db::getConnect();
    	$select=$db->prepare('SELECT * FROM t_usuarios WHERE id_usuario=:id_usuario');
    	$select->bindValue('id_usuario',$id_usuario);
    	$select->execute();
    	$usuario=$select->fetch();
    	$usuarios = new Usuario($usuario['id_usuario'],$usuario['nombres'],$usuario['apellidos'],
            $usuario['documento'],$usuario['user_name'],$usuario['pass'],$usuario['empresa']
            ,$usuario['img_perfil'],$usuario['rol_id_rol'],$usuario['estado_usuario']);
    	return $usuarios;
	}
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
*** FUNCION PARA ACTUALIZAR DATOS DEL USUARIO		****
********************************************************/
public static function actualizar($usuario){
	try {
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE t_usuarios SET 
                                nombres=:nombres, 
                                apellidos=:apellidos, 
                                documento=:documento,
                                user_name=:user_name,
                                pass=:pass,
                                empresa=:empresa,
                                img_perfil=:img_perfil,
                                rol_id_rol=:rol_id_rol,
                                estado_usuario=:estado_usuario 
                                WHERE id_usuario=:id_usuario');
		$update->bindValue('nombres',$usuarios->getNombres());
		$update->bindValue('apellidos',$usuarios->getApellidos());
        $update->bindValue('documento',$usuarios->getDocumento());
        $update->bindValue('user_name',$usuarios->getUsername());
        $update->bindValue('pass',$pasword_encriptado);
        $update->bindValue('empresa',$usuarios->getEmpresa());
        $update->bindValue('img_perfil',$usuarios->getImagen());
        $update->bindValue('rol_id_rol',$usuarios->getRol());
        $update->bindValue('estado_usuario',$usuarios->getEstado());
		$update->bindValue('id_usuario',$usuario->getId());
		$update->execute();
	}
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
*** FUNCION PARA ELIMINAR UN USUARIO    			****
********************************************************/
public static function eliminar($id){
    try {
	    $db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM alumno WHERE id_usuario=:id');
		$delete->bindValue('id_usuario',$id);
		$delete->execute();
	}
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}    
}

/*******************************************************
*** FUNCION PARA CONSULTAR CLAVE 	  	 			****
********************************************************/
public function userLogin($username,$password){
	try{
		$db=Db::getConnect();
		$pass= hash('sha256', $password); //Password encryption 
		$stmt = $db->prepare("SELECT id_usuario FROM t_usuarios WHERE (user_name=:user_name) AND pass=:pass"); 
		$stmt->bindParam("user_name", $username,PDO::PARAM_STR) ;
		$stmt->bindParam("pass", $pass,PDO::PARAM_STR) ;
		$stmt->execute();
		$count=$stmt->rowCount();
		$data=$stmt->fetch(PDO::FETCH_OBJ);
		$db = null;
	    if($count){
    		$_SESSION['id_user']=$data->id_usuario; // Guardar el id del usuario en una sessión
	       	return true;
        } else {
		  return false;
	    } 
	}
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}
/*******************************************************
*** FUNCION PARA MOSTRAR TODOS LOS ROLES DE USUARIOS ***
********************************************************/
public static function obtenerroles(){
	try {		
		$db=Db::getConnect();
		$listaroles=[];

		$select=$db->query('SELECT * FROM t_roles');

		foreach($select->fetchAll() as $rol){
			$listaroles[]=new Usuario($rol['id'],$rol['nombre_rol']);
		}
		return $listaroles;
	}
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}	
}
} //FIN DE LA CLASE
?>
