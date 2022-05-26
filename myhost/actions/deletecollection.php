<?php
session_start();
include '../../bdd.php';
if (isset($_SESSION['id'])) {
    if (isset($_GET['id']) and !empty($_GET['id'])) {
        $get_id = htmlspecialchars($_GET['id']);
        $delete = $bdd->prepare('DELETE FROM album WHERE id = ?');
        $delete->execute(array($get_id));
        $message = 'la publication a ete bien supprimee !';
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>" . $message . "</div>";
    } else {
        $message = "Veuillez entrer le ID du objet a supprimer!";
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>" . $message . "</div>";
    }
    header('Location:../../pages/create-album');
} else {
    header("Location:../../callback.php");
}