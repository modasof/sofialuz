<?php 
try {
	
	$soapclient=new SoapClient('http://webcloud.satrack.com/WebServiceEventos/getEvents.asmx?wsdl');

	
$parametros=array('UserName'=>'NOMADAS123','Password'=>'nomadas1','PhysicalID'=>'*','InitialYear'=>'2021','InitialMonth'=>'08','InitialDay'=>'01','InitialHour'=>'00','InitialMinute'=>'00','InitialSecs'=>'00','FinalYear'=>'2021','FinalMonth'=>'08','FinalDay'=>'30','FinalHour'=>'00','FinalMinute'=>'00','FinalSecs'=>'00');

	$response=$soapclient->GetKilometerString($parametros);
	var_dump($response);

	$xml=loadXml($response);

	echo("<br><br><br>");

	$array=json_decode(json_encode($response),true);

	print_r($array);

	echo("<br><br><br>");


	foreach ($array as $item) {
		echo '<pre>';echo($item);
	}

} catch (Exception $e) {
	echo $e->getMessage();
}

 ?>