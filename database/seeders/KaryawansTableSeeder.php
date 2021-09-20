<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KaryawansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $karyawans = [
            [
                'user_id' => "2",
                'departemen_id' => "3",
                'name' => "Jaka",
                'posisi' => "Leader",
                'no_telp' => "08353478",
                'alamat' => "Jl Bintara 14",
            ],
            [
                'user_id' => "3",
                'departemen_id' => "2",
                'name' => "Raka",
                'posisi' => "Leader",
                'no_telp' => "08353478",
                'alamat' => "Jl Bintara 10",
            ],
        ];

        \DB::table('karyawans')->insert($karyawans);
    }
}
