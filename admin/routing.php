<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$controllers = array(
//AQUI SE ESTABLACE LAS FUNCIONES QUE VA A TENER CADA MODULO
//OJO, CADA OPCION DEBE ESTAR EN EL ARCHIVO NombreModuloController.php dentro del directorio controladores


	

	// Funcionalidad Cajas
	'cajas' => ['editar','guardar','actualizar','todos','nuevo','vista','grafica','eliminar', 'detalles','micaja'],

	// Funcionalidad Campamentos
	'campamento' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],

	// Funcionalidad Cargos
	'cargos' => ['todos','nuevo','guardar','eliminar','editar','actualizar'],

	// Funcionalidad de Categorio de los Insumos
	'categoriainsumos' => ['todos','nuevo','guardar','eliminar','editar','actualizar'],


	// Funcionalidad Concreto
    'concreto' => ['todos','formularioconcreto','guardar','eliminar','editar','actualizar','despachosporfecha','detallepuntos'],

    // Funcionalidad Consilidados
    'consolidados' => ['editar','guardar','actualizar','todos','nuevo','eliminar','documentoscuentas','documentosequipos','totalreporteseq'],

    // Funcionalidad compras
	'compras' => ['todos','formulario','guardar','eliminar','editar','actualizar','porfecha','verdetalle','cambiarestado','actualizarpago','cambiarestadocreditos','pagotemporal','deletepagotemporal','actualizarpagocredito','recibiroc','todospormes','cxpusuario','actualizardetallecot','editardetallecot','todosrecibirinsumos','porfechainsumos','cargarinventario','retornar','todosproveedorpagos','cargarfactura','ivamultiple','descartar','descartarinversa','guardarfacturacompras','detallefacturacompra','facturascompraspormes','cargarfacturacp','todosporproveedorespera','pagofacturacompra','editarfacturacompra','actualizarfacturacompras','editarfacturacompracp','guardarpagoanticipo','guardarpagofactura'],

	// Funcionalidad Cotizaciones
	'cotizaciones' => ['todos','editar','actualizar','porfecha','todosporinsumo'],

	// Funcionalidad Clientes
	'clientes' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],

	// Funcionalidad Clientes Precios
	'clientesprecios' => ['nuevoValoresRuta','nuevoValoresHora','nuevoValoresProducto','editarValoresRuta','editarValoresHora','editarValoresProducto','guardar','guardarvalorhora','guardarvalorproducto','eliminar','eliminarhora','eliminarproducto','todos','todoshora','todosproducto'],


	// Funcionalidad Cuentas
	'cuentas' => ['editar','guardar','actualizar','todos','nuevo','eliminar','reporteporfecha','crucecuentas','detallecruce'],

	// Módulo de Dashboard 
	'dashboards' =>['dashboardcompras'],

	// Funcionalidad Destinos
	'destinos' => ['editar','guardar','actualizar','todos','nuevo','eliminar','destinoextra'],

	// Funcionalidad Documentos
	'documentos' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],

	// Funcionalidad Egresos
	'egresoscuenta' => ['editar','guardar','actualizarcm','actualizarcu','actualizarot','todos','nuevo','eliminar','egresos','editarcm','editarcu','editarot','eliminarcm','eliminarmvs','eliminarot','egresosporfecha'],

	// Funcionalidad Equipos
	'equipos' => ['editar','guardar','actualizar','todos','todosmantenimiento','nuevo','eliminar','editarvol','guardarvol','actualizarvol','volquetas','nuevovol','eliminarvol','reporte','guardareporte','reportediario','eliminareporte','editareporte','actualizareporte','formreportedia','reportedia','reporteporfecha','gastosmantenimientoporfecha','cambiarvisualizacion','estado','guardarestado','actualizarestado','todosestados','eliminarestado','timelineestados'],

	// Funcionalidad Equipos Temporales
	'equipostemporales' => ['todos','nuevo','guardar','eliminar','editar','actualizar'],

	// Funcionalidad Estaciones
	'estaciones' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],

	// Funcionalidad Estadísticas Volqueta
	'estadisticavolqueta' => ['todos','buscarReporteVolquetas'],

	// Funcionalidad Requisiciones
	'estadosreq' => ['todos','nuevo','guardar','eliminar','editar','actualizar'],

	// Funcionalidad Folders
	'folders' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],

	// Funcionalidad Empleados
	'funcionarios' => ['editar','guardar','actualizar','todos','todosinactivos','nuevo','eliminar','reportarnovedad','eliminarnovedad','reportarsoporte','eliminarsoporte'],

	// Funcionalidad Gastos Caja Menor
	'gastos' => ['editar','guardar','actualizarex','todos','nuevo','eliminar','egresos','totalegresos','totalegresoslegal','eliminarcajasistema','porfecha','porfechalegal','eliminargastopor','eliminarcajasistemapor','cambiarestado','actualizarestado'],

	// Funcionalidad Gestión Documental
	'gestiondocumental' => ['editar','guardar','actualizar','todos','nuevo','eliminar','listacuentas','configuracion','cargartodos','desactivarDocumento','varios','guardarvarios','eliminarvarios','editarvarios','actualizarvarios','activar','carpetaextra'],

	// Funcionalidad Gestión Documental Equipos
	'gestiondocumentaleq' => ['editar','guardar','actualizar','todos','nuevo','eliminar','listaequipos','configuracion','cargartodos','desactivarDocumento','varios','guardarvarios','eliminarvarios','editarvarios','actualizarvarios','activar'],

	// Funcionalidad Gestión Documental Empleados
	'gestiondocumentalemp' => ['editar','guardar','actualizar','todos','nuevo','eliminar','listaequipos','configuracion','cargartodos','desactivarDocumento','varios','guardarvarios','eliminarvarios','editarvarios','actualizarvarios','activar','carpetaextra'],

	// Funcionalidad Gestión Documental Proveedores
	'gestiondocumentalprov' => ['editar','guardar','actualizar','todos','nuevo','eliminar','listaequipos','configuracion','cargartodos','desactivarDocumento','varios','guardarvarios','eliminarvarios','editarvarios','actualizarvarios','activar'],

	// Funcionalidad Horas Máquinaria 
	'horasmq' => ['horas','guardarhoras','eliminarhoras','editarhoras','actualizarhoras','horasporfecha'],


	// Redireccionamiento Inicial  
	'index' => ['index','informe1','informegerencia','informeclientes','informedetalleclientes','informeventaclientes','informedetalleclientesventas','micajamenor','micajamenorcon','dashboardalmacen','vistarqusuariosdashboard','aprobarRq'],

	// Adicional de Informes 
	'informes' =>['cuentas','movimientoscuentas','subrubrosegresos','cajas','movimientoscaja','subrubrosegresoscaja','ventas','detallelineanegocio','clientes','compras','totalrq','rqporfecha','dashboardcompras'],

	// Funcionalidad cuentas por cobrar
	'informecuentasporcobrar' => ['cuentasxcobrarconsolidado','cuentasxcobrarporfechaconsolidado','cuentasxcobrardetalle','cuentasxcobrarporfechadetalle'],


	// Funcionalidad Ingresos caja menor
	'ingresos' => ['editar','guardar','actualizarex','todos','nuevo','eliminar','ingresos','cambiarestado','actualizarestadoingreso'],

	// Funcionalidad Ingresos a cuentas
	'ingresoscuenta' => ['editar','guardar','actualizarex','todos','nuevo','eliminar','ingresos','ingresosporfecha'],

	// Funcionalidad Insumos
	'insumos' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],

	// Funcionalidad Insumos de un campamento
	'insumoscampamento' => ['todos','nuevo','guardar'],

	// Funcionalidad Inventarios
	'inventario' => ['cargarentradaoc','guardarentradadetalletem','guardarsalidadetalletem','deletedellentradatemp','deletedellsalidatemp','actualizarentradaoc','actualizarsalidarq','totalentradas','totalsalidas','entradasporfecha','salidasporfecha','entradasdetalle','salidasdetalle','entradasdetalletotal','salidasdetalletotal','cargarsalidasrq','verinventario','kardexporinsumo','despachosporfecha','entregaspendientesusuario','recibirdespacho','entregasrecibidasusuario'],

	// Funcionalidad Módulos
	'modulos' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],

	// Funcionalidad para archivos personales
	'misdocumentos' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],

	// Movimientos Item 
	'movimientositem' => ['todospor','guardar','eliminar'],

	// Funcionalidad Novedades
	'novedades' => ['editar','guardar','actualizar','todos','nuevo','eliminar','novedadesporfecha'],

	// Funcionalidad Plantilla
	'plantilla' => ['index'],

	// Funcionalidad Novedades
	'productos' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],


	// Funcionalidad Productos Insumos
	'productosinsumos' => ['todos','nuevo','guardar','eliminar'],

	// Funcionalidad Proyectos
	'proyectos' => ['editar','guardar','actualizar','todos','nuevo','eliminar','proyectoextra'],

	// Funcionalidad Proveedores
	'proveedores' => ['editar','guardar','actualizar','todos','nuevo','eliminar','cxpproveedor','estadocuenta','listadoproveedorespago','proyecciontemporal','deleteproyecciontemporal','actualizarrelacionpagos','showrelacionpagos','eliminarrelacion'],

	// Funcionalidad de reportes diarios
	'reportes' => ['ventas','clienteextra','productoextra','guardarventa','eliminarventa','cambiarestadoventa','editarventa','actualizarventa','ventasporfecha','compras','insumoextra','guardarcompra','eliminarcompra','editarcompra','actualizarcompra','comprasporfecha','despachos','guardardespacho','eliminardespacho','editardespacho','actualizardespacho','despachosporfecha','despachosclientes','despachosclientesf','despachosclientesunico','despachosproveedorunico','despachospropietario','guardardespachoclientes','eliminardespachoclientes','editardespachoclientes','actualizardespachoclientes','despachosporfechaclientes','despachosporfechaclientesunico','despachosporfechaproveedorunico','despachosporfechapropietario','facturas','guardarfactura','eliminarfactura','editarfactura','actualizarfactura','facturasporfecha','guardarabono','eliminarabono','cuentasxpagar','cuentasxpagarconsolidado','cuentasxpagardetalle','guardarcuentaxpagar','eliminarcuentaxpagar','cancelarcuentaxpagar','editarcuentaxpagar','actualizarcuentaxpagar','cuentasxpagarporfecha','cuentasxpagarporfechaconsolidado','cuentasxpagarporfechadetalle','prestamos','guardarprestamo','eliminarprestamo','cambiarestadoprestamo','editarprestamo','actualizarprestamo','prestamosporfecha','combustibles','combustiblescisterna','combustiblesporfechacisterna','mescombustibleseq','mesfletes','meshorasmq','infovolqueta','guardarcombustible','eliminarcombustible','editarcombustible','actualizarcombustible','combustiblesporfecha','proveedorextra','horas','guardarhoras','eliminarhoras','editarhoras','actualizarhoras','horasporfecha','despachostrituradora','guardardespachotrituradora','eliminardespachotrituradora','editardespachotrituradora','actualizardespachotrituradora','despachosporfechatrituradora','insumosxpagar','guardarinsumoxpagar','eliminarinsumoxpagar','cancelarinsumoxpagar','editarinsumoxpagar','actualizarinsumoxpagar','insumosxpagarporfecha'],

	// Funcionalidad Producción
	'reportesproduccion' => ['reportesproduccion','guardarreporteproduccion','eliminarreporteproduccion','editarreporteproduccion','actualizarreporteproduccion','reportesporfechaproduccion'],

	// Funcionalidad Requisiciones 
	'requisiciones' => ['todosporusuario','todosalmacen','todosmiusuario','todos','guardar','eliminar','editar','actualizar','porfecha','todosporusuarioestado','reqalmacenestado','todosporusuarioadmin','todosporusuarioestadoadmin','cotizaciones','vercotizacion','eliminaritemcot','reqparaentrega'],

	// Funcionalidad Requisiciones Items
	'requisicionesitems' => ['todosporreq','todos','guardar','eliminar','editar','actualizar','porfecha','cambiarestado','guardarestado','actualizarestado','trazabilidad','agregarvalores','guardarcotizacion','cambiarestadoadmin','actualizarestadoadmin','trazabilidadadmin','guardarocompra','actualizaritem','actualizarcantidadcot','gestionarvalores','guardarcotizacionmultiple','eliminarcotizacion','finalizarrq','aprobarrq','guardarsoportecotizacionmultiple'],

	// Funcionalidad Retefuentes
	'retefuente' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],

	// Funcionalidad Rubros
	'rubros' => ['editar','guardar','actualizar','todos','nuevo','eliminar'],

	// Funcionalidad SubRubros
	'subrubros' => ['editar','guardar','actualizar','todos','nuevo','eliminar','desactivarcxp','activarcxp'],

	// Funcionalidad Servicios
	'servicios' => ['todos','nuevo','guardar','eliminar','editar','actualizar'],

	// Funcionalidad Tipos de Mantenimiento
	'tipomantenimiento' => ['todos','nuevo','editar','guardar','actualizar','eliminar'],

	// Funcionalidad Unidades de Medidas
	'unidadesmed' => ['todos','nuevo','guardar','eliminar','editar','actualizar'],

	// Funcionalidad Gestión Usuarios
	'usuarios' => ['editar','guardar','actualizar','todos','nuevo','eliminar','editarpermisos','activarmenuPor','desactivarmenuPor','activartodo','desactivartodo','activarrubros','notificacionleida','notificaciones','notificacionleidatodas'],

	// Funcionalidad Activar Rubros por Usuario
	'usuariosrubros' => ['todospor','activarrubroPor','desactivarrubroPor','activartodo','activarporRol'],

    // Funcionalidad Gráficas Volquetas
	'visorgraficas' => ['todos'],

	 // Funcionalidad Reporte Ventas
	'ventasdespachos' => ['todos','nuevo','guardar','eliminar'],

	
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



	case 'cajas':
		require_once 'modelos/cajas.php';
		$controller = new CajasController();
		break;

	case 'campamento':
		require_once 'modelos/campamento.php';
		$controller = new CampamentoController();
		break;

	case 'cargos':
		require_once 'modelos/cargos.php';
		$controller = new CargosController();
		break;

	case 'categoriainsumos':
		require_once 'modelos/categoriainsumos.php';
		$controller = new CategoriainsumosController();
		break;

	case 'clientes':
		require_once 'modelos/clientes.php';
		$controller = new ClientesController();
		break;

	case 'clientesprecios':
		require_once 'modelos/clientesprecios.php';
		$controller = new clientespreciosController();
		break;

	case 'concreto':
		require_once 'modelos/concreto.php';
		$controller = new ConcretoController();
		break;

	case 'configuracion':
		require_once 'modelos/configuracion.php';
		$controller = new ConfiguracionController();
		break;

	case 'consolidados':
		require_once 'modelos/consolidados.php';
		$controller = new consolidadosController();
		break;

	case 'compras':
		require_once 'modelos/compras.php';
		$controller = new comprasController();
		break;

	case 'cotizaciones':
		require_once 'modelos/cotizaciones.php';
		$controller = new cotizacionesController();
		break;

	case 'cuentas':
		require_once 'modelos/cuentas.php';
		$controller = new CuentasController();
		break;

	case 'dashboards':
		require_once 'modelos/dashboards.php';
		$controller = new dashboardsController();
		break;

	case 'destinos':
		require_once 'modelos/destinos.php';
		$controller = new destinosController();
		break;

	case 'documentos':
		require_once 'modelos/documentos.php';
		$controller = new documentosController();
		break;

	case 'estaciones':
		require_once 'modelos/estaciones.php';
		$controller = new estacionesController();
		break;

	case 'estadosreq':
		require_once 'modelos/estadosreq.php';
		$controller = new EstadosReqController();
		break;

	case 'equipos':
		require_once 'modelos/equipos.php';
		$controller = new EquiposController();
		break;

	case 'equipostemporales':
		require_once 'modelos/equipostemporales.php';
		$controller = new EquipostemporalesController();
		break;

	case 'egresoscuenta':
		require_once 'modelos/egresoscuenta.php';
		$controller = new egresoscuentaController();
		break;

	case 'estadisticavolqueta':
		require_once 'modelos/estadisticavolqueta.php';
		$controller = new estadisticavolquetaController();
		break;

	case 'folders':
		require_once 'modelos/folders.php';
		$controller = new FoldersController();
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

	case 'gastos':
		require_once 'modelos/gastos.php';
		$controller = new gastosController();
		break;

	case 'horasmq':
		require_once 'modelos/horasmq.php';
		$controller = new HorasmqController();
		break;


	case 'funcionarios':
		require_once 'modelos/funcionarios.php';
		$controller = new FuncionariosController();
		break;
	
		
	case 'index':
		$controller = new UsuarioController();
		break;

	case 'informes':
		require_once 'modelos/informes.php';
		$controller = new InformesController();
		break;

	case 'informecuentasporcobrar':
		require_once 'modelos/informecuentasporcobrar.php';
		$controller = new InformecuentasporcobrarController();
		break;

	case 'ingresos':
		require_once 'modelos/ingresos.php';
		$controller = new ingresosController();
		break;

	case 'ingresoscuenta':
		require_once 'modelos/ingresoscuenta.php';
		$controller = new ingresoscuentaController();
		break;

	case 'insumos':
		require_once 'modelos/insumos.php';
		$controller = new insumosController();
		break;

	case 'insumoscampamento':
		require_once 'modelos/insumoscampamento.php';
		$controller = new InsumoscampamentoController();
		break;

	case 'inventario':
		require_once 'modelos/inventario.php';
		$controller = new InventarioController();
		break;

	case 'misdocumentos':
		require_once 'modelos/misdocumentos.php';
		$controller = new misdocumentosController();
		break;

	case 'modulos':
		require_once 'modelos/modulos.php';
		$controller = new modulosController();
		break;

	Case 'movimientositem':
		require_once 'modelos/movimientositem.php';
		$controller = new MovimientositemController();
		break;

	case 'novedades':
		require_once 'modelos/novedades.php';
		$controller = new NovedadesController();
		break;

	case 'plantilla':
		$controller = new UsuarioController();
		break;

	case 'productos':
		require_once 'modelos/productos.php';
		$controller = new productosController();
		break;

	case 'productosinsumos':
		require_once 'modelos/productosinsumos.php';
		$controller = new ProductosinsumosController();
		break;

	case 'proyectos':
		require_once 'modelos/proyectos.php';
		$controller = new proyectosController();
		break;

	case 'proveedores':
		require_once 'modelos/proveedores.php';
		$controller = new proveedoresController();
		break;

	case 'reportes':
		require_once 'modelos/reportes.php';
		$controller = new ReportesController();
		break;

	case 'reportesproduccion':
		require_once 'modelos/reportesproduccion.php';
		$controller = new ReportesproduccionController();
		break;

	case 'requisiciones':
		require_once 'modelos/requisiciones.php';
		$controller = new RequisicionesController();
		break;

	case 'requisicionesitems':
		require_once 'modelos/requisicionesitems.php';
		$controller = new RequisicionesitemsController();
		break;

	case 'retefuente':
		require_once 'modelos/retefuente.php';
		$controller = new RetefuenteController();
		break;

	case 'rubros':
		require_once 'modelos/rubros.php';
		$controller = new rubrosController();
		break;

	case 'servicios':
		require_once 'modelos/servicios.php';
		$controller = new ServiciosController();
		break;

	case 'subrubros':
		require_once 'modelos/subrubros.php';
		$controller = new subrubrosController();
		break;

	case 'tipomantenimiento':
		require_once 'modelos/tipomantenimiento.php';
		$controller = new TipoMantenimientoController();
		break;

	case 'unidadesmed':
		require_once 'modelos/unidadesmed.php';
		$controller = new UnidadesmedController();
		break;


	case 'usuarios':
		require_once 'modelos/usuarios.php';
		$controller = new UsuariosController();
		break;

	case 'usuariosrubros':
		require_once 'modelos/usuariosrubros.php';
		$controller = new UsuariosrubrosController();
		break;

	case 'visorgraficas':
		require_once 'modelos/visorgraficas.php';
		$controller = new visorgraficasController();
		break;

	case 'ventasdespachos':
		require_once 'modelos/ventasdespachos.php';
		$controller = new VentasdespachosController();
		break;


	default:
		# code...
		break;
	}
	$controller->{$action}();
}
?>
