<?php

namespace Database\Seeders;

use App\Models\User;
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

        // Default categories 
        foreach (["Personnel", "Professionnel", "Famille"] as $categorie){
            Category::create([
                "name" => $categorie
            ]);
        }
        

    }
}
