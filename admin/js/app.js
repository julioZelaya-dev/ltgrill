$(document).ready(function() {
    // bootstrap file input
    bsCustomFileInput.init();

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
                     var resultado = data;
                     if (resultado.response == 'success') {
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


    $('#plate').on('submit', function(e) {
        e.preventDefault();
        var datos = new FormData(this);


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
                console.log(data);
                var resultado = data;
                if (resultado.response == 'success') {
                    Swal.fire(
                        'Success',
                        'OK',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Error!',
                        'There was an error',
                        'error'
                    )
                }
            }
        })
    });







})