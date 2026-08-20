<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'adm@gmail.com'],
            [
                'name' => 'Administrador',
                'password' => 'adm', // No Laravel 11, o cast 'hashed' no Model User criptografa automaticamente!
            ]
        );
    }
}
