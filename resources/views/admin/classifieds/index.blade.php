<?php

/* @var $classifieds array App\Posts */

?>

@extends('layouts.admin.main')

@section('title', 'Tin rao')

@section('content')

    <div class="page-content " style="min-height: 602px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('admin/dashboard') ?>">Bảng điều khiển</a></li>
            <li class="breadcrumb-item active">Tin rao</li>
        </ol>
        <div class="clearfix"></div>
        <div class="table-wrapper">
            <div class="table-configuration-wrap" style="display: none;">
                <span class="configuration-close-btn btn-show-table-options">
                    <i class="fa fa-times" style="margin-top: 10px;"></i>
                </span>
                <div class="wrapper-filter">
                    <form method="GET" action="<?= url('admin/classifieds') ?>" accept-charset="UTF-8"
                          class="filter-form">
                        <div class="filter_list inline-block filter-items-wrap">
                            <div class="filter-item form-filter filter-item-default">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <p>Danh mục</p>
                                            <select title="" name="" id="">
                                                <option value="">Chọn danh mục</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <p>Từ khóa</p>
                                            <input name="keyword" title="" type="text" class="form-control"
                                                   value="" placeholder="Nhập từ khóa tìm kiếm">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <p>Trạng thái</p>
                                            <select title="" name="" id="">
                                                <option value="">Chọn trạng thái</option>
                                                <option value="">Kích hoạt</option>
                                                <option value="">Ngừng kích hoạt</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <p style="color: #fff;">Tìm kiếm</p>
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
                <div class="portlet-body">
                    <div class="table-responsive">
                        <div id="table-menus_wrapper"
                             class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="dt-buttons btn-group">
                                <a class="btn btn-default action-item"
                                   href="<?= url('admin/classifieds/create') ?>">
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
                                   href="<?= url('admin/classifieds') ?>"
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
                                        <input style="margin-left: 3px;" title="" type="checkbox"
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
                                    <th class="no-sort column-key-updated_at sorting_disabled"
                                        style="width: 100px;">
                                        Chuyên mục
                                    </th>
                                    <th class="column-key-created_at sorting" style="width: 100px;">
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
                                <?php foreach ($classifieds as $key => $value): ?>
                                <tr role="row" class="odd">
                                    <td class="text-left no-sort sorting_1">
                                        <input title="" type="checkbox" class="minimal">
                                    </td>
                                    <td class="column-key-id"><?= $key + 1 ?></td>
                                    <td class="column-key-image">
                                        <img width="50"
                                             src="<?= $value['avatar'] ? $value['avatar'] : '/uploads/cms/img/placeholder.png' ?>">
                                    </td>
                                    <td class="text-left column-key-name">
                                        <a class="text-left"
                                           href="<?= url('admin/classifieds/' . $value['id'] . '/edit') ?>">
                                            <?= $value['title'] ?>
                                        </a>
                                    </td>
                                    <td class="text-left column-key-updated_at">
                                        <?= $value['category']['title'] ?>
                                    </td>
                                    <td class="column-key-created_at">
                                        <?= date('d/m/Y', strtotime($value['created_at'])) ?>
                                    </td>
                                    <td class="column-key-status">
                                        <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-mini"
                                             style="border:none">
                                            <input data-id="<?= $value['id'] ?>" data-api="ajax/enable-column"
                                                   data-table="classifieds" data-column="status"
                                                   type="checkbox" <?= $value['status'] ? 'checked="checked"' : '' ?>
                                                   title="" name="switch-checkbox">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="table-actions">
                                            <a href="<?= url('admin/classifieds/' . $value['id'] . '/edit') ?>"
                                               class="btn btn-icon btn-sm btn-primary tip">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php if ( !count($classifieds) ): ?>
                            <div class="dataTables_empty"></div>
                            <div class="notify">
                                <span>Không có dữ liệu</span>
                            </div>
                            <?php endif; ?>
                            <?php if ( count($classifieds) ): ?>
                            <div class="datatables__info_wrap">
                                <div class="dataTables_paginate paging_simple_numbers">
                                </div>
                                <div class="dataTables_info" id="table-posts_info" role="status"
                                     aria-live="polite">
                                    <span class="dt-length-records">
                                        <i class="fa fa-globe"></i>
                                        <span class="hidden-xs">Hiển thị từ</span>
                                        <span class="bold">1</span> đến
                                        <span class="bold">{{count($classifieds)}}</span> trong
                                        <span class="bold">{{count($classifieds)}}</span>
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
@endsection
