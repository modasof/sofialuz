<?php
include_once "modelos/reportes.php";


class VentasdespachosController {
	function __construct() {}


	function todos($idparametro=null) {

		if ($idparametro!=""){
			$getid = $idparametro;	
		}else{
			$getid = $_GET['id'];
		}
		
		$campos=Ventasdespachos::obtenerPagina($getid);
		require_once 'vistas/ventasdespachos/todos.php';
	}

	function nuevo() {
		
		(isset($_GET['id'])) ? $getid=$_GET['id'] :$getid='';
		(isset($_GET['des'])) ? $getdespacho=$_GET['des'] :$getdespacho='';

		$ventas=Reportes::ReporteVentasOrderId($getid)->getCampos();
		$despachos=Reportes::ReporteDespachosOrderId()->getCampos();		
		
		require_once 'vistas/ventasdespachos/nuevo.php';
	}

	function guardar() {

		$variable = $_POST;

		/*
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
		//$campo = new Ventasdespachos('',$nuevoarreglo);
		*/
		$res = Ventasdespachos::guardar($variable);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
		}else{
			echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
		}

		$this->todos($res);
		
	}

	function eliminar() {
		$id = $_GET['id'];
		$idfactura = $_GET['idfactura'];
		$res = Ventasdespachos::eliminarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}

		$this->todos($idfactura);
	}


	/*

	

	

	*/

	/*



	

	function editar() {
		$id = $_GET['id'];
		$campos = Insumos::obtenerPaginaPor($id);
		require_once 'vistas/insumos/editar.php';
	}


	


	


	function actualizar(){
		$id=$_GET['id'];
		$campo=$_POST['nombre_insumo'];
		$res = Insumos::actualizarNombre($campo,$id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
		}else{
			echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
		}
		$this->show();
	}


	function show(){
		$campos=Insumos::obtenerPagina();
		require_once 'vistas/insumos/todos.php';
	}

	*/
}
