<?php
//Include database configuration file
include '../../include/class.conexion.php';

$field_item_id=$_POST['field_item_id'];
$field_cantidad=$_POST['field_cantidad'];
$field_valor_unitario=$_POST['field_valor_unitario'];




if(isset($_POST["field_valor_unitario"]) && !empty($_POST["field_valor_unitario"])){

	$db=Db::getConnect();

	// Consultar orden de compra número

	$select=$db->query("SELECT * FROM cotizaciones_item WHERE id = '".$_POST['field_item_id']."'");
	$campo=$select->fetchAll();
	$i = 0;
	//echo("<option value'0'>Seleccionar Subrubro</option>");
	foreach($campo as $campos){
		$i = $i+1;
		$vr_unitario = $campos['vr_unitario'];
	}

	$field_subtotal=$vr_unitario*$field_cantidad;

	
	$select=$db->query("UPDATE cotizaciones_item SET cantidadcot='".$field_cantidad."', valor_cot='".$field_subtotal."' WHERE id='".$field_item_id."'");

	// Consultar orden de compra número

	$select=$db->query("SELECT * FROM cotizaciones_item WHERE id = '".$_POST['field_item_id']."'");
	$campo=$select->fetchAll();
	$i = 0;
	//echo("<option value'0'>Seleccionar Subrubro</option>");
	foreach($campo as $campos){
		$i = $i+1;
		$ordencompra_num = $campos['ordencompra_num'];
	}


	$select=$db->query("SELECT SUM(valor_cot) as valornuevo FROM cotizaciones_item WHERE ordencompra_num = '".$ordencompra_num."'");
	$campo=$select->fetchAll();
	$i = 0;
	//echo("<option value'0'>Seleccionar Subrubro</option>");
	foreach($campo as $campos){
		$i = $i+1;
		$valornuevo = $campos['valornuevo'];
	}

	$select=$db->query("UPDATE ordenescompra SET valor_total='".$valornuevo."' WHERE id='".$ordencompra_num."'");


	$select=$db->query("SELECT * FROM cotizaciones_item WHERE id = '".$_POST['field_item_id']."'");
	$campo=$select->fetchAll();
	$i = 0;
	//echo("<option value'0'>Seleccionar Subrubro</option>");
	foreach($campo as $campos){
		$i = $i+1;
		$valor_cot = $campos['valor_cot'];
		echo ("<input disabled type='text' value='$".number_format($valor_cot)."'>");
	}

    $rowCount = $i;
    //Display states list
    if($rowCount > 0){
    }else{
        echo 'No llego nada';
    }
}

?>
