@extends('base')
@section('title', 'Panel Principal')
@section('ini', 'active')

@section('content')

<div class="main">
  <div class="main-inner">
    <div class="container alto">
      <div class="row">
        @include ('flash::message')
        <div class="span6">
          <div class="widget widget-nopad">
            <div class="widget-header">
              <i class="icon-bar-chart"></i>
              <h3>Estadisticas</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">

                <div class="widget-content">
                  @if (Auth::user()->nivel === 'administrador')
                    <h6 class="bigstats">Contador de registros totales realizados dentro del sistema de servicios de <a href="eclosoft.net" target="_BLANK">Eclosoft C.A.</a></h6>
                    <div id="big_stats" class="cf">

                      <div class="stat"> <i class="icon-wrench"></i> <span class="value">2</span> </div>
                      <!-- .stat -->

                      <div class="stat"> <i class="icon-user"></i> <span class="value">3</span> </div>
                      <!-- .stat -->

                      <div class="stat"> <i class="icon-credit-card"></i> <span class="value">23</span> </div>
                      <!-- .stat -->

                      <div class="stat"> <i class="icon-refresh"></i> <span class="value">25</span> </div>
                      <!-- .stat -->
                    </div>
                  @elseif (Auth::user()->nivel === 'cliente')
                    <h6 class="bigstats">servicios Realizados hasta la fecha: <span class="badge">{{ $cantidad }}</span></h6>
                    <table class="bigstats table table-condensed table-hover">
                      <thead>
                        <tr>
                          <th colspan="5">Observa tus servicios</th>
                        </tr>
                        <tr>
                          <th>Servicio</th>
                          <th>Estado</th>
                          <th>Registro</th>
                          <th>Actualización</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($servicio as $servicio)
                          <tr>
                          <td>{{ $servicio->tipo->nombre }}</td>
                          <td>
                            @if ($servicio->status == 1)
                              <span class="text-warning">Solicitado</span>
                            @elseif ($servicio->status == 2)
                              <span class="text-primary">Procesando</span>
                            @else
                              <span class="text-success">Finalizado</span>
                            @endif
                          </td>
                          <td>{{ $servicio->created_at->format('d/m/Y h:i:s A') }}</td>
                          <td>{{ $servicio->updated_at->diffForHumans() }}</td>
                          <td><a href="{{ URL::to('servicios/' . $servicio->id) }}"><i class="icon-arrow-right"></i></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @endif
                </div>
                <!-- /widget-content -->
              </div>
            </div>
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 -->
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-sitemap"></i>
              <h3>Modulos</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts">
                @if (Auth::user()->nivel === 'administrador')
                  <a href="{{ route('users.index') }}" class="shortcut">
                    <i class="shortcut-icon icon-user"></i>
                    <span class="shortcut-label">Usuarios</span>
                  </a>
                @endif
                @if (Auth::user()->nivel === 'administrador')
                  <a href="{{ route('servicios.tipos.index') }}" class="shortcut">
                    <i class="shortcut-icon icon-list-alt"></i>
                    <span class="shortcut-label">Tipos de Servicios</span>
                  </a>
                @endif
                @if (Auth::user()->nivel === 'administrador')
                  <a href="{{ route('servicios.index') }}" class="shortcut">
                      <i class="shortcut-icon icon-credit-card"></i>
                      <span class="shortcut-label">Registro de Servicios</span>
                  </a>
                @endif
                @if (Auth::user()->nivel === 'tecnico')
                  <a href="{{ route('servicios.index') }}" class="shortcut">
                      <i class="shortcut-icon icon-credit-card"></i>
                      <span class="shortcut-label">Registro de Servicios</span>
                  </a>
                @endif
                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-copy"></i>
                    <span class="shortcut-label">Descargas</span>
                </a>
                {{-- <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-comment"></i>
                    <span class="shortcut-label">Comments</span>
                </a>
                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-file"></i>
                    <span class="shortcut-label">Notes</span>
                </a>
                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-picture"></i>
                    <span class="shortcut-label">Photos</span>
                </a>
                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-tag"></i>
                    <span class="shortcut-label">Tags</span>
                </a> --}}
              </div>
              <!-- /shortcuts -->
            </div>
            <!-- /widget-content -->
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>

@stop
