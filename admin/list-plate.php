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

                        <i class="fas fa-utensils icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Plates
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
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Categories</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try {
                                        $location = $_SESSION['location'];
                                        $sql = "SELECT * FROM plate WHERE id_location = $location ORDER BY plate_name ASC ";
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
                                                <a href="#" data-id="<?php echo $plate['id_plate'] ?>" data-type="plate" data-img="<?php echo $plate['img'] ?>" class="badge badge-pill badge-danger options delete p-2 mb-1 d-block">
                                                    Delete &nbsp; <i class="fa fa-trash"></i>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once './includes/templates/footer.php' ?>