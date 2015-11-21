<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = ['tipo_id', 'cliente_id', 'tecnico_id', 'status'];

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function tipoServicio()
    {
        return $this->hasMany('App\TipoServicio');
    }

    public function servicioImagen()
    {
        return $this->belongsTo('App\ServicioImagen');
    }
}
