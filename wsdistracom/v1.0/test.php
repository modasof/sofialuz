<?php 
$data = json_decode(file_get_contents('./jsondata.php'), true);

echo $data['Placa'];

 ?>