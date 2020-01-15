<?php
use App\Helpers\FunctionHelpers;
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.home.theme-demo')
@push('theme-demo-page.js')
    <script>
        function closeButton() {
            $('.slickOverlay').css('display', 'none');
            $('.notify').css('display', 'none');
        }
    </script>
@endpush
@section('content')
    <div class="demo-top clearfix">
        <div class="fl back">
            <i class="fa fa-reply-all" aria-hidden="true"></i>
            <a href="{{ url($product['category']['slug'].'/'. $product['slug'])}}">
                Quay về xem chi tiết
            </a>
        </div>
        <div class="fl device-action">
            <div class="device-action-item active" data-id="desktop">
                <i class="fa fa-desktop" aria-hidden="true"></i> Desktop
            </div>
            <div class="device-action-item" data-id="mobile">
                <i style="font-size: 16px" class="fa fa-mobile" aria-hidden="true"></i> Mobile
            </div>
        </div>
        <div class="fl register">
            <a class="send-product-demo" href="javascript:void(0)"
               style="text-transform: uppercase;" data-toggle="modal"
               data-target="#modal-order">Đăng ký ngay</a>
        </div>
    </div>
    <div id="modal-order" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="text-align: center;text-transform: uppercase;color: #ed1c24;" class="modal-title">
                        Thông tin đặt hàng
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="area-form">
                        <div class="info-contact" style="text-align: center;margin-bottom: 15px;font-size: 15px;">
                            Cảm ơn Quý Khách đã chọn mẫu website
                            <a class="product-link" style="text-transform: uppercase;color: #23527c;font-weight: bold;"
                               href=""><?= $product['title']?>
                            </a>
                            Quý khách vui lòng nhập thông tin đặt hàng bên dưới, nhân viên
                            <a style="color: #23527c;" href="https://tigerweb.vn">tigerweb.vn</a>
                            sẽ liên hệ tư vấn ngay sau ít phút
                        </div>
                        <div class="row">
                            <div class="col-xs-12col-sm-6 col-md-6 item_wr">
                                <div class="w100 fl relative itemBicBig">
                                    <div class="item-box">
                                        <p></p>
                                        <div class="item">
                                            <div class="image" id="IdImageDesktop">
                                                <div class="bggif">
                                                    <img alt="" class="img-responsive product-avatar"
                                                         style="height: 255px;width: 400px;"
                                                         src="<?= $product['avatar']?>">
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tenduan w100 fl" style="margin-top: 25px;">
                                    <div class="title" style="color: darkslateblue">
                                        <span class="product-name" style="float: left;"><?= $product['title']?></span>
                                        <span class="label pull-right bg-blue product-code"> <?= $product['website_code']?>
									</span>
                                    </div>
                                    <div class="price" style="color: red">
									<span class="sell-price product-sell-price"><?= ($product['price'] - ($product['price'] * $product['discount'] / 100) * 1) ?>
                                        <sup>đ</sup>
									</span>
                                        <span class="old-price product-old-price"> - <?= $product['price']?>
                                            <sup>đ</sup>
									</span>
                                        <span class="discount person product-discount"><?= $product['discount'] . '%' ?>
									</span>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <form method="POST" action="{{route('sendmail')}}">
                                    @csrf
                                    <div class="input-group" style="margin-bottom: 15px;">
                                        <input id="full-name" title="" class="form-control form-input" name="full_name"
                                               placeholder="Tên khách hàng *" type="text" maxlength="100" required="">
                                    </div>
                                    <div class="input-group" style="margin-bottom: 15px;">
                                        <input id="phone" title="" class="form-control form-input" name="phone"
                                               pattern='(\+84|0)\d{9,10}'
                                               placeholder="Số điện thoại *" type="text" maxlength="100" required="">
                                    </div>
                                    <div class="input-group" style="margin-bottom: 15px;">
                                        <input id="email" title="" class="form-control form-input" name="email"
                                               pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'
                                               placeholder="Email" type="text" maxlength="100" required="">
                                    </div>
                                    <div class="input-group" style="margin-bottom: 15px;">
                                        <input type="hidden" name="product" value="<?= $product['title']?>">
                                        <textarea class="form-control" title="" name="message" id="note" cols="30"
                                                  rows="7"
                                                  placeholder="Ghi chú (nếu có)">
                                        </textarea>
                                    </div>
                                    <div class="text-center">
                                        <input type="hidden" title="" id="product-id">
                                        <button class="btn btn-primary" type="submit"
                                                style="text-transform: uppercase;width: 100%">
                                            Đặt hàng
                                            <i class="fa fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        iframe {
            width: 100%;
            height: 100%;
        }
    </style>
    <iframe src="<?= $product['link'] ?>"></iframe>
    @if(Session::has('success'))
        <div class="notify"
             style="position: absolute;top: 50%;left: 50%;z-index:10;transform: translate(-50%,-50%);border: 1px solid #000000;background: navy;color: #fff;padding: 30px;border-radius: 20px;font-size: 18px">
            <span>Đăng ký thành công. Chúng tôi sẽ liên hệ lại trong thời gian sớm nhất!</span>
            <button style="margin-left: 15px;color: #fff" type="button" class="close" data-dismiss="modal"
                    onclick="closeButton()">&times;
            </button>
        </div>
        <div class="slickOverlay sm-animated closeModal sm-fadeIn"
             style="background: rgba(0, 0, 0, 0.8);animation-duration: 0.3s;display: block!important;">
        </div>
    @endif
    <style>
        .slickOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            content: "";
            z-index: 1;
        }
    </style>
@endsection
