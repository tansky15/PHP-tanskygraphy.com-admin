<?php
session_start();
if (isset($_SESSION['id'])) {
    include '../bdd.php';

    if (isset($_POST['collection_name']) and isset($_POST['collection_description'])) {
        if (!empty($_POST['collection_name']) and !empty($_POST['collection_description'])) {
            $collection_name = htmlspecialchars($_POST['collection_name']);
            $collection_description = htmlspecialchars($_POST['collection_description']);
            $ins = $bdd->prepare('INSERT INTO album (album,description, date_time_album) VALUES (?,?,NOW())');
            $ins->execute(array($collection_name, $collection_description));
            $saved = 'Votre collection a bien été ajouté';
            $lastid = $bdd->lastInsertId();
            if (isset($_FILES['collection_miniature']) and !empty($_FILES['collection_miniature']['name'])) {
                if (exif_imagetype($_FILES['collection_miniature']['tmp_name']) == 2) {
                    $chemin = '../upload/album/' . $lastid . '.jpg';
                    move_uploaded_file($_FILES['collection_miniature']['tmp_name'], $chemin);
                } else {
                    $erreur = 'Votre image doit être au format jpg';
                }
            }
            $saved = 'Publi&eacute;e';
        } else {
            $erreur = 'Veuillez remplir tous les champs';
        }
    }

    header('Location:../pages/create-album');
} else {
    header('Location:../');
}