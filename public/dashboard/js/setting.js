const toast = swal.mixin({
    toast: true,
    position: 'top-right',
    showConfirmButton: false,
    timer: 3000
});

slugify = function (str) {
    str = str.replace(/^\s+|\s+$/g, '');
    str = str.toLowerCase();

    let from = "àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđñç·/_,:;";
    let to = "aaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyydnc------";
    for (let i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    return str.replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
};

let myCheckbox = $("[name='switch-checkbox']");

let loading = $('.loading');

$(document).ready(function () {
    $('select').select2();
});

myCheckbox.bootstrapSwitch();

myCheckbox.on('switchChange.bootstrapSwitch', function () {
    loading.css('display', 'block');

    $.ajax({
        url: $(this).data('api'),
        type: 'post',
        data: {
            id: $(this).data('id'),
            table: $(this).data('table'),
            api: $(this).data('api'),
            column: $(this).data('column')
        },
        success: function (response) {
            loading.css('display', 'none');

            if (response) {
                toast({
                    type: 'success',
                    title: 'Cập nhật thông tin thành công.'
                });
            }
        }
    });
});

$('.tags').tagsinput();

$('.kv-file-drop-zone').change(function () {

    loading.css('display', 'block');

    let fd = new FormData();

    let auto = $(this).data('auto');

    let id = $(this).data('id');

    let column_parent_id = $(this).data('column-parent-id');

    let files = event.target.files;

    for (let i = 0; i < files.length; i++) {
        fd.append('files[]', files[i]);
    }

    if (files) {
        $.ajax({
            url: '/uploads/upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {

                if (response.length !== 0) {
                    if (auto === 1) {
                        $.ajax({
                            url: '/api/ajax/upload-image',
                            type: 'post',
                            data: {
                                images: JSON.stringify(response),
                                id: id,
                                column_parent_id: column_parent_id
                            },
                            success: function () {
                                console.log(1);
                                loading.css('display', 'none');
                            }
                        });
                    }

                    for (let i = 0; i < response.length; i++) {
                        let children = $('#list-img-temp');

                        children.children().children().find('img').attr('src', '/advertises/' + response[i]);
                        children.find('.caption').html(response[i]);
                        $('#list-img').append(children.html());
                    }
                }

                loading.css('display', 'none');
            }
        });
    }

    loading.css('display', 'none');

});

let deleteFile = function (event) {

    loading.css('display', 'block');

    let auto = 0;
    let id = 0;

    if ($(event.target).is('i')) {
        auto = $(event.target).parent().data('auto');
        id = $(event.target).parent().data('id');
    }
    else {
        auto = $(event.target).data('auto');
        id = $(event.target).data('id');
    }

    let url = $(event.target).closest(".file-preview-frame").find('img').attr('src');

    let r = confirm('Bạn có chắc chắn muốn xóa ' + url);

    if (r === true) {
        $.ajax({
            url: '/uploads/delete.php',
            type: 'post',
            data: {path: url},
            success: function () {
                $(event.target).closest(".file-preview-frame").remove();
                console.log(1);
                if (auto) {

                    $.ajax({
                        url: '/uploads/delete.php',
                        type: 'post',
                        data: {id: id},
                        success: function () {
                            $(event.target).closest(".file-preview-frame").remove();


                            if (auto) {
                                $.ajax({
                                    url: '/api/ajax/delete-image',
                                    type: 'post',
                                    data: {id: id},
                                    success: function () {

                                        loading.css('display', 'none');
                                    }
                                });

                                loading.css('display', 'none');
                            }
                        }
                    });
                }

                loading.css('display', 'none');
            }
        });
    }
    else {
        loading.css('display', 'none');
    }
};

let getImages = function () {
    let images = [];

    $('#list-img').find('.kv-file-content img').each(function () {

        let url = $(this).attr('src');

        images.push(url);

    });

    $('#images').val(JSON.stringify(images));

};

let manage_sidebar = function () {
    let e = $("body"), t = $(".navigation"), a = $(".sidebar-content");
    t.find("li.active").parents("li").addClass("active");
    t.find("li").has("ul").children("a").parent("li").addClass("has-ul");
    $(document).on("click", ".sidebar-toggle.hidden-xs", function (o) {
        o.preventDefault();
        e.toggleClass("sidebar-narrow");
        e.toggleClass("page-sidebar-closed");

        if (e.hasClass("sidebar-narrow")) {
            t.children("li").children("ul").css("display", "");
            a.hide().delay().queue(function () {
                $(this).show().addClass("animated fadeIn").clearQueue();
            });
        }
        else {
            t.children("li").children("ul").css("display", "none");
            t.children("li.active").children("ul").css("display", "block");
            a.hide().delay().queue(function () {
                $(this).show().addClass("animated fadeIn").clearQueue();
            });
        }
    })
};

