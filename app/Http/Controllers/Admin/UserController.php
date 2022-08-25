<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller{

     /**
     * Muestra los datos de usuaris en la vista de usuarios
     * @return void retornara a la vista principal para mostrar los datos de los usuarios
     */
    public function index(){
        //$randomString = Str::random(20);
        $users=User::where('role',1)->paginate(10);
        return view('admin.users.index')->with(compact('users'));
    }
    /**
     * Guarda los datos de usuarios
     * @return void volvemos a la vista principal
     */
    public function store(Request $request){
        $rules=[
            'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:6'
        ];
        $mensajes=[
            'name.required'=>'El nombre es obligatorio',
            'name.max'=>'El nombre tiene un maximo de 255 caracteres',
            'email.required'=>'El email es obligatorio',
            'email.unique'=>'El email esta repetido',
            'password.required'=>'Olvido ingresar la contraseña',
            'password.min'=>'La contraseña debe presentar al menos 6 caracteres '
        ];

        $this->validate($request,$rules,$mensajes);
        // $user = new User();
        // $user->name=$request->input('nombre');
        // $user->email=$request->input('email');
        // $user->password=bcrypt($request->input('password'));
        // $user->role=1;
        // $user->save();
        User::create(
            $request->only('name','email')
            +[
                'role'=>1,
                'password'=>bcrypt($request->input('password'))
            ]
            );
        return back()->with('notificaciones','Usuario registrado correctamente');
    }
    /**
     * Edita los datos de usuarios en la vista de usuarios
     * @param  mixed $id identificador de usuario
     * @return void envia los datos a la vista paginados
     */
    public function edit($id){
        $user=User::find($id)->paginate(10);
        return view('admin.users.edit')->with(compact('user'));
    }
    /**
     * Actualiza los datos de la edicion de usuarios
     * @param  mixed $id identificador de usuario
     * @param  mixed $request datos del usuario
     * @return void devuelve los datos actualizados del usuario editado, con un mensaje personalizado al usuario indicandole que se ha modificado correctamente
     */
    public function update($id, Request $request){
        $user =User::find($id);
        $rules=[
            'name'=>'required|max:255',
            'password'=>'min:6'
        ];
        $mensajes=[
            'name.required'=>'El nombre es obligatorio',
            'name.max'=>'El nombre tiene un maximo de 255 caracteres',
            'password.min'=>'La contraseña debe presentar al menos 6 caracteres '
        ];

        $this->validate($request,$rules,$mensajes);
        $user->name=$request->input('name');
        $user->password=$request->input('password');
        $password=$request->input('password');
        if($password){
            $user->password=bcrypt($password);
        }

        $user->save();
         return redirect('/usuarios')->with('notificaciones','Usuario modificado correctamente');
       // return view('admin.users.index')->with('notificaciones','Usuario modificado correctamente');
    }

    /**
     * Metodo que borra a un usuario por el identificador
     * @param  mixed $id identificador de usuario
     * @return void elimina a un usuario por el identificador pasado por parametro
     */
    public function delete($id){
        $user=User::find($id);
        $user->delete();

        return back()->with('notificaciones','Usuario eliminado correctamente');
        // return redirect()->view('admin.users.index')
        // ->with('notificaciones','Usuario eliminado correctamente');
    }
    /**
     * Metodo que borra a un objeto usuario por su identificador
     * @param  mixed $user recibo el objeto usuario
     * @return void elimino el usuario buscado
     */
    public function deleteUser(User $user){
        $eliminarUsuario=$user->id;
        $eliminarUsuario->delete();

        return back()->with('notificaciones','Usuario eliminado correctamente');
    }
}
