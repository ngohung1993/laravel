<?php

use App\Helpers\FunctionHelpers;

/* @var $items array */
/* @var $table string */
/* @var $collection App\Collection */

?>

<style>
    .widget-menu {
        margin-top: 0;
    }

    .dd-item button {
        margin-left: 0;
        margin-top: 10px;
    }

    .widget-title {
        border: 1px solid #ddd;
        border-top: none;
        cursor: pointer !important;
        font-weight: bold !important;
    }

    .widget-body {
        border-right: 1px solid #ddd;
        border-left: 1px solid #ddd;
    }

    .the-box ul li {
        list-style: none;
        margin: 15px 2px;
    }

    .the-box ul {
        min-height: 42px;
        max-height: 210px;
        overflow: auto;
    }

    .the-box .select-all {
        float: left;
        margin-top: 5px;
        font-size: 13px;
        text-decoration: underline;
    }

    .location-menu li {
        list-style: none;
        margin: 5px 0;
    }

    .theme-location-set {
        color: #72777c;
        font-size: 12px;
    }

    .show-item-details {
        height: 45px;
    }

    .show-item-details i {
        margin-top: 15px;
    }

    .dd3-content {
        padding: 2px 10px;
    }

    .dd3-handle {
        height: 45px;
    }

</style>

@push('styles')
    <link href="{{ asset('plugins/nestable/css/jquery.nestable.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Nestable -->
    <script src="{{ asset('plugins/nestable/js/jquery.nestable.js')}}"></script>

    <script src="{{ asset('dashboard/js/collections/menu.js')}}"></script>
    <script src="{{ asset('dashboard/js/collections/update.js')}}"></script>
@endpush

<div>
    <div class="note note-success">
        <p>
            Bạn đang chỉnh sửa phiên bản "<strong class="current_language_text">Tiếng Việt</strong>"
        </p>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br/>
    @endif
    <div class="row">
        <div class="col-md-9">
            <div class="main-form">
                <div class="form-body">
                    <div class="form-group required @if ($errors->has('title')) has-error @endif">
                        <label class="control-label" for="title">
                            Tiêu đề
                        </label>
                        <input title="" type="text" class="form-control" name="title" value="{{$collection->title}}"
                               placeholder="Nhập tiêu đề ở đây"/>
                        @if ($errors->has('title'))
                            <div class="help-block">
                                {{$errors->first('title')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="type">
                            Điều kiện
                        </label>
                    </div>
                    <div class="misc-pub-section">
                        @if($collection->type == App\Collection::HANDMADE)
                            <div class="form-group">
                                <input value="1" type="radio" title="" name="type"
                                       class="minimal none-action" checked>
                                <label class="control-label" for="type">
                                    Thêm sản phẩm thủ công
                                </label>
                            </div>
                        @endif
                        @if($collection->type == App\Collection::AUTO)
                            <div class="form-group">
                                <input value="0" type="radio" title="" name="type"
                                       class="minimal none-action" checked>
                                <label class="control-label" for="type">
                                    Thêm sản phẩm tự động
                                </label>
                            </div>
                            <div class="form-group" id="condition">
                                <label class="control-label" for="featured">
                                    Thỏa mãn điều kiện:
                                </label>
                                @if($collection->featured == App\Collection::ALL)
                                    <span style="margin: 0 10px;">
                                        <input value="0" type="radio" title="" name="featured"
                                               class="minimal none-action" checked>
                                        <label class="control-label" for="featured">
                                            Tất cả
                                        </label>
                                    </span>
                                @endif
                                @if($collection->featured == App\Collection::FEATURED)
                                    <span style="margin: 0 10px;">
                                        <input value="1" type="radio" title="" name="featured"
                                               class="minimal none-action" checked>
                                        <label class="control-label" for="featured">
                                            Nổi bật
                                        </label>
                                    </span>
                                @endif
                            </div>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="row widget-menu">
                <div class="col-md-6">
                    <div class="panel-group" id="accordion">
                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4>
                                    <span>{{$table}}</span>
                                </h4>
                            </div>
                            <div id="custom-field-image" class="panel-collapse collapse in" style="">
                                <div class="widget-body">
                                    <div class="box-links-for-menu">
                                        <div class="the-box">
                                            <div class="form-group">
                                                <input title="" name="search-item" type="text" class="form-control"
                                                       placeholder="Tìm kiếm <?= mb_strtolower($table) ?>">
                                            </div>
                                            <ul class="categories-selection">
                                                <?php foreach ($items as $key => $value) :?>
                                                <li>
                                                    <input title="" type="checkbox" data-img="<?= $value->avatar ?>"
                                                           data-title="<?= $value->title ?>"
                                                           value="<?= $value->id ?>">
                                                    <img width="50" src="<?= $value->avatar ?>" alt="">
                                                    <?= $value->title ?>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <div class="text-right">
                                                <a href="#" class="select-all">Chọn toàn bộ</a>
                                                <div class="btn-group btn-group-devided">
                                                    <a href="#" class="btn-add-to-menu btn btn-primary">
                                                        <span class="text">
                                                            <i class="fa fa-plus"></i>
                                                            Thêm vào danh sách
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="widget meta-boxes">
                        <div class="widget-title">
                            <h4>
                                <span>Danh sách được chọn</span>
                            </h4>
                        </div>
                        <div class="widget-body">
                            <p style="font-size: 13px;line-height: 1.5;">
                                Kéo các mục tới vị trí bạn mong muốn. Nhấp chuột vào
                                <span class="fa fa-trash"></span> bên phải để xóa mục tùy chỉnh.
                            </p>
                            <div class="dd nestable-menu" id="tree-5aa383cc537d1">
                                <?php FunctionHelpers::show_collection_nestable($collection) ?>
                                <input type="hidden" id="items" name="items">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 right-sidebar">
            <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
                <div class="widget-title">
                    <h4>
                        <span>Xuất bản</span>
                    </h4>
                </div>
                <div class="widget-body" style="min-height: 64px;">
                    <div class="btn-set" style="text-align: center;">
                        <button type="submit" class="btn btn-success tree-5aa383cc537d1-save">
                            <i class="fa fa-check-circle"></i> Lưu & Thoát
                        </button>
                        <a href="<?= url('menus') ?>">
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-close"></i> Hủy
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="widget meta-boxes">
                <div class="widget-title">
                    <h4><span>Cài đặt</span></h4>
                </div>
                <div class="widget-body">
                    <div class="misc-pub-section">
                        <div class="form-group">
                            <input type="checkbox" title="" name="status"
                                   class="minimal none-action" {{$collection['status'] ? 'checked':''}}>
                            <label class="control-label" for="status">
                                Kích hoạt
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
