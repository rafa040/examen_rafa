<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class convocatorias extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'convocatorias';

    protected $fillable = [
        'fecha',
        'hora1',
        'hora2',
        'asunto',
        'propiedad'
    ];
}
