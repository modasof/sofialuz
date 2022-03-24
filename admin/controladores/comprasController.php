<?php
class ComprasController
{
    public function __construct()
    {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

    public function todos()
    {
        $campos = Compras::todos();
        require_once 'vistas/compras/todos.php';
    }

    public function todosrecibirinsumos()
    {
        $campos = Compras::todosrecibirinsumos();
        require_once 'vistas/compras/cargarinsumos.php';
    }

    public function porfechainsumos()
    {

        if (isset($_POST['daterange'])) {
            $fechaform = $_POST['daterange'];
        } elseif (isset($_GET['daterange'])) {
            $fechaform = $_GET['daterange'];
        }
        $campos = Compras::todosrecibirinsumos();
        require_once 'vistas/compras/cargarinsumos.php';
    }

    public function todospormes()
    {
         if (isset($_POST['daterange'])) {
            $fechaform = $_POST['daterange'];
        } elseif (isset($_GET['daterange'])) {
            $fechaform = $_GET['daterange'];
        }

        $campos = Compras::todospormes();
        require_once 'vistas/compras/todospormes.php';
    }

    public function cxpusuario()
    {
        $id     = $_GET['id'];
        $campos = Compras::cxpusuario($id);
        require_once 'vistas/compras/miscxp.php';
    }

    public function recibiroc()
    {
        $campos = Compras::recibiroc();
        require_once 'vistas/compras/recibiroc.php';
    }

    public function verdetalle()
    {
        $id     = $_GET['id'];
        $campos = Compras::verdetalle($id);
        require_once 'vistas/compras/verdetalle.php';
    }

    public function editardetallecot()
    {
        $id             = $_GET['id'];
        $id_ordencompra = $_GET['id_ordencompra'];
        $campos         = Compras::editardetallecotizacion($id);
        require_once 'vistas/compras/editardetallecotizacion.php';
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR EL LISTADO DE ID A CAMBIAR DE ESTADO*/
/*************************************************************/

    public function cambiarestado()
    {

        (isset($_GET['id'])) ? $getid = $_GET['id'] : $getid = '';

        (isset($_GET['des'])) ? $getdespacho = $_GET['des'] : $getdespacho = '';

        require_once 'vistas/compras/gestionestados.php';
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR EL LISTADO DE ID A CAMBIAR DE ESTADO*/
/*************************************************************/

    public function cambiarestadocreditos()
    {

        (isset($_GET['id'])) ? $getid = $_GET['id'] : $getid = '';

        (isset($_GET['des'])) ? $getdespacho = $_GET['des'] : $getdespacho = '';

        require_once 'vistas/compras/gestioncomprascredito.php';
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

    public function porfecha()
    {

        if (isset($_POST['daterange'])) {
            $fechaform = $_POST['daterange'];
        } elseif (isset($_GET['daterange'])) {
            $fechaform = $_GET['daterange'];
        }
        $campos = Compras::todos();
        require_once 'vistas/compras/todos.php';
    }

    /*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function cargarinventario()
    {
        $fechaform = $_GET['daterange'];

        //(id, cotizacion_item_id, oc_id, insumo_id, servicio_id, cantidad, entrada_id, fecha_registro, estado_detalle_entrada, marca_temporal, creado_por, entrada_por)
        $cotizacion_item_id     = $_POST['cotizacion_item_id'];
        $item_id                = $_POST['itemid'];
        $oc_id                  = $_POST['oc_id'];
        $insumo_id              = $_POST['insumo_id'];
        $servicio_id            = $_POST['servicio_id'];
        $cantidad               = $_POST['cantidad'];
        $entrada_id             = "0";
        $fecha_registro         = $_POST['fecha_registro'];
        $estado_detalle_entrada = "1";
        $marca_temporal         = $_POST['marca_temporal'];
        $creado_por             = $_POST['creado_por'];
        $entrada_por            = "Entrada por OC";
       
        $estado                 = "12";

        $res = Compras::cargarentradainventario($cotizacion_item_id, $oc_id, $insumo_id, $servicio_id, $cantidad, $entrada_id, $fecha_registro, $estado_detalle_entrada, $marca_temporal, $creado_por, $entrada_por);

        $res = Compras::actualizarestadoItemsOC($item_id, $estado);

        if ($res) {
            echo "<script>jQuery(function(){swal(\"¡Datos Guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){swal(\"¡Datos Guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        }
        $campos = Compras::todosrecibirinsumos();
        require_once 'vistas/compras/cargarinsumos.php';
    }
/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
    public function guardar()
    {

        $ruta_imagen  = $this->subir_fichero('images/compras', 'imagen');
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

                $valor = strip_tags(trim($valor));
                $valor = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
                if ($campo == "imagen2") {
                    $nuevoarreglo[$campo] = $ruta_imagen;
                } else {
                    $nuevoarreglo[$campo] = $valor;
                }
            }
        }
        //array_push($nuevoarreglo,$nuevo);
        $campo = new Compras('', $nuevoarreglo);
        $res   = Compras::guardar($campo, $ruta_imagen);
        if ($res) {
            echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }
        $this->showtodos();
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function eliminar()
    {
        $id  = $_GET['id'];
        $res = Compras::eliminarpor($id);
        if ($res) {
            echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Compras::todos();
        require_once 'vistas/compras/todos.php';
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function retornar()
    {
        $id              = $_GET['id'];
        $idcotiza        = $_GET['idcotiza'];
        $usuario_creador = $_GET['reporta'];

        $res        = Compras::RetornarItemcotizado($idcotiza);
        $valorfinal = Compras::sqlvalortotalordencompra($id);
        $res        = Compras::actualizarvalorfinal($id, $valorfinal);

        $modulo     = "Ordenes de compra";
        $logdetalle = "Id cotizacion " . $idcotiza . " de orden de compra N.00C" . $id . " retornaron a espera de aprobacion.";

        $res = Compras::log($usuario_creador, $logdetalle, $modulo);

        if ($res) {
            echo "<script>jQuery(function(){swal(\"¡Datos Actualizados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){swal(\"¡Error al Actualizar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Compras::verdetalle($id);
        require_once 'vistas/compras/verdetalle.php';
    }

    /*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function deletepagotemporal()
    {
        $id       = $_GET['id'];
        $items    = $_GET['des'];
        $iddelete = $_GET['iddelete'];

        $res = Compras::eliminarpagotem($iddelete);
        if ($res) {
            echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $this->cambiarestadocreditos();
    }

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function editar()
    {
        $id        = $_GET['id'];
        $vereditar = $_GET['vereditar'];
        $campos    = Compras::editarpor($id);
        require_once 'vistas/compras/formeditar.php';
    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function actualizar()
    {
        $id = $_GET['id'];
        if (empty($_FILES['imagen_cot']['name'])) {
            $ruta_imagen = $_POST['ruta1'];
        } else {
            $ruta_imagen = $this->subir_fichero('images/cotizaciones', 'imagen_cot');
        }
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

                $valor = strip_tags(trim($valor));
                $valor = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
                if ($campo == "imagen_cot") {
                    $nuevoarreglo[$campo] = $ruta_imagen;
                } else {
                    $nuevoarreglo[$campo] = $valor;
                }
            }
        }

        $datosguardar = new Compras($id, $nuevoarreglo);
        $res          = Compras::actualizar($id, $datosguardar, $ruta_imagen);
        if ($res) {
            echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->showtodos();
    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function actualizardetallecot()
    {
        $id                 = $_GET['id'];
        $id_cotizacion_item = $_GET['id_cotizacion_item'];
        $variable           = $_POST;

        $usuario_creador = $_POST['usuario_creador'];
        $marca_temporal  = $_POST['marca_temporal'];

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
        $datosguardar = new Compras($id_cotizacion_item, $nuevoarreglo);
        $res          = Compras::actualizardetallecot($id_cotizacion_item, $datosguardar);

        // Se actualizan los valores

        // 1. Verificamos el valor inicial de la orden de compra

        $valorinicial = Compras::sqlvalor($id);

        // 2. Retomamos el nuevo valor

        $valorfinal = Compras::sqlvalortotalordencompra($id);

        // 3. Verificación si el valor incremento o bajo

        if ($valorinicial > $valorfinal) {
            $logdetalle = "El valor de la orden de compra OC00" . $id . " bajo";
        } elseif ($valorinicial < $valorfinal) {
            $logdetalle = "El valor de la orden de compra OC00" . $id . " incremento";
        } else {
            $logdetalle = "El valor de la orden de compra OC00" . $id . " se actualiza pero no cambia ";
        }

        // 4. Actualizamos el nuevo valor de la orden de compra

        $res = Compras::actualizarvalorfinal($id, $valorfinal);

        // 5. Actualizamos registro del log
        $modulo = "Ordenes de compra";
        $res    = Compras::log($usuario_creador, $logdetalle, $modulo);

        if ($res) {
            echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }

        $campos = Compras::verdetalle($id);
        require_once 'vistas/compras/verdetalle.php';
    }
    /*************************************************************/
/* FUNCION PARA GUARDADO PAGO TEMPORAL */
/*************************************************************/
    public function pagotemporal()
    {
        $id = $_GET['id'];

        (isset($_GET['des'])) ? $getdespacho = $_GET['des'] : $getdespacho = '';

        /*=============================================================
        =            Actualización de datos Orden de compra            =
        =============================================================*/
        $itemunico      = $_POST['itemunico'];
        $marca_temporal = $_POST['marca_temporal'];
        $creado_por     = $_POST['creado_por'];
        $valorpago      = $_POST['valorpago'];
        $estado_pago    = $_POST['estado_pago'];
        $fecha_registro = $_POST['fecha_registro'];

        $res = Compras::pagotemporal($itemunico, $valorpago, $fecha_registro, $estado_pago, $creado_por, $marca_temporal);

        if ($res) {
            echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->cambiarestadocreditos();

    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function actualizarpago()
    {
        $id = $_GET['id'];

/*=============================================================
=            Actualización de datos Orden de compra            =
=============================================================*/
        $marca_temporal = $_POST['marca_temporal'];
        $creado_por     = $_POST['creado_por'];

        if (empty($_FILES['imagen']['name'])) {
            $ruta_imagen = $_POST['ruta1'];
        } else {
            $ruta_imagen = $this->subir_fichero('images/compras', 'imagen');
        }

        $fecha_reporte     = $_POST['fecha_reporte'];
        $valor_total       = $_POST['valor_total'];
        $valor_retenciones = $_POST['valor_retenciones'];
        $valor_iva         = $_POST['valor_iva'];
        $estado_item       = $_POST['estado_item'];

        $rubro_id         = $_POST['rubro_id'];
        $subrubro_id      = $_POST['subrubro_id'];
        $cuenta_id        = $_POST['cuenta_id'];
        $beneficiario     = $_POST['beneficiario'];
        $egreso_en        = $_POST['egreso_en'];
        $observaciones    = $_POST['observaciones'];
        $tipo_egreso      = "Otro tipo de egreso";
        $estado_egreso    = "1";
        $egreso_publicado = "1";
        $proveedor = "0";

        $res = Compras::actualizarpago($id, $ruta_imagen, $valor_total, $valor_retenciones, $valor_iva, $estado_item, $rubro_id, $subrubro_id);

/*=============================================================
=            Guardado de pago Otros -  Orden de compra            =
=============================================================*/
        if (empty($_FILES['imagen2']['name'])) {
            $ruta_imagen2 = $_POST['ruta2'];
        } else {
            $ruta_imagen2 = $this->subir_ficherodos('images/egresoscuenta', 'imagen2');
        }

        //$cuenta_id_cuenta,$imagen,$tipo_egreso,$proveedor,$beneficiario,$id_rubro,$id_subrubro,$egreso_en,$valor_egreso,$observaciones,$estado_egreso,$egreso_publicado,$marca_temporal,$fecha_egreso,$creado_por

        $res = Compras::guardaregresoOrdenCompra($cuenta_id, $ruta_imagen2, $tipo_egreso,$proveedor, $beneficiario, $rubro_id, $subrubro_id, $egreso_en, $valor_total, $observaciones, $estado_egreso, $egreso_publicado, $marca_temporal, $fecha_reporte, $creado_por);

        if ($res) {
            echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->showtodos();
    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function actualizarpagocredito()
    {
        $id = $_GET['id'];

/*=============================================================
=            Actualización de datos Orden de compra            =
=============================================================*/
        $marca_temporal = $_POST['marca_temporal'];
        $creado_por     = $_POST['creado_por'];

        if (empty($_FILES['imagen']['name'])) {
            $ruta_imagen = $_POST['ruta1'];
        } else {
            $ruta_imagen = $this->subir_fichero('images/compras', 'imagen');
        }

        $fecha_reporte     = $_POST['fecha_reporte'];
        $valor_total       = $_POST['valor_total'];
        $valor_retenciones = $_POST['valor_retenciones'];
        $valor_iva         = $_POST['valor_iva'];
        $estado_item       = $_POST['estado_item'];
        $factura           = $_POST['factura'];
        $ordenes           = $_POST['ordenes'];
        $rubro_id          = $_POST['rubro_id'];
        $subrubro_id       = $_POST['subrubro_id'];
        $cuenta_id         = $_POST['cuenta_id'];
        $beneficiario      = $_POST['beneficiario'];
        $egreso_en         = $_POST['egreso_en'];
        $observaciones     = $_POST['observaciones'];
        $proveedor         = $_POST['proveedor_id_proveedor'];
        $tipo_egreso       = "Pago a proveedor";
        $estado_egreso     = "1";
        $egreso_publicado  = "1";

        $ordenes = $_POST['ordenes'];
        $items   = explode(",", $ordenes);
        foreach ($items as $key => $ordenid) {
            $res = Compras::actualizarpagocredito($ordenid, $ruta_imagen, $estado_item, $rubro_id, $subrubro_id, $factura);
        }

/*=============================================================
=            Guardado de pago Otros -  Orden de compra            =
=============================================================*/
        if (empty($_FILES['imagen2']['name'])) {
            $ruta_imagen2 = $_POST['ruta2'];
        } else {
            $ruta_imagen2 = $this->subir_ficherodos('images/egresoscuenta', 'imagen2');
        }

        $res = Compras::guardaregresoOrdenCompra($cuenta_id, $ruta_imagen2, $tipo_egreso, $proveedor, $beneficiario, $rubro_id, $subrubro_id, $egreso_en, $valor_total, $observaciones, $estado_egreso, $egreso_publicado, $marca_temporal, $fecha_reporte, $creado_por);

/*=============================================================
=            Guardado Valores de factura           =
=============================================================*/
        $res = Compras::guardarfactura($factura, $fecha_reporte, $valor_total, $valor_retenciones, $valor_iva, $marca_temporal, $creado_por, $estado_egreso, $egreso_publicado, $proveedor);

/*=============================================================
=           Actualiza detalle Pagos actura           =
=============================================================*/
        $ultimoegreso = Compras::obtenerUltimosEgreso($cuenta_id);

        $ordenespost = $_POST['ordenes'];
        $items       = explode(",", $ordenespost);
        foreach ($items as $key => $ordenunica) {
            $res = Compras::actualizarpagoabonos($ordenunica, $fecha_reporte, $estado_egreso, $ultimoegreso);
        }

        if ($res) {
            echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->showtodos();
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
    public function showtodos()
    {
        $campos = Compras::todos();
        require_once 'vistas/compras/todos.php';
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

    /*************************************************************/
/* FUNCION PARA SUBIR UN ARCHIVO  */
/*************************************************************/

    public function subir_ficherodos($directorio_destino, $nombre_fichero)
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
