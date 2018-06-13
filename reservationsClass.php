<?php
class Reservation extends Database{

	public function create($idclient, $idchambre, $dateEntree, $dateSortie, $statut){

		$reqcreate = parent::$pdo->prepare("INSERT INTO reservations (clientId, chambreId, dateEntree, dateSortie, statut) VALUES('$idclient', '$idchambre', '$dateEntree', '$dateSortie', '$statut')");
		$reqcreate->execute();
	}

	public function read(){

		$reqread = parent::$pdo->prepare("SELECT reservations.id, clients.prenom, clients.nom, chambres.numero, CAST(dateEntree as date) as dateEntree, CAST(dateSortie as date) as dateSortie, reservations.statut AS statut FROM `reservations` INNER JOIN clients ON clients.id = clientId INNER JOIN chambres ON chambres.id = chambreId");
		$reqread->execute();
		return $reqread;
	}

	public function edit($id, $idclient, $idchambre, $dateEntree, $dateSortie, $statut){

		$reqedit = parent::$pdo->prepare("
			UPDATE reservations SET 
			clientId=:idclient, 
			chambreId=:idchambre, 
			dateEntree=:dateEntree, 
			dateSortie=:dateSortie, 
			statut=:statut 
			WHERE id=:id");
		$reqedit->execute([
			':idclient' => $idclient, 
			':idchambre' => $idchambre, 
			':dateEntree' => $dateEntree, 
			':dateSortie' => $dateSortie, 
			':statut' => $statut, 
			':id' => $id]);
		return $reqedit;
	}

	public function editclient($id, $idchambre){

		$reqedit = parent::$pdo->prepare("UPDATE reservations SET chambreId=:idchambre WHERE id=:id");
		$reqedit->execute([':idchambre' => $idchambre, ':id' => $id]);
		header('Location: index.php');
	}


	public function delete($id){

		$reqdelete = parent::$pdo->prepare("DELETE FROM reservations WHERE id=:id");
		$reqdelete->execute([':id' => $id]);
	}
}
?>
