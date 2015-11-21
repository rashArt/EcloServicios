<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioImagen extends Model
{
    protected $table = 'servicio_imagen';

    protected $fillable = ['servicio_id', 'imagen_id'];

    public function servicio()
    {
        return $this->hasMany('App\Servicio');
    }

    public function imagen()
    {
        return $this->hasMany('App\Imagen');
    }
}
