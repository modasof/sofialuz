<?php
class MovimientositemController
{
    public function __construct()
    {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

    public function todospor()
    {

        $item_id = $_GET['item_id'];
        $campos  = Movimientositem::todospor($item_id);
        require_once 'vistas/requisicionesitems/gestioncantidades.php';
    }

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
    public function guardar()
    {

        $item_id          = $_GET['item_id'];
        $totaldistribuido = $_GET['totaldistribuido'];
        $cantidadfinal    = $_GET['cantidadfinal'];


        $estadocotizacion     = 6;
        $estadoalmacen     = 12;
        $actividad            = $_POST['actividad'];
        $insumo_id_insumo     = $_POST['insumo_id_insumo'];
        $servicio_id_servicio = $_POST['servicio_id_servicio'];
        $equipo_id_equipo     = $_POST['equipo_id_equipo'];
        $fecha_reporte        = $_POST['fecha_reporte'];
        $cantidadsolicitada   = $_POST['cantidad'];
        $fecha_entrega        = $_POST['fecha_entrega'];
        $observaciones        = $_POST['observaciones'];
        $requisicion_id       = $_POST['requisicion_id'];
        $marca_temporal       = $_POST['marca_temporal'];
        $usuario_creador      = $_POST['usuario_creador'];
        $estado_item          = $_POST['estado_item'];
        $tipo_req             = $_POST['tipo_req'];
        $ordencompra_num      = $_POST['ordencompra_num'];

        $saldocantidades = $cantidadfinal - $cantidadsolicitada;

          
        if ($cantidadsolicitada>$cantidadfinal) {
             echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"Supera la cantidad máxima permitida\", \"warning\");});</script>";
        }
        else{


            if ($cantidadsolicitada==$cantidadfinal) {
                  # ======  Guardar movimiento Item  =======

            $res = Movimientositem::guardar($cantidadsolicitada, $estadoalmacen, $insumo_id_insumo, $fecha_reporte, $marca_temporal, $usuario_creador, $item_id);

                # ======  Actualiza Item original =======

            $res= Movimientositem::actualizaritemoriginal($item_id,$estadoalmacen);

            }
            else{

                 $res = Movimientositem::guardar($cantidadsolicitada, $estadoalmacen, $insumo_id_insumo, $fecha_reporte, $marca_temporal, $usuario_creador, $item_id);


                 $res = Movimientositem::guardar($saldocantidades, $estadocotizacion, $insumo_id_insumo, $fecha_reporte, $marca_temporal, $usuario_creador, $item_id);

                # ======  Guardar copia Item  =========
                  $res = Movimientositem::duplicaritem($actividad, $insumo_id_insumo, $servicio_id_servicio, $equipo_id_equipo, $fecha_reporte, $cantidadsolicitada, $fecha_entrega, $observaciones, $requisicion_id, $marca_temporal, $usuario_creador, $estadoalmacen, $tipo_req, $ordencompra_num, $item_id);
               # ======  Actualización Orden Original  =======

                $res= Movimientositem::actualizaritemduplicado($item_id,$saldocantidades,$estadocotizacion);
            }

         }
        
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
        }
        $this->todospor($item_id);
    }

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
function eliminar()
{
    $id      = $_GET['id'];
    $item_id = $_GET['item_id'];
    $res     = Movimientositem::eliminarPor($id);
    if ($res) {
        echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
    } else {
        echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
    }
    $campos = Movimientositem::todospor($item_id);
    require_once 'vistas/requisicionesitems/gestioncantidades.php';
}

}
