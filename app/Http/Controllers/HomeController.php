<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Incident;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
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
        return view('home');
    }
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function listadoIncidencias()
    {
        return view('includes.listaIncidencias');
    }
    public function selectedProject($id)
    {
        $user=auth()->user();
        $user->selected_project_id=$id;
        $user->save();

        return back();
    }
    public function getReport(){
        //$project =Project::find(1);
        //$categories =$project->categories;
        //$categories =Category::all();
        $categories=Category::where('project_id',1)->get();
        return view('registroIncidencias/report')->with(compact('categories'));
    }
    public function postReport(Request $request){
        $rules =[
            'category_id'=>'sometimes|exists:categories,id',//'required',|exists:categories,id',
            'severity'=>'required|in:M,N,A',
            'title'=>'required|min:5',
            'descripcion'=>'required|min:5'
        ];
        $mensajes=[
            'category_id.exists'=>'*La categoria seleccionada no existe en la base de datos.*',
            'title.required'=>'*El titulo de la incidencia no existe.*',
            'severity.required'=>'*La seleccion de la intensidad debe de tener algun campo seleccionado.*',
            'severity.in'=>'*La seleccion de la intensidad debe de tener algun campo seleccionado.*',
            'title.min'=>'*El tiutlo debe presentar al menos 5 caracteres.*',
            'descripcion.required'=>'*Falta ingresar la descripción de la incidencia.*',
            'descripcion.min'=>'*La descripción debe contener mas de 15 caracteres.*'
        ];

        $this->validate($request,$rules,$mensajes);

        //Incident::create([])
        $incident= new Incident();
        //dd($incident);
        $incident->category_id=$request->input('category_id') ? : null;
        $incident->severity=$request->input('severity');
        $incident->title=$request->input('title');
        $incident->descripcion=$request->input('descripcion');
        $incident->client_id =auth()->user()->id;

        $incident->save();

       //return $request->input('intensidad');
       return back();
    }

}

