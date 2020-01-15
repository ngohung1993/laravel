<?php

use App\Helpers\FunctionHelpers;
use Illuminate\Database\Migrations\Migration;

class ProvinceData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = 'provinces';

        $attributes = [
            'A' => 'id',
            'B' => 'ten',
            'C' => 'ten_tieng_anh',
            'D' => 'cap'
        ];

        $file = './public/dashboard/excel/tinh.xlsx';

        $start = 2;
        $end = 64;

        FunctionHelpers::import_data_excel($table, $attributes, $file, $start, $end);

        $table = 'districts';
        $attributes = [
            'A' => 'id',
            'B' => 'ten',
            'C' => 'ten_tieng_anh',
            'D' => 'cap',
            'E' => 'province_id'
        ];

        $file = './public/dashboard/excel/huyen.xlsx';

        $start = 2;
        $end = 714;

        FunctionHelpers::import_data_excel($table, $attributes, $file, $start, $end);
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
