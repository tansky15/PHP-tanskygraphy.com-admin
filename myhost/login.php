<?php
session_start();
include_once '../bdd.php';
if (isset($_POST['formconnexion'])) {
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if (!empty($mailconnect) and !empty($mdpconnect)) {
        $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location:../pages/dashboard/");
        } else {
            $erreur = "Mauvaise adresse email ou mot de passe";
            $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>" . $erreur . "</div>";
            header("Location:../");
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>" . $erreur . "</div>";
        header("Location:../");
    }
}