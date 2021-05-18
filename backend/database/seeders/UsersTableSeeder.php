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
    }
}
