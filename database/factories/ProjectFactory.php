<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'slug' => null, // Deixe o slug nulo, será gerado automaticamente
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'user_id' => User::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['planejamento', 'em_andamento', 'concluido', 'cancelado']), // Ajuste os valores conforme necessário
            'client_id' => Client::inRandomOrder()->first()->id,
            'type' => $this->faker->randomElement(['web', 'mobile', 'desktop']), // Defina os valores apropriados para o tipo
        ];
    }
}
