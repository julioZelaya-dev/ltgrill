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

    <h3>Make a reservation</h3>
    <form action="#" method="post" class="col-md-7 mx-auto bg">
        <div class="row -white shadow rounded pt-3 pb-3">


            <div class="col-md-12 form-group">
                <label>Location:</label>
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

            <div class="form-group col-md-12">
                <label for="guest">Guests:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-users"></i>
                        </span>
                    </div>
                    <input type="number" name="guest" id="guest" min="1" max="85" class="form-control" placeholder="Up to 85 guests">

                </div>
            </div>
            <!-- /.form-group -->

            <div class="col-md-6">
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

                </div>
            </div>
            <div class="col-md-6">
                <div class="bootstrap-timepicker">


                    <div class="form-group">
                        <label>Time:</label>

                        <div class="input-group date" id="timepicker" data-target-input="nearest">

                            <!-- <div class="input-group-prepend" data-target="#timepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                        <input name="hora_evento" type="text" class="form-control datetimepicker-input" data-target="#timepicker" /> -->
                            <div class="input-group-prepend" data-target="#timepicker" data-toggle="datetimepicker">
                                <div class="input-group-text">
                                    <i class="fas fa-clock"></i></div>
                            </div>
                            <input name="hora_evento" type="text" class="form-control datetimepicker-input" data-target="#timepicker" data-toggle="datetimepicker" placeholder="6:45 PM" />


                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="name">Contact’s Name:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>

                    <input type="text" name="name" id="name" class="form-control" placeholder="Your name">

                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="phone_number">Phone Number:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-mobile"></i>
                        </span>
                    </div>

                    <input type="number" name="phone_number" id="phone_number" class="form-control" placeholder="Your phone number">
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="special_instructions">Special instructions:</label>
                <textarea id="special_instructions" name="special_instructions" class="form-control" rows="8" placeholder="Special instructions ..."></textarea>
            </div>

            <div class="col-md-12 text-center">
                <input type="submit" class="bg-c-orange" value="Reserve">
            </div>
        </div>

    </form>



    <div class="col-md-8 mx-auto">
        <h3>Special Occasions and Accommodations</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi veritatis ab nostrum exercitationem quidem molestias ut. Aperiam, quaerat ipsa. Voluptatibus rerum iste tenetur natus a, aspernatur sunt culpa iusto. Molestiae.</p>
            <h3>Reserving Private Dining or Banquet Halls</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Non veniam, et repellat praesentium accusamus quis asperiores commodi, esse, nostrum dolorum atque eveniet aperiam autem tempore aliquid eligendi! Ipsum, deserunt iure!
            </p>
    </div>


    </div>



</section>




<?php include_once 'includes/templates/footer.php' ?>