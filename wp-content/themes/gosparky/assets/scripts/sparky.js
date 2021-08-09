jQuery(document).ready(function ($) {
    $('div[data-slick]').each(function () {
        let arrows = false;
        let autoplay = false;
        let autoplaySpeed = 3000;
        let dots = false;
        let draggable = false;
        let fade = false;
        let infinite = false;
        let pauseOnHover = false;
        let slidesToScroll = 1;
        let slidesToShow = 1;
        let speed = 2000;


        if ($(this).data('arrows') === true) {
            arrows = true;
        }

        if ($(this).data('autoplay') === true) {
            autoplay = true;
        }

        if ($(this).data('autoplaySpeed')) {
            autoplaySpeed = $(this).data('autoplaySpeed');
        }

        if ($(this).data('dots') === true) {
            dots = true;
        }

        if ($(this).data('draggable') === true) {
            draggable = true;
        }

        if ($(this).data('fade') === true) {
            fade = true;
        }

        if ($(this).data('infinite') === true) {
            infinite = true;
        }

        if ($(this).data('pauseonhover') === true) {
            pauseOnHover = true;
        }

        if ($(this).data('slidestoscroll')) {
            slidesToScroll = $(this).data('slidestoscroll');
        }

        if ($(this).data('slidestoshow')) {
            slidesToShow = $(this).data('slidestoshow');
        }

        if ($(this).data('speed')) {
            speed = $(this).data('speed');
        }

        if ($(this).data('slidestoshowmedium') && $(this).data('slidestoshowsmall')) {
            let medium = $(this).data('slidestoshowmedium');
            let small = $(this).data('slidestoshowsmall')
            $(this).slick({
                arrows: arrows,
                autoplay: autoplay,
                autoplaySpeed: autoplaySpeed,
                dots: dots,
                draggable: draggable,
                fade: fade,
                infinite: infinite,
                pauseOnHover: pauseOnHover,
                slidesToScroll: slidesToScroll,
                slidesToShow: slidesToShow,
                speed: speed,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: medium,
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: small,
                        }
                    }
                ]
            })
            ;

        } else {
            $(this).slick({
                arrows: arrows,
                autoplay: autoplay,
                autoplaySpeed: autoplaySpeed,
                dots: dots,
                draggable: draggable,
                fade: fade,
                infinite: infinite,
                pauseOnHover: pauseOnHover,
                slidesToScroll: slidesToScroll,
                slidesToShow: slidesToShow,
                speed: speed
            });
        }


    });
});