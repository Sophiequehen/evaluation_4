<?php
@include 'connect.php';
@include 'reservationsClass.php';
@include 'clientsClass.php';
@include 'chambresClass.php';

Database::connect();
$id = $_GET['id'];
$idclient = $_POST['select_client'];
$idchambre = $_POST['select_chambre'];
$statut = $_POST['select_statut'];	
$dateEntree = $_POST['date_entree'];
$dateSortie = $_POST['date_sortie'];
$statut = $_POST['select_statut'];

$newReserv = new Reservation;	
$newReserv->edit($id, $idclient, $idchambre, $dateEntree, $dateSortie, $statut);
header('Location: index.php');
?>