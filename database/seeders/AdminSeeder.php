<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@perfectaregen.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Perfecta@2026'),
                'is_admin' => true,
            ]
        );
    }
}
