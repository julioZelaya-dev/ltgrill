$(document).ready(function() {

    //nav bar
    $('nav li').hover(
        function() {
            $('ul', this).stop().slideDown(700);
        },
        function() {
            $('ul', this).stop().slideUp(700);
        }
    );

    // loader 
    function showLoader() {
        $(".loader").fadeIn("slow");
        $("#reservation-btn").fadeOut("slow");
    }

    function hideLoader() {
        $(".loader").fadeOut("slow");
        $("#reservation-btn").fadeIn("slow")
    }

    //gift cards

    function hide_c_options() {
        $(".c-options").hide();
    }

    function show_c_options() {
        $(".c-options").fadeIn("slow");
    }

    function hide_check() {
        $(".c-balance").hide();
    }

    function show_check() {
        $(".c-balance").fadeIn("slow");
    }

    function hide_buy_c() {
        $(".c-b-card").hide();
    }

    function show_buy_c() {
        $(".c-b-card").fadeIn("slow");
    }



    $("#c-b").click(function(e) {
        e.preventDefault();

        hide_c_options();
        show_check();
    });

    $("#p-g").click(function(e) {
        e.preventDefault();

        hide_c_options();
        show_buy_c();
    });

    $("#c-cancel").click(function(e) {
        e.preventDefault();
        show_c_options();

        hide_check();
    });

    $("#c1-cancel").click(function(e) {
        e.preventDefault();
        show_c_options();
        hide_buy_c();

    });









    // Intro carousel
    var heroCarousel = $("#heroCarousel");
    var heroCarouselIndicators = $("#hero-carousel-indicators");
    heroCarousel.find(".carousel-inner").children(".carousel-item").each(function(index) {
        (index === 0) ?
        heroCarouselIndicators.append("<li data-target='#heroCarousel' data-slide-to='" + index + "' class='active'></li>"):
            heroCarouselIndicators.append("<li data-target='#heroCarousel' data-slide-to='" + index + "'></li>");
    });

    heroCarousel.on('slid.bs.carousel', function(e) {
        $(this).find('h2').addClass('animated fadeInDown');
        $(this).find('p, .btn-menu, .btn-book').addClass('animated fadeInUp');
    });

    // Menu list isotope and filter
    var menuIsotope = $('.menu-container').isotope({
        itemSelector: '.menu-item',
        layoutMode: 'fitRows'
    });
    menuIsotope.isotope({
        filter: ('.filter-1')

    });



    $('#menu-flters li').on('click', function() {
        $("#menu-flters li").removeClass('filter-active');
        $(this).addClass('filter-active');

        menuIsotope.isotope({
            filter: $(this).data('filter')


        });

    });

    // Initiate venobox lightbox
    $('.venobox').venobox({
        framewidth: '900px', // default: ''
        frameheight: '', // default: ''
        border: '0', // default: '0'
        bgcolor: '#fff', // default: '#fff'
        titleattr: 'title', // default: 'title'
        numeratio: true, // default: false
        infinigall: true
    });

    if (document.querySelector('[alt="www.000webhost.com"]')) {
        let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
        bannerNode.parentNode.removeChild(bannerNode);
    }


    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;

    // Date picker
    $('#date').daterangepicker({
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
        "cancelClass": "btn-danger"
    });

    //dropdown

    $('.select2').select2({
        theme: 'bootstrap4'
    });


    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT',


        maxDate: new Date(2010, 11, 20, 21, 00),

        minDate: new Date(2010, 11, 20, 11, 00),

        stepping: 15,

        defaultDate: new Date(2010, 11, 20, 11, 00),

    });


    //validation on offers

    if ($('#mc-embedded-subscribe-form')) {

        hideLoader();
        $.validator.setDefaults({

            submitHandler: function() {
                clear_offers();



            }
        });

        $($('#mc-embedded-subscribe-form')).validate({
            rules: {
                EMAIL: {
                    required: true,
                    email: true,
                },
                FNAME: {
                    required: true,

                },
                PHONE: {
                    required: true,
                    phoneUS: true
                }



            },
            messages: {
                EMAIL: {
                    required: "Please enter a email address",
                    EMAIL: "Please enter a vaild email address"
                },
                FNAME: {
                    required: "Please provide a name"

                }

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    }

    //validation reservation
    /* function create_res(e) {
            e.preventDefault();
            var location = document.querySelector('#location').value,
                guest = document.querySelector('#guest').value,
                date = document.querySelector('#date').value,
                time = document.querySelector('#time').value,
                name = document.querySelector('#name').value,
                phone = document.querySelector('#phone_number').value,
                sp_instructions = document.querySelector('#special_instructions').value;
            // action = document.querySelector('#action').value;




            // data que se envian al servidor
            var data = new FormData();
            data.append('location', location);
            data.append('guest', guest);
            data.append('date', date);
            data.append('time', time);
            data.append('name', name);
            data.append('phone', phone);
            data.append('sp_instructions', sp_instructions);
            data.append('action', 'create');

            for (var pair of data.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }

            // crear el llamado a ajax
            var xhr = new XMLHttpRequest();

            // abrir la conexión.
            xhr.open('POST', 'includes/models/reservation-mod.php', true);

            // retorno de data
            xhr.onload = function() {
                if (this.status === 200) {

                    console.log(xhr.responseText);

                    var response = JSON.parse(xhr.responseText);

                    console.log(response);
                     // Si la response es correcta
                    if (response.response === 'correccto') {
                        // si es un nuevo usuario
                        if (response.tipo === 'crear') {
                            swal({
                                title: 'Usuario Creado',
                                text: 'El usuario se creó correctamente',
                                type: 'success'
                            });
                        } else if (response.tipo === 'login') {
                            swal({
                                    title: 'Login Correcto',
                                    text: 'Presiona OK para abrir el dashboard',
                                    type: 'success'
                                })
                                .then(resultado => {
                                    if (resultado.value) {
                                        window.location.href = 'index.php';
                                    }
                                })
                        }
                    } else {
                        // Hubo un error
                        swal({
                            title: 'Error',
                            text: 'Hubo un error',
                            type: 'error'
                        })
                    }  
                }


                // Enviar la petición
                xhr.send(data);

            }
        } */


    function clear_reservations() {
        $("#name").val(' ');
        $("#time").val(' ');
        $("#guest").val(' ');
        $("#phone_number").val(' ');
        $("#special_instructions").val(' ');

    }

    function clear_offers() {
        $("#mce-EMAIL").val(' ');
        $("#mce-FNAME").val(' ');
        $("#mce-LNAME").val(' ');
        $("#mce-PHONE").val(' ');
        $("#mce-MMERGE6").val(' ');
    }

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
                    range: [1, 25]
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

                special_instructions: {
                    required: false,
                    maxlength: 600
                }



            },
            messages: {
                guest: {
                    required: "Please enter a number from 1 to 25",

                },
                hora_evento: {
                    required: "Please select an hour"
                },
                name: "Please type your name",
                phone_number: { required: "Please give us your telephone number" },
                time: "Please enter a time"


            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
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
                    var resultado = data;
                    if (resultado.response == 'success') {
                        Swal.fire(
                            'Thanks!!',
                            'Your reservation was registered',
                            'success'
                        )
                        $('#resertvation').trigger("reset");

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



    $.validator.addMethod("time12h", function(value, element) {
        return this.optional(element) || /^((0?[1-9]|1[012])(:[0-5]\d){1,2}(\ ?[AP]M))$/i.test(value);
    }, "Please enter a valid time in 12-hour am/pm format");


    //back to top on menu

    $(".gototop").gototop({

        // where to scroll back to
        position: 0,

        // animation speed
        duration: 1000,

        // cusotm css class
        classname: "isvisible",

        // where to display the button
        visibleAt: 500

    });


});





/* var dray_map,
    c_city_map,
    v_dorn_map,
    lessburg_map;

function initMap() {

    //del ray map
    var drayloc = { lat: 38.829124, lng: -77.058926 };
    dray_map = new google.maps.Map(document.getElementById('del-rey-map'), {
        center: drayloc,
        zoom: 18
    });
    var markerdray = new google.maps.Marker({ position: drayloc, dray_map: dray_map });
    markerdray.setMap(dray_map);

    //crystal city map
    var ccloc = { lat: 38.853586, lng: -77.053851 };
    c_city_map = new google.maps.Map(document.getElementById('crystal-map'), {
        center: ccloc,
        zoom: 18
    });
    var markercc = new google.maps.Marker({ position: ccloc, c_city_map: c_city_map });
    markercc.setMap(c_city_map);

    //van dorn map
    var cvand = { lat: 38.812057, lng: -77.133440 };
    v_dorn_map = new google.maps.Map(document.getElementById('van-dorn-map'), {
        center: cvand,
        zoom: 18
    });
    var markercv = new google.maps.Marker({ position: cvand, v_dorn_map: v_dorn_map });
    markercv.setMap(v_dorn_map);

    //les burg map
    var lessburgloc = { lat: 39.112936, lng: -77.563215 };
    lessburg_map = new google.maps.Map(document.getElementById('lessburg-map'), {
        center: lessburgloc,
        zoom: 18
    });
    var markercc = new google.maps.Marker({ position: lessburgloc, lessburg_map: lessburg_map });
    markercc.setMap(lessburg_map);

} */

/* const googleMapsScript = document.createElement('script');
googleMapsScript.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBorrLWWOEKylh4WCCBuNc4QF9QjX_n0Bw&callback=initMap';
document.head.appendChild(googleMapsScript); */