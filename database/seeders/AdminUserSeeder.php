<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@pcbuilder.it',
            'password' => bcrypt('admin123'),
            'role'     => 'admin',
        ]);
    }
}
