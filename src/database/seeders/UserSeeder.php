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
                'name' => 'テスト1',
                'email' => 'test@gmail.com',
                'type' => 0,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'テスト2',
                'email' => 'test2@gmail.com',
                'type' => 1,
                'password' => Hash::make('password2'),
            ],
            [
                'name' => 'テスト3',
                'email' => 'test3@gmail.com',
                'type' => 2,
                'password' => Hash::make('password3'),
            ]
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('users')->insert($param);
        }
    }
}
