<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder {
    public function run() {
        
        $soporteRole = Role::firstOrCreate(['name' => 'soporte']);

        // Crear usuarios y asignar roles
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        

        $soporte1 = User::create([
            'name' => 'Support User 1',
            'email' => 'support1@support.com',
            'password' => bcrypt('password'),
        ]);
        $soporte1->assignRole($soporteRole); // Asigna el rol de soporte

        $soporte2 = User::create([
            'name' => 'Support User 2',
            'email' => 'support2@support.com',
            'password' => bcrypt('password'),
        ]);
        $soporte2->assignRole($soporteRole); // Asigna el rol de soporte
    }
}
