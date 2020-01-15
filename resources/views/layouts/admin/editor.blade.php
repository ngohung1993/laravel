<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>

    <!-- Styles -->
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/4.1.3/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-colorpicker-3.0.3/css/bootstrap-colorpicker.css') }}">
    <link href="{{ asset('plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/iCheck/all.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/theme-editor-main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/custom.css') }}" rel="stylesheet">

    <style>
        .te-top-bar__branding {
            background: none;
        }

        .te-brand-link, .te-brand-logo {
            height: 100%;
            width: 100%;
            position: unset;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .te-brand-link {
            font-size: 25px;
        }

        body {
            overflow-y: hidden;
        }
        .fancybox-wrap{
            height: 100%;
        }
        .fancybox-inner{
            height: auto;
        }
    </style>
</head>
<body class="body-theme-editor theme-editor sfe-next fresh-ui next-ui" id="theme-editor">

<div class="ui-flash-container">
    <div class="ui-flash-wrapper" id="UIFlashWrapper">
        <div class="ui-flash ui-flash--nav-offset" id="UIFlashMessage"><p class="ui-flash__message"></p>
            <div class="ui-flash__close-button">
                <button class="ui-button ui-button--transparent ui-button--icon-only ui-button-flash-close"
                        aria-label="Close message" type="button" name="button">
                    <svg class="next-icon next-icon--color-white next-icon--size-12">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-remove">
                            <svg id="next-remove" width="100%" height="100%">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <path
                                        d="M18.263 16l10.07-10.07c.625-.625.625-1.636 0-2.26s-1.638-.627-2.263 0L16 13.737 5.933 3.667c-.626-.624-1.637-.624-2.262 0s-.624 1.64 0 2.264L13.74 16 3.67 26.07c-.626.625-.626 1.636 0 2.26.312.313.722.47 1.13.47s.82-.157 1.132-.47l10.07-10.068 10.068 10.07c.312.31.722.468 1.13.468s.82-.157 1.132-.47c.626-.625.626-1.636 0-2.26L18.262 16z"></path>
                                </svg>
                            </svg>
                        </use>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<main class="theme-editor__wrapper">
    <div class="notifications">
        <div class="ajax-notification">
            <span class="ajax-notification-message"></span>
            <a class="close-notification">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <form id="form-settings-theme" method="post" novalidate="novalidate">
        <input type="hidden" name="theme_id" value="683264">
        <input type="hidden" name="current_section" value="-1">
    </form>

    <div id="theme-editor-sidebar">
        <div class="modal" data-tg-refresh="modal" id="modal_container" style="display: none;" aria-hidden="true"
             aria-labelledby="ModalTitle" tabindex="-1"></div>
        <div class="modal-bg" data-tg-refresh="modal" id="modal_backdrop"></div>
        <form class="theme-editor__sidebar" id="theme-settings-form" autocomplete="off"
              novalidate="novalidate">
            <section class="theme-editor__index">
                <header class="te-top-bar">
                    <div class="te-top-bar__branding">
                        <a title="Về trang quản trị" class="te-brand-link" href="<?= url('admin/dashboard') ?>">
                            <span class="fa fa-dashboard"></span>
                        </a>
                    </div>
                    <div class="te-top-bar__list">
                        <div class="te-top-bar__item te-top-bar__item--fill">
                                <span class="te-theme-name">
                                    Giao diện mặc định
                                </span>
                        </div>
                        <div class="te-top-bar__item te-status-indicator--live mobile-only">
                            Live
                        </div>
                    </div>
                </header>
                <div class="theme-editor__panel-body">
                    <div class="ui-stack ui-stack--vertical next-tab__panel--grow">
                        <div class="ui-stack-item ui-stack-item--fill">
                            <section class="next-card theme-editor__card">
                                @include('layouts.admin.component.action-list')
                            </section>
                            <hr class="theme-editor__panel-separator">
                            <div class="theme-editor__presets">
                                <a href="<?= url('admin/themes/dashboard') ?>" class="btn btn--full-width">
                                    Thiết lập mẫu
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @include('layouts.admin.component.panel')

            </section>
            <div class="theme-editor__footer">
                <div class="ui-stack ui-stack--wrap">
                    <div>
                        <div class="ui-stack-item ui-stack-item--fill">
                            <div class="dropup ui-popover__container">
                                <button class="ui-button" type="button"
                                        onclick="editor.main.submit_setting_theme()">
                                    Xác nhận
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="ui-stack-item ui-stack-item--fill type--right action-setting-themes">
                        <button class="btn btn-danger" id="btn-remove-setting" type="button">
                            <span class="fa fa-check"></span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <section class="theme-editor__preview te-preview__container">
        <header class="te-context-bar">
            <div class="te-top-bar__branding desktop-only hide">
                <a title="Navigate to themes" class="te-brand-link" href="<?= url('admin/dashboard') ?>">
                    <svg class="ui-inline-svg te-brand-logo" role="img" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 36 42">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#logo-sapo"></use>
                    </svg>
                </a>
            </div>
            <div class="te-top-bar__list te-preview-context-bar__inner" data-bind-class="">
                <div class="te-top-bar__item te-top-bar__item--fill te-top-bar__item--bleed">
                    <ul class="segmented te-top-bar__button te-viewport-selector desktop-only">
                        <li>
                            <button class="ui-button ui-button--transparent ui-button--icon-only is-selected"
                                    onclick="editor.main.change_theme_preview_mode(this)" data-preview="desktop"
                                    type="button" name="button">
                                <span class="fa fa-desktop"></span>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="te-top-bar__item te-status-indicator--live desktop-only">
                    Live
                </div>
            </div>
        </header>
        <div class="theme-editor__iframe-wrapper">
            <iframe id="theme-editor-frame" class="theme-editor__iframe"
                    src="<?= url('/') ?>">
            </iframe>
        </div>
    </section>

    <div class="theme-editor__spinner">
        <div class="next-spinner">
            <svg class="next-icon next-icon--size-24">
                <use xlink:href="#next-spinner"></use>
            </svg>
        </div>
    </div>
</main>

@include('layouts.admin.component.content-form')

<div>
    <div class="section-footer">
    </div>
</div>

<!-- Scripts -->
<script>
    let base = '<?= url('/') ?>';
    console.log(base);
</script>

<script src="{{ asset('plugins/bootstrap-colorpicker-3.0.3/js/jquery-3.3.1.js')}}"></script>
<script src="{{ asset('plugins/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-colorpicker-3.0.3/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{ asset('plugins/sweetalert2/dist/sweetalert2.js')}}"></script>
<script src="{{ asset('plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset('plugins/fancybox/source/jquery.fancybox.js')}}"></script>
<script src="{{ asset('dashboard/js/editor/theme.editor.js')}}"></script>
<script src="{{ asset('dashboard/js/editor/fancybox.js')}}"></script>

<!-- Ckeditor -->
<script src="{{ asset('plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('plugins/ckeditor/samples/js/sample.js')}}"></script>
<script src="{{ asset('dashboard/js/editor/editor.js')}}"></script>

<script src="{{ asset('dashboard/js/editor/setting.js')}}"></script>

</body>
</html>
