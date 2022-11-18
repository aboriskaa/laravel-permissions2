<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // create row user in roles table
        $userRole = Role::create(['name'=>'user']);
        // create row admin in roles table
        $adminRole = Role::create(['name'=>'admin']);
        // create row admin in roles table
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'email_verified_at' =>now(),
            'role_id' => $adminRole->id
        ]);

    }
}
