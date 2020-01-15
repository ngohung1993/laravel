<?php

/* @var $products array App\products */

?>

@extends('layouts.admin.main')
@push('styles')
    <link href="{{ asset('plugins/nestable/css/jquery.nestable.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <!-- Nestable -->
    <script src="{{ asset('plugins/nestable/js/jquery.nestable.js')}}"></script>
    <script src="{{ asset('dashboard/js/products/product.js')}}"></script>
@endpush
@section('content')
    <div class="page-content " style="min-height: 602px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('admin/site/index') ?>">Bảng điều khiển</a></li>
            <li class="breadcrumb-item active">Trang</li>
        </ol>
        <div class="clearfix"></div>
        <div class="table-wrapper">
            <div class="table-configuration-wrap" style="display: none;">
                <span class="configuration-close-btn btn-show-table-options">
                    <i class="fa fa-times" style="margin-top: 10px;"></i>
                </span>
                <div class="wrapper-filter">
                    <p>Tìm kiếm</p>
                    <form method="GET" action="<?= url('admin/products') ?>" accept-charset="UTF-8"
                          class="filter-form">
                        <div class="filter_list inline-block filter-items-wrap">
                            <div class="filter-item form-filter filter-item-default">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input name="keyword" title="" type="text" class="form-control"
                                                   value="" placeholder="Nhập từ khóa tìm kiếm">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button class="btn btn-primary" style="height: 34px;">
                                                <span class="fa fa-search"></span>
                                                Tìm kiếm
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="portlet light bordered portlet-no-padding">
                <div class="portlet-title">
                    <div class="caption">
                        <div class="wrapper-action">
                            <div class="btn-group">
                                <a class="btn btn-danger" href="#" style="margin-top: 2px;">
                                    <span class="fa fa-trash"></span>
                                    Xóa bản ghi
                                </a>
                            </div>
                            <button class="btn btn-primary btn-show-table-options">
                                <span class="fa fa-search"></span>
                                Tìm kiếm
                            </button>
                        </div>
                    </div>
                </div>
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
                                                               href="<?= url('admin/products/create') ?>">
                                                                <i class="fa fa-plus"></i> Tạo mới
                                                            </a>
                                                            <a class="btn btn-default buttons-collection" tabindex="0"
                                                               aria-controls="table-menus"
                                                               href="#">
                                                                <span>
                                                                    <img src="{{asset('dashboard/img/vn.png')}}"
                                                                         title="Tiếng Việt" alt="Tiếng Việt">
                                                                     <span>
                                                                         Ngôn ngữ
                                                                        <span class="caret"></span>
                                                                     </span>
                                                                </span>
                                                            </a>
                                                            <a class="btn btn-default buttons-reload"
                                                               href="<?= url('admin/products') ?>"
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
                                                                    <input style="margin-left: 3px;" title=""
                                                                           type="checkbox"
                                                                           class="minimal">
                                                                </th>
                                                                <th width="20px" class="column-key-id sorting"
                                                                    style="width: 20px;">
                                                                    ID
                                                                </th>
                                                                <th class="text-left column-key-name sorting"
                                                                    style="width: 232px;">
                                                                    Hình ảnh
                                                                </th>
                                                                <th class="text-left column-key-name sorting"
                                                                    style="width: 232px;">
                                                                    Tiêu đề
                                                                </th>
                                                                <th class="column-key-created_at sorting"
                                                                    style="width: 100px;">
                                                                    Ngày tạo
                                                                </th>
                                                                <th width="100px" class="column-key-status sorting"
                                                                    style="width: 100px;">
                                                                    Trạng thái
                                                                </th>
                                                                <th width="134px" class="text-center sorting_disabled"
                                                                    style="width: 158px;">Tác vụ
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($products as $key => $value): ?>
                                                            <tr role="row" class="odd">
                                                                <td class="text-left no-sort sorting_1">
                                                                    <input title="" type="checkbox" class="minimal">
                                                                </td>
                                                                <td class="column-key-id"><?= $key + 1 ?></td>
                                                                <td class="column-key-image">
                                                                    <img width="50"
                                                                         src="<?= $value->avatar ? $value->avatar : '/uploads/cms/img/placeholder.png' ?>">
                                                                </td>
                                                                <td class="text-left column-key-name">
                                                                    <a class="text-left"
                                                                       href="<?= url('admin/products/' . $value->id . '/edit') ?>">
                                                                        <?= $value->title ?>
                                                                    </a>
                                                                </td>
                                                                <td class="column-key-created_at">
                                                                    <?= date('d/m/Y', strtotime($value->created_at)) ?>
                                                                </td>
                                                                <td class="column-key-status">
                                                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-mini"
                                                                         style="border:none">
                                                                        <input data-id="<?= $value->id ?>"
                                                                               data-api="{{route('ajax.enable-column')}}"
                                                                               data-table="products"
                                                                               data-column="status"
                                                                               type="checkbox"
                                                                               <?= $value->status ? 'checked="checked"' : '' ?>
                                                                               title="" name="switch-checkbox">
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="table-actions">
                                                                        <a href="<?= url('admin/products/' . $value->id . '/edit') ?>"
                                                                           class="btn btn-icon btn-sm btn-primary tip">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                        <?php if ( !count($products) ): ?>
                                                        <div class="dataTables_empty"></div>
                                                        <div class="notify">
                                                            <span>Không có dữ liệu</span>
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php if ( count($products) ): ?>
                                                        <div class="datatables__info_wrap">
                                                            <div class="dataTables_paginate paging_simple_numbers">
                                                            </div>
                                                            <div class="dataTables_info" id="table-products_info"
                                                                 role="status"
                                                                 aria-live="polite">
                                                                <span class="dt-length-records">
                                                                   <i class="fa fa-globe"></i>
                                                                    <span class="hidden-xs">Hiển thị từ</span>
                                                                    <span class="bold">1</span> đến
                                                                     <span class="bold">{{count($products)}}</span> trong
                                                                     <span class="bold">{{count($products)}}</span>
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
                                            <a href="<?= url('admin/products/sell') ?>"
                                               class="btn btn-info btn-sm  tree-5aa383cc537d1-save">
                                                <i class="fa fa-save"></i>
                                                Save
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <a href="<?= url('admin/products/sell') ?>"
                                               class="btn btn-warning btn-sm">
                                                <i class="fa fa-refresh"></i>
                                                Refresh
                                            </a>
                                        </div>
                                    </div>
                                    <div class="box-body table-responsive no-padding">
                                        <div class="dd" id="tree-5aa383cc537d1">
                                            <?php App\Helpers\FunctionHelpers::show_products_nestable($products) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
