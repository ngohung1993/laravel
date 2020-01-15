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
                        <a href="{{url('show',['category_slug' => $category['title']])}}">
                            <?= $category['title'] ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="post-content">
            <div class="post-image-feature clearfix">
                <div class="shadow"></div>
                <img src="{{$category['avatar']}}"
                     alt="<?= $category['title']?>">
                <div class="container">
                    <div class="row">
                        <h1 class="post-title col-md-8 col-md-offset-2">
                            <?= $category['title'] ?>
                        </h1>
                        <div class="post-info col-md-8 col-md-offset-2">
                            <div class="clearfix">
                                <div class="post-publish pull-left">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <?= date('d/m/Y', strtotime($category['updated_at'])) ?>
                                </div>
                                <div class="post-cate pull-left">
                                    <i class="fa fa-folder-o" aria-hidden="true"></i>
                                    <ul class="post-categories">
                                        <li>
                                            <a href="{{url('show',['category_slug' => $category['title']])}}"
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
                            <?= $category['content'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

