<?php include_once 'includes/templates/header.php' ?>

<section class="offers text-justify ">
    <div class="container">
        <h2 class="text-center">Sign up for new offers</h2>
        <div class="row">
            <div class="col-md-8 mx-auto">


                <!-- Begin Mailchimp Signup Form -->
                <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                <style type="text/css">
                    #mc_embed_signup {
                        background: #fff;
                        clear: left;
                        font: 14px Helvetica, Arial, sans-serif;
                    }

                    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                </style>


                <div id="mc_embed_signup">

                    <form action="https://000webhostapp.us18.list-manage.com/subscribe/post?u=dc88022e6275a4f2a8521f641&amp;id=e99d7cf261" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <h3 class="bg-warning rounded text-center pt-2 pb-2 text-uppercase">subscribe to get the best deals</h2>
                                <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                                <div class="mc-field-group">
                                    <label for="mce-EMAIL">Email Address <span class="asterisk">*</span>
                                    </label>
                                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                                </div>

                                <div class="mc-field-group">
                                    <label for="mce-FNAME">First Name <span class="asterisk">*</span>
                                    </label>
                                    <input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
                                </div>
                                <div class="mc-field-group">
                                    <label for="mce-LNAME">Last Name </label>
                                    <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                                </div>
                                <div class="mc-field-group size1of2">
                                    <label for="mce-PHONE">Phone Number </label>
                                    <input type="text" name="PHONE" class="" value="" id="mce-PHONE">
                                </div>
                                <div class="mc-field-group size1of2">
                                    <label for="mce-BIRTHDAY-month">Birthday </label>
                                    <div class="datefield">
                                        <span class="subfield monthfield"><input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="MM" size="2" maxlength="2" name="BIRTHDAY[month]" id="mce-BIRTHDAY-month"></span> /
                                        <span class="subfield dayfield"><input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="DD" size="2" maxlength="2" name="BIRTHDAY[day]" id="mce-BIRTHDAY-day"></span>
                                        <span class="small-meta nowrap">( mm / dd )</span>
                                    </div>
                                </div>
                                <div class="mc-field-group">
                                    <label for="mce-MMERGE6">Zip Code </label>
                                    <input type="text" value="" name="MMERGE6" class="" id="mce-MMERGE6">
                                </div>
                                <div id="mce-responses" class="clear">
                                    <div class="response" id="mce-error-response" style="display:none"></div>
                                    <div class="response" id="mce-success-response" style="display:none"></div>
                                </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_dc88022e6275a4f2a8521f641_e99d7cf261" tabindex="-1" value=""></div>
                                <div>
                                    <input class="mx-auto btn btn-warning" type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                                </div>
                        </div>
                    </form>
                </div>
                <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
                <script type='text/javascript'>
                    (function($) {
                        window.fnames = new Array();
                        window.ftypes = new Array();
                        fnames[0] = 'EMAIL';
                        ftypes[0] = 'email';
                        fnames[1] = 'FNAME';
                        ftypes[1] = 'text';
                        fnames[2] = 'LNAME';
                        ftypes[2] = 'text';
                        fnames[3] = 'ADDRESS';
                        ftypes[3] = 'address';
                        fnames[4] = 'PHONE';
                        ftypes[4] = 'phone';
                        fnames[5] = 'BIRTHDAY';
                        ftypes[5] = 'birthday';
                        fnames[6] = 'MMERGE6';
                        ftypes[6] = 'zip';
                    }(jQuery));
                    var $mcj = jQuery.noConflict(true);
                </script>


                <!--End mc_embed_signup-->




                <!-- <form>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Email</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="Email">
                            </div>

                        </div>



                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Register <i class="fas fa-angle-right"></i></button>

                </form> -->
            </div>
        </div>


    </div>

</section>




<?php include_once 'includes/templates/footer.php' ?>