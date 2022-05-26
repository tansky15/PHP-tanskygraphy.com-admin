<?php
session_start();
if (isset($_SESSION['id'])) {
	$get_id = htmlspecialchars($_GET['id']);
	include '../../bdd.php';
	//quand un administrateur secondaire est activer sont statut est 2
	//par contre l'administrateur principale a un statut 1, qui ne peut etre suspendu
	$activer = $bdd->prepare("UPDATE membres SET activation = ? WHERE id = ?");
	$activer->execute(array('2', $get_id));

	$userMsg = 'Utilisateur activ&eacute; avec success!';
	$_SESSION['userMsg'] = "<div class='alert alert-success' role='alert'>" . $userMsg . "</div>";

	header('Location:../../pages/dashboard');
} else {
	header("Location:../../callback.php");
}