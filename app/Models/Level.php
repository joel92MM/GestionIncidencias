<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'project_id'

    ];
    /**
     * Funcion que indica que una proyecto pertenece a un nivel en particular
     * @return void
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
