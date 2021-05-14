<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      =>  "Master Admin",
            'email'     =>  "admin@xtremisinfotech.com",
            'password'  =>  bcrypt('admin@123'),
            'type'      =>  0
        ]);
    }
}
