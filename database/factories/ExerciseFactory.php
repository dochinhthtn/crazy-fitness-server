<?php

namespace Database\Factories;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExerciseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exercise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $countTypes = ['repetition', 'timer'];
        return [
            'name' => $this->faker->md5,
            'count_type' => $countTypes[$this->faker->numberBetween(0,1)],
            'duration' => $this->faker->numberBetween(10, 20) / 10,
            'tutorial' => $this->faker->sentence,
            'calories' => $this->faker->numberBetween(1, 5),
            'difficulty' => $this->faker->numberBetween(1,10)
        ];
    }
}
