<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'id' => '1',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2a$12$dmcpny0BuA.E6Bs212t3vekk1ip7H19wQ7SLLP1Gxz1QrRt82KU0.', //Admin@321
            'status' => '1', // '1' for 'Active' and '0' for 'Inactive'
            'role' => 'super_admin', // 'super_admin' or 'admin'
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
