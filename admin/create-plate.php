<?php include_once './includes/header.php'; ?>
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
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>

                        <form action="includes/models/plate.php" method="post" id="plate">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="plate_name" class="">Name:</label>
                                        <input name="plate_name" id="plate_name" placeholder="Plate Name" type="text" class="form-control"></div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="plate_price" class="">Price:</label>
                                        <input name="plate_price" id="plate_price" placeholder="Price" type="text" class="form-control"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="plate_ingredients" class="">Ingredients:</label>
                                        <textarea name="plate_ingredients" id="plate_ingredients" class="form-control" placeholder="Ingredients..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <!-- imagen -->
                                    <div class="form-group">
                                        <label for="plate-img">Image:</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="plate_img" name="plate_img" placeholder="browse">
                                                <label class="custom-file-label" for="plate-img">Browse</label>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- fin imagen  -->

                                </div>



                            </div>


                            <div class="col-md-12">
                                <div class="form-group">

                                    <img id="img-prev" class="img-fluid rounded" src="#" alt="">
                                </div>

                            </div>


                            <?php
                            try {
                                require_once('../includes/functions/bd_conn.php');
                                $sql = "SELECT * FROM plate_categories";
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                            ?>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="plate_categories[]">Categories:</label>
                                    </div>
                                    <?php while ($cat = $resultado->fetch_assoc()) { ?>
                                        <label class="p-categories">
                                            <input type="checkbox" name="plate_categories[]" id="<?php echo $cat['id_cat']; ?>" value="<?php echo $cat['id_cat']; ?>">
                                            &nbsp;<span><?php echo $cat['cat_name'] ?></span>
                                        </label>
                                    <?php }; ?>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <input type="hidden" name="action" id="action" value="create">
                                <input class="submit" type="submit" value="Save">
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once './includes/footer.php' ?>