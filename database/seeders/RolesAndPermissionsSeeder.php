<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $Administrator = Role::create(['name' => 'Administrator', 'guard_name' => 'web']);
        $Operator = Role::create(['name' => 'Operator', 'guard_name' => 'web']);
        $Patient = Role::create(['name' => 'Patient', 'guard_name' => 'web']);
    }
}
