<?php
/**
 * CLASE PARA TRABAJAR CON LAS MARCAS
 */
class Requisicionesitems
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
*** FUNCION PARA GUARDAR **
* 
* (`id`, `usuario_creador`, `accion`, `usuario_receptor`, `rol_receptor`, `estado_alerta`, `fecha_reporte`, `marca_temporal`, `fecha_leida`, `marca_leida`, `detalle`)
***************************************************************/
public static function guardarnotificacion($usuario_creador,$usuario_receptor,$marca_temporal,$fecha_reporte,$detalle){
    try {
        $db=Db::getConnect();
        
        $select=$db->query("INSERT INTO modulo_alertas (usuario_creador,usuario_receptor,marca_temporal,fecha_reporte,detalle) VALUES ('".utf8_decode($usuario_creador)."','".$usuario_receptor."','".utf8_decode($marca_temporal)."','".utf8_decode($fecha_reporte)."','".utf8_decode($detalle)."')");
        if ($select){
            return true;
            }else{return false;}
    }
    catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
********************************************************/
public static function obtenerNombreProveedor($id){
    try {
        $db=Db::getConnect();
        $select=$db->query("SELECT nombre_proveedor FROM proveedores WHERE id_proveedor='".$id."'");
        $camposs=$select->fetchAll();
        $campos = new Requisicionesitems('',$camposs);
        $marcas = $campos->getCampos();
        foreach($marcas as $marca){
            $mar = $marca['nombre_proveedor'];
        }
        return $mar;
    }
    catch(PDOException $e) {
        echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
    }
}


/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/

    public static function ReporteVentasOrderId($getid)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM requisiciones_items WHERE requisicion_id='" . $getid . "' order by id DESC");
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/

    public static function datostrazabilidad($id)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT * FROM trazabilidad_items WHERE item_id='" . $id . "' order by id DESC";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function todos()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM requisiciones_items WHERE item_publicado='1' order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function listaRqusuarios()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT DISTINCT(usuario_creador) FROM requisiciones order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function listaRqusuariospor($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT id,tipo_requisicion FROM requisiciones WHERE usuario_creador='" . $id . "' order by id DESC");
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }


