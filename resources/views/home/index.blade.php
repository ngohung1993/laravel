<?php

use App\Helpers\FunctionHelpers;

?>
@section('title_and_meta')
    <title>CÔNG TY TNHH THIẾT KẾ WEB REDTIGER VIỆT NAM</title>
    <meta property="og:title" content="Công ty TNHH Công nghệ giải pháp phần mềm RedTiger">
    <meta property="og:description"
          content="Công ty TNHH Công nghệ Phần mềm RedTiger, Thiết kế website theo yêu cầu, Thiết kế ứng dụng phần mềm trên nền tảng web.">
    <meta property="og:url"
          content="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";?>">
    <meta property=”og:type” content=”website”/>
    <meta property=”og:image”
          content=”<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";?><?= isset(FunctionHelpers::get_custom_field_by_key('favicon')->value) ? FunctionHelpers::get_custom_field_by_key('favicon')->value : ''?>”/>

@endsection
@extends('layouts.home.main')

@section('content')
    <style>
        #wrapper .banner {
            position: relative;
            height: 576px;
            background: url("{{asset('advertises/bg-header.jpg')}}") no-repeat center center;
            background-size: cover;
        }

        #wrapper .content-header {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #wrapper .content-header h1 {
            color: #ffffff;
            text-transform: uppercase;
            font-weight: 400;
        }

        #wrapper .content-header p {
            color: #ffffff;
            font-size: 20px;
        }

        .home-wrapper .banner p.desc strong {
            color: #ffffff;
        }

        .slide-partner {
            background: #f4f4f4;
        }

        .home-wrapper .customers .customer-item img {
            opacity: 1;
        }

        .owl-carousel .owl-item img {
            width: auto;
        }

        @media (max-width: 1199px) and (min-width: 992px) {

            .home-wrapper {
                margin-top: 10px;
            }
        }
    </style>
    <div id="wrapper" class="clearfix">
        <div class="home-wrapper">
            <div class="banner">
                <div class="container content-header">
                    <h1>
                        Nền tảng quản lý nội dung đã lĩnh vực
                    </h1>
                    <p class="desc">
                        Đang có <strong>1.000</strong>+ doanh nghiệp, cửa hàng và nhà đầu tư bất động sản tin dùng
                    </p>
                    <a class="btn-registration" href="javascript:void(0);">
                        Dùng thử miễn phí
                    </a>
                    <div class="architecture d-none d-xl-block">
                        <img src="/cms/img/service.png" alt="Sapo Omnichannel">
                    </div>
                </div>
            </div>
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
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
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
                                            VNĐ</p>
                                    </div>
                                    <div class="theme-overlay overlay">
                                        <div class="button-group">
                                            <a href="<?=$value_pd['category']['slug']?>/<?=$value_pd['slug']?>"
                                               class="button btn--zozo btn-detail">
                                                Chi tiết
                                            </a>
                                            <a href="{{ url('theme-demo',['product_slug' => $value_pd['slug']]) }}"
                                               class="button btn--zozo btn-demo">Xem trước</a>
                                        </div>
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
            @include('home.section')
        </div>
    </div>
    <div id="fb-root"></div>
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
