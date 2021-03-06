<?php

namespace Database\Factories;


use App\Models\TagTask;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagTaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TagTask::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "task_id" => $this->faker->numberBetween(1, 38),
            "tag_id" => $this->faker->numberBetween(1,25)
        ];
    }
}
