<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $table = "ubicaciones";
    //relacion uno a muchos inversa
    protected $fillable = [ 
       'puesto',
       'usuario_id',
       'nombreRed',
       'grupoRed',
       'ip',
       
       'area_id',
       'piso'
    ];

    public $timestamps = false;

    public function usuarios(){

        return $this->belongsTo(User::class, 'usuario_id');
      }
  
      public function areas(){
  
        return $this->belongsTo(Area::class, 'area_id');
      }
  
}
