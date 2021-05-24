<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        $param = [
            'post_id'=>1,
            'user_id'=>1,
            'content'=>"これはテスト用のコメントです。自分の投稿にコメントしています。",
        ];
        DB::table('comments')->insert($param);

        $param = [
            'post_id'=>1,
            'user_id'=>2,
            'content'=>"これはテスト用のコメントです。他の方(id2)がコメントしています。",
        ];
        DB::table('comments')->insert($param);

        $param = [
            'post_id'=>1,
            'user_id'=>3,
            'content'=>"これはテスト用のコメントです。他の方(id3)がコメントしています。",
        ];
        DB::table('comments')->insert($param);
    }
}
