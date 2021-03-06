<?php

namespace Database\Factories;

use App\Models\SideProject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SideProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SideProject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence,
            'due_at' => $this->faker->dateTimeBetween('tomorrow', '+10 years')->format('Ymd'),
            'user_id' => 1,
        ];
    }
}
