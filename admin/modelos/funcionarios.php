<?php
/**
 * CLASE PARA TRABAJAR CON LAS MARCAS
 */
class Funcionarios
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
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS      **
 ********************************************************/
    public static function obtenerPagina()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM funcionarios WHERE funcionario_publicado='1'");
            $camposs = $select->fetchAll();
            $campos  = new Funcionarios('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA VALIDAR UN REGISTRO DUPLICADO **
 ********************************************************/
    public static function validacionpor($documento)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT COUNT(documento) AS total FROM funcionarios WHERE documento='" . $documento . "' and funcionario_publicado='1'");
            $camposs = $select->fetchAll();
            $campos  = new Funcionarios('', $camposs);
            $marcas  = $campos->getCampos();
            foreach ($marcas as $marca) {
                $mar = $marca['total'];
            }
            return $mar;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

    /***************************************************************
 ** FUNCION PARA ELIINAR POR ID  **
 ***************************************************************/
    public static function desactivarempleadoPor($id)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE funcionarios SET funcionario_publicado='0' WHERE id_funcionario='" . $id . "'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCION PARA  DESACTIVAR PERMISO POR ID  **
 ***************************************************************/
    public static function activarempleadoPor($id)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE funcionarios SET funcionario_publicado='1' WHERE id_funcionario='" . $id . "'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE TESTIMONIOS      **
 ********************************************************/
    public static function obtenerPaginainactivos()
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT * FROM funcionarios WHERE funcionario_publicado<>'1'");
            $camposs = $select->fetchAll();
            $campos  = new Funcionarios('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR LA LISTA DE DOCUMENTOS              **
 ********************************************************/
    public static function obtenerDocumentos($funcionario, $modulo)
    {
        try {
            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM documentos as A, gestion_documentalemp as B WHERE B.modulo_id_modulo='" . $modulo . "' and A.estado_documento='1' and B.cuenta_id_cuenta='" . $funcionario . "' and A.id_documento=B.documento_id_documento order by nombre_documento asc");
            $camposs = $select->fetchAll();
            $campos  = new Funcionarios('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER TODAS LAS MARCAS DEL VEHICULO      **
 ********************************************************/
    public static function obtenerCargos()
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM cargos WHERE cargo_publicado='1' order by nombre_cargo");
            $campos        = $select->fetchAll();
            $camposs       = new Funcionarios('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF      **
 ********************************************************/
    public static function obtenerListaFuncionarios()
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM funcionarios WHERE funcionario_publicado='1' order by nombre_funcionario");
            $campos        = $select->fetchAll();
            $camposs       = new Funcionarios('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA OBTENER LA LISTA DE EQUIPOS EN LA ASF      **
 ********************************************************/
    public static function obtenerListaFuncionariosCond()
    {
        try {
            $db            = Db::getConnect();
            $select        = $db->query("SELECT * FROM funcionarios WHERE funcionario_publicado='1' and cargo_id_cargo='4' order by nombre_funcionario");
            $campos        = $select->fetchAll();
            $camposs       = new Funcionarios('', $campos);
            $campostraidos = $camposs->getCampos();
            return $campostraidos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL DOCUMENTO **
 ********************************************************/
    public static function ObtenerNombreCargo($id)
    {
        try {
            $db      = Db::getConnect();
            $select  = $db->query("SELECT nombre_cargo FROM cargos WHERE id_cargo='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Funcionarios('', $camposs);
            $cajas   = $campos->getCampos();
            foreach ($cajas as $ncaja) {
                $lacaja = $ncaja['nombre_cargo'];
            }
            return $lacaja;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/*******************************************************
 ** FUNCION PARA MOSTRAR EL NOMBRE DEL Funcionario **
 ********************************************************/
    public static function obtenerNombreFuncionario($id)
    {
        try {
            $db = Db::getConnect();

            $select  = $db->query("SELECT nombre_funcionario FROM funcionarios WHERE id_funcionario='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Funcionarios('', $camposs);
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
            $select  = $db->query("SELECT * FROM funcionarios WHERE id_funcionario='" . $id . "'");
            $camposs = $select->fetchAll();
            $campos  = new Funcionarios('', $camposs);
            return $campos;
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
            $select  = $db->query("SELECT * FROM novedades WHERE funcionario_id='" . $id . "' and novedad_publicado='1' order by fecha_novedad asc");
            $camposs = $select->fetchAll();
            $campos  = new Funcionarios('', $camposs);
            return $campos;
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 ** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
 ***************************************************************/
    public static function obtenerSoportesPor($id)
    {
        try {
            $db      = Db::getConnect();
            $select  = $db->query("SELECT * FROM soporte_nomina WHERE funcionario_id='" . $id . "' and soporte_publicado='1' order by fecha_soporte asc");
            $camposs = $select->fetchAll();
            $campos  = new Funcionarios('', $camposs);
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
            $select = $db->query("UPDATE funcionarios SET funcionario_publicado='0' WHERE id_funcionario='" . $id . "'");
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
    public static function actualizarfechasalidaPor($id, $fecha_salida)
    {
        try {
            $db = Db::getConnect();

            $t          = strtotime($fecha_salida);
            $nuevafecha = date('y-m-d', $t);

            $select = $db->query("UPDATE funcionarios SET fecha_salida='" . $nuevafecha . "' WHERE id_funcionario='" . $id . "'");
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
    public static function eliminarnovedadPor($id)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE novedades SET novedad_publicado='0' WHERE id='" . $id . "'");
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
    public static function eliminarsoportePor($id)
    {
        try {
            $db     = Db::getConnect();
            $select = $db->query("UPDATE soporte_nomina SET soporte_publicado='0' WHERE id='" . $id . "'");
            if ($select) {
                return true;
            } else {return false;}
        } catch (PDOException $e) {
            echo '{"error en obtener la pagina":{"text":' . $e->getMessage() . '}}';
        }
    }

/********************************************************************
 *** FUNCION PARA MODIFICAR ****
id_funcionario, imagen, nombre_funcionario, fecha_ingreso, fecha_salida, tipo_contrato, cargo_id_cargo, observaciones, creado_por, marca_temporal, funcionario_publicado, estado_funcionario
 ********************************************************************/
    public static function actualizar($id, $campos, $imagen)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);

            $update = $db->prepare('UPDATE funcionarios SET
								imagen=:imagen,
								documento=:documento,
								nombre_funcionario=:nombre_funcionario,
								fecha_ingreso=:fecha_ingreso,
								tipo_contrato=:tipo_contrato,
								cargo_id_cargo=:cargo_id_cargo,
								observaciones=:observaciones,
								empresa=:empresa,
								funcionario_publicado=:funcionario_publicado,
								arl=:arl,
								eps=:eps,
								salario=:salario,
								no_constitutivo=:no_constitutivo,
								bono_movilidad=:bono_movilidad,
								tipo_cuenta=:tipo_cuenta,
								banco=:banco,
								cuenta_bancaria=:cuenta_bancaria,
								ciudad=:ciudad,
								direccion=:direccion,
								celular=:celular,
								correo=:correo
								WHERE id_funcionario=:id_funcionario');

            $t          = strtotime($fecha_ingreso);
            $nuevafecha = date('y-m-d', $t);

            $V1          = str_replace(".", "", $salario);
            $V2          = str_replace(" ", "", $V1);
            $valor_final = str_replace("$", "", $V2);
            $valornumero = (int) $valor_final;

            $V1_1          = str_replace(".", "", $no_constitutivo);
            $V2_1          = str_replace(" ", "", $V1_1);
            $valor_final_1 = str_replace("$", "", $V2_1);
            $valornumero_1 = (int) $valor_final_1;

            $update->bindValue('imagen', utf8_encode($imagen));
            $update->bindValue('documento', utf8_encode($documento));
            $update->bindValue('nombre_funcionario', utf8_encode($nombre_funcionario));
            $update->bindValue('fecha_ingreso', utf8_encode($nuevafecha));
            $update->bindValue('tipo_contrato', utf8_encode($tipo_contrato));
            $update->bindValue('cargo_id_cargo', utf8_encode($cargo_id_cargo));
            $update->bindValue('observaciones', utf8_encode($observaciones));
            $update->bindValue('empresa', utf8_encode($empresa));
            $update->bindValue('funcionario_publicado', utf8_encode($funcionario_publicado));
            $update->bindValue('arl', utf8_encode($arl));
            $update->bindValue('eps', utf8_encode($eps));
            $update->bindValue('salario', utf8_encode($valornumero));
            $update->bindValue('no_constitutivo', utf8_encode($valornumero_1));
            $update->bindValue('bono_movilidad', utf8_encode($bono_movilidad));
            $update->bindValue('tipo_cuenta', utf8_encode($tipo_cuenta));
            $update->bindValue('banco', utf8_encode($banco));
            $update->bindValue('cuenta_bancaria', utf8_encode($cuenta_bancaria));
            $update->bindValue('ciudad', utf8_encode($ciudad));
            $update->bindValue('direccion', utf8_encode($direccion));
            $update->bindValue('celular', utf8_encode($celular));
            $update->bindValue('correo', utf8_encode($correo));
            $update->bindValue('id_funcionario', utf8_encode($id));
            $update->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error al guardar la configuración ":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
id_funcionario, imagen, nombre_funcionario, fecha_ingreso, fecha_salida, tipo_contrato, cargo_id_cargo, observaciones, creado_por, marca_temporal, funcionario_publicado, estado_funcionario
 ***************************************************************/
    public static function guardar($campos, $imagen)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);
            $consulta = "INSERT INTO funcionarios VALUES (NULL,:imagen, :documento,:nombre_funcionario, :fecha_ingreso,:fecha_salida, :tipo_contrato, :cargo_id_cargo, :observaciones, :creado_por, :marca_temporal, :funcionario_publicado, :estado_funcionario,:empresa,:arl,:eps,:salario,:no_constitutivo,:bono_movilidad,:tipo_cuenta,:banco,:cuenta_bancaria,:ciudad,:direccion,:celular,:correo)";
            $insert   = $db->prepare($consulta);

            $V1          = str_replace(".", "", $salario);
            $V2          = str_replace(" ", "", $V1);
            $valor_final = str_replace("$", "", $V2);
            $valornumero = (int) $valor_final;

            $V1_1          = str_replace(".", "", $no_constitutivo);
            $V2_1          = str_replace(" ", "", $V1_1);
            $valor_final_1 = str_replace("$", "", $V2_1);
            $valornumero_1 = (int) $valor_final_1;

            $t          = strtotime($fecha_ingreso);
            $nuevafecha = date('y-m-d', $t);

            $insert->bindValue('imagen', utf8_encode($imagen));
            $insert->bindValue('documento', utf8_encode($documento));
            $insert->bindValue('nombre_funcionario', utf8_encode($nombre_funcionario));
            $insert->bindValue('fecha_ingreso', utf8_encode($nuevafecha));
            $insert->bindValue('fecha_salida', utf8_encode($fecha_salida));
            $insert->bindValue('tipo_contrato', utf8_encode($tipo_contrato));
            $insert->bindValue('cargo_id_cargo', utf8_encode($cargo_id_cargo));
            $insert->bindValue('observaciones', utf8_encode($observaciones));
            $insert->bindValue('creado_por', utf8_encode($creado_por));
            $insert->bindValue('marca_temporal', utf8_encode($marca_temporal));
            $insert->bindValue('funcionario_publicado', utf8_encode($funcionario_publicado));
            $insert->bindValue('estado_funcionario', utf8_encode($estado_funcionario));
            $insert->bindValue('empresa', utf8_encode($empresa));
            $insert->bindValue('arl', utf8_encode($arl));
            $insert->bindValue('eps', utf8_encode($eps));
            $insert->bindValue('salario', utf8_encode($valornumero));
            $insert->bindValue('no_constitutivo', utf8_encode($valornumero_1));
            $insert->bindValue('bono_movilidad', utf8_encode($bono_movilidad));
            $insert->bindValue('tipo_cuenta', utf8_encode($tipo_cuenta));
            $insert->bindValue('banco', utf8_encode($banco));
            $insert->bindValue('cuenta_bancaria', utf8_encode($cuenta_bancaria));
            $insert->bindValue('ciudad', utf8_encode($ciudad));
            $insert->bindValue('direccion', utf8_encode($direccion));
            $insert->bindValue('celular', utf8_encode($celular));
            $insert->bindValue('correo', utf8_encode($correo));
            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
`id`, `funcionario_id`, `reportado_por`, `tipo_novedad`, `fecha_novedad`, `imagen`, `observaciones`, `creado_por`, `estado_novedad`, `novedad_publicado`, `marca_temporal`
 ***************************************************************/
    public static function reportarnovedad($campos, $imagen)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);
            $consulta = "INSERT INTO novedades VALUES (NULL,:funcionario_id, :reportado_por,:tipo_novedad, :fecha_novedad,:imagen, :observaciones,:creado_por, :estado_novedad,:novedad_publicado,:marca_temporal)";
            $insert   = $db->prepare($consulta);

            $t          = strtotime($fecha_novedad);
            $nuevafecha = date('y-m-d', $t);

            $insert->bindValue('funcionario_id', utf8_encode($funcionario_id));
            $insert->bindValue('reportado_por', utf8_encode($reportado_por));
            $insert->bindValue('tipo_novedad', utf8_encode($tipo_novedad));
            $insert->bindValue('fecha_novedad', utf8_encode($nuevafecha));
            $insert->bindValue('imagen', utf8_encode($imagen));
            $insert->bindValue('observaciones', utf8_encode($observaciones));
            $insert->bindValue('creado_por', utf8_encode($creado_por));
            $insert->bindValue('estado_novedad', utf8_encode($estado_novedad));
            $insert->bindValue('novedad_publicado', utf8_encode($novedad_publicado));
            $insert->bindValue('marca_temporal', utf8_encode($marca_temporal));
            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

/***************************************************************
 *** FUNCION PARA GUARDAR **
`id`, `imagen`, `fecha_soporte`, `tipo_soporte`, `observaciones`, `creado_por`, `estado_soporte`, `soporte_publicado`, `marca_temporal`, `funcionario_id`
 ***************************************************************/
    public static function reportarsoporte($campos, $imagen)
    {
        try {
            $db            = Db::getConnect();
            $campostraidos = $campos->getCampos();
            extract($campostraidos);
            $consulta = "INSERT INTO soporte_nomina VALUES (NULL,:imagen, :fecha_soporte,:tipo_soporte, :observaciones,:creado_por, :estado_soporte,:soporte_publicado,:marca_temporal,:funcionario_id)";
            $insert   = $db->prepare($consulta);

            $t          = strtotime($fecha_soporte);
            $nuevafecha = date('y-m-d', $t);

            $insert->bindValue('imagen', utf8_encode($imagen));
            $insert->bindValue('fecha_soporte', utf8_encode($nuevafecha));
            $insert->bindValue('tipo_soporte', utf8_encode($tipo_soporte));
            $insert->bindValue('observaciones', utf8_encode($observaciones));
            $insert->bindValue('creado_por', utf8_encode($creado_por));
            $insert->bindValue('estado_soporte', utf8_encode($estado_soporte));
            $insert->bindValue('soporte_publicado', utf8_encode($soporte_publicado));
            $insert->bindValue('marca_temporal', utf8_encode($marca_temporal));
            $insert->bindValue('funcionario_id', utf8_encode($funcionario_id));
            $insert->execute();

            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

}
