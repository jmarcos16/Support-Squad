<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = ['pending' , 'completed', 'in progress'];

        return [
            'user_id'  => 1,
            'title'    => $this->faker->sentence,
            'deadline' => $this->faker->dateTimeBetween('now', '+1 year'),
            'status'   => $status[rand(0, 2)],
        ];
    }
}
