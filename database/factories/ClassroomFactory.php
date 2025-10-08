<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClassroomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                '11 PPLG 1',
                '11 PPLG 2',
                '11 PPLG 3',
            ]),
        ];
    }
}
