<?php
class UsuarioController {
	function __construct() {}

	function index() {
		require_once 'vistas/usuario/listado.php';
	}
	function registrar() { //cuando hacemos click en crear usuario ACCION = registrar
		require_once 'vistas/usuario/crearusuario.php';
	}

	function guardar() { //Cuando presionamos el boton de guardar
		$estado_usuario=1;
		$img_perfil='';
		$empresa='';
		if (empty($_POST['nombres']) or empty($_POST['apellidos']) or empty($_POST['documento']) or empty($_POST['user_name']) or empty($_POST['pass'])){
			$msg = 2; //VARIABLE PASADA A CREAR USUARIO, PARA COMPROBAR SI HUBO ERROR AL ENVIAR LOS DATOS
			$this->mensaje($msg);
		} else{
			$msg = 1;	
			$usuario = new Usuario(null,$_POST['nombres'],$_POST['apellidos'],$_POST['documento'],$_POST['user_name'],$_POST['pass'],$empresa,$img_perfil,$_POST['rol_id_rol'],$estado_usuario);
			Usuario::guardar($usuario);
			$this->mensaje($msg);
		}

		//$this->show();	//VA A LA FUNCION QUE SE ENCUENTRA MAS ABAJO, PARA MOSTRAR LOS USUARIOS			
	}
	function mensaje($mensajes) {
		$msg = $mensajes;
		require_once 'vistas/usuario/crearusuario.php';
	}
	
	function show(){
		$listaUsuario=Usuario::mostrartodos();
		require_once 'vistas/usuario/listado.php';
	}
}
?>
  
