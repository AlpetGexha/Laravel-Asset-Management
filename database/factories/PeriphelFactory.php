<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Provaider;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periphel>
 */
class PeriphelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'make' => $this->faker->name,
            'model' => $this->faker->name,
            'serial' => $this->faker->unique()->numerify('SN#####'),
            'type' => $this->faker->randomLetter(),
            'current' => $this->faker->boolean(60),
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
            'provaider_id' => Provaider::factory(),
            'purchased_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'),
        ];
    }
}
