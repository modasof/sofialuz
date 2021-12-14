<?php 

/**
 * Conexión a la base de datos 
 */
class conexion extends PDO
{

	private $hostBd ='localhost';
	private $nombreBd ='u234527735_sofialuz2021';
	private $usuariotBd ='u234527735_sofialuz2021';
	private $passwordBd ='Teksystem@80761478';

	public function __construct()
	{
		try {

			parent::__construct('mysql:host='.$this->hostBd.';dbname='.$this->nombreBd.';charset=utf8',$this->usuariotBd,$this->passwordBd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			
		} catch (PDOException $e) {
			echo 'Error:'.$e->getMessage();
		}
		
	}
}

 ?>