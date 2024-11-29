<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Surgery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surgery>
 */
class SurgeryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Surgery::class;

    public function definition(): array
    {
        $amount = $this->faker->randomFloat(2, 1000, 10000);
        return [
            'patient_id' => Patient::inRandomOrder()->value('id'),
            'doctor_id' => Doctor::inRandomOrder()->value('id'),
            'name' => $this->faker->randomElement([
                'Appendectomy',
                'Cataract Surgery',
                'Cesarean Section',
                'Tonsillectomy'
            ]),
            'type' => $this->faker->randomElement(['gyn', 'male']), // Set random type
            'amount' => $amount,
            'paid' => $this->faker->randomFloat(2, 0, ($amount * 0.25)),
            'performed_at' => $this->faker->dateTimeBetween('-2 years', 'next week'),
            'notes' => $this->faker->optional()->paragraph(),
        ];
    }
}
