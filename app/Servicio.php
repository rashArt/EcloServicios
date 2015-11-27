<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = ['tipo_id', 'cliente_id', 'tecnico_id', 'razon', 'status'];

    public function tipo()
    {
        return $this->belongsTo('App\TipoServicio');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function servicioimagen()
    {
        return $this->belongsTo('App\ServicioImagen');
    }
}
