$(document).ready(function() {
    // bootstrap file input
    bsCustomFileInput.init();

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


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img-prev').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#plate_img").change(function() {
        readURL(this);
    });

    //loader
    function showLoader() {
        $(".lds-ring").fadeIn("slow");
        $("#submit-btn").fadeOut("slow");
    }

    function hideLoader() {
        $(".lds-ring").fadeOut("slow");
        $("#submit-btn").fadeIn("slow")
    }


    //create plate

    /* $('#plate').on('submit', function(e) {

         // if ($('#plate').valid()) {

         // showLoader();
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
                     //hideLoader();
                     //clear_plates();
                     console.log(data);
                     var result = data;
                     if (result.response == 'success') {
                         Swal.fire(
                             'Thanks!!',
                             'Your plate was registered',
                             'success'
                         )

                     } else {
                         Swal.fire(
                             'Error!',
                             'There was an error, try again in some minutes',
                             'error'
                         )
                     } 
                 }
             })
             // }
     });*/


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
                    required: "You must check at least 1 box",
                    maxlength: "Check no more than {0} boxes"
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
                    } else if (result.response == 'success-update') {

                        Swal.fire(
                            'Update was succesfull',
                            'OK',
                            'success'
                        ).then(function() {
                            location.reload();
                        })
                        $('#plate').trigger("reset");
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
                        console.log(data);
                        const result = JSON.parse(data);
                        if (result.response == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted',
                                text: 'Registro eliminado',
                            })
                            jQuery('[data-id="' + result.id_deleted + '"]').parents('tr').remove();
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


    // validation methods

    $.validator.addMethod("currency", function(value, element) {
        return this.optional(element) || /^\$(\d{1,3}(\,\d{3})*|(\d+))(\.\d{2})?$/.test(value);
    }, "Please specify a valid amount");






})