<?php /** * CLASE DE CONEXION A LA BASE DE DATOS */

class Db {
	private static $instance = NULL;

	function __construct() {}

	public static function getConnect() {
		if (!isset(self::$instance)) {
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			//self::$instance = new PDO('mysql:host=localhost;dbname=estren_estrenarcarro', 'estren_pcontramaestre', 'P20625697p*', $pdo_options);
			self::$instance = new PDO('mysql:host=localhost;dbname=u732693446_obinc', 'u732693446_obinc', 'Teksystem@80761478', $pdo_options);
		}
		return self::$instance;
	}
}
?>
