<?php
//Include database configuration file
include '../../include/class.conexion.php';

	$valoriva=$_GET['iva'];

	$V1=str_replace(".","",$valoriva);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;

	$id=$_GET['idcompra'];
	
	try{
	$db=Db::getConnect();
		$update=$db->prepare('UPDATE ordenescompra SET
								valor_iva=:valor_iva
								WHERE id=:id');
		$update->bindValue('valor_iva',$valornumero);
		$update->bindValue('id',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
?>
