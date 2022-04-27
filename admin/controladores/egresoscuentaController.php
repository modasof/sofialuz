<?php
class EgresoscuentaController
{
    public function __construct()
    {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LOS EGRESOS DESDE ROUTING.PHP*/
/*************************************************************/

    public function egresos()
    {
        $id_cuenta = $_GET['id_cuenta'];
        $campos    = Egresoscuenta::obtenerPagina($id_cuenta);
        require_once 'vistas/egresoscuenta/todos.php';
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LOS EGRESOS DESDE ROUTING.PHP*/
/*************************************************************/
    public function egresosporfecha()
    {

        $id_cuenta = $_GET['id_cuenta'];

        if (isset($_POST['daterange'])) {
            $fechaform = $_POST['daterange'];
        } elseif (isset($_GET['daterange'])) {
            $fechaform = $_GET['daterange'];
        }
        $campos = Egresoscuenta::obtenerPagina($id_cuenta);
        require_once 'vistas/egresoscuenta/todos.php';

    }
/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LOS EGRESOS DESDE ROUTING.PHP*/
/*************************************************************/

    public function ingresos()
    {
        $id_caja = $_GET['id_caja'];
        $campos  = Egresoscuenta::obtenerPaginain($id_caja);
        require_once 'vistas/egresoscuenta/todosing.php';
    }

/*************************************************************/
/* FUNCION PARA AGREGAR NUEVO LLAMADO DESDE ROUTING.PHP */
/*************************************************************/
    public function nuevo()
    {
        require_once 'vistas/egresoscuenta/nuevo.php';
    }

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function editar()
    {
        $id     = $_GET['id'];
        $campos = Egresoscuenta::obtenerPaginaPor($id);
        require_once 'vistas/egresoscuenta/editar1.php';
    }

    public function editarcm()
    {
        $id     = $_GET['id'];
        $campos = Egresoscuenta::obtenerPaginaPor($id);
        require_once 'vistas/egresoscuenta/editar1.php';
    }

    public function editarcu()
    {
        $id     = $_GET['id'];
        $campos = Egresoscuenta::obtenerPaginaPor($id);
        require_once 'vistas/egresoscuenta/editar2.php';
    }
    public function editarot()
    {
        $id     = $_GET['id'];
        $campos = Egresoscuenta::obtenerPaginaPor($id);
        require_once 'vistas/egresoscuenta/editar3.php';
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function eliminar()
    {
        $id      = $_GET['id'];
        $id_caja = $_GET['id_caja'];
        $res     = Egresoscuenta::eliminarPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Egresoscuenta::obtenerPagina($id_caja);
        require_once 'vistas/egresoscuenta/todos.php';
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function eliminarcm()
    {
        $id_cuenta = $_GET['id_cuenta'];
        $idegreso  = $_GET['idegreso'];
        $idingreso = $_GET['idingreso'];

        $res = Egresoscuenta::eliminaregresocuenta($idegreso);
        $res = Egresoscuenta::eliminaringresocaja($idingreso);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Egresoscuenta::obtenerPagina($id_cuenta);
        require_once 'vistas/egresoscuenta/todos.php';
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function eliminarmvs()
    {
        $id_cuenta = $_GET['id_cuenta'];
        $idegreso  = $_GET['idegreso'];
        $idingreso = $_GET['idingreso'];

        $res = Egresoscuenta::eliminaregresocuenta($idegreso);
        $res = Egresoscuenta::eliminaringresocuenta($idingreso);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Egresoscuenta::obtenerPagina($id_cuenta);
        require_once 'vistas/egresoscuenta/todos.php';
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function eliminarot()
    {
        $id_cuenta = $_GET['id_cuenta'];
        $idegreso  = $_GET['idegreso'];

        $consultarvaloreliminado=Egresoscuenta::valoraeliminar($idegreso);

        $idrelacion =Egresoscuenta::idrelacionpor($idegreso);

        $valorpagado =Egresoscuenta::valorpagado($idrelacion);

        $valorfinal = $valorpagado-$consultarvaloreliminado;

        $res = Egresoscuenta::actualizarvalorautorizado($valorfinal,$idrelacion);

        $res       = Egresoscuenta::eliminarot($idegreso);
        $res       = Egresoscuenta::eliminarabono($idegreso);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Egresoscuenta::obtenerPagina($id_cuenta);
        require_once 'vistas/egresoscuenta/todos.php';
    }

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
    public function guardar()
    {

        $ruta_imagen = $this->subir_fichero('images/egresoscuenta', 'imagen');
        //$nuevo['imagen']=$ruta_imagen;
        $variable     = $_POST;
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

        //array_push($nuevoarreglo,$nuevo);
        $campo = new Egresoscuenta('', $nuevoarreglo);
        $res   = Egresoscuenta::guardar($campo, $ruta_imagen);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }

        if ($tipo_egreso == "Cuenta") {

            // Ingreso a caja desde cuenta

            $ultimoIdEgreso = Egresoscuenta::ultimoIdEgreso();

            $res = Egresoscuenta::guardaringreso($tipo_egreso, $fecha_egreso, $caja_beneficiada, $cuenta_id_cuenta, $valor_egreso, $observaciones, $marca_temporal, $egreso_publicado, $creado_por, $ultimoIdEgreso);

            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Errores al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
            }

        }

        if ($tipo_egreso == "Movimiento a cuenta") {

            // Actualizamos la ruta de la imagen en el ingreso y el Id del Egreso para posterior Edición

            $ultimaruta     = Egresoscuenta::obtenerUltimaRuta();
            $ultimoIdEgreso = Egresoscuenta::ultimoIdEgreso();

            $res = Egresoscuenta::guardaringresocuenta($cuenta_beneficiada, $cuenta_id_cuenta, $ultimaruta, $tipo_egreso, $valor_egreso, $egreso_en, $cheque_id_cheque, $fecha_egreso, $observaciones, $marca_temporal, $creado_por, $egreso_publicado, $ultimoIdEgreso);

            // Actualizamos el

            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Errores al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
            }

        }

        $this->showcuentas();

    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR EGRESO A CAJA MENOR*/
/*************************************************************/
    public function actualizarcm()
    {
        if (empty($_FILES['imagen']['name'])) {
            $ruta_imagen = $_POST['ruta1'];
        } else {
            $ruta_imagen = $this->subir_fichero('images/egresoscuenta', 'imagen');
        }

        $id           = $_GET['id'];
        $id_cuenta    = $_GET['id_cuenta'];


        $fecha_egreso=$_POST['fecha_egreso'];
        $valor_egreso=$_POST['valor_egreso'];
        $observaciones=$_POST['observaciones'];
        $estado_egreso=$_POST['estado_egreso'];
        $caja_beneficiada=$_POST['caja_beneficiada'];
        $egreso_en=$_POST['egreso_en'];


        $variable     = $_POST;
        $nuevoarreglo = array();
        extract($variable);
        foreach ($variable as $campo => $valor) {
            //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
            $campo = strip_tags(trim($campo));
            $campo = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

            $valor = strip_tags(trim($valor));
            $valor = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
            if ($campo == "imagen") {
                $nuevoarreglo[$campo] = $ruta_imagen;
            } else {
                $nuevoarreglo[$campo] = $valor;
            }



        }
        $datosguardar = new Egresoscuenta($id, $nuevoarreglo);
        $res          = Egresoscuenta::actualizarcm($id,$ruta_imagen,$datosguardar);

        $res= Egresoscuenta::actualizarmvcjmenor($id,$valor_egreso,$observaciones,$ruta_imagen,$estado_egreso,$fecha_egreso);
        
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente el egreso en caja\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->show($id_cuenta);
    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR EGRESO A CUENTA*/
/*************************************************************/
    public function actualizarcu()
    {


        $valor_egreso        = $_POST['valor_egreso'];
        $observaciones       = $_POST['observaciones'];
        $estado_egreso       = $_POST['estado_egreso'];
        $fecha_egreso        = $_POST['fecha_egreso'];
        $cuenta_beneficiada  = $_POST['cuenta_beneficiada'];
        $egreso_en           = $_POST['egreso_en'];
       


        if (empty($_FILES['imagen']['name'])) {
            $ruta_imagen = $_POST['ruta1'];
        } else {
            $ruta_imagen = $this->subir_fichero('images/egresoscuenta', 'imagen');
        }

        $id           = $_GET['id'];
        $id_cuenta    = $_GET['id_cuenta'];
        $variable     = $_POST;
        $nuevoarreglo = array();
        extract($variable);
        foreach ($variable as $campo => $valor) {
            //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
            $campo = strip_tags(trim($campo));
            $campo = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

            $valor = strip_tags(trim($valor));
            $valor = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
            if ($campo == "imagen") {
                $nuevoarreglo[$campo] = $ruta_imagen;
            } else {
                $nuevoarreglo[$campo] = $valor;
            }

        }

        $datosguardar = new Egresoscuenta($id, $nuevoarreglo);
        $res          = Egresoscuenta::actualizarcu($id, $datosguardar, $ruta_imagen);

        $res = Egresoscuenta::actualizarmvc($id, $valor_egreso, $observaciones, $ruta_imagen, $estado_egreso, $fecha_egreso, $egreso_en);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente el egreso en caja\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->show($id_cuenta);
    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR EGRESO A CUENTA*/
/*************************************************************/
    public function actualizarot()
    {
        if (empty($_FILES['imagen']['name'])) {
            $ruta_imagen = $_POST['ruta1'];
        } else {
            $ruta_imagen = $this->subir_fichero('images/egresoscuenta', 'imagen');
        }
        $id           = $_GET['id'];
        $id_cuenta    = $_GET['id_cuenta'];
        $variable     = $_POST;
        $nuevoarreglo = array();
        extract($variable);
        foreach ($variable as $campo => $valor) {
            //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
            $campo = strip_tags(trim($campo));
            $campo = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

            $valor = strip_tags(trim($valor));
            $valor = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
            if ($campo == "imagen") {
                $nuevoarreglo[$campo] = $ruta_imagen;
            } else {
                $nuevoarreglo[$campo] = $valor;
            }

        }
        $datosguardar = new Egresoscuenta($id, $nuevoarreglo);
        $res          = Egresoscuenta::actualizarot($id, $datosguardar, $ruta_imagen);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente el egreso en caja\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->show($id_cuenta);
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
    public function show()
    {
        $id_cuenta = $_GET['id_cuenta'];
        $campos    = Egresoscuenta::obtenerPagina($id_cuenta);
        require_once 'vistas/egresoscuenta/todos.php';
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
    public function showcuentas()
    {
        $campos = Egresoscuenta::obtenerPagina2();
        require_once 'vistas/cuentas/todos.php';
    }

/*************************************************************/
/* FUNCION PARA SUBIR UN ARCHIVO  */
/*************************************************************/

    public function subir_fichero($directorio_destino, $nombre_fichero)
    {
        $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
        //si hemos enviado un directorio que existe realmente y hemos subido el archivo
        if (is_dir($directorio_destino) && is_uploaded_file($tmp_name)) {
            $img_file   = $_FILES[$nombre_fichero]['name'];
            $Aleaotorio = rand(0, 99999);
            $img_file   = $Aleaotorio . $img_file;
            $img_type   = $_FILES[$nombre_fichero]['type'];
            // Si se trata de una imagen
            if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png"))) {
                //¿Tenemos permisos para subir la imágen?
                if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file)) {
                    $retornar = $directorio_destino . '/' . $img_file; //RETORNAMOS EL NOMBRE Y RUTA DEL FICHERO
                    return $retornar;
                }
            } else {
                if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file)) {
                    $retornar = $directorio_destino . '/' . $img_file; //RETORNAMOS EL NOMBRE Y RUTA DEL FICHERO
                    return $retornar;
                }
            }
        }
        //Si llegamos hasta aquí es que algo ha fallado
        $vacio = '';
        return $vacio;
    }

}
