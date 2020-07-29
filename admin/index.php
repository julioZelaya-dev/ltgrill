<?php include_once './includes/templates/header.php'; ?>
<!-- side-bar -->
<?php include_once './includes/templates/siderbar.php';
$location = $_SESSION['location'];
?>
<!-- end-side-bar -->
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-config icon-gradient bg-mean-fruit">
                        </i>
                    </div>

                    <div>Analytics Dashboard
                        <div class="page-title-subheading"><?php date_default_timezone_set($_SESSION['time_zone']);
                                                            $timezone = date_default_timezone_get();
                                                            echo "The current server timezone is: " . $timezone;

                                                            ?>
                            <br>
                            <?php

                            $current_date = date('Y-m-d');
                            echo $current_date; ?></div>
                    </div>
                </div>

                <!-- <div class="page-title-actions">
                    <Span class="btn btn-dark">Location</Span>
                    <?php
                    try {
                        require_once('../includes/functions/bd_conn.php');
                        $sql = "SELECT * FROM location";
                        $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    ?>

                    <div class="d-inline-flex">

                        <div class="input-group">

                            <select class="form-control select2" name="location" id="location">

                                <?php while ($custom_location = $resultado->fetch_assoc()) {

                                    if ($custom_location['id'] === $location) { ?>
                                        <option selected="selected" value=" <?php echo $custom_location['id']; ?>"><?php echo $location['name']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $custom_location['id']; ?>"><?php echo $custom_location['name']; ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>

                    </div>
                </div> -->

            </div>
        </div>
        <div class="row"> <?php

                            include_once '../includes/functions/bd_conn.php';
                            $r = "SELECT COUNT(guests) AS total
                            FROM reservation
                            WHERE reservation.id_location = $location
                            AND reservation.reservation_date = '$current_date'";

                            $r = $conn->query($r);
                            $r = $r->fetch_assoc();

                            ?>

            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Reservations for today</div>
                            <div class="widget-subheading"></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $r['total'] ?></span></div>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            include_once '../includes/functions/bd_conn.php';
            $specials = "SELECT DISTINCT 
            COUNT(menu.id_plate) AS total
            FROM menu
              INNER JOIN plate
                ON menu.id_plate = plate.id_plate
              INNER JOIN cat_detail
                ON cat_detail.id_plate = plate.id_plate
                INNER JOIN plate_categories
                ON  plate_categories.id_cat = cat_detail.id_cat
                WHERE menu.id_location = $location AND
                plate_categories.cat_name = 'Daily Specials'
            ";

            $specials = $conn->query($specials);
            $specials = $specials->fetch_assoc();

            ?>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Today Specials</div>
                            <div class="widget-subheading">
                                On the menu.
                            </div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $specials['total'] ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include_once '../includes/functions/bd_conn.php';
            $specials = "SELECT DISTINCT
            COUNT(plate.id_plate) AS total
          FROM cat_detail
            INNER JOIN plate
              ON cat_detail.id_plate = plate.id_plate
            INNER JOIN plate_categories
              ON cat_detail.id_cat = plate_categories.id_cat
          WHERE plate_categories.cat_name = 'Daily Specials'
          AND plate.id_location = $location
          GROUP BY plate.id_location,
                   plate_categories.cat_name";

            $specials = $conn->query($specials);
            $specials = $specials->fetch_assoc();

            ?>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-amy-crisp">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Today Specials</div>
                            <div class="widget-subheading">
                                Registered.
                            </div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $specials['total'] ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php


            include_once '../includes/functions/bd_conn.php';
            $rm = "SELECT COUNT(guests) AS total
                            FROM reservation
                            WHERE reservation.id_location = $location
                            AND MONTH(reservation.reservation_date) = MONTH(CURRENT_DATE)";

            $rm = $conn->query($rm);
            $rm = $rm->fetch_assoc();

            ?>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Reservations for this month</div>
                            <div class="widget-subheading"></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $rm['total'] ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-header">Reservations for today
                        <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <a class="btn btn-focus" href="list-reservation.php">Go to reservations</a>

                                <a class="btn btn-focus" href="create-reservation.php">Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-4">
                        <table id="list_table" class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Contact Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Phone</th>
                                    <th>Guests</th>
                                    <th>Special Instructions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    $reservation_list = "SELECT *
                                    FROM reservation
                                    WHERE reservation.id_location = $location
                                    AND reservation.reservation_date = '$current_date'
                                    ORDER BY reservation.reservation_time";
                                    $reservation_list = $conn->query($reservation_list);
                                } catch (Exception $e) {
                                    //throw $th;
                                    $error = $e->getMessage();
                                    echo $error;
                                } ?>




                                <?php while ($res = $reservation_list->fetch_assoc()) {

                                ?>

                                    <tr id="tr-delete-<?php echo $res['id'] ?>">
                                        <td class="">
                                            <a href="#" data-id="<?php echo $res['id'] ?>" data-type="reservation" class="badge badge-pill badge-danger options delete p-2 mb-1 d-block">
                                                Delete &nbsp; <i class="fa fa-trash"></i>
                                            </a>
                                            <a href="edit-reservation.php?id=<?php echo $res['id']; ?>" class="badge badge-pill badge-success options p-2 mb-1 d-block">
                                                Update &nbsp; <i class="far fa-edit"></i>
                                            </a>

                                        </td>
                                        <td><b><?php echo $res['contact_name'] ?></b></td>
                                        <td>

                                            <span class="btn btn-secondary">

                                                <?php echo $res['reservation_date'];

                                                date_default_timezone_set($_SESSION['time_zone']);
                                                $current_date = date('Y-m-d'); ?>


                                                <span class="badge <?php echo ($res['reservation_date'] >= (string) $current_date) ? 'badge-success' : 'badge-danger'; ?>">
                                                    <?php echo ($res['reservation_date'] >= (string) $current_date) ? 'Active' : 'Expired'; ?>
                                                </span>
                                            </span>
                                        </td>
                                        <td><?php echo $res['reservation_time']; ?></td>
                                        <td><?php echo $res['phone']; ?></td>
                                        <td><?php echo $res['guests'] ?></td>
                                        <td><?php echo $res['special_instructions'] ?></td>
                                    </tr>
                                <?php  }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Action</th>
                                    <th>Contact Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Phone</th>
                                    <th>Guests</th>
                                    <th>Special Instructions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="d-block text-center card-footer">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-header">Specials for today on the menu

                        <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <a class="btn btn-focus" href="list-plates.php">Go to plates</a>
                                <a class="btn btn-focus" href="create-plate.php">Create Plate</a>
                                <a class="btn btn-focus" href="list-menu.php">Go to menu</a>
                                <a class="btn btn-focus" href="create-menu.php">Add to menu</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-4">
                        <table style=" display: none; " class="list_table item-table  align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Ingredients</th>
                                    <th>Image</th>
                                    <th>Categories</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    $location = $_SESSION['location'];
                                    $sql = "SELECT *
                                    FROM menu
                                      INNER JOIN plate
                                        ON menu.id_plate = plate.id_plate
                                      INNER JOIN cat_detail
                                        ON cat_detail.id_plate = plate.id_plate
                                        INNER JOIN plate_categories
                                        ON  plate_categories.id_cat = cat_detail.id_cat
                                        WHERE menu.id_location = $location AND
                                        plate_categories.cat_name = 'Daily Specials'
                                         ORDER BY plate_name ASC ";
                                    $resultado = $conn->query($sql);
                                } catch (Exception $e) {
                                    //throw $th;
                                    $error = $e->getMessage();
                                    echo $error;
                                } ?>


                                <?php while ($plate = $resultado->fetch_assoc()) {

                                ?>

                                    <tr id="tr-delete-<?php echo $plate['id_plate'] ?>">
                                        <td class="">
                                            <a href="#" data-id="<?php echo $plate['id_plate'] ?>" data-type="menu" data-img="<?php echo $plate['img'] ?>" class="badge badge-pill badge-danger options delete p-2 mb-1 d-block">
                                                Delete from menu &nbsp; <i class="fa fa-trash"></i>
                                            </a>
                                            <a href="edit-plate.php?id=<?php echo $plate['id_plate']; ?>" class="badge badge-pill badge-success options p-2 mb-1 d-block">
                                                Update &nbsp; <i class="far fa-edit"></i>
                                            </a>

                                        </td>
                                        <td><b><?php echo $plate['plate_name'] ?></b></td>
                                        <td><?php echo $plate['price']; ?></td>
                                        <td><?php echo $plate['ingredients']; ?></td>
                                        <?php if ($plate['img'] == '' || $plate['img'] == null) { ?>
                                            <td><img class="rounded" src="../assets/img/plates/plate.png" alt="Img for <?php echo $plate['plate_name']; ?>" width="150px"></td>
                                        <?php } else { ?>
                                            <td><img class="rounded" src="../assets/img/plates/<?php echo $plate['img']; ?>" alt="Img for <?php echo $plate['plate_name']; ?>" width="150px"></td>

                                        <?php }
                                        try {
                                            $id = $plate['id_plate'];
                                            $sql = "SELECT DISTINCT
                                                plate.id_plate,
                                                GROUP_CONCAT(DISTINCT plate_categories.cat_name) AS categories
                                                FROM cat_detail
                                                INNER JOIN plate
                                                ON cat_detail.id_plate = plate.id_plate
                                                INNER JOIN plate_categories
                                                ON cat_detail.id_cat = plate_categories.id_cat
                                            WHERE plate.id_plate =  $id";
                                            $result = $conn->query($sql);
                                            $followingdata = $result->fetch_assoc();
                                        } catch (Exception $e) {
                                            //throw $th;
                                            $error = $e->getMessage();
                                            echo $error;
                                        } ?>
                                        <td><b><?php echo $followingdata['categories'] ?></b></td>
                                    </tr>
                                <?php  }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Ingredients</th>
                                    <th>Image</th>
                                    <th>Categories</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="d-block text-center card-footer">
                    </div>
                </div>
            </div>
        </div>



    </div>
    <?php include_once './includes/templates/footer.php' ?>