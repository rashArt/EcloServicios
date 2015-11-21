<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';

    protected $fillable = ['nombre', 'imagen'];

    public function servicioImagen()
    {
        return $this->belongsTo('App\ServicioImagen');
    }
}
