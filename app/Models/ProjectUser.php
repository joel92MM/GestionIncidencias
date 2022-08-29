<?php

namespace App\Models;

use App\Models\Level;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectUser extends Model
{
    protected $table='project_user';

    /**
     * Funcion que establece una relacion de muchos a muchos
     * @return void
     */
    public function project(){
        return $this->belongsTo(Project::class);
    }
    /**
     * Fuyncion que establece una relacion de muchos a muchos
     * @return void
     */
    public function level(){
        return $this->belongsTo(Level::class);
    }
}
