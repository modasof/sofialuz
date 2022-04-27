<?php
class UsuariosController {
	function __construct() {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function todos() {
		$campos=Usuarios::obtenerPagina();;
		require_once 'vistas/usuarios/todos.php';
	}

   function notificaciones() {
		$id = $_GET['id_usuario'];
		$campos=Usuarios::obtenerPaginanotificaciones($id);;
		require_once 'vistas/usuarios/notificaciones.php';
	}

/*************************************************************/
/* FUNCION PARA AGREGAR NUEVO LLAMADO DESDE ROUTING.PHP */
/*************************************************************/
	function nuevo() {
		require_once 'vistas/usuarios/nuevo.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editar() {
		$id = $_GET['id'];
		$campos = Usuarios::obtenerPaginaPor($id);
		require_once 'vistas/usuarios/editar.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function activartodo() {
		$id = $_GET['id'];
		$campos = Usuarios::activartodo($id);
		if ($campos){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
		$this->showpermisos($id);
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function notificacionleida() {
		$id = $_GET['id'];
		$marcadopor = $_GET['marcadopor'];
		$campos = Usuarios::notificacionleida($id,$marcadopor);
		require_once 'vistas/index/contenido.php';
	}



/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function desactivartodo() {
		$id = $_GET['id'];
		$campos = Usuarios::desactivartodo($id);
		if ($campos){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
		$this->showpermisos($id);
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR EL PERFIL DEL MENU ROUTING.PHP*/
/*************************************************************/
	function editarpermisos() {
		$id = $_GET['id'];
		$campos = Usuarios::obtenerMenuPor($id);
		require_once 'vistas/usuarios/editarpermisos.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function desactivarmenuPor() {
		$id = $_GET['id'];
		$menu = $_GET['menu'];
		$res = Usuarios::desactivarmenuPor($id,$menu);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Usuarios::obtenerMenuPor($id);
		require_once 'vistas/usuarios/editarpermisos.php';
	}


/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function activarmenuPor() {
		$id = $_GET['id'];
		$menu = $_GET['menu'];
		$res = Usuarios::activarmenuPor($id,$menu);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Usuarios::obtenerMenuPor($id);
		require_once 'vistas/usuarios/editarpermisos.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminar() {
		$id = $_GET['id'];
		$res = Usuarios::eliminarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Usuarios::obtenerPagina();
		require_once 'vistas/usuarios/todos.php';
	}



/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardar() {

	$ruta_imagen=$this->subir_fichero('images/usuarios','imagen');
	//$nuevo['imagen']=$ruta_imagen;

	$variable = $_POST;

	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
		//ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
		$campo = strip_tags(trim($campo));
		$campo  = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

		$valor = strip_tags(trim($valor));
		$valor  = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
		if ($campo=="imagen2"){
			$nuevoarreglo[$campo]=$ruta_imagen;
		}else{
			$nuevoarreglo[$campo]=$valor;
		}
	}
	$campo = new Usuarios('',$nuevoarreglo);
	$res = Usuarios::guardar($campo,$ruta_imagen);

	$ultimoid=Usuarios::obtenerUltimo();

	$Si="Si";
	$No="No";

	
	if ($rol_id_rol==1) {
		$res = Usuarios::perfilsuper($rol_id_rol,$ultimoid,$Si);
	}
	elseif ($rol_id_rol==2){
		$res = Usuarios::perfilequipos($rol_id_rol,$ultimoid,$No);
	}
	else{
		$res = Usuarios::otroperfil($rol_id_rol,$ultimoid,$No);
	}

	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->show();
}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizar(){
	if (empty($_FILES['imagen']['name'])){
		$ruta_imagen = $_POST['ruta1'];
	} else {
		$ruta_imagen=$this->subir_fichero('images/usuarios','imagen');
	}
	$id = $_GET['id'];
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
		//ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
		$campo = strip_tags(trim($campo));
		$campo  = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

		$valor = strip_tags(trim($valor));
		$valor  = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
		if ($campo=="imagen"){
			$nuevoarreglo[$campo]=$ruta_imagen;
		}else{
			$nuevoarreglo[$campo]=$valor;
		}

	}
	$datosguardar = new Usuarios($id,$nuevoarreglo);
	$res = Usuarios::actualizar($id,$datosguardar,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
	}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
		}
	$this->show();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function show(){
		$campos=Usuarios::obtenerPagina();
		require_once 'vistas/usuarios/todos.php';
	}

	function showpermisos($id){
		$campos = Usuarios::obtenerMenuPor($id);
		require_once 'vistas/usuarios/editarpermisos.php';
	}

/*************************************************************/
/* FUNCION PARA SUBIR UN ARCHIVO  */
/*************************************************************/

	function subir_fichero($directorio_destino, $nombre_fichero)
	{
		$tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
		//si hemos enviado un directorio que existe realmente y hemos subido el archivo
		if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
		{
			$img_file = $_FILES[$nombre_fichero]['name'];
			$Aleaotorio=rand(0,99999);
			$img_file=$Aleaotorio.$img_file;
			$img_type = $_FILES[$nombre_fichero]['type'];
			// Si se trata de una imagen
			if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||strpos($img_type, "jpg")) || strpos($img_type, "png")))
			{
				//¿Tenemos permisos para subir la imágen?
				if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
				{
					$retornar = $directorio_destino . '/' . $img_file; //RETORNAMOS EL NOMBRE Y RUTA DEL FICHERO
					return $retornar;
				}
			} else {
				if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
				{
					$retornar = $directorio_destino . '/' . $img_file; //RETORNAMOS EL NOMBRE Y RUTA DEL FICHERO
					return $retornar;
				}
			}
		}
		//Si llegamos hasta aquí es que algo ha fallado
		$vacio ='';
		return $vacio;
	}
 }
