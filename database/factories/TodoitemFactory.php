<?php

namespace Database\Factories;

use App\Models\Todoitem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class TodoitemFactory extends Factory
{
    protected $model = Todoitem::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'text' => fake()->text(),
            'complete' => false,
            'user_id' => User::factory(),
        ];
    }
}
