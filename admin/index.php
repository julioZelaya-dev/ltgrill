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
                        <div class="page-title-subheading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis voluptatibus quaerat
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row"> <?php
                            include_once '../includes/functions/bd_conn.php';
                            $r = "SELECT COUNT(guests) AS total
                            FROM reservation
                            WHERE reservation.id_location = $location
                            AND reservation.reservation_date = CURRENT_DATE";

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
            $specials = "SELECT COUNT(cat_detail.id_plate) AS total FROM cat_detail
            INNER JOIN plate
              ON cat_detail.id_plate = plate.id_plate
            INNER JOIN menu
              ON menu.id_plate = plate.id_plate
          WHERE cat_detail.id_cat = '1'
          AND menu.id_location = $location
          ";

            $specials = $conn->query($specials);
            $specials = $specials->fetch_assoc();

            ?>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Today Specials</div>
                            <div class="widget-subheading"></div>
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
                                    AND reservation.reservation_date = CURRENT_DATE
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
                                        <td><?php echo $res['reservation_date']; ?></td>
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
                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                        <button class="btn-wide btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <?php include_once './includes/templates/footer.php' ?>