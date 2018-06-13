<?php
@include 'connect.php';
@include 'reservationsClass.php';
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
		<h1>Gestion des réservations</h1>
	</header>

	<section class="container">
		<a href="ajouter.php"><button class="container_button">Ajouter une réservation</button></a>
		<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Client</th>
					<th>Chambre</th>
					<th>Dates</th>
					<th class="hide">Statut</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				Database::connect();
				$newResa = new Reservation;	
				foreach ($newResa->read()->fetchAll() as $row) {
					echo "<tr>
					<td>".$row['id']."</td>
					<td>".$row['prenom']." ".$row['nom']."</td>
					<td>N°".$row['numero']."</td>
					<td>Du ".$row['dateEntree']." au ".$row['dateSortie']."</td>
					<td class='hide'>".$row['statut']."</td>
					<td>
					<a href='modifier.php?id=".$row['id']."'>Éditer</a>
					<a href='supprimer.php?id=".$row['id']."'>Supprimer</a>
					</td>
					</tr>";
				} 
				?>
			</tbody>
		</table>
	</section>
</body>
</html>