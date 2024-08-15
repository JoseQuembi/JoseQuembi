<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::factory()->create([
            'name' => 'José Quembi',
            'username' => 'jose-quembi',  // Gera um username único
            'email' => 'josequembi@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Defina uma senha padrão
            'address' => '123 Example Street, Test City, TX 12345', // Exemplo de endereço
            'phone' => '+244923101667', // Exemplo de número de telefone
            'profile_image' => asset('img/default/user.png'), // Exemplo de imagem de perfil
            'remember_token' => Str::random(10),
        ]);

        $adminRole = \App\Models\Role::where('name', 'admin')->first();
        if ($adminRole) {
            $user->roles()->attach($adminRole);
        }
    }
}
