<?php

namespace Tests;

use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
       // reestablece la base de datos despues de cada prueba unitaria
       // antes de ejecutar las pruebas se encarga de ejecutar el comando para migrar la BBDD, y luego se encarga de ejecutar las pruebas dentro de una
       // transaccion de la BBDD, al finalizar vuelve a su estado original
    use CreatesApplication, RefreshDatabase,DatabaseMigrations;
    protected $usuarioNuevo;
    public function setUp(): void{
        parent::setUp();
        //     // seed the database
        //     $this->artisan('db:seed');
        //     // alternatively you can call
        $this->seed();
        $this->usuarioNuevo=User::create([
            'name' => 'John',
            'email' => 'joo@exale.com',
            'password' => bcrypt($password = "123456")
        ]);
        // User::create([
        //     'name' => 'Joel',
        //     'email' => 'joel@roquark.com',
        //    // 'email_verified_at' => now(),
        //     'password' => bcrypt('123456789'), // password
        //     // agregamos los nuevos campos
        //     // 'dni'=>'1233454353',
        //     // 'direccionDentista'=>'pepe rayuela',
        //     // 'telefonoDentista'=>'66632654',
        //     'role'=>'0',
        // ]);

        Artisan::call('migrate');
    }
    public function tearDown():void{
        //dump(env('DB_CONNECTION'));
        Artisan::call('migrate:rollback');

        parent::tearDown();
    }
}
