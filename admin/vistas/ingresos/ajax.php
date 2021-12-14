<?php
//Include database configuration file
include '../../include/class.conexion.php';

if(isset($_POST["id_rubro"]) && !empty($_POST["id_rubro"])){
	$db=Db::getConnect();
	$select=$db->query("SELECT * FROM subrubros WHERE rubro_id_rubro = '".$_POST['id_rubro']."'");
	$campo=$select->fetchAll();
	$i = 0;
	echo("<option value'0'>Seleccionar Subrubro</option>");
	foreach($campo as $campos){
		$i = $i+1;
		$nombre_subrubro = $campos['nombre_subrubro'];
		$id_subrubro = $campos['id_subrubro'];
		echo '<option value="'.$id_subrubro.'">'.$nombre_subrubro.'</option>';
	}

    $rowCount = $i;
    //Display states list
    if($rowCount > 0){
    }else{
        echo '<option value="">Subrubro no creados</option>';
    }
}

?>
