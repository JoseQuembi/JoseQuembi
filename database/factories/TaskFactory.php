<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'project_id' => Project::factory(1)->create(),//inRandomOrder()->first()->id,
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'assigned_to' => User::inRandomOrder()->first()->id, // Atribui um usuário aleatório como responsável
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['pendente', 'em progresso', 'concluída']), // Ajuste os valores conforme necessário
            'priority' => $this->faker->randomElement(['baixa', 'média', 'alta']), // Ajuste os valores conforme necessário
        ];
    }
}
