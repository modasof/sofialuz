<?php
class HorasmqController {
	function __construct() {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function horas() {
		$campos=Horasmq::ReporteHoras();;
		require_once 'vistas/horasmq/reportehoras.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function horasporfecha() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Horasmq::ReporteHoras();;
		require_once 'vistas/horasmq/reportehoras.php';
	}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarhoras() {

	


	//(id, imagen, fecha_reporte, equipo_id_equipo, despachado_por, punto_despacho, recibido_por, valor_m3, valor_hora_operador, cantidad, indicador, hora_inactiva, creado_por, estado_reporte, reporte_publicado, marca_temporal, observaciones, proyecto_id_proyecto, cliente_id_cliente, equipo_adicional, nombre_equipo_adicional)

	//$imagen=$_POST['imagen'];
	$fecha_reporte=$_POST['fecha_reporte'];
	$equipo_id_equipo=$_POST['equipo_id_equipo'];
	$despachado_por=$_POST['despachado_por'];
	$punto_despacho=$_POST['punto_despacho'];
	$recibido_por=$_POST['recibido_por'];
	$valor_m3=$_POST['valor_m3'];
	$valor_hora_operador=$_POST['valor_hora_operador'];
	$cantidad=$_POST['cantidad'];
	$indicador=$_POST['indicador'];
	$hora_inactiva=$_POST['hora_inactiva'];
	$creado_por=$_POST['creado_por'];
	$estado_reporte=$_POST['estado_reporte'];
	$reporte_publicado=$_POST['reporte_publicado'];
	$marca_temporal=$_POST['marca_temporal'];
	$observaciones=$_POST['observaciones'];
	$proyecto_id_proyecto=$_POST['proyecto_id_proyecto'];
	$cliente_id_cliente=$_POST['cliente_id_cliente'];
	$equipo_adicional=$_POST['equipo_adicional'];
	$nombre_equipo_adicional=$_POST['nombre_equipo_adicional'];

	$ruta_imagen=$this->subir_fichero('images/horasmq','imagen');


	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
		if ($campo=="texto"){
			$nuevoarreglo[$campo]=$valor;  //OJO AL TEXTO DEL SLIDER ACEPTA ETIQUETAS PHP
		}else{
			//ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
			$campo = strip_tags(trim($campo));
			$campo  = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

			$valor = strip_tags(trim($valor));
			$valor  = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
			if ($campo=="imagen2"){
			$nuevoarreglo[$campo]=$ruta_imagen;
		}else{
			$nuevoarreglo[$campo]=$valor;
			}
		}
	}
	//array_push($nuevoarreglo,$nuevo);
	//$campo = new Horasmq('',$nuevoarreglo);
	$valor_hora=Horasmq::Consultalistaprecios($cliente_id_cliente,$proyecto_id_proyecto,$equipo_id_equipo);
	if ($valor_hora=='') {
		$valor_finalhora=0;
	}else
	{
		$valor_finalhora=$valor_hora;
	}

	$res = Horasmq::guardarhoras($ruta_imagen,$fecha_reporte, $equipo_id_equipo, $despachado_por, $punto_despacho, $recibido_por, $valor_finalhora, $valor_hora_operador, $cantidad, $indicador, $hora_inactiva, $creado_por, $estado_reporte, $reporte_publicado, $marca_temporal, $observaciones, $proyecto_id_proyecto, $cliente_id_cliente, $equipo_adicional, $nombre_equipo_adicional);



	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showhoras();
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarhoras() {
		$id = $_GET['id'];
		$res = Horasmq::eliminarhorasPor($id);
		if ($res){
			echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Horasmq::ReporteHoras();
		require_once 'vistas/horasmq/reportehoras.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editarhoras() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Horasmq::editarhorasPor($id);
		require_once 'vistas/horasmq/formeditarhoras.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizarhoras(){
	$id = $_GET['id'];
	if (empty($_FILES['imagen']['name'])){
		$ruta_imagen = $_POST['ruta1'];
	} else {
		$ruta_imagen=$this->subir_fichero('images/horasmq','imagen');
	}
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);

	foreach ($variable as $campo => $valor){
		if ($campo=="texto"){
			$nuevoarreglo[$campo]=$valor;  //OJO AL TEXTO DEL SLIDER ACEPTA ETIQUETAS PHP
		}else{
			//ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
			$campo = strip_tags(trim($campo));
			$campo  = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

			$valor = strip_tags(trim($valor));
			$valor  = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
			if ($campo=="imagen"){
			$nuevoarreglo[$campo]=$ruta_imagen;
		}else{
			$nuevoarreglo[$campo]=$valor;
		}
		}
	}

	$datosguardar = new Horasmq($id,$nuevoarreglo);
	$res = Horasmq::actualizarhoras($id,$datosguardar,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}
	$this->showhoras();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
function showhoras(){
	$campos=Horasmq::ReporteHoras();
	require_once 'vistas/horasmq/reportehoras.php';
}

/*************************************************************/
/* FUNCION PARA SUBIR UN ARCHIVO  */
/*************************************************************/

	function subir_fichero($directorio_destino, $nombre_fichero)
	{
		$tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
		//si hemos enviado un directorio que existe realmente y hemos subido el archivo
		if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
		{
			$img_file = $_FILES[$nombre_fichero]['name'];
			$Aleaotorio=rand(0,99999);
			$img_file=$Aleaotorio.$img_file;
			$img_type = $_FILES[$nombre_fichero]['type'];
			// Si se trata de una imagen
			if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||strpos($img_type, "jpg")) || strpos($img_type, "png")))
			{
				//¿Tenemos permisos para subir la imágen?
				if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
				{
					$retornar = $directorio_destino . '/' . $img_file; //RETORNAMOS EL NOMBRE Y RUTA DEL FICHERO
					return $retornar;
				}
			} else {
				if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
				{
					$retornar = $directorio_destino . '/' . $img_file; //RETORNAMOS EL NOMBRE Y RUTA DEL FICHERO
					return $retornar;
				}
			}
		}
		//Si llegamos hasta aquí es que algo ha fallado
		$vacio ='';
		return $vacio;
	}



 }
