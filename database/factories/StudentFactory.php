<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => fake()->unique()->numerify('####'),
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'class' => fake()->randomElement(['AKL', '11 AKL', '12 AKL', '10 BiD 2', '12 TKJ 3', '11 TKJ 3']),
            'major' => fake()->randomElement(['AKL', 'BiD', 'TKJ'])
        ];
    }
}
