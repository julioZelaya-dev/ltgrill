<?php include_once 'includes/templates/header.php';
$id_location = $_GET['location'];
// validacion con filtros, si es INT?
if (!filter_var($id_location, FILTER_VALIDATE_INT)) {
    die("error");
}
?>

<!-- ======= Menu Section ======= -->
<section id="menu" class="menu">
    <div class="container">

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
            $sql = "SELECT DISTINCT menu_type.id_menu_type, menu_type.name_menu_type FROM menu 
            INNER JOIN plate
            ON menu.id_plate =plate.id_plate
            INNER JOIN menu_type
            ON plate.id_menu_type = menu_type.id_menu_type
            WHERE id_location = $id_location";
            $resultado = $conn->query($sql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        ?>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="menu-flters">
                    <li data-filter="*" class="filter-active">Show All</li>
                    <?php while ($menu_type = $resultado->fetch_assoc()) { ?>
                        <li data-filter=".filter-<?php echo $menu_type['id_menu_type'] ?>"><?php echo $menu_type['name_menu_type'] ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="row menu-container">

            <?php
            require_once 'includes/functions/bd_conn.php';
            $sql = "SELECT plate.id_plate, plate.plate_name, plate.price, plate.ingredients, menu_type.id_menu_type FROM menu
            INNER JOIN plate
            ON menu.id_plate = plate.id_plate
            INNER JOIN menu_type
            ON plate.id_menu_type = menu_type.id_menu_type
            WHERE menu.id_location = $id_location";
            $resultado = $conn->query($sql);
            ?>



            <?php while ($plate = $resultado->fetch_assoc()) { ?>

                <div class="col-lg-6 menu-item filter-<?php echo $plate['id_menu_type'] ?>">
                    <div class="menu-content">
                        <a href="#"><?php echo $plate['plate_name'] ?></a><span><?php echo $plate['price'] ?></span>

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