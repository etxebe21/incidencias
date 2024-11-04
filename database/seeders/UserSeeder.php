<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    public function run() {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $soporte1 = User::create([
            'name' => 'Support User 1',
            'email' => 'support1@support.com',
            'password' => bcrypt('password'),
        ]);
        $soporte1->assignRole('soporte');

        $soporte2 = User::create([
            'name' => 'Support User 2',
            'email' => 'support2@support.com',
            'password' => bcrypt('password'),
        ]);
        $soporte2->assignRole('soporte');
    }
}