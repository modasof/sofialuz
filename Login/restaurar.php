<?php 

if ($_POST['pass']!="") {
include("conexion.php");

$pass = md5($_POST['pass']);
$id = $_POST['id_usuario'];

$q="UPDATE usuarios SET pass = '$pass' WHERE id_usuario = '$id'";
	$resource=$conexion->query($q);
 
	$Valida=header("location:index.php?Mensaje=35");
}
