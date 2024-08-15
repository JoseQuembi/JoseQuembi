<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run()
    {
        // Cria 50 clientes para testes
        Client::factory()->count(10)->create();
    }
}
