<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use SoftDeletes;
    //use HasFactory;
    protected $fillable=['name','project_id'];
    /**
     * Funcion que indica que una categoria pertenece a un proyecto en particular
     * @return void
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
