<?php include_once 'includes/templates/header.php' ?>

<section class="g-cards  text-justify animate__animated animate__fadeIn ">
    <div class="container">
        <h2 class="text-center">GIFT <span>CARDS</span> </h2>


        <div class="load-c">
            <div class="form-group col-md-9 text-center">
                <div class="loader">
                    <div class="duo duo1">
                        <div class="dot dot-a"></div>
                        <div class="dot dot-b"></div>
                    </div>
                    <div class="duo duo2">
                        <div class="dot dot-a"></div>
                        <div class="dot dot-b"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="c-options mt-4 ">
            <h3>Please choose one of the following options:</h3>
            <div class="row mx-auto col-md-10 mt-4">

                <div class="field-c text-center col-md-6">
                    <a href="#" class="btn" id="c-b"> check balance &nbsp; <span class="fas fa-money-bill-alt"></span> </a>
                    <p>Voluptas vero odit minus nesciunt illum inventore culpa, praesentium in repudiandae deleniti id eum ea deserunt autem quos impedit maxime, repellat laboriosam?</p>
                </div>

                <div class="field-c text-center col-md-6">
                    <a href="#" class="btn" id="p-g"> Purchase gift card &nbsp; <span class="fas fa-shopping-cart"></span></a>
                    <p>Voluptas vero odit minus nesciunt illum inventore culpa, praesentium in repudiandae deleniti id eum ea deserunt autem quos impedit maxime, repellat laboriosam?</p>

                </div>

            </div>
        </div>

        <div class=" col-md-7 mx-auto c-balance">

            <form action="#" method="post" class="c-card">
                <h3>Check card balance</h3>

                <div class="form-group">
                    <label for="card-number">Card Number:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-credit-card"></i>
                            </span>
                        </div>


                        <input class="form-control" type="text" name="card-number" id="">
                    </div>
                </div>
                <p>
                    Fugit ullam eum ratione iure facilis aliquam officia veniam accusamus, assumenda necessitatibus iste quia? Molestias minima praesentium quisquam quae possimus, id in?
                </p>

                <div class="text-center">

                    <a href="#" class="btn m-2"> submit-results </a>

                    <a href="#" class="btn m-2" id="c-cancel"> cancel </a>


                </div>
            </form>
        </div>

        <div class="c-b-card col-md-7 mx-auto">

            <form action="#" method="post" class="c-card row">
                <h3>Please Enter the Details for Your Card</h3>

                <div class="col-md-12 ">
                    <p class="text-right"><span class="text-danger">*</span> indicates required</p>
                </div>



                <!-- /.form-group -->
                <div class="form-group col-md-6">
                    <label for="name">Amount: <span class="text-danger">*</span></label>
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
                <!-- /.form-group -->
                <div class="form-group col-md-6">
                    <label for="name">To: <span class="text-danger">*</span></label>
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
                <!-- /.form-group -->
                <div class="form-group col-md-6">
                    <label for="name">From: <span class="text-danger">*</span></label>
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
                <!-- /.form-group -->
                <div class="form-group col-md-6">
                    <label for="name">Recipient Email: <span class="text-danger">*</span></label>
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

                <div class="form-group col-md-9 mx-auto">
                    <label for="special_instructions">Message:</label>
                    <textarea id="special_instructions" name="special_instructions" class="form-control" rows="8" placeholder="Special instructions ..."></textarea>
                </div>

                <div class="form-group col-md-9 text-center">
                    <div class="loader">
                        <div class="duo duo1">
                            <div class="dot dot-a"></div>
                            <div class="dot dot-b"></div>
                        </div>
                        <div class="duo duo2">
                            <div class="dot dot-a"></div>
                            <div class="dot dot-b"></div>
                        </div>
                    </div>
                </div>

                <div class="text-center mx-auto">

                    <a href="#" class="col-md-4 btn m-2"> submit-results </a>

                    <a href="#" class="col-md-4 btn m-2" id="c1-cancel"> cancel </a>


                </div>
            </form>
        </div>


    </div>



</section>




<?php include_once 'includes/templates/footer.php' ?>