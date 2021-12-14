<?php
include "dbconn.php";
include "sql.php";
$sql = new sql();
$array=array();
$rows=array();
$listnotif = $sql->listNotifUser3();
foreach ($listnotif[1] as $key) {
	$mensaje = "La empresa: ".$key['empresa']." se comunico con ustedes, para una cotización para el servicio: ".$key['tipo_servicio']." revisar para más detalles";
	$data['title'] = 'Nueva Solicitud de Cotización';
	$data['msg'] = $mensaje;
	$rows[] = $data;
	// update notification database
	//$nextime = date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s'))+($key['notif_repeat']*60));
	$sql->updateNotif3($key['id']);
}
$array['notif'] = $rows;
$array['count'] = $listnotif[2];
$array['result'] = $listnotif[0];
echo json_encode($array);


?>
