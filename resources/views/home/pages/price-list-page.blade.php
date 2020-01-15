@extends('layouts.home.main')
@push('price')
    <link href="{{ asset('home/css/price.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div id="wrapper" class="clearfix">
        <div class="home-price">
            <div class="title">
                <div class="container">
                    <h1>Bảng giá dịch vụ web Redtiger</h1>
                    <p class="desc">
                        Hãy lựa chọn gói dịch vụ phù hợp với nhu cầu của bạn
                    </p>
                </div>
            </div>

            <div class="packages">
                <div class="container">
                    <div class="time">
                        <ul>
                            <li data-type="normal" class="active"><a href="javascript:;">12 tháng</a></li>
                            <li data-type="discount" class=""><a href="javascript:;">24 tháng <span>-20%</span></a></li>
                        </ul>
                    </div>

                    <div class="packages-mobile d-block d-lg-none">
                        <ul>
                            <li data-type="pos" class="active">
                                POS
                            </li>
                            <li data-type="ecommerce">
                                eCommerce
                            </li>
                            <li data-type="omnichannel">
                                Omnichannel
                            </li>
                        </ul>
                    </div>

                    <div class="items">
                        <ul class="row">
                            <li class="col-lg-4 col-12 pos">
                                <div class="box-shadow">
                                    <div class="name">
                                        <a href="/ban-hang-tai-cua-hang.html">
                                            <h3>POS</h3>
                                            <p class="desc">
                                                Bán tại cửa hàng và chuỗi cửa hàng
                                            </p>
                                        </a>
                                    </div>
                                    <div class="price price-discount" style="display: none;">
                                        206.000<i>đ</i><span>/tháng</span>
                                        <div class="discount">Giảm <span>10%</span></div>
                                    </div>
                                    <div class="price price-normal" style="display: block;">
                                        229.000<i>đ</i><span>/tháng</span>
                                    </div>
                                    <div class="detail">
                                        <p class="normal" style="display: block;">
                                            <strong>Phí khởi tạo 1.000.000 đ</strong>
                                        </p>
                                        <p class="discount" style="display: none;">
                                            <strong>Miễn phí khởi tạo</strong>
                                        </p>
                                        <p>
                                            Sản phẩm không giới hạn
                                        </p>
                                        <p>
                                            1 cửa hàng
                                        </p>
                                        <p>
                                            Nhân viên không giới hạn
                                        </p>
                                        <p>
                                            Quản lý kho
                                        </p>
                                        <p>
                                            Quản lý hàng hóa
                                        </p>
                                        <p>
                                            Quản lý khách hàng
                                        </p>
                                        <p>
                                            Quản lý nhân viên
                                        </p>
                                        <p>
                                            Báo cáo bán hàng
                                        </p>
                                        <p>
                                            Kết nối thiết bị bán hàng
                                        </p>
                                        <p>
                                            <a class="btn-registration" href="javascript:;"
                                               onclick="showTrialForm(this, 4, false)">Dùng thử</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 col-12 ecommerce">
                                <div class="box-shadow">
                                    <div class="name">
                                        <a href="/thiet-ke-website-ban-hang.html">
                                            <h3>WEB</h3>
                                            <p class="desc">
                                                Bán hàng trên web
                                            </p>
                                        </a>
                                        <div class="channel">
                                            <div class="clearfix">
                                        <span data-type="web" class="active">
                                            Kênh WEB
                                        </span>
                                                <span data-type="facebook" class="">
                                            Kênh Facebook
                                        </span>
                                            </div>
                                        </div>
                                        <div class="flag">eCommerce</div>
                                    </div>
                                    <div class="price price-discount" style="display: none;">
                                        269.000<i>đ</i><span>/tháng</span>
                                        <div class="discount">Giảm <span>10%</span></div>
                                    </div>
                                    <div class="price price-normal" style="display: block;">
                                        299.000<i>đ</i><span>/tháng</span>
                                    </div>
                                    <div class="detail website">
                                        <p class="normal" style="display: block;">
                                            <strong>Phí khởi tạo 1.500.000 đ</strong>
                                        </p>
                                        <p class="discount" style="display: none;">
                                            <strong>Miễn phí khởi tạo</strong>
                                        </p>
                                        <p>
                                            Sản phẩm không giới hạn
                                        </p>
                                        <p>
                                            1 website bán hàng
                                        </p>
                                        <p>
                                            Dung lượng 1G
                                        </p>
                                        <p>
                                            5 email tên miền
                                        </p>
                                        <p>
                                            Thanh toán trực tuyến
                                        </p>
                                        <p>
                                            Chatlive
                                        </p>
                                        <p>
                                            Giao diện Responsive
                                        </p>
                                        <p>
                                            SSL - Chứng chỉ bảo mật
                                        </p>
                                        <p>
                                            Kho ứng dụng
                                        </p>
                                        <p>
                                            <a class="btn-registration" href="javascript:;"
                                               onclick="showTrialForm(this, 2, false)">Dùng thử</a>
                                        </p>
                                    </div>
                                    <div class="detail facebook" style="display: none;">
                                        <p class="normal" style="display: block;">
                                            <strong>Phí khởi tạo 1.500.000 đ</strong>
                                        </p>
                                        <p class="discount" style="display: none;">
                                            <strong>Miễn phí khởi tạo</strong>
                                        </p>
                                        <p>
                                            Sản phẩm không giới hạn
                                        </p>
                                        <p>
                                            Dung lượng 1G
                                        </p>
                                        <p>
                                            5 tài khoản Admin
                                        </p>
                                        <p>
                                            Quản lý tới 5 fanpage
                                        </p>
                                        <p>
                                            Lưu trữ, quản lý thông tin khách hàng
                                        </p>
                                        <p>
                                            Quản lý comment/inbox
                                        </p>
                                        <p>
                                            Ẩn bình luận chứa số điện thoại, email
                                        </p>
                                        <p>
                                            Tạo đơn hàng
                                        </p>
                                        <p>
                                            Báo chặn khách hàng xấu
                                        </p>
                                        <p>
                                            <a class="btn-registration" href="javascript:;"
                                               onclick="showTrialForm(this, 3, false)">Dùng thử</a>
                                        </p>
                                    </div>
                                    <div class="detail floor" style="display: none;">
                                        <p class="normal" style="display: block;">
                                            <strong>Phí khởi tạo 1.500.000 đ</strong>
                                        </p>
                                        <p class="discount" style="display: none;">
                                            <strong>Miễn phí khởi tạo</strong>
                                        </p>
                                        <p>
                                            Sản phẩm không giới hạn
                                        </p>
                                        <p>
                                            Quản lý đơn hàng
                                        </p>
                                        <p>
                                            Kết nối nhiều sàn
                                        </p>
                                        <p>
                                            Đồng bộ hàng hóa lên sàn
                                        </p>
                                        <p>
                                            Quản lý kho
                                        </p>
                                        <p>
                                            Quản lý hàng hóa
                                        </p>
                                        <p>
                                            Quản lý khách hàng
                                        </p>
                                        <p>
                                            Quản lý nhân viên
                                        </p>
                                        <p>
                                            Báo cáo bán hàng
                                        </p>
                                        <p>
                                            <a class="btn-registration" href="javascript:;"
                                               onclick="showTrialForm(this, 1, false)">Dùng thử</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 col-12 omnichannel website">
                                <div class="box-shadow">
                                    <div class="name">
                                        <i class="icon-star"></i>
                                        <a href="">
                                            <h3>Omnichannel</h3>
                                            <p class="desc">
                                                Giải pháp quản lý và bán hàng đa kênh
                                            </p>
                                        </a>
                                    </div>
                                    <div class="price price-discount" style="display: none;">
                                        479.000<i>đ</i><span>/tháng</span>
                                        <div class="discount">Giảm <span>20%</span></div>
                                    </div>
                                    <div class="price price-normal" style="display: block;">
                                        <div class="old-price">
                                            799.000<i>đ</i><span>/tháng</span>
                                        </div>
                                        <div class="new-price">
                                            599.000<i>đ</i><span>/tháng</span>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <p class="normal" style="display: block;">
                                            <strong>Phí khởi tạo 2.000.000 đ</strong>
                                        </p>
                                        <p class="discount" style="display: none;">
                                            <strong>Miễn phí khởi tạo</strong>
                                        </p>
                                        <p>
                                            Sản phẩm không giới hạn
                                        </p>
                                        <p>
                                            1 cửa hàng
                                        </p>
                                        <p>
                                            1 website bán hàng
                                        </p>
                                        <p>
                                            Tích hợp đối tác vận chuyển
                                        </p>
                                        <p>
                                            Bán hàng trên Sàn TMĐT
                                        </p>
                                        <p>
                                            Bán hàng trên Facebook
                                        </p>
                                        <p>
                                            Bán hàng trên website khác
                                        </p>
                                        <p>
                                            Báo cáo bán hàng đa kênh
                                        </p>
                                        <p>
                                            Kết nối thiết bị bán hàng
                                        </p>
                                        <p>
                                            <a class="btn-registration" href="javascript:;"
                                               onclick="showTrialForm(this, 5, true)">
                                                Dùng thử
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="myModal-tuvan" class="modal fade modal-register" role="dialog">
        </div>
        <div id="modalRegisterSuccess" class="modal fade modal-register" role="dialog">
        </div>
    </div>
    @push('price-js')
        <script>
            $(".packages .time li").click(function () {
                $(".packages .time li").removeClass("active");
                $(this).addClass("active");
                var type = $(this).attr("data-type");
                if (type == "normal") {
                    $(".packages .items li .price-discount").hide();
                    $(".packages .items li .price-normal").show();
                    $(".packages .items li .detail .normal").show();
                    $(".packages .items li .detail .discount").hide();
                    $(".packages .items ul").removeClass("has-discount");
                }
                else {
                    $(".packages .items li .price-discount").show();
                    $(".packages .items li .price-normal").hide();
                    $(".packages .items li .detail .normal").hide();
                    $(".packages .items li .detail .discount").show();
                    $(".packages .items ul").addClass("has-discount");
                }
            });
        </script>
   @endpush
@endsection
