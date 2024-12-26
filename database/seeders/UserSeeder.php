<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User diimport
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'DimasArya',
            'email' => 'arya@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
