<?php
class VehiculosController{
    function __construct(){}

	function crearnuevo(){
		require_once('vistas/vehiculos/crearnuevo.php');
	}

	function crearusado(){
		require_once('vistas/vehiculos/crearusado.php');
	}

	function crearoferta(){
		require_once('vistas/vehiculos/crearoferta.php');
	}

	function error(){
		require_once('vistas/index/contenido.php');
	}


/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS POR TIPO DE VEHICULO LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function todos() {
		$campos=Vehiculos::obtenerPagina();
		require_once 'vistas/vehiculos/todos.php';
	}


	function nuevos() {
		$campos=Vehiculos::obtenerPagina('Nuevo');
		require_once 'vistas/vehiculos/allnuevos.php';
	}
	function usados() {
		$campos=Vehiculos::obtenerPagina('Usado');
		require_once 'vistas/vehiculos/allusados.php';
	}

	function ofertas() {
		$campos=Vehiculos::obtenerPagina('Oferta');
		require_once 'vistas/vehiculos/allofertas.php';
	}



/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editar() {
		$id = $_GET['id'];
		$campos = Vehiculos::obtenerPaginaPor($id);
		require_once 'vistas/vehiculos/editar.php';
	}

	function oferta() {
		$id = $_GET['id'];
		$campos = Vehiculos::obtenerPaginaPor($id);
		require_once 'vistas/vehiculos/oferta.php';
	}

	function editarusado() {
		$id = $_GET['id'];
		$campos = Vehiculos::obtenerPaginaPor($id);
		require_once 'vistas/vehiculos/editarusado.php';
	}
	function editaroferta() {
		$id = $_GET['id'];
		$campos = Vehiculos::obtenerPaginaofertaPor($id);
		require_once 'vistas/vehiculos/editaroferta.php';
	}


/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminar() {
		$id = $_GET['id'];
		$tipoeliminar = $_GET['tipoeliminar'];
		$res = Vehiculos::eliminarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}

		if ($tipoeliminar=='Nuevo') {
			$campos = Vehiculos::obtenerPagina($tipoeliminar);
			require_once 'vistas/vehiculos/allnuevos.php';
		}
		elseif ($tipoeliminar=='Usado') {
			$campos = Vehiculos::obtenerPagina($tipoeliminar);
			require_once 'vistas/vehiculos/allusados.php';
		}
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminaroferta() {
		$id = $_GET['id'];
		$tipoeliminar = $_GET['tipoeliminar'];
		$res = Vehiculos::eliminarofertaPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}

		if ($tipoeliminar=='Oferta') {
			$campos = Vehiculos::obtenerPagina($tipoeliminar);
			require_once 'vistas/vehiculos/allofertas.php';
		}
	}

