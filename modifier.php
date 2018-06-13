<?php
@include 'connect.php';
@include 'reservationsClass.php';
@include 'clientsClass.php';
@include 'chambresClass.php';
Database::connect();
$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ritz-Cahors</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<img class="header_logo" src="img/hotel.png">
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700" rel="stylesheet"> 
		<h1>Modifier une réservation</h1>
	</header>

	<section class="container">
		<form method="POST" action="update.php?id=<?php echo $id;?>">

			<p>Client :
				<select name="select_client">
					<?php
					$reqread = Database::$pdo->prepare("SELECT reservations.id, reservations.clientId AS clientId, clients.prenom AS 'prenom', clients.nom AS 'nom', chambreId, chambres.numero AS 'numero', chambres.nom AS nomChambre, CAST(dateEntree as date) as dateEntree, CAST(dateSortie as date) as dateSortie, reservations.statut AS statut FROM `reservations` INNER JOIN clients ON clients.id = clientId INNER JOIN chambres ON chambres.id = chambreId WHERE reservations.id=:id");
					$reqread->execute([':id' => $id]);
					$result = $reqread->fetchAll();

					echo "<option value='".$result[0]['clientId']."'>".$result[0]['prenom']." ".$result[0]['nom']."</option>";
					$newClient = new Client;	
					foreach ($newClient->read()->fetchAll() as $row) {
						echo "<option value='".$row['id']."'>".$row['prenom']." ".$row['nom']."</option>";
					} 
					?>
				</select>

			</p>

			<p>Chambre :
				<select name="select_chambre">
					<?php
					echo "<option value='".$result[0]['chambreId']."'>N°".$result[0]['numero']." : ".$result[0]['nomChambre']."</option>";
					$newChambre = new Chambre;	
					foreach ($newChambre->read()->fetchAll() as $row) {
						echo "<option value='".$row['id']."'>N°".$row['numero']." : ".$row['nom']."</option>";
					} 
					?>
				</select>
			</p>

			<?php 
			echo "<p>Date Entrée : <input name='date_entree' type='date' value='".$result[0]['dateEntree']."'></p>";
			echo "<p>Date Sortie : <input name='date_sortie' type='date' value='".$result[0]['dateSortie']."'></p>";
			?>
			<p>Statut :
				<select name="select_statut">
					<?php 
					echo "<option value='".$result[0]['statut']."'>".$result[0]['statut']."</option>";
					?>
					<option>valide</option>
					<option>refus</option>
					<option>attente</option>
				</select>
			</p>
			<button type="submit" class="container_button">Enregistrer</button>
		</form>
		<a href="index.php">Retour</a>
	</section>
</body>
</html>