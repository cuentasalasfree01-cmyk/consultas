<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Client;

class UserDemoSeeder extends Seeder
{
    public function run()
    {
        // Crea roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'administrador']);
        $clientRole = Role::firstOrCreate(['name' => 'cliente']);

        // Usuario admin (puedes cambiar el correo si lo deseas)
        $admin = User::firstOrCreate(
            [
                'email' => 'admin@demo.com'
            ],
            [
                'name' => 'Admin Base Demo',
                'password' => bcrypt('admin1234')
            ]
        );
        $admin->assignRole($adminRole);

        // Usuario cliente
        $clienteUser = User::firstOrCreate(
            ['email' => 'cliente@demo.com'],
            [
                'name' => 'Cliente Demo',
                'password' => bcrypt('cliente123')
            ]
        );
        $clienteUser->assignRole($clientRole);

        // Registro de cliente relacionado
        Client::firstOrCreate([
            'name' => 'Cliente Base Demo',
            'email' => 'cliente@demo.com',
            'phone' => '3201234567',
            'company' => 'Empresa Demo',
            'notes' => 'Cliente generado desde seeder para pruebas',
            'user_id' => $clienteUser->id // Relación si tienes este campo
        ]);
    }
}
