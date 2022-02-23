<?php
/**
 * CLASE PARA TRABAJAR CON LOS GASTOS
 */
class Clientesprecios
{
    private $id;
    private $campos; //devuelve todos los campos de la tabla

    public function __construct($id, $campos)
    {
        $this->setId($id);
        $this->setCampos($campos);
    }

    /************************************************************************************
     ** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA GASTOS       ***
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
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS      **
 ********************************************************/
    public static function obtenerPaginarutas($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM clientes_precios WHERE cliente_id='" . $id . "' and precio_publicado='1' and canal_venta='fletes' order by id DESC");
            $camposs = $select->fetchAll();
            $campos  = new Clientesprecios('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

  /*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS      **
 ********************************************************/
    public static function obtenerPaginahoras($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM clientes_precios WHERE cliente_id='" . $id . "' and precio_publicado='1' and canal_venta='Alquiler Equipos' order by id DESC");
            $camposs = $select->fetchAll();
            $campos  = new Clientesprecios('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    /*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS      **
 ********************************************************/
    public static function obtenerPaginaproductos($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM clientes_precios WHERE cliente_id='" . $id . "' and precio_publicado='1' and canal_venta='Productos' order by id DESC");
            $camposs = $select->fetchAll();
            $campos  = new Clientesprecios('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
 ***************************************************************/
    public static function obtenerPaginaPor($id)
    {
        try {
            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM clientes_precios WHERE id='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Clientesprecios('', $camposs);
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
            $select = $db->query("UPDATE clientes_precios  SET precio_publicado='0' WHERE id='" . $id . "'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/********************************************************************
 *** FUNCION PARA MODIFICAR ****
 ********************************************************************/
    public static function actualizar($id, $campos)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);
            $update = $db->prepare('UPDATE clientes_precios SET
								cliente_id=:cliente_id,
								origen_id=:origen_id,
								destino_id=:destino_id,
								proyecto_id=:proyecto_id,
								producto_id=:producto_id,
								equipo_id=:equipo_id,
								canal_venta=:canal_venta,
								valor_m3km=:valor_m3km,
								km_ruta=:km_ruta,
								valor_producto=:valor_producto,
								valor_horamq=:valor_horamq,
								estado_precio=:estado_precio,
								marca_temporal=:marca_temporal,
								fecha_precio=:fecha_precio,
								precio_publicado=:precio_publicado
								WHERE id_egreso_cuenta=:id_egreso_cuenta');

            # ==========================================================
            # =           Formateo del campo con dato Moneda           =
            # ==========================================================

            // M3 transportado
            $V1                  = str_replace(".", "", $valor_m3km);
            $V2                  = str_replace(" ", "", $V1);
            $valor_final         = str_replace("$", "", $V2);
            $valorm3transportado = (int) $valor_final;

            // Valor producto concreto
            $V11           = str_replace(".", "", $valor_producto);
            $V21           = str_replace(" ", "", $V11);
            $valor_final1  = str_replace("$", "", $V21);
            $valorproducto = (int) $valor_final1;

            // Valor Horas máquina Alquiladas
            $V12           = str_replace(".", "", $valor_horamq);
            $V22           = str_replace(" ", "", $V12);
            $valor_final12 = str_replace("$", "", $V22);
            $valorhorasmq  = (int) $valor_final12;

            # ==========================================================
            # =          Fin  Formateo del campo con dato Moneda           =
            # ==========================================================

            $update->bindValue('cliente_id', utf8_decode($cliente_id));
            $update->bindValue('origen_id', utf8_decode($origen_id));
            $update->bindValue('destino_id', utf8_decode($destino_id));
            $update->bindValue('proyecto_id', utf8_decode($proyecto_id));
            $update->bindValue('producto_id', utf8_decode($producto_id));
            $update->bindValue('equipo_id', utf8_decode($equipo_id));
            $update->bindValue('canal_venta', utf8_decode($canal_venta));
            $update->bindValue('valor_m3km', utf8_decode($valorm3transportado));
            $update->bindValue('km_ruta', utf8_decode($km_ruta));
            $update->bindValue('valor_producto', utf8_decode($valorproducto));
            $update->bindValue('valor_horamq', utf8_decode($valorhorasmq));
            $update->bindValue('estado_precio', utf8_decode($estado_precio));
            $update->bindValue('marca_temporal', utf8_decode($marca_temporal));
            $update->bindValue('fecha_precio', utf8_decode($fecha_precio));
            $update->bindValue('precio_publicado', utf8_decode($precio_publicado));
            $update->bindValue('id', utf8_decode($id));
            $update->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuración ":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
(`id`, `cliente_id`, `origen_id`, `destino_id`, `proyecto_id`, `producto_id`, `equipo_id`, `canal_venta`, `valor_m3km`, `km_ruta`, `valor_producto`, `valor_horamq`, `estado_precio`, `marca_temporal`, `fecha_precio`, `precio_publicado`)
 ***************************************************************/
    public static function guardar($campos)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);

            $insert = $db->prepare('INSERT INTO clientes_precios VALUES (NULL,
            					:cliente_id,
								:origen_id,
								:destino_id,
								:proyecto_id,
								:producto_id,
								:equipo_id,
								:canal_venta,
								:valor_m3km,
								:km_ruta,
								:valor_producto,
								:valor_horamq,
								:estado_precio,
								:marca_temporal,
								:fecha_precio,
								:precio_publicado,
								:creado_por)');

           # ==========================================================
            # =           Formateo del campo con dato Moneda           =
            # ==========================================================

            // M3 transportado
            $V1                  = str_replace(".", "", $valor_m3km);
            $V2                  = str_replace(" ", "", $V1);
            $valor_final         = str_replace("$", "", $V2);
            $valorm3transportado = (int) $valor_final;

            // Valor producto concreto
            $V11           = str_replace(".", "", $valor_producto);
            $V21           = str_replace(" ", "", $V11);
            $valor_final1  = str_replace("$", "", $V21);
            $valorproducto = (int) $valor_final1;

            // Valor Horas máquina Alquiladas
            $V12           = str_replace(".", "", $valor_horamq);
            $V22           = str_replace(" ", "", $V12);
            $valor_final12 = str_replace("$", "", $V22);
            $valorhorasmq  = (int) $valor_final12;

            # ==========================================================
            # =          Fin  Formateo del campo con dato Moneda           =
            # ==========================================================

            $insert->bindValue('cliente_id', utf8_decode($cliente_id));
            $insert->bindValue('origen_id', utf8_decode($origen_id));
            $insert->bindValue('destino_id', utf8_decode($destino_id));
            $insert->bindValue('proyecto_id', utf8_decode($proyecto_id));
            $insert->bindValue('producto_id', utf8_decode($producto_id));
            $insert->bindValue('equipo_id', utf8_decode($equipo_id));
            $insert->bindValue('canal_venta', utf8_decode($canal_venta));
            $insert->bindValue('valor_m3km', utf8_decode($valorm3transportado));
            $insert->bindValue('km_ruta', utf8_decode($km_ruta));
            $insert->bindValue('valor_producto', utf8_decode($valorproducto));
            $insert->bindValue('valor_horamq', utf8_decode($valorhorasmq));
            $insert->bindValue('estado_precio', utf8_decode($estado_precio));
            $insert->bindValue('marca_temporal', utf8_decode($marca_temporal));
            $insert->bindValue('fecha_precio', utf8_decode($fecha_precio));
            $insert->bindValue('precio_publicado', utf8_decode($precio_publicado));
            $insert->bindValue('creado_por', utf8_decode($creado_por));

            $insert->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }


    /*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
********************************************************/
public static function cantidadporcanal($canal,$id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT count(id) as totales FROM clientes_precios
where cliente_id ='".$id."' and canal_venta='".$canal."' and precio_publicado='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Equipos('',$camposs);
    	$marcas = $campos->getCampos();
		foreach($marcas as $marca){
			$mar = $marca['totales'];
		}
		return $mar;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}




    

}
