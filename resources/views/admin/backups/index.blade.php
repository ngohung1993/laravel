<?php

/* @var $backups array */

?>

@extends('layouts.admin.main')

@section('title', 'Vị trí menu')

@section('content')
    <div class="page-content " style="min-height: 602px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('admin/dashboard') ?>">Bảng điều khiển</a></li>
            <li class="breadcrumb-item active">Quản lý dữ liệu</li>
        </ol>
        <div class="clearfix"></div>
        <div class="table-wrapper">
            <div class="portlet light bordered portlet-no-padding">
                <div class="portlet-title">
                    <div class="caption">
                        <div class="wrapper-action">
                            <div class="btn-group">
                                <button class="btn btn-success btn-show-table-options">
                                    <span class="fa fa-download"></span>
                                    Nhập dữ liệu
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-responsive">
                        <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="dt-buttons btn-group">
                                <a class="btn btn-default action-item" href="<?= url('admin/backups/create') ?>">
                                    <i class="fa fa-upload"></i>
                                    Xuất dữ liệu
                                </a>
                                <a class="btn btn-default buttons-collection" href="">
                                    <span>
                                        <img src="{{url('dashboard/img/vn.png')}}" title="Tiếng Việt" alt="Tiếng Việt">
                                        <span>
                                            Ngôn ngữ
                                            <span class="caret"></span>
                                        </span>
                                    </span>
                                </a>
                                <a class="btn btn-default buttons-reload" href="<?= url('admin/menus') ?>">
                                    <i class="fa fa-refresh"></i>
                                    Tải lại
                                </a>
                            </div>
                            <table class="table table-striped table-hover vertical-middle dataTable no-footer">
                                <thead>
                                <tr role="row">
                                    <th class="text-left no-sort sorting_asc"
                                        style="width: 10px;">
                                        <input style="margin-left: 3px;" title="" type="checkbox" class="minimal">
                                    </th>
                                    <th width="20px" class="column-key-id sorting" style="width: 20px;">
                                        ID
                                    </th>
                                    <th class="text-left column-key-name sorting" style="width: 232px;">
                                        Tiêu đề
                                    </th>
                                    <th width="100px" class="text-left column-key-created_at sorting"
                                        style="width: 100px;">
                                        Kích thước
                                    </th>
                                    <th width="100px" class="column-key-status sorting" style="width: 100px;">
                                        Ngày tạo
                                    </th>
                                    <th width="134px" class="text-center sorting_disabled"
                                        style="width: 158px;">
                                        Tác vụ
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($backups as $key => $value): ?>
                                <tr role="row" class="odd">
                                    <td class="text-left no-sort sorting_1">
                                        <input title="" type="checkbox" class="minimal">
                                    </td>
                                    <td class="column-key-id">{{ $key + 1 }}</td>
                                    <td class="text-left column-key-name">
                                        {{ $value[0].'.'.$value[1] }}
                                    </td>
                                    <td class="text-left column-key-created_at">
                                        {{ $value[2] }}
                                    </td>
                                    <td class="text-left column-key-created_at">
                                        {{ date('H:i:s d/m/Y',(int)$value[0]) }}
                                    </td>
                                    <td class="text-center">
                                        <div class="table-actions">
                                            <a href="" class="btn btn-icon btn-sm btn-primary tip">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="datatables__info_wrap">
                                <div class="dataTables_paginate paging_simple_numbers">
                                </div>
                                <div class="dataTables_info" id="table-posts_info" role="status" aria-live="polite">
                                <span class="dt-length-records">
                                    <i class="fa fa-globe"></i>
                                    <span class="hidden-xs">Hiển thị kết quả từ</span>
                                    <span class="bold">1</span>
                                    đến
                                    <span class="bold">{{ count($backups) }} </span>
                                    trong
                                    <span class="bold">{{ count($backups) }}</span>
                                    bản ghi
                                </span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
