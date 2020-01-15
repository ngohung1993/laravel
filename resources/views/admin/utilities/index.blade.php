<?php

/* @var $utilities array \App\Category */

?>

@extends('layouts.admin.main')

@section('content')

    @push('styles')
        <link href="{{ asset('plugins/nestable/css/jquery.nestable.css') }}" rel="stylesheet">
    @endpush

    @push('scripts')
        <!-- Nestable -->
        <script src="{{ asset('plugins/nestable/js/jquery.nestable.js')}}"></script>
        <script src="{{ asset('dashboard/js/categories/product.js')}}"></script>
    @endpush

    <div class="page-content " style="min-height: 602px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('admin/site/index') ?>">Bảng điều khiển</a></li>
            <li class="breadcrumb-item active">Trang</li>
        </ol>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable-custom tabbable-tabdrop">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_detail" data-toggle="tab" aria-expanded="false">Chi tiết </a>
                        </li>
                        <li class="" style="border-left: 1px solid #ddd;">
                            <a href="#tab_note" data-toggle="tab" aria-expanded="false">Thứ tự</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_detail">
                            <div class="table-wrapper">
                                <div class="portlet light bordered portlet-no-padding">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <div class="wrapper-action"></div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-responsive">
                                            <div id="table-menus_wrapper"
                                                 class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <div class="dt-buttons btn-group">
                                                    <a class="btn btn-default action-item"
                                                       href="<?= url('admin/categories/create') ?>">
                                                        <span>
                                                            <span>
                                                                <i class="fa fa-plus"></i> Tạo mới
                                                            </span>
                                                        </span>
                                                    </a>
                                                    <a class="btn btn-default buttons-collection" tabindex="0"
                                                       aria-controls="table-menus"
                                                       href="#">
                                                        <span>
                                                            <img src="{{asset('vendor/img/vn.png')}}"
                                                                 title="Tiếng Việt" alt="Tiếng Việt">
                                                            <span>
                                                                Ngôn ngữ
                                                                <span class="caret"></span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                    <a class="btn btn-default buttons-reload"
                                                       href="<?= url('admin/categories') ?>"
                                                       style="margin-right: 20px;">
                                                        <span>
                                                            <i class="fa fa-refresh"></i>
                                                            Tải lại
                                                        </span>
                                                    </a>
                                                </div>
                                                <table
                                                    class="table table-striped table-hover vertical-middle dataTable no-footer">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="text-left no-sort sorting_asc"
                                                            style="width: 40px;">
                                                            <input style="margin-left: 5px;" title="" type="checkbox"
                                                                   class="minimal">
                                                        </th>
                                                        <th width="20px" class="column-key-id sorting"
                                                            style="width: 20px;">
                                                            ID
                                                        </th>
                                                        <th class="text-left column-key-name sorting"
                                                            style="width: 232px;">
                                                            Biểu tượng
                                                        </th>
                                                        <th class="text-left column-key-name sorting"
                                                            style="width: 232px;">
                                                            Tiêu đề
                                                        </th>
                                                        <th class="text-left column-key-name sorting"
                                                            style="width: 232px;">
                                                            Truy cập
                                                        </th>
                                                        <th width="100px" class="column-key-status sorting"
                                                            style="width: 100px;">
                                                            Trạng thái
                                                        </th>
                                                        <th width="134px" class="text-center sorting_disabled"
                                                            style="width: 158px;">
                                                            Tác vụ
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php App\Helpers\FunctionHelpers::show_utilities_table(App\Utilitie::all()) ?>
                                                    </tbody>
                                                </table>
                                                <?php if ( !count($utilities) ): ?>
                                                <div class="dataTables_empty"></div>
                                                <div class="notify">
                                                    <span>Không có dữ liệu</span>
                                                </div>
                                                <?php endif; ?>
                                                <?php if ( count($utilities) ): ?>
                                                <div class="datatables__info_wrap">
                                                    <div class="dataTables_paginate paging_simple_numbers">
                                                    </div>
                                                    <div class="dataTables_info" id="table-posts_info" role="status"
                                                         aria-live="polite">
                                                        <span class="dt-length-records">
                                                            <i class="fa fa-globe"></i>
                                                            <span class="hidden-xs">Hiển thị từ</span>
                                                            <span class="bold">1</span> đến
                                                            <span class="bold">{{count($utilities)}}</span> trong
                                                            <span class="bold">{{count($utilities)}}</span>
                                                            <span class="hidden-xs">bản ghi</span>
                                                        </span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_note">
                            <div class="box-header">
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-sm tree-5aa383cc537d1-tree-tools"
                                       data-action="expand">
                                        <i class="fa fa-plus-square-o"></i>
                                        Expand
                                    </a>
                                    <a class="btn btn-primary btn-sm tree-5aa383cc537d1-tree-tools"
                                       data-action="collapse">
                                        <i class="fa fa-minus-square-o"></i>
                                        Collapse
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-info btn-sm  tree-5aa383cc537d1-save">
                                        <i class="fa fa-save"></i>
                                        Save
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="<?= url('admin/categories') ?>"
                                       class="btn btn-warning btn-sm">
                                        <i class="fa fa-refresh"></i>
                                        Refresh
                                    </a>
                                </div>
                            </div>
                            <div class="box-body table-responsive no-padding">
                                <div class="dd" id="tree-5aa383cc537d1">
                                    <?php App\Helpers\FunctionHelpers::show_utilities_nestable(App\Utilitie::all()) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
