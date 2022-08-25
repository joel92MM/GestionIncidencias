<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Categoría A1',
            //'descripcion'=>'',
            'project_id'=>1
        ]);

        Category::create([
            'name'=>'Categoría A2',
            //'descripcion'=>'',
            'project_id'=>1
        ]);

        Category::create([
            'name'=>'Categoría B1',
            //'descripcion'=>'',
            'project_id'=>2
        ]);

        Category::create([
            'name'=>'Categoría B2',
            //'descripcion'=>'',
            'project_id'=>2
        ]);
     }
}
