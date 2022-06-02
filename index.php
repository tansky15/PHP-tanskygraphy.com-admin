<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>My Admin Space</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="logcss/assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="logcss/assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="logcss/assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="logcss/assets/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="logcss/assets/css/skins/default.css">

</head>

<body id="top">

    <div class="page_loader"></div>

    <!-- Login 14 start -->
    <div class="login-14">
        <div class="container">
            <div class="row login-box">
                <div class="col-lg-6 col-md-12 bg-img none-992">
                    <div class="info">
                        <div class="logo clearfix">
                            <a href="login-14.html">
                                <img src="logcss/assets/img/tanskygraphy.png" alt="logo">
                            </a>
                        </div>
                        <ul class="social-list">
                            <li>
                                <a href="http://facebook.com/tanskygraphy" class="facebook-bg">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://instagram.com/tansky_official" class="instagram-bg">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 bg-color-16 align-self-center">
                    <div class="form-section">
                        <div class="logo-2 clearfix">
                            <a href="#l">
                                <img src="../images/sidebar0.jpg" alt="tanskygraphy">
                            </a>
                        </div>
                        <h3>Sign into your account</h3>
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
                        <div class="login-inner-form">
                            <form method="POST" action="./myhost/login.php">
                                <div class="form-group form-box">
                                    <input type="email" name="mailconnect" required placeholder="Email Adress"
                                        class="input-text">
                                    <i class="flaticon-mail-2"></i>
                                </div>

                                <div class="form-group form-box">
                                    <input type="password" name="mdpconnect" required placeholder="Password"
                                        class="input-text">
                                    <i class="flaticon-password"></i>
                                </div>
                                <div class="checkbox clearfix">
                                    <div class="form-check checkbox-theme">
                                        <input class="form-check-input" type="checkbox" type="submit"
                                            name="formconnexion" value="Se connecter !">
                                        <label class="form-check-label" for="rememberMe">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="#">Forgot Password</a>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" name="formconnexion" value="Login"
                                        class="btn-md btn-theme btn-block" />
                                </div>

                            </form>
                            <label class="mt-3"><a href="#">Create a client account ?</a></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login 14 end -->
    <!-- External JS libraries -->
    <script src="logcss/assets/js/jquery-2.2.0.min.js"></script>
    <script src="logcss/assets/js/popper.min.js"></script>
    <script src="logcss/assets/js/bootstrap.min.js"></script>
    <!-- Custom JS Script -->
</body>

</html>