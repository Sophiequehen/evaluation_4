<?php
class Chambre extends Database{

	public function read(){

		$reqread = parent::$pdo->prepare("SELECT id, nom, numero FROM `chambres`");
		$reqread->execute();
		return $reqread;
	}

}
?>