manage_sidebar();

$(".page-sidebar-menu").on("click", "li > a.nav-toggle, li > a > span.nav-toggle", function (a) {
    let o = $(this).closest(".nav-item").children(".nav-link");
    let i = o.next().hasClass("sub-menu");

    if (i) {
        let n = o.parent().parent(), s = o, r = $(".page-sidebar-menu"), l = o.next(),
            d = r.data("auto-scroll"), c = parseInt(r.data("slide-speed"));
        r.data("keep-expanded") || (n.children("li.open").children("a").children(".arrow").removeClass("open"), n.children("li.open").children(".sub-menu:not(.always-open)").slideUp(c), n.children("li.open").removeClass("open"));
        l.is(":visible") ? ($(".arrow", s).removeClass("open"), s.parent().removeClass("open"), l.slideUp(c, function () {
        })) : i && ($(".arrow", s).addClass("open"), s.parent().addClass("open"), l.slideDown(c, function () {
        }));

        a.preventDefault();
    }
});

$('.form-group').each(function () {
    if ($(this).hasClass('required')) {
        $(this).find('.control-label').append('<b style="color: red;" > *</b>');
    }
});

$('.counter').keyup(function () {

    let content = $(this).val();

    let counter = $(this).attr('data-counter');

    $(this).closest('.parent').find('small span').text(content.length);
});

$('.title-preview').keyup(function () {

    let content = $(this).val();

    $('.page-title-seo').text(content);
});

$('.description-preview').keyup(function () {

    let content = $(this).val();

    $('.page-description-seo').text(content);
});

$('.btn-trigger-show-seo-detail').click(function () {
    $('.' + $(this).data('class')).removeClass('hidden');
});

$('.btn-show-table-options').click(function (t) {
    t.preventDefault();
    $(t.currentTarget).closest(".table-wrapper").find(".table-configuration-wrap").slideToggle(400);
});

$('#check-all').change(function () {
    let all = false;

    if ($(this).is(":checked")) {
        all = true;
    }

    $('table tbody').find('input').each(function () {
        $(this).prop('checked', all);
    });
});

$('form').each(function () {
    $(this).validate({
        errorElement: 'div',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            console.log(error);
            if (element.parent('.input-group').length ||
                element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                error.insertAfter(element.parent());
            } else {
                $(element).closest('.form-group').append(error);
            }
        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
        },
        success: function (element) {
            $(element).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
        },
        focusInvalid: false,
        rules: {
            "title": {"laravelValidation": [["Required", [], "Title không được để trống.", true]]},
            "page_id": {"laravelValidation": [["Required", [], "Page ID không được để trống.", true]]},
            "category_id": {"laravelValidation": [["Required", [], "Category ID không được để trống.", true]]},
            "slug": {"laravelValidation": [["Required", [], "Slug không được để trống.", true]]},
        }
    });
});

$('body').on("focusout", "input[name=title]", function () {

    let title = $('#editable-title');
    if (!title.text()) {
        title.text(slugify($(this).val()));
        $('#new-slug').val(slugify($(this).val()));
        $('#current-slug').val(slugify($(this).val()));

        if ($(this).val()) {
            $('#edit-slug-box').removeClass('hidden');
        }
        else {
            $('#edit-slug-box').toggleClass('hidden');
        }
    }

    let slug = $('.page-slug-seo');

    if (!slug.text()) {
        title.text(slugify($(this).val()));

        slug.text(slugify($(this).val()));

        $('#seo-title').val($(this).val());
        $('.page-title-seo').text($(this).val());

        $('.existed-seo-meta').removeClass('hidden');
    }
});

$('#change-slug').click(function () {
    let permalink = $('#sample-permalink');
    permalink.find('.permalink').toggleClass('hidden');
    permalink.find('.default-slug').toggleClass('hidden');

    $('#btn-ok').toggleClass('hidden');
    $('#btn-cancel').toggleClass('hidden');

    $(this).toggleClass('hidden');
});

$('#btn-cancel').click(function () {
    let permalink = $('#sample-permalink');
    permalink.find('.permalink').toggleClass('hidden');
    permalink.find('.default-slug').toggleClass('hidden');

    $('#btn-ok').toggleClass('hidden');
    $('#change-slug').toggleClass('hidden');

    $(this).toggleClass('hidden');
});

$('#btn-ok').click(function () {
    let new_slug = $('#new-slug');

    new_slug.val(slugify(new_slug.val()));

    $('#editable-title').text(new_slug.val());
    $('#current-slug').val(new_slug.val());

    let permalink = $('#sample-permalink');
    permalink.find('.permalink').toggleClass('hidden');
    permalink.find('.default-slug').toggleClass('hidden');

    $('#btn-cancel').toggleClass('hidden');
    $('#change-slug').toggleClass('hidden');

    $(this).toggleClass('hidden');
});
