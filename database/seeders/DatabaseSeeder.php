<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
    //     $this->call([
    //     AdminSeeder::class,
    // ]);
    //     DB::table('users')->insert([
    //         'name' => 'Admin',
    //         'email' => 'admin@gmail.com',
    //         'role' => 'admin',
    //         'password' => Hash::make('123456'),
    //     ]);

    User::create([
    'name' => 'Admin',
    'role' => 'admin',
      'password' => bcrypt('123456'),
    ]);
    }
}
