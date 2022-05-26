<?php
session_start();
include '../../bdd.php';
if (isset($_SESSION['id'])) {
    if (isset($_GET['id']) and !empty($_GET['id'])) {
        $get_id = htmlspecialchars($_GET['id']);
        $delete = $bdd->prepare('DELETE FROM temoignages WHERE id = ?');
        $delete->execute(array($get_id));
        $message = 'Le commenatire a ete suprrim&eacute; avec success!';
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>" . $message . "</div>";
    } else {
        $message = "Error!";
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>" . $message . "</div>";
    }
    header('Location:../../pages/dashboard');
} else {
    header("Location:../../callback.php");
}