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
		<h1>Supprimer une réservation</h1>
	</header>

	<section class="container">
		<?php
		Database::connect();
		$id = $_GET['id'];

		if($id){
			$reqread = Database::$pdo->prepare("SELECT reservations.id, clients.prenom AS 'prenom', clients.nom AS 'nom', chambres.numero AS 'numero', CAST(dateEntree as date) as dateEntree, CAST(dateSortie as date) as dateSortie FROM `reservations` INNER JOIN clients ON clients.id = clientId INNER JOIN chambres ON chambres.id = chambreId WHERE reservations.id=:id");
			$reqread->execute([':id' => $id]);
			$result = $reqread->fetchAll();

			echo "<p class='delete'>Êtes-vous sûr de vouloir supprimer la réservation N°".$id." : </p>";
			echo "<h2 class='delete'>".$result[0]['prenom']." ".$result[0]['nom']." / Chambre N°".$result[0]['numero']."</h2>";
			echo "<h2 class='delete'>du ".$result[0]['dateEntree']."</h2>";
			echo "<h2 class='delete'>au ".$result[0]['dateSortie']."</h2>";
			?>
			<form method="POST" action="supprimer.php" class="delete_nav">
				<a href="index.php" class="container_a_delete">Annuler</a>
				<button type="submit" class="container_button">Confirmer la suppression</button>
			</form>
			<?php
			$newResa = new Reservation;	
			$newResa->delete($id);
		}else{
			header('Location: index.php');
		}
		?>
	</section>
</body>
</html>