<?php
/**
 * CLASE PARA TRABAJAR CON LOS GASTOS
 */
class Propietariostarifas
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
    public static function obtenerPaginatarifas($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM propietarios_tarifas WHERE propietario_id='" . $id . "' and precio_publicado='1' order by id DESC");
            $camposs = $select->fetchAll();
            $campos  = new Propietariostarifas('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }


/*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL PRODUCTO **
********************************************************/
public static function validacionpor($equipo_id){
    try {
        $db=Db::getConnect();

        $select=$db->query("SELECT COUNT(id) AS total FROM propietarios_tarifas WHERE equipo_id='".$equipo_id."' and precio_publicado='1'");
        $camposs=$select->fetchAll();
        $campos = new Propietariostarifas('',$camposs);
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
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
 ***************************************************************/
    public static function obtenerPaginaPor($id)
    {
        try {
            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM propietarios_tarifas WHERE id='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Propietariostarifas('', $camposs);
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
            $select = $db->query("UPDATE propietarios_tarifas  SET precio_publicado='0' WHERE id='" . $id . "'");
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
            $update = $db->prepare('UPDATE propietarios_tarifas SET
								propietario_id=:propietario_id,
								equipo_id=:equipo_id,
								unidad_condicion=:unidad_condicion,
								operador_incluido=:operador_incluido,
								acpm_incluido=:acpm_incluido,
								valor_unitario=:valor_unitario,
								stand_by=:stand_by,
                                observaciones=:observaciones,
								estado_precio=:estado_precio,
								marca_temporal=:marca_temporal,
								fecha_precio=:fecha_precio,
								precio_publicado=:precio_publicado,
                                creado_por=:creado_por
								WHERE id=:id');

            # ==========================================================
            # =           Formateo del campo con dato Moneda           =
            # ==========================================================

            // Valor producto concreto
            $V11           = str_replace(".", "", $valor_unitario);
            $V21           = str_replace(" ", "", $V11);
            $valor_final1  = str_replace("$", "", $V21);
            $valorproducto = (int) $valor_final1;

            # ==========================================================
            # =          Fin  Formateo del campo con dato Moneda           =
            # ==========================================================

            $update->bindValue('propietario_id', utf8_encode($propietario_id));
            $update->bindValue('equipo_id', utf8_encode($equipo_id));
            $update->bindValue('unidad_condicion', utf8_encode($unidad_condicion));
            $update->bindValue('operador_incluido', utf8_encode($operador_incluido));
            $update->bindValue('acpm_incluido', utf8_encode($acpm_incluido));
            $update->bindValue('valor_unitario', utf8_encode($valorproducto));
            $update->bindValue('stand_by', utf8_encode($stand_by));
            $update->bindValue('observaciones', utf8_encode($observaciones));
            $update->bindValue('estado_precio', utf8_encode($estado_precio));
            $update->bindValue('marca_temporal', utf8_encode($marca_temporal));
            $update->bindValue('fecha_precio', utf8_encode($fecha_precio));
            $update->bindValue('precio_publicado', utf8_encode($precio_publicado));
            $update->bindValue('creado_por', utf8_encode($creado_por));
            $update->bindValue('id', utf8_encode($id));
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

            $insert = $db->prepare('INSERT INTO propietarios_tarifas VALUES (NULL,
            					:propietario_id,
								:equipo_id,
								:unidad_condicion,
								:operador_incluido,
								:acpm_incluido,
								:valor_unitario,
								:stand_by,
                                :observaciones,
								:estado_precio,
								:marca_temporal,
								:fecha_precio,
								:precio_publicado,
								:creado_por)');

           # ==========================================================
            # =           Formateo del campo con dato Moneda           =
            # ==========================================================

            // Valor Tarifa acordada
            $V11           = str_replace(".", "", $valor_unitario);
            $V21           = str_replace(" ", "", $V11);
            $valor_final1  = str_replace("$", "", $V21);
            $valorproducto = (int) $valor_final1;

            # ==========================================================
            # =          Fin  Formateo del campo con dato Moneda           =
            # ==========================================================

            $insert->bindValue('propietario_id', utf8_encode($propietario_id));
            $insert->bindValue('equipo_id', utf8_encode($equipo_id));
            $insert->bindValue('unidad_condicion', utf8_encode($unidad_condicion));
            $insert->bindValue('operador_incluido', utf8_encode($operador_incluido));
            $insert->bindValue('acpm_incluido', utf8_encode($acpm_incluido));
            $insert->bindValue('valor_unitario', utf8_encode($valorproducto));
            $insert->bindValue('stand_by', utf8_encode($stand_by));
            $insert->bindValue('observaciones', utf8_encode($observaciones));
            $insert->bindValue('estado_precio', utf8_encode($estado_precio));
            $insert->bindValue('marca_temporal', utf8_encode($marca_temporal));
            $insert->bindValue('fecha_precio', utf8_encode($fecha_precio));
            $insert->bindValue('precio_publicado', utf8_encode($precio_publicado));
            $insert->bindValue('creado_por', utf8_encode($creado_por));

            $insert->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }


    /*******************************************************
** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
********************************************************/
public static function cantidadporcanal($id){
	try {
		$db=Db::getConnect();

		$select=$db->query("SELECT count(id) as totales FROM propietarios_tarifas
where propietario_id ='".$id."' and precio_publicado='1'");
    	$camposs=$select->fetchAll();
    	$campos = new Propietariostarifas('',$camposs);
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
