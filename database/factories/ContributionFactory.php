<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contribution>
 */
class ContributionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contributor_id' => User::factory(),
            'title' => fake()->name(),
            'name' =>  fake()->name(),
            'link' => 'https://www.youtube.com/watch?v=AV09q4kNkwA',
            'image' => 'https://www.youtube.com/watch?v=AV09q4kNkwA',
            'created_at' => now()
        ];
    }
}
