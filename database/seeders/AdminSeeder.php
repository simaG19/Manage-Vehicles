<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role; // Make sure this line is included

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Assuming 'admin' role has an ID of 1
        $adminRoleId = Role::where('name', 'admin')->first()->id;

        User::create([
            'name' => 'Admin Name',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Use a secure password
            'role_id' => $adminRoleId,
        ]);
    }
}
