<?php

namespace Tests\Feature\RelationShipModelTest;

use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RelationShipsModelTest extends TestCase
{
    /** @test */
    public function users_database_has_expected_columns()
    {
        $this->assertTrue(
          Schema::hasColumns('users', [
            'id', 'name', 'email','password','role'
        ]), 1);
    }
     /** @test */
     public function projects_database_has_expected_columns()
     {
         $this->assertTrue(
           Schema::hasColumns('projects', [
             'id', 'name', 'descripcion','start'
         ]), 1);
     }
      /** @test */
      public function projectsUser_database_has_expected_columns()
      {
          $this->assertTrue(
            Schema::hasColumns('project_user', [
              'id', 'project_id', 'user_id','level_id'
          ]), 1);
      }
       /** @test */
     public function categories_database_has_expected_columns()
     {
         $this->assertTrue(
           Schema::hasColumns('categories', [
             'id', 'name', 'project_id'
         ]), 1);
     }
      /** @test */
      public function levels_database_has_expected_columns()
      {
          $this->assertTrue(
            Schema::hasColumns('levels', [
              'id', 'name', 'project_id'
          ]), 1);
      }
       /** @test */
     public function incidencias_database_has_expected_columns()
     {
         $this->assertTrue(
           Schema::hasColumns('incidents', [
             'id', 'title', 'descripcion','severity','category_id','level_id','client_id','support_id'
         ]), 1);
     }

   /** @test */
    public function a_user_belongs_to_a_projectTest()
    {
        $project=Project::create([
            'name'=> 'Proyecto Prueba Test ',
            'descripcion'=>'El proyecto prueba test'
        ]);
        $user=User::factory()->count(1)->create();

       // $this->assertEquals(1,$user->projects->count());
        $this->assertInstanceOf(Project::class, $user->projects);

    }
}
