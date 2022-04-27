<?php
class reportesproduccionController {
	function __construct() {}


/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function reportesproduccion() {
		$campos=Reportesproduccion::Reportesproduccion();;
		require_once 'vistas/produccion/reportesproduccion.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function reportesporfechaproduccion() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportesproduccion::Reportesproduccion();;
		require_once 'vistas/produccion/reportesproduccion.php';
	}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarreporteproduccion() {

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
			$nuevoarreglo[$campo]=$valor;
		}
	}
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Reportesproduccion('',$nuevoarreglo);
	$res = Reportesproduccion::guardarreporteproduccion($campo);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showreportesproduccion();
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarreporteproduccion() {
		$id = $_GET['id'];
		$res = Reportesproduccion::eliminarreporteproduccion($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportesproduccion::Reportesproduccion();
		require_once 'vistas/produccion/reportesproduccion.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editarreporteproduccion() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Reportesproduccion::editarreporteproduccionPor($id);
		require_once 'vistas/produccion/formeditarreporteproduccion.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizarreporteproduccion(){
	$id = $_GET['id'];
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
			$nuevoarreglo[$campo]=$valor;
		}
	}

	$datosguardar = new Reportesproduccion($id,$nuevoarreglo);
	$res = Reportesproduccion::actualizarreporteproduccion($id,$datosguardar);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}
	$this->showreportesproduccion();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
function showreportesproduccion(){
	$campos=Reportesproduccion::Reportesproduccion();
	require_once 'vistas/produccion/reportesproduccion.php';
}

 }
