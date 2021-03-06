<?php
session_start();
// se obtiene el parametro enviado desde admin-area barra cuando se da click en cerrar sesion 
if (isset($_GET['logout'])) {
    $cerrar_cesion = $_GET['logout'];
    if ($cerrar_cesion) {
        session_destroy();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <!-- animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />

    <link href="main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/user.css">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow closed-sidebar-mobile closed-sidebar">
        <div class="app-container closed-sidebar-mobile closed-sidebar">
            <div class="h-100 bg-sunny-morning  bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="app-logo-inverse mx-auto mb-3"></div>
                        <div class="card text-center modal-dialog mx-auto animate__animated animate__fadeInDownBig ">
                            <div class="card-header bg-dark text-white p-5">
                                <div class="w-50 mx-auto">
                                    <a href="../index.php">
                                        <img class="img-resposive " style="max-width: 100%; cursor:pointer; pointer-events: auto;" src="../assets/img/logo.png" alt="">

                                    </a>
                                </div>


                            </div>
                            <div class="card-body modal-content">
                                <div class="col-md-12 text-center">
                                    <div class="lds-ring">
                                        <div></div>
                                        <div></div>
                                        <div>
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                                <form id="login_admin" name="login_admin" class="form-submit" action="login-admin.php" method="POST">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-4 mt-4">
                                            <div class="position-relative form-group login-field">
                                                <input name="user" placeholder="User name" type="text" class="form-control font-weight-light">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="position-relative form-group login-field">
                                                <input name="password" placeholder="Password" type="password" class="form-control font-weight-light">
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" col-md-12 text-center">
                                        <input type="hidden" name="login-admin">
                                        <input class="btn bg-success text-white btn-lg pr-3 pl-3 badge-pill w-50 text-uppercase" type="submit" value="Login">

                                    </div>


                                </form>
                            </div>
                        </div>

                        <div class="text-center text-white opacity-8 mt-3 animate__animated animate__fadeInUpBig">
                            <h2>Los tios grill 2020</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- notifications -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script src="./js/login.js"></script>
    <script src=""></script>
</body>

</html>