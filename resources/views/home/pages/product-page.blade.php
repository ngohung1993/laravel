<?php
use App\Helpers\FunctionHelpers;
?>
@extends('layouts.home.main')
@push('product-page')
    <link rel="stylesheet" href="/home/css/index.min.css">
@endpush
@section('content')
    <div class="index-container" style="margin-top: 97px">
        <div class="index-title login-box">
            <div class="container">
                <h1><span>400+ giao diện,</span> template website bán hàng cực đẹp</h1>
            </div>
        </div>
        <div class="favorite-themes">
            <div class="container">
                <h2>Top giao diện nổi bật</h2>
                <p class="desc">Những giao diện được nhiều người dùng nhất</p>
                <div class="row">
                    <?php foreach (FunctionHelpers::get_products_by_category_id($category['id'], 3, 1, 0) as $key => $value):?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ">
                        <div class="theme-item responsive">
                            <div class="theme-image">
                                <img src="<?= $value['avatar']?>"
                                     alt="<?= $value['title']?>">
                                <div class="theme-action">
                                    <div class="button">
                                        <a href="<?= url('theme-demo', ['product_slug' => $value['slug']])?>"
                                           class="view-demo action-preview-theme"
                                           target="_blank">
                                            Xem trước
                                        </a>
                                        <a href="{{url("{$category['slug']}/{$value['slug']}")}}"
                                           class="view-detail">
                                            Chi tiết
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="theme-info">
                                <h3>
                                    <a href="{{url("{$category['slug']}/{$value['slug']}")}}"
                                       class="title">
                                        <?= $value['title']?>
                                    </a>
                                </h3>
                                <span class="price ">
                                    <b><?= number_format($value["price"], 0, '.', '.') ?></b>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="themes-list">
            <div class="container">
                <h2>Giao diện mẫu mới nhất</h2>
                <hr>
                <p class="desc">
                    Hãy xem những mẫu giao diện mới nhất, giúp bạn thiết kế web bán hàng chuyên nghiệp, đẹp mắt
                </p>
                <div class="row list-items">
                    <?php foreach (FunctionHelpers::get_products_by_category_id($category['id']) as $key => $value):?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="theme-item responsive">
                            <div class="theme-image">
                                <img src="<?= $value['avatar']?>"
                                     alt="Box Home">
                                <div class="theme-action">
                                    <div class="button">
                                        <a href="<?= url('theme-demo', ['product_slug' => $value['slug']])?>"
                                           class="view-demo action-preview-theme" target="_blank">
                                            Xem trước
                                        </a>
                                        <a href="{{url("{$category['slug']}/{$value['slug']}")}}"
                                           class="view-detail">Chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            <div class="theme-info">
                                <h3>
                                    <a href="{{url("{$category['slug']}/{$value['slug']}")}}"
                                       class="title">
                                        <?= $value['title']?>
                                    </a>
                                </h3>
                                <span class="price ">
                                    <b><?= number_format($value["price"], 0, '.', '.') ?></b>

                                </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="text-center"></div>
            </div>
        </div>
    </div>
@endsection
