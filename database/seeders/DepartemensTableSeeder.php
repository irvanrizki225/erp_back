<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartemensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departemens = [
            [
                'name' => "HRD",
            ],
            [
                'name' => "Production",
            ],
            [
                'name' => "Purchasing",
            ],
        ];

        \DB::table('departemens')->insert($departemens);
    }
}
