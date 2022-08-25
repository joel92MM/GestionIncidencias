<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProyectController extends Controller{
        /**
         * Funcion index la cual va a mostrar una lista de proyectos al ususario
         * @return void devuelve la vista al usuario
         */
        public function index(){
            $projects =Project::withTrashed()->get();
            return view('admin.proyectos.index')->with(compact('projects'));
        }
        /**
         * Funcion que almacena los datos de los proyectos creado y valida si cumple ciertas reglas obligatorias
         * @param  mixed $request datos en forma de objeto de un proyecto
         * @return void
         */
        public function store(Request $request){
            $this->validate($request,Project::$rules,Project::$messages);
            Project::create($request->all());

            return redirect('/proyectos')->with('notificaciones','El proyecto se ha registrado correctamente');
        }
        /**
         * Funcion que edita un proyecto de la lista de proyectos
         * @param  mixed $id id del proyecto a editar
         * @return void retorna la vista de edicion con ese proyecto
         */
        public function edit($id){
            $project=Project::find($id);
            $categorias=$project->categorias;
            $levels=$project->levels;
            return view('admin.proyectos.edit')->with(compact('project','categorias','levels'));
        }
        /**
         * Fauncion que actualiza los datos de un proyecto
         * @param  mixed $id identificador del proyecto
         * @param  mixed $request
         * @return void
         */
        public function update($id, Request $request){
            $this->validate($request,Project::$rules,Project::$messages);
            Project::find($id)->update($request->all());
            return redirect('/proyectos')->with('notificaciones','El proyecto se ha actualizado correctamente');
        }
        /**
         * Funcion que elimina un proyecto de la lista de proyectos pasandole el id como parametro
         * @param  mixed $id identificador del proyecto a eliminar
         * @return void elimina el proyecto de la lista
         */
        public function delete($id){
            Project::find($id)->delete();
            return back()->with('notificaciones','Proyecto eliminado correctamente');
        }

        /**
         * Funcion que restaura un proyecto eliminado
         * @param  mixed $id identificador del proyecto eliminado
         * @return void vuelve habilitar el proyecto eliminado
         */
        public function restore($id){
            Project::withTrashed()->find($id)->restore();
            // Project::onlyTrashed()->where('id',$id)->restore();
            return back()->with('notificaciones','Proyecto restaurado correctamente');
        }
}
