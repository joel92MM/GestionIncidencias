<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectUserController extends Controller
{
    /**
     * Funcion metodo encarfada de almacenar los valores de las tablas y filtrarlos por la consulta que se le esta pasando para crear una nueva asignacion
     *si la asignacion ya ha sido creada mostrara un mensaje al usuario advirtiendole que la asignacion ya ha sido creada
     * @param  mixed $request datos de la tabla
     * @return void asigna una nueva tarea o le muestra un mensaje al usuario indicandole que ya ha sido creada la asignacion
     */
    public function store(Request $request)
    {
        // EÑ nivel pertenezca al proyecto
        // Asegurar que el proyecto exista
        // Asegurar que el nivel exista
        //Asegurar que el usuario exista

        // guardamos en una variable el id del proyecto
        $project_id = $request->input('project_id');
        $user_id = $request->input('user_id');
        $level_id = $request->input('level_id');

        $project_user = ProjectUser::where('project_id', $project_id)
            ->where('user_id', $user_id)->first();

        if ($project_user)
            return back()->with('notificaciones', 'El usuario ya pertenece a este proyecto');
        $project_user = new ProjectUser();

        $project_user->project_id = $project_id;
        $project_user->user_id = $user_id;
        $project_user->level_id = $request->input('level_id');
        $project_user->save();

        return back();
    }

    /**
     * Elimina una asignacion del proyecto de un usuario mediante el identificador
     * @param  mixed $id identificador de la asignacion a eliminar
     * @return void elimina una asignacion que se le ha hecho al usuario pasandole el identificador como parametro
     */
    public function delete($id)
    {
        ProjectUser::find($id)->delete();
        return back();
    }
}
