<?php
use App\Helpers\FunctionHelpers;
?>
@extends('layouts.home.main')
@push('style-news-page')
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div id="post-detail" post-id="75440" style="margin-top: 100px">
        <div class="breadcrumb hidden hidden-xs">
            <div class="container">
                <ul class="clearfix">
                    <li>
                        <a href="/">
                            Trang Chủ
                        </a>
                    </li>
                    <li>
                        <span class="seperate">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>
                    <li>
                        <a href="{{url("{$category['slug']}")}}">
                            <?= $category['title'] ?>
                        </a>
                    </li>
                    <li>
                        <span class="seperate">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>
                    <li>
                        <a href="{{$post['title']}}}">
                            <?= $post['title'] ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="post-content">
            <div class="post-image-feature clearfix">
                <div class="shadow"></div>
                <img src="{{$post['avatar']}}"
                     alt="Sapo thông báo lịch trực dịp nghỉ lễ Quốc khánh 2/9">
                <div class="container">
                    <div class="row">
                        <h1 class="post-title col-md-8 col-md-offset-2">
                            <?= $post['title'] ?>
                        </h1>
                        <div class="post-info col-md-8 col-md-offset-2">
                            <div class="clearfix">
                                <div class="post-publish pull-left">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <?= date('d/m/Y', strtotime($post['created_at'])) ?>
                                </div>
                                <div class="post-cate pull-left">
                                    <i class="fa fa-folder-o" aria-hidden="true"></i>
                                    <ul class="post-categories">
                                        <li>
                                            <a href="{{url("/{$category['title']}")}}"
                                               rel="category tag">
                                                <?= $category['title'] ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="text-left">
                    <div class="nav-topic hidden-sm  hidden-xs" style="top: 60px; display: none;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" style="background: #fff;">
                        <div class="detail-content">
                            <?= $post['content'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="related-post text-center hidden-sm hidden-xs">
                    <div class="title">
                        <i class="icon icon-blog-related" aria-hidden="true"></i>
                        Bài liên quan
                    </div>
                    <div class="row">
                        <?php foreach (FunctionHelpers::get_posts_by_category_id($category['id'], 3) as $key => $value):?>
                        <?php if ($value['id'] != $post['id']):?>
                        <div class="col-md-4 col-sm-4">
                            <div class="swiper-slide relate-item">
                                <a href="{{url("{$category['slug']}/{$value['slug']}")}}"
                                   class="thumb-image">
                                    <img width="289" height="198"
                                         src="{{$value['avatar']}}"
                                         class="attachment-small size-small wp-post-image img-size" alt="img"
                                         title="img">
                                </a>
                                <a href="{{url("{$category['slug']}/{$value['slug']}")}}"
                                   class="post-title">
                                    <?= $value['title'] ?>
                                </a>
                            </div>
                        </div>
                        <?php endif;endforeach;?>
                    </div>
                    <a href="{{url("{$category['slug']}")}}" class="btn-viewmore">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
    <style>
        @media (min-width: 768px) {
            .img-size {
                height: 250px !important;
            }
        }
    </style>
@endsection
