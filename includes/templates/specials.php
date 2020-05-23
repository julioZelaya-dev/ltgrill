<?php

try {
    require_once('includes/functions/bd_conn.php');
    $sql = "SELECT id_menu, plate_name, price, ingredients, img, cat_name FROM menu
    INNER JOIN plate
    on menu.id_plate = plate.id_plate
    INNER JOIN cat_plate
    ON plate.id_cat= cat_plate.id_cat ";
    $resultado = $conn->query($sql);
} catch (Exception $e) {
    //throw $th;
    echo $e->getMessage();
}

?>


<section class="specials container animate__animated animate__fadeIn">

    <h2>Today specials</h2>
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