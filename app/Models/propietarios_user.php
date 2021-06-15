<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class propietarios_user extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'propietarios_users';

    protected $fillable = [
        'nombre',
        'propiedad'
    ];
}
