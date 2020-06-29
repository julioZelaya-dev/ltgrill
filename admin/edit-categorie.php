<?php
$id = $_GET['id'];
if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("error");
}
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

                        <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Categories
                        <div class="page-title-subheading">Fill the fields and create a categorie.
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
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

                        <?php
                        require_once('../includes/functions/bd_conn.php');
                        $sql = "SELECT * FROM plate_categories WHERE id_cat = $id";
                        $result = $conn->query($sql);
                        $categorie = $result->fetch_assoc();

                        ?>
                        <form action="./includes/models/categorie.php" method="post" id="categorie" class="form-submit animate__animated animate__fadeIn" style="display: none;">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label class="label-c" for="name" class="">Categorie name:</label>
                                        <input name="name" id="name" placeholder="Name" type="text" value="<?php echo $categorie['cat_name'] ?>" class="form-control"></div>
                                </div>


                            </div>




                            <div class="col-md-12 text-center mt-4">
                                <input type="hidden" name="action" id="action" value="update">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <input id="submit-btn" class="submit" type="submit" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once './includes/templates/footer.php' ?>