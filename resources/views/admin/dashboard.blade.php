<?php
/**
 * Created by PhpStorm.
 * User: vietlv
 * Date: 11/30/2018
 * Time: 3:36 PM
 */

?>

@extends('layouts.admin.main')

@section('content')

    <style>
        h2 {
            line-height: 36px;
            font-size: 20px;
        }

        .text-muted {
            color: #99abb4 !important;
        }

        h5 {
            line-height: 18px;
            font-size: 16px;
            font-weight: 400;
        }

        .r4_counter h4 {
            margin: 0;
        }

        .text-muted {
            margin-bottom: 4px;
        }

        .panel_s .panel-body {
            background: #fff;
            border: 1px solid #dce1ef;
            border-radius: 4px;
            padding: 20px;
            position: relative;
        }

        .padding-10 {
            padding: 10px !important;
        }

        .activity-feed {
            padding: 15px;
            word-wrap: break-word;
        }

        .activity-feed .feed-item {
            position: relative;
            padding-bottom: 15px;
            padding-left: 30px;
            border-left: 2px solid #84c529;
        }

        .activity-feed .feed-item .date {
            position: relative;
            top: -5px;
            color: #4b5158;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 500;
        }

        .activity-feed .feed-item .text {
            position: relative;
            top: -3px;
        }

        .mtop5 {
            margin-top: 5px;
        }

        .text-muted {
            color: #777;
        }

        .activity-feed .feed-item:after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: -6px;
            width: 10px;
            height: 10px;
            border-radius: 6px;
            background: #fff;
            border: 1px solid #4b5158;
        }

        .bold {
            font-weight: 500;
        }

        .no-mbot {
            margin-bottom: 0 !important;
        }

        a {
            color: #008ece;
            text-decoration: none !important;
        }

        .feed-item .text-has-action {
            margin-bottom: 7px;
            display: inline-block;
        }

        .text-has-action {
            border-bottom: 1px dashed #bbb;
            padding-bottom: 2px;
        }

        .activity-feed .feed-item .text {
            font-size: 13px;
        }

    </style>

    <div class="page-content " style="min-height: 602px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Bảng điều khiển</li>
        </ol>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="<?= url('admin/posts') ?>">
                    <div class="visual">
                        <i class="fa fa-newspaper-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                        <span data-counter="counterup">
                            <?= App\Post::all()->count(); ?>
                        </span>
                        </div>
                        <div class="desc"> Bài viết</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 purple" href="<?= url('admin/categories') ?>">
                    <div class="visual">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                        <span data-counter="counterup">
                            <?= App\Category::all()->count(); ?>
                        </span>
                        </div>
                        <div class="desc">Danh mục</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue"
                   href="<?= url('admin/images') ?>">
                    <div class="visual">
                        <i class="fa fa-picture-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                        <span data-counter="counterup">
                            <?= App\Image::all()->count(); ?>
                        </span>
                        </div>
                        <div class="desc">Hình ảnh</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" href="<?= url('admin/custom_fields') ?>">
                    <div class="visual">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                        <span data-counter="counterup">
                            <?= App\CustomField::all()->count(); ?>
                        </span>
                        </div>
                        <div class="desc">Cấu hình</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="clearfix"></div>
            <div class="col-md-8 ui-sortable" data-container="left-8">
                <div class="widget" id="widget-finance_overview" data-name="Tổng quan ngân sách">
                    <div class="finance-summary">
                        <div class="panel_s">
                            <div class="panel-body">
                                <div class="widget-dragger ui-sortable-handle"></div>
                                <div class="row home-summary">
                                    <div class="col-md-6 col-lg-4 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="text-dark text-uppercase">Tin nhắn</p>
                                                <hr class="mtop15">
                                            </div>
                                            <div class="col-md-12 text-stats-wrapper">
                                                <a href="http://demo2.vinga.ooo/admin/invoices/list_invoices?status=6"
                                                   class="text-muted mbot15 inline-block">
                                                    <span class="_total bold">0</span> Nháp
                                                </a>
                                            </div>
                                            <div class="col-md-12 text-right progress-finance-status">
                                                0%
                                                <div class="progress no-margin progress-bar-mini">
                                                    <div
                                                        class="progress-bar progress-bar-default no-percent-text not-dynamic"
                                                        role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 0" data-percent="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-stats-wrapper">
                                                <a href="http://demo2.vinga.ooo/admin/invoices/list_invoices?filter=not_sent"
                                                   class="text-muted inline-block mbot15">
                                                    <span class="_total bold">0</span> Not Sent </a>
                                            </div>
                                            <div class="col-md-12 text-right progress-finance-status">
                                                0%
                                                <div class="progress no-margin progress-bar-mini">
                                                    <div
                                                        class="progress-bar progress-bar-default no-percent-text not-dynamic"
                                                        role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 0" data-percent="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-12 text-stats-wrapper">
                                                <p class="text-dark text-uppercase">Khách hàng</p>
                                                <hr class="mtop15">
                                            </div>
                                            <div class="col-md-12 text-stats-wrapper">
                                                <a href="http://demo2.vinga.ooo/admin/estimates/list_estimates?status=1"
                                                   class="text-muted mbot15 inline-block estimate-status-dashboard-muted">
                                                    <span class="_total bold">0</span>
                                                    Nháp </a>
                                            </div>
                                            <div class="col-md-12 text-right progress-finance-status">
                                                0%
                                                <div class="progress no-margin progress-bar-mini">
                                                    <div
                                                        class="progress-bar progress-bar-default no-percent-text not-dynamic"
                                                        role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 0" data-percent="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-stats-wrapper">
                                                <a href="http://demo2.vinga.ooo/admin/estimates/list_estimates?filter=not_sent"
                                                   class="text-muted mbot15 inline-block estimate-status-dashboard-muted">
                                                    <span class="_total bold">0</span>
                                                    Not Sent </a>
                                            </div>
                                            <div class="col-md-12 text-right progress-finance-status">
                                                0%
                                                <div class="progress no-margin progress-bar-mini">
                                                    <div
                                                        class="progress-bar progress-bar-default no-percent-text not-dynamic"
                                                        role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 0" data-percent="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-6 col-lg-4">
                                        <div class="row">
                                            <div class="col-md-12 text-stats-wrapper">
                                                <p class="text-dark text-uppercase">Tìm kiếm</p>
                                                <hr class="mtop15">
                                            </div>
                                            <div class="col-md-12 text-stats-wrapper">
                                                <a href="http://demo2.vinga.ooo/admin/proposals/list_proposals?status=6"
                                                   class="text-muted mbot15 inline-block">
                                                    <span class="_total bold">0</span> Nháp </a>
                                            </div>
                                            <div class="col-md-12 text-right progress-finance-status">
                                                0%
                                                <div class="progress no-margin progress-bar-mini">
                                                    <div
                                                        class="progress-bar progress-bar-default no-percent-text not-dynamic"
                                                        role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 0" data-percent="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-stats-wrapper">
                                                <a href="http://demo2.vinga.ooo/admin/proposals/list_proposals?status=4"
                                                   class="text-info mbot15 inline-block">
                                                    <span class="_total bold">0</span> Đã gửi </a>
                                            </div>
                                            <div class="col-md-12 text-right progress-finance-status">
                                                0%
                                                <div class="progress no-margin progress-bar-mini">
                                                    <div
                                                        class="progress-bar progress-bar-default no-percent-text not-dynamic"
                                                        role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 0" data-percent="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <a href="#" class="hide invoices-total initialized"></a>
                                <div id="invoices_total" class="">
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12 col-md-12 total-column">
                                            <div class="panel_s">
                                                <div class="panel-body">
                                                    <h3 class="text-muted _total">
                                                        $0.00 </h3>
                                                    <span class="text-warning">Hóa đơn nổi bật</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xs-12 col-md-12 total-column">
                                            <div class="panel_s">
                                                <div class="panel-body">
                                                    <h3 class="text-muted _total">
                                                        $0.00 </h3>
                                                    <span class="text-danger">Hóa đơn quá hạn</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xs-12 col-md-12 total-column">
                                            <div class="panel_s">
                                                <div class="panel-body">
                                                    <h3 class="text-muted _total">
                                                        $0.00 </h3>
                                                    <span class="text-success">Đã thanh toán</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ui-sortable" data-container="right-4">
                <div class="widget hide" id="widget-goals" style="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel_s">
                                <div class="panel-body padding-10">
                                    <div class="widget-dragger ui-sortable-handle"></div>
                                    <p class="padding-5">
                                        Các mục tiêu
                                    </p>
                                    <hr class="hr-panel-heading-dashboard">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget" id="widget-projects_activity" data-name="Hoạt động dự án cuối cùng" style="">
                    <div class="panel_s projects-activity">
                        <div class="panel-body padding-10" style="min-height: 345px;">
                            <div class="widget-dragger ui-sortable-handle"></div>
                            <p class="padding-5">Hoạt động dự án cuối cùng</p>
                            <hr class="hr-panel-heading-dashboard">
                            <div class="activity-feed">
                                <div class="feed-item">
                                    <div class="date">
                                    <span class="text-has-action">
                                        22 tiếng trước
                                    </span>
                                    </div>
                                    <div class="text">
                                        <p class="bold no-mbot">
                                            <a href="http://demo2.vinga.ooo/admin/profile/1">Phạm Nghĩa</a>
                                            - Đã thêm thành viên mới
                                        </p>
                                        Tên dự án:
                                        <a href="http://demo2.vinga.ooo/admin/projects/view/1">
                                            Dự án tháng 8 - 2018
                                        </a>
                                    </div>
                                    <p class="text-muted mtop5">Phạm Nghĩa</p>
                                </div>
                                <div class="feed-item">
                                    <div class="date">
                                    <span class="text-has-action">
                                        22 tiếng trước
                                    </span>
                                    </div>
                                    <div class="text">
                                        <p class="bold no-mbot">
                                            <a href="http://demo2.vinga.ooo/admin/profile/1">Phạm Nghĩa</a>
                                            - Đã tạo dự án
                                        </p>
                                        Tên dự án:
                                        <a href="http://demo2.vinga.ooo/admin/projects/view/1">
                                            Dự án tháng 8 - 2018
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="page-footer" style="position: fixed;margin-left: 250px;">
            <div class="page-footer-inner">
                <div class="row">
                    <div class="col-md-6">
                        Copyright 2018 © <a target="_blank" href="">tigerweb.vn</a> Technologies. Version:
                        <span>2.0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
