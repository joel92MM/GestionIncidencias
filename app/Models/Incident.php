<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incident extends Model
{
    use HasFactory;
    // protected $fillable=[
    //     'title',
    //     'descripcion',
    //     'severity',
    //     'category_id',
    //     'level_id',
    //     'client_id',
    //     'support_id'

    // ];
    /**
     * Funcion que establece una relacion de muchos a muchos con la tabla categoria
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Funcion que se encarga de pasar los valores a letras completas
     * @return void devuelve la cadena indicada
     */
    public function getSeverityFullAttribute()
    {
        switch ($this->severity) {
            case 'M':
                return 'Menor';
            case 'N':
                return 'Normal';
            case 'A':
                return 'Alta';
        }
    }

    /**
     * Funcion que se encarga de mostrar hasta un limite de caracteres al usuario(frese,posicionInicial,posicionFinal,defecto)
     * @return void muestra la cadena al usuario hasta cierto limite
     */
    public function getTitleShortAttribute()
    {
        // Existen dos formas de limitar el uso de caracteres
        //return mb_strimwidth($this->title, 0,10, 0,"seguir leyendo");
        return substr($this->title, 0, 10).'...';
    }
    public function getCategoryNameAttribute()
    {
        if($this->category){
            return $this->category->name;
        }
        return 'General';
    }
}
