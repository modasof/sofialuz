<?php
class ReportesController {
	function __construct() {}
/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function ventas() {
		$campos=Reportes::ReporteVentas();;
		require_once 'vistas/reportes/reporteventas.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function ventasporfecha() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
	$campos=Reportes::ReporteVentas();;
	require_once 'vistas/reportes/reporteventas.php';
}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO CLIENTE */
/*************************************************************/
function clienteextra() {

	$tiporeporte = $_GET['tiporeporte'];
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
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
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardarcliente($campo);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	if ($tiporeporte==1) { // Establecemos 1 para el retornar al formulario de ventas
		$this->showventas();
	}
	elseif ($tiporeporte==2) {
		$this->showdespachos();
	}
	elseif ($tiporeporte==3) {
		$this->showfacturas();
	}
	elseif ($tiporeporte==4) {
		$this->showprestamos();
	}
	elseif ($tiporeporte==5) {
		$this->showdespachosclientesf();
	}
	
}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO CLIENTE */
/*************************************************************/
function productoextra() {

	$tiporeporte = $_GET['tiporeporte'];
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
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
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardarproducto($campo);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	if ($tiporeporte==1) { // Establecemos 1 para el retornar al formulario de ventas
		$this->showventas();
	}
	elseif ($tiporeporte==2) {
		$this->showdespachos();
	}
	elseif ($tiporeporte==3) {
		$this->showdespachosclientesf();
	}
	
}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarventa() {

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
			$nuevoarreglo[$campo]=$valor;
		}
	}
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardarventa($campo);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showventas();
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarventa() {
		$id = $_GET['id'];
		$res = Reportes::eliminarventaPor($id);
		$res = Reportes::eliminarabonoPorventa($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::Reporteventas();
		require_once 'vistas/reportes/reporteventas.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function cambiarestadoventa() {
		$id = $_GET['id'];
		$res = Reportes::cambiarestadoventaPor($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se han actualizado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"No se han actualizado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::Reporteventas();
		require_once 'vistas/reportes/reporteventas.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function cambiarestadoprestamo() {
		$id = $_GET['id'];
		$res = Reportes::cambiarestadoprestamoPor($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se han actualizado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"No se han actualizado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::ReportePrestamos();
		require_once 'vistas/reportes/reporteprestamos.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editarventa() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Reportes::editarventaPor($id);
		require_once 'vistas/reportes/formeditarventa.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizarventa(){
	$id = $_GET['id'];
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
			$nuevoarreglo[$campo]=$valor;
		}
	}

	$datosguardar = new Reportes($id,$nuevoarreglo);
	$res = Reportes::actualizarventa($id,$datosguardar);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}
	$this->showventas();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function showventas(){
		$campos=Reportes::ReporteVentas();
		require_once 'vistas/reportes/reporteventas.php';
	}



//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************

	/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function compras() {
		$campos=Reportes::ReporteCompras();;
		require_once 'vistas/reportes/reportecompras.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function comprasporfecha() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportes::ReporteCompras();;
		require_once 'vistas/reportes/reportecompras.php';
	}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO CLIENTE */
/*************************************************************/
function insumoextra() {

	$tiporeporte = $_GET['tiporeporte'];
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
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
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardarinsumo($campo);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	if ($tiporeporte==1) { // Establecemos 1 para el retornar al formulario de ventas
		$this->showcompras();
	}
	elseif ($tiporeporte==2) { // Establecemos 1 para el retornar al formulario de ventas
		$this->showcuentasxpagar();
	}
	
}


/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO PROVEEDOR */
/*************************************************************/
function proveedorextra() {

	$tiporeporte = $_GET['tiporeporte'];
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
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
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardarproveedor($campo);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	if ($tiporeporte==1) { // Establecemos 1 para el retornar al formulario de ventas
		$this->showcompras();
	}
	elseif ($tiporeporte==2) { // Establecemos 1 para el retornar al formulario de ventas
		$this->showcuentasxpagar();
	}
	
}


/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarcompra() {

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
			$nuevoarreglo[$campo]=$valor;
		}
	}
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardarcompra($campo);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showcompras();
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarcompra() {
		$id = $_GET['id'];
		$res = Reportes::eliminarcompraPor($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::Reportecompras();
		require_once 'vistas/reportes/reportecompras.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editarcompra() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Reportes::editarcompraPor($id);
		require_once 'vistas/reportes/formeditarcompra.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizarcompra(){
	$id = $_GET['id'];
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
			$nuevoarreglo[$campo]=$valor;
		}
	}

	$datosguardar = new Reportes($id,$nuevoarreglo);
	$res = Reportes::actualizarcompra($id,$datosguardar);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}
	$this->showcompras();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function showcompras(){
		$campos=Reportes::ReporteCompras();
		require_once 'vistas/reportes/reportecompras.php';
	}


