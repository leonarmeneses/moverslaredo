<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Pedro',
            'email' => 'pedro@moverslaredo.com',
            'password' => Hash::make('Silva2025.'),
            'email_verified_at' => now(),
        ]);
    }
}
