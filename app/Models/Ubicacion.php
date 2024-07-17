<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
  use HasFactory;

  protected $table = 'posicion';

  protected $primaryKey = 'idPosicion';

  protected $fillable = [
      'puesto',
      'usuario',
      'nombreRed',
      'grupoRed',
      'ip',
      'piso',
      'area_idarea'
  ];

    public $timestamps = false;

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_idarea', 'idarea');
    }
  
}
