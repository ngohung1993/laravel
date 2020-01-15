@extends('layouts.home.main')
@push('contact-page.css')
    <link rel="stylesheet" href="/home/css/default.min.css">
@endpush
@section('content')
    <div id="wrapper" class="clearfix" style="margin-top: 97px">
        <div style="clear:both;"></div>
        <div class="contact-us">
            <div class="bg-contact-us">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/">Trang chủ</a>
                        <span>&nbsp;/&nbsp;</span>
                        <span class="active">Liên hệ</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="company-info">

                    <h3>
                        Đội ngũ hỗ trợ của Tigerweb luôn sẵn sàng hỗ trợ bạn.
                    </h3>
                    <h4>
                        Trụ sở:
                    </h4>
                    <div class="meta">
                        <i class="fa fa-map-marker"></i>Tầng 33 - Tòa nhà V1 - Victoria Văn Phú - Lê Trọng Tấn - Khu Đô Thi Văn Phú
                        Hà Đông - Hà Nội
                    </div>
                    <div class="meta">
                        <p style="padding-top : 18px;">
                            <b>Email : </b>
                            <a href="mailto:thietkewebtiger@gmail.com">thietkewebtiger@gmail.com</a></p>
                        <p style="padding-top : 5px;"><b>Phone</b>: 0967 048 347</p>
                        <p style="">Từ 8h00 – 22h00 các ngày từ thứ 2 đến Chủ nhật</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="contact-map text-center" style="margin: 20px 0 20px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.813103225213!2d105.7654811153511!3d20.960019386035633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313452db922e2fd1%3A0x1c21db1be4bac38a!2zVmljdG9yaWEgVsSDbiBQaMO6!5e0!3m2!1svi!2s!4v1545791336647"
                            width="600" height="450" frameborder="0" style="border:0" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <p style="text-align : center; color : red; font-size : 14px;"></p>

        </div>
        <div class="register-bottom clearfix">
            <div class="container">
                <h4>Bắt đầu dùng thử 15 ngày</h4>
                <p>Để trải nghiệm nền tảng quản lý và bán hàng đa kênh được sử dụng nhiều nhất Việt Nam</p>
                <div class="reg-form">
                    <input id="site_name_bottom" class="input-site-name d-none d-md-inline-block hidden-xs" type="text"
                           value="" placeholder="Nhập tên của bạn"
                           onkeypress="return onInputStoreName(event, this)">
                    <a class="btn-registration banner-home-registration event-Sapo-Free-Trial-form-open" href="javascript:;">
                        Dùng thử miễn phí
                    </a>
                </div>
            </div>
        </div>
        <style>
            .bg-capcha {
                margin: 0px;
            }
        </style>
    </div>
@endsection
