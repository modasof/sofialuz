<?php
//Include database configuration file
include '../../include/class.conexion.php';

$field_valor_iva=$_POST['field_valor_iva'];
$field_item_id=$_POST['field_item_id'];


if(isset($_POST["field_valor_iva"]) && !empty($_POST["field_valor_iva"])){

	// Calcular y guardar el iva 

	if ($field_valor_iva!="0") {
		$iva_porcentual=$field_valor_iva/100;
		
// Consulta del valor subtotal Actual 
	$db=Db::getConnect();
	$select=$db->query("SELECT * FROM cotizaciones_item WHERE id = '".$_POST['field_item_id']."'");
	$campo=$select->fetchAll();
	$x = 0;
	//echo("<option value'0'>Seleccionar Subrubro</option>");
	foreach($campo as $campos){
		$x = $x+1;
		$valor_cot = $campos['valor_cot'];
	}
	$valorfinaliva=$valor_cot*$iva_porcentual;

		$db=Db::getConnect();
	$select=$db->query("UPDATE cotizaciones_item SET iva='".$field_valor_iva."', valor_iva='".$valorfinaliva."' WHERE id='".$field_item_id."'");

	}elseif ($field_valor_iva=="No aplica"){
		
		$db=Db::getConnect();
	$select=$db->query("UPDATE cotizaciones_item SET iva='0', valor_iva='0' WHERE id='".$field_item_id."'");
	}


	$select=$db->query("SELECT * FROM cotizaciones_item WHERE id = '".$_POST['field_item_id']."'");
	$campo=$select->fetchAll();
	$i = 0;
	//echo("<option value'0'>Seleccionar Subrubro</option>");
	foreach($campo as $campos){
		$i = $i+1;
		$valor_iva = $campos['valor_iva'];
		echo ("<input disabled type='text' value='$".number_format($valor_iva)."'>");
	}

    $rowCount = $i;
    //Display states list
    if($rowCount > 0){
    }else{
        echo ("<input disabled type='text' value=''>");
    }


}

?>
