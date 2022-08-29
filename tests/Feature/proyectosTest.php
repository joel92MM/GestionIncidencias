<?php

namespace Tests\Feature;


use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Symfony\Component\HttpFoundation\File\UploadedFile;

//1. Given=> Teniendo estado de la aplicacion antes de realizar la accion que queremos comprobar
//2. When =>Cuando Realizamos dicha accioin que queremos probar
//3. Then => Entonces Comprobamos que los resultados obteneidos son los esperados

class proyectosTest extends TestCase
{

    /** @test */
    function crearProyectosTest()
    {
        $proyectoNuevo = Project::create([
            'name' => 'SJD Dentistas',
            'descripcion' => 'El proyecto SJD Dentistas tratara de llevarles la web'
        ]);

        // $this->assertEquals($user->name, 'John');
        $this->assertEquals($proyectoNuevo->name, 'SJD Dentistas');

        // $user = $this->usuarioNuevo;
        // $response = $this->actingAs($user)
        //                  ->withSession(['banned' => false])
        //                  ->get('/proyectos')
        //                 ->assertStatus(200)
        //                 ->assertSee('SJD Dentistas');
    }
    /** @test */
    function existeProyectosTestFail()
    {
        $existe = Project::find('3');
        $this->assertNotEquals('SJD Dentistas', $existe->name);
    }
    /** @test */
    function existeProyectosTest()
    {
        $proyectoNuevo = Project::create([
            'id' => 23,
            'name' => 'Proyecto Existe',
            'descripcion' => 'El proyecto SJD Dentistas tratara de llevarles la web'
        ]);
        $existe = Project::find($proyectoNuevo->id);

        $this->assertEquals('Proyecto Existe', $existe->name);

    }
    // /** @test */
    // function listaContieneProyecto()
    // {
    //     $existe = Project::find('3');
    //     $response = $this->get('/proyectos');
    //     $response->assertSee([
    //         'name'=>$existe->name,
    //     ]);

    // }
    // /** @test */
    // function muestraListadoUsuarios(){
    //     // Se ejecutan antes de las pruebas para que los nombres esten en la bbdd y asi no fallen
    //     User::factory()->create([
    //             'name' => 'Joel',
    //             // definimos el sitio web del usuario
    //             'website' => 'thelastofus.com'
    //         ]
    //     );
    //     User::factory()->create([
    //         'name' => 'Sara'
    //     ]);
    //     $this->get('/usuarios')
    //         ->assertStatus(200) //comprueba si la url se ha cargado satisfactoriamente
    //         ->assertSee('Listado de usuarios') //metodo que permite evaluar si contiene la cadena especificada como parametro
    //         ->assertSee('Joel')
    //         ->assertSee('Sara');
    // }
    // /** @test */
    // function muestraMensajePorDefectoListadoUsuariosVacio(){
    //     // Para solucionar el problema al hacer el test de esta funcion, hay dos maneras
    //     // 1º manera vaciar la bbdd primero antes de ejecutar la prueba de la siguiente manera
    //     //DB::table('users')->truncate();
    //     // el problema que nos vamos a encontrar si hacemos esto es que al ejecutar el comando anterior
    //     // la lista se mostrara siempre vacia

    //     // 2º forma creamos una bbdd para nuestras pruebas automatizadas, de esta manera no afectan a la BBDD del entorno local
    //     $this->get('/usuarios')
    //         ->assertStatus(200) //comprueba si la url se ha cargado satisfactoriamente
    //         ->assertSee('No hay usuarios registrados.');
    // }
    // /** @test */
    // function muestraDetalleUsuarios(){
    //     $this->withExceptionHandling();

    //     // vamos a modificar esta prueba para utilizar un model factory, para que el usuario introducido sea igual al que definamos a continuacion en el factory
    //     $usuario = User::factory()->create([
    //         'name' => 'Eustalgio Martinez'
    //     ]);
    //     $this->get("/usuarios/{$usuario->id}")
    //     //->get('/usuarios/detalles/' . $usuario->id)
    //         ->assertStatus(200) //comprueba si la url se ha cargado satisfactoriamente
    //         ->assertSee('Eustalgio Martinez');
    // }
    // /** @test */
    // function detallesPaginaUsuario(){
    //     $usua = User::factory()->create();

