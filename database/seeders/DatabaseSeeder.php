<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Member Test',
            'username' => 'member',
            'email' => 'member@gmail.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