//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function despachos() {
		$campos=Reportes::ReporteDespachos();;
		require_once 'vistas/reportes/reportedespachos.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function despachosporfecha() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportes::ReporteDespachos();;
		require_once 'vistas/reportes/reportedespachos.php';
	}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardardespacho() {

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
			$nuevoarreglo[$campo]=$valor;
		}
	}
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardardespacho($campo);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showdespachos();
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminardespacho() {
		$id = $_GET['id'];
		$res = Reportes::eliminardespachoPor($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::Reportedespachos();
		require_once 'vistas/reportes/reportedespachos.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editardespacho() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Reportes::editardespachoPor($id);
		require_once 'vistas/reportes/formeditardespacho.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizardespacho(){
	$id = $_GET['id'];
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
			$nuevoarreglo[$campo]=$valor;
		}
	}

	$datosguardar = new Reportes($id,$nuevoarreglo);
	$res = Reportes::actualizardespacho($id,$datosguardar);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}
	$this->showdespachos();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
function showdespachos(){
	$campos=Reportes::ReporteDespachos();
	require_once 'vistas/reportes/reportedespachos.php';
}



//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function facturas() {
		$campos=Reportes::ReporteFacturas();;
		require_once 'vistas/reportes/reportefacturas.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function facturasporfecha() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
	$campos=Reportes::ReporteFacturas();;
	require_once 'vistas/reportes/reportefacturas.php';
}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarfactura() {
	$ruta_imagen=$this->subir_fichero('images/facturasporcobrar','imagen');
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
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
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardarfactura($campo,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showfacturas();
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarfactura() {
		$id = $_GET['id'];
		$res = Reportes::eliminarfacturaPor($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::Reportefacturas();
		require_once 'vistas/reportes/reportefacturas.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editarfactura() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Reportes::editarfacturaPor($id);
		require_once 'vistas/reportes/formeditarfactura.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizarfactura(){
	
	$id = $_GET['id'];
	if (empty($_FILES['imagen']['name'])){
		$ruta_imagen = $_POST['ruta1'];
	} else {
		$ruta_imagen=$this->subir_fichero('images/facturasporcobrar','imagen');
	}
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);

	foreach ($variable as $campo => $valor){
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

	$datosguardar = new Reportes($id,$nuevoarreglo);
	$res = Reportes::actualizarfactura($id,$datosguardar,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}
	$campos = Reportes::editarfacturaPor($id);
	require_once 'vistas/reportes/formeditarfactura.php';
}

/*************************************************************/
/* FUNCION PARA GUARDAR ABONOS*/
/*************************************************************/
function guardarabono(){
	
	$tipo = $_GET['tipo'];
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
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
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardarabono($campo);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}

	if ($tipo=="Venta_Material") {
		$campos=Reportes::ReporteVentas();;
	require_once 'vistas/reportes/reporteventas.php';
	}
	elseif ($tipo=="Venta_Equipos") {
		$campos=Reportes::ReportePrestamos();;
	require_once 'vistas/reportes/reporteprestamos.php';
	}
	elseif ($tipo=="Cuenta_x_pagar") {
		$campos=Reportes::ReporteCuentasxpagar();;
	require_once 'vistas/reportes/reportecuentasxpagar.php';
	}
	elseif ($tipo=="Insumo_x_pagar") {
		$campos=Reportes::ReporteInsumosxpagar();;
	require_once 'vistas/reportes/reporteinsumosxpagar.php';
	}

	
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarabono() {
		$id = $_GET['id'];
		$tipo = $_GET['tipo'];
		$idabono = $_GET['idabono'];
		$res = Reportes::eliminarabonoPor($idabono);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		if ($tipo=="Material") {
			$campos=Reportes::ReporteVentas();;
			require_once 'vistas/reportes/reporteventas.php';
		}
		elseif ($tipo=="Equipo") {
			$campos=Reportes::ReportePrestamos();;
			require_once 'vistas/reportes/reporteprestamos.php';
		}
		elseif ($tipo=="Cuentaxpagar") {
			$campos=Reportes::ReporteCuentasxpagar();;
			require_once 'vistas/reportes/reportecuentasxpagar.php';
		}
		
	}


/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function showfacturas(){
		$campos=Reportes::ReporteFacturas();
		require_once 'vistas/reportes/reportefacturas.php';
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

//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************

	/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/


	function cuentasxpagar() {
		$campos=Reportes::ReporteCuentasxpagar();;
		require_once 'vistas/reportes/reportecuentasxpagar.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function cuentasxpagarporfecha() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportes::ReporteCuentasxpagar();;
		require_once 'vistas/reportes/reportecuentasxpagar.php';
	}


/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarcuentaxpagar() {

	$ruta_imagen=$this->subir_fichero('images/cuentasporpagar','imagen');
	//$nuevo['imagen']=$ruta_imagen;
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
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
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardarcuentaxpagar($campo,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showcuentasxpagar();
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarcuentaxpagar() {
		$id = $_GET['id'];
		$res = Reportes::eliminarcuentaxpagarPor($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::ReporteCuentasxpagar();
		require_once 'vistas/reportes/reportecuentasxpagar.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function cancelarcuentaxpagar() {
		$id = $_GET['id'];
		$res = Reportes::cancelarcuentaxpagarPor($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos Trasladados!\", \"Los datos se han pasado a compras correctamente \", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al Trasladadar!\", \"No se han trasladado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::ReporteCuentasxpagar();
		require_once 'vistas/reportes/reportecuentasxpagar.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editarcuentaxpagar() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Reportes::editarcuentaxpagarPor($id);
		require_once 'vistas/reportes/formeditarcuentaxpagar.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizarcuentaxpagar(){
	$id = $_GET['id'];
	if (empty($_FILES['imagen']['name'])){
		$ruta_imagen = $_POST['ruta1'];
	} else {
		$ruta_imagen=$this->subir_fichero('images/cuentasporpagar','imagen');
	}
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);

	foreach ($variable as $campo => $valor){
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
	$datosguardar = new Reportes($id,$nuevoarreglo);
	$res = Reportes::actualizarcuentaxpagar($id,$datosguardar,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}
	$this->showcuentasxpagar();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function showcuentasxpagar(){
		$campos=Reportes::ReporteCuentasxpagar();
		require_once 'vistas/reportes/reportecuentasxpagar.php';
	}
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


	/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/


	function cuentasxpagarconsolidado() {
		$campos=Reportes::ReporteCuentasxpagarconsolidado();;
		require_once 'vistas/reportes/reportecuentasxpagarconsolidado.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function cuentasxpagarporfechaconsolidado() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportes::ReporteCuentasxpagarconsolidado();;
		require_once 'vistas/reportes/reportecuentasxpagarconsolidado.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function cuentasxpagardetalle() {
		$idproveedor = $_GET['idproveedor'];
		$campos=Reportes::ReporteCuentasxpagardetalle($idproveedor);;
		require_once 'vistas/reportes/reportecuentasxpagardetalle.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function cuentasxpagarporfechadetalle() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportes::ReporteCuentasxpagardetalle();;
		require_once 'vistas/reportes/reportecuentasxpagardetalle.php';
	}

//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************

	/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function insumosxpagar() {
		$campos=Reportes::ReporteInsumosxpagar();;
		require_once 'vistas/reportes/reporteinsumosxpagar.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function insumosxpagarporfecha() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportes::ReporteInsumosxpagar();;
		require_once 'vistas/reportes/reporteinsumosxpagar.php';
	}


/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarinsumoxpagar() {

	$ruta_imagen=$this->subir_fichero('images/insumosporpagar','imagen');
	//$nuevo['imagen']=$ruta_imagen;
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
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
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardarinsumoxpagar($campo,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showinsumosxpagar();
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarinsumoxpagar() {
		$id = $_GET['id'];
		$res = Reportes::eliminarinsumoxpagarPor($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::ReporteInsumosxpagar();
		require_once 'vistas/reportes/reporteinsumosxpagar.php';
	}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function cancelarinsumoxpagar() {
		$id = $_GET['id'];
		$res = Reportes::cancelarinsumoxpagarPor($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos Trasladados!\", \"Los datos se han pasado a compras correctamente \", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al Trasladadar!\", \"No se han trasladado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::ReporteInsumosxpagar();
		require_once 'vistas/reportes/reporteinsumosxpagar.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editarinsumoxpagar() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Reportes::editarinsumoxpagarPor($id);
		require_once 'vistas/reportes/formeditarinsumoxpagar.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizarinsumoxpagar(){
	$id = $_GET['id'];
	if (empty($_FILES['imagen']['name'])){
		$ruta_imagen = $_POST['ruta1'];
	} else {
		$ruta_imagen=$this->subir_fichero('images/insumosporpagar','imagen');
	}
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);

	foreach ($variable as $campo => $valor){
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
	$datosguardar = new Reportes($id,$nuevoarreglo);
	$res = Reportes::actualizarinsumoxpagar($id,$datosguardar,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}
	$this->showinsumosxpagar();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function showinsumosxpagar(){
		$campos=Reportes::ReporteInsumosxpagar();
		require_once 'vistas/reportes/reporteinsumosxpagar.php';
	}


//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


	function prestamos() {
		$campos=Reportes::ReportePrestamos();;
		require_once 'vistas/reportes/reporteprestamos.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function prestamosporfecha() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
	$campos=Reportes::ReportePrestamos();;
	require_once 'vistas/reportes/reporteprestamos.php';
}


/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarprestamo() {

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
			$nuevoarreglo[$campo]=$valor;
		}
	}
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardarprestamo($campo);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showprestamos();
}


/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarprestamo() {
		$id = $_GET['id'];
		$res = Reportes::eliminarprestamoPor($id);
		$res = Reportes::eliminarabonoPorprestamo($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::ReportePrestamos();
		require_once 'vistas/reportes/reporteprestamos.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editarprestamo() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Reportes::editarprestamoPor($id);
		require_once 'vistas/reportes/formeditarprestamo.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizarprestamo(){
	$id = $_GET['id'];
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
			$nuevoarreglo[$campo]=$valor;
		}
	}

	$datosguardar = new Reportes($id,$nuevoarreglo);
	$res = Reportes::actualizarprestamo($id,$datosguardar);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}
	$this->showprestamos();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function showprestamos(){
		$campos=Reportes::ReportePrestamos();
		require_once 'vistas/reportes/reporteprestamos.php';
	}




//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function combustibles() {
		$campos=Reportes::ReporteCombustibles();;
		require_once 'vistas/reportes/reportecombustibles.php';
	}

	function combustiblescisterna() {
		$campos=Reportes::ReporteCombustiblescisterna();;
		require_once 'vistas/reportes/reportecombustiblescisterna.php';
	}

function mescombustibleseq() {
		$campos=Reportes::ReporteCombustibles();;
		require_once 'vistas/reportes/reportecombustiblesmeseq.php';
	}

function mesfletes() {
		//$campos=Reportes::ReporteCombustibles();;
		require_once 'vistas/reportes/reportemesflete.php';
	}


function meshorasmq() {
		//$campos=Reportes::ReporteCombustibles();;
		require_once 'vistas/reportes/reportemeshorasmq.php';
	}

	function infovolqueta() {
		$campos=Reportes::ReporteCombustibles();;
		require_once 'vistas/reportes/reporteporvolqueta.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function combustiblesporfecha() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportes::ReporteCombustibles();;
		require_once 'vistas/reportes/reportecombustibles.php';
	}


/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function combustiblesporfechacisterna() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportes::ReporteCombustiblescisterna();;
		require_once 'vistas/reportes/reportecombustiblescisterna.php';
	}




/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarcombustible() {

	$ruta_imagen=$this->subir_fichero('images/combustible','imagen');
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
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardarcombustible($campo,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showcombustibles();
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarcombustible() {
		$id = $_GET['id'];
		$res = Reportes::eliminarcombustiblePor($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::ReporteCombustibles();
		require_once 'vistas/reportes/reportecombustibles.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editarcombustible() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Reportes::editarcombustiblePor($id);
		require_once 'vistas/reportes/formeditarcombustible.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizarcombustible(){
	$id = $_GET['id'];
	$validacisterna = $_GET['validacisterna'];

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

	$datosguardar = new Reportes($id,$nuevoarreglo);
	$res = Reportes::actualizarcombustible($id,$datosguardar,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}

	if ($validacisterna!='') {
		$this->showcombustiblescisterna();
	}
	else
	{
		$this->showcombustibles();
		
	}

	
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
function showcombustibles(){
	$campos=Reportes::ReporteCombustibles();
	require_once 'vistas/reportes/reportecombustibles.php';
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
function showcombustiblescisterna(){
	$campos=Reportes::ReporteCombustiblescisterna();
	require_once 'vistas/reportes/reportecombustiblescisterna.php';
}





//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function despachosclientes() {
		$campos=Reportes::ReporteDespachosclientes();;
		require_once 'vistas/reportes/reportedespachosclientes.php';
	}

	function despachosclientesf() {
		$campos=Reportes::ReporteDespachosclientesf();;
		require_once 'vistas/reportes/reportedespachosclientesf.php';
	}

	// Vista detalle despachos cliente id
	function despachosclientesunico() {
		$idCliente = $_GET['elcliente'];
		$campos=Reportes::ReporteDespachosclientesunico($idCliente);;
		require_once 'vistas/reportes/reportedespachosclientesunico.php';
	}

	// Vista detalle despachos cliente id
	function despachosproveedorunico() {
		$idProveedor = $_GET['elproveedor'];
		$campos=Reportes::ReporteDespachosProveedorunico($idProveedor);;
		require_once 'vistas/reportes/reportedespachosproveedorunico.php';
	}


	function despachospropietario() {
		$campos=Reportes::ReporteDespachosclientes();;
		require_once 'vistas/reportes/reportedespachospropietario.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function despachosporfechaclientes() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportes::ReporteDespachosclientes();;
		require_once 'vistas/reportes/reportedespachosclientes.php';
	}


function despachosporfechaclientesunico() {

$idCliente = $_GET['elcliente'];
if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportes::ReporteDespachosclientesunico($idCliente);;
		require_once 'vistas/reportes/reportedespachosclientesunico.php';
	}

function despachosporfechaproveedorunico() {

$idProveedor = $_GET['elproveedor'];
if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportes::ReporteDespachosproveedorunico($idProveedor);;
		require_once 'vistas/reportes/reportedespachosproveedorunico.php';
	}


function despachosporfechapropietario() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportes::ReporteDespachosclientes();;
		require_once 'vistas/reportes/reportedespachospropietario.php';
	}


/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardardespachoclientesf() {

	$ruta_imagen=$this->subir_fichero('images/remisiones','imagen');
	//$nuevo['imagen']=$ruta_imagen;
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
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
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardardespachoclientesf($campo,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showdespachosclientesf();
}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardardespachoclientes() {

	$ruta_imagen=$this->subir_fichero('images/remisiones','imagen');
	//$nuevo['imagen']=$ruta_imagen;
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);
	foreach ($variable as $campo => $valor){
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
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardardespachoclientes($campo,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showdespachosclientesf();
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminardespachoclientes() {
		$id = $_GET['id'];
		$res = Reportes::eliminardespachoPorclientes($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::Reportedespachosclientes();
		require_once 'vistas/reportes/reportedespachosclientes.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editardespachoclientes() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Reportes::editardespachoPorclientes($id);
		require_once 'vistas/reportes/formeditardespachoclientes.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizardespachoclientes(){
	$id = $_GET['id'];
	if (empty($_FILES['imagen']['name'])){
		$ruta_imagen = $_POST['ruta1'];
	} else {
		$ruta_imagen=$this->subir_fichero('images/remisiones','imagen');
	}
	$variable = $_POST;
	$nuevoarreglo = array();
	extract($variable);

	foreach ($variable as $campo => $valor){
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
	$datosguardar = new Reportes($id,$nuevoarreglo);
	$res = Reportes::actualizardespachoclientes($id,$datosguardar,$ruta_imagen);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}
	$this->showdespachosclientes();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
function showdespachosclientes(){
	$campos=Reportes::ReporteDespachosclientes();
	require_once 'vistas/reportes/reportedespachosclientes.php';
}

function showdespachosclientesf(){
	$campos=Reportes::ReporteDespachosclientesf();
	require_once 'vistas/reportes/reportedespachosclientesf.php';
}



//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function horas() {
		$campos=Reportes::ReporteHoras();;
		require_once 'vistas/reportes/reportehoras.php';
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
		$campos=Reportes::ReporteHoras();;
		require_once 'vistas/reportes/reportehoras.php';
	}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarhoras() {

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
			$nuevoarreglo[$campo]=$valor;
		}
	}
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardarhoras($campo);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showhoras();
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminarhoras() {
		$id = $_GET['id'];
		$res = Reportes::eliminarhorasPor($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::ReporteHoras();
		require_once 'vistas/reportes/reportehoras.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editarhoras() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Reportes::editarhorasPor($id);
		require_once 'vistas/reportes/formeditarhoras.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizarhoras(){
	$id = $_GET['id'];
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
			$nuevoarreglo[$campo]=$valor;
		}
	}

	$datosguardar = new Reportes($id,$nuevoarreglo);
	$res = Reportes::actualizarhoras($id,$datosguardar);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}
	$this->showhoras();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
function showhoras(){
	$campos=Reportes::ReporteHoras();
	require_once 'vistas/reportes/reportehoras.php';
}


//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
//*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************


/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function despachostrituradora() {
		$campos=Reportes::ReporteDespachostrituradora();;
		require_once 'vistas/reportes/reportedespachostrituradora.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR REPORTE POR RANGO DE FECHAS*/
/*************************************************************/

function despachosporfechatrituradora() {

	if (isset($_POST['daterange'])) {
  $fechaform=$_POST['daterange'];
}
elseif (isset($_GET['daterange'])) {
  $fechaform=$_GET['daterange'];
}
		$campos=Reportes::ReporteDespachostrituradora();;
		require_once 'vistas/reportes/reportedespachostrituradora.php';
	}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardardespachotrituradora() {

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
			$nuevoarreglo[$campo]=$valor;
		}
	}
	//array_push($nuevoarreglo,$nuevo);
	$campo = new Reportes('',$nuevoarreglo);
	$res = Reportes::guardardespachotrituradora($campo);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
	}
	$this->showdespachostrituradora();
}

/*************************************************************/
/* FUNCION PARA ELIMINAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function eliminardespachotrituradora() {
		$id = $_GET['id'];
		$res = Reportes::eliminardespachoPortrituradora($id);
		if ($res){
			echo "<script>jQuery(function(){swal(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
		}else{
				echo "<script>jQuery(function(){swal(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
		}
		$campos = Reportes::Reportedespachostrituradora();
		require_once 'vistas/reportes/reportedespachostrituradora.php';
	}

/*************************************************************/
/* FUNCION PARA MODIFICAR  LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/
	function editardespachotrituradora() {
		$id = $_GET['id'];
		$vereditar = $_GET['vereditar'];
		$campos = Reportes::editardespachoPortrituradora($id);
		require_once 'vistas/reportes/formeditardespachotrituradora.php';
	}

/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizardespachotrituradora(){
	$id = $_GET['id'];
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
			$nuevoarreglo[$campo]=$valor;
		}
	}

	$datosguardar = new Reportes($id,$nuevoarreglo);
	$res = Reportes::actualizardespachotrituradora($id,$datosguardar);
	if ($res){
		echo "<script>jQuery(function(){swal(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina de miembros\", \"success\");});</script>";
	}else{
		echo "<script>jQuery(function(){swal(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
	}
	$this->showdespachostrituradora();
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
function showdespachostrituradora(){
	$campos=Reportes::ReporteDespachostrituradora();
	require_once 'vistas/reportes/reportedespachostrituradora.php';
}





 }
