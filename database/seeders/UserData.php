<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'level' => 1,
                'email' => 'admin@gmail.com'
            ],
            [
                'name' => 'Kasir',
                'username' => 'kasir',
                'password' => bcrypt('kasir123'),
                'level' => 2,
                'email' => 'kasir@gmail.com'
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
