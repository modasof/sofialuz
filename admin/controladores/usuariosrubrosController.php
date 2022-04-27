<?php
class UsuariosrubrosController
{
    public function __construct()
    {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LOS EGRESOS DESDE ROUTING.PHP*/
/*************************************************************/

    public function todospor()
    {
        $id     = $_GET['id_usuario'];
        $campos = Usuariosrubros::obtenerPaginausuariosrubros($id);
        require_once 'vistas/usuariosrubros/todospor.php';
    }

    /*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function desactivarrubroPor()
    {
        $id   = $_GET['id_usuario'];
        $rubro = $_GET['rubro'];

        
        $res  = Usuariosrubros::desactivarrubroPor($id, $rubro);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
         $campos = Usuariosrubros::obtenerPaginausuariosrubros($id);
        require_once 'vistas/usuariosrubros/todospor.php';
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function activarrubroPor()
    {
        $id_usuario = $_GET['id_usuario'];
        $rubro      = $_GET['rubro'];
        $rol        = $_GET['rol'];

        $validacion = Usuariosrubros::verificarrubro($id_usuario, $rubro);

        if ($validacion == "0") {
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, $rubro);

            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
            }
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Verificar datos!\", \"El permiso ya está autorizado\", \"warning\");});</script>";
        }

        $campos = Usuariosrubros::obtenerPaginausuariosrubros($id_usuario);
        require_once 'vistas/usuariosrubros/todospor.php';
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function activartodo()
    {
        $id_usuario = $_GET['id_usuario'];
        $rol        = $_GET['rol'];

        $rubros = Usuariosrubros::obtenerListaRubros();
        foreach ($rubros as $campo) {
            $id_rubro = $campo['id_rubro'];

            $validacion = Usuariosrubros::verificarrubro($id_usuario, $id_rubro);

            if ($validacion == "0") {
                $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, $id_rubro);

                if ($res) {
                    echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
                } else {
                    echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
                }
            } else {
                // echo "<script>jQuery(function(){Swal.fire(\"¡Verificar datos!\", \"El permiso ya está autorizado\", \"warning\");});</script>";
            }

        }

        $campos = Usuariosrubros::obtenerPaginausuariosrubros($id_usuario);
        require_once 'vistas/usuariosrubros/todospor.php';
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function activarporRol()
    {
        $id_usuario = $_GET['id_usuario'];
        $rol        = $_GET['rol'];

        // Validamos por Rol
        if ($rol == 1) {
            // Rol Admin

            $rubros = Usuariosrubros::obtenerListaRubros();
            foreach ($rubros as $campo) {
                $id_rubro = $campo['id_rubro'];

                $validacion = Usuariosrubros::verificarrubro($id_usuario, $id_rubro);

                if ($validacion == "0") {
                    $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, $id_rubro);

                    if ($res) {
                        echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
                    } else {
                        echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
                    }
                } else {
                    // echo "<script>jQuery(function(){Swal.fire(\"¡Verificar datos!\", \"El permiso ya está autorizado\", \"warning\");});</script>";
                }

            }
        } elseif ($rol == 2) {
            // Rol Equipos

            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 1);
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 2);

            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
            }

        } elseif ($rol == 4) { // Rol Doble Troque
           
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 2);

            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
            }
        } elseif ($rol == 5) { // Rol Siso
           
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 3);

            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
            }

        } elseif ($rol == 8) { // Jefe de Planta
            
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 7);

            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
            }
        } elseif ($rol == 10) { // Operador Máquinaria
            
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 1);

            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
            }

        } elseif ($rol == 11) { // Asistente Administrativo y contable
           
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 4);
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 6);

            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
            }

        } elseif ($rol == 12) { // Asistente Contable
           
            
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 4);

            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
            }

        } elseif ($rol == 13) { // Almacen
            
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 1);
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 2);
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 3);
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 4);
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 5);

            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
            }

        } elseif ($rol == 14) { // Requisiciones
            
            $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 3);
           
            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
            }


        } elseif ($rol == 15) { // Director de Obra
            
             $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 3);
           
            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
            }

        } elseif ($rol == 16) { // Conductor Tractomula
           
             $res = Usuariosrubros::activarrubroPor($rol, $id_usuario, 2);
           
            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
            }

        } else {


        }

        $campos = Usuariosrubros::obtenerPaginausuariosrubros($id_usuario);
        require_once 'vistas/usuariosrubros/todospor.php';
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
    public function show()
    {
        $id_cliente = $_GET['id_cliente'];
        $campos     = Usuariosrubros::obtenerPaginarutas($id_cliente);
        require_once 'vistas/usuariosrubros/todosruta.php';
    }

}
