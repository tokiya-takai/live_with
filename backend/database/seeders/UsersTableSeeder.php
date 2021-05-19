<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'GUEST',
            'email' => 'guest@test.co.jp',
            'password' => Hash::make('guest123'),
            'isprivate' => 0,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'YOASOBI',
            'email' => 'test1@test.co.jp',
            'password' => Hash::make('guest123'),
            'isprivate' => 0,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'Ado',
            'email' => 'test2@test.co.jp',
            'password' => Hash::make('guest123'),
            'isprivate' => 0,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '髭',
            'email' => 'test3@test.co.jp',
            'password' => Hash::make('guest123'),
            'isprivate' => 0,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'test-private1',
            'email' => 'test4@test.co.jp',
            'password' => Hash::make('guest123'),
            'isprivate' => 1,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'test-private2',
            'email' => 'test5@test.co.jp',
            'password' => Hash::make('guest123'),
            'isprivate' => 1,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'test-private3',
            'email' => 'test6@test.co.jp',
            'password' => Hash::make('guest123'),
            'isprivate' => 1,
        ];
        DB::table('users')->insert($param);
    }
}
