<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("admin"),
            "role" => "admin"
        ]);
        User::query()->create([
            "name" => "sales1",
            "email" => "sales1@gmail.com",
            "password" => Hash::make("sales1"),
            "role" => "sales"
        ]);
        User::query()->create([
            "name" => "sales2",
            "email" => "sales2@gmail.com",
            "password" => Hash::make("sales2"),
            "role" => "sales"
        ]);
    }
}
