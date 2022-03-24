<?php
/**
 * CLASE PARA TRABAJAR CON LAS FUNCIONES
 */
class Inventario
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

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS      **
 ********************************************************/
    public static function cargarentradaoc($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM cotizaciones_item WHERE ordencompra_num='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    /*******************************************************
     ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS    **
     ********************************************************/
    public static function todospendienterecibir()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM ordenescompra WHERE estado_orden<>'0' and estado_recibido<>'Recibido ok'  order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    /*******************************************************
     ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
     ********************************************************/
    public static function todosrecibido()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM ordenescompra WHERE estado_orden<>'0' and estado_recibido='Recibido ok'  order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS    **
 ********************************************************/
    public static function todosdevolucion()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM ordenescompra WHERE estado_orden<>'0' and estado_recibido='Pendiente'  order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS    **
 ********************************************************/
    public static function totalentradas()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM entradas_ins order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function todosporusuariorecibir($id, $estadosolicitado)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT * FROM salidas_ins WHERE recibido_por='" . $id . "' and estado_salida='" . $estadosolicitado . "'order by fecha_reporte DESC";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS    **
 ********************************************************/
    public static function totalsalidas()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM salidas_ins order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
 ********************************************************/
    public static function Aplicaequipo($id)
    {
        try {
            $db     = Db::getConnect();
            $sql    = "SELECT aplica_equipo FROM salidas_ins WHERE id_salida_ins='" . $id . "'";
            $select = $db->query($sql);
            //echo($sql);
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['aplica_equipo'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
 * 
 ********************************************************/
    public static function Idequipo($id)
    {
        try {
            $db     = Db::getConnect();
            $sql    = "SELECT equipo_id_equipo FROM salidas_ins WHERE id_salida_ins='" . $id . "'";
            $select = $db->query($sql);
            //echo($sql);
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['equipo_id_equipo'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
 ********************************************************/
    public static function fecharecepciondespacho($id)
    {
        try {
            $db     = Db::getConnect();
            $sql    = "SELECT fecha_recepcion FROM salidas_ins WHERE id_salida_ins='" . $id . "'";
            $select = $db->query($sql);
            //echo($sql);
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['fecha_recepcion'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    /*******************************************************
     ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS    **
     ********************************************************/
    public static function totalsalidasporentrega($id)
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM detalle_salida_ins WHERE salida_id='" . $id . "' and estado_recibido='Pendiente' order by fecha_registro DESC");
            $campos        = $select->fetchAll();
            $camposs       = new Inventario('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    /*******************************************************
     ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS    **
     ********************************************************/
    public static function totalrecibidoporentrega($id)
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM detalle_salida_ins WHERE salida_id='" . $id . "' and estado_recibido='Recibido Ok' order by fecha_registro DESC");
            $campos        = $select->fetchAll();
            $camposs       = new Inventario('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

# =============================================================
    # =           Funciones para ver Inventario Actual            =
    # =============================================================
    public static function verlistadoinsumos()
    {
        try {
            $db  = DB::getConnect();
            $sql = "SELECT DISTINCT(insumo_id), IFNULL(SUM(cantidad),0) as sumaentradas FROM detalle_entrada_ins GROUP BY insumo_id";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }
# ======  End of Funciones para ver Inventario Actual   =======

# ===================================================
    # =           Consulta entradas por fecha           =
    # ===================================================

    public static function entradasporfecha($FechaStart, $FechaEnd)
    {
        try {

            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM entradas_ins WHERE fecha_reporte >='" . $FechaStart . "' and fecha_reporte <='" . $FechaEnd . "' order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;

        } catch (PdoException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }
# ======  End of Consulta entradas por fecha  =======

# ===================================================
    # =           Consulta entradas por fecha           =
    # ===================================================

    public static function salidasporfecha($FechaStart, $FechaEnd)
    {
        try {

            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM salidas_ins WHERE fecha_reporte >='" . $FechaStart . "' and fecha_reporte <='" . $FechaEnd . "' order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;

        } catch (PdoException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }
# ======  End of Consulta entradas por fecha  =======

# =================================================
    # =           Consulta Detalle Entradas           =
    # =================================================

    public static function verentradasdetalle($id)
    {
        try {

            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM detalle_entrada_ins WHERE entrada_id='" . $id . "' order by fecha_registro DESC");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

# =================================================
    # =           Consulta Detalle Entradas           =
    # =================================================

    public static function versalidasdetalle($id)
    {
        try {

            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM detalle_salida_ins WHERE salida_id='" . $id . "' order by fecha_registro DESC");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

# =================================================
    # =           Consulta Detalle Kardex por Insumo           =
    # =================================================

    public static function verkardexinsumo($id)
    {
        try {

            $db     = Db::getConnect();
            $select = $db->query("SELECT DISTINCT(detalle_entrada_ins.fecha_registro) AS fechabuscada
FROM detalle_entrada_ins
LEFT JOIN detalle_salida_ins ON  detalle_salida_ins.fecha_registro=detalle_entrada_ins.fecha_registro WHERE detalle_entrada_ins.insumo_id='" . $id . "' order by detalle_entrada_ins.fecha_registro ASC");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function versalidapor($id)
    {
        try {

            $db      = Db::getConnect();
            $sql="SELECT * FROM salidas_ins WHERE id_salida_ins='" . $id . "'";
            $select  = $db->query($sql);
           // echo($sql);
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

# =================================================
    # =           Consulta Detalle Entradas  Total         =
    # =================================================

    public static function verentradasdetalletotal()
    {
        try {

            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM detalle_entrada_ins  order by fecha_registro DESC");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

# =================================================
    # =           Consulta Detalle Salidas  Total         =
    # =================================================

    public static function versalidasdetalletotal()
    {
        try {

            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM detalle_salida_ins  WHERE estado_detalle_salida<>'0' order by fecha_registro DESC");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

# ======  End of Consulta Detalle Entradas  =======

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE ABONOS      **
 ********************************************************/
    public static function obtenerListaRecibidosOc($id)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT * FROM detalle_entrada_ins WHERE cotizacion_item_id='" . $id . "' and estado_detalle_entrada='1'";
            //echo($sql);
            $select        = $db->query($sql);
            $campos        = $select->fetchAll();
            $camposs       = new Inventario('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE ABONOS      **
 ********************************************************/
    public static function obtenerListaSalidas($id)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT * FROM detalle_salida_ins WHERE item_id='" . $id . "' and estado_detalle_salida LIKE '%Entrega%'";
            //echo($sql);
            $select        = $db->query($sql);
            $campos        = $select->fetchAll();
            $camposs       = new Inventario('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR  **
 ********************************************************/
    public static function sqldetalleentrada($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT IFNULL(sum(cantidad),0) as EntradasAntes FROM detalle_entrada_ins WHERE cotizacion_item_id='" . $id . "' and estado_detalle_entrada='1'");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['EntradasAntes'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR  **
 ********************************************************/
    public static function sqldetallesalida($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT IFNULL(sum(cantidad),0) as SalidasAntes FROM detalle_salida_ins WHERE item_id='" . $id . "' and estado_detalle_salida LIKE '%Entrega%'");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['SalidasAntes'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR  **
 ********************************************************/
    public static function sqlvalorsalida($id)
    {
        try {
            $db  = Db::getConnect();
            $sql = "SELECT IFNULL(sum(valor_entregado),0) as Valorsalidas FROM detalle_salida_ins WHERE item_id='" . $id . "' and estado_detalle_salida LIKE '%Entrega%'";
            //echo($sql);
            $select  = $db->query($sql);
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['Valorsalidas'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR  **
 ********************************************************/
    public static function sqldetalleentradatemporal($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT IFNULL(sum(cantidad),0) as EntradasAntes FROM detalle_entrada_ins WHERE cotizacion_item_id='" . $id . "' and estado_detalle_entrada='0'");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['EntradasAntes'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR  **
 ********************************************************/
    public static function sqldetallesalidatemporal($id, $fecha_registro)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT IFNULL(sum(cantidad),0) as SalidasAntes FROM detalle_salida_ins WHERE item_id='" . $id . "' and estado_detalle_salida='0' and fecha_registro='" . $fecha_registro . "'");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['SalidasAntes'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR INGRESO DE PAGO DE ORDEN DE COMPRA ****
 * //(`id`, `cotizacion_item_id`, `oc_id`, `insumo_id`, `servicio_id`, `cantidad`, `entrada_id`, `fecha_registro`, `estado_detalle_entrada`, `marca_temporal`, `creado_por`, `entrada_por`)
 ***************************************************************/
    public static function guardarentradadetalletem($campos)
    {

        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);

            $insert = $db->prepare('INSERT INTO detalle_entrada_ins VALUES (NULL,:cotizacion_item_id,:oc_id,:insumo_id,:servicio_id,:cantidad,:entrada_id,:fecha_registro,:estado_detalle_entrada,:marca_temporal,:creado_por,:entrada_por)');

            $insert->bindValue('cotizacion_item_id', utf8_decode($cotizacion_item_id));
            $insert->bindValue('oc_id', utf8_decode($oc_id));
            $insert->bindValue('insumo_id', utf8_decode($insumo_id));
            $insert->bindValue('servicio_id', utf8_decode($servicio_id));
            $insert->bindValue('cantidad', utf8_decode($cantidad));
            $insert->bindValue('entrada_id', utf8_decode($entrada_id));
            $insert->bindValue('fecha_registro', utf8_decode($fecha_registro));
            $insert->bindValue('estado_detalle_entrada', utf8_decode($estado_detalle_entrada));
            $insert->bindValue('marca_temporal', utf8_decode($marca_temporal));
            $insert->bindValue('creado_por', utf8_decode($creado_por));
            $insert->bindValue('entrada_por', utf8_decode($entrada_por));
            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR INGRESO DE PAGO DE ORDEN DE COMPRA ****
 * (`id`, `item_id`, `requisicion_id`, `insumo_id`, `cantidad`, `valor_entregado`, `salida_id`, `fecha_registro`, `estado_detalle_salida`, `estado_recibido`, `marca_temporal`, `creado_por`, `salida_por`)
 ***************************************************************/
    public static function guardarsalidadetalletem($campos)
    {

        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);

            $insert = $db->prepare('INSERT INTO detalle_salida_ins VALUES (NULL,:item_id,:requisicion_id,:insumo_id,:cantidad,:valor_entregado,:salida_id,:fecha_registro,:estado_detalle_salida,:estado_recibido,:marca_temporal,:creado_por,:salida_por)');

            $V1          = str_replace(".", "", $valor_entregado);
            $V2          = str_replace(" ", "", $V1);
            $valor_final = str_replace("$", "", $V2);
            $valornumero = (int) $valor_final;

            $valorentregado = $cantidad * $valornumero;

            $insert->bindValue('item_id', utf8_decode($item_id));
            $insert->bindValue('requisicion_id', utf8_decode($requisicion_id));
            $insert->bindValue('insumo_id', utf8_decode($insumo_id));
            $insert->bindValue('cantidad', utf8_decode($cantidad));
            $insert->bindValue('valor_entregado', utf8_decode($valorentregado));
            $insert->bindValue('salida_id', utf8_decode($salida_id));
            $insert->bindValue('fecha_registro', utf8_decode($fecha_registro));
            $insert->bindValue('estado_detalle_salida', utf8_decode($estado_detalle_salida));
            $insert->bindValue('estado_recibido', utf8_decode($estado_recibido));
            $insert->bindValue('marca_temporal', utf8_decode($marca_temporal));
            $insert->bindValue('creado_por', utf8_decode($creado_por));
            $insert->bindValue('salida_por', utf8_decode($salida_por));
            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

# ============================================================
    # =           Eliminar Entradas detalle Temporales           =
    # ============================================================
    public static function deletedellentradatemp($id)
    {

        try {

            $db = DB::getConnect();

            $select = $db->query("DELETE FROM detalle_entrada_ins WHERE cotizacion_item_id='" . $id . "' and estado_detalle_entrada='0'");
            if ($select) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    # ============================================================
    # =           Actualizar estado a despachos        =
    # ============================================================
    public static function actualizarestadodespacho($idusuario, $idsalida)
    {

        try {
            $db = DB::getConnect();

            date_default_timezone_set("America/Bogota");
            $fecha_recepcion = date('Y-m-d H:m:s');

            $select = $db->query("UPDATE  salidas_ins SET recibido_por='" . $idusuario . "', estado_salida='Recibido', fecha_recepcion='" . $fecha_recepcion . "' WHERE id_salida_ins='" . $idsalida . "'");
            if ($select) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

 # ============================================================
    # =           Actualizar estado a despachos        =
    # ============================================================
    public static function actualizardetalledespacho($idsalida)
    {

        try {
            $db = DB::getConnect();

            date_default_timezone_set("America/Bogota");
            $fecha_recepcion = date('Y-m-d');

            $select = $db->query("UPDATE  detalle_salida_ins  SET  estado_recibido='Recibido Ok' WHERE salida_id='" . $idsalida . "'");
            if ($select) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

# ============================================================
    # =           Eliminar Salida detalle Temporales           =
    # ============================================================
    public static function deletedellsalidatemp($id)
    {

        try {

            $db = DB::getConnect();

            $select = $db->query("DELETE FROM detalle_salida_ins WHERE item_id='" . $id . "' and estado_detalle_salida='0'");
            if ($select) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    # ===============================================
    # =           Guardar entrada Insumo            =
    # ===============================================

    public static function guardarentradains($fecha_reporte, $marca_temporal, $creado_por, $tipo_entrada, $observaciones)
    {
        try {
            $db     = DB::getConnect();
            $insert = $db->query("INSERT INTO entradas_ins (fecha_reporte, marca_temporal, creado_por, observaciones, tipo_entrada) VALUES ('" . $fecha_reporte . "','" . $marca_temporal . "','" . $creado_por . "','" . $observaciones . "','" . $tipo_entrada . "')");

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    # ===============================================
    # =           Guardar Salida Insumo            =
    # ===============================================

    public static function guardarsalidains($fecha_reporte, $proyecto_id_proyecto, $aplica_equipo, $equipo_id_equipo, $requisicion_id, $marca_temporal, $solicitado_por, $creado_por, $recibido_por, $observaciones, $tipo_salida, $valor_salida, $estado_salida, $fecha_recepcion)
    {
        try {
            $db = DB::getConnect();

            $insert = $db->query("INSERT INTO salidas_ins (fecha_reporte, proyecto_id_proyecto,aplica_equipo,equipo_id_equipo, requisicion_id, marca_temporal, solicitado_por, creado_por, recibido_por, observaciones, tipo_salida,valor_salida, estado_salida, fecha_recepcion) VALUES ('" . $fecha_reporte . "','" . $proyecto_id_proyecto . "','" . $aplica_equipo . "','" . $equipo_id_equipo . "','" . $requisicion_id . "','" . $marca_temporal . "','" . $solicitado_por . "','" . $creado_por . "','" . $recibido_por . "','" . $observaciones . "','" . $tipo_salida . "','" . $valor_salida . "','" . $estado_salida . "','" . $fecha_recepcion . "')");

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
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

    # ======================================
    # =           Obtner último Registro            =
    # ======================================

    public static function obtenerultimoid()
    {
        try {

            $db      = DB::getConnect();
            $select  = $db->query("SELECT id_entrada_ins FROM entradas_ins order by id_entrada_ins desc limit 1");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['id_entrada_ins'];
            }
            return $mar;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    # ======================================
    # =           Obtner último Registro            =
    # ======================================

    public static function obtenerultimoidsalida()
    {
        try {
            $db      = DB::getConnect();
            $select  = $db->query("SELECT id_salida_ins FROM salidas_ins order by id_salida_ins desc limit 1");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['id_salida_ins'];
            }
            return $mar;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    # ====================================================
    # =           Actualizar detalle entradas            =
    # ====================================================

    public static function actualizardetalleentrada($identrada, $estado, $ocid)
    {
        try
        {

            $db = DB::getConnect();

            $select = $db->query("UPDATE detalle_entrada_ins SET estado_detalle_entrada='" . $estado . "', entrada_id='" . $identrada . "' WHERE oc_id='" . $ocid . "'");

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    # ====================================================
    # =           Actualizar detalle Salidas            =
    # ====================================================

    public static function actualizardetallesalida($idsalida, $estado, $items)
    {

        try
        {
            $db       = Db::getConnect();
            $dbselect = Db::getConnect();
            //$campostraidos = $campos->getCampos();
            $items = explode(",", $items);
            foreach ($items as $key => $despachounico) {
                $update = $db->prepare('UPDATE detalle_salida_ins SET
                                estado_detalle_salida=:estado_detalle_salida,
                                salida_id=:salida_id
                                WHERE item_id=:despachounico');
                $update->bindValue('estado_detalle_salida', utf8_decode($estado));
                $update->bindValue('salida_id', utf8_decode($idsalida));
                $update->bindValue('despachounico', utf8_decode($despachounico));
                $update->execute();
            }
            return $estado;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    # ====================================================
    # =           Actualizar detalle entradas            =
    # ====================================================

    public static function actualizarestadoOC($ocid, $estado)
    {
        try
        {

            $db = DB::getConnect();

            $select = $db->query("UPDATE ordenescompra SET estado_recibido='" . $estado . "' WHERE id='" . $ocid . "'");

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    # ====================================================
    # =           Actualizar Estado en Items para despacho 12           =
    # ====================================================

    public static function actualizarestadoItemsOC($ocid, $estado)
    {
        try
        {

            $db = DB::getConnect();

            $select = $db->query("UPDATE requisiciones_items SET estado_item='" . $estado . "' WHERE ordencompra_num='" . $ocid . "'");

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    # ====================================================
    # =           Actualizar Requisiciones a Estado Finalizado            =
    # ====================================================

    public static function actualizarestadoRqfinalizada($estado_item, $items)
    {
        try
        {

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
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FECHAS      **
 ********************************************************/
    public static function vercompras()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM ordenescompra WHERE estado_orden<>'0' and fecha_reporte BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE() order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

# ======================================
    # =           Obtner último Registro            =
    # ======================================

    public static function obteneusuariorecibe($id)
    {
        try {

            $db      = DB::getConnect();
            $select  = $db->query("SELECT recibido_por FROM salidas_ins WHERE id_salida_ins='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['recibido_por'];
            }
            return $mar;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    # ======================================
    # =           Obtner Suma cantidades Entregadas           =
    # ======================================

    public static function obtenersalidasporinsumo($id)
    {
        try {

            $db      = DB::getConnect();
            $select  = $db->query("SELECT IFNULL(SUM(cantidad),0) as sumasalidas FROM detalle_salida_ins WHERE insumo_id='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['sumasalidas'];
            }
            return $mar;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    # ======================================
    # =           Obtner Suma cantidades Entregadas           =
    # ======================================

    public static function obtenerentradasporinsumo($id)
    {
        try {

            $db      = DB::getConnect();
            $select  = $db->query("SELECT IFNULL(SUM(cantidad),0) as sumaentradas FROM detalle_entrada_ins WHERE insumo_id='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['sumaentradas'];
            }
            return $mar;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function obtenersalidasporinsumofecha($id, $fecha)
    {
        try {

            $db      = DB::getConnect();
            $select  = $db->query("SELECT IFNULL(SUM(cantidad),0) as sumasalidas FROM detalle_salida_ins WHERE insumo_id='" . $id . "' and fecha_registro='" . $fecha . "'");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['sumasalidas'];
            }
            return $mar;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function obtenerentradasporinsumofecha($id, $fecha)
    {
        try {

            $db      = DB::getConnect();
            $select  = $db->query("SELECT IFNULL(SUM(cantidad),0) as sumaentradas FROM detalle_entrada_ins WHERE insumo_id='" . $id . "' and fecha_registro='" . $fecha . "'");
            $camposs = $select->fetchAll();
            $campos  = new Inventario('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['sumaentradas'];
            }
            return $mar;

        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

}
