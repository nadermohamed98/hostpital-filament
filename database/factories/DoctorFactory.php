<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->generateEgyptianPhoneNumber(),
            'specialization' => $this->faker->randomElement([
                'Gynecologist',
                'Obstetrician',
                'Reproductive Endocrinologist',
                'Fertility Specialist',
                'Urogynecologist'
            ]),
            'address' => $this->faker->address(),
            'salary' => $this->faker->randomFloat(2, 10000, 50000),
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
