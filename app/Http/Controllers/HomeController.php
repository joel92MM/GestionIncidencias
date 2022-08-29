<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Incident;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Controlador encargado de verificar si el usuario esta registrado en el sistema.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // obtenemso la incidencias al usuarios que a iniciado session
        return view('home');
    }
    //  /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    // public function listadoIncidencias()
    // {
    //     return view('includes.listaIncidencias');
    // }
    /**
     * Funcion que selecciona un proyecto del usuario por el identificador
     * @param  mixed $id identificador del proyecto
     * @return void
     */
    public function selectedProject($id)
    {
        $user=auth()->user();
        $user->selected_project_id=$id;
        $user->save();

        return back();
    }


}

