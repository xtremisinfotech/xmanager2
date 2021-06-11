<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ------------------------ SUPER ADMIN CREATE START ------------------------
         * Create super user and give all permissions.
         * --------------------------------------------------------------------------
         */
        $user = User::create([
            'name'  =>  'Admin',
            'email' =>  'admin@swastik.com',
            'password'  =>  Hash::make('admin@123')
        ]);

        $role = Role::create([ 'name'   =>  'Super Admin' ]);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
        /* ------------------------- SUPER ADMIN CREATE END ------------------------- */
    }
}
