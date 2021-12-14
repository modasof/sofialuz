<?php

class dbconn {
	public $dblocal;
	public function __construct()
	{

	}
	public function initDBO()
	{
		$this->dblocal = new PDO("mysql:host=localhost;dbname=eccargosa;charset=latin1","pcontramaestre","P20625697p*",array(PDO::ATTR_PERSISTENT => true));
		$this->dblocal->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
		
	}
}
?>
