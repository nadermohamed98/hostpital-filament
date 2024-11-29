<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Patient::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->generateEgyptianPhoneNumber(),
            'country_id' => Country::inRandomOrder()->value('id') ?? 1, // Fallback if no countries exist
            'address' => $this->faker->address(),
            'type' => $this->faker->randomElement(['male', 'female']),
            'statement_type' => $this->faker->randomElement(['gyn', 'male']),
            'created_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'updated_at' => now(),
        ];
    }

    private function generateEgyptianPhoneNumber(): string
    {
        $prefixes = ['010', '011', '012', '015']; // Valid Egyptian prefixes
        $prefix = $this->faker->randomElement($prefixes);
        $number = $this->faker->numerify('########'); // Generates 8 random digits
        return $prefix . $number;
    }
}
