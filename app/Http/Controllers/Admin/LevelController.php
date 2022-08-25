<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    /**
     * Funcion que guarda los datos de un nivel
     * @param  mixed $request datos de un nivel a actualizar
     * @return void almacena los datos de un nivel que se van a actualizar
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ], [
            'name.required' => 'Es necesario ingresar un nombre para el nivel.'
        ]);
        Level::create($request->all());

        return back();
    }
    /**
     * Funcion que actualiza los datos de un nivel
     * @param  mixed $request datos de un nivel que se van a actualizar
     * @return void actualiza los datos de un nivel
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ], [
            'name.required' => 'Es necesario ingresar un nombre para la categoria.'
        ],);

        //obtenemos el valor de id de la categoria seleccionada
        $level_id = $request->input('level_id');
        //apuntamos a la categoria por el identificador para obtener los datos
        $level = Level::find($level_id);
        //reemplazamos el valor del nombre de la categoria por el nuevo valor que le a asignado el usuario
        $level->name = $request->input('name');
        //guardamos el valor del nombre de la categoria
        $level->save();

        return back();
    }
    /**
     * Funcion que elimina un nivel pasandole el identificador como parametro
     * @param  mixed $id identificador del nivel a eliminar
     * @return void elimina el nivel
     */
    public function delete($id)
    {
        Level::find($id)->delete();
        return back();
    }
}
