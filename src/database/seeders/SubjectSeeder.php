<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'type' => 0,
                'year' => 2021,
                'harf_div' => 1,
            ],
            [
                'type' => 0,
                'year' => 2021,
                'harf_div' => 2,
            ],
            [
                'type' => 0,
                'year' => 2022,
                'harf_div' => 1,
            ],
            [
                'type' => 0,
                'year' => 2022,
                'harf_div' => 2,
            ],
        ];

        foreach ($params as $param){
            DB::table('subjects')->insert($param);
        }
    }
}
