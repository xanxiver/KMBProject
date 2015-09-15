
// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Scrollspy Bootstrap
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

//Tooltip
$(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip({
         placement : 'top'
    });
});
//Carousel Pause
$(function(){
     $("#header-bg").carousel({
          pause: false
     });
});

