<?php
# ===========================================================================
# =           WebService - Registro consumo combustible DISTRACOM           =
# ===========================================================================

include '../conexion.php';
$pdo = new conexion();

# ==============================================================
# =           Validación por método Post al Sistema            =
# ==============================================================

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT INTO webservice_distracom(Control, Placa, EntregadoA, Centrocosto, EstacionID, Estacion, Direccion, Ciudad, FechaFinal, Volumen, Kilometraje, Valor, ValorTotal, Combustible, Cedula, vale, Empleado, Centro, Subcentro, KilometrosGPS, Tarjeta) VALUES (:Control, :Placa, :EntregadoA, :Centrocosto, :EstacionID, :Estacion, :Direccion, :Ciudad, :FechaFinal, :Volumen, :Kilometraje, :Valor, :ValorTotal, :Combustible, :Cedula, :vale, :Empleado, :Centro, :Subcentro, :KilometrosGPS, :Tarjeta)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue('Control', $_POST['Control']);
    $stmt->bindValue('Placa', $_POST['Placa']);
    $stmt->bindValue('EntregadoA', $_POST['EntregadoA']);
    $stmt->bindValue('Centrocosto', $_POST['Centrocosto']);
    $stmt->bindValue('EstacionID', $_POST['EstacionID']);
    $stmt->bindValue('Estacion', $_POST['Estacion']);
    $stmt->bindValue('Direccion', $_POST['Direccion']);
    $stmt->bindValue('Ciudad', $_POST['Ciudad']);
    $stmt->bindValue('FechaFinal', $_POST['FechaFinal']);
    $stmt->bindValue('Volumen', $_POST['Volumen']);
    $stmt->bindValue('Kilometraje', $_POST['Kilometraje']);
    $stmt->bindValue('Valor', $_POST['Valor']);
    $stmt->bindValue('ValorTotal', $_POST['ValorTotal']);
    $stmt->bindValue('Combustible', $_POST['Combustible']);
    $stmt->bindValue('Cedula', $_POST['Cedula']);
    $stmt->bindValue('vale', $_POST['vale']);
    $stmt->bindValue('Empleado', $_POST['Empleado']);
    $stmt->bindValue('Centro', $_POST['Centro']);
    $stmt->bindValue('Subcentro', $_POST['Subcentro']);
    $stmt->bindValue('KilometrosGPS', $_POST['KilometrosGPS']);
    $stmt->bindValue('Tarjeta', $_POST['Tarjeta']);
    $stmt->execute();
    $idPost = $pdo->lastInsertId();

    if ($idPost) {
    	// Damos respuesta a nuestro Cliente Consumidor 200 Ok
    	header('HTTP/1.1 200 Ok');
    	exit;
    }
}
elseif($_SERVER['REQUEST_METHOD'] == 'GET'){

	header('HTTP/1.1 400 Error');
   	exit;

}
?>