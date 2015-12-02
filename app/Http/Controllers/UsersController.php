<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = User::orderBy('id', 'DESC')->paginate(5);

        return view('users.index')->with('usuario', $usuario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();

        $user->nombre   = $request->nombre;
        $user->apellido = $request->apellido;
        $user->cedula   = $request->cedula;
        $user->telefono = $request->telefono;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->nivel    = $request->nivel;
        $user->status   = $request->status;

        $user->save();

        Flash::success('Se ha registrado el usuario exitosamente!');

        return redirect()->route('users.index');
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
        $user = User::find($id);
        if (is_null ($user))
        {
            abort(503);
        }

        return view('users.edit')->with('usuario', $user);
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
        $id_logueado = Auth::user()->id;

        $logueado = User::find($id_logueado);
        $nivel = $logueado->nivel;

        if ($nivel === 'administrador')
        {
            $user = User::find($id);

            $user->nombre   = $request->nombre;
            $user->apellido = $request->apellido;
            $user->cedula   = $request->cedula;
            $user->telefono = $request->telefono;
            $user->email    = $request->email;
            $user->nivel    = $request->nivel;
            $user->status   = $request->status;

            $user->save();

            // admin cambia perfil de usuario
            Flash::success('Se ha actualizado el usuario exitosamente!');
            return redirect()->route('users.index');
        }
        else
        {

            $user = User::find($id_logueado);

            $user->nombre   = $request->nombre;
            $user->apellido = $request->apellido;
            $user->cedula   = $request->cedula;
            $user->telefono = $request->telefono;
            $user->email    = $request->email;
            $user->nivel    = $request->nivel;
            $user->status   = $request->status;

            $user->save();

            //cliente cambia perfil de usuario
            Flash::success('Se ha actualizado el perfil exitosamente!');

            return redirect()->route('inicio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        Flash::warning('Se ha eliminado el usuario exitosamente!');

        return redirect()->route('users.index');
    }

    public function perfil()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('users.perfil')->with('usuario', $user);
    }

    public function updPerfil(Request $request, $id)
    {
        
    }
}
