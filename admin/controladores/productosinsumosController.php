<?php
include_once "modelos/productos.php";
include_once "modelos/insumos.php";

class ProductosinsumosController {
	function __construct() {}


	function todos($getprod_id=null) {
		(isset($_GET['id'])) ? $get_id=$_GET['id'] :$get_id='';
		if ($getprod_id!=""){
			$get_id = $getprod_id;
		}

		$campos=Productosinsumos::obtenerPagina($get_id);
		$camposProducto=Productos::obtenerPaginaPor($get_id);		

		require_once 'vistas/productosinsumos/todos.php';
	}

	function nuevo() {
		(isset($_GET['id'])) ? $get_id=$_GET['id'] :$get_id='';
		$insumos=Insumos::obtenerListaInsumos();		
		$productos=Productos::obtenerPagina()->getCampos();		
		require_once 'vistas/productosinsumos/nuevo.php';
	}

	function guardar() {

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
		$campo = new Productosinsumos('',$nuevoarreglo);
		$res = Productosinsumos::guardar($campo);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
		}else{
			echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
		}
		$this->todos($res);
	}

	function eliminar() {
		$idEliminar = $_GET['eid'];
		$id = $_GET['id'];
		$res = Productosinsumos::eliminarPor($idEliminar, $id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Productosinsumos::obtenerPagina($id);
		$camposProducto=Productos::obtenerPaginaPor($id);		
		require_once 'vistas/productosinsumos/todos.php';
	}


}
