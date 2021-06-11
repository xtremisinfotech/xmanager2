<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class NewPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * New Permission assign to super admin
         */
        $permissions = [
            'Product Category List', 'Product Category Create',   'Product Category Edit', 'Product Category Delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::find(1);
        $user = User::find(1);
        $permissions = Permission::pluck('id', 'id')->all();
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
