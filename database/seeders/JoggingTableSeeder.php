<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JoggingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => "1",
            'date' => "2023-03-22",
            'distance' => "8.25",
            'jog_time' => "01:19:22",
            'calorie' => "791.4",
            'course_img_pass' => "image/sample.jps",
            'jog_env' => "1",
            'delete_flag' => "0",

        ];
        DB::table('jogging')->insert($param);

        $param = [
            'user_id' => "1",
            'date' => "2023-05-01",
            'distance' => "10.06",
            'jog_time' => "01:38:39",
            'calorie' => "912.9",
            'course_img_pass' => "image/sample2.jps",
            'jog_env' => "1",
            'delete_flag' => "0",

        ];
        DB::table('jogging')->insert($param);

        $param = [
            'user_id' => "2",
            'date' => "2024-02-22",
            'distance' => "3.12",
            'jog_time' => "00:31:29",
            'calorie' => "321.5",
            'course_img_pass' => "image/sample4.jps",
            'jog_env' => "0",
            'delete_flag' => "0",

        ];
        DB::table('jogging')->insert($param);
    }
}