    //     $this->get('/usuarios/' . $usua->id)
    //         ->assertStatus(200) //comprueba si la url se ha cargado satisfactoriamente
    //         ->assertSee('Mostrando detalles del usuario:' . $usua->id); //metodo que permite evaluar si contiene la cadena especificada como parametro
    // }
    // /** @test */
    // function crearIncidenciaNuevo(){
    //     $this->get('/reportar')
    //         ->assertStatus(200) //comprueba si la url se ha cargado satisfactoriamente
    //         ->assertSee('incidencias'); //metodo que permite evaluar si contiene la cadena especificada como parametro
    // }
    /** @test */
    function  muestraError404SiPaginaNoEncontrado()
    {
        $this->get('/999')
            ->assertStatus(404) //comprueba si la url no se a encontrado
            ->assertSee('Página no encontrada');
    }

    // // /** @test */
    // function crearNuevoUsuarioForm(){
    //     //$this->withExceptionHandling();

    //     // especificamos el metodo y la informacion que se van a enviar a la url usuarios
    //     // como segundo argumento especificamos los datos que va a contener la peticion
    //     $this->post('/usuarios/', [
    //         'name' => 'Joel',
    //         'email' => 'joel@roquark.com',
    //         'password' => 'roquark123456'
    //     ])->assertRedirect('usuarios');
    //     //->assertRedirect(route('usuarios.index'));
    //     //->assertSee('usuarios');
    //     // // este metodo verifica que los datos introducido en la prueba test, coinciden con los datos de la BBDD
    //     // $this->assertDatabaseHas('users',[
    //     //     'name'=>'Joel',
    //     //     'email'=>'joel@roquark.com',
    //     //     'password'=>bcrypt('roquark123456')
    //     // ]);
    //     $this->assertCredentials([
    //         'name'=>'Joel',
    //         'email'=>'joel@roquark.com',
    //         'password'=>'roquark123456'
    //     ]);
    // }
    // /** @test*/
    // function campoNombreEsObligatorio(){
    //     $this->from('/reportar')->post('/reportar/', [
    //         'name' => '',
    //         'email' => 'joel@roquark.com',
    //         'password' => 'roquark123456'
    //     ])->assertRedirect('reportar')

    //         // ->assertRedirect(route('usuarios/nuevo'))
    //         ->assertSessionHasErrors(['name' => 'El nombre es obligatorio']); //
    //     //Verifica la cantidad de usuarios que tenemos en la BBDD
    //     $this->assertEquals(0, User::count());
    //     // comprobamos que la BBDD no contiene este nuevo usuario con estos detalles
    //     // $this->assertDatabaseMissing('users',[
    //     //     'email'=>'joel@roquark.com'
    //     // ]);
    // }
    // /** @test*/
    // function campoEmailEsObligatorio(){
    //     $this->from('usuarios/nuevo')
    //         ->post('/usuarios/', [
    //             'name' => 'Joel',
    //             'email' => '',
    //             'password' => 'roquark123456'
    //         ])->assertRedirect('usuarios/nuevo')
    //         // ->assertRedirect(route('usuarios/nuevo'))

    //         ->assertSessionHasErrors(['email']);
    //     //Verifica la cantidad de usuarios que tenemos en la BBDD
    //     $this->assertEquals(0, User::count());
    // }
    // /** @test*/
    // function campoEmailDebeSerValido(){
    //     $this->from('usuarios/nuevo')
    //         ->post('/usuarios/', [
    //             'name' => 'Joel',
    //             'email' => 'correonovalido',
    //             'password' => 'roquark123456'
    //         ])->assertRedirect('usuarios/nuevo')
    //         // ->assertRedirect(route('usuarios/nuevo'))

    //         ->assertSessionHasErrors(['email']);
    //     //Verifica la cantidad de usuarios que tenemos en la BBDD, como hemos creado un correo especificamos que como maximo contenga 1
    //     $this->assertEquals(0, User::count());
    // }
    // /** @test*/
    // function campoEmailEsUnico(){
    //     $this->withExceptionHandling();
    //     //  utilizamos un modelFactory para crear un nuevo usuario, con el siguiente email
    //     User::factory()->create([
    //         'email' => 'joel@roquark.com' //verifica que este valor sea unico
    //     ]);

    //     $this->from('usuarios/nuevo')
    //         ->post('/usuarios/', [
    //             'name' => 'Joel',
    //             'email' => 'joel@roquark.com',
    //             'password' => 'roquark123456'
    //         ])->assertRedirect('usuarios/nuevo')
    //         // ->assertRedirect(route('usuarios/nuevo'))

