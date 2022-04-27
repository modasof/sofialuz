<?php
include_once "modelos/insumos.php";
include_once "modelos/campamento.php";

class InsumoscampamentoController {
	function __construct() {}


	function todos() {
		$campos=Insumoscampamento::obtenerPagina();
		require_once 'vistas/insumoscampamento/todos.php';
	}

	function nuevo() {
		$insumos=Insumos::obtenerListaInsumos();
		$listamovimientos=Insumoscampamento::obtenerListaTipoMovimiento();
		$campamentos=Campamento::obtenerPagina()->getCampos();		
		require_once 'vistas/insumoscampamento/nuevo.php';
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
		$campo = new Insumoscampamento('',$nuevoarreglo);
		$res = Insumoscampamento::guardar($campo);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
		}else{
			echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
		}
		$this->todos();
	}

	/*



	

	function editar() {
		$id = $_GET['id'];
		$campos = Insumos::obtenerPaginaPor($id);
		require_once 'vistas/insumos/editar.php';
	}


	function eliminar() {
		$id = $_GET['id'];
		$res = Insumos::eliminarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Insumos::obtenerPagina();
		require_once 'vistas/insumos/todos.php';
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
