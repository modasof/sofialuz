<?php
$idform1            = $_POST['idform1'];
$cantidadform1      = $_POST['cantidadform1'];
$valorunitarioform1 = $_POST['valorunitarioform1'];
$provform1          = $_POST['provform1'];
$valor_cot          = $cantidadform1 * $valorunitarioform1;
//Include database configuration file
include '../../include/class.conexion.php';

if (isset($_POST["idform1"]) && !empty($_POST["idform1"])) {
    try {
        $db     = Db::getConnect();
        $update = $db->prepare('UPDATE cotizaciones_item SET
								cantidadcot=:cantidadcot,
								valor_cot=:valor_cot
								WHERE id=:id');
        $update->bindValue('cantidadcot', utf8_decode($cantidadform1));
        $update->bindValue('valor_cot', utf8_decode($valor_cot));
        $update->bindValue('id', utf8_decode($idform1));
        $update->execute();
        //return true;
        echo ("<a class='btn btn-xs btn-success' href='?controller=requisiciones&&action=vercotizacion&&id=" . $provform1 . "''>Refresh</a>");
    } catch (PDOException $e) {
        echo '{"error al guardar la configuraciónes ":{"text":' . $e->getMessage() . '}}';
    }

}
