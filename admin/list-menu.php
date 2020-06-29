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

                        <i class="pe-7s-note2 icon-gradient bg-mean-fruit"></i>
                    </div>
                    <?php $location = $_SESSION['location'];
                    include_once '../includes/functions/bd_conn.php';
                    $s = "SELECT * FROM location WHERE id = $location";
                    $res = $conn->query($s);
                    $loc = $res->fetch_assoc();
                    ?>
                    <div><b><?php echo $loc['name'] . ' ' . 'Menu' ?></b>
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

                        <div class="card-body ">
                            <table id="list_table" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Image</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $location = $_SESSION['location'];

                                    try {
                                        $sql = "SELECT
                                        plate.plate_name,
                                        plate.img,
                                        plate.price,
                                        menu.id_menu,
                                        plate.id_plate

                                      FROM menu
                                        INNER JOIN plate
                                          ON menu.id_plate = plate.id_plate
                                      WHERE menu.id_location = $location";
                                        $resultado = $conn->query($sql);
                                    } catch (Exception $e) {
                                        //throw $th;
                                        $error = $e->getMessage();
                                        echo $error;
                                    } ?>


                                    <?php while ($plate = $resultado->fetch_assoc()) {

                                    ?>

                                        <tr>
                                            <td class="">
                                                <a href="#" data-id="<?php echo $plate['id_plate'] ?>" data-type="menu" class="badge badge-pill badge-danger options delete p-2 mb-1 d-block">
                                                    Delete &nbsp; <i class="fa fa-trash"></i>
                                                </a>


                                            </td>
                                            <td><b><?php echo $plate['plate_name'] ?></b></td>
                                            <td><?php echo $plate['price'] ?></td>
                                            <?php if ($plate['img'] == '' || $plate['img'] == null) { ?>
                                                <td><img class="rounded" src="../assets/img/plates/plate.png" alt="Img for <?php echo $plate['plate_name']; ?>" width="150px"></td>
                                            <?php } else { ?>
                                                <td><img class="rounded" src="../assets/img/plates/<?php echo $plate['img']; ?>" alt="Img for <?php echo $plate['plate_name']; ?>" width="150px"></td>

                                            <?php } ?>

                                        </tr>
                                    <?php  }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Image</th>

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