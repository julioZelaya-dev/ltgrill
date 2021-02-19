<?php include_once './includes/templates/header.php'; ?>
<!-- side-bar -->
<?php include_once './includes/templates/siderbar.php'; ?>

<!-- end-side-bar -->
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">

                        <i class="pe-7s-notebook icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Reservation
                        <div class="page-title-subheading">Fill the fields and create a new reservation.
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

                        <form action="./includes/models/reservation.php" method="post" id="reservation" class="form-submit animate__animated animate__fadeIn" style="display: none;"">

                                <div class=" col-md-12 ">
                                    <p class=" text-right"><span class="text-danger">*</span> indicates required</p>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php
                            try {
                                require_once('./functions/functions.php');
                                $l = $_SESSION['location'];
                                $r = "SELECT
                                location.name
                                FROM location
                                WHERE location.id = $l";
                                $r = $conn->query($r);
                                $r = $r->fetch_assoc();
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                            ?>
                            <label class="label-c">Location:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-compass"></i>
                                    </span>
                                </div>
                                <input type="text" name="location_text" id="location_text" class="form-control" value="<?php echo $r['name'] ?>" readonly>


                            </div>

                        </div>
                        <!-- /.form-group -->
                        <div class="form-group col-md-6">
                            <label class="label-c" for="name">Contact’s Name: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>

                                <input type="text" name="name" id="name" class="form-control" placeholder="Your name">

                            </div>
                        </div>

                        <!-- /.form-group -->
                    </div>




                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="label-c">Date:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="date" name="date_reservation">
                            </div>
                            <!-- /.input group -->

                        </div>



                    </div>


                    <div class="form-group mb-3 col-md-11 mx-auto">
                        <div class="p2">
                            <label class="label-c" for="time">Time:</label>
                            <br>

                            <?php
                            $h = 11;
                            $m = 00;


                            while ($h <= 21) {
                                if ($m == 0) {
                                    $hour = $h . ':00';
                                } else {
                                    $hour = $h . ':' . $m;
                                }
                            ?>

                                <div class="custom-control custom-radio custom-control-inline mb-2 radiobtn ">
                                    <input type="radio" class="custom-control-input" id="<?php echo $hour ?>" name="time" value="<?php echo $hour . ':00' ?>">
                                    <label class="custom-control-label" for="<?php echo $hour ?>"><?php echo $hour  ?></label>
                                </div>






                            <?php
                                if ($h == 21) {
                                    break;
                                }
                                if ($m == 45) {
                                    $m = 0;

                                    $h += 1;
                                } else {
                                    $m += 15;
                                }
                            }; ?>
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="label-c" for="guest">Guests: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-users"></i>
                                    </span>
                                </div>
                                <input type="number" name="guest" id="guest" min="1" max="25" class="form-control" placeholder="Up to 25 guests">

                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <label class="label-c" for="phone_number">Phone Number: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-mobile"></i>
                                    </span>
                                </div>

                                <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="(703) 647-9702">
                            </div>
                        </div>

                    </div>



                    <div class="form-row ">

                        <div class="form-group col-md-9 mx-auto">
                            <label class="label-c" for="special_instructions">Special instructions:</label>
                            <textarea id="special_instructions" name="special_instructions" class="form-control" rows="8" placeholder="Special instructions ..."></textarea>
                        </div>
                    </div>






                    <div class="form-group col-md-12 text-center">
                        <input type="hidden" name="action" id="action" value="create">
                        <input type="hidden" name="location" value=" <?php echo $_SESSION['location']; ?>">
                        <input type="submit" id="reservation-btn" class="submit" value="Reserve">
                    </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once './includes/templates/footer.php' ?>