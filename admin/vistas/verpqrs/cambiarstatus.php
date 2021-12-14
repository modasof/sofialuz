<?php
include '../../include/class.conexion.php';
include '../../controladores/pqrsController.php';
include '../../modelos/pqrs.php';
$id = $_POST['id'];
$status = $_POST['status'];
$res = PqrsController::cambiarstatus($id,$status);
?>
