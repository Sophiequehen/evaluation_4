<?php
class Client extends Database{

	public function read(){

		$reqread = parent::$pdo->prepare("SELECT id, nom, prenom FROM `clients`");
		$reqread->execute();
		return $reqread;
	}

}
?>
