<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        Admin::create(['id' => '1', 'name' => 'Super Admin', 'email' => 'admin@admin.com', 'password' => '$2a$12$dmcpny0BuA.E6Bs212t3vekk1ip7H19wQ7SLLP1Gxz1QrRt82KU0.','status' => '1','role_id' => 1,'created_at' => now(),'updated_at' => now()]);
        Admin::create(['id' => '2', 'name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => '$2a$12$dmcpny0BuA.E6Bs212t3vekk1ip7H19wQ7SLLP1Gxz1QrRt82KU0.','status' => '1','role_id' => 2,'created_at' => now(),'updated_at' => now()]);
    }
}
