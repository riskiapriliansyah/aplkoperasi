<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'role' => 'admin',
            'username' => 'admin',
            'name' => 'Admin',
            'password' => bcrypt('ampi@2021'),
            'remember_token' => Str::random(60),
        ]);
    }
}
