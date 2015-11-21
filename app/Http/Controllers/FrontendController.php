<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegistroRequest;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\User;

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
}
