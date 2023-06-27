<?php

namespace Database\Factories;

use App\Enums\HardwareStatus;
use App\Models\Company;
use App\Models\Provaider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Software>
 */
class SoftwareFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'type' => $this->faker->randomLetter(),
            'current' => $this->faker->boolean(60),
            'company_id' => Company::factory(),
            'status' => $this->faker->randomElement(HardwareStatus::all()),
            'provaider_id' => Provaider::factory(),
            'licenses' => $this->faker->regexify('[A-Z0-9]{5}-[A-Z0-9]{5}-[A-Z0-9]{5}-[A-Z0-9]{5}'),
            'license_period' => $this->faker->dateTimeBetween('now', '+1 years'),
            'purchased_at' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'expired_at' => $this->faker->dateTimeBetween('now', '+1 years'),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'),
        ];
    }
}
