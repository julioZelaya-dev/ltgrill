$(document).ready(function() {

    $('#login_admin').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        // console.log(datos);
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var result = data;
                if (result.response == 'success') {
                    console.log('pl');

                    window.location.href = 'index.php'

                } else {
                    Swal.fire(
                        'Error!',
                        'Wrong username or password',
                        'error'
                    )
                }
            }
        })
    });
})