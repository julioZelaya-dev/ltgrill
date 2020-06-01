<?php include_once 'includes/templates/header.php' ?>

<?php

try {
    require_once('includes/functions/bd_conn.php');
    $sql = "SELECT * FROM location";
    $resultado = $conn->query($sql);
} catch (Exception $e) {
    echo $e->getMessage();
}


?>

<section class="reservations container text-justify animate__animated animate__fadeIn">

    <h2 class="text-center">RESERVATIONS</h2>

    <p class="text-center">
        Reserve your table now to celebrate a birthday, anniversary, or just a Tuesday night with family and friends.
    </p>
    <div>
        <h3>Make a reservation</h3>
        <div class="row bg-white shadow rounded pt-3 pb-3">

            <div class="col-md-8 mx-auto">

                <div class="form-group">
                    <label>Location</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-compass"></i>
                            </span>
                        </div>
                        <select class="form-control select2" ">

                            <?php while ($location = $resultado->fetch_assoc()) {
                                if ((int) $location['id'] == 1) { ?>
                                    <option value=" <?php echo $location['id']; ?>" selected="selected"><?php echo $location['name']; ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>

                    <?php }
                            } ?>
                        </select>
                    </div>

                </div>
                <!-- /.form-group -->


                <div class="form-group">
                    <label>Date:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="date" name="fecha_evento">
                    </div>
                    <!-- /.input group -->

                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Chose an hour:</label>

                            <div class="input-group date" id="timepicker" data-target-input="nearest">

                                <!-- <div class="input-group-prepend" data-target="#timepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                        <input name="hora_evento" type="text" class="form-control datetimepicker-input" data-target="#timepicker" /> -->
                                <div class="input-group-prepend" data-target="#timepicker" data-toggle="datetimepicker">
                                    <div class="input-group-text">
                                        <i class="fas fa-clock"></i></div>
                                </div>
                                <input name="hora_evento" type="text" class="form-control datetimepicker-input" data-target="#timepicker" data-toggle="datetimepicker" />


                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>


                    <div class="form-group">
                        <label>Guests</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-users"></i>
                                </span>
                            </div>
                            <select class="form-control select2" ">

                            <?php
                            $i = 2;
                            $max = 20;
                            while ($i <= $max) {
                                if ((int) $i == 1) { ?>
                                    <option value=" <?php echo $i; ?>" selected="selected"><?php echo $i . ' Guests'; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i . ' Guests'; ?></option>
                        <?php }
                                $i++;
                            } ?>
                            </select>
                        </div>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label>Chonse one</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-utensils"></i>
                                </span>
                            </div>
                            <select class="form-control select2" ">

                            <?php
                            $i = 1;
                            $max = 2;
                            while ($i <= $max) {
                                if ((int) $i == 1) { ?>
                                    <option value=" <?php echo $i; ?>" selected="selected"><?php echo 'Lunch'; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $i; ?>"><?php echo 'Dinner'; ?></option>
                        <?php }
                                $i++;
                            } ?>
                            </select>
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>
            </div>

            <div class="col-md-8 mx-auto">
                <h3>Special Occasions and Accommodations</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi veritatis ab nostrum exercitationem quidem molestias ut. Aperiam, quaerat ipsa. Voluptatibus rerum iste tenetur natus a, aspernatur sunt culpa iusto. Molestiae.</p>
                    <h3>Reserving Private Dining or Banquet Halls</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non veniam, et repellat praesentium accusamus quis asperiores commodi, esse, nostrum dolorum atque eveniet aperiam autem tempore aliquid eligendi! Ipsum, deserunt iure!
                    </p>
            </div>


        </div>
    </div>

</section>




<?php include_once 'includes/templates/footer.php' ?>