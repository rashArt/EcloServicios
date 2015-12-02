@extends('base')
@section('title', 'Servicios')
@section('serv', 'active')
@section('content')

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

        <section class="content-header">
          <ol class="breadcrumb">
          <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active"> Servicios</li>
          </ol>
        </section>

        @include('flash::message')

          <div class="widget ">
            <div class="widget-header">
              <i class="icon-user"></i>
              <h3>Listado de Servicios</h3>
            </div> <!-- /widget-header -->
            <div class="widget-content">
                <div class="text-right">
                  @if (Auth::user()->nivel === 'tecnico')
                    <a href="{{ route('servicios.create') }}" class="btn btn-primary"><span class="icon-plus"></span> Agregar Servicio</a>
                  @endif
                  @if (Auth::user()->nivel === 'administrador')
                    <a href="{{ route('servicios.tipos.create') }}" class="btn btn-primary"><span class="icon-plus"></span> Agregar Tipo de Servicio</a>
                  @endif
                </div>
                <hr>
              <div class="table-responsive">
                <table class="table table-hover table-condensed">
                  <thead>
                    <tr>
                      <th>Tipo de Servicio</th>
                      <th>Codigo del Cliente</th>
                      <th>Codigo del Tecnico</th>
                      <th>Estado</th>
                      <th><i class="icon-edit"></i></th>
                      <th><i class="icon-trash"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($servicio as $serv)

                        <tr>
                          <td>{{ $serv->tipo->nombre }}</td>
                          <td>
                            <a href="{{ URL::to('users/' . $serv->cliente_id) }}" class="text-primary">Cliente-0{{ $serv->cliente_id }}</a>
                          </td>
                          <td>
                            <a href="{{ URL::to('users/' . $serv->tecnico_id) }}" class="text-primary">Tecnico-0{{ $serv->tecnico_id }}</a>
                          </td>
                          <td>
                            @if($serv->status == 1)
                            <div class="badge badge-warning"> Solicitado</div>
                            @elseif($serv->status == 2)
                            <div class="badge badge-info"> Procesando</div>
                            @else
                            <div class="badge badge-success"> Finalizado</div>
                            @endif
                          </td>
                          <td>
                            <a href="{{ URL::to('servicios/' . $serv->id . '/edit') }}" class="btn btn-primary"><i class="icon-edit"></i></a>
                          </td>
                          <td>
                            <a href="{{ URL::to('servicios/' . $serv->id . '/destroy') }}" class="btn btn-danger"><i class="icon-trash"></i></a>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="text-center">
                  {!! $servicio->render() !!}
                </div>
              </div>
            </div>
          </div>

        </div> <!-- /span12 -->
      </div> <!-- /row -->
    </div> <!-- /container -->
  </div> <!-- /main-inner -->
</div> <!-- /main -->

@stop