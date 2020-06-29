<?php include_once './includes/templates/header.php'; ?>
<!-- side-bar -->
<?php include_once './includes/templates/siderbar.php'; ?>
<?php if ($_SESSION['access'] == '0') {
    echo ("<script>location.href = 'index.php';</script>");
} ?>
<!-- end-side-bar -->
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">

                        <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Admins
                        <div class="page-title-subheading">Fill the fields and create a new admin.
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
                        <form action="./includes/models/admin.php" method="post" id="admin" class="form-submit animate__animated animate__fadeIn" style="display: none;">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label class="label-c" for="name" class="">Name:</label>
                                        <input name="name" id="name" placeholder="Name" type="text" class="form-control"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label class="label-c" for="last_name" class="">Last name:</label>
                                        <input name="last_name" id="last_name" placeholder="Last name" type="text" class="form-control"></div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label class="label-c" for="user_name" class="">User name:</label>
                                        <input name="user_name" id="user_name" placeholder=" User name" type="text" class="form-control"></div>
                                </div>


                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label class="label-c" for="password" class="">Password:</label>
                                        <input name="password" id="password" placeholder="Password" type="password" class="form-control"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label class="label-c" for="c_password" class="">Confirm password:</label>
                                        <input name="c_password" id="c_password" placeholder="Confirm your password" type="password" class="form-control"></div>
                                </div>
                            </div>

                            <?php
                            try {
                                require_once('./functions/functions.php');
                                $sql = "SELECT * FROM location";
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                            ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="label-c" for="location">Location:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-compass"></i>
                                            </span>
                                        </div>
                                        <select class="form-control select2" name="location" id="location">
                                            <option selected="selected" value="5">All</option>
                                            <?php while ($location = $resultado->fetch_assoc()) {

                                                if ((int) $location['id'] == 1) { ?>
                                                    <option value=" <?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>

                                            <?php }
                                            } ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group col-md-6">
                                    <label class="label-c" for="access">Access:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                        <select class="form-control select2" name="access" id="access">
                                            <option value="1" selected="selected">Admin</option>
                                            <option value="0">Manager</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <!-- imagen -->
                                    <div class="form-group">
                                        <label class="label-c" for="admin_img">Image:</label>

                                        <div class="custom-file">

                                            <input type="file" class="custom-file-input" id="img" name="admin_img" placeholder="browse">
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



                            <div class="col-md-12 text-center mt-4">
                                <input type="hidden" name="action" id="action" value="create">
                                <input id="submit-btn" class="submit" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once './includes/templates/footer.php' ?>