<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use InvertColor\Color;
use App\Models\TagTask;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Default user
        User::factory(1)->create();
        Tag::factory(30)->create();
        $faker = Factory::create('fr_FR');

        // Default categories 
        foreach (["Personnel", "Professionnel", "Famille", "Association"] as $categorie){
            $color_bg = $faker->hexColor();
            $color_text = Color::fromHex($color_bg)->invert(true);
            
            Category::create([
                "name" => $categorie,
                "ref" => bin2hex(random_bytes(12)),
                "color_bg" => $color_bg,
                "color_text" => $color_text
            ]);
        }

        Task::factory(38)->create();
        TagTask::factory(83)->create();
        

    }
}
