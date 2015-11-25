<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TipoRequest;
use App\Http\Controllers\Controller;
use App\TipoServicio;
use Laracasts\Flash\Flash;

class TipoServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo = TipoServicio::all();

        return view('tipos.index')->with('tipo', $tipo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoRequest $request)
    {
        $tipo = new TipoServicio();
        $tipo->nombre = $request->nombre;
        $tipo->save();

        Flash::success('Se ha registrado el tipo de servicio exitosamente!');

        return redirect()->route('servicios.tipos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = TipoServicio::find($id);

        return view('tipos.edit')->with('tipo', $tipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipo = TipoServicio::find($id);
        $tipo->nombre   = $request->nombre;
        $tipo->save();

        Flash::success('Se ha actualizado el tipo de servicio exitosamente!');

        return redirect()->route('servicios.tipos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoServicio::find($id)->delete();

        Flash::warning('Se ha eliminado el tipo de servicio exitosamente!');

        return redirect()->route('servicios.tipos.index');
    }
}
