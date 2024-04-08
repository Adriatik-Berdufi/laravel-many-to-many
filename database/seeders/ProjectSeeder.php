<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = new Project;
        $project->author = 'Adriatik Berdufi';
        $project->title = 'Max-Coach';
        $project->description = 'Un Webapp per corsi online';
        $project->project_link = 'https://github.com/Adriatik-Berdufi/proj-html-vuejs';
        $project->save();
    }
}
