<?php
//Include database configuration file
include('class.conexion.php');

if(isset($_POST["id_marca"]) && !empty($_POST["id_marca"])){
	$db=Db::getConnect();
	$select=$db->query("SELECT * FROM modelosu WHERE id_marca = '".$_POST['id_marca']."'");
	$campo=$select->fetchAll();
	$i = 0;
	foreach($campo as $campos){
		$i = $i+1;
		$modelo = $campos['modelo'];
		$id = $campos['id'];
		echo '<option value="'.$id.'">'.$modelo.'</option>';
	}

    $rowCount = $i;
    //Display states list
    if($rowCount > 0){
    }else{
        echo '<option value="">Modelos no habilitados para esta marca</option>';
    }
}
?>
