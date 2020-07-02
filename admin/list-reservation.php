<?php
include_once '../includes/functions/bd_conn.php';
include_once './includes/templates/header.php'; ?>
<!-- side-bar -->
<?php include_once './includes/templates/siderbar.php'; ?>
<!-- end-side-bar -->
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">

                        <i class="pe-7s-notebook icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Reservations
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <h5 class="card-title"></h5>
                        <div class="col-md-12 text-center">
                            <div class="lds-ring">
                                <div></div>
                                <div></div>
                                <div>
                                </div>
                                <div></div>
                            </div>
                        </div>
                        <div class="card-body  ">


                            <table id="list_table" style=" display: none; " class="item-table  align-middle mb-0 table table-borderless table-striped table-hover">
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

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once './includes/templates/footer.php' ?>