/*************************************************************/
/* FUNCION PARA PUBLICAR EN EL HOME  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function publicar() {
		$id = $_GET['id'];
		$tipopublicar = $_GET['tipopublicar'];

		$res = Vehiculos::publicarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se ha publicado en el home\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al publicar!\", \"No se han publicado correctamente los datos\", \"error\");});</script>";
		}
		if ($tipopublicar=='Nuevo') {
			$campos = Vehiculos::obtenerPagina($tipopublicar);
			require_once 'vistas/vehiculos/allnuevos.php';
		}
		elseif ($tipopublicar=='Usado') {
			$campos = Vehiculos::obtenerPagina($tipopublicar);
			require_once 'vistas/vehiculos/allusados.php';
		}
		elseif ($tipopublicar=='Oferta') {
			$campos = Vehiculos::obtenerPagina($tipopublicar);
			require_once 'vistas/vehiculos/allofertas.php';
		}
	}

/*************************************************************/
/* FUNCION PARA PUBLICAR EN EL HOME  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function despublicar() {
		$id = $_GET['id'];
		$tipodespublicar = $_GET['tipodespublicar'];
		$res = Vehiculos::despublicarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se ha despublicado en el home\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al publicar!\", \"No se han despublicado correctamente los datos\", \"error\");});</script>";
		}
		
		if ($tipodespublicar=='Nuevo') {
			$campos = Vehiculos::obtenerPagina($tipodespublicar);
			require_once 'vistas/vehiculos/allnuevos.php';
		}
		elseif ($tipodespublicar=='Usado') {
			$campos = Vehiculos::obtenerPagina($tipodespublicar);
			require_once 'vistas/vehiculos/allusados.php';
		}
		elseif ($tipodespublicar=='Oferta') {
			$campos = Vehiculos::obtenerPagina($tipodespublicar);
			require_once 'vistas/vehiculos/allofertas.php';
		}
	}


/*************************************************************/
/* FUNCION PARA GUARDAR  REGISTRO */
/*************************************************************/
function guardar() {
//	var_dump($_FILES);
	$tipoguardar=$_GET['tipoguardar'];
	if (isset($_FILES)){
		$cantidad= count($_FILES);
		$id_marca = $_POST['id_marca'];
		$id_modelo = $_POST['id_modelo'];
		$ruta = '../pagina/images/vehiculos/'.$id_marca."-".$id_modelo;
		$imagen_principal = $this->subir_fichero($ruta,'imagen_principal');
		$img_frontal = $this->subir_fichero($ruta,'img_frontal');
		$img_posterior = $this->subir_fichero($ruta,'img_posterior');
		$img_lateral_izq = $this->subir_fichero($ruta,'img_lateral_izq');
		$img_lateral_der = $this->subir_fichero($ruta,'img_lateral_der');
		$img_maleta = $this->subir_fichero($ruta,'img_maleta');
		$img_interna = $this->subir_fichero($ruta,'img_interna');
		$img_motor = $this->subir_fichero($ruta,'img_motor');
		$img_interior_2 = $this->subir_fichero($ruta,'img_interior_2');
		$img_ofertas = $this->subir_fichero($ruta,'img_ofertas');
		$archivos = array($imagen_principal,$img_frontal=$img_frontal,$img_posterior,$img_lateral_izq,$img_lateral_der,$img_maleta,$img_interna,$img_motor,$img_interior_2,$img_ofertas);
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

	$campo = new Vehiculos('',$nuevoarreglo);
	$res = Vehiculos::guardar($campo,$imagen_principal,$img_frontal,$img_posterior,$img_lateral_izq,$img_lateral_der,$img_maleta,$img_interna,$img_motor,$img_interior_2,$img_ofertas);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	if ($tipoguardar=='Usado') {
		$this->showusado();
	}
	elseif ($tipoguardar=='Nuevo') {
		$this->shownuevo();
	}
	elseif ($tipoguardar=='Oferta') {
		$this->showoferta();
	}
}


/*************************************************************/
/* FUNCION PARA GUARDAR  OFERTA NUEVO REGISTRO */
/*************************************************************/
function guardaroferta() {
//	var_dump($_FILES);
	$tipoguardar=$_GET['tipoguardar'];
	if (isset($_FILES)){
		$cantidad= count($_FILES);
		$id_marca = $_POST['id_marca'];
		$id_modelo = $_POST['id_modelo'];
		$ruta = '../pagina/images/vehiculos/ofertas/'.$id_marca."-".$id_modelo;
		$imagen_principal = $this->subir_fichero($ruta,'imagen_principal');

		$archivos = array($imagen_principal=$imagen_principal);
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

	$campo = new Vehiculos('',$nuevoarreglo);
	$res = Vehiculos::guardaroferta($campo,$imagen_principal);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	if ($tipoguardar=='Usado') {
		$this->showusado();
	}
	elseif ($tipoguardar=='Nuevo') {
		$this->shownuevo();
	}
	elseif ($tipoguardar=='Oferta') {
		$this->showoferta();
	}
}


/*************************************************************/
/* FUNCION PARA ACTUALIZAR NUEVO REGISTRO */
/*************************************************************/
function actualizar() {
//	var_dump($_FILES);
		$id = $_GET['id'];
		$tipoedicion=$_GET['tipoedicion'];
		$id_marca = $_POST['id_marca'];
		$id_modelo = $_POST['id_modelo'];
		$ruta = '../pagina/images/vehiculos/'.$id_marca."-".$id_modelo;

		if (empty($_FILES['imagen_principal']['name'])){
			$imagen_principal = $_POST['imagen_principal2'];
		} else {
			$imagen_principal = $this->subir_fichero($ruta,'imagen_principal');
		}

		if (empty($_FILES['img_frontal']['name'])){
			$img_frontal = $_POST['img_frontal2'];
		} else {
			$img_frontal = $this->subir_fichero($ruta,'img_frontal');
		}

		if (empty($_FILES['img_posterior']['name'])){
			$img_posterior = $_POST['img_posterior2'];
		} else {
			$img_posterior = $this->subir_fichero($ruta,'img_posterior');
		}
		if (empty($_FILES['img_lateral_izq']['name'])){
			$img_lateral_izq = $_POST['img_lateral_izq2'];
		} else {
			$img_lateral_izq = $this->subir_fichero($ruta,'img_lateral_izq');
		}
		if (empty($_FILES['img_lateral_der']['name'])){
			$img_lateral_der = $_POST['img_lateral_der2'];
		} else {
			$img_lateral_der = $this->subir_fichero($ruta,'img_lateral_der');
		}
		if (empty($_FILES['img_maleta']['name'])){
			$img_maleta = $_POST['img_maleta2'];
		} else {
			$img_maleta = $this->subir_fichero($ruta,'img_maleta');
		}
		if (empty($_FILES['img_interna']['name'])){
			$img_interna = $_POST['img_interna2'];
		} else {
			$img_interna = $this->subir_fichero($ruta,'img_interna');
		}
		if (empty($_FILES['img_motor']['name'])){
			$img_motor = $_POST['img_motor2'];
		} else {
			$img_motor = $this->subir_fichero($ruta,'img_motor');
		}
		if (empty($_FILES['img_interior_2']['name'])){
			$img_interior_2 = $_POST['img_interior_22'];
		} else {
			$img_interior_2 = $this->subir_fichero($ruta,'img_interior_2');
		}
		if (empty($_FILES['img_ofertas']['name'])){
			$img_ofertas = $_POST['img_ofertas2'];
		} else {
			$img_ofertas = $this->subir_fichero($ruta,'img_ofertas');
		}
		$archivos = array($imagen_principal,$img_frontal=$img_frontal,$img_posterior,$img_lateral_izq,$img_lateral_der,$img_maleta,$img_interna,$img_motor,$img_interior_2,$img_ofertas);

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

	$campo = new Vehiculos('',$nuevoarreglo);
	$res = Vehiculos::actualizar($id,$campo,$imagen_principal,$img_frontal,$img_posterior,$img_lateral_izq,$img_lateral_der,$img_maleta,$img_interna,$img_motor,$img_interior_2,$img_ofertas);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al actualizar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}

	if ($tipoedicion=='Usado') {
		$this->showusado();
	}
	elseif ($tipoedicion=='Nuevo') {
		$this->shownuevo();
	}
	elseif ($tipoedicion=='Oferta') {
		$this->showoferta();
	}

	
}


/*************************************************************/
/* FUNCION PARA ACTUALIZAR NUEVO REGISTRO */
/*************************************************************/
function actualizaroferta() {
//	var_dump($_FILES);
		$id = $_GET['id'];
		$tipoedicion=$_GET['tipoedicion'];
		$id_marca = $_POST['id_marca'];
		$id_modelo = $_POST['id_modelo'];
		$ruta = '../pagina/images/vehiculos/ofertas/'.$id_marca."-".$id_modelo;

		if (empty($_FILES['imagen_principal']['name'])){
			$imagen_principal = $_POST['imagen_principal2'];
		} else {
			$imagen_principal = $this->subir_fichero($ruta,'imagen_principal');
		}

		
		$archivos = array($imagen_principal=$imagen_principal);

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

	$campo = new Vehiculos('',$nuevoarreglo);
	$res = Vehiculos::actualizaroferta($id,$campo,$imagen_principal);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al actualizar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}

	if ($tipoedicion=='Usado') {
		$this->showusado();
	}
	elseif ($tipoedicion=='Nuevo') {
		$this->shownuevo();
	}
	elseif ($tipoedicion=='Oferta') {
		$this->showoferta();
	}

	
}


/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function show(){
		$campos=Vehiculos::obtenerPagina();
		require_once 'vistas/vehiculos/todos.php';
	}

	function shownuevo(){
		$campos=Vehiculos::obtenerPagina('Nuevo');
		require_once 'vistas/vehiculos/allnuevos.php';
	}
	function showusado(){
		$campos=Vehiculos::obtenerPagina('Usado');
		require_once 'vistas/vehiculos/allusados.php';
	}
	function showoferta(){
		$campos=Vehiculos::obtenerPagina('Oferta');
		require_once 'vistas/vehiculos/allofertas.php';
	}


/*************************************************************/
/* FUNCION PARA SUBIR UN ARCHIVO  */
/*************************************************************/

	function subir_fichero($directorio_destino, $nombre_fichero)
	{

		if (!file_exists($directorio_destino)) {
			mkdir($directorio_destino, 0777, true);
		}

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
 ?>
