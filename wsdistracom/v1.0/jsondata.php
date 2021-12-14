<?php

$url = "./test.php";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
"Control": "N/A",
"Placa": "DZA-123",
"Centrocosto": "N/A",
"EstacionID": "18",
"Estacion": " Las Vegas",
"Direccion": "Cra. 45 No. 134 Sur Km. 14 Variante Caldas ",
"Ciudad": "cerete",
"FechaFinal": "2017-03-31T21:07:37",
"Volumen": "98.7559213167",
"Kilometraje": "596399",
"Valor": "7777.0000",
"ValorTotal": "736703.00000000000000",
"Combustible": "DIESEL",
"Cedula": "0",
"vale": "ELVB02783",
"Empleado": "Morales Jhoan Alexander",
"Centro": "42",
"Subcentro": "0",
"KilometrosGPS": "0",
"Tarjeta": "N/A"
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

?>
