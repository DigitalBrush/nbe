jQuery(function($){
    $('.logo-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                nav:false
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:false
            }
        }
    })

    $('.hero-slider').owlCarousel({
        autoplay:true,
        slideSpeed:3000,
        autoplayHoverPause:true,
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:false,
            }
        }
    })

    $('#left-sidebar .count').text(function(_, text) {
        return text.replace(/\(|\)/g, '');
    });

});

