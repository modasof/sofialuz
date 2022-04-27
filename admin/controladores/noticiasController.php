<?php
class NoticiasController {
	function __construct() {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function todos() {
		$campos=Noticias::obtenerPagina();;
		require_once 'vistas/noticias/todos.php';
	}

/*************************************************************/
/* FUNCION PARA AGREGAR NUEVO LLAMADO DESDE ROUTING.PHP */
/*************************************************************/
	function nuevo() {
		require_once 'vistas/noticias/nuevo.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editar() {
		$id = $_GET['id'];
		$campos = Noticias::obtenerPaginaPor($id);
		require_once 'vistas/noticias/editar.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminar() {
		$id = $_GET['id'];
		$res = Noticias::eliminarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Noticias::obtenerPagina();
		require_once 'vistas/noticias/todos.php';
	}



/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardar() {

	$ruta_imagen1=$this->subir_fichero('../pagina/images/noticias','imagen1');
	$ruta_imagen2=$this->subir_fichero('../pagina/images/noticias','imagen2');
	$ruta_imagen3=$this->subir_fichero('../pagina/images/noticias','imagen3');


	$variable = $_POST;

	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
		$nuevoarreglo[$campo]=utf8_decode($valor);
	}
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Noticias('',$nuevoarreglo);
	$res = Noticias::guardar($campo,$ruta_imagen1,$ruta_imagen2,$ruta_imagen3);
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
	if (empty($_FILES['imagen1']['name'])){
		$ruta_imagen1 = $_POST['ruta1'];
	} else {
		$ruta_imagen1=$this->subir_fichero('../pagina/images/noticias','imagen1');
	}
	if (empty($_FILES['imagen2']['name'])){
		$ruta_imagen2 = $_POST['ruta2'];
	} else {
		$ruta_imagen2=$this->subir_fichero('../pagina/images/noticias','imagen2');
	}
	if (empty($_FILES['imagen3']['name'])){
		$ruta_imagen3 = $_POST['ruta3'];
	} else {
		$ruta_imagen3=$this->subir_fichero('../pagina/images/noticias','imagen3');
	}
	if (isset($ruta_imagen3)){
		$ruta_imagen3 ="";
	}
	if (isset($ruta_imagen2)){
		$ruta_imagen2 ="";
	}

	if (empty($ruta_imagen3)){
		$ruta_imagen3 ="";
	}
	if (empty($ruta_imagen2)){
		$ruta_imagen2 ="";
	}

	$id = $_GET['id'];
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
		$nuevoarreglo[$campo]=utf8_decode($valor);
	}
	$datosguardar = new Noticias($id,$nuevoarreglo);
	$res = Noticias::actualizar($id,$datosguardar,$ruta_imagen1,$ruta_imagen2,$ruta_imagen3);
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
		$campos=Noticias::obtenerPagina();
		require_once 'vistas/noticias/todos.php';
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
