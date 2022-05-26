<?php
session_start();
include 'bdd.php';
if (isset($_SESSION['id'])) {
	header("Location:pages/dashboard");
} else {
	header("Location:connexion.php");
}