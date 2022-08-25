<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'descripcion',
        'severity',
        'category_id',
        'level_id',
        'client_id',
        'support_id'

    ];
}
