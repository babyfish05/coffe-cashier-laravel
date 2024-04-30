<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
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
                'name' => 'Administrator',
                'email' => 'AdminMarket@gmail.com',
                'password' => bcrypt('AdminMarket'),
                'level' => 1
            ],
            [
                'name' => 'kasir1',
                'email' => 'KaryawanKasir1@gmail.com',
                'password' => bcrypt('KaryawanKasir1'),
                'level' => 2
            ],
            [
                'name' => 'kasir2',
                'email' => 'KaryawanKasir2@gmail.com',
                'password' => bcrypt('KaryawanKasir2'),
                'level' => 2
            ],
        ];

        foreach ($users as $key => $value) {
            user::create($value);
        }
    }
}
