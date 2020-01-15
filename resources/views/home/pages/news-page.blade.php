<?php

use App\Helpers\FunctionHelpers;

?>
@extends('layouts.home.main')
@push('style-news-page')
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div id="wrapper" class="main-content" style="background: #fff;margin-top: 100px">
        <div class="container">
            <div class="blog-menu">
                <div class="container hidden-sm hidden-xs">
                    <ul id="menu-primary-menu" class="main-menu clearfix">
                        <li id="menu-item-46941"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-46941">
                            <a href="/">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li id="menu-item-65089"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-65089">
                            <a href="javascrip:void(0)">{{$category['title']}}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="category-posts">
                <div class="hidden"> 1</div>
                <div class="row block-3">
                    <div class="newest-posts clearfix">
                        <?php foreach (FunctionHelpers::get_posts_by_category_id($category['id']) as $key => $value):?>
                        <div class="col-md-4 col-sm-6">
                            <div class="post-item">
                                <div class="post-thumb">
                                    <a href="{{url("{$category['slug']}/{$value['slug']}")}}"
                                       class="img-thumb">
                                        <img width="360" height="210"
                                             src="{{$value['avatar']}}"
                                             class="attachment-thumbnail-newpost-index size-thumbnail-newpost-index wp-post-image"
                                             alt="avatar">
                                    </a>
                                    <div class="cate-post">
                                        <ul class="post-categories">
                                            <li>
                                                <a href="/"
                                                   rel="category tag">
                                                    {{$category['title']}}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post-info clearfix">
                                    <div class="post-publish pull-left">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{date('d/m/Y',strtotime($value['created_at']))}}
                                    </div>
                                </div>
                                <a class="title"
                                   href="{{url("{$category['slug']}/{$value['slug']}")}}">
                                    {{$value['title']}}
                                </a>
                                <div class="desc hidden-xs">
                                    <p>
                                        {{$value['description']}}
                                        <a class="excerpt-read-more"
                                           href="{{url("{$category['slug']}/{$value['slug']}")}}"
                                           title="{{$value['title']}}">
                                            Read more »
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        {{--<div class="page_nav">--}}
                        {{--<span aria-current="page" class="page-numbers current">1</span>--}}
                        {{--<a class="page-numbers"--}}
                        {{--href="https://www.sapo.vn/blog/tin-su-kien-sapo/tin-sapo/page/2/">2</a>--}}
                        {{--<a class="page-numbers"--}}
                        {{--href="https://www.sapo.vn/blog/tin-su-kien-sapo/tin-sapo/page/3/">3</a>--}}
                        {{--<span class="page-numbers dots">…</span>--}}
                        {{--<a class="page-numbers" href="https://www.sapo.vn/blog/tin-su-kien-sapo/tin-sapo/page/10/">10</a>--}}
                        {{--<a class="next page-numbers"--}}
                        {{--href="https://www.sapo.vn/blog/tin-su-kien-sapo/tin-sapo/page/2/">--}}
                        {{--<i class="fa fa-angle-right" aria-hidden="true"></i>--}}
                        {{--</a>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
