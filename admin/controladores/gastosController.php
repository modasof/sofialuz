<?php
class GastosController {
	function __construct() {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	
	function egresos() { 
		$id_caja = $_GET['id_caja'];
		$campos=Gastos::obtenerPagina($id_caja);
		require_once 'vistas/gastos/todos.php';
	}

	function totalegresos() { 
		
		$campos=Gastos::obtenertotalPagina();
		require_once 'vistas/gastos/todosall.php';
	}

	function totalegresoslegal() { 

		$campos=Gastos::obtenertotalPaginaLegalizados();
		require_once 'vistas/gastos/todoslegalizados.php';
	}

	/*************************************************************/
/* FUNCION PARA MOSTRAR EL LISTADO DE ID A CAMBIAR DE ESTADO*/
/*************************************************************/

    public function cambiarestado()
    {

        (isset($_GET['id'])) ? $getid = $_GET['id'] : $getid = '';

        (isset($_GET['des'])) ? $getdespacho = $_GET['des'] : $getdespacho = '';

        require_once 'vistas/gastos/gestionestados.php';
    }


	/*************************************************************/
/* FUNCION PARA GUARDAR ESTADOS */
/*************************************************************/
    public function actualizarestado()
    {

     	$id_caja         = $_GET['id'];
        $estado_item     = $_POST['estado_item'];
        $items           = $_POST['items'];
       

        $res = Gastos::actualizarestado($estado_item, $items);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al guardar !\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }
        $this->showcajas();
    }
	


	function ingresos() { 
		$id_caja = $_GET['id_caja'];
		$campos=Gastos::obtenerPaginain($id_caja);
		require_once 'vistas/gastos/todosing.php';
	}

	/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function porfecha() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
	$campos=Gastos::obtenertotalPagina();
		require_once 'vistas/gastos/todosall.php';
}

function porfechalegal() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
	$campos=Gastos::obtenertotalPaginaLegalizados();
		require_once 'vistas/gastos/todoslegalizados.php';
}
 

/*************************************************************/
/* FUNCION PARA AGREGAR NUEVO LLAMADO DESDE ROUTING.PHP */
/*************************************************************/
	function nuevo() {
		require_once 'vistas/gastos/nuevo.php';
	}
 
/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editar() {
		$id = $_GET['id'];
		$campos = Gastos::obtenerPaginaPor($id);
		require_once 'vistas/gastos/editar1.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminar() {
		$id = $_GET['id'];
		$id_caja = $_GET['id_caja'];
		$res = Gastos::eliminarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Gastos::obtenerPagina($id_caja);
		require_once 'vistas/gastos/todos.php';
	}


	/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminargastopor() {
		$id = $_GET['id'];
		$id_caja = $_GET['id_caja'];
		$res = Gastos::eliminarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		
		require_once 'vistas/index/reportemicajamenor.php';
	}




/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarcajasistema() {
		$id_cuenta = $_GET['id_caja'];
		$idegreso=$_GET['idegreso'];
		$idingreso=$_GET['idingreso'];
		
		$res = Gastos::eliminaregresocajasistema($idegreso);
		$res = Gastos::eliminaringresocajasistema($idingreso);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Gastos::obtenerPagina($id_cuenta);
		require_once 'vistas/gastos/todos.php';
	}


/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarcajasistemapor() {
		$id_cuenta = $_GET['id_caja'];
		$idegreso=$_GET['idegreso'];
		$idingreso=$_GET['idingreso'];
		
		$res = Gastos::eliminaregresocajasistema($idegreso);
		$res = Gastos::eliminaringresocajasistema($idingreso);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		require_once 'vistas/index/reportemicajamenor.php';
	}


/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardar() {
$caja_id_caja=$_POST['caja_id_caja'];
	$ruta_imagen=$this->subir_fichero('images/egresoscaja','imagen');
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
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Gastos('',$nuevoarreglo);
	$res = Gastos::guardar($campo,$ruta_imagen);

	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	
	if ($tipo_beneficiario=="Caja Sistema") {
		$ruta_imagen=$this->subir_fichero2('images/ingresoscaja','imagen');
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
	
	// Verificar último Egreso de la caja 
	$ultimoIdEgreso=Gastos::ultimoIdEgresocaja();

	//array_push($nuevoarreglo,$nuevo);
	$campo = new Gastos('',$nuevoarreglo);
	$res = Gastos::guardaringreso($campo,$ruta_imagen,$ultimoIdEgreso);


	// Verificar última ruta de Egreso en caja


		if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Errores al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}

	}
	
	$this->showcajas();

}
 
/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizarex(){
	if (empty($_FILES['imagen']['name'])){
		$ruta_imagen = $_POST['ruta1'];
	} else {
		$ruta_imagen=$this->subir_fichero('images/egresoscaja','imagen');	
	}
	$id = $_GET['id'];
	$id_caja = $_GET['id_caja'];
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
	$datosguardar = new Gastos($id,$nuevoarreglo);
	$res = Gastos::actualizarex($id,$datosguardar,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente el egreso en caja\", \"success\");});</script>";
	}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
		}
	$this->show($id_caja);
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function show(){
		$id_caja = $_GET['id_caja'];
		$campos=Gastos::obtenerPagina($id_caja);
		require_once 'vistas/gastos/todos.php';
	}  

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function showcajas(){
		$campos=Gastos::obtenerPagina2();
		require_once 'vistas/cajas/todos.php';
	}  


/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function showvercaja(){
		$id_caja=$_GET['id'];
		$campos=Gastos::obtenerPagina($id_caja);
		require_once 'vistas/index/reportemicajamenor.php';
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

	function subir_fichero2($directorio_destino, $nombre_fichero)
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
