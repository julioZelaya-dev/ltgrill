<?php include_once './includes/templates/header.php'; ?>
<!-- side-bar -->
<?php include_once './includes/templates/siderbar.php'; ?>
<?php if ($_SESSION['access'] == '0') {
    echo ("<script>plate.href = 'index.php';</script>");
} ?>
<!-- end-side-bar -->
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">

                        <i class="pe-7s-note2 icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Menu
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row  ">
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
                        <form action="./includes/models/menu.php" method="post" id="menu-plate" class="form-submit animate__animated animate__fadeIn" style="display: none;">


                            <?php
                            try {
                                require_once('./functions/functions.php');
                                $sql = "SELECT * FROM plate";
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                            ?>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="label-c" for="id_plate">Plate:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-compass"></i>
                                            </span>
                                        </div>
                                        <select class="form-control select2-search" name="id_plate" id="plate">

                                            <?php while ($plate = $resultado->fetch_assoc()) {

                                                if ((int) $plate['id_plate'] == 1) { ?>
                                                    <option value=" <?php echo $plate['id_plate']; ?>"><?php echo $plate['plate_name']; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $plate['id_plate']; ?>"><?php echo $plate['plate_name']; ?></option>

                                            <?php }
                                            } ?>
                                        </select>
                                    </div>

                                </div>


                            </div>





                            <div class="col-md-12 text-center mt-4">
                                <input type="hidden" name="action" id="action" value="create">
                                <input type="hidden" name="location" value="<?php echo $_SESSION['location']; ?>">
                                <input id="submit-btn" class="submit" type="submit" value="Add to menu">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once './includes/templates/footer.php' ?>