    //         ->assertSessionHasErrors(['email']);
    //     //Verifica la cantidad de usuarios que tenemos en la BBDD, como hemos creado un correo especificamos que como maximo contenga 1
    //     $this->assertEquals(1, User::count());
    // }
    // /** @test*/
    // function campoPasswordEsObligatorio(){
    //     $this->from('usuarios/nuevo')
    //         ->post('/usuarios/', [
    //             'name' => 'Joel',
    //             'email' => 'joel@roquark.com',
    //             'password' => ''
    //         ])->assertRedirect('usuarios/nuevo')
    //         // ->assertRedirect(route('usuarios/nuevo'))

    //         ->assertSessionHasErrors(['password' => 'El campo password es obligatorio']);
    //     //Verifica la cantidad de usuarios que tenemos en la BBDD
    //     $this->assertEquals(0, User::count());
    // }
    // /** @test */
    // function fallarPaginaEditarUsuario(){

    //     $usuario = User::factory()->create([]);

    //     $this->get("/usuarios/{$usuario->id}/editar")
    //         ->assertStatus(200) //comprueba si la url se ha cargado satisfactoriamente
    //         ->assertViewIs('usuarios.edit')//Comprueba que la vista dada fue devuelta por la ruta especificada
    //         ->assertSee('Editar usuario')//compruebo que la vista contenga la cadena especificada en el metodo
    //         ->assertViewHas('user', function ($viewUser) use ($usuario){
    //             return $viewUser->id == $usuario->id;//comparo los id de ambos objetos, para hacer pruebas, podemos comparar el id del usuario a 0
    //         });//fuerzo que la vista contenga un objeto de la variable usuario, entonces creo una funcion
    //                 //anonima para comparar los dos objetos, para que no contenga ningun error
    // }
    // /** @test */
    // function actualizarUsuario(){
    //   $usuario = User::factory()->create();
    //   //$this->withExceptionHandling();

    //   $this->put("/usuarios/{$usuario->id}",[
    //           'name' => 'Joel',
    //           'email' => 'joel@roquark.com',
    //           'password' => 'roquark123456'
    //   ])->assertRedirect("/usuarios/{$usuario->id}");

    //   $this->assertCredentials([
    //           'name'=>'Joel',
    //           'email'=>'joel@roquark.com',
    //           'password'=>'roquark123456'
    //       ]);
    //   }
    // /** @test*/
    // function nombreObligatoriaAlActualizarUsuario(){
    //     //$this->withExceptionHandling();
    //     $usuario = User::factory()->create();

    //     $this
    //     ->from("usuarios/{$usuario->id}/editar")
    //     ->put("usuarios/{$usuario->id}", [
    //         'name' => '',
    //         'email' => 'joel@roquark.com',
    //         'password' => 'roquark123456'
    //     ])
    //     ->assertRedirect("usuarios/{$usuario->id}/editar")
    //         // ->assertRedirect(route('usuarios/nuevo'))
    //     ->assertSessionHasErrors(['name']);

    //     $this->assertDatabaseMissing('users',['email'=>'joel@roquark.com']);
    // }
    // /** @test*/
    // function campoEmailDebeSerValidoAlActualizarUsuario(){
    //   //$this->withExceptionHandling();
    //     $usuario = User::factory()->create(['name'=>'Nombre Inicial']);

    //     $this
    //     ->from("usuarios/{$usuario->id}/editar")
    //     ->put("usuarios/{$usuario->id}", [
    //         'name' => 'Nombre Actualizado',
    //         'email' => 'correo-no-valido',
    //         'password' => 'roquark123456'
    //     ])
    //     ->assertRedirect("usuarios/{$usuario->id}/editar")
    //         // ->assertRedirect(route('usuarios/nuevo'))
    //     ->assertSessionHasErrors(['email']);
    //     //no espera ver un usuario con el nombre especificado
    //     $this->assertDatabaseMissing('users',['name'=>'Joel']);
    // }
    // /** @test*/
    // function campoEmailEsUnicoAlActualizarUsuario(){
    //      //self::markTestIncomplete();//Indica que el codigo que esta debajo no sea ejecutado
    //     //$this->withExceptionHandling();

    //     User::factory()->create([
    //         'email'=>'correo-de-ejemplo@example.com'
    //     ]);

    //     $usuario = User::factory()->create([
    //         'email'=>'joelMeneses@roquark.com'
    //     ]);

    //     $this
    //     ->from("usuarios/{$usuario->id}/editar")
    //     ->put("usuarios/{$usuario->id}", [
    //         'name' => 'Joel',
    //         'email' => 'correo-de-ejemplo@example.com',
    //         'password' => 'roquark123456'
    //     ])
    //     ->assertRedirect("usuarios/{$usuario->id}/editar")
    //         // ->assertRedirect(route('usuarios/nuevo'))
    //     ->assertSessionHasErrors(['email']);

