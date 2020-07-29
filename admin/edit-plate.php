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
                        <div class="col-md-12 text-center ">
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
                        $sql = "SELECT * FROM plate WHERE id_plate = $id";
                        $result = $conn->query($sql);
                        $plate = $result->fetch_assoc();

                        /*   echo "<pre>";
                        var_dump($plate);
                        echo "</pre>"; */

                        ?>

                        <form action="includes/models/plate.php" method="post" id="plate" class="form-submit" style="display: none;">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label class="label-c" for="plate_name" class="">Name:</label>
                                        <input name="plate_name" id="plate_name" placeholder="Plate Name" type="text" class="form-control" value="<?php echo $plate['plate_name'] ?>"></div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label class="label-c" for="plate_price" class="">Price:</label>
                                        <input name="plate_price" id="plate_price" placeholder="Price" type="text" class="form-control" value="<?php echo $plate['price'] ?>"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label class="label-c" for="plate_ingredients" class="">Ingredients:</label>
                                        <textarea name="plate_ingredients" id="plate_ingredients" class="form-control" placeholder="Ingredients..."><?php echo $plate['ingredients'] ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <!-- imagen -->
                                    <div class="form-group">
                                        <label class="label-c" for="plate_img">Image:</label>

                                        <div class="custom-file">

                                            <input type="file" class="custom-file-input" id="img" name="plate_img">
                                            <label for="plate_img" class="custom-file-label"><?php echo $plate['img']; ?></label ">

                                        </div>


                                    </div>
                                    <!-- fin imagen  -->

                                </div>
                            </div>
                            <div class=" col-md-12">
                                            <label for="plate-img"></label>
                                            <div class="form-group">
                                                <img id="img-prev" class="img-fluid rounded" src="../assets/img/plates/<?php echo $plate['img']; ?>" alt="Plate">
                                            </div>
                                        </div>
                                        <?php
                                        try {
                                            $id = $plate['id_plate'];
                                            require_once('../includes/functions/bd_conn.php');
                                            $sql_c = "SELECT
                                cat_detail.id_cat
                                
                                FROM cat_detail
                                WHERE cat_detail.id_plate = $id ";
                                            $result_c = $conn->query($sql_c);
                                        } catch (Exception $e) {
                                            echo $e->getMessage();
                                        }

                                        /*  while ($row = $result_c->fetch_assoc()) {
                                $selected_cat[] = $row; // Inside while loop
                            }
                            echo "<pre>";
                            var_dump($selected_cat);
                            echo "</pre>"; */

                                        while ($row = $result_c->fetch_array()) {
                                            $new_array[$row['id_cat']]['id_cat'] = $row['id_cat'];
                                        }


                                        if (isset($new_array)) {
                                            foreach ($new_array as $array) {
                                                $re[] = $array['id_cat'];
                                            }
                                        }
                                        ?>

                                        <?php
                                        try {
                                            require_once('../includes/functions/bd_conn.php');
                                            $location = $_SESSION['location'];
                                            $sql = "SELECT * FROM plate_categories WHERE id_location = $location ORDER BY cat_name ASC";

                                            $result = $conn->query($sql);
                                        } catch (Exception $e) {
                                            echo $e->getMessage();
                                        }


                                        ?>


                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label-c" for="plate_categories[]">Categories:</label>
                                                </div>
                                                <?php while ($cat = $result->fetch_assoc()) { ?>

                                                    <div class="form-check  form-check-inline pl-2 p-categories">

                                                        <?php if (isset($re) && (in_array($cat['id_cat'], $re))) { ?>
                                                            <input type="checkbox" checked class="form-check-input" name="plate_categories[]" id="<?php echo $cat['id_cat']; ?>" value="<?php echo $cat['id_cat']; ?>">
                                                            <label class="form-check-label  label-c" for="plate_categories[]"><?php echo $cat['cat_name'] ?></label>

                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input" name="plate_categories[]" id="<?php echo $cat['id_cat']; ?>" value="<?php echo $cat['id_cat']; ?>">
                                                            <label class="form-check-label  label-c" for="plate_categories[]"><?php echo $cat['cat_name'] ?></label>

                                                        <?php } ?>


                                                    </div>
                                                <?php }; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <input type="hidden" name="action" id="action" value="update">
                                            <input type="hidden" name="id_plate" value="<?php echo $plate['id_plate'] ?>">
                                            <input type="hidden" name="actual_img" value="<?php echo $plate['img'] ?>">
                                            <input id="submit-btn" class="submit" type="submit" value="Save">
                                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once './includes/templates/footer.php' ?>