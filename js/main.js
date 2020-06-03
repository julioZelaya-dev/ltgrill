$(document).ready(function() {

    $('nav li').hover(
        function() {
            $('ul', this).stop().slideDown(500);
        },
        function() {
            $('ul', this).stop().slideUp(500);
        }
    );

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
    $('.venobox').venobox();

    if (document.querySelector('[alt="www.000webhost.com"]')) {
        let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
        bannerNode.parentNode.removeChild(bannerNode);
    }

    //Date range picker with time picker
    /* $('#date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        "locale": {
            "format": "DD/MM/YYYY",
            "weekLabel": "S",
            "daysOfWeek": [
                "Dom",
                "Lun",
                "Martes",
                "Mie",
                "Jue",
                "Vie",
                "Sab"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        }

    }); */

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;

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


    $('.select2').select2({
        theme: 'bootstrap4'
    });


    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT'
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