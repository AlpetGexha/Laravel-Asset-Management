<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Provaider;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hardware>
 */
class HardwareFactory extends Factory
{
    public function definition(): array
    {
        $osTypes = [
            'Linux Ubuntu',
            'Windows',
            'macOS',
            'Android',
            'iOS',
        ];

        $osName = $this->faker->randomElement($osTypes);
        $osVersion = '';

        switch ($osName) {
            case 'Linux Ubuntu':
                $osVersion = $this->faker->randomElement(['18.04', '20.04', '22.04']);
                break;
            case 'Windows':
                $osVersion = $this->faker->randomElement(['10', '8.1', '7']);
                break;
            case 'macOS':
                $osVersion = $this->faker->randomElement(['Catalina', 'Big Sur', 'Monterey']);
                break;
            case 'Android':
                $osVersion = $this->faker->randomElement(['10', '11', '12']);
                break;
            case 'iOS':
                $osVersion = $this->faker->randomElement(['14', '15', '16']);
                break;
            case 'Window':
                $osVersion = $this->faker->randomElement(['11', '10', '8.1', '7']);
                break;
        }

        return [
            // Hardware facotoy
            'make' => $this->faker->name,
            'model' => $this->faker->name,
            'serial' => $this->faker->unique()->numerify('SN#####'),
            'os_name' => $osName,
            'os_version' => $osVersion,
            'type' => $this->faker->randomLetter(),
            'ram' => $this->faker->randomNumber(1, 128),
            'cpu' => $this->faker->randomNumber(1, 8),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'current' => $this->faker->boolean(60),
            'purchased_at' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
            'provaider_id' => Provaider::factory(),
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'),
        ];
    }
}
