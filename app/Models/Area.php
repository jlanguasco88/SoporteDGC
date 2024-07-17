<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'area'; // Nombre de la tabla

    protected $primaryKey = 'idarea'; // Clave primaria

    public $timestamps = false; // Si no tienes columnas de timestamps

    protected $fillable = [
        'idarea',
        'area',
    ];
   
    
}
