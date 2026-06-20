<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $users = [
            // Admin aggiuntivi
            ['name' => 'Marco Ferretti',   'email' => 'marco@pcbuilder.it',    'role' => 'admin'],
            ['name' => 'Sara Conti',       'email' => 'sara@pcbuilder.it',     'role' => 'admin'],

            // Utenti normali
            ['name' => 'Luca Bianchi',     'email' => 'luca.bianchi@mail.it',  'role' => 'user'],
            ['name' => 'Giulia Russo',     'email' => 'giulia.russo@mail.it',  'role' => 'user'],
            ['name' => 'Andrea Martini',   'email' => 'andrea.m@mail.it',      'role' => 'user'],
            ['name' => 'Chiara Lombardi',  'email' => 'chiara.l@mail.it',      'role' => 'user'],
            ['name' => 'Davide Romano',    'email' => 'davide.r@mail.it',      'role' => 'user'],
            ['name' => 'Elisa Gallo',      'email' => 'elisa.g@mail.it',       'role' => 'user'],
            ['name' => 'Matteo Ricci',     'email' => 'matteo.r@mail.it',      'role' => 'user'],
            ['name' => 'Federica Costa',   'email' => 'federica.c@mail.it',    'role' => 'user'],
        ];

        foreach ($users as $data) {
            User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => bcrypt('password123'),
                'role'     => $data['role'],
            ]);
        }
    }
}
