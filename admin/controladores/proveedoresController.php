<?php
class ProveedoresController {
	function __construct() {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function todos() {
		$campos=Proveedores::obtenerPagina();;
		require_once 'vistas/proveedores/todos.php';
	}


/*************************************************************/
/* FUNCION PARA MOSTRAR EL LISTADO DE ID A CAMBIAR DE ESTADO*/
/*************************************************************/

    public function listadoproveedorespago()
    {

        (isset($_GET['id'])) ? $getid = $_GET['id'] : $getid = '';

        (isset($_GET['des'])) ? $getdespacho = $_GET['des'] : $getdespacho = '';

        require_once 'vistas/proveedores/proyeccionpagos.php';
    }

      /*************************************************************/
/* FUNCION PARA GUARDADO PAGO TEMPORAL */
/*************************************************************/
    public function proyecciontemporal()
    {
        $id = $_GET['id'];
        (isset($_GET['des'])) ? $getdespacho = $_GET['des'] : $getdespacho = '';

        /*=============================================================
        =            Guardado de la proyección temporal             =
        =============================================================*/
        $itemunico      = $_POST['itemunico'];
        $marca_temporal = $_POST['marca_temporal'];
        $creado_por     = $_POST['creado_por'];
        $valorpago      = $_POST['valorpago'];
        $valor_deuda    = $_POST['valor_deuda'];
        $estado_pago    = $_POST['estado_pago'];
        $fecha_registro = $_POST['fecha_registro'];

        $res = Proveedores::proyecciontemporal($itemunico, $valorpago, $valor_deuda, $fecha_registro, $estado_pago, $creado_por, $marca_temporal);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->listadoproveedorespago();

    }

   /*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function deleteproyecciontemporal()
    {
        $id       = $_GET['id'];
        $items    = $_GET['des'];
        $iddelete = $_GET['iddelete'];

        $res = Proveedores::eliminarproyecciontem($iddelete);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $this->listadoproveedorespago();
    }

    /*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function actualizarrelacionpagos()
    {
        $id = $_GET['id'];
/*=============================================================
=            Actualización de datos Proyección de Pagos 
// (`id`, `fecha_reporte`, `marca_temporal`, `creado_por`, `recurso_destinado`)          =
=============================================================*/
        $marca_temporal = $_POST['marca_temporal'];
        $creado_por     = $_POST['creado_por'];
        $fecha_reporte     = $_POST['fecha_reporte'];
        $valor_total       = $_POST['valor_total'];
        $ordenes           = $_POST['proveedores'];
        $estado     = "1";

        $res=Proveedores::guardarrelacionpagos($fecha_reporte,$marca_temporal,$creado_por,$valor_total);
        $ultimarelacion = Proveedores::obtenerUltimarelacion($fecha_reporte,$creado_por);

        $items   = explode(",", $ordenes);
        foreach ($items as $key => $proveedorid) {
            $res = Proveedores::actualizarpagoproyectado($proveedorid, $fecha_reporte, $estado, $ultimarelacion);
        }

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->showrelacionpagos();
    }




	function cxpproveedor() {
		$campos=Proveedores::obtenerPagina();;
		require_once 'vistas/proveedores/cxp_proveedor.php';
	}

/*************************************************************/
/* FUNCION PARA AGREGAR NUEVO LLAMADO DESDE ROUTING.PHP */
/*************************************************************/
	function nuevo() {
		require_once 'vistas/proveedores/nuevo.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editar() {
		$id = $_GET['id'];
		$campos = Proveedores::obtenerPaginaPor($id);
		require_once 'vistas/proveedores/editar.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function estadocuenta() {
		$id = $_GET['id'];
		$campos = Proveedores::obtenerPaginaPor($id);
		require_once 'vistas/proveedores/estadocuentaproveedor.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminar() {
		$id = $_GET['id'];
		$res = Proveedores::eliminarPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Proveedores::obtenerPagina();
		require_once 'vistas/proveedores/todos.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarrelacion() {
		$id = $_GET['id'];
		$res = Proveedores::eliminarrelacionPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		 $this->showrelacionpagos();
	}





/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
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

$nit=$_POST['nit'];
	$validarduplicado=Proveedores::validacionpor($nit);

if ($validarduplicado>0) {

		echo "<script>jQuery(function(){Swal.fire(\"¡Error al guardar!\", \"No se han guardado los datos, el dato ".$nit." ya existe\", \"info\");});</script>";
}else{

	$campo = new Proveedores('',$nuevoarreglo);
	$res = Proveedores::guardar($campo);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
}
	$this->show();
}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizar(){

	$id = $_GET['id'];
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
	$datosguardar = new Proveedores($id,$nuevoarreglo);
	$res = Proveedores::actualizar($id,$datosguardar);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\");});</script>";
	}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
		}
	$this->show();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function show(){
		$campos=Proveedores::obtenerPagina();
		require_once 'vistas/proveedores/todos.php';
	}


/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function showrelacionpagos(){
		$campos=Proveedores::obtenerPaginapagos();
		require_once 'vistas/proveedores/totalrelacion.php';
	}

}
