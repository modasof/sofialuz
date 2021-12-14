<?php
//Include database configuration file
include '../../include/class.conexion.php';

if(isset($_POST["cuenta_id"]) && !empty($_POST["cuenta_id"])){
	$db=Db::getConnect();
	$select=$db->query("SELECT IFNULL(sum(valor_ingreso),0) as TotalIngresos FROM ingresos_cuenta WHERE cuenta_id_cuenta='".$_POST['cuenta_id']."' and ingreso_publicado='1'");
	$campo=$select->fetchAll();
	foreach($campo as $campos){
		$TotalIngresos = $campos['TotalIngresos'];
	}
}

if(isset($_POST["cuenta_id"]) && !empty($_POST["cuenta_id"])){
	$db=Db::getConnect();
	$select=$db->query("SELECT IFNULL(sum(valor_egreso),0) as TotalEgresos FROM egresos_cuenta WHERE cuenta_id_cuenta='".$_POST['cuenta_id']."' and egreso_publicado='1'");
	$campo=$select->fetchAll();
	
	foreach($campo as $campos){		
		$TotalEgresos = $campos['TotalEgresos'];
	}

}
	 $saldocuenta = $TotalIngresos-$TotalEgresos;
	 if ($saldocuenta<=0) {
	 	 echo("<strong class='text-danger'><i class='fa fa-warning'></i> Saldo Disponible: $".number_format($saldocuenta,0)."</strong>");
	 }else{
	 	 echo("<strong class='text-success'><i class='fa fa-check'></i> Saldo Disponible : $".number_format($saldocuenta,0)."</strong>");
	 }
	

?>
