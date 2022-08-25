<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeUsersTest extends TestCase
{
     /** @test */
     function pantallaInicio(){
        $this-> get('/')
             -> assertStatus(200)//comprueba si la url se ha cargado satisfactoriamente
             -> assertSee('Bienvenido al sistema Registro '); //metodo que permite evaluar si contiene la cadena especificada como parametro
      }


}
