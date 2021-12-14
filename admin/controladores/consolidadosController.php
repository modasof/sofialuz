<?php
class ConsolidadosController {
	function __construct() {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LLAMADO DESDE ROUTING.PHP*/
/*************************************************************/

	function todos() {
		$campos=Consolidados::obtenerPagina();;
		require_once 'vistas/consolidados/todos.php';
	}

/*************************************************************/
/* TOTAL DOCUMENTOS CUENTAS
/*************************************************************/

	function documentoscuentas() {
		$campos=Consolidados::Totaldocumentoscuentas();;
		require_once 'vistas/consolidados/documentoscuentas.php';
	}
/*************************************************************/
/* TOTAL DOCUMENTOS EQUIPOS
/*************************************************************/
	function documentosequipos() {
		$campos=Consolidados::Totaldocumentosequipos();;
		require_once 'vistas/consolidados/documentosequipos.php';
	}

/*************************************************************/
/* TOTAL REPORTES DIARIOS EQUIPOS
/*************************************************************/
	function totalreporteseq() {
		$campos = Consolidados::Totalreporteseq();
		require_once 'vistas/consolidados/totalreporteseq.php';
	}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
	function show(){
		$campos=Consolidados::obtenerPagina();
		require_once 'vistas/consolidados/todos.php';
	}
}