    //     //$this->assertDatabaseMissing('users',['email'=>'joel@roquark.com']);
    // }
    // /** @test*/
    // function campoPasswordEsOptionalAlActualizarUsuario(){
    //     //$this->withExceptionHandling();
    //     $old_pass='claveAnterior2002';
    //     $usuario = User::factory()->create([
    //         'password'=>bcrypt($old_pass)
    //     ]);

    //     $this
    //     ->from("usuarios/{$usuario->id}/editar")
    //     ->put("usuarios/{$usuario->id}", [
    //         'name' => 'Joel',
    //         'email' => 'joel@roquark.com',
    //         'password' => ''
    //     ])
    //     ->assertRedirect("usuarios/{$usuario->id}");//redirige a la plantilla mostrar usuarios
    //         // ->assertRedirect(route('usuarios/nuevo'))

    //     $this->assertCredentials([
    //         'name'=>'Joel',
    //         'email'=>'joel@roquark.com',
    //         'password'=>$old_pass
    //     ]);
    // }
    //  /** @test*/
    //  function emailSeMantieneIgualAlActualizarDatos(){
    //     //$this->withExceptionHandling();
    //     $usuario = User::factory()->create([
    //         'email'=>'joelMeneses@roquark.com'
    //     ]);

    //     $this
    //     ->from("usuarios/{$usuario->id}/editar")
    //     ->put("usuarios/{$usuario->id}", [
    //         'name' => 'Joel Meneses',
    //         'email' => 'joelMeneses@roquark.com',
    //         'password' => 'roquark123456'
    //     ])
    //     ->assertRedirect("usuarios/{$usuario->id}");//redirige a la plantilla mostrar usuarios
    //         // ->assertRedirect(route('usuarios/nuevo'))

    //     // $this->assertCredentials([
    //     //     'name'=>'Joel',
    //     //     'email'=>'joel@roquark.com',
    //     //     'password'=>$old_pass
    //     // ]);

    //     $this->assertDatabaseHas('users',[
    //         'name'=>'Joel Meneses',
    //         'email'=>'joelMeneses@roquark.com'

    //     ]);
    // }
    /** @test */
    function borrarProyecto()
    {
        $this->withExceptionHandling();
        // procederemos a crear un usuario nuevo

        $proyectoBorrar = Project::create([
            'name' => 'Proyecto a borrar',
            'descripcion' => 'El proyecto a borrar'
        ]);
        $this->delete("/proyectos/{$proyectoBorrar->id}/eliminar") // este metodo va a recibir una url que posteriormente se escargara de borrar
            ->assertRedirect('/proyectos'); //luego de hacer la accion borrar el usuario sera redirigido al listado de usuarios
        // no espero ver el id del usuario que borre en la BBDD
        // $this->assertDatabaseMissing('projects',[
        //     'id'=>$proyectoBorrar->id
        // ]);
    }
    // test crud
    /** @test */
    // function borrarUsuarioTest()
    // {
    //     $this->withExceptionHandling();
    //     $this->delete("/usuarios/{$this->usuarioNuevo->id}/eliminar")
    //     ->assertRedirect('/usuarios');

    //     $this->assertDatabaseMissing('users',[
    //         'id'=>$this->usuarioNuevo->id
    //     ]);
    // }
    //  /** @test */
    //  function storeTest()
    //  {
    //     $nuevoUsuario=new User();
    //     $data =$this->validate
    //  }
    /** @test */
    //     public function testStorage()
    // {
    //     $file = UploadedFile::fake()->image('File10.png');
    //     $response = $this->post(route("save.image"), [
    //         'file' => $file,
    //     ]);
    //     $response
    //         ->assertStatus(200)
    //         ->assertSessionHasNoErrors();
    //     Storage::disk('local')->assertExists("/images/" . $file->name);
    // }

    // /** @test */
    // public function borrarTest(){
    //     $proyectoNuevo= Project::create([
    //         'name'=> 'Proyecto Clínica Dental ',
    //         'descripcion'=>'El proyecto Clínica Dental consiste en desarrollar un sitio web basico de la clinica casanova'
    //     ]);

    //     $this->delete('/proyecto-usuario/'.$proyectoNuevo->id.'/eliminar/');


    //     $this->assertDatabaseHas('project_user',['id'=>$proyectoNuevo->id]);
    // }

}
