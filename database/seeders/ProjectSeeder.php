<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Category;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        $categories_id = Category::all()->pluck('id');

        $project = new Project;
        $project->author = 'Adriatik Berdufi';
        $project->category_id = $faker->randomElement($categories_id);
        $project->title = 'Max-Coach';
        $project->description = 'Un Webapp per corsi online';
        $project->project_link = 'https://github.com/Adriatik-Berdufi/proj-html-vuejs';
        $project->save();
    }
}