/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function trazabilidadmisitems($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT A.id, A.fecha_reporte, A.usuario_creador, A.estadoreq_id, A.item_id, A.observaciones, A.marca_temporal FROM trazabilidad_items AS A, requisiciones_items as B, requisiciones as C WHERE A.item_id=B.id AND B.requisicion_id=C.id and C.solicitado_por='".$id."'");
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function listaRqusuariositems()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT usuario_creador FROM requisiciones_items WHERE estado_item='1' and item_publicado='1' order by id DESC");
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function despachosporfecha($FechaStart, $FechaEnd)
    {
        try {
            $db      = Db::getConnect();
            $sql="SELECT * FROM requisiciones_items WHERE fecha_entrega >='" . $FechaStart . "' and fecha_entrega <='" . $FechaEnd . "' and estado_item<>'11' order by fecha_entrega DESC";
            //echo ($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function todosporreq($id)
    {
        try {
            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM requisiciones_items WHERE requisicion_id='" . $id . "' and item_publicado='1' order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function todosporusuario($id)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT * FROM requisiciones_items WHERE usuario_creador='" . $id . "' and item_publicado='1' order by fecha_reporte DESC";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function todosporalmacen()
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT * FROM requisiciones_items WHERE estado_item='1' and item_publicado='1' order by fecha_reporte DESC";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function todosporusuarioadmin()
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT * FROM requisiciones_items WHERE estado_item='1' and item_publicado='1' order by fecha_reporte DESC";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function todosporusuarioestado($id, $estadosolicitado)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT * FROM requisiciones_items WHERE usuario_creador='" . $id . "' and estado_item='" . $estadosolicitado . "' and item_publicado='1' order by fecha_reporte DESC";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function todosporalmacenestado($estadosolicitado)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT * FROM requisiciones_items WHERE  estado_item='" . $estadosolicitado . "' and item_publicado='1' order by fecha_reporte DESC";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function todosalmacen()
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT * FROM requisiciones_items WHERE estado_item='1' and item_publicado='1' order by fecha_reporte DESC";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA      **
 ********************************************************/
    public static function porfecha($FechaStart, $FechaEnd, $id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM requisiciones_items WHERE fecha_reporte >='" . $FechaStart . "' and fecha_reporte <='" . $FechaEnd . "' and requisicion_id='" . $id . "' and item_publicado='1' order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS POR RANGO DE FECHA      **
 ********************************************************/
    public static function porfechaUsuario($FechaStart, $FechaEnd, $id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM requisiciones_items WHERE fecha_reporte >='" . $FechaStart . "' and fecha_reporte <='" . $FechaEnd . "' and usuario_creador='" . $id . "' and item_publicado='1' order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
 ***************************************************************/
    public static function guardar($campos)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);

            $insert = $db->prepare('INSERT INTO requisiciones_items VALUES (NULL,:actividad,:insumo_id_insumo,:servicio_id_servicio,:equipo_id_equipo,:fecha_reporte,:cantidad,:fecha_entrega,:observaciones,:requisicion_id,:marca_temporal,:usuario_creador,:estado_item,:item_publicado,:tipo_req,:ordencompra_num,:duplicado_de)');

            $t          = strtotime($fecha_entrega);
            $nuevafecha = date('y-m-d', $t);
            $itempublicado=1;

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
             $insert->bindValue('item_publicado', utf8_decode($itempublicado));
            $insert->bindValue('tipo_req', utf8_decode($tipo_req));
            $insert->bindValue('ordencompra_num', utf8_decode($ordencompra_num));
            $insert->bindValue('duplicado_de', utf8_decode($duplicado_de));
            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR COTIZACION **
 ***************************************************************/
    public static function guardarcotizacion($campos)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);

            $insert = $db->prepare('INSERT INTO cotizaciones_item VALUES (NULL,:proveedor_id_proveedor,:cotizacion,:medio_pago,:item_id,:valor_cot,:requisicion_id,:marca_temporal,:usuario_creador,:estado_cotizacion,:ordencompra_num,:insumo_id_insumo,:vr_unitario,:iva,:valor_iva,:cantidadcot,:id_factura)');

            $V1          = str_replace(".", "", $valor_cot);
            $V2          = str_replace(" ", "", $V1);
            $valor_final = str_replace("$", "", $V2);
            $valornumero = (int) $valor_final;
            $vrunitario  = round($valornumero / $cantidadcot, 0);

            $insert->bindValue('proveedor_id_proveedor', utf8_decode($proveedor_id_proveedor));
            $insert->bindValue('cotizacion', utf8_decode($cotizacion));
            $insert->bindValue('medio_pago', utf8_decode($medio_pago));
            $insert->bindValue('item_id', utf8_decode($item_id));
            $insert->bindValue('valor_cot', utf8_decode($valornumero));
            $insert->bindValue('requisicion_id', utf8_decode($requisicion_id));
            $insert->bindValue('marca_temporal', utf8_decode($marca_temporal));
            $insert->bindValue('usuario_creador', utf8_decode($usuario_creador));
            $insert->bindValue('estado_cotizacion', utf8_decode($estado_cotizacion));
            $insert->bindValue('ordencompra_num', utf8_decode($ordencompra_num));
            $insert->bindValue('insumo_id_insumo', utf8_decode($insumo_id_insumo));
            $insert->bindValue('vr_unitario', utf8_decode($vrunitario));
            $insert->bindValue('iva', utf8_decode($iva));
            $insert->bindValue('valor_iva', utf8_decode($valor_iva));
            $insert->bindValue('cantidadcot', utf8_decode($cantidadcot));
             $insert->bindValue('id_factura', utf8_decode($id_factura));
            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }


/***************************************************************
 *** FUNCION PARA GUARDAR COTIZACION **
 ***************************************************************/
    public static function guardarsoportecotizacionmultiple($imagen,$proveedor_id_proveedor, $cotizacion, $medio_pago, $items, $valor_cot, $requisicion_id, $fecha_reporte, $marca_temporal, $usuario_creador, $usuario_aprobador, $estado_cotizacion, $ordencompra_num, $insumo_id_insumo, $servicio_id_servicio, $equipo_id_equipo, $cantidadcot)
    {

        try {

            $db       = Db::getConnect();
          
                $insert = $db->prepare('INSERT INTO cotizaciones_item VALUES (NULL,:imagen,:proveedor_id_proveedor,:cotizacion,:medio_pago,:item_id,:valor_cot,:requisicion_id,:fecha_reporte,:marca_temporal,:usuario_creador,:usuario_aprobador,:estado_cotizacion,:ordencompra_num,:insumo_id_insumo,:servicio_id_servicio,:equipo_id_equipo,:vr_unitario,:iva,:valor_iva,:cantidadcot,:id_factura)');

            $insert->bindValue('imagen', utf8_decode($imagen));
            $insert->bindValue('proveedor_id_proveedor', utf8_decode($proveedor_id_proveedor));
            $insert->bindValue('cotizacion', utf8_decode($cotizacion));
            $insert->bindValue('medio_pago', utf8_decode($medio_pago));
            $insert->bindValue('item_id', utf8_decode($items));
            $insert->bindValue('valor_cot', utf8_decode($valor_cot));
            $insert->bindValue('requisicion_id', utf8_decode($requisicion_id));
            $insert->bindValue('fecha_reporte', utf8_decode($fecha_reporte));
            $insert->bindValue('marca_temporal', utf8_decode($marca_temporal));
            $insert->bindValue('usuario_creador', utf8_decode($usuario_creador));
            $insert->bindValue('usuario_aprobador', utf8_decode($usuario_aprobador));
            $insert->bindValue('estado_cotizacion', utf8_decode($estado_cotizacion));
            $insert->bindValue('ordencompra_num', utf8_decode($ordencompra_num));
            $insert->bindValue('insumo_id_insumo', utf8_decode($insumo_id_insumo));
            $insert->bindValue('servicio_id_servicio', utf8_decode($servicio_id_servicio));
            $insert->bindValue('equipo_id_equipo', utf8_decode($equipo_id_equipo));
            $insert->bindValue('vr_unitario', utf8_decode($valor_cot));
            $insert->bindValue('iva', utf8_decode($valor_cot));
            $insert->bindValue('valor_iva', utf8_decode($valor_cot));
            $insert->bindValue('cantidadcot', utf8_decode($cantidadcot));
            $insert->bindValue('id_factura', utf8_decode(0));

            $insert->execute();

        } catch (PDOException $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }

    }
/***************************************************************
 *** FUNCION PARA GUARDAR **
 ***************************************************************/
    public static function actualizarsoportecotizacionmultiple($imagen,$items,$cotizacion1)
    {
        try {

            $db     = Db::getConnect();
            $select = $db->query("UPDATE cotizaciones_item SET imagen='".$imagen."' WHERE item_id='" . $items . "' and cotizacion='".$cotizacion1."'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }
    }



/***************************************************************
 *** FUNCION PARA GUARDAR COTIZACION **
 ***************************************************************/
    public static function guardarcotizacionmultiple($proveedor_id_proveedor, $cotizacion, $item_id, $valor_cot, $requisicion_id, $marca_temporal, $usuario_creador,$insumo_id_insumo, $servicio_id_servicio, $equipo_id_equipo, $cantidadcot)
    {
        try {

             $db     = Db::getConnect();

            $V1          = str_replace(".", "", $valor_cot);
            $V2          = str_replace(" ", "", $V1);
            $valor_final = str_replace("$", "", $V2);
            $valornumero = (int) $valor_final;

            $vrunitario = round($valornumero / $cantidadcot, 0);
            $sql="UPDATE cotizaciones_item SET valor_cot='".$valornumero."',insumo_id_insumo='".$insumo_id_insumo."', servicio_id_servicio='".$servicio_id_servicio."',equipo_id_equipo='".$equipo_id_equipo."', vr_unitario='".$vrunitario."', cantidadcot='".$cantidadcot."', usuario_creador='".$usuario_creador."', marca_temporal='".$marca_temporal."', requisicion_id='".$requisicion_id."' WHERE item_id='" . $item_id . "' and cotizacion='".$cotizacion."' and proveedor_id_proveedor='".$proveedor_id_proveedor."'";
            $select = $db->query($sql);
            //echo($sql);
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }


/***************************************************************
 ** FUNCION PARA ELIINAR POR ID  **
 ***************************************************************/
    public static function eliminarpor($id)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE requisiciones_items SET item_publicado='0' WHERE id='" . $id . "'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCION PARA ELIINAR POR ID  **
 ***************************************************************/
    public static function finalizarpor($id)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE requisiciones SET requisicion_publicada='1' WHERE id='" . $id . "'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCION PARA ELIINAR POR ID  **
 ***************************************************************/
    public static function aprobarRqpor($id)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE requisiciones SET requisicion_publicada='2' WHERE id='" . $id . "'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCION PARA ELIINAR POR ID  **
 ***************************************************************/
    public static function aprobaritemsporRq($id)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE requisiciones_items SET estado_item='6' WHERE requisicion_id='" . $id . "'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCION PARA ELIINAR POR ID  **
 ***************************************************************/
    public static function eliminarcotizacion($id)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE cotizaciones_item SET valor_cot='0', vr_unitario='0' WHERE id='" . $id . "'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
 ***************************************************************/
    public static function editarRequisicionesitemsPor($id)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT * FROM requisiciones_items WHERE id='" . $id . "' and item_publicado='1'";
            //echo ($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
 ***************************************************************/
    public static function actualizarcantidadcot($id, $cantidadcot, $valor_cot)
    {
        try {

            $db     = Db::getConnect();
            $update = $db->prepare('UPDATE cotizaciones_item SET
                                cantidadcot=:cantidadcot,
                                valor_cot=:valor_cot
                                WHERE id=:id');
            $update->bindValue('cantidadcot', utf8_decode($cantidadcot));
            $update->bindValue('valor_cot', utf8_decode($valor_cot));
            $update->bindValue('id', utf8_decode($id));
            $update->execute();
            return true;

        } catch (PDOException $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }
    }

/********************************************************************
 *** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
 * `id`, `actividad`, `insumo_id_insumo`, `servicio_id_servicio`, `equipo_id_equipo`, `fecha_reporte`, `cantidad`, `fecha_entrega`, `observaciones`, `requisicion_id`, `marca_temporal`, `usuario_creador`, `estado_item`, `tipo_req`, `ordencompra_num`
 ********************************************************************/
    public static function actualizaritem($id, $campos)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);

            $update = $db->prepare('UPDATE requisiciones_items SET
                                actividad=:actividad,
                                insumo_id_insumo=:insumo_id_insumo,
                                servicio_id_servicio=:servicio_id_servicio,
                                equipo_id_equipo=:equipo_id_equipo,
                                fecha_reporte=:fecha_reporte,
                                cantidad=:cantidad,
                                fecha_entrega=:fecha_entrega,
                                observaciones=:observaciones,
                                requisicion_id=:requisicion_id,
                                marca_temporal=:marca_temporal,
                                usuario_creador=:usuario_creador,
                                estado_item=:estado_item,
                                item_publicado=:item_publicado,
                                tipo_req=:tipo_req,
                                ordencompra_num=:ordencompra_num,
                                duplicado_de=:duplicado_de
                                WHERE id=:id');

            $t          = strtotime($fecha_reporte);
            $nuevafecha = date('y-m-d', $t);

            $t           = strtotime($fecha_entrega);
            $nuevafecha2 = date('y-m-d', $t);

            $estadopublicado=1; // Estado generico para los Item Rq

            $update->bindValue('actividad', utf8_decode($actividad));
            $update->bindValue('insumo_id_insumo', utf8_decode($insumo_id_insumo));
            $update->bindValue('servicio_id_servicio', utf8_decode($servicio_id_servicio));
            $update->bindValue('equipo_id_equipo', utf8_decode($equipo_id_equipo));
            $update->bindValue('fecha_reporte', utf8_decode($nuevafecha));
            $update->bindValue('cantidad', utf8_decode($cantidad));
            $update->bindValue('fecha_entrega', utf8_decode($nuevafecha2));
            $update->bindValue('observaciones', utf8_decode($observaciones));
            $update->bindValue('requisicion_id', utf8_decode($requisicion_id));
            $update->bindValue('marca_temporal', utf8_decode($marca_temporal));
            $update->bindValue('usuario_creador', utf8_decode($usuario_creador));
            $update->bindValue('estado_item', utf8_decode($estado_item));
            $update->bindValue('item_publicado', utf8_decode($estadopublicado));
            $update->bindValue('tipo_req', utf8_decode($tipo_req));
            $update->bindValue('ordencompra_num', utf8_decode($ordencompra_num));
            $update->bindValue('duplicado_de', utf8_decode($duplicado_de));
            $update->bindValue('id', utf8_decode($id));

            $update->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }
    }
/********************************************************************
 *** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
 * (`id`, `imagen`, `fecha_reporte`, `solicitado_por`, `requisicion_num`, `cliente_id_cliente`, `proyecto_id_proyecto`, `marca_temporal`, `usuario_creador`, `requisicion_publicada`, `estado_id_requisicion`, `observaciones`)
 ********************************************************************/
    public static function actualizar($id, $campos, $imagen)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);

            $update = $db->prepare('UPDATE requisiciones_items SET
                                imagen=:imagen,
                                fecha_reporte=:fecha_reporte,
                                solicitado_por=:solicitado_por,
                                requisicion_num=:requisicion_num,
                                cliente_id_cliente=:cliente_id_cliente,
                                proyecto_id_proyecto=:proyecto_id_proyecto,
                                creado_por=:creado_por,
                                estado_requisicion=:estado_requisicion,
                                publicada=:publicada,
                                marca_temporal=:marca_temporal,
                                observaciones=:observaciones
                                WHERE id=:id');

            $t          = strtotime($fecha_reporte);
            $nuevafecha = date('y-m-d', $t);

            $update->bindValue('imagen', utf8_decode($imagen));
            $update->bindValue('fecha_reporte', utf8_decode($nuevafecha));
            $update->bindValue('solicitado_por', utf8_decode($solicitado_por));
            $update->bindValue('requisicion_num', utf8_decode($requisicion_num));
            $update->bindValue('cliente_id_cliente', utf8_decode($cliente_id_cliente));
            $update->bindValue('proyecto_id_proyecto', utf8_decode($proyecto_id_proyecto));
            $update->bindValue('creado_por', utf8_decode($creado_por));
            $update->bindValue('estado_requisicion', utf8_decode($estado_requisicion));
            $update->bindValue('publicada', utf8_decode($publicada));
            $update->bindValue('marca_temporal', utf8_decode($marca_temporal));
            $update->bindValue('observaciones', utf8_decode($observaciones));
            $update->bindValue('id', utf8_decode($id));

            $update->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
 ***************************************************************/
    public static function actualizarestado($estado_item, $items)
    {
        try {
            $db       = Db::getConnect();
            $dbselect = Db::getConnect();
            //$campostraidos = $campos->getCampos();
            $items = explode(",", $items);
            foreach ($items as $key => $despachounico) {
                $update = $db->prepare('UPDATE requisiciones_items SET
                                estado_item=:estado_item
                                WHERE id=:despachounico');
                $update->bindValue('estado_item', utf8_decode($estado_item));
                $update->bindValue('despachounico', utf8_decode($despachounico));
                $update->execute();
            }
            return $estado_item;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function vercotizacion($id)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT A.id, A.proveedor_id_proveedor, A.cotizacion, A.medio_pago, A.item_id, A.valor_cot, A.requisicion_id, A.marca_temporal, A.usuario_creador, A.estado_cotizacion, A.ordencompra_num, B.insumo_id_insumo,B.cantidad,A.cantidadcot FROM cotizaciones_item as A, requisiciones_items as B WHERE estado_cotizacion='1' and proveedor_id_proveedor='" . $id . "' and A.item_id=B.id order by id DESC";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }
/***************************************************************
 *** FUNCION PARA  **
 ***************************************************************/
    public static function actualizarestadooc($estado_item, $items)
    {
        try {

            $db = Db::getConnect();
            foreach ($_POST['items'] as $despachounico) {
                $update = $db->prepare('UPDATE requisiciones_items SET
                                estado_item=:estado_item
                                WHERE id=:despachounico');
                $update->bindValue('estado_item', utf8_decode($estado_item));
                $update->bindValue('despachounico', utf8_decode($despachounico));
                $update->execute();
            }
            return $estado_item;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
 * `id`, `imagen`, `fecha_reporte`, `valor_total`, `valor_retenciones`, `estado_orden`, `proveedor_id_proveedor`, `medio_pago`, `observaciones`, `marca_temporal`, `usuario_creador`
 ***************************************************************/

    public static function guardaroccompra($imagen,$imagen_cot, $fecha_reporte, $valor_total, $valor_retenciones, $valor_iva, $estado_orden, $proveedor_id_proveedor, $medio_pago, $observaciones, $marca_temporal, $usuario_creador, $items, $rubro_id,$subrubro_id,$factura, $estado_recibido, $compra_de)
    {
        try {
            $db = Db::getConnect();
            //$campostraidos = $campos->getCampos();
            //extract($campostraidos);

            $insert = $db->prepare('INSERT INTO ordenescompra VALUES (NULL,:imagen,:imagen_cot,:fecha_reporte,:valor_total,:valor_retenciones,:valor_iva,:estado_orden,:proveedor_id_proveedor,:medio_pago,:observaciones,:marca_temporal,:usuario_creador,:rubro_id,:subrubro_id,:vencimiento,:factura,:estado_recibido,:compra_de,:id_factura_compra)');

            $V1          = str_replace(".", "", $valor_total);
            $V2          = str_replace(" ", "", $V1);
            $valor_final = str_replace("$", "", $V2);
            $valornumero = (int) $valor_final;

           
            $vencimiento = 0;
            $insert->bindValue('imagen', utf8_decode($imagen));
             $insert->bindValue('imagen_cot', utf8_decode($imagen_cot));
            $insert->bindValue('fecha_reporte', utf8_decode($fecha_reporte));
            $insert->bindValue('valor_total', utf8_decode($valornumero));
            $insert->bindValue('valor_retenciones', utf8_decode($valor_retenciones));
            $insert->bindValue('valor_iva', utf8_decode($valor_iva));
            $insert->bindValue('estado_orden', utf8_decode($estado_orden));
            $insert->bindValue('proveedor_id_proveedor', utf8_decode($proveedor_id_proveedor));
            $insert->bindValue('medio_pago', utf8_decode($medio_pago));
            $insert->bindValue('observaciones', utf8_decode($observaciones));
            $insert->bindValue('marca_temporal', utf8_decode($marca_temporal));
            $insert->bindValue('usuario_creador', utf8_decode($usuario_creador));
            $insert->bindValue('rubro_id', utf8_decode($rubro_id));
            $insert->bindValue('subrubro_id', utf8_decode($subrubro_id));
            $insert->bindValue('vencimiento', utf8_decode($vencimiento));
            $insert->bindValue('factura', utf8_decode($factura));
            $insert->bindValue('estado_recibido', utf8_decode($estado_recibido));
            $insert->bindValue('compra_de', utf8_decode($compra_de));
            $insert->bindValue('id_factura_compra', utf8_decode($id_factura_compra));
            $insert->execute();
            return true;
        } catch (Exception $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR LA ULTIMA ORDEN DE COMPRA CREADA **
 ********************************************************/
    public static function obtenerUltimo()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT id FROM ordenescompra ORDER BY id DESC LIMIT 1");
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            $rubros  = $campos->getCampos();
            foreach ($rubros as $nrubro) {
                $elrubro = $nrubro['id'];
            }
            return $elrubro;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA ACTUALIZAR LA ORDEN DE COMPRA EN ITEMS **
 ***************************************************************/
    public static function actualizaritemsoc($ordencompra_num, $items)
    {
        try {
            $db       = Db::getConnect();
            $dbselect = Db::getConnect();
            //$campostraidos = $campos->getCampos();
            //$items = explode(",", $items);

            foreach ($_POST['items'] as $despachounico) {
                $update = $db->prepare('UPDATE requisiciones_items SET
                                ordencompra_num=:ordencompra_num
                                WHERE id=:despachounico');
                $update->bindValue('ordencompra_num', utf8_decode($ordencompra_num));
                $update->bindValue('despachounico', utf8_decode($despachounico));
                $update->execute();
            }
            return $ordencompra_num;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA ACTUALIZAR LA ORDEN DE COMPRA EN ITEMS **
 ***************************************************************/
    public static function actualizaritemcotizasoc($usuario_aprobador, $ordencompra_num, $items, $proveedor_id_proveedor, $estado_cotizacion, $estado_nuevo_cot)
    {
        try {
            $db       = Db::getConnect();
            $dbselect = Db::getConnect();
            //$campostraidos = $campos->getCampos();
            //$items = explode(",", $items);
            foreach ($_POST['items'] as $despachounico) {
                $update = $db->prepare("UPDATE cotizaciones_item SET
                                ordencompra_num=:ordencompra_num,
                                usuario_aprobador=:usuario_aprobador,
                                estado_cotizacion=:estado_cotizacion
                                WHERE item_id=:despachounico and proveedor_id_proveedor='" . $proveedor_id_proveedor . "'and estado_cotizacion='1'");
                $update->bindValue('ordencompra_num', utf8_decode($ordencompra_num));
                $update->bindValue('usuario_aprobador', utf8_decode($usuario_aprobador));
                $update->bindValue('estado_cotizacion', utf8_decode($estado_nuevo_cot));
                $update->bindValue('despachounico', utf8_decode($despachounico));
                $update->execute();
            }
            return $ordencompra_num;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }
    }


/*******************************************************
** FUNCION PARA MOSTRAR  **
********************************************************/
public static function sqlvalortotalordencompra($id){
    try {
        $db=Db::getConnect();

        $select=$db->query("SELECT IFNULL(sum(valor_cot),0) as total FROM cotizaciones_item WHERE ordencompra_num='".$id."'");
        $camposs=$select->fetchAll();
        $campos = new Requisicionesitems('',$camposs);
        $marcas = $campos->getCampos();
        foreach($marcas as $marca){
            $mar = $marca['total'];
        }
        return $mar;
    }
    catch(PDOException $e) {
        echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
    }
}

/***************************************************************
*** FUNCION PARA GUARDAR INGRESO DE PAGO DE ORDEN DE COMPRA **** 
***************************************************************/
public static function actualizarvalorfinal($id,$valornuevo){
    try {
        $db=Db::getConnect();

    $select=$db->query("UPDATE ordenescompra SET valor_total='".$valornuevo."' WHERE id='".$id."'");
        if ($select){
            return true;
            }else{return false;}
    }
    catch(PDOException $e) {
        echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
    }
}



/***************************************************************
 *** FUNCION PARA GUARDAR **
 * INSERT INTO `trazabilidad_items`(`id`, `fecha_reporte`, `usuario_registro`, `estadoreq_id`, `item_id`, `observaciones`, `marca_temporal`)
 ***************************************************************/
    public static function guardartrazabilidad($estado_item, $items, $usuario_creador, $observaciones)
    {
        try {

            $db       = Db::getConnect();
            $dbselect = Db::getConnect();
            //$campostraidos = $campos->getCampos();

            $marca_temporal = date('y-m-d H:m:s');
            $fecha_reporte  = date('y-m-d');

            $items = explode(",", $items);
            foreach ($items as $key => $despachounico) {
                $insert = $db->prepare('INSERT INTO trazabilidad_items VALUES (NULL,:fecha_reporte,:usuario_creador,:estadoreq_id,:item_id,:observaciones,:marca_temporal)');
                $insert->bindValue('fecha_reporte', utf8_decode($fecha_reporte));
                $insert->bindValue('usuario_creador', utf8_decode($usuario_creador));
                $insert->bindValue('estadoreq_id', utf8_decode($estado_item));
                $insert->bindValue('item_id', utf8_decode($despachounico));
                $insert->bindValue('observaciones', utf8_decode($observaciones));
                $insert->bindValue('marca_temporal', utf8_decode($marca_temporal));
                $insert->execute();
            }
            return $estado_item;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
 * INSERT INTO `trazabilidad_items`(`id`, `fecha_reporte`, `usuario_registro`, `estadoreq_id`, `item_id`, `observaciones`, `marca_temporal`)
 ***************************************************************/
    public static function guardartrazabilidadoc($estado_item, $items, $usuario_creador, $observaciones)
    {
        try {
            $db       = Db::getConnect();
            $dbselect = Db::getConnect();
            //$campostraidos = $campos->getCampos();

            $marca_temporal = date('y-m-d H:m:s');
            $fecha_reporte  = date('y-m-d');

            $items = explode(",", $items);
            foreach ($_POST['items'] as $despachounico) {
                $insert = $db->prepare('INSERT INTO trazabilidad_items VALUES (NULL,:fecha_reporte,:usuario_creador,:estadoreq_id,:item_id,:observaciones,:marca_temporal)');
                $insert->bindValue('fecha_reporte', utf8_decode($fecha_reporte));
                $insert->bindValue('usuario_creador', utf8_decode($usuario_creador));
                $insert->bindValue('estadoreq_id', utf8_decode($estado_item));
                $insert->bindValue('item_id', utf8_decode($despachounico));
                $insert->bindValue('observaciones', utf8_decode($observaciones));
                $insert->bindValue('marca_temporal', utf8_decode($marca_temporal));
                $insert->execute();
            }
            return $estado_item;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function cotizaciones()
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT DISTINCT(proveedor_id_proveedor) FROM cotizaciones_item WHERE estado_cotizacion='1' order by id DESC";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR  **
 ********************************************************/
    public static function sqlinsumoitem($id)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT insumo_id_insumo FROM requisiciones_items WHERE id='" . $id . "'";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['insumo_id_insumo'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR  **
 ********************************************************/
    public static function sqlusuariocreador($id)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT usuario_creador FROM requisiciones_items WHERE id='" . $id . "'";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['usuario_creador'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    /*******************************************************
 ** FUNCION PARA MOSTRAR  **
 ********************************************************/
    public static function sqlrq($id)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT requisicion_id FROM requisiciones_items WHERE id='" . $id . "'";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['requisicion_id'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }


/*******************************************************
 ** FUNCION PARA MOSTRAR  **
 ********************************************************/
    public static function sqlestadorq($id)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT estado_item FROM requisiciones_items WHERE id='" . $id . "'";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['estado_item'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR  **
 ********************************************************/
    public static function sqlcantidaditem($id)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT cantidad FROM requisiciones_items WHERE id='" . $id . "'";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Requisicionesitems('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['cantidad'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }


    /*******************************************************
** FUNCION PARA MOSTRAR  **
********************************************************/
public static function consultarsoporteporitem($id,$cotizacion1){
    try {
        $db=Db::getConnect();

        $select=$db->query("SELECT count(imagen) as total FROM cotizaciones_item WHERE item_id='".$id."' and cotizacion='".$cotizacion1."'");
        $camposs=$select->fetchAll();
        $campos = new Requisicionesitems('',$camposs);
        $marcas = $campos->getCampos();
        foreach($marcas as $marca){
            $mar = $marca['total'];
        }
        return $mar;
    }
    catch(PDOException $e) {
        echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
    }
}

}
