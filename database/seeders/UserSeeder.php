<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'gifari',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '12345678admin',
            'role' => 'Admin',
            'remember_token' => Str::random(10)
        ]);

    }
}
