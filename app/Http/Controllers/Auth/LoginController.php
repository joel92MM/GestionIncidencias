<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth\save;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // procederemos a sobreescribir una funcion
    protected function authenticated()
    {
        //$user=Illuminate\Support\Facades\Auth::user();
        $user=auth()->user();
        // comprobamos si el usuario que se acaba de identificar es un usuario de soporte
        if($user->is_admin || $user->is_client){
            return;
        }

        //si el usuario no tiene proyecto asignado le asignaremos uno
        if(!$user->selected_project_id){
            $user->selected_project_id=$user->projects->first()->id;
            $user->save();
        }



    }
}
