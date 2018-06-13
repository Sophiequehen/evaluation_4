<?php
@include 'connect.php';
@include 'reservationsClass.php';
@include 'clientsClass.php';
@include 'chambresClass.php';

Database::connect();
$id = $_GET['id'];
$newResa = new Reservation;	
$newResa->delete($id);
header('Location: index.php');
?>

