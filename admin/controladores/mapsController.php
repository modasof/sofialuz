<?php
class MapsController {
	function __construct() {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function todos() {
		$campos=Maps::todos();;
		require_once 'vistas/maps/todos.php';
	}

	/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function disponibles() {
		$campos=Maps::disponibles();;
		require_once 'vistas/maps/disponibles.php';
	}

		/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function ocupados() {
		$campos=Maps::ocupados();;
		require_once 'vistas/maps/ocupados.php';
	}

	/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function porusuario() {

		$id = $_GET['id'];
		$campos=Maps::porusuario($id);;
		require_once 'vistas/maps/porusuario.php';
	}

    /*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
    public function reporteestadocond()
    {

        $ubicacion      = $_POST['autorizado'];
        $cadena         = explode(",", $ubicacion);
        $usuario_id     = $_POST['usuario_id'];
        $marca_temporal = $_POST['marca_temporal'];
        $fecha_reporte  = $_POST['fecha_reporte'];
        $equipo_id_equipo = $_POST['equipo_id_equipo'];
        $latitud        = $cadena[0];
        $longuitud      = $cadena[1];
        $estado_usuario = $_POST['estado_usuario'];

        $validacionestadocond = Maps::validacionestado($usuario_id);

        if ($validacionestadocond>0) {
             $res = Maps::actualizarestadocon($fecha_reporte, $usuario_id, $marca_temporal, $latitud, $longuitud, $estado_usuario);
        }else{
            $res = Maps::guardarestadocon($fecha_reporte, $usuario_id, $marca_temporal, $latitud, $longuitud, $estado_usuario,$equipo_id_equipo);
        }

        

        if ($res) {
             
           echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\").then(function(){window.location='?controller=index&&action=index';});});</script>";
        } else {
            
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\").then(function(){window.location='?controller=index&&action=index';});});</script>";
        }
    }

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

 }
