<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ------------------------ PERMISSION INSERT START -------------------------
         * Insert list of permissions to permission table
         * --------------------------------------------------------------------------
         */
        $permissions = [
            'Role List',                'Role Create',                  'Role Edit',                'Role Delete',
            'Users List',               'Users Create',                 'Users Edit',               'Users Delete',
            'Firms List',               'Firms Create',                 'Firms Edit',               'Firms Delete',
            'Customer Vendor List',     'Customer Vendor Create',       'Customer Vendor Edit',     'Customer Vendor Delete',
            'Product Category List',    'Product Category Create',      'Product Category Edit',    'Product Category Delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create([ 'name' => $permission ]);
        }
        /* ------------------------- PERMISSION INSERT END -------------------------- */
    }
}
