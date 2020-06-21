<?php
include_once '../includes/functions/bd_conn.php';
include_once './includes/header.php'; ?>
<!-- side-bar -->
<?php include_once './includes/siderbar.php'; ?>
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
                        <div class="page-title-subheading">Fill the fields and create a new dish.
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
                                        <th>Options</th>
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
                                        $sql = "SELECT * FROM plate ORDER BY plate_name ASC";
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
                                                <a href="#" data-id="<?php echo $plate['id_plate'] ?>" data-type="plate" data-img="<?php echo $plate['img'] ?>" class="d-block options btn pr-4 pl-4 mb-2 text-dark bg-warning delete">
                                                    Delete &nbsp; <i class="fa fa-trash"></i>
                                                </a>
                                                <a href="edit-plate.php?id=<?php echo $plate['id_plate']; ?>" class="btn pr-4 pl-4 mb-2 text-dark bg-plum-plate d-block  options">
                                                    Update &nbsp; <i class="far fa-edit"></i>
                                                </a>

                                            </td>
                                            <td><b><?php echo $plate['plate_name'] ?></b></td>
                                            <td><?php echo $plate['price']; ?></td>
                                            <td><?php echo $plate['ingredients']; ?></td>
                                            <?php if ($plate['img'] === '') { ?>
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
                                        <th>Options</th>
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
    <?php include_once './includes/footer.php' ?>