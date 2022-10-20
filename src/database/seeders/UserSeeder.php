<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * データベースに対するデータ設定の実行
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'name' => 'test@gmail.com',
                'email' => 'test@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'test2@gmail.com',
                'email' => 'test2@gmail.com',
                'password' => Hash::make('password2'),
            ]
        ];

        $now = Carbon::now();
        foreach ($params as $param){
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('users')->insert($param);
        }
    }
}