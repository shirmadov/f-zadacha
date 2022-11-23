<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notebook>
 */
class NotebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fio' => fake()->name(),
            'company' => fake()->company(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'birthday' => fake()->dateTimeBetween('1990-01-01', '2012-12-31')
                    ->format('d/m/Y'),
//            'photo'=>fake()->image('public/storage/images',400,300)

        ];
    }
}
