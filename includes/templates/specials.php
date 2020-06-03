<?php

try {

    $id_location = 1;
    require_once('includes/functions/bd_conn.php');
    $sql = "SELECT DISTINCT
    plate.plate_name,
    plate.price,
    plate.ingredients,
    plate.img,
    plate_categories.id_cat,
    location.name,
    menu.id_location
    FROM menu
    INNER JOIN plate
    ON menu.id_plate = plate.id_plate
    INNER JOIN cat_detail
    ON cat_detail.id_plate = plate.id_plate
    INNER JOIN plate_categories
    ON cat_detail.id_cat = plate_categories.id_cat
    INNER JOIN location
    ON menu.id_location = location.id
    WHERE menu.id_location = $id_location
    AND plate_categories.id_cat = 1 ";

    $resultado = $conn->query($sql);
} catch (Exception $e) {

    echo $e->getMessage();
}

?>


<section class="specials container animate__animated animate__fadeIn">

    <h2> Today specials</h2>
    <div class="card-columns ">
        <?php while ($plate = $resultado->fetch_assoc()) {
            $plate_name = $plate['plate_name'];
            $price = $plate['price'];
            $ingredients = $plate['ingredients'];
            $img = $plate['img'];

        ?>



            <div class="card ">
                <img class="card-img-top" src="assets/img/plates/<?php echo $img ?>" alt="image plate">
                <div class="card-body">
                    <h5 class="card-title plate-name"><?php echo $plate_name ?> </h5>
                    <p class="price"> $ <?php echo $price ?></p>
                    <p class="card-text plate-ingredients"><?php echo $ingredients ?></p>
                </div>
            </div>

        <?php } ?>

    </div>
</section>