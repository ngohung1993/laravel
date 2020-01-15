<?php
use App\Helpers\FunctionHelpers;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.home.detail')
@push('style')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        function closeButton() {
            $('.slickOverlay').css('display', 'none');
            $('.notify').css('display', 'none');
        }

        function myFunction() {
            $('.slickOverlay').css('display', 'block');
        }

    </script>
@endpush
@section('content')
    <style>
        .header .header-left .main-menu > li a {
            text-transform: uppercase;
        }
    </style>

    <div class="detail-container">
        <div class="breadcrumb">
            <div class="container">
                <a href="{{url('/')}}">Trang chủ</a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="/show/<?= $category['slug']?>"><?= $category['title']?></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span><?= $product['title']?></span>
            </div>
        </div>
        <div class="theme-intro responsive">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <h1><span><?= $product['title']?></span></h1>
                        <div class="desc">
                            <?= $product['description']?>
                        </div>
                        <div class="other-info clearfix">
                                <span class="price float-left ">
                                    <b><?= number_format($product['price'], 0, '.', '.')?> VNĐ</b>
                                </span>
                            <span class="rating float-right">
                                    <img src="{{asset('home/img/5-star.png')}}">
                                </span>
                        </div>
                        <div class="theme-action">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-order"
                               onclick="myFunction()"
                               class="install-theme">Đăng ký mẫu giao diện</a>
                            <a href="{{url('theme-demo',['category_slug'=> $product['slug']])}}"
                               class="view-demo action-preview-theme" data-url="">Xem trước giao diện</a>
                        </div>
                    </div>
                    <div class="col-lg-8 theme-image">
                        <div class="image-desktop d-none d-md-block">
                            <a href="" target="_blank" class="action-preview-theme" data-url="">
                                <img src="<?= $product['avatar']?>" title="Desktop" alt="Image Desktop">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="theme-detail">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="detail-feature">
                            <?= $product['content'] ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <br>
        <div class="themes-related">
            <div class="container">
                <h3>Các giao diện mới nhất</h3>
                <div class="row">
                    <?php foreach (FunctionHelpers::get_products(4, 0, 1) as $key => $value) :?>
                    <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 ">
                        <div class="theme-item responsive">
                            <div class="theme-image">
                                <?php if (isset($value['avatar'])) :?>
                                <img src="<?= $value['avatar']?>" alt="<?= $value['title']?>">
                                <?php endif;?>
                                <div class="theme-action">
                                    <div class="button">
                                        <a href="{{url('theme-demo',['category_slug'=> $value['slug']])}}"
                                           class="view-demo action-preview-theme" data-url="" target="_blank">
                                            Xem trước
                                        </a>
                                        <a href="{{url($value['category']['slug'].'/'.$value['slug'])}}"
                                           class="view-detail">Chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            <div class="theme-info">
                                <h3><a href="" class="title"><?= $value['title']?></a></h3>
                                <span class="price ">
                                      <b><?= number_format($value['price'], 0, '.', '.')?> VNĐ</b>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>

                </div>
            </div>
        </div>
    </div>
    <div id="modal-order" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="closeButton()">&times;</button>
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
                                                         style="height: 255px;width: 100%;"
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
									<span class="sell-price product-sell-price"
                                          style="margin-left: 5px"> <?= number_format($product['price'], 0, '.', '.')?>
                                        <sup>đ</sup>
									</span>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <form method="POST" action="{{route('sendmail')}}">
                                    @method("POST")
                                    @csrf
                                    <div class="input-group" style="margin-bottom: 15px;">
                                        <input id="full-name" title=""
                                               class="form-control form-input"
                                               name="full_name" required
                                               placeholder="Tên khách hàng *" type="text" maxlength="100">
                                    </div>
                                    <div class="input-group" style="margin-bottom: 15px;">
                                        <input id="phone" title=""
                                               class="form-control form-input"
                                               name="phone" pattern='(\+84|0)\d{9,10}'
                                               placeholder="Số điện thoại *" type="text" maxlength="100" required>
                                    </div>
                                    <div class="input-group" style="margin-bottom: 15px;">
                                        <input id="email" title=""
                                               class="form-control form-input"
                                               name="email" pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'
                                               placeholder="Email*" type="text" maxlength="100" required>
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
                                        <span class="width-red"></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slickOverlay sm-animated closeModal sm-fadeIn"
         style="background: rgba(0, 0, 0, 0.8);animation-duration: 0.3s;display: none">
    </div>
    <div class="clear"></div>
    <img class="scroll-top" src="{{asset('advertises/totop.png')}}"
         style="cursor: pointer; position: fixed; bottom: 90px; right: 33px; z-index: 99999; display: none;">
    <div class="register-bottom clearfix">
        <div class="container">
            <h4>Bắt đầu dùng thử 15 ngày</h4>
            <p>Để trải nghiệm nền tảng quản lý và bán hàng đa kênh được sử dụng nhiều nhất Việt Nam</p>
            <div class="reg-form">
                <input id="site_name_bottom" class="input-site-name d-none d-md-inline-block" type="text" value=""
                       placeholder="Nhập tên cửa hàng/doanh nghiệp của bạn">
                <a class="btn-registration banner-home-registration"
                   onclick="" href="javascript:void(0)">Dùng thử miễn phí</a>
            </div>
        </div>
    </div>

    <div id="fb-root"></div>
    @if(Session::has('success'))
        <div class="notify"
             style="position: absolute;top: 50%;left: 50%;z-index:10;transform: translate(-50%,-50%);border: 1px solid #000000;background: navy;color: #fff;padding: 30px;border-radius: 20px;font-size: 18px">
            <span>Đăng ký thành công. Chúng tôi sẽ liên hệ lại trong thời gian sớm nhất!</span>
            <button style="margin-left: 15px;color: #fff" type="button" class="close" data-dismiss="modal"
                    onclick="closeButton()">&times;
            </button>
        </div>
        <div class="slickOverlay sm-animated closeModal sm-fadeIn"
             style="background: rgba(0, 0, 0, 0.8);animation-duration: 0.3s;display: block">
        </div>
    @endif
    <div></div>
    <style>
        a {
            text-decoration: none !important;
        }

        .no-padding {
            float: left;
        }

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
