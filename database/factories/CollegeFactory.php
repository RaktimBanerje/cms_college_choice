<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\College;

class CollegeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = College::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Name' => $this->faker->text,
            'Title' => $this->faker->text,
            'Logo' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'Cover image' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'Location' => $this->faker->word,
        ];
    }
}
