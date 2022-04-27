<?php
class AccesoriosController {
	function __construct() {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	
	function todos() { 
		$campos=Accesorios::obtenerPagina();;
		require_once 'vistas/accesorios/todos.php';
	}
 
/*************************************************************/
/* FUNCION PARA AGREGAR NUEVO LLAMADO DESDE ROUTING.PHP */
/*************************************************************/
	function nuevo() {
		require_once 'vistas/accesorios/nuevo.php';
	}
 
/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editar() {
		$id = $_GET['id'];
		$campos = Accesorios::obtenerPaginaPor($id);
		require_once 'vistas/accesorios/editar.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminar() {
		$id = $_GET['id'];
		$res = Accesorios::eliminarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Accesorios::obtenerPagina();
		require_once 'vistas/accesorios/todos.php';
	}

/*************************************************************/
/* FUNCION PARA PUBLICAR EN EL HOME  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function publicar() {
		$id = $_GET['id'];
		$res = Accesorios::publicarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se ha publicado en el home\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al publicar!\", \"No se han publicado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Accesorios::obtenerPagina();
		require_once 'vistas/accesorios/todos.php';
		
	}

/*************************************************************/
/* FUNCION PARA PUBLICAR EN EL HOME  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function despublicar() {
		$id = $_GET['id'];
		
		$res = Accesorios::despublicarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se ha despublicado en el sitio\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al publicar!\", \"No se han despublicado correctamente los datos\", \"error\");});</script>";
		}
		
		$campos = Accesorios::obtenerPagina();
		require_once 'vistas/accesorios/todos.php';
	}



/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarAccesorio() {
//	var_dump($_FILES);
	if (isset($_FILES)){
		$cantidad= count($_FILES);
		$categoria_acc = $_POST['categoria_acc'];
		$ruta = '../pagina/images/accesorios/';
		$imagen_principal = $this->subir_fichero($ruta,'imagen_principal');
		$imagen1 = $this->subir_fichero($ruta,'imagen1');
		$imagen2 = $this->subir_fichero($ruta,'imagen2');
		$imagen3 = $this->subir_fichero($ruta,'imagen3');
		$imagen4 = $this->subir_fichero($ruta,'imagen4');
		$imagen5 = $this->subir_fichero($ruta,'imagen5');
		$imagen6 = $this->subir_fichero($ruta,'imagen6');
		$imagen7 = $this->subir_fichero($ruta,'imagen7');
		$imagen8 = $this->subir_fichero($ruta,'imagen8');
		$archivos = array($imagen_principal,$imagen1=$imagen1,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8);
	}
	$variable = $_POST;

	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
			if ($campo=="imagen2"){
				$nuevoarreglo[$campo]=$ruta_imagen;
			}else{
				$nuevoarreglo[$campo]=$valor;
			}
	}

	$campo = new Accesorios('',$nuevoarreglo);
	$res = Accesorios::guardarAccesorio($campo,$imagen_principal,$imagen1,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$campos = Accesorios::obtenerPagina();
			require_once 'vistas/accesorios/todos.php';
}

 
/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizarAccesorio() {
//	var_dump($_FILES);
		$id = $_GET['id'];
		$ruta = '../pagina/images/accesorios/';

		if (empty($_FILES['imagen_principal']['name'])){
			$imagen_principal = $_POST['imagen_principal2'];
		} else {
			$imagen_principal = $this->subir_fichero($ruta,'imagen_principal');
		}

		if (empty($_FILES['imagen1']['name'])){
			$imagen1 = $_POST['imagen1c'];
		} else {
			$imagen1 = $this->subir_fichero($ruta,'imagen1');
		}

		if (empty($_FILES['imagen2']['name'])){
			$imagen2 = $_POST['imagen2c'];
		} else {
			$imagen2 = $this->subir_fichero($ruta,'imagen2');
		}
		if (empty($_FILES['imagen3']['name'])){
			$imagen3 = $_POST['imagen3c'];
		} else {
			$imagen3 = $this->subir_fichero($ruta,'imagen3');
		}
		if (empty($_FILES['imagen4']['name'])){
			$imagen4 = $_POST['imagen4c'];
		} else {
			$imagen4 = $this->subir_fichero($ruta,'imagen4');
		}
		if (empty($_FILES['imagen5']['name'])){
			$imagen5 = $_POST['imagen5c'];
		} else {
			$imagen5 = $this->subir_fichero($ruta,'imagen5');
		}
		if (empty($_FILES['imagen6']['name'])){
			$imagen6 = $_POST['imagen6c'];
		} else {
			$imagen6 = $this->subir_fichero($ruta,'imagen6');
		}
		if (empty($_FILES['imagen7']['name'])){
			$imagen7 = $_POST['imagen7c'];
		} else {
			$imagen7 = $this->subir_fichero($ruta,'imagen7');
		}
		if (empty($_FILES['imagen8']['name'])){
			$imagen8 = $_POST['imagen8c'];
		} else {
			$imagen8 = $this->subir_fichero($ruta,'imagen8');
		}
		
		$archivos = array($imagen_principal,$imagen1=$imagen1,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8);

	$variable = $_POST;

	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
			if ($campo=="imagen2"){
				$nuevoarreglo[$campo]=$ruta_imagen;
			}else{
				$nuevoarreglo[$campo]=$valor;
			}
	}

	$campo = new Accesorios('',$nuevoarreglo);
	$res = Accesorios::actualizarAccesorio($id,$campo,$imagen_principal,$imagen1,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al actualizar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}

		$this->show();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function show(){
		$campos=Accesorios::obtenerPagina();
		require_once 'vistas/accesorios/todos.php';
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
