<?php
session_start();
include_once "../../bdd.php";
if (isset($_SESSION['id'])) {
  $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
  $requser->execute(array($_SESSION['id']));
  $user = $requser->fetch();
  if ($user['activation'] == 1 or $user['activation'] == 2) {
    //requete sur la liste des administrateurs
    $reqadmins = $bdd->prepare('SELECT * FROM membres WHERE activation = ? OR activation = ?');
    $reqadmins->execute(array("0", "2"));
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
    <link href="../../dist//css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../dist//css/dashboard.css" rel="stylesheet">
</head>

<body>
    <?php include '../../partials/nav.php'; ?>

    <?php include '../../partials/sidebar.php'
      ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Tableau de bord </h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary">Share</button>
                </div>

            </div>
        </div>
        <?php
        //requete sur la liste des temoignages
        $reqcomment = $bdd->query('SELECT * FROM temoignages ORDER BY date_time_publication DESC');
        include './comment.php';
        ?>
        <style type="text/css">
        #btnMoreComment {
            display: none;
        }
        </style>

    </main>
    </div>
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
    header("Location: comptebloque.php");
  }
} else {
  header("Location: connexion.php");
}
?>