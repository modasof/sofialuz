<?php
class SubrubrosController
{
    public function __construct()
    {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

    public function todos()
    {
        $campos = Subrubros::obtenerPagina();
        require_once 'vistas/subrubros/todos.php';
    }

/*************************************************************/
/* FUNCION PARA AGREGAR NUEVO LLAMADO DESDE ROUTING.PHP */
/*************************************************************/
    public function nuevo()
    {
        require_once 'vistas/subrubros/nuevo.php';
    }

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function editar()
    {
        $id     = $_GET['id'];
        $campos = Subrubros::obtenerPaginaPor($id);
        require_once 'vistas/subrubros/editar.php';
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function desactivarcxp()
    {
        $id  = $_GET['id'];
        $res = Subrubros::desactivarmenuPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Subrubros::obtenerPagina();
        require_once 'vistas/subrubros/todos.php';
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function activarcxp()
    {
        $id  = $_GET['id'];
        $res = Subrubros::activarmenuPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Subrubros::obtenerPagina();
        require_once 'vistas/subrubros/todos.php';
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function eliminar()
    {
        $id  = $_GET['id'];
        $res = Subrubros::eliminarPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Subrubros::obtenerPagina();
        require_once 'vistas/subrubros/todos.php';
    }

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
    public function guardar()
    {

        $variable = $_POST;

        $nuevoarreglo = array();
        extract($variable);
        foreach ($variable as $campo => $valor) {
            //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
            $campo = strip_tags(trim($campo));
            $campo = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

            $valor = strip_tags(trim($valor));
            $valor = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
            if ($campo == "imagen2") {
                $nuevoarreglo[$campo] = $ruta_imagen;
            } else {
                $nuevoarreglo[$campo] = $valor;
            }
        }

        $rubro_id_rubro   = $_POST['rubro_id_rubro'];
        $nombre_subrubro  = $_POST['nombre_subrubro'];
        
        $validarduplicado = Subrubros::validacionpor($nombre_subrubro,$rubro_id_rubro);

        if ($validarduplicado > 0) {

            echo "<script>jQuery(function(){Swal.fire(\"¡Error al guardar!\", \"No se han guardado los datos, el dato " . $nombre_subrubro . " ya existe\", \"info\");});</script>";
        } else {

            $campo = new Subrubros('', $nuevoarreglo);
            $res   = Subrubros::guardar($campo);
            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
            }
        }
        $this->show();
    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function actualizar()
    {
        $id    = $_GET['id'];
        $campo = $_POST['nombre_subrubro'];
        $rubro = $_POST['rubro_id_rubro'];
        $res   = SubRubros::actualizarNombre($campo, $rubro, $id);
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
        $campos = Subrubros::obtenerPagina();
        require_once 'vistas/subrubros/todos.php';
    }
}
