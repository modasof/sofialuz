<?php
class RequisicionesitemsController
{
    public function __construct()
    {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

    public function todos()
    {
        $campos = Requisicionesitems::todos();
        require_once 'vistas/requisicionesitems/todos.php';
    }

    public function todosporreq()
    {
        $id     = $_GET['id'];
        $campos = Requisicionesitems::todosporreq($id);
        require_once 'vistas/requisicionesitems/todosporreq.php';
    }

    public function movimientositem()
    {
        //$id     = $_GET['id'];
        //$campos = Requisicionesitems::movimientositem($id);
        //require_once 'vistas/requisicionesitems/gestioncantidades.php';
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR EL LISTADO DE ID A CAMBIAR DE ESTADO*/
/*************************************************************/

    public function cambiarestado()
    {

        (isset($_GET['id'])) ? $getid = $_GET['id'] : $getid = '';

        (isset($_GET['des'])) ? $getdespacho = $_GET['des'] : $getdespacho = '';

        require_once 'vistas/requisicionesitems/gestionestados.php';
    }

# ======================================================
    # =           Módulo gestión de Cotizaciones           =
    # ======================================================

    public function gestionarvalores()
    {

        (isset($_GET['id'])) ? $getid        = $_GET['id'] : $getid        = '';
        (isset($_GET['des'])) ? $getdespacho = $_GET['des'] : $getid = '';
        require_once 'vistas/requisicionesitems/agregarcotizaciones.php';
    }

# ======  End of Módulo gestión de Cotizaciones  =======

    /*************************************************************/
/* FUNCION PARA MOSTRAR EL LISTADO DE ID A CAMBIAR DE ESTADO*/
/*************************************************************/

    public function cambiarestadoadmin()
    {

        (isset($_GET['id'])) ? $getid = $_GET['id'] : $getid = '';

        (isset($_GET['des'])) ? $getdespacho = $_GET['des'] : $getdespacho = '';

        require_once 'vistas/requisicionesitems/gestionestadosadmin.php';
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR EL LISTADO DE ID A CAMBIAR DE ESTADO*/
/*************************************************************/

    public function trazabilidad()
    {

        (isset($_GET['id'])) ? $getid = $_GET['id'] : $getid = '';

        (isset($_GET['iditem'])) ? $getitem = $_GET['iditem'] : $getitem = '';

        $campos = Requisicionesitems::datostrazabilidad($getitem);
        require_once 'vistas/requisicionesitems/trazabilidad.php';
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR EL LISTADO DE ID A CAMBIAR DE ESTADO*/
/*************************************************************/

    public function trazabilidadadmin()
    {

        (isset($_GET['id'])) ? $getid = $_GET['id'] : $getid = '';

        (isset($_GET['iditem'])) ? $getitem = $_GET['iditem'] : $getitem = '';
        $campos                             = Requisicionesitems::datostrazabilidad($getitem);
        require_once 'vistas/requisicionesitems/trazabilidadadmin.php';
    }

    /*************************************************************/
/* FUNCION PARA MOSTRAR EL LISTADO DE ID A CAMBIAR DE ESTADO*/
/*************************************************************/

    public function agregarvalores()
    {

        (isset($_GET['id'])) ? $getid = $_GET['id'] : $getid = '';

        require_once 'vistas/requisicionesitems/agregarvalores.php';
    }

/*************************************************************/
/* FUNCION PARA GUARDAR ESTADOS */
/*************************************************************/
    public function actualizarestado()
    {

        $cargo           = $_GET['cargo'];
        $id              = $_GET['id'];
        $estado_item     = $_POST['estado_item'];
        $items           = $_POST['items'];
        $usuario_creador = $_POST['usuario_creador'];
        $observaciones   = $_POST['observaciones'];

        $res = Requisicionesitems::actualizarestado($estado_item, $items);
        $res = Requisicionesitems::guardartrazabilidad($estado_item, $items, $usuario_creador, $observaciones);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al guardar !\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }
        if ($cargo == 1 or $cargo == 13) {
            $this->showtodosporalmacen();
        } else {
            $this->showtodosporusuario($usuario_creador);
        }

    }

/*************************************************************/
/* FUNCION PARA GUARDAR ESTADOS */
/*************************************************************/
    public function actualizarcantidadcot()
    {
        $idproveedor   = $_GET['id'];
        $cantidadcot   = $_POST['cantidad'];
        $valorunitario = $_POST['valorunitario'];
        $valor_cot     = $cantidadcot * $valorunitario;
        $id            = $_POST['id'];

        $res = Requisicionesitems::actualizarcantidadcot($id, $cantidadcot, $valor_cot);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al guardar !\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }
        $this->vercotizacion();
    }

    public function vercotizacion()
    {
        $id     = $_GET['id'];
        $campos = Requisicionesitems::vercotizacion($id);
        require_once 'vistas/requisiciones/cotizaciones.php';
    }

/*************************************************************/
/* FUNCION PARA GUARDAR ESTADOS */
/*************************************************************/
    public function guardarocompra()
    {

        $imagen            = $_POST['imagen'];
        $imagen_cot        = $_POST['imagen_cot'];
        $fecha_reporte     = $_POST['fecha_reporte'];
        $valor_total       = $_POST['valor_total'];
        $factura           = $_POST['factura'];
        $valor_retenciones = $_POST['valor_retenciones'];
        $estado_recibido   = $_POST['estado_recibido'];
        $compra_de         = $_POST['compra_de'];
        $rubro_id          = $_POST['rubro_id'];
        $subrubro_id       = $_POST['subrubro_id'];

        $estado_orden           = $_POST['estado_orden'];
        $proveedor_id_proveedor = $_POST['proveedor_id_proveedor'];
        $medio_pago             = $_POST['medio_pago'];
        $observaciones          = $_POST['observaciones'];
        $marca_temporal         = $_POST['marca_temporal'];
        $usuario_creador        = $_POST['usuario_creador'];
        $estado_item            = 8;
        $estado_cotizacion      = 1;
        $estado_nuevo_cot       = 2;
        $valor_iva              = 0;

        foreach ($_POST['items'] as $items) {
            $arregloitems = array($items . ",");
        }
// 1. Se guarda el registro de la orden de compra
        $res = Requisicionesitems::guardaroccompra($imagen, $imagen_cot, $fecha_reporte, $valor_total, $valor_retenciones, $valor_iva, $estado_orden, $proveedor_id_proveedor, $medio_pago, $observaciones, $marca_temporal, $usuario_creador, $items, $rubro_id, $subrubro_id, $factura, $estado_recibido, $compra_de);
// 2. Se obtiene el último registro de OC y se toma como consecutivo
        $ordencompra_num = Requisicionesitems::obtenerUltimo();
// 3. Se actualizan los items con el consecutivo OC
        $res = Requisicionesitems::actualizaritemsoc($ordencompra_num, $arregloitems);
// 4. Se actualiza los items en tabla cotizaciones y se pasan a estado 2
        $res = Requisicionesitems::actualizaritemcotizasoc($usuario_creador, $ordencompra_num, $arregloitems, $proveedor_id_proveedor, $estado_cotizacion, $estado_nuevo_cot);
// 5. Se cambia el estado al item
        $res = Requisicionesitems::actualizarestadooc($estado_item, $arregloitems);
        // 6. Se verifica el valor total de la orden de compra por id de orden de compra
        $valor_final = Requisicionesitems::sqlvalortotalordencompra($ordencompra_num);
//  7. Se actualiza el nuevo valor de la orden de compra
        $res = Requisicionesitems::actualizarvalorfinal($ordencompra_num, $valor_final);
// 8. Se actualiza la trazabilidad en cada item y se agrega el estado 8
        $observaciontrazabilidad = $observaciones . " Con orden de Compra N." . $ordencompra_num;
        $res                     = Requisicionesitems::guardartrazabilidadoc($estado_item, $items, $usuario_creador, $observaciontrazabilidad);
// 9. Notificación de mensaje de Texto a usuario contabilidad

        $nomproveedor = Requisicionesitems::obtenerNombreProveedor($proveedor_id_proveedor);

        $detalle = "Autorizada OC00" . $ordencompra_num . " de " . $nomproveedor . " por valor:" . $valor_final;

        $res = Requisicionesitems::guardarnotificacion($usuario_creador, 16, $marca_temporal, $fecha_reporte, $detalle);
        $res = Requisicionesitems::guardarnotificacion($usuario_creador, 58, $marca_temporal, $fecha_reporte, $detalle);
        $res = Requisicionesitems::guardarnotificacion($usuario_creador, 39, $marca_temporal, $fecha_reporte, $detalle);
        $res = Requisicionesitems::guardarnotificacion($usuario_creador, 144, $marca_temporal, $fecha_reporte, $detalle);
        $res = Requisicionesitems::guardarnotificacion($usuario_creador, 151, $marca_temporal, $fecha_reporte, $detalle);
        $res = Requisicionesitems::guardarnotificacion($usuario_creador, 150, $marca_temporal, $fecha_reporte, $detalle);
        $res = Requisicionesitems::guardarnotificacion($usuario_creador, 68, $marca_temporal, $fecha_reporte, $detalle);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\").then(function(){window.location='?controller=requisiciones&&action=cotizaciones';});});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al guardar !\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }

        $this->showCotizaciones();

    }

    /*************************************************************/
/* FUNCION PARA GUARDAR ESTADOS */
/*************************************************************/
    public function actualizarestadoadmin()
    {

        $id              = $_GET['id'];
        $estado_item     = $_POST['estado_item'];
        $items           = $_POST['items'];
        $usuario_creador = $_POST['usuario_creador'];
        $observaciones   = $_POST['observaciones'];

        $res = Requisicionesitems::actualizarestado($estado_item, $items);
        $res = Requisicionesitems::guardartrazabilidad($estado_item, $items, $usuario_creador, $observaciones);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al guardar !\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }

        $this->showRequisicionesitems();

    }

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVA COTIZACION */
/*************************************************************/
    public function guardarcotizacion()
    {

        $id              = $_GET['id'];
        $usuario_creador = $_POST['usuario_creador'];
        $cotizacion      = $_POST['cotizacion'];
        $valor_cot       = $_POST['valor_cot'];
        $estado_item     = 6;
        $observaciones1  = $cotizacion . " Agregada correctamente.";

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
        $campo = new Requisicionesitems('', $nuevoarreglo);
        $res   = Requisicionesitems::guardarcotizacion($campo);
        $res   = Requisicionesitems::guardartrazabilidad($estado_item, $id, $usuario_creador, $observaciones1);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }
        $this->showtodosporusuario($usuario_creador);

    }

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVA COTIZACION */
/*************************************************************/
    public function guardarcotizacionmultiple()
    {
        $id    = $_GET['id'];
        $items = $_GET['des'];

        $item_id              = $_POST['item_id'];
        $requisicion_id       = $_POST['requisicion_id'];
        $fecha_reporte        = $_POST['fecha_reporte'];
        $marca_temporal       = $_POST['marca_temporal'];
        $usuario_creador      = $_POST['usuario_creador'];
        $usuario_aprobador    = $_POST['usuario_aprobador'];
        $estado_cotizacion    = $_POST['estado_cotizacion'];
        $ordencompra_num      = $_POST['ordencompra_num'];
        $insumo_id_insumo     = $_POST['insumo_id_insumo'];
        $servicio_id_servicio = $_POST['servicio_id_servicio'];
        $equipo_id_equipo     = $_POST['equipo_id_equipo'];
        $cantidadcot          = $_POST['cantidadcot'];
        $identificador1       = $_POST['identificador1'];
        $identificador2       = $_POST['identificador2'];
        $identificador3       = $_POST['identificador3'];
        $estado_item          = 7;

        $proveedor1     = $_POST['proveedor1'];
        $cotizacion1    = $_POST['cotizacion1'];
        $valor_cot1     = $_POST['valor_cot1'];
        $formapago1     = $_POST['formapago1'];
        $observaciones1 = $cotizacion1 . " Agregada correctamente.";
        $proveedor2     = $_POST['proveedor2'];
        $cotizacion2    = $_POST['cotizacion2'];
        $valor_cot2     = $_POST['valor_cot2'];
        $formapago2     = $_POST['formapago2'];
        $observaciones2 = $cotizacion2 . " Agregada correctamente.";
        $proveedor3     = $_POST['proveedor3'];
        $cotizacion3    = $_POST['cotizacion3'];
        $valor_cot3     = $_POST['valor_cot3'];
        $formapago3     = $_POST['formapago3'];
        $observaciones3 = $cotizacion3 . " Agregada correctamente.";

        # =============================================
        # =           Validación de Cotización 1      =
        # =============================================

        if ($valor_cot1 != "") {
            $res = Requisicionesitems::guardarcotizacionmultiple($proveedor1, $cotizacion1, $item_id, $valor_cot1, $requisicion_id, $marca_temporal, $usuario_creador, $insumo_id_insumo, $servicio_id_servicio, $equipo_id_equipo, $cantidadcot);
            $res=Requisicionesitems::actualizarestado($estado_item, $item_id);
            //$res = Requisicionesitems::guardartrazabilidad($estado_item, $id, $usuario_creador, $observaciones1);
        }
        if ($valor_cot2 != "") {
            $res = Requisicionesitems::guardarcotizacionmultiple($proveedor2, $cotizacion2, $item_id, $valor_cot2, $requisicion_id, $marca_temporal, $usuario_creador, $insumo_id_insumo, $servicio_id_servicio, $equipo_id_equipo, $cantidadcot);
             $res=Requisicionesitems::actualizarestado($estado_item, $item_id);
            //$res = Requisicionesitems::guardartrazabilidad($estado_item, $id, $usuario_creador, $observaciones2);
        }
        if ($valor_cot3 != "") {

            $res = Requisicionesitems::guardarcotizacionmultiple($proveedor3, $cotizacion3, $item_id, $valor_cot3, $requisicion_id, $marca_temporal, $usuario_creador, $insumo_id_insumo, $servicio_id_servicio, $equipo_id_equipo, $cantidadcot);
             $res=Requisicionesitems::actualizarestado($estado_item, $item_id);
            //$res = Requisicionesitems::guardartrazabilidad($estado_item, $id, $usuario_creador, $observaciones3);
        }

        if ($valor_cot1 >= 0 and $valor_cot2 >= 0 and $valor_cot3 >= 0) {
            // ?controller=requisicionesitems&action=gestionarvalores&des=107,109&id=61

            // echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\").then(function(){window.location='?controller=requisicionesitems&action=gestionarvalores&des=" . $items . "&id=" . $id . "';});});</script>";
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\")});</script>";

        } elseif ($valor_cot1 >= 0 or $valor_cot2 >= 0 or $valor_cot3 >= 0) {
            // echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\").then(function(){window.location='?controller=requisicionesitems&action=gestionarvalores&des=" . $items . "&id=" . $id . "';});});</script>";

            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\")});</script>";

        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }

        $this->gestionarvalores();

    }

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVA COTIZACION */
/*************************************************************/
    public function guardarsoportecotizacionmultiple()
    {
        $id    = $_GET['id'];
        $items = $_GET['des'];

        if (empty($_FILES['imagen']['name'])) {
            $ruta_imagen = $_POST['ruta1'];
        } else {
            $ruta_imagen = $this->subir_fichero('images/cotizaciones', 'imagen');
        }

        $requisicion_id       = $_POST['requisicion_id'];
        $fecha_reporte        = $_POST['fecha_reporte'];
        $marca_temporal       = $_POST['marca_temporal'];
        $usuario_creador      = $_POST['usuario_creador'];
        $usuario_aprobador    = $_POST['usuario_aprobador'];
        $estado_cotizacion    = $_POST['estado_cotizacion'];
        $ordencompra_num      = $_POST['ordencompra_num'];
        $insumo_id_insumo     = $_POST['insumo_id_insumo'];
        $servicio_id_servicio = $_POST['servicio_id_servicio'];
        $equipo_id_equipo     = $_POST['equipo_id_equipo'];
        $cantidadcot          = $_POST['cantidadcot'];
        $formapago1           = $_POST['formadepago'];
        $proveedor1           = $_POST['proveedor'];
        $cotizacion1          = $_POST['cotizacion_num'];
        $valor_cot1           = 0;

        $items = explode(",", $items);
        foreach ($items as $key => $despachounico) {

            // Validación si el item ya tiene soporte o no
            $verificacion = requisicionesitems::consultarsoporteporitem($despachounico, $cotizacion1);

            if ($verificacion == 0) {

                $res = Requisicionesitems::guardarsoportecotizacionmultiple($ruta_imagen, $proveedor1, $cotizacion1, $formapago1, $despachounico, $valor_cot1, $requisicion_id, $fecha_reporte, $marca_temporal, $usuario_creador, $usuario_aprobador, $estado_cotizacion, $ordencompra_num, $insumo_id_insumo, $servicio_id_servicio, $equipo_id_equipo, $cantidadcot);
            } else {

                $res = Requisicionesitems::actualizarsoportecotizacionmultiple($ruta_imagen, $despachounico, $cotizacion1);
            }
        }

        echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\")});</script>";

        $this->gestionarvalores();

    }

# ==========================================================
    # =           Función para eliminar Cotizaciones           =
    # ==========================================================

