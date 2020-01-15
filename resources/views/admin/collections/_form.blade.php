<?php

/* @var $collection App\Menu */

?>

@push('styles')
    <link href="{{ asset('plugins/nestable/css/jquery.nestable.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Nestable -->
    <script src="{{ asset('plugins/nestable/js/jquery.nestable.js')}}"></script>
    <script src="{{ asset('dashboard/js/custom-fields/index.js')}}"></script>
    <script src="{{ asset('dashboard/js/custom-fields/menu.js')}}"></script>

    <script src="{{ asset('dashboard/js/menus/menu.js')}}"></script>
    <script src="{{ asset('dashboard/js/menus/create.js')}}"></script>
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
            <div class="main-form" style="min-height: 229px;">
                <div class="form-body">
                    <div class="form-group required @if ($errors->has('title')) has-error @endif">
                        <label class="control-label" for="title">
                            Tiêu đề
                        </label>
                        <input title="" type="text" class="form-control" name="title"
                               placeholder="Nhập tiêu đề ở đây"/>
                        @if ($errors->has('title'))
                            <div class="help-block">
                                {{$errors->first('title')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group required @if ($errors->has('table')) has-error @endif">
                        <label class="control-label" for="table">
                            Loại hiển thị
                        </label>
                        <select title="" class="form-control" name="table">
                            <option value="">Chọn loại hiện thị</option>
                            <option value="posts">Bài viết</option>
                            <option value="classifieds">Tin rao</option>
                            <option value="products">Sản phẩm</option>
                        </select>
                        @if ($errors->has('table'))
                            <div class="help-block">
                                {{$errors->first('table')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="type">
                            Điều kiện
                        </label>
                    </div>
                    <div class="misc-pub-section">
                        <div class="form-group">
                            <input value="1" type="radio" title="" name="type"
                                   class="minimal none-action" checked>
                            <label class="control-label" for="type">
                                Thêm sản phẩm thủ công
                            </label>
                        </div>
                        <div class="form-group">
                            <input value="0" type="radio" title="" name="type"
                                   class="minimal none-action">
                            <label class="control-label" for="type">
                                Thêm sản phẩm tự động
                            </label>
                        </div>
                        <div class="form-group hidden" id="condition">
                            <label class="control-label" for="featured">
                                Thỏa mãn điều kiện:
                            </label>
                            <span style="margin: 0 10px;">
                                <input value="0" type="radio" title="" name="featured"
                                       class="minimal none-action" checked>
                                <label class="control-label" for="featured">
                                    Tất cả
                                </label>
                            </span>
                            <span style="margin: 0 10px;">
                                <input value="1" type="radio" title="" name="featured"
                                       class="minimal none-action">
                                <label class="control-label" for="featured">
                                    Nổi bật
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
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
                        <button type="submit" class="btn btn-success">
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
