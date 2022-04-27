<?php
class GestiondocumentalprovController {
	function __construct() {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function todos() {
		$id = $_GET['id_modulo'];
		$campos=gestiondocumentalprov::obtenerPagina($id);
		require_once 'vistas/gestiondocumentalprov/todos.php';
	}

	function varios() {
		$id = $_GET['id_cuenta'];
		$campos=gestiondocumentalprov::obtenerPaginavarios($id);;
		require_once 'vistas/gestiondocumentalprov/varios.php';
	}

	function cargartodos() {
		$id_modulo = $_GET['id_modulo'];
		$id_cuenta = $_GET['id'];
		$res=gestiondocumentalprov::cargarTodos($id_modulo,$id_cuenta);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han actualizado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos=gestiondocumentalprov::obtenerConfig($id_modulo);;
		require_once 'vistas/gestiondocumentalprov/configuracion.php';

	}


	function configuracion() {
		$id = $_GET['id_modulo'];
		$campos=gestiondocumentalprov::obtenerConfig($id);;
		require_once 'vistas/gestiondocumentalprov/configuracion.php';
	}

	function listaequipos() {
		$campos=gestiondocumentalprov::obtenerListaequipos();;
		require_once 'vistas/gestiondocumentalprov/lista.php';
	}

/*************************************************************/
/* FUNCION PARA AGREGAR NUEVO LLAMADO DESDE ROUTING.PHP */
/*************************************************************/
	function nuevo() {
		require_once 'vistas/gestiondocumentalprov/nuevo.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editar() {
		$idreg = $_GET['idreg'];
		$id_cuenta = $_GET['id'];
		$campos = gestiondocumentalprov::obtenerPaginaPor($idreg);
		require_once 'vistas/gestiondocumentalprov/editar.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR VARIOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editarvarios() {
		$id = $_GET['id'];
		$id_cuenta = $_GET['id_cuenta'];
		$campos = gestiondocumentalprov::obtenerPaginavariosPor($id);
		require_once 'vistas/gestiondocumentalprov/editarvarios.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminar() {
		$id = $_GET['iddel'];
		$id_modulo = $_GET['id_modulo'];
		$id_cuenta = $_GET['id'];
		$res = gestiondocumentalprov::eliminarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = gestiondocumentalprov::obtenerPagina($id_modulo);
		require_once 'vistas/gestiondocumentalprov/todos.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function activar() {
		$id = $_GET['iddel'];
		$id_modulo = $_GET['id_modulo'];
		$id_cuenta = $_GET['id'];
		$res = gestiondocumentalprov::eliminarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han actualizado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han actualizado correctamente los datos\", \"error\");});</script>";
		}
		$campos = gestiondocumentalprov::obtenerPagina($id_modulo);
		require_once 'vistas/gestiondocumentalprov/todos.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR VARIOS  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarvarios() {
		$id = $_GET['id'];
		$id_cuenta = $_GET['id_cuenta'];
		$res = gestiondocumentalprov::eliminarvariosPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = gestiondocumentalprov::obtenerPaginavarios($id_cuenta);
		require_once 'vistas/gestiondocumentalprov/varios.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function desactivarDocumento() {
		$id_modulo = $_GET['id_modulo'];
		$id_cuenta = $_GET['id'];
		$id_documento= $_GET['id_documento'];
		$imagen= $_GET['imagen'];
		$res = gestiondocumentalprov::desactivarDocumento($id_cuenta,$id_modulo,$id_documento,$imagen);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han actualizado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han actualizado correctamente los datos\", \"error\");});</script>";
		}
		$campos = gestiondocumentalprov::obtenerPagina($id_modulo);
		require_once 'vistas/gestiondocumentalprov/todos.php';
	}



/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardar() {

	$ruta_imagen=$this->subir_fichero('images/documentosprov','imagen');
	//$nuevo['imagen']=$ruta_imagen;
	$id_modulo=$_GET['id_modulo'];
	$id_cuenta=$_GET['id'];
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
	$campo = new gestiondocumentalprov('',$nuevoarreglo);
	$res = gestiondocumentalprov::guardar($campo,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->show($id_modulo);
}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO VARIOS */
/*************************************************************/
function guardarvarios() {

	$ruta_imagen=$this->subir_fichero('images/documentosprov','imagen');
	//$nuevo['imagen']=$ruta_imagen;
	$id_cuenta=$_GET['id_cuenta'];
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
	$campo = new gestiondocumentalprov('',$nuevoarreglo);
	$res = gestiondocumentalprov::guardarvarios($campo,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showvarios($id_cuenta);
}





/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizar(){
	if (empty($_FILES['imagen']['name'])){
		$ruta_imagen = $_POST['ruta1'];
	} else {
		$ruta_imagen=$this->subir_fichero('images/documentosprov','imagen');
	}
	$id = $_GET['idreg'];
	$id_cuenta = $_GET['id'];
	$id_modulo = $_GET['id_modulo'];
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
	$datosguardar = new gestiondocumentalprov($id,$nuevoarreglo);
	$res = gestiondocumentalprov::actualizar($id,$datosguardar,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
	}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
		}
	$this->show($id_cuenta);
}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizarvarios(){
	if (empty($_FILES['imagen']['name'])){
		$ruta_imagen = $_POST['ruta1'];
	} else {
		$ruta_imagen=$this->subir_fichero('images/documentosprov','imagen');
	}
	$id = $_GET['id'];
	$id_cuenta = $_GET['id_cuenta'];
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
	$datosguardar = new gestiondocumentalprov($id,$nuevoarreglo);
	$res = gestiondocumentalprov::actualizarvarios($id,$datosguardar,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
	}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
		}
	$this->showvarios($id_cuenta);
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function show(){
		$id_modulo = $_GET['id_modulo'];
		$campos=gestiondocumentalprov::obtenerPagina($id_modulo);
		require_once 'vistas/gestiondocumentalprov/todos.php';
	}

	function showvarios(){
		$id_cuenta = $_GET['id_cuenta'];
		$campos=gestiondocumentalprov::obtenerPaginavarios($id_cuenta);
		require_once 'vistas/gestiondocumentalprov/varios.php';
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
