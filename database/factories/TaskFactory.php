<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'description' => $this->faker->sentence(),
            'frequency' => $this->faker->randomElement(['Mensal', 'Anual']),
            'last_performed' => $this->faker->date(),
            'category_id' => \App\Models\Category::factory(),  
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
