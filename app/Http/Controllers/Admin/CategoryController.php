<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Funcion que almacena los datos a actualizar validando los campos
     * @param  mixed $request datos a validar y que van hacer actualizados
     * @return void almacena los datos que se van a actualizar
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ], [
            'name.required' => 'Es necesario ingresar un nombre para la categoria.'
        ]);
        Category::create($request->all());

        return back();
    }
    /**
     * Funcion que actualiza los datos de una categoria almacenador en el metodo store
     * @param  mixed $request datos que se van a actualizar de la categoria seleccionada
     * @return void datos actualizados
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ], [
            'name.required' => 'Es necesario ingresar un nombre para la categoria.'
        ],);

        //obtenemos el valor de id de la categoria seleccionada
        $category_id = $request->input('category_id');
        //apuntamos a la categoria por el identificador para obtener los datos
        $category = Category::find($category_id);
        //reemplazamos el valor del nombre de la categoria por el nuevo valor que le a asignado el usuario
        $category->name = $request->input('name');
        //guardamos el valor del nombre de la categoria
        $category->save();
        return back();
    }
    /**
     * Funcion que elimina una categoria pasandole el identificador como parametro
     * @param  mixed $id identificador de la categoria a eliminar
     * @return void elimina la categoria
     */
    public function delete($id)
    {
        Category::find($id)->delete();
        return back();
    }
}
