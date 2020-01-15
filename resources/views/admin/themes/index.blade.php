<?php

/* @var $classifieds array App\Posts */

?>

@extends('layouts.admin.main')

@section('content')
    <style>
        .theme-preview {
            position: relative;
            margin-bottom: -2rem;
            width: 85%;
        }

        .annotated-section-title h2 {
            color: #212b35;
            font-weight: 600 !important;
            font-size: 14px !important;
        }
    </style>

    <div class="page-content " style="min-height: 602px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= url('admin/dashboard') ?>">Bảng điều khiển</a>
            </li>
            <li class="breadcrumb-item active">Giao diện</li>
        </ol>
        <div class="clearfix"></div>
        <div>
            <div class="flexbox-annotated-section">
                <div class="flexbox-annotated-section-annotation">
                    <div class="annotated-section-title pd-all-20">
                        <h2>Giao diện hiện tại</h2>
                    </div>
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <p class="color-note">
                            Khách hàng sẽ thấy giao diện này khi họ xem website của bạn.
                        </p>
                    </div>
                </div>
                <div class="flexbox-annotated-section-content">
                    <div class="wrapper-content pd-all-20">
                        <div class="published-themes">
                            <section class="ui-card">
                                <div class="ui-card__section published-theme">
                                    <div class="ui-type-container">
                                        <div class="ui-stack published-theme__stack">
                                            <div class="ui-stack-item ui-stack-item--fill">
                                                <h3 class="ui-heading published-themes__title">Default</h3>
                                                <p class="published-theme__meta">
                                                </p>
                                            </div>
                                            <div class="published-theme__actions">
                                                <a href="<?= url('admin/themes/editor') ?>" class="btn btn-primary">
                                                    <span class="fa fa-paint-brush"></span>
                                                    Thiết lập giao diện
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui-card__section ui-section--theme-previews">
                                    <div class="ui-type-container">
                                        <div class="theme-preview ">
                                            <img class="theme-preview__desktop-frame"
                                                 src="{{asset('vendor/img/laptop-frame.png')}}">
                                            <div class="theme-preview__overlay">
                                                <iframe class="theme-preview__iframe theme-preview__iframe--desktop"
                                                        src="<?= url('/') ?>"
                                                        sandbox="allow-scripts allow-same-origin" scrolling="no"
                                                        tabindex="-1" style="transform: scale(0.392241);"></iframe>
                                            </div>
                                        </div>
                                        <div class="theme-preview--mobile">
                                            <img alt="" class="theme-preview__desktop-frame"
                                                 src="{{asset('vendor/img/phone-frame.png')}}">
                                            <div class="theme-preview__overlay theme-preview__overlay--mobile">
                                                <iframe class="theme-preview__iframe theme-preview__iframe--mobile"
                                                        src="<?= url('/') ?>"
                                                        sandbox="allow-scripts allow-same-origin" scrolling="no"
                                                        tabindex="-1" style="transform: scale(0.368571);"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flexbox-annotated-section">
                <div class="flexbox-annotated-section-annotation">
                    <div class="annotated-section-title pd-all-20">
                        <h2>Thêm giao diện</h2>
                    </div>
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <p class="color-note">
                            Quản lý các giao diện của cửa hàng. Thêm và áp dụng giao diện cho cửa hàng của bạn.
                        </p>
                        <hr>
                        <button class="btn btn-secondary" type="button">
                            <span class="fa fa-upload"></span>
                            <span>Tải lên giao diện</span>
                        </button>
                    </div>
                </div>
                <div class="flexbox-annotated-section-content">
                    <div class="wrapper-content pd-all-20">
                        <div class="ui-annotated-section">
                            <div class="ui-annotated-section__content">
                                <section class="ui-card">
                                    <div class="ui-card__section">
                                        <div class="ui-type-container">
                                            <ul class="themes-list">
                                                <li class="themes-list__row">
                                                    <div class="ui-stack ui-stack--alignment-leading">
                                                        <div class="ui-stack-item ui-stack-item--fill">
                                                            <div class="ui-stack ui-stack--wrap">
                                                                <div
                                                                    class="ui-stack-item themes-list__info themes-list__info--header">
                                                                    Giao diện
                                                                </div>
                                                                <div
                                                                    class="ui-stack-item themes-list__date themes-list__info--header">
                                                                    Lần sửa cuối
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ui-stack-item themes-list__actions">
                                                            &nbsp;
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="themes-list__row">
                                                    <div
                                                        class="ui-stack ui-stack--alignment-leading theme-list__flex-container">
                                                        <div class="ui-stack-item ui-stack-item--fill">
                                                            <div class="ui-stack ui-stack--wrap">
                                                                <div class="ui-stack-item themes-list__info">
                                                                    <p class="themes-list__theme-title">
                                                                        DefaultTheme
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="ui-stack-item themes-list__date themes-list__date--empty">
                                                                    <p>02/11/2018 11:53</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ui-stack-item themes-list__actions">
                                                            <a class="themes-list__customize btn btn-primary"
                                                               href="<?= url('admin/themes/editor') ?>">
                                                                Thiết lập
                                                                <span class="fa fa-external-link"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </section>
                                <section class="ui-card">
                                    <div class="ui-card__section">
                                        <div class="ui-type-container">
                                            <ul class="find-themes-list">
                                                <li class="find-themes-list__row">
                                                    <div class="ui-stack ui-stack--alignment-leading">
                                                        <div
                                                            class="ui-stack-item find-themes-list__row-avatar find-themes-list__row-avatar--purple">
                                                        <span style="color: #fff;font-size: 20px;"
                                                              class="fa fa-bookmark-o"></span>
                                                        </div>
                                                        <div class="ui-stack-item ui-stack-item--fill">
                                                            <div class="ui-stack ui-stack--wrap">
                                                                <div
                                                                    class="ui-stack-item find-themes-list__row-title-description">
                                                                    <h3 class="ui-heading">Giao diện đã mua</h3>
                                                                    <p>
                                                                        Danh sách các giao diện đã được mua cho website.
                                                                    </p>
                                                                </div>
                                                                <div class="ui-stack-item find-themes-list__row-action">
                                                                    <a href="" class="btn btn-secondary"
                                                                       style="width: 165px;">
                                                                        Giao diện đã mua
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="find-themes-list__row">
                                                    <div class="ui-stack ui-stack--alignment-leading">
                                                        <div
                                                            class="ui-stack-item find-themes-list__row-avatar find-themes-list__row-avatar--green">
                                                        <span style="color: #fff;font-size: 20px;"
                                                              class="fa fa-shopping-cart"></span>
                                                        </div>
                                                        <div class="ui-stack-item ui-stack-item--fill">
                                                            <div class="ui-stack ui-stack--wrap">
                                                                <div
                                                                    class="ui-stack-item find-themes-list__row-title-description">
                                                                    <h3 class="ui-heading">Kho giao diện</h3>
                                                                    <p>
                                                                        Xem thêm các giao diện khác trên kho giao diện
                                                                        của
                                                                        chúng tôi.
                                                                    </p>
                                                                </div>
                                                                <div class="ui-stack-item find-themes-list__row-action">
                                                                    <a href="" class="btn btn-secondary"
                                                                       style="width: 165px;">
                                                                        Kho giao diện
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-footer">
            <div class="page-footer-inner">
                <div class="row">
                    <div class="col-md-6">
                        Bản quyền 2018 © Tigerweb Technologies. Phiên bản:
                        <span>2.0</span>
                    </div>
                    <div class="col-md-6 text-right">
                        Trang tải xong trong 0.4s
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
