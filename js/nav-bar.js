$(document).ready(function() {
    let tl = new TimelineLite(),
        links = document.querySelectorAll('.menu-item-nav'),
        pIcon = document.querySelectorAll('.plus-icon');


    //tl.staggerFromTo(links, 0.4, { autoAlpha: 0 }, { autoAlpha: 1, ease: Sine.easeInOut }, 0.2);
    links[1].addEventListener('mouseenter', function() {
        TweenMax.to(pIcon[0], 0.4, { rotation: -45, ease: Power1.easeIn });
        TweenMax.to('#lineGroup_1', 0.20, { attr: { 'stroke-dashoffset': '7', 'stroke-dasharray': '7' }, ease: Power1.easeIn });
    });
    links[1].addEventListener('mouseleave', function() {
        TweenMax.to(pIcon[0], 0.4, { rotation: 0, ease: Power1.easeIn });
        TweenMax.to('#lineGroup_1', 0.20, { attr: { 'stroke-dashoffset': '0', 'stroke-dasharray': '0' }, ease: Power1.easeIn });
    });
    links[7].addEventListener('mouseenter', function() {
        TweenMax.to(pIcon[1], 0.4, { rotation: -45, ease: Power1.easeIn });
        TweenMax.to('#lineGroup_2', 0.20, { attr: { 'stroke-dashoffset': '7', 'stroke-dasharray': '7' }, ease: Power1.easeIn });
        $('#orders').addClass('transparent-c');


    });
    links[7].addEventListener('mouseleave', function() {
        TweenMax.to(pIcon[1], 0.4, { rotation: 0, ease: Power1.easeIn });
        TweenMax.to('#lineGroup_2', 0.20, { attr: { 'stroke-dashoffset': '0', 'stroke-dasharray': '0' }, ease: Power1.easeIn });
        $('#orders').removeClass('transparent-c');
    });


    const menuToggle = document.querySelector(".nav-menu .mobile-button");
    const menu = document.querySelector('.nav-menu');
    menuToggle.addEventListener('click', function() {

        menu.classList.toggle('open');
        menuToggle.classList.toggle("mobile-button-open");

    });

    /* menuToggle.addEventListener('click',
         function() {
             menu.classList.toggle('animate__slideInDown animate__slideInUp');
         }


    ); */

    /*  $('.mobile-button').click(function() {
         $('.nav-menu').removeClass("animate__slideInUp").addClass("animate__slideInDown"); //Adds 'a', removes 'b'

     }, function() {
         $('.nav-menu').removeClass("animate__slideInDown").addClass("animate__slideInUp"); //Adds 'b', removes 'a'

     }); */

    /*  $('.nav-menu').addClass('animate__animated animate__fadeIn');
     $('.mobile-button').click(function() {
         $('.nav-menu').toggleClass('animate__slideInDown animate__fadeIn'); //Adds 'a', removes 'b' and vice versa
     }); */
});