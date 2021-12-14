<?php 
	$imagen = $_POST['imagen'];
	$fecha_reporte = $_POST['fecha_reporte'];
	$valor_total = $_POST['valor_total'];
	$valor_retenciones = $_POST['valor_retenciones'];
	$estado_orden = $_POST['estado_orden'];
	$proveedor_id_proveedor=$_POST['proveedor_id_proveedor'];
	$medio_pago=$_POST['medio_pago'];
	$observaciones=$_POST['observaciones'];
	$marca_temporal=$_POST['marca_temporal'];
	$usuario_creador=$_POST['usuario_creador'];
	$estado_item=8;
	$estado_cotizacion=1;
	$estado_nuevo_cot=2;
	$variables=$_POST['items'];



			
			foreach($_POST['items'] as $despachounico) {

				echo($despachounico);

}


 ?>