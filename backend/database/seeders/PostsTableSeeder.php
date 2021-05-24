<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'file_name' => "チャーチ",
            'file_path' => "/images/churchs.jpeg",
            'title' => "チャーチ",
            'details' => "",
            'purchase_date' => "2021-05-01",
            'maintenance' => "maintenance",
            'remarks' => "remarks",
            'update_date' => date("Y/m/d H:i:s", strtotime("1 day")),
        ];
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => 1,
            'file_name' => "スコッチグレイン",
            'file_path' => "/images/scotchgrain.jpeg",
            'title' => "スコッチグレイン",
            'details' => "",
            'purchase_date' => "2021-05-01",
            'maintenance' => "maintenance",
            'remarks' => "remarks",
            'update_date' => date("Y/m/d H:i:s", strtotime("2 day")),
        ];
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => 1,
            'file_name' => "シェットランドフォックス",
            'file_path' => "/images/shetlandfox.jpeg",
            'title' => "シェットランドフォックス",
            'details' => "",
            'purchase_date' => "2021-05-01",
            'maintenance' => "maintenance",
            'remarks' => "remarks",
            'update_date' => date("Y/m/d H:i:s", strtotime("3 day")),
        ];
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => 1,
            'file_name' => "トリッカーズ",
            'file_path' => "/images/trickers.jpeg",
            'title' => "トリッカーズ",
            'details' => "",
            'purchase_date' => "2021-05-01",
            'maintenance' => "maintenance",
            'remarks' => "remarks",
            'update_date' => date("Y/m/d H:i:s", strtotime("4 day")),
        ];
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => 2,
            'file_name' => "",
            'file_path' => "/images/crockettandjones.jpeg",
            'title' => "クロケット＆ジョーンズ",
            'details' => "test-public1",
            'purchase_date' => "2021-05-02",
            'maintenance' => "maintenance",
            'remarks' => "remarks",
            'update_date' => date("Y/m/d H:i:s", strtotime("5 day")),
        ];
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => 3,
            'file_name' => "",
            'file_path' => "/images/grenson.jpeg",
            'title' => "グレンソン",
            'details' => "test-public1",
            'purchase_date' => "2021-05-03",
            'maintenance' => "maintenance",
            'remarks' => "remarks",
            'update_date' => date("Y/m/d H:i:s", strtotime("6 day")),
        ];
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => 4,
            'file_name' => "",
            'file_path' => "/images/johnlobb.jpeg",
            'title' => "ジョンロブ",
            'details' => "test-public3",
            'purchase_date' => "2021-05-04",
            'maintenance' => "maintenance",
            'remarks' => "remarks",
            'update_date' => date("Y/m/d H:i:s", strtotime("7 day")),
        ];
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => 5,
            'file_name' => "",
            'file_path' => "",
            'title' => "test-private1's shoes",
            'details' => "test-private1",
            'purchase_date' => "2021-05-05",
            'maintenance' => "maintenance",
            'remarks' => "remarks",
            'update_date' => date("Y/m/d H:i:s", strtotime("8 day")),
        ];
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => 6,
            'file_name' => "",
            'file_path' => "",
            'title' => "test-private2's shoes",
            'details' => "test-private2",
            'purchase_date' => "2021-05-06",
            'maintenance' => "maintenance",
            'remarks' => "remarks",
            'update_date' => date("Y/m/d H:i:s", strtotime("8 day")),
        ];
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => 7,
            'file_name' => "",
            'file_path' => "",
            'title' => "test-private3's shoes",
            'details' => "test-private3",
            'purchase_date' => "2021-05-07",
            'maintenance' => "maintenance",
            'remarks' => "remarks",
            'update_date' => date("Y/m/d H:i:s", strtotime("9 day")),
        ];
        DB::table('posts')->insert($param);
    }
}
