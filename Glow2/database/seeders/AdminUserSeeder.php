<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'serato@gmail.com'],
            [
                'name' => 'Norielle',
                'username' => 'serato123',
                'address' => 'Amat Street Brgy. Washington',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ]
        );
    }
}
