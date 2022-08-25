<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    //   /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    // public function login()
    // {
    //     return view('layouts.login');
    // }
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('panelusuario');
    }
}
