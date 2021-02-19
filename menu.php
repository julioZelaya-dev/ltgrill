<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
$id_location = $_GET['location'];
// validacion con filtros, si es INT?




if (!filter_var($id_location, FILTER_VALIDATE_INT)) {
    // Redirect browser 
    header("Location: menu.php?location=5");

    exit;
} ?>




<?php include_once 'includes/templates/header.php'; ?>

<!-- ======= Menu Section ======= -->
<section id="menu" class="menu animate__animated animate__fadeIn">

    <?php if ($id_location == 5) : ?>
        <div class="container mt-2 mb-3">

            <div class="text-center">
                <?php for ($i = 1; $i < 9; $i++) { ?>

                    <img src="assets/img/menu/<?php echo $i ?>.jpg" class="img-fluid rounded mb-3" alt="...">
                <?php } ?>

            </div>
        </div>

        <div class="row">
            <a href="#" class="gototop"><i class="fas fa-chevron-up"></i></a>
        </div>
    <?php endif ?>
    <?php if ($id_location < 5) : ?>
        <div class="container mt-2 mb-3">

            <?php

            try {
                require_once('includes/functions/bd_conn.php');
                $sql = "SELECT * FROM location WHERE id = $id_location";
                $resultado = $conn->query($sql);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            $location = $resultado->fetch_assoc(); ?>
            <div class="section-title">
                <h2 class="text-center"><?php echo $location['name'] ?> <span>Menu</span></h2>
            </div>
            <?php

            try {
                require_once('includes/functions/bd_conn.php');
                $sql = "SELECT DISTINCT
            plate_categories.id_cat,
            plate_categories.cat_name,
            menu.id_location
            FROM menu
            INNER JOIN plate
            ON menu.id_plate = plate.id_plate
            INNER JOIN cat_detail
            ON cat_detail.id_plate = plate.id_plate
            INNER JOIN plate_categories
            ON cat_detail.id_cat = plate_categories.id_cat
            WHERE menu.id_location = $id_location";

                $resultado = $conn->query($sql);
            } catch (Exception $e) {

                echo $e->getMessage();
            }

            ?>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="menu-flters">
                        <!-- <li data-filter="*" class="filter-active">Show All</li> -->
                        <?php
                        while ($menu_type = $resultado->fetch_assoc()) { ?>

                            <?php if (
                                (int) $menu_type['id_cat'] === 1 ||
                                (int) $menu_type['id_cat'] ===  59 ||
                                (int) $menu_type['id_cat'] === 60 ||
                                (int) $menu_type['id_cat'] === 61
                            ) :
                            ?>
                                <li data-filter=".filter-<?php echo 1;
                                                            ?>" class="filter-active"><?php echo $menu_type['cat_name'] ?></li>
                            <?php else : ?>
                                <li data-filter=".filter-<?php echo $menu_type['id_cat'] ?>"><?php echo $menu_type['cat_name'] ?></li>
                            <?php endif; ?>
                        <?php } ?>

                    </ul>
                </div>
            </div>

            <div class="row menu-container shadow">

                <?php
                require_once 'includes/functions/bd_conn.php';
                $sql = "SELECT DISTINCT
            plate.plate_name,
            plate.id_plate,
            plate.price,
            plate.ingredients,
            plate_categories.id_cat,
            menu.id_location
            FROM cat_detail
            INNER JOIN plate_categories
            ON cat_detail.id_cat = plate_categories.id_cat
            INNER JOIN plate
            ON cat_detail.id_plate = plate.id_plate
            INNER JOIN menu
            ON menu.id_plate = plate.id_plate
            WHERE menu.id_location = $id_location";
                $resultado = $conn->query($sql);
                ?>



                <?php while ($plate = $resultado->fetch_assoc()) {
                ?>

                    <?php
                    if (
                        (int) $plate['id_cat'] === 1 ||
                        (int) $plate['id_cat'] ===  59 ||
                        (int) $plate['id_cat'] === 60 ||
                        (int) $plate['id_cat'] === 61
                    ) : ?>
                        <div class="col-lg-6 menu-item filter-1">
                            <div class="menu-content">
                                <p class="m-0 text-primary"><?php echo $plate['plate_name'] ?></p><span class="m-0"><?php echo '$ ' . $plate['price'] ?></span>

                            </div>
                            <div class="menu-ingredients">
                                <?php echo $plate['ingredients'] ?>
                            </div>
                        </div>

                    <?php else : ?>


                        <div class="col-lg-6 menu-item filter-<?php echo $plate['id_cat'] ?>">
                            <div class="menu-content">
                                <p class="m-0 text-primary"><?php echo $plate['plate_name'] ?></p ><span class="m-0"><?php echo '$ ' . $plate['price'] ?></span>

                            </div>
                            <div class="menu-ingredients">
                                <?php echo $plate['ingredients'] ?>
                            </div>
                        </div>

                    <?php endif; ?>


                <?php } ?>

            </div>
            <div class="row mt-4">
                <div class="col-md-12"><a class="btn text-center complete-menu" href="menu.php?location=5">COMPLETE MENU</a></div>

            </div>

        </div>
    <?php endif ?>
</section>
<!-- End Menu Section -->


<?php include_once 'includes/templates/footer.php' ?>