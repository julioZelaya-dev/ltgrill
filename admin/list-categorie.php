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

                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Categories
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
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

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try {
                                        $location = $_SESSION['location'];
                                        $sql = "SELECT * FROM plate_categories WHERE id_location = $location ORDER BY cat_name ASC";
                                        $result = $conn->query($sql);
                                    } catch (Exception $e) {
                                        //throw $th;
                                        $error = $e->getMessage();
                                        echo $error;
                                    } ?>


                                    <?php while ($categorie = $result->fetch_assoc()) { ?>



                                        <tr id="tr-delete-<?php echo $categorie['id_cat'] ?>">
                                            <td class="">
                                                <?php if ($categorie['cat_name'] != 'Daily Specials') : ?>

                                                    <a href="#" data-id="<?php echo $categorie['id_cat'] ?>" data-type="categorie" class="badge badge-pill badge-danger options delete p-2 mb-1">
                                                        Delete &nbsp; <i class="fa fa-trash"></i>
                                                    </a>
                                                    <a href="edit-categorie.php?id=<?php echo $categorie['id_cat']; ?>" class="badge badge-pill badge-success options p-2 mb-1">
                                                        Update &nbsp; <i class="far fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                            </td>
                                            <td><b><?php echo $categorie['cat_name'] ?></b></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Action</th>
                                        <th>Name</th>

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