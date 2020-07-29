<section class="specials container animate__animated animate__fadeIn">

    <h2> Daily <span>specials</span></h2>


    <ul class="nav nav-pills mb-5 " id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="del-ray-tab" data-toggle="pill" href="#del-ray" role="tab" aria-controls="del-ray" aria-selected="true">Del Ray</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="crystal-tab" data-toggle="pill" href="#crystal" role="tab" aria-controls="crystal" aria-selected="false">Crystal City</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="van-dorn-tab" data-toggle="pill" href="#van-dorn" role="tab" aria-controls="van-dorn" aria-selected="false">Van Dorn</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="lessburg-tab" data-toggle="pill" href="#lessburg" role="tab" aria-controls="lessburg" aria-selected="false">Leesburg</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="del-ray" role="tabpanel" aria-labelledby="del-ray-tab">
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
        </div>
        <div class="tab-pane fade" id="crystal" role="tabpanel" aria-labelledby="crystal-tab">
            <?php

            try {

                $id_location = 2;
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
                AND plate_categories.id_cat = 59 ";

                $resultado = $conn->query($sql);
            } catch (Exception $e) {

                echo $e->getMessage();
            }

            ?>

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
        </div>
        <div class="tab-pane fade" id="van-dorn" role="tabpanel" aria-labelledby="van-dorn-tab">
            <?php

            try {

                $id_location = 3;
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
                AND plate_categories.id_cat = 60 ";

                $resultado = $conn->query($sql);
            } catch (Exception $e) {

                echo $e->getMessage();
            }

            ?>

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
        </div>
        <div class="tab-pane fade" id="lessburg" role="tabpanel" aria-labelledby="lessburg-tab">
            <?php

            try {

                $id_location = 4;
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
                AND plate_categories.id_cat = 61 ";

                $resultado = $conn->query($sql);
            } catch (Exception $e) {

                echo $e->getMessage();
            }

            ?>

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
        </div>
    </div>


</section>