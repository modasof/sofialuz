<?php
$hostname = "localhost";
$username = "u234527735_sofialuz2021";
$password = "Teksystem@80761478";
$database = "u234527735_sofialuz2021";
$conexion = new mysqli($hostname, $username, $password, $database);

if ($conn ->connect_error) {
die('Error de Conexión (' . $conn->connect_errno . ') '
. $conn->connect_error);
} 

