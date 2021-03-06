<?php
use Illuminate\Http\Request;
?>

@push('styles')
    <link href="{{ asset('vendor/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Ckeditor -->
    <script src="{{ asset('vendor/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('vendor/plugins/ckeditor/samples/js/sample.js')}}"></script>
    <script src="{{ asset('vendor/customer/js/editor.js')}}"></script>

    <!-- Fancybox -->
    <script src="{{ asset('vendor/plugins/fancybox/source/jquery.fancybox.js')}}"></script>
    <script src="{{ asset('vendor/customer/js/fancybox.js')}}"></script>
@endpush

<div>
    <div class="note note-success">
        <p>
            Bạn đang chỉnh sửa phiên bản "<strong class="current_language_text">Tiếng Việt</strong>"
        </p>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="tabbable-custom tabbable-tabdrop">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="form-group required @if ($errors->has('title')) has-error @endif">
                            <label class="control-label" for="title">
                                Tiêu đề
                            </label>
                            <input value="{{$category->title}}" placeholder="Nhập tiêu đề tại đây" title=""
                                   type="text" class="form-control" name="title"/>
                            @if ($errors->has('title'))
                                <div class="help-block">
                                    {{$errors->first('title')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group required @if ($errors->has('page_id')) has-error @endif">
                            <label class="control-label" for="page-id">
                                Kiểu trang
                            </label>
                            <select title="" class="form-control" name="page_id">
                                <option value="">Chọn kiểu trang</option>
                                @foreach(App\Page::all() as $page)
                                    <option value="{{$page->id}}"
                                        {{$page->id == $category->page_id ? 'selected':''}}>
                                        {{$page->title}}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('page_id'))
                                <div class="help-block">
                                    {{$errors->first('page_id')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="parent-id">
                                Danh mục cha
                            </label>
                            <select title="" class="form-control" name="parent_id">
                                <option value="">Chọn danh mục</option>
                                @foreach(App\Category::all() as $parent)
                                    <option value="{{$parent->id}}"
                                        {{$parent->id == $category->parent_id ? 'selected':''}}>
                                        {{$parent->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">
                                Mô tả
                            </label>
                            <textarea title="" name="description" id="describe" cols="30"
                                      rows="10">{{$category->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="icon">
                                Biểu tượng
                            </label>
                            <input value="{{$category->icon}}" placeholder="fa fa-home" title="" type="text"
                                   class="form-control" name="icon"/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="meta-box-sortables">
                <div id="gallery_wrap" class="widget meta-boxes">
                    <div class="widget-body">
                        <label class="control-label" for="description">
                            Nội dung
                        </label>
                        <textarea title="" name="content" id="content" cols="30"
                                  rows="10">{{$category->content}}</textarea>
                    </div>
                </div>
            </div>

            <div id="advanced-sortables" class="meta-box-sortables">
                <div id="gallery_wrap" class="widget meta-boxes">
                    <div class="widget-title">
                        <h4><span>Thư viện ảnh</span></h4>
                        <input type="hidden" id="images" name="images">
                    </div>
                    <div class="widget-body">
                        <div>
                            <div class="list-photos-gallery">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="post-body-content"
                                             style="position: relative;padding: 10px 0;background: #fff;">
                                            <div>
                                                <div class="inside">
                                                    <div id="list-img-temp" class="thumbnails ui-sortable"
                                                         style="display: none">
                                                        <div
                                                            class="file-preview-frame krajee-default  kv-preview-thumb">
                                                            <div class="kv-file-content">
                                                                <img src=""
                                                                     class="kv-preview-data file-preview-image">
                                                            </div>
                                                            <div class="file-thumbnail-footer">
                                                                <div class="file-footer-caption">
                                                                    <span class="caption"></span>
                                                                </div>
                                                                <div class="file-upload-indicator">
                                                                </div>
                                                                <div class="file-actions">
                                                                    <div class="file-footer-buttons">
                                                                        <button type="button"
                                                                                class="kv-file-zoom btn btn-xs btn-default"
                                                                                onclick="deleteFile(event)">
                                                                            <i class="fa fa-trash-o"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="list-img" class="thumbnails ui-sortable">
                                                        <?php if (isset($images)): foreach ($images as $key => $value): ?>
                                                        <div
                                                            class="file-preview-frame krajee-default  kv-preview-thumb">
                                                            <div class="kv-file-content">
                                                                <img src="<?= $value['avatar'] ?>"
                                                                     class="kv-preview-data file-preview-image">
                                                            </div>
                                                            <div class="file-thumbnail-footer">
                                                                <div class="file-footer-caption" title="">
                                                                    <a href="#" class="editable"
                                                                       data-name="image#title" data-type="text"
                                                                       data-pk="<?= $value['id'] ?>"
                                                                       data-title="Enter title"
                                                                       data-url="<?= url('ajax/edit-column') ?>">
                                                                        <?= $value['title'] ?>
                                                                    </a>
                                                                </div>
                                                                <div class="file-upload-indicator">
                                                                    <button type="button"
                                                                            class="btn btn-xs btn-default"
                                                                            data-toggle="modal"
                                                                            data-target="#content-image">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="file-actions">
                                                                    <div class="file-footer-buttons">
                                                                        <button type="button"
                                                                                class="btn btn-xs btn-default"
                                                                                onclick="deleteFile(event)">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; endif; ?>
                                                    </div>
                                                    <div class="spanButtonPlaceholder block-upload-item"
                                                         style="position: relative; overflow: hidden;margin: 10px;">
                                                        <p>(Click để tải ảnh<br> hoặc kéo thả ảnh vào đây)</p>
                                                        <input class="kv-file-drop-zone" multiple="multiple"
                                                               type="file" name="file">
                                                        <input data-auto="1" data-id=""
                                                               data-column-parent-id="category_id"
                                                               class="kv-file-drop-zone" multiple="multiple"
                                                               type="file" name="file">
                                                    </div>
                                                    <div class="droptext">
                                                        Đăng ảnh thật nhanh bằng cách kéo và thả ảnh vào khung.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div id="seo_wrap" class="widget meta-boxes">
                    <div class="widget-title">
                        <h4><span>Xem trước kết quả tìm miếm</span></h4>
                    </div>
                    <div class="widget-body">
                        <a href="javascript:void(0);" class="btn-trigger-show-seo-detail"
                           data-class="seo-edit-section">
                            Tùy chỉnh SEO
                        </a>
                        <div class="seo-preview">
                            <p class="default-seo-description">
                                Hãy nhập Tiêu đề và Mô tả để xem trước kết quả tìm kiếm.
                            </p>
                            <div class="existed-seo-meta">
                                <span class="page-title-seo">Tiêu đề</span>
                                <div class="page-url-seo ws-nm">
                                    <p>
                                        <?= (new Request())->root(); ?>
                                        <span class="page-slug-seo">{{$category->slug}}</span>
                                    </p>
                                </div>
                                <div class="page-description-seo ws-nm">
                                    {{$category->description}}
                                </div>
                            </div>
                        </div>
                        <div class="seo-edit-section" style="display: none;">
                            <hr>
                            <div class="form-group parent">
                                <label class="control-label" for="seo-title">
                                    Seo title
                                </label>
                                <input title="" type="text" class="form-control counter" data-counter="120"
                                       name="seo_title" value="{{$seo_tool->seo_title}}"/>
                                <small class="charcounter">
                                    Số ký tự đã dùng <span style="font-weight: bold;">0</span>/120
                                </small>
                            </div>
                            <div class="form-group parent">
                                <label class="control-label" for="meta-description">
                                    Meta description
                                </label>
                                <textarea title="" type="text" class="form-control counter" data-counter="120"
                                          rows="2" name="meta_description">{{$seo_tool->meta_description}}</textarea>
                                <small class="charcounter">
                                    Số ký tự đã dùng <span style="font-weight: bold;">0</span>/120
                                </small>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="meta-keywords">
                                    Seo title
                                </label>
                                <input title="" type="text" class="form-control tags" data-counter="120"
                                       name="meta_keywords" value="{{$seo_tool->meta_keywords}}"/>
                                <small class="charcounter">Gõ từ khóa và nhấn enter.</small>
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
                <div class="widget-body">
                    <div class="btn-set" style="text-align: center;">
                        <button type="submit" class="btn btn-success" onclick="getImages()">
                            <i class="fa fa-check-circle"></i> Lưu & Thoát
                        </button>
                        <a href="<?= url('admin/categories/index') ?>">
                            <button type="button" class="btn btn-danger">
                                <i class="fa fa-close"></i> Hủy
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="form-actions form-actions-fixed-top">
                <div class="btn-set">
                    <button type="submit" class="btn btn-success" onclick="getImages()">
                        <i class="fa fa-check-circle"></i> Lưu & Thoát
                    </button>
                    <a href="<?= url('admin/categories/index') ?>">
                        <button type="button" class="btn btn-danger">
                            <i class="fa fa-close"></i> Hủy
                        </button>
                    </a>
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
                                   class="minimal none-action" {{$category->status ? 'checked':''}}>
                            <label class="control-label" for="status">
                                Kích hoạt
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" title="" name="display_homepage"
                                   class="minimal none-action" {{$category->display_homepage ? 'checked':''}}>
                            <label class="control-label" for="display-homepage">
                                Hiển thị trang chủ
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" title="" name="featured"
                                   class="minimal none-action" {{$category->featured ? 'checked':''}}>
                            <label class="control-label" for="featured">
                                Nổi bật
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget meta-boxes">
                <div class="widget-title">
                    <h4><span>Hình ảnh</span></h4>
                </div>
                <div class="widget-body">
                    <div class="image-box">
                        <div class="image-box-actions">
                            <div class="inside">
                                <img style="width: 100%;"
                                     src="{{$category->avatar ? asset($category->avatar):asset('vendor/img/placeholder.png')}}"
                                     class="fieldID attachment-266x266 size-266x266" alt="">
                                <input title="" type="hidden" id="fieldID" name="avatar"
                                       value="{{$category->avatar ? asset($category->avatar):asset('vendor/img/placeholder.png')}}">
                                <a href="{{ asset('/library/filemanager/dialog.php?type=1&field_id=fieldID&relative_url=1') }}"
                                   style="{{$category->avatar ? 'display:none':''}}"
                                   class="thumbnail-fieldID frame-btn">Đặt ảnh dại diện</a>
                                <a href="javascript:void(0)" style="{{$category->avatar ? '':'display:none'}}"
                                   class="remove-thumbnail-fieldID" onclick="remove_thumbnail('fieldID')">
                                    Xóa ảnh đại diện
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="ui-footer-help">
        <div class="ui-footer-help__content">
            <div class="ui-footer-help__icon">
                <span style="font-size: 25px;" class="fa fa-question-circle-o"></span>
            </div>
            <div>
                <p>
                    Bạn có thể xem thêm hướng dẫn
                    <a rel="noreferrer noopener" target="_blank" href="">tại đây</a>
                </p>
            </div>
        </div>
    </div>
</div>
