<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => "Super Admin",
                'guard_name' => "web"
            ],
            [
                'name' => "Admin",
                'guard_name' => "web"
            ],
            [
                'name' => "Supervisor",
                'guard_name' => "web"
            ],
            [
                'name' => "Sales Agents",
                'guard_name' => "web"
            ],
        ]);
    }
}
