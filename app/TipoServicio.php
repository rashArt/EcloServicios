<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    protected $table = 'tipos_servicios';

    protected $fillable = ['nombre'];

    public function servicio()
    {
        return $this->hasMany('App\Servicio');
    }
}
