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
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "name" => "Sagar Super Admin",
            "email" => "sagar@admin.com",
            "password" => Hash::make("12345678"),
            "utype" => '1',
            "is_verified" => '1',
        ]);

        $user->assignRole("Super Admin");
    }
}
