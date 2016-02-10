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
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Tipo de Servicio</th>
                      <th>Codigo del Cliente</th>
                      @if (Auth::user()->nivel === 'administrador')
                        <th>Codigo del Tecnico</th>
                      @endif
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($servicio as $serv)

                        <tr>
                          <td>{{ $serv->tipo->nombre }}</td>
                          @if (Auth::user()->nivel === 'tecnico')
                            <td>
                              Cliente-0{{ $serv->cliente_id }}
                            </td>
                          @endif
                          @if (Auth::user()->nivel === 'administrador')
                          <td>
                            <a href="{{ URL::to('users/' . $serv->cliente_id) }}" class="text-primary">Cliente-0{{ $serv->cliente_id }}</a>
                          </td>
                          <td>
                            <a href="{{ URL::to('users/' . $serv->tecnico_id) }}" class="text-primary">Tecnico-0{{ $serv->tecnico_id }}</a>
                          </td>
                          @endif
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
                            <a href="{{ URL::to('servicios/' . $serv->id) }}" class="btn btn-success"><i class="icon-eye-open"></i></a>
                            <a href="{{ URL::to('servicios/' . $serv->id . '/edit') }}" class="btn btn-primary"><i class="icon-edit"></i></a>
                            <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#del{!!$serv->id!!}"><i class="icon-trash"></i></button>
                            <a href="{{ URL::to('/descargas/servicio/' . $serv->id) }}" target="_BLANK" class="btn btn-red"><i class="icon-download-alt"></i></a>
                          </td>
                        </tr>
                      <!-- Modal -->
                      <div class="modal fade" id="del{!!$serv->id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Desea Eliminar?</h4>
                            </div>
                            <div class="modal-body">
                              Se eliminará de forma permanente
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                              <a href="{{ URL::to('servicios/' . $serv->id . '/destroy') }}" class="btn btn-danger">Eliminar <i class="icon-trash"></i></a>
                            </div>
                          </div>
                        </div>
                      </div> <!-- / Modal -->
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