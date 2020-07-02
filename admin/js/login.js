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

showLoader();



$(document).ready(function() {
    hideLoader();
    $('#login_admin').on('submit', function(e) {
        showLoader();
        e.preventDefault();
        var datos = $(this).serializeArray();
        // console.log(datos);
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                var result = data;

                if (result.response == 'success') {
                    // console.log('pl');

                    window.location.href = 'index.php'
                    hideLoader();

                } else {
                    Swal.fire(
                        'Error!',
                        'Wrong username or password',
                        'error'
                    )
                    hideLoader();
                }
            }
        })
    });
})