<div>
    <form method="post" action="{{ route('pages.store') }}">

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
            </div><br />
        @endif
        <div class="row">
            <div class="col-md-9">
                <div class="main-form">
                    <div class="form-body">
                        <div class="form-group required @if ($errors->has('title')) has-error @endif">
                            @csrf
                            <label class="control-label" for="title">
                                Tiêu đề
                            </label>
                            <input title="" type="text" class="form-control" name="title"/>
                            @if ($errors->has('title'))
                                <div class="help-block">
                                    {{$errors->first('title')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group required @if ($errors->has('key')) has-error @endif">
                            <label class="control-label" for="key">
                                Khóa
                            </label>
                            <input title="" type="text" class="form-control" name="key"/>
                            @if ($errors->has('key'))
                                <div class="help-block">
                                    {{$errors->first('key')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea title="" rows="3" class="form-control" name="description"></textarea>
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
                    <div class="widget-body">
                        <div class="btn-set" style="text-align: center;">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check-circle"></i> Lưu & Thoát
                            </button>
                            <a href="<?= url('pages/index') ?>">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-close"></i> Hủy
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
