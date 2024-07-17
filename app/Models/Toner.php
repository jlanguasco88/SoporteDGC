<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toner extends Model
{
    use HasFactory;
    protected $table = "toners";

    protected $fillable = [
        'nombre',
        'tipo',
        'estado',
        'stock',
        'fecha_compra'
        
    ];
}
