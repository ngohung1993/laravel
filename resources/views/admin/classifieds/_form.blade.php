<?php
use Illuminate\Http\Request;
?>

@push('styles')
    <link href="{{ asset('plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Ckeditor -->
    <script src="{{ asset('plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('plugins/ckeditor/samples/js/sample.js')}}"></script>
    <script src="{{ asset('dashboard/js/editor.js')}}"></script>

    <!-- Fancybox -->
    <script src="{{ asset('plugins/fancybox/source/jquery.fancybox.js')}}"></script>
    <script src="{{ asset('dashboard/js/fancybox.js')}}"></script>
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
                            <input value="{{$classified->title}}" placeholder="Nhập tiêu đề tại đây" title=""
                                   type="text" class="form-control" name="title"/>
                            @if ($errors->has('title'))
                                <div class="help-block">
                                    {{$errors->first('title')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group required @if ($errors->has('category_id')) has-error @endif">
                            <label class="control-label" for="category-id">
                                Danh mục cha
                            </label>
                            <select title="" class="form-control" name="category_id">
                                <option value="">Chọn danh mục</option>
                                @foreach(App\Category::all() as $category)
                                    <option value="{{$category->id}}"
                                        {{$category->id == $classified->category_id ? 'selected':''}}>
                                        {{$category->title}}
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
                            <label class="control-label" for="description">
                                Mô tả
                            </label>
                            <textarea title="" name="description" id="describe" cols="30"
                                      rows="10">{{$classified->description}}</textarea>
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
                                  rows="10">{{$classified->content}}</textarea>
                    </div>
                </div>
            </div>

            <div id="advanced-sortables" class="meta-box-sortables">
                <div class="widget meta-boxes">
                    <div class="widget-title">
                        <h4><span>Thông tin cơ bản</span></h4>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="acreage">
                                        Loại tin rao
                                    </label>
                                    <input value="{{$classified->acreage}}" title=""
                                           type="text" class="form-control" name="acreage"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="acreage">
                                        Diện tích (m2)
                                    </label>
                                    <input value="{{$classified->acreage}}" title=""
                                           type="text" class="form-control" name="acreage"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="province-id">
                                        Tỉnh/Thành phố
                                    </label>
                                    <select title="" name="province_id" id="provinces" class="form-control"
                                            onchange="$.post('{{url('api/ajax/show-district')}}',{ province_id: $('#provinces').val()},function( data ) {
                                                $('#districts').html(data.data)})">
                                        <option value="">Chọn Tỉnh/Thành phố</option>
                                        @foreach(App\Province::all() as $province)
                                            <option value="{{$province->id}}"
                                                {{$province->id == $classified->province_id ? 'selected':''}}>
                                                {{$province->ten}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="district-id">
                                        Quận/Huyện
                                    </label>
                                    <select title="" name="district_id" id="districts" class="form-control">
                                        <option value="">Chọn Quận/Huyện</option>
                                        @foreach(App\District::all()->where('province_id','=',$classified->province_id) as $district)
                                            <option value="{{$district->id}}"
                                                {{$district->id == $classified->district_id ? 'selected':''}}>
                                                {{$district->ten}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="unit-id">
                                        Đơn vị
                                    </label>
                                    <input value="{{$classified->unit_id}}" title=""
                                           type="text" class="form-control" name="unit_id"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="price">
                                        Giá
                                    </label>
                                    <input value="{{$classified->price}}" title=""
                                           type="text" class="form-control" name="price"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address">
                                Địa chỉ dự án
                            </label>
                            <input value="{{$classified->address}}" title=""
                                   type="text" class="form-control" name="address"/>
                        </div>
                    </div>
                </div>
                <div class="widget meta-boxes">
                    <div class="widget-title">
                        <h4><span>Thông tin khác</span></h4>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="contact-name">
                                        Tên liên hệ
                                    </label>
                                    <input value="{{$classified->contact_name}}" title=""
                                           type="text" class="form-control" name="contact_name"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="email">
                                        Email
                                    </label>
                                    <input value="{{$classified->email}}" title=""
                                           type="text" class="form-control" name="email"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="phone">
                                        Số điện thoại
                                    </label>
                                    <input value="{{$classified->phone}}" title=""
                                           type="text" class="form-control" name="phone"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="mobile">
                                        Di động
                                    </label>
                                    <input value="{{$classified->mobile}}" title=""
                                           type="text" class="form-control" name="mobile"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="contacts">
                                        Địa chỉ liên hệ
                                    </label>
                                    <input value="{{$classified->contacts}}" title=""
                                           type="text" class="form-control" name="contacts"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        <span class="page-slug-seo">{{$classified->slug}}</span>
                                    </p>
                                </div>
                                <div class="page-description-seo ws-nm">
                                    {{$classified->description}}
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
                                   class="minimal none-action" {{$classified->status ? 'checked':''}}>
                            <label class="control-label" for="status">
                                Kích hoạt
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" title="" name="display_homepage"
                                   class="minimal none-action" {{$classified->display_homepage ? 'checked':''}}>
                            <label class="control-label" for="display-homepage">
                                Hiển thị trang chủ
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" title="" name="featured"
                                   class="minimal none-action" {{$classified->featured ? 'checked':''}}>
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
                                     src="{{$classified->avatar ? asset($classified->avatar):asset('dashboard/img/placeholder.png')}}"
                                     class="fieldID attachment-266x266 size-266x266" alt="">
                                <input title="" type="hidden" id="fieldID" name="avatar"
                                       value="{{$classified->avatar ? asset($classified->avatar):asset('dashboard/img/placeholder.png')}}">
                                <a href="{{ asset('library/filemanager/dialog.php?type=1&field_id=fieldID&relative_url=1') }}"
                                   style="{{$classified->avatar ? 'display:none':''}}"
                                   class="thumbnail-fieldID frame-btn">Đặt ảnh dại diện</a>
                                <a href="javascript:void(0)" style="{{$classified->avatar ? '':'display:none'}}"
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
