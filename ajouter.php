<?php
@include 'connect.php';
@include 'reservationsClass.php';
@include 'clientsClass.php';
@include 'chambresClass.php';

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
		<h1>Ajouter une réservation</h1>
	</header>

	<section class="container">
		<form method="POST" action="ajouter.php">

			<p>Client :
				<select name="select_client">
					<?php
					Database::connect();
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
					Database::connect();
					$newChambre = new Chambre;	
					foreach ($newChambre->read()->fetchAll() as $row) {
						echo "<option value='".$row['id']."''>N°".$row['numero']." : ".$row['nom']."</option>";
					} 
					?>
				</select>
			</p>

			<p>Date Entrée : <input name="date_entree" type="date" required></p>
			<p>Date Sortie : <input name="date_sortie" type="date" required></p>

			<p>Statut :
				<select name="select_statut">
					<option>valide</option>
					<option>refus</option>
					<option>attente</option>
				</select>
			</p>
			<button type="submit" class="container_button">Enregistrer</button>
		</form>


		<?php
		Database::connect();
		if (!empty($_POST)){
			$idclient = $_POST['select_client'];
			$idchambre = $_POST['select_chambre'];
			$statut = $_POST['select_statut'];
			$dateEntree = $_POST['date_entree'];
			$dateSortie = $_POST['date_sortie'];
			$newResa = new Reservation;	
			$newResa->create($idclient, $idchambre, $dateEntree, $dateSortie, $statut);
			header('Location: index.php');
		}
		?>

		<a href="index.php">Retour</a>
	</section>
</body>
</html>