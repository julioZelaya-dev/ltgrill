<?php
$id_location = $_GET['location'];
// validacion con filtros, si es INT?

if (!filter_var($id_location, FILTER_VALIDATE_INT)) { ?>

    <div class="container">
        <h4 class="text-center mt-5 text-uppercase">
            <?php echo "There was an error"; ?>

        </h4>
    </div>
<?php
    // Redirect browser 
    header("Location: location/");

    exit;
} ?>


<?php include_once 'includes/templates/header.php'; ?>





<!-- ======= Menu Section ======= -->
<section id="menu" class="menu animate__animated animate__fadeIn">
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
                    <?php while ($menu_type = $resultado->fetch_assoc()) { ?>

                        <?php if ((int) $menu_type['id_cat'] == 1) : ?>
                            <li data-filter=".filter-<?php echo $menu_type['id_cat'] ?>" class="filter-active"><?php echo $menu_type['cat_name'] ?></li>
                        <?php else : ?>
                            <li data-filter=".filter-<?php echo $menu_type['id_cat'] ?>"><?php echo $menu_type['cat_name'] ?></li>
                        <?php endif; ?>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="row menu-container">

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



            <?php while ($plate = $resultado->fetch_assoc()) { ?>

                <div class="col-lg-6 menu-item filter-<?php echo $plate['id_cat'] ?>">
                    <div class="menu-content">
                        <p><?php echo $plate['plate_name'] ?></p><span><?php echo '$ ' . $plate['price'] ?></span>

                    </div>
                    <div class="menu-ingredients">
                        <?php echo $plate['ingredients'] ?>
                    </div>
                </div>

            <?php } ?>

        </div>

    </div>
</section>
<!-- End Menu Section -->


<?php include_once 'includes/templates/footer.php' ?>