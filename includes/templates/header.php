<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- bootstrap CSS only -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- nav bar  -->
    <link rel="stylesheet" href="css/nav-bar.css?v=7">

    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/main.css?v=2">
    <link rel="stylesheet" href="css/normalize.css">
    <!-- fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400;1,700&display=swap" rel="stylesheet">

    <!-- bootstrap animate -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/306c815030.js" crossorigin="anonymous"></script>
    <!-- venobox is for gallery -->
    <link rel="stylesheet" href="css/venobox.min.css">
    <!-- carousel -->
    <link href="js/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- daterange  -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- select2 -->
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/select2-bootstrap4.min.css">
    <!-- time picker -->
    <link rel="stylesheet" href="css/tempusdominus-bootstrap-4.min.css">

    <meta name="theme-color" content="#fafafa">
</head>

<body>







    <!-- end-navbar  -->
    <!-- site header  -->
    <header class="site-header">
        <!-- nav bar -->
        <?php include_once 'includes/templates/nav-bar.php' ?>


        <!-- ======= Hero Section ======= -->
        <section id="hero">
            <div class="hero-container">
                <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

                    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                    <div class="carousel-inner" role="listbox">

                        <!-- Slide 1 -->
                        <div class="carousel-item active" style="background-image: url(assets/img/slide/1.jpg);">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
                                    <p class="animated fadeInUp">Your favorite dishes are available with your carry out</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="carousel-item" style="background-image: url(assets/img/slide/3.jpg);">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <p class="animated fadeInUp">Check our <a role="button" class="text-white text-decoration-none " href="menu.php?location=1">menu</a></p>

                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="carousel-item" style="background-image: url(assets/img/slide/5.jpg);">
                            <!-- <div class="carousel-background"><img src="assets/img/slide/5.jpg" alt=""></div> -->
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <p class="animated fadeInUp">Enjoy Los tios grill's food</p>

                                </div>
                            </div>
                        </div>

                    </div>

                    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon fas fa-angle-left" aria-hidden="true"></span>

                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon fas fa-angle-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </section>
        <!-- End Hero -->


    </header>
    <!-- site header  -->