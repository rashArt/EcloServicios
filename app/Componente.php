<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    protected $table = 'componentes';

    protected $fillable = ['descripcion', 'serial'];

    public function servicio()
    {
        return $this->belongsToMany("App\Servicio","componente_servicio")->withTimestamps()->withPivot('servicio_id');
    }
}
