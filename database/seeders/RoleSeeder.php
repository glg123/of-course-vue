<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        $roles = ['admin','customer','celebrity','driver','dietitian'];
        $models = [];

        foreach ($roles as $role) {
            $models[$role] = [
                'web' => Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']),
                'api' => $role == 'customer' ?  Role::firstOrCreate(['name' => $role, 'guard_name' => 'api']) : null,
            ];
        }

        // foreach ($models['customer'] as $guard => $role) {
        //     $role->givePermissionTo('our Perm ... Soon');
        // }

        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    // public function getPermissionsTable(): array
    // {

    // }

}