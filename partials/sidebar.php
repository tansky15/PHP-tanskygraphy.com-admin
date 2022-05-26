<?php
$current = "active";

?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link  <?php if ($current_page == "dashboard") {
                                                echo $current;
                                            } ?>" href="../../pages/dashboard/">
                            <span data-feather="home"></span>
                            Dashboard

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($current_page == "post-image") {
                                                echo $current;
                                            } ?>" href="../../pages/post-image/">
                            <span data-feather="plus-circle"></span>
                            Poster une image

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($current_page == "create-album") {
                                                echo $current;
                                            } ?>" href="../../pages/create-album/">
                            <span data-feather="file"></span>
                            Gestion des catalogue

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($current_page == "publications") {
                                                echo $current;
                                            } ?>" href="../../pages/publications/">
                            <span data-feather="image"></span>
                            Publications

                        </a>
                    </li>

                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="../../../portfolio/">
                            <span data-feather="eye"></span>
                            Voir le site
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Year-end sale
                        </a>
                    </li> -->
                </ul>
            </div>
        </nav>