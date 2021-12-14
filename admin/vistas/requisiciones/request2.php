<?php
$idform2            = $_POST['idform2'];
$cantidadform2      = $_POST['cantidadform2'];
$valorunitarioform2 = $_POST['valorunitarioform2'];
$provform2          = $_POST['provform2'];
$valor_cot          = $cantidadform2 * $valorunitarioform2;
//Include database configuration file
include '../../include/class.conexion.php';

if (isset($_POST["idform2"]) && !empty($_POST["idform2"])) {
    try {
        $db     = Db::getConnect();
        $update = $db->prepare('UPDATE cotizaciones_item SET
								cantidadcot=:cantidadcot,
								valor_cot=:valor_cot
								WHERE id=:id');
        $update->bindValue('cantidadcot', utf8_decode($cantidadform2));
        $update->bindValue('valor_cot', utf8_decode($valor_cot));
        $update->bindValue('id', utf8_decode($idform2));
        $update->execute();
        //return true;
        echo ("<a class='btn btn-xs btn-success' href='?controller=requisiciones&&action=vercotizacion&&id=" . $provform2 . "''>Refresh</a>");
    } catch (PDOException $e) {
        echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
    }

}
