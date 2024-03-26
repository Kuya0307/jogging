<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'genre' => "1",
            'contents' => "タイタニック",
            'con_num' => "195",
            'delete_flag' => "0",
        ];
        DB::table('report')->insert($param);
        $param = [
            'genre' => "1",
            'contents' => "ターミネーター",
            'con_num' => "107",
            'delete_flag' => "0",
        ];
        DB::table('report')->insert($param);
        $param = [
            'genre' => "2",
            'contents' => "クロワッサン",
            'con_num' => "289",
            'delete_flag' => "0",
        ];
        DB::table('report')->insert($param);
        $param = [
            'genre' => "2",
            'contents' => "塩パン",
            'con_num' => "258",
            'delete_flag' => "0",
        ];
        DB::table('report')->insert($param);
        $param = [
            'genre' => "0",
            'contents' => "盛岡",
            'con_num' => "0",
            'delete_flag' => "0",
        ];
        DB::table('report')->insert($param);
        $param = [
            'genre' => "0",
            'contents' => "東京",
            'con_num' => "541.2",
            'delete_flag' => "0",
        ];
        DB::table('report')->insert($param);
    }
}
