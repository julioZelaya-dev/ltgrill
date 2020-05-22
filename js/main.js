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