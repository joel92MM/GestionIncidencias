<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name'=> 'Proyecto Clínica Casanova ',
            'descripcion'=>'El proyecto Clínica Casanova consiste en desarrollar un sitio web basico de la clinica casanova'
        ]);
        Project::create([
            'name'=> 'Proyecto Clínica Nordic ',
            'descripcion'=>'El proyecto Clínica Nordic consiste en desarrollar un sitio web basico de la clinica nordic'
        ]);
        Project::create([
            'name'=> 'Proyecto Padel las arenas ',
            'descripcion'=>'El proyecto Padel las arenas consiste en desarrollar un sitio web complejo de la padel las arenas'
        ]);
    }
}
