//loader
function showLoader() {
    $(".lds-ring").fadeIn("slow");
    $(".submit-btn").fadeOut("slow");
    $(".form-submit").slideUp("fast");
}

function hideLoader() {
    $(".lds-ring").fadeOut("fast");
    $(".submit-btn").fadeIn("slow");
    $(".form-submit").slideDown("slow");
}


function showtable() {

    $(".item-table").slideDown('slow');
}

function hidetable() {

    $(".item-table").slideUp("fast");
}

showLoader();
hidetable();


$(document).ready(function() {
    showtable();
    // bootstrap file input
    bsCustomFileInput.init();

    //date picker 
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;
    $('input[name="date_reservation"]').daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        "linkedCalendars": false,
        "showCustomRangeLabel": false,
        "minDate": `${today}`,
        "startDate": "06/01/2020",
        "endDate": "06/01/2020",
        "opens": "right",
        "buttonClasses": "btn btn-sm",
        "applyButtonClasses": "bg-c-orange",
        "cancelClass": "btn-danger",
        /* "isInvalidDate": function(date) {
            //return true if date is sunday or saturday
            return (date.day() == 1 || date.day() == 6);
        } */
    });

    $('#timepicker').datetimepicker({
        format: 'LT'
    });

    if ($('#list_table')) {
        $('#list_table').DataTable({
            "paging": true,
            "pageLength": 10,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "dom": 'Bfrtip',
            "buttons": [
                'copy', 'csv', 'pdf'
            ]
        });
    }

    if ($('#list_table_5')) {
        $('#list_table_5').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "dom": 'Bfrtip',
            "buttons": [
                'copy', 'csv', 'pdf'
            ]
        });
    }



    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img-prev').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#img").change(function() {
        readURL(this);
    });




    //create plate



    //plates 
    if ($('#plate')) {
        hideLoader();


        $.validator.setDefaults({

            submitHandler: function() {

                // document.querySelector('#reservation').addEventListener('submit', create_res);


            }
        });






        $($('#plate')).validate({
            rules: {
                plate_name: {
                    required: true,

                },
                plate_price: {
                    required: true,
                    number: true



                },
                plate_ingredients: {
                    required: true
                },
                'plate_categories[]': {
                    required: true,


                },
                time: {
                    required: true
                },
                plate_img: {
                    required: false,

                },

            },
            messages: {
                'plate_categories[]': {
                    required: "You must check at least 1 box"

                }
            }
        });

        $('input[name^="plate_img"]').rules('add', {
            required: false,
            accept: "image/jpeg, image/pjpeg, image/png"
        })



    }


    $('#plate').on('submit', function(e) {
        if ($('#plate').valid()) {
            e.preventDefault();
            var datos = new FormData(this);
            showLoader();

            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                // files
                contentType: false,
                processData: false,
                async: true,
                cache: false,

                success: function(data) {
                    hideLoader();
                    console.log(data);
                    var result = data;
                    if (result.response == 'success') {
                        Swal.fire(
                            'Success',
                            'OK',
                            'success'
                        )
                        $('#plate').trigger("reset");
                        $('#img-prev').attr('src', '');
                    } else if (result.response == 'success-update') {

                        Swal.fire(
                            'Update was succesfull',
                            'OK',
                            'success'
                        ).then(function() {
                            location.reload();
                        })

                    } else {
                        Swal.fire(
                            'Error!',
                            'There was an error',
                            'error'
                        )
                    }
                }
            })
        }
    });


    $('#list_table').on('click', '.delete', function(e) {
        e.preventDefault();
        // estas variables se utilizan para acceder a las propiedades del <a>
        // estas propiedades son personalizadas 
        let id = $(this).attr('data-id');
        let type = $(this).attr('data-type');
        let img = $(this).attr('data-img');
        Swal.fire({
            title: '¿are you sure?',
            text: "this action cannot be undone",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK, Delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: 'post',
                    data: {
                        'id': id,
                        'img': img,
                        'action': 'delete'
                    },
                    url: 'includes/models/' + type + '.php',
                    success: function(data) {

                        const result = JSON.parse(data);
                        console.log(result);
                        if (result.response == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted',
                                text: 'Deleted',
                            })
                            jQuery('[data-id="' + result.id_deleted + '"]').parents('tr').remove().draw();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'There was an error',
                            })
                        }
                    }
                })
            }
        })





    });

    //admins

    if ($('#admin')) {
        hideLoader();


        $.validator.setDefaults({

            submitHandler: function() {

                // document.querySelector('#reservation').addEventListener('submit', create_res);


            }
        });






        $($('#admin')).validate({
            rules: {
                name: {
                    required: true

                },
                last_name: {
                    required: true
                },
                user_name: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 5,
                },
                c_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                time: {
                    required: true
                },
                admin_img: {
                    required: false,

                }

            },

            messages: {
                c_password: {
                    equalTo: "Passwords doesn't match"
                }
            }

        });
        $('input[name^="admin_img"]').rules('add', {
            required: false,
            accept: "image/jpeg, image/pjpeg, image/png"
        })



    }

    $('#admin').on('submit', function(e) {
        if ($('#admin').valid()) {
            e.preventDefault();
            var datos = new FormData(this);
            showLoader();

            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                // files
                contentType: false,
                processData: false,
                async: true,
                cache: false,

                success: function(data) {
                    hideLoader();
                    console.log(data);
                    var result = data;

                    if (result.response == 'taken') {
                        Swal.fire(

                            'OK',
                            'User name already taken',
                            'info'
                        )
                    } else if (result.response == 'success') {
                        Swal.fire(
                            'Success',
                            'OK',
                            'success'
                        )
                        $('#admin').trigger("reset");
                        $('#img-prev').attr('src', '');
                    } else if (result.response == 'success-update') {

                        Swal.fire(
                            'Update was succesfull',
                            'OK',
                            'success'
                        ).then(function() {
                            location.reload();
                        })

                    } else {
                        Swal.fire(
                            'Error!',
                            'There was an error',
                            'error'
                        )
                    }
                }
            })
        }
    });


    //categories

    if ($('#categ')) {
        hideLoader();


        $.validator.setDefaults({

            submitHandler: function() {

                // document.querySelector('#reservation').addEventListener('submit', create_res);


            }
        });

        $($('#categorie')).validate({
            rules: {
                name: {
                    required: true
                },


            }


        });








    }



    $('#categorie').on('submit', function(e) {
        if ($('#categorie').valid()) {
            e.preventDefault();
            var datos = new FormData(this);
            showLoader();

            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                // files
                contentType: false,
                processData: false,
                async: true,
                cache: false,

                success: function(data) {
                    hideLoader();
                    console.log(data);
                    var result = data;

                    if (result.response == 'success') {
                        Swal.fire(
                            'Success',
                            'OK',
                            'success'
                        )
                        $('#categorie').trigger("reset");

                    } else if (result.response == 'success-update') {

                        Swal.fire(
                            'Update was succesfull',
                            'OK',
                            'success'
                        ).then(function() {
                            location.reload();
                        })

                    } else {
                        Swal.fire(
                            'Error!',
                            'There was an error',
                            'error'
                        )
                    }
                }
            })
        }
    });

    //menu

    if ($('#categ')) {
        hideLoader();


        $.validator.setDefaults({

            submitHandler: function() {

                // document.querySelector('#reservation').addEventListener('submit', create_res);


            }
        });

        $($('#menu-plate')).validate({
            rules: {
                name: {
                    required: true
                },


            }


        });








    }



    $('#menu-plate').on('submit', function(e) {
        if ($('#menu-plate').valid()) {
            e.preventDefault();
            var datos = new FormData(this);
            showLoader();

            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                // files
                contentType: false,
                processData: false,
                async: true,
                cache: false,

                success: function(data) {
                    hideLoader();
                    console.log(data);
                    var result = data;

                    if (result.response == 'success') {
                        Swal.fire(
                            'Success',
                            'OK',
                            'success'
                        )
                        $('#menu-plate').trigger("reset");

                    } else {
                        Swal.fire(
                            'Error!',
                            'There was an error',
                            'error'
                        )
                    }
                }
            })
        }



    });

    if ($('#reservation')) {
        hideLoader();


        $.validator.setDefaults({

            submitHandler: function() {

                // document.querySelector('#reservation').addEventListener('submit', create_res);


            }
        });






        $($('#reservation')).validate({
            rules: {
                guest: {
                    required: true,
                    number: true,
                    range: [1, 85]
                },
                hora_evento: {
                    required: true,
                    time12h: true

                },
                name: {
                    required: true
                },
                phone_number: {
                    required: true,
                    phoneUS: true
                },
                time: {
                    required: true
                },
                hour: {
                    required: true
                }



            }
        });



    }

    $('#reservation').on('submit', function(e) {

        if ($('#reservation').valid()) {

            showLoader();
            e.preventDefault();
            var datos = $(this).serializeArray();
            // console.log(datos);
            //console.log(datos);
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                success: function(data) {
                    hideLoader();
                    //clear_reservations();

                    console.log(data);
                    var result = data;
                    if (result.response == 'success') {
                        Swal.fire(
                            'Thanks!!',
                            'Your reservation was registered',
                            'success'
                        )
                        $('#resertvation').trigger("reset");

                    } else if (result.response == 'success-update') {

                        Swal.fire(
                            'Update was succesfull',
                            'OK',
                            'success'
                        ).then(function() {
                            location.reload();
                        })

                    } else {
                        Swal.fire(
                            'Error!',
                            'There was an error, try again in some minutes',
                            'error'
                        )
                    }
                }
            })
        }
    });

    $('.select2').select2({
        theme: 'bootstrap4',
        minimumResultsForSearch: Infinity
            //placeholder: 'Select an option'
    });

    $('.select2-search').select2({
        theme: 'bootstrap4'
            //placeholder: 'Select an option'
    });


})