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