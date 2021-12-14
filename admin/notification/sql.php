<?php
class sql extends dbconn {
	public function __construct()
	{
		$this->initDBO();
	}
	public function saveNotif($msg,$time,$loop,$loop_every,$user){
		$db = $this->dblocal;
		try
		{
			$stmt = $db->prepare("insert into notif(notif_msg, notif_time, notif_repeat, notif_loop,username) values(:msg , :bctime , :repeat , :loop,:user) ");

			$stmt->bindParam("msg", $msg);
			$stmt->bindParam("bctime", $time);
			$stmt->bindParam("loop", $loop);
			$stmt->bindParam("repeat", $loop_every);
			$stmt->bindParam("user", $user);
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = 'sukses';
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			return $stat;
		}
	}

	//ACTUALIZAR NOTIFICACION DE PQRS
	public function updateNotif3($id)
	{
		$db = $this->dblocal;
		try
		{
			$stmt = $db->prepare("update cotizar SET notifi = 0 where id=:id ");
			$stmt->bindParam("id", $id);
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = 'sukses';
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			return $stat;
		}
	}
	

	//ACTUALIZAR NOTIFICACION DE PQRS
	public function updateNotif($id)
	{
		$db = $this->dblocal;
		try
		{
			$stmt = $db->prepare("update pqrs SET notifi = 0 where id=:id ");
			$stmt->bindParam("id", $id);
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = 'sukses';
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			return $stat;
		}
	}
	
	//ACTUALIZAR NOTIFICACION DE CONTACTO
	public function updateNotif2($id)
	{
		$db = $this->dblocal;
		try
		{
			$stmt = $db->prepare("update contacto SET notifi = 0 where id=:id ");
			$stmt->bindParam("id", $id);
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = 'sukses';
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			return $stat;
		}
	}


	//NOTIFICACIONES DE PQRS
	public function listNotifUser($user){
		$db = $this->dblocal;
		try
		{
			$stmt = $db->prepare("SELECT * FROM pqrs
				WHERE notifi > 0");
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stat[2] = $stmt->rowCount();
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			return $stat;
		}
	}

	//NOTIFICACIONES DE CONTACTO
	public function listNotifUser2(){
		$db = $this->dblocal;
		try
		{
			$stmt = $db->prepare("SELECT * FROM contacto
				WHERE notifi > 0");
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stat[2] = $stmt->rowCount();
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			return $stat;
		}
	}	
	

	//NOTIFICACIONES DE COTIZAR
	public function listNotifUser3(){
		$db = $this->dblocal;
		try
		{
			$stmt = $db->prepare("SELECT * FROM cotizar
				WHERE notifi > 0");
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stat[2] = $stmt->rowCount();
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			return $stat;
		}
	}		
	
	
	
	public function getLogin($user,$pass){
		$db = $this->dblocal;
		try
		{
			$stmt = $db->prepare("select * from user where username = :user and password = :pass");
			$stmt->bindParam("user", $user);
			$stmt->bindParam("pass", $pass);
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stat[2] = $stmt->rowCount();
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			return $stat;
		}
	}
	
	public function listUser(){
		$db = $this->dblocal;
		try
		{
			$stmt = $db->prepare("select * from user");
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stat[2] = $stmt->rowCount();
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			return $stat;
		}
	}
	public function listNotif(){
		$db = $this->dblocal;
		try
		{
			$stmt = $db->prepare("select * from pqrs");
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stat[2] = $stmt->rowCount();
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			return $stat;
		}
	}
}
