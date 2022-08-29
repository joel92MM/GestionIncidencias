<?php

namespace App\Models;

use App\Models\Project;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // aqui hacemos la relacion entre tablas
    /**
     * Definimos la relacion de muchos a mucho de la tabla proyectos, a un usuario se le pueden asignar varios proyectos
     *y un proyecto es asignado a varios usuarios
     * @return void
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    /**
     * Funcion que obtenemos la lista de todos los proyectos que hay actualmente
     * @return void
     */
    public function getListOfProjectsAttribute()
    {
        // Si es del equipo de soporte devolvera los proyectos asociados con ese rol de usuario
        if($this->role==1){
            return $this->projects;
        }
        // En caso contrario mostraremos todos los proyectos al usuario administrador
        return Project::all();
    }
    // añadimos dos funciones para los campos roles, para el nivel de acceso
    /**
     * Si el valor del atributo es 0 es un admin
     * @return void
     */
    public function getIsAdminAttribute(){
        return $this->role==0;
    }
    /**
     * Si el valor del atributo es 2 es un cliente
     * @return void
     */
    public function getIsClientAttribute(){
        return $this->role==2;
    }

}
