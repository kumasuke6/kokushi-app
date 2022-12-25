<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'name' => '理学療法士国家試験',
                'year' => 2022,
                'number' => 57,
                'harf_div' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 0,
                'name' => '理学療法士国家試験',
                'year' => 2022,
                'number' => 57,
                'harf_div' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 0,
                'name' => '理学療法士国家試験',
                'year' => 2021,
                'number' => 56,
                'harf_div' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 0,
                'name' => '理学療法士国家試験',
                'year' => 2021,
                'number' => 56,
                'harf_div' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 0,
                'name' => '理学療法士国家試験',
                'year' => 2020,
                'number' => 55,
                'harf_div' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 0,
                'name' => '理学療法士国家試験',
                'year' => 2020,
                'number' => 55,
                'harf_div' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 0,
                'name' => '理学療法士国家試験',
                'year' => 2019,
                'number' => 54,
                'harf_div' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 0,
                'name' => '理学療法士国家試験',
                'year' => 2019,
                'number' => 54,
                'harf_div' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];

        foreach ($params as $param) {
            DB::table('subjects')->insert($param);
        }
    }
}
