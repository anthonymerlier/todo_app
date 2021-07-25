<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->realText(rand(10, 30)),
            "description" => $this->faker->realText(rand(150,210)),
            "priority" => $this->faker->numberBetween(1,5),
            "ref" => $this->faker->md5,
            "begin_date" => $this->faker->datetime(),
            "end_date" => $this->faker->datetime(),
            "category_id" => $this->faker->numberBetween(1,4),
            "user_id" => 1
        ];
    }
}
