<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // Asegúrate de importar el modelo de rol

class UserSeeder extends Seeder {
    public function run() {
        // Crear roles
        $adminRole = Role::create(['name' => 'admin']);
        $soporteRole = Role::create(['name' => 'soporte']);

        // Crear usuarios y asignar roles
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole($adminRole); // Asigna el rol creado

        $soporte1 = User::create([
            'name' => 'Support User 1',
            'email' => 'support1@support.com',
            'password' => bcrypt('password'),
        ]);
        $soporte1->assignRole($soporteRole); // Asigna el rol creado

        $soporte2 = User::create([
            'name' => 'Support User 2',
            'email' => 'support2@support.com',
            'password' => bcrypt('password'),
        ]);
        $soporte2->assignRole($soporteRole); // Asigna el rol creado
    }
}
