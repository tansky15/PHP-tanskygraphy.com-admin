<?php
session_start();
include_once '../../bdd.php';
if (isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if ($user['activation'] == 1 or $user['activation'] == 2) {
?>
<?php
        $current_page = "create-album";
        ?>
<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../logo.png">

    <title>Administration - TanskyGraphy</title>

    <link rel="canonical" href="index.html">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../dist/css/dashboard.css" rel="stylesheet">
</head>

<body>
    <?php
            include '../../partials/nav.php';
            include '../../partials/sidebar.php';
            ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Cr&eacute;ation de la collection</h1>

        </div>
        <div>
            <?php if (isset($saved)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $saved; ?>
            </div>
            <?php
                    }
                    ?>
            <?php if (isset($erreur)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erreur; ?>
            </div>
            <?php
                    }
                    ?>
            <form method="POST" action="../../myhost/upload-image-album.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Creer une collection de photo</label>
                    <input type="text" required class="form-control" name="collection_name" id="collection_name"
                        placeholder="Portrait">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Image de couverture</label>
                    <input type="file" required class="form-control" name="collection_miniature"
                        id="collection_miniature" />
                </div>
                <div class="form-group">
                    <textarea class="form-control" required name="collection_description"
                        id="collection_description"></textarea>
                </div>
        </div>


        <div class="form-group">
            <input class="btn" type="submit" value="Creer la colllection" />
        </div>
        </form>

        <h2>Les catalogues de photo</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Couverture</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $reqAlbum = $bdd->query('SELECT * FROM album ORDER BY date_time_album DESC');
                            while ($album = $reqAlbum->fetch()) { ?>
                    <tr>
                        <td><img width="60px" src="../../upload/album/<?php echo $album['id']; ?>.jpg"></td>
                        <td><?php echo $album['album']; ?></td>
                        <td><?php echo $album['description']; ?></td>
                        <td><?php echo $album['date_time_album']; ?></td>
                        <td><a href="../../myhost/actions/deletecollection.php?id=<?php echo $album['id']; ?>"
                                class="btn btn-sm btn-outline-secondary">Supprimer</a>
                        </td>

                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>






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