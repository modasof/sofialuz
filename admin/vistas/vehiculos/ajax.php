<?php
//Include database configuration file
include('class.conexion.php');

if(isset($_POST["id_marca"]) && !empty($_POST["id_marca"])){
	$db=Db::getConnect();
	$select=$db->query("SELECT * FROM modelos WHERE id_marca = '".$_POST['id_marca']."'");
	$campo=$select->fetchAll();
	$i = 0;
	echo("<option value''>Seleccionar Referencia</option>");
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


if(isset($_POST["id_modelo"]) && !empty($_POST["id_modelo"])){
	$db=Db::getConnect();
	$select=$db->query("SELECT * FROM versiones WHERE id_modelo = '".$_POST['id_modelo']."'");
	$campo=$select->fetchAll();
	$i = 0;
	echo("<option value''>Seleccionar Versión</option>");
	foreach($campo as $campos){
		$i = $i+1;
		$version = $campos['version'];
		$id = $campos['id'];
		echo '<option value="'.$id.'">'.$version.'</option>';
	}
    $rowCount = $i;
    if($rowCount > 0){
    }else{
        echo '<option value="">Versiones no habilitadas para este modelo</option>
        <option value="0">Versión estándar</option>
        ';
    }
}
?>
