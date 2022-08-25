<?php

namespace App\Models;

use App\Models\Level;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Atributos que son requeridos
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'descripcion',
        'start',
    ];

    public static $rules=[
        'name'=>'required',
        //'description'=>'',
        'start'=>'date'
    ];

    public static $messages =[
        'name.required'=>'Es necesario ingresar un nombre para el proyecto.',
        'start.date'=>'La fehca mo tiene un formato adecuado.'
    ];

    /**
     * Funcion que establece una relacion de muchos entre proyectos y categoriias
     * @return void
     */
    public function categorias(){
        # unp proyecto tiene muchas categorias
        return $this->hasMany(Category::class);
    }
    /**
     * Funcion que establece una relacion de muchos entre proyectos y categoriias
     * @return void
     */
    public function levels(){
        # unp proyecto tiene muchas categorias
        return $this->hasMany(Level::class);
    }
}
