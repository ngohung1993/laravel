<?php

use App\Helpers\FunctionHelpers;
use Illuminate\Support\Facades\DB;

?>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet">

    @stack('styles')
    @stack('realestate')
    <link href="{{ asset('dashboard/css/core.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/table.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/language.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/sample.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/main.min.css') }}" rel="stylesheet">

    <style>

        #navbar-icons > li.dropdown-user .dropdown-toggle {
            padding: 6px 6px 6px 6px;
        }

        #navbar-icons > li.dropdown-user .dropdown-toggle > img {
            margin-top: 5px;
        }

        .text-aqua {
            color: #36c6d3;
            font-weight: bold !important;
            font-size: 11px;
        }
    </style>

</head>
<body class="pace-done">

<div class="pace loading" style="display: none;">
    <div class="pace-progress" data-progress-text="100%" data-progress="99"
         style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
</div>

<div class="page-wrapper new-style-theme-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header page-logo">
            <a class="navbar-brand" href="<?= url('admin/dashboard') ?>">
                <span>TIGER</span>CMS 2.0
            </a>
            <div class="sidebar-toggle menu-toggler responsive-toggler visible-xs" data-toggle="collapse"
                 data-target=".navbar-collapse">
                <span></span>
            </div>
            <div class="sidebar-toggle menu-toggler hidden-xs">
                <span></span>
            </div>
        </div>
        <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
            <li class="dropdown">
                <a class="dropdown-toggle dropdown-header-name" style="padding-right: 10px"
                   href="{{url('/')}}" target="_blank">
                    <i class="fa fa-eye"></i>
                    <span class="hidden-xs">Xem website</span>
                </a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle dropdown-header-name" style="padding-right: 10px"
                   href="{{url('admin/themes/editor')}}" target="_blank">
                    <i class="fa fa-paint-brush"></i>
                    <span class="hidden-xs">Chỉnh sửa</span>
                </a>
            </li>
            <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                   data-close-others="true" aria-expanded="false" style="margin-left: 8px;">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge badge-default">0</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="external">
                        <h3>You have <span class="bold">1</span> New Messages</h3>
                    </li>
                    <li>
                        <ul class="dropdown-menu-list scroller" style="height: 70px;" data-handle-color="#637283">
                            <li>
                                <a href="">
                                    <span class="photo">
                                        <img src="{{asset('dashboard/img/default-avatar.jpg')}}"
                                             class="img-circle" alt="Demo contact">
                                    </span>
                                    <span class="subject">
                                        <span class="from">Demo contact</span>
                                        <span class="time">2017-01-15 16:19:27</span>
                                    </span>
                                    <span class="message">0123456789 - admin@admin.com</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="language dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle dropdown-header-name" data-toggle="dropdown"
                   data-hover="dropdown" data-close-others="true">
                    <img src="{{asset('dashboard/img/vn.png')}}" title="Tiếng Việt" alt="Tiếng Việt">
                    <span class="hidden-xs">Tiếng Việt</span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right icons-right">
                    <li class="active">
                        <a href="">
                            <img src="{{asset('dashboard/img/us.png')}}" title="English" alt="English">
                            <span>English</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{asset('dashboard/img/vn.png')}}" title="Tiếng Việt" alt="Tiếng Việt">
                            <span>Tiếng Việt</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown dropdown-user">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                   data-close-others="true">
                    <img class="img-circle" src="{{asset('dashboard/img/default-avatar.jpg')}}">
                    <span class="username username-hide-on-mobile">
                        {{ Illuminate\Support\Facades\Auth::user()['name'] }}
                        <p class="top-bar-profile__description">
                            <span><span class="text-aqua bold">Dùng thử</span></span>
                        </p>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-default">
                    <li>
                        <a href="">
                            <i class="fa fa-user-circle"></i>
                            Thông tin cá nhân
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('admin.logout')}}" method="post">
                            @csrf
                            <button class="btn-logout" type="submit">
                                <i class="fa fa-sign-out"></i>
                                Đăng xuất
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
    <div class="page-container col-md-12">
        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <div class="sidebar" style="height: 100vh;">
                    <div class="sidebar-content animated fadeIn" style="display: block;">
                        <ul class="page-sidebar-menu page-header-fixed navigation" data-keep-expanded="true"
                            data-auto-scroll="true" data-slide-speed="200">
                            <?php FunctionHelpers::show_utilities_menu(DB::table('utilities')->whereNull('parent_id')->get()->toArray()) ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content-wrapper">
            @yield('content')
        </div>
        <div class="clearfix"></div>
        <button class="feedback-btn hidden-xs hidden-sm" type="button" data-toggle="modal"
                data-target="#feedback-modal" style="display: block;">
            <img src="{{asset('dashboard/img/feedback.png')}}">
            Góp ý
        </button>
        <div class="modal fade" id="feedback-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">
                            <strong>
                                <i style="margin-right: 5px;" class="fa fa-life-bouy"></i>
                                Gửi góp ý
                            </strong>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="feedback-note-tmp" class="form-control" rows="10"
                                              placeholder="Hãy gửi góp ý của bạn cho chúng tôi tại đây nhé."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer clearfix">
                        <input type="hidden" title="" id="id-user">
                        <a href="javascript:void(0);" class="pull-left">
                            <span class="fa fa-link"></span>
                            Chụp màn hình
                        </a>
                        <button type="button" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            Gửi
                        </button>
                        <button data-dismiss="modal" type="button" class="btn btn-default pull-right"
                                style="margin-right: 10px;">
                            Hủy
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-confirm-delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h4 class="modal-title">
                            <strong>
                                <i style="margin-right: 5px;" class="fa fa-trash-o"></i>
                                Xác nhận xóa
                            </strong>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body with-padding">
                        <div>Bạn có thực sự muốn xóa bản ghi này không?</div>
                    </div>

                    <div class="modal-footer">
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="float-left btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('dashboard/js/jquery.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{ asset('plugins/sweetalert2/dist/sweetalert2.js')}}"></script>
<script src="{{ asset('plugins/form-validation/form-validation.js')}}"></script>

@stack('scripts')

<script src="{{ asset('dashboard/js/setting.js')}}"></script>

</body>
</html>
