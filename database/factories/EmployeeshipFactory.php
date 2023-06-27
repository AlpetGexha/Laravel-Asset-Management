<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Employeeship;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employeeship>
 */
class EmployeeshipFactory extends Factory
{
    protected $model = Employeeship::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'user_id' => User::factory(),
            'role' => $this->faker->randomElement([
                'admin', 'editor', 'viewer',
            ]),
        ];
    }
}
