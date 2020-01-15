<?php

use App\User;
use App\Helpers\FunctionHelpers;
use Illuminate\Database\Migrations\Migration;

class UtilitiesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        FunctionHelpers::batchInsert('utilities', [
            'id',
            'serial',
            'permission',
            'title',
            'icon',
            'path',
            'parent_id',
            'released',
            'status'
        ], [
            [1, 1, User::ROLE_ADMIN, 'Trang chủ', 'fa fa-home', 'admin/dashboard', null, 1, 1],

            [2, 2, User::ROLE_SENIOR, 'Cài đặt nâng cao', 'fa fa-cogs', null, null, 1, 1],

            [3, 1, User::ROLE_SENIOR, 'Cấu hình', 'fa fa-circle-o', 'admin/custom-fields', 2, 1, 1],
            [4, 2, User::ROLE_SENIOR, 'Vị trí menu', 'fa fa-circle-o', 'admin/location-menus', 2, 1, 1],
            [5, 3, User::ROLE_SENIOR, 'Quản lý trang', 'fa fa-circle-o', 'admin/pages', 2, 1, 1],
            [6, 3, User::ROLE_SENIOR, 'Quản lý sao lưu', 'fa fa-circle-o', 'admin/backups', 2, 1, 1],
            [7, 4, User::ROLE_SENIOR, 'Thiết lập chức năng', 'fa fa-circle-o', 'admin/utilities', 2, 1, 1],

            [8, 3, User::ROLE_ADMIN, 'Danh mục', 'fa fa-sliders', 'admin/categories', null, 1, 1],
            [9, 4, User::ROLE_ADMIN, 'Bài viết', 'fa fa-edit', 'admin/posts', null, 1, 1],
            [10, 5, User::ROLE_ADMIN, 'Tin rao', 'fa fa-leaf', 'admin/classifieds', null, 1, 1],

            [11, 6, User::ROLE_ADMIN, 'Sản phẩm', 'fa fa-dropbox', 'admin/products', null, 1, 1],
            [12, 6, User::ROLE_ADMIN, 'Đơn hàng', 'fa fa-shopping-cart', 'admin/orders', null, 1, 1],

            [13, 7, User::ROLE_ADMIN, 'Hiển thị', 'fa fa-eyedropper', null, null, 1, 1],

            [14, 1, User::ROLE_ADMIN, 'Menu', 'fa fa-circle-o', 'admin/menus', 13, 1, 1],
            [15, 2, User::ROLE_ADMIN, 'Giao diện', 'fa fa-circle-o', 'admin/themes', 13, 1, 1],
            [16, 3, User::ROLE_ADMIN, 'Tùy chỉnh CSS', 'fa fa-circle-o', 'admin/custom-css', 13, 1, 1],

            [17, 8, User::ROLE_ADMIN, 'Liên hệ', 'fa fa-envelope-o', 'admin/contacts', null, 1, 1],
            [18, 9, User::ROLE_ADMIN, 'Hỗ trợ viên', 'fa fa-life-bouy ', 'admin/supporters', null, 1, 1],
            [19, 10, User::ROLE_ADMIN, 'Quản lý tệp tin', 'fa fa-folder-open', 'admin/library', null, 1, 1],
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
