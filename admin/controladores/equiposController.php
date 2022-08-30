<?php
class EquiposController
{
    public function __construct()
    {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

    public function todos()
    {
        $campos = Equipos::obtenerPagina();
        require_once 'vistas/equipos/todos.php';
    }

    public function todosmantenimiento()
    {
        $campos = Equipos::obtenerPagina();
        require_once 'vistas/equipos/todosmantenimiento.php';
    }

    public function todosestados()
    {
        $campos = Equipos::obtenerPaginaEstados();
        require_once 'vistas/equipos/todosestados.php';
    }

    public function volquetas()
    {
        $campos = Equipos::obtenerPaginavolquetas();
        require_once 'vistas/equipos/volquetas.php';
    }

    public function reportedia()
    {
        $campos = Equipos::obtenerPagina();
        require_once 'vistas/equipos/reportedia.php';
    }

    public function reporteporfecha()
    {

        if (isset($_POST['daterange'])) {
            $fechaform = $_POST['daterange'];
        } elseif (isset($_GET['daterange'])) {
            $fechaform = $_GET['daterange'];
        }
        $campos = Equipos::obtenerPagina();
        require_once 'vistas/equipos/reportedia.php';
    }

    public function gastosmantenimientoporfecha()
    {

        if (isset($_POST['daterange'])) {
            $fechaform = $_POST['daterange'];
        } elseif (isset($_GET['daterange'])) {
            $fechaform = $_GET['daterange'];
        }
        $campos = Equipos::obtenerPagina();
        require_once 'vistas/equipos/todosmantenimiento.php';
    }

/*************************************************************/
/* FUNCION PARA AGREGAR NUEVO LLAMADO DESDE ROUTING.PHP */
/*************************************************************/
    public function nuevo()
    {
        require_once 'vistas/equipos/nuevo.php';
    }
    public function estado()
    {
        $get_equipo = $_GET['id'];
        require_once 'vistas/equipos/estado.php';
    }

    public function hojavida()
    {
        $get_equipo    = $_GET['id'];
        $get_mesactual = $_GET['get_mesactual'];
        require_once 'vistas/historicoeq/hojavida.php';
    }

    public function nuevovol()
    {
        require_once 'vistas/equipos/nuevo_volqueta.php';
    }

/*************************************************************/
/* FUNCION PARA AGREGAR NUEVO LLAMADO DESDE ROUTING.PHP */
/*************************************************************/
    public function formreportedia()
    {
        require_once 'vistas/equipos/formreportedia.php';
    }

    public function formreportemecanico()
    {
        require_once 'vistas/equipos/reporteordentrabajo.php';
    }

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function editar()
    {
        $id     = $_GET['id'];
        $campos = Equipos::obtenerPaginaPor($id);
        require_once 'vistas/equipos/editar.php';
    }

    public function timelineestados()
    {
        $id     = $_GET['id'];
        $campos = Equipos::obtenerPaginaestadosPor($id);
        require_once 'vistas/equipos/timelineestados.php';
    }

    public function editarvol()
    {
        $id     = $_GET['id'];
        $campos = Equipos::obtenerPaginaPor($id);
        require_once 'vistas/equipos/editar_volqueta.php';
    }

    public function editarestado()
    {
        $id     = $_GET['id'];
        $campos = Equipos::obtenerPaginaPor($id);
        require_once 'vistas/equipos/editarestado.php';
    }

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function editareporte()
    {
        $id           = $_GET['id'];
        $id_equipo    = $_GET['id_equipo'];
        $usermecanico = $_GET['usermecanico'];
        $campos       = Equipos::obtenerPaginareportePor($id);
        require_once 'vistas/equipos/editareporte.php';
    }

/*************************************************************/
/* FUNCION PARA REPORTAR LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function reportediario()
    {
        $id     = $_GET['id'];
        $campos = Equipos::obtenerPaginaPor($id);
        require_once 'vistas/equipos/reportediario.php';
    }

    /* FUNCION PARA REPORTAR LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function ordentrabajo()
    {
        $id = $_GET['operador'];
        require_once 'vistas/equipos/reporteordentrabajo.php';
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function eliminar()
    {
        $id  = $_GET['id'];
        $res = Equipos::eliminarPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Equipos::obtenerPagina();
        require_once 'vistas/equipos/todos.php';
    }

    public function eliminarestado()
    {
        $id  = $_GET['id'];
        $res = Equipos::eliminarestadoPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Equipos::obtenerPaginaEstados();
        require_once 'vistas/equipos/todosestados.php';
    }

    public function eliminarvol()
    {
        $id  = $_GET['id'];
        $res = Equipos::eliminarPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Equipos::obtenerPagina();
        require_once 'vistas/equipos/volquetas.php';
    }

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
    public function guardar()
    {

        $ruta_imagen = $this->subir_fichero('images/equipos', 'imagen');
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

        $nombre_equipo       = $_POST['nombre_equipo'];
        $validacionduplicado = Equipos::validarpor($nombre_equipo);

        if ($validacionduplicado > 0) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado los datos, el equipo " . $nombre_equipo . " ya existe\", \"info\");});</script>";
        } else {

            $campo = new Equipos('', $nuevoarreglo);
            $res   = Equipos::guardar($campo, $ruta_imagen);
            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
            }

        }

        $this->show();
    }

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
    public function guardarestado()
    {

        $variable = $_POST;

        $nuevoarreglo = array();
        extract($variable);
        foreach ($variable as $campo => $valor) {
            if ($campo == "texto") {
                $nuevoarreglo[$campo] = $valor; //OJO AL TEXTO DEL SLIDER ACEPTA ETIQUETAS PHP
            } else {
                //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
                $campo = strip_tags(trim($campo));
                $campo = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

                $valor                = strip_tags(trim($valor));
                $valor                = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
                $nuevoarreglo[$campo] = $valor;
            }
        }

        $equipo_id_equipo = $_POST['equipo_id_equipo'];
        $fecha_reporte    = $_POST['fecha_reporte'];
        $problema         = $_POST['observaciones'];
        $marca_temporal   = $_POST['marca_temporal'];
        $estado_sel       = $_POST['estado_sel'];
        $creado_por       = $_POST['creado_por'];
        $mecanico_id      = $_POST['mecanico_id'];
        $mantenimiento_id = $_POST['mantenimiento_id'];
        $tiempo           = $_POST['tiempo'];
        $estado_publicado = $_POST['estado_publicado'];
        $estado_reporte   = 1;

        //array_push($nuevoarreglo,$nuevo);
        $campo = new Equipos('', $nuevoarreglo);
        $res   = Equipos::guardarestado($equipo_id_equipo, $fecha_reporte, $estado_sel, $estado_publicado, $creado_por, $marca_temporal);

        $res = Equipos::guardarordentrabajo($equipo_id_equipo, $fecha_reporte, $problema, $marca_temporal, $creado_por, $estado_publicado, $estado_reporte, $tiempo, $mecanico_id, $mantenimiento_id);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }
        $this->showreporteestados();
    }

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
    public function guardarvol()
    {

        //$ruta_imagen=$this->subir_fichero('../pagina/images/slider','imagen');

        //$ruta_imagen2=$this->subir_fichero('../pagina/images/slider','imagentitulo');

        $variable = $_POST;

        $nuevoarreglo = array();
        extract($variable);
        foreach ($variable as $campo => $valor) {
            if ($campo == "texto") {
                $nuevoarreglo[$campo] = $valor; //OJO AL TEXTO DEL SLIDER ACEPTA ETIQUETAS PHP
            } else {
                //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
                $campo = strip_tags(trim($campo));
                $campo = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

                $valor                = strip_tags(trim($valor));
                $valor                = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
                $nuevoarreglo[$campo] = $valor;
            }
        }
        //array_push($nuevoarreglo,$nuevo);
        $campo = new Equipos('', $nuevoarreglo);
        $res   = Equipos::guardarvol($campo);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }
        $this->showvolquetas();
    }

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
    public function guardareporte()
    {

        $variable     = $_POST;
        $usermecanico = $_GET['usermecanico'];
        $id_equipo    = $_GET['id_equipo'];

        $nuevoarreglo = array();
        extract($variable);
        foreach ($variable as $campo => $valor) {
            if ($campo == "texto") {
                $nuevoarreglo[$campo] = $valor; //OJO AL TEXTO DEL SLIDER ACEPTA ETIQUETAS PHP
            } else {
                //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
                $campo = strip_tags(trim($campo));
                $campo = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

                $valor                = strip_tags(trim($valor));
                $valor                = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
                $nuevoarreglo[$campo] = $valor;
            }
        }

        $equipo_id_equipo = $_POST['equipo_id_equipo'];
        $fecha_reporte    = $_POST['fecha_reporte'];
        $problema         = $_POST['problema'];

        $validacionreporte = Equipos::validarporordentrabajo($equipo_id_equipo, $fecha_reporte, $problema);

        if ($validacionreporte > 0) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado los datos, el equipo presenta la misma falla en el mismo día\", \"info\");});</script>";
        } else {

            //array_push($nuevoarreglo,$nuevo);
            $campo = new Equipos('', $nuevoarreglo);
            $res   = Equipos::guardareporte($campo);
            if ($res) {
                echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
            } else {
                echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
            }

        }

        if ($usermecanico == 0) {
            $this->formreportemecanico();
        } else {
            $this->showreporte($id_equipo);
        }

    }

    /*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function eliminareporte()
    {
        $id           = $_GET['id'];
        $id_equipo    = $_GET['id_equipo'];
        $usermecanico = $_GET['usermecanico'];

        $res = Equipos::eliminareportePor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }

        if ($usermecanico == 0) {
            $this->formreportemecanico();
        } else {
            $campos = Equipos::obtenerPagina();
            require_once 'vistas/equipos/todosmantenimiento.php';
        }

    }

/*************************************************************/
/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function actualizar()
    {

        if (empty($_FILES['imagen']['name'])) {
            $ruta_imagen = $_POST['ruta1'];
        } else {
            $ruta_imagen = $this->subir_fichero('images/equipos', 'imagen');
        }
        $id           = $_GET['id_equipo'];
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
        $datosguardar = new Equipos($id, $nuevoarreglo);
        $res          = Equipos::actualizar($id, $datosguardar, $ruta_imagen);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->show();
    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function actualizarvol()
    {

        $id           = $_GET['id_equipo'];
        $variable     = $_POST;
        $nuevoarreglo = array();
        extract($variable);

        foreach ($variable as $campo => $valor) {
            if ($campo == "texto") {
                $nuevoarreglo[$campo] = $valor; //OJO AL TEXTO DEL SLIDER ACEPTA ETIQUETAS PHP
            } else {
                //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
                $campo = strip_tags(trim($campo));
                $campo = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

                $valor                = strip_tags(trim($valor));
                $valor                = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
                $nuevoarreglo[$campo] = $valor;
            }
        }

        $datosguardar = new Equipos($id, $nuevoarreglo);
        $res          = Equipos::actualizarvol($id, $datosguardar);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->showvolquetas();
    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function actualizaestado()
    {

        $id           = $_GET['id_equipo'];
        $variable     = $_POST;
        $nuevoarreglo = array();
        extract($variable);

        foreach ($variable as $campo => $valor) {
            if ($campo == "texto") {
                $nuevoarreglo[$campo] = $valor; //OJO AL TEXTO DEL SLIDER ACEPTA ETIQUETAS PHP
            } else {
                //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
                $campo = strip_tags(trim($campo));
                $campo = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

                $valor                = strip_tags(trim($valor));
                $valor                = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
                $nuevoarreglo[$campo] = $valor;
            }
        }

        $datosguardar = new Equipos($id, $nuevoarreglo);
        $res          = Equipos::actualizarestado($id, $datosguardar);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->show();
    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function actualizareporte()
    {

        $id           = $_GET['id_reporte'];
        $id_equipo    = $_GET['id_equipo'];
        $usermecanico = $_GET['usermecanico'];
        $variable     = $_POST;
        $nuevoarreglo = array();
        extract($variable);

        foreach ($variable as $campo => $valor) {
            if ($campo == "texto") {
                $nuevoarreglo[$campo] = $valor; //OJO AL TEXTO DEL SLIDER ACEPTA ETIQUETAS PHP
            } else {
                //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
                $campo = strip_tags(trim($campo));
                $campo = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

                $valor                = strip_tags(trim($valor));
                $valor                = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
                $nuevoarreglo[$campo] = $valor;
            }
        }

        $estado_reporte   = $_POST['estado_reporte'];
        $equipo_id_equipo = $_POST['equipo_id_equipo'];
        $fecha_actual     = date('Y-m-d');
        $creado_por       = $_POST['creado_por'];
        $marca_temporal   = $_POST['marca_temporal'];
        $estado_publicado = 1;


        $datosguardar = new Equipos($id, $nuevoarreglo);
        $res          = Equipos::actualizareporte($id, $datosguardar);

        if ($estado_reporte == 3) {
            $estado_sel = "Operativo";
            $res = Equipos::guardarestado($equipo_id_equipo, $fecha_actual, $estado_sel, $estado_publicado, $creado_por, $marca_temporal);
        }

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        if ($usermecanico == 0) {
            $this->formreportemecanico();
        } else {
            $campos = Equipos::obtenerPagina();
            require_once 'vistas/equipos/todosmantenimiento.php';
        }
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
    public function show()
    {
        $campos = Equipos::obtenerPagina();
        require_once 'vistas/equipos/todos.php';
    }

    public function showvolquetas()
    {
        $campos = Equipos::obtenerPaginavolquetas();
        require_once 'vistas/equipos/volquetas.php';
    }

    public function showreporte()
    {
        $id     = $_GET['id_equipo'];
        $campos = Equipos::obtenerPaginaPor($id);
        require_once 'vistas/equipos/reportediario.php';
    }

    public function showreporteestados()
    {
        $campos = Equipos::obtenerPaginaEstados();
        require_once 'vistas/equipos/estado.php';
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

    public function cambiarvisualizacion()
    {
        $id               = $_GET['id'];
        $sn_visualizacion = $_GET['sn_visualizacion'];
        $campos           = Equipos::cambiarvisualizacionestadistica($id, $sn_visualizacion);
        EquiposController::volquetas();
    }

}
