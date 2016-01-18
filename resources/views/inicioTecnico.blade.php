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
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Servicios </h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="span12">
                <br>
                <p>
                  cantidad total de servicios: <button class=="btn btn-default">{{ $cantidad }}</button>
                </p>
              </div>
              <table class="table table-striped table-bordered">
                <thead>
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
              <div class=" text-center">
                <ul class="pagination">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /widget-content -->
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 -->
        <!-- /span6 -->
        <div class="span6">
          <div class="widget">
              <div class="widget-header"> <i class="icon-sitemap"></i>
                <h3>Modulos</h3>
              </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts">
                <a href="{{ route('servicios.index') }}" class="shortcut">
                  <i class="shortcut-icon icon-credit-card"></i>
                  <span class="shortcut-label">Servicios</span>
                </a>
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

                  