$(document).ready(function () {
    $(window).scroll(function () {
        if ($(window).scrollTop() > 700) {
            $('.scroll-top').show();
        }
        else {
            $('.scroll-top').hide();
        }
    });
    $('.scroll-top').click(function () {
        $("html, body").animate({scrollTop: 0}, "slow");
    });
    if ($(window).width() < 768) {
        $('.scroll-top').css({'bottom': '90px', 'right': '8px'});
    }
});
