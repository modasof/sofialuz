<?php
include_once "modelos/unidadmedida.php";

class InsumosController
{
    public function __construct()
    {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

    public function todos()
    {
        $campos = Insumos::obtenerPagina();
        require_once 'vistas/insumos/todos.php';
    }

/*************************************************************/
/* FUNCION PARA AGREGAR NUEVO LLAMADO DESDE ROUTING.PHP */
/*************************************************************/
    public function nuevo()
    {
        $unidadmedidas = Unidadmedida::obtenerPagina()->getCampos();
        require_once 'vistas/insumos/nuevo.php';
    }

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function editar()
    {
        $id            = $_GET['id'];
        $campos        = Insumos::obtenerPaginaPor($id);
        $unidadmedidas = Unidadmedida::obtenerPagina()->getCampos();
        require_once 'vistas/insumos/editar.php';
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function eliminar()
    {
        $id  = $_GET['id'];
        $res = Insumos::eliminarPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Insumos::obtenerPagina();
        require_once 'vistas/insumos/todos.php';
    }

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
    public function guardar()
    {

        $creado_por           = $_POST['creado_por'];
        $categoriainsumo_id   = $_POST['categoriainsumo_id'];
        $nombre_insumo        = (isset($_POST["nombre_insumo"])) ? strip_tags(trim($_POST["nombre_insumo"])) : false;
        $unidadmedida_id      = $_POST['unidadmedida_id'];
        $inventario           = $_POST['inventario'];
        $proyecto_id_proyecto = $_POST['proyecto_id_proyecto'];
        $cantidad             = $_POST['cantidad'];
        $estado_insumo        = $_POST['estado_insumo'];
        $observaciones        = $_POST['observaciones'];
        $parametrizado        = "No";
        $cantidadminima       = 0;

        // Guardamos el insumo
        $res = Insumos::guardar($nombre_insumo, $estado_insumo, $unidadmedida_id, $categoriainsumo_id, $parametrizado, $cantidadminima);

        if ($res) {

            // Validamos si ya cuenta con inventario
            if ($inventario == "Si") {
                // Se verificar el último id creado en insumos
                $ultimoid = Insumos::obtenerUltimo();
                date_default_timezone_set("America/Bogota");
                $TiempoActual = date('Y-m-d H:i:s');
                $FechaActual  = date('y-m-d');
                $tipoentrada  = "Entrada Inicial";
                $soporte_num  = 0;
                // Guardado de inventario inicial

                $res = Insumos::guardarinventarioIn($FechaActual, $ultimoid, $proyecto_id_proyecto, $categoriainsumo_id, $cantidad, $TiempoActual, $creado_por, $observaciones, $tipoentrada, $soporte_num);
            }
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Erro al actualizar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }
        $this->show();
    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function actualizar()
    {
        $id = $_GET['id'];

        $categoriainsumo_id = $_POST['categoriainsumo_id'];
        $parametrizado      = $_POST['parametrizado'];
        $cantidadminima     = $_POST['cantidadminima'];
        $nombre_insumo      = (isset($_POST["nombre_insumo"])) ? strip_tags(trim($_POST["nombre_insumo"])) : false;
        $unidadmedida_id    = $_POST['unidadmedida_id'];

        $res = Insumos::actualizar($id, $categoriainsumo_id, $nombre_insumo, $unidadmedida_id, $parametrizado, $cantidadminima);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }
        $this->show();
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
    public function show()
    {
        $campos = Insumos::obtenerPagina();
        require_once 'vistas/insumos/todos.php';
    }
}
