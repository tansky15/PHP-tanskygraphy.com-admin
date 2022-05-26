<?php
session_start();
include '../../bdd.php';
if (isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if ($user['activation'] == 1 or $user['activation'] == 2) {
        //requete sur la lieste des administrateurs
        $reqadmins = $bdd->prepare('SELECT * FROM membres WHERE activation = ? OR activation = ?');
        $reqadmins->execute(array("0", "2"));
?>
<?php $current_page = "publications"; ?>
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
    <?php include '../../partials/nav.php'; ?>

    <?php include '../../partials/sidebar.php'
            ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

            <h1 class="h2">Liste des publications</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a class="btn btn-sm btn-outline-secondary" href="add_image.php">Share new one</a>
                </div>

            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Publications</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Auteur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">
                            <?php
                                    if (isset($_SESSION['msg'])) {
                                        echo $_SESSION['msg'];
                                        unset($_SESSION['msg']);
                                    }
                                    ?>
                        </td>
                    </tr>
                    <?php
                            $reqPub = $bdd->query('SELECT gallery.titre,gallery.description,gallery.auteur,
                            gallery.id as id,membres.pseudo FROM gallery INNER JOIN membres 
                            ON gallery.auteur=membres.id ORDER BY date_time_publication DESC');
                            while ($pub = $reqPub->fetch()) { ?>
                    <tr>
                        <td><img width="100px" src="../../upload/photos/<?php echo $pub['id']; ?>.jpg"></td>
                        <td><?php echo $pub['titre']; ?></td>
                        <td><?php echo $pub['description']; ?></td>
                        <td><?php echo $pub['pseudo']; ?></td>
                        <td><a href="../../myhost/actions/effacerphoto.php?id=<?php echo $pub['id']; ?>"
                                class="btn btn-outline-secondary">Effacer</a></td>

                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </main>
    </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../dist//code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
    window.jQuery || document.write('<script src="../../dist//assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <!-- <script src="assets/js/vendor/popper.min.js"></script> -->
    <script src="../../dist//js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="../../dist//unpkg.com/feather-icons%404.28.0/dist/feather.min.js"></script>
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