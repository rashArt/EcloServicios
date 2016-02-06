<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\TipoServicio;
use App\Servicio;
use App\Componente;
use App\ComponenteServicio;
use Carbon\Carbon;
use Anouar\Fpdf\Facades\Fpdf;

class DescargasController extends Controller
{
    public function __construct() {

      Carbon::setLocale('es');

    }

    public function index()
    {
      $clientes = User::where('nivel', 'cliente')->count();
      $tecnicos = User::where('nivel', 'tecnico')->count();
      $admin = User::where('nivel', 'administrador')->count();
      $tipos = TipoServicio::count();

      return view('descargas.index')
        ->with('clientes', $clientes)
        ->with('tecnicos', $tecnicos)
        ->with('admin', $admin)
        ->with('tipos', $tipos);
    }
    public function clientes()
    {
      $clientes = User::where('nivel', 'cliente')->get();

      return view('descargas.clientes')
        ->with('clientes', $clientes);
    }
    public function tecnicos()
    {
      $tecnicos = User::where('nivel', 'tecnico')->get();

      return view('descargas.tecnicos')
        ->with('tecnicos', $tecnicos);
    }
    public function administradores()
    {
      $administradores = User::where('nivel', 'administrador')->get();

      return view('descargas.administradores')
        ->with('administradores', $administradores);
    }
    public function serviciosTipo()
    {
      $tipos = TipoServicio::all();

      return view('descargas.serviciosTipo')
        ->with('tipos', $tipos);
    }

    public function servicio($id)
    {

        $servicio = Servicio::find($id);
        $tecnico_id = $servicio->tecnico_id;
        $tecnico = User::find($tecnico_id);

        $cliente_id = $servicio->cliente_id;
        $cliente = User::find($cliente_id);

        $comSer = ComponenteServicio::where('servicio_id', $id)->lists('componente_id');
        $componentes = Componente::whereIn('id', $comSer)->orderBy('nombre', 'ASC')->get();

        return view('descargas.servicio')
            ->with('tecnico', $tecnico)
            ->with('cliente', $cliente)
            ->with('servicio', $servicio)
            ->with('componentes', $componentes);
    }
}
