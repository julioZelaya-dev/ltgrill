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
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/normalize.css">
    <!-- fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Roboto&display=swap" rel="stylesheet">

    <!-- bootstrap CSS only -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />






    <meta name="theme-color" content="#fafafa">
</head>

<body>

    <!-- nav bar -->

    <?php

    try {
        require_once('includes/functions/bd_conn.php');
        $sql = "SELECT * FROM location";
        $resultado = $conn->query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    } ?>



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logo.png" width="100" height="70" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            MENUS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <?php while ($location = $resultado->fetch_assoc()) { ?>

                                <a class="dropdown-item" href="menu.php?location=<?php echo $location['id']; ?>"> <?php echo $location['name']; ?> </a>
                            <?php } ?>

                            <!-- <a class="dropdown-item" href="menu.php?location=2">CRYSTAL CITY</a>
                            <a class="dropdown-item" href="menu.php?location=3">VAN DORN</a>
                            <a class="dropdown-item" href="menu.php?location=4">LEESBURG</a>-->
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="daily-specials.php">Daily Specials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="locations.php">Locations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservations.php">Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gift-cards.php">Gift cards</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="offers.php">Get offers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">about</a>
                    </li>

                    <li class="nav-item  dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Order online</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="https://www.clover.com/online-ordering/los-tios-grill-restauran-alexandria">Del Ray</a>
                            <a class="dropdown-item" href="https://www.clover.com/online-ordering/los-tios-grill-arlington">CRYSTAL CITY</a>
                            <a class="dropdown-item" href="https://www.clover.com/online-ordering/los-tios-grill-van-dorn-alexandria">VAN DORN</a>
                        </div>
                    </li>

                </ul>


            </div>
        </div>
    </nav>
    <!-- end-navbar  -->


    <!-- site header  -->
    <header class="site-header">



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
                                    <p class="animated fadeInUp">Are you ready to make that call?</p>

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
                        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </section>
        <!-- End Hero -->


    </header>
    <!-- site header  --