<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$controllers = array(
//AQUI SE ESTABLACE LAS FUNCIONES QUE VA A TENER CADA MODULO
//OJO, CADA OPCION DEBE ESTAR EN EL ARCHIVO NombreModuloController.php dentro del directorio controladores
	'index' => ['index','informe1','informegerencia','informeclientes','informedetalleclientes','informeventaclientes','informedetalleclientesventas','micajamenor','dashboardalmacen','vistarqusuariosdashboard','aprobarRq'],

	'informes' =>['cuentas','movimientoscuentas','subrubrosegresos','cajas','movimientoscaja','subrubrosegresoscaja','ventas','detallelineanegocio','clientes','compras','totalrq','rqporfecha'],

'cuentas' => ['editar','guardar','actualizar','todos','nuevo','eliminar','reporteporfecha','crucecuentas','detallecruce'],

	'usuarios' => ['editar','guardar','actualizar','todos','nuevo','eliminar','editarpermisos','activarmenuPor','desactivarmenuPor','activartodo','desactivartodo'],
	'reportes' => ['ventas','clienteextra','productoextra','guardarventa','eliminarventa','cambiarestadoventa','editarventa','actualizarventa','ventasporfecha','compras','insumoextra','guardarcompra','eliminarcompra','editarcompra','actualizarcompra','comprasporfecha','despachos','guardardespacho','eliminardespacho','editardespacho','actualizardespacho','despachosporfecha','despachosclientes','despachosclientesf','despachosclientesunico','despachosproveedorunico','despachospropietario','guardardespachoclientes','eliminardespachoclientes','editardespachoclientes','actualizardespachoclientes','despachosporfechaclientes','despachosporfechaclientesunico','despachosporfechaproveedorunico','despachosporfechapropietario','facturas','guardarfactura','eliminarfactura','editarfactura','actualizarfactura','facturasporfecha','guardarabono','eliminarabono','cuentasxpagar','cuentasxpagarconsolidado','cuentasxpagardetalle','guardarcuentaxpagar','eliminarcuentaxpagar','cancelarcuentaxpagar','editarcuentaxpagar','actualizarcuentaxpagar','cuentasxpagarporfecha','cuentasxpagarporfechaconsolidado','cuentasxpagarporfechadetalle','prestamos','guardarprestamo','eliminarprestamo','cambiarestadoprestamo','editarprestamo','actualizarprestamo','prestamosporfecha','combustibles','combustiblescisterna','combustiblesporfechacisterna','mescombustibleseq','infovolqueta','guardarcombustible','eliminarcombustible','editarcombustible','actualizarcombustible','combustiblesporfecha','proveedorextra','horas','guardarhoras','eliminarhoras','editarhoras','actualizarhoras','horasporfecha','despachostrituradora','guardardespachotrituradora','eliminardespachotrituradora','editardespachotrituradora','actualizardespachotrituradora','despachosporfechatrituradora','insumosxpagar','guardarinsumoxpagar','eliminarinsumoxpagar','cancelarinsumoxpagar','editarinsumoxpagar','actualizarinsumoxpagar','insumosxpagarporfecha'],

	// Reporte Horas Máquinaria 
	'horasmq' => ['horas','guardarhoras','eliminarhoras','editarhoras','actualizarhoras','horasporfecha'],


	// Reporte Requisiciones 
	'requisiciones' => ['todosporusuario','todosalmacen','todosmiusuario','todos','guardar','eliminar','editar','actualizar','porfecha','todosporusuarioestado','reqalmacenestado','todosporusuarioadmin','todosporusuarioestadoadmin','cotizaciones','vercotizacion','eliminaritemcot','reqparaentrega'],

	// Reporte Requisiciones Items
	'requisicionesitems' => ['todosporreq','todos','guardar','eliminar','editar','actualizar','porfecha','cambiarestado','guardarestado','actualizarestado','trazabilidad','agregarvalores','guardarcotizacion','cambiarestadoadmin','actualizarestadoadmin','trazabilidadadmin','guardarocompra','actualizaritem','actualizarcantidadcot','gestionarvalores','guardarcotizacionmultiple','eliminarcotizacion','finalizarrq','aprobarrq'],

	// Reporte Inventarios
	'inventario' => ['cargarentradaoc','guardarentradadetalletem','guardarsalidadetalletem','deletedellentradatemp','deletedellsalidatemp','actualizarentradaoc','actualizarsalidarq','totalentradas','totalsalidas','entradasporfecha','salidasporfecha','entradasdetalle','salidasdetalle','entradasdetalletotal','salidasdetalletotal','cargarsalidasrq','verinventario','kardexporinsumo','despachosporfecha'],

	// Estados Requisiciones
	'estadosreq' => ['todos','nuevo','guardar','eliminar','editar','actualizar'],
	
	// Movimientos Item 
	'movimientositem' => ['todospor','guardar','eliminar'],

	// Servicios
	'servicios' => ['todos','nuevo','guardar','eliminar','editar','actualizar'],

	// Cargos
	'cargos' => ['todos','nuevo','guardar','eliminar','editar','actualizar'],

	// Equipos Temporales
	'equipostemporales' => ['todos','nuevo','guardar','eliminar','editar','actualizar'],

	// Categorias de Insumos
	'categoriainsumos' => ['todos','nuevo','guardar','eliminar','editar','actualizar'],

	// Unidades de Medidas
	'unidadesmed' => ['todos','nuevo','guardar','eliminar','editar','actualizar'],

	// Cotizaciones
	'cotizaciones' => ['todos','editar','actualizar','porfecha','todosporinsumo'],

	// Reporte Concreto
    'concreto' => ['todos','formularioconcreto','guardar','eliminar','editar','actualizar','despachosporfecha','detallepuntos'],

	// Reporte compras
	'compras' => ['todos','formulario','guardar','eliminar','editar','actualizar','porfecha','verdetalle','cambiarestado','actualizarpago','cambiarestadocreditos','pagotemporal','deletepagotemporal','actualizarpagocredito','recibiroc'],

	// Reporte Producción
	'reportesproduccion' => ['reportesproduccion','guardarreporteproduccion','eliminarreporteproduccion','editarreporteproduccion','actualizarreporteproduccion','reportesporfechaproduccion'],
	// Nuevo Reporte
	'informecuentasporcobrar' => ['cuentasxcobrarconsolidado','cuentasxcobrarporfechaconsolidado','cuentasxcobrardetalle','cuentasxcobrarporfechadetalle'],

	'funcionarios' => ['editar','guardar','actualizar','todos','todosinactivos','nuevo','eliminar','reportarnovedad','eliminarnovedad','reportarsoporte','eliminarsoporte'],
	'novedades' => ['editar','guardar','actualizar','todos','nuevo','eliminar','novedadesporfecha'],
	'equipos' => ['editar','guardar','actualizar','todos','todosmantenimiento','nuevo','eliminar','editarvol','guardarvol','actualizarvol','volquetas','nuevovol','eliminarvol','reporte','guardareporte','reportediario','eliminareporte','editareporte','actualizareporte','formreportedia','reportedia','reporteporfecha','gastosmantenimientoporfecha','cambiarvisualizacion','estado','guardarestado','actualizarestado','todosestados','eliminarestado','timelineestados'],//Harold Gutierrez 14/08/2020
	'cajas' => ['editar','guardar','actualizar','todos','nuevo','vista','grafica','eliminar', 'detalles','micaja'],
	'gastos' => ['editar','guardar','actualizarex','todos','nuevo','eliminar','egresos','totalegresos','totalegresoslegal','eliminarcajasistema','porfecha','porfechalegal','eliminargastopor','eliminarcajasistemapor','cambiarestado','actualizarestado'],
	'gestiondocumental' => ['editar','guardar','actualizar','todos','nuevo','eliminar','listacuentas','configuracion','cargartodos','desactivarDocumento','varios','guardarvarios','eliminarvarios','editarvarios','actualizarvarios','activar','carpetaextra'],
	'gestiondocumentaleq' => ['editar','guardar','actualizar','todos','nuevo','eliminar','listaequipos','configuracion','cargartodos','desactivarDocumento','varios','guardarvarios','eliminarvarios','editarvarios','actualizarvarios','activar'],
	'gestiondocumentalemp' => ['editar','guardar','actualizar','todos','nuevo','eliminar','listaequipos','configuracion','cargartodos','desactivarDocumento','varios','guardarvarios','eliminarvarios','editarvarios','actualizarvarios','activar','carpetaextra'],
	'gestiondocumentalprov' => ['editar','guardar','actualizar','todos','nuevo','eliminar','listaequipos','configuracion','cargartodos','desactivarDocumento','varios','guardarvarios','eliminarvarios','editarvarios','actualizarvarios','activar'],
	'misdocumentos' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],
	'ingresoscuenta' => ['editar','guardar','actualizarex','todos','nuevo','eliminar','ingresos','ingresosporfecha'],
	'egresoscuenta' => ['editar','guardar','actualizarcm','actualizarcu','actualizarot','todos','nuevo','eliminar','egresos','editarcm','editarcu','editarot','eliminarcm','eliminarmvs','eliminarot','egresosporfecha'],
	'ingresos' => ['editar','guardar','actualizarex','todos','nuevo','eliminar','ingresos'],
	'rubros' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],
	'estaciones' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],
	'clientes' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],
	'folders' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],
	'productos' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],
	'insumos' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],
	'destinos' => ['editar','guardar','actualizar','todos','nuevo','eliminar','destinoextra'],
	'proyectos' => ['editar','guardar','actualizar','todos','nuevo','eliminar','proyectoextra'],
	'proveedores' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],
	'modulos' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],
	'documentos' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],
	'consolidados' => ['editar','guardar','actualizar','todos','nuevo','eliminar','documentoscuentas','documentosequipos','totalreporteseq'],
	'subrubros' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],
	'plantilla' => ['index'],
	//Estadisticas
	'estadisticavolqueta' => ['todos','buscarReporteVolquetas'],
	'visorgraficas' => ['todos'],
	'campamento' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],
	'insumoscampamento' => ['todos','nuevo','guardar'],
	'ventasdespachos' => ['todos','nuevo','guardar','eliminar'],
	'productosinsumos' => ['todos','nuevo','guardar','eliminar'],
	'tipomantenimiento' => ['todos','nuevo','editar','guardar','actualizar','eliminar'],
);

