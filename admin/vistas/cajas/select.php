<?php
//include("../../../Login/conexion.php");
		//selecionar usuario
		$hostname = "localhost";
$username = "u234527735_sofialuz";
$password = "Teksystem@900710285";
$database = "u234527735_sofialuz";
$conexion = new mysqli($hostname, $username, $password, $database);

if ($conn ->connect_error) {
die('Error de Conexión (' . $conn->connect_errno . ') '
. $conn->connect_error);
} 
															$select="SELECT * FROM usuarios";
    	
															$select_us=$conexion->query($select);

        
?>