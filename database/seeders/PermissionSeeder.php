<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => "access-permission-management",
                'guard_name' => "web"
            ],
            [
                'name' => "assign-permission",
                'guard_name' => "web"
            ],
            [
                'name' => "user-management-access",
                'guard_name' => "web"
            ],
            [
                'name' => "is_admin",
                'guard_name' => "web"
            ],
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
            [
                'name' => "supervisor-access",
                'guard_name' => "web"
            ],
            [
                'name' => "supervisor-create",
                'guard_name' => "web"
            ],
            [
                'name' => "supervisor-edit",
                'guard_name' => "web"
            ],
            [
                'name' => "supervisor-delete",
                'guard_name' => "web"
            ],
            [
                'name' => "supervisor-show",
                'guard_name' => "web"
            ],
            [
                'name' => "salesagent-access",
                'guard_name' => "web"
            ],
            [
                'name' => "salesagent-create",
                'guard_name' => "web"
            ],
            [
                'name' => "salesagent-show",
                'guard_name' => "web"
            ],
            [
                'name' => "salesagent-edit",
                'guard_name' => "web"
            ],
            [
                'name' => "salesagent-delete",
                'guard_name' => "web"
            ],
            [
                'name' => "is-super-admin",
                'guard_name' => "web"
            ],
        ]);
    }
}
