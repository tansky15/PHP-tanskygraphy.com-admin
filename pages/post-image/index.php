<?php
session_start();
include '../../bdd.php';
if (isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if ($user['activation'] == 1 or $user['activation'] == 2) {
        //requete sur la lieste des administrateurs


?>
<?php $current_page = "post-image"; ?>
<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../logo.png">

    <title>Share pictures - TanskyGraphy</title>

    <link rel="canonical" href="index.html">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../dist/css/dashboard.css" rel="stylesheet">
</head>

<body>
    <?php
            include '../../partials/nav.php';
            ?>
    <?php
            include '../../partials/sidebar.php';
            ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Poster une image</h1>

        </div>
        <?php if (isset($uploaded)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $uploaded; ?>
        </div>
        <?php
                }
                ?>
        <?php if (isset($_SESSION['erreur'])) {
                    echo $_SESSION['erreur'];
                    unset($_SESSION['erreur']);
                }
                ?>
        <form method="POST" action="../../myhost/upload-image.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titre">En tete de l'image</label>
                <input type="text" class="form-control" id="photoTitle" name="photo_title" placeholder="Mere nature " />
            </div>
            <div class="form-group">
                <label for="file">Televerser la photo</label>
                <input type="file" class="form-control" id="photoUpload" name="photo_miniature" />
            </div>
            <div class="form-group">
                <label for="photoCollection">Choisissez une collection</label>
                <select class="form-control" id="photoCollection" name="photo_collection">
                    <?php
                            $collection = $bdd->query('SELECT * FROM album ORDER BY date_time_album DESC'); ?>
                    <?php while ($c = $collection->fetch()) { ?>
                    <option value="<?= $c['id']; ?>"><?php echo $c['album']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="photoAuteur">Auteur</label>
                <input type="text" class="form-control" id="photoAuteur" name="photo_auteur"
                    value="<?php echo $user['pseudo']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Example textarea</label>
                <textarea name="photo_description" class="form-control" id="photoDescription" rows="3"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="formupload" class="btn btn-outline-secondary">
            </div>
        </form>




        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../../dist/code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script>
        window.jQuery || document.write('<script src="../../dist/assets/js/vendor/jquery-slim.min.js"><\/script>')
        </script>
        <script src="assets/js/vendor/popper.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>

        <!-- Icons -->
        <script src="../../dist/unpkg.com/feather-icons%404.28.0/dist/feather.min.js"></script>
        <script>
        feather.replace()
        </script>

</body>

</html>
<?php
    } else {
        header("Location:../../pages/account/account-lock.php");
    }
} else {
    header("Location: ../../");
}
?>