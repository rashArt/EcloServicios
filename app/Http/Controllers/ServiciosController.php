<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ServicioRequest;
use App\Http\Requests\UpdServicioRequest;
use App\Http\Controllers\Controller;
use App\TipoServicio;
use App\Servicio;
use App\User;
use App\Imagen;
use App\ServicioImagen;
use Laracasts\Flash\Flash;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicio = Servicio::orderBy('id', 'DESC')->paginate(5);

        return view('servicios.index')->with('servicio', $servicio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo = TipoServicio::lists('nombre', 'id')->all();
        //consulta para concatenar
        $cliente = User::where('nivel', 'cliente')->lists('cedula', 'id');
        $tecnico = User::where('nivel', 'tecnico')->lists('email', 'id');

        return view('servicios.create')
            ->with('cliente', $cliente)
            ->with('tecnico', $tecnico)
            ->with('tipo', $tipo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servicio = new Servicio();

        $servicio->tipo_id = $request->tipo_id;
        $servicio->cliente_id = $request->cliente_id;
        $servicio->tecnico_id = $request->tecnico_id;
        $servicio->razon = $request->razon;
        $servicio->status = $request->status;

        $servicio->save();

        Flash::success('Se ha registrado el servicio exitosamente!');

        return redirect()->route('servicios.index');
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

        $servicio = Servicio::find($id);
        $tipo = TipoServicio::lists('nombre', 'id')->all();
        $cliente_id = $servicio->cliente_id;
        $cliente = User::find($cliente_id);
        $tecnico = User::where('nivel', 'tecnico')->lists('nombre', 'id');

        return view('servicios.edit')
            ->with('servicio', $servicio)
            ->with('cliente', $cliente)
            ->with('tecnico', $tecnico)
            ->with('tipo', $tipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdServicioRequest $request, $id)
    {
        //variables locales
        //***************************************************
        $servicio_id = $id;
        // fin **********************************************


        // cargando imagenen de servicio solicitado *********
        //***************************************************
        if ($request->file('img1'))
        {
            $file = $request->file('img1');
            $imga = 'servicio_0' . $id . '_img1.' . $file->getClientOriginalExtension();
            $path = public_path() . '/imagenes/servicios/';
            //moviendo imagen hacia la carpeta
            $file->move($path, $imga);

            // guardando imagen en la tabla imagen
            $imagen = new Imagen();
            $imagen->nombre = $imga;
            $imagen->servicio_id = $servicio_id;
            $imagen->save();
        }
        //***************************************************
        // fin **********************************************

        // cargando imagenen de servicio en proceso *********
        //***************************************************
        if ($request->file('img2'))
        {
            $file = $request->file('img2');
            $imgb = 'servicio_0' . $id . '_img2.' . $file->getClientOriginalExtension();
            $path = public_path() . '/imagenes/servicios/';
            //moviendo imagen hacia la carpeta
            $file->move($path, $imgb);

            // guardando imagen en la tabla imagen
            $imagen = new Imagen();
            $imagen->nombre = $imgb;
            $imagen->servicio_id = $servicio_id;
            $imagen->save();
        }
        //***************************************************
        // fin **********************************************

        // cargando imagenen de servicio finalizado *********
        //***************************************************
        if ($request->file('img3'))
        {
            $file = $request->file('img3');
            $imgc = 'servicio_0' . $id . '_img3.' . $file->getClientOriginalExtension();
            $path = public_path() . '/imagenes/servicios/';
            //moviendo imagen hacia la carpeta
            $file->move($path, $imgc);

            // guardando imagen en la tabla imagen 
            $imagen = new Imagen();
            $imagen->nombre = $imgc;
            $imagen->servicio_id = $servicio_id;
            $imagen->save();
        }
        //***************************************************
        // fin **********************************************

        // actualizando datos en la tabla servicios *********
        //***************************************************
        $servicio = Servicio::find($id);

        $servicio->tipo_id = $request->tipo_id;
        $servicio->tecnico_id = $request->tecnico_id;
        $servicio->razon = $request->razon;
        $servicio->status = $request->status;
        $servicio->save();
        //***************************************************
        // fin **********************************************

        // mensaje y redireccion a la pagina principal ******
        //***************************************************
        Flash::success('Se ha actualizado el servicio exitosamente!');

        return redirect()->route('servicios.index');
        // fin **********************************************
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
