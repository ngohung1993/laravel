<?php

/* @var $menu App\Menu */

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
