<?php
/**
 * CLASE PARA TRABAJAR CON LAS FUNCIONES
 */
class Movimientositem
{
    private $id;
    private $campos; //devuelve todos los campos de la tabla

    public function __construct($id, $campos)
    {
        $this->setId($id);
        $this->setCampos($campos);
    }

    /************************************************************************************
     ** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA       ***
    /***********************************************************************************/

    //ESTABLECER Y OBTENER ID
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        //Establece el nuevo valor del campo
        $this->id = $id;
    }

    //ESTABLECER Y OBTENER LOS CAMPOS
    public function getCampos()
    {
        return $this->campos;
    }
    public function setCampos($campos)
    {
        //Establece el nuevo valor del campo
        $this->campos = $campos;
    }

/***************************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
 ***************************************************************/
    public static function todosPor($id)
    {
        try {
            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM movimientositem WHERE item_id='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Movimientositem('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCION PARA ELIINAR POR ID  **
 ***************************************************************/
    public static function eliminarPor($id)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("DELETE FROM movimientositem WHERE id='" . $id . "'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
 ***************************************************************/
    public static function guardar($cantidadenviada, $estado_mov_item, $insumo_id_insumo, $fecha_reporte, $marca_temporal, $usuario_creador, $item_id)
    {
        try {
            $db = Db::getConnect();
            //$campostraidos = $campos->getCampos();
            //extract($campostraidos);

            $insert = $db->prepare('INSERT INTO movimientositem VALUES (NULL,:cantidad,:estado_mov_item,:insumo_id_insumo,:fecha_reporte,:marca_temporal,:creado_por,:item_id)');

            $insert->bindValue('cantidad', $cantidadenviada);
            $insert->bindValue('estado_mov_item', $estado_mov_item);
            $insert->bindValue('insumo_id_insumo', $insumo_id_insumo);
            $insert->bindValue('fecha_reporte', $fecha_reporte);
            $insert->bindValue('marca_temporal', $marca_temporal);
            $insert->bindValue('creado_por', $usuario_creador);
            $insert->bindValue('item_id', $item_id);
            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
INSERT INTO `requisiciones_items`(`id`, `actividad`, `insumo_id_insumo`, `fecha_reporte`, `cantidad`, `fecha_entrega`, `observaciones`, `requisicion_id`, `marca_temporal`, `usuario_creador`, `estado_item`)
 ***************************************************************/
    public static function duplicaritem($actividad, $insumo_id_insumo, $servicio_id_servicio, $equipo_id_equipo, $fecha_reporte, $cantidad, $fecha_entrega, $observaciones, $requisicion_id, $marca_temporal, $usuario_creador, $estado_item, $tipo_req, $ordencompra_num, $duplicado_de)
    {
        try {
            $db = Db::getConnect();

            $insert = $db->prepare('INSERT INTO requisiciones_items VALUES (NULL,:actividad,:insumo_id_insumo,:servicio_id_servicio,:equipo_id_equipo,:fecha_reporte,:cantidad,:fecha_entrega,:observaciones,:requisicion_id,:marca_temporal,:usuario_creador,:estado_item,:tipo_req,:ordencompra_num,:duplicado_de)');

            $t          = strtotime($fecha_entrega);
            $nuevafecha = date('y-m-d', $t);

            $insert->bindValue('actividad', utf8_decode($actividad));
            $insert->bindValue('insumo_id_insumo', utf8_decode($insumo_id_insumo));
            $insert->bindValue('servicio_id_servicio', utf8_decode($servicio_id_servicio));
            $insert->bindValue('equipo_id_equipo', utf8_decode($equipo_id_equipo));
            $insert->bindValue('fecha_reporte', utf8_decode($fecha_reporte));
            $insert->bindValue('cantidad', utf8_decode($cantidad));
            $insert->bindValue('fecha_entrega', utf8_decode($nuevafecha));
            $insert->bindValue('observaciones', utf8_decode($observaciones));
            $insert->bindValue('requisicion_id', utf8_decode($requisicion_id));
            $insert->bindValue('marca_temporal', utf8_decode($marca_temporal));
            $insert->bindValue('usuario_creador', utf8_decode($usuario_creador));
            $insert->bindValue('estado_item', utf8_decode($estado_item));
            $insert->bindValue('tipo_req', utf8_decode($tipo_req));
            $insert->bindValue('ordencompra_num', utf8_decode($ordencompra_num));
            $insert->bindValue('duplicado_de', utf8_decode($duplicado_de));
            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

/********************************************************************
 *** FUNCION PARA MODIFICAR ****
 ********************************************************************/
    public static function actualizaritemduplicado($item_id, $saldocantidades, $estadocotizacion)
    {
        try {
            $db     = Db::getConnect();
            $update = $db->prepare('UPDATE requisiciones_items SET
								cantidad= :cantidad,
								estado_item=:estado_item
								WHERE id=:id');
            $update->bindValue('cantidad', $saldocantidades);
            $update->bindValue('estado_item', $estadocotizacion);
            $update->bindValue('id', $item_id);
            $update->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuración ":{"text":' . $e->getMessage() . '}}';
        }
    }

  /********************************************************************
 *** FUNCION PARA MODIFICAR ****
 ********************************************************************/
    public static function actualizaritemoriginal($item_id,$estadonuevo)
    {
        try {
            $db     = Db::getConnect();
            $update = $db->prepare('UPDATE requisiciones_items SET
								estado_item=:estado_item
								WHERE id=:id');
            $update->bindValue('estado_item', $estadonuevo);
            $update->bindValue('id', $item_id);
            $update->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuración ":{"text":' . $e->getMessage() . '}}';
        }
    }
/*******************************************************
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
 ********************************************************/
    public static function ObtenerSumaCantidades($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT IFNULL(SUM(cantidad),0) as total FROM movimientositem WHERE item_id='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Unidadesmed('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['total'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    /*******************************************************
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
 ********************************************************/
    public static function ObtenerSumaCantidadescot($id,$estado)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT IFNULL(SUM(cantidad),0) as total FROM movimientositem WHERE item_id='" . $id . "' and estado_mov_item='".$estado."'");
            $camposs = $select->fetchAll();
            $campos  = new Unidadesmed('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['total'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

}