    public function eliminarcotizacion()
    {

        $id       = $_GET['id'];
        $des      = $_GET['des'];
        $iddelete = $_GET['iddelete'];

        $res = Requisicionesitems::eliminarcotizacion($iddelete);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\").then(function(){window.location='?controller=requisicionesitems&action=gestionarvalores&des=" . $des . "&id=" . $id . "';});});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }
        $this->gestionarvalores();

    }

# ======  End of Función para eliminar Cotizaciones  =======

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
        $campos = Requisicionesitems::todos();
        require_once 'vistas/requisicionesitems/todos.php';
    }

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
    public function guardar()
    {

        $id           = $_GET['id'];
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
        $campo = new Requisicionesitems('', $nuevoarreglo);
        $res   = Requisicionesitems::guardar($campo);
        if ($res) {
            // ?controller=requisicionesitems&&action=todosporreq&&id=61
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\").then(function(){window.location='?controller=requisicionesitems&&action=todosporreq&&id=" . $id . "';});});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }
        $this->showRequisicionesitemspor($id);
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function eliminar()
    {
        $ideliminar = $_GET['ideliminar'];
        $id         = $_GET['id'];
        $res        = Requisicionesitems::eliminarpor($ideliminar);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\").then(function(){window.location='?controller=requisicionesitems&&action=todosporreq&&id=" . $id . "';});});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Requisicionesitems::todosporreq($id);
        require_once 'vistas/requisicionesitems/todosporreq.php';
    }

    /*************************************************************/
/* FUNCION PARA NOTIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function finalizarrq()
    {
        $id  = $_GET['id'];
        $res = Requisicionesitems::finalizarpor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\").then(function(){window.location='?controller=requisicionesitems&&action=todosporreq&&id=" . $id . "';});});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Requisicionesitems::todosporreq($id);
        require_once 'vistas/requisicionesitems/todosporreq.php';
    }

/*************************************************************/
/* FUNCION PARA NOTIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function aprobarrq()
    {
        $id             = $_GET['idrq'];
        $items          = $_GET['itemsrq'];
        $userautoriza   = $_GET['userautoriza'];
        $estadoaprobado = 6;
        $observaciones  = "Item revisado y autorizado correctamente";
        # ======  Actulizar los items  =======
        $res = Requisicionesitems::aprobaritemsporRq($id);
        # ======  Actulizar estado RQ =======
        $res = Requisicionesitems::aprobarRqpor($id);
        # ======  Agregar Trazabilidad  =======

        $res = Requisicionesitems::guardartrazabilidad($estadoaprobado, $items, $userautoriza, $observaciones);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\")});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al Aprobar!\", \"No se han aprobado correctamente los datos\", \"error\");});</script>";
        }
        //$campos = Requisicionesitems::todosporreq($id);
        require_once 'vistas/almacen/homedirector.php';
    }

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
    public function editar()
    {
        $id        = $_GET['id'];
        $vereditar = $_GET['vereditar'];
        $campos    = Requisicionesitems::editarRequisicionesitemsPor($id);
        require_once 'vistas/requisicionesitems/formeditar.php';
    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function actualizar()
    {
        $id = $_GET['id'];
        if (empty($_FILES['imagen']['name'])) {
            $ruta_imagen = $_POST['ruta1'];
        } else {
            $ruta_imagen = $this->subir_fichero('images/Requisicionesitems', 'imagen');
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
                if ($campo == "imagen") {
                    $nuevoarreglo[$campo] = $ruta_imagen;
                } else {
                    $nuevoarreglo[$campo] = $valor;
                }
            }
        }

        $datosguardar = new Requisicionesitems($id, $nuevoarreglo);
        $res          = Requisicionesitems::actualizar($id, $datosguardar, $ruta_imagen);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->showRequisicionesitems();
    }

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function actualizaritem()
    {
        $id = $_GET['id'];

        $estado_item      = $_POST['estado_item'];
        $usuario_creador  = $_POST['usuario_creador'];
        $observacionestra = "Se han actualizado los campos de este Item";

        $variable     = $_POST;
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
        $datosguardar = new Requisicionesitems($id, $nuevoarreglo);
        $res          = Requisicionesitems::actualizaritem($id, $datosguardar);
        $res          = Requisicionesitems::guardartrazabilidad($estado_item, $id, $usuario_creador, $observacionestra);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->showveritem($id);
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
    public function showRequisicionesitems()
    {
        $campos = Requisicionesitems::todos();
        require_once 'vistas/requisicionesitems/todos.php';
    }
    public function showRequisicionesitemspor($id)
    {
        $campos = Requisicionesitems::todosporreq($id);
        require_once 'vistas/requisicionesitems/todosporreq.php';
    }

    public function showveritem($id)
    {
        $campos = Requisicionesitems::editarRequisicionesitemsPor($id);
        require_once 'vistas/requisicionesitems/formeditar.php';
    }

    public function showRequisicionesitemsadmin()
    {
        $campos = Requisicionesitems::todosporusuarioadmin();
        require_once 'vistas/requisiciones/todosadmin.php';
    }

    public function showtodosporusuario($id)
    {
        $campos = Requisicionesitems::todosporusuario($id);
        require_once 'vistas/requisiciones/todos.php';
    }

    public function showtodosporalmacen()
    {
        $campos = Requisicionesitems::todosalmacen();
        require_once 'vistas/requisiciones/todos.php';
    }

    public function showCotizaciones()
    {
        $campos = Requisicionesitems::cotizaciones();
        require_once 'vistas/requisiciones/cotizaciones.php';
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
