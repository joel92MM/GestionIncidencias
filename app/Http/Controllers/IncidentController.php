<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use App\Models\Incident;
use App\Models\ProjectUser;
use Illuminate\Http\Request;

class IncidentController extends Controller
{

    /**
     * Controlador encargado de verificar si el usuario esta registrado en el sistema.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user();
        $selected_project_id=$user->selected_project_id;
        //dd($user);
        // hacemos una condicion para sabe si el usuario es de sopporte
        if ($user->is_support) {
            // obtenemso la incidencias al usuarios que a iniciado session
            $incidents = Incident::where('project_id', $selected_project_id)
                ->where('support_id', $user->id)->get();

            $projectUser = ProjectUser::where('project_id', $selected_project_id)
                ->where('user_id', $user->id)->first();

            $pending_incidents = Incident::where('support_id', null)
                ->where('level_id', $projectUser->level_id)->get();


                //return view('includes.listaIncidencias')->with(compact('incidents', 'pending_incidents'));
        }


        $incidents_asignar = Incident::where('client_id', $user->id)
            ->where('project_id', $selected_project_id)->get();

        return view('includes.listaIncidencias')->with(compact('incidents', 'pending_incidents','incidents_asignar'));
    }
    /**
     * Funcion que obtiene los registros de incidencias filtrado por el identificador
     * @return void
     */
    public function create()
    {
        //$project =Project::find(1);
        //$categories =$project->categories;
        //$categories =Category::all();
        $categories = Category::where('project_id', 1)->get();
        return view('registroIncidencias/report')->with(compact('categories'));
    }
    /**
     * Funcion que valida los registros de incidencias y modifica sus valores
     *
     * @param  mixed $request datos de la incidencia a validar y luego a modificar
     * @return void
     */
    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'sometimes|exists:categories,id', //'required',|exists:categories,id',
            'severity' => 'required|in:M,N,A',
            'title' => 'required|min:5',
            'descripcion' => 'required|min:5'
        ];
        $mensajes = [
            'category_id.exists' => '*La categoria seleccionada no existe en la base de datos.*',
            'title.required' => '*El titulo de la incidencia no existe.*',
            'severity.required' => '*La seleccion de la intensidad debe de tener algun campo seleccionado.*',
            'severity.in' => '*La seleccion de la intensidad debe de tener algun campo seleccionado.*',
            'title.min' => '*El tiutlo debe presentar al menos 5 caracteres.*',
            'descripcion.required' => '*Falta ingresar la descripción de la incidencia.*',
            'descripcion.min' => '*La descripción debe contener mas de 15 caracteres.*'
        ];

        $this->validate($request, $rules, $mensajes);

        //Incident::create([])
        $incident = new Incident();
        //dd($incident);
        $incident->category_id = $request->input('category_id') ?: null;
        $incident->severity = $request->input('severity');
        $incident->title = $request->input('title');
        $incident->descripcion = $request->input('descripcion');

        $user=auth()->user();
        $project_level=Project::find($user->selected_project_id)->first_level_id;

        $incident->client_id = $user->id;
        $incident->project_id = $user->selected_project_id;
        $incident->level_id = $project_level;


        $incident->save();

        //return $request->input('intensidad');
        return back();
    }
}
