<?php
//Include database configuration file
include '../../include/class.conexion.php';

$field_item_id=$_POST['field_item_id'];

if(isset($_POST["field_valor_unitario"]) && !empty($_POST["field_valor_unitario"])){

	// Calcular el valor subtotal y actualizar en tabla 

	$V11=str_replace(".","",$field_valor_unitario);
		$V21=str_replace(" ", "", $V11);
		$valor_final1=str_replace("$", "", $V21);
		$valornumero1=(int) $valor_final1;

	$field_subtotal=$valornumero1*$field_cantidad;

	$db=Db::getConnect();
	$select=$db->query("UPDATE cotizaciones_item SET vr_unitario='".$valornumero1."', valor_cot='".$field_subtotal."' WHERE id='".$field_item_id."'");



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
