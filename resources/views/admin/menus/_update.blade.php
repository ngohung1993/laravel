<?php

use App\Helpers\FunctionHelpers;

/* @var $menu App\Menu */

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
        height: 40px;
    }

    .show-item-details i {
        margin-top: 14px;
    }
</style>

@push('styles')
    <link href="{{ asset('plugins/nestable/css/jquery.nestable.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Nestable -->
    <script src="{{ asset('plugins/nestable/js/jquery.nestable.js')}}"></script>

    <script src="{{ asset('dashboard/js/menus/menu.js')}}"></script>
    <script src="{{ asset('dashboard/js/menus/update.js')}}"></script>
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
                        <input title="" type="text" class="form-control" name="title" value="{{$menu->title}}"
                               placeholder="Nhập tiêu đề ở đây"/>
                        @if ($errors->has('title'))
                            <div class="help-block">
                                {{$errors->first('title')}}
                            </div>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php if ($menu['id']): ?>
            <div class="row widget-menu">
                <div class="col-md-4">
                    <div class="panel-group" id="accordion">
                        <div class="widget meta-boxes">
                            <a data-toggle="collapse" data-parent="#accordion" href="#custom-field-image"
                               class="collapsed" aria-expanded="false">
                                <h4 class="widget-title" style="margin-top: 0">
                                    <span>Danh mục</span>
                                    <i class="fa fa-angle-down narrow-icon"></i>
                                </h4>
                            </a>
                            <div id="custom-field-image" class="panel-collapse collapse in" style="">
                                <div class="widget-body">
                                    <div class="box-links-for-menu">
                                        <div class="the-box">
                                            <ul class="categories-selection">
                                                <?php foreach (FunctionHelpers::get_categories_by_parent_id() as $key => $value): $value = (array)$value?>
                                                <li>
                                                    <input title="" type="checkbox"
                                                           data-title="<?= $value['title'] ?>"
                                                           value="<?= $value['id'] ?>">
                                                    <?= $value['title'] ?>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <div class="text-right">
                                                <a href="#" class="select-all">Chọn toàn bộ</a>
                                                <div class="btn-group btn-group-devided">
                                                    <a href="#" class="btn-add-to-menu btn btn-primary">
                                                        <span class="text">
                                                            <i class="fa fa-plus"></i>
                                                            Thêm vào menu
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget meta-boxes">
                            <a data-toggle="collapse" data-parent="#accordion" href="#custom-field-checkbox"
                               class="collapsed" aria-expanded="false">
                                <h4 class="widget-title" style="margin-top: 0">
                                    <span>Thêm đường dẫn</span>
                                    <i class="fa fa-angle-down narrow-icon"></i>
                                </h4>
                            </a>
                            <div id="custom-field-checkbox" class="panel-collapse collapse" style="">
                                <div class="widget-body">
                                    <div class="box-links-for-menu">
                                        <div class="the-box">
                                            <div class="text-right">
                                                <div class="btn-group btn-group-devided">
                                                    <a href="#" class="btn-add-to-menu btn btn-primary">
                                                        <span class="text">
                                                            <i class="fa fa-plus"></i>
                                                            Thêm vào menu
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
                <div class="col-md-8">
                    <div class="widget meta-boxes">
                        <div class="widget-title">
                            <h4>
                                <span>Cấu trúc menu</span>
                            </h4>
                        </div>
                        <div class="widget-body">
                            <p style="font-size: 13px;line-height: 1.5;">
                                Kéo các mục tới vị trí bạn mong muốn. Nhấp chuột vào
                                <span class="fa fa-trash"></span> bên phải để xóa mục tùy chỉnh.
                            </p>
                            <div class="dd nestable-menu" id="tree-5aa383cc537d1">
                                <?php FunctionHelpers::show_links_nestable($menu) ?>
                                <input type="hidden" id="items" name="items">
                            </div>
                        </div>
                    </div>
                    <div style="border-top: 1px solid #eee;"></div>
                    <div class="widget meta-boxes">
                        <div class="widget-title">
                            <h4>
                                <span>Thiết lập menu</span>
                            </h4>
                        </div>
                        <div class="widget-body">
                            <p style="font-size: 13px;line-height: 1.5;">
                                Vị trí hiện thị cho menu này
                            </p>
                            <ul class="location-menu">
                                <?php foreach (FunctionHelpers::get_location_menus() as $key => $value): $value = (array)$value ?>
                                <li>
                                    <input <?= $menu->id == $value['menu_id'] ? 'checked' : '' ?>
                                           title="" type="checkbox" value="<?= $value['id'] ?>">
                                    <?= $value['title'] ?>
                                    <?php if ($value['menu_id'] == $menu->id): ?>
                                    <span class="theme-location-set">
                                        (Hiện tại: <?= $value['title'] ?>)
                                    </span>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; ?>
                                <input type="hidden" name="location_menus" id="location-menus">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
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
                                   class="minimal none-action" {{$menu['status'] ? 'checked':''}}>
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
