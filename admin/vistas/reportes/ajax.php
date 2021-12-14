<?php
//Include database configuration file
include '../../include/class.conexion.php';

$id_cliente=$_POST['id_cliente'];
$id_producto=$_POST['id_producto'];


if(isset($_POST["id_cliente"]) && !empty($_POST["id_cliente"])){
	
	$db=Db::getConnect();
	$select=$db->query("SELECT * FROM clientes WHERE id_cliente = '".$_POST['id_cliente']."'");
	$campo=$select->fetchAll();
	$i = 0;
	foreach($campo as $campos){
		$i = $i+1;
		$nombre_cliente = $campos['nombre_cliente'];
		//echo '<option value="'.$id_subrubro.'">'.utf8_encode($nombre_subrubro).'</option>';
		echo('<label>Valor m3<span>*</span></label><input type="text" name="valor_m3" id="valor_m3" placeholder="Valor M3" class="form-control" value="'.$nombre_cliente.'">');
	}

    $rowCount = $i;
    //Display states list
    if($rowCount > 0){
    }else{
        echo '<label>Valor m3<span>*</span></label><input type="text" name="valor_m3" id="valor_m3" placeholder="Valor M3" class="form-control" value="25">';
    }

}

?>