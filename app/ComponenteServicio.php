<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponenteServicio extends Model
{
    protected $table = 'componente_servicio';

    protected $fillable = ['servicio_id', 'componente_id'];
}
