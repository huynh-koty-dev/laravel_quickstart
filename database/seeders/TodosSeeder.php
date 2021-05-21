<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('todos')->insert([
            [
                'title'=>'lich di choi voi ny1 ',
                'user_id'=>1,
                'content'=>'toi thu 3 di choi voi em Linh',
                'status'=>'dang hoan thanh'
            ],
            [
                'title'=>'lich di choi voi ny2 ',
                'user_id'=>1,
                'content'=>'toi thu 2 di choi voi em Trang',
                'status'=>'da hoan thanh'
            ],
            [
                'title'=>'lich di choi voi ny3 ',
                'user_id'=>1,
                'content'=>'toi thu 6 di choi voi em Huyen',
                'status'=>'chua hoan thanh'
            ],
            [
                'title'=>'deadline',
                'user_id'=>1,
                'content'=>'gui deadline cho Hoai dai ca ',
                'status'=>'chua hoan thanh'
            ],
            [
                'title'=>'deadline',
                'user_id'=>2,
                'content'=>'gui deadline cho truong ',
                'status'=>'chua hoan thanh'
            ],
            [
                'title'=>'di du lich',
                'user_id'=>2,
                'content'=>'sang t6 di da lat',
                'status'=>'chua hoan thanh'
            ],
            [
                'title'=>'o nha ngu',
                'user_id'=>3,
                'content'=>'ca tuan o nha ngu',
                'status'=>'dang hoan thanh'
            ],
        ]);
    }
}
