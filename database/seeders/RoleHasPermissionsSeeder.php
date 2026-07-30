<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_has_permissions')->insert([
            [
                'name' => "user-create",
                'guard_name' => "web"
            ],
            [
                'name' => "user-show",
                'guard_name' => "web"
            ],
            [
                'name' => "user-edit",
                'guard_name' => "web"
            ],
            [
                'name' => "user-delete",
                'guard_name' => "web"
            ],
        ]);
    }
}
