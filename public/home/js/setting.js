$(document).ready(function () {
    goTop();
});

function goTop() {
    var top = $('#top');
    top.css("display", "none");
    $(window).bind('scroll', function () {
        if ($(window).scrollTop() >= 84) {
            $('#top').css("display", "block");
        } else $('#top').css("display", "none");
    });
    top.click(function () {
        $('html, body').animate({scrollTop: 0}, 'slow');
    });
}

$('.show-template').click(function () {
    reset_show();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '/' + 'admin/ajax/get-product-by-id',
        data: {id: $(this).data('id')},
        error: function () {
        },
        success: function (response) {
            if (response) {
                var item = $('.temp-item');
                var i;
                $('.select').attr('href', response[0]['link']);
                $('.btn-more a').first().attr('href', response[0]['link']);
                if (response[1].length >= 1) {
                    for (i = 0; i < response[1][0]['images'].length; i++) {
                        if (i == 0) {
                            $('.default-image').attr('src', response[1][0]['images'][i]['avatar']);
                        }
                        item.find('img').attr('src', response[1][0]['images'][i]['avatar']);
                        $('.desktop-images').append(item.html());
                    }
                }
                if (response[1].length >= 2) {
                    for (i = 0; i < response[1][1]['images'].length; i++) {
                        item.find('img').attr('src', response[1][1]['images'][i]['avatar']);
                        $('.mobile-images').append(item.html());
                    }
                }
            }
        }
    });
});
var show_image = function (event) {
    var src = $(event.target).attr('src');
    $('.default-image').attr('src', src);
};
$('.btn-ic-pc').click(function () {
    if (!$(this).hasClass('ic-active')) {
        $('.mobile-images').css('display', 'none');
        $('.desktop-images').css('display', 'block');
        $(this).addClass('ic-active');
        $('.btn-ic-mobile').removeClass('ic-active');
    }
});
$('.btn-ic-mobile').click(function () {
    if (!$(this).hasClass('ic-active')) {
        $('.mobile-images').css('display', 'block');
        $('.desktop-images').css('display', 'none');
        $(this).addClass('ic-active');
        $('.btn-ic-pc').removeClass('ic-active');
    }
});
$('.btnClose').click(function () {
    $('#myModal').modal('toggle');
});
var reset_show = function () {
    $('.default-image').attr('src', '');
    var mobile_images = $('.mobile-images');
    mobile_images.css('display', 'none');
    mobile_images.html('');
    var desktop_images = $('.desktop-images');
    desktop_images.css('display', 'block');
    desktop_images.html('');
    $('.btn-ic-pc').addClass('ic-active');
    $('.btn-ic-mobile').removeClass('ic-active');
};
$('.check-box').click(function () {
    var ct = '';
    var category_slug = $('.category-slug').val();
    $('.check-box:checkbox:checked').each(function () {
        ct += $(this).val() + ',';
    });
    window.location.replace(frontendUrl + category_slug + '?ct=' + ct);
});
$('.show-order').click(function () {
    var product_id = $(this).data('id');
    $('#product-id').val(product_id);
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: frontendUrl + 'admin/ajax/get-product-by-id',
        data: {id: product_id},
        error: function () {
        },
        success: function (response) {
            console.log(response);
            var product_link = $('.product-link');
            product_link.text(response[0]['title']);
            product_link.attr('href', response[0]['slug']);
            $('.product-avatar').attr('src', response[0]['avatar']);
            $('.product-name').text(response[0]['title']);
            $('.product-code').text(response[0]['website_code']);
            $('.product-old-price').text((response[0]['price'] * 1).toLocaleString());
            $('.product-sell-price').text((response[0]['price'] - response[0]['discount'] * response[0]['price'] / 100).toLocaleString());
            $('.product-discount').text(response[0]['discount'] + '%');
        }
    });
});
$('.send-order').click(function () {
    var error = 0;
    var full_name = $('#full-name');
    if (!full_name.val()) {
        error++;
        full_name.css('border', '1px solid #f56954');
    } else {
        full_name.css('border', '1px solid #ccc');
    }
    var phone = $('#phone');
    if (!phone.val()) {
        error++;
        phone.css('border', '1px solid #f56954');
    } else {
        phone.css('border', '1px solid #ccc');
    }
    var email = $('#email').val();
    var note = $('#note').val();
    var product_id = $('#product-id').val();
    if (error === 0) {
        $("#loader").css("display", "block");
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/' + 'admin/ajax/send-order',
            data: {full_name: full_name.val(), phone: phone.val(), email: email, note: note, product_id: product_id},
            error: function () {
            },
            success: function (response) {
                if (response) {
                    toastr["info"]("Đặt hàng thành công!");
                } else {
                    toastr["error"]("Rất tiếc đã có lỗi xảy ra!");
                }
                $("#loader").css("display", "none");
            }
        });
    } else {
        toastr["error"]("Vui lòng nhập đầy đủ thông tin!");
    }
});