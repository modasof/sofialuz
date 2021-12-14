<?php
//Include database configuration file
include '../../include/class.conexion.php';
	$id=$_GET['idcompra'];
	
	$valorretenciones=$_GET['retencion'];

	$V1=str_replace(".","",$valorretenciones);
		$V2=str_replace(" ", "", $V1);
		$valor_final=str_replace("$", "", $V2);
		$valornumero=(int) $valor_final;
	
	
	try{
	$db=Db::getConnect();
		$update=$db->prepare('UPDATE ordenescompra SET
								valor_retenciones=:valor_retenciones
								WHERE id=:id');
		$update->bindValue('valor_retenciones',$valornumero);
		$update->bindValue('id',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
?>
