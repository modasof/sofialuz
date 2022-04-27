<?php
class InventarioController
{
    public function __construct()
    {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

    public function cargarentradaoc()
    {
        (isset($_GET['id'])) ? $getid = $_GET['id'] : $getid = '';
        $campos                       = Inventario::cargarentradaoc($getid);
        require_once 'vistas/inventario/cargarentradaoc.php';
    }

    public function cargarsalidasrq()
    {
        (isset($_GET['id'])) ? $getid     = $_GET['id'] : $getid     = '';
        (isset($_GET['des'])) ? $itemsget = $_GET['des'] : $getid = '';

        require_once 'vistas/inventario/cargarsalidarq.php';
    }

    public function vercompras()
    {
        $campos = Inventario::vercompras();
        require_once 'vistas/compras/recibiroc.php';
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

    public function entradasporfecha()
    {

        if (isset($_POST['daterange'])) {
            $fechaform = $_POST['daterange'];
        } elseif (isset($_GET['daterange'])) {
            $fechaform = $_GET['daterange'];
        }
        $campos = Inventario::totalentradas();
        require_once 'vistas/inventario/totalentradas.php';
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

    public function despachosporfecha()
    {

        if (isset($_POST['daterange'])) {
            $fechaform = $_POST['daterange'];
        } elseif (isset($_GET['daterange'])) {
            $fechaform = $_GET['daterange'];
        }
        require_once 'vistas/almacen/homealmacen.php';
    }

# -----------  Entradas por fecha y total Entradas  -----------

    public function totalentradas()
    {
        $campos = Inventario::totalentradas();
        require_once 'vistas/inventario/totalentradas.php';
    }


 /*=============================================
=  Section para visualizar todas los insumos por recibir           =
=============================================*/
    
    function entregaspendientesusuario() {
        $id=$_GET['id'];
        $estado="Despachado";
        $campos=Inventario::todosporusuariorecibir($id,$estado);;
        require_once 'vistas/inventario/recibirinsumos.php';
    }

 /*=============================================
=  Section para visualizar todas los insumos por recibir           =
=============================================*/
    
    function entregasrecibidasusuario() {
        $id=$_GET['id'];
        $estado="Recibido";
        $campos=Inventario::todosporusuariorecibir($id,$estado);;
        require_once 'vistas/inventario/detalle-salidas-porusuario.php';
    }


# -----------  Subsection comment block  -----------

    public function entradasdetalle()
    {
        $id     = $_GET['id'];
        $campos = Inventario::verentradasdetalle($id);
        require_once 'vistas/inventario/detalle-entradas.php';
    }

    public function entradasdetalletotal()
    {

        $campos = Inventario::verentradasdetalletotal();
        require_once 'vistas/inventario/detalle-entradas-total.php';
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

    public function salidasporfecha()
    {

        if (isset($_POST['daterange'])) {
            $fechaform = $_POST['daterange'];
        } elseif (isset($_GET['daterange'])) {
            $fechaform = $_GET['daterange'];
        }
        $campos = Inventario::totalsalidas();
        require_once 'vistas/inventario/totalsalidas.php';
    }
# -----------  Entradas por fecha y total Entradas  -----------

    public function totalsalidas()
    {
        $campos = Inventario::totalsalidas();
        require_once 'vistas/inventario/totalsalidas.php';
    }

# -----------  Subsection comment block  -----------

    public function salidasdetalle()
    {
        $id     = $_GET['id'];
        $campos = Inventario::versalidasdetalle($id);
        require_once 'vistas/inventario/detalle-salidas.php';
    }

    public function kardexporinsumo()
    {
        $id     = $_GET['id'];
        $campos = Inventario::verkardexinsumo($id);
        require_once 'vistas/inventario/kardexinsumo.php';

    }

    public function salidasdetalletotal()
    {
        $campos = Inventario::versalidasdetalletotal();
        require_once 'vistas/inventario/detalle-salidas-total.php';
    }

    # ===================================================
    # =           Funciones Inventario Actual           =
    # ===================================================

    public function verinventario()
    {
        $campos = Inventario::verlistadoinsumos();
        require_once 'vistas/inventario/verinventario.php';
    }

    # ======  End of Funciones Inventario Actual  =======

    /*************************************************************/
/* FUNCION PARA GUARDADO PAGO TEMPORAL */
/*************************************************************/
    public function guardarentradadetalletem()
    {
        $id = $_GET['id'];

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
        $campo = new Inventario('', $nuevoarreglo);
        $res   = Inventario::guardarentradadetalletem($campo);

        if ($res) {
            # ======  Se redirecciona a la url original para eviar doble envío de datos  =======
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\").then(function(){window.location='?controller=inventario&&action=cargarentradaoc&&id=" . $id . "';});});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->cargarentradaoc();

    }

    /*************************************************************/
/* FUNCION PARA GUARDADO PAGO TEMPORAL */
/*************************************************************/
    public function guardarsalidadetalletem()
    {
        $id       = $_GET['id'];
        $itemsget = $_GET['des'];

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
        $campo = new Inventario('', $nuevoarreglo);
        $res   = Inventario::guardarsalidadetalletem($campo);

        if ($res) {
            # ======  Se redirecciona a la url original para eviar doble envío de datos  =======

            echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han actualizado correctamente los datos\", \"success\");});</script>";

            //echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\").then(function(){window.location='?controller=inventario&action=cargarsalidasrq&des=" . $itemsget . "&id=" . $id . "';});});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->cargarsalidasrq();

    }

    # =============================================
    # =           Section Eliminar entradas temporales           =
    # =============================================

    public function deletedellsalidatemp()
    {
        $id       = $_GET['id'];
        $itemsget = $_GET['des'];
        $iddelete = $_GET['iddelete'];

        $res = Inventario::deletedellsalidatemp($iddelete);
        if ($res) {
            # ======  Se redirecciona a la url original para eviar doble envío de datos  =======
             echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han actualizado correctamente los datos\", \"success\");});</script>";
           // echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\").then(function(){window.location='?controller=inventario&action=cargarsalidasrq&des=" . $itemsget . "&id=" . $id . "';});});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->cargarsalidasrq();

    }

    # =============================================
    # =           Section Eliminar Salidas temporales           =
    # =============================================

    public function deletedellentradatemp()
    {
        $id       = $_GET['id'];
        $iddelete = $_GET['iddelete'];

        $res = Inventario::deletedellentradatemp($iddelete);
        if ($res) {
            # ======  Se redirecciona a la url original para eviar doble envío de datos  =======
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han actualizado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->cargarentradaoc();

    }

     # =============================================
    # =           Section Aceptar Despachos           =
    # =============================================

    public function recibirdespacho()
    {
        $idsalida       = $_GET['id'];
        $idusuario = $_GET['idusuario'];
        $estado="Despachado";

        $res = Inventario::actualizarestadodespacho($idusuario, $idsalida);
        $res = Inventario::actualizardetalledespacho($idsalida);
        if ($res) {
            # ======  Se redirecciona a la url original para eviar doble envío de datos  =======
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han actualizado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        
        $campos=Inventario::todosporusuariorecibir($idusuario,$estado);;
        require_once 'vistas/inventario/recibirinsumos.php';

    }

    # =========================================================================
    # =           Actualizar las Entradas Temporales con Id Entrada           =
    # =========================================================================

    public function actualizarentradaoc()
    {
        $id             = $_GET['id'];
        $fecha_reporte  = $_POST['fecha_reporte'];
        $marca_temporal = $_POST['marca_temporal'];
        $creado_por     = $_POST['creado_por'];
        $tipo_entrada   = $_POST['tipo_entrada'];
        $observaciones  = $_POST['observaciones'];
        $ocid           = $_POST['ocid'];
        $estadoOC       = $_POST['estadoOC'];
        $estadoItem     = 12;

        # -----------  Guardado de Entrada  -----------

        $res = Inventario::guardarentradains($fecha_reporte, $marca_temporal, $creado_por, $tipo_entrada, $observaciones);

        # -----------  Actualización de Id Entrada en detalle entradas  -----------

        $ultimoid    = Inventario::obtenerultimoid();
        $estadofinal = 1;
        $res         = Inventario::actualizardetalleentrada($ultimoid, $estadofinal, $ocid);
        $res         = Inventario::actualizarestadoOC($ocid, $estadoOC);
        $res         = Inventario::actualizarestadoItemsOC($ocid, $estadoItem);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han actualizado correctamente los datos\", \"success\");});</script>";
            //echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\").then(function(){window.location='?controller=compras&&action=recibiroc';});});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\").then(function(){window.location='?controller=compras&&action=recibiroc';});});</script>";
            //echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->vercompras();

    }

    # =========================================================================
    # =           Actualizar las Salidas Temporales con Id Salida           =
    # =========================================================================

    public function actualizarsalidarq()
    {
        $id       = $_GET['id'];
        $itemsget = $_GET['des'];

        $items                = $_POST['items'];
        $fecha_reporte        = $_POST['fecha_reporte'];
        $proyecto_id_proyecto = $_POST['proyecto_id_proyecto'];
        $requisicion_id       = $_POST['requisicion_id'];
        $marca_temporal       = $_POST['marca_temporal'];
        $creado_por           = $_POST['creado_por'];
        $recibido_por         = $_POST['recibido_por'];
        $observaciones        = $_POST['observaciones'];
        $tipo_salida          = $_POST['tipo_salida'];
        $estado_salida        = $_POST['estado_salida'];
        $fecha_recepcion      = $_POST['fecha_recepcion'];
        $solicitado_por       = $_POST['solicitado_por'];
        $aplica_equipo        = $_POST['aplica_equipo'];
        $equipo_id_equipo     = $_POST['equipo_id_equipo'];
        $valor_salida         = $_POST['valor_salida'];
        $estadoOC             = $_POST['estadoOC'];

        $nombrerecibe = Usuarios::obtenerNombreUsuario($recibido_por);

       

        if ($estadoOC=="Entrega Parcial") {
             $estadofinalrq = 13;
        }
        else if ($estadoOC=="Entrega Completa"){
             $estadofinalrq = 14;
        }

        # -----------  Guardado de Salida  -----------

        $res = Inventario::guardarsalidains($fecha_reporte, $proyecto_id_proyecto, $aplica_equipo, $equipo_id_equipo, $requisicion_id, $marca_temporal, $solicitado_por, $creado_por, $recibido_por, $observaciones, $tipo_salida, $valor_salida, $estado_salida, $fecha_recepcion);

        # -----------  Actualización de Id Salida en detalle entradas  -----------

        $idsalida      = Inventario::obtenerultimoidsalida();

        $observacionestrazabilidad="Se notifica despacho al usuario ".$nombrerecibe." con salida N.".$idsalida." en estado ".$estadoOC;
       
        $res           = Inventario::actualizardetallesalida($idsalida, $estadoOC, $items);
        $res           = Inventario::actualizarestadoRqfinalizada($estadofinalrq, $items);

        $res           =Inventario::guardartrazabilidad($estadofinalrq, $items, $creado_por, $observacionestrazabilidad);

        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos Actualizados!\", \"Se han actualizado correctamente los datos\", \"success\");});</script>";

            //echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\").then(function(){window.location='?controller=inventario&&action=totalsalidas';});});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados2!\", \"Se ha actualizado correctamente la pagina \", \"success\")});</script>";
            //echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
        $this->totalsalidas();

    }

}
