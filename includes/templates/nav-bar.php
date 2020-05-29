<?php

try {
    require_once('includes/functions/bd_conn.php');
    $sql = "SELECT * FROM location";
    $resultado = $conn->query($sql);
} catch (Exception $e) {
    echo $e->getMessage();
}


?>



<nav class="nav-menu sticky-top">
    <button class="mobile-button">
        <span class="line1"></span>
        <span class="line2"></span>
        <span class="line3"></span>
    </button>

    <ol>
        <li class="menu-item-nav">
            <a href="#">Menus
                <svg version="1.1" class="plus-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 18 18">
                    <line fill="none" stroke-width="4" stroke-linecap="round" stroke-miterlimit="10" x1="10" y1="9" x2="17" y2="9" />
                    <line fill="none" stroke-width="4" stroke-linecap="round" stroke-miterlimit="10" x1="9" y1="9" x2="9" y2="1" />
                    <g id="lineGroup_1">
                        <line fill="none" stroke-width="4" stroke-linecap="round" stroke-miterlimit="10" x1="1" y1="9" x2="8" y2="9" />
                        <line fill="none" stroke-width="4" stroke-linecap="round" stroke-miterlimit="10" x1="9" y1="17" x2="9" y2="9" />
                    </g>
                </svg>
            </a>
            <ol class="sub-menu">
                <?php while ($location = $resultado->fetch_assoc()) { ?>
                    <li class="sub-menu-item"><a href="menu.php?location=<?php echo $location['id']; ?>"><?php echo $location['name']; ?></a></li>
                <?php } ?>
            </ol>
        </li>

        <li class="menu-item-nav">
            <a href="daily-specials.php">Daily Specials</a>
        </li>
        <li class="menu-item-nav">
            <a href="locations.php">Locations</a>
        </li>
        <li class="menu-item-nav">
            <a href="reservations.php">Reservations</a>
        </li>
        <li class="menu-item-nav">
            <a href="gift-cards.php">Gift cards</a>
        </li>

        <li class="menu-item-nav">
            <a href="offers.php">Get offers</a>
        </li>

        <li class="menu-item-nav">
            <a href="about.php">about</a>
        </li>

        <li class="menu-item-nav ">
            <a class="bg-c-orange" href="#">Order Online
                <svg version="1.1" class="plus-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 18 18">
                    <line fill="none" stroke-width="4" stroke-linecap="round" stroke-miterlimit="10" x1="10" y1="9" x2="17" y2="9" />
                    <line fill="none" stroke-width="4" stroke-linecap="round" stroke-miterlimit="10" x1="9" y1="9" x2="9" y2="1" />
                    <g id="lineGroup_2">
                        <line fill="none" stroke-width="4" stroke-linecap="round" stroke-miterlimit="10" x1="1" y1="9" x2="8" y2="9" />
                        <line fill="none" stroke-width="4" stroke-linecap="round" stroke-miterlimit="10" x1="9" y1="17" x2="9" y2="9" />
                    </g>
                </svg>
            </a>
            <ol class="sub-menu ">
                <li class="sub-menu-item "> <a href="https://www.clover.com/online-ordering/los-tios-grill-restauran-alexandria ">Del Ray</a></li>
                <li class="sub-menu-item "> <a href="https://www.clover.com/online-ordering/los-tios-grill-arlington ">CRYSTAL CITY</a></li>
                <li class="sub-menu-item "> <a href="https://www.clover.com/online-ordering/los-tios-grill-van-dorn-alexandria ">VAN DORN</a></li>
            </ol>
        </li>
</nav>