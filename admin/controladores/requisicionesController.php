<?php
class RequisicionesController {
	function __construct() {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function todos() {

		$campos=Requisiciones::todos();;
		require_once 'vistas/requisiciones/todos.php';
	}

/*=============================================
=  Section para visualizar todas las Req           =
=============================================*/
	
	function todosalmacen() {
		$cargo=$_GET['cargo'];
		$campos=Requisiciones::todosalmacen();;
		require_once 'vistas/requisiciones/todos.php';
	}

 /*=============================================
 =  Vista de Requisiciones User Logueado         =
 =============================================*/
 
 function todosmiusuario() {
		$id=$_GET['id'];
		$campos=Requisiciones::todosporusuario($id);;
		require_once 'vistas/requisiciones/todos-solicitante.php';
	}
 
# =========================================================
# =  Vista de requisiciones po Usuario           =
# =========================================================
 
	function todosporusuario() {
		$id=$_GET['idconsulta'];
		$campos=Requisiciones::todosporusuario($id);;
		require_once 'vistas/requisiciones/todos.php';
	}

# =============================================
# =           Consulta por Estado - Almacen       =
# =============================================

	function reqalmacenestado() {
		$cargo=$_GET['cargo'];
		$estadosolicitado=$_GET['estadosolicitado'];
		$campos=Requisiciones::reqalmacenestado($estadosolicitado);;
		require_once 'vistas/requisiciones/todos.php';
	}


# =============================================
# =           Consulta por Estado - Almacen       =
# =============================================

	function reqparaentrega() {
		$cargo=$_GET['cargo'];
		$estadosolicitado=$_GET['estadosolicitado'];
		$campos=Requisiciones::reqalmacenestado($estadosolicitado);;
		require_once 'vistas/requisiciones/rqparaentrega.php';
	}

	# ================================================================
	# =           Consulta por usuario y por estado de Req           =
	# ================================================================
	
	function todosporusuarioestado() {
		$id=$_GET['id'];
		$estadosolicitado=$_GET['estadosolicitado'];
		$campos=Requisiciones::todosporusuarioestado($id,$estadosolicitado);;
		require_once 'vistas/requisiciones/todos-solicitante.php';
	}

	# =================================================
	# =          Consulta por Cotizaciones           =
	# =================================================
	
	function vercotizacion() {
		$id=$_GET['id'];
		$campos=Requisiciones::vercotizacion($id);;
		require_once 'vistas/requisiciones/cotizaciones.php';
	}
	
	function cotizaciones() {
		$campos=Requisiciones::cotizaciones();;
		require_once 'vistas/requisiciones/cotizaciones.php';
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
		$campos=Requisiciones::todos();;
		require_once 'vistas/requisiciones/todos.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function porfechadirector() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Requisiciones::todos();;
		require_once 'vistas/almacen/homedirector.php';
	}


/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function porfechasolicitante() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Requisiciones::todos();;
		require_once 'vistas/almacen/homesolicitante.php';
	}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardar() {
	
	$variable = $_POST;
	$usuario_creador=$_POST['usuario_creador'];
	$proyecto_id_proyecto=$_POST['proyecto_id_proyecto'];
	$tipo_requisicion=$_POST['tipo_requisicion'];
	
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
		if ($campo=="texto"){
			$nuevoarreglo[$campo]=$valor;  //OJO AL TEXTO DEL SLIDER ACEPTA ETIQUETAS PHP
		}else{
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
	}
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Requisiciones('',$nuevoarreglo);
	$res = Requisiciones::guardar($campo);

	$ultimoid=Requisiciones::obtenerUltimo();

	$nomusuario=Usuarios::obtenerNombreUsuario($usuario_creador);
	$nomproyecto=Requisiciones::nomproyecto($proyecto_id_proyecto);

	//$mensajesms="El usuario ".$nomusuario." ha solicitado la requisicion RQ".$ultimoid." en App Luz, Proyecto:".$nomproyecto." Solicitud:".$tipo_requisicion." ";
	//include('../admin/include/httpPHPAltiria.php');
	//include('../admin/include/conexionsms.php');

		//$sDestination = "573166976701,573022643864";
		//$response = $altiriaSMS->sendSMS($sDestination,$mensajesms);


	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\").then(function(){window.location='?controller=requisicionesitems&&action=todosporreq&&id=".$ultimoid."';});});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showsiguiente($ultimoid);
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminar() {
		$id = $_GET['id'];
		$res = Requisiciones::eliminarpor($id);
		$res = Requisiciones::eliminaritemsRQpor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Requisiciones::todos();
		require_once 'vistas/almacen/homesolicitante.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminaritemcot() {
		$id = $_GET['id'];
			$iddeleteitem = $_GET['iddeleteitem'];
		$res = Requisiciones::eliminaritemcot($iddeleteitem);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Requisiciones::vercotizacion($id);
		require_once 'vistas/requisiciones/cotizaciones.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editar() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Requisiciones::editarrequisicionesPor($id);
		require_once 'vistas/requisiciones/formeditar.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizar(){
	$id = $_GET['id'];
	$estado_id_requisicion = $_POST['estado_id_requisicion'];
	if (empty($_FILES['imagen']['name'])){
		$ruta_imagen = $_POST['ruta1'];
	} else {
		$ruta_imagen=$this->subir_fichero('images/requisiciones','imagen');
	}
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);

	foreach ($variable as $campo => $valor){
		if ($campo=="texto"){
			$nuevoarreglo[$campo]=$valor;  //OJO AL TEXTO DEL SLIDER ACEPTA ETIQUETAS PHP
		}else{
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
	}

	$res = Requisiciones::actualizaritems($id,$estado_id_requisicion);

	$datosguardar = new Requisiciones($id,$nuevoarreglo);
	$res = Requisiciones::actualizar($id,$datosguardar,$ruta_imagen);
	

	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}
	$this->showrequisiciones();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
function showrequisiciones(){
	$campos=Requisiciones::todos();
	require_once 'vistas/requisiciones/todos.php';
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
function showsiguiente($id){

		$campos=Requisiciones::todosporreq($id);
	require_once 'vistas/requisicionesitems/todosporreq.php';
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
