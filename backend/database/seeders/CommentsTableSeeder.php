<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        $param = [
            'post_id'=>1,
            'user_id'=>2,
            'content'=>"素敵な靴ですね！",
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('comments')->insert($param);
        
        $param = [
            'post_id'=>1,
            'user_id'=>3,
            'content'=>"いいですよね、チャーチ",
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('comments')->insert($param);

        $param = [
            'post_id'=>1,
            'user_id'=>4,
            'content'=>"ありがとうございます！",
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('comments')->insert($param);
    }
}
