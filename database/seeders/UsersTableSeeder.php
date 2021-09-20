<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => "admin",
                'email' => "admin@admin.com",
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => bcrypt('admin'),
                'role' => "admin",
            ],
            [
                'name' => "jaka",
                'email' => "jaka@jaka.com",
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => bcrypt('jaka'),
                'role' => "HRD",
            ],
            [
                'name' => "raka",
                'email' => "raka@raka.com",
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => bcrypt('raka'),
                'role' => "Leader",
            ],
        ];

        \DB::table('users')->insert($users);
    }
}
