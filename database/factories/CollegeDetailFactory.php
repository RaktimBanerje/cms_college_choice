<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CollegeDetail;

class CollegeDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CollegeDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'college_id' => $this->faker->numberBetween(-10000, 10000),
            'info' => $this->faker->text,
            'course' => $this->faker->text,
            'admission' => $this->faker->text,
        ];
    }
}
