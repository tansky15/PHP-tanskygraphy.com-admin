<?php
session_start();
if (isset($_SESSION['id'])) {
    include '../bdd.php';

    if (isset($_POST['photo_title'], $_POST['photo_description'])) {
        if (!empty($_POST['photo_title']) and !empty($_POST['photo_description'])) {

            $photo_title = htmlspecialchars($_POST['photo_title']);
            $photo_description = htmlspecialchars($_POST['photo_description']);
            $photo_collection = intval($_POST['photo_collection']);
            $photo_auteur = intval($_SESSION['id']);

            $ins = $bdd->prepare('INSERT INTO gallery (titre,album,auteur,description, date_time_publication) VALUES (?,?,?, ?, NOW())');
            $ins->execute(array($photo_title, $photo_collection, $photo_auteur, $photo_description));
            $lastid = $bdd->lastInsertId();

            if (isset($_FILES['photo_miniature']) and !empty($_FILES['photo_miniature']['name'])) {
                if (exif_imagetype($_FILES['photo_miniature']['tmp_name']) == 2) {
                    $chemin = '../upload/photos/' . $lastid . '.jpg';
                    move_uploaded_file($_FILES['photo_miniature']['tmp_name'], $chemin);

                    $erreur = 'Votre image a ete sauvegarg&eacute;e et post&eacute;e avec success';
                    $_SESSION['erreur'] = "<div class='alert alert-success' role='alert'>" . $erreur . "</div>";
                    header('Location:../pages/post-image');
                } else {
                    $erreur = 'Votre image doit être au format jpg';
                    $_SESSION['erreur'] = "<div class='alert alert-danger' role='alert'>" . $erreur . "</div>";
                    header('Location:../pages/post-image');
                }
            }
            $uploaded = 'Publi&eacute;e';
        } else {
            $erreur = 'Veuillez remplir tous les champs';
            $_SESSION['erreur'] = "<div class='alert alert-danger' role='alert'>" . $erreur . "</div>";
            header('Location:../pages/post-image');
        }
    }

    header('Location:../pages/post-image');
} else {
    header('Location:../');
}