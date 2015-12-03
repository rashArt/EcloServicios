<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegistroRequest;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\User;
use App\Servicio;
use App\TipoServicio;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicio()
    {
        return view('inicio');
    }

    public function getRegistro()
    {
        return view('register');
    }

    public function postRegistro(RegistroRequest $request)
    {
        $status = 1;

        $user = new User;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->cedula = $request->cedula;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->status = $status;
        $user->password = bcrypt($request->password);
        $user->save();

        Flash::success('Se ha registrado el usuario '. $request->nombre .' '. $request->apellido .' exitosamente!');

        return redirect()->route('login');
    }

    public function crearServicio()
    {

        $tipo    = TipoServicio::lists('nombre', 'id')->all();
        $cliente = array(Auth::user()->id => Auth::user()->nombre );;
        $tecnico = User::where('nivel', 'tecnico')->lists('nombre','id');
        return view('cliente.crear_servicio')
            ->with('cliente', $cliente)
            ->with('tecnico', $tecnico)
            ->with('tipo', $tipo);
    }

    public function guardarServicio(Request $request)
    {
        //coloco en un array los tecnicos

        $servicio = new Servicio;

        $servicio->tipo_id    = $request->tipo_id;
        $servicio->cliente_id = $request->cliente_id;
        $servicio->tecnico_id = $request->tecnico_id;
        $servicio->razon      = $request->razon;
        $servicio->status     = 1;

        $servicio->save();

        Flash::success('Se ha registrado el servicio exitosamente!');

        return redirect()->route('inicio');
    }
}