if (array_key_exists($controller, $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	} else {
		call('index', 'error');
	}
} else {
	call('index', 'error');
}

//AQUI LLAMAMOS A LOS MODULOS A CARGAR
function call($controller, $action) {
	require_once 'controladores/' . $controller . 'Controller.php';

	switch ($controller) {
		
	case 'index':
		$controller = new UsuarioController();
		break;

	case 'informes':
		require_once 'modelos/informes.php';
		$controller = new InformesController();
		break;

// MENÚ CONFIGURACIÓN HOME ADMIN

	case 'usuarios':
		require_once 'modelos/usuarios.php';
		$controller = new UsuariosController();
		break;
	case 'reportes':
		require_once 'modelos/reportes.php';
		$controller = new ReportesController();
		break;

	case 'horasmq':
		require_once 'modelos/horasmq.php';
		$controller = new HorasmqController();
		break;
	case 'concreto':
		require_once 'modelos/concreto.php';
		$controller = new ConcretoController();
		break;

	case 'cargos':
		require_once 'modelos/cargos.php';
		$controller = new CargosController();
		break;

	case 'compras':
		require_once 'modelos/compras.php';
		$controller = new comprasController();
		break;

	case 'cotizaciones':
		require_once 'modelos/cotizaciones.php';
		$controller = new cotizacionesController();
		break;

	case 'requisiciones':
		require_once 'modelos/requisiciones.php';
		$controller = new RequisicionesController();
		break;

	Case 'movimientositem':
		require_once 'modelos/movimientositem.php';
		$controller = new MovimientositemController();
		break;

	case 'servicios':
		require_once 'modelos/servicios.php';
		$controller = new ServiciosController();
		break;

	case 'equipostemporales':
		require_once 'modelos/equipostemporales.php';
		$controller = new EquipostemporalesController();
		break;

	case 'requisicionesitems':
		require_once 'modelos/requisicionesitems.php';
		$controller = new RequisicionesitemsController();
		break;

	case 'inventario':
		require_once 'modelos/inventario.php';
		$controller = new InventarioController();
		break;

	case 'estadosreq':
		require_once 'modelos/estadosreq.php';
		$controller = new EstadosReqController();
		break;

	case 'categoriainsumos':
		require_once 'modelos/categoriainsumos.php';
		$controller = new CategoriainsumosController();
		break;

	case 'unidadesmed':
		require_once 'modelos/unidadesmed.php';
		$controller = new UnidadesmedController();
		break;


	case 'informecuentasporcobrar':
		require_once 'modelos/informecuentasporcobrar.php';
		$controller = new InformecuentasporcobrarController();
		break;
	case 'reportesproduccion':
		require_once 'modelos/reportesproduccion.php';
		$controller = new ReportesproduccionController();
		break;
	case 'funcionarios':
		require_once 'modelos/funcionarios.php';
		$controller = new FuncionariosController();
		break;
	case 'novedades':
		require_once 'modelos/novedades.php';
		$controller = new NovedadesController();
		break;
	case 'cuentas':
		require_once 'modelos/cuentas.php';
		$controller = new CuentasController();
		break;
	case 'cajas':
		require_once 'modelos/cajas.php';
		$controller = new CajasController();
		break;
	case 'equipos':
		require_once 'modelos/equipos.php';
		$controller = new EquiposController();
		break;
	case 'gastos':
		require_once 'modelos/gastos.php';
		$controller = new gastosController();
		break;
	case 'ingresoscuenta':
		require_once 'modelos/ingresoscuenta.php';
		$controller = new ingresoscuentaController();
		break;
	case 'egresoscuenta':
		require_once 'modelos/egresoscuenta.php';
		$controller = new egresoscuentaController();
		break;
	case 'ingresos':
		require_once 'modelos/ingresos.php';
		$controller = new ingresosController();
		break;
	case 'rubros':
		require_once 'modelos/rubros.php';
		$controller = new rubrosController();
		break;
	case 'estaciones':
		require_once 'modelos/estaciones.php';
		$controller = new estacionesController();
		break;
	case 'clientes':
		require_once 'modelos/clientes.php';
		$controller = new ClientesController();
		break;
	case 'folders':
		require_once 'modelos/folders.php';
		$controller = new FoldersController();
		break;
	case 'productos':
		require_once 'modelos/productos.php';
		$controller = new productosController();
		break;
	case 'insumos':
		require_once 'modelos/insumos.php';
		$controller = new insumosController();
		break;
	case 'destinos':
		require_once 'modelos/destinos.php';
		$controller = new destinosController();
		break;
	case 'proyectos':
		require_once 'modelos/proyectos.php';
		$controller = new proyectosController();
		break;
	case 'proveedores':
		require_once 'modelos/proveedores.php';
		$controller = new proveedoresController();
		break;
	case 'subrubros':
		require_once 'modelos/subrubros.php';
		$controller = new subrubrosController();
		break;
	case 'modulos':
		require_once 'modelos/modulos.php';
		$controller = new modulosController();
		break;
	case 'documentos':
		require_once 'modelos/documentos.php';
		$controller = new documentosController();
		break;
	case 'consolidados':
		require_once 'modelos/consolidados.php';
		$controller = new consolidadosController();
		break;
	case 'gestiondocumental':
		require_once 'modelos/gestiondocumental.php';
		$controller = new gestiondocumentalController();
		break;
	case 'gestiondocumentalprov':
		require_once 'modelos/gestiondocumentalprov.php';
		$controller = new gestiondocumentalprovController();
		break;
	case 'gestiondocumentaleq':
		require_once 'modelos/gestiondocumentaleq.php';
		$controller = new gestiondocumentaleqController();
		break;
	case 'gestiondocumentalemp':
		require_once 'modelos/gestiondocumentalemp.php';
		$controller = new gestiondocumentalempController();
		break;
	case 'misdocumentos':
		require_once 'modelos/misdocumentos.php';
		$controller = new misdocumentosController();
		break;


	case 'configuracion':
		require_once 'modelos/configuracion.php';
		$controller = new ConfiguracionController();
		break;


	case 'plantilla':
		$controller = new UsuarioController();
		break;

	case 'usuarios':
		require_once 'modelos/usuarios.php';
		$controller = new UsuarioController();
		break;


	case 'estadisticavolqueta':
		require_once 'modelos/estadisticavolqueta.php';
		$controller = new estadisticavolquetaController();
		break;

	case 'visorgraficas':
		require_once 'modelos/visorgraficas.php';
		$controller = new visorgraficasController();
		break;

	case 'campamento':
		require_once 'modelos/campamento.php';
		$controller = new CampamentoController();
		break;

	case 'insumoscampamento':
		require_once 'modelos/insumoscampamento.php';
		$controller = new InsumoscampamentoController();
		break;

	case 'ventasdespachos':
		require_once 'modelos/ventasdespachos.php';
		$controller = new VentasdespachosController();
		break;

	case 'productosinsumos':
		require_once 'modelos/productosinsumos.php';
		$controller = new ProductosinsumosController();
		break;

	case 'tipomantenimiento':
		require_once 'modelos/tipomantenimiento.php';
		$controller = new TipoMantenimientoController();
		break;


	default:
		# code...
		break;
	}
	$controller->{$action}();
}
?>
