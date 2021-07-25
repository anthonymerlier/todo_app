<?php

namespace Database\Factories;

use App\Models\Tag;
use InvertColor\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $color_bg = $this->faker->hexColor();
        $color_text = Color::fromHex($color_bg)->invert(true);

        return [
            "name" => $this->faker->unique()->word(),
            "color_bg" => $color_bg,
            "color_text" => $color_text,
        ];
    }
}
