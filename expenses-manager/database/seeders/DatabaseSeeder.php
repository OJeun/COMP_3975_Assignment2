<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::create([
            'email' => 'aa@aa.aa',
            'password' => Hash::make('password'),
            'isApproved' => true,
            'isAdmin' => true,
        ]);
    }
}
