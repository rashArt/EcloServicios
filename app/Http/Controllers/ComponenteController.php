<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Componente;
use App\Servicio;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class ComponenteController extends Controller
{

    public function edit($id)
    {
        return view('componentes.edit')
            ->with('id', $id);
    }

    public function store(Request $request)
    {
        $componente = new Componente();
        $componente->nombre = $request->nombre;
        $componente->descripcion = $request->descripcion;
        $componente->serial = $request->serial;
        $componente->save();

        // agregando a componente_servicio
        $componente->servicio()->sync($request->servicio_id);

        Flash::success('Se ha registrado el componente exitosamente!');

        return redirect()->route('servicios.index');
    }
}
