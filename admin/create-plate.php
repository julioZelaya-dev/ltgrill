<?php

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
                        <div class="page-title-subheading">Fill the fields and create a new dish.
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
                        <form action="includes/models/plate.php" method="post" id="plate" class="form-submit animate__animated animate__fadeIn" style="display: none;">
                            <div class=" form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label class="label-c" for="plate_name" class="">Name:</label>
                                        <input name="plate_name" id="plate_name" placeholder="Plate Name" type="text" class="form-control"></div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label class="label-c" for="plate_price" class="">Price:</label>
                                        <input name="plate_price" id="plate_price" placeholder="Price" type="text" class="form-control"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label class="label-c" for="plate_ingredients" class="">Description:</label>
                                        <textarea name="plate_ingredients" id="plate_ingredients" class="form-control" placeholder="Description..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <!-- imagen -->
                                    <div class="form-group">
                                        <label class="label-c" for="plate_img">Image:</label>

                                        <div class="custom-file">

                                            <input type="file" class="custom-file-input" id="img" name="plate_img" placeholder="browse">
                                            <span class="custom-file-label">Browse</span>

                                        </div>


                                    </div>
                                    <!-- fin imagen  -->

                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="plate-img"></label>
                                <div class="form-group">
                                    <img id="img-prev" class="img-fluid rounded" src="#" alt="">
                                </div>
                            </div>
                            <?php
                            try {
                                require_once('../includes/functions/bd_conn.php');
                                $location = $_SESSION['location'];
                                $sql = "SELECT * FROM plate_categories WHERE id_location = $location ORDER BY cat_name ASC";
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                            ?>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-c" for="plate_categories[]">Categories:</label>
                                    </div>
                                    <?php while ($cat = $resultado->fetch_assoc()) { ?>

                                        <div class="form-check  form-check-inline pl-2 p-categories">
                                            <input class="form-check-input" type="checkbox" name="plate_categories[]" id="<?php echo $cat['id_cat']; ?>" value="<?php echo $cat['id_cat']; ?>">
                                            <label class="form-check-label  label-c" for="plate_categories[]"><?php echo $cat['cat_name'] ?></label>
                                        </div>
                                    <?php }; ?>
                                </div>
                            </div>

                            <div class="col-md-12 text-center mt-4">
                                <input type="hidden" name="action" id="action" value="create">
                                <input type="hidden" name="location" value="<?php echo $_SESSION['location']; ?>">
                                <input id="" class="submit submit-btn" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once './includes/templates/footer.php' ?>