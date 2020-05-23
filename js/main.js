$('nav li').hover(
    function() {
        $('ul', this).stop().slideDown(200);
    },
    function() {
        $('ul', this).stop().slideUp(200);
    }
);

// Menu list isotope and filter
$(window).on('load', function() {
    var menuIsotope = $('.menu-container').isotope({
        itemSelector: '.menu-item',
        layoutMode: 'fitRows'
    });

    $('#menu-flters li').on('click', function() {
        $("#menu-flters li").removeClass('filter-active');
        $(this).addClass('filter-active');

        menuIsotope.isotope({
            filter: $(this).data('filter')
        });
    });
});


(function() {

    "use strict";

    //map del ray
    let mymap = document.querySelector('.del-rey-map');

    if (mymap) {
        var map = L.map('del-rey-map').setView([38.829197, -77.058944], 19);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([38.829197, -77.058944]).addTo(map)
            .bindPopup('Los tios grill - Del Ray')
            .openPopup();
        // .bindTooltip('Venta de boletos')
        // .openTooltip();

        var c_map = L.map('crystal-map').setView([38.853587, -77.053853], 19);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(c_map);

        L.marker([38.853587, -77.053853]).addTo(c_map)
            .bindPopup('Los tios grill - Crystal City')
            .openPopup();
    }


})();