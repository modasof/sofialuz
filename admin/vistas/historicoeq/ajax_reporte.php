<?php
//Include database configuration file
include '../../include/class.conexion.php';

$get_equipo=$_POST['id'];
$get_creadopor=$_POST['creadopor'];


date_default_timezone_set("America/Bogota");
$TiempoActual = date('Y-m-d H:i:s');
$DiaActual = date('Y-m-d');

$estado_publicado='1';
$tiempo="No aplica";
$observaciones="Equipo opera correctamente sin novedad";
$estadosel="Operativo";


if(isset($_POST["id"]) && !empty($_POST["id"])){
	$db=Db::getConnect();

	//(`id`, `equipo_id_equipo`, `fecha_reporte`, `estado_sel`, `estado_publicado`, `creado_por`, `marca_temporal`) 

	$sql="INSERT INTO  reporte_estado_equipos (equipo_id_equipo,fecha_reporte,estado_sel,estado_publicado,creado_por,marca_temporal) VALUES ('".$get_equipo."','".$DiaActual."','".utf8_decode($estadosel)."','".utf8_decode($estado_publicado)."','".utf8_decode($get_creadopor)."','".utf8_decode($TiempoActual)."')";

	$select=$db->query($sql);

		if ($select){
			echo("<span class='text-success'>Actualizado:".$TiempoActual."</span><span class='label label-success'>Operativo</span>");
			return true;

			}else{return false;}
	
	}else{
	echo("<span class='text-success'>Reporte Mal</span>");
}

?>
