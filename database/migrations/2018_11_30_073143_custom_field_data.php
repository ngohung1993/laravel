<?php

use App\CustomField;
use App\Helpers\FunctionHelpers;
use Illuminate\Database\Migrations\Migration;

class CustomFieldData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        FunctionHelpers::batchInsert('custom_fields', [
            'theme_id',
            'id',
            'serial',
            'type',
            'title',
            'avatar',
            'description',
            'key',
            'icon',
            'parent_id',
            'released'
        ], [
            [1, 1, 1, CustomField::TYPE_SETTING, 'Thiết lập chung', null, null, 'options-general', 'fa fa-cog', null, 1],

            [1, 2, 1, CustomField::TYPE_SETTING, '', null, null, 'options-general-1', null, 1, 1],

            [1, 3, 1, CustomField::TYPE_IMAGE, 'Favicon', 'dashboard/img/favicon.io', 'Đề nghị 16 x 16px .png', 'favicon', null, 2, 1],
            [1, 4, 2, CustomField::TYPE_CHECKBOX, 'Dùng quickview', null, null, 'quick-view', null, 2, 1],
            [1, 5, 3, CustomField::TYPE_TEXT, 'Email', null, null, 'email', null, 2, 1],
            [1, 6, 4, CustomField::TYPE_TEXT, 'Số điện thoại', null, 'Số điện thoại, Email trên sẽ sử dụng cho toàn trang, nếu để trống sẽ lấy số điện thoại, và Email lúc đăng ký site', 'phone', null, 2, 1],

            [1, 7, 2, CustomField::TYPE_SETTING, 'Màu sắc', null, null, 'options-general-color', null, 1, 1],
            [1, 8, 3, CustomField::TYPE_SETTING, 'Text chính', null, null, 'options-general-font', null, 1, 1],
            [1, 9, 4, CustomField::TYPE_SETTING, 'Meta keyworđs cho trang chủ(seo)', null, null, 'options-general-meta-keywords', null, 1, 1],

            [1, 10, 2, CustomField::TYPE_SETTING, 'Đầu trang', null, null, 'header', 'fa fa-clone', null, 1],

            [1, 11, 1, CustomField::TYPE_SETTING, 'Logo', null, null, 'header-logo', null, 10, 1],

            [1, 12, 1, CustomField::TYPE_IMAGE, 'Logo', 'dashboard/img/placeholder.png', 'Đề nghị 217 x 36px', 'logo', null, 11, 1],

            [1, 13, 3, CustomField::TYPE_SETTING, 'Chân trang', null, 'Thiết lập thông tin chân trang', 'footer', 'fa fa-clone', null, 1],
            [1, 14, 4, CustomField::TYPE_SETTING, 'Trang chủ', null, null, 'home-page', 'fa fa-home', null, 1],

            [1, 15, 1, CustomField::TYPE_SETTING, 'Chọn các phần bố cục', null, 'Chúng tôi cung cấp các bộ cục ở trang chủ, bạn có thể lựa chọn và sắp xếp vị trí của chúng', 'home-page-section', null, 14, 1],
            [1, 16, 2, CustomField::TYPE_SELECT, 'Bố cục 1', null, null, 'home-page-section-1', null, 15, 1],
            [1, 17, 3, CustomField::TYPE_SELECT, 'Bố cục 2', null, null, 'home-page-section-2', null, 15, 1],
            [1, 18, 4, CustomField::TYPE_SELECT, 'Bố cục 3', null, null, 'home-page-section-3', null, 15, 1],
            [1, 19, 5, CustomField::TYPE_SELECT, 'Bố cục 4', null, null, 'home-page-section-4', null, 15, 1],
            [1, 20, 6, CustomField::TYPE_SELECT, 'Bố cục 5', null, null, 'home-page-section-5', null, 15, 1],

            [1, 21, 5, CustomField::TYPE_SECTION, 'Trang chủ - Section slider', null, null, 'section-slider', 'fa fa-picture-o', null, 1],

            [1, 22, 1, CustomField::TYPE_SECTION, 'SLIDER 1', 'dashboard/img/placeholder.png', null, 'slider-1', null, 21, 1],
            [1, 23, 2, CustomField::TYPE_SECTION, 'SLIDER 2', 'dashboard/img/placeholder.png', null, 'slider-2', null, 21, 1],
            [1, 24, 3, CustomField::TYPE_SECTION, 'SLIDER 3', 'dashboard/img/placeholder.png', null, 'slider-3', null, 21, 1],
            [1, 25, 4, CustomField::TYPE_SECTION, 'SLIDER 4', 'dashboard/img/placeholder.png', null, 'slider-4', null, 21, 1],
            [1, 26, 5, CustomField::TYPE_SECTION, 'SLIDER 5', 'dashboard/img/placeholder.png', null, 'slider-5', null, 21, 1],

            [1, 27, 6, CustomField::TYPE_SECTION, 'Trang chủ - Section 1', null, null, 'section-1', 'fa fa-puzzle-piece', null, 1],
            [1, 28, 7, CustomField::TYPE_SECTION, 'Trang chủ - Section 2', null, null, 'section-2', 'fa fa-puzzle-piece', null, 1],
            [1, 29, 8, CustomField::TYPE_SECTION, 'Trang chủ - Section 3', null, null, 'section-3', 'fa fa-puzzle-piece', null, 1],
            [1, 30, 9, CustomField::TYPE_SECTION, 'Trang chủ - Section 4', null, null, 'section-4', 'fa fa-puzzle-piece', null, 1],
            [1, 31, 9, CustomField::TYPE_SECTION, 'Trang chủ - Section 5', null, null, 'section-5', 'fa fa-puzzle-piece', null, 1],

            [1, 32, 10, CustomField::TYPE_SETTING, 'Trang danh sách sản phẩm', null, null, 'product-page', 'fa fa-cart-plus', null, 1],
            [1, 33, 11, CustomField::TYPE_SETTING, 'Trang danh sản phẩm', null, null, 'product-detail-page', 'fa fa-cart-plus', null, 1],
            [1, 34, 12, CustomField::TYPE_SETTING, 'Trang danh sách bản tin', null, null, 'news-page', 'fa fa-edit', null, 1],
            [1, 35, 13, CustomField::TYPE_SETTING, 'Trang danh bản tin', null, null, 'news-detail-page', 'fa fa-edit', null, 1],
            [1, 36, 14, CustomField::TYPE_SETTING, 'Trang liên hệ', null, null, 'contact-page', 'fa fa-envelope-o', null, 1]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
