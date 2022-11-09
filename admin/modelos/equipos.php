<?php
/**
 * CLASE PARA TRABAJAR CON LOS Slider
 */
class Equipos
{
    private $id;
    private $campos; //devuelve todos los campos de la tabla

    public function __construct($id, $campos)
    {
        $this->setId($id);
        $this->setCampos($campos);
    }

    /************************************************************************************
     ** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA SERVICIOS       ***
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
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 ********************************************************/
    public static function obtenerPagina()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' order by nombre_equipo asc");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
 ********************************************************/
    public static function validarpor($nombre)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT COUNT(nombre_equipo) as totales FROM equipos WHERE  nombre_equipo LIKE '%" . $nombre . "%' and equipo_publicado='1'");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['totales'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    /*******************************************************
     ** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
     ********************************************************/
    public static function validarporordentrabajo($equipo_id_equipo, $fecha_reporte, $problema)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT COUNT(id_reporte) as totales FROM reporte_equipos WHERE  equipo_id_equipo='" . $equipo_id_equipo . "' and fecha_reporte='" . $fecha_reporte . "' and problema='" . $problema . "' and  reporte_publicado='1'");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['totales'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 ********************************************************/
    public static function obtenerPaginavolquetas()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and tipo_equipo='Volqueta' order by nombre_equipo asc");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 ********************************************************/
    public static function obtenerPaginaestados()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM reporte_estado_equipos WHERE estado_publicado='1' order by fecha_reporte DESC");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS      **
 ********************************************************/
    public static function obtenerPaginaInformeventasEq()
    {
        try {
            $db       = Db::getConnect();
            $consulta = "SELECT DISTINCT(B.id_equipo),B.nombre_equipo FROM reporte_prestamos as A, equipos as B WHERE A.reporte_publicado='1' and A.equipo_id_equipo=B.id_equipo and B.modulo='Asf' and A.estado_pago='Contado' order by nombre_equipo asc";
            $select   = $db->query($consulta);
            //echo($consulta);
            $camposs = $select->fetchAll();
            $campos  = new Productos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS      **
 ********************************************************/
    public static function obtenerPaginaInformeventascxc()
    {
        try {
            $db       = Db::getConnect();
            $consulta = "SELECT DISTINCT(B.id_equipo),B.nombre_equipo FROM reporte_prestamos as A, equipos as B WHERE A.reporte_publicado='1' and A.equipo_id_equipo=B.id_equipo and B.modulo='Asf' and A.estado_pago='Cxc' order by nombre_equipo asc";
            $select   = $db->query($consulta);
            //echo($consulta);
            $camposs = $select->fetchAll();
            $campos  = new Productos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 ********************************************************/
    public static function obtenerPaginareportes($equipo)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM reporte_equipos WHERE reporte_publicado='1' and equipo_id_equipo='" . $equipo . "' order by id_reporte desc");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }



/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 ********************************************************/
    public static function obtenerPaginareportesfecha($equipo, $FechaStart,$FechaEnd)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM reporte_equipos WHERE reporte_publicado='1' and equipo_id_equipo='" . $equipo . "' order by id_reporte desc");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    /*******************************************************
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
 ********************************************************/
    public static function obtenerestadoordentrabajo($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT estado_reporte FROM reporte_equipos WHERE id_reporte='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['estado_reporte'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 ********************************************************/
    public static function obtenerEquiposestadofecha($FechaStart,$FechaEnd,$estadosel)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT COUNT(DISTINCT(equipo_id_equipo))as total FROM reporte_estado_equipos WHERE fecha_reporte >='" . $FechaStart . "' and fecha_reporte <='" . $FechaEnd . "' and  estado_publicado='1' and estado_sel='".$estadosel."' order by fecha_reporte desc");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 ********************************************************/
    public static function obtenertodosreportes()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM reporte_equipos WHERE reporte_publicado='1' order by id_reporte desc");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 ********************************************************/
    public static function obtenerPaginareportesusuario($usuario)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM reporte_equipos WHERE reporte_publicado='1' and mecanico_id='" . $usuario . "' and estado_reporte<>'3' order by id_reporte desc");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    /*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS       **
 ********************************************************/
    public static function obtenerPaginareportesusuarioter($usuario)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM reporte_equipos WHERE reporte_publicado='1' and mecanico_id='" . $usuario . "' and estado_reporte='3' order by id_reporte desc");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }
/*******************************************************
 ** FUNCION PARA OBTENER TODAS LOS FUNCIONARIOS      **
 ********************************************************/
    public static function obtenerFuncionarios()
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM funcionarios WHERE funcionario_publicado='1' order by nombre_funcionario");
            $campos        = $select->fetchAll();
            $camposs       = new Equipos('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LISTA DE LOS EQUIPOS   **
 ********************************************************/
    public static function obtenerEquipos()
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM equipos WHERE equipo_publicado='1' order by nombre_equipo");
            $campos        = $select->fetchAll();
            $camposs       = new Equipos('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF      **
 ********************************************************/
    public static function obtenerListaEquiposAsf()
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' order by nombre_equipo");
            $campos        = $select->fetchAll();
            $camposs       = new Equipos('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF      **
 ********************************************************/
    public static function obtenerListaequipospropietario($id)
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and propietario='" . $id . "' order by nombre_equipo");
            $campos        = $select->fetchAll();
            $camposs       = new Equipos('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF      **
 ********************************************************/
    public static function obtenerListaEquiposunicosdespacho($FechaStart, $FechaEnd)
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT DISTINCT(equipo_id_equipo) as equipo_id_equipo, IFNULL(sum(cantidad),0) as Galones FROM reporte_combustibles WHERE fecha_reporte >='" . $FechaStart . "' and fecha_reporte <='" . $FechaEnd . "' and reporte_publicado='1' and equipo_id_equipo<>'732' GROUP BY equipo_id_equipo ORDER BY Galones DESC");
            $campos        = $select->fetchAll();
            $camposs       = new Equipos('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF      **
 ********************************************************/
    public static function obtenerListaPropietariosunicosdespacho($FechaStart, $FechaEnd)
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT DISTINCT(C.propietario) as propietario, IFNULL(sum(A.cantidad),0) as Galones FROM reporte_combustibles as A, propietarios as B, equipos as C WHERE A.equipo_id_equipo=C.id_equipo and C.propietario=B.id_propietario and A.fecha_reporte >='" . $FechaStart . "' and A.fecha_reporte <='" . $FechaEnd . "' and A.reporte_publicado='1' and A.equipo_id_equipo<>'732' GROUP BY C.propietario ORDER BY Galones DESC;");
            $campos        = $select->fetchAll();
            $camposs       = new Equipos('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF      **
 ********************************************************/
    public static function obtenerListaEquiposAsfVolquetas()
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' and tipo_equipo='Volqueta' order by nombre_equipo");
            $campos        = $select->fetchAll();
            $camposs       = new Equipos('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF      **
 ********************************************************/
    public static function ListaEquiposAsfMaqAmarilla()
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' and tipo_equipo='Maquinaria Pesada' order by nombre_equipo");
            $campos        = $select->fetchAll();
            $camposs       = new Equipos('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF      **
 ********************************************************/
    public static function obtenerListaEquiposCombustible($FechaStart, $FechaEnd)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("SELECT equipo_id_equipo, sum(cantidad) as Galones FROM reporte_combustibles
where fecha_reporte >='" . $FechaStart . "' and fecha_reporte <='" . $FechaEnd . "' and reporte_publicado='1'
Group by equipo_id_equipo order by Galones DESC");
            $campos        = $select->fetchAll();
            $camposs       = new Equipos('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF      **
 ********************************************************/
    public static function obtenerListaVolquetasAsf()
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' and tipo_equipo='Volqueta' order by nombre_equipo");
            $campos        = $select->fetchAll();
            $camposs       = new Equipos('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF      **
 ********************************************************/
    public static function obtenerListaEquiposconcreto()
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' and marca_equipo='MACK' order by nombre_equipo");
            $campos        = $select->fetchAll();
            $camposs       = new Equipos('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF      **
 ********************************************************/
    public static function ListaEquiposdiferentes()
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' and tipo_equipo<>'Volqueta' and tipo_equipo<>'Equipos Menores' order by nombre_equipo");
            $campos        = $select->fetchAll();
            $camposs       = new Equipos('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF      **
 ********************************************************/
    public static function ListaEquiposMenores()
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM equipos WHERE equipo_publicado='1' and modulo='Asf' and tipo_equipo='Equipos Menores' order by nombre_equipo");
            $campos        = $select->fetchAll();
            $camposs       = new Equipos('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
 ********************************************************/
    public static function obtenerNombreEquipo($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT nombre_equipo FROM equipos WHERE id_equipo='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['nombre_equipo'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function obtenerPropietarioEquipo($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT propietario FROM equipos WHERE id_equipo='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['propietario'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function obtenerPlacaEquipo($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT placa FROM equipos WHERE id_equipo='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['placa'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }



    public static function obtenerNombreTipoUnidad($id)
    {
        try {
            $db       = Db::getConnect();
            $consulta = "SELECT DISTINCT(unidad_trabajo) FROM reporte_equipos WHERE equipo_id_equipo='" . $id . "'";
            $select   = $db->query($consulta);
            //echo($consulta);
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['unidad_trabajo'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR EL VALOR DE LA UNIDAD DE TRABAJO **
 ********************************************************/
    public static function obtenerValorUnidadEq($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT valor_unidad FROM equipos WHERE id_equipo='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['valor_unidad'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
 ********************************************************/
    public static function obtenerNombreFuncionario($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT nombre_funcionario FROM funcionarios WHERE id_funcionario='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['nombre_funcionario'];
            }
            return $mar;
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
            $select  = $db->query("SELECT * FROM equipos WHERE id_equipo='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
 ***************************************************************/
    public static function obtenerPaginaestadosPor($id)
    {
        try {
            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM reporte_estado_equipos WHERE equipo_id_equipo='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL EQUIPO **
 ********************************************************/
    public static function obtenerEstadoporfecha($id, $fecha)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT estado_sel FROM reporte_estado_equipos WHERE equipo_id_equipo='" . $id . "' and fecha_reporte='" . $fecha . "'");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['estado_sel'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
 ***************************************************************/
    public static function obtenerPaginareportePor($id)
    {
        try {
            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM reporte_equipos WHERE id_reporte='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
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
            $select = $db->query("UPDATE equipos SET equipo_publicado='0' WHERE id_equipo='" . $id . "'");
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
    public static function eliminarestadoPor($id)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("DELETE FROM reporte_estado_equipos WHERE id='" . $id . "'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCION PARA ELIINAR POR ID EN REPORTE  **
 ***************************************************************/
    public static function eliminareportePor($id)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE reporte_equipos SET reporte_publicado='0' WHERE id_reporte='" . $id . "'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/********************************************************************
 *** FUNCION PARA MODIFICAR EQUIPO ****
 * `id_equipo`, `imagen`, `nombre_equipo`, `marca_equipo`, `serial_equipo`, `modelo`, `unidad_trabajo`, `tipo_equipo`, `placa`, `propietario`, `valor_activo`, `motor`, `peso`, `fecha_adquisicion`, `estado_equipo`, `equipo_publicado`, `creado_por`, `marca_temporal`, `modulo`, `observaciones`, `comision`
 ********************************************************************/
    public static function actualizar($id_equipo, $campos, $imagen)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);

            $update = $db->prepare('UPDATE equipos SET
                                imagen=:imagen,
                                nombre_equipo=:nombre_equipo,
                                marca_equipo=:marca_equipo,
                                serial_equipo=:serial_equipo,
                                modelo=:modelo,
                                unidad_trabajo=:unidad_trabajo,
                                tipo_equipo=:tipo_equipo,
                                placa=:placa,
                                propietario=:propietario,
                                valor_activo=:valor_activo,
                                motor=:motor,
                                peso=:peso,
                                fecha_adquisicion=:fecha_adquisicion,
                                observaciones=:observaciones,
                                comision=:comision,
                                inicial=:inicial
                                WHERE id_equipo=:id_equipo');

            $V1          = str_replace(".", "", $valor_activo);
            $V2          = str_replace(" ", "", $V1);
            $valor_final = str_replace("$", "", $V2);
            $valornumero = (int) $valor_final;

            $update->bindValue('imagen', utf8_encode($imagen));
            $update->bindValue('nombre_equipo', utf8_encode($nombre_equipo));
            $update->bindValue('marca_equipo', utf8_encode($marca_equipo));
            $update->bindValue('serial_equipo', utf8_encode($serial_equipo));
            $update->bindValue('modelo', utf8_encode($modelo));
            $update->bindValue('unidad_trabajo', utf8_encode($unidad_trabajo));
            $update->bindValue('tipo_equipo', utf8_encode($tipo_equipo));
            $update->bindValue('placa', utf8_encode($placa));
            $update->bindValue('propietario', utf8_encode($propietario));
            $update->bindValue('valor_activo', utf8_encode($valornumero));
            $update->bindValue('motor', utf8_encode($motor));
            $update->bindValue('peso', utf8_encode($peso));
            $update->bindValue('fecha_adquisicion', utf8_encode($fecha_adquisicion));
            $update->bindValue('observaciones', utf8_encode($observaciones));
            $update->bindValue('comision', utf8_encode($comision));
            $update->bindValue('inicial', utf8_encode($inicial));
            $update->bindValue('id_equipo', utf8_encode($id_equipo));
            $update->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuración ":{"text":' . $e->getMessage() . '}}';
        }
    }

/********************************************************************
 *** FUNCION PARA MODIFICAR EQUIPO ****
 ********************************************************************/
    public static function actualizarvol($id_equipo, $campos)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);

            $update = $db->prepare('UPDATE equipos SET
                                nombre_equipo=:nombre_equipo,
                                marca_equipo=:marca_equipo,
                                serial_equipo=:serial_equipo,
                                modelo=:modelo,
                                unidad_trabajo=:unidad_trabajo,
                                tipo_equipo=:tipo_equipo,
                                placa=:placa,
                                propietario=:propietario,
                                valor_unidad=:valor_unidad,
                                modulo=:modulo,
                                observaciones=:observaciones,
                                rend_interno=:rend_interno,
                                unidad_interna=:unidad_interna,
                                rend_externo=:rend_externo,
                                unidad_externa=:unidad_externa
                                WHERE id_equipo=:id_equipo');

            $V1          = str_replace(".", "", $valor_unidad);
            $V2          = str_replace(" ", "", $V1);
            $valor_final = str_replace("$", "", $V2);
            $valornumero = (int) $valor_final;

            $update->bindValue('nombre_equipo', utf8_encode($nombre_equipo));
            $update->bindValue('marca_equipo', utf8_encode($marca_equipo));
            $update->bindValue('serial_equipo', utf8_encode($serial_equipo));
            $update->bindValue('modelo', utf8_encode($modelo));
            $update->bindValue('unidad_trabajo', utf8_encode($unidad_trabajo));
            $update->bindValue('tipo_equipo', utf8_encode($tipo_equipo));
            $update->bindValue('placa', utf8_encode($placa));
            $update->bindValue('propietario', utf8_encode($propietario));
            $update->bindValue('valor_unidad', utf8_encode($valornumero));
            $update->bindValue('modulo', utf8_encode($modulo));
            $update->bindValue('observaciones', utf8_encode($observaciones));
            $update->bindValue('rend_interno', utf8_encode($rend_interno));
            $update->bindValue('unidad_interna', utf8_encode($unidad_interna));
            $update->bindValue('rend_externo', utf8_encode($rend_externo));
            $update->bindValue('unidad_externa', utf8_encode($unidad_externa));
            $update->bindValue('id_equipo', utf8_encode($id_equipo));
            $update->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuración ":{"text":' . $e->getMessage() . '}}';
        }
    }

/********************************************************************
 *** FUNCION PARA MODIFICAR REPORTE DE EQUIPO ****
 ********************************************************************/
    public static function actualizareporte($id_reporte, $campos)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);


            $V1          = str_replace(".", "", $valor_reporte);
            $V2          = str_replace(" ", "", $V1);
            $valor_final = str_replace("$", "", $V2);
            $valornumero = (int) $valor_final;

            $update = $db->prepare('UPDATE reporte_equipos SET
                                equipo_id_equipo=:equipo_id_equipo,
                                fecha_reporte=:fecha_reporte,
                                valor_reporte=:valor_reporte,
                                problema=:problema,
                                actividad=:actividad,
                                repuesto=:repuesto,
                                marca_temporal=:marca_temporal,
                                creado_por=:creado_por,
                                mecanico_id=:mecanico_id,
                                reporte_publicado=:reporte_publicado,
                                estado_reporte=:estado_reporte,
                                num_salida_inv=:num_salida_inv
                                WHERE id_reporte=:id_reporte');

            $update->bindValue('equipo_id_equipo', utf8_encode($equipo_id_equipo));
            $update->bindValue('fecha_reporte', utf8_encode($fecha_reporte));
            $update->bindValue('valor_reporte', utf8_encode($valornumero));
            $update->bindValue('problema', utf8_encode($problema));
            $update->bindValue('actividad', utf8_encode($actividad));
            $update->bindValue('repuesto', utf8_encode($repuesto));
            $update->bindValue('marca_temporal', utf8_encode($marca_temporal));
            $update->bindValue('creado_por', $creado_por);
            $update->bindValue('mecanico_id', $mecanico_id);
            $update->bindValue('reporte_publicado', $reporte_publicado);
            $update->bindValue('estado_reporte', $estado_reporte);
            $update->bindValue('num_salida_inv', $num_salida_inv);
            $update->bindValue('id_reporte', utf8_encode($id_reporte));
            $update->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuración ":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
( `imagen`, `nombre_equipo`, `marca_equipo`, `serial_equipo`, `modelo`, `unidad_trabajo`, `tipo_equipo`, `placa`, `propietario`, `valor_activo`, `motor`, `peso`, `fecha_adquisicion`, `estado_equipo`, `equipo_publicado`, `creado_por`, `marca_temporal`, `modulo`, `observaciones`)
 ***************************************************************/
    public static function guardar($campos, $imagen)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);

            $insert = $db->prepare('INSERT INTO equipos VALUES (NULL,:imagen,:nombre_equipo, :marca_equipo, :serial_equipo, :modelo, :unidad_trabajo, :tipo_equipo, :placa, :propietario,:valor_activo,:motor,:peso,:fecha_adquisicion, :estado_equipo, :equipo_publicado, :creado_por, :marca_temporal,:modulo, :observaciones,:comision,:inicial)'); //

            $V1          = str_replace(".", "", $valor_activo);
            $V2          = str_replace(" ", "", $V1);
            $valor_final = str_replace("$", "", $V2);
            $valornumero = (int) $valor_final;

            $insert->bindValue('imagen', utf8_encode($imagen));
            $insert->bindValue('nombre_equipo', utf8_encode($nombre_equipo));
            $insert->bindValue('marca_equipo', utf8_encode($marca_equipo));
            $insert->bindValue('serial_equipo', utf8_encode($serial_equipo));
            $insert->bindValue('modelo', utf8_encode($modelo));
            $insert->bindValue('unidad_trabajo', utf8_encode($unidad_trabajo));
            $insert->bindValue('tipo_equipo', utf8_encode($tipo_equipo));
            $insert->bindValue('placa', utf8_encode($placa));
            $insert->bindValue('propietario', utf8_encode($propietario));
            $insert->bindValue('valor_activo', utf8_encode($valornumero));
            $insert->bindValue('motor', utf8_encode($motor));
            $insert->bindValue('peso', utf8_encode($peso));
            $insert->bindValue('fecha_adquisicion', utf8_encode($fecha_adquisicion));
            $insert->bindValue('estado_equipo', utf8_encode($estado_equipo));
            $insert->bindValue('equipo_publicado', utf8_encode($equipo_publicado));
            $insert->bindValue('creado_por', utf8_encode($creado_por));
            $insert->bindValue('marca_temporal', utf8_encode($marca_temporal));
            $insert->bindValue('modulo', utf8_encode($modulo));
            $insert->bindValue('observaciones', utf8_encode($observaciones));
            $insert->bindValue('comision', utf8_encode($comision));
            $insert->bindValue('inicial', utf8_encode($inicial));

            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR ESTADO **
 ***************************************************************/
    public static function guardarestado($equipo_id_equipo, $fecha_reporte, $estado_sel, $estado_publicado, $creado_por, $marca_temporal)
    {
        try {
            $db = Db::getConnect();

            $insert = $db->prepare('INSERT INTO reporte_estado_equipos VALUES (NULL,:equipo_id_equipo,:fecha_reporte,:estado_sel,:estado_publicado, :creado_por, :marca_temporal)'); //Fredy Gonzalez 29/03/2021

            $insert->bindValue('equipo_id_equipo', utf8_encode($equipo_id_equipo));
            $insert->bindValue('fecha_reporte', utf8_encode($fecha_reporte));
            $insert->bindValue('estado_sel', utf8_encode($estado_sel));
            $insert->bindValue('estado_publicado', utf8_encode($estado_publicado));
            $insert->bindValue('creado_por', utf8_encode($creado_por));
            $insert->bindValue('marca_temporal', utf8_encode($marca_temporal));

            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
 ***************************************************************/
    public static function guardarvol($campos)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);

            $insert = $db->prepare('INSERT INTO equipos VALUES (NULL,:nombre_equipo, :marca_equipo, :serial_equipo, :modelo, :unidad_trabajo, :tipo_equipo, :placa, :propietario,:valor_unidad, :estado_equipo, :equipo_publicado, :creado_por, :marca_temporal,:modulo, :observaciones,:rend_interno,:unidad_interna,:rend_externo,:unidad_externa,:sn_ver_estadistica)'); //Harold Gutierrez

            $V1          = str_replace(".", "", $valor_unidad);
            $V2          = str_replace(" ", "", $V1);
            $valor_final = str_replace("$", "", $V2);
            $valornumero = (int) $valor_final;

            $insert->bindValue('nombre_equipo', utf8_encode($nombre_equipo));
            $insert->bindValue('marca_equipo', utf8_encode($marca_equipo));
            $insert->bindValue('serial_equipo', utf8_encode($serial_equipo));
            $insert->bindValue('modelo', utf8_encode($modelo));
            $insert->bindValue('unidad_trabajo', utf8_encode($unidad_trabajo));
            $insert->bindValue('tipo_equipo', utf8_encode($tipo_equipo));
            $insert->bindValue('placa', utf8_encode($placa));
            $insert->bindValue('propietario', utf8_encode($propietario));
            $insert->bindValue('valor_unidad', utf8_encode($valornumero));
            $insert->bindValue('estado_equipo', utf8_encode($estado_equipo));
            $insert->bindValue('equipo_publicado', utf8_encode($equipo_publicado));
            $insert->bindValue('creado_por', utf8_encode($creado_por));
            $insert->bindValue('marca_temporal', utf8_encode($marca_temporal));
            $insert->bindValue('modulo', utf8_encode($modulo));
            $insert->bindValue('observaciones', utf8_encode($observaciones));
            $insert->bindValue('rend_interno', utf8_encode($rend_interno));
            $insert->bindValue('unidad_interna', utf8_encode($unidad_interna));
            $insert->bindValue('rend_externo', utf8_encode($rend_externo));
            $insert->bindValue('unidad_externa', utf8_encode($unidad_externa));
            $insert->bindValue('sn_ver_estadistica', utf8_encode('1')); //Harold Gutierrez 14/08/2020
            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR REPORTE**
 * (`id_reporte`, `equipo_id_equipo`, `fecha_reporte`, `fecha_reparado`, `valor_reporte`, `problema`, `actividad`, `repuesto`, `marca_temporal`, `creado_por`, `mecanico_id`, `mantenimiento_id`, `reporte_publicado`, `estado_reporte`, `num_salida_inv`)
 ***************************************************************/
    public static function guardareporte($campos)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);

            $insert = $db->prepare('INSERT INTO reporte_equipos VALUES (NULL,:equipo_id_equipo, :fecha_reporte,:valor_reporte,:problema,:actividad,:repuesto, :marca_temporal, :creado_por, :reporte_publicado, :estado_reporte,:num_salida_inv)');

            $t          = strtotime($fecha_reporte);
            $nuevafecha = date('y-m-d', $t);
            $insert->bindValue('equipo_id_equipo', utf8_encode($equipo_id_equipo));
            $insert->bindValue('fecha_reporte', utf8_encode($nuevafecha));
            $insert->bindValue('valor_reporte', utf8_encode($valor_reporte));
            $insert->bindValue('problema', $problema);
            $insert->bindValue('actividad', $actividad);
            $insert->bindValue('repuesto', $repuesto);
            $insert->bindValue('marca_temporal', utf8_encode($marca_temporal));
            $insert->bindValue('creado_por', utf8_encode($creado_por));
            $insert->bindValue('reporte_publicado', utf8_encode($reporte_publicado));
            $insert->bindValue('estado_reporte', utf8_encode($estado_reporte));
            $insert->bindValue('num_salida_inv', utf8_encode($num_salida_inv));
            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR REPORTE**
 * (`id_reporte`, `equipo_id_equipo`, `fecha_reporte`, `fecha_reparado`, `valor_reporte`, `problema`, `actividad`, `repuesto`, `marca_temporal`, `creado_por`, `mecanico_id`, `mantenimiento_id`, `reporte_publicado`, `estado_reporte`, `num_salida_inv`)
 *
 ***************************************************************/
    public static function guardarordentrabajo($equipo_id_equipo, $fecha_reporte, $problema, $marca_temporal, $creado_por, $estado_publicado, $estado_reporte, $tiempo, $mecanico_id, $mantenimiento_id)
    {
        try {
            $db = Db::getConnect();

            $valordefault = 0;

            $insert = $db->prepare('INSERT INTO reporte_equipos VALUES (NULL,:equipo_id_equipo, :fecha_reporte,:fecha_reparado,:valor_reporte,:problema,:actividad,:repuesto,:marca_temporal, :creado_por,:mecanico_id,:mantenimiento_id,:reporte_publicado, :estado_reporte,:num_salida_inv)');

            $t          = strtotime($fecha_reporte);
            $nuevafecha = date('y-m-d', $t);
            $insert->bindValue('equipo_id_equipo', utf8_encode($equipo_id_equipo));
            $insert->bindValue('fecha_reporte', utf8_encode($nuevafecha));
            $insert->bindValue('fecha_reparado', utf8_encode($tiempo));
            $insert->bindValue('valor_reporte', utf8_encode($valordefault));
            $insert->bindValue('problema', $problema);
            $insert->bindValue('actividad', utf8_encode($valordefault));
            $insert->bindValue('repuesto', utf8_encode($valordefault));
            $insert->bindValue('marca_temporal', utf8_encode($marca_temporal));
            $insert->bindValue('creado_por', utf8_encode($creado_por));
            $insert->bindValue('mecanico_id', utf8_encode($mecanico_id));
            $insert->bindValue('mantenimiento_id', utf8_encode($mantenimiento_id));
            $insert->bindValue('reporte_publicado', utf8_encode($estado_publicado));
            $insert->bindValue('estado_reporte', utf8_encode($estado_reporte));
            $insert->bindValue('num_salida_inv', utf8_encode($valordefault));

            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"textdd":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCIONES VER ULTIMOS DOCUMENTOS EN  INDEX   **
 ***************************************************************/
    public static function obtenerUltimosReportes()
    {
        try {
            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM reporte_equipos order by id_reporte desc limit 10");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCIONES VER ULTIMOS REPORTES POR EQUIPO   **
 ***************************************************************/
    public static function obtenerUltimosReportespor($id)
    {
        try {
            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM reporte_horas WHERE equipo_id_equipo='" . $id . "' order by id desc limit 10");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCIONES PARA GRÁFICAS REPORTE  X DIA X EQUIPO **
 ***************************************************************/
    public static function GraficaReporteDiario($mes, $equipo)
    {
        try {
            $db      = Db::getConnect();
            $select  = $db->query("SELECT DATE_FORMAT(fecha_reporte, '%d') as DIA, IFNULL(ROUND(SUM(num_trabajado),1),0) AS TB FROM reporte_equipos WHERE MONTH(fecha_reporte)='" . $mes . "' and equipo_id_equipo='" . $equipo . "' GROUP by DIA");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function cambiarvisualizacionestadistica($id, $sn_estadistica)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE equipos set sn_ver_estadistica=" . $sn_estadistica . " WHERE id_equipo='" . $id . "'");
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
    public static function obtenerNovedadesPor($id)
    {
        try {
            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM reporte_estado_equipos WHERE equipo_id_equipo='" . $id . "' and estado_publicado='1' order by fecha_reporte asc");
            $camposs = $select->fetchAll();
            $campos  = new Equipos('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

}
