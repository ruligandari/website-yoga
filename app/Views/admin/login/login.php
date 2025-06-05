<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets') ?>/images/favicon.png">
    <link href="<?= base_url('assets') ?>/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="h-100">
    <?php if (session()->getFlashData('error')) : ?>
        <script>
            Swal.fire({
                title: "Error",
                text: "<?= session()->getFlashData('error') ?>",
                icon: "error"
            });
        </script>
    <?php endif ?>
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row ">

                            <!-- image logo -->
                            <div class="col-12 d-flex justify-content-between align-items-center pl-5 pr-5 mt-4">
                                <img src="<?= base_url('assets') ?>/images/logo-fkom.png" alt="Logo" class="img-fluid" style="width: 100px; height: auto;">
                                <img src="<?= base_url('assets') ?>/images/logo-sd.png" alt="Logo" class="img-fluid" style="width: 150px; height: auto;">
                            </div>


                        </div>
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Silahkan Login untuk Melanjutkan!</h4>
                                    <form action="<?= base_url('login') ?>" method="post">
                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('assets') ?>/vendor/global/global.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/quixnav-init.js"></script>
    <script src="<?= base_url('assets') ?>/js/custom.min.js"></script>
    <!-- sweetalert -->



</body>

</html>