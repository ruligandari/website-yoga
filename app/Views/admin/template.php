<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets') ?>/images/favicon.png">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?= base_url('assets') ?>/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <?= $this->renderSection('style'); ?>
    <link href="<?= base_url('assets') ?>/css/style.css" rel="stylesheet">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <h4 class="text-white">Web Guru</h4>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <!-- <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div> -->
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="<?= base_url('assets') ?>/app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="<?= base_url('assets') ?>/email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="<?= base_url('assets') ?>/page-login.html" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li>
                        <a href="<?= base_url('admin/data-soal') ?>" aria-expanded="false">
                            <i class="fa fa-clipboard"></i>
                            <span class="nav-text">Data Soal</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/data-siswa') ?>" aria-expanded="false">
                            <i class="fa fa-user-o"></i>
                            <span class="nav-text">Data Pre test</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/data-post-test') ?>" aria-expanded="false">
                            <i class="fa fa-user-o"></i>
                            <span class="nav-text">Data Post Test</span>
                        </a>
                    </li>
                    <li class="nav-label first">logout</li>
                    <li>
                        <a href="<?= base_url('logout') ?>" aria-expanded="false">
                            <i class="fa fa-sign-out"></i>
                            <span class="nav-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <?= $this->renderSection('content'); ?>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Yoga Febriana 2025</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('assets') ?>/vendor/global/global.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/quixnav-init.js"></script>
    <script src="<?= base_url('assets') ?>/js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="<?= base_url('assets') ?>/vendor/raphael/raphael.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/morris/morris.min.js"></script>


    <script src="<?= base_url('assets') ?>/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="<?= base_url('assets') ?>/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="<?= base_url('assets') ?>/vendor/flot/jquery.flot.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="<?= base_url('assets') ?>/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="<?= base_url('assets') ?>/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="<?= base_url('assets') ?>/js/dashboard/dashboard-1.js"></script>

    <?= $this->renderSection('script'); ?>
</body>

</html>