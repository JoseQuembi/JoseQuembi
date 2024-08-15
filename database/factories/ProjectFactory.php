<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'slug' => $this->faker->slug, // Deixe o slug nulo, será gerado automaticamente
            'start_date' => $this->faker->date,
            'end_date'  => $this->faker->date,
            'user_id' => 1,
        ];
    }
}
