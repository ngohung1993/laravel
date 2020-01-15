<?php
use App\Helpers\FunctionHelpers;


?>




@extends('layouts.home.theme')

@section('content')

    <style>
        #result .category {
            width: 60%;
        }
        #result .price {
            width: 38%;
        }

        @media (max-width: 1199px) and (min-width: 992px){
            .menu-toolbar .filter-desktop ul li {
                margin-right: 20px;
            }
            .menu-toolbar .filter-form .sort-theme{
                margin-left: 0;
            }
            .home-wrapper {
                margin-top: 10px !important;
            }
        }
        @media (max-width: 991px) and (min-width: 784px){
            .footer-page .box-support-footer{
                display: flex;
                justify-content: center;
            }

        }

    </style>

    <div class="index-container">
        <div class="index-title login-box">
            <div class="container">
                <h1><span>400+ giao diện,</span> template website bán hàng cực đẹp</h1>
            </div>
        </div>
        <div class="feature-themes">
            <div class="container">
                <div class="swiper-container swiper-container-fade swiper-container-horizontal">
                    <div class="swiper-wrapper" style="transition-duration: 0ms;">
                        <?php foreach (FunctionHelpers::get_products(3, 1, 1) as $key_pd => $value_pd) :?>
                        <div class="swiper-slide feature-item swiper-slide-next" data-swiper-slide-index="<?= $key_pd?>"
                             style="width: 1140px; opacity: 0; transform: translate3d(-3420px, 0px, 0px); transition-duration: 0ms;">
                            <div class="row">
                                <div class="col-lg-4 col-md-5 col-12 feature-info order-1 order-md-2">
                                    <div class="title">
                                        <?= $value_pd['description']?>
                                        <span><?= $value_pd['title']?></span>
                                    </div>
                                    <div class="other-info clearfix">
                                            <span class="rating">
                                                <img src="home/img/5-star.png" alt="rate">
                                            </span>
                                        <span class="price ">
                                                <b style="color: red"><?= number_format($value_pd["price"], 0, '.', '.') ?>
                                                    VNĐ</b>

                                            </span>
                                    </div>
                                    <div class="button">
                                        <a class="preview action-preview-theme" href="">Xem thử</a>
                                        <a class="view-detail" href="">Chi tiết</a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-7 col-xs-12 feature-image order-2 order-md-1">
                                    <div class="image-desktop">
                                        <a href="" class="action-preview-theme">
                                            <img src="<?= $value_pd['image'][0]['avatar']?>"
                                                 alt="<?= $value_pd['title']?>">
                                        </a>
                                    </div>
                                    <div class="image-mobile d-none d-md-block">
                                        <a href="" class="action-preview-theme">
                                            <img src="<?= $value_pd['image'][1]['avatar']?>"
                                                 alt="<?= $value_pd['title']?>">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>

                    </div>
                    <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            </div>
            <script type="text/javascript">
                $(function () {
                    let featureSlide = new Swiper('.swiper-container', {
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        slidesPerView: 1,
                        paginationClickable: true,
                        preventClicks: false,
                        preventClicksPropagation: false,
                        loop: true,
                        autoplay: 5000,
                        effect: 'fade',
                        fade: {
                            crossFade: true
                        }
                    });
                });
            </script>
        </div>
        <div class="menu-toolbar">
            <div class="container">
                <div class="filter-desktop d-none d-md-flex">
                    <div class="col-lg-8 col-md-11 menu">
                        <ul>
                            <li id="all-theme"><a href="">Tất cả</a></li>
                            <li id="free-theme"><a href="">Miễn phí</a></li>
                            <li id="paid-theme"><a href="">Trả phí</a></li>
                            <li class="has-child">
                                <a href="javascript:void(0)">Bán hàng</a>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                <ul class="sub-menu clearfix">
                                    <li>
                                        <a href="">
                                            <span>Công nghệ - Kỹ thuật số</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span>Thiết bị điện</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span>Thời trang - Trang sức</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span>Thực phẩm - Nhà hàng</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span>Thể thao - Dịch vụ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span>Nội thất - Trang trí văn phòng</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span>Sinh hoạt - Gia dụng</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span>Sách thiết bị giáo dục</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span>Bất động sản - Xây dựng</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span>Thủ công - Mỹ nghệ - Quà tặng</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span>Ô tô - Xe máy</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span>Khác</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-child">
                                <a href="javascript:void(0)">Doanh nghiệp</a>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="">
                                            <span>Nhà hàng - Khách sạn - Du lịch</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span>Bất động sản - Xây dựng</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span>Doanh nghiệp</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li id="mobile-theme"><a href="">Mobile</a></li>
                            <li class="d-inline-block d-md-none">
                                <form action="" novalidate="novalidate">
                                    <input type="text" placeholder="Tìm kiếm giao diện ..." name="key"
                                           class="search-key">
                                    <button><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-1 d-none d-md-block">
                        <a class="show-search-tablet d-none d-md-block d-lg-none visible-sm" href="javascript:;">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <i class="fa fa-times" style="display: none;" aria-hidden="true"></i>
                        </a>
                        <div class="filter-form">
                            <div class="sort-theme" href="#">
                                <i class="fa fa-sort-amount-asc d-none d-lg-inline-block" aria-hidden="true"></i>
                                <div class="sort-by">
                                    <ul>
                                        <li data-sort="id" class="">Mới nhất</li>
                                        <li data-sort="price-asc">Giá từ thấp đến cao</li>
                                        <li data-sort="price-desc">Giá từ cao đến đến thấp</li>
                                        <li data-sort="alpha-asc">Tên A - Z</li>
                                        <li data-sort="alpha-desc">Tên Z - A</li>
                                        <li data-sort="discount-asc">Bán chạy nhất</li>
                                    </ul>
                                </div>
                            </div>
                            <form action="/search" novalidate="novalidate">
                                <input type="text" placeholder="Bạn tìm giao diện gì?" name="key" class="search-key">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="filter-mobile d-flex d-md-none">
                    <div class="col-12">
                        <div class="title-filter-mobile">Lọc theo...</div>
                        <a class="show-search-form" href="javascript:void(0)">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <i class="fa fa-times" style="display: none;" aria-hidden="true"></i>
                        </a>
                        <div class="search-form-mobile">
                            <form action="" novalidate="novalidate">
                                <input type="text" placeholder="Tìm kiếm giao diện ..." name="key" class="search-key">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <div class="filter-by">
                            <ul>
                                <li id="all-theme"><a href="">Tất cả</a></li>
                                <li id="free-theme"><a href="">Miễn phí</a></li>
                                <li id="paid-theme"><a href="">Trả phí</a></li>
                                <li class="has-child">
                                    <a>Ngành nghề</a>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    <ul class="sub-menu clearfix">
                                        <li>
                                            <a href="">
                                                <span>Công nghệ - Kỹ thuật số</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span>Thiết bị điện</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span>Thời trang - Trang sức</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span>Thực phẩm - Nhà hàng</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span>Thể thao - Dịch vụ</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span>Nội thất - Trang trí văn phòng</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span>Sinh hoạt - Gia dụng</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span>Sách thiết bị giáo dục</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span>Bất động sản - Xây dựng</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span>Thủ công - Mỹ nghệ - Quà tặng</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span>Ô tô - Xe máy</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span>Khác</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(function () {
                    $(".show-search-form").click(function () {
                        $(".search-form-mobile").toggle();
                        $(".show-search-form .fa-search").toggle();
                        $(".show-search-form .fa-times").toggle();
                    });

                    $(".show-search-tablet").click(function () {
                        $(this).parent().find(".filter-form").toggle();
                        $(".show-search-tablet .fa-search").toggle();
                        $(".show-search-tablet .fa-times").toggle();
                    });

                    $(".title-filter-mobile").click(function () {
                        $(".filter-mobile .filter-by").toggle();
                    });

                    $(".filter-mobile .filter-by .has-child").click(function () {
                        $(this).find(".sub-menu").toggle();
                    });

                    var price = getParameterByName("price");
                    if (price == "all") {
                        $("#all-theme").addClass("active");
                    }
                    else if (price == "free") {
                        $("#free-theme").addClass("active");
                    }
                    else if (price == "paid") {
                        $("#paid-theme").addClass("active");
                    }

                    var collection = getParameterByName("collection");
                    if (collection == 40) {
                        $("#mobile-theme").addClass("active");
                    }

                    var sort = getParameterByName("sort");
                    $(".sort-by li").removeClass("active");
                    $(".sort-by li[data-sort='" + sort + "']").addClass("active");

                    $(".sort-by li").click(function () {
                        $(".sort-by li").removeClass("active");
                        $(this).addClass("active");
                        var sort = $(this).attr("data-sort");
                        var queryString = window.location.search;
                        var url = "/search" + queryString;
                        url = setParameter(url, "sort", sort);
                        window.location.href = url;
                    });

                    var key = getParameterByName("key");
                    if (key != "") {
                        $(".filter-form input[name='key']").val(key);
                    }
                });
            </script>
        </div>
    </div>
    <div id="wrapper" class="clearfix">
        <div class="home-wrapper">
            <div class="themes-list">
                <div class="container">
                    <div class="customers" style="background: none;padding: 80px 0 0 0;">
                        <h2>Giao diện nổi bật</h2>
                        <p class="desc" style="margin-bottom: 0;">
                            Những giao diện được đánh giá và dùng nhiều nhất chia theo từng lĩnh vực
                            kinh doanh, bạn được tùy thích chọn và sử dụng kho giao diện hoàn toàn miễn phí
                        </p>
                    </div>
                    <div id="result">
                        <div class="row">
                            <?php foreach (FunctionHelpers::get_products(9, 0, 1) as $key_pd => $value_pd) :?>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 text-center">
                                <div class="themes-item bg-white">
                                    <div class="theme-overlay image"><img
                                                src="<?=$value_pd["avatar"]?>"
                                                alt="<?=$value_pd["title"]?>"></div>
                                    <p class="text-left name"><a href=""
                                                                 title="<?=$value_pd["title"]?>"><?=$value_pd["title"]?></a>
                                    </p>
                                    <div class="theme-spec text-left"><p class="category"
                                                                         title="<?= strip_tags($value_pd["description"])?>"><?=strip_tags($value_pd["description"])?></p>
                                        <p class="price text-right"
                                           style="font-weight: 700;white-space: nowrap"><?= number_format($value_pd["price"], 0, '.', '.') ?>
                                            VNĐ</p></div>
                                    <div class="theme-overlay overlay">
                                        <div class="button-group"><a href=""
                                                                     class="button btn--zozo btn-detail">Chi
                                                tiết</a> <a href=""
                                                            class="button btn--zozo btn-demo">Xem trước</a></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>

                        </div>
                    </div>
                    <div class="row command mm-load-more">
                        <a href="" class="btn-registration"><span>Xem thêm</span></a>
                    </div>
                </div>
            </div>
            <div class="register-bottom clearfix">
                <div class="container">
                    <h4>Bắt đầu dùng thử 15 ngày</h4>
                    <p>Để trải nghiệm nền tảng quản lý và bán hàng đa kênh được sử dụng nhiều nhất Việt Nam</p>
                    <div class="reg-form">
                        <input id="site_name_bottom" class="input-site-name d-none d-md-inline-block hidden-xs"
                               type="text" value="" placeholder="Nhập tên cửa hàng/doanh nghiệp của bạn" onkeypress="">
                        <a class="btn-registration banner-home-registration" onclick="" href="javascript:void(0)">Dùng
                            thử miễn phí</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .menu_footer li {
            text-align: left;
        }

        .input-group {
            position: relative;
            display: table;
            border-collapse: separate;
            width: 100% !important;
        }

        .subscribe-form .form-control {
            margin-top: 8px;
            background: #fff;
            padding: 10px;
            height: 35px;
            font-size: 13px;
            font-style: italic;
        }

        .input-group-btn {
            position: relative;
            font-size: 0;
            white-space: nowrap;
        }

        .subscribe-form .input-group-btn > .btn {
            background: #ffa800;
            border: 1px solid #ffa800;
            color: #fff;
            height: 35px;
            font-size: 16px;
            text-transform: uppercase;
            padding: 6px 6px;
        }

        @media screen and (max-width: 600px) {
            .subscribe-form .input-group .form-control {
                margin-top: 0;
                margin-bottom: 10px;
            }

            .subscribe-form .input-group-btn > .btn {
                margin-bottom: 10px;
            }
        }

    </style>


    <style>

        .footer-page {
            background: #383c45;
            float: left;
            width: 100%;
            padding: 40px 0 30px 0;
        }

        .img-footer-support {
            margin-right: 15px;
            float: left;
        }

        .img-footer-support img {
            margin-top: 10px;
        }

        .content-footer-support p {
            font-size: 13px;
            margin-bottom: 5px;
            color: #c0c0c0;
        }

        .content-footer-support a {
            font-size: 20px;
            color: #ddd;
            text-shadow: 1px 2px 2px #002e3a;
        }

        .content-footer-support a:hover {
            text-decoration: none;
        }

        .content-footer-support span {
            font-size: 20px;
            color: #ddd;
            text-shadow: 1px 2px 2px #002e3a;
        }

        .menu-footer {
            float: left;
            width: 100%;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #333;
        }

        .menu-footer h2 {
            font-size: 15px;
            color: #ddd;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .menu-footer h1 {
            color: #c0c0c0;
            margin-bottom: 15px;
            text-transform: uppercase;
            font-size: 14px;
        }

        .menu-footer p, .menu-footer a {
            color: #c0c0c0;
            line-height: 25px;
            width: 100%;
            font-size: 13px;
        }

        .copyright {
            float: left;
            width: 100%;
            background: #212327;
        }

        .copyright p {
            float: left;
            color: #c0c0c0;
            padding: 12px 0;
        }

        .copyright p a {
            color: #fff;
        }

        @media screen and (max-width: 767px) {
            .img-footer-support {
                margin-left: 0 !important;
            }

            .box-support-footer {
                margin: 10px 0 !important;
            }
        }
    </style>

    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <style>
        .callus {
            background: #006bbb;
            position: fixed;
            height: 40px;
            line-height: 40px;
            padding: 0 20px 0 0;
            border-radius: 40px;
            color: #fff;
            z-index: 99999;
            opacity: .9;
            right: 50px;
            bottom: 5px;
            cursor: pointer;
        }

        .callus i {
            background: #006bbb url(/cms/img/i_phone.png) no-repeat 4px 4px;
            border-radius: 100%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
            display: block;
            float: left;
        }

        .callus a {
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            text-shadow: 1px 1px 0 #000;
            cursor: pointer;
        }

        .hot-line_text {
            font-size: 15px;
            padding-right: 10px;
            font-weight: normal;
        }

        @media (min-width: 360px) {
            .hot-line_text {
                font-size: 13px;
                padding-right: 10px;
                font-weight: normal;
            }

            .callus i {
                background: #006bbb url({{asset('dashboard/img/i_phone.png')}}) no-repeat 4px 4px;
                border-radius: 100%;
                width: 40px;
                height: 40px;
                margin-right: 10px;
                display: block;
                float: left;
            }

            .callus {
                background: #006bbb;
                position: fixed;
                height: 40px;
                line-height: 40px;
                padding: 0 20px 0 0;
                border-radius: 40px;
                color: #fff;
                z-index: 99999;
                opacity: .9;
                right: 5px;
                bottom: 5px;
                cursor: pointer;
            }

        }
    </style>

    <div class="callus">
        <i class="i_phone">
            <span style="display:none;">.</span>
        </i>
        <a href="tel:0967048347">
            <span class="hot-line_text">HOTLINE TƯ VẤN: </span>
            0967 048 347
        </a>
    </div>


    <style>
        body.open {
            overflow: hidden;
        }

        #free-trial {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
            z-index: 2147483640;
        }

        #free-trial .close {
            font-size: 35px;
            color: #fff;
            text-shadow: none;
            opacity: 0.6;
            position: absolute;
            top: 30px;
            right: 30px;
            display: block;
            z-index: 99;
        }

        #free-trial .close:hover {
            opacity: 1;
        }

        #free-trial iframe {
            border: none;
            display: block;
            position: relative;
            height: 100%;
            z-index: 1;
        }

        @media (min-width: 768px) and (max-width: 991px) {
            #free-trial .close {
                color: #000;
                font-size: 30px;
                padding: 15px;
                top: 0;
                right: 0;
            }
        }

        @media (max-width: 767px) {
            body.open {
                overflow: auto;
            }

            body.open #container > div:not(#free-trial) {
                display: none;
            }

            body.open #free-trial {
                position: relative;
                height: 100vh;
            }

            #free-trial .close {
                color: #000;
                font-size: 20px;
                padding: 15px;
                top: 0;
                right: 0;
            }
        }
    </style>

    <!-- Banner marketing -->
    <style type="text/css">
        .tiger-cms-advertiser {
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 999;
        }

        .tiger-cms-advertiser a {
            outline: none;
        }

        .tiger-cms-advertiser .popup-adv {
            position: relative;
        }

        .tiger-cms-advertiser .popup-adv i {
            z-index: 99;
            color: #333;
            font-size: 24px;
            cursor: pointer;
            height: 15px;
            width: 15px;
            line-height: 15px;
        }

        .tiger-cms-advertiser .popup-adv .hide-popup {
            position: absolute;
            right: -5px;
            top: 0;
        }

        .tiger-cms-advertiser .popup-adv .hide-popup.active {
            top: 0;
            right: 0;
        }
    </style>


@endsection
