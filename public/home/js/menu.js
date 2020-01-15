$(document).ready(function () {
    $('.show-sub').click(function () {
        rotateArrow($(this));
    });
});

function rotateArrow(clickElement) {
    if (!$(clickElement).find('.show').length) {
        $(clickElement).find('.btn-down').css({
            '-moz-transform': 'rotate(90deg)',
            '-webkit-transform': 'rotate(90deg)',
            '-o-transform': 'rotate(90deg)',
            '-ms-transform': 'rotate(90deg)',
            'transform': 'rotate(90deg)'
        });
    }
    else {
        $(clickElement).find('.btn-down').css({
            '-moz-transform': 'rotate(0deg)',
            '-webkit-transform': 'rotate(0deg)',
            '-o-transform': 'rotate(0deg)',
            '-ms-transform': 'rotate(0deg)',
            'transform': 'rotate(0deg)'
        });
    }
}

function isVisibleScrollbar() {
    var offset = $("#header").offset();
    var curWin = $(window);
    var top = curWin.scrollTop() - 51;
    if (top >= 0)
        return true;
    return false;
}

function openMenu() {
    $('body').css('overflow', 'hidden');
    $('.overlay-menu').addClass('show');
    $('.menu-mobile').addClass('show');
}

function closeMenu() {
    $('body').css('overflow', '');
    $('.overlay-menu').removeClass('show');
    $('.menu-mobile').removeClass('show');
}

