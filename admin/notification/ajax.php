<?php
include "dbconn.php";
include "sql.php";
$sql = new sql();
$array=array();
$rows=array();
$listnotif = $sql->listNotifUser();
foreach ($listnotif[1] as $key) {
	$mensaje = "La empresa: ".$key['empresa']." se comunico con ustedes por el siguiente motivo: ".$key['motivo']." para el area: ".$key['areainv']." revisar el listado de pqrs para mas información";
	$data['title'] = 'Nuevo Pqrs';
	$data['msg'] = $mensaje;
	$data['icon'] = 'http://127.0.0.1/eccargosa/notification/avatar2.png';
	$data['url'] = 'http://127.0.0.1/eccargosa/admin/';
	$rows[] = $data;
	// update notification database
	//$nextime = date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s'))+($key['notif_repeat']*60));
	$sql->updateNotif($key['id']);
}
$array['notif'] = $rows;
$array['count'] = $listnotif[2];
$array['result'] = $listnotif[0];
echo json_encode($array);


?>
