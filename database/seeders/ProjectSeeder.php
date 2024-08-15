<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Crie 10 projetos
        Task::factory(5)->create();
    }